let session_exists = localStorage.getItem('pb_session');
//console.log("session_exists", session_exists);
if (session_exists) {
  let api_url = `${base_url}web/Login_register/token_to_session`;
  //console.log("api_url",api_url);
  fetch(api_url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: 'token=' + encodeURIComponent(session_exists)
  })
    .then(response => response.text())
    .then(data => {
      let res_data = JSON.parse(data);
      if (res_data.status && res_data.status == true) {
        //if (res_data.hasOwnproperty('redirection') && res_data.redirection == true) {
        location.reload();
        //}
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
} 