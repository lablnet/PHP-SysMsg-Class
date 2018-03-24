<?php

class SysMsg
{
	private $type;

	public function __construct(){

		if(session_status() === PHP_SESSION_NONE){

			session_start();

		}

		if(!isset($_SESSION['sys_msg'])){

			$_SESSION['sys_msg'] = [];

		}

	}

	public function Add($params){

		if(is_array($params)){

			if(!empty($params['msg'])){

				if(isset($params['type']) && !empty($params['type'])){

					self::Type($params['type']);

				}else{

					self::Type("light");

				}

				$_SESSION['sys_msg'][$this->type] = $params['msg'];

				return true;

			}else{

				$_SESSION['sys_msg'][$this->type] = [];

			}

		}else{

			return false;

		}

	}

	protected function Type($type){

			$type = strtolower($type);

			switch ($type) {

				case 'success':

					$type = 'success';

					break;

				case 'error':

					$type = 'danger';

					break;	

				case 'information':

					$type = 'info';

					break;

				case 'warning':

					$type = 'warning';

					break;

				case 'primary':

					$type = 'primary';

					break;

				case 'secondary':

					$type = 'secondary';

					break;

				case 'dark':

					$type = 'Dark';

					break;										
				default:

					$type = 'light';

					break;

			}
			
			$this->type = $type;

			return;


	}

	private function Delete($type){

		if(!empty($_SESSION['sys_msg'][$type])){

			unset($_SESSION['sys_msg'][$type]);

			return;

		}else{

			return;

		}		

	}

	public function View(){

		if(isset($_SESSION['sys_msg'])){

			$sys_msg = $_SESSION['sys_msg'];

            foreach ($sys_msg as $type => $sys_msg) {

            		if(isset($sys_msg) && isset($type)){
 
                    	$msg = "<div class='alert alert-".$type."'>".'<a href="#" class="close" data-dismiss="alert">&times;</a>'.$sys_msg.'</div>';

                    	$msg_data[] = $msg;

                    	self::Delete($type);

                	}
					
            }		

            if(isset($msg_data)){

            	return implode('', $msg_data);

            }else{

            	return;

            }		

		}else{

			return;

		}

	}

}