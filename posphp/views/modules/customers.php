<?php

if ($_SESSION["profile"] == "Special") {
    echo '<script>window.location = "home";</script>';
    return;
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Customer Management</h1>
    <ol class="breadcrumb">
      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-success" data-toggle="modal" data-target="#addCustomer">Add Customer</button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped dt-responsive tables" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Name</th>
              <th>I.D Doc.</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Address</th>
              <th>Birthday</th>
              <th>Total Purchases</th>
              <th>Last Purchase</th>
              <th>Last login</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Sample customer data (replace with your data fetching logic)
            $customers = [
              ['id' => 1, 'name' => 'John Doe', 'idDocument' => '123456', 'email' => 'john@example.com', 'phone' => '1234567890', 'address' => '123 Main St', 'birthdate' => '1990-01-01', 'purchases' => 5, 'lastPurchase' => '2023-01-01', 'registerDate' => '2020-01-01'],
              // Add more customers as needed
            ];

            foreach ($customers as $key => $value) {
                echo '<tr>
                        <td>' . ($key + 1) . '</td>
                        <td>' . $value["name"] . '</td>
                        <td>' . $value["idDocument"] . '</td>
                        <td>' . $value["email"] . '</td>
                        <td>' . $value["phone"] . '</td>
                        <td>' . $value["address"] . '</td>
                        <td>' . $value["birthdate"] . '</td>
                        <td>' . $value["purchases"] . '</td>
                        <td>' . $value["lastPurchase"] . '</td>
                        <td>' . $value["registerDate"] . '</td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-primary btnEditCustomer" data-toggle="modal" data-target="#modalEditCustomer" idCustomer="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btnDeleteCustomer" idCustomer="' . $value["id"] . '"><i class="fa fa-trash"></i></button>
                          </div>  
                        </td>
                      </tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<!-- Modal ADD CUSTOMER -->
<div id="addCustomer" class="modal fade" role="dialog">
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
    </div>
  </div>
</div>

<!-- Modal EDIT CUSTOMER -->
<div id="modalEditCustomer" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#DD4B39; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Customer</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="editCustomer" id="editCustomer" required>
                <input type="hidden" id="idCustomer" name="idCustomer">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                <input type="number" min="0" class="form-control input-lg" name="editIdDocument" id="editIdDocument" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 
                <input type="email" class="form-control input-lg" name="editEmail" id="editEmail" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                <input type="text" class="form-control input-lg" name="editPhone" id="editPhone" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 
                <input type="text" class="form-control input-lg" name="editAddress" id="editAddress" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="text" class="form-control input-lg" name="editBirthdate" id="editBirthdate" required>
              </div>
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