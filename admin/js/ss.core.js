/**
 *  AUTHOR:      Branden R Thompson, Front End Architect | SONY Direct, Online CST DEV
 *  Date:        8/16/11     Time:        9:37 AM
 *  -----------------------------------------------------------------
 *  File Pre-Requisites:
 *  jQuery 1.6
 *  s_code.js (for Omniture)
 */

// Keep track of loaded modules.
var loaded = {core:true};

var sonyStore = {

    debugModuleRegister: 'sonyStore{}',

    /* -- DATA ------------------------------------------------------
     *  The .data{} sub-object is where all relevant data attributes
     *  are placed and stored for access and later use.  This could
     *  also have been labelled .context{} just as easily, since
     *  many of the site parameters (search urls), hash params,
     *  and other information will also go here.
     * ------------------------------------------------------------*/
    data: {
        debugModuleRegister: 'DATA',

        /*  KEY Arrays: This is for our "akamai cache keys" and other values such as cookie keys: */
        baseCacheKeys:      ['storeId', 'catalogId', 'langId'],
        cookieDomainKeys:   ['url', 'urlStart', 'domain'],

        // eppTokens and programPrefixes need to have a 1:1 relationship:
        eppTokens:          ['EPP_SMB_INS', 'EPP_SMB',  'EDU',  'EPP'],
        programPrefixes:    ['ins',         'smb',      'edu',  'epp'],

        syCustomizationAccount: 78192761,

        addData: function(property, value){
            this[property] = value;
            sonyStore.utilities.debug.logDebugEvent(this.debugModuleRegister + ':\naddData() - Parameter: \nthis.' + property + '\nhas been set to ' + this[property] + '...\n',3, this.debugModuleRegister);
        },

        clearData: function(property){
            this[property] = '';
            sonyStore.utilities.debug.logDebugEvent(this.debugModuleRegister +':\nclearData() - Parameter - \nthis.' + property + '\nhas been set to '+this[property]+'...\n',3, this.debugModuleRegister);
        },

        getData: function(property){
            var my = sonyStore;
            my.utilities.debug.logDebugEvent(this.debugModuleRegister + ':\ngetData() - method initialized\nChecking for "sonyStore.data.' + property +  '" and preparing to return()...\n',3, this.debugModuleRegister);

            return((typeof my.data[property] != undefined)?(my.data[property]):(false));
        },

        buildParams: function(){
            var my = sonyStore;

            /*  Step 1:
             *  Let's grab all the URL query parameters that are
             *  on the window.
             */
            var myURLParams = my.utilities.packageURLParameters();
            for(var i = 0; i < myURLParams.length; i++){
                var myPair = myURLParams[i].split('=');
                this.addData(myPair[0], myPair[1]);
            }


	 // Added to allow for objects from the JSON on page
	 if(typeof(urlParamJSONObj)!=="undefined"){
	    jQuery.each(urlParamJSONObj, function(index, value){
	       my.data.addData(index, value);
	    });
	 }


            /*  Step 2:
             *  Let's grab the hash if it's there:
             */
            var myHash = my.utilities.packageHashTags();
            if(myHash){this.addData('hash', myHash);}

            my.utilities.debug.logDebugEvent(this.debugModuleRegister+':\n buildParams() - method completed...\n', 3, this.debugModuleRegister);
            try{
                console.log('urlParams are: ' + myURLParams + '\nHash is: ' + myHash);
            }catch(error){}
        }
    },

     /* -- UTILITIES -------------------------------------------------
     *  The .utilities{} sub-object contains just what it says: an
     *  assortment of functions and properties that while will
     *  likely do not directly manipulate the page from an end-user
     *  perspective, provide necessary code-abstraction and
     *  functionality for many of the other functions within this
     *  object to do their job properly.
     *
     *  This is also where the debug{} sub-sub object resides.
     * ------------------------------------------------------------*/
    utilities: {

        debugModuleRegister: 'UTILITIES',

        /*  DEBUG SUB OBJECT:
         *  This provides a universal set of methods for use in
         *  debugging and troubleshooting code.  This relies upon
         *  the console.log() method to prevent annoying alerts,
         *  and therefore will not work with any version of MSIE
         *  that does not have "Developer Tools" as part of the
         *  browser.  It will not, however, cause errors as the
         *  console.log() method is insulated in a try/catch:
         */
        debug: {

            /* Debug Object Configuration */
            debugModuleRegister: 'DEBUG',
            siteDebugKey: 'ssDebug',
            debugMode: false,
            devOverride: false,
            setPriorityTo: 0,
            setModeleLoggingTo: '',

            /*  Let's check to see whether the developer has either
             *  set 'dev Mode' to true or has added a url parameter
             *  that allows for logging to be enabled, which should
             *  have been built in the
             *
             *  sonyStore.data.buildParms() method.
             */
            checkMode: function(){
                var my = sonyStore;
                this.debugMode = (this.devOverride || my.data[this.siteDebugKey])?(true):(false);
                if(this.debugMode){
                    var myPriorityLevel = my.data.debugPriority || 'all';
                    var myModuleToLog = my.data.debugModule || 'all';
                    this.setPriorityOrModuleLogging(myPriorityLevel, myModuleToLog);
                }
            },

            /*
             *
             */
            setPriorityOrModuleLogging: function(priority, moduleName){
                priority = priority || 'all';
                moduleName = moduleName || 'all';
                this.setPriorityTo = priority;
                this.setModeleLoggingTo = moduleName;
                sonyStore.utilities.debug.logDebugEvent('DEBUG:\nPriority and Modular Registries set.\nPriority Level to Log: ' + priority +'\nModule to log: ' + moduleName + '\n', 0, this.debugModuleRegister);

            },

            /*  This assumes that 'debugMode' is set to true, if
             *  so, let's try to write the passed message into
             *  the console if it exists - if not, then we will
             *  do nothing to prevent constant pop-ups on the page:
             */
            logDebugEvent: function(message, priority, moduleName){

                var my = sonyStore;

                if(this.setModeleLoggingTo != 'all') {

                    /*  So, we only want to show the debug logs of
                     *  a PARTIUCLAR module, so now we need to see
                     *  if this module Name matches the module that
                     *  we set as our "listen to" - we also need to
                     *  check if there's an additional "priority"
                     *  requirement for our logging messages:
                     */
                    if(this.setPriorityTo == 'all' && moduleName == this.setModeleLoggingTo){

                        /*  No priority set, so let's log all messages
                         *  that belong to the module:
                         */
                        my.utilities.debug.traceMessage(message);
                    }
                    else if(priority <= this.setPriorityTo && moduleName == this.setModeleLoggingTo){

                        /*  A priority level has been set, so lets
                         *  log all events for that partiular
                         *  module of a certain priority setting
                         *  or higher:
                         */
                        my.utilities.debug.traceMessage(message);
                    }
                }
                else {

                    /*  We are assuming that we want to look
                     *  at the debugging message of ALL sub-objects
                     *  so now we need to see if we have a priority
                     *  requirement:
                     */
                    if(this.setPriorityTo == 'all'){

                        /*  There is no priority requirement, so
                         *  we will show ALL DEBUG MESSAGES:
                         */
                        my.utilities.debug.traceMessage(message);

                    } else if(priority <= this.setPriorityTo){

                        /*  There is a priority requirement, so
                         *  we want to show all message that are
                         *  of a certain priority of "higher"
                         *
                         *  "higher" = lower integer value
                         */
                        my.utilities.debug.traceMessage(message);
                    }
                }

            },

            /*  traceMessage() allows for two things:
             *  1. abstracts the console.log code for logDebugEvent()
             *  2. allows for a 'quick' and dirty console.log function
             *     that does not require a module name or priority as
             *     arguments.
             */
            traceMessage: function(message){
                try{console.log(message);}
                catch(error){}
            },

            /*  Initialize will run the checkMode method, and if
             *  we are in 'debugMode' will send an initial message
             *  that initialize has begun and debugMode has been
             *  switched on:
             */
            initialize: function(){
                this.checkMode();
                this.logDebugEvent(this.debugModuleRegister + ':\nsonyStore{}\ninit started.\nDebug mode is ON\n',0, this.debugModuleRegister);
            }
        },

        /*  functionOverride():
         *  A utility method which does exactly what it says: allows you
         *  to 'blank out' a function for meta-programming and compatiblity
         *  purposes in the event that old content is calling some legacy
         *  function that is no longer necessary.
         */
        functionOverride: function(){},

        /*
         *  getURLParameter(): This function will take any string input,
         *  search the current parameters in the current pages'
         *  address, and return the value of this pair, or return false.
         */
        getURLParameter: function(paramName){
            var my = sonyStore;
            my.utilities.debug.logDebugEvent(this.debugModuleRegister + ':\ngetURLParameter() - method invoked...\n',3, this.debugModuleRegister);

            /*  First, the quickest thing we can do is to check to see
             *  if the URL parameter has already been applied to the
             *  .data{} subObject
             */
            if(my.data[paramName]){

                /*  the Param is there, and has (as expected) been
                 *  added to the data{} subobject on the initial
                 *  object instantiation:
                 */
                return(my.data[paramName]);
            }
            else {

                /*  ...so it's not there, now we should actually
                 *  try to see if we can find it in the current URL
                 *  parameters. so we'll call the packageURLParameters
                 *  one more time, but we'll also log that this was
                 *  not originally in the .data{} sub object when it
                 *  should have been:
                 */
                my.utilities.debug.logDebugEvent(this.debugModuleRegister + ':\n*WARNING*\ngetURLParameter() - the parameter "' + paramName + '" was not initially found in the data{} subobject as expected.\nAttempting to find in window.location.search...\n', 2, this.debugModuleRegister);
                var myParamRegrabArray = my.utilities.packageURLParameters(), regex = new RegExp("^"+paramName+"=");

                for(var i=0; i < myParamRegrabArray.length; i++){
                    if(regex.match(myParamRegrabArray[i])){
                        return(myParamRegrabArray[i].replace(regex,''));
                    }//end if{}
                }//end for{}
            }//end else{}

            // This parameter obviously could not be found, so let's return false
            my.utilities.debug.logDebugEvent(this.debugModuleRegister + ':\n*WARNING*\ngetUrlParameter() - value not found for parameter "' + paramName +'"\n',2, this.debugModuleRegister);
            return(false);
        },

        /*  packageURLParamaters()
         *  This is our 'grab all window.location.search' values,
         *  which will then return an array of the values. So values
         *  in the array returned will look like this:
         *
         *  "storeId=10151"
         */
        packageURLParameters: function(){
            var myCurrentParams = window.location.search.split('&');

            // let's remove the ? from the first url parameter:
            myCurrentParams[0] = myCurrentParams[0].replace('?', '');

            this.debug.logDebugEvent(this.debugModuleRegister + ':\npackageURLParameters() - URL parameters have been packaged and returned...\n', 3, this.debugModuleRegister);
            return(myCurrentParams);
        },

        /*  packageHashTags()
         *  Similar to packageURLParameters, but simply checks
         *  to see if there is a hash tag present in the url,
         *  amd if so, returns the value of that hash.
         *
         *  This is a utility function primarily for the
         *  sonyStore.data.buildParams():
         */
        packageHashTags: function(){
            if(window.location.hash){
                return(window.location.hash);
            }
            else {
                return(false);
            }
        },

        /*  packageKeysForConsumption()
         *  There's at least twice where want to grab the
         *  'site context' as defined by our "cache keys"
         *  - url parameters determined by the site, for
         *  things like defining cookies and making AJAX
         *  requests.
         *
         *  This method serves almost as the reverse of
         *  packageURLParameters(), except that rather
         *  than parsing through the string of
         *  window.location each time we want to do this,
         *  we can (once buildParams() has been
         *  completed) simply access the local .data
         *  attributes for values within the object
         *  which will be much more performant than
         *  constantly grabbing and parsing that string
         *  over and over...
         */
        packageKeysForConsumption: function(keyArray, packageAs){
            var my = sonyStore;
            packageAs = packageAs || 'object';

            var myPackage;
            switch(packageAs){
                case 'string':
                    myPackage = '';
                    break;

                case 'array':
                    myPackage = [];
                    break;

                // object should always be default if nothing is specified.
                default:
                    myPackage = {};
                    break;
            }

            for(var i = 0; i < keyArray.length; i++) {
                if(packageAs == 'object' || packageAs == 'array'){

                    // thanks to JS, we can append object attributes and
                    // array items identically like so:
                    myPackage[keyArray[i]] = my.data.getData(keyArray[i]);
                    my.utilities.debug.logDebugEvent(this.debugModuleRegister + ':\npackageKeysForConsumption() - Value added to array; value is: ' + myPackage[keyArray[i]] + '\n',3, this.debugModuleRegister);
                    /*  So as an object this will read:
                     *  myPackage.storeId = 10151  (as an example)
                     *
                     *  ...and as an array will read:
                     *  myPackage['storeId'] = 10151
                     */

                }else {
                    // It must be a string, so let's do a 'string addition'
                    myPackage += keyArray[i] + "=" + my.data.getData(keyArray[i]);
                    my.utilities.debug.logDebugEvent(this.debugModuleRegister + '', 3, this.debugModuleRegister);
                }


            }
            return(myPackage);
        }
    },

    /* -- USER -----------------------------------------------------
    *   The user{} sub-object is where all functions dealing with
    *   identifying users is located.  This is where all the
    *   functionality of the old 'cookies.js' file is located.
    *
    *   Many of the functions here have actually been re-factored,
    *   either for improving performance, or abstracting the data
    *   that was originally hard-coded, and utilizing a lot of the
    *   'site context' data that is located in the data{}
    *   sub-object{} as a result of sonyStore.data.buildParams()
    * ------------------------------------------------------------*/
    user: {
        debugModuleRegister: 'USER',

        checkForValidCookies: function(remember){
            var userIdInSession = this.getUserIdFromWCCookie('WC_USERACTIVITY_');
            var userIdInCookie = this.getUserCookieValue('USERS_ID');

            if (remember != '1' && (userIdInSession != userIdInCookie) && this.getCookie("SY_REC") != null)
            {

            }
        },

        deleteCookie: function(cookieName){
            var cookieDate = new Date ();  // current date & time
            cookieDate.setTime ( cookieDate.getTime() - 1 );
            document.cookie = cookieName += "=; expires=" + cookieDate.toGMTString();
        },

        getCookie: function(cookieName){
            var results = document.cookie.match(cookieName + '=(.*?)(;|$)');
            if ( results )
                return (decodeURIComponent(results[1])); //changed unescape to decodeURIComponent()
            else
                return null;
        },

        getCookieCategory: function(name, fallback){
            var my =sonyStore;
            my.utilities.debug.logDebugEvent(this.debugModuleRegister + ":\ngetCookieCategory() - method invoked.\nCookie Name is "+ name + '\n', 3, this.debugModuleRegister);

            cookies = document.cookie +";*";       // ensure terminator
            my.utilities.debug.logDebugEvent(this.debugModuleRegister + ":\ngetCookieCategory() - Full Cookie Category is "+ cookies ,3, this.debugModuleRegister);

            var valStart = cookies.indexOf(name+"=");  // look for cookie

            if(valStart < 0){
                return fallback;
            }     // if not found return fallback

            valEnd = cookies.indexOf("#", valStart); // find end of value

            if(valStart + name.length + 1 == valEnd){
                return fallback;
            } // for my dear Netscape, which puts ='s

            return cookies.substring(valStart + name.length + 1, valEnd); // returns only the category of value part excluding #
        },

        getUserCookieValue: function(keyName){
            var cookieValue = this.getCookie("SY_REC");
            if ( cookieValue == null )
                return null;
            var  nameDelimiter = "~~~" ;
            var pairDelimiter = "```" ;
            var results = cookieValue.match ( keyName + nameDelimiter + '(.*?)(' + pairDelimiter +')');
            if ( results )
                return (decodeURIComponent(results[1]));
            else
                return null;
        },

        getUserIdFromWCCookie: function(c_name){
            if (document.cookie.length>0)
            {
                c_start=document.cookie.indexOf(c_name);
                if (c_start!=-1)
                {
                    c_start=c_start + c_name.length;
                    c_end=document.cookie.indexOf("=",c_start);
                    if (c_end==-1) c_end=document.cookie.length;
                    return decodeURIComponent(document.cookie.substring(c_start,c_end));
                }
            }
            return "";
        },

        isCRMUser: function(){
            var URL_RELOGIN = "reLogonURL";
            var CRM_PORTAL_HOME="CRMPortalHome";
            var REDIRECT_VIEW = "TimeOutRedirectView";
            var CRM_LOGON_FORM = "CRMLogonForm";
            var COOKIE_VALUE_DELIMITER = "$";
            var COOKIE_NAME_VALUE_SEPARATOR = "=";

            var redirectCookieVal = decodeURIComponent(this.getCookie(REDIRECT_VIEW));

            if(redirectCookieVal != "" && redirectCookieVal.length > 0)
            {
                var cookieValTokens = redirectCookieVal.split(COOKIE_VALUE_DELIMITER);
                if(cookieValTokens.length > 1)
                {
                    var logonTokens = cookieValTokens[0].split(COOKIE_NAME_VALUE_SEPARATOR);
                    if(logonTokens!= undefined && logonTokens.length > 1)
                    {
                        if(logonTokens[0] == URL_RELOGIN && logonTokens[1] == CRM_LOGON_FORM )
                        {
                            return true;
                        }
                    }
                }
            }
            return false;
        },

        isLoggedIn: function(){
            var loggedIn = false;
            var logonCookie = this.getCookie('SY_REC_LOGON');
            if (logonCookie != null && logonCookie == "true"){
                loggedIn = true;
            }
            return loggedIn;
        },

        isInEpp: function(){
            var inEpp = false;
            var eppToken = this.getUserCookieValue('EPP');
            if (eppToken != null && eppToken != ''){
                inEpp = true;
            }
            return inEpp;
        },

        printCookie: function(name, fallback){
            var myHTMLPage = document.getElementsByTagName('html')[0];
            var myCookieResults = this.getCookie(name, fallback);
            myHTMLPage.appendChild(myCookieResults);
        },

        readProgramCookie: function(){
            var my = sonyStore;
            my.utilities.debug.logDebugEvent(this.debugModuleRegister + ':\nreadProgramCookie() - method invoked...',3, this.debugModuleRegister);

            var ePP = this.getUserCookieValue('EPP');
            var affiliateId = this.getCookie('InstitutionID');

            if(ePP){
                my.utilities.debug.logDebugEvent(this.debugModuleRegister + ':\nreadProgramCookie() - Users cookie has EPP value. This value is ' + ePP + '\n',3, this.debugModuleRegister);
                document.getElementById('sonyStyleHeader').setAttribute('class',"fcEppEduActive");


                /*  BRT:
                 *  This is a re-factor of a long list of += strings
                 *  and .push() commands to another array. This block
                 *  of code instead looks at our 'base Cache keys'
                 *  (storeId, catalogId, langId) array - which you can
                 *  add to as necessary if more parameters need to be
                 *  sent, and then looks for their value in the
                 *  data object.
                 *
                 *  Remember, at object initialization, we 'buildParams()'
                 *  which should take ALL url parameters and add them
                 *  as variables to the sonyStore.data object - so
                 *  storeId will now be something like:
                 *
                 *  sonyStore.data.storeId = 10151;
                 */
                var nvps = my.utilities.packageKeysForConsumption(my.data.baseCacheKeys, 'object');

                /*  Let's initiate the AJAX call - again we're replacing the rico call here
                 *  so need to ensure we have at minimum the controller
                 *  command + the parameters value
                 */
                my.utilities.debug.logDebugEvent(this.debugModuleRegister + ':\nreadProgramCookie() - preparing to initiate AJAX call...\n', 3 , this.debugModuleRegister);
                my.webService.ajax.sendRequest('SYProgramHeaderDisplayAjax', nvps, 'text');


            }else if(affiliateId) {
                document.getElementById('sonyStyleHeader').setAttribute('class',"fcEppEduActive");
                my.utilities.debug.logDebugEvent(this.debugModuleRegister +  ':\nreadProgramCookie(): - Affiliate ID has been detected, adding fcEppEduActive class to header.\n',3, this.debugModuleRegister);
            }
        },


        removeCookie: function(name){
            sonyStore.utilities.debug.logDebugEvent(this.debugModuleRegister + ':\nremoveCookie() - method invoked...', 3 , this.debugModuleRegister);
          	document.cookie = name + "=" + "" + "; expires=-1";
	        this.setCookie(name, "");

        },


        removeCookieSKU: function(name, skuName){
            var my = sonyStore;
            my.utilities.debug.logDebugEvent(his.debugModuleRegister + ':\n removeCookieSKU() - method invoked...',3, this.debugModuleRegister);

            fallback="EMPTY";
            cookieVal= this.getCookie(name)+"|";

            valStartSKU = cookieVal.indexOf(skuName+"|");
            valEndSKU= valStartSKU + skuName.length;

            if(valEndSKU+1==cookieVal.length){
                tempVal=cookieVal.substring(0,valStartSKU-1);
            }else {
                tempVal=cookieVal.substring(0,valStartSKU)+ cookieVal.substring(valEndSKU+1,cookieVal.length-1);
            }

            my.user.setCookie(name,tempVal);
            return document.cookie;
        },

        /*  setCookieDomain:
         *  This code was an abstraction since it originally
         *  was used both on setCookie() and setCategoryCookie().
         *
         *  It has also been refactored to return an array as
         *  opposed to manually setting attributes to the cookie
         *  itself.
         */
        setCookieDomain: function(){

            // let's log that we are setting the cookieDomain:
            sonyStore.utilities.debug.logDebugEvent(this.debugModuleRegister + ':\n setCookieDomain() - method invoked...', 3 , this.debugModuleRegister);

            // Let's create our array to return.
            var cookie = [];
            cookie['url'] = document.location + "";
	        cookie['urlStart'] = cookie['url'].substring(cookie['url'].indexOf(".")) + "";
	        cookie['domain'] = cookie['urlStart'].substring(0, cookie['urlStart'].indexOf("http://store.sony.com/"));

            // Strips out any port numbers in the domain like 'store.sony.com:80'
	        if(cookie['domain'].indexOf(":") != -1){
		        cookie['domain'] = domain.substring(0, domain.indexOf(":"));
	        }

            sonyStore.utilities.debug.logDebugEvent(this.debugModuleRegister + ':\n setCookieDomain() - method completed.\nCookie Data is:\n\n' + cookie['url'] + '\n' + cookie['urlStart'] + '\n' + cookie['domain'] + '\n', 3, this.debugModuleRegister);
            return(cookie);
        },

        /*  setCookie():
         *  This is our 'workhorse' cookie function - that actually
         *  is responsible for setting the cookie to the user's
         *  browser.
         *
         *  It should be noted that setCookie has basically been
         *  refactored to deal with the 'setCategoryCookie()' method
         *  from the previous cookies.js - as the code was literally
         *  identical save for the '#' seperator.
         *
         *  As such, setCookie now has an additional argument to
         *  optionally accept a 'terminatring character'
         */
        setCookie: function(name, value, terminator){
            terminator = terminator || "";
            var myValue = value + terminator;
            var myCookieDomainValues = this.setCookieDomain();
            document.cookie = name +"="+ myValue;	//";path=/;domain=" + myCookieDomainValues['domain'] ;
            sonyStore.utilities.debug.logDebugEvent(this.debugModuleRegister +  ':\nsetCookie() - method completed.\nCookie is:\n\n' + this.getCookie(name) + '\n',3, this.debugModuleRegister);
        }
    },

    webService: {
        debugModuleRegister: 'WEBSERVICE',

        ajax: {

            debugModuleRegister: 'AJAX',

            /*  basicRicoCallback():
             *  This is our 'pretend we're rico' ajaxFunction so that
             *  current ajax calls do not have to be modified in the
             *  backend.
             *
             *  This function call looks at the response, which will
             *  always have an <response id="someDIVID" type="element">
             *  and html within that response:
             *
             *  It will then replace the innerHTML of htmlElement on
             *  the page the corresponds to that ID with the innerHTML
             *  of that particular response.
             *
             *  In the future, we should be passing pure JSON objects
             *  back and forth between the client/server to reduce
             *  packet/response size.
             */
            basicRicoCallback: function(ajaxResponseObject){

                sonyStore.utilities.debug.logDebugEvent(this.debugModuleRegister + ':\nbasicRicoCallback() - method invoked',3, this.debugModuleRegister);
                /*  First, let's extend the ajaxResponse object so
                 *  that we can use jQuery methods and minimize the
                 *  code.
                 */
                var myResponses = jQuery(ajaxResponseObject).find('response');

                myResponses.each(function(){
                    // let's grab the id of the htmlElement:
                    var domElementIDtoUpdate = this.id;

                    // ..and let's grab the content for the response:
                    var myHTMLforUpdate = this.innerHTML;

                    // ..and finally let's write the html to that dom element:
                    jQuery('#'+domElementIDtoUpdate).html(myHTMLforUpdate);
                });
            },

            sendRequest: function(controllerCmd, parameters, dataType, successCallback, failureCallback, transferType){

                /* Let's lazy load or check of optional arguments */

                /*  Let's talk about the dataType for a second:
                 *  In rico.js - typcially the response that came
                 *  back was XML. However, JK and I found that
                 *  when changing the responseType 'dataType'
                 *  from XML to 'text' - all of the jQuery functions
                 *  started behaving in a manner we expected in the
                 *  'basicRicoCallback() method.
                 *
                 *  Therefore, we've set the 'lazy load default' of
                 *  dataType to 'text'.
                 */
                dataType = dataType || 'text';

                /*  Lazy load both our success and failure functions to call the
                 *  basicRicoCallback() method.
                 */
                successCallback = successCallback || this.basicRicoCallback;
                failureCallback = failureCallback || this.basicRicoCallback;

                /*  Now let's form our jQuery AJAX request */
                var myResponse = jQuery.ajax({
                    url: controllerCmd,
                    dataType: dataType,

                    /*  We will always use POST, because
                     *  it is (for whatever reason) more
                     *  compatible with our controllers
                     */
                    type: transferType || 'POST',

                    /*  Quick note on parameters:
                     *  This can be a string OR an
                     *  object - but keep in mind
                     *  that this is REQUIRED in order
                     *  for the ajax request to work
                     *  properly.
                     */
                    data: parameters,

                    success: successCallback,
                    failure: failureCallback
                });
            }
        }
    },

    // Temporary until object can be created.
    track: {
        trackImpression: function (cmSpotName) {
            var me = this;
            try {
                clearOmniture(s);
                s=s_gi(s_account);
                s.linkTrackVars="prop29";
                s.linkTrackEvents="None";
                s.prop29=pageName+' > '+cmSpotName;
                s.tl(this,'o','RIA Links');
            } catch(e) {
            }
        },

        trackCTA: function (cmSpotName) {
            var me = this;
            try {
                clearOmniture(s);
                s=s_gi(s_account);
                s.linkTrackVars="eVar10,prop29";
                s.linkTrackEvents="None";
                s.eVar10=pageName+' > '+cmSpotName;
                s.prop29=pageName+' > '+cmSpotName;
                s.tl(this,'o','RIA Links');
            } catch(e) {
            }
        },

        trackNavCTA: function (linkObj) {
            var me = this;
            try {
				clearOmniture(s);
				s=s_gi(s_account);
				s.linkTrackVars="eVar25";
				s.linkTrackEvents="None";
				s.eVar25=((linkObj.rel) ? linkObj.rel : 'Nav click on element without tracking data: ' + linkObj.id);
				s.tl(this,'o','CM Spots');
				var redirectFunction = (linkObj.target == '_blank') ? (function () {window.open(linkObj.href, '_blank');}) : (function () {location.href=linkObj.href;});
				var timer = window.setTimeout(redirectFunction, 500);
            } catch(e) {
            }
        },

        trackCMS: function(linkObj) {
            try {
                if(typeof(_cmspotObject)=='object') {
                    _cmspotObject.trackCMSOmniture(linkObj.href, linkObj.id+((linkObj.rel) ? '_'+linkObj.rel : ''), linkObj.target == '_blank');
                }
            } catch(e) {
                debug('EXCEPTION fn:trackCMS ',{link:linkObj,exception:e});
            }
        }

    },

    init: function(){
        var ss = this;
        ss.data.buildParams();
        ss.utilities.debug.initialize();

        // Temp until the analytics module/object is created with more comprehensive tracking.
        // Tracking used on nav and category pages at time of writing.
        jQuery('.trackable').each(function(){
        var $el = jQuery(this);

          if ($el.hasClass('click')) {
          // Create tracking function based on type of tracking as defined in the class
          var trackingFunction = $el.hasClass('impression') ? function(){
              ss.track.trackImpression($el.attr('rel'));
            } : ($el.parents('#globalNavigation').length == 0 ? function (ev){
              ev.preventDefault();

              ss.track.trackCMS({
                href: $el.attr('href'),
                id: $el.attr('id'),
                rel: $el.attr('rel'),
                target: $el.attr('target')
            });
          }:function (ev){
			ev.preventDefault();

			ss.track.trackNavCTA({
				href: $el.attr('href'),
				id: $el.attr('id'),
				rel: $el.attr('rel'),
				target: $el.attr('target')
			});

          });


          $el.click(trackingFunction);
          }

        });

    }

};

jQuery(document).ready(function($){
	sonyStore.init();
});



