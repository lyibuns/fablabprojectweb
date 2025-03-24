<!DOCTYPE html>
<html lang="en">
<head>

@include('NavBars.head')

</head>
<body>

@yield('content')
 <!--Navigation Bar -->   
 @include('NavBars.navbar')

    <!-- About Us Page Content -->
    <main>
        <section class="abouthero">
        <img src="" alt="About Us Picture">
        <h1>About Us</h1>
    
        </section>

        <div class="aboutuptext">
        <h2>We create new ways to get inspired.</h2>
        <p>We invent. We tinker. We experiment with new technologies. We share snippets of our life experiences with each other. It helps influence the way we think and the way we work.</p>
        </div>

        <div class="aboutusintro">
        <img src="" alt="About Us Picture">
        <p>A Fab Lab, or digital fabrication laboratory, is a place to play, to create, to mentor and to invent: a place for learning and innovation.
Fab Labs provide access to the environment, the skills, the materials and the advanced technology to allow anyone anywhere to make (almost) anything.
The Fab Lab program was started in the Media Lab at Massachusetts Institute of Technology (MIT) as a collaboration between the Grassroots Invention Group and the Center for Bits and Atoms, broadly exploring how a community can be powered by technology at the grassroots level.</p>
        <button> Join Us! </button>

        </div>

        <section class="aboutusfounder">
            <div class="drneil">   
            <img src="" alt="Dr. Neil Gershenfeld">
            <p>The FABLab concept is the brainchild of MIT professor Dr. Neil Gershenfeld. The first FABLab was created in 2001 at the Massachusetts Institute of Technology (MIT) at the Center for Bits and Atoms (CBA).</p>
            </div>
            <p>A Fab Lab, or digital fabrication laboratory, is a place to play, to create, to learn, to mentor, to invent: a place for learning and innovation. Fab Labs provide access to the environment, the skills, the materials and the advanced technology to allow anyone anywhere to make (almost) anything.</p>
            <img src="" alt="Photo">
        </section>

        <div class="aboutusstaff">
            <h3>We are a team of expert designers. </h3>
            <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development to fill empty spaces in a layout that does not yet have content.</p>
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

    <nav class="bottom-bar">
        <div class="botlogos">
        <img src="../images/bottombar_fablab.png" alt="fablab" class="bottom-bar-img">
        <img src="../images/bottombar_dti.png" alt="dti" class="bottom-bar-img">
        <img src="../images/bottombar_bisu.png" alt="bisu" class="bottom-bar-img">
        <img src="../images/bottombar_dost.png" alt="dost" class="bottom-bar-img">
        <img src="../images/bottombar_jica.png" alt="jica" class="bottom-bar-img">  
        </div>
            <div class="botlearnmore">
            <h5>Learn More</h5>
            <ul>
                <li><a href="{{ route('events') }}">Events</a></li>
                <li><a href="">Newsletter</a></li>
            </ul>
            </div>
            <div class="botorg">
            <h5>Organization</h5>
            <ul>
                <li><a href="{{ route('aboutus') }}">About Us</a></li>
                <li><a href="{{ route('facilities') }}">Facilities</a></li>
                <li><a href="">Policy</a></li>
                <li><a href="">FAQs</a></li>
            </ul>
            </div>

            <div class="botconnect">
            <h5>Connect with Us</h5>
            <ul>
                <li><img src="../images/logoloc.png" alt="Location">BISU Main Campus CPG Avenue, Tagbilaran City, Bohol</li>
                <li><img src="../images/logocontact.png" alt="Phone">411-3147</li>
                <li><img src="../images/logoemail.png" alt="Email"><a href="mailto:fablabbhl@gmail.com">fablabbhl@gmail.com</a></li>
            <div class="vertlogo">
            <a href="https://www.facebook.com/fablabbohol" target="_blank">

            <img src="../images/logofb.png" alt="Facebook">
            </a>
            <a href="https://www.instagram.com/fablab.bohol/" target="_blank">
                <img src="../images/logoig.png" alt="Instagram">    
            </a>
            <a href="https://m.me/fablabbohol" target="_blank">
                <img src="../images/logomess.png" alt="Messenger">
            <a>
            </div>
            </ul>
            </div>
        </nav>



</body>
</html>
