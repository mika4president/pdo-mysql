<!DOCTYPE html>
<html>
<body>

<h2>Use the XMLHttpRequest to get the content of a file.</h2>
<p>The content is written in JSON format, and can easily be converted into a JavaScript object.</p>

<p id="demo"></p>

<script>

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
		console.log(myObj);
		for(var i in myObj){
			document.getElementById('output').innerHTML+='Deze wookiebookie heet: '+myObj[i]['name']+'<br>';
		}
		console.log('of ik haal hem los op: '+myObj['key1']['name']);
    }
};
xmlhttp.open("GET", "data.txt", true);
xmlhttp.send();

</script>

<div id='output'></div>

</body>
</html>

<?php
$new=array();
$new['key1']=array('name'=>'Michel', 'skill'=>'9.5');
$new['key2']=array('name'=>'Remi', 'skill'=>'11');
$out=json_encode($new);
$fp = fopen('data.txt', 'w');
fwrite($fp, $out);
fclose($fp);