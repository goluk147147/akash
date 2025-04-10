// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
import { getMessaging, getToken } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-messaging.js";

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyD0pdwmNp9jxKSKyvixatR5f0g3iloqlRE",
  authDomain: "pb-ott.firebaseapp.com",
  databaseURL: "https://pb-ott-default-rtdb.asia-southeast1.firebasedatabase.app",
  projectId: "pb-ott",
  storageBucket: "pb-ott.appspot.com",
  messagingSenderId: "355785400245",
  appId: "1:355785400245:web:b6fbc7db0c66bb639a83fc",
  measurementId: "G-22QRTWPNRE"
};
  

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const messaging = getMessaging(app);

let resolved_base_url = "";
self.addEventListener("message", (event) => {
  //console.log("events",event);
  if (event && event.lang && event.base_url) {
      resolved_base_url = event.base_url;
    }
});


// Request permission to send notifications
async function requestNotificationPermission() {
  try {
    const permission = await Notification.requestPermission();
    let permission_value = false;
    if (permission === 'granted') {
      permission_value = true;
    }
    return permission_value;
  } catch (error) {
    //console.error('An error occurred while requesting notification permission', error);
    return false;
  }
}

// Register service worker and get token
async function initializeMessaging() {
  try {
    let currentToken;
    if (is_login == "NO") {
      //let file_ver = (http_host == "localhost") ? "sw_localhost.js" : "sw_" + env + ".js";
      //let sw_file_url = 'assets/js/' + file_ver;
      let sw_file_url = 'assets/js/sw.js'
      const registration = await navigator.serviceWorker.register(sw_file_url);
      //console.log("registration",registration);
      currentToken = await getToken(messaging, {
        serviceWorkerRegistration: registration,
        vapidKey: 'BMjgSvqnovvmavmVvQsO_TZ0-ICwhEjyl5N7LBD1owGF23s6NmTT40jFuANBh7DZ-3JkiU6m0oQzs-fJdoNWS1M'
      });
    }
    return currentToken;
  } catch (err) {
    return null;
  }
}


let get_perm = await requestNotificationPermission();
if (get_perm == true) {
  let system_id = await initializeMessaging();
  if (system_id) {
    localStorage.setItem("pb_fbStamp",system_id);
    let save_token_url = `${base_url}web/dashboard/generate_visitor_id`;
    //console.log('save_token_url', save_token_url);
    //let getBrowser_name = await getBrowserInfo();
    $.ajax({
      type: 'POST',
      url: save_token_url,
      data: {
        system_id: system_id,
        //browser_name: getBrowser_name
      },
      dataType: "json",
      success: function (data) { },
    });
  }
}

async function getBrowserInfo() {
  const userAgent = navigator.userAgent;
  let browserName = "Unknown";
  let version = "Unknown";

  //Detact Opera
  if (userAgent.indexOf("Opera") !== -1 || userAgent.indexOf("OPR") !== -1) {
    browserName = "Opera";
    version = userAgent.substring(userAgent.indexOf("OPR") + 4);
    if (version.indexOf(")") !== -1) {
      version = version.substring(0, version.indexOf(")"));
    }
  }
  // Detect Chrome
  else if (userAgent.indexOf("Chrome") !== -1 && userAgent.indexOf("Safari") !== -1) {
    browserName = "Google Chrome";
    version = userAgent.substring(userAgent.indexOf("Chrome") + 7);
  }
  // Detect Firefox
  else if (userAgent.indexOf("Firefox") !== -1) {
    browserName = "Mozilla Firefox";
    version = userAgent.substring(userAgent.indexOf("Firefox") + 8);
  }
  // Detect Safari
  else if (userAgent.indexOf("Safari") !== -1 && userAgent.indexOf("Chrome") === -1) {
    browserName = "Apple Safari";
    version = userAgent.substring(userAgent.indexOf("Version") + 8);
  }
  // Detect Edge
  else if (userAgent.indexOf("Edge") !== -1) {
    browserName = "Microsoft Edge";
    version = userAgent.substring(userAgent.indexOf("Edge") + 5);
  } // Detect Internet Explorer
  else if (userAgent.indexOf("Trident") !== -1) {
    browserName = "Microsoft Internet Explorer";
    version = userAgent.substring(userAgent.indexOf("rv:") + 3);
  }

  // Remove extra information
  if (version.indexOf(";") !== -1) {
    version = version.substring(0, version.indexOf(";"));
  }
  if (version.indexOf(" ") !== -1) {
    version = version.substring(0, version.indexOf(" "));
  }
  let browser_name = browserName + "(" + version + ")";
  //alert(browser_name);
  return browser_name;
}

