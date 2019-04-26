$(document).on("click",".page-item",function () {
    $(".page-item").removeClass("active");
    $(this).addClass('active');
    
}) 

// capitalize   
function charOneToUpper(s){
    let y = s.charAt(0).toUpperCase();
    let z = s.replace(s.charAt(0), y)
    return z;
}

currentIndex = 0; 
function  paginate(){
    // clear any default data before appending data from db
    $("#pagination_links").html(``);
    //find a way to select the last and the first element in the db
    // first get count for all fields of blog in the db
    $.ajax({
        url: '../../private/get_data/count.php',
        method: 'get',
        success: function (num) {
            // get the partial data
            $.ajax({
                url: '../../private/get_data/edit_blog.php',
                method: 'get',
                success: function (data){                    
                    let result_per_page = 8;
                    let total_pages = Math.round(num/result_per_page);
                    for (let index = 0; index <= total_pages; index++) {
                        if (index == 0) {
                            index +=1;                             
                        }
                        current_result = (index-1)*8;
                        
                        $("#pagination_links").append(`<li class="page-item"><a class="page-link" onclick="fetch(${current_result})">${index}</a></li>`);               
                        if (index == (num-1)) {
                            $(".pi-next").hide();
                            $(".pi-prev").show();                            
                        }else{
                            $(".pi-prev").hide();
                            $(".pi-next").show();
                        }
                    }
                } 
            })
        } 
    })
}

// call the pagination function
paginate();
    
// fetch blogs functions
function fetch(index) {
    
    currentIndex = index;
    // next button 
    if (index == 'next') {
        prev_no = parseInt($("#pagination_links>li>a").last().html());
        index = prev_no;
        currentIndex = (prev_no-1) *8;
        
    } 

    $.ajax({
        url: '../../private/get_data/edit_blog.php',
        method: 'get',
        data: 'index='+index+'&getBlogs=getBlogs',
        success: function (data) {
            data = JSON.parse(data);
            // console.log(data);
            

            // check if data is empty 
            if (!data.length) {
                return false;            
            }
            $("#blog_cards").html(``);

            $("#noContent").hide();
            $.each(data, function (i, val) {              
                
                $("#blog_cards").append(`
                <div class="card shadow col-sm-6 col-md-4 col-lg-3 a_blog_card"  id="">
                    <img class="card-img-top rounded" <img src="../../private/${val.img_link}" width="" height="180px" alt="NICKS Design">
                    <div class="card-body">
                    <div class="all-0"> 
                    <div class="m-2">
                    <h4>${charOneToUpper(val.title)}</h4>
                    <small> <b>By:</b> <i id="author_${val.blog_id}_${val.owner_id}"> Web Design</i></small> <br>
                    <div class="badge badge-pill badge-info mr-3" id="view_blog"> <a href="blogs_dir/fullBlog.php?blog_id=${val.blog_id}"> view blog </a> </div>
                    <div class="clearfix"></div>
                    </div>
                    <!-- m-2 end -->
                    </div>
                    <!-- all-0 ends -->
                    </div>
                    <!-- card-body end -->
                    <div class="card-footer" style="height: 50px; overflow-y:hidden;">${charOneToUpper(val.blog_description)}</div>
                    <!-- LikeBtn.com BEGIN -->
                    <span class="likebtn-wrapper" data-identifier="item_1"></span>
                    <script>
                    (function(d,e,s){if(d.getElementById("likebtn_wjs"))return;a=d.createElement(e);m=d.getElementsByTagName(e)[0];a.async=1;a.id="likebtn_wjs";a.src=s;m.parentNode.insertBefore(a, m)})(document,"script","//w.likebtn.com/js/w/widget.js");
                    </script>
                    <!-- LikeBtn.com END -->
                    </div>
                    <!-- card end -->
                    
                    `);
                                    
                
                // ajax request for users
                $.ajax({
                    url: '../../private/get_data/users.php',
                    method: 'post',
                    success: function (params) {
                        params = JSON.parse(params);                                                  
                        $.each(params, function (j, j_val) {
                            if (j_val.user_id == val.owner_id) {
                                $("#author_"+val.blog_id+"_"+val.owner_id).html(j_val.username) 
                            }
                        })                           
                    },
                    error: function (params){
                        alert("unable to get Users:> contact Developer");
                        }
                    })
                // ajax request for users ends here
            }) //end of each(data)

            
        },
        error: function (data) {
            console.log(data);
            
        }

    }) // end of ajax
}

fetch(0);



