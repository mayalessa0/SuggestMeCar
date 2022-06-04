<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
    <!-- links that import css file and fonts resources-->
    <link rel="stylesheet" type="text/css" href="car_details.css">
    <link rel="stylesheet" href="login.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat|Sofia|Trirong|Josefin+Sans:wght@100&display=swap' >
    <script src="scripts.js"></script>

    <!--page title that showen on tap -->
    <title>More Details</title>

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
            
        </div>
    </div>
    <br/><br/>
    <hr /> <!-- horizantal line-->
    <h2>More detiles about your car</h2>
     <?php 
        $car_id = $_GET['car_id'];
        

        require "init.php";
        
         $get_car_info = "SELECT *, (SELECT `brand_name` FROM `car_brand` WHERE `id`= `brand_id` ) AS brand_name, (SELECT `style_name` FROM `car_body_style` WHERE `id`=`style_id`) AS style_name , (SELECT `engine_type` FROM `car_engine_type` WHERE `id`=`engine_id`) AS engine_type FROM `car_info` WHERE  `car_id`= $car_id ";
         
        $result1 = mysqli_query($con, $get_car_info);
        $row= mysqli_fetch_assoc($result1);
        $brand_name= $row["brand_name"];
        $car_name= $row["car_name"];
        $price= number_format($row["price"]);
        $style_id= $row["style_name"];
        $model = $row["model"];
        $engine_id= $row["engine_type"];
        
        
        $get_car_pic = "SELECT `car_image` FROM `car_image` WHERE `car_id`=$car_id ";
        $result2 = mysqli_query($con, $get_car_pic);
        $fetch_car_picture= mysqli_fetch_assoc($result2);
        $car_picture = $fetch_car_picture["car_image"];
        
          
        $get_features_query= "SELECT * FROM `car_features` WHERE `car_id` =$car_id ";
        $result3 = mysqli_query($con, $get_features_query);
        $features= mysqli_fetch_assoc($result3);


        $get_pref_query= "SELECT * FROM `car_preference` WHERE `car_id` = $car_id ";
        $result4 = mysqli_query($con, $get_pref_query);
        $prefrence= mysqli_fetch_assoc($result4);
        

        echo "<div class='CarContainer'>";

        echo '<div class="car-name">'.$brand_name.' <span style="color:#0e3c68;">'.$car_name.'</span></div>';

        echo "<p><img  class='car-img' src= $car_picture ></p></br>";
        
        echo "<b>Price:</b> From <u>". $price ." SR </u> </br></br>"; 
        
        echo "<b>Style:</b> ".$style_id."</br></br>";
        
        echo "<b>Model:</b> ".$model."</br></br>";
        
        echo "<b>Engine type:</b> ".$engine_id."</br></br>";
        
        echo "<b>Source Link:</b> <a href=".$row["source_link"].">click here</a> </br></br>";
        
        echo "<b>Location:</b> ".$row["location"]."</br></br>";
        
        echo "<b>Color:</b> ".$row["color"]."</br></br>";
        
        echo "<b>Warranty:</b></br>".$row["warranty_detail"]."</br></br>";
        
      
        
        echo "</br>"."<b>Features:</b> "."</br>";
        if($features["keyless_entry"] == "yes"){
        echo "- Keyless Entry </br>";}
        
        if($features["airbags"] == "yes"){
        echo "- Airbags </br>";}
        
        if($features["abs"] == "yes"){
        echo "- ABS </br>";}
        
        if($features["parking_sensors"] == "yes"){
        echo "- Parking Sensors</br>";}
        
        if($features["rear_view_camera"] == "yes"){
        echo "- Rear View Camera </br>";}
        
        if($features["bluetooth"] == "yes"){
        echo "- Bluetooth </br>";}
        
        if($features["steering_mounted_controls"] == "yes"){
        echo "- Steering Mounted Controls </br>";}
        
        if($features["climate_control"] == "yes"){
        echo "- Climate Control  </br>";}
        
        if($features["off_road"] == "yes"){
        echo "- Off Road:  </br>";}
        
        if($features["sun_roof"] == "yes"){
        echo "- Sun Roof </br>";}
        
        if($features["automatic"] == "yes"){
        echo "- Automatic </br>";}
        
        
        
        
        echo "</br>"."<b>Prefrences:</b> "."</br>";
        
         if($prefrence["comfort"] == "yes"){
        echo "- Comfort </br>";}
        
         if($prefrence["safety"] == "yes"){
        echo "- Safety </br>";}
        
         if($prefrence["fuel_economy"] == "yes"){
        echo "- Fuel Economy </br>";}
        
        
         if($prefrence["perfomance"] == "yes"){
        echo "- Perfomance </br>";}
        
         if($prefrence["after_sale_support_availability"] == "yes"){
        echo "- After Sale_support Availability </br>";}
        
         if($prefrence["stylish"] == "yes"){
        echo "- stylish </br>";}
        
         if($prefrence["7seater"] == "yes"){
        echo "- 7 seater </br>";}
        
        echo "</div>";
        ?>
    
    

    
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
    

    
    <footer>
        <hr /> 
        <p style="font-size :12px; margin:20px;"> Copyright © King saud university - 
        Graduation Project of Information System department for 1443-1444 / 2021-2022</p>
        
    </footer>

</body>
</html>