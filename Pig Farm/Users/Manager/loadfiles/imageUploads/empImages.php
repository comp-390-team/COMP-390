<?php
 require '../../../../Database/DB.php';
 require '../../../../Persons/FarmManager.php';

 $manager=new FarmManager();

// session_start();

for($i=0; $i<count($_FILES['file']['name']); $i++){

    $Employee_Id=str_replace ("/","",$_GET['id']);
    $target_path = "../profiles/images/".$Employee_Id."/";

    $time= time();

    $ext = explode('.', basename( $_FILES['file']['name'][$i]));

    $image_name=str_shuffle($time.$Employee_Id."$i");

    $target_path = $target_path.$image_name.".". $ext[count($ext)-1];

    if (!is_dir("../profiles/images/".$Employee_Id."/")) {
          mkdir("../profiles/images/".$Employee_Id."/");
    }

    if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
        echo "The file has been uploaded successfully <br />";

        $manager->updateProfilePicture($_GET['id'],$image_name.".".$ext[count($ext)-1]);
        // $_SESSION['profile']= $image_name.".".$ext[count($ext)-1];

    } else{
        echo "There was an error uploading the file, please try again! <br />";
    }
}
 ?>
