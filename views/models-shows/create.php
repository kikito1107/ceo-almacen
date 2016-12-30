<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ModelsShows */

$this->title = Yii::t('app', 'Agregar inventario');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gestión de inventario'), 'url' => ['models-shows/inventory']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="models-shows-create">
    <div class="card card-default">
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
