<!DOCTYPE html>
<html>
<head>
  @include('NavBars.head')
  @yield('content')

  <style>
    .event-upload-container {
        max-width: 80vw; /* Maximum width relative to viewport width */
        margin: 8vh auto; /* Vertical margin relative to viewport height, horizontal auto */
        background: white;
        padding: 5vw; /* Padding relative to viewport width */
        border-radius: 1.5vw; /* Border radius relative to viewport width */
        box-shadow: 0 0.3vw 2.25vw rgba(0, 0, 0, 0.05); /* Box shadow values relative to viewport width */
    }

    .upload-title {
        text-align: center;
        font-size: 3vw; /* Font size relative to viewport width */
        font-weight: bold;
        margin-bottom: 4.5vw; /* Margin bottom relative to viewport width */
        color: #0a2540;
    }

    .event-form {
        display: flex;
        flex-direction: column;
        gap: 3vw; /* Gap between form elements relative to viewport width */
    }

    .form-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .form-row label {
        width: 15vw; /* Label width relative to viewport width */
        font-weight: 500;
        color: #333;
    }

    .form-row input[type="text"],
    .form-row input[type="file"],
    .form-row input[type="date"],
    .form-row select {
        flex: 1;
        padding: 1.2vw 1.8vw; /* Padding relative to viewport width */
        border: 0.15vw solid #ccc; /* Border width relative to viewport width */
        border-radius: 1.2vw; /* Border radius relative to viewport width */
        font-size: 1.1vw; /* Font size relative to viewport width */
    }

    .center-btn {
        justify-content: center;
    }

    .center-btn button {
        padding: 1.5vw 3.75vw; /* Padding relative to viewport width */
        font-size: 1.2vw; /* Font size relative to viewport width */
        background-color: #0a2540;
        color: white;
        border: none;
        border-radius: 3vw; /* Border radius relative to viewport width */
        cursor: pointer;
    }

    .center-btn button:hover {
        background-color: #003366;
    }

    .event-section {
        max-width: 1100px;
        margin: 60px auto;
        padding: 0 20px;
    }

    .event-title {
        text-align: center;
        font-size: 26px;
        color: #0a2540;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .event-card {
        display: flex;
        gap: 100px;
        padding: 30px;
        border: 1px solid #000;
        border-radius: 30px;
        align-items: flex-start;
        background-color: white;
    }

    .event-left img {
        width: 250px;
        height: auto;
        border: 2px solid #999;
        border-radius: 4px;
    }

    .event-center {
        flex: 1;
        font-size: 15px;
        line-height: 1.8;
        color: #111;
    }

    .event-center p {
        margin: 0 0 6px 0;
    }

    .slots-left {
        margin-top: 20px;
        background-color: #fef08a;
        color: #333;
        border: none;
        padding: 10px 20px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
        cursor: default;
    }

    .event-right table {
        border-collapse: collapse;
        width: 25vw; /* Table width relative to viewport width */
        max-width: 300px; /* Optional: Set a maximum width in pixels if needed */
    }

    .event-right th,
    .event-right td {
        border: 0.15vw solid #333; /* Border width relative to viewport width */
        padding: 1.2vw; /* Padding relative to viewport width */
        text-align: center;
        font-size: 1.1vw; /* Optional: Adjust font size relative to viewport width */
    }

    .past-events-wrapper {
        padding: 5vw; /* Padding relative to viewport width */
        max-width: 90vw; /* Maximum width relative to viewport width */
        margin: 0 auto;
    }

    .past-events-title {
        text-align: center;
        font-size: 3vw; /* Font size relative to viewport width */
        color: #0a2540;
        margin-bottom: 3vw; /* Margin bottom relative to viewport width */
        font-weight: 700;
    }

    .past-events-controls {
        display: flex;
        justify-content: flex-end;
        gap: 1.5vw; /* Gap between controls relative to viewport width */
        margin-bottom: 3vw; /* Margin bottom relative to viewport width */
    }

    .past-events-controls select,
    .past-events-controls input {
        padding: 1vw 1.2vw; /* Padding relative to viewport width */
        border: 0.15vw solid #ccc; /* Border width relative to viewport width */
        border-radius: 0.8vw; /* Border radius relative to viewport width */
        font-size: 1.1vw; /* Font size relative to viewport width */
    }

    .past-events-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(20vw, 1fr)); /* Minimum column width relative to viewport width */
        gap: 3vw; /* Gap between grid items relative to viewport width */
    }

    .past-event-card {
        border: 0.15vw solid #333; /* Border width relative to viewport width */
        border-radius: 2.5vw; /* Border radius relative to viewport width */
        padding: 3vw; /* Padding relative to viewport width */
        text-align: left;
        background-color: white;
    }

    .event-image {
        display: block;
        margin: 0 auto 1.5vw; /* Margin bottom relative to viewport width */
        width: 12vw; /* Image width relative to viewport width */
        height: auto;
    }

    .event-info p {
        font-size: 1.5vw; /* Font size relative to viewport width */
        margin: 0.3vw 0; /* Vertical margin relative to viewport width */
        color: #222;
    }

    .admin-events {
        padding: 3vh 3vw; /* Padding for the events section */
        text-align: center; /* Center the text within the section */
    }

    .admin-events h1 {
        font-size: 4vw; /* Heading font size relative to viewport width */
        margin-bottom: 2vh; /* Bottom margin relative to viewport height */
    }
