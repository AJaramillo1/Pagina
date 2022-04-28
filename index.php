<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="login.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  <body style="background-color: #e1e2e2">
      <div class="container-fluid">
            <div class="jumbotron-fluid" style="background-color: #E67B2F;">
                <h1 class="text-center" style="color: white;">Examen Unidades 3 y 4</h1>
            </div>
      
      <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #3417E6;">
        <button class="btn btn-light btn-primary" type="button" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">Iniciar Sesión</button>        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse" data-target="#login" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
</div>

    <div id="login" align="center" class="collapse">
        <form method="POST">
        <table>
        <tr><td colspan="2" class="text-center" style="background-color:#0387c0;padding-bottom:10px;"><label>Login</label></td></tr>
        <tr><td rowspan="6"></td><td><label>Usuario</label></td></tr>
        <tr><td><input type="text" name="txtusuario" placeholder="Ingresar usuario" required /> </td></tr>
        <tr><td><label>Contraseña</label></td></tr>
        <tr><td><input type="password" name="txtpassword" placeholder="Contraseña" required /> </td></tr>
        <tr><td><input type="submit" name="btningresar" value="Ingresar"/></td></tr>
        </table>
        </form>
        </div>

        
  </body>
</html>

<?php

if(isset($_POST['btningresar']))
{
	
$servidor = "localhost";
$usuario = "root";
$pwd = "";
$nombreBD = "examenu3u4";
$conn = new mysqli($servidor, $usuario, $pwd, $nombreBD);

if (!$conn) {
    echo 'Error de conexión: ' . mysqli_connect_error();
}

    $usuario = mysqli_real_escape_string($conn, $_POST['txtusuario']);
    $contra = mysqli_real_escape_string($conn, $_POST['txtpassword']);

    $sql = "SELECT * FROM user "
        . "WHERE correo = '$usuario' AND "
        . "pwd = '$contra'";

    $resultado = mysqli_query($conn, $sql);
    if ($resultado->num_rows == 1) {
        session_start();
        $nombreUsuario = mysqli_fetch_assoc($resultado);
        $_SESSION['nombre'] = $nombreUsuario["nombre"];
        $_SESSION['usuario'] = $nombreUsuario;
        $parts = explode('@', $_SESSION['usuario']['correo']);
        $domain = "@" . $parts[1];
        
        if (strcmp($domain, "@admin.com") == 0) {
            header('location: pagina.php');
        } else {
            header('location: pagotro.php');
        }
    } else{
      echo "<script>alert('Usuario o contraseña equivocados');window.location= 'index.php' </script>";
    }
    mysqli_free_result($resultado);

}
?>
