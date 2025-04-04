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
        <!-- "Find Us" Section -->
        <div class="location-info">
            <div>
                <h1 style="text-align: center;">WHERE YOU'LL FIND US</h1>
                <p><strong>FABLAB Bohol</strong> is located at <strong>Bohol Island State University (BISU) Main Campus, CPG Avenue, Tagbilaran City, Bohol.</strong></p>
                <p>We welcome students, researchers, and businesses to explore our digital fabrication facilities, develop prototypes, and learn cutting-edge technology.</p>
            </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3933.3995533368025!2d123.85285891137524!3d9.646859778970173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aa4db308799553%3A0xc61c21092087f823!2sFablab%20Bohol%20Philippines!5e0!3m2!1sen!2sus!4v1741937361477!5m2!1sen!2sus"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </iframe>
        </div>

        <!-- Google Map Embed -->
        <div class="map-container">
        <!--MAIN -->
        <h2>More FABLABs Around Bohol</h2>
        <!--CANDIJAY -->
        <p><strong>DigiFab Candijay</strong> is located at <strong>Bohol Island State University (BISU) Candijay Campus Cogtong, Candijay, Bohol.</strong></p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3931.18207770951!2d124.5266331113766!3d9.835070075808737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3300a78d0fa753cf%3A0xddc715efd96443b9!2sDigiFab%20Center%20-Bisu%20Candijay%20Campus!5e0!3m2!1sen!2sus!4v1741937434543!5m2!1sen!2sus"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <!--CALAPE -->
        <p><strong>DigiFab Calape</strong> is located at <strong>Bohol Island State University (BISU) Calape Campus San Isidro, Calape, Bohol.</strong></p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d471.7751657371775!2d123.88221309063088!3d9.894499867791724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aa323cb7aaaaab%3A0x856d8bc7852b9a9c!2sBohol%20Island%20State%20University%20Calape%20Campus!5e0!3m2!1sen!2sus!4v1741937547323!5m2!1sen!2sus"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

       
    </main>

    @include('NavBars.botbar')

        
  <script src="{{ asset('js/sidepanel.js') }}"></script>
</body>
</html>
