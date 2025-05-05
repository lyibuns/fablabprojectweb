<!DOCTYPE html>
<html>
<head>
  @include('NavBars.head')

  <style>
    .regevents-subtitle {
        font-weight: bold;
        font-size: 3.75vw; /* Scales from 30px at 800px width */
        color: #0a2540;
        margin-bottom: 6.25vw; /* Scales from 50px at 800px width */
        margin-top: 6.25vw; /* Scales from 50px at 800px width */
        text-align: center; /* Added for better responsiveness */
    }

    .regevents-event-card {
        width: 90vw; /* Makes the card responsive width */
        max-width: 700px; /* Keeps the original maximum width */
        margin-left: auto; /* Center the card */
        margin-right: auto; /* Center the card */
        background-color: #f9f9f9;
        border: 0.25vw dashed #ccc; /* Scales from 2px at 800px width */
        border-radius: 1.25vw; /* Scales from 10px at 800px width */
        padding: 6.25vw 2.5vw; /* Scales from 50px and 20px at 800px width */
    }

    .regevents-event-card:hover {
        background-color: #f1f1f1;
        cursor: pointer;
    }

    .regevents-event-card p {
        text-align: center;
        font-size: 2vw; /* Scales from 16px at 800px width */
        margin-bottom: 1.25vw; /* Scales from 10px at 800px width */
    }

    .regevents-plus {
        text-align: center;
        font-size: 3vw; /* Scales from 24px at 800px width */
        font-weight: bold;
        color: #0a2540;
    }

    .eventsattended {
        margin-top: 6.25vw; /* Scales from 50px at 800px width */
        text-align: center;
    }

    .eventsattended h2 {
        margin-top: 12.5vw; /* Scales from 100px at 800px width */
        margin-bottom: 6.25vw; /* Scales from 50px at 800px width */
        font-size: 3vw; /* Optional: Scale heading font size */
    }

   .regevents-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center; /* Center cards */
        gap: 3.75vw; /* Scales from 30px at 800px width */
        margin-top: 2.5vw; /* Scales from 20px at 800px width */
    }

    .regevents-card {
        width: 32.5vw; /* Scales from 260px at 800px width */
        min-width: 200px; /* Prevents card from becoming too narrow */
        background-color: #ffffff;
        border: 0.125vw solid #ccc; /* Scales from 1px at 800px width */
        border-radius: 1.875vw; /* Scales from 15px at 800px width */
        padding: 6.25vw; /* Scales from 50px at 800px width */
        box-shadow: 0px 0.5vw 1.25vw rgba(0, 0, 0, 0.05); /* Scales shadow values */
        text-align: left;
        transition: transform 0.2s;
    }

    .regevents-card:hover {
        transform: scale(1.03);
    }

    .regevents-card img {
        width: 100%;
        border-radius: 1.25vw; /* Scales from 10px at 800px width */
        margin-bottom: 1.25vw; /* Scales from 10px at 800px width */
        height: auto; /* Maintain aspect ratio */
    }
  </style>
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
