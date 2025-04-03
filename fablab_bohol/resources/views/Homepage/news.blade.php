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


@include('NavBars.botbar')

<script src="{{ asset('js/search-news.js') }}"></script>

<script src="{{ asset('js/sidepanel.js') }}"></script>
</body>
</html>
