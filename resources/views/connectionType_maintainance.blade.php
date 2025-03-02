<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Location with Central Province Map Selection</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
    /* General Styles */
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #f4f4f4, #e0e0e0);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    /* Back Button */
    .back-button {
        position: absolute;
        top: 20px;
        left: 20px;
    }

    .back-button a {
        background: linear-gradient(135deg, #08d43b, #1a47c4);
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .back-button a:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
    }

    /* Form Container */
    .form-container {
        background: rgba(255, 255, 255, 0.9);
        margin: 70px auto;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        width: 100%;
        backdrop-filter: blur(10px);
    }

    h2 {
        text-align: center;
        color: #003399;
        margin-bottom: 20px;
        font-size: 24px;
        font-weight: bold;
    }

    /* Input Fields */
    input[type="text"],
    select {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input[type="text"]:focus,
    select:focus {
        border-color: #003399;
        box-shadow: 0 0 8px rgba(0, 51, 153, 0.3);
        outline: none;
    }

    /* File Input */
    .photo-input {
        margin-bottom: 20px;
    }

    /* Map */
    #map {
        height: 300px;
        margin-bottom: 20px;
        border-radius: 8px;
        border: 1px solid #ccc;
    }

    /* Coordinates Container */
    .coordinates-container {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .coordinates-container input {
        flex: 1;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .coordinates-container input:focus {
        border-color: #003399;
        box-shadow: 0 0 8px rgba(0, 51, 153, 0.3);
        outline: none;
    }

    /* Submit Button */
    .btn {
        background: linear-gradient(135deg, #AF40FF, #5B42F3 50%, #00DDEB);
        border: none;
        border-radius: 8px;
        color: white;
        padding: 15px 24px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
    }
    </style>
</head>

<body>

    <!-- Back Button -->
    <div class="back-button">
        <a href="{{ route('dashboard') }}">Back</a>
    </div>

    <!-- Form -->
    <div class="form-container">
        <h2>Connection Type - Maintenance</h2>
        <form action="{{ route('connectionType_maintainances') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Location Name -->
            <label for="location-name">Location Name:</label>
            <input type="text" id="location-name" name="location_name" required>

            <!-- Map for selecting locations in Central Province -->
            <label>Select End A and End B on the Map (Central Province Only):</label>
            <div id="map"></div>

            <!-- End A Coordinates -->
            <label for="end-a-coords">End A Coordinates:</label>
            <div class="coordinates-container">
                <input type="text" id="latitude-end-a" name="latitude_end_a" placeholder="Latitude" readonly required>
                <input type="text" id="longitude-end-a" name="longitude_end_a" placeholder="Longitude" readonly
                    required>
            </div>

            <!-- End A Photo Upload -->
            <label>Upload Photo for End A:</label>
            <input type="file" name="photo_end_a" accept="image/*" class="photo-input">

            <!-- End B Coordinates -->
            <label for="end-b-coords">End B Coordinates:</label>
            <div class="coordinates-container">
                <input type="text" id="latitude-end-b" name="latitude_end_b" placeholder="Latitude" readonly required>
                <input type="text" id="longitude-end-b" name="longitude_end_b" placeholder="Longitude" readonly
                    required>
            </div>

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

            <!-- Closure Used Dropdown -->
            <label for="closure-used">Closure Used:</label>
            <select id="closure-used" name="closure_used">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
            </select>

            <!-- Submit Button -->
            <button type="submit" class="btn">Submit Location</button>
        </form>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
    // Define map bounds for Central Province of Sri Lanka
    var centralProvinceBounds = [
        [6.7000, 80.5000], // Southwest corner (approximate)
        [7.5000, 81.0000] // Northeast corner (approximate)
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
        map.panInsideBounds(centralProvinceBounds, {
            animate: false
        });
    });

    // Markers for End A and End B
    var markerA, markerB;

    // Function to add or update End A marker
    function addMarkerA(latlng) {
        if (markerA) {
            markerA.setLatLng(latlng);
        } else {
            markerA = L.marker(latlng, {
                draggable: true
            }).addTo(map);
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
            markerB = L.marker(latlng, {
                draggable: true
            }).addTo(map);
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