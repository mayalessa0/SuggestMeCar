<?php

require "init.php";
 
$Car_ID = $_POST['car_id'];   
$Car_name = $_POST['car-name'];
$Brand = $_POST['Brand'];
$Price = $_POST['Price'];
$Model = $_POST['model'];
$Cylinders = $_POST['cylinders'];
$Engine = $_POST['engine'];
$Body = $_POST['Body'];
$warranty_detail = $_POST['warranty_detail'];
$Color = $_POST['color'];
$Location = $_POST['location'];
$source_link = $_POST['source_link'];
$Features = $_POST['Features'];
$Preferences = $_POST['Preference'];


    
$update_car_info=    "UPDATE `car_info` SET `car_name`='$Car_name',`price`='$Price', `brand_id`=(SELECT `id` FROM `car_brand` WHERE `brand_name`='$Brand'),`style_id`=(SELECT `id` FROM `car_body_style` WHERE `style_name`='$Body'),`model`=$Model,`engine_id`=(SELECT `id` FROM `car_engine_type` WHERE `engine_type`='$Engine'),`number_of_cylinders`=$Cylinders,`source_link`='$source_link',`location`='$Location',`color`='$Color',`warranty_detail`='$warranty_detail' WHERE `car_id`= $Car_ID";
  

// run query
$result = mysqli_query($con, $update_car_info);

if ($result) { 

    if (count($Preferences)!=0){
    
        $comfort='no';
        $fuel_economy='no';
        $perfomance='no';
        $assa='no';
        $stylish ='no';
        $safety ='no';
        $seater ='no';
        
        foreach ($Preferences as $preference){ 
            switch ($preference){
                case "comfort":{
                    $comfort='yes';
                    break;}
                case "fuel_economy":{
                    $fuel_economy='yes';
                    break;}
                case "perfomance":{
                    $perfomance='yes';
                    break;}
                case "after_sale_support_availability":{
                    $assa='yes';
                    break;}
                case "stylish":{
                    $stylish ='yes';
                    break;}
                case "safety":{
                    $safety ='yes';
                    break;}
                case "7seater":{
                    $seater ='yes';
                    break;}
            }
        }
        
        
        $update_pref=" UPDATE `car_preference` SET `comfort`='$comfort',`safety`='$safety',`fuel_economy`='$fuel_economy',`perfomance`='$perfomance', `after_sale_support_availability`='$assa',`stylish`='$stylish' , `7seater`='$seater' WHERE `car_id`= '$Car_ID'";
        
        $result2 = mysqli_query($con, $update_pref);
        
      
        
    }
    
    
    if(count($Features)!=0){
        $keyless_entry="no";
        $airbags ="no";
        $abs="no";
        $ps ="no";
        $rvc = "no";
        $bluetooth ="no";
        $smc ="no";
        $climate_control="no";
        $automatic="no";
        $off_road="no";
        $sun_roof ="no";
        
        foreach ($Features as $feature){ 
            switch ($feature){
                case "keyless_entry":{
                    $keyless_entry="yes";
                    break;}
                case "airbags":{
                    $airbags ="yes";
                    break;}
                case "abs":{
                    $abs="yes";
                    break;}
                case "parking_sensors":{
                    $ps ="yes";
                    break;}
                case "rear_view_camera":{
                    $rvc = "yes";
                    break;}
                case "bluetooth":{
                    $bluetooth ="yes";
                    break;}
                case "steering_mounted_controls":{
                     $smc ="yes";
                    break;}
                case "climate_control":{
                    $climate_control = "yes";
                    break;}
                case "automatic":{
                    $automatic="yes";
                    break;}
                case "off_road":{
                     $off_road="yes";
                    break;}
                case "sun_roof":{
                     $sun_roof="yes";
                    break;}
            }
        }
       
       
       
        $update_features="UPDATE `car_features` SET `keyless_entry`='$keyless_entry',`airbags`='$airbags',`abs`='$abs',`parking_sensors`='$ps',`rear_view_camera`='$rvc',`bluetooth`='$bluetooth',`steering_mounted_controls`='$smc',`climate_control`='$climate_control',`off_road`='$off_road',`sun_roof`='$sun_roof',`automatic`='$automatic' WHERE `car_id`= '$Car_ID'";
        
        // run query
        $result2 = mysqli_query($con, $update_features);
        
    }
    
    $target_dir = "car_picture/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   
    
    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
       
        $update_image= "UPDATE `car_image` SET `car_image`='$target_file' WHERE `car_id`= '$Car_ID'";
    
        // run query
        $result4 = mysqli_query($con, $update_image);
        
        echo '<script type="text/javascript">
            alert("Car Has Been Updated Successfully");
            window.location.href = "update_car.php";
         </script>'; 
        

    }
    else{
        echo '<script type="text/javascript">
            alert("Car Has Been Updated Successfully");
            window.location.href = "update_car.php";
         </script>'; 
    }



}else{//  if there is no result

 // in case that no matching data found, show error message through javascript
    echo '<script type="text/javascript">
            alert("Failed");
            window.location.href = "update_car.php";
         </script>'; 

}

?>