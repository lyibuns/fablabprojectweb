<!DOCTYPE html>
<html lang="en">
<head>

@include('NavBars.head')

</head>
<body>

@yield('content')
 <!--Navigation Bar -->   
 @include('NavBars.navbar')

 @include('NavBars.sidebar')

    <!-- Location Page Content -->
    <main>

       <section class="locp-container">
        <h2 class="locp-title">Location</h2>
        <p>Laboratories near you.</p>
        <div class="locp-content">
    <!-- LEFT: Location Cards -->
    <div class="locp-cards">
        <!-- CARD 1 -->
        <div class="locp-card" data-map="../images/map1.png" data-link="https://maps.google.com?q=FABLAB+Bohol">
            <img src="../images/fablab_building.jpg" alt="Main Office" class="locp-img">
            <div class="locp-card-info">
                <h4>MAIN OFFICE</h4>
                <p>C.P.G. North Avenue, Tagbilaran City, Central Visayas</p>
                <p>411 - 3147</p>
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="locp-card" data-map="../images/map2.png" data-link="https://maps.google.com?q=FABLAB+Branch+2">
            <img src="../images/fablab_building.jpg" alt="Branch 2" class="locp-img">
            <div class="locp-card-info">
                <h4>DigiFab Calape</h4>
                <p>Calape, Bohol</p>
                <p>411 - 3148</p>
            </div>
        </div>

        <!-- CARD 3 -->
        <div class="locp-card" data-map="../images/map3.png" data-link="https://maps.google.com?q=FABLAB+Branch+3">
            <img src="../images/fablab_building.jpg" alt="Branch 3" class="locp-img">
            <div class="locp-card-info">
                <h4>DigiFab Bilar</h4>
                <p>Bilar, Bohol</p>
                <p>411 - 3149</p>
            </div>
        </div>
    </div>

    <!-- RIGHT: Dynamic Map Preview -->
    <div class="locp-map">
        <a id="locp-map-link" href="https://maps.google.com?q=FABLAB+Bohol" target="_blank">
            <img id="locp-map-img" src="../images/map1.png" alt="Map" />
        </a>
    </div>
    <div class="locp-map">
        <a id="locp-map-link" href="https://maps.google.com?q=FABLAB+Bohol" target="_blank">
            <img id="locp-map-img" src="../images/map1.png" alt="Map" />
        </a>
    </div>
    <div class="locp-map">
        <a id="locp-map-link" href="https://maps.google.com?q=FABLAB+Bohol" target="_blank">
            <img id="locp-map-img" src="../images/map1.png" alt="Map" />
        </a>
    </div>
</div>


        </div>
    </section>

    <script src="location.js"></script>
    </main>

    @include('NavBars.botbar')

        
  <script src="{{ asset('js/sidepanel.js') }}"></script>
</body>
</html>
