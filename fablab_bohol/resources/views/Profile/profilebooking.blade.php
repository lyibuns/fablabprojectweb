<!DOCTYPE html>
<html>
<head>
@include('NavBars.head')

<style>
    .regbooking-wrapper {
        display: flex;
        gap: 5vw; /* Scales from 40px at 800px width */
        padding: 5vw; /* Scales from 40px at 800px width */
        font-family: Arial, sans-serif;
        flex-wrap: wrap; /* Allows sections to wrap on smaller screens */
    }

    .regbooking-current,
    .regbooking-history {
        flex: 1;
        min-width: 300px; /* Prevents sections from becoming too narrow */
    }

    .regbooking-current h2,
    .regbooking-history h2 {
        font-size: 3vw; /* Scales from 24px at 800px width */
        margin-bottom: 2.5vw; /* Scales from 20px at 800px width */
        color: #0a2540;
    }

    .regbooking-book-card {
        border: 0.25vw dashed #ccc; /* Scales from 2px at 800px width */
        padding: 7.5vw; /* Scales from 60px at 800px width */
        text-align: center;
        font-size: 2.25vw; /* Scales from 18px at 800px width */
        border-radius: 1.25vw; /* Scales from 10px at 800px width */
        background-color: #f8f8f8;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .regbooking-book-card:hover {
        background-color: #e9f0fa;
    }

    .regbooking-plus {
        font-size: 5vw; /* Scales from 40px at 800px width */
        margin-top: 1.25vw; /* Scales from 10px at 800px width */
        color: #0a2540;
    }

    .regbooking-current-booking {
        border: 0.125vw solid #ccc; /* Scales from 1px at 800px width */
        padding: 2.5vw; /* Scales from 20px at 800px width */
        background: #fff;
        border-radius: 1.25vw; /* Scales from 10px at 800px width */
        margin-bottom: 2.5vw; /* Scales from 20px at 800px width */
    }

    .regbooking-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border: 0.125vw solid #ddd; /* Scales from 1px at 800px width */
        font-size: 1.75vw; /* Optional: Scale table font size */
    }

    .regbooking-table th,
    .regbooking-table td {
        border: 0.125vw solid #ccc; /* Scales from 1px at 800px width */
        padding: 1.5vw; /* Scales from 12px at 800px width */
        text-align: center;
    }

    .regbooking-table th {
        background-color: #f0f0f0;
        color: #0a2540;
    }
</style>

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
