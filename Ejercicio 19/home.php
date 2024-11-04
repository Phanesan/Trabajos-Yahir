<?php

require 'Utils.php';
require 'App/ProductController.php';
require 'App/BrandController.php';

$products = json_decode(ProductController::getProducts(), true)['data'];

if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case '1':
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    var modal = new bootstrap.Modal(document.getElementById('addProductModal'));
                    modal.show();
                });
            </script>";
            break;
        case '2':
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    var modal = new bootstrap.Modal(document.getElementById('editProductModal'));
                    modal.show();
                });
            </script>";
            break;
    }
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

                    <!-- MODAL AÑADIR PRODUCTO -->
                    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProductModalLabel">Añadir Nuevo Producto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form enctype="multipart/form-data" action="App/ProductController.php" method="POST">
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
                                            <label for="productBrand" class="form-label">Marca</label>
                                            <select class="form-select" name="brand" aria-label="Select brand">
                                                <option selected>Selecciona la marca</option>
                                                <?php
                                                $brands = $brandController->allBrands();
                                                foreach ($brands as $brand) {
                                                    echo '<option value="' . $brand['id'] . '">' . $brand['name'] . '</option>';
                                                }
                                                ?>
                                            </select>
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

                    <!-- MODAL EDITAR PRODUCTO -->
                    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProductModalLabel">Editar Producto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="App/ProductController.php" method="POST">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Nombre del Producto</label>
                                            <input type="text" name="name" class="form-control" id="productNameEdit" placeholder="Ingresa el nombre del producto">
                                        </div>
                                        <div class="mb-3">
                                            <label for="slugName" class="form-label">Slug</label>
                                            <input type="text" name="slug" class="form-control" id="slugNameEdit" placeholder="Slug">
                                        </div>
                                        <div class="mb-3">
                                            <label for="productDescription" class="form-label">Descripción</label>
                                            <textarea class="form-control" name="description" id="productDescriptionEdit" rows="3" placeholder="Añade una descripción"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productFeatures" class="form-label">Features</label>
                                            <textarea class="form-control" name="features" id="productFeaturesEdit" rows="3" placeholder="Añade un feature"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productImage" class="form-label">Imagen del Producto</label>
                                            <input type="file" name="image" class="form-control" id="productImageEdit">
                                        </div>

                                        <input type="hidden" name="id" id="productId" value="">
                                        <input type="hidden" name="action" value="edit">
                                        <button type="submit" class="btn btn-success">Editar Producto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar este producto?.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <form action="App/ProductController.php" method="POST">
                                        <input type="hidden" name="id" id="deleteProductId">
                                        <input type="hidden" name="action" value="delete">
                                        <button type="submit" class="btn btn-danger" id="confirmDeleteButton">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteSuccessModal" tabindex="-1" aria-labelledby="deleteSuccessModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteSuccessModalLabel">Producto Eliminado</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    El producto ha sido eliminado exitosamente.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">

                    <?php foreach (array_reverse($products) as $product) : ?>
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="card h-100">
                                <div class="ratio ratio-1x1">
                                    <img src="<?php
                                                $cover = separateURL($product['cover'], "products/");

                                                if ($cover[1] !== "") {
                                                    echo $product['cover'];
                                                } else {
                                                    echo "tumbnail.png";
                                                }
                                                ?>"
                                        class="card-img-top img-fluid" alt="<?= $product['name'] ?>" style="object-fit: contain;">
                                </div>
                                <div class="card-body">
                                    <div class="card-title-text" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                        <h5 class="card-title"><?= $product['name'] ?></h5>
                                    </div>
                                    <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;"><?= $product['description'] ?></p>
                                    <form action="detalles-productos.php?slug=<?= $product['slug'] ?>" method="POST">
                                        <input type="hidden" name="action" value="null">
                                        <button type="submit" class="btn btn-primary">Ver</button>
                                    </form>
                                    <button type="button" id="<?= $product['id'] ?>"
                                        data-name="<?= $product['name'] ?>"
                                        data-slug="<?= $product['slug'] ?>"
                                        data-description="<?= $product['description'] ?>"
                                        data-features="<?= $product['features'] ?>"
                                        class="editButton btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editProductModal">
                                        Editar Producto
                                    </button>
                                    <button onclick="confirmDelete(<?= $product['id'] ?>)" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const url = new URL(window.location.href);

            const editButtons = document.querySelectorAll('.editButton');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {

                    const data_name = button.getAttribute('data-name');
                    const data_slug = button.getAttribute('data-slug');
                    const data_description = button.getAttribute('data-description');
                    const data_features = button.getAttribute('data-features');

                    document.getElementById('productNameEdit').value = data_name;
                    document.getElementById('slugNameEdit').value = data_slug;
                    document.getElementById('productDescriptionEdit').value = data_description;
                    document.getElementById('productFeaturesEdit').value = data_features;
                    document.getElementById('productId').value = button.getAttribute('id');
                })
            })

            const modal = document.getElementById("editProductModal");

            modal.addEventListener("hidden.bs.modal", function() {
                url.searchParams.delete('key');
                window.history.pushState({}, '', url);
            });
        })

        function confirmDelete(id) {
            document.getElementById('deleteProductId').setAttribute('value', id);
        }
    </script>
</body>

</html>