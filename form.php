<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User registration form from .json</title>
</head>
<body>

	<?php

		include("func.php");
		$json = file_get_contents("data.json");
		makeForm($json);

	?>

</body>
</html>
