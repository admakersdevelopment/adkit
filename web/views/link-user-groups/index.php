<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LinkUserGroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Link User Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-user-groups-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Link User Groups', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'user_group_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
