
<?php
require "init.php";

$Car_ID = $_POST['car_id']; 

$suspend_car = "UPDATE `car_info` SET `status`='out of stock' WHERE `car_id`=$Car_ID";
    
$run_qeray = mysqli_query($con, $suspend_car);
    
if($run_qeray){
    echo '<script type="text/javascript">
        alert("this car has been suspended permanently");
        window.location.href = "admin_home.html";
         </script>'; 
}
else{
     
    echo mysqli_error($conn);
    die();
}
?>
