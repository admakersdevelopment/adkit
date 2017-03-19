<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Users;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class ForgotPasswordForm extends Model
{
    public $username;
    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [[ 'username'], 'required'],
            // [[ 'username'], 'validateUsername'],
        ];
    }

    public function validateUsername(){
        $userModel = Users::find()
        ->where(['username' => $this->username])
        ->one();

        if(!empty($userModel)){
            return true;
        }else{
            return false;
        }

    }

}
