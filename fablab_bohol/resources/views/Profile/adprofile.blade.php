<!DOCTYPE html>
<html>
<head>

@include('NavBars.head')

</head>
<body>


@include('Navbars.navbar')

@yield('content')
 <!--Navigation Bar -->   
 @include('NavBars.sidebar')
 @include('NavBars.leftsidebar')

 <div class="page-wrapper">
 <div class="profile-wrapper">
  <h2 class="profile-title">My Profile</h2>

  <div class="profile-card">
    <div class="profile-edit">
      <p class="fa fa-edit">Edit</p>
    </div>

    <div class="profile-content">
      <div class="profile-image"></div>

      <div class="profile-details">
        <p><strong>Full Name:</strong> Jerome Manatad</p>
        <p><strong>Email:</strong> jeromemanatad@gmail.com</p>
        <p><strong>Position:</strong> Director</p>
        <p><strong>Gender:</strong> Male</p>
        <p><strong>Birthday:</strong> September 19, 1993</p>
      </div>
    </div>
  </div>
</div>
</div>

 <script src="{{ asset('js/sidepanel.js') }}"></script>
</body>

</html>