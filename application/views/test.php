<!DOCTYPE html>
<html>
<head>
    <title>Simple Leaflet Map</title>
    <meta charset="utf-8" />
    <link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet">
    <link 
        rel="stylesheet" 
        href="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.css"
    />
</head>
<body>
    <div id="mapid" style="width: 600px; height: 400px"></div>

    <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>
    <script src="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>

    <script>
        // center of the map
        var center = [51.509, -0.08];

        // Create the map
        var map = L.map('mapid').setView(center, 6);

        // Set up the OSM layer
        L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
            maxZoom: 18
        }).addTo(map);

        // add a marker in the given location
        L.marker(center).addTo(map);

        // Initialise the FeatureGroup to store editable layers
        var editableLayers = new L.FeatureGroup();
        map.addLayer(editableLayers);


        $.getJSON("<?=base_url()?>index.php/mappolygon/getPolygon", function(result){
            console.log(result)
            $.each(result, function(i, field){
                var coordinates =  JSON.parse(result[i].coordinates)
                //console.log(coordinates)
                for(var x=0; x<coordinates.length; x++){
                    coordinates[x] = [coordinates[x][1], coordinates[x][0]]
                }

                // create popup contents
                var customPopup = "<center><h3><b>Landmark Information</b></h3></center>"+'<h7>Name: </h7>'+result[i].name_polygon+"<br/>"+"<img src='<?=base_url()?>assets/uploads/"+result[i].photo+"' alt='map photo' width='350px'/><br><h7>Detail : </h7>"+result[i].information+"<br/><a href='<?=base_url()?>index.php/mappolygon/deletePolygon/"+result[i].id_polygon+"'>Delete</a>&nbsp;&nbsp;&nbsp;<a href='<?=base_url()?>index.php/page/update_landmark_polygon/"+result[i].id_polygon+"'>Update</a>";

                // specify popup options 
                var customOptions =
                    {
                    'maxWidth': '500',
                    'maxHeight': '1000',
                    'className' : 'custom'
                    }

                var polygon = L.polygon(coordinates).bindPopup(customPopup,customOptions).addTo(map);
            });
        });

        var drawPluginOptions = {
        position: 'topright',
        draw: {
            polygon: {
            allowIntersection: false, // Restricts shapes to simple polygons
            drawError: {
                color: '#e1e100', // Color the shape will turn when intersects
                message: '<strong>Oh snap!<strong> you can\'t draw that!' // Message that will show when intersect
            },
            shapeOptions: {
                color: '#97009c'
            }
            },
            // disable toolbar item by setting it to false
            polyline: false,
            circle: false, // Turns off this drawing tool
            circlemarker: false,
            rectangle: false,
            marker: true,
            },
        edit: {
            featureGroup: editableLayers, //REQUIRED!!
            remove: false
        }
        };

        // Initialise the draw control and pass it the FeatureGroup of editable layers
        var drawControl = new L.Control.Draw(drawPluginOptions);
        map.addControl(drawControl);

        var editableLayers = new L.FeatureGroup();
        map.addLayer(editableLayers);
        //editableLayers.on('click', addMarker);

        var polygon = null;
        //Function to send coordinates to Database
        map.on('draw:created', function(e) {

        var type = e.layerType,
            layer = e.layer;
        
        polygon = layer.toGeoJSON()
        var coordMarker = JSON.stringify(polygon.geometry.coordinates);
        var coordPolygon = JSON.stringify(polygon.geometry.coordinates[0]);    
        
        if(type === 'marker'){
            var addPopup =  `<h3>Add Landmark</h3>`+coordMarker+
            `<form action="<?=base_url()?>index.php/map/addMarker" method="POST" enctype="multipart/form-data"> 
                <label for="landmark_nama">Name:</label><br>
                    <input type="text" id="l_name" name="l_name" required><br> 
                <label for="landmark_latitude">Latitude:</label><br>
                    <input type="text" id="l_lat" name="l_lat" required><br>
                <label for="landmark_longitude">Longitude:</label><br>
                    <input type="text" id="l_long" name="l_long" required><br>
                <label for="landmark_info">Detail Information:</label><br>
                    <input type="text" id="l_info" name="l_info" required><br>
                <label for="landmark_foto">Photo:</label><br>
                    <input type="file" id="l_foto" name="l_foto" required><br><br>
                    <input type="submit" value="Submit">
            </form>`;  
                
            var customOptions =
                {
                'maxWidth': '500',
                'className' : 'custom'
                };
            layer.bindPopup(addPopup,customOptions);    
        }
        else if(type === 'polygon'){
        var addPopup =  `<h3>Add Landmark</h3>`+coordPolygon+`
        <form action="<?=base_url()?>index.php/mappolygon/addPolygon" method="POST" enctype="multipart/form-data"> 
            <label for="landmark_nama">Name:</label><br>
                <input type="text" id="l_name" name="l_name" required><br>
            <label for="landmark_coordinates">Coordinates:</label><br>    
                <input type="text" id="l_coord" name="coordinates" required><br> 
            <label for="landmark_info">Detail Information:</label><br>
                <input type="text" id="l_info" name="l_info" required><br>
            <label for="landmark_foto">Photo:</label><br>
                <input type="file" id="l_foto" name="l_foto" required><br><br>
            <input type="submit" value="Submit">
        </form>`;
      
        var customOptions =
            {
            'maxWidth': '500',
            'className' : 'custom'
            };

            layer.bindPopup(addPopup,customOptions);
        }

        editableLayers.addLayer(layer);
        });

    </script>
</body>
</html>