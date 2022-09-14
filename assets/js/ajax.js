var xmlHttp = false;

function createXmlHttpRequest() {
	var xmlHttp = false;
	if (window.ActivateXObject) {
		xmlHttp = new ActivateXObject("Microsoft.XMLHTTP");
	} else {
		xmlHttp = new XMLHttpRequest();
	}
	if(!xmlHttp) {
		alert("Gagal Menciptakan objek");
	}
	return xmlHttp;
}

function search() {
	xmlHttp = createXmlHttpRequest();

	if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0) {
		var k = document.getElementById('q').value;
	
		var url = 'search.php';
		url = url + "?q=" + k;
		xmlHttp.onreadystatechange = handleRespon;
		xmlHttp.open("GET", url, true);
		xmlHttp.send(null);
	} else {
		setTimeout('search()', 1000);
	}
}

function handleRespon() {
	if(xmlHttp.readyState == 4) {
		if(xmlHttp.status == 200) {
			document.getElementById('tampil').innerHTML = xmlHttp.responseText;
			setTimeout('search()', 1000);
		} else {
			alert("Error: " + xmlHttp.statusText);
		}
	}
}