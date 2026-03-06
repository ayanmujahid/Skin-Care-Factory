@extends('layouts.main')
@section('content')
<!-- ================= Contact Banner ================= -->
 <!-- Contact page content -->
        <div class="contact-page-area">

            <!-- contact page map -->
            <div class="contact-page-map">
                <!-- Google Map Start -->
                <div class="container">
                    <div id="map"></div>
                </div>
                <!-- Google Map End -->
            </div>
            <!-- contact page map -->

            <!-- contact form area -->
            <div class="contact-form-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contact-form-inner">
                                <h2>TELL US YOUR PROJECT</h2>
                                <form action="{{route('contactSubmit')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" name="name" placeholder="Full Name*" required>
                                        </div>
                                        {{-- <div class="col">
                                            <input type="text" class="form-control" placeholder="Last name*" required>
                                        </div> --}}
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" name="email" placeholder="Email*" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="subject" placeholder="Subject*" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true"
                                                aria-invalid="false" placeholder="Message *" required></textarea>
                                        </div>
                                    </div>
                                    <div class="contact-submit">
                                        <input type="submit" value="Send Email" class="wpcf7-form-control wpcf7-submit button">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-address-area">
                                <h2>CONTACT US</h2>
                                <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est
                                    notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human.</p>
                                <ul>
                                    <li>
                                        <i class="fa fa-fax">&nbsp;</i> Address : No 40 Baria Sreet 133/2 NewYork City</li>
                                    <li>
                                        <i class="fa fa-phone">&nbsp;</i> Info@roadthemes.com</li>
                                    <li>
                                        <i class="fa fa-envelope-o"></i>&nbsp;</i>0314-2957246</li>
                                </ul>
                                <h3>
                                    <strong>Working hours</strong>
                                </h3>
                                <p>
                                    <strong>Monday – Saturday</strong>: &nbsp;08AM – 22PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- contact form area end -->

        </div>
        <!-- Contact page content end -->
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
    <script>
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 11,

                scrollwheel: false,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(23.761226, 90.420766), // New York

                // How you would like to style the map. 
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#444444"
                        }]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{
                            "color": "#f2f2f2"
                        }]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [{
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "simplified"
                        }]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [{
                                "color": "#314453"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "lightness": "-12"
                            },
                            {
                                "saturation": "0"
                            },
                            {
                                "color": "#4bc7e9"
                            }
                        ]
                    }
                ]
            };

            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(23.761226, 90.420766),
                map: map,
                title: 'Snazzy!'
            });
        }

    </script>
@endsection