<!doctype html>
<html>
 <head>
   <!-- CSS -->
   <link href='photobox/photobox.css' rel='stylesheet' type='text/css'>
   <link href='style.css' rel='stylesheet' type='text/css'>

   <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script type="text/javascript" src="photobox/jquery.photobox.js"></script>
 </head>
 <body>

   <div class='container'>
       <h1>Image Gallery</h1>
    <div class="gallery">
 
    <?php 
    // Image extensions
    $image_extensions = array("png","jpg","jpeg","gif");

    // Target directory
    $dir = 'images/';
    if (is_dir($dir)){
 
      if ($dh = opendir($dir)){
        $count = 1;

        // Read files
        while (($file = readdir($dh)) !== false){

          if($file != '' && $file != '.' && $file != '..'){
 
            // Thumbnail image path 
            $thumbnail_path = "images/thumbnail/".$file;

            // Image path
            $image_path = "images/".$file;
 
            $thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);
            $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);

            // Check its not folder and it is image file
            if(!is_dir($image_path) && 
                in_array($thumbnail_ext,$image_extensions) && 
                in_array($image_ext,$image_extensions)){
       ?>
                <!-- Image -->
                <a href="<?= $image_path; ?>">
                  <img src="<?= $thumbnail_path; ?>">
                </a>
       <?php
                // Break
                if( $count%4 == 0){
       ?>
                   <div class="clear"></div>
       <?php 
                }
                $count++;
             }
          }
 
         }
           closedir($dh);
        }
      }
      ?>
      
      </div>
    </div>
<div class="container2">
<a href="upload.php"id="uploadbtn" ><img src="gallerybtn.png"> </a>
</div>
     <!-- Script -->
     <script type='text/javascript'>
        $(document).ready(function(){
             $('.gallery').photobox('a',{ time:0 });
            
        });
        </script>
 
  </body>
</html>
