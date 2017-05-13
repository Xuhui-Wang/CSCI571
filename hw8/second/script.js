window.onload = initAll;
var xhr = false;

function initAll() {
	if (window.XMLHttpRequest) {
		xhr = new window.XMLHttpRequest();
	} else {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			} catch(e) {
				
			}
		}
	}
	if (xhr) {
		xhr.onreadystatechange = showPictures;
		xhr.open("GET", "flickrfeed.xml", true);
		xhr.send();
	} else {
		alert("Sorry, but I couldn't create an XMLHttpRequest");
	}
}

function showPictures() {
	var tempDiv = document.createElement("div");
	var pageDiv = document.getElementById("pictureBar");
			
	if (xhr.readyState == 4) {
		if (xhr.status == 200) {
			tempDiv.innerHTML = xhr.responseText;
			var allLinks = tempDiv.getElementsByTagName("a");
			
			for (var i = 1; i < allLinks.length; i+=2) {
				pageDiv.appendChild(allLinks[i].cloneNode(true));
			}
		}
		else {
			alert("There was a problem with the request " + xhr.status);
		}
	}
}