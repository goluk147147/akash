let curLang = "english", resolved_base_url = "";
self.addEventListener("message", (event) => {
  //console.log("events",event);
  if (event && event.lang && event.base_url && event.base_url != "") {
    //console.log("case 1");
    curLang = event.lang;
    resolved_base_url = event.base_url;
  } else if (event.origin) {
    //console.log("case 2");
    resolved_base_url = event.origin; 
    resolved_base_url = resolved_base_url + "/";
  } else { 
    //console.log("case 3");
    resolved_base_url = self.location.origin; 
    resolved_base_url = resolved_base_url + "/";
  }
  //console.log("resolved_base_url1:", resolved_base_url);
});

self.addEventListener("push", async (event) => {
  console.log("Push event received", event.data.json());
  //let resolved_base_url = "http://localhost/";
  console.log("resolved_base_url2:", resolved_base_url);

  const event_data = event.data.json();
  //console.log("event_data:", event_data);
  let notification_data = {};
  if (event_data.hasOwnProperty('data')) {
    notification_data = event_data.data.message;
    //console.log("notification_data1:", notification_data);
    let redirect_url = "";
    if (notification_data) {
      try {
        notification_data = JSON.parse(notification_data);
      } catch (err) { 
          console.error("Error parsing JSON:", err);
      }
      //console.log("Notification data2:", notification_data);
      let title = notification_data.title || "Default Title";
      let description = "Default Message";
      if (notification_data.message) {
        if (typeof notification_data.message === "string") {
            description = notification_data.message;
        } else { 
            description = notification_data.message[curLang]
        }
      } 
      let body = description
      let icon = resolved_base_url + "assets/images/login_logo.svg"; // Use resolved_base_url here
      if (notification_data.hasOwnProperty('data')) {
        let content_data = notification_data.data;
        if (content_data.hasOwnProperty('url') && content_data.url) {
          icon = content_data.url;
        }else if (content_data.hasOwnProperty('content_url')) {
          icon = content_data.content_url;
        }
        let api_resp = {};
        let enc_id = "";
        if (content_data.hasOwnProperty('content_id')) {
          try {
            const cbc_key1 = "%!F*&^$)_*%3f&B+";
            const ini_vector1 = "#*$DJvyw2w%!_-$@";

            // AES-CBC Encryption
            const enc = new TextEncoder();
            const key = await crypto.subtle.importKey(
              "raw",
              enc.encode(cbc_key1),
              { name: "AES-CBC", length: 256 },
              false,
              ["encrypt", "decrypt"]
            );
            const iv = new TextEncoder().encode(ini_vector1);
            const encodedString = new TextEncoder().encode(content_data.content_id);

            const encrypted = await crypto.subtle.encrypt(
              { name: "AES-CBC", iv: iv },
              key,
              encodedString
            );
            // Return the encrypted data as base64 with a static component similar to PHP function
            api_resp.enc_id = btoa(String.fromCharCode(...new Uint8Array(encrypted))) + ":" + btoa("1234567890123456");
            enc_id = api_resp.enc_id;
          } catch (error) {
            console.error("Error encoding ID:", error);
          }
        } 
        let msg_type = content_data.hasOwnProperty('message_target') ? content_data.message_target : "1";
        let content_type = content_data.hasOwnProperty('content_type') ? content_data.content_type : "0";
        if (msg_type == "1") {  // Redirected to Home page
          redirect_url = resolved_base_url;
        } else if (msg_type == "2") { // Redirected to Live Audio,Video, VODs and other contents
          let is_live = content_data.hasOwnProperty('is_live') ? content_data.is_live : "0";
          if (content_type == "0" || content_type == "1") { //Redirected to Live Audio,Video, VODs
            if (is_live == "1") { // Redirected to Live Audio,Video
              redirect_url += "/pb_live_details?id=" + enc_id + "&type=push";
            } else {  //Redirected to VODs 
              redirect_url += "/play-video?id=" + enc_id + "&type=push";
            }
          } else if (content_type == "2") {
            redirect_url += "/pb_live_details?id=" + enc_id + "&type=push";
          } else if (content_type == "4" || content_type == "5" || content_type == "6" || content_type == "7") {
            redirect_url += "/content-detail?id=" + enc_id + "&type=push";
          } else if (content_type == "9") {
            if (is_live == "1") { // Redirected to Live Audio,Video
              redirect_url += "/live?id=" + enc_id + "&type=push";
            } 
          }
        } else {
          redirect_url = resolved_base_url;
        }
      }

      // Define notification options
      const options = {
        body: body,
        icon: icon,
      };
      if (redirect_url !== "") {
        options.data = {
          url: redirect_url
        };
      }
      console.log("Notification options:", options);
      
      // Show the notification
      //event.waitUntil(
        self.registration.showNotification(title, options)
      //);
    }
  }
});

self.addEventListener("notificationclick", (event) => {
  //console.log("notificationclick",event);
  const event_data = event.notification;
  let urlToOpen = '/'; // Fallback to '/' if URL is not available
  if (event_data.data && event_data.data.hasOwnProperty('url')) { 
    urlToOpen = event_data.data.url;
  }
  event.waitUntil(
    clients.matchAll({ type: 'window' }).then((windowClients) => {
      // Check if there's already a window/tab open with the target URL
      for (const client of windowClients) {
        if (client.url === urlToOpen && 'focus' in client) {
          return client.focus();
        }
      }
      // Otherwise, open a new window/tab
      if (clients.openWindow) {
        return clients.openWindow(urlToOpen);
      }
    })
  );
});

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}



