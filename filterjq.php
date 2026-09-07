<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="jqfilter.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <section>
        <ul>
            <li class="list active" data-filter="all">All</li>
            <li class="list" data-filter="mobile">mobile</li>
            <li class="list" data-filter="camera">Camera</li>
            <li class="list" data-filter="watch">Watch</li>
            <li class="list" data-filter="shoes">Shoes</li>
            <li class="list" data-filter="headphone">Headphone</li>            
        </ul>
        <div class="product">

            <div class="itemBox mobile"><img src="img_test/mobile1.jpg">  </div>
            <div class="itemBox camera"><img src="img_test/camera1.jpg">  </div>
            <div class="itemBox watch"><img src="img_test/watch1.jpg">  </div>
            <div class="itemBox shoes"><img src="img_test/shoe1.jpg">  </div>
            <div class="itemBox headphone"><img src="img_test/headphone1.jpg">  </div>
            <div class="itemBox mobile"><img src="img_test/mobile2.jpg">  </div>
            <div class="itemBox camera"><img src="img_test/camera2.jpg">  </div>
            <div class="itemBox watch"><img src="img_test/watch2.jpg">  </div>
            <div class="itemBox shoes"><img src="img_test/shoe2.jpg">  </div>
            <div class="itemBox headphone"><img src="img_test/headphone2.jpg">  </div> 
            <div class="itemBox mobile"><img src="img_test/mobile3.jpg">  </div>
            <div class="itemBox camera"><img src="img_test/camera3.jpg">  </div>
            <div class="itemBox watch"><img src="img_test/watch3.jpg">  </div>
            <div class="itemBox shoes"><img src="img_test/shoe3.jpg">  </div>
            <div class="itemBox headphone"><img src="img_test/headphone3.jpg">  </div>
            <div class="itemBox mobile"><img src="img_test/mobile4.jpg">  </div>
            <div class="itemBox mobile"><img src="img_test/mobile5.jpg">  </div>
            <div class="itemBox watch"><img src="img_test/mobile4.jpg">  </div>
            <div class="itemBox shoes"><img src="img_test/shoe4.jpg">  </div>
            <div class="itemBox headphone"><img src="img_test/headphone4.jpg">  </div>      
        </div>
    </section>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> 
   
<script type="text/javascript">
 $(document).ready(function(){
    $('.list').click(function(){
        const value=$(this).attr('data-filter');
        if (value == 'all') {

            $('.itemBox').show('1000');

        }
        else{
             $('.itemBox').not('.'+value).hide('1000');
             $('.itemBox').filter('.'+value).show('1000');
        }

    });

 })   

</script>

</body>
</html>