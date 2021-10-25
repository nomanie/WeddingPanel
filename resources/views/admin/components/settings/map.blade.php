@extends('home.master')


@section('content')
    <link rel="stylesheet" href="{{URL::asset('assets/home/css/icons.css')}}">
    <style>

        .marker{
            width: 16px!important;
            height: 16px!important;
        }
        .pizza{
            background-image: url("data:image/svg+xml, %3Csvg width='155%' height='155%' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%237f3f00' id='svg_2' d='m12,15a2,2 0 0 1 -2,-2c0,-1.11 0.9,-2 2,-2a2,2 0 0 1 2,2a2,2 0 0 1 -2,2m-5,-8c0,-1.11 0.89,-2 2,-2a2,2 0 0 1 2,2a2,2 0 0 1 -2,2c-1.11,0 -2,-0.9 -2,-2m5,-5c-3.57,0 -6.77,1.54 -9,4l9,16l9,-16c-2.22,-2.46 -5.43,-4 -9,-4z' fill='%23ffff00'/%3E%3Cellipse ry='2.32056' rx='2.22519' id='svg_3' cy='7.12601' cx='8.99199' stroke-width='null' stroke='%237f0000' fill='%237f0000'/%3E%3Cellipse ry='2.28877' rx='2.1934' id='svg_4' cy='13.13402' cx='11.94831' stroke-width='null' stroke='%237f0000' fill='%237f0000'/%3E%3C/svg%3E");
        }
    </style>
    <script>
        // initialize Leaflet

        //x, y, zoom
        var map = L.map('map').setView({lon: 21, lat: 52.25}, 15);

        // add the OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 17,
            minZoom: 15,
            attribution: null
        }).addTo(map);
        let drawMarkerIcon = false;
        let hideOnLarge = null;
        map.on('click', function (e) {
            var coord = e.latlng;
            var lat = coord.lat;
            var lng = coord.lng;
            if(drawMarkerIcon) drawMarker({x: lat, y: lng, icon: drawMarkerIcon, hideOnLarge:hideOnLarge });
            else console.log("[MAP DEV]: Nie użyłeś polecenia startDraw(Nazwa ikony)");
        });


        // you can set .my-div-icon styles in CSS

        // show a marker on the map



        let prevoriusZoom = 15;

        map.on('zoomstart',function(){
            var currentZoom = map.getZoom();

            //console.log("Zoom wynosi: " + currentZoom+ " a poprzedni to: " + prevoriusZoom);

            prevoriusZoom = currentZoom;
        });

        map.on('zoomend', function() {
            var currentZoom = map.getZoom();

            if(currentZoom>prevoriusZoom)
            {
                if(currentZoom==15)
                {
                    //
                    console.log(1)
                }
                else if(currentZoom==16)
                {
                    $('div.hideOnLarge').removeClass('hide')
                    console.log(2)
                }
                else if(currentZoom==17)
                {
                    $('div.hideOnLarge').removeClass('hide')
                    console.log(3)
                }
                console.log("powiekszanie")
            }
            else {
                if(currentZoom==15)
                {
                    $('div.hideOnLarge').addClass('hide')
                    console.log(4)
                }
                else if(currentZoom==16)
                {
                    console.log(5)
                }
                else if(currentZoom==17)
                {
                    console.log(6)
                }
                console.log("Pomniejszanie")
            }

            prevoriusZoom = currentZoom;


        });


        function startDraw($type,$hideOnLarge) {
            drawMarkerIcon = $type;
            if($hideOnLarge) hideOnLarge = "hide hideOnLarge";
            else hideOnLarge = null;
        }


        function drawMarker($data) {
            myIcon = L.divIcon({className: 'marker ' + $data.icon + " " + $data.hideOnLarge});
            L.marker({
                id:$data.icon,
                "icon":$data.icon,
                lon: $data.y,
                lat: $data.x,
            }, {icon: myIcon}).bindPopup('<p>Sklep monopolowy</p><br> <a href="#">Wejdź</a>').addTo(map);



        }


        /*
         * Sklepy
         * ID
         * Typ sklepu
         * Koordynaty x, y
         *
         */

        let map_data = {
            buildings: {
                shops: {},
                houses: {},
                churches: {}

            }
        }


    </script>
@endsection()




