<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specsheets".
 *
 * @property integer $id
 * @property string $date_created
 * @property string $title
 * @property string $description
 * @property string $file
 * @property integer $category_ref
 * @property integer $status_ref
 * @property string $thumbnail
 */
class Specsheets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specsheets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_created', 'title', 'description', 'file', 'category_ref', 'status_ref', 'thumbnail'], 'required'],
            [['date_created'], 'safe'],
            [['category_ref', 'status_ref'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
            [['file', 'thumbnail'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_created' => 'Date Created',
            'title' => 'Title',
            'description' => 'Description',
            'file' => 'File',
            'category_ref' => 'Category Ref',
            'status_ref' => 'Status Ref',
            'thumbnail' => 'Thumbnail',
        ];
    }
}
