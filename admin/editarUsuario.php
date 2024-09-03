<?php

include_once 'db.php';
$con = mysqli_connect($host, $user, $password, $db);

    if( isset($_REQUEST['guardar']) ){
        /* Conexion */


        $email = mysqli_real_escape_string($con, $_REQUEST['email']??'');
        $pass = md5(mysqli_real_escape_string($con, $_REQUEST['pass']??''));
        $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre']??'');
        $id = mysqli_real_escape_string($con, $_REQUEST['id']??'');

        /* Insertar en la tabla */
        $query = "UPDATE usuarios SET
        email = '$email', pass = '$pass', nombre = '$nombre' WHERE id = '$id'";

        $res = mysqli_query($con, $query);

        if ($res) {
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario '.$nombre. ' editado exitosamente">';
        }
        else {
            ?>
            <div class="alert alert-danger" role="alert">
                Error al crear el usuario <?php echo mysqli_error($con)?>
            </div>
            <?php
        }        
    }
    $id= mysqli_real_escape_string($con, $_REQUEST['id']??'');
    $query = "SELECT id, email, pass, nombre FROM usuarios WHERE id = '$id'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($res);

?>


<div class="content-wrapper">
    <!--  -->

    <link rel="stylesheet" href="../inputs-files.css">
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    


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
                    <div class="container" id="avatar-edit-sg-1" data-width="80%" data-height="50vh" data-icon="fa-user" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Usuario" data-border-radius="15px"></div>
                      
                    </div>
                
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $row['email'] ?>" required="required">
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="pass" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre'] ?>" required="required">
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

    <script src="../inputs-files.js"></script>
  </div>



  