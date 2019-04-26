 $(document).ready(function() {

    // indicators colors
    // var indicate_div = document.getElementsByClassName("indicate_div");
    // console.log(indicate_div);
    // if ($(".indicate_div").hasClass("active")) {
    //   document.querySelector(".span_indicate").css("background-color", "red")
    // }
  }) // document ready end

  //all CATEGORIES click to animate div
  var categoryClick = document.querySelector("#allcategories");
  var searchExpand = document.querySelector("#searchInput");
  categoryClick.addEventListener("click", animateOpenCategoryPage);
  categoryClick.addEventListener("mouseover", rotateCategoryBolder);
  searchExpand.addEventListener("click", animateSearch);
  // animateCategoryPage function

  function animateOpenCategoryPage() {
    // $(".allcategoriesSlided").addClass("animateDiv");
    $(".allcategoriesSlided").slideDown();
  }
  $(".closeBounce").click(function() {
    console.log("hide me");
    $(".allcategoriesSlided").slideUp();
  })
 

  function animateSearch() {
    let navWidth = ($("#myNavToggler").innerWidth() + "px");
    $("#myNavToggler").animate({
        right:navWidth
    }, "swing");
    // $("#myNavToggler").hide();
  }
  // end of animateCategoryPage function

  // rotateCategoryBolder function
  function rotateCategoryBolder() {
    // alert("animation will happen")
    var animate1 = $("#animateCategory1");
    animate1.animate({
      // left: "20px",
      // bottom: "-20px"
    }, 1000)
    animate1.animate({}, 1000)
  }
  // end of rotateCategoryBolder function

  // changeCategoryDetails
  function changeCategoryDetails(categoryValue) {
    if (categoryValue== "Wood_Carvings") {
      console.log(categoryValue);
      $("#img_Category").html('<img class="img-fluid coverImg" src="./img/programming-wallpaper-1920x1080.jpg" alt="programming-wallpaper">')

      $("#nameTag_id").html("Wood Carvings");
      $("#tags_Details").html("Wooden Cutlery, African Game Carvings, Decos, Traditional Themed Souvenir Carvings, Human Figures");
    }else if (categoryValue == "African_Maasai_Sandals") {
      console.log(categoryValue);
      $("#img_Category").html('<img class="img-fluid coverImg" src="./img/programming-wallpaper-1920x1080.jpg" alt="programming-wallpaper">')

      $("#nameTag_id").html("African Maasai Sandals");
      $("#tags_Details").html("Wooden Cutlery, African Game Carvings, Decos, Traditional Themed Souvenir Carvings, Human Figures");

    }else if (categoryValue == "Hand_made_Fashion_Jewelery") {
      console.log(categoryValue);
      $("#img_Category").html('<img class="img-fluid coverImg" src="./img/evolution_of_newtons_cradle-wallpaper-3840x2160.jpg" alt="programming-wallpaper">')

      $("#nameTag_id").html("Hand-made Fashion Jewelery");
      $("#tags_Details").html("Wooden Cutlery, African Game Carvings, Decos, Traditional Themed Souvenir Carvings, Human Figures");

    }else if (categoryValue == "Bags_and_Pouches") {
      console.log(categoryValue);
      $("#img_Category").html('<img class="img-fluid coverImg" src="./img/creep-wallpaper-3554x1999.jpg" alt="programming-wallpaper">')

      $("#nameTag_id").html("Bags and Pouches");
      $("#tags_Details").html("Wooden Cutlery, African Game Carvings, Decos, Traditional Themed Souvenir Carvings, Human Figures");

    }
  }

  // onmousemove stop carousel from slideIn
  window.addEventListener("mousemove", stopCarousel);
  function stopCarousel() {
      // console.log("mouse moves");
      $(function () {
        $(".carousel").carousel({
          pause: 'pause'
        })
      })
  }




var readMore = document.querySelector(".readMore");
readMore.addEventListener("click", navigateReadMoreToBlogs);

function navigateReadMoreToBlogs() {
    window.location= "./pages/blog.php";
}

// if (window.location = "Ps%20&%20Ai%20web/public/admin") {
//   window.location = "./admin.php"; 
//   console.log("Ps%20&%20Ai%20web/public/admin");
  
// }