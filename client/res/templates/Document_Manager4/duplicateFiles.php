<?php
	//echo "IN DUPLICATE FILES PAGE";
	echo "<br>";
	echo "<h3>".$_GET['fileName']. ": File already Exist in database.</h3>";
	echo "<br>";
?>
<DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<script>
			function redirectPageForOk(){
				alert("HII You have click on OK");
				window.location();
				
			}
			function redirectPageForCancle(){
				alert("HII You have click on Cancle");
			}
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2">Do you want to rename.</td>
			</tr>
			<tr>
				<td>
					<button id="ok" onclick="redirectPageForOk()">OK</button>
				</td>
				<td>
					<button id="cancle" onclick="redirectPageForCancle()">Cancle</button>
				</td>
			</tr>
		</table>
	</body>
</html>