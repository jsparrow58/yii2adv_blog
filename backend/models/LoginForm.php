<?php
/**
 *
 * User: JSparrow
 * DateTime: 2016/11/11 14:00
 * Created by PhpStorm.
 */

namespace backend\models;


use backend\models\Base\BaseModel;
use common\models\User;

/**
 * 后台登录模型
 * @package backend\models
 */
class LoginForm extends BaseModel
{
    public $username;
    public $password;
    public $verify;

    private $_error = '';
    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'password', 'verify'], 'required'],
            [['password'], 'string', 'min'=>6],
            ['password', 'validatePassword'],
            ['verify', 'captcha', 'captchaAction'=>'common/captcha'],

        ];
    }

    public function validatePassword($attribute, $params) {
        if(!$this->hasErrors()) {
            $user = $this->getUser();
            if(!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, '用户名或者密码错误！');
            }
        }
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'verify' => '验证码',
        ];
    }

    public function login()
    {
        if($this->validate()){
            return \Yii::$app->user->login($this->getUser());
        }
        return false;
    }

    private function getUser()
    {
        if($this->_user === false) {
            $this->_user = User::findAdminByUsername($this->username);
        }
        return $this->_user;
    }
}