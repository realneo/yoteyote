//NAMESPACE
if( typeof ss_pkg_catalogServices == 'undefined' ) { var ss_pkg_catalogServices = {}; }

//simple publicly accesible boolean variable to check if the script has been fully loaded ( interpreted ) by the browser
ss_pkg_catalogServices.loaded = false;

//CONFIGUTATION OBJECT
//by convention configuration variables are placed at the top of the document.
ss_pkg_catalogServices.config = {
	env	: 'cm',
	maxProductsPerRequest: 50,
	catalogId : '10551',
	storeId : '10151',
	langId : -1,
	//this script will be consuming the JSON services
	output : 'JSON',
	//possible dataset for the product data feed
	dataset : 'price|inventory|accessories|features|specifications|modeDetailedInfo|footnotes',
	//possible dataset for the category data feed
	datasetCat : 'price|SubCategories|CategoryProducts',
	urlProductService : '/webapp/wcs/stores/servlet/SYGetProductInfoWithPriceService',
	urlCachedProductService : '/webapp/wcs/stores/servlet/SYGetProductInfoService',	
	urlCategoryService : '/webapp/wcs/stores/servlet/SYGetCategoryWithPriceService',
	urlCachedCategoryService : '/webapp/wcs/stores/servlet/SYGetCategoryService',
	urlDevServiceProxy : 'catalogService.php'	
}


/***** How to use can be found on blackmesa :  /wiki/index.php/Sony_Catalog_Services_JS_Documentation ****/

////////////////////////////////////////////////////////////////////////////////////////////
//ss_pkg_catalogServices.productDataService
//- object contains the methods and data model for rendering dynamic price data.
//creating a single object literal.  note this is a simple way to create a "singleton" object in javascript
//an object that is not meant to have more than one instance.
//there is a specific design pattern to make a javascript object behave like a "singleton" object in java
//but that complexity is not necessary...we do not need to "force" it to return a reference to itself when a new instance is created.
//convention is all we need.
////////////////////////////////////////////////////////////////////////////////////////////

