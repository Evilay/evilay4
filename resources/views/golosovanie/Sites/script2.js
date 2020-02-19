window.onload = function() {
	document.querySelector('#shop_ip2').onclick = function(){
		ajaxGet();
	}
}

function ajaxGet(){
	var request = new XMLHttpRequest();

	request.onreadystatechange = function(){
		if(request.redyState != 2){
			document.querySelector('#myip2').innerHTML = request.responseText;
		}
	}

	request.open('GET', 'ip2.php');
	request.send();
}