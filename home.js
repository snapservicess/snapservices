document.getElementById('menuButton').onclick = function() {
    var menu = document.getElementById('menu');
    if (menu.style.display === 'none' || menu.style.display === '') {
        menu.style.display = 'block';
    } else {
        menu.style.display = 'none';
    }
};
         function getCurrentLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(success, error);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function success(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            alert(`Latitude: ${latitude}, Longitude: ${longitude}`);
        }

        function error() {
            alert("Unable to retrieve your location.");
        }
        document.getElementById('locationButton').onclick = getCurrentLocation;