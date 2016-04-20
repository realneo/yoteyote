jQuery(document).ready(function() {
 	var $ = jQuery;
    var screenRes = $(window).width();

    $("[href=#]").click(function(event){
        event.preventDefault();
    });

// Remove outline in IE
	$("a, input, textarea").attr("hideFocus", "true").css("outline", "none");
// Add gradient to IE
    setTimeout(function () {
        $(".carousel-title, .note, .vjs-controls, .price_col_head").addClass("gradient");
    }, 0);

// First Child, Last Child
//$(".widget-container li:first-child, .pricing_box li:first-child, .dropdown li:first-child, ol li:first-child").addClass("first");
//$(".widget-container li:last-child, .pricing_box li:last-child, .dropdown li:last-child, ol li:last-child").addClass("last");

  /**********************************************************
  GLOBAL VARIABLES
  ***********************************************************/
  // This stores a boolean value or true or false
  // It is set when user is logged in, true value is set or else false for not logged in
  var user_logged_in;

  // This stores email for the logged In user.
  var logged_in_user_email;

  // This object carries all the user Information
  var user_info;

  // This variable stores the number of posts loaded in the page
  var load = 0;

  /**********************************************************
  GRID LAYOUT - MASONRY
  ***********************************************************/
  var $container = $('#posts');
  // initialize
  $container.masonry({
    itemSelector: '.post'
  });

  /**********************************************************
  FUNCTIONS
  ***********************************************************/
  // NOTIFY
  // It has 3 Parameters:
  // Selector: Where you want the notification to appear
  // Message: What message of the notification
  // Type: warning, success, danger, normal (Bootrstrap colors)
  function notify(selector, message, type){
    var alert = "<div class='alert alert-"+type+" alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert'> <span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span> </button> "+ message +" </div>";
    $(selector).append(alert);
    $('.alert').delay(10000).fadeOut();
  }

  // PRELOADER
  function preloader(selector){
    $(selector).append("<div class='loading_icon_bg preloader'><img src='images/loading.gif' alt='Yoteyote Loading' class='loading_icon'/></div>");
  }
  // POSTLOADER
  function postloader(){
    $('.preloader').fadeOut();
  }


  /**********************************************************
  LOGIN PROCESS
  ***********************************************************/
  $('#login_btn').click(function(){
    preloader('.logged_out');
    // Check if User is Logged In
    if(user_logged_in == true){
      $('.logged_out').slideUp();
      $('.logged_in').slideDown();
      postloader();
    }else{
      var email = $('#email').val();
      var password = $('#password').val();
      // Check if both field are filled In
      if(!email || !password){
        postloader();
        notify($(this).parent(), "Fill both Email and Password! <br /> If you don't have an Account, <h4>Sign Up</h4>", 'warning');
      }else{
        $.ajax({
          type:'post',
          url:'process/login_process.php',
          async:false,
          data:{email:email, password:password},
          success: function(text){
            if(text == 'success'){
              $('.logged_out').slideUp();
              $('.logged_in').slideDown();
              $.ajax({
                type:'post',
                url:'process/get_user_info.php',
                async:false,
                success: function(user_information){
                    user_info = JSON.parse(user_information);
                    //console.log(user_info[0]['id']);
                }
              });
              $('.fullname_display').html(user_info[0]['first_name']+' '+user_info[0]['last_name']);
              console.log(user_info);
              postloader();
            }else{
              $('.logged_in').slideUp();
              $('.logged_out').slideDown();
              notify($(this).parent(), "Email or Password is incorrect <br /> If you don't have an Account, <h4>Sign Up</h4>", 'danger');
              postloader();
            }
          }
        });
      }
    }
    return false;
  });


  /**********************************************************
  OVERALL CHECK IF USER IS LOGGED IN WHEN PAGE LOADS
  ***********************************************************/
  //Initiating Full Screen Blur
  preloader('body');

  //Checking If User is Logged In
  $.ajax({
    type:'post',
    url:'process/is_user_logged_in.php',
    async:false,
    success: function(data){
      if(data == 'success'){
        user_logged_in = true;
        $('.logged_out').slideUp();
        $('.logged_in').slideDown();
        $.ajax({
          type:'post',
          url:'process/get_user_info.php',
          async:false,
          success: function(user_information){
              user_info = JSON.parse(user_information);
              //console.log(user_info[0]['id']);
          }
        });
        postloader();
      }else{
        user_logged_in = false;
        $('.logged_out').slideDown();
        $('.logged_in').slideUp();
        postloader();
      }
    }
  });

  /**********************************************************
  LOGOUT PROCESS
  ***********************************************************/
  $('.logout_btn').click(function(){
    preloader($(this).parent());
    var confirmation = confirm('Are you sure you want to Logout?');
    if(confirmation == true){
      $.ajax({
        type:'post',
        url:'process/logout.php',
        success: function(text){
          if(text){
            $('.logged_in').slideUp();
            $('.logged_out').slideDown();
            postloader();
          }else{
            notify($(this).parent(), "There was an error Logging Out", 'danger');
            postloader();
          }
        }
      });
    }else{
      postloader();
    }
    return false;
  });

  /**********************************************************
  LOADING POSTS WHEN PAGE LOADS
  ***********************************************************/
  $.ajax({
    type:'post',
    url:'process/posts.php',
    data:{load:load},
    async:false,
    success:function(response){
      var $content = $(response);
      $container.append($content).masonry('appended', $content).masonry();
      postloader();
      load++;
    }
  });
  /**********************************************************
  LOADING POSTS WHEN USER SCROLLS DOWN
  ***********************************************************/

  $(window).scroll(function(){
    if($(window).scrollTop() == $(document).height() - $(window).height()){
      preloader('.posts_preloader');
      load++;
      $.ajax({
        type:'post',
        url:'process/posts.php',
        data:{load:load},
        success:function(response){
          var $content = $(response);
          $container.append($content).masonry('appended', $content).masonry();
          postloader();
        }
      });
    }
  });

  /**********************************************************
  SORT POSTS
  ***********************************************************/
  $('.sort_btn').click(function(){
    $('.sort_btn').removeClass('btn-red');
    $(this).addClass('btn-red');
  });


// buttons
    $(".btn").not(".btn-round").hover(function(){
        $(this).stop().animate({"opacity": 0.7});
    },function(){
        $(this).stop().animate({"opacity": 1});
    });
	$('a.btn, span.btn').on('mousedown', function(){
		$(this).addClass('active')
	});
	$('a.btn, span.btn').on('mouseup mouseout', function(){
		$(this).removeClass('active')
	});

// style Select, Radio, Checkbox
    if ($("select").hasClass("select_styled")) {
        cuSel({changedEl: ".select_styled", visRows: 10});
    }
    if ($("div,p").hasClass("input_styled")) {
        $(".input_styled input").customInput();
    }

// NavBar Parents Arrow
    $(".dropdown ul").parent("li").addClass("parent");
// NavBar
    $(".dropdown ul li:first-child, .cusel span:first-child").addClass("first");
    $(".dropdown ul li:last-child, .cusel span:last-child").addClass("last");

// Tabs
var $tabs_on_page = $('.tabs').length;
var $bookmarks = 0;

for(var i = 1; i <= $tabs_on_page; i++){
    $('.tabs').eq(i-1).addClass('tab_id'+i);
    $bookmarks = $('.tab_id'+i+' li').length;
    $('.tab_id'+i).addClass('bookmarks'+$bookmarks);
};

$('.tabs li, .payment-form .btn').click(function() {
    setTimeout(function () {
        for(var i = 1; i <= $tabs_on_page; i++){
            $bookmarks = $('.tab_id'+i+' li').length;
            for(var j = 1; j <= $bookmarks; j++){
                $('.tab_id'+i).removeClass('active_bookmark'+j);

                if($('.tab_id'+i+' li').eq(j-1).hasClass('active')){
                    $('.tab_id'+i).addClass('active_bookmark'+j);
                }
            }
        }
    }, 0)
});

// Payment Form
$('.payment-form #billing .btn, .payment-form #payment .btn-left').click(function() {
    $('a[href="#shipping"]').tab('show');
});
$('.payment-form #shipping .btn-left').click(function() {
    $('a[href="#billing"]').tab('show');
});
$('.payment-form #shipping .btn-red').click(function() {
    $('a[href="#payment"]').tab('show');
});

// Service List 2
$('.service_list_2 .service_item').not(':even').addClass('even');
$('.service_list_2 .service_item').not(':odd').addClass('odd');

// prettyPhoto lightbox, check if <a> has atrr data-rel and hide for Mobiles
    if($('a').is('[data-rel]') && screenRes > 600) {
        $('a[data-rel]').each(function() {
            $(this).attr('rel', $(this).data('rel'));
        });
        $("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false});
    };

// Smooth Scroling of ID anchors
    function filterPath(string) {
        return string
            .replace(/^\//,'')
            .replace(/(index|default).[a-zA-Z]{3,4}$/,'')
            .replace(/\/$/,'');
    }
    var locationPath = filterPath(location.pathname);
    var scrollElem = scrollableElement('html', 'body');

    $('a[href*=#].anchor').each(function() {
        $(this).click(function(event) {
            var thisPath = filterPath(this.pathname) || locationPath;
            if (  locationPath == thisPath
                && (location.hostname == this.hostname || !this.hostname)
                && this.hash.replace(/#/,'') ) {
                var $target = $(this.hash), target = this.hash;
                if (target && $target.length != 0) {
                    var targetOffset = $target.offset().top;
                    event.preventDefault();
                    $(scrollElem).animate({scrollTop: targetOffset}, 400, function() {
                        location.hash = target;
                    });
                }
            }
        });
    });

    // use the first element that is "scrollable"
    function scrollableElement(els) {
        for (var i = 0, argLength = arguments.length; i <argLength; i++) {
            var el = arguments[i],
                $scrollElement = $(el);
            if ($scrollElement.scrollTop()> 0) {
                return el;
            } else {
                $scrollElement.scrollTop(1);
                var isScrollable = $scrollElement.scrollTop()> 0;
                $scrollElement.scrollTop(0);
                if (isScrollable) {
                    return el;
                }
            }
        }
        return [];
    };

// Audio Player
var $players_on_page = $('.jp-audio').length;
var $song_title = '';

if($players_on_page > 0){
    for(var i = 1; i <= $players_on_page; i++){
        $('.jp-audio').eq(i-1).addClass('jp-audio'+i);
    };

    setTimeout(function () {
        for(var i = 1; i <= $players_on_page; i++){
            $song_title = $('.jp-audio'+i+' .jp-playlist ul li.jp-playlist-current span').html();
            $('.jp-audio'+i+' .song_title').html($song_title);
        };
    }, 500);

    function switchSong() {
        setTimeout(function () {
            for(var i = 1; i <= $players_on_page; i++){
                $('.jp-audio'+i+' .jp-previous, .jp-audio'+i+' .jp-next').removeClass('disabled');

                if ($('.jp-audio'+i+' .jp-playlist ul li:last-child').hasClass('jp-playlist-current')) {
                    $('.jp-audio'+i+' .jp-next').addClass('disabled');
                }
                if ($('.jp-audio'+i+' .jp-playlist ul li:first-child').hasClass('jp-playlist-current')) {
                    $('.jp-audio'+i+' .jp-previous').addClass('disabled');
                }
                $song_title = $('.jp-audio'+i+' .jp-playlist ul li.jp-playlist-current .jp-playlist-item').html();
                $('.jp-audio'+i+' .song_title').html($song_title);
            }
        }, 0)
    };

    $('.jp-previous, .jp-next, .jp-playlist ul').click(function() {
        switchSong()
    });
    $(".jp-jplayer").on($.jPlayer.event.ended, function(event) {
        switchSong()
    });
};

// Placeholders
setTimeout(function () {
    if($("[placeholder]").size() > 0) {
		$.Placeholder.init({ color : "#a4a4a4" });
	}
}, 0);

// Rating Stars
$(".rating span.star").hover(
    function() {
        $('.rating span.star').removeClass('on').addClass('off');
        $(this).prevAll().addClass( 'over' );
    }
    , function() {
        $(this).removeClass( 'over' );
    }
);

$(".rating").mouseleave(function(){
    $(this).parent().find('.over')
        .removeClass('over');
});

$( ".rating span.star" ).click( function() {
    $(this).prevAll().removeClass('off').addClass('on');
    $(this).removeClass('off').addClass('on');
});

// Crop Images in Image Slider

// adds .naturalWidth() and .naturalHeight() methods to jQuery for retrieving a normalized naturalWidth and naturalHeight.
(function($){
    var
        props = ['Width', 'Height'],
        prop;

    while (prop = props.pop()) {
        (function (natural, prop) {
            $.fn[natural] = (natural in new Image()) ?
                function () {
                    return this[0][natural];
                } :
                function () {
                    var
                        node = this[0],
                        img,
                        value;

                    if (node.tagName.toLowerCase() === 'img') {
                        img = new Image();
                        img.src = node.src,
                            value = img[prop];
                    }
                    return value;
                };
        }('natural' + prop, prop.toLowerCase()));
    }
}(jQuery));

var
    carousels_on_page = $('.carousel-inner').length,
    carouselWidth,
    carouselHeight,
    ratio,
    imgWidth,
    imgHeight,
    imgRatio,
    imgMargin,
    this_image,
    images_in_carousel;

for(var i = 1; i <= carousels_on_page; i++){
    $('.carousel-inner').eq(i-1).addClass('id'+i);
};

function imageSize() {
    setTimeout(function () {
        for(var i = 1; i <= carousels_on_page; i++){
            carouselWidth = $('.carousel-inner.id'+i+' .item').width();
            carouselHeight = $('.carousel-inner.id'+i+' .item').height();
            ratio = carouselWidth/carouselHeight;

            images_in_carousel = $('.carousel-inner.id'+i+' .item img').length;

            for(var j = 1; j <= images_in_carousel; j++){
                this_image = $('.carousel-inner.id'+i+' .item img').eq(j-1);
                imgWidth = this_image.naturalWidth();
                imgHeight = this_image.naturalHeight();
                imgRatio = imgWidth/imgHeight;

                if(ratio <= imgRatio){
                    imgMargin = parseInt((carouselHeight/imgHeight*imgWidth-carouselWidth)/2, 10);
                    this_image.css("cssText", "height: "+carouselHeight+"px; margin-left:-"+imgMargin+"px;");
                }
                else{
                    imgMargin = parseInt((carouselWidth/imgWidth*imgHeight-carouselHeight)/2, 10);
                    this_image.css("cssText", "width: "+carouselWidth+"px; margin-top:-"+imgMargin+"px;");
                }
            }
        };
    },1000);
};

imageSize();
$(window).resize(function() {
    $('.carousel-indicators .first').click();
    imageSize();
});

/* Image Upload Preview ***********************************/
    function readURL(input) {
    if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image_upload").change(function(){
        readURL(this);
        $('#image_preview').fadeIn();
        $('.close_btn').fadeIn();

        // Upload automatically
        $.ajax({
            method:'POST',
            url: 'process/post_img_upload_process.php',
            //Creating data from form
             data: new FormData(this),

             //Setting these to false because we are sending a multipart request
             contentType: false,
             cache: false,
             processData: false,
             success:function(){
                console.log(FormData);
            }
        });
    });

     // Remove selected image from input
    $('.close_btn').click(function(){
        $('#image_upload').val = '';
        $('#image_preview').fadeOut();
        $('.close_btn').fadeOut();

        return false;
    });


});
