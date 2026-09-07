<?php
 include('../role/config.php');
include('../role/admin/middleware.php'); 
require_once('../includes/load.php');
?>
  <?php
  $user_id = (int)$_GET['id'];
  if(empty($user_id)):
    echo '<meta http-equiv="refresh" content="2;URL=home">';
  else:
    $user_p = find_by_id('users',$user_id);
  endif;
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-4">
       <div class="panel profile">
         <div class="jumbotron text-center bg-red">
            <img class="img-circle img-size-2" src="uploads/users/<?php echo $user_p['image'];?>" alt="">
           <h3><?php echo first_character($user_p['name']); ?></h3>
         </div>
        <?php if( $user_p['id'] === $user['id']):?>
         <ul class="nav nav-pills nav-stacked">
          <li><a href="edit_account.php"> <i class="glyphicon glyphicon-edit"></i> Edit profile</a></li>
         </ul>
       <?php endif;?>
       </div>
   </div>
</div>
<?php include_once('layouts/footer.php'); ?>
