<?php
/* Conexion */
include_once './models/model.php';
$con = mysqli_connect($host, $user, $password, $db);

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_REQUEST['guardar'])) {
  $email = mysqli_real_escape_string($con, $_REQUEST['email'] ?? '');
  $pass = md5(mysqli_real_escape_string($con, $_REQUEST['pass'] ?? ''));
  $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
  $segundo_nombre = mysqli_real_escape_string($con, $_REQUEST['segundo_nombre'] ?? '');
  $apellido_paterno = mysqli_real_escape_string($con, $_REQUEST['apellido_paterno'] ?? '');
  $apellido_materno = mysqli_real_escape_string($con, $_REQUEST['apellido_materno'] ?? '');
  $telefono = mysqli_real_escape_string($con, $_REQUEST['telefono'] ?? '');
  $cargo_id = mysqli_real_escape_string($con, $_REQUEST['cargo_id'] ?? '');

  // Validar que se haya subido una imagen
  if (!isset($_FILES['profileImage']) || $_FILES['profileImage']['error'] != UPLOAD_ERR_OK) {
    echo '<div class="alert alert-danger" role="alert">Por favor, sube una imagen de perfil.</div>';
    return;
  }

  // Insertar en la tabla para obtener el ID del usuario
  $query = "INSERT INTO usuarios (email, pass, nombre, segundo_nombre, apellido_paterno, apellido_materno, telefono, cargo_id) VALUES ('$email', '$pass', '$nombre', '$segundo_nombre', '$apellido_paterno', '$apellido_materno', '$telefono', '$cargo_id')";
  $res = mysqli_query($con, $query);

  if ($res) {
    $userId = mysqli_insert_id($con); // Obtener el ID del usuario insertado

    // Crear una carpeta nombrada usr0000n
    $userFolder = sprintf('/path/to/cloud.sensihome.com.mx/cloud/data/users/usr%05d', $userId);
    if (!is_dir($userFolder)) {
      if (!mkdir($userFolder, 0777, true)) {
        echo '<div class="alert alert-danger" role="alert">Error al crear el directorio del usuario.</div>';
        return;
      }
    }

    // Guardar la imagen con un nombre aleatorio
    $imageFileType = strtolower(pathinfo($_FILES['profileImage']['name'], PATHINFO_EXTENSION));
    $imageFileName = uniqid() . '.' . $imageFileType;
    $imageFilePath = $userFolder . '/' . $imageFileName;
    if (!move_uploaded_file($_FILES['profileImage']['tmp_name'], $imageFilePath)) {
      echo '<div class="alert alert-danger" role="alert">Error al subir la imagen.</div>';
      return;
    }

    // Guardar la dirección de la imagen como string
    $profileImage = mysqli_real_escape_string($con, $imageFilePath);

    // Actualizar la tabla con la ruta de la imagen
    $query = "UPDATE usuarios SET profileImage='$profileImage' WHERE id='$userId'";
    $res = mysqli_query($con, $query);

    if ($res) {
      // Generar un archivo JSON con los datos del usuario hasheados
      $userData = [
        'email' => hash('sha256', $email),
        'pass' => hash('sha256', $pass),
        'nombre' => hash('sha256', $nombre),
        'segundo_nombre' => hash('sha256', $segundo_nombre),
        'apellido_paterno' => hash('sha256', $apellido_paterno),
        'apellido_materno' => hash('sha256', $apellido_materno),
        'telefono' => hash('sha256', $telefono),
        'cargo_id' => hash('sha256', $cargo_id),
        'profileImage' => hash('sha256', $profileImage)
      ];

      // Generar un nombre de archivo JSON seguro
      $jsonFileName = hash('sha256', $userId . time()) . '.json';
      $jsonFilePath = $userFolder . '/' . $jsonFileName;
      if (file_put_contents($jsonFilePath, json_encode($userData, JSON_PRETTY_PRINT)) === false) {
        echo '<div class="alert alert-danger" role="alert">Error al crear el archivo JSON del usuario.</div>';
        return;
      }

      echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario creado exitosamente">';
    } else {
      ?>
      <div class="alert alert-danger" role="alert">
        Error al actualizar la imagen del usuario <?php echo mysqli_error($con) ?>
      </div>
      <?php
    }
  } else {
    ?>
    <div class="alert alert-danger" role="alert">
      Error al crear el usuario <?php echo mysqli_error($con) ?>
    </div>
    <?php
  }
}
?>

