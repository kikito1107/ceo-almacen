<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Models */

$this->title = Yii::t('app', 'Agregar modelo');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="models-create">
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
