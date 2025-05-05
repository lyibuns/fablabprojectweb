<!DOCTYPE html>
<html>
<head>
@include('NavBars.head')
@yield('content')

<style>
    .newsletter-page h1 {
        color: #0b1f3a;
        margin-bottom: 2.5vw; /* Scales from 20px at 800px width */
        font-size: 3vw; /* Optional: Add scaling font size (adjust as needed) */
    }

    .newsletter-upload-container {
        max-width: 75vw; /* Maximum width relative to viewport width */
        margin: 7.5vw auto; /* Vertical margin relative to viewport width, horizontal auto */
        background: white;
        padding: 5vw; /* Padding relative to viewport width */
        border-radius: 1.25vw; /* Border radius relative to viewport width */
        box-shadow: 0 0.25vw 1.875vw rgba(0, 0, 0, 0.05); /* Box shadow values relative to viewport width */
    }

    .upload-title {
        text-align: center;
        font-size: 2.75vw; /* Font size relative to viewport width */
        font-weight: bold;
        margin-bottom: 3.75vw; /* Margin bottom relative to viewport width */
        color: #0a2540;
    }

    .newsletter-form {
        display: flex;
        flex-direction: column;
        gap: 2.5vw; /* Gap between form elements relative to viewport width */
    }

    .form-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .form-row label {
        width: 12.5vw; /* Label width relative to viewport width */
        font-weight: 500;
        color: #333;
        font-size: 1.1vw; /* Label font size relative to viewport width */
    }

    .form-row input[type="text"],
    .form-row input[type="file"],
    .form-row select {
        flex: 1;
        padding: 1vw 1.5vw; /* Padding relative to viewport width */
        border: 0.125vw solid #ccc; /* Border width relative to viewport width */
        border-radius: 1vw; /* Border radius relative to viewport width */
        font-size: 1.1vw; /* Input font size relative to viewport width */
    }

    .center-btn {
        justify-content: center;
    }

    .center-btn button {
        padding: 1.25vw 3.125vw; /* Padding relative to viewport width */
        font-size: 1.25vw; /* Button font size relative to viewport width */
        background-color: #0a2540;
        color: white;
        border: none;
        border-radius: 2.5vw; /* Border radius relative to viewport width */
        cursor: pointer;
    }

    .uploaded-newsletters h2 {
        color: #0b1f3a;
        margin-bottom: 1.25vw; /* Scales from 10px at 800px width */
        text-align: center;
        margin-top: 12.5vw; /* Scales from 100px at 800px width */
        font-size: 2.5vw; /* Optional: Scale font size */
    }

    .newsletter-list-section {
        margin: 7.5vw auto; /* Vertical margin scaled */
        max-width: 90vw; /* Max width relative to viewport width */
        padding: 0 2.5vw; /* Horizontal padding scaled */
    }

    .newsletter-list-header {
        display: flex;
        align-items: center;
        justify-content: space-between; /* Moves filter/search to the left */
        gap: 2.5vw; /* Scaled gap */
        flex-wrap: wrap;
        margin-bottom: 3.75vw; /* Scaled margin bottom */
    }

    .newsletter-list-header h2 {
        font-size: 3vw; /* Scaled font size */
        font-weight: bold;
        color: #0a2540;
    }

    .newsletter-controls {
        display: flex;
        gap: 1.25vw; /* Scaled gap */
    }

    .newsletter-controls select,
    .newsletter-controls input {
        padding: 1vw 1.5vw; /* Scaled padding */
        border: 0.125vw solid #ccc; /* Scaled border */
        border-radius: 0.75vw; /* Scaled border radius */
        font-size: 1.75vw; /* Scaled font size */
    }

    /* Grid for thumbnails */
    .newsletter-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 2.5vw; /* Scaled gap */
        justify-content: flex-start;
    }

    .newsletter-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 22.5vw; /* Scaled width */
        text-align: center;
    }

    .newsletter-thumbnail {
        width: 100%; /* Maintain relative width within the card */
        height: 25vw; /* Scaled height */
        background: #dcdcdc;
        border: 0.25vw solid #b4b4b4; /* Scaled border */
        border-radius: 0.75vw; /* Scaled border radius */
    }

    .newsletter-title {
        margin-top: 1.25vw; /* Scaled margin top */
        font-size: 1.75vw; /* Scaled font size */
        color: #0a2540;
    }

    .center-btn button:hover {
        background-color: #003366;
    }

</style>

</head>
<body>


@include('Navbars.navbar')

 <!--Navigation Bar -->
 @include('NavBars.sidebar')
 @include('NavBars.leftsidebar')

 <div class="page-wrapper">
 <div class="newsletter-page">
  <h1>Newsletters</h1>

  <!-- Upload Section -->
  <div class="newsletter-upload-container">
  <h2 class="upload-title">Upload a Newsletter</h2>
  <form class="newsletter-form">
    <div class="form-row">
      <label for="cover">Cover</label>
      <input type="file" id="cover" name="cover">
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
        <option>Annual</option>
        <option>Magazine</option>
        <option>Newsletter</option>
      </select>
    </div>
    <div class="form-row">
      <label for="year">Year</label>
      <input type="text" id="year" name="year" value="2025">
    </div>
    <div class="form-row center-btn">
      <button type="submit">Upload File</button>
    </div>
  </form>
</div>


<div class="newsletter-list-section">
  <div class="newsletter-list-header">
    <h2>Uploaded Newsletters</h2>
    <div class="newsletter-controls">
      <select>
        <option>Filter</option>
        <option>2025</option>
        <option>Workshops</option>
      </select>
      <input type="text" placeholder="Search" />
    </div>
  </div>

  <div class="newsletter-grid">
  <div class="newsletter-card">
    <div class="newsletter-thumbnail"></div>
    <p class="newsletter-title">Fablab 2nd Quarter Report</p>
  </div>

  <!-- Repeat more cards -->
  <div class="newsletter-card">
    <div class="newsletter-thumbnail"></div>
    <p class="newsletter-title">Fablab 2025 Magazine</p>
  </div>

  <div class="newsletter-card">
    <div class="newsletter-thumbnail"></div>
    <p class="newsletter-title">Fablab 1st Quarter Report</p>
  </div>

  <div class="newsletter-card">
    <div class="newsletter-thumbnail"></div>
    <p class="newsletter-title">Fablab 4th Quarter Report</p>
  </div>

  <div class="newsletter-card">
    <div class="newsletter-thumbnail"></div>
    <p class="newsletter-title">Fablab Annual Report</p>
  </div>
</div>


</div>

 <script src="{{ asset('js/sidepanel.js') }}"></script>
</body>

</html>
