<?php

include_once './models/model.php';
$con = mysqli_connect($host, $user, $password, $db);

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_REQUEST['guardar'])) {
    $email = mysqli_real_escape_string($con, $_REQUEST['email'] ?? '');
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');
    $segundo_nombre = mysqli_real_escape_string($con, $_REQUEST['segundo_nombre'] ?? '');
    $apellido_paterno = mysqli_real_escape_string($con, $_REQUEST['apellido_paterno'] ?? '');
    $apellido_materno = mysqli_real_escape_string($con, $_REQUEST['apellido_materno'] ?? '');
    $telefono = mysqli_real_escape_string($con, $_REQUEST['telefono'] ?? '');
    $fecha_registro = mysqli_real_escape_string($con, $_REQUEST['fecha_registro'] ?? '');
    $cargo_id = mysqli_real_escape_string($con, $_REQUEST['cargo_id'] ?? '');
    $id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');

    /* Unificar nombre completo en una sola variable */
    $nombre_completo = $nombre . ' ' . $segundo_nombre . ' ' . $apellido_paterno . ' ' . $apellido_materno;

    /* Construir la consulta de actualización */
    $query = "UPDATE usuarios SET
        email = '$email', nombre = '$nombre', segundo_nombre = '$segundo_nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', cargo_id = '$cargo_id'";

    /* Solo actualizar la contraseña si se ha ingresado una nueva */
    if (!empty($_REQUEST['pass'])) {
        $pass = md5(mysqli_real_escape_string($con, $_REQUEST['pass']));
        $query .= ", pass = '$pass'";
    }

    /* Validar que se haya subido una imagen */
    if (!empty($_FILES['profileImage']['name'])) {
        $query_prev_image = "SELECT profileImage FROM usuarios WHERE id = '$id'";
        $res_prev_image = mysqli_query($con, $query_prev_image);
        $row_prev_image = mysqli_fetch_assoc($res_prev_image);
        $prevImagePath = $row_prev_image['profileImage'];

        // Guardar la nueva imagen con un nombre aleatorio
        $imageFileType = strtolower(pathinfo($_FILES['profileImage']['name'], PATHINFO_EXTENSION));
        $imageFileName = uniqid() . '.' . $imageFileType;
        $userFolder = sprintf('/opt/lampp/htdocs/AppsFiles/sensihome/cloud/data/users/usr%05d', $id);
        if (!is_dir($userFolder)) {
            if (!mkdir($userFolder, 0777, true)) {
                echo '<div class="alert alert-danger" role="alert">Error al crear el directorio del usuario.</div>';
                return;
            }
        }
        $imageFilePath = $userFolder . '/' . $imageFileName;
        if (!move_uploaded_file($_FILES['profileImage']['tmp_name'], $imageFilePath)) {
            echo '<div class="alert alert-danger" role="alert">Error al subir la imagen.</div>';
            return;
        }

        // Guardar la dirección de la imagen como string
        $profileImage = mysqli_real_escape_string($con, $imageFilePath);
        $query .= ", profileImage = '$profileImage'";

        // Eliminar la imagen previa
        if (file_exists($prevImagePath)) {
            unlink($prevImagePath);
        }
    }

    $query .= " WHERE id = '$id'";

    $res = mysqli_query($con, $query);

    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario ' . $nombre_completo . ' editado exitosamente">';
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
            Error al actualizar el usuario <?php echo mysqli_error($con) ?>
        </div>
        <?php
    }
}

/* Consulta para datos personales */
$id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');
$query = "SELECT id, email, pass, nombre, segundo_nombre, apellido_paterno, apellido_materno, cargo_id, telefono, fecha_registro, profileImage FROM usuarios WHERE id = '$id'";
$res = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($res);

/* Obtener el nombre del cargo */
$cargo_id = $row['cargo_id'];
$query_cargo = "SELECT nombre FROM cargos WHERE id = '$cargo_id'";
$res_cargo = mysqli_query($con, $query_cargo);
$row_cargo = mysqli_fetch_assoc($res_cargo);
$cargo_nombre = $row_cargo['nombre'];

