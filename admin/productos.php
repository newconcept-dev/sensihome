<?php
include_once "db.php";

$sqlQuery = "
    SELECT 
        p.id, 
        p.nombre_producto, 
        p.descripcion, 
        p.precio, 
        p.existencia, 
        c.nombre AS categoria_nombre, 
        p.precioVenta, 
        p.garantia, 
        pr.nombre AS proveedor_nombre, 
        p.color_id, 
        p.status, 
        p.promocionar, 
        p.FechaRegistro,
        img.ruta AS imagen_ruta,
        col.nombre AS color_nombre,
        col.hex_color AS color_hex
    FROM 
        productos p
    LEFT JOIN 
        categorias c ON p.categoria_id = c.id
    LEFT JOIN 
        proveedores pr ON p.proveedor_id = pr.id
    LEFT JOIN 
        imagenes_productos img ON p.id = img.producto_id AND img.frontend_id LIKE 'front%'
    LEFT JOIN 
        color col ON p.color_id = col.id
";
$queryResult = $con->query($sqlQuery);

$productos = array();
while($row = $queryResult->fetch_assoc()) {
    $productos[] = $row;
}
?>

<!-- Estilos propios -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./productos.css">



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Productos</h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="app-container">

                                <div class="app-content">
                                    <div class="app-content-header">
                                        <h1 class="app-content-headerText">Listado de invetario</h1>

                                        <div class="form-group">
                                        <a class="btn btn-primary btn-smg mt-0 mt-md-3" href="panel.php?modulo=agregarProductos">Agregar producto <span class="fa fa-plus"></span></a>
                                        </div>
                                        
                                    </div>

                                    <div class="app-content-actions">
                                        <input class="search-bar" placeholder="Search..." type="text">
                                        <div class="app-content-actions-wrapper">
                                            <div class="filter-button-wrapper">
                                                <button class="action-button filter jsFilter"><span>Filtrar</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter">
                                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                                                    </svg>
                                                </button>
                                                <div class="filter-menu">
                                                    <label>Provedor</label>
                                                    <select>
                                                        <option>cat</option>
                                                        <option>Cat1</option>
                                                        <option>Cat2</option>
                                                        <option>Cat3</option>
                                                        <option>Cat4</option>
                                                    </select>
                                                    <label>Status</label>
                                                    <select>
                                                        <option></option>
                                                        <option>Activo</option>
                                                        <option>Descontinuado</option>
                                                    </select>
                                                    <div class="filter-menu-buttons">
                                                        <button class="filter-button reset">
                                                            Quitar filtro
                                                        </button>
                                                        <button class="filter-button apply">
                                                            Aplicar filtro
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="action-button list active" title="List View">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                                                    <line x1="8" y1="6" x2="21" y2="6" />
                                                    <line x1="8" y1="12" x2="21" y2="12" />
                                                    <line x1="8" y1="18" x2="21" y2="18" />
                                                    <line x1="3" y1="6" x2="3.01" y2="6" />
                                                    <line x1="3" y1="12" x2="3.01" y2="12" />
                                                    <line x1="3" y1="18" x2="3.01" y2="18" />
                                                </svg>
                                            </button>
                                            <button class="action-button grid" title="Grid View">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                                                    <rect x="3" y="3" width="7" height="7" />
                                                    <rect x="14" y="3" width="7" height="7" />
                                                    <rect x="14" y="14" width="7" height="7" />
                                                    <rect x="3" y="14" width="7" height="7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="products-area-wrapper tableView">

                                        <!-- Para agregar columnas -->
                                        <div class="products-header">
                                            
                                        <div class="product-cell image">
                                                Nombre
                                                <button class="sort-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>



                                            <div class="product-cell category">Categoria
                                                <button class="sort-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="product-cell category">Existencia
                                                <button class="sort-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="product-cell category">Precio
                                                <button class="sort-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="product-cell status-cell">Status
                                                <button class="sort-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="product-cell sales">Promocion
                                                <button class="sort-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="product-cell sales">Color
                                                <button class="sort-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="product-cell stock">Proovedor
                                                <button class="sort-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="product-cell price">Fecha de compra
                                                <button class="sort-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>

                                        </div>

                                        <!-- Aqui se llenan los productos -->
                                        
                                        <?php foreach ($productos as $producto): ?>
                                            <div class="products-row" onclick="window.location.href='panel.php?modulo=editarProducto&id=<?php echo $producto['id']; ?>';">
                                                <button class="cell-more-button">
                                                    <!-- Aqui va algo ahorita lo pongo -->
                                                </button>
                                                <div class="product-cell image">
                                                    <img src="<?php echo htmlspecialchars($producto['imagen_ruta']); ?>" alt="⚙️">
                                                    <span><?php echo htmlspecialchars($producto['nombre_producto']); ?></span>
                                                </div>
                                                <div class="product-cell category"><span class="cell-label">Categoria:</span><?php echo htmlspecialchars($producto['categoria_nombre']); ?></div>
                                                <div class="product-cell category"><span class="cell-label">Existencia:</span><?php echo htmlspecialchars($producto['existencia']); ?></div>
                                                <div class="product-cell category"><span class="cell-label">Precio:</span>$<?php echo number_format($producto['precioVenta'], 0, '.', ','); ?></div>
                                                <div class="product-cell status-cell">
                                                    <span class="cell-label">Status:</span>
                                                    <span class="status <?php echo $producto['status'] == 'ENV' ? 'active' : ($producto['status'] == 'INA' ? 'inactive' : ''); ?>">
                                                        <?php echo htmlspecialchars($producto['status']); ?>
                                                    </span>
                                                </div>
                                                <div class="product-cell sales"><span class="cell-label">Promocion:</span><?php echo htmlspecialchars($producto['promocionar']); ?></div>
                                                <div class="product-cell stock"><span class="cell-label">Proveedor:</span><?php echo htmlspecialchars($producto['proveedor_nombre']); ?></div>
                                                <div class="product-cell"><span class="cell-label">Color:</span><i class="fa fa-square" style="color: <?php echo htmlspecialchars($producto['color_hex']); ?>; padding-right: 2px"></i><span ><?php echo htmlspecialchars($producto['color_nombre']); ?> </span></div>
                                                <div class="product-cell price"><span class="cell-label">Fecha de compra:</span><?php echo htmlspecialchars($producto['FechaRegistro']); ?></div>
                                            </div>
                                        <?php endforeach; ?>



                                    </div>
                                </div>
                            </div>


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

    <!-- Scripts -->
    <script src="./middleware/list.products.js"></script>
    <!-- category-hiden -->
</div>