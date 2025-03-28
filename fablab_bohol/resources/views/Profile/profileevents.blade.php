<!DOCTYPE html>
<html>
<head>
  @include('NavBars.headpro')
</head>
<body>

  @include('Navbars.navbar')
  @yield('content')

  <!-- Navigation Bars -->
  @include('NavBars.sidebar')
  @include('NavBars.leftsidebar')

  <!-- Main Page Content -->
  <div class="page-wrapper">
    <h1>Hello Jerome!</h1>

    <!-- Current Event Signup -->
    <h2 class="regevents-subtitle">Current</h2>
    <div class="regevents-center-wrapper">
      <div class="regevents-event-card">
        <p>Join an upcoming event</p>
        <div class="regevents-plus">+</div>
      </div>
    </div>

    <!-- Events Attended -->
    <div class="eventsattended">
      <h2>Events Attended</h2>
      <div class="regevents-grid">
        <div class="regevents-card">
          <img src="{{ asset('images/event1.jpg') }}" alt="Event Image">
          <p><strong>Event Name:</strong> 3D Printing Workshop</p>
          <p><strong>Description:</strong> Learn 3D Printing in FabLab!</p>
          <p><strong>Category:</strong> 3D Printing</p>
          <p><strong>Materials Needed:</strong> Clay, Laptop</p>
          <p><strong>Venue:</strong> FABLAB Bohol, BISU Main</p>
          <p><strong>Date:</strong> 3/26/25</p>
        </div>
        <!-- Add more .regevents-card elements here as needed -->
      </div>
    </div>
  </div>

  <script src="{{ asset('js/sidepanel.js') }}"></script>

  <!-- Full-Screen Dark Overlay -->
  <div id="overlay" class="overlay" onclick="closeNav()"></div>

</body>
</html>
