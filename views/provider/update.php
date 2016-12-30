<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Provider */

$this->title = Yii::t('app', 'Actualizar proveedor: ', [
    'modelClass' => 'Provider',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proveedores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="provider-update">
	<div class="card">
        <div class="card-heading bg-primary">
            <h4 class="m0 text-capitalize">
                <?= Html::encode($this->title) ?>
            </h4>
        </div>
        <div class="card-body">
    		<?= $this->render('_form', [
        		'model' => $model,
    		]) ?>
		</div>
	</div>
</div>
