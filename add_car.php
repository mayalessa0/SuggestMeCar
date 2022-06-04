<?php

require "init.php";
    
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


    
    
  
$insert_car_info = "INSERT INTO `car_info`( `car_name`, `price`,  `brand_id`, `style_id`, `model`, `engine_id`, `number_of_cylinders`, `source_link`, `location`, `color`, `warranty_detail`) VALUES ('$Car_name', $Price,(SELECT `id` FROM `car_brand` WHERE `brand_name`='$Brand'),(SELECT `id` FROM `car_body_style` WHERE `style_name`='$Body'), $Model, (SELECT `id` FROM `car_engine_type` WHERE `engine_type`='$Engine') ,$Cylinders ,'$source_link' ,'$Location' ,'$Color' ,'$warranty_detail')";



// run query
$result = mysqli_query($con, $insert_car_info);
$car_id = mysqli_insert_id($con);

//check if there is a result
if ($result) { 
      
    if (count($Preferences)!=0){
    
        $comfort='no';
        $fuel_economy='no';
        $perfomance='no';
        $assa='no';
        $stylish ='no';
        $safety ='no';
        $seater ='no';
        
        //switch to figure out which perefrence that selected by user
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
        
        $insert_pref=" INSERT INTO `car_preference`(`car_id`, `comfort`, `safety`, `fuel_economy`, `perfomance`, `after_sale_support_availability`, `stylish`, `7seater`) VALUES ($car_id,'$comfort' ,'$safety', '$fuel_economy','$perfomance' ,'$assa' ,'$stylish','$seater')";
        
         // run query
        $result2 = mysqli_query($con, $insert_pref);
        
        if($result2){
             echo "insert_pref running";
        }
        
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
       
        $inser_features="INSERT INTO `car_features`(`car_id`, `keyless_entry`, `airbags`, `abs`, `parking_sensors`, `rear_view_camera`, `bluetooth`, `steering_mounted_controls`, `climate_control`, `off_road`, `sun_roof`, `automatic`) VALUES ($car_id,'$keyless_entry', '$airbags','$abs','$ps', '$rvc','$bluetooth','$smc','$climate_control', '$off_road','$sun_roof','$automatic')";
        
        // run query
        $result2 = mysqli_query($con, $inser_features);
         if($result2){
             echo "inser_features running";
        }
    }
    
    $target_dir = "car_picture/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "WARNING, Car picture already exists.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "WARNING, Car picture is too large.";
        $uploadOk = 0;
    }
    
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "WARNING, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "WARNING, Car picture was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            $inser_features="INSERT INTO `car_image`(`car_id`, `car_image`) VALUES ($car_id,'$target_file')";
        
            // run query
            $result4 = mysqli_query($con, $inser_features);
            
            echo '<script type="text/javascript">
            alert("Car has been inserted to Database");
            window.location.href = "admin_home.html";
         </script>'; 
        } else {
            echo "WARNING, there was an error uploading car picture.";
        }
    }


}else{//  if there is no result

 // in case that no matching data found, show error message through javascript
    echo '<script type="text/javascript">
            alert("Failed");
            window.location.href = "add_car.html";
         </script>'; 

}


?>