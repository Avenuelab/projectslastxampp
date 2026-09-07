<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Sale</h1>
    <ol class="breadcrumb">
      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit Sale</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-lg-5 col-xs-12">
        <div class="box box-default">
          <div class="box-header with-border"></div>

          <form method="post" class="saleForm">
            <div class="box-body">
              <div class="box">
                <!-- Seller Input -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="newSeller" id="newSeller" value="Seller Name" readonly>
                    <input type="hidden" name="idSeller" value="Seller ID">
                  </div>
                </div>

                <!-- Code Input -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="text" class="form-control" id="newSale" name="editSale" value="Sale Code" readonly>
                  </div>
                </div>

                <!-- Customer Input -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control" name="selectCustomer" id="selectCustomer" required>
                      <option value="Customer ID">Customer Name</option>
                      <option value="Other Customer ID">Other Customer Name</option>
                    </select>
                    <span class="input-group-addon">
                      <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalAddCustomer">Add Customer</button>
                    </span>
                  </div>
                </div>

                <!-- Product Input -->
                <div class="form-group row newProduct">
                  <div class="row" style="padding:5px 15px">
                    <div class="col-xs-6" style="padding-right:0px">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <button type="button" class="btn btn-danger btn-xs removeProduct"><i class="fa fa-trash"></i></button>
                        </span>
                        <input type="text" class="form-control newProductDescription" name="addProduct" value="Product Description" readonly required>
                      </div>
                    </div>
                    <div class="col-xs-3">
                      <input type="number" class="form-control newProductQuantity" name="newProductQuantity" min="1" value="Quantity" required>
                    </div>
                    <div class="col-xs-3 enterPrice" style="padding-left:0px">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                        <input type="text" class="form-control newProductPrice" name="newProductPrice" value="Total Price" readonly required>
                      </div>
                    </div>
                  </div>
                </div>

                <input type="hidden" name="productsList" id="productsList">

                <!-- Add Product Button -->
                <button type="button" class="btn btn-default hidden-lg btnAddProduct">Add Product</button>

                <div class="row">
                  <div class="col-xs-8 pull-right">
                    <table class="table">
                      <thead>
                        <th>Taxes</th>
                        <th>Total</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="input-group">
                              <input type="number" class="form-control" name="newTaxSale" id="newTaxSale" value="Tax Percentage" min="0" required>
                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                            </div>
                          </td>
                          <td>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                              <input type="number" class="form-control" name="newSaleTotal" id="newSaleTotal" value="Total Sale" readonly required>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
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
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-success pull-right">Save Changes</button>
            </div>
          </form>
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

<!-- Modal for Adding Customer -->
<div id="modalAddCustomer" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST">
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
    </div>
  </div>
</div>