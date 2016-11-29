<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Specsheets */

$this->title = 'Upload New Specsheet';
$this->params['breadcrumbs'][] = ['label' => 'Specsheets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specsheets-create">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">	
				<div class="panel-heading">	
			    	<h3 class="no-margin"><?= Html::encode($this->title) ?></h3>
			    </div>
   				<div class="panel-body">
				    <?= $this->render('_form', [
				        'model' => $model,
				    ]) ?>
				</div>
			</div>
		</div>
	</div>
</div>
