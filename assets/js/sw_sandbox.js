self.addEventListener("push", async (event) => {
  console.log("Push event received", event.data.json());
  let resolved_base_url = "https://sandrd15r8rkxea.pb-online.co.in/";
  console.log("Using base URL:", resolved_base_url);

  const event_data = event.data.json();
  let notification_data = {};
  if (event_data.hasOwnProperty('data')) {
    notification_data = event_data.data.message;
    //console.log("notification_data1:", notification_data);
    let redirect_url = "";
    if (notification_data) {
      notification_data = JSON.parse(notification_data);
      //console.log("Notification data2:", notification_data);
      let title = notification_data.title || "Default Title";
      let body = notification_data.message || "Default Message";
      let icon = resolved_base_url + "assets/images/login_logo.svg"; // Use resolved_base_url here
      if (notification_data.hasOwnProperty('data')) {
        let content_data = notification_data.data;
        //console.log("content_data:", content_data);
        if (content_data.hasOwnProperty('content_url')) {
          icon = content_data.content_url;
        }
        if (content_data.hasOwnProperty('content_id')) {
          try {
            let response = await fetch(resolved_base_url + "web/home/encode_string_url", { // Use resolved_base_url here
              method: 'POST',
              headers: {
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({ id: content_data.content_id })
            });
            const api_resp = await response.json();
            if (api_resp.hasOwnProperty('enc_id')) {
              let enc_id = api_resp.enc_id;
              let msg_type = content_data.hasOwnProperty('message_target') ? content_data.message_target : "1";
              let content_type = content_data.hasOwnProperty('content_type') ? content_data.content_type : "0";
              if (msg_type == "1") {  // Redirected to Home page
                redirect_url = resolved_base_url + "?type=push";
              } else if (msg_type == "2") { // Redirected to Live Audio,Video, VODs and other contents
                if (content_type == "0" || content_type == "1") { //Redirected to Live Audio,Video, VODs
                  let is_live = content_data.hasOwnProperty('is_live') ? content_data.is_live : "0";
                  if (is_live == "1") { // Redirected to Live Audio,Video
                    redirect_url += "/pb_live_details?id=" + enc_id + "&type=push";
                  } else {  //Redirected to VODs 
                    redirect_url += "/play-video?id=" + enc_id + "&type=push";
                  }
                } else if (content_type == "2") {
                  redirect_url += "/pb_live_details?id=" + enc_id;
                } else if (content_type == "5" || content_type == "6" || content_type == "7") {
                  redirect_url += "/content-detail?id=" + enc_id + "&type=push";
                } else if (content_type == "9") {
                  redirect_url += "/live?id=" + enc_id;
                }
              } else {
                redirect_url = resolved_base_url + "?type=push";
              }
            }
          } catch (error) {
            console.error("Error encoding ID:", error);
          }
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
      event.waitUntil(
        self.registration.showNotification(title, options)
      );
    }
  }
});

self.addEventListener("notificationclick", (event) => {
  const event_data = event.notification;
  let urlToOpen = event_data.data.url || '/'; // Fallback to '/' if URL is not available
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
