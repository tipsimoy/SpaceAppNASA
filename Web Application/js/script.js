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
	var jqxhr = $.getJSON( "http://192.168.0.226:8000/simoy/getRovers.php", function(data) {
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

$("#regRover").click(function(){
	var roverName = $("#roverName").val();
	var serial = $("#serial").val();

	console.log(roverName);
	console.log(serial);
	navigator.geolocation.getCurrentPosition(function(position){
	var url = "reg_rover.php?roverName="+roverName+"&serial="+serial+"&lat="+position.coords.latitude+"&lng="+position.coords.longitude;
		$.get(url, function( data ) {
			addMarker(new google.maps.LatLng(position.coords.latitude,position.coords.longitude), map, roverName);
		});
	});
});

$("#roversTrigger").click(function(){
	// Rovers

	$("#roversHandler").html("");
	var jqxhr = $.getJSON( "http://192.168.0.226:8000/simoy/getRovers.php", function(data) {
	for (var i = data.length - 1; i >= 0; i--) {
		var rover = data[i];
		var name = rover.rovername;
		var serial = rover.serial;
		var hash = rover.hash;
		if (!location.origin)
   		location.origin = location.protocol + "//" + location.host;
		$("#roversHandler").append('<tr class="success"><td>'+name+'</td><td>'+serial+'</td><td><input type="text" id="api" value="'+location.origin+"/cap.php?key="+hash+'"></tr>'); //Not yet verified.
	};
	});
});

$("#dataTrigger").click(function(){
	// Rovers

	$("#dataHandler").html("");
	var jqxhr = $.getJSON( "http://192.168.0.226:8000//simoy/getData.php", function(data) {
	for (var i = data.length - 1; i >= 0; i--) {
		var rover = data[i];
		var collect = rover.data;
		var data_arr = JSON.parse(collect);

		var lvl_temp="";
		if(data_arr.temp>50){
			lvl_temp="HIGH";
		}else if(data_arr.temp<=50 && data_arr.temp>30){
			lvl_temp = "MID";
		}else{
			lvl_temp="LOW";
		}

		var lvl_hum="";
		if(data_arr.hum>60){
			lvl_hum="HIGH";
		}else if(data_arr.hum<=60 && data_arr.hum>40){
			lvl_hum = "MID";
		}else{
			lvl_hum="LOW";
		}

		var lvl_mq2="";
		if(data_arr.mq2>35){
			lvl_mq2="HIGH)<br/>Symptoms: Dizziness and Impaired vision may be experienced.";
		}else if(data_arr.mq2<=35 && data_arr.mq2>10){
			lvl_mq2 = "MID)<br/>Symptoms:  headaches and Nausea may be experienced.";
		}else{
			lvl_mq2="LOW)<br/>Symptoms: Tiredness may be experienced.";
		}

		var lvl_mq5="";
		if(data_arr.mq5>300){
			lvl_mq5="HIGH";
		}else if(data_arr.mq5<=300 && data_arr.mq5>200){
			lvl_mq5 = "MID";
		}else{
			lvl_mq5="LOW";
		}

		var lvl_dust="";
		if(data_arr.dust>40){
			lvl_dust="HIGH)<br/>Symptoms: Damaged lung tissue.";
		}else if(data_arr.dust<=40 && data_arr.dust>20){
			lvl_dust = "MID)<br/>Symptoms: Eye, Nose, and Throat irritation.";
		}else{
			lvl_dust="LOW)<br/>Symptoms: Itchy eyes may be experienced.";
		}

		if (!location.origin)
   		location.origin = location.protocol + "//" + location.host;
		$("#dataHandler").append('<tr class="success"><td>'+data_arr.code+'</td><td>'+data_arr.temp + "("+lvl_temp+')</td><td>'+data_arr.hum+"("+lvl_hum+')</td><td>'+data_arr.mq2+"("+lvl_mq2+'</td><td>'+data_arr.mq5+"("+lvl_mq5+')</td><td>'+data_arr.dust+"("+lvl_dust+'</td></tr>');
	};
	});
});