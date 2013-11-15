/* ===================================================================
*  Sony Sub Nav plugin

*   PRECONDITION:
*       - jQuery.js 1.7.1
*     Dependant Conditions
*       - Page layout for sections must use center alignment
*       - Summary link items are matched to section items based on list order
*       - Right rail summary UL LI position order must match left rail UL LI position order
*
*   BASIC USAGE
*     Setting properties
*       -  $(document).ss_subNav({ 'easingType': 'easeOutCubic' });
*
* ====================================================================
*/

;$(function ($, undefined) {

    var summaryFooterPos = 0,
        footerTopActivePos = 0;

    var commands = {
        "resetFooterPosition": resetFooterPosition,
        "resetFooterTopActivePosition": resetFooterTopActivePosition
    };

    $.fn.ss_subNav = function(){
    if (typeof arguments[0] === 'string') {

            var property = arguments[1];
            var args = Array.prototype.slice.call(arguments);
            args.splice(0, 1);

            commands[arguments[0]].apply(this, args);
        }
        else {
            //create mediaPlayer
            createSubNav.apply(this, arguments);
        }
        return this;
    }


    function createSubNav(options) {
        var settings = $.extend({
            'scrollSpeed': 1000,
            'flyDownSpeed': 400,
            'cssClassChangeSpeed': 3000,
            'fadeSpeed': 5000,
            'fadeSpeedType': 'slow',
            'fadeOutSpeedType': 'fast',
            'fadeBorderSpeed': 4000, // Transition speed for fading section border after summary link click
            'easingType': 'easeOutSine',
            'startElementShow': '#overviewAddToCart', // Element where the Grey bar becomes visible or hidden
            'topMenuElement': '#utilityBar-subNav-productPriceCTA', // Head of SubNav - referred to affectionately as the "Grey Bar"
            'subNavElement': '#utilityBar-subNav-wrapper', // SubNav - Contains section links
            'summaryTopElement': '#ctoSummary-orderAid', // Summary area
            'summaryFooterElement': '#ctoSummary',
            'summaryFormName': 'frmCTOProcess', // Summary form for setting input
            'summaryOptionsListElement': '#summaryOptionsLists',
            'btn_backToTop': '#btn_backToTop',
            'footerElement': '#footer',
            'subNavMenuStartAdjust': 37, // Tweak where section scrolling ends up under the sub nav
            'summaryFooterElementAdjust': -80, // determines summary container bottom pinning
            'footerAdjust': 230, // footerAdjust and footerPinAdjust together determine how the subnav pins on page bottom
            'footerPinAdjust': 515,
            'footerGreyBarAdjust': 100, //ProductDetail GreyBar footerGreyBarAdjust and footerPinGreyBarAdjust together determine how the subnav pins on page bottom
            'footerPinGreyBarAdjust': 205,
            'navMenuViewAdjust': 95, // subnav bar pinning
            'footerPinSummaryAdjust': 140,
            'animationOn': true,
            'subnavTitleHeight': 0, // default fix for adjusting the jump height
            'fadeEasingType': 'linear',
            'accessoryPositionAdjust': 10
        }, options);

    // ==========
    // Change anything below here at your own peril
    // ==========

        // CSS settings
        var classWrap = 'wrap', classSticky = 'sticky', classUnStick = 'unstick', classStickyTop = 'stickyTop',
            classSelected = 'selected', classListSelected = 'currentList',
            classCollapsed = 'collapsed', classExpanded = 'expanded',
            classPin = 'pin', classShowIn = 'showIn',
            classFooterSet = classWrap + " " + classSticky,
            classSubNavStickySet = settings.subNavElement + '.' + classSticky,
            classTopElementSet = classExpanded + " " + classStickyTop,
            classSummaryHover = "summaryHover",
            classAccessoryCost = "addedCost", classHighlight = "highlight";

        // Page positioning numbers
        var num_Nav_Section_TopAdjust = 20;

        // DOM events
        var clickEventName = 'click',
            mouseEnterEventName = 'mouseenter', mouseLeaveEventName = 'mouseleave',
            hooks = clickEventName + " " + mouseEnterEventName + " " + mouseLeaveEventName;

        // Set DOM list name
        var listName = 'li.subNavItem';

        // Cache static DOM elements
        var subNavItems$ = $(listName + ' a'),
            startElementShow$ = $(settings.startElementShow),
            topMenuElement$ = $(settings.topMenuElement),
            subNav$ = $(settings.subNavElement),
            jumpButton$ = $(settings.btn_backToTop),
            listName$ = $(listName, settings.subNavElement),
            firstSubNav$ = $(listName + ':first'),
            firstSubNavLink$ = $(listName + ':first a'),
            firstItemAnchor$ = firstSubNavLink$.attr('href'),
            summaryTopElement$ = $(settings.summaryTopElement),
            summaryOptionsList$ = $(settings.summaryOptionsListElement + ' ul'),
            accessorySectionTitles$ = $('#Accessories h4'),
            ctoSummaryProductDetails$ = $('#ctoSummary-productDetails'),
            ctoSummaryProductDetailsList$ = $('ul', ctoSummaryProductDetails$);

        // Summary state management
        var renderedSummary = false,
            summaryTopPos = 0, summaryTopElementHeight = 0,
            summaryForm$ = undefined;
        if (summaryTopElement$ && summaryTopElement$[0] && summaryTopElement$[0].nodeName != null) {
            renderedSummary = true;
            summaryTopPos = summaryTopElement$.offset().top;
            summaryTopElementHeight = summaryTopElement$[0].scrollHeight;
            summaryFooterPos = $(settings.summaryFooterElement).offset().top;
            summaryForm$ = $(document.forms[settings.summaryFormName]);
        }

        // Default to sub nav bar if no controlling element
        if (!startElementShow$[0]) {
            startElementShow$ = subNav$;
        }

        var originalSubNavElementPos = subNav$.offset().top, // Get home position for the sub nav bar.
            startPos = startElementShow$.offset().top, // Page position to show/hide subnav
            cartButtonPos = startElementShow$.offset().top, // Shopping cart button position
            footerTopPos = $(settings.footerElement).offset().top; // Footer
            footerTopActivePos = $(settings.footerElement).offset().top;

        // Flags\Consts for scrolling
        var hasScrolled_SubNav = false,
            subNavScrollToPosition = 0,
            hasFooterPin = false,
            delimeter = ":";

        // Animation properties
        var animateShow = 'show', animateHide = 'hide';

        // Custom things
        var colorDiv = '.colorChitArea', // Summary link to the color area on page
            colorSelector = 'Color';

        // Init
        if (renderedSummary) { // CTO
            setSummarySectionLinks();
            setSummaryFormInputEvents();
        }

        // ===========
        //  Page scrolling
        // ===========
        $(window).bind('scroll', function (e) {
            var scrollbarTopPos = getScrollbarTop(),
                summaryTopActivePos = 0;
            var inFooter = scrollbarTopPos > getFooterAdjust(),
                inFooterAlreadySet = inFooter && hasFooterPin;

            // Reset footer
            if (!inFooter && hasFooterPin) {
                subNav$.removeAttr("style").removeClass(classPin).addClass(classSticky);
                hasFooterPin = false;
            }

            // Summary postioning
            if (scrollbarTopPos < summaryTopPos) {
                clearSummaryPin();
            }
            if (summaryTopPos > 0 && scrollbarTopPos > summaryTopPos) {
                summaryTopActivePos = summaryTopElement$.offset().top;
                var doUnPin = summaryTopActivePos <= summaryTopPos,
                    isPinned = summaryTopElement$.hasClass(classPin);
                if (isPinned) {
                    if (doUnPin) {
                        clearSummaryPin();
                        return false;
                    } else {
                        setSummaryPos(scrollbarTopPos);
                    }
                }
                if (!isPinned) {
                    setSummaryPosHigh(1);
                }
            }

            var isAboveCartButton = scrollbarTopPos < cartButtonPos,
                isBelowOriginalSubNavbarPos = scrollbarTopPos > originalSubNavElementPos,
                fixNavbarWithoutHead = isAboveCartButton && isBelowOriginalSubNavbarPos;

            // Grey bar hide\show animate
            if (settings.animationOn && fixNavbarWithoutHead) {
                if (topMenuElement$.hasClass(classExpanded)) {
                    topMenuElement$.animate({ height: animateHide }, settings.fadeSpeedType);
                } else {
                    topMenuElement$.removeClass(classTopElementSet).addClass(classCollapsed);
                    subNav$.removeClass(classStickyTop, settings.cssClassChangeSpeed, renderNavbarSmoothShow(subNav$, classSticky));
                }
                return false;
            } else if (fixNavbarWithoutHead) {
                topMenuElement$.removeClass(classTopElementSet);
                subNav$.removeClass(classStickyTop, 0, renderNavbarNoAnimation(subNav$, classSticky));
                return false;
            }

            // We are above the cart button
            if (scrollbarTopPos < cartButtonPos - settings.subNavMenuStartAdjust) {
                hasScrolled_SubNav = false;
                if (scrollbarTopPos <= startPos) {
                    topMenuElement$.removeClass(classExpanded).addClass(classCollapsed);
                    resetSubNav();
                    return false;
                }
            }

            // We are in the scrolling area
            var showSubNav = scrollbarTopPos > startPos && scrollbarTopPos < getFooterAdjust();
            if (!hasScrolled_SubNav && showSubNav) {
                setSubNavFixed(true, scrollbarTopPos);
            }

            var linkCount = subNavItems$.length;

            // We are in the footer
            if (inFooter) {
                var lastItemPos = footerTopActivePos,
                    lastItemHeight = 0,
                    lastItem = $(subNavItems$[linkCount - 1]).attr('href');
                if (lastItem) {
                    lastItemHeight = $(lastItem).height();
                    lastItemPos = $(lastItem).offset().top + lastItemHeight - getfooterPinAdjust();
                    if (linkCount > 5) {
                        lastItemPos = lastItemPos + settings.subNavMenuStartAdjust;
                    }
                }

                hasFooterPin = true;
                subNav$.removeClass(classFooterSet).addClass(classPin).css({ top: lastItemPos, position: 'absolute' });
                return false;
            }

            // Harvest the subNav items
            var sectionContentEl = [];
            while (linkCount--) {
                var link = $(subNavItems$[linkCount]).attr('href'),
                    pos = $(link).offset().top - settings.navMenuViewAdjust;
                sectionContentEl[linkCount] = link + delimeter + pos;
            }

            var countItems = sectionContentEl.length,
                loopItem = sectionContentEl.length,
                section = '',
                itemPos = 0;

            showTopElementBlock();

            // Display the active section
            while (loopItem--) {
                section = sectionContentEl[loopItem].split(delimeter, 2)[0];
                itemPos = (+sectionContentEl[loopItem].split(delimeter, 2)[1]) - settings.navMenuViewAdjust;
                if (itemPos < scrollbarTopPos) {
                    setActiveContentSection(section, loopItem);
                    break;
                } else {
                    if (countItems === loopItem) {
                        if (scrollbarTopPos < getFooterAdjust()) {
                            setSubNavFixed();
                        }
                        setActiveContentSection(section, loopItem);
                        break;
                    }
                }
            };

            // Reset to original
            if (section === '') { resetSubNav(); }
        });

        // ===========
        //  Click nav
        // ===========
        subNavItems$.live(clickEventName, function (event) {
            // Adjustments
            var navSectionTopAdjust = num_Nav_Section_TopAdjust,
                $anchor = $(this), aTopLink = $anchor.attr('href');

            listName$.removeClass(classSelected);

            topMenuElement$.removeAttr('style');

            if (aTopLink) {
                $('li').has('a[href = "' + aTopLink + '"]').addClass(classSelected);

                var aTopLinkClean = aTopLink.replace("http://store.sony.com/", "#\\/"),
                    scrollToPosition = $(aTopLinkClean).offset().top,
                    viewHeight = getViewHeight();

                showTopElementBlock();

                if (hasScrolled_SubNav || scrollToPosition >= viewHeight + navSectionTopAdjust) {
                    setSubNavFixed(true);
                    scrollToSection(aTopLinkClean);
                } else {
                    subNav$.removeClass(classWrap).addClass(classSticky);
                    scrollToSection(aTopLinkClean);
                }
                subNavScrollToPosition = scrollToPosition;
            }

            // Stop bubbling
            event.preventDefault();
        });

        // Wireup summary local page links
        function setSummarySectionLinks() {
            $.each(summaryOptionsList$, function (idx, val) {
                $(summaryOptionsList$[idx]).find('li').live(hooks, function (event) {
                    if ($(this).attr('data-info')) {
                        // Do nothing on non nav items - time will tell but current business rules infer we do not have to increment our index ( listIdx++ )
                    } else {
                        if (event.type === mouseEnterEventName) {
                            $(this).addClass(classSummaryHover);
                        } else if (event.type === mouseLeaveEventName) {
                            $(this).removeClass(classSummaryHover);
                        } else {
                            var subItem = '',
                                listIdx = $(this).index(),
                                specialCase = false,
                                scrollToIdx = $(summaryOptionsList$).index($(this).parent());

                            listIdx++;

                            var scrollToEl = $(subNavItems$[scrollToIdx]).attr('href'),
                                subItemOrdinal = 'div.optionsWrap:nth-child(' + listIdx.toString() + ')';
                            var subItem$ = $(subItemOrdinal, scrollToEl);
                            // For IE 8
                            try {
                                subItem$.addClass(classHighlight).removeClass(classHighlight, settings.fadeBorderSpeed);
                            } catch (err) {
                                var errMessage = "Unable to get value of the property \'0\': object is null or undefined";
                                // For IE 8 jQuery needs a second call to avoid a null ref on the transition
                                if (err.message == errMessage) {
                                    subItem$.addClass(classHighlight).removeClass(classHighlight, settings.fadeBorderSpeed);
                                } else {
                                    throw err;
                                }
                            }
                            scrollToSection(subItem$);
                        }
                    }
                });
            });
        };

        function setSummaryFormInputEvents() {
            var inputs$ = $("input[type = radio], input[type=checkbox]", summaryForm$);
            inputs$.on(clickEventName, function (event) {
                updateFormRadioCheckBox(this);
                revokeValues();
                checkRules(this);
            });
        };

        // Pass in the radio or checkbox to update
        function updateFormRadioCheckBox(self) {

            if (self.type === "checkbox") {
                var summaryItems$ = $("#extraOptionsList"),
                        accessoryParent$ = $(self).parent(),
                        accessoryUL$ = accessoryParent$.parent(),
                        accessoryH4 = accessoryUL$.prev().text(),
                        desc = $(accessoryParent$).find('.desc').text();

                        if($(accessoryParent$).find('.price').text().split(" ")[1]){
                            var price = " [" + $(accessoryParent$).find('.price').text().split(" ")[1] + "]";
                        }
                        else{
                            var price = " [" + $(accessoryParent$).find('.price').text().split(" ")[0] + "]";
                        }


                if (self.checked) {
                    var descSpan = $('<span/>', { html: desc }),
                        priceTextSpan = $('<span/>', { html: price }).addClass(classAccessoryCost),
                        newListItem$ = $('<li/>', { html: descSpan }).append(priceTextSpan).addClass(classAccessoryCost);

                    newListItem$.attr('data-accessorysection', accessoryH4);
                    summaryItems$.append(newListItem$);
                    setNewAccessoryItemsHooks(newListItem$);

                    var count = $('li', summaryItems$).length;

                    if (count > 2) {
                        // Raise up the summary area
                        repositionSummaryAccessoryResize();
                    }

		                    // CTO FIX START
							 if ($(self).attr('data-name')) {
							 		var accessoryName = $(self).attr('data-name');
							 		if($('[name='+accessoryName+']')) {
							 			$('[name='+accessoryName+']').val($(self).attr('id'));
							 		}
							 }

		                    // CTO FIX End

                } else {
                    var summaryItem = summaryItems$.find('li:contains("' + desc + '")');
                    summaryItem.remove();

                    // Lower the summary area
                    repositionSummaryAccessoryResize();

		                    // CTO FIX START
							 if ($(self).attr('data-name')) {
							 		var accessoryName = $(self).attr('data-name');
							 		if($('[name='+accessoryName+']')) {
							 			$('[name='+accessoryName+']').val('');
							 		}
							 }

		                    // CTO FIX End
                }

                itemCount = $('li', summaryItems$).length;
                if (itemCount > 1) {
                    summaryItems$.find('li').first().hide();
                } else {
                    summaryItems$.find('li').first().show();
                }
            }

            if (self.type === "radio") {

		    // Check for OOS message and remove on click - could also look in text again.
		    if($(self).parents(".input-set").parent().children("div.notifyBar").length > 0){
			$(self).parents(".input-set").parent().children("div.notifyBar").remove();
		    }


                 var data = $(self).next().text();
		    // PJH: Fix to not show the Out Of Stock instead of component name

			if($(self).next().hasClass('notifyBadge')){
			   data = $(self).next().next().text();
			};


                    var radioParent = $(self).parent(),
                     base = $.trim(data.split("[")[0]),
                     isFree = true,
                     price = '';



                    if(data.indexOf("[") != -1){
                       var priceBase = $.trim(data.split("[")[1].replace("]", " ")),
                           priceDecimal = +priceBase.replace("$", "").replace(",", "");
                        price = " [" + priceBase + "]";
                    }

                var suppressFreePrice = $(radioParent).attr('data-option-class');

                var descSpan = $('<span/>', { html: base });

                var priceTextSpan;
                if (price === ' [$0 base option]' || suppressFreePrice || price === '') {
                    if (suppressFreePrice) { price = ''; }
                    priceTextSpan = $('<span/>', { html: price });
                } else {
                    isFree = false;
                    priceTextSpan = $('<span/>', { html: price }).addClass(classAccessoryCost);
                }

                var listItem$ = $('<li/>', { html: descSpan }).append(priceTextSpan).addClass(classAccessoryCost);

                var radioUL$ = $(self).parent().parent(),
                    section$ = radioUL$.parent().parent().parent(),
                    sectionId = '#' + section$.attr('id'),
                    summaryIdx = 0;

                var idxOption = $(self).parent().parent().parent().parent().index();

                var summaryIndex = $(subNavItems$).filter(function (index) {
                    if (subNavItems$[index].hash == sectionId) {
                        summaryIdx = index;
                    }
                });

                var selectedSummaryUL = summaryOptionsList$[summaryIdx],
                    selectedLI = $('li', selectedSummaryUL).eq(idxOption);

                if (!isFree) {
                    $(selectedLI).addClass(classAccessoryCost);
                } else {
                    $(selectedLI).removeClass(classAccessoryCost);
                }

                selectedLI.html(listItem$.html());

                var top3List$ = ctoSummaryProductDetailsList$,
                    summaryOptionsListCurrent$ = $(settings.summaryOptionsListElement + ' ul'),
                    summaryTop3List$ = $(summaryOptionsListCurrent$[0]).find('li:lt(3)');

                // Update Summary top 3 on page bottom
                for (var listIdx = 0; listIdx < 3; listIdx++) {
                    var top3ListItem = $('li', top3List$).eq(listIdx),
                        item1Html = $(summaryTop3List$).eq(listIdx).html();
                    top3ListItem.html(item1Html);
                }
            }
        };

        function setNewAccessoryItemsHooks(item) {
            $("#extraOptionsList").find(item).on(hooks, function (event) {
                if (event.type === mouseEnterEventName) {
                    $(this).addClass(classSummaryHover);
                } else if (event.type === mouseLeaveEventName) {
                    $(this).removeClass(classSummaryHover);
                } else {
                    var subItem = '',
                        listIdx = $(this).index(),
                        specialCase = false;
                    if (this.innerHTML.indexOf(colorSelector) != -1) {
                        subItem = colorDiv;
                        specialCase = true;
                    } else {
                        var scrollToH4TitleValue = $(this).attr('data-accessorysection');
                        var scrollToH4$ = accessorySectionTitles$.filter(function (index, element) {
                            return $(element).html() === scrollToH4TitleValue;
                        });

                    }
                    scrollToSection(scrollToH4$, false, true);
                }
            });
        };

        // Jump to top
        $(settings.btn_backToTop + ' a').on(clickEventName, function (event) {
            if(jumpButton$.hasClass(classShowIn)){
             topMenuElement$.removeClass(classCollapsed).addClass(classExpanded);
                 scrollToSection(firstSubNavLink$.attr('href'));
            }
            else{
                event.preventDefault();
            }
        });

        // Browser safe window values
        function getViewHeight() {
            var windowHeight, doc = document;
            if (window.innerHeight) {
                windowHeight = self.innerHeight;
            } else if (doc.documentElement && doc.documentElement.clientHeight) {
                windowHeight = doc.documentElement.clientHeight;
            } else if (document.body) {
                windowHeight = doc.body.clientHeight;
            }
            return windowHeight;
        };

        // Jump to section
        function scrollToSection(aTopLinkClean, sectionEl, accessorySection) {

            if (aTopLinkClean.length === 0) return; // Nothing to scroll to

            var scrollPosition = originalSubNavElementPos,
                scrollToPos = scrollPosition;

            if ($(aTopLinkClean) && $(aTopLinkClean).offset()) {
                scrollToPos = $(aTopLinkClean).offset().top;
            }

            if (!sectionEl) { sectionEl = aTopLinkClean };

            if (accessorySection) {
                scrollToPos = scrollToPos - settings.accessoryPositionAdjust;
            }

            if (firstItemAnchor$ !== aTopLinkClean) {
                if (topMenuElement$[0]) {
                    scrollPosition = scrollToPos - settings.subnavTitleHeight;
                } else {
                    scrollPosition = scrollToPos - settings.subnavTitleHeight;
                }
            } else {
                scrollPosition = scrollToPos - settings.subnavTitleHeight;
                setActiveContentSection(sectionEl);
            }

            showTopElementBlock();

            $('html, body').stop().animate({
                scrollTop: scrollPosition
            }, settings.scrollSpeed, settings.easingType);

            hasScrolled_SubNav = true;
        };

        // Page resize
        $(window).resize(function () {
            var scrollbarTopPos = getScrollbarTop();
            if (scrollbarTopPos > startPos) {
                if ($(classSubNavStickySet)) { setSubNavFixed(true); }
            }
        });

    // ========
    //  Utility functions
    // ========

        // Handle layout differences b/t cto & product detail
        function getFooterAdjust() {
            var footerPosAdjust = footerTopActivePos - settings.footerAdjust;
            if (!renderedSummary) { // Not CTO
                footerPosAdjust = footerTopActivePos - settings.footerGreyBarAdjust;
            }
            return footerPosAdjust;
        };

        // Handle layout differences b/t cto & product detail
        function getfooterPinAdjust() {
            var footerPinPosAdjust = settings.footerPinAdjust;
            if (!renderedSummary) { // Not CTO
                footerPinPosAdjust = settings.footerPinGreyBarAdjust;
            }
            return footerPinPosAdjust;
        };

        function renderNavbarSmoothShow(el, classTo) {
            topMenuElement$.animate({ height: animateShow }, settings.flyDownSpeed)
            el.animate({ height: animateShow }, settings.flydownSpeed).addClass(classTo);
        };

        function renderNavbarNoAnimation(el, classTo) {
            el.addClass(classTo, 0);
        };

        function getScrollbarTop() {
            var scrollbarTop = 0,
                viewPort = self;
            if (typeof (viewPort.pageYOffset) == 'number') {
                scrollbarTop = viewPort.pageYOffset;
            } else {
                scrollbarTop = document.documentElement.scrollTop;
            }
            return scrollbarTop;
        };

        function setSubNavFixed(showHead, scrollbarTopPos) {
            if (renderedSummary) {
                setSummaryPos(scrollbarTopPos);
            }

            if (showHead) {
                subNav$.removeClass(classStickyTop).addClass(classSticky);
                showTopElement();
                jumpButton$.addClass(classShowIn);
                showTopElementBlock();
            } else {
                subNav$.removeClass(classSticky).addClass(classStickyTop);
                topMenuElement$.removeClass(classExpanded).addClass(classCollapsed);
                jumpButton$.removeClass(classShowIn);
            }
        };

        function setSummaryPos(scrollbarTopPos) {
            summaryTopElement$.addClass(classPin);
            var compositePos = scrollbarTopPos + summaryTopElementHeight,
                summaryFooterPosAdjust = summaryFooterPos - settings.summaryFooterElementAdjust;
            if (compositePos > summaryFooterPosAdjust) {
                var fixedSummaryPos = summaryFooterPosAdjust - summaryTopElementHeight - settings.footerPinSummaryAdjust;
                summaryTopElement$.css({ top: fixedSummaryPos + "px", position: 'absolute' });
            } else {
                summaryTopElement$.css({ top: '', position: '' });
            }
        };

        function setSummaryPosHigh(postionTop) {
            summaryTopElement$.addClass(classPin).css({ top: postionTop });
        };

        function clearSummaryPin() {
            summaryTopElement$.removeAttr("style").removeClass(classPin);
        };

        // Reset with callback
        function resetSubNavBase() {
            topMenuElement$.fadeOut(settings.fadeOutSpeedType, settings.fadeEasingType, resetSubNav);
            hasScrolled_SubNav = false;
        };

        function resetSubNav() {
            subNav$.removeAttr("style").removeClass(classSticky).addClass(classWrap);
            listName$.removeClass(classSelected);
            firstSubNav$.addClass(classSelected);
            jumpButton$.removeClass(classShowIn);
        };

        function resetSubNavPin() {
            listName$.removeClass(classSelected);
        };

        function setActiveContentSection(section) {
            showTopElementBlock();
            listName$.removeClass(classSelected);
            $('li').has('a[href = "' + section + '"]').addClass(classSelected);

            // Summary active section indicator ( does border color highlighting )
            if (renderedSummary) {
                var idx = getSectionIndex(section);
                summaryOptionsList$.parent().removeClass(classListSelected).eq(idx).addClass(classListSelected);
            }
        };

        function getSectionIndex(section) {
            return listName$.has('a[href = "' + section + '"]').index();
        };

        function showTopElement() {
            showTopElementBlock();
            if (topMenuElement$ && topMenuElement$.hasClass(classCollapsed)) {
                topMenuElement$.switchClass(classCollapsed, classExpanded, settings.flyDownSpeed);
            }

            if (!topMenuElement$.hasClass(classExpanded)) {
                topMenuElement$.removeClass(classCollapsed).addClass(classExpanded);
            }
        };

        function showTopElementBlock() {
            if (topMenuElement$.css('display') == "none") {
                topMenuElement$.animate({ height: animateShow }, settings.flyDownSpeed);
                topMenuElement$.css('display') === 'block';
            }
        };

        function repositionSummaryAccessoryResize() {
            summaryTopElementHeight = summaryTopElement$[0].scrollHeight;
            setSummaryPos(getScrollbarTop());
        };


    };

    function resetFooterPosition(adjustment){
       summaryFooterPos = $("#footer").offset().top - adjustment;
    };

    function resetFooterTopActivePosition(adjustment){
        footerTopActivePos = $("#footer").offset().top - adjustment;
    };

} (jQuery));