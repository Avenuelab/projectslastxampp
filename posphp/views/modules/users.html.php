<div class="content-wrapper">

  <section class="content-header">
    <h1>User Management</h1>
    <ol class="breadcrumb">
      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addUser">Add User</button>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-hover table-striped dt-responsive tables" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Name</th>
              <th>Username</th>
              <th>Photo</th>
              <th>Profile</th>
              <th>Status</th>
              <th>Last Login</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              // Example user data for demonstration purposes
              $users = [
                ["id" => 1, "name" => "User Administrator", "username" => "admin", "photo" => "views/img/users/default/anonymous.png", "profile" => "Administrator", "status" => "Active", "lastLogin" => "2017-12-11 12:05:32"],
                ["id" => 2, "name" => "User Special", "username" => "special", "photo" => "views/img/users/default/anonymous.png", "profile" => "Special", "status" => "Active", "lastLogin" => "2017-12-11 12:05:32"],
                ["id" => 3, "name" => "User Seller", "username" => "seller", "photo" => "views/img/users/default/anonymous.png", "profile" => "Seller", "status" => "Active", "lastLogin" => "2017-12-11 12:05:32"],
              ];

              foreach ($users as $key => $user) {
                echo '<tr>
                        <td>'.($key + 1).'</td>
                        <td>'.$user["name"].'</td>
                        <td>'.$user["username"].'</td>
                        <td><img src="'.$user["photo"].'" class="img-thumbnail" width="40px"></td>
                        <td>'.$user["profile"].'</td>
                        <td><button class="btn btn-success btn-xs">'.$user["status"].'</button></td>
                        <td>'.$user["lastLogin"].'</td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
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

<!-- Modal: Add User -->
<div id="addUser" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" enctype="multipart/form-data">
        <div class="modal-header" style="background: #DD4B39; color: #fff">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add User</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control input-lg" type="text" name="newName" placeholder="Add name" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input class="form-control input-lg" type="text" name="newUser" placeholder="Add username" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input class="form-control input-lg" type="password" name="newPasswd" placeholder="Add password" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <select class="form-control input-lg" name="newProfile" required>
                  <option value="">Select Profile</option>
                  <option value="administrator">Administrator</option>
                  <option value="special">Special</option>
                  <option value="seller">Seller</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="panel">Upload Image</div>
              <input type="file" name="newPhoto" required>
              <p class="help-block">Maximum size 200MB</p>
              <img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="100px">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>