<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModelsShowsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="models-shows-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'clabe') ?>

    <?= $form->field($model, 'color') ?>

    <?= $form->field($model, 'type_genero') ?>

    <?php // echo $form->field($model, 'type_shoes') ?>

    <?php // echo $form->field($model, 'tipo_suela') ?>

    <?php // echo $form->field($model, 'tipo_forro') ?>

    <?php // echo $form->field($model, 'precio_provedor') ?>

    <?php // echo $form->field($model, 'precio_minorista') ?>

    <?php // echo $form->field($model, 'precio_mayorista') ?>

    <?php // echo $form->field($model, 'cantidad') ?>

    <?php // echo $form->field($model, 'corrida') ?>

    <?php // echo $form->field($model, 'mark_id') ?>

    <?php // echo $form->field($model, 'update_date') ?>

    <?php // echo $form->field($model, 'create_date') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
