/**
* hoverIntent r6 // 2011.02.26 // jQuery 1.5.1+
* <http://cherne.net/brian/resources/jquery.hoverIntent.html>
*
* @param  f  onMouseOver function || An object with configuration options
* @param  g  onMouseOut function  || Nothing (use configuration options object)
* @author    Brian Cherne brian(at)cherne(dot)net
*/
(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev])}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev])};var handleHover=function(e){var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t)}if(e.type=="mouseenter"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob)},cfg.timeout)}}};return this.bind('mouseenter',handleHover).bind('mouseleave',handleHover)}})(jQuery);




/*
* jQuery Sony Fancy Menu Plugin
* version: 1.0
* Requires: jQuery v1.7.1, hoverIntent.js
* Author: Justin Woodcock // Sapient Nitro
* Copyright: Copyright 2012 Sony
*/

;(function ($, undefined) {

    $.fn.ss_fancyMenu = function (options) {

	// parentMenuContainer was added to adjust for a bug that was appearing on fast hovering on and off the menu areas
        var settings = $.extend({
            'menuItem' : '#sonyMenu li',
            'arrowClass' : 'arrowIndicator',
            '_background' : '#thirdLevelBack',
            'parentMenuContainer' : 'sonyMenu'
        }, options);

        // cache jquery objects.
        var background$ = $(settings._background),
            topLevel$ = $('.topLevel>li:has(ul)'),
            secondLevel$ = $('.secondLevel>li:has(ul)'),
            thirdLevel$ = $('ul.thirdLevel'),
            secondLevelUl$ = $('ul.secondLevel');

        // set global vars
        var backOpen = false,
            secondLevelTimer,
            thirdLevelTimer,
			menuTimer;

        topLevel$.on('mouseenter', function(event){
            hoverItem$ = $(this);
            dropDown(hoverItem$);
        });

        topLevel$.on('mouseleave', function(event){
            hoverItem$ = $(this);
            pullUp(hoverItem$);
        });

        function dropDown(hoverItem$) {
            if(secondLevelTimer) {
                clearTimeout(secondLevelTimer);
            };
            hoverItem$.addClass('hover');
            hoverItem$.children('ul').slideDown(300, function(event){secondLevelUl$.css('overflow', 'visible');});
        };

        function pullUp(hoverItem$) {
            var timerCallback = function(){
                hoverItem$.children('ul').slideUp(300, function(){
                    hoverItem$.removeClass('hover');
                });
            };
            secondLevelTimer = setTimeout(timerCallback, 375);
        };

        secondLevel$.on('mouseenter', function(event){		//console.log(backOpen);
            if(thirdLevelTimer) {
                clearTimeout(thirdLevelTimer);
            }
            hoverItem$ = $(this);
			menuTimer = setTimeout(function(event){
	            if(!backOpen) {
	                slideOut(hoverItem$);
	            }
				showChildren(hoverItem$);
			}, 125);
        });

        secondLevel$.on('mouseleave', function(event){
            if(menuTimer) {
                clearTimeout(menuTimer);
            }
            hoverItem$ = $(this);
            hideChildren(hoverItem$);
            if(backOpen) {
                slideIn();
            }
        });

        function slideOut(hoverItem$) {
            backOpen = true;
            background$.stop(true, true).show('slide', {direction: 'left'}, 500);
        };

        function slideIn(hoverItem$) {
            var timerCallback = function(){
                background$.stop(true, true).hide('slide', {direction: 'left'}, 60);
                backOpen = false;
            };
            thirdLevelTimer = setTimeout(timerCallback, 100);
        };

        function showChildren(hoverItem$) {
            configTop(hoverItem$);
            hoverItem$.addClass('hover').children('ul').fadeIn('fast');
        };

        function hideChildren(hoverItem$) {
            hoverItem$.removeClass('hover').children('ul').fadeOut('fast');
        };

        function configTop(hoverItem$) {
            var parentTop = hoverItem$.parent().offset().top,
                parentWidth = hoverItem$.parent().width(),
                thisTop = hoverItem$.offset().top,
                topPosition = parentTop - thisTop;

		if(hoverItem$.parent().attr("id")!=settings.parentMenuContainer){
		    hoverItem$.children('ul').css({
			'top' : topPosition,
			'left' : parentWidth
		    });
		}
        };

        $('#sonyMenu li:has(ul)').append('<span class="hasSubMenu"></span>').find('a').addClass(settings.arrowClass); // adding arrows to items with sub menus

        // ie7 z-index fix, only runs if ie7 or below.
        if($.browser.msie && $.browser.version < 8) {
            var zIndexNumber = 3000;
            $("#nav, #nav ul, #nav li, #nav div, div").each(function() {
                $(this).css('zIndex', zIndexNumber);
                zIndexNumber -= 10;
            });
        };

    };

} (jQuery));