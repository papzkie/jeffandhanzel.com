<?php
// file: /app/app_controller.php

class AppController extends Controller {
	// class variables
	var $_User = array();

	/**
	 * Before any Controller action
	 */
	function beforeFilter() {
		// if admin url requested
		if(isset($this->params['admin']) && $this->params['admin']) {
			// check user is logged in
			if( !$this->Session->check('User') ) {
				$this->Session->setFlash('You must be logged in for that action.');
				$this->redirect('/login');
			}

			// save user data
			$this->_User = $this->Session->read('User');
			$this->set('User',$this->_User);

			// change layout
			$this->layout = 'admin';
		}
	}
}
?>