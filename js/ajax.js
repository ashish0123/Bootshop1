function insert(){
   if(window.XMLHttpRequest){
	   xmlhttp = new XMLHttpRequest();
   }else{
	   xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
   }
   
   xmlhttp.onreadystatechange = function(){
	   if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		   document.getElementById('results').innerHTML = xmlhttp.responseText;
	   }
   }
   
   parameters = 'url='+document.getElementById('text').value;
   xmlhttp.open('POST', 'Insert.php', true);
   xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
   xmlhttp.send(parameters);
   
}