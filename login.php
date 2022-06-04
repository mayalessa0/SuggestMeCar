

<?php
session_start();

require "init.php";

$username = $_GET['username'];
$password = $_GET['psw'];    

$validation_query = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";

//run the query
$result1 = mysqli_query($con, $validation_query);

if (mysqli_num_rows($result1) == 0) { 
    
    // in case that user enter incorrect data, show error message through javascript
    echo '<script type="text/javascript">
        alert("Failed Login, Please ensure that your username or password entered correctly");
        window.location.href = "index.html";
         </script>'; 

}else{// check if there is result
    // show successed login message by javascript

    echo '<script type="text/javascript">
        alert("Successful login: Welcome to Suggest Me A Car System Administration.");
        window.location.href = "admin_home.html";
         </script>'; 

}
?>

