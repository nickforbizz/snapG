<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About The Designs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/contact.css" />


</head>
<body>
    <nav class="navbar navbar-expand-md bg-color navbar-dark" >
        <a class="navbar-brand" href="../index.html">
        <!-- <img src="../img/Artboard 1.png" alt="LOGO"  width="100px;"> -->
        NICKS
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="../index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./gallery.php">Gallery</a>
            </li>    
            <li class="nav-item">
              <a class="nav-link" href="./blog.php">Blog</a>
            </li>   
            <li class="nav-item">
              <a class="nav-link" href="./catalogue.html">Catalogue</a>
            </li>   
            <li class="nav-item">
              <a class="nav-link" href="./about.html">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./contact.php">Contact</a>
            </li>  
          </ul>
        </div>  
      </nav>
      <br>

      <div class="container" id="vuecontact">
          <div id="headerContact">
              <h1 class="text-center">Contact</h1>  <hr>          
          </div>
          <!-- headerAbout end -->

          <div class="" id="contactBody">
            <div class="row">
            <div class="col-12 mt-4">
          <div class="" id="contact">
              <!-- <h3 class="text-center">Contact</h3>
              <hr> -->
              <div class="text-center">
                  <span class="fa fa-envelope mailicon mt-4"></span>
                  <div class="text-center mt-2 ">
                    <strong>Mail: </strong>  <span class="justify-content-end">wainaina.letters@gmail.com</span>
                  </div>
                  <span class="fa fa-phone-square mailicon mt-4"></span>
                  <div class="text-center mt-2"><strong class="justify-content-start">Telephone: </strong>
                     <span class="justify-content-end">0707 722 247</span> <br>
                     <span class="justify-content-end alignSpan" >0700 000 000</span>
                   </div>
                  <span class=" fa  fa-map-marker mapicon mt-4"></span>
                  <div class="text-center mt-2"><strong>Adress: </strong>  <span class="justify-content-end">19 Kagwe</span> </div>
              </div>
              <div class="col-6 offset-3 mt-4 mb-4">
                <form v-show="!submitted" enctype="multipart/form-data" method="post" id="contactForm">
                  <div class="form-group form-row">

                    <label class="col-form-label text-left" for="usermessage"><b>Message</b> </label>
                    <textarea name="messageInfo" class="form-control" id="usermessage"placeholder="Type your message here..."  required></textarea>
                   
                    <div class="col text-left">
                      <label class="col-form-label" for="useremail"><b>Email</b> </label>
                      <input type="email" class="form-control" id="useremail" name="clientEmail" placeholder="Type Your Email..." required>
                    </div>

                    <div class="col text-left">
                      <label class="col-form-label" for="username"><b>Name</b> </label>
                      <input type="text" class="form-control" id="username" name="clientName" placeholder="Type Your name..." required>
                    </div>

                  </div> <!-- End of form-group -->

                  <div class="custom-control custom-checkbox mb-3">                    
                      <input class="custom-control-input" type="checkbox" id="customCheck" name="newsletters">
                      <label class="custom-control-label" for="customCheck"> Receive Newsletters </label>
                  </div>

                  <button type="submit" class="btn btn-success" name="send_user_details">Send</button>
                </form>
                <div v-show="submitted" v-cloak class="mt-5 mb-5 text-center thanks">
                  <h2>Thanks for submitting</h2>
                  <button class="btn btn-success" @click.prevent="releaseThankyouNote">Submit another message</button>
                </div>
              </div>
          </div> <!-- End Of About -->
        </div> <!-- End Of col-12(contact) -->

            </div>
            <!-- big row end -->
          </div>
      </div>


      <!-- footer -->
      <div class="jumbotron text-center bg-color " id="footer-contact">
          &copy;Copyright
           <a href="" style="color: gold">Wainaina Nicholas</a> <br>
           social media links here
      </div>

      <!-- js scripts -->
    <script type="text/javascript" src="../js/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="../js/vue.js"></script>
    <script type="text/javascript" src="../bootstrap4/js/bootstrap.min.js"></script>
    <script src="../js/contact.js"></script>
</body>
</html>