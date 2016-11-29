<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpecsheetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Specsheets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specsheets-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'date_created',
            'title',
            'description',
            //'file',
            'category_ref',
            'status_ref',
            // 'thumbnail',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Upload new Specsheet', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
