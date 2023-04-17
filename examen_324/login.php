
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Control</title>
    <link rel="stylesheet" href="assets/css/estilo_login.css">
  </head>
  <body>

    <div class="login-box">
      <img src="assets/img/EscudoFCPN.png" class="avatar" alt="Avatar Image">
      <h1>Ingresar Usuario y Contraseña</h1>
      <form action="control.php" method="POST">
        <!-- USERNAME INPUT -->
        <label for="username">Usuario</label>
        <input type="text" id="usr" name="usr" placeholder="Usuario">
        <!-- PASSWORD INPUT -->
        <label for="password">Password</label>
        <input type="password" id="pass" name="pass" placeholder="Password">
        <input type="submit" value="ENTRAR">
        <a href="#">Lost your Password?</a><br>
        <a href="#">Don't have An account?</a>
      </form>
    </div>
  </body>
</html>