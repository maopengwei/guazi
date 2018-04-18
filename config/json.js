function getAuth(url, username, password) {
    var CryptoJs = require("crypto-js");
    if (!password && !store.get("user")) { 
    	return null 
    }
    var iv = CryptoJs.enc.Latin1.parse('O2%=!ExPCuY6SKX(');
    var key = CryptoJs.enc.Latin1.parse(
    		password ? HmacMD5(password, password).toString() : store.get("user").password
    	);
    var pass = AES.encrypt(
    		url + ":" + new Date().getTime(), key, { 
    			iv: iv, 
    			mode: CryptoJs.mode.CBC, 
    			padding: CryptoJs.pad.ZeroPadding 
    		}).toString();
    return (username ? username : store.get("user").username) + ":" + pass;
}