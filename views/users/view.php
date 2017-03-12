<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'user_type_id',
                'value' => $model->userType->description
            ],
            'name',
            'surname',
            'username:email',
            // 'password',
        ],
    ]) ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::button('<i class="fa fa-edit"></i> Link Group', 
                ['value' => Url::to(['users/link-group', 'id' => $model->id]), 
                 'title' => 'Add New Group', 
                 'class' => 'showModalButton btn btn-primary btn-flat']); ?>
    </p>
</div>

<?php
Modal::begin([
    'options' => [
        'tabindex' => false
    ],    
    'header' => 'User Groups',
    'id' => 'modal',
    'size' => 'modal-lg',
]);
echo "<div id='modalContent'></div>";

Modal::end();
?>
