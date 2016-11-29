<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categories;
use app\models\Statuses;


/* @var $this yii\web\View */
/* @var $model app\models\Specsheets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="specsheets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->textInput(['maxlength' => true]) ?>

    <?php $category_data = ArrayHelper::map(Categories::find()->all(), 'id', 'description')?>
    <?= $form->field($model, 'category_ref')->dropDownList($category_data , ['prompt'=>'Select a Category']) ?>

    <?php $statuses_data = ArrayHelper::map(Statuses::find()->all(), 'id', 'description')?>
    <?= $form->field($model, 'status_ref')->dropDownList($statuses_data , ['prompt'=>'Select a Status']) ?>


    <?= $form->field($model, 'thumbnail')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
