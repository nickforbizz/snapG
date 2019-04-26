            // If User is undefined
            if(localStorage.username==undefined){
                window.location="../folder_login/login.php"
            }
            
            $("#form_post_blog").submit(function (e) {
				e.preventDefault();
				var content = tinymce.get("the_blog").getContent();
				tinyMCE.triggerSave();
				var formdata=new FormData(this);
				// formdata.append("text",$("#the_blog").val())	
                $.ajax({
                    url: '../get_post_data/post_edit_blogs.php',
                    method: 'post',
                    processData: false,
                    contentType: false,
                    data: formdata,
                    success: function(data){
                        $("#form_post_blog")[0].reset();
                        console.log(data);
                    },error: function(data){console.log(data);}                   
                })                
			})
			
			// preview image before its posted
			var preview_file = function (e) {
                var output_img = document.getElementById("output_img");
				output_img.src=URL.createObjectURL(e.files[0]);
			}
			            
            // convert the 1st letter to uppercase
            function charOneToUpper(s){
                let y = s.charAt(0).toUpperCase();
                let z = s.replace(s.charAt(0), y)
                return z;
            }          

            const user = charOneToUpper(localStorage.username);
            const user_email = localStorage.user_email;
            const user_image = localStorage.user_image;
            const user_id = localStorage.user_id;
            $("#owner_id").val(user_id);
            // paste user at the session
            $("#Username").html(user);

			// edit blog function
			function editBlog(blog_id, blog_title,blog_content,  blog_description, blog_category, blog_img) {
				console.log(blog_id);
				$("#title").val(blog_title);

				// $("#the_blog").setContent(blog_content);
				tinymce.get("the_blog").setContent(blog_content);

				$("#blog_description").val(blog_description);
				$("#sel1").val(blog_category);
				$("#blog_id").val(blog_id);
				$("#owner_id").val(user_id);
				document.querySelector("#output_img").src = blog_img;
			}
			
			// delete blog. change status
			function delBlog(id) {
				$.ajax({
					url: '../get_data/del_blog.php',
					method: 'get',
					data: 'blog_id='+id,
					success: function (data) {
						console.log(data);
						$("#blog"+id).fadeOut();
						
					}, error: function(response){console.log(response); }
				})
			}

			//get editing data from db
			function editBlogs(blog_id) {
				$("#search_articles").html('').hide();
				$.ajax({
					url: '../get_data/edit_blog.php',
					method: 'get',
					data: 'blog_id='+blog_id,
					success: function (data) {
						data1 = JSON.parse(data);	
						// console.log(data1);
						
						editBlogSuccess(data1);							
					},
					error: function (data) { console.log(data); }
				})				
			}

			// search Blog
			document.querySelector("#search_blog").addEventListener("keyup", funcSearch);

			function funcSearch() {
				var search_val = $("#search_blog").val();
				$("#search_articles").html();
                search_val.trim();
				if( search_val.length == '' ){
					$("#search_articles").hide(); 
                    $("#search_articles").html()                   
                }else if (search_val.length > 0) {
					// $(".articles2").hide();
                    $("#search_articles").show();                    
					// console.log($("#form_search_blog").serialize());
                
				$.ajax({
					url: '../get_data/search_blog.php',
					method: 'post',
					data: $("#form_search_blog").serialize(),
					success: function (data) {
						data2 = JSON.parse(data);  
						// console.log(data2);
						                     
                        $.each(data2, function (i, val) {						
                        val.img_link = '../' + val.img_link;
                        // var blog_content = val.content.replace(/\n/, " ").replace(/\r/, " ");
                        // var blog_content = str_replace("\\r", "\\\\r", val.content);
						if (i <= 5) {
							$("#search_articles").html(`                                      
								<div class="list-group" style" margin: 4px 0 4px 0;">
								<a href="javascript:void(0)" class="list-group-item" onclick="editBlogs(${val.blog_id})">${val.title} <span class="badge">${val.owner_id}</span></a>                             
								</div>				
								`);                            
							}
							})							
                    },                    
					error: function (data) {console.log(data);}
				})
              }
			} 

			// ajax success functions
			function editBlogSuccess(data1) {									
				$.each(data1, function (i, val) {						
					val.img_link = '../' + val.img_link;					
					$(".articles2").append(`					
							<div class="col-sm-6 col-md-4 col-lg-4" style="padding:0; margin:0" id="blog${val.blog_id}">
							<div class="panel-body articles-container">
								<div class="article border-bottom">
									<div class="col-xs-12">									
										<div class="panel panel-default shadow" style="box-shadow:2px 2px 4px #000000">
											<div class="panel-heading" style="border-bottom: 0;margin-bottom: 10px;">
												<div class="row">
													<div class="col-sm-12 col-md-7 col-lg-8">
														<a onclick="
														editBlog(${val.blog_id}, 
															'${val.title}', 
															'/"${val.content}/"', 
															'${val.blog_description}', 
															'${val.category}', 
															'${val.img_link}')" id="edit_link">
														Edit This Blog
														</a>
													</div>
													<div class="col-sm-12 col-md-5 col-lg-4">
														<span class="badge pull-right" id="span_edit" onclick="
														editBlog(${val.blog_id}, 
															'${val.title}', 
															'${val.content}', 
															'${val.blog_description}', 
															'${val.category}', 
															'${val.img_link}')">Edit</span>
															<span class="badge pull-right" id="span_edit" onclick="
															delBlog('${val.blog_id}')">Delete </span>
													</div>
												</div>
											</div>
											<div class="panel-body" style="padding:0">
												<img src=${val.img_link} width="300px" height="150px" class="img-responsive" alt="blog img" id="blog_img">
											</div>
											<div class="panel-footer" style="height: 140px !important;  overflow-y: hidden;"><b>${val.title}</b>
												<hr>
												<i style="">${val.blog_description}</i>
											</div>
										</div>
										

									</div> <!-- end .col-xs-12 -->
									
								</div><!--End .article-->
			
							</div> <!--End .panel-body articles-container -->
							</div> <!-- end .col-sm-6 col-md-4 col-lg-4 -->

						`)
					})
			}