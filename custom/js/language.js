function initChangeLanguage(){
	var getUrl = document.location.href;
	var baseUrl =  getUrl.split('?');
	if(baseUrl[1]=='lang=fr_FR'){
		var lang = 'fr_FR';
		document.getElementById("trp-floater-ls-current-language").innerHTML ='<a href="javascript:changeLanguage(\'?lang=en_USA\');"class="trp-floater-ls-disabled-language trp-ls-disabled-language"> <img class="trp-flag-image" src="assests/images/lang/'+lang+'.png" width="18" height="12" alt="en_GB" title="French"> Français </a>';
	}
	if(baseUrl[1]=='lang=en_GB'){
		var lang = 'en_GB';
		document.getElementById("trp-floater-ls-current-language").innerHTML ='<a href="javascript:changeLanguage(\'?lang=en_USA\');"class="trp-floater-ls-disabled-language trp-ls-disabled-language"> <img class="trp-flag-image" src="assests/images/lang/'+lang+'.png" width="18" height="12" alt="en_GB" title="English"> English</a>';
	}
	if(baseUrl[1]=='lang=ar_Mo'){
		var lang = 'ar_Mo';
		document.getElementById("trp-floater-ls-current-language").innerHTML ='<a href="javascript:changeLanguage(\'?lang=en_USA\');"class="trp-floater-ls-disabled-language trp-ls-disabled-language"> <img class="trp-flag-image" src="assests/images/lang/'+lang+'.png" width="18" height="12" alt="en_GB" title="العربية"> العربية</a>';
	}
}

function changeLanguage(parm){
	var getUrl = document.location.href;
	var baseUrl =  getUrl.split('?');
	var url = baseUrl[0]+parm;
    document.location = url;
}