<link rel="stylesheet" href="./css/user.input.file.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Crear usuario</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <form id="formValidated" action="panel.php?modulo=crearUsuario" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <div class="text-center">
                    <h2>Informacion personal</h2>
                  </div>

                  <div class="avatar-upload">
                      <div class="avatar-edit">
                          <input type='file' id="imageUpload" name="profileImage" accept=".png, .jpg, .jpeg"/>
                          <label for="imageUpload"></label>
                      </div>
                      <div class="avatar-preview">
                          <div id="imagePreview" style="background-image: url(./dist/img/userAsset.png);">
                          </div>
                      </div>
                  </div>                                
                  

                  <div class="container text-center">
                    <p id="full-name"></p>
                  </div>
                </div>

                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" name="nombre" class="form-control" required="required">
                </div>

                <div class="form-group">
                  <label>Segundo nombre</label>
                  <input type="checkbox" id="second-name-status" name="second-name-status" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 10px;">
                  <input type="text" id="segundo_nombre" name="segundo_nombre" class="form-control" style="display: none;">
                </div>
                <div class="form-group">
                  <label>Apellido Paterno</label>
                  <input type="text" name="apellido_paterno" class="form-control" required="required">
                </div>

                <div class="form-group">
                  <label>Apellido Materno</label>
                  <input type="text" name="apellido_materno" class="form-control" required="required">
                </div>

                <!-- Telefono -->
                <div class="form-group">
                  <label>Telefono</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="telefono" class="form-control" required="required" data-inputmask='"mask": "(99) 99-99-99-99"' data-mask>
                  </div>

                </div>
          
                <!-- 
                Ponerle el icono de correo a este input
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" required="required">
                </div> -->

                <div class="form-group">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" name="email" class="form-control" required="required">
                  </div>
                </div> <!-- Cierre del div del grupo del correo electrónico -->
                
                <div class="form-group">
                  <label>Contraseña</label>
                  <input type="password" id="password" name="pass" class="form-control">
                
                  <label>Repetir contraseña</label>
                  <input type="password" id="confirm_password" name="confirm_pass" class="form-control" disabled style="background-color: #e9ecef;">
                
                  <div class="progress mt-2" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>                    
                  </div>
                  <div>
                    <small id="passwordHelpBlock1" class="form-text text-muted"></small>
                    <small id="passwordHelpBlock2" class="form-text text-muted"></small>
                    <small id="passwordHelpBlock3" class="form-text text-muted"></small>
                    <div id="feedback" class="mt-2"></div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Cargos</label>
                  <select name="cargo_id" class="form-control" required>
                    <option value="" selected disabled>Seleccione un cargo</option>
                    <?php
                    $query_cargos = "SELECT id, nombre FROM cargos";
                    $res_cargos = mysqli_query($con, $query_cargos);
                    while ($row_cargo = mysqli_fetch_assoc($res_cargos)) {
                      echo "<option value='" . $row_cargo['id'] . "'>" . $row_cargo['nombre'] . "</option>";
                    }
                    ?>
                  </select>
                </div>

                
                <div class="form-group">
                  <label>Fecha de registro</label>                  
                  <p><?php echo date('Y-m-d H:i:s'); ?></p>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="guardar">Agregar</button>
                </div>
              </form>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <script src="./middleware/img-profile.js"></script>
  <script src="./middleware/ocultar.editcheck.js"></script>
  <script src="./middleware/repeat.text.js"></script>
  <script src="./middleware/strong.view.pwd.js"></script>
</div>