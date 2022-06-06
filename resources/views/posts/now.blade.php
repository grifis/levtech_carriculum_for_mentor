<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=“utf-8”>
        <title>geolacation</title>
    </head>
    <body>
        <p id=“lat”></p>
        <script>
        var data;
        var rain;
        var nowlat;
        var nowlng;
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(
                function(position){
                    var crd = position.coords; //crdに緯度経度の配列を格納
                    //document.getElementById(“lat”).textContent = “{lat : ” + crd.latitude + “, lng : ” + crd.longitude + “}”;
                    console.log(crd.latitude);
                    var request = new XMLHttpRequest();
                    // var nowlat = crd.latitude;
                    // var nowlng = crd.longitude;
                    var nowlat = -54.625388616131495;
                    var nowlng = 158.8538197821135;
                    var apiKey = ‘1236b67a22e6499c7370b9f6d925778f’;
                    request.open(‘GET’, `https://api.openweathermap.org/data/2.5/weather?lat=${nowlat}&lon=${nowlng}&appid=${apiKey}`, true);
                    request.send(null);
                    request.onload = function(){
                        if(request.status === 200){
                            var jsondata = this.response;
                            data = JSON.parse(jsondata);
                            console.log(data);
                        }else{
                            console.error(response.statusText)
                        }
                        if(data.rain){
                            let rain = Object.values(data.rain)[0];
                            console.log(rain);
                        }else{
                            let rain = 0
                        }
                    };
                    request.onerror = function(){
                        var data = this.response;
                        console.log(data);
                    }
                }
            );
        }
        </script>
    </body>
</html>









