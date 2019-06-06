<?php

session_start();

for($i=0; $i<count($_FILES['file']['name']); $i++){
    $target_path = "../../../../../pigs/pigsToSell/".$_SESSION['pig_id']."/";
    $ext = explode('.', basename( $_FILES['file']['name'][$i]));
    $target_path = $target_path . $_SESSION['pig_id']."_$i." . $ext[count($ext)-1];

    if (!is_dir("../../../../../pigs/pigsToSell/".$_SESSION['pig_id']."/")) {
          mkdir("../../../../../pigs/pigsToSell/".$_SESSION['pig_id']."/");
    }

    if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
        echo "The file has been uploaded successfully <br />";
    } else{
        echo "There was an error uploading the file, please try again! <br />";
    }
}
 ?>
