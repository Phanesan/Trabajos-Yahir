<?php 

  include "../../app/config.php";
  include "../../app/ProductController.php";
  include "../../app/BrandController.php";

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
      <form action="<?= BASE_PATH ?>api/products" method="POST" enctype="multipart/form-data">
      
        <div class="pc-content">
          <!-- [ breadcrumb ] start -->
          <div class="page-header">
            <div class="page-block">
              <div class="row align-items-center">
                <div class="col-md-12">
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">E-commerce</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add New Product</li>
                  </ul>
                </div>
                <div class="col-md-12">
                  <div class="page-header-title">
                    <h2 class="mb-0">Add New Product</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- [ breadcrumb ] end -->

          <!-- [ Main Content ] start -->
          <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-xl-6">
              <div class="card">
                <div class="card-header">
                  <h5>Product description</h5>
                </div>
                <div class="card-body">
                  <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Product Name" />
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Brand</label>
                    <select class="form-select" name="brand" aria-label="Select brand">
                        <option value="" selected>Selecciona la marca</option>
                        <?php
                        $brands = $brandController->allBrands();
                        foreach ($brands as $brand) {
                            echo '<option value="' . $brand['id'] . '">' . $brand['name'] . '</option>';
                        }
                        ?>
                    </select>
                  </div>
                  <div class="mb-0">
                    <label class="form-label">Product Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter Product Description"></textarea>
                  </div>

                  <div class="mb-0">
                    <label class="form-label">Product Features</label>
                    <textarea class="form-control" name="features" placeholder="Enter Product Features"></textarea>
                  </div>

                  <div class="mb-0">
                    <label class="form-label">Product Slug</label>
                    <input type="text" name="slug" class="form-control" placeholder="Enter Product Slug" />
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-xl-6">
              
              <div class="card">
                <div class="card-header">
                  <h5>Product image</h5>
                </div>
                <div class="card-body">
                  <div class="mb-0">
                    <p><span class="text-danger">*</span> Recommended resolution is 640*640 with file size</p>
                    <label class="btn btn-outline-secondary" for="flupld"><i class="ti ti-upload me-2"></i> Click to Upload</label>
                    <input type="file" name="image" id="flupld" class="d-none" />
                  </div>
                </div>
              </div>

            </div>
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body text-end btn-page">
                  <input type="hidden" name="action" value="create">
                  <button type="submit" class="btn btn-primary mb-0">Save product</button>
                </div>
              </div>
            </div>
            <!-- [ sample-page ] end -->
          </div>
          <!-- [ Main Content ] end -->
        </div>
      </form>
    </div> 
    
    <?php include "../layouts/footer.php" ?> 

    <?php include "../layouts/scripts.php" ?> 

    <?php include "../layouts/modals.php" ?>
  </body>
  <!-- [Body] end -->undefined
</html>