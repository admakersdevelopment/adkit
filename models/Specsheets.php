<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use app\models\Categories;
use app\models\Statuses;

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
    public $specsheet_status;
    public $specsheet_category;

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
        //     [['date_created', 'title', 'description', 'category_ref', 'status_ref'], 'required'],
            [['date_created'], 'safe'],
            [['category_ref', 'status_ref'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 255],
          //  [['file', 'thumbnail'], 'string', 'max' => 500],
            [['file'], 'file', 'extensions' => 'pdf'],
            [['thumbnail'], 'file', 'extensions' => 'jpg'],
            // [['thumbnail'], 'file', 'extensions' => 'pdf'],
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
            'category_ref' => 'Category',
            'status_ref' => 'Status',
            'thumbnail' => 'Thumbnail',
        ];
    }

    public function upload_specsheet()
    {
        if ($this->validate()) {
            $this->file->saveAs( Yii::$app->basePath.'/web/uploaded-specsheets/'.$this->file->baseName . '.' . $this->file->extension, true);
            $this->thumbnail->saveAs( Yii::$app->basePath.'/web/uploaded-specsheets/'.$this->thumbnail->baseName . '.' . $this->thumbnail->extension, true);
            return true;
        } else {
            return false;
        }
    }

    public function upload_thumbnail()
    {
        if ($this->validate()) {
            $this->thumbnail->saveAs( Yii::$app->basePath.'/web/uploaded-specsheets/'.$this->thumbnail->baseName . '.' . $this->thumbnail->extension, true);
            
            return true;
        } else {
            return false;
        }
    }

    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_ref']);
    }

    public function getStatus()
    {
        return $this->hasOne(Statuses::className(), ['id' => 'status_ref']);
    }
}
