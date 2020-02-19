window.onload = function() {
	document.querySelector('#shop_ip1').onclick = function(){
		ajaxGet();
	}
}

function ajaxGet(){
	var request = new XMLHttpRequest();

	request.onreadystatechange = function(){
		if(request.redyState != 2){
			document.querySelector('#myip1').innerHTML = request.responseText;
		}
	}

	request.open('GET', 'ip1.php');
	request.send();
}