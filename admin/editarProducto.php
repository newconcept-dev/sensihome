<link rel="stylesheet" href="../inputs-files.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="./agregarProducto.css"> -->


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editando producto N</h1>
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
              <form id="formValidated" action="panel.php?modulo=crearUsuario" method="post">
                <div class="row ">
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="">
                        <h2>Información del producto</h2>
                        
                      </div>
                      <div class="container" id="upload-product-img-sg-1" data-width="100%" data-height="300" data-icon="fa-image" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Producto" data-border-radius="5px"></div>
                    </div>

                    <div class="form-group">
                      <label>Nombre del producto</label>
                      <input type="text" name="nombre" class="form-control" required="required">
                    </div>


                    <div class="form-group">
                      <div id="category-input-main">
                        <label>Categoria</label>
                        <select name="cargo_id" class="form-control" required>
                          <option value="" selected disabled>Selecciona el tipo de producto</option>
                          <option value="1">Opción 1</option>
                          <option value="2">Opción 2</option>
                          <option value="3">Opción 3</option>
                        </select>
                      </div>

                      <div class="form-group d-flex align-items-center">
                        <small class="toggle-color">¿Desea añadir otra categoria?</small>
                        <input type="checkbox" id="hidden-category" name="hidden-category" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 10px;">
                      </div>

                      <div id="category-container">
                        <div class="form-group">
                          <label>Nombre de la categoria</label>
                          <input type="text" name="nombre" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Darle promoción a este producto</label>
                      <div><input type="checkbox" name="my-checkbox" unchecked data-bootstrap-switch></div>
                    </div>

                    <div class="form-group">
                      <label>En venta</label>
                      <div><input type="checkbox" name="my-checkbox" unchecked data-bootstrap-switch></div>
                    </div>

                    <div class="form-group">
                      <label>Descripción</label>
                      <textarea name="descripcion" class="form-control" required="required"></textarea>
                    </div>

                    <div class="form-group">
                      <div id="type-input-main">
                        <label>Tipo de producto</label>
                        <select class="form-control">
                          <option value="" selected disabled>Selecciona el tipo de producto</option>
                          <option value="1">v1</option>
                          <option value="2">v2</option>
                        </select>
                      </div>

                      <div class="form-group d-flex align-items-center">
                        <small class="label-type-product">¿Desea añadir otro tipo de producto?</small>
                        <input type="checkbox" id="hidden-type-product" name="hidden-type-product" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 10px;">
                      </div>

                      <div id="type-product-container" style="display: none;">
                        <div class="form-group">
                          <label>Nombre del tipo de producto</label>
                          <input type="text" name="nombre" class="form-control">
                        </div>
                      </div>
                    </div>



                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                      <label>Color</label>
                      <div id="color-select-main">
                        <div class="input-group">
                          <select class="form-control">
                            <option value="" selected disabled>Selecciona el tipo de medida</option>
                            <option value="1">v1</option>
                            <option value="2">v2</option>
                          </select>
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-square"></i></span>
                          </div>
                        </div>

                        <div class="form-group d-flex align-items-center">
                          <small class="label-color-select">¿Desea añadir otra color?</small>
                          <input type="checkbox" id="hidden-color-select" name="hidden-color-select" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 10px;">
                        </div>

                        <div id="color-container">
                          <div class="form-group">
                            <label>Color nuevo</label>
                            <input type="text" name="nombre" class="form-control">
                          </div>
                        </div>                 

                      </div>
                    </div>
                    
                  <div class="form-group">
                            <label>Materiales</label>
                        
                            <div class="form-group"> <!-- Relleno -->
                                <div class="row align-items-center">
                                    <div class="col-md-2 col-6">
                                        <p class="mb-0">Relleno</p>
                                    </div>
                                    <div class="col-md-4 col-6 text-md-right d-flex align-items-center justify-content-between">
                                        <small class="d-inline-block text-truncate" style="max-width: 100%;">¿Desea añadir otra relleno?</small>
                                        <input type="checkbox" id="material-relleno-input" name="material-relleno-input" class="form-control ml-2" style="height: auto; width: auto;">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <select id="relleno-selector" class="form-control select2bs4 w-100">
                                            <option value="" selected disabled>Busca el relleno</option>
                                            <option>V1</option>
                                        </select>
                                    </div>
                                </div>
                        
                                <div id="relleno-container" class="mt-2" style="display: none;"> <!-- Aqui lo que se oculta -->
                                    <div class="form-group d-flex align-items-center">
                                        <p id="text-nuevo-relleno" class="mb-0 mr-2" style="white-space: nowrap;">Nuevo relleno:</p>
                                        <input id="nuevo-relleno" type="text" name="nuevo-relleno-input" class="form-control flex-grow-1">
                                    </div>
                                </div>
                            </div> <!-- Fin de relleno -->
                        
                            <div class="form-group"> <!-- Madera -->
                                <div class="row align-items-center">
                                    <div class="col-md-2 col-6">
                                        <p class="mb-0">Madera</p>
                                    </div>
                                    <div class="col-md-4 col-6 text-md-right d-flex align-items-center justify-content-between">
                                        <small class="d-inline-block text-truncate" style="max-width: 100%;">¿Desea añadir otra madera?</small>
                                        <input type="checkbox" id="material-madera-input" name="material-madera-input" class="form-control ml-2" style="height: auto; width: auto;">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <select id="madera-selector" class="form-control select2bs4 w-100">
                                            <option value="" selected disabled>Busca la madera</option>
                                            <option>V1</option>
                                        </select>
                                    </div>
                                </div>
                        
                                <div id="madera-container" class="mt-2" style="display: none;"> <!-- Aqui lo que se oculta -->
                                    <div class="form-group d-flex align-items-center">
                                        <p id="text-nueva-madera" class="mb-0 mr-2" style="white-space: nowrap;">Nueva madera:</p>
                                        <input id="nueva-madera" type="text" name="nueva-madera-input" class="form-control flex-grow-1">
                                    </div>
                                </div>
                            </div> <!-- Fin de madera -->
                        
                            <div class="form-group"> <!-- Patas -->
                                <div class="row align-items-center">
                                    <div class="col-md-2 col-6">
                                        <p class="mb-0">Patas</p>
                                    </div>
                                    <div class="col-md-4 col-6 text-md-right d-flex align-items-center justify-content-between">
                                        <small class="d-inline-block text-truncate" style="max-width: 100%;">¿Desea añadir otra pata?</small>
                                        <input type="checkbox" id="material-patas-input" name="material-patas-input" class="form-control ml-2" style="height: auto; width: auto;">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <select id="patas-selector" class="form-control select2bs4 w-100">
                                            <option value="" selected disabled>Busca la pata</option>
                                            <option>V1</option>
                                        </select>
                                    </div>
                                </div>
                        
                                <div id="patas-container" class="mt-2" style="display: none;"> <!-- Aqui lo que se oculta -->
                                    <div class="form-group d-flex align-items-center">
                                        <p id="text-nueva-pata" class="mb-0 mr-2" style="white-space: nowrap;">Nueva pata:</p>
                                        <input id="nueva-pata" type="text" name="nueva-pata-input" class="form-control flex-grow-1">
                                    </div>
                                </div>
                            </div> <!-- Fin de patas -->
                        
                            <div class="form-group"> <!-- Telas -->
                                <div class="row align-items-center">
                                    <div class="col-md-2 col-6">
                                        <p class="mb-0">Telas</p>
                                    </div>
                                    <div class="col-md-4 col-6 text-md-right d-flex align-items-center justify-content-between">
                                        <small class="d-inline-block text-truncate" style="max-width: 100%;">¿Desea añadir otra tela?</small>
                                        <input type="checkbox" id="material-telas-input" name="material-telas-input" class="form-control ml-2" style="height: auto; width: auto;">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="input-group">
                                            <select id="telas-selector" class="form-control select2bs4">
                                                <option value="" selected disabled>Busca la tela</option>
                                                <option>V1</option>
                                            </select>
                                            <div class="input-group-append">
                                                <span class="input-group-text p-0">
                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSK_i51UEwk-sYPTgLpK4Ok87gZTUrhqTrtxQ&s" alt="" class="img-fluid zoom" style="height: 38px; border-radius: 0 5px 5px 0;">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <div id="telas-container" class="mt-2" style="display: none;"> <!-- Aqui lo que se oculta -->
                                    <div class="form-group d-flex align-items-center">
                                        <p id="text-nueva-tela" class="mb-0 mr-2" style="white-space: nowrap;">Nueva tela:</p>
                                        <input id="nueva-tela" type="text" name="nueva-tela-input" class="form-control flex-grow-1">
                                    </div>

                                    <div class="form-group">                                                                                          
                                        <div class="container mt-0" id="upload-tela-img-sg-1" data-width="100%" data-height="300" data-icon="fa-image" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Añadir imagen de la tela" data-border-radius="5px"></div>
                                    </div>

                                    <div class="form-group text-center">
                                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#cameraModal">
                                            <!-- icono de camara -->
                                            Tomar foto <i class="fas fa-camera"></i>
                                        </button>
                                    </div>
                                 
                                    
                                </div>
                            </div> <!-- Fin de telas -->
                        
                        </div> <!-- Fin de formulario de materiales -->     

                    <div class="form-group">
                      <label>Medidas</label>
                      <input type="checkbox" id="measures-inputs" name="measures-inputs" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 10px;">

                      <!-- Contenedor para los inputs -->
                      <div id="medidas-container">
                        <!-- Largos -->
                        <div class="form-group">
                          <label>Largo</label>
                          <div class="input-group">
                            <input type="number" name="largo" class="form-control input-change">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <small class="mr-2">Cm</small>
                                <i class="fas fa-ruler icon-color-change"></i>
                              </span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Largo asiento</label>
                          <div class="input-group">
                            <input type="number" name="largo-asiento" class="form-control input-change">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <small class="mr-2">Cm</small>
                                <i class="fas fa-ruler icon-color-change"></i>
                              </span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Fondo</label>
                          <div class="input-group">
                            <input type="number" name="fondo" class="form-control input-change">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <small class="mr-2">Cm</small>
                                <i class="fas fa-ruler icon-color-change"></i>
                              </span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Fondo del asiento</label>
                          <div class="input-group">
                            <input type="number" name="fondo-asiento" class="form-control input-change">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <small class="mr-2">Cm</small>
                                <i class="fas fa-ruler icon-color-change"></i>
                              </span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Ancho del Brazo</label>
                          <div class="input-group">
                            <input type="number" name="ancho-brazo" class="form-control input-change">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <small class="mr-2">Cm</small>
                                <i class="fas fa-ruler icon-color-change"></i>
                              </span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Ancho del respaldo</label>
                          <div class="input-group">
                            <input type="number" name="ancho-respaldo" class="form-control input-change">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <small class="mr-2">Cm</small>
                                <i class="fas fa-ruler icon-color-change"></i>
                              </span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Altura</label>
                          <div class="input-group">
                            <input type="number" name="altura" class="form-control input-change">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <small class="mr-2">Cm</small>
                                <i class="fas fa-ruler icon-color-change"></i>
                              </span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Altura al casco</label>
                          <div class="input-group">
                            <input type="number" name="altura-casco" class="form-control input-change">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <small class="mr-2">Cm</small>
                                <i class="fas fa-ruler icon-color-change"></i>
                              </span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Altura al brazo</label>
                          <div class="input-group">
                            <input type="number" name="altura-brazo" class="form-control input-change">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <small class="mr-2">Cm</small>
                                <i class="fas fa-ruler icon-color-change"></i>
                              </span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Altura al asiento</label>
                          <div class="input-group">
                            <input type="number" name="altura-asiento" class="form-control input-change">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <small class="mr-2">Cm</small>
                                <i class="fas fa-ruler icon-color-change"></i>
                              </span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Altura a la pata</label>
                          <div class="input-group">
                            <input type="number" name="altura-casco" class="form-control input-change">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <small class="mr-2">Cm</small>
                                <i class="fas fa-ruler icon-color-change"></i>
                              </span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Altura al respaldo</label>
                          <div class="input-group">
                            <input type="number" name="altura-respaldo" class="form-control input-change">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <small class="mr-2">Cm</small>
                                <i class="fas fa-ruler icon-color-change"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Peso</label>
                      <input type="number" name="alto" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>¿Tiene accesorios?</label>
                      <input type="checkbox" id="plugins-inputs" name="plugins-inputs" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 10px;">
                    </div>

                    <div id="plugins-inputs-container">
                      <div class="form-group">
                        <label>Tipo de accesorio</label>
                        <select id="tela" class="form-control select2bs4 ml-3" style="width: 100%;">
                          <option value="" selected disabled>Seleccion el accesorio</option>
                          <option>V1</option>
                        </select>
                      </div>
