/**
 *  EDU EPP Anonymous User Logout Module
 */

var checkForEDUEPP = {

    // Container Bar IDs:
    programContainerID: 'purchasePriceProgramCalloutBar',
    programContainerExists: false,
    programTextID: 'programStorefrontName',

    // Attributes to be written to the link, do not include # or . in the names:
    logOffCommandLinkID: 'link-eduEppLogoutClearCookies',
    logOffCommandLinkClass: 'link-programLogoffLink',
    logOffcommand: '/webapp/wcs/stores/servlet/SYExitEPP?storeId=10151&langId=-1&catalogId=10551&URL=OrderCalculate%3FcalculationUsageId%3D-1%26calculationUsageId%3D-3%26updatePrices%3D1%26doPrice%3DY%26URL%3DStoreCatalogDisplay',
    trackingText: 'EDU_EPP LOGOUT BAR: EXIT PROGRAM CLEAR COOKIES',
    guestLinkText: "Exit the",
    authenticatedLinkText: "Logout of the",

    //  If adding more - refactor isThisProgramExcluded Function
    excludedPrograms: ['Family Center'],

    EduEppIsActive: false,
    eppIsExcluded: false,

    isProgramActive: function(){
        var theProgram = getUserCookieValue('EPP');
        this.EduEppIsActive = (theProgram)?(true):(false);
    },

    isThisProgramExcluded: function(){
        if(this.programContainerExists)
        {
            var programName = document.getElementById(this.programTextID).innerHTML;
            if(programName.indexOf(this.excludedPrograms[0]) != -1){
                    this.eppIsExcluded = true;
            }
        }
    },

    doesElementExist: function(){
        checkForEDUEPP.programContainerExists = (document.getElementById(checkForEDUEPP.programContainerID))?(true):(false);
    },


    pollForElement: function(){
        var me = this;
        checkForEDUEPP.doesElementExist();
        if(!document.getElementById(checkForEDUEPP.programContainerID))
        {
            setTimeout(function(){me.pollForElement();}, 2000);
        }
        else
        {
            checkForEDUEPP.isThisProgramExcluded();
            if(!me.eppIsExcluded){
                checkForEDUEPP.writeElements();
            }
        }
    },

    writeElements: function(){
        var myProgramBarElement = document.getElementById(this.programContainerID);
        var myLinkElement = document.createElement('a');

       		 //apend the link to header bar:
            myProgramBarElement.appendChild(myLinkElement);
            myLinkElement.setAttribute('id', this.logOffCommandLinkID);
            myLinkElement.setAttribute('class', this.logOffCommandLinkClass);
            myLinkElement.setAttribute('href', this.logOffcommand);
            myLinkElement.setAttribute('rel', this.trackingText);

            var isLoggedIn = (getUserCookieValue("LOGON_ID"))?(true):(false);

            if(isLoggedIn) {
                 myLinkElement.innerHTML = this.authenticatedLinkText + " " + document.getElementById(this.programTextID).innerHTML + " store";
            }
            else{
                 myLinkElement.innerHTML = this.guestLinkText + " " + document.getElementById(this.programTextID).innerHTML + " store";
            }
    },

    init: function(){
        this.isProgramActive();

        if(this.EduEppIsActive){
            this.pollForElement();
        }
    }
};


/* ===========================================
 * BEGIN Global Navigation Setup
 * ! Initialize the GlobalNavigation here
 * ===========================================
*/

var Sonystyle_global_naviation;

var globalInit = function() {

		// This is for any PromoSpots in the right rail.
		if(typeof(homepage)==="undefined"){
			sIFR.replace(AvantGardeMedium, {
				 selector: '.rightRailSpotTitle',
				 css: ['.sIFR-root { color: #000000; font-size: 13px }'],
				 wmode: 'transparent',
				 preventWrap: false,
				 offsetTop: 2,
				 forceSingleLine: false
			});
		}

	// ! Initialize Globale Flash text
	if(typeof(homepage)==="undefined"){ initGlobalSiFR(); }

	// Check if we are in an EPP or FC store.
	var eppCookie = getUserCookieValue('EPP') || '';

	if (eppCookie != '') {
		jQuery('#sonyStyleWebsite, #container').each(function(el){
			jQuery(this).addClass(eppCookie);
		});
	}

};

var globalInitJq = function () {

 	if (jQuery(document.getElementById('header')).length > 0)
 	{
			jQuery('#headerLoginMesssageTab').hover(function(evt){
				jQuery('.toggleLoginSection').each(function(){
					jQuery(this).toggleClass('hidden');
				});
			},function(evt){
				jQuery('.toggleLoginSection').each(function(){
					jQuery(this).toggleClass('hidden');
				});
			});
	}
};
/* ! Next we setup the onLoad listener to initialize the globalNav  */
jQuery(document).ready(function() {
	globalInit();
	globalInitJq();
	checkForEDUEPP.init();
	if(typeof(homepage)==="undefined"){
	trackEduEppFCUser(); // added for defect 24611
	} else {
		if(isUserLoggedIn() == true && isUserInEpp() == true || isUserInEpp() == true) {
			storeBadge.init();
		};
	}
});

var storeBadge = {
	ajaxCall: function(){
		var url = '/webapp/wcs/stores/servlet/SYProgramHeaderDisplayAjax';
		jQuery.ajax({
			type: 'POST',
			url: url,
			data: ajaxEngine.params.parameters,
			success: function(theResponse){
				storeBadge.parseTheResponse(theResponse);
			},
			error: function(){	}
		});
	},
	parseTheResponse: function(theResponse){
		if(jQuery(theResponse).find('response#programBadgeId')){
			var programBadgeHTML = jQuery(theResponse).find('response#programBadgeId').text();
			jQuery('#programBadgeId').html(programBadgeHTML);
		}
	},
	init: function(){
		storeBadge.ajaxCall();
	}
};

ss_search_autocomplete = {
	autoCompleteController : {
		setActions : function(){
			var me = this;
			// change default text on click for auto-complete
			jQuery(".newTopHeaderSearchBar").click(function(event){
				var s = trimString(this.value);
				if(s == "Search Products" || s == "Enter text and try again"){
					this.value="";
				}
			});

			jQuery('#newSiteSearchSubmitButton').click(function(event){
				var s = trimString(jQuery(".newTopHeaderSearchBar").val());
				if(s != "Enter text and try again" && s != "Search Products" && s != "" && s != "SEARCH"){
					if(jQuery('#CatalogSearchForm').length > 0){
						jQuery('#CatalogSearchForm').submit();
					}
					else if(jQuery('#catalogSearchForm').length > 0){
						jQuery('#catalogSearchForm').submit();
					}
				}
			});

		},
		init : function(){
			var me = this;
			me.setActions();
		}
	},

	init : function() {
		var me = this;
		jQuery(document).ready(function(){
			jQuery('#CatalogSearchForm').submit( function () {
				removeCookie("SearchResultsCompareCookie");
				return true;
			});
			me.autoCompleteController.init();
		});
	}
}
ss_search_autocomplete.init();