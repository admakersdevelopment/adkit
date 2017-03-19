<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpecsheetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Opel Specsheets';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specsheets-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'date_created',
            'title',
            //'description',
            [
                'attribute' => 'category_ref',
                'value' => 'category.description',
            ],
            [
                'attribute' => 'status_ref',
                'value' => 'status.description',
            ],
            // 'thumbnail',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Upload new Specsheet', ['create'], ['class' => 'btn btn-primary btn-flat']) ?>
    </p>
</div>
