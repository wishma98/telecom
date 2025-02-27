<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Location with Central Province Map Selection</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <a href="{{ route('dashboard') }}"
          class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition duration-300 ease-in-out">
          Back
        </a>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-image:linear-gradient(#d5f0f7,#8ee0f5 50%,#43cdf0);

        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], select {
            width: 80%;
            padding: 8px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .photo-input {
            margin-bottom: 20px;
        }
        #map {
            height: 300px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .btn {
    align-items: center;
    background-image: linear-gradient(144deg,#AF40FF, #5B42F3 50%,#00DDEB);
    border: 0;
    border-radius: 8px;
    box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
    box-sizing: border-box;
    color: #FFFFFF;
    display: flex;
    font-family: Phantomsans, sans-serif;
    font-size: 20px;
    justify-content: center;
    line-height: 1em;
    max-width: 100%;
    min-width: 140px;
    padding: 15px 24px;
    text-decoration: none;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    white-space: nowrap;
    cursor: pointer;
}
    </style>
</head>
<body>

<h2 align="center">Connection Type- Maintenance</h2>
<form action="{{ route('connectionType_maintainances')}}" method="POST" enctype="multipart/form-data">
@csrf
    <!-- Location Name -->
    <label for="location-name">Location Name:</label>
    <input type="text" id="location-name" name="location_name" required>

    <!-- Map for selecting locations in Central Province -->
    <label>Select End A and End B on the Map (Central Province Only):</label>
    <div id="map"></div>

    <!-- End A Coordinates -->
    <label for="end-a-coords">End A Coordinates:</label>
    <input type="text" id="latitude-end-a" name="latitude_end_a" placeholder="Latitude" readonly required>
    <input type="text" id="longitude-end-a" name="longitude_end_a" placeholder="Longitude" readonly required>

    <!-- End A Photo Upload -->
    <label>Upload Photo for End A:</label>
    <input type="file" name="photo_end_a" accept="image/*" class="photo-input">

    <!-- End B Coordinates -->
    <label for="end-b-coords">End B Coordinates:</label>
    <input type="text" id="latitude-end-b" name="latitude_end_b" placeholder="Latitude" readonly required>
    <input type="text" id="longitude-end-b" name="longitude_end_b" placeholder="Longitude" readonly required>

    <!-- End B Photo Upload -->
    <label>Upload Photo for End B:</label>
    <input type="file" name="photo_end_b" accept="image/*" class="photo-input">

    <!-- LEA Dropdown -->
    <label for="lea">LEA:</label>
    <select id="lea" name="lea">
        <option value="LEA1">LEA1</option>
        <option value="LEA2">LEA2</option>
        <option value="LEA3">LEA3</option>
        <!-- Add more options as needed -->
    </select>

<!-- Add more options as needed -->
<label for="closure-used">Closure Used:</label>
<select id="closure-used" name="closure_used">
    <option value="No">No</option>
    <option value="Yes">Yes</option>
</select>

    <!-- Submit Button -->
   <center> <button type="submit" class="btn">Submit Location</button></center>
</form>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    // Define map bounds for Central Province of Sri Lanka
    var centralProvinceBounds = [
        [6.7000, 80.5000], // Southwest corner (approximate)
        [7.5000, 81.0000]  // Northeast corner (approximate)
    ];

    // Initialize the map, centered in Central Province with restricted bounds
    var map = L.map('map').setView([7.2906, 80.6337], 10).setMaxBounds(centralProvinceBounds);

    // Add OpenStreetMap tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        minZoom: 9,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Prevent panning outside Central Province
    map.on('drag', function() {
        map.panInsideBounds(centralProvinceBounds, { animate: false });
    });

    // Markers for End A and End B
    var markerA, markerB;

    // Function to add or update End A marker
    function addMarkerA(latlng) {
        if (markerA) {
            markerA.setLatLng(latlng);
        } else {
            markerA = L.marker(latlng, { draggable: true }).addTo(map);
            markerA.bindPopup("End A").openPopup();
        }
        document.getElementById("latitude-end-a").value = latlng.lat;
        document.getElementById("longitude-end-a").value = latlng.lng;
        markerA.on('dragend', function(e) {
            var position = e.target.getLatLng();
            document.getElementById("latitude-end-a").value = position.lat;
            document.getElementById("longitude-end-a").value = position.lng;
        });
    }

    // Function to add or update End B marker
    function addMarkerB(latlng) {
        if (markerB) {
            markerB.setLatLng(latlng);
        } else {
            markerB = L.marker(latlng, { draggable: true }).addTo(map);
            markerB.bindPopup("End B").openPopup();
        }
        document.getElementById("latitude-end-b").value = latlng.lat;
        document.getElementById("longitude-end-b").value = latlng.lng;
        markerB.on('dragend', function(e) {
            var position = e.target.getLatLng();
            document.getElementById("latitude-end-b").value = position.lat;
            document.getElementById("longitude-end-b").value = position.lng;
        });
    }

    // Map click event to add markers
    map.on('click', function(e) {
        if (!markerA || markerB) {
            addMarkerA(e.latlng);
        } else {
            addMarkerB(e.latlng);
        }
    });
</script>

</body>
</html>