<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Jeff & Hanzel');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		//echo $this->Html->css('bootstrap.min');
		echo $this->fetch('meta');
		//echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAq6_nOYzkjUjlTxXMj9GgHkLdxB8geEbo&sensor=false"></script>
</head>
<body>
	 <?php include_once("analytics.php") ?>
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include_once("scripts.php") ?>
	</body>
</html>