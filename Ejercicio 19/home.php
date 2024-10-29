<?php

require 'App/ProductController.php';

$products = json_decode(ProductController::getProducts(), true)['data'];

if (isset($_GET['error'])) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = new bootstrap.Modal(document.getElementById('addProductModal'));
            modal.show();
        });
    </script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Productos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-4">
        <div class="row">

            <div class="col-md-3">
                <div class="list-group">
                    <a href="home.html" class="list-group-item list-group-item-action active">Productos</a>
                    <a href="detalles-productos.html" class="list-group-item list-group-item-action">Detalle de Productos</a>
                    <a href="#" class="list-group-item list-group-item-action">Categoría 3</a>
                    <a href="#" class="list-group-item list-group-item-action">Categoría 4</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-12 pb-4 pe-4 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                            Añadir Producto
                        </button>
                    </div>

                    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProductModalLabel">Añadir Nuevo Producto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="App/ProductController.php" method="POST">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Nombre del Producto</label>
                                            <input type="text" name="name" class="form-control" id="productName" placeholder="Ingresa el nombre del producto">
                                        </div>
                                        <div class="mb-3">
                                            <label for="slugName" class="form-label">Slug</label>
                                            <input type="text" name="slug" class="form-control" id="slugName" placeholder="Slug">
                                        </div>
                                        <div class="mb-3">
                                            <label for="productDescription" class="form-label">Descripción</label>
                                            <textarea class="form-control" name="description" id="productDescription" rows="3" placeholder="Añade una descripción"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productFeatures" class="form-label">Features</label>
                                            <textarea class="form-control" name="features" id="productFeatures" rows="3" placeholder="Añade un feature"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productImage" class="form-label">Imagen del Producto</label>
                                            <input type="file" name="image" class="form-control" id="productImage">
                                        </div>

                                        <input type="hidden" name="action" value="create">
                                        <button type="submit" class="btn btn-success">Añadir Producto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProductModalLabel">Editar Producto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Nombre del Producto</label>
                                            <input type="text" class="form-control" id="productName" placeholder="Nombre del producto">
                                        </div>
                                        <div class="mb-3">
                                            <label for="productPrice" class="form-label">Precio</label>
                                            <input type="number" class="form-control" id="productPrice" placeholder="Precio">
                                        </div>
                                        <div class="mb-3">
                                            <label for="productDescription" class="form-label">Descripción</label>
                                            <textarea class="form-control" id="productDescription" rows="3" placeholder="Descripción"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productImage" class="form-label">Imagen del Producto</label>
                                            <input type="file" class="form-control" id="productImage">
                                        </div>
                                        <button type="submit" class="btn btn-success">Editar Producto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="productDeletedModal" tabindex="-1" aria-labelledby="productDeletedModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productDeletedModalLabel">Producto Eliminado</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>El producto ha sido eliminado exitosamente.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">

                    <?php foreach ($products as $product) : ?>
                        <div class="col">
                            <div class="card">
                                <img src="<?= $product['cover'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $product['name'] ?></h5>
                                    <p class="card-text"><?= $product['description'] ?></p>
                                    <form action="detalles-productos.php?slug=<?= $product['slug'] ?>" method="POST">
                                        <button type="submit" class="btn btn-primary">Ver</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editProductModal">
                                        Editar Producto
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#productDeletedModal">
                                        Eliminar Producto
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>