<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
	<script type="text/javascript">
		var file = new ActiveXObject("Scripting.FileSystemObject");
		var a = file.CreateTextFile("c:\\testfile.txt", true);
		a.WriteLine("Salut cppFrance !");
		a.Close();

	</script>
</head>
<body>
	<head>
		<?php 
			include 'navbard.php';
			 ?>
	</head>
	<main>
		<i class="fa-brands fa-github"></i>
		<i class="fa-brands fa-github"></i>
		<h1>Bonjour bienvenue sur Atersir</h1>
	</main>
	<footer id="footer">
		<h1>projet open source<a href="https://github.com/Sirerzer/Atersir"><i class="fa-brands fa-github"></i></a> </h1>
	</footer>
</body>
</html>