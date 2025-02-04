window.onload = initAll;  //On page load the onclick event is set to call the function
var xhr = false;

function initAll() {
	document.getElementById("makeTextRequest").onclick = getNewFile;
	document.getElementById("makeXMLRequest").onclick = getNewFile;
}

function getNewFile() {
	makeRequest(this.href);
	return false;
}

function makeRequest(url) {
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {
				
			}
		}
	}
	if (xhr) {
		xhr.onreadystatechange = showContents;
		xhr.open("GET", url, true);
		xhr.send(null);
	} else {
		document.getElementById("updateArea").innerHTML = "Sorry, but I couldn't create an XMLHttpRequest";
	}
}

function showContents() {
	if (xhr.readyState == 4) {
		if (xhr.status == 200) {
			var outMsg = (xhr.responseXML && xhr.responseXML.contentType == "text/xml") ? xhr.responseXML.getElementsByTagName("choices")[0].textContent : xhr.responseText;
		} else {
			var outMsg = "There was a problem with the request " + xhr.status;
		}
		document.getElementById("updateArea").innerHTML = outMsg;
	}
}