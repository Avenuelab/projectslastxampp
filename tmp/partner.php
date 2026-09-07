   <?php
include_once '_inc/connect.php';
$parSql="SELECT * FROM partner";
$parQuery=mysqli_query($conn,$parSql);

?>
   <section class="border-top bg-theme-colored4">
      <div class="container pb-20 pt-20">
        <div class="row">
          <div class="col-lg-12">
            <div class="tm-sc-clients tm-sc-clients-carousel owl-dots-light-skin">
              <div class="owl-carousel owl-theme tm-owl-carousel-6col" data-autoplay="true" data-loop="true" data-duration="6000" data-smartspeed="300" data-margin="30" data-stagepadding="0" data-laptop="4">
                <?php while ($rowPar=mysqli_fetch_array($parQuery) ) { ?>
                  <div class="item"> <a target="_blank" href="<?php echo $rowPar ['link']?>"> 
                    <img src='<?php echo $rowPar ['pic_path'].$rowPar ['pic']?>' alt='Image' /> </a>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>