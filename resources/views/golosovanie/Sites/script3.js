window.onload = function() {
	document.querySelector('#shop_ip3').onclick = function(){
		ajaxGet();
	}
}

function ajaxGet(){
	var request = new XMLHttpRequest();

	request.onreadystatechange = function(){
		if(request.redyState != 2){
			document.querySelector('#myip3').innerHTML = request.responseText;
		}
	}

	request.open('GET', 'ip3.php');
	request.send();
}