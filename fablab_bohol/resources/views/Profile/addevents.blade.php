<!DOCTYPE html>
<html>
<head>
  @include('NavBars.head')
  @yield('content')
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
