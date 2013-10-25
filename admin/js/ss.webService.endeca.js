// Endeca Webservice accessor
// Requires: ss.core.js

var loaded = loaded || {};

if (loaded['core']  && !loaded['endeca']) {

    var ssEnd = sonyStore.webService.endeca = (function(){
        var endecaObj = {};

        // Private Members
        var name = 'endeca', cid = '', cn = '', ciden = '', gp = sonyStore.utilities.getURLParameter,

        debug = function (m){try{console.log(m)}catch(e){}},

        getJSON = function(handler){
            var endecaParams = {
                storeId: gp('storeId'),
                langId: gp('langId'),
                catalogId: gp('catalogId'),
                output: 'json'//,
                //dataset: 'SubCategories|CategoryProducts|Price'
            },
                testN = gp('N') || '',
                testId = (cid || gp('categoryId')) || '',
                testIdentifier = gp('identifier') || '';

            if(testN != '') {
                endecaParams.N = testN;
            } else if (testId != '') {
                endecaParams.categoryId = testId;
            } else if (testIdentifier != '') {
                endecaParams.identifier = testIdentifier;
            } else {
                try{console.log('Missing pertinent information, facet building failure.')}catch(e){}
            }

            sonyStore.webService.ajax.sendRequest('/webapp/wcs/stores/servlet/SYGetCategoryServiceExt', endecaParams, 'json', handler, handler, 'GET');
        },

        processJSON = function(data){
            console.log(data)
        },

        serviceFailure = function(data){

        };
        // End private

        // Public Members
        endecaObj.initialize = function () {};
        endecaObj.getName = function () {return name};
        endecaObj.setId = function(newId) {cid = newId};
        endecaObj.setN = function(newN) {cn = newN};
        endecaObj.setIdentifier = function(newIdentifier) {ciden = newIdentifier};
        endecaObj.requestEndecaInformation = function (handler){
            getJSON(handler);
        };

        // End public

        loaded['endeca'] = true;
        return endecaObj;
    })();

    ssEnd.initialize();

} else if (loaded['core']) {
    try{console.log('Endeca Webservice javascript on page twice.')}catch(e){}
} else {try{console.log('Core not loaded.')}catch(e){}}
