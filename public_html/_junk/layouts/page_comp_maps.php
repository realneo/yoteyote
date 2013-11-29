<?php $this->load->view('top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Blank Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="glyphicon-pin animation-expandUp"></i>Maps<br><small>Google Maps Integration!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-cog"></i></li>
        <li>Components</li>
        <li><a href="">Maps</a></li>
    </ul>
    <!-- END Blank Header -->

    <!-- Google Maps Content -->
    <!-- First Row -->
    <div class="row gutter30">
        <!-- Terrain Map -->
        <div class="col-sm-6">
            <!-- Terrain Map Block -->
            <div class="block full">
                <!-- Terrain Map Title -->
                <div class="block-title">
                    <h4>Terrain Map</h4>
                </div>
                <!-- END Terrain Map Title -->

                <!-- Terrain Map Content -->
                <div id="gmap-terrain" class="gmap"></div>
                <!-- END Terrain Map Content -->
            </div>
            <!-- END Terrain Map Block -->
        </div>
        <!-- END Terrain Map -->

        <!-- Satellite Map -->
        <div class="col-sm-6">
            <!-- Satellite Map Block -->
            <div class="block full">
                <!-- Satellite Map Title -->
                <div class="block-title">
                    <h4>Satellite Map</h4>
                </div>
                <!-- END Satellite Map Title -->

                <!-- Satellite Map Content -->
                <div id="gmap-satellite" class="gmap"></div>
                <!-- END Satellite Map Content -->
            </div>
            <!-- END Satellite Map Block -->
        </div>
        <!-- Satellite Map -->
    </div>
    <!-- END First Row -->

    <!-- Second Row, Map with Markers Block -->
    <div class="block full">
        <!-- Map with Markers Title -->
        <div class="block-title">
            <h4>Map with Markers</h4>
        </div>
        <!-- END Map with Markers Title -->

        <!-- Map with Markers Content -->
        <div id="gmap-markers" class="gmap"></div>
        <!-- END Map with Markers Content -->
    </div>
    <!-- END Second Row, Map with Markers Block -->

    <!-- Third Row, hide it from IE < 9 Browsers since geolocation and street view don't work in them -->
    <div class="row gutter30 hidden-lt-ie9">
        <!-- Street View -->
        <div class="col-sm-6">
            <!-- Street View Block -->
            <div class="block full">
                <!-- Street View Title -->
                <div class="block-title">
                    <h4>Street View</h4>
                </div>
                <!-- END Street View Title -->

                <!-- Street View Content -->
                <div id="gmap-street" class="gmap"></div>
                <!-- END Street View Content -->
            </div>
            <!-- END Street View Block -->
        </div>
        <!-- END Street View -->

        <!-- Geolocation -->
        <div class="col-sm-6">
            <!-- Geolocation Block -->
            <div class="block full">
                <!-- Geolocation Title -->
                <div class="block-title">
                    <h4>Geolocation</h4>
                </div>
                <!-- END Geolocation Title -->

                <!-- Geolocation Content -->
                <div id="gmap-geolocation" class="gmap"></div>
                <!-- END Geolocation Content -->
            </div>
            <!-- END Geolocation Block -->
        </div>
        <!-- END Geolocation -->
    </div>
    <!-- END Third Row -->
    <!-- END Google Maps Content -->
</div>
<!-- END Page Content -->

<?php $this->load->view('footer'); ?>

<!-- Google Maps API + Gmaps Plugin, must be loaded in the page you would like to use maps -->
<script src="//maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php echo js_url('helpers/gmaps.min.js'); ?>"></script>

<!-- Javascript code only for this page -->
<script>
    $(function(){
        /*
         * With Gmaps.js, Check out examples and documentation at http://hpneo.github.io/gmaps/examples.html
         */

        // Set default height to all Google Maps Containers
        $('.gmap').css('height', '400px');

        // Initialize terrain map
        new GMaps({ div: '#gmap-terrain', lat: 0, lng: 0, zoom: 1})
            .setMapTypeId(google.maps.MapTypeId.TERRAIN);

        // Initialize satellite map
        new GMaps({div: '#gmap-satellite', lat: 0, lng: 0, zoom: 1})
            .setMapTypeId(google.maps.MapTypeId.SATELLITE);

        // Initialize map with markers
        new GMaps({div: '#gmap-markers', lat: 0, lng: 0, zoom: 2 })
            .addMarkers([
                { lat: 30, lng: -31, title: 'Marker #1', infoWindow: { content: '<p>Marker #1: HTML Content</p>'} },
                { lat: -48, lng: 11, title: 'Marker #2', infoWindow: { content: '<p>Marker #2: HTML Content</p>'} },
                { lat: -28, lng: 85, title: 'Marker #3', infoWindow: { content: '<p>Marker #3: HTML Content</p>'} },
                { lat: -20, lng: -110, title: 'Marker #4', infoWindow: { content: '<p>Marker #4: HTML Content</p>'} }
            ]);

        // Initialize street view panorama
        new GMaps.createPanorama({ el: '#gmap-street', lat: 37.88255, lng: -119.345597, pov: { heading: 300, pitch: 5 } });

        // Initialize map geolocation
        var gmapGeolocation = new GMaps({ div: '#gmap-geolocation', lat: 0, lng: 0 });

        GMaps.geolocate({
            success: function(position) {
                gmapGeolocation.setCenter(position.coords.latitude, position.coords.longitude);
                gmapGeolocation.addMarker({
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                    title: 'GeoLocation',
                    infoWindow: {
                        content: '<p class="text-success"><i class="icon-map-marker"></i> <strong>Your location!</strong></p>'
                }
        });
            },
            error: function(error) {
                alert('Geolocation failed: ' + error.message);
            },
            not_supported: function() {
                alert("Your browser does not support geolocation");
            },
            always: function() {
                // Message when geolocation succeed
            }
        });
    });
</script>

<?php $this->load->view('bottom'); ?>