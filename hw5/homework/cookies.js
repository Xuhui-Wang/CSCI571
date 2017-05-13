function setCookie(name, value, expireDate)
{
  
  var expString = ""; 

  if (expireDate != null)
  { 
    expString = ";expires=" + expireDate.toGMTString();
  } 

  document.cookie = escape(name) + "=" + escape(value) + expString + ";"; 
}

function getCookie(name)
{ 
  var item = unescape(name) + "="; 

  if (document.cookie.length > 0)
  { 
     posit = document.cookie.indexOf(item);

     if (posit != -1)
     { 
		posit = posit + item.length; 
		last = document.cookie.indexOf(";", posit) 

        if (last == -1) 
	        last = document.cookie.length;
//		alert(document.cookie);
        return unescape(document.cookie.substring(posit,last)); 

     }
  }
}

function removeCookie(name)
{ 
  var date = new Date(90,1,1);
  var expString = "; expires=" + date.toGMTString(); 
  document.cookie = escape(name) + "=" + expString + ";";
}
