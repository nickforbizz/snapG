<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About The Designs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/catalogue.css" />
    <link rel="stylesheet" href="../../bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/animate.css">
    <link rel="stylesheet" href="../../css/fullBlog.css">
    <link rel="stylesheet" href="../../css/w3.css">
    <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
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
          <a class="nav-link" href="../../index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../gallery.php">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../blog.php">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
  <br>

  <div class="container">
    <div id="headerCatalogue">
      <!-- <h1 class="text-center">Full Blogs</h1> -->
      <hr>
    </div>
    <!-- headerCatalogue end -->
     <div class="" id="catalogueBody">
      <div class="row">
        <div class="col-8" >
    <?php
    // print_r($_GET['blog_id']);
    require_once('../../../private/conn.php');
    require_once('../../../private/functions.php');

    $blog_id = $_GET['blog_id'];
    // print_r($_GET);
    $category_blogs = '';
  
    function fetchBlog($var)
    {
      // global vars
      global $conn;
      global $category_blogs;

      // sql query
      $query = $conn->query("SELECT * from  blogs where blogs.status = 1 and blogs.blog_id = $var;");
      
      // fetch data
      while ($a = $query->fetch_assoc()) {
        # code...
        $author_id = $a['owner_id'];
        $category_blogs = $a['category'];
  
        $query_author = $conn->query("SELECT * from  design_users where design_users.user_id = 3");
        while ($b = $query_author->fetch_assoc()) {
          # code...
          
          echo '<div class="card">
                <img src="../../../private/' . $a['img_link'] . ' " alt="blog_pic" class="card-img-top" style="height:50vh">
                <div class="card-body">
                  <h4 class="card-title text-primary">
                  ' . $a['title'] . '
                  </h4>
                  <div class="card mb-4">
                  <div class="card-body">
                  <p class="card-title">By: ' .  $b['username']  . ' </p> <hr>
                  
                  <p class="card-text"> ' . htmlspecialchars_decode($a['content']) . ' </p>
                  </div>
                  </div>

                 

                </div>
              </div>';
        }
      }
    }
    fetchBlog($blog_id);
    ?>
            <!-- begin wwww.htmlcommentbox.com -->
            <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">Comment Box</a> is loading comments...</div>
            <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
            <script type="text/javascript" id="hcb">

             /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10&ts=1540374723503");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ 
             
            </script>
            <!-- end www.htmlcommentbox.com -->


            <!-- <div id="demo3" style="display:noneh" class=" w3-show">
            <hr>
            <div class="row mb-2">
              <div class="col-4 col-md-3 col-lg-2">
                <img src="../w3images/girl_mountain.jpg" style="width:90px;">
              </div>
              <div class="col-8 col-lg-10 col-md-9">
                <h5>Jane <span class="w3-opacity w3-medium">April 10, 2015, 7:22 PM</span></h5>
                <p>That was a great runway show! Thanks for everything.</p>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-3 col-lg-2">
                <img src="../w3images/boy.jpg" style="width:90px;">
              </div>
              <div class="col-8 col-lg-10 col-md-9">
                <h5>John <span class="w3-opacity w3-medium">April 8, 2015, 10:32 PM</span></h5>
                <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-3 col-lg-2">
                <img src="../w3images/girl_hood.jpg" style="width:90px;">
              </div>
              <div class="col-8 col-lg-10 col-md-9">
                <h5>Anja <span class="w3-opacity w3-medium">April 7, 2015, 9:12 PM</span></h5>
                <p>Cant wait for the runway to start!</p>
              </div>
            </div>
            
            <div class="form-grop">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Write your comment ...">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Go</button>  
              </div>
            </div>
            </div>

          </div> -->

        
       </div>

        <div class="col-4" >
          <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, non? Sed sit culpa, accusantium alias, similique maxime tempore itaque esse neque nemo assumenda ducimus id quod? Ab, optio atque. Eos? -->
          <div class="affix mt-4" style="position:sticky;top:0;">

            <h3 class ="text-center text-primary">Related:</h3>
            <div class="row justify-content-center">
            <?php
            
              $query_related = $conn->query("SELECT * from  blogs where blogs.status = 1 and blogs.category = '$category_blogs' and not blogs.blog_id = $blog_id limit 3;");
      
              while ($a = $query_related->fetch_assoc()) {

                echo '
                <div class="card m-4" style="width: 150px;">
                <img class="card-img-bottom" src="../../../private/' . $a['img_link'] . ' " height="70px" alt="Related image">
                  <div class="card-body">
                  <b class="card-title text-center">' . $a['title'] . '</b><hr/>
                  <p class="card-text"> ' . $a['blog_description'] . ' </p>
                  <div class="badge badge-pill badge-info mr-3" id="view_blog"> <a href="fullBlog.php?blog_id='.$a['blog_id'].'"> view blog </a> </div>
                  <div class="clearfix"></div>

                  </div>
                </div>
                ';
              }
              ?>
            </div>

          </div>
        </div>
        </div>
      </div>

    </div>
    <!-- catalogueBody end -->

  </div>


  <!-- footer -->
  <div class="jumbotron text-center bg-primary" id="footer" style="margin-top: 10px; margin-bottom: 0; border-radius: 0;">
    &copy;Copyright
    <a href="" style="color: gold">Wainaina Nicholas</a> <br>
    social media links here
  </div>

      <!-- js scripts -->
    <script type="text/javascript" src="../../js/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="../../bootstrap4/js/bootstrap.min.js"></script>
    <script src="../../js/fullBlog.js"></script>
</body>
</html>