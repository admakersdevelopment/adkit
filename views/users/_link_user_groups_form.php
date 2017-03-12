<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\UserGroups;

/* @var $this yii\web\View */
/* @var $model app\models\UserGroups */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-groups-form">

    <?php $form = ActiveForm::begin(); ?>

	<?php $user_type_data = ArrayHelper::map(UserGroups::find()->all(), 'id', 'description')?>
    <?= $form->field($model, 'user_group_id')->dropDownList($user_type_data , ['prompt'=>'Select a Group']) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
