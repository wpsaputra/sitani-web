<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserIdentity
 *
 * @author Torchick
 */
class UserIdentity extends CUserIdentity{
	//put your code here
	private $_id;

	public function authenticate() {
		$record = User::model()->findByAttributes(array('user_name'=>$this->username));
		if($record===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($record->password!==($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else {
			$this->_id=$record->id;
			$this->setState('title', $record->user_name);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	public function getId() {
		return $this->_id;
	}

}
