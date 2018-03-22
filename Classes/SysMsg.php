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

					self::Type("success");

				}

				$_SESSION['sys_msg'][$this->type] = $params['msg'];

				return self::View();

			}else{

				$_SESSION['sys_msg'][$this->type] = [];

			}

		}else{

			return false;

		}

	}

	protected function Type($type){

		if(!empty($type)){

			$this->type = $type;

			return true;

		}else{

			return false;

		}

	}

	private function Delete($type){

		if(!empty($_SESSION['sys_msg'][$type])){

			unset($_SESSION['sys_msg'][$type]);

			return true;

		}else{

			return;

		}		

	}

	protected function View(){

		if(isset($_SESSION['sys_msg'])){

			$sys_msg = $_SESSION['sys_msg'];

            foreach ($sys_msg as $type => $sys_msg) {

                    $msg = "<div class='alert alert-".$type."'>".'<a href="#" class="close" data-dismiss="alert">&times;</a>'.$sys_msg.'</div>';

                    $msg_data[] = $msg;

                    self::Delete($type);
				
            }		

            echo implode('', $msg_data);	
		}else{

			return false;

		}

	}

}