/* Obtener todos los cargos */
$query_cargos = "SELECT id, nombre FROM cargos";
$res_cargos = mysqli_query($con, $query_cargos);

/* Definir nombre completo para mostrar en el formulario */
$nombre_completo = $row['nombre'] . ' ' . $row['segundo_nombre'] . ' ' . $row['apellido_paterno'] . ' ' . $row['apellido_materno'];

/* Obtener la ruta de la imagen de perfil */
$profileImage = $row['profileImage'];

/* Convertir la ruta del sistema de archivos a una URL accesible */
$profileImageUrl = str_replace('/opt/lampp/htdocs/AppsFiles/sensihome/', 'http://localhost/AppsFiles/sensihome/', $profileImage);

?>

<div class="content-wrapper">
    <!--  -->

    <!-- Plugun Mydevgalicia -->
    <link rel="stylesheet" href="./css/user.input.file.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    

    <!-- edit-name-user -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar usuario</h1>
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
                <form action="panel.php?modulo=editarUsuario" method="post">  
                    <div class="form-group">
                      <div class="text-center">
                      <h2>Cargo</h2>

                      <div class="avatar-upload">
                        <div class="avatar-edit">
                          <input type='file' id="imageUpload2" name="profileImage" accept=".png, .jpg, .jpeg"/>
                          <label for="imageUpload2"></label>
                        </div>
                        <div class="avatar-preview">
                          <div id="imagePreview2" style="background-image: url(<?php echo $profileImageUrl ? $profileImageUrl : './dist/img/userAsset.png'; ?>);">
                          </div>
                        </div>
                      </div>

                      <label><?php echo $cargo_nombre; ?></label>
                      </div>
                    
                      <div class="container" id="avatar-edit-sg-2" data-width="192" data-height="192" data-icon="fa-user" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Usuario" data-border-radius="50%"></div>
                    
                    <div class="container text-center">
                      <p><?php echo $nombre_completo ?></p>
                    </div>
                    
                    </div>

                    

              <!-- Datos de indentificacion -->
                    <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre'] ?>" required="required">
                    </div>

                    <div class="form-group">
                      <label>Segundo nombre</label>
                      <input type="checkbox" id="second-name-status" name="second-name-status" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 10px;">
                      <input type="text" id="segundo_nombre" name="segundo_nombre" class="form-control" value="<?php echo $row['segundo_nombre'] ?>" style="display: none;">
                    </div>

                    <div class="form-group">
                        <label>Apellido Paterno</label>
                        <input type="text" name="apellido_paterno" class="form-control" value="<?php echo $row['apellido_paterno'] ?>" required="required">
                    </div>

                    <div class="form-group">
                        <label>Apellido Materno</label>
                        <input type="text" name="apellido_materno" class="form-control" value="<?php echo $row['apellido_materno'] ?>" required="required">
                    </div>

                    <div class="form-group">
                        <label>Telefono</label>
                        <input type="text" name="telefono" class="form-control" value="<?php echo $row['telefono'] ?>" required="required">
                        
                        </div>

                    <div class="form-group">
                        <label>Fecha de registro</label>
                        <!-- aqui solo se ele con un parrafo la fecha de registro -->
                        <p><?php echo $row['fecha_registro'] ?></p>
                        
                    </div>

                    <div class="form-group">
                        <label>Cargo</label>
                        <select name="cargo_id" class="form-control" required="required">
                            <?php while ($row_cargo = mysqli_fetch_assoc($res_cargos)) { ?>
                                <option value="<?php echo $row_cargo['id']; ?>" <?php echo ($row_cargo['id'] == $cargo_id) ? 'selected' : ''; ?>>
                                    <?php echo $row_cargo['nombre']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $row['email'] ?>" required="required">
                    </div>


                    <div class="form-group">
                        <label>Cambiar contraseña</label>
                        <input type="checkbox" id="change-password-status" name="change-password-status" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 10px;">
                        <input type="password" id="password" name="pass" class="form-control" style="display: none;">
                    </div>

                    
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <button type="submit" class="btn btn-primary" name="guardar">Editar</button>
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

    <script src="./middleware/edit-img-user.js"></script>
    <script src="./middleware/ocultar.editcheck.js"></script>
  </div>