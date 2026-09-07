<?php
if ($_SESSION["profile"] == "Seller") {
    echo '<script>window.location = "home";</script>';
    return;
}
?>
<div class="content-wrapper">

  <section class="content-header">
    <h1>Product Management</h1>
    <ol class="breadcrumb">
      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-success" data-toggle="modal" data-target="#addProduct">
          <i class="fa fa-plus"></i> Add Product
        </button>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-hover table-striped dt-responsive productsTable" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Image</th>
              <th>Code</th>
              <th>Description</th>
              <th>Category</th>
              <th>Stock</th>
              <th>Buying Price</th>
              <th>Selling Price</th>
              <th>Date Added</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Sample product data for demonstration -->
            <?php
            // Sample data for demonstration purposes
            $products = [
              [
                "id" => 1,
                "image" => "default.png",
                "code" => "P001",
                "description" => "Product 1",
                "category" => "Category 1",
                "stock" => 100,
                "buying_price" => 50.00,
                "selling_price" => 70.00,
                "date_added" => "2023-10-10",
              ],
              // Add more products as needed
            ];

            foreach ($products as $key => $product) {
              echo '<tr>
                      <td>' . ($key + 1) . '</td>
                      <td><img src="views/img/products/' . $product["image"] . '" width="50"></td>
                      <td>' . $product["code"] . '</td>
                      <td>' . $product["description"] . '</td>
                      <td>' . $product["category"] . '</td>
                      <td>' . $product["stock"] . '</td>
                      <td>$ ' . number_format($product["buying_price"], 2) . '</td>
                      <td>$ ' . number_format($product["selling_price"], 2) . '</td>
                      <td>' . $product["date_added"] . '</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning"><i class="fa fa-print"></i></button>
                          <button class="btn btn-primary" data-toggle="modal" data-target="#modalEditProduct">Edit</button>
                          <button class="btn btn-danger">Delete</button>
                        </div>
                      </td>
                    </tr>';
            }
            ?>
          </tbody>
        </table>
        <input type="hidden" value="<?php echo $_SESSION['profile']; ?>" id="hiddenProfile">
      </div>
    </div>
  </section>
</div>

<!-- Modal for Adding Product -->
<div id="addProduct" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" enctype="multipart/form-data">
        <div class="modal-header" style="background: #DD4B39; color: #fff">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Product</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <select class="form-control input-lg" name="newCategory" required>
                  <option value="">Select Category</option>
                  <?php
                  // Sample categories for demonstration
                  $categories = [
                    ["id" => 1, "Category" => "Category 1"],
                    ["id" => 2, "Category" => "Category 2"],
                  ];
                  foreach ($categories as $category) {
                    echo '<option value="' . $category["id"] . '">' . $category["Category"] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                <input type="text" class="form-control input-lg" name="newCode" placeholder="Add Product Code" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" name="newDescription" placeholder="Add Description/Product Name" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input type="number" class="form-control input-lg" name="newStock" placeholder="Add Stock" min="0" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-12 col-sm-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                  <input type="number" class="form-control input-lg" name="newBuyingPrice" step="any" min="0" placeholder="Buying Price" required>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                  <input type="number" class="form-control input-lg" name="newSellingPrice" step="any" min="0" placeholder="Selling Price" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="panel">Upload Image</div>
              <input type="file" class="newImage" name="newProdPhoto">
              <p class="help-block">Maximum size 2MB</p>
              <img src="views/img/products/default/anonymous.png" class="img-thumbnail preview" width="100px">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save Product</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for Editing Product -->
<div id="modalEditProduct" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#DD4B39; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Product</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <select class="form-control input-lg" name="editCategory" required>
                  <option id="editCategory"></option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                <input type="text" class="form-control input-lg" name="editCode" readonly required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" name="editDescription" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input type="number" class="form-control input-lg" name="editStock" min="0" required>
              </div>
            </div>
            <div class="form-group">
              <div class="panel">Upload Image</div>
              <input type="file" class="newImage" name="editImage">
              <p class="help-block">2MB max</p>
              <img src="views/img/products/default/anonymous.png" class="img-thumbnail preview" width="100px">
              <input type="hidden" name="currentImage" id="currentImage">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>