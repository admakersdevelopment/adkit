<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LinkUserGroups */

$this->title = 'Update Link User Groups: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Link User Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="link-user-groups-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
