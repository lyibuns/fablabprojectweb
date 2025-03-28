<!DOCTYPE html>
<html>
<head>


@include('NavBars.headpro')

@yield('content')
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
