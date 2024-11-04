<?php

require 'App/ProductController.php';

$slug = explode('/', $_SERVER['REQUEST_URI'])[3];

$product = json_decode(ProductController::product($slug), true)['data'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <title>Detalles de Producto</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Productos</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
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
            <a href="../home" class="list-group-item list-group-item-action"
              >Productos</a
            >
            <a
              href="detalles-productos.php/product/<?= $product['slug'] ?>"
              class="list-group-item list-group-item-action active"
              >Detalle de Productos</a
            >
            <a href="#" class="list-group-item list-group-item-action"
              >Categoría 3</a
            >
            <a href="#" class="list-group-item list-group-item-action"
              >Categoría 4</a
            >
          </div>
        </div>

        <div class="col-md-9">
          <div class="row">
            <div class="col-12 pt-4 pb-4 text-center">
              <h1>Detalles de Producto</h1>
            </div>

            <div class="col-12">
              <div
                id="carouselExample"
                class="carousel slide mx-auto"
                style="max-width: 500px"
              >
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      src="<?= $product['cover'] ?>"
                      class="d-block w-100"
                      alt="..."
                      style="max-width: 500px"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="tumbnail.png"
                      class="d-block w-100"
                      alt="..."
                      style="max-width: 500px"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="tumbnail.png"
                      class="d-block w-100"
                      alt="..."
                      style="max-width: 500px"
                    />
                  </div>
                </div>
                <button
                  class="carousel-control-prev"
                  type="button"
                  data-bs-target="#carouselExample"
                  data-bs-slide="prev"
                >
                  <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button
                  class="carousel-control-next"
                  type="button"
                  data-bs-target="#carouselExample"
                  data-bs-slide="next"
                >
                  <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="visually-hidden">Next</span>
                </button>
                <h2 class="col-12 pt-3 text-center"><?= isset($product['brand']['name']) ? $product['brand']['name'] : 'Sin Marca' ?></h2>
              </div>
            </div>

            <div class="col-12 pt-3">
              <h2><?php echo $product['name']; ?></h2>
            </div>

            <div class="col-12">
              <p>
                <?php echo $product['description']; ?>
              </p>
            </div>

            <div class="col-12 pt-3">
              <h2>Categorias</h2>
            </div>

            <div class="col-12">
              <div class="row">
                <ul class="list-group list-group-horizontal">
                  <?php if (count($product['categories']) == 0): ?>
                    <li class="list-group-item col-2">Sin Categorias</li>
                  <?php endif; ?>
                  <?php foreach ($product['categories'] as $category): ?>
                    <li class="list-group-item col-2"><?= $category['name'] ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>

            <div class="col-12 pt-3">
              <h2>Etiquetas</h2>
            </div>

            <div class="col-12">
              <div class="row">
                <ul class="list-group list-group-horizontal">
                  <?php if (count($product['tags']) == 0): ?>
                    <li class="list-group-item col-2">Sin Etiquetas</li>
                  <?php endif; ?>
                  <?php foreach ($product['tags'] as $category): ?>
                    <li class="list-group-item col-2"><?= $category['name'] ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>

            <div class="col-12 pt-3">
              <h2>Historial</h2>
            </div>

            <div class="col-12">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row"></div>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
