@extends('layouts.main')

@include('layouts.partials.nav')


@section('content')
    <main id="mainWelcome">      

        <!-- Info container -->
        <section id="infoCon">

            <h2>The Best Smart Garden Monitor!</h2>
            <p>Monitor and control your entire operation 
                using the FLORA.IO.  We cater to garden 
                centers, nurseries, commercial 
                greenhouses, an home improvement 
                centers.
                
                The Arduino micro-controller offers a 
                combination of precision and 
                functionality.
            </p>
        </section>


        <!-- Benefits section -->
        <section id="benefits">
            <h2>Benefits of Flora.io</h2>
            <div id="benefitsCon">

                <div class="benefit">
                    <img src="images/future_nature.svg" alt="The future of gardening">
                    <div>
                        <h3>Temperature Sensor</h3>
                        <p>Maintaining controlled temperature is crucial.  Too much heat can kill plants as well as too cold. The FLORA.IO protects plants from extreme temperature fluctuations.</p>
                    </div>
                </div>

                <div class="benefit">
                    <img src="images/dirt_hands.svg" alt="Soil in hands">
                    <div>
                        <h3>Moisture Sensor</h3>
                        <p>The soil moisture sensor consists of two probes that are used to measure the amount of water in the soil.  These probes facilitate the process by allowing a current to pass through the soil which provides a measurement of the moisture.</p>
                    </div>
                    
                </div>

                <div class="benefit">
                    <img src="images/nature_screen.svg" alt="Plants coming out of screen">
                    <div>
                        <h3>Light Sensor</h3>
                        <p>The light sensor used is a photoresistor or photocell. It is used to detect light and to measure the brightness or illuminance level of the ambient light.  This will ensure that your plants receive optimum light and will be thriving.</p>
                    </div>
                </div>
            </div>
        </section>

        
    </main>

    <!-- sign up content -->
    <section id="signupCon">
            <h2>JOIN OUR WAITING LIST!</h2>
            <p>Don't miss out on early donor perks when you join our waiting list today!</p>
            <a href="#" class="signupBtn">SIGN UP</a>
        </section>

    <!-- download app content -->
    <section id="downloadCon">
        <h2>Download the App Now!</h2>
        <p>The Flora.io app is available for download now in the Apple App Store and the Google Play Store.</p>
        <div id="storeIcons">
            <img src="images/app_store.svg" alt="Apple App Store">
            <img src="images/play_store.svg" alt="Google PLay Store">
        </div>
    </section>

    <footer>
        <!-- <div id="footerContainer">
            <img src="images/arrowUp.svg" alt="Arrow Up" class="hiddenFooter" id="iconArrow">
            <p><a href="#">BACK TO THE TOP</p>
        </div> -->
        <div id="footerCon">
            <div id="socialIcons">
                <a href="#"><img src="images/instagram.svg" alt="instagram logo"></a>
                <a href="#"><img src="images/tiktok.svg" alt="tik tok logo"></a>
                <a href="#"><img src="images/twitter.svg" alt="twitter logo"></a>
                <a href="#"><img src="images/facebook.svg" alt="facebook logo"></a>
            </div>
        </div>
    </footer>
@endsection
