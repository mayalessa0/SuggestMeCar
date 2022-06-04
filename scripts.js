/////for navigation bar//////

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}




/////for budget slider///////

///Create a dynamic range slider to display the current value, with JavaScript: 
var slider = document.getElementById("myRange");
var output = document.getElementById("budget");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
    output.innerHTML = this.value;
}
 
 
 
            
/////// for login form //////////           
// function for open login form
function openLoginForm() {
    document.getElementById("loginForm").style.display = "block";
}
// function for close login form
function closeLoginForm() {
    document.getElementById("loginForm").style.display = "none";
}

///////// for move to another page ////////
function rediregtPage(pgae_name) {
    location.href = pgae_name ;
}      
