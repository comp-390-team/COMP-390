<?php
    include 'production-include.php';

    $table_to_load=$_GET['q'];
    $from=$_GET['from'];
    $to=$_GET['to'];
    
    if ($table_to_load==1)
        $product->loadProductionRecord($from,$to);
        else
        $product->loadDairy();

 ?>
