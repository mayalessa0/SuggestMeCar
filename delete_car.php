  
<!DOCTYPE html>
<html>
    
    <head><meta charset="utf-8">
    <!-- links that import css file and fonts resources-->
    <link rel="stylesheet" href="update&delete_car.css">
    <link rel="stylesheet" href="login.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat|Sofia|Trirong|Josefin+Sans:wght@100&display=swap' >
    <script src="scripts.js"></script>

    <!--page title that showen on tap -->
    <title>Delete Car</title>

</head>
	<body>
	     <!-- to wrap nav and header togather-->
    <div id="wrap">
        <div id="header">
            
            <!--page header-->
            <h1>DELETE CAR</h1>
            
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
	    <form method="POST" action="delete_process.php" style="height: 100vh">
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
            <br/>
            
            <input type="submit" value="Confirm" onclick="return confirm('Are you sure you want to delete this car permanently?')"/>
              </p>
        </form>
        
        </div>
         
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