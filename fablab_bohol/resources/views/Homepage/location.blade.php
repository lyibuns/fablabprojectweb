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
  <h2 class="locp-title">Fabulous Laboratories Near You</h2>
  <div class="locp-content">
    <!-- LEFT: Cards -->
    <div class="locp-cards">
      <div class="locp-card" data-map-id="map-main">
        <img src="../images/fablab_building.jpg" class="locp-img" alt="Main Office" />
        <div class="locp-card-info">
          <h4>MAIN OFFICE</h4>
          <p>C.P.G. North Avenue, Tagbilaran City</p>
        </div>
      </div>

      <div class="locp-card" data-map-id="map-candijay">
        <img src="../images/fablab_building.jpg" class="locp-img" alt="Candijay" />
        <div class="locp-card-info">
          <h4>DigiFab Candijay</h4>
          <p>Candijay, Bohol</p>
        </div>
      </div>

      <div class="locp-card" data-map-id="map-calape">
        <img src="../images/fablab_building.jpg" class="locp-img" alt="Calape" />
        <div class="locp-card-info">
          <h4>DigiFab Calape</h4>
          <p>Calape, Bohol</p>
        </div>
      </div>
    </div>
 
    <!-- RIGHT: Maps -->
    <div class="locp-maps">
      <a id="map-main" class="locp-map active" href="https://maps.app.goo.gl/9kMGcdyYgx2MHbSy8" target="_blank">
        <img src="../images/mapmain.png" alt="Main Map" />
      </a>
      <a id="map-candijay" class="locp-map" href="https://maps.app.goo.gl/ZxT6oHaZwUy9uf45A" target="_blank">
        <img src="../images/mapcandijay.png" alt="Candijay Map" />
      </a>
      <a id="map-calape" class="locp-map" href="https://maps.app.goo.gl/bL72JqcuRNWW8Vxn9" target="_blank">
        <img src="../images/mapcalape.png" alt="Calape Map" />
      </a>
    </div>
  </div>
</section>
    </main>

    @include('NavBars.botbar')

    <script src="location.js"></script>  
  <script src="{{ asset('js/sidepanel.js') }}"></script>
</body>
</html>
