<!doctype html>
<html>
<head>
<link href='style.css' rel='stylesheet' type='text/css'>
</head>
 <body>
   <?php
   if(isset($_POST['upload'])){

     // File name
     $filename = $_FILES['imagefiles']['name'];
 
     // Valid extension
     $valid_ext = array('png','jpeg','jpg');

     // Location
     $location = "images/".$filename;
     $thumbnail_location = "images/thumbnail/".$filename;

     // file extension
     $file_extension = pathinfo($location, PATHINFO_EXTENSION);
     $file_extension = strtolower($file_extension);

     // Check extension
     if(in_array($file_extension,$valid_ext)){ 
 
       // Upload file
       if(move_uploaded_file($_FILES['imagefiles']['tmp_name'],$location)){

         // Compress Image
         compressImage($_FILES['imagefiles']['type'],$location,$thumbnail_location,60);

         echo "Successfully Uploaded";
       }

     }
   }

   // Compress image
   function compressImage($type,$source, $destination, $quality) {

     $info = getimagesize($source);

     if ($type == 'image/jpeg') 
       $image = imagecreatefromjpeg($source);

     elseif ($type == 'image/gif') 
       $image = imagecreatefromgif($source);

     elseif ($type == 'image/png') 
       $image = imagecreatefrompng($source);

     imagejpeg($image, $destination, $quality);

   }

   ?>
   <div class="main">
       <div class="main1">
 <div>
 <h1>Add Images To Your Photo Gallery</h1>
 </div>
 <div class=form>
   <!-- Upload form -->
   <form method='post' action='' enctype='multipart/form-data'>
     <input type='file' name='imagefiles'>
     <input type='submit' value='Upload' name='upload'> 
   </form>
   <a href="index.php"id="uploadbtn" ><img src="gallery.png"> </a>
</div>
</div>
</div>

 </body>
</html>