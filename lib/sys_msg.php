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
function system_message($msg,$type=null){

	if(!isset($type) && empty($type)){

		$type = 'light';

	}	

	return sysobj()->add(['msg'=>$msg,'type'=>$type]);

}
	 /**
	 * View system message
	 *
	 * @return string
	 */	 
function view_system_message(){

	return sysobj()->View();

}