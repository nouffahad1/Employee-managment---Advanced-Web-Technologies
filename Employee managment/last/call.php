<?php
    //meal id
    $Id= $_POST['id'];
    header("Content-Type: application/json");
    
    $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://localhost/PhpProject2last/new.php?id='.$Id,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    
//    //curl
//    $curl = curl_init();
//    curl_setopt($curl,CURLOPT_URL, "http://localhost/MealForYou2/new.php?mealId=".$mealId);
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);// not return 1
//    $response = curl_exec($curl);
//    curl_close($curl);
//    echo $response;
 

?>
