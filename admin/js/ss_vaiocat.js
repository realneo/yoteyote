var categoryController = {
   
    // All links that need to be tracked in Omniture should go in this array:
    omnitureTrackingClass: "isTrackable",
    trackingClasses: ['link-facetNavDimension','link-bigHeroPromo','link-heroPromoSpot', 'linkTrack', 'removeItem', 'videoOverlayTrigger', 'link-auxList', 'collapse', 'footnoteLink', 'link-storyCTA', 'cta', 'link-storyImage'],
    /*  Debug Nested Object
     *  -------------------------------------------------------------
     */
    debug: {
        debugModeKey: 'ssDebug',
        debugMode: false,
        devOverride: false,
        checkMode: function(){
            this.debugMode = (this.debugMode || this.devOverride || window.location.search.indexOf(this.debugModeKey)!= -1)?(true):(false);
        },
        traceMessage: function(logMessage){
            if(this.debugMode){
                try {
                    console.log(logMessage);
                }catch(error) {
                    alert(logMessage);
                }
            }
        }
    },
    setupFootnotes: function () {
        var $ = jQuery;
        var expandLink = $("#link-expandCollapseFootnotes"); 
        var expandedContent = $("#list-categoryFootnotes"); 
        if(expandLink.hasClass('open')) {
            expandedContent.show();
        } else {
            expandedContent.hide();
        }

        $('.footnoteLink').click(this.openFootnotes);
        $(expandLink).click(this.toggleFootnotes);

    },
    openFootnotes: function(){
        var $ = jQuery;

        var expandedContent = $("#list-categoryFootnotes"); 
        expandedContent.slideDown();

        $(document).scrollTop($(expandedContent).position().top);
        $('#link-expandCollapseFootnotes').html("Hide Footnotes").addClass('open');
    },
    toggleFootnotes: function(){
        var $ = jQuery;

        var expandLink = $("#link-expandCollapseFootnotes"); 
        var expandedContent = $('#list-categoryFootnotes');


        if(expandLink.hasClass('open')) {
            expandLink.toggleClass('open').html("View Footnotes");
            expandedContent.slideToggle();
        }
        else {
            expandLink.toggleClass('open').html("Hide Footnotes");
            expandedContent.slideToggle();
        }
    },

    setEvents: function(){
        var myDebugName = "setEvents():\n\n";
        this.debug.traceMessage(myDebugName + "method invoked.\n");
    },

    facetTuning: function(){
        if (this.dynamicFacets != '') {
            sonyStore.webService.endeca.requestEndecaInformation(this.createFacets);
        }
    },

    createFacets: function(data, status){
        var $ = jQuery, gp = sonyStore.utilities.getURLParameter;
        if (status == 'success') {
            categoryController.rawData = data;
            categoryController.facetData = $(data.category.searchRefinement.refinements.refinement).filter(function(ind){
                var match = false, rf = data.category.searchRefinement.refinements.refinement, df = categoryController.dynamicFacets;
                for (var i = 0; i < df.length;i++) {
                    if (rf[ind].name==df[i].facet) {
                        match = true;
                        rf[ind].location = df[i].location;
                        if(df[i].title) rf[ind].title = df[i].title;
                    }
                }
                return match;
            }).toArray().sort(function(a,b){return a.location - b.location});

            categoryController.N = data.category.N;

            // Get current facets, and url params.
            var allFacets = $('.mod-facetList'), curLang = gp('langId'), curStore = gp('storeId'), curCata = gp('catalogId'), curCate = data.category.categoryId;

            // Create new facetlists
            for (var facetIndex = 0; facetIndex < categoryController.facetData.length; facetIndex++) {
                var currentFacet = categoryController.facetData[facetIndex];

                // Create the string to be used to create the elements by jQuery.
                var creationString = '<ul class="mod-facetList siteList">' +
                                        '<h5 class="hdr-facetListHeader">'+ (currentFacet.title || currentFacet.name) +'</h5>';
                for (var dimensionIndex = 0; dimensionIndex < currentFacet.values.value.length; dimensionIndex++ ) {
                    var currentDimension = currentFacet.values.value[dimensionIndex];

                    creationString += '<li class="facet-dimensionItem">'+
                        '<a class="link-facetNavDimension dynTrack contentLink" rel="'+ data.name +' - facet - ' + (currentFacet.title || currentFacet.name) + ' - ' + currentDimension.name + '" href="/webapp/wcs/stores/servlet/CategoryDisplay?langId='+curLang +'&storeId='+curStore+'&catalogId='+curCata+'&N='+categoryController.N+'+'+ currentDimension.id+'&categoryId='+curCate+'&viewTaskName=CategoryDisplayView&facetlist=true">'+currentDimension.name+'</a></li>';
                }

                creationString += '</ul>';

                // Get location and insert element.
                var currentFacetList = $('.mod-facetList');
                if(currentFacetList.length > currentFacet.location){
                    currentFacetList.eq(currentFacet.location).before(creationString);
                } else if (currentFacetList.length > 0) {
                    currentFacetList.eq(currentFacetList.length-1).after(creationString);
                } else {
                    $('.mod-facetGrouping').first().append(creationString);
                }

            }
            
            $('.dynTrack').click (function(ev) {
                var $el = $(this);
                ev.preventDefault();
                
                sonyStore.track.trackCMS({
                    href: $el.attr('href'),
                    id: $el.attr('id'),
                    rel: $el.attr('rel'),
                    target: $el.attr('target')
                });             
            });
        }
    },

    init: function(dynamicFacets){
        this.debug.checkMode();
        this.setupFootnotes();
        this.dynamicFacets = dynamicFacets || '';
        this.facetTuning();
    }

};

if (jQuery.browser.msie && (parseInt(jQuery.browser.version, 10) == 7)) {
    jQuery('html').addClass('ie7');
};

jQuery(document).ready(function($){

    sonyStore.webService.endeca.setId(16154);
    categoryController.init([{facet:'Screen Size', location:1},{facet:'SS.Price', title:'Price', location:2}]); 
    jQuery(document).ss_subNav({ 'easingType': 'easeOutCubic', 'subNavMenuStartAdjust': 5, 'subnavTitleHeight': 85});

   
});


jQuery(document).ready(function() {
    jQuery('form.emailSubscribeForm').keydown(function(event) {
        if (event.keyCode == 13) {
            jQuery(this).find('button').click();
            return false;
        }
    });

    if(jQuery.browser.msie) {
        jQuery("#weeklyDealsEmailSignUpEmailAddress").val(jQuery("#weeklyDealsEmailSignUpEmailAddress").attr("placeholder"));
        jQuery("#weeklyDealsEmailSignUpEmailAddress").click(function(){
            if(jQuery("#weeklyDealsEmailSignUpEmailAddress").val() == jQuery("#weeklyDealsEmailSignUpEmailAddress").attr("placeholder")){
                jQuery("#weeklyDealsEmailSignUpEmailAddress").val("");
            }
        });
        jQuery("#weeklyDealsEmailSignUpEmailAddress").blur(function(){
            if(jQuery("#weeklyDealsEmailSignUpEmailAddress").val() == ""){
                jQuery("#weeklyDealsEmailSignUpEmailAddress").val(jQuery("#weeklyDealsEmailSignUpEmailAddress").attr("placeholder"));
            }
        });
    } 
});