/*
	This script is dependent on its server URI. Upon changing the location, please do update this.
*/
//API_KEY = AIzaSyB2ZRCpcbVv6zdCPIQUQDLTg3CkhePzPII
var map;
function initMap() {
  	// Create a map object and specify the DOM element for display.
  	map = new google.maps.Map(document.getElementById('rovers'), {
    	center: {lat: 14.5749491, lng: 121.0402866},
    	scrollwheel: false,
    	zoom: 9,
    	mapTypeId: google.maps.MapTypeId.SATELLITE
  	});

  	// Rovers
	var jqxhr = $.getJSON( "http://192.168.0.226:8000/simoy/publicRover.php", function(data) {
	for (var i = data.length - 1; i >= 0; i--) {
		var rover = data[i];
		var coord = rover.coords;
		var coordinate = coord.split(',');
		var x = parseFloat(coordinate[0]);
		var y = parseFloat(coordinate[1]);
		console.log(rover.rovername);
		console.log(x+" "+y);

		//Mark
		addMarker(new google.maps.LatLng(x,y), map, rover.rovername+"("+rover.serial+")");
	};
	});
}

// Adds a marker to the map.
function addMarker(location, map, lbl) {
  // Add the marker at the clicked location, and add the next-available label
  // from the array of alphabetical characters.
  var marker = new google.maps.Marker({
    position: location,
    label: lbl,
    map: map
  });

       var content = lbl

  var infowindow = new google.maps.InfoWindow()

google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
        return function() {
           infowindow.setContent(content);
           infowindow.open(map,marker);
        };
    })(marker,content,infowindow)); 
}

setInterval(function(){
	try{
		var jqxhr = $.getJSON( "http://192.168.0.226:8000/simoy/average.php", function(data) {
			var rover = data;
			var temp = rover.temp;
			var hum = rover.hum;
			var mq2 = rover.mq2;
			var mq5 = rover.mq5;
			var dust = rover.dust;
			$("#feed").html("<a>Temperature: "+temp+"C\tHumidity: "+hum+"%\tMQ2: "+mq2+"ppm\tMQ5: "+mq5+"ppm\tDust Density: "+dust+"mg/m^3</a>");
		});		
	}catch(err){
		$("#feed").html("<a>Temperature: "+0+"C\tHumidity: "+0+"%\tMQ2: "+0+"ppm\tMQ5: "+0+"ppm\tDust Density: "+0+"mg/m^3</a>");
	}
	
},1000);

$("#btnReport").click(function(){
	var temp = $("#temp").val();
	var hum = $("#hum").val();
	var mq2 = $("#mq2").val();
	var mq5 = $("#mq5").val();
	var dust = $("#dust").val();
	var url = "report.php?temp="+temp+"&hum="+hum+"&mq2="+mq2+"&mq5="+mq5+"&dust="+dust;
	$.get(url, function( data ) {
	});
});