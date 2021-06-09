
<html>
    <haed>
        <script>
            function myfunction(){
            
                navigator.geolocation.getCurrentPosition(function(position) {
            
                    // Get the coordinates of the current position.
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;

                    alert(lat + ' ' + lng);
                    
                });

                
            
            }
            </script>
    </haed>
    <body>
        <button onclick="myfunction()" name="findmebutton" id="findmebutton">find</button>
    </body>
</html>