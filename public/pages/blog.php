<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About The Designs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/blog.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/components.css" />

</head>
<body>
    <nav class="navbar navbar-expand-md bg-color navbar-dark">
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

      <div class="container">
          <div id="headerAbout">
              <h1 class="text-center">Blog</h1> <hr>
            
          </div>
          <!-- headerAbout end -->

          <div id="blogBody">




           <div class="row justify-content-center" id="blog_cards">          
                <!-- data will be dumped here by js -->           
                                 
                  <div id="noContent" class="d-flvex justify-content-center">
                    <div class="jumbotron no-conn">
                        <div class="no-conndiv1">
                            <h3>Not available.</h3>
                            <p>We are sorry for the inconviniences caused.</p>
                        </div>
                        <div class="no-conndiv2">
                        <img src="../img/anglyEgg.gif" alt="No connection due to errors" class="">
                        </div>
                    </div>           
                  </div> 

            </div>
            <div class="row">
              <div class="col-12 " id="pagination_id">
                <ul class="pagination justify-content-center" id="pagination">
                  <li class="page-item pi-prev"><a class="page-link" onclick="fetchf(currentIndex-9)">Previous</a></li>
                  <b id="pagination_links" class="d-flex">
                    <li class="page-item active"><a class="page-link" onclick="fetch(0)">1</a></li>
                    <li class="page-item"><a class="page-link" onclick="fetch(1)">2</a></li>
                    <li class="page-item"><a class="page-link" onclick="fetch(2)">3</a></li>
                    <li class="page-item"><a class="page-link" onclick="fetch(27)">4</a></li>
                    <li class="page-item"><a class="page-link" onclick="fetch(36)">5</a></li>
                  </b>
                  <li class="page-item pi-next"><a class="page-link" onclick="fetch('next')">Next</a></li>
                </ul>
              </div>
            </div>
            <!-- row small end -->






            
          </div>
          <!-- blogBody end -->
      </div>


      <!-- footer -->
      <div class="jumbotron text-center bg-color" id="footer">
          &copy;Copyright
           <a href="" style="color: gold">Wainaina Nicholas</a> <br>
           social media links here
      </div>

      <!-- js scripts -->
    <script type="text/javascript" src="../js/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="../bootstrap4/js/bootstrap.min.js"></script>
    <script src="../js/blog.js"></script>
</body>
</html>