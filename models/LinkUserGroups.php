<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "link_user_groups".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $user_group_id
 */
class LinkUserGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'link_user_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_group_id'], 'required'],
            [['user_id', 'user_group_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_group_id' => 'User Group ID',
        ];
    }
}
