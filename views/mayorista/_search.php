<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MayoristaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mayorista-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'direccion') ?>

    <?= $form->field($model, 'rfc') ?>

    <?= $form->field($model, 'credito') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
