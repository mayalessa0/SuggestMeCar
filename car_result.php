<!DOCTYPE html>
<html>
<head>
    
    <script src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="car_result.css">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat|Sofia|Trirong|Josefin+Sans:wght@100&display=swap' >
    
    
    <title>Search Result</title>
    
    <script>
    function moveToCarDetail(car_id) {
        location.href ="car_details.php?car_id=" + car_id ;
    }      
</script>

</head>

<body>
    <!-- to wrap nav and header togather-->
    <div id="wrap">
        <div id="header">
            <!--page header-->
            <h1>SUGGEST ME A CAR</h1>
            <!--left nivegation menue -->
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="index.html">Home</a>
                <a href="javascript:openLoginForm();">Log In</a>
                <a href="about.html">About</a>
            </div>
            <span style="font-size:30px;cursor:pointer; margin-left:30px" onclick="openNav()">&#9776;</span>
            <script>
            function openNav() {
              document.getElementById("mySidenav").style.width = "250px";
            }
            
            function closeNav() {
              document.getElementById("mySidenav").style.width = "0";
            }
            </script>
        </div>
    </div>
    <br/><br/>
    <hr /> <!-- horizantal line-->

    <h2>Search Result .. here you are!</h2>
    
    <!-- create a popup form with CSS and JavaScript for login-->  
    <div class="form-popup" id="loginForm">
      <form action="login.php" class="form-container" method="get">
        <h1>Login</h1>
    
        <label for="email"><b>Username</b></label>
        <input type="text" placeholder="Enter your username" name="username" required>
    
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter your password" name="psw" required>
    
        <button type="submit" class="btn">Login</button>
        <button type="button" class="btn" onclick="closeLoginForm()">Close</button>
      </form>
    </div>
 
    <?php 
    require "init.php";
    
    session_start();// resume session 
    
    
    //loop until last element in the array
    foreach ($_SESSION['results'] as $row)
    {
        $car_id= $row["car_id"]; 

        $get_car_pic = "SELECT `car_image` FROM `car_image` WHERE `car_id`=$car_id ";
            
        // run query
        $result = mysqli_query($con, $get_car_pic);
        $fetch_car_picture= mysqli_fetch_assoc($result);
        

        $car_picture = $fetch_car_picture["car_image"];
        $_SESSION['car_info'] =$row;
        echo "<div class='CarContainer'>";
        echo "<img  class='car-img' src= $car_picture onclick='moveToCarDetail($car_id)'>";
        
        // get element by his tag
        $brand_name= $row["brand_name"];
        $car_name= $row["car_name"];
        $price= number_format($row["price"]);
        $style_id= $row["style_name"];
        $model = $row["model"];
        $engine_id= $row["engine_type"];

        echo '<div class="car-name">'.$brand_name.' <span style="color:#0e3c68;">'.$car_name.'</span></div>';
        echo "</br>";
        
        echo "Price: From <u>". $price ." SR </u> </br>"; 
        
        echo "Style: ".$style_id."</br>";
        
        echo "Model: ".$model."</br>";
        
        echo "Engine type: ".$engine_id."</br>";
    
        
        echo "</div>";
    }
    ?>
    
    
    <footer>
        <hr /> 
        <p style="font-size :12px; margin:20px;"> Copyright © King saud university - 
        Graduation Project of Information System department for 1443-1444 / 2021-2022</p>
        
    </footer>
</body>
</html>