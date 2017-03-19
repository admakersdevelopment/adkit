<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Statuses;
use app\models\Categories;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpecsheetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Specsheets';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specsheets-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'date_created',
            'title',
            //'description',
            [
                'attribute' => 'specsheet_category',
                'value' => 'category.description',
                'filter' => ArrayHelper::map(Categories::find()->all(), 'description', 'description'),
            ],
            [
                'attribute' => 'specsheet_status',
                'value' => 'status.description',
                'filter' => ArrayHelper::map(Statuses::find()->all(), 'description', 'description'),
            ],
            // 'thumbnail',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Upload new Specsheet', ['create'], ['class' => 'btn btn-primary btn-flat']) ?>
    </p>
</div>
