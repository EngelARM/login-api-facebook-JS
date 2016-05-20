<html>
<head>
<meta charset="UTF-8">
<title>prueba face</title>
</head>
<body>
<p>Iniciar sesi&oacute;n con Facebook:</p>
<script type="text/javascript" src="http://www.crmn360.com/Util/Js/jquery-1.11.1.min.js"></script>

<script>
   //https://www.elserver.com/facebook-login-javascript/
 function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Logearse dentro de esta aplicacion.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Logearse en facebook ';
    }
  }
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
    window.fbAsyncInit = function() {
    FB.init({
      appId      : '751638261644944',
      status: true,
      cookie     : true,
      xfbml      : true,
      version    : 'v2.6',
      extendPermissions : 'public_profile, email, user_birthday' 
      
      
    });
//    FB.ui(
//    {      
//     method: 'share',
//     href: 'https://graph.facebook.com/name'
//   }, function(response){});
    
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });

  };
  
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); 
    js.id = id;
    js.src = "//connect.facebook.net/es_LA/all.js";//sdk
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    FB.api("/me",  function(response) {
        //var accessToken =   response.authResponse.accessToken;
        
        
      console.log('Logeado como: ' + response.name);
        document.getElementById('status').innerHTML ='Logeado como: ' + response.name + '!';
        
     console.log(response);
      //response= JSON.parse(response);
        document.getElementById('id').value =response.id;
        document.getElementById('link').value =response.profile_url;
        document.getElementById('name').value =response.name;
        document.getElementById('first_name').value =response.first_name;
        document.getElementById('last_name').value =response.last_name;
        document.getElementById('fecha').value =response.birthday;
        document.getElementById('locale').value =response.locale;
        document.getElementById('email').value =response.email;
        document.getElementById('gender').value =response.gender;
        //document.getElementById('token').value =accessToken;
        document.getElementById("conectar_facebook").innerHTML = '<img src="https://graph.facebook.com/' + response.id + '/picture">';
        
         
           
    });
  }
   function fblogout() {    
        FB.logout(function () {    
            window.location.reload(); 
        });    
    }    
   function queryUser(){
       fb.login(function(){ 
    if (FB.logged) {
      // Cambiamos el link de identificarse por el nombre y la foto del usuario.
      html = "<p>Hola " + fb.user.first_name + "</p>";
      html += "<p><img src='" + fb.user.picture + "'/></p>";
      document.getElementById("debug").innerHTML = html;
    } else {
      alert("No se pudo identificar al usuario");
    }
  })
//       FB.api("/me",  function(response) {
//           var query = FB.Data.query('SELECT name, hometown_location, sex, pic_square FROM user WHERE uid={0}', response.id);
//            query.wait(function(rows) {
//                alert();
//              document.getElementById('debug').innerHTML =
//                'nombre usuario: ' + rows[0].name + "<br />" +
//                '<img src="' + rows[0].pic_square + '" alt="" />' + "<br />";
//            console.log(rows); 
//            });    
//           console.log(query); 
//        });
   }
 /****************************/  

</script>
<div
  class="fb-like"
  data-share="false"
  data-width="450"
  data-show-faces="false">
</div>
<fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
<input type="button" value="logout"  onclick="fblogout();">
<input type="button" value="ver mas datos"  onclick="queryUser();">

<div id="status">
</div>
<div id="conectar_facebook"></div>
<hr>
<div id="debug">-|</div>
<br>
Token:
<input type="text" id="token" value="" placeholder="token" title="token">
<br>
id:
<input type="text" id="id" value="" placeholder="id" title="id">
<br>
link:
<input type="text" id="link" value="" placeholder="link" title="link">
<br>
nombre:
<input type="text" id="name" value="" placeholder="nombre" title="nombre">
<br>
apellido paterno:
<input type="text" id="first_name" value="" placeholder="first_name" title="first_name">
<br>
apellido materno:
<input type="text" id="last_name" value="" placeholder="last_name" title="last_name">
<br>
edad:
<input type="text" id="age_range" value="" placeholder="age_range" title="age_range">
<br>
localizacion:
<input type="text" id="locale" value="" placeholder="locale" title="locale">
<br>
correo:
<input type="text" id="email" value="" placeholder="email" title="email">
<br>
genero:
<input type="text" id="gender" value="" placeholder="genero" title="genero">
<br>
nacimiento:
<input type="text" id="fecha" value="" placeholder="fecha" title="fecha">
<br>
pais:
<input type="text" id="pais" value="" placeholder="pais" title="pais">


</body>
</html>