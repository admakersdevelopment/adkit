<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Adkit Administration';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#menu1">Users</a></li>
      <li><a data-toggle="tab" href="#menu2">User Groups</a></li>
    </ul>

    <div class="tab-content">
      <div id="menu1" class="tab-pane active"><br>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'user_type_id',
                'value' => 'userType.description',
            ],
            'name',
            'surname',
            'username:email',
            // 'password',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Create New User', ['create'], ['class' => 'btn btn-primary btn-flat']) ?>
    </p>
    </div>
    
    <div id="menu2" class="tab-pane"><br>
        <?= GridView::widget([
            'dataProvider' => $dataProviderUserGroups,
            'filterModel' => $searchModelUserGroups,
            'summary' => '',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'description'

                // ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>  

        <?= Html::button('<i class="fa fa-edit"></i> Add New Group', 
                                            ['value' => Url::to(['users/add-new-group', ]), 
                                             'title' => 'Add New Group', 
                                             'class' => 'showModalButton btn btn-primary btn-flat']); ?>

    </div>
    </div>
    
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