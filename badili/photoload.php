<?php
include('../role/config.php');
include('../role/admin/middleware.php'); 
include_once '../_inc/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/favicon.ico" type="image/ico" />

    <title>Washa Sacco</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Washa Sacco</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/team/13.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
              <?php include_once 'tmp/nav.html'?>
            <!-- /sidebar menu -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit Savings</h3>
        </div>
      </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">

                    <?php


                    function generate_thumb_now($field_name = '',$target_folder ='',$file_name = '', $thumb = FALSE, $thumb_folder = '', $thumb_width = '',$thumb_height = ''){
                             //folder path setup
                             $target_path = $target_folder;
                             $thumb_path = $thumb_folder;   
                             //file name setup
                        $filename_err = explode(".",$_FILES[$field_name]['name']);
                        $filename_err_count = count($filename_err);
                        $file_ext = $filename_err[$filename_err_count-1];
                         if($file_name != '')
                         {
                            $fileName = $file_name.'.'.$file_ext;
                          }
                        else
                        {
                            $fileName = $_FILES[$field_name]['name'];
                        }   
                        //upload image path
                        $upload_image = $target_path.basename($fileName);   
                        //upload image
                        if(move_uploaded_file($_FILES[$field_name]['tmp_name'],$upload_image))
                        {
                             //thumbnail creation
                            if($thumb == TRUE)
                            {
                                $thumbnail = $thumb_path.$fileName;
                                list($width,$height) = getimagesize($upload_image);
                                $thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
                                switch($file_ext){
                                    case 'jpg':
                                        $source = imagecreatefromjpeg($upload_image);
                                        break;
                                    case 'jpeg':
                                        $source = imagecreatefromjpeg($upload_image);
                                        break;
                                    case 'JPG':
                                        $source = imagecreatefromjpeg($upload_image);
                                        break;                                        
                                    case 'png':
                                        $source = imagecreatefrompng($upload_image);
                                        break;
                                    case 'gif':
                                        $source = imagecreatefromgif($upload_image);
                                         break;
                                    default:
                                        $source = imagecreatefromjpeg($upload_image);
                                }
                           imagecopyresized($thumb_create, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width,$height);
                                switch($file_ext){
                                    case 'jpg' || 'jpeg':
                                        imagejpeg($thumb_create,$thumbnail,100);
                                        break;
                                    case 'JPG':
                                        imagejpeg($thumb_create,$thumbnail,100);
                                        break;                                        
                                    case 'png':
                                        imagepng($thumb_create,$thumbnail,100);
                                        break;
                                    case 'gif':
                                        imagegif($thumb_create,$thumbnail,100);
                                         break;
                                    default:
                                        imagejpeg($thumb_create,$thumbnail,100);
                                }
                            }
                            return $fileName;
                         }
                        else
                        {
                            return false;
                         }
                        }
                        if(!empty($_FILES['image']['name'])){ 
                        $loc=$_POST['loc'];      
                        $upload_img = generate_thumb_now('image','../images/gallery/'.$loc.'/','',TRUE,'../images/gallery/'.$loc.'/thumb/','400','320');

                        //full path of the thumbnail image
                        $thumb_src = '../images/gallery/'.$loc.'/thumb/'.$upload_img;

                        //set success and error messages
                        $message = $upload_img?"<span style='color:#008000;'>Image thumbnail created successfully.</span>":"<span style='color:#F00000;'>Some error occurred, please try again.</span>";

                        }else{

                        //if form is not submitted, below variable should be blank
                        $thumb_src = '';
                        $message = '';
                        }
                        ?>

                        <html>
                        <h1>Image upload</h1>
                         <body>
                         <div class="messages"><?php echo $message; ?></div>
                          <form method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label>Select Destination Folder</label>
                                <select class="form-control" name="loc">
                                    <option value=""></option>
                                    <option value="agm">AGM</option>
                                    <option value="csr">CSR</option>
                                    <option value="events">EVENT</option>
                                    <option value="washa">OTHER</option>

                                </select>
                                <hr>
                                <br>
                              <input type="file" name="image" class="form-control " />
                              <hr>
                              <input type="submit" name="submit" value="Upload" class="btn btn-success" />
                          </div>
                        </form>
                        <?php if($thumb_src != ''){ ?>
                        <div class="gallery">
                        <ul>
                            <li><img src="<?php echo $thumb_src; ?>" alt=""></li>
                        </ul>
                       </div>
                        <?php } ?>
                  </div><!-- dont touch -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
      <footer>
        <div class="pull-right">
          Copyright Taraknishi Computer Solutions
        </div>
        <div class="clearfix"></div>
      </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
