(function($){
    $(function() {
        $("#sortDropDown").selectbox();

        var slideSpeed = 400,
            scrollPane$ = $('#compareChart'),
            scrollContent$ = $('#compareChartContent'),
            scrollTrack$ = $('#scrollTrack'),
            scrollItem$ = $('.compareItem'),
            removeItem$ = $('a.removeItem'),
            colorChitList$ = $('.colorChitList'),
            cardShadow$ = $('.cardShadow'),
            facetsSidebar$ = $('#facetsCompareChart'),
            firstTwelveHeight = 0,
            firstSixHeight = 0,
            itemTypes = [],
            sortValue = "All",
            facetsHeight,
            facetsBottom,
            chartBottom,
            items = {},
            //chartPadding = parseInt(scrollPane$.css('padding-top').replace('px', '')),
            chartPadding = parseInt(scrollPane$.css('padding-top')) + parseInt(scrollPane$.css('margin-top')),
            scrollStep,
            scrollToolTip = '<div id="scrollToolTip" class="tooltip"><span class="left"></span><span>Scroll to view more</span><span class="right"></span></div>',
            disabledToolTip = '<div id="disabledToolTip" class="tooltip"><span class="left"></span><span>You can not close last card</span><span class="right"></span></div>';

        setInitialItems();

        function setInitialItems() {
            var visibleItems = $('.compareItem:visible').length;
            var scrollContentWidth = (scrollItem$.outerWidth() + parseInt(scrollItem$.css('margin-right').replace('px',''))) * visibleItems;
            scrollContent$.width(scrollContentWidth);
            if (firstTwelveHeight == 0) {
                facetsHeight = facetsSidebar$.height();
                $('ul.compareItem>li:lt(11)').each(function() {
                    firstTwelveHeight += $(this).outerHeight();
                });
            };
            if (firstSixHeight == 0) {
                $('#facetsCompareChart ul>li:lt(6)').each(function(){
                    firstSixHeight += $(this).outerHeight();
                })
            }
            facetsBottom = 4;
            chartBottom = -2;
            if ($.browser.msie && (parseInt($.browser.version, 10) == 7)) {
                /*var contentHeight = $('.compareItem').outerHeight();
                $('#compareChartContent').height(contentHeight);
                $('#facetsCompareChart, #compareChartFooter').show();*/
                facetsBottom = -1;
                chartBottom = -10;
            }/**/
            if ($.browser.webkit) {
                facetsBottom = 5;
            }
            cardShadow$.height(scrollItem$.outerHeight());
            scrollStep = scrollItem$.outerWidth() + parseInt(scrollItem$.css('margin-right'));
            calcItems();
        };

        // Initialize slider
        scrollTrack$.slider({
            animate: slideSpeed,
            slide: letsSlide,
            create: function(event, ui) {
                $('#chartScroller').append(scrollToolTip);
            }
        });

        function letsSlide(event, ui) {
            if ( scrollContent$.width() > scrollPane$.width() ) {
                scrollContent$.css( "margin-left", Math.round(
                    ui.value / 100 * ( scrollPane$.width() - scrollContent$.width() )
                ) + 'px' );
            } else {
                scrollContent$.css('margin-left', 0);
            };
            calcItems();
        };

        $('a.prev').on('click', function(event){
            event.preventDefault();
            $('#scrollToolTip').remove();
            letsSlideLeft();
        });
        $('a.next').on('click', function(event){
            event.preventDefault();
            $('#scrollToolTip').remove();
            letsSlideRight();
        });

        removeItem$.on('click', function(event){
            event.preventDefault();
            event.stopImmediatePropagation();
            if($('.compareItem:visible').size() > 1) {
                $(this).closest('ul').fadeOut(function(){
                    calcItems();
                });
            } else {
                disableItem();
            }
            $('a.resetCards').fadeIn();
        });

        $('a.compareCTA').on('click', function(event){
            //event.preventDefault();
            event.stopImmediatePropagation();
            //utilSpace.track.trackCMS({
            sonyStore.track.trackCMS({
                href:   $(this).attr('href'),
                id:     $(this).attr('id'),
                rel:    $(this).attr('rel')
            });
        });

        $('a.okToClick').on('click', function(event){
            event.preventDefault();
            //event.stopImmediatePropagation();
            //utilSpace.track.trackCMS({
            sonyStore.track.trackCMS({
                href:   $(this).attr('href'),
                id:     $(this).attr('id'),
                rel:    $(this).attr('rel')
            });
        });

        scrollItem$.on('mouseover', function(){
            $(this).addClass('hoverBorder');
        });

        scrollItem$.on('mouseout', function(){
            $(this).removeClass('hoverBorder');
        });

        scrollItem$.on('click', function(event){
            event.preventDefault();
            var scrollItemUrl = $(this).find('a.compareCTA').attr('href');
            window.location.href = encodeURI(scrollItemUrl);
        });

        function letsSlideLeft() {
            if (scrollTrack$.slider("value") > 0) {
                var sliderStep = Math.ceil( scrollStep / ( scrollContent$.width() - scrollPane$.width() ) * 100 );
                scrollTrack$.slider("value", scrollTrack$.slider("value") - sliderStep);
                var calcMargin = Math.round( scrollTrack$.slider("value") / 100 * ( scrollPane$.width() - scrollContent$.width() ) );
                var newLeftMargin = Math.round(calcMargin / scrollStep) * scrollStep + 'px';
                scrollContent$.animate({marginLeft:newLeftMargin},'slow', function(){calcItems();});
            };
        };

        function letsSlideRight() {
            if (scrollTrack$.slider("value") < 100) {
                var sliderStep = Math.ceil( scrollStep / ( scrollContent$.width() - scrollPane$.width() ) * 100 );
                scrollTrack$.slider("value", scrollTrack$.slider("value") + sliderStep);
                var calcMargin = Math.round( scrollTrack$.slider("value") / 100 * ( scrollPane$.width() - scrollContent$.width() ) );
                var newLeftMargin = Math.round(calcMargin / scrollStep) * scrollStep + 'px';
                scrollContent$.animate({marginLeft:newLeftMargin},'slow', function(){calcItems();});
            };
        };

        $('a#chartHeightControl').on('click', function(event){
            //event.stopPropagation();
            event.preventDefault();
            var toggleButton$ = $(this);
            if (toggleButton$.hasClass('collapse')) {
                collapseChart(toggleButton$);
            } else if (toggleButton$.hasClass('expand')) {
                expandChart(toggleButton$);
            }
            //event.returnValue = false;
            //return false;
        });

        function collapseChart(toggleButton$) {
            var animatedHeight = firstTwelveHeight + chartPadding + facetsBottom;    // FF, IE8 +4, Chrome +5, IE7 -1
            scrollPane$.animate({ 'height' : animatedHeight    });
            cardShadow$.animate({ 'height' : animatedHeight    });
            facetsSidebar$.css('overflow','hidden').animate({ 'height' : firstSixHeight + chartBottom });    // FF, Chrome, IE8 -2, IE7 -10
            toggleButton$.removeClass('collapse').addClass('expand').attr('rel','Chart_Details_Close').find('span').text('Open Detailed Comparison');
        };

        function expandChart(toggleButton$) {
            var animatedHeight = scrollItem$.outerHeight();
            scrollPane$.animate({ 'height' : animatedHeight    });
            cardShadow$.animate({ 'height' : animatedHeight    });
            facetsSidebar$.css('overflow','visible').animate({ 'height' : facetsHeight, 'bottom' : 0 });
            toggleButton$.removeClass('expand').addClass('collapse').attr('rel','Chart_Details_Open').find('span').text('Close Detailed Comparison');
        };

        function calcItems(){
            items.total = $('.compareItem:visible').length;
            //items.singleWidth = scrollItem$.outerWidth();
            items.singleWidth = scrollStep;
            items.paneWidth = scrollPane$.width();
            items.showing = Math.round(parseInt(items.paneWidth / items.singleWidth));
            items.offset = scrollContent$.css('margin-left').replace('px','') * -1;
            items.onLeft = Math.round(items.offset / items.singleWidth);
            items.first = items.onLeft + 1;
            items.extraBit = ( items.total / items.showing ) * ( items.paneWidth - ( items.showing * items.singleWidth ) );
            items.totalWidth = (items.total * items.singleWidth) + items.extraBit;
            items.firstShowing = items.onLeft + 1;
            items.expectedLast = items.firstShowing + (items.showing - 1);
            if(items.expectedLast <= items.total) {
                items.lastShowing = items.expectedLast;
            } else {
                items.lastShowing = items.total;
            };

            scrollContent$.css({'width': items.totalWidth});
            $('#totalItems').text(items.total);
            if(items.firstShowing == items.lastShowing) {
                $('#currentItems').text(items.firstShowing);
            } else {
                $('#currentItems').text(items.firstShowing + '-' + items.lastShowing);
            };
            if(items.firstShowing == 1) {
                $('a.prev').addClass('disabled');
            } else {
                $('a.prev').removeClass('disabled');
            }
            if(items.lastShowing == items.total) {
                $('a.next').addClass('disabled');
            } else {
                $('a.next').removeClass('disabled');
            }
            $('.compareItem').removeClass('disabled');
            $('#disabledToolTip').remove();
            $('#scrollToolTip').remove();

            if(items.total <= 4) {
                scrollTrack$.slider("option", "value", 0);
                scrollContent$.css('margin-left', 0);
                $('#chartScroller').css({'visibility': 'hidden', 'height' : '0'});
                
               /* $('#chartScroller').fadeOut(function(){
                    console.log('inside fadeout function')
                    var otherHeight = 0;
                    if(typeof($("#mod-shippingInfoArea"))!="undefined"){
	                    otherHeight = $("#mod-shippingInfoArea").height();
	                }
	                var newPadding = parseInt($('#compareChartSection').css('padding-top').replace('px',''));
                    var topPadding = newPadding + otherHeight + parseInt($('#chartScroller').css('margin-bottom').replace('px',''));
                    $('#compareChartSection').css('padding-top', topPadding);
                    console.log(topPadding)
                });*/
            } else {
                $('#chartScroller').fadeIn();
                $('#compareChartSection').css('padding-top', 0);
                $('#chartScroller').css({'visibility': 'visible', 'height': '33px'});
            };
        };

        $('a.colorChitLink').on('mouseover', function(event){
            event.preventDefault();
            newColor$ = $(this);
            colorNameSwap(newColor$);
        })

        function colorNameSwap(newColor$) {
            newColor$.parent().siblings().removeClass('activeChip');
            newColor$.parent().addClass('activeChip');
            var colorName = newColor$.data('color-name');
            newColor$.parent().parent().siblings('#currentColor').find('#colorName').text(colorName);
        };

        $('#sortDropDown').on('change', function(){
            var sortValue = $('#sortDropDown :selected').val();
            sortItems(sortValue);
        });

        $('#narrowBy a').on('click', function(event){
            event.preventDefault();
            var filterLine$ = $(this).parent();
            if ( filterLine$.hasClass('selected') ) {return false;}
            filterLine$.addClass('selected').siblings().removeClass('selected');
            var sortValue = $(this).data('filter-type');
            sortItems(sortValue);
            scrollTrack$.slider("option", "value", 0)
            scrollContent$.css("margin-left", 0);
        });

        function sortItems(sortValue) {
            scrollItem$.each(function(){
                var currentScrollItem = this,
                types = $(this).data('item-type').split(',');
                if ($.inArray(sortValue, types) > -1) {
                    $(currentScrollItem).show();
                } else {
                    $(currentScrollItem).hide();
                };
            });
            setInitialItems();
        };

        function disableItem() {
            if ( $('#disabledToolTip').length < 1 ) {
                $('.compareItem:visible').addClass('disabled').append(disabledToolTip);
                $('#disabledToolTip').bind('click', function(event){event.stopPropagation();return false;});
            }
        };

        $('a.resetCards').on('click', function(event){
            event.preventDefault();
            scrollTrack$.slider("option", "value", 0)
            scrollContent$.css("margin-left", 0);
            sortItems("All");
            $(this).fadeOut();
            var filterLine$ = $('#narrowByAll').parent();
            filterLine$.addClass('selected').siblings().removeClass('selected');
        });

        $('.switch a').on('click', function(event){
            event.preventDefault();
            if ( $(this).hasClass('selected') ) {return false;}
            $(this).addClass('selected').siblings().removeClass('selected');
            if ( $('#diffOn').hasClass('selected') ) {
                $('#compareChartContent').addClass('differences');
            } else {
                $('#compareChartContent').removeClass('differences');
            }
        });

        // 29764
        $(document).ready(function(){
            var compareButton = $('a#chartHeightControl');
            if (compareButton.is(":visible")) collapseChart(compareButton);
        });

    });
})(jQuery);