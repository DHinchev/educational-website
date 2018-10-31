	/*BACKGROUND SLIDER*/
    var changeContainer=document.getElementById('containerId');
/*Get the image with number 1 from any pge on the website,set its opacity to 0.7 and decrease it while enlarging its scale.
change the image on the einterval of 10 seconds and reset the opacity to 0.7 every time.*/
  var ingCount=1;
    var val = 5;
    var image = document.getElementById('img');
    image.style.opacity="0.7";
    window.setInterval(function () {
     var opacity = window.getComputedStyle(image).opacity;
     image.style.opacity = opacity - 0.1;
     image.style.transition = "all 2s";
     image.style.transform = "scale(1.5)"
    }, 200);

    setInterval(function Slider(){
    image.style.opacity='0.7';
    image.style.transition = "out 2s";
    image.style.transform = "scale(1)";
    ingCount = ingCount + 1;
    if(ingCount > val){ingCount = 1;}
    if(ingCount < 1){ingCount = val;}   
    image.src = "media/" + ingCount +".jpg";
    },10000);

        /*END OF BACKGROUND SLIDER*/

//hide the Forgotten password div
    function hideForgetForm()
    {
    	document.getElementById('hideForfottenForm').style.display='none';
    	document.getElementById('loginTitle').style.marginBottom ='10%';
    }

//show the Forgotten password div
    function showForgetForm()
    {
    	document.getElementById('hide-login-form').style.display='none';
    	document.getElementById('hideForfottenForm').style.display='block';
    }

//show the login div
        function goBackLogin()
    {
    	document.getElementById('hide-login-form').style.display='block';
    	document.getElementById('hideForfottenForm').style.display='none';
    }

//hide the registration div on the page and display the Login option
        function goBackLoginFromReg()
    {
    	document.getElementById('hide-login-form').style.display='block';
    	document.getElementById('hideRegisterForm').style.display='none';
        location.replace("index.php");
    	changeContainer.style.height='500px';
    	changeContainer.style.top='20%';
    }

//show the registration div
    function showRegisterForm()
    {
    	document.getElementById('hide-login-form').style.display='none';
    	document.getElementById('hideRegisterForm').style.display='block';
    	changeContainer.style.height='100%';
    	changeContainer.style.top='0';
    }






