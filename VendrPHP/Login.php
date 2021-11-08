<html id="fullHD">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='../VendrCSS/Login.css' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <h2 id="vendr">Vendr</h2>
    <div id="fullLogin">
      <h3 id="loginTitle"> Login </h3>
        <div id="loginInfor">
          <form action="LoginCheck.php" method="post">
            <input type="text" id="userName" name="userName" placeholder="User Name"><br>
            <input type="text" id="password" name="password" placeholder="Password"><br><br>
            <input type="submit" id="login" value="Login">
          </form>
          <a href="../VendrPHP/CreateAccount.php"> Create Account</a>
        </div>
    </div>
  </body>
</html>
