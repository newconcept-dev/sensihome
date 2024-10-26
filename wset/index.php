<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sensi Home</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Sensi</b>Home</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Inicia sesion</p>

      <?php 
if(isset($_POST['login'])){
    echo "Formulario enviado<br>";

    /* Inicializar variable de sesion */
    session_start();
    $email = $_POST['email'] ?? '';
    $pass = $_POST['pass'] ?? '';
    $pass = md5($pass);

    include_once './models/model.php';

    $con = mysqli_connect($host, $user, $password, $db);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Conexión exitosa<br>";

    /* Consulta */
    $query = "SELECT id, email, nombre FROM usuarios WHERE email = '$email' AND pass = '$pass'";
    $res = mysqli_query($con, $query);

    if (!$res) {
        die("Query failed: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($res);

    if ($row) {
        echo "Usuario encontrado<br>";
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['nombre'] = $row['nombre'];
        header("location: panel.php");
        exit(); // Asegúrate de que el script se detiene después de la redirección
    } else {
        echo '<div class="alert alert-danger" role="alert">
                <h3>Error</h3>
                <img src="" alt="imagende no hubo" width="200px">
              </div>';
    }
}
?>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>