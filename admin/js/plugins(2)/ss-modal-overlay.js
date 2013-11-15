(function($) {
	$(function() {

	  	$('a.overlayTrigger[rel]').overlay({
		  	top: 'center',
		  	mask: { color: '#fff', opacity: 0.9 }
	  	});

	  	$('.overlayAppear[rel]').overlay({
		  	top: 'center',
		  	left: '285px',
		  	closeOnClick: false,
		  	closeOnEsc: false,
		  	mask: { color: '#fff', opacity: 0 },
		  	onLoad: function() {
			  	setTimeout(function(){
			  		$('.overlayAppear[rel]').overlay().close();
				}, 3000);
			}
	  	});

	  	$('a.ajaxOverlayTrigger[rel]').overlay({
	  		top: 'center',
	  		mask: { color: '#fff', opacity: 0.9 },
			onBeforeLoad: function() {
				// grab wrapper element inside content
				var wrap = this.getOverlay().find('.overlayContent');
				// load the page specified in the trigger
				wrap.load(this.getTrigger().attr('href'));
			}
		});

		$('a.videoOverlayTrigger').overlay({
	  		target: '#videoOverlay',
	  		top: 'center',
	  		mask: { color: '#fff', opacity: 0.9 },
			onBeforeLoad: function(event) {
				jQuery('#videoOverlay').appendTo('body');
				// get the url of the video from the href attribute and split out the ID.
				var videoURL = this.getTrigger().attr('href');
				$('#videoOverlay .overlayContent').empty();
				var videoContainer = '<div id="VideoContainer"></div>';
				$('#videoOverlay .overlayContent').append(videoContainer);
				// create the actual embed code and add it to the overlay wrapper
				embedVideo(videoURL);
			},
			onClose: function() {
				// remove the content from the wrapper when the overlay closed
				$('#videoOverlay .overlayContent').empty();
			}

		});

	  	function repositionOverlay(){
	  		var theModal = $('.modalOverlay:visible'),
				modalWidth = $(theModal).width(),
				modalHeight = $(theModal).height(),
				windowWidth = $(window).width(),
				windowHeight = $(window).height(),
				leftPosition = Math.round( (windowWidth - modalWidth) / 2 ),
				topPosition = Math.round( (windowHeight - modalHeight) / 2 );

			$(theModal).css('left', leftPosition + 'px');
			$(theModal).css('top', topPosition + 'px');
		};

		$(window).resize(function() {
			if ($('.modalOverlay').is(':visible')) { repositionOverlay(); }
		});

		function embedVideo(movie) {
			var options = {
					"videosPath"		: "../videos/"
				,	"youTubePath"		: "http://www.youtube.com/e/"
				,	"VideoContainerID" 	: "VideoContainer"
				,	"autoPlay"			: true
				,	"videoPlayerSource" : "/wcsstore/SonyStyleStorefrontAssetStore/flashfiles/swfs/video_player_v2.swf"
			};
			var playerPath = (movie.indexOf(".flv") != -1) ? options.videoPlayerSource : options.youTubePath + movie.split('v=')[1];
			var flashvars = {};
			if (movie.indexOf(".flv") != -1) {
				flashvars.movieName = options.videosPath + movie;
				flashvars.autoPlay = options.autoPlay;
			} else {
				flashvars.autoplay = options.autoPlay == true ? 1 : 0;
				flashvars.autohide = 1;
				flashvars.modestbranding = 1;
			}
			var params = {
					quality: "high"
				,	scale: "exactfit"
				,	wmode: "transparent"
				,	allowFullScreen: "true"
				,	allowScriptAccess: "always"
			};
			swfobject.embedSWF(
					playerPath
				,	options.VideoContainerID
				,	"100%"
				,	"100%"
				,	"10"
				,	null
				,	flashvars
				,	params
			);
		};
	});
})(jQuery);