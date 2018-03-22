<?php 
	 /**
	 * Create instence of class
	 *
	 * @return object
	 */	 
function sysobj(){

	return new SysMsg;

}
	 /**
	 * Add system message
	 *
	 * @param $msg and $type
	 *
	 * @return string
	 */
function system_message($msg,$type){

	if(!isset($type) && empty($type)){

		$type = 'success';

	}	

	return sysobj()->add(['msg'=>$msg,'type'=>$type]);

}
