<?php

/**
 * Created by IntelliJ IDEA.
 * User: Torchick
 * Date: 13/09/2016
 * Time: 10:29 PM
 */
class WebUser extends CWebUser
{
    // Store model to not repeat query.
    private $_model;

    // Return first name.
    // access it by Yii::app()->user->role
    function getRole(){
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->role;
    }

    function isAdmin(){
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->role==99;
    }

    // Load user model.
    protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=User::model()->findByPk($id);
        }
        return $this->_model;
    }
}