<!DOCTYPE html>
<html lang="en">
<head>

@include('NavBars.head')

</head>
<body>

@yield('content')
 <!--Navigation Bar -->   
 @include('NavBars.navbar')

 
 @include('NavBars.sidebar')
    <!-- About Us Page Content -->
    <main>
        <div class="aboutusmain-container">
            <div class="aboutusmain-content">
       <!-- <img src="" alt="About Us Picture"> -->   
                <h1>ABOUT US</h1>
            </div>
            <img src="{{ asset('images/abtus.jpg') }}" alt="About Us Picture" class="img-fluid" style="max-width: 700px;">

         </div>
    
      

        <div class="aboutustext">
            <h2>We create new ways to get inspired.</h2>
            <p>We invent. We prototype. We experiment with new technologies. We share snippets of our life experiences with each other. It helps influence the way we think and the way we work.</p>
        </div>

        <div class="aboutusintro">
            <img src="{{ asset('images/aboutus.jpg') }}" alt="About Us Picture">
        </div>
        <p>FABLAB Bohol Philippines is the first Fabrication Laboratory in the Philippines.</p>

        <p>It is a collaboration project between four government agency we have the Department of Trade and Industry, Bohol Island State University, Department of Science and Technology and Japan International Cooperating Agency.</p>

        <p>Fablab Bohol was inaugurated last May 2, 2014, at Bohol Island State University-Main Campus Tagbilaran City Bohol Philippines.</p>

        <p>FABLAB Bohol Philippines also established the FAN (Fablab Asian Network) International Conference which is also inaugurated in Fablab Bohol Philippines the FAN 1 or Fablab Asian Network Conference last May 2014. It was participated by 8 countries 14 FabLab and a total of 200 participants.</p>

        <p>Fablab Bohol Philippines now is the parent of the growing FABLAB in the Philippines.</p>
    

      
            <div class="drneil">   
                <img src="{{ asset('images/doc.jpg') }}" alt="Dr. Neil Gershenfeld" >
                <h4>Dr. Neil Gershenfeld</h4>   
            </div>
            <p>The FABLab concept is the brainchild of MIT professor Dr. Neil Gershenfeld. The first FABLab was created in 2001 at the Massachusetts Institute of Technology (MIT) at the Center for Bits and Atoms (CBA).</p>
            <p>A Fab Lab, or digital fabrication laboratory, is a place to play, to create, to learn, to mentor, to invent: a place for learning and innovation. Fab Labs provide access to the environment, the skills, the materials and the advanced technology to allow anyone anywhere to make (almost) anything.</p>
            
      

        <!-- Inserted Social Links -->
        <div class="mt-6">
            <!--<h4>Links</h4>-->
             <!--<img src="" alt="Photo" class="img-fluid mx-auto d-block"> -->
            <ul class="list-unstyled fs-5">
                <li>
                    <a href="https://www.youtube.com/watch?v=ek4cprnx0bI" target="_blank" class="text-decoration-none" style="color:rgb(43, 51, 162);">
                        https://www.youtube.com/watch?v=ek4cprnx0bI
                    </a>
                </li>
        </div>


        <div class="aboutusstaff">
            <h2>Employees</h2>
            <!--<button onclick="window.location.href='{{ route('location') }}'"> Join Us! </button>-->
            <p>FABLAB Bohol is powered by a team of passionate and skilled individuals dedicated to innovation, digital fabrication, and creative problem-solving.<br> Our staff supports makers, entrepreneurs, students, and the local community by providing technical assistance, design expertise, and hands-on training with cutting-edge technology.</br></p>
        </div>

            <div class="director">
                <img src="../images/staffdirect.jpg" alt="Dr. Jerome Manatad">
                <h4>Dr. Jerome P. Manatad </h4>
                <p> Fablab Director</p>
            </div>

            <div class="staff-container">

            <div class="staff">
                <img src="../images/stafflorren.jpg" alt="Lorren Aguilor">
                <h4>Lorren T. Aguilor </h4>
                <p>In-House Designer</p>
            </div>

            <div class="staff">
                <img src="../images/stafflhen.jpg" alt="Lhenbert Aleria">
                <h4>Lhenbert T. Aleria</h4>
                <p> Machine Operator Officer</p>
            </div>

            <div class="staff">
                <img src="../images/staffjoy.jpg" alt="Christine Joy Celocia">
                <h4>Christine Joy Celocia</h4>
                <p>Technical Assistant</p>
            </div>
        </div>



    </main>

    @include('NavBars.botbar')

        
  <script src="{{ asset('js/sidepanel.js') }}"></script>


</body>
</html>
