// Shows/unhides all of the SELECT boxes on a page
function showSelects() {
    $(document.body).select("select").each(function(select) {
        select.show();
    });
}

// Hides all of the SELECT boxes on a page
function hideSelects() {
    $(document.body).select("select").each(function(select) {
        select.hide();
    });
}

// Returns if the browser is IE 6
function isIE6() {
    return Prototype.Browser.IE && navigator.appVersion.indexOf("MSIE 6.0") != -1;
}

function closeEmailErrorPopup(){
 if($('signUpResultsNotificationSection')){
	 $('signUpResultsNotificationSection').innerHTML = "";
	 $('signUpResultsNotificationSection').hide();
	 }
 }

 function displayZipDesc(){
 	$('signUpResultsNotificationSection').show();
 	$('signUpResultsNotificationSection').innerHTML = "<h3 class='zipCodeTitle'>Why do we need your zip?</h3><ul class='input-set'><li><span class='quickEmailErrorMsg'>Giving us your zip code will allow us to let you know about Sony events and Sony Store openings in your area.</span></li></ul><div class='okButton' onClick='closeEmailErrorPopup();'/>";
 }
//browser detection with prototype:
Prototype.Browser.IE6 = Prototype.Browser.IE && parseInt(navigator.userAgent.substring(navigator.userAgent.indexOf("MSIE")+5)) == 6;
Prototype.Browser.IE7 = Prototype.Browser.IE && parseInt(navigator.userAgent.substring(navigator.userAgent.indexOf("MSIE")+5)) == 7;
Prototype.Browser.IE8 = Prototype.Browser.IE && !Prototype.Browser.IE6 && !Prototype.Browser.IE7;

//creating a namespace to avoid JS collisions.
var ssCoreUtil = {};
ssCoreUtil.dynamicLoader = function(filename, filetype)
	{
 	if (filetype=="js"){ //if filename is a external JavaScript file
  		var fileref=document.createElement('script')
  		fileref.setAttribute("type","text/javascript")
  		fileref.setAttribute("src", filename)
 	}
 	else if (filetype=="css"){ //if filename is an external CSS file
  		var fileref=document.createElement("link")
  		fileref.setAttribute("rel", "stylesheet")
  		fileref.setAttribute("type", "text/css")
  		fileref.setAttribute("href", filename)
 	}
 	if (typeof fileref!="undefined")
  		document.getElementsByTagName("head")[0].appendChild(fileref)
}

// To store the eSpotPageImpressionsList
var eSpotPageImpressionsList = "";
function setEspotPageImpressionsList(espotName) {
    eSpotPageImpressionsList = eSpotPageImpressionsList + espotName;
}


Event.observe(window, 'load', function (){

	//Select input tags with caption attribute
	$$("input[caption]").each(function (thisElement){

		//If there isn't any value we will set the visual prompt text inside the box.
		if (thisElement.value == ""){
			//We add the captioned class so we can check for on focus action
			thisElement.addClassName('captioned');

			if (thisElement.readAttribute('type') == 'password'){
				if (!Prototype.Browser.IE){
					//If it is a password element, we set the caption and set the type to text
					thisElement.value = thisElement.readAttribute('caption');
					thisElement.setAttribute('originalType', 'password');
					thisElement.type = "text";
				}
				else{
					thisElement.writeAttribute('caption','');
				}
			}else{
				thisElement.value = thisElement.readAttribute('caption');
			}
		}

		Event.observe(thisElement, 'focus', function(e){
			//We do these things when the user clicks on the input field.
			var thisElement = Event.element(e);
			if (thisElement.hasClassName('captioned')){
				thisElement.value = '';
				thisElement.removeClassName('captioned');
			}
			//Set the fields to masked
			if (thisElement.readAttribute('originalType') == "password") thisElement.type = "password"

		});

		Event.observe(thisElement, 'blur', function(e){
			var thisElement = Event.element(e);

			if (thisElement.value == ''){
				if (thisElement.readAttribute('originalType') == "password") {
					thisElement.type = "text";
				}
				thisElement.value = thisElement.readAttribute('caption');
				thisElement.addClassName('captioned');

			}

		})
	});
});
