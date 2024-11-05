<?php

include "../../app/ProductController.php";
include_once "../../app/config.php";
include "../../Utils.php";

$parsed = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$slug = basename($parsed);

$product = json_decode(ProductController::product($slug), true)['data'];
?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
  <?php include "../layouts/head.php" ?>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>

  <!-- [ Pre-loader ] End -->
  <?php include "../layouts/sidebar.php" ?>
  <?php include "../layouts/navbar.php" ?>

  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">E-commerce</a></li>
                <li class="breadcrumb-item" aria-current="page">Products</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Products</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <form action="<?= BASE_PATH ?>products/update/<?= $slug ?>" method="POST">
        <input type="hidden" name="action" value="">
        <button type="submit" class="btn btn-primary mb-3">Edit Product</button>
      </form>
      <form action="<?= BASE_PATH ?>api/products/" method="POST">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <input type="hidden" name="action" value="delete">
        <button class="btn btn-danger mb-3">Delete Product</button>
      </form>

      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="sticky-md-top product-sticky">
                    <div id="carouselExampleCaptions" class="carousel slide ecomm-prod-slider" data-bs-ride="carousel">
                      <div class="carousel-inner bg-light rounded position-relative">
                        <div class="card-body position-absolute end-0 top-0">
                          <div class="form-check prod-likes">
                            <input type="checkbox" class="form-check-input" />
                            <i data-feather="heart" class="prod-likes-icon"></i>
                          </div>
                        </div>
                        <div class="card-body position-absolute bottom-0 end-0">
                          <ul class="list-inline ms-auto mb-0 prod-likes">
                            <li class="list-inline-item m-0">
                              <a href="#" class="avtar avtar-xs text-white text-hover-primary">
                                <i class="ti ti-zoom-in f-18"></i>
                              </a>
                            </li>
                            <li class="list-inline-item m-0">
                              <a href="#" class="avtar avtar-xs text-white text-hover-primary">
                                <i class="ti ti-zoom-out f-18"></i>
                              </a>
                            </li>
                            <li class="list-inline-item m-0">
                              <a href="#" class="avtar avtar-xs text-white text-hover-primary">
                                <i class="ti ti-rotate-clockwise f-18"></i>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <div class="carousel-item active">
                          <img src="<?php
                                    $cover = separateURL($product['cover'], "products/");

                                    if ($cover[1] !== "") {
                                      echo $product['cover'];
                                    } else {
                                      echo "tumbnail.png";
                                    }
                                    ?>" class="d-block w-100" alt="Product images" />
                        </div>
                        <div class="carousel-item">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-2.jpg" class="d-block w-100" alt="Product images" />
                        </div>
                        <div class="carousel-item">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-3.jpg" class="d-block w-100" alt="Product images" />
                        </div>
                        <div class="carousel-item">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-4.jpg" class="d-block w-100" alt="Product images" />
                        </div>
                        <div class="carousel-item">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-5.jpg" class="d-block w-100" alt="Product images" />
                        </div>
                        <div class="carousel-item">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-6.jpg" class="d-block w-100" alt="Product images" />
                        </div>
                        <div class="carousel-item">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-7.jpg" class="d-block w-100" alt="Product images" />
                        </div>
                        <div class="carousel-item">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-8.jpg" class="d-block w-100" alt="Product images" />
                        </div>
                      </div>
                      <ol class="list-inline carousel-indicators position-relative product-carousel-indicators my-sm-3 mx-0">
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="list-inline-item w-25 h-auto active">
                          <img src="<?php
                                    $cover = separateURL($product['cover'], "products/");

                                    if ($cover[1] !== "") {
                                      echo $product['cover'];
                                    } else {
                                      echo "tumbnail.png";
                                    }
                                    ?>" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="list-inline-item w-25 h-auto">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-2.jpg" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class="list-inline-item w-25 h-auto">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-3.jpg" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" class="list-inline-item w-25 h-auto">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-4.jpg" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" class="list-inline-item w-25 h-auto">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-5.jpg" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" class="list-inline-item w-25 h-auto">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-6.jpg" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" class="list-inline-item w-25 h-auto">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-7.jpg" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7" class="list-inline-item w-25 h-auto">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-8.jpg" class="d-block wid-50 rounded" alt="Product images" />
                        </li>
                      </ol>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <span class="badge bg-success f-14">In stock</span>
                  <h5 class="my-3"><?= $product['name'] ?></h5>
                  <div class="star f-18 mb-3">
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-half-alt text-warning"></i>
                    <i class="far fa-star text-muted"></i>
                    <span class="text-sm text-muted">(4.0)</span>
                  </div>
                  <h5 class="mt-4 mb-sm-1 mb-0">Offer</h5>
                  <div class="offer-check-block">
                    <div class="offer-check border rounded p-3">
                      <div class="form-check">
                        <input type="radio" name="radio1" class="form-check-input input-primary" id="customCheckdef1" checked="" />
                        <label class="form-check-label d-block" for="customCheckdef1">
                          <span class="h6 mb-0 d-block">No Cost EMI</span>
                          <span class="text-muted offer-details">Upto ₹2,322.51 EMI interest savings on select Credit CardsUpto ₹2,322.51 EMI interest savings on select
                            Credit Cards</span>
                          <span class="h6 mb-0 text-primary">1 Offer <i class="ti ti-arrow-narrow-right"></i></span>
                        </label>
                      </div>
                    </div>
                    <div class="offer-check border rounded p-3">
                      <div class="form-check">
                        <input type="radio" name="radio1" class="form-check-input input-primary" id="customCheckdef2" />
                        <label class="form-check-label d-block" for="customCheckdef2">
                          <span class="h6 mb-0 d-block">Bank Offer</span>
                          <span class="text-muted offer-details">Upto ₹1,250.00 discount on select Credit CardsUpto ₹2,322.51 EMI interest savings on select Credit
                            Cards</span>
                          <span class="h6 mb-0 text-primary">1 Offer <i class="ti ti-arrow-narrow-right"></i></span>
                        </label>
                      </div>
                    </div>
                    <div class="offer-check border rounded p-3">
                      <div class="form-check">
                        <input type="radio" name="radio1" class="form-check-input input-primary" id="customCheckdef3" />
                        <label class="form-check-label d-block" for="customCheckdef3">
                          <span class="h6 mb-0 d-block">No Cost EMI</span>
                          <span class="text-muted offer-details">Upto ₹2,322.51 EMI interest savings on select Credit CardsUpto ₹2,322.51 EMI interest savings on select
                            Credit Cards</span>
                          <span class="h6 mb-0 text-primary">1 Offer <i class="ti ti-arrow-narrow-right"></i></span>
                        </label>
                      </div>
                    </div>
                    <div class="offer-check border rounded p-3">
                      <div class="form-check">
                        <input type="radio" name="radio1" class="form-check-input input-primary" id="customCheckdef4" />
                        <label class="form-check-label d-block" for="customCheckdef4">
                          <span class="h6 mb-0 d-block">Bank Offer</span>
                          <span class="text-muted offer-details">Upto ₹1,250.00 discount on select Credit CardsUpto ₹2,322.51 EMI interest savings on select Credit
                            Cards</span>
                          <span class="h6 mb-0 text-primary">1 Offer <i class="ti ti-arrow-narrow-right"></i></span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <h5 class="mt-4 mb-sm-3 mb-2 f-w-500">About this item</h5>
                  <ul>
                    <li class="mb-2">Categorias: | <?php foreach ($product['categories'] as $category) : ?><?= $category['name'] ?> | <?php endforeach; ?></li>
                    <li class="mb-2">Tags: | <?php foreach ($product['tags'] as $tag) : ?><?= $tag['name'] ?> | <?php endforeach; ?></li>
                    <li class="mb-2">Marca: <?php echo $product['brand']['name']; ?></li>
                  </ul>

                  <div class="mb-3 row">
                    <label class="col-form-label col-lg-3 col-sm-12">Quantity <span class="text-danger">*</span></label>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                      <div class="btn-group btn-group-sm mb-2 border" role="group">
                        <button type="button" id="decrease" onclick="decreaseValue('number')" class="btn btn-link-secondary"><i class="ti ti-minus"></i></button>
                        <input
                          class="wid-35 text-center border-0 m-0 form-control rounded-0 shadow-none"
                          type="text"
                          id="number"
                          value="0" />
                        <button type="button" id="increase" onclick="increaseValue('number')" class="btn btn-link-secondary"><i class="ti ti-plus"></i></button>
                      </div>
                    </div>
                  </div>
                  <h3 class="mb-4"><b>$299.00</b><span class="mx-2 f-16 text-muted f-w-400 text-decoration-line-through">$399.00</span></h3>
                  <div class="row">
                    <div class="col-6">
                      <div class="d-grid">
                        <button type="button" class="btn btn-primary">Buy Now</button>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="d-grid">
                        <button type="button" class="btn btn-outline-secondary">Add to cart</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header pb-0">
              <ul class="nav nav-tabs profile-tabs mb-0" id="myTab" role="tablist">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    id="ecomtab-tab-1"
                    data-bs-toggle="tab"
                    href="#ecomtab-1"
                    role="tab"
                    aria-controls="ecomtab-1"
                    aria-selected="true">Features
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="ecomtab-tab-2"
                    data-bs-toggle="tab"
                    href="#ecomtab-2"
                    role="tab"
                    aria-controls="ecomtab-2"
                    aria-selected="true">Specifications
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="ecomtab-tab-3"
                    data-bs-toggle="tab"
                    href="#ecomtab-3"
                    role="tab"
                    aria-controls="ecomtab-3"
                    aria-selected="true">Overview
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="ecomtab-tab-4"
                    data-bs-toggle="tab"
                    href="#ecomtab-4"
                    role="tab"
                    aria-controls="ecomtab-4"
                    aria-selected="true">Reviews<span class="badge bg-light-primary rounded-pill px-2 ms-2">275</span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane show active" id="ecomtab-1" role="tabpanel" aria-labelledby="ecomtab-tab-1">
                  <div class="table-responsive">
                    <p>
                      <?php echo $product['features']; ?>
                    </p>
                  </div>
                </div>
                <div class="tab-pane" id="ecomtab-2" role="tabpanel" aria-labelledby="ecomtab-tab-2">
                  <div class="row gy-3">
                    <div class="col-md-6">
                      <h5>Product Category</h5>
                      <hr class="mb-3 mt-1" />
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td class="text-muted py-1 border-top-0">Wearable Device Type:</td>
                              <td class="py-1 border-top-0">Smart Band</td>
                            </tr>
                            <tr>
                              <td class="text-muted py-1">Compatible Devices :</td>
                              <td class="py-1">Smartphones</td>
                            </tr>
                            <tr>
                              <td class="text-muted py-1">Ideal For :</td>
                              <td class="py-1">Unisex</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <h5>Manufacturer Details</h5>
                      <hr class="mb-3 mt-1" />
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td class="text-muted py-1 border-top-0">Brand :</td>
                              <td class="py-1 border-top-0">Apple</td>
                            </tr>
                            <tr>
                              <td class="text-muted py-1">Model Series :</td>
                              <td class="py-1">Watch SE</td>
                            </tr>
                            <tr>
                              <td class="text-muted py-1">Model Number :</td>
                              <td class="py-1">MYDT2HN/A</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="ecomtab-3" role="tabpanel" aria-labelledby="ecomtab-tab-3">
                  <div class="table-responsive">
                    <p class="text-muted">
                      <?php echo $product['description']; ?>
                    </p>
                  </div>
                </div>
                <div class="tab-pane" id="ecomtab-4" role="tabpanel" aria-labelledby="ecomtab-tab-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="row justify-content-between align-items-center">
                        <div class="col-xxl-4 col-xl-5">
                          <h2 class="mb-3"><b>3.5<small class="text-muted f-18">/5</small></b></h2>
                          <p class="mb-2 text-muted">Based on 275 reviews</p>
                          <div class="star mb-3 f-20">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                            <i class="far fa-star text-muted"></i>
                          </div>
                        </div>
                        <div class="col-xxl-4 col-xl-5">
                          <div class="d-flex align-items-center">
                            <div class="w-100">
                              <div class="row align-items-center my-2">
                                <div class="col">
                                  <div class="progress" style="height: 4px">
                                    <div class="progress-bar bg-warning" style="width: 30%"></div>
                                  </div>
                                </div>
                                <div class="col-auto">
                                  <p class="mb-0 text-muted">5 Stars</p>
                                </div>
                              </div>
                              <div class="row align-items-center my-2">
                                <div class="col">
                                  <div class="progress" style="height: 4px">
                                    <div class="progress-bar bg-warning" style="width: 60%"></div>
                                  </div>
                                </div>
                                <div class="col-auto">
                                  <p class="mb-0 text-muted">4 Stars</p>
                                </div>
                              </div>
                              <div class="row align-items-center my-2">
                                <div class="col">
                                  <div class="progress" style="height: 4px">
                                    <div class="progress-bar bg-warning" style="width: 75%"></div>
                                  </div>
                                </div>
                                <div class="col-auto">
                                  <p class="mb-0 text-muted">3 Stars</p>
                                </div>
                              </div>
                              <div class="row align-items-center my-2">
                                <div class="col">
                                  <div class="progress" style="height: 4px">
                                    <div class="progress-bar bg-warning" style="width: 40%"></div>
                                  </div>
                                </div>
                                <div class="col-auto">
                                  <p class="mb-0 text-muted">2 Stars</p>
                                </div>
                              </div>
                              <div class="row align-items-center">
                                <div class="col">
                                  <div class="progress" style="height: 4px">
                                    <div class="progress-bar bg-warning" style="width: 55%"></div>
                                  </div>
                                </div>
                                <div class="col-auto">
                                  <p class="mb-0 text-muted">1 Stars</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                          <div class="chat-avtar">
                            <img class="img-radius img-fluid wid-40" src="<?= BASE_PATH ?>assets/images/user/avatar-1.jpg" alt="User image" />
                            <div class="bg-success chat-badge"></div>
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <h6 class="mb-1">Harriet Wilson</h6>
                          <p class="text-muted text-sm mb-1">2 hour ago</p>
                          <div class="star">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                            <i class="far fa-star text-muted"></i>
                          </div>
                          <p class="mb-0 text-muted mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                          <div class="chat-avtar">
                            <img class="img-radius img-fluid wid-40" src="<?= BASE_PATH ?>assets/images/user/avatar-2.jpg" alt="User image" />
                            <div class="bg-success chat-badge"></div>
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <h6 class="mb-1">Lou Olson</h6>
                          <p class="text-muted text-sm mb-1">2 hour ago</p>
                          <div class="star">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                            <i class="far fa-star text-muted"></i>
                            <i class="far fa-star text-muted"></i>
                          </div>
                          <p class="mb-2 text-muted mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500.</p>
                          <a href="#" class="link-primary mb-1">https://phoenixcoded.net/</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center mt-3">
                    <button class="btn btn-link-primary">View more comments</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h5>Related Product</h5>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-sm-6 col-xxl-3 col-xl-4">
                  <div class="card product-card mb-0">
                    <div class="card-img-top">
                      <a href="ecom_product-details.html">
                        <img src="<?= BASE_PATH ?>assets/images/application/img-prod-2.jpg" alt="image" class="img-prod img-fluid" />
                      </a>
                      <div class="card-body position-absolute end-0 top-0">
                        <div class="form-check prod-likes">
                          <input type="checkbox" class="form-check-input" />
                          <i data-feather="heart" class="prod-likes-icon"></i>
                        </div>
                      </div>
                      <div class="card-body position-absolute start-0 top-0">
                        <span class="badge bg-danger badge-prod-card">30%</span>
                      </div>
                    </div>
                    <div class="card-body">
                      <a href="ecom_product-details.html">
                        <p class="prod-content mb-0 text-muted">Apple watch -4</p>
                      </a>
                      <div class="d-flex align-items-center justify-content-between mt-2 mb-3 flex-wrap">
                        <h4 class="mb-0 text-truncate"><b>$299.00</b> <span class="text-sm text-muted f-w-400 text-decoration-line-through">$399.00</span></h4>
                        <div class="d-inline-flex align-items-center">
                          <i class="ph-duotone ph-star text-warning me-1"></i>
                          4.5 <small class="text-muted">/ 5</small>
                        </div>
                      </div>
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <a href="#" class="avtar avtar-s btn-link-secondary btn-prod-card">
                            <i class="ph-duotone ph-eye f-18"></i>
                          </a>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <div class="d-grid">
                            <button class="btn btn-link-secondary btn-prod-card">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xxl-3 col-xl-4">
                  <div class="card product-card mb-0">
                    <div class="card-img-top">
                      <a href="ecom_product-details.html">
                        <img src="<?= BASE_PATH ?>assets/images/application/img-prod-3.jpg" alt="image" class="img-prod img-fluid" />
                      </a>
                      <div class="card-body position-absolute end-0 top-0">
                        <div class="form-check prod-likes">
                          <input type="checkbox" class="form-check-input" />
                          <i data-feather="heart" class="prod-likes-icon"></i>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <a href="ecom_product-details.html">
                        <p class="prod-content mb-0 text-muted">Apple watch -4</p>
                      </a>
                      <div class="d-flex align-items-center justify-content-between mt-2 mb-3 flex-wrap">
                        <h4 class="mb-0 text-truncate"><b>$299.00</b> <span class="text-sm text-muted f-w-400 text-decoration-line-through">$399.00</span></h4>
                        <div class="d-inline-flex align-items-center">
                          <i class="ph-duotone ph-star text-warning me-1"></i>
                          4.5 <small class="text-muted">/ 5</small>
                        </div>
                      </div>
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <a href="#" class="avtar avtar-s btn-link-secondary btn-prod-card">
                            <i class="ph-duotone ph-eye f-18"></i>
                          </a>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <div class="d-grid">
                            <button class="btn btn-link-secondary btn-prod-card">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xxl-3 col-xl-4">
                  <div class="card product-card mb-0">
                    <div class="card-img-top">
                      <a href="ecom_product-details.html">
                        <img src="<?= BASE_PATH ?>assets/images/application/img-prod-4.jpg" alt="image" class="img-prod img-fluid" />
                      </a>
                      <div class="card-body position-absolute end-0 top-0">
                        <div class="form-check prod-likes">
                          <input type="checkbox" class="form-check-input" />
                          <i data-feather="heart" class="prod-likes-icon"></i>
                        </div>
                      </div>
                      <div class="card-body position-absolute start-0 top-0">
                        <span class="badge bg-danger badge-prod-card">30%</span>
                      </div>
                    </div>
                    <div class="card-body">
                      <a href="ecom_product-details.html">
                        <p class="prod-content mb-0 text-muted">Apple watch -4</p>
                      </a>
                      <div class="d-flex align-items-center justify-content-between mt-2 mb-3 flex-wrap">
                        <h4 class="mb-0 text-truncate"><b>$299.00</b> <span class="text-sm text-muted f-w-400 text-decoration-line-through">$399.00</span></h4>
                        <div class="d-inline-flex align-items-center">
                          <i class="ph-duotone ph-star text-warning me-1"></i>
                          4.5 <small class="text-muted">/ 5</small>
                        </div>
                      </div>
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <a href="#" class="avtar avtar-s btn-link-secondary btn-prod-card">
                            <i class="ph-duotone ph-eye f-18"></i>
                          </a>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <div class="d-grid">
                            <button class="btn btn-link-secondary btn-prod-card">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xxl-3 col-xl-4">
                  <div class="card product-card mb-0">
                    <div class="card-img-top">
                      <a href="ecom_product-details.html">
                        <img src="<?= BASE_PATH ?>assets/images/application/img-prod-5.jpg" alt="image" class="img-prod img-fluid" />
                      </a>
                      <div class="card-body position-absolute end-0 top-0">
                        <div class="form-check prod-likes">
                          <input type="checkbox" class="form-check-input" />
                          <i data-feather="heart" class="prod-likes-icon"></i>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <a href="ecom_product-details.html">
                        <p class="prod-content mb-0 text-muted">Apple watch -4</p>
                      </a>
                      <div class="d-flex align-items-center justify-content-between mt-2 mb-3 flex-wrap">
                        <h4 class="mb-0 text-truncate"><b>$299.00</b> <span class="text-sm text-muted f-w-400 text-decoration-line-through">$399.00</span></h4>
                        <div class="d-inline-flex align-items-center">
                          <i class="ph-duotone ph-star text-warning me-1"></i>
                          4.5 <small class="text-muted">/ 5</small>
                        </div>
                      </div>
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <a href="#" class="avtar avtar-s btn-link-secondary btn-prod-card">
                            <i class="ph-duotone ph-eye f-18"></i>
                          </a>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <div class="d-grid">
                            <button class="btn btn-link-secondary btn-prod-card">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
  </div>
  <!-- [ Main Content ] end -->

  <?php include "../layouts/footer.php" ?>

  <?php include "../layouts/scripts.php" ?>

  <?php include "../layouts/modals.php" ?>
</body>
<!-- [Body] end -->undefined

</html>