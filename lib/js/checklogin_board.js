var TPRUserID = readCookie('TPRuserid');
	if(TPRUserID===null){
		window.location.replace('login.html'); 
	} else { 
		var TPRUserID = readCookie('TPRuserid'); 
	}
var TPRUserLevel = readCookie('TPRuserlevel');
	if(TPRUserLevel===null) { 
		window.location.replace('login.html'); 
	} else { 
		var TPRUserLevel = readCookie('TPRuserlevel'); 

		if(TPRUserLevel<5){
			window.location.replace('unauthorised.php');
		}
	}
var TPRUserName = readCookie('TPRusername');
	if(TPRUserName===null) { 
		window.location.replace('login.html'); 
	} else { 
		var TPRUserName = readCookie('TPRusername'); 
	}
