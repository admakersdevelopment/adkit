<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LinkUserGroups */

$this->title = 'Create Link User Groups';
$this->params['breadcrumbs'][] = ['label' => 'Link User Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-user-groups-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