t
                      <div class="form-group">
                        <label>¿Cuantos accesorios serán?</label>
                        <input type="number" name="accesorios" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Precio compra</label>
                      <div class="input-group">
                        <input type="number" name="precio" class="form-control">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Precio Venta</label>
                      <div class="input-group">
                        <input type="number" name="precio" class="form-control">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Proveedor</label>
                      <select id="provedor" class="form-control select2bs4" style="width: 100%;">
                        <option value="" selected disabled>Selecciona el proveedor</option>
                        <option value="1">V1</option>
                        <option value="2">V2</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Fecha de compra</label>
                      <input type="date" name="fecha_compra" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Garantía</label>
                      <input type="text" name="garantia" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Fecha de registro</label>
                      <p><?php echo date('Y-m-d H:i:s'); ?></p>
                    </div>
                  
                  </div>

                  <div class="col-md-4">
                    <!-- Div con bordes 100% del ancho y 60vh de alto -->
                        <div class="d-flex flex-column justify-content-center align-items-center" style="padding: 1em;">
                      <!-- Contenido del div -->
                      <div id="phone-view-1" data-src="http://localhost/sensi/view.e.html" class="d-none d-md-block" style="width: 70%; height: 100%;"></div>
                      <button type="submit" class="btn btn-primary btn-smg mt-0 mt-md-3" name="guardar">Agregar producto</button>
                      <!-- C:\xampp\htdocs\sensi\view.e.html -->
                    </div>

                    
                  </div>


                
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    <!-- Modal para tomar fotos -->
    <div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="cameraModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="cameraModalLabel">Añadiendo tela</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body p-0">
            <div class="video-container w-100 h-100">
              <video id="video" class="w-100 h-100" autoplay></video>
            </div>
            <canvas id="canvas" style="display: none;"></canvas>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="capture">Tomar Foto</button>
          </div>
        </div>
      </div>
    </div>


  </section>

  <script src="./middleware/hidden.material.form.js"></script>
  <script src="./middleware/hidden.select.color.js"></script>
  <script src="./middleware/hidden.measures.js"></script>
  <script src="../inputs-files.js"></script>
  
  <!-- <script src="./middleware/repeat.text.js"></script> -->
  <script src="./middleware/strong.view.pwd.js"></script>
  <script src="./middleware/change.Icons.colors.js"></script>
  <script src="./middleware/hidden.plugins.js"></script>
  <script src="./middleware/hidden.category.js"></script>
  <script src="./middleware/hidden.type.product.js"></script>

  <!-- modal de la camara -->
  <script src="./middleware/modal.cam.js"></script>
</div>