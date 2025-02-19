<?php
	$Name = 'Violeta';
	$Last_name = 'Taneva';
	$FullName = $Name . ' ' . $Last_name;

?>

<!DOCTYPE html>
<mtml>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/global.css">
	<link rel="stylesheet" type="text/css" href="/css/directory.css">
	<link rel="stylesheet" type="text/css" href="/css/facade.css">
</head>

<body>

	<h1> <?php echo $FullName; ?></h1>
    <p>Character count: <?php echo strlen($FullName); ?></p>

	 

</body>
</html>