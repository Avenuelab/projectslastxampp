        <!-- panel-body  -->
        <div class="panel-body">
            <div class="row">       
<h4>Personal info</h4>
                <div class="col-md-12 col-sm-12 already-registered-login">

<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

                    <form class="register-form" role="form" method="post">
<div class="form-group">
                        <label class="info-title" for="name">Name<span>*</span></label>
                        <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['name'];?>" id="name" name="name" required="required">
                      </div>



                        <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
             <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="<?php echo $row['email'];?>" readonly>
                      </div>
                      <div class="form-group">
                        <label class="info-title" for="Contact No.">Contact No. <span>*</span></label>
                        <input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" required="required" value="<?php echo $row['contactno'];?>"  maxlength="10">
                      </div>
                      <button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Update</button>
                    </form>
                    <?php } ?>
                </div>  
                <!-- already-registered-login -->       

            </div>          
        </div>
        <!-- panel-body  -->

    </div><!-- row -->
</div>