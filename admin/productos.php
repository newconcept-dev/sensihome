<link rel="stylesheet" href="../inputs-files.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Agregar producto</h1>
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
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="">
                        <h2>Información del producto</h2>
                          
                        <div class="container" id="avatar-edit-sg-1" data-width="192" data-height="192" data-icon="fa-user" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Usuario" data-border-radius="50%"></div>
    <div class="container" id="avatar-edit-sg-2" data-width="192" data-height="192" data-icon="fa-user" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Usuario" data-border-radius="50%"></div>
    <div class="container" id="avatar-edit-sg-3" data-width="192" data-height="192" data-icon="fa-user" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Usuario" data-border-radius="50%"></div>
    
    <div class="container" id="upload-product-img-sg-2" data-width="350" data-height="350" data-icon="fa-image" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Producto" data-border-radius="5px"></div>
    <div class="container" id="upload-file-sg" data-width="250" data-height="250" data-icon="fa-file" data-accept=".pdf, .doc, .docx, .xls, .xlsx" data-valid-types="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" data-text="Archivo" data-border-radius="5px"></div>
    <div class="container" id="upload-video-sg" data-width="350" data-height="350" data-icon="fa-video-camera" data-accept=".mp4, .avi, .mov" data-valid-types="video/mp4, video/x-msvideo, video/quicktime" data-text="Video" data-border-radius="20px"></div>
    <div class="container" id="upload-doc-sg" data-width="250" data-height="250" data-icon="fa-file-text" data-accept=".pdf, .doc, .docx" data-valid-types="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" data-text="Documento" data-border-radius="15px"></div> 
    <!-- Add more containers as needed -->

    <div style="display: grid;
                grid-template-columns: .5fr .5fr .5fr;">
        <div class="container" id="upload-product-img-sg-1" data-width="350" data-height="350" data-icon="fa-image" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Producto" data-border-radius="5px"></div>
        <div class="container" id="upload-product-img-sg-1" data-width="350" data-height="350" data-icon="fa-image" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Producto" data-border-radius="5px"></div>
        <div class="container" id="upload-product-img-sg-1" data-width="350" data-height="350" data-icon="fa-image" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Producto" data-border-radius="5px"></div>
    </div>
                      </div>
                      <div class="container" id="upload-product-img-sg-1" data-width="100%" data-height="300" data-icon="fa-image" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Producto" data-border-radius="5px"></div>
                    </div>

                    <div  class="form-group">
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
                    
                      <!-- Grupo de Relleno -->
                      <div class="form-group">
                        <div class="d-flex align-items-center justify-content-between">
                          <p for="relleno" class="mb-0">Relleno</p>
                          <div class="d-flex align-items-center" style="width: 80%;">
                            <select id="relleno" class="form-control select2bs4" style="flex: 1;">
                              <option value="" selected disabled>Busca el relleno</option>
                              <option>V1</option>
                            </select>
                          </div>
                        </div>
                    
                        <!-- Nueva fila -->
                        <div>
                          <!-- cositas -->
                          <div class="form-group d-flex align-items-center mt-3">
                            <small class="toggle-color">¿Desea añadir otra relleno?</small>
                            <input type="checkbox" id="hidden-category" name="hidden-category" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 5px;">
                            
                            <div id="category-container" class="d-flex align-items-center ml-3 flex-grow-1">
                              <label class="mb-0 mr-2" style="white-space: nowrap;">Nuevo relleno:</label>
                              <input type="text" name="nombre" class="form-control flex-grow-1">
                            </div>
                          </div>
                        </div>
                      </div>
                    
                      <!-- Grupo de Madera -->
                      <div class="form-group">
                        <div class="d-flex align-items-center justify-content-between">
                          <p for="madera" class="mb-0">Madera</p>
                          <div class="d-flex align-items-center" style="width: 80%;">
                            <select id="madera" class="form-control select2bs4" style="flex: 1;">
                              <option value="" selected disabled>Busca la madera</option>
                              <option>V1</option>
                            </select>
                          </div>
                        </div>
                    
                        <!-- Nueva fila -->
                        <div>
                          <!-- cositas -->
                          <div class="form-group d-flex align-items-center mt-3">
                            <small class="toggle-color">¿Desea añadir otra madera?</small>
                            <input type="checkbox" id="hidden-madera" name="hidden-madera" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 5px;">
                            
                            <div id="madera-container" class="d-flex align-items-center ml-3 flex-grow-1">
                              <label class="mb-0 mr-2" style="white-space: nowrap;">Nueva madera:</label>
                              <input type="text" name="nombre_madera" class="form-control flex-grow-1">
                            </div>
                          </div>
                        </div>
                      </div>
                    
                      <!-- Grupo de Patas -->
                      <div class="form-group">
                        <div class="d-flex align-items-center justify-content-between">
                          <p for="patas" class="mb-0">Patas</p>
                          <div class="d-flex align-items-center" style="width: 80%;">
                            <select id="patas" class="form-control select2bs4" style="flex: 1;">
                              <option value="" selected disabled>Busca las patas</option>
                              <option>V1</option>
                            </select>
                          </div>
                        </div>
                    
                        <!-- Nueva fila -->
                        <div>
                          <!-- cositas -->
                          <div class="form-group d-flex align-items-center mt-3">
                            <small class="toggle-color">¿Desea añadir otras patas?</small>
                            <input type="checkbox" id="hidden-patas" name="hidden-patas" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 5px;">
                            
                            <div id="patas-container" class="d-flex align-items-center ml-3 flex-grow-1">
                              <label class="mb-0 mr-2" style="white-space: nowrap;">Nuevas patas:</label>
                              <input type="text" name="nombre_patas" class="form-control flex-grow-1">
                            </div>
                          </div>
                        </div>
                      </div>
                    
                      <!-- Grupo de Telas -->
                      <div class="form-group">
                        <div class="d-flex align-items-center justify-content-between">
                          <p for="telas" class="mb-0">Telas</p>
                          <div class="d-flex align-items-center" style="width: 80%;">
                            <select id="telas" class="form-control select2bs4" style="flex: 1;">
                              <option value="" selected disabled>Busca las telas</option>
                              <option>V1</option>
                            </select>
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSK_i51UEwk-sYPTgLpK4Ok87gZTUrhqTrtxQ&s" alt="" class="img-fluid zoom" style="height: 38px; border-radius: 0 5px 5px 0;">
                          </div>
                        </div>
                    
                        <!-- Nueva fila -->
                        <div>
                          <!-- cositas -->
                          <div class="form-group d-flex align-items-center mt-3">
                            <small class="toggle-color">¿Desea añadir otras telas?</small>
                            <input type="checkbox" id="hidden-telas" name="hidden-telas" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 5px;">
                            
                            <div id="telas-container" class="d-flex align-items-center ml-3 flex-grow-1">
                              <label class="mb-0 mr-2" style="white-space: nowrap;">Nuevas telas:</label>
                              <input type="text" name="nombre_telas" class="form-control flex-grow-1">
                            </div>
                          </div>
                                                                          
                          <div class="container" id="upload-product-img-sg-2" data-width="100%" data-height="300" data-icon="fa-image" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Producto" data-border-radius="5px"></div>
                        </div>

                      </div>
                    </div>


                  </div>

                  <div class="col-md-6">

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

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" name="guardar">Agregar</button>
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
  </section>

  <script src="./middleware/hidden.select.color.js"></script>
  <script src="./middleware/hidden.measures.js"></script>
  <script src="../inputs-files.js"></script>
  <script src="./middleware/ocultar.editcheck.js"></script>
  <!-- <script src="./middleware/repeat.text.js"></script> -->
  <script src="./middleware/strong.view.pwd.js"></script>
  <script src="./middleware/change.Icons.colors.js"></script>
  <script src="./middleware/hidden.plugins.js"></script>
  <script src="./middleware/hidden.category.js"></script>
  <script src="./middleware/hidden.type.product.js"></script>
  <!-- category-hiden -->
</div>