<!DOCTYPE html>
<html>
<head>


@include('NavBars.headpro')

</head>
<body>


@include('Navbars.navbar')

@yield('content')
 <!--Navigation Bar -->   
 @include('NavBars.sidebar')

        <script src="{{ asset('js/sidepanel.js') }}"></script>
    </nav>

    
    <!-- ✅ Full-Screen Dark Overlay -->
    <div id="overlay" class="overlay" onclick="closeNav()"></div>
</body>

</html>