<?php

namespace app\models;

use Yii;
use app\models\UserTypes;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property integer $user_type_id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $password
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_type_id', 'name', 'surname', 'email', 'password'], 'required'],
            [['user_type_id'], 'integer'],
            [['name', 'surname', 'password'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_type_id' => 'User Type',
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    public function getUserType()
    {
        return $this->hasOne(UserTypes::className(), ['id' => 'user_type_id']);
    }

}
