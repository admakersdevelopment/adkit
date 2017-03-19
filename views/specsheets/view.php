<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Specsheets */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Specsheets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specsheets-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'date_created',
            'title',
            'description',
            // 'file',
            [
                'attribute' => 'file',
                 'value' => Html::a($model->file, 'uploaded-specsheets/' . $model->file, ['target' => '_blank']),
                 'format' => 'raw'
            ],
            [
                'attribute' => 'category_ref',
                'value' => $model->category->description
            ],
            [
                'attribute' => 'status_ref',
                'value' => $model->status->description
            ],
            // 'thumbnail',
        ],
    ]) ?>
    <br>
    <img src="uploaded-specsheets/<?php echo $model->thumbnail;?>">
    <br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?php /* Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>    

</div>
