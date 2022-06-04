  
<!DOCTYPE html>
<html>
    
    <head><meta charset="utf-8">
    <!-- links that import css file and fonts resources-->
    <link rel="stylesheet" href="update&delete_car.css">
    <link rel="stylesheet" href="login.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat|Sofia|Trirong|Josefin+Sans:wght@100&display=swap' >
    <script src="scripts.js"></script>

    <!--page title that showen on tap -->
    <title>Update Car</title>

</head>
	<body>
	     <!-- to wrap nav and header togather-->
    <div id="wrap">
        <div id="header">
            
            <!--page header-->
            <h1>UPDATE CAR</h1>
            
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
    
    <hr /> 
    
    <br/>
	    <form method="POST">
            <?php
            require "init.php";
            
            $get_car_name = "SELECT * FROM `car_info` WHERE `status`='available'";
            
            $run_qeray = mysqli_query($con, $get_car_name);
            
            $fetch_result= mysqli_fetch_all($run_qeray,MYSQLI_ASSOC);
            
            echo " <label for='carName' >Car Name</label> <br/>";
            echo "<select name='carName' id='carName' onChange='update()'>";
            
            foreach($fetch_result as $row){
            $car_name = $row["car_name"];
            $car_id = $row["car_id"];
            echo "<option value=" . $car_id  .  " >" . $car_name ." - ".$car_id."</option>";
            
            }
            echo "<select/>";?>
            
            <input  type="hidden" name ="car_id" id="car_id">
            
            <input style="margin-left:20px;" type="submit" value="Get Car Info"/>
              </p>
    </form>
   
    
    <?php
    $get_car_name = "SELECT *, (SELECT `brand_name` FROM `car_brand` WHERE `id`= `brand_id` ) AS brand_name, (SELECT `style_name` FROM `car_body_style` WHERE `id`=`style_id`) AS style_name , (SELECT `engine_type` FROM `car_engine_type` WHERE `id`=`engine_id`) AS engine_type FROM `car_info`  WHERE `car_id`= ".$_POST['car_id'];
    
    $run_qeray = mysqli_query($con, $get_car_name);
    
    $row= mysqli_fetch_assoc($run_qeray);
    $brand_name= $row["brand_name"];
    $car_name= $row["car_name"];
    $price= $row["price"];
    $style_id= $row["style_name"];
    $model = $row["model"];
    $engine_id= $row["engine_type"];
    $cylinders= $row["number_of_cylinders"];
    $color= $row["color"];
    $warranty_detail= $row["warranty_detail"];
    $location = $row["location"];
    $source_link = $row ["source_link"];
    
     $get_car_pic = "SELECT `car_image` FROM `car_image` WHERE `car_id`=" .$_POST['car_id'] ;
    $result2 = mysqli_query($con, $get_car_pic);
    $fetch_car_picture= mysqli_fetch_assoc($result2);
    $car_picture = $fetch_car_picture["car_image"];
    
      
    $get_features_query= "SELECT * FROM `car_features` WHERE `car_id` =  " .$_POST['car_id'] ;
    $result3 = mysqli_query($con, $get_features_query);
    $features= mysqli_fetch_assoc($result3);


    $get_pref_query= "SELECT * FROM `car_preference` WHERE `car_id` = " .$_POST['car_id'] ;
    $result4 = mysqli_query($con, $get_pref_query);
    $prefrence= mysqli_fetch_assoc($result4);?>
    
    <form action="update_query.php" method="post" enctype="multipart/form-data">
        
        <input  type="hidden" name ="car_id" id="car_id" value=<?php echo $_POST['car_id'] ?>>
    
    <br/><br/>
        <label>Car Name:</label>
        <br/>
        <input type="text" name="car-name" value="<?php echo $car_name?>"required>
        <br/><br/>
        
        <label>Brand:</label>
        <br/>
        <select id="Brand" name="Brand" required>
            <option value= <?php echo $brand_name ?> selected><?php echo $brand_name ?></option>
            <option value="Toyota">Toyota</option>
            <option value="Nissan">Nissan</option>
            <option value="Honda">Honda</option>
            <option value="Mazda">Mazda</option>
            <option value="Lexus">Lexus</option>
            <option value="Infinity">Infinity</option>
            <option value="KIA">KIA</option>
            <option value="Hyundai">Hyundai</option> 
            <option value="Genesis">Genesis</option>
            <option value="Ford">Ford</option>
            <option value="Lincolin">Lincolin</option>
            <option value="Chevrolet">Chevrolet</option>
            <option value="GMC">GMC</option>
            <option value="Cadillac">Cadillac</option>
            <option value="Dodge">Dodge</option>
            <option value="Chrysler">Chrysler</option> 
            <option value="Jeep">Jeep</option>
            <option value="Changan">Changan</option>
            <option value="Geely">Geely</option>
            <option value="MG">MG</option>
            <option value="Haval">Haval</option>
            <option value="FAW">FAW</option>
            <option value="BMW">BMW</option>
            <option value="Mercedes">Mercedes</option> 
            <option value="Audi">Audi</option>
            <option value="Porsche">Porsche</option>
            <option value="Volkswagen">Volkswagen</option>
            <option value="Ferrari">Ferrari</option>
            <option value="Lamborghini">Lamborghini</option>
            <option value="Maserati">Maserati</option> 
            <option value="Renault">Renault</option>
            <option value="Bugatti">Bugatti</option>
            <option value="Mclaren">Mclaren</option>
            <option value="Bently">Bently</option>
            <option value="Rolls Royce">Rolls Royce</option>
            <option value="Land rover">Land Rover</option>
            <option value="Jaguar">Jaguar</option>
            <option value="Aston martin">Aston martin</option>
            <option value="Jetour">Jetour</option>
        </select>        <br/><br/>
        
        
        <label>Price:</label>
        <br/>
        <input type="number" name="Price" value = "<?php echo $price ?>" required >
        <br/><br/>
        
        <p><label for="model">Model:</label> 
        <br/>
        <select id="model" name="model" required>
            <option value= <?php echo $model ?> selected> <?php echo $model ?> </option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option> 
        </select>
        <br/><br/>
        
        
        <label>Number Of Cylinders:</label>
        <br/>
        <select id="cylinders" name="cylinders" required>
            <option value= <?php echo $cylinders ?> selected><?php echo $cylinders ?></option>
            <option value="4">4</option>
            <option value="6">6</option>
            <option value="8">8</option>
            <option value="12">12</option>
            <option value="16">16</option> 
        </select>
        <br/><br/>
        
        <label for="engine" >Engine Type:</label>
        <br/>
        <select id="engine" name="engine" required>
            <option value=<?php echo $engine_id ?> selected><?php echo $engine_id ?></option>
            <option value="Petrol">Petrol</option>
            <option value="Diesel">Diesel</option>
            <option value="Electric">Electric</option>
            <option value="Hybrid">Hybrid</option>
        </select>
        
        <br/><br/>
        
        <label id="Body" name="Body">Body Style:</label>
        <br/>
        <select id="Body" name="Body" required>
            <option value=<?php echo $style_id ?> selected><?php echo $style_id ?></option>
            <option value="Sedan">Sedan</option>
            <option value="Convertible">Convertible</option>
            <option value="Hatchback">Hatchback</option>
            <option value="Muv">MUV</option>
            <option value="Suv">SUV</option>
            <option value="Coupe">Coupe</option>
            <option value="Pickup">Pickup</option>

        </select>
        <br/><br/>
        
        <label>Color:</label>
        <br/>
        <input type="text" name="color" value="<?php echo $color ?>" required>
        <br/><br/>
        
        <label>Location:</label>
        <br/>
        <input type="text" name="location" value="<?php echo $location ?>" required>
        <br/><br/>
        
        <label>Source Link:</label>
        <br/>
        <input type="text" name="source_link" value="<?php echo $source_link ?>" required>
        <br/><br/>
        
        
        <label>Warranty Detail:</label>
        <br/>
        <textarea id="warranty_detail" name="warranty_detail"  rows="4" cols="50" required><?php echo $warranty_detail ?></textarea>
        
        <br/><br/>
        
        <p></p><lebal>Car Features</lebal>
        <label style="font-size: 12px; color:#a1a1a1">(you can choose multible option)</label>
        <br/>

        <?php

        echo '<label class="container">Keyless Entry';
        echo  '<input type="checkbox"  name="Features[]" value="keyless_entry"';
        if($features["keyless_entry"] == "yes"){
            echo 'checked>';
        }else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        //-------------------------------------------------//

        echo '<label class="container">Airbags';
        echo  '<input type="checkbox"  name="Features[]" value="airbags"';
        
        if($features["airbags"] == "yes"){
        echo 'checked>';
        }else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        
        //-------------------------------------------------//
        
        echo '<label class="container">ABS';
        echo '<input type="checkbox"  name="Features[]" value="abs"';
        if($features["abs"] == "yes"){
            echo 'checked>';}
        else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        //-------------------------------------------------//

        echo '<label class="container">Parking Sensors
          <input type="checkbox" name="Features[]" value="parking_sensors"';
        if($features["parking_sensors"] == "yes"){
            echo 'checked>';}
        else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        //-------------------------------------------------//
        
        echo'<label class="container">Rear View Camera
          <input type="checkbox" name="Features[]" value="rear_view_camera"';
        if($features["rear_view_camera"] == "yes"){
            echo 'checked>';}
        else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        //------------------------------------------------//
        
        echo'<label class="container">Bluetooth
          <input type="checkbox" name="Features[]" value="bluetooth"';
        if($features["bluetooth"] == "yes"){
            echo 'checked>';}
        else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        
        //----------------------------------------------//
        echo '<label class="container">Steering Mounted Controls
          <input type="checkbox" name="Features[]" value="steering_mounted_controls"';
        if($features["steering_mounted_controls"] == "yes"){
            echo 'checked>';}
        else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        
        //----------------------------------------------//
        echo '<label class="container">Climate Control
          <input type="checkbox" name="Features[]" value="climate_control"';
        if($features["climate_control"] == "yes"){
            echo 'checked>';}
        else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        
        //----------------------------------------------//
        echo '<label class="container">Off Road
          <input type="checkbox" name="Features[]" value="off_road"';
        if($features["off_road"] == "yes"){
            echo 'checked>';}
        else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        
        //----------------------------------------------//
        echo '<label class="container">Sunroof
          <input type="checkbox" name="Features[]" value="sun_roof"';
        if($prefrence["sun_roof"] == "yes"){
            echo 'checked>';}
        else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        
         //----------------------------------------------//
        echo '<label class="container">Automatic
          <input type="checkbox" name="Features[]" value="automatic"';
        if($prefrence["automatic"] == "yes"){
            echo 'checked>';}
        else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        
        echo "</div>";
        
        //**********************************************//
        //**********************************************//
        //**********************************************//
        ?>
        <br/><br/> 
         <p></p><lebal>Car Prefrences</lebal>
        <label style="font-size: 12px; color:#a1a1a1">(you can choose multible option)</label>
        <br/>
        
        <?php

        echo '<label class="container">Comfort';
        echo  '<input type="checkbox"  name="Preference[]" value="comfort"';
        if($prefrence["comfort"] == "yes"){
            echo 'checked>';
        }else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        //-------------------------------------------------//

        echo '<label class="container">Safety';
        echo  '<input type="checkbox"  name="Preference[]" value="safety"';
        
        if($prefrence["safety"] == "yes"){
        echo 'checked>';
        }else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        
        //-------------------------------------------------//
        
        echo '<label class="container">Fuel Economy';
        echo '<input type="checkbox"  name="Preference[]" value="fuel_economy"';
        if($prefrence["fuel_economy"] == "yes"){
            echo 'checked>';}
        else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        //-------------------------------------------------//

        echo '<label class="container">Perfomance
          <input type="checkbox" name="Preference[]" value="perfomance"';
        if($prefrence["perfomance"] == "yes"){
            echo 'checked>';}
        else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        //-------------------------------------------------//
        
        echo'<label class="container">After Sale Support Availability
          <input type="checkbox" name="Preference[]" value="after_sale_support_availability"';
        if($prefrence["after_sale_support_availability"] == "yes"){
            echo 'checked>';}
        else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        //------------------------------------------------//
        
        echo'<label class="container">Stylish
          <input type="checkbox" name="Preference[]" value="stylish"';
        if($prefrence["stylish"] == "yes"){
            echo 'checked>';}
        else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        
        //----------------------------------------------//
        echo '<label class="container">7-Seater
          <input type="checkbox" name="Preference[]" value="7seater"';
        if($prefrence["7seater"] == "yes"){
            echo 'checked>';}
        else {echo '>';}
        echo '<span class="checkmark"></span>';
        echo '</label>';
        
        echo "</div>";
        
     ?>
        <br/><br/> 

        
        <label for="img">Select Car Picture:</label>
        <br/>
        <input type="file" accept="image/*" onchange="loadFile(event)" name="fileToUpload" id="fileToUpload" >
        <br/><br/>
        <img class="car-img" id="car-pic" src= "<?php echo $car_picture ?>" required/>
        <br/><br/>
        
    
        <!-- to preview a image before it is uploaded to server-->
        <script>
          var loadFile = function(event) {
            var output = document.getElementById('car-pic');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
              URL.revokeObjectURL(output.src) // free memory
            }
          };
        </script>
        
        
     <button>Update & Save</button> 
    </form>


	<script type="text/javascript">
		function update() {
			var select = document.getElementById('carName');
			var option = select.options[select.selectedIndex];
			
			document.getElementById('car_id').value = option.value;

			var car_id_var = option.value;

		}

		update();
	</script>
	
	<footer>
        <hr /> 
        <p style="font-size :12px; margin:20px;"> Copyright © King saud university - 
        Graduation Project of Information System department for 1443-1444 / 2021-2022</p>
        
    </footer>
		
	</body>
</html>