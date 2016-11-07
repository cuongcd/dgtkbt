jQuery(document).ready(function(){
	var is_HideChangeCity = false;
	var numberdatepiker = 1;//(jQuery(document).width() <= 500)?1:2;
	// init datepicker
	jQuery.datepicker.setDefaults({
	    dateFormat: 'dd/mm/yy', 
	    minDate: new Date( ) 
	});
	jQuery( ".datepicker" ).datepicker({
		// showOn: "button",
      	// buttonImage: "img/calendar.png",
      	showAnim: 'drop',
      	changeMonth: true,
      	changeYear: true,
		numberOfMonths: numberdatepiker/*,
      	showButtonPanel: true*/
	});

	// init slide 
	jQuery( '#slides' ).sliderPro({
		width: 579,
		height: 350,
		fade: true,
		arrows: true,
		buttons: false,
		fullScreen: true,
		shuffle: true,
		smallSize: 500,
		mediumSize: 1000,
		largeSize: 3000,
		thumbnailArrows: true,
		autoplay: false
	});
	

	var OP_change = null;
	jQuery(".change_place")
	.focus(function(){ 
		OP_change = jQuery(this);  
		if( !is_HideChangeCity ){
			jQuery("#change_cities").show();
			var posi = jQuery(this).offset(); 
			jQuery("#change_cities").css({"top":posi.top + 27,"left":posi.left  });
		}
	})
	.focusout(function(){
		jQuery("#change_cities").hide();
	})
	.keyup(function(){
		jQuery("#change_cities").hide();
	});

	// event change city
	jQuery("#list-departure").find("li").click(function(){
		if (!jQuery(this).hasClass("title")) {
			var city 		= jQuery(this).find("b").text();
			var city_code 	= jQuery(this).find("a").attr("airportcode");
			jQuery("#change_cities").hide();
			OP_change.val( city );
			if( OP_change.attr("id") == 'arrived_place' ){
				jQuery("#departure_place").focus();
			}else if( OP_change.attr("id") == 'departure_place' ){
				if( jQuery("#arrived_place") )
				jQuery("#arrived_place").focus();				
			}
			 
		};
	});

	jQuery( "#change_cities" ).draggable();

	jQuery("#owl-demo").owlCarousel({
	    jsonPath : 'data/doitac.json',
	    jsonSuccess : customDataSuccess/*,
	     navigation : true*/
	  });
 
	  function customDataSuccess(data){
	    var content = "";
	    for(var i in data["items"]){
	       
	       var img = data["items"][i].img;
	       var alt = data["items"][i].alt;
	 
	       content += "<img src=\"" +img+ "\" alt=\"" +alt+ "\">"
	    }
	    jQuery("#owl-demo").html(content);
	  }

	  function initialize() {
	  		var styles = [
					    {
					      featureType: "all",
					      stylers: [ 
					        { saturation: -80 }
					      ]
					    },{
					    featureType: "road.arterial",
					    elementType: "geometry",
					    stylers: [
					      { hue: "#00ffee" },
					      { saturation: 50 }
					    ]
					  },{
					    featureType: "poi.business",
					    elementType: "labels",
					    stylers: [
					      { visibility: "off" }
					    ]
					  }
				  ];

				var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});

	  			var myLatLng = {lat: 21.0460109, lng: 105.7949882};
				var mapProp = {
				    center:new google.maps.LatLng(21.0460109,105.7949882),
				    zoom:17,
				    mapTypeControlOptions: {
				      mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
				    }
				};
			  
		  		var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
		  		
		  		map.mapTypes.set('googleMap', styledMap);
				map.setMapTypeId('googleMap');

		  		var marker = new google.maps.Marker({
				    position: myLatLng,
				    map: mapProp,
				    animation: google.maps.Animation.DROP,
				    icon:  'img/marker.png',
				    title: 'Đại lý vé máy bay Sky'
				  });marker.setMap(map);
		}
		google.maps.event.addDomListener(window, 'load', initialize);




		  var idx = [{
		      "code": "VVNB",
		      "name" : "Hanoi",
		      "full" : "Hanoi VVNB"
		    },
		    {
		      "code": "VVNT",
		      "name" : "Nhatrang",
		      "full" : "Nhatrang VVNT"
		    },
		    {
		      "code": "VVPB",
		      "name" : "Hue",
		      "full" : "Hue VVPB"
		    },
		    {
		      "code": "VVPQ",
		      "name" : "Phu Quoc",
		      "full" : "Phu Quoc VVPQ"
		    },
		    {
		      "code": "VVDN",
		      "name" : "Danang",
		      "full" : "Danang VVDN"
		    },
		    {
		      "code": "VVGL",
		      "name" : "Hanoi Gia Lam",
		      "full" : "Hanoi Gia Lam VVGL"
		    }] ; 
			var arr_customer2 = [];       
			jQuery(".change_place").typeahead(
                { 
                	source: idx,
                	displayField: "full",
                	onSelect:function(obj) {
                    	// is_HideChangeCity = true;
            		}
        		}
        	); 
});