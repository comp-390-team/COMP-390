<?php
 $image =$_POST['image'];
 $name  =$_POST['name'];

 $location="upload/";

 $image_parts=explode(";base64,",$image);

 $image_base64=base64_decode($image_parts[1]);

 $file=$location.$name.".jpeg";

 file_put_contents($file,$image_base64);

 ?>
