jQuery(document).ready(function () {

	if(typeof(homepage)==="undefined"){
	 if(typeof(lightwindow)!=='function') {
		ssCoreUtil.dynamicLoader('../../../../wcsstore/SonyStyleStorefrontAssetStore/javascript/lightwindow.js','js');
			ssCoreUtil.dynamicLoader('../../../../wcsstore/SonyStyleStorefrontAssetStore/css/lightwindow.css','css');

	 }
	}

	if(isCRMUser())
	{
		var bct = document.getElementById('bctlink1');

		if(bct !=null)
		{
			var breadCrumbHTML = bct.innerHTML;
			var breadCrumbTitle = bct.title;
			var breadCrumbHREF = bct.href;

			// replace function Sony style with CRM Portal Home
			breadCrumbHTML = breadCrumbHTML.replace(/Sony Style/i,"Backstage Access");
			breadCrumbHREF = breadCrumbHREF.replace("home","backstageportal");
			breadCrumbHREF = breadCrumbHREF.replace("StoreCatalogDisplay","CRMPortalHome");
			if(breadCrumbTitle == "Sony Style")
			{
				breadCrumbTitle = breadCrumbTitle.replace("Sony Style",'Backstage Access');
			}

			bct.innerHTML = breadCrumbHTML ;
			bct.title =  breadCrumbTitle;
			bct.href = breadCrumbHREF;
		}
	}


	if(jQuery('#termsOfServiceFooterLink').length > 0)
	{
			jQuery("#termsOfServiceFooterLink").click(function(){
				displayTermsCondPopup('10151')
			});
	}

	if(jQuery('#btn-shopWithConfidence').length > 0)
	{
			jQuery("#btn-shopWithConfidence").click(function(){
				displayShopWithCondidencePopup('10151')
			});
	}

	if(jQuery('#bottomFooterLegalLink').length > 0){
			jQuery("#bottomFooterLegalLink").click(function(){
				displayLegalInfoPopup('10151')
			});
	}

	// This looks for the SMB token and puts the top messaging on the page if it is found.
	if(typeof(getEvar36Value) == "function" && getEvar36Value()=="smb:EPP_SMB"){
	    jQuery("#programBadgeId").html('<div class="epp_links"><div class="badge" style="margin-bottom: 0 !important;">Sony Business Direct</div><ul><li><a id="link-eduEppLogoutClearCookies" href="/webapp/wcs/stores/servlet/SYExitEPP?catalogId=&storeId=10151&langId=-1&amp;URL=OrderCalculate%3FcalculationUsageId%3D-1%26calculationUsageId%3D-3%26updatePrices%3D1%26doPrice%3DY%26URL%3DStoreCatalogDisplay" rel="SMB_EPP LOGOUT BAR: EXIT PROGRAM CLEAR COOKIES">Exit the Business store</a></li></ul></div>');
	}

});
