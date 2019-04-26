function allSection() {
    // alert("all clicked");
    $("#all_panel").addClass("actively_selected");
    $("#solo_images, #effects, #videos").removeClass("actively_selected").slideUp();
    $(".actively_selected").slideDown();

    $.ajax({
        url: '../../private/post_data/postGallery.php',
        method: 'post',
        success: function (data) {
            console.log(data);
            
        },
        error: function(data){console.log(data);
        }
    })

} 

// capitalize
function charOneToUpper(s){
  let y = s.charAt(0).toUpperCase();
  let z = s.replace(s.charAt(0), y)
  return z;
}

//  select a tab and perform function to its body
// var solo_images_nav = document.querySelector("#solo_images_nav");
// solo_images_nav.addEventListener("click", soloImagesSection);

function soloImagesSection() {
    // alert("solo images clicked");
    $("#solo_images").addClass("actively_selected");
    $("#all_panel, #effects, #videos").removeClass("actively_selected").slideUp();
    $(".actively_selected").slideDown();

}

//  select a tab and perform function to its body
// var effects_nav = document.querySelector("#effects_nav");
// effects_nav.addEventListener("click", effectsSection);

function effectsSection() {
    // alert("effects clicked");
    $("#effects").addClass("actively_selected");
    $("#solo_images, #all_panel, #videos").removeClass("actively_selected").slideUp();
    $(".actively_selected").slideDown();
}

//  select a tab and perform function to its body
// var videos_nav = document.querySelector("#videos_nav");
// videos_nav.addEventListener("click", videosSection);

function videosSection() {
    // alert("videos clicked");
    $("#videos").addClass("actively_selected");
    $("#solo_images, #effects, #all_panel").removeClass("actively_selected").slideUp();
    $(".actively_selected").slideDown();
}




// filter images
filterSelection("all")
function filterSelection(c) {
  var x, i; 
  console.log(c);
  
  x = document.getElementsByClassName("column_images");
  if (c == "all") {c = ""};
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    
    if (x[i].className.indexOf(c) > -1){
      w3AddClass(x[i], "show");
    } 
  }
   
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn_filter");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
// filter images ends

navHeight = $(".navbar").height() + 7 + "px";

$(".side2").css({"margin-top":navHeight})


// open and close  image detail panel
function openImg(postdate, owner, img_link, img_name, Category) {
  // $(".contentGallery").hide();
  $(".side2").css({"position":"absolute", "z-index":"99","max-height":"98vh"}).slideDown();

  // replace html content
  $(".contain_img").html('<img id="inImg" src="../../private/'+img_link+'" alt="Images" class="img-fluid">');
  $(".title").html( charOneToUpper(Category)+' Category');
  $("#more_details").html(`
      <span class="thedate"> Date posted: <b><i>`+postdate.toLocaleString()+`</i></b></span> <br>
      <span class="posted_by">Posted By:  <b><i>`+charOneToUpper(owner)+`</i></b> </span><br>
      <span class="imgname"> Image Name: <b><i>`+charOneToUpper(img_name)+`</i></b> </span><br>
  `);
}

$("#btn-view").click(function () {
  $(".contentGallery").show();
  $(".side2").slideUp();
})