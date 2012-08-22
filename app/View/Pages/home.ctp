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
 * @package       Cake.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
if (Configure::read('debug') == 0):
	throw new NotFoundException();
endif;
App::uses('Debugger', 'Utility');

$settings = Cache::settings();

$filePresent = null;
if (file_exists(APP . 'Config' . DS . 'database.php')):
	$filePresent = true;
endif;

if (isset($filePresent)):
	App::uses('ConnectionManager', 'Model');
	try {
		$connected = ConnectionManager::getDataSource('default');
	} catch (Exception $connectionError) {
		$connected = false;
	}

	if ($connected && $connected->isConnected()):
		// get all data in this section
	else:
		echo '<span class="notice">';
			echo __d('cake_dev', 'Cake is NOT able to connect to the database.');
			echo '<br /><br />';
			echo $connectionError->getMessage();
		echo '</span>';
	endif;
endif;
?>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner" style="background-color: #66CCCC;opacity: 0.90;">
			<div class="container" style="font-size: 16px; color: #fff;">
				<div class="nav-collapse">
					<ul class="nav" style="font-family: 'MillerTextOT-RgIt', Helvetica, sans-serif; font-weight: bold;">
						<li class="active"><a href="#" class="home">Home</a></li>
						<li><a href="#" class="registry">Bridal Registry</a></li>
						<li><a href="#" class="entourage">Entourage</a></li>
						<li><a href="#" class="gallery">Gallery</a></li>
					</ul>
				</div><!--/.nav-collapse -->
				<div style="text-align: right;">
					<p id="countDown" style="padding: 16px 10px 14px;line-height: 19px; margin:0px;"></p>
				</div>
			</div>
		</div>
	</div>
	<div class="container" style="font-size: 14px;color: #636364;text-shadow: 0px 1px 0px #fff;">
		<!-- Home -->
		<div id="home">
			<div class="hero-unit">
				<h1>We've decided to make it official!</h1>
				<h2>We're going to tell the world that we love, honor and cherish each other.</h2>
				<h3>We're inviting you to share the beginning of our new life together as we exchange vows.</h3>
				<p style="font-size: 18px">&nbsp;</p>
			</div>

			<div class="row">
				<div class="span4">
					<h2 class='article-title'>Our Story</h2>
					<p>history......</p>
					<p><a class="btn btn-primary" href="#">Read more &raquo;</a></p>
				</div>
				<div class="span4">
					<h2 class='article-title'>Church</h2>
					<p>
						Date: September 08, 2012 - 3:30PM <br/>
						Church: Archdiocesan Shrine of Our Lady of Guadalupe <br/>
						Address: Vicente Rama Avenue, Guadalupe, Cebu City <br/>
						Attire: Aqua Blue 
					</p>
					<p><a class="btn btn-primary" data-toggle="modal" href="#location">View location &raquo;</a></p>
				</div>
				<div class="span4">
					<h2 class='article-title'>Reception</h2>
					<p>Venue: Cebu Business Hotel <br/> Address: F&C Square, Colon corner Junquera Streets, Cebu City</p>
					<p><a class="btn btn-primary" data-toggle="modal" href="#reception">View location &raquo;</a></p>
				</div>
			</div>
		</div>
		
		<div id="location" class="modal hide fade">
			<div class="modal-body">
				<div id="church_map" style="width: 520px; height: 390px; margin: 0px auto;"></div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal" >Close</a>
			</div>
		</div>
		<div id="reception" class="modal hide fade">
			<div class="modal-body">
				<div id="reception_map" style="width: 520px; height: 390px; margin: 0px auto;"></div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal" >Close</a>
			</div>
		</div>
		<!-- /Home -->
		
		<!-- Gallery -->
		<div id="gallery" style="display: none;font-family: 'MillerTextOT-RgIt', Helvetica, sans-serif !important;">
		</div>
		<!-- /Gallery -->
		
		<!-- Entourage -->
		<div id="entourage" style="display: none;font-family: 'MillerTextOT-RgIt', Helvetica, sans-serif !important;">
			<div class="row">
				<div class="span12">
					<div id="entourage-body" style="width: 100%; height: 100%; margin: 0px auto;overflow-x: hidden;font-size: 16px;"></div>
				</div>
			</div>
		</div>
		<!-- /Entourage -->
		
		<!-- Bridal Registry -->
		<div id="registry" style="display: none;font-family: 'MillerTextOT-RgIt', Helvetica, sans-serif !important;">
			<div class="row">
				<div class="span12">
					<p class="header-title" style="text-align:left;line-height: normal;padding-bottom: 10px;border-bottom: 1px solid #AFAFAF;">Bridal Registry</p>
					<p style="font-size: 18px;">We don't want to be picky and impose our gift preferences, but we also would like to be practical.</p>
					<?php require_once('gift-list.php')?>
				</div>
			</div>
		</div>
		<!-- /Bridal Registry -->
				<!-- Footer -->
		<footer style="margin: 30px 0px 0px 0px">
			<p>&copy; 2012 <a href='http://www.jrdagala.com/' style="color:#636364;">Jeff Robert Dagala</a>. All rights reserved.</p>
		</footer>
	</div> <!-- /container -->
<?php
/*echo __d('cake_dev', 'To change the content of this page, edit: APP/View/Pages/home.ctp.<br />
To change its layout, edit: APP/View/Layouts/default.ctp.<br />
You can also add some CSS styles for your pages at: APP/webroot/css.');*/
?>

