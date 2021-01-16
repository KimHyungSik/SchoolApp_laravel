$.getJSON('https://ipgeolocation.abstractapi.com/v1/?api_key=<your_api_key>', function(data) {
  console.log(JSON.stringify(data, null, 2));
});