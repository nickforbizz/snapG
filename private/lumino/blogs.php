<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blogs</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/newCss/blogs.css" rel="stylesheet">
	<style>

	</style>
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>NICKS</span></a>

			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name" id="Username">Username</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="index.html"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<!-- <li><a href="widgets.html"><em class="fa fa-calendar">&nbsp;</em> Widgets</a></li>
			<li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
            <li class="active"><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li> -->
			<!-- <li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li> -->
			<li><a href="blogs.php"><em class="fa fa-toggle-off">&nbsp;</em> Blogs</a></li>
			<li><a href="Images.html"><em class="fa fa-toggle-off">&nbsp;</em> Images</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
					</a></li>
				</ul>
			</li>
			<li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Post and Edit Blogs</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">UI Elements</h1> -->
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
            
            <div class="col-12">
            <div class="panel panel-default articles">

					<div class="panel-heading">
						Post Blogs				
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                    </div>

					<div class="panel-body articles-container">
						<div class="article border-bottom">
							<div class="col-xs-12">
                            <form method="post" id="form_post_blog">
													<div class="form-group">
														<label for="title">Title:</label>
														<input 	 class="form-control" id="title" placeholder="Enter name" name="blog_title" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="the_blog">Blog:</label>
                                                        <textarea class="tinymce form-control" id="the_blog" name="the_blog" rows="4"></textarea> 
														
                                                    </div>
													<div class="form-group">
														<label for="blog_description">Description</label>
                                                        <textarea class="form-control" id="blog_description" name="blog_description" rows="2"></textarea> 
													</div>
													<div class="form-group">
													<label for="sel1">Select Category:</label>
														<select name="img_categories" class="form-control custom-select-sm" id="sel1" required>
															<option value="uncategorized" selected>Uncategorized</option>
															<option value="fashion">fashion</option>
															<option value="Posters">Posters</option>
															<option value="image_manupilation">Image manupilation</option>
														</select>
													</div>
													<div class="" style="margin-bottom:5px"><b>Image:</b></div> 
													<div class="custom-file mb-3">
														<!-- <p>Upload Image</p> -->
														<input type="file" class="custom-file-input" name="img_upload" id="customFile" onchange="preview_file(this)" required>
														<label class="custom-file-label" for="customFile"></label>
														<img id="output_img" alt="preview Image here">
													</div>

													
													<!-- <span>owner id</span> -->
                                                    <input type="hidden" id="owner_id" name="owner_id" placeholder="owner_id">
                                                    <!-- <span>blog id</span> -->
													<input type="hidden" id="blog_id" name="blog_id" placeholder="blog_id">
													<input type="submit" name="upload_blog" class="btn btn-primary" id="upload_img_id" value="Submit" />
												</form>
							</div>
							<div class="clear"></div>
						</div><!--End .article-->
	
					</div> <!--End .panel-body articles-container -->
				</div> <!--End .panel panel-default articles -->
            </div> <!--End .col-12-->



 <div class="col-12">
            <div class="panel panel-default articles  ">

					<div class="panel-heading">
						Edit Blogs				
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                    </div>
					<div class="col-12" style="">
						<form  class="form-group" id="form_search_blog">
						<div class="input-group pull-right" style="margin: 0 20px 0 20px">
							<span class="input-group-addon">Search</span>
							<input id="search_blog" type="text" class="form-control" name="search_blog" placeholder="search the title of the blog ...">
						</div>
						</form> 
						<div class="m-5" style="hehight:200px">
							<div id="search_articles" class="panel-body articles-container m-5" style="display:none"></div>
						</div>
					</div>
					<div class="row">
					<div class="panel-body articles-container articles2">
	
					</div> <!--End .panel-body articles-container -->
					</div>
				</div> <!--nEnd .panel panel-default articles -->
            </div> <!--End .col-12-->



			<div class="col-sm-12">
				<p class="back-link">&copy;Wainaina Nicholas <a href="https://www.medialoot.com">wainainanicholas.com</a></p>
			</div>
		</div><!-- /.row -->
	</div><!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<!-- <script type="text/javascript" src="../../public/js/jquery.1.11.1.js"></script> -->
    <script type="text/javascript" src="../../public/bootstrap4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="./tinymce/init-tinymce.js"></script>
    <script type="text/javascript" src="./newjs/blogs.js"></script>
	<script>
	// $("#set-data-btn").on("click", function(e) {
		
	// 	var content = "<p>Hello World</p>";
	
	// 	tinymce.get("the_blog").setContent(content);
	
	// });
    </script>
</body>
</html>
