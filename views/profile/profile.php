<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->name;
// $this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">

    
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
