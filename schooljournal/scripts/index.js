
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
	image.src = "../media/" + ingCount +".jpg";
	},10000);

	var searchbar=document.getElementById('search-bar');
	var search=document.getElementById('search').id;

function showSearchBar(){
	var element=document.getElementById("search-bar");
	       if(element.style.display == 'none')
          		element.style.display = 'block';
      		 else
         		 element.style.display = 'none';
    }