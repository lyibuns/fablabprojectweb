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
 
 @include('NavBars.leftsidebar')

    <div class="page-wrapper">
        <h1>Hello Jerome!</h1>
        
        <div class="regbooking-wrapper">

<div class="regbooking-current">
  <h2>Current</h2>

  <!-- Placeholder for booking -->
  <div class="regbooking-book-card">
    <p>Book a machine</p>
    <div class="regbooking-plus">+</div>
  </div>

  <!-- Example booking card -->
  <!--
  <div class="regbooking-current-booking">
    <strong>3D Printer Machine</strong><br>
    02/03/2025<br>
    9:00 AM - 11:00 AM<br>
    Status: Ongoing
  </div>
  -->
</div>

<div class="regbooking-history">
  <h2>History</h2>

  <table class="regbooking-table">
    <thead>
      <tr>
        <th>Machine</th>
        <th>Date</th>
        <th>From</th>
        <th>To</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>3D Printer Machine</td>
        <td>02/03/2025</td>
        <td>9:00 AM</td>
        <td>11:00 AM</td>
        <td>Complete</td>
      </tr>
      <tr>
        <td>3D Printer Machine</td>
        <td>02/03/2025</td>
        <td>9:00 AM</td>
        <td>11:00 AM</td>
        <td>Complete</td>
      </tr>
    </tbody>
  </table>
</div>

</div>


    
        </div>
    </div>


    
    <!-- ✅ Full-Screen Dark Overlay -->
    <div id="overlay" class="overlay" onclick="closeNav()"></div>

    <script src="/js/profile/calendar.js" defer></script>
    <script src="{{ asset('js/sidepanel.js') }}"></script>
</body>

</html>