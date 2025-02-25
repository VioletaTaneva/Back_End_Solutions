<?php

$seconds = 221108521;

$seconds_per_minute = 60;
$seconds_per_hour =  60 * $seconds_per_minute;
$seconds_per_day = 24 * $seconds_per_hour;
$seconds_per_week = 7 * $seconds_per_day;
$seconds_per_month = 31 * $seconds_per_day;
$seconds_per_year = 365 * $seconds_per_day;

$minutes = floor($seconds / $seconds_per_minute);
$hours = floor($seconds / $seconds_per_hour);
$days = floor($seconds / $seconds_per_day); 
$weeks = floor($seconds / $seconds_per_week);
$months = floor($seconds / $seconds_per_month);
$years = floor($seconds / $seconds_per_year);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/global.css">
	<link rel="stylesheet" type="text/css" href="/css/directory.css">
	<link rel="stylesheet" type="text/css" href="/css/facade.css">
	<title>Time Conversion</title>
</head>
<body>

	<h1>Time Conversion for <?php echo $seconds; ?> seconds</h1>
	<p>Years: <?php echo $years; ?></p>
	<p>Months: <?php echo $months; ?></p>
	<p>Weeks: <?php echo $weeks; ?></p>
	<p>Days: <?php echo $days; ?></p>
	<p>Hours: <?php echo $hours; ?></p>
	<p>Minutes: <?php echo $minutes; ?></p>
</body>
</html>