<?php

if ($_SESSION["profile"] == "Special") {
    echo '<script>window.location = "home";</script>';
    return;
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Sales Management</h1>
    <ol class="breadcrumb">
      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Create Sale</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-lg-5 col-xs-12">
        <div class="box box-default">
          <div class="box-header with-border"></div>

          <form role="form" method="post" class="saleForm">
            <div class="box-body">
              <div class="box">
                <!-- Seller Input -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="newSeller" id="newSeller" value="<?php echo $_SESSION["name"]; ?>" readonly>
                    <input type="hidden" name="idSeller" value="<?php echo $_SESSION["id"]; ?>">
                  </div>
                </div>

                <!-- Sale Code Input -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <?php 
                      $sales = ControllerSales::ctrShowSales(null, null);
                      $code = $sales ? ($sales[count($sales) - 1]["code"] + 1) : 10001;
                      echo '<input type="text" class="form-control" name="newSale" id="newSale" value="' . $code . '" readonly>';
                    ?>
                  </div>
                </div>

                <!-- Customer Input -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control" name="selectCustomer" id="selectCustomer" required>
                      <option value="">Select Customer</option>
                      <?php 
                      $customers = ControllerCustomers::ctrShowCustomers(null, null);
                      foreach ($customers as $customer) {
                        echo '<option value="' . $customer["id"] . '">' . $customer["name"] . '</option>';
                      }
                      ?>
                    </select>
                    <span class="input-group-addon">
                      <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalAddCustomer">Add Customer</button>
                    </span>
                  </div>
                </div>

                <!-- Product Input -->
                <div class="form-group row newProduct"></div>
                <input type="hidden" name="productsList" id="productsList">

                <!-- Add Product Button -->
                <button type="button" class="btn btn-default hidden-lg btnAddProduct">Add Product</button>

                <hr>
                <div class="row">
                  <!-- Taxes and Total Input -->
                  <div class="col-xs-8 pull-right">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Taxes</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="input-group">
                              <input type="number" class="form-control" name="newTaxSale" id="newTaxSale" placeholder="0" min="0" required>
                              <input type="hidden" name="newTaxPrice" id="newTaxPrice" required>
                              <input type="hidden" name="newNetPrice" id="newNetPrice" required>
                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                            </div>
                          </td>
                          <td>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                              <input type="number" class="form-control" name="newSaleTotal" id="newSaleTotal" placeholder="00000" totalSale="" readonly required>
                              <input type="hidden" name="saleTotal" id="saleTotal" required>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <hr>
                </div>

                <!-- Payment Method -->
                <div class="form-group row">
                  <div class="col-xs-6" style="padding-right: 0">
                    <div class="input-group">
                      <select class="form-control" name="newPaymentMethod" id="newPaymentMethod" required>
                        <option value="">-Select Payment Method-</option>
                        <option value="cash">Cash</option>
                        <option value="CC">Credit Card</option>
                        <option value="DC">Debit Card</option>
                      </select>
                    </div>
                  </div>
                  <input type="hidden" name="listPaymentMethod" id="listPaymentMethod" required>
                </div>
                <br>
              </div>
            </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-success pull-right">Save Sale</button>
            </div>
          </form>

          <!-- Removed saveSale logic -->
        </div>
      </div>

      <!-- Products Table -->
      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
        <div class="box box-default">
          <div class="box-header with-border"></div>
          <div class="box-body">
            <table class="table table-bordered table-hover table-striped dt-responsive salesTable">
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Image</th>
                  <th style="width:30px">Code</th>
                  <th>Description</th>
                  <th>Stock</th>
                  <th>Actions</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal Add Customer -->
<div id="modalAddCustomer" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST">
        <div class="modal-header" style="background: #DD4B39; color: #fff">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Customer</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control input-lg" type="text" name="newCustomer" placeholder="Write name" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input class="form-control input-lg" type="number" min="0" name="newIdDocument" placeholder="Write your ID" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input class="form-control input-lg" type="text" name="newEmail" placeholder="Email" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input class="form-control input-lg" type="text" name="newPhone" placeholder="Phone" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input class="form-control input-lg" type="text" name="newAddress" placeholder="Address" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input class="form-control input-lg" type="text" name="newBirthdate" placeholder="Birth Date" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save Customer</button>
        </div>
      </form>

      <!-- Removed createCustomer logic -->
    </div>
  </div>
</div>