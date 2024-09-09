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
                      </div>
                      <div class="container" id="upload-product-img-sg-1" data-width="100%" data-height="300" data-icon="fa-image" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Producto" data-border-radius="5px"></div>
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

  <script src="./middleware/hidden.material.form.js"></script>
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
</div>