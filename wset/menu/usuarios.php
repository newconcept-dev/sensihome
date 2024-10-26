<?php
// usuarios.php
include_once 'models/model.php';

if (isset($_REQUEST['idBorrar'])) {
    include_once './utils/delete_user.php';
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones
                        <a href="panel.php?modulo=crearUsuario"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </th>                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php include './utils/fetch_users.php'; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>