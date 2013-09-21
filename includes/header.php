<?php 
	require_once 'includes/variables.php';
	require_once 'includes/functions.php';
	mb_internal_encoding("UTF-8");
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="css/style.css" />
		<!--<script type="text/javascript" src="js/ui.js"></script>-->
	</head>
	<body>
		<header id="page-header">
			<h1>Welcome to <?php echo $title; ?></h1>
		</header>