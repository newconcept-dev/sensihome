<?php
    if( isset($_REQUEST['guardar']) ){
        /* Conexion */
        include_once 'db.php';
        $con = mysqli_connect($host, $user, $password, $db);

        $email = mysqli_real_escape_string($con, $_REQUEST['email']??'');
        $pass = md5(mysqli_real_escape_string($con, $_REQUEST['pass']??''));
        $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre']??'');

        /* Insertar en la tabla */
        $query = "INSERT INTO usuarios (email, pass, nombre) VALUES ('$email', '$pass', '$nombre')";

        $res = mysqli_query($con, $query);

        if ($res) {
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario creado exitosamente">';
        }
        else {
            ?>
            <div class="alert alert-danger" role="alert">
                Error al crear el usuario <?php echo mysqli_error($con)?>
            </div>
            <?php
        }        
    }
?>
<link rel="stylesheet" href="../inputs-files.css">
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
                <form action="panel.php?modulo=crearUsuario" method="post">
                    
                <div class="form-group">
                      <div class="text-center">
                      <h2>Asignar cargo</h2>
                      <label><?php echo $cargo_nombre; ?></label>
                      </div>
                    
                      <div class="container" id="avatar-edit-sg-2" data-width="192" data-height="192" data-icon="fa-user" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Usuario" data-border-radius="50%"></div>
                    
                    <div class="container text-center">
                      <p><?php echo $nombre_completo ?></p>
                    </div>                                    
                    </div>

                    <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control"  required="required">
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
    <script src="../inputs-files.js"></script>
    <script src="./middleware/ocultar.editcheck.js"></script>
  </div>