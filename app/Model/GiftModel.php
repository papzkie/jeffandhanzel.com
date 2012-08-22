<?php
// file: /app/models/user.php
class Gift extends AppModel {
	var $name = 'Gift';
	var $validate = array(
		'name'=>array(
			'rule'=>'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'Please enter your name.'
		),
		'giftname'=>array(
			'rule'=>'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'Please select the gift.'
		),
		'contact'=>array(
			'rule'=>'notEmpty',
			'required'=>true,
			'allowEmpty'=>false,
			'message'=>'Please enter your contact number.'
		)
	);
	
	function getAll()
	{
		$gift = $this->find('all');
		return $gift;
	}
	function check_gift_data($data) {
		$return = FALSE;
		$conditions = array(
			'Gift.giftname'=>$data['Gift']['giftname'],
			'Gift.status'=>'0'
		);
		$gift = $this->find('first',array('conditions'=>$conditions));
		// check if giftname exist.
		if(!empty($gift)) {
			$return = $gift;
		}
		return $return;
	}
}
?>