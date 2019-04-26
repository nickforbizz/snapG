        
        if(localStorage.username==undefined){
            window.location="../folder_login/login.php"
          }

window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};

    function charOneToUpper(s){
        let y = s.charAt(0).toUpperCase();
        let z = s.replace(s.charAt(0), y)
        return z;
      }



 const user = charOneToUpper(localStorage.username);
 const user_email = localStorage.user_email;
 const user_image = localStorage.user_image;

// paste user at the session
 $("#Username").html(user);


 // date now 
 var now_date = new Date();
//  console.log(now_date);
 
//  call users data with ajax
$("#chat-guests, .tm-blogs").html('');

function ajaxFunc(url_path, select_html) {
    $.ajax({
        url: url_path,
        method: 'post',
        type: 'json',
        success: function (data) {
            // console.log(data);
            data = JSON.parse(data);
            

            $.each(data, function (i, val) {
                
                // get number of comments
                if (select_html == ".num-comments") {
                    $(select_html).html(data[0]); 
                    $(".comments-percent").html(`
                        ${data[0]}%
                    `)                                   
                }

                //get blog description
                if (select_html == ".tm-blogs") {  
                    if (val.username == null) {
                        val.username = "anonymous";
                    }                
                    $(select_html).append(`
                        <li>
                            <div class="timeline-badge"><em class="glyphicon glyphicon-pushpin"></em></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">${charOneToUpper(val.title)}</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>${val.blog_description}</p>
                                </div> <hr>
                                <div class=""> 
                                    <span>By: <b>${val.username}</b>  at  <b><i>${val.date_posted}</i></b> </span>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                    `);                    
                }

                // get users
                if (select_html == ".available_users_no") {
                     $(select_html).html(val.user_id+'%');
                    
                }
                
                if (select_html == ".total_sms") {
                    val.posted_at = Date.parse(val.posted_at);
                    // time_passed = now_date - val.posted_at;
                    time_passed = new Date(now_date - val.posted_at);
                    $(".total_sms").html(i);
                               
                    // append incoming chats to admins
                    $("#chat-guests").append(`
                    <li class="right clearfix"><span class="chat-img pull-right">
                        <img src="http://placehold.it/60/dde0e6/5f6468" alt="User Avatar" class="img-circle" />
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="pull-left primary-font">By <i>${val.guest_name}:</i> </strong>
                                <small class="text-muted">Submitted at: ${time_passed.toDateString()}</small>
                            </div>
                            <p>${val.guest_message}</p>
                        </div>
                        <div style="float:right;">
                            <button class="btn btn-info btn-sm" id="reply-btn${val.id}" onclick="showInput('${val.id}')">Reply</button>
                        </div>
                        <div class="input-group reply-container mt-3" id="contain-chat${val.id}">
                            <div class="theinput-rply">
							<input id="btn-input${val.id}" type="text" class="form-control input-sm " placeholder="Type your message here..." />
                            </div>
                            <span class="input-group-btn arply-btn">
								<input type="submit" class="btn btn-info btn-sm" id="btn-chat${val.id}" value="send" onclick="sendReply('${val.id}','${val.email}')" />
							</span>
						</div>
                    </li>
                    `);

                    $("#ul_drop_sms").append(`
                    <li>
								<div class="dropdown-messages-box"><a href="profile.html" class="text-black">
                                    <div class="text-center p-2"><b class="contactcter_email">${val.email}</b></div>
                                    <span class="divider"></span>
									</a>
                                    <div class="message-body">
                                    
										<a href="#"><strong>${val.guest_name}</strong> left a <strong>Message On</strong>...</a>
									<br /><small class="text-muted">${time_passed.toDateString()}</small></div>
								</div>
							</li>
							<li class="divider"></li>
                    `);
         
                    // console.log(time_passed.toDateString());
                    
                }
            })
 
            
        }, 
        error: function (data) {
            console.log(data);
            
        }
    })    
}  // ajax function

ajaxFunc('../get_data/users.php', ".available_users_no");
ajaxFunc('../get_data/contact.php', ".total_sms");
ajaxFunc('../get_data/countComments.php', ".num-comments");
ajaxFunc('../get_data/edit_blog.php', ".tm-blogs");

// hide and show reply input
$(".arply-btn").hover(function () {
    console.log("hovered");
    $(".theinput-rply").animate({
        width: '40px'
    })    
})

// process reply data
function sendReply(id, email) {
    let message = $("#btn-input"+id).val();
    $("#contain-chat"+id).fadeOut();
    $("#reply-btn"+id).delay(1000).fadeIn();
    console.log(message);

    //imprement how to send mails here...
    
}

function showInput(id) {
    $("#contain-chat"+id).slideDown();
    $("#reply-btn"+id).hide();
}