</style>

</head>
<body>

@include('NavBars.navbar')

@include('NavBars.sidebar')
@include('NavBars.leftsidebar')

<div class="page-wrapper">
  <div class="admin-events">
        <h1> Events </h1>
</div>

<div class="event-upload-container">
  <h2 class="upload-title">Upload an Event</h2>
  <form class="event-form">
    <div class="form-row">
      <label for="banner">Event Banner</label>
      <input type="file" id="banner" name="banner">
    </div>
    <div class="form-row">
      <label for="pdf">PDF</label>
      <input type="file" id="pdf" name="pdf">
    </div>
    <div class="form-row">
      <label for="title">Title</label>
      <input type="text" id="title" name="title" placeholder="Enter title">
    </div>
    <div class="form-row">
      <label for="category">Category</label>
      <select id="category" name="category">
        <option>Choose a category</option>
        <option>Workshop</option>
        <option>Talk</option>
        <option>Outreach</option>
        <option>Exhibition</option>
      </select>
    </div>
    <div class="form-row">
      <label for="date">Date</label>
      <input type="date" id="date" name="date">
    </div>
    <div class="form-row center-btn">
      <button type="submit">Upload Event</button>
    </div>
  </form>
</div>

<div class="event-section">
  <h2 class="event-title">Upcoming Events</h2>

  <div class="event-card">
    <div class="event-left">
      <img src="{{ asset('images/event1.jpg') }}" alt="Event Poster">
    </div>

    <div class="event-center">
      <p><strong>Event Name:</strong> 3D Printing Workshop</p>
      <p><strong>Description:</strong> Learn 3D Printing in FabLab!</p>
      <p><strong>Category:</strong> 3D Printing</p>
      <p><strong>Materials Needed:</strong> Clay, Laptop</p>
      <p><strong>Pax:</strong> 20</p>
      <p><strong>Venue:</strong> FABLAB Bohol, BISU Main</p>
      <p><strong>Date:</strong> 3/26/25</p>
      <button class="slots-left">Slots left: 10</button>
    </div>

    <div class="event-right">
      <table>
        <thead>
          <tr><th>Participants</th></tr>
        </thead>
        <tbody>
          <tr><td>Biancent</td></tr>
          <tr><td>Arjay</td></tr>
          <tr><td>Christian</td></tr>
          <tr><td>Bea</td></tr>
          <tr><td>Ferlyz</td></tr>
          <tr><td></td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="past-events-wrapper">
  <h2 class="past-events-title">Past Events</h2>

  <div class="past-events-controls">
    <select>
      <option>Filter</option>
      <option>2025</option>
      <option>Workshop</option>
    </select>
    <input type="text" placeholder="Search">
  </div>

  <div class="past-events-grid">
    <!-- Repeat this .past-event-card block as needed -->
    <div class="past-event-card">
      <img src="{{ asset('images/event1.jpg') }}" alt="Event Image" class="event-image">
      <div class="event-info">
        <p><strong>Event Name:</strong> 3D Printing Workshop</p>
        <p><strong>Description:</strong> Learn 3D Printing in FabLab!</p>
        <p><strong>Category:</strong> 3D Printing</p>
        <p><strong>Materials Needed:</strong> Clay, Laptop</p>
        <p><strong>Attendees:</strong> 20</p>
        <p><strong>Venue:</strong> FABLAB Bohol, BISU Main</p>
        <p><strong>Date:</strong> 3/26/25</p>
      </div>
    </div>
  </div>
</div>



  <script src="{{ asset('js/sidepanel.js') }}"></script>
</body>
</html>
