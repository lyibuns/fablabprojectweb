<!DOCTYPE html>
<html>
<head>


@include('NavBars.headpro')

</head>
<body>

@yield('content')
 <!--Navigation Bar -->   
 @include('NavBars.sidebar')

    <div class="current">
        <h1>Current</h1>
        <h2>Book a machine</h2>
    </div>

    <div class="schedules">
        <h1>Upcoming Schedule</h1>
        <div id="calendar"></div>
    </div>

    
    <!-- ✅ Full-Screen Dark Overlay -->
    <div id="overlay" class="overlay" onclick="closeNav()"></div>

    <script src="/js/profile/calendar.js" defer></script>
    <script src="{{ asset('js/sidepanel.js') }}"></script>
</body>

</html>