ss_pkg_catalogServices.productDataService =  {
	// the underscore is a JS programming convention to indicate a "private" variable
	// logically they are not intended to be accessed or used by external methods.
	_myReference 		: 'ss_pkg_catalogServices.productDataService',
	_itemSelector		: 'doProductData',
	_moduleName			: 'module_productDataService',
	//collection of unique product IDs for the service request
	_productIdArray		: new Array(),

	//collection of all dom elements that have dynamic data.
	_elementsWithData  : new Array(),

	//sub collection of dom elements that need price data
	_elementsWithPrice : new Array(),
	
	//sub collection of dom elements that need inventory data
	_elementsWithInventory : new Array(),

	//sub collection of dom elements that need product info data	
	_elementsWithProdInfo : new Array(),

	//sub collection of dom elements that need product features
	_elementsWithProdFeatures : new Array(),

	//sub collection of dom elements that need product accessories
	_elementsWithProdAcc : new Array(),

	//sub collection of dom elements that need product specs
	_elementsWithProdSpec : new Array(),

	//sub collection of dom elements that need product footnotes
	_elementsWithProdFootnotes : new Array(),
	//collection of "dateset" parameters
 	_dataSetCollection : new Array(),
	_updateModelOnly : false,
	//split Request.( ie7/8 has a url character length limit of 2048 effectivel)
	//if we have over 50 product ids in the url string we will need to split the request
	//would also be applied to all browsers...reducing the amount of data returned per requests
	//theoretically we should rarely hit the max char / product ids in the query.
	_splitRequest : false,
	//collection to store sub lists of product Ids for split requests
	_multiRequest : new Array(),
	_useCache : true,

	_viewMethodsCollection : new Array(),
	_dataPopulationCollection : new Array(),
	//the parameters for our service query.
	//configuration object should be near top of document

	_queryParams		: {
		dataset:'',
		catentryIds:'',
		catalogId: ss_pkg_catalogServices.config.catalogId,
		storeId: ss_pkg_catalogServices.config.storeId,
		langId: ss_pkg_catalogServices.config.langId,
		output: ss_pkg_catalogServices.config.output
	},
	//a boolean public var an external function can poll to see if data is ready.
	dataReadyNotifier : false,
	//public available product data set indexed by Product ID.
	//this is the data object that stores all product data
	//it will be referenced by "productId"
	productDataSet		: {},
	_debugMode : false,
	_debugLog : function( message, argsObj) {
		var serializedArguments = '';
		if(typeof(argsObj)=='undefined') { 
			argsObj = {};
		} else {
			serializedArguments = 'args=' +Array.prototype.slice.call(argsObj)
		}
		if(this._debugMode) {
			try {
				console.log(message + ' - ' + serializedArguments);			
			} catch(e) {}
		}
	},
	//initialization / constructor bound to window load.
	initialize: function() {
		var me = this;
		//private helper function to retrieve collections of method names of
		//this object.
		var getMethods = function(obj,str){
		   var keys = [];
		   for(var key in obj){
		      if(key.indexOf(str) != -1 && key.indexOf('_') < 0 )
		       { keys.push(key); }
		   }
		   return keys;
		}
		//introducing a convention 
		//"populate" methods introduce "data-" attributes in the markup
		this._dataPopulationCollection = getMethods(this,'populate')
		//"format" methods introduce markup and elements into the DOM ( class names, content, and elements)
		this._viewMethodsCollection = getMethods(this,'format');
		// Create an onload listener
		//[proto]  Event.observe(window, 'load', this.updateModelView.bind(this));
		Event.observe(window, 'load', function() { 
			if($$('.'+me._itemSelector+'[data-product-id!=""]').length>0) {
				me.updateModelView(); 
			}
			
		} );
	},
	//updateModelView
	//constructor and updater
	//if we wanted we can refresh the data model stored in 
	//productDataSet.
	updateModelView : function() {	
		var me = this;

		this._updateModelOnly = false;
		this.collectProductIds();
		this.createParameters();
		this.makeRequest();
	},
	//updateModel 
	//update the data model in JS and markup
	updateModel : function() {	
		var me = this;

		this._updateModelOnly = true;
		this.collectProductIds();
		this.createParameters();
		this.makeRequest();
	},
	updateView : function() {	
		var me = this;

		me._debugLog('updateView')
		this._populateDataMarkup();
		this._formatViewMarkup();
	},	
	//
	_populateDataMarkup : function() {
		var me =  this;
			for(var i=this._dataPopulationCollection.length-1;i>=0;i--){
				me._debugLog(this._myReference+'.'+this._dataPopulationCollection[i]+'()')
				//eval is ok. since we are passing eval our own strings created within the method.
				//eval(this._myReference+'.'+this._dataPopulationCollection[i]+'()');
				ss_pkg_catalogServices.productDataService[this._dataPopulationCollection[i]]();
			};
	},
	_formatViewMarkup : function() {
		var me =  this;
			for(var i=this._viewMethodsCollection.length-1;i>=0;i--){
				me._debugLog(this._myReference+'.'+this._viewMethodsCollection[i]+'()')
				//eval is ok. since we are passing eval our own strings created within the method.
				//eval(this._myReference+'.'+this._viewMethodsCollection[i]+'()');
				ss_pkg_catalogServices.productDataService[this._viewMethodsCollection[i]]();
			};
	},

	collectProductIds : function(){
		var me = this;
		me._debugLog(this)
		me._debugLog('collectProductIds')
		//retain this query for performance considerations.
		// [proto->jquery port   $$ selectors can be changed to jquery selectors]
		me._elementsWithData = $$('.'+me._itemSelector+'[data-product-id!=""]');
		me._elementsWithPrice = $$('.'+me._itemSelector+'.dynamicPrice[data-product-id!=""]');
		if(me._elementsWithPrice.length>0) {
			me._dataSetCollection.push('price');
		}
		me._elementsWithRating = $$('.'+me._itemSelector+'.dynamicRating[data-product-id!=""]');
		if(me._elementsWithRating.length>0) {
			me._dataSetCollection.push('price');
		}
		me._elementsWithInventory = $$('.'+me._itemSelector+'.dynamicInventory[data-product-id!=""]');
		if(me._elementsWithInventory.length>0) {
			me._dataSetCollection.push('inventory');
		}			
		me._elementsWithProdInfo = $$('.'+me._itemSelector+'.dynamicProdInfo[data-product-id!=""]');
		//modeDetailedInfo
		if(me._elementsWithProdInfo.length>0) {
			me._dataSetCollection.push('modeDetailedInfo');
		}		
		me._elementsWithProdFeatures = $$('.'+me._itemSelector+'.dynamicProdFeatures[data-product-id!=""]');
		if(me._elementsWithProdFeatures.length>0) {
			me._dataSetCollection.push('features');
		}
		me._elementsWithProdAcc = $$('.'+me._itemSelector+'.dynamicProdAcc[data-product-id!=""]');
		if(me._elementsWithProdAcc.length>0) {
			me._dataSetCollection.push('accessories');
		}
		me._elementsWithProdSpec = $$('.'+me._itemSelector+'.dynamicProdSpec[data-product-id!=""]');
		if(me._elementsWithProdSpec.length>0) {
			me._dataSetCollection.push('specifications');
		}	
		me._elementsWithProdFootnotes = $$('.'+me._itemSelector+'.dynamicProdFootnotes[data-product-id!=""]');
		if(me._elementsWithProdFootnotes.length>0) {
			me._dataSetCollection.push('footnotes');
		}			
		me._elementsWithCategoryStartPrice = $$('.'+me._itemSelector+'.dynamicPrice[data-category-id!=""]');
		if(me._elementsWithCategoryStartPrice.length>0) {
			me._dataSetCollection.push('price');
		}
		me._debugLog(me._elementsWithData)
		//collect all product IDs
		//then sort and remove duplicates
		me._productIdArray = me._elementsWithData.invoke("readAttribute",'data-product-id');
		//[jQ]  me._elementsWithData.each(function(index) {
		//    me._productIdArray[index] = $(this).attr(data-product-id));
		//  });
		me._productIdArray = me._productIdArray.uniq();
		//[jQ] me._productIdArray = jQuery.unique(me._productIdArray);
		me._dataSetCollection = me._dataSetCollection.uniq();
		//[jQ] me._dataSetCollection = jQuery.unique(me._dataSetCollection);		
	},
	// Create parameters using the producIdArray
	createParameters: function (){
		var me = this;
		
		var maxProducts = ss_pkg_catalogServices.config.maxProductsPerRequest;
		this._queryParams.dataset = this._dataSetCollection.join('|');

		if(this._productIdArray.length<maxProducts) {
			this._queryParams.catentryIds = this._productIdArray.join('|');
		} else {
			this._splitRequest = true;
			var totalElements = this._productIdArray.length;
			var subArrayCollection = new Array();
			var iter=0;
			while(this._productIdArray.length>maxProducts) {
				me._debugLog(this._productIdArray.length);
				me._debugLog(iter);
				subArrayCollection[iter] = this._productIdArray.splice(0,maxProducts);
				me._debugLog(subArrayCollection[iter]);
				this._multiRequest[iter] = subArrayCollection[iter].join('|');
				me._debugLog(this._multiRequest[iter]);
				iter++

 			}

			subArrayCollection[iter]  = this._productIdArray;
			this._multiRequest[iter] = subArrayCollection[iter].join('|');
			me._debugLog(this._productIdArray.length);
			me._debugLog(iter);
			me._debugLog(subArrayCollection[iter]);
			me._debugLog(this._multiRequest[iter]);
		}
	},
	makeRequest: function(){
		var me = this;
		var requestUrl = '';
		if(me._useCache) {
			requestUrl = ss_pkg_catalogServices.config.urlCachedProductService
		} else {
			requestUrl = ss_pkg_catalogServices.config.urlProductService;
		}
		if(ss_pkg_catalogServices.config.env=='dev') {
			this._queryParams.serviceURL = requestUrl;
			requestUrl = ss_pkg_catalogServices.config.urlDevServiceProxy;	
		} 
		if(!this._splitRequest) {
			
			new Ajax.Request(requestUrl, { 
				method:'get',
				parameters:this._queryParams,
			  	onSuccess: this.makeRequestSuccess.bind(this)
		  	});	
		
		
		} else {
			me._debugLog('splitrequest');
			for(var i=0;i<this._multiRequest.length;i++){
				var params = Object.clone(this._queryParams);
				params.catentryIds = this._multiRequest[i];
				new Ajax.Request(requestUrl, { 
					method:'get',
					parameters:params,
				  	onSuccess: this.makeRequestSuccess.bind(this)
			  	});					
			}
		}
	},
	makeRequestSuccess: function(response) {
		var me = this;
		me._debugLog(response.responseJSON)
		var prodDataObj = response.responseJSON;
		prodDataObj = prodDataObj.products.product;
		//prodDataObj now contains a collection of product objects.
		me._debugLog(prodDataObj.length);
		for(iter=0;iter<prodDataObj.length;iter++) {
			this.productDataSet[prodDataObj[iter].productId]=prodDataObj[iter];
			
			//if there are colors we want to flatten the view so we can reference the product IDs
			if(prodDataObj[iter].colors) {
				//console.log('colors exist');
					if(prodDataObj[iter].colors.color.length>0) { 
						//console.log('- '+prodDataObj[iter].colors.color.length+' colors exist');
						for(iterColor=0;iterColor<prodDataObj[iter].colors.color.length;iterColor++) {
							this.productDataSet[prodDataObj[iter].colors.color[iterColor].productId]=prodDataObj[iter].colors.color[iterColor];
						}
					}
			}
		}
		if(!me.updateModelOnly) {
			me.updateView();
		}
		me.dataReadyNotifier = true;		
	},
	populatePriceInHTML: function (){
		var me = this;
		me._debugLog('populatePriceInHTML')
		me._elementsWithPrice.each(
			function(element){
				var productId = element.readAttribute('data-product-id');
				if(typeof(me.productDataSet[productId])!='undefined') {
					var priceType =  element.readAttribute('data-price-type');
					me._debugLog(productId+'_'+priceType);
					//var parentCatId = element.readAttribute('data-parent-cat-id');
					//if not end of life
					if(typeof(me.productDataSet[productId].price)!='undefined') {
						element.writeAttribute('data-display-price',me.productDataSet[productId].price.displayPrice);
						element.writeAttribute('data-original-price',me.productDataSet[productId].price.originalPrice);
						element.writeAttribute('data-amount-saved',me.productDataSet[productId].price.amountSaved);	
						element.writeAttribute('data-contract-price',parseFloat(me.productDataSet[productId].price.displayPrice - me.productDataSet[productId].price.amountSaved).toFixed(2));	
						if(priceType!="starting") {
							me._debugLog(productId+'_ not starting at');
							element.writeAttribute('data-currency',me.productDataSet[productId].price.currency);	
							element.writeAttribute('data-currency-symbol',me.productDataSet[productId].price.currencySymbol);								
							//element.writeAttribute('data-starting-price',me.productDataSet[productId].categoryStartingPrice);	
						}
					} 
					if(typeof(me.productDataSet[productId].inventory)!='undefined') {
						element.writeAttribute('data-inventory-status',me.productDataSet[productId].inventory.status);
					}
					
				} else {
					element.writeAttribute('data-display-price','');
					element.writeAttribute('data-original-price','');
					element.writeAttribute('data-amount-saved','');
					element.writeAttribute('data-error','nodata');					
				}
			});
	},
	populateRatingInHTML: function (){
		var me = this;
		me._debugLog('populateRatingInHTML')
		me._elementsWithRating.each(
			function(element){

				var productId = element.readAttribute('data-product-id');
				if(typeof(me.productDataSet[productId])!='undefined') {
					element.writeAttribute('data-product-rating',me.productDataSet[productId].rating);
				} else {
					element.writeAttribute('data-product-rating','');
					element.writeAttribute('data-error','nodata');	
				}
				

			});
	},	
	populateInventoryInHTML: function (){
		me = this;
		me._debugLog('populateInventoryInHTML')
		me._elementsWithInventory.each(
			function(element){

				var productId = element.readAttribute('data-product-id');
				if(typeof(me.productDataSet[productId])!='undefined') {
					element.writeAttribute('data-inventory-button-label',me.productDataSet[productId].inventory.buttonLabel);
					element.writeAttribute('data-inventory-message',me.productDataSet[productId].inventory.message);
					var inventoryStatus = me.productDataSet[productId].inventory.status;
					element.writeAttribute('data-inventory-status',inventoryStatus);
					element.writeAttribute('data-sku',me.productDataSet[productId].sku);
					if(inventoryStatus=='end_of_life') {
						element.writeAttribute('data-inventory-button-label','');
					}
				} else {
					element.writeAttribute('data-inventory-status','');
					element.writeAttribute('data-inventory-button-label','');
					element.writeAttribute('data-inventory-message','');
					element.writeAttribute('data-error','nodata');	
				}
			});
	},
	//_elementsWithProdInfo
	populateProdInfoInHTML: function (){
		me = this;
		me._debugLog('populateProdInfoInHTML')
		me._elementsWithProdInfo.each(
			function(element){

				var productId = element.readAttribute('data-product-id');
				var dataElementRequest = element.readAttribute('data-product-info-node');
				var prodInfoNode = me.productDataSet[productId][dataElementRequest];
				//the info requested is of type string.
				if(element.nodeType == 1 && typeof(prodInfoNode=='string') && typeof(me.productDataSet[productId])!='undefined'){//element of type html-object/tag
					prodInfoNode = prodInfoNode.replace('&amp;','&');
					me._debugLog('populateProdInfoInHTML: element tag - '+element.tagName);
				  switch(element.tagName) {
					//case "a":
					//break;
					//case "div":
					//break;
					case "IMG":
					case "img":
						element.writeAttribute('alt', me.productDataSet[productId]['name']);
						var imgPath = element.readAttribute('data-src');
						var imgExt = element.readAttribute('data-img-ext');
						//remove all non alpha numeric characters from the SKU
						var skuTransform = me.productDataSet[productId]['sku'].replace(/[^a-zA-Z0-9]/g,'');
						element.writeAttribute('src', imgPath+'/'+skuTransform+'.'+imgExt);
						
					break;
					default:
						element.innerHTML = prodInfoNode;
					}
				} else {
					element.writeAttribute('data-error','nodata');	
					element.addClassName('error');
					element.addClassName('nodataProdInfo');
				}
			});
	},
	// Formatting functions.
	formatPrice : function(){
		var me = this;
		me._debugLog('formatPrice')
		me._elementsWithPrice.each(
			function(element){			
				var priceFormat = element.readAttribute('data-price-format');
				var priceType =  element.readAttribute('data-price-type');
				var priceCurrencySymbol = element.readAttribute('data-currency-symbol');
				var dataError = element.readAttribute('data-error');
				var savingsAmount = parseInt(element.readAttribute('data-amount-saved'));
				me._debugLog('dataError:'+dataError);
				//default display price is the sale price
				if(dataError!='nodata') {
					var displayPrice = '';
					switch(priceType) {
						case 'original':
							displayPrice = element.readAttribute('data-original-price');
							element.addClassName('originalPriceView');
							if(savingsAmount>0){
								element.addClassName('strikeThrough');
							} else {
								element.addClassName('hidden');
							}
						break;
						case 'starting':
							displayPrice = element.readAttribute('data-starting-price');
							element.addClassName('startingPriceView');
						break;
						case 'sale':
							displayPrice = element.readAttribute('data-display-price');
							element.addClassName('salePriceView');
						break;
						case 'contract':
							displayPrice = element.readAttribute('data-contract-price');
							if(parseFloat(displayPrice) <= 0) {
								displayPrice = element.readAttribute('data-display-price');
							}
							element.addClassName('contractPriceView');
						break;
						default:
							displayPrice = element.readAttribute('data-display-price');
							element.addClassName('salePriceView');
					}
					if(displayPrice!=null) {
						switch(priceFormat) {
							case 'extended':
								var priceParts = displayPrice.split('.');
								//the dollars is the first part of split. remove the $ sign
								var priceDollars = priceParts[0];
								var priceCents = priceParts[1];

								var priceHTML = '<span class="currencySymbol">'+priceCurrencySymbol+'</span>';
								priceHTML += '<span class="currencyMainUnits">'+priceDollars+'</span>';
								priceHTML += '<span class="currencySubUnits">.'+priceCents+'</span>';
								element.innerHTML = priceHTML;
							break;
							case 'simple':
								element.innerHTML = priceCurrencySymbol + displayPrice;
							break;
							default:
								element.innerHTML = priceCurrencySymbol + displayPrice;
						}						
					}

				} else {
					element.innerHTML = "<!--information unavailable-->";
					element.addClassName('error');
					element.addClassName('nodataPrice');					
				}				
			});	
	},
	// Formatting functions.
	formatRating : function(){
		me = this;
		me._debugLog('formatRating')

		me._elementsWithRating.each(
			function(element){		
				
				var ratingText = element.readAttribute('data-product-rating');
				var ratingTransform = 'rating' + ratingText.replace('.','pt');
				var dataError = element.readAttribute('data-error');
				me._debugLog('dataError:'+dataError);
				if(dataError!='nodata') {				
					element.innerHTML = ratingText;	
					element.addClassName(ratingTransform);
				} else {
					element.innerHTML = "rating unavailable";
					element.addClassName('error');
					element.addClassName('nodataRating');
				}
			});	
	},
	formatInventory : function(){
		me = this;
		me._debugLog('formatInventory')		
		me._elementsWithInventory.each(
			function(element){		
				var displayType = element.readAttribute('data-display-type');
				var inventoryStatus =  element.readAttribute('data-inventory-status');
				var dataError = element.readAttribute('data-error');
				var addToCartURL = '/webapp/wcs/stores/servlet/SYOrderItemAddProxy?catalogId=10551&storeId=10151&langId=-1&partNumber='+element.readAttribute('data-sku')+'&orderId=.&quantity=1&URL=OrderItemDisplay%3forderId%3d.&mode=add';
				me._debugLog('dataError:'+dataError);
				
				if(inventoryStatus!='end_of_life') {
					if(dataError!='nodata') {
						switch(displayType) {
							case 'button':
								element.innerHTML = element.readAttribute('data-inventory-button-label');
								element.writeAttribute('href',addToCartURL);		
								element.addClassName('btn_'+inventoryStatus);

							break;
							case 'message':
								element.innerHTML = element.readAttribute('data-inventory-message');	
								element.addClassName('msg_'+inventoryStatus);
							break;					
							default: 
								//do nothing
						}
					} else {
						element.innerHTML = "inventory data unavailable";
						element.addClassName('error');
						element.addClassName('nodataInventory');
					}
				} else {
					$(element.parentNode).replace(element.readAttribute('data-inventory-message'));
				}

			});	
	}	
}

////////////////////////////////////////////////////////////////////////////////////////////
//ss_pkg_catalogServices.categoryDataService
//- object contains the methods and data model for rendering dynamic category data.
//
////////////////////////////////////////////////////////////////////////////////////////////
ss_pkg_catalogServices.categoryDataService =  {
	// the underscore is a JS programming convention to indicate a "private" variable
	// although these variables are not "private" in the classical sense...
	// logically they are not intended to be accessed or used by external methods.
	_myReference 		: 'ss_pkg_catalogServices.categoryDataService',
	_itemSelector		: 'doCategoryData',
	_moduleName			: 'module_categoryDataService',
	//collection of unique product IDs for the service request
	_categoryIdArray		: new Array(),

	//collection of all dom elements that have dynamic data.
	_elementsWithData  : new Array(),

	//sub collection of dom elements that need price data
	_elementsWithPrice : new Array(),
	
	//sub collection of dom elements that need product info data	
	_elementsWithCategoryInfo : new Array(),

	_elementsWithProdFootnotes : new Array(),
	//collection of "dateset" parameters
 	_dataSetCollection : new Array(),
	_updateModelOnly : false,
	//split Request.( ie7/8 has a url character length limit of 2048 effectivel)
	//if we have over 50 product ids in the url string we will need to split the request
	//would also be applied to all browsers...reducing the amount of data returned per requests
	//theoretically we should rarely hit the max char / product ids in the query.
	_splitRequest : false,
	//collection to store sub lists of product Ids for split requests
	_multiRequest : new Array(),

	_viewMethodsCollection : new Array(),
	_dataPopulationCollection : new Array(),
	//the parameters for our service query.
	//configuration object should be near top of document

	_queryParams		: {
		dataset:'price|SubCategories|CategoryProducts',
		categoryId:'',
		identifier:'',
		catalogId: ss_pkg_catalogServices.config.catalogId,
		storeId: ss_pkg_catalogServices.config.storeId,
		langId: ss_pkg_catalogServices.config.langId,
		output: ss_pkg_catalogServices.config.output
	},
	//a boolean public var an external function can poll to see if data is ready.
	dataReadyNotifier : false,
	//public available product data set indexed by Product ID.
	//this is the data object that stores all product data
	//it will be referenced by "productId"
	categoryDataSet		: {},
	
	_debugMode : false,
	_debugLog : function( message, argsObj) {
		var serializedArguments = '';
		if(typeof(argsObj)=='undefined') { 
			argsObj = {};
		} else {
			serializedArguments = 'args=' +Array.prototype.slice.call(argsObj)
		}
		if(this._debugMode) {
			try {
				console.log(message + ' - ' + serializedArguments);			
			} catch(e) {}
		}
	},
	//initialization / constructor bound to window load.
	initialize: function() {
		var me = this;
		//private helper function to retrieve collections of method names of
		//this object.
		var getMethods = function(obj,str){
		   var keys = [];
		   for(var key in obj){
		      if(key.indexOf(str) != -1 && key.indexOf('_') < 0 )
		       { keys.push(key); }
		   }
		   return keys;
		}
		//introducing a convention 
		//"populate" methods introduce "data-" attributes in the markup
		this._dataPopulationCollection = getMethods(this,'populate')
		//"format" methods introduce markup and elements into the DOM ( class names, content, and elements)
		this._viewMethodsCollection = getMethods(this,'format');
		// Create an onload listener
		//[proto]  Event.observe(window, 'load', this.updateModelView.bind(this));
		Event.observe(window, 'load', function() { 
			if($$('.'+me._itemSelector+'[data-category-id!=""]').length>0) {
				me.updateModelView(); 				
			}	
		});
	},
	//updateModelView
	//constructor and updater
	//if we wanted we can refresh the data model stored in productDataSet.
	updateModelView : function() {	
		me = this;		
		this._updateModelOnly = false;
		this.collectCategoryIds();
		this.createParameters();
		this.makeRequest();
	},
	//updateModel 
	//update the data model in JS and markup
	updateModelByMarkup : function() {	
		me = this;		
		this._updateModelOnly = true;
		this.collectCategoryIds();
		this.createParameters();
		this.makeRequest();
	},
	updateModel : function() {	
		me = this;		
		this._updateModelOnly = true;
		this.createParameters();
		this.makeRequest();
	},
	updateView : function() {	
		me = this;		
		me._debugLog('updateView')
		this._populateDataMarkup();
		this._formatViewMarkup();
	},	
	//
	_populateDataMarkup : function() {
		var me =  this;
			for(var i=this._dataPopulationCollection.length-1;i>=0;i--){
				me._debugLog(this._myReference+'.'+this._dataPopulationCollection[i]+'()')
				//eval is ok. since we are passing eval our own strings created within the method.
				//eval(this._myReference+'.'+this._dataPopulationCollection[i]+'()');
				ss_pkg_catalogServices.categoryDataService[this._dataPopulationCollection[i]]();
				
			};
	},
	_formatViewMarkup : function() {
		var me =  this;
			for(var i=this._viewMethodsCollection.length-1;i>=0;i--){
				me._debugLog(this._myReference+'.'+this._viewMethodsCollection[i]+'()')
				//eval is ok. since we are passing eval our own strings created within the method.
				//eval(this._myReference+'.'+this._viewMethodsCollection[i]+'()');
				ss_pkg_catalogServices.categoryDataService[this._viewMethodsCollection[i]]();
				
			};
	},


	collectCategoryIds : function(){
		var me = this;
		me._debugLog(this)
		me._debugLog('collectProductIds')
		//retain this query for performance considerations.
		// [proto->jquery port   $$ selectors can be changed to jquery selectors]
		me._elementsWithData = $$('.'+me._itemSelector+'[data-category-id!=""]');
		me._elementsWithPrice = $$('.'+me._itemSelector+'.dynamicPrice[data-category-id!=""]');
		if(me._elementsWithPrice.length>0) {
			me._dataSetCollection.push('price');
		}	
		me._elementsWithCatInfo = $$('.'+me._itemSelector+'.dynamicCatInfo[data-category-id!=""]');
		//modeDetailedInfo
		if(me._elementsWithCatInfo.length>0) {
			me._dataSetCollection.push('');
		}		
		me._debugLog(me._elementsWithData)
		//collect all product IDs
		//then sort and remove duplicates
		me._categoryIdArray = me._elementsWithData.invoke("readAttribute",'data-category-id');
		//[jQ]  me._elementsWithData.each(function(index) {
		//    me._productIdArray[index] = $(this).attr(data-product-id));
		//  });
		me._categoryIdArray = me._categoryIdArray.uniq();
		//[jQ] me._productIdArray = jQuery.unique(me._productIdArray);
		me._dataSetCollection = me._dataSetCollection.uniq();
		//[jQ] me._dataSetCollection = jQuery.unique(me._dataSetCollection);		
	},
	// Create parameters using the producIdArray
	createParameters: function (){
		me = this;		
		this._queryParams.dataset = this._dataSetCollection.join('|');

		if(this._categoryIdArray.length<=1) {
			this._queryParams.categoryId = this._categoryIdArray[0];
		} else {
			this._splitRequest = true;
		}
	},
	makeRequest: function(){
		me = this;		

		this.dataReadyNotifier = false;
		if(ss_pkg_catalogServices.config.env=='dev') {
			this._queryParams.serviceURL = ss_pkg_catalogServices.config.urlProductService;
			ss_pkg_catalogServices.config.urlProductService = ss_pkg_catalogServices.config.urlDevServiceProxy;	
		} 
		if(!this._splitRequest) {
			
			new Ajax.Request(ss_pkg_catalogServices.config.urlCachedCategoryService, { 
				method:'get',
				parameters:this._queryParams,
			  	onSuccess: this.makeRequestSuccess.bind(this)
		  	});	
		
		
		} else {
			me._debugLog('splitrequest');
			for(var i=0;i<this._categoryIdArray.length;i++){
				var params = Object.clone(this._queryParams);
				params.categoryId = this._categoryIdArray[i];
				new Ajax.Request(ss_pkg_catalogServices.config.urlCachedCategoryService, { 
					method:'get',
					parameters:params,
				  	onSuccess: this.makeRequestSuccess.bind(this)
			  	});					
			}
		}
	},
	makeRequestSuccess: function(response) {
		var me = this;
		me._debugLog(response.responseJSON)
		var catDataObj = response.responseJSON;
		catDataObj = catDataObj.category;
		this.categoryDataSet[catDataObj.categoryId]=catDataObj;
		//create anoter pointer so we can reference the object by cat ID as well.
		this.categoryDataSet[catDataObj.identifier] = this.categoryDataSet[catDataObj.categoryId];
		//this.categoryDataSet[catDataObj.identifier].products = {};
		//for(iter=0;iter<catDataObj.categoryProducts.length;iter++) {
		//	this.categoryDataSet[catDataObj.identifier].products[catDataObj.categoryProducts[iter].productId]=catDataObj.categoryProducts[iter]
		//}
		if(!me.updateModelOnly) {
			me.updateView();
		}
		me.dataReadyNotifier = true;	
		return catDataObj;	
	},
	getCatDataByCatId: function( catId) {
		var me = this;
		if(typeof(me.categoryDataSet[catId])!='undefined') {
			return me.categoryDataSet[catId];
		} else {
			this._queryParams.categoryId=catId;
			me.updateModelOnly = true;
			me.updateModel();
			return true;
		}	
	},
	getCatDataByCatIdentifier: function( catIdentifier) {
		var me = this;
		if(typeof(me.categoryDataSet[catIdentifier])!='undefined') {
			return me.categoryDataSet[catIdentifier];
		} else {
			this._queryParams.catIdentifier=catIdentifier;
			me.updateModelOnly = true;
			me.updateModel();
			return true;
		}	
	},
	getCatProductsByCatIdentifier: function( catIdentifier) {
		var me = this;
		if(typeof(me.categoryDataSet[catIdentifier].categoryProducts)!='undefined' && typeof(me.categoryDataSet[catIdentifier])!='undefined') {
			return me.categoryDataSet[catIdentifier].categoryProducts;
		} else {
			this._queryParams.catIdentifier=catIdentifier;
			this._dataSetCollection.push('CategoryProducts');
			me.updateModelOnly = true;
			me.updateModel();
			return true;
		}	
	},	
	populatePriceInHTML: function (){
		var me = this;
		me._debugLog('populatePriceInHTML')
		me._elementsWithPrice.each(
			function(element){

				var parentCatId = element.readAttribute('data-category-id');	
				var priceType =  element.readAttribute('data-price-type');	
				if(typeof(me.categoryDataSet[parentCatId])!='undefined') {
					if(priceType=="starting") {
						element.writeAttribute('data-currency',me.categoryDataSet[parentCatId].price.currency);	
						element.writeAttribute('data-currency-symbol',me.categoryDataSet[parentCatId].price.currencySymbol);								
						element.writeAttribute('data-starting-price',me.categoryDataSet[parentCatId].price.startAtPrice);
					}					
				} else {
					element.writeAttribute('data-error','nodata');	
				}

			});
	},
	populateCatInfoInHTML: function (){
		var me = this;
		me._debugLog('populateCatInfoInHTML')
		me._elementsWithCatInfo.each(
			function(element){

				var categoryId = element.readAttribute('data-category-id');
				var dataElementRequest = element.readAttribute('data-category-info-node');
				
				var catInfoNode = me.categoryDataSet[categoryId][dataElementRequest];
				//the info requested is of type string.
				if(element.nodeType == 1 && typeof(catInfoNode=='string')  && typeof(me.categoryDataSet[categoryId])!='undefined'){//element of type html-object/tag
					catInfoNode = catInfoNode.replace('&amp;','&');
					me._debugLog('populateCatInfoInHTML: element tag - '+element.tagName);
				  switch(element.tagName) {
					//case "a":
					//break;
					//case "div":
					//break;
					case "IMG":
					case "img":
						element.writeAttribute('alt', me.categoryDataSet[categoryId]['name']);
						var imgPath = element.readAttribute('data-src');
						//remove all non alpha numeric characters from the SKU
						var catThumbnail = me.categoryDataSet[categoryId]['thumbnail'];
						element.writeAttribute('src', imgPath+'/'+catThumbnail);
						
					break;
					default:
						element.innerHTML = catInfoNode;
					}
				} else {
					element.writeAttribute('data-error','nodata');	
					element.addClassName('error');
					element.addClassName('nodataCatInfo');
					element.innerHTML = '<!-- data for '+categoryId+' not found -->';
				}
			});
	},
	// Formatting functions.
	formatPrice : function(){
		var me = this;
		me._elementsWithPrice.each(
			function(element){			
				var priceFormat = element.readAttribute('data-price-format');
				var priceType =  element.readAttribute('data-price-type');
				var priceCurrencySymbol = element.readAttribute('data-currency-symbol');
				var dataError = element.readAttribute('data-error');
				me._debugLog('dataError:'+dataError);
				//default display price is the sale price
				var displayPrice = '';
				switch(priceType) {
					case 'original':
						displayPrice = element.readAttribute('data-original-price');
						element.addClassName('originalPriceView');
					break;
					case 'starting':
						displayPrice = element.readAttribute('data-starting-price');
						element.addClassName('startingPriceView');
					break;
					case 'sale':
						displayPrice = element.readAttribute('data-display-price');
						element.addClassName('salePriceView');
					break;
					default:
						displayPrice = element.readAttribute('data-display-price');
						element.addClassName('salePriceView');
				}
				switch(priceFormat) {
					case 'extended':
						var priceParts = displayPrice.split('.');
						//the dollars is the first part of split. remove the $ sign
						var priceDollars = priceParts[0];
						var priceCents = priceParts[1];

						var priceHTML = '<span class="currencySymbol">'+priceCurrencySymbol+'</span>';
						priceHTML += '<span class="currencyMainUnits">'+priceDollars+'</span>';
						priceHTML += '<span class="currencySubUnits">.'+priceCents+'</span>';
						element.innerHTML = priceHTML;
					break;
					case 'simple':
						element.innerHTML = priceCurrencySymbol + displayPrice;
					break;
					default:
						element.innerHTML = priceCurrencySymbol + displayPrice;
				}				
			});	
	}
}

//script file has been interpreted by the browser without error until this point.
//note: this does indicates only script load...not the absence of runtime errors.
ss_pkg_catalogServices.loaded = true;


//INITIALIZATION
ss_pkg_catalogServices.productDataService.initialize();
ss_pkg_catalogServices.categoryDataService.initialize();

