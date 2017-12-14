<?php 
	$this->load->helper('url');
	$url = base_url();
	$dir = $this->router->directory;
	$router = $this->router->fetch_class();
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title ?></title>
	<link rel="shortcut icon" href="<?php echo $url; ?>skin/images/logo.png" type="image/x-icon">
	<!-- Css -->
	<link href="<?php echo $url; ?>skin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $url; ?>skin/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet">
	<link href="<?php echo $url; ?>skin/bootstrap/css/bootstrap-reboot.min.css" rel="stylesheet">
	<link href="<?php echo $url; ?>skin/css/styles.css" rel="stylesheet">
	<?php if($dir == 'adminhtml/' || $router == 'admin'): ?>
	<link href="<?php echo $url; ?>skin/css/styles_admin.css" rel="stylesheet">
	<?php endif ?>
	<!-- Js -->
	<script src="<?php echo $url; ?>skin/js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo $url; ?>skin/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo $url; ?>skin/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo $url; ?>skin/fontawesome/js/fontawesome-all.min.js"></script>
	<script src="<?php echo $url; ?>skin/js/custom.js"></script>
</head>