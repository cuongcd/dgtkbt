    <title></title>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="/js/gmaps.js"></script>
   
    <style type="text/css">
        #map {
            width: 100%;
            height: 600px;
        }


    </style>
<div id="map" class="wrapper">
</div>
<script>
    var map = new GMaps({
        el: '#map',
        lat: 21.006232,
        lng: 105.842995,
        zoom: 9
    });
    map.addMarker({
        lat: 21.006232,
        lng: 105.842995,
        click: function(e) {
            alert('You are here');
        }
    });
</script>
