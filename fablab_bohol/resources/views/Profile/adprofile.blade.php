<!DOCTYPE html>
<html>
<head>
@include('NavBars.head')

<style>
    .profile-title {
        font-size: 3.5vw; /* Scales from 28px at 800px width */
        font-weight: bold;
        color: #0a2540;
        margin-bottom: 3.75vw; /* Scales from 30px at 800px width */
    }

    .profile-card {
        position: relative;
        border: 0.125vw solid #333; /* Scales from 1px at 800px width */
        border-radius: 3.75vw; /* Scales from 30px at 800px width */
        padding: 5vw; /* Scales from 40px at 800px width */
        max-width: 90vw; /* Maximum width relative to viewport width */
        margin: auto;
    }

    .profile-edit {
        position: absolute;
        top: 1.25vw; /* Scales from 10px at 800px width */
        right: 3vw; /* Scales from 24px at 800px width */
        font-size: 2.125vw; /* Scales from 17px at 800px width */
        cursor: pointer;
    }

    .profile-content {
        display: flex;
        align-items: center;
        gap: 6.25vw; /* Scales from 50px at 800px width */
    }

    .profile-image {
        width: 20vw; /* Scales from 160px at 800px width */
        height: 20vw; /* Scales from 160px at 800px width to maintain square aspect ratio */
        background-color: #0a2540;
        border-radius: 50%;
    }

    .profile-details {
        font-size: 2vw; /* Scales from 16px at 800px width */
        line-height: 1.8;
        color: #222;
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

</html>
