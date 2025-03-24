<!DOCTYPE html>
<html lang="en">
<head>

@include('NavBars.head')

</head>
<body>

@yield('content')
 <!--Navigation Bar -->   
 @include('NavBars.navbar')

    
    <main>
    <section class="newsletter">
    <h1>Reports and Resources</h1>
    <hr>
<div class="newsbutton">
    <button class="newsbtns" data-category="all">All Reports</button>
    <button class="newsbtns" data-category="magazines">Magazines</button>
    <button class="newsbtns" data-category="annual">Annual Reports</button>
    <button class="newsbtns" data-category="quarterly">Quarterly Reports</button>

    <section class="search-filternews">
        <div class="search-containernews">
            <input type="text" placeholder="Search Reports">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="search-iconnews">
                <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zM9.5 14C7 14 5 12 5 9.5S7 5 9.5 5 14 7 14 9.5 12 14 9.5 14z"/>
            </svg>
        </div>
    </section>
</div>



<ul class="report-list">
    <li class="report-item" data-category="annual"><a href="{{ route('news') }}">Fablab Annual Report 2024</a></li>
    <li class="report-item" data-category="quarterly"><a href="{{ route('events') }}">Fablab 1st Quarter Report 2024</a></li>
    <li class="report-item" data-category="quarterly"><a href="{{ route('facilities') }}">Fablab 2nd Quarter Report 2024</a></li>
    <li class="report-item" data-category="quarterly"><a href="{{ route('aboutus') }}">Fablab 3rd Quarter Report 2024</a></li>
    <li class="report-item" data-category="quarterly"><a href="{{ route('location') }}">Fablab 4th Quarter Report 2024</a></li>
    <li class="report-item" data-category="magazines"><a href="{{ route('location') }}">Fablab Magazine</a></li>
</ul>
    </div>
        </section>
</section>
</main>


<nav class="bottom-bar">
        <div class="botlogos">
        <img src="../images/bottombar_fablab.png" alt="fablab" class="bottom-bar-img">
        <img src="../images/bottombar_dti.png" alt="dti" class="bottom-bar-img">
        <img src="../images/bottombar_bisu.png" alt="bisu" class="bottom-bar-img">
        <img src="../images/bottombar_dost.png" alt="dost" class="bottom-bar-img">
        <img src="../images/bottombar_jica.png" alt="jica" class="bottom-bar-img">  
        </div>
            <div class="botlearnmore">
            <h5>Learn More</h5>
            <ul>
                <li><a href="{{ route('events') }}">Events</a></li>
                <li><a href="">Newsletter</a></li>
            </ul>
            </div>
            <div class="botorg">
            <h5>Organization</h5>
            <ul>
                <li><a href="{{ route('aboutus') }}">About Us</a></li>
                <li><a href="{{ route('facilities') }}">Facilities</a></li>
                <li><a href="">Policy</a></li>
                <li><a href="">FAQs</a></li>
            </ul>
            </div>

            <div class="botconnect">
            <h5>Connect with Us</h5>
            <ul>
                <li><img src="../images/logoloc.png" alt="Location">BISU Main Campus CPG Avenue, Tagbilaran City, Bohol</li>
                <li><img src="../images/logocontact.png" alt="Phone">411-3147</li>
                <li><img src="../images/logoemail.png" alt="Email"><a href="mailto:fablabbhl@gmail.com">fablabbhl@gmail.com</a></li>
            <div class="vertlogo">
            <a href="https://www.facebook.com/fablabbohol" target="_blank">

            <img src="../images/logofb.png" alt="Facebook">
            </a>
            <a href="https://www.instagram.com/fablab.bohol/" target="_blank">
                <img src="../images/logoig.png" alt="Instagram">    
            </a>
            <a href="https://m.me/fablabbohol" target="_blank">
                <img src="../images/logomess.png" alt="Messenger">
            <a>
            </div>
            </ul>
            </div>
        </nav>

<script src="{{ asset('js/search-news.js') }}"></script>
</body>
</html>
