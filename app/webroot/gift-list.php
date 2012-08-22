	<div class="row" id="giftContainer" style="margin-top: 20px;font-size: 19px;text-shadow: 0px 1px 0px white;color: #636364;">
		<div id="giftWrap">
		<?php 
			echo $this->requestAction('/gifts/gifthtml')
		?>
		</div>
		<div class="rsvp modal hide fade" style="width: 460px;overflow-x:hidden;" id="rsvp">
			<div class="modal-header" style="border:none;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body" style="width:100%; padding: 15px 75px 0px">
			<?php echo $this->Form->create('Gift');?>
				<fieldset>
					<div class="input text">
							<label for="GiftGiftname" style="text-align:left;font-size:19px;padding-bottom:15px;" id="gift"></label>
					</div>
					<?php
						echo $this->Form->hidden('giftname');
						echo $this->Form->input('name',array('style'=>'width: 300px;font-size: 15px;line-height: 20px;'));
						echo $this->Form->input('email',array('style'=>'width: 300px;font-size: 15px;line-height: 20px;'));
						echo $this->Form->input('contact',array('style'=>'width: 300px;font-size: 15px;line-height: 20px;'));
						echo $this->Form->hidden('status',array('value'=>'1'));
					?>
					<div class="input text" style="margin-right: 150px;text-align:right;padding-top: 20px;">
						<label style="text-align:left;font-size:15px;padding-bottom:15px;line-height: 20px;color:#EB0F0F" id="error_msg"></label>
					</div>
					<div class="input buttons" style="margin-right: 150px;text-align:right;padding-top: 5px;">
						<button type="submit" class="btn btn-primary" name="data[Gift][rsvp]" value="RSVP">Submit</button>
					</div>
					
				</fieldset>
			<?php echo $this->Form->end();?>
			</div>
		</div>
	</div>