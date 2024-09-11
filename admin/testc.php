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
                                        <button class="mode-switch" title="Switch Theme">
                                            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                                                <defs></defs>
                                                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                                            </svg>
                                        </button>
                                        <button class="app-content-headerButton">Agregar producto</button>
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
                                                    <label>Categorias</label>
                                                    <select>
                                                        <option>Todas las categorias</option>
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

                                            <div class="product-cell category">Tipo
                                                <button class="sort-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="product-cell category">color
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

                                            <div class="product-cell sales">Ventas
                                                <button class="sort-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="product-cell stock">Stock
                                                <button class="sort-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="product-cell price">Precio
                                                <button class="sort-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>

                                        </div>

                                        <!-- Aqui se llenan los productos -->
                                        <div class="products-row">
                                            <button class="cell-more-button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1" />
                                                    <circle cx="12" cy="5" r="1" />
                                                    <circle cx="12" cy="19" r="1" />
                                                </svg>
                                            </button>
                                            <div class="product-cell image">
                                                <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="product">
                                                <span>Producto 1</span>
                                            </div>


                                            <div class="product-cell category"><span class="cell-label">Categoria</span>Cat1</div>
                                            <div class="product-cell category"><span class="cell-label">Tipo</span>3-2-1</div>
                                            <div class="product-cell category"><span class="cell-label">Color</span>Verde</div>
                                            <div class="product-cell status-cell">
                                                <span class="cell-label">Status:</span>
                                                <span class="status active">Activo</span>
                                            </div>

                                            <div class="product-cell sales"><span class="cell-label">Ventas:</span>11</div>
                                            <div class="product-cell stock"><span class="cell-label">Stock:</span>36</div>
                                            <div class="product-cell price"><span class="cell-label">Precio:</span>$560</div>
                                        </div>

                                        <div class="products-row">
                                            <button class="cell-more-button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1" />
                                                    <circle cx="12" cy="5" r="1" />
                                                    <circle cx="12" cy="19" r="1" />
                                                </svg>
                                            </button>
                                            <div class="product-cell image">
                                                <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="product">
                                                <span>Producto 1</span>
                                            </div>


                                            <div class="product-cell category"><span class="cell-label">Categoria</span>Cat1</div>
                                            <div class="product-cell category"><span class="cell-label">Tipo</span>3-2-1</div>
                                            <div class="product-cell category"><span class="cell-label">Color</span><span class="color">Amarillo</span></div>
                                            <div class="product-cell status-cell">
                                                <span class="cell-label">Status:</span>
                                                <span class="status disabled">Inactivo</span>
                                            </div>

                                            <div class="product-cell sales"><span class="cell-label">Ventas:</span>11</div>
                                            <div class="product-cell stock"><span class="cell-label">Stock:</span>36</div>
                                            <div class="product-cell price"><span class="cell-label">Precio:</span>$560</div>
                                        </div>

                                        <!--  -->



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