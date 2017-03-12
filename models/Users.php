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
 * @property string $username
 * @property string $password
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
            [['user_type_id', 'name', 'surname', 'username', 'password'], 'required'],
            [['user_type_id'], 'integer'],
            [['name', 'surname', 'password'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 300],
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
            'username' => 'Email',
            'password' => 'Password',
        ];
    }

    public function getUserType()
    {
        return $this->hasOne(UserTypes::className(), ['id' => 'user_type_id']);
    }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }


    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

}
