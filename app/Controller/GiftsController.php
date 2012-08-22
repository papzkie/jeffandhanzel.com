<?php
// /app/controllers/users_controller.php

class GiftsController extends AppController {
	var $name = 'Gifts';
	public $components = array('RequestHandler');
	public $helpers = array('Js');

	/**
	 * Before any Controller Action
	 */
	public function beforeFilter() {    
     parent::beforeFilter();
        // Controller spesific beforeFilter
    }
	
	function giftlist() {        
		return $this->Gift->find('all');    
	}
	function gifthtml()
	{
		$giftlist = $this->Gift->find('all');
		$giftBuilder = '';
		$giftHtml = '';
		foreach($giftlist as $gift)
		{
			if($gift["Gift"]["status"] == 0)
				$giftBuilder .= "<span id='gift_" . $gift["Gift"]["id"] . "'><a href='#' class='gift'>" . $gift["Gift"]["giftname"] . "</a></span><br/>";
			else 
				$giftBuilder .= "<span id='gift_" . $gift["Gift"]["id"] . "'>" . $gift["Gift"]["giftname"] . " (taken)</span><br/>";
				
			if(($gift["Gift"]["id"] % 10) == 0)
			{
				$giftHtml .= '<div class="span4"><p style="line-height: 26px;">' . $giftBuilder . '</p></div>';
				$giftBuilder = '';
			}
		}
		$this->autoRender = false;
		return $giftHtml;
	}
	function rsvp()
	{
		if($this->data != null) {
		// set the form data to enable validation
			$this->Gift->set( $this->data );
			// see if the data validates
			$this->autoRender = false;
			if(!$this->data['Gift']['name'] && !$this->data['Gift']['email'] && !$this->data['Gift']['contact'])
			{
				return json_encode(array('response' => false,'error'=>'Incomplete information'));
			}
			if($this->Gift->validates()) {
				// check user is valid
				$conditions = array(
					'Gift.giftname'=>$this->data['Gift']['giftname']
				);
				$result = $this->Gift->find('first',array('conditions'=>$conditions));
				//$result = $this->Gift->check_gift_data($this->data);
				//return json_encode(array('response' => $this->data));
				if( $result !== FALSE && $result['Gift']['status'] == 0) {
					$this->Gift->id = $result['Gift']['id'];
					$this->Gift->save($this->data);
					$result = $this->Gift->find('first',array('conditions'=> array('Gift.giftname'=>$this->data['Gift']['giftname'])));
					return json_encode(array('response' => true,'data'=>$result));
				}
				else if ($result['Gift']['status'])
					return json_encode(array('response' => false,'error'=>'The gift was reserved. Please select another gift'));
				
				return json_encode(array('response' => false,'error'=>'Gift does not exist'));
			}
		}
	}
	function index()
	{
        $gifts = $this->Gift->find('all');
		$this->autoRender = false;
      	return json_encode(array('response' => $gifts));
	}
}
?>
