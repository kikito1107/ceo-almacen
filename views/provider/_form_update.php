<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Provider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="provider-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card card-default">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6 col-xs-12">
                    <?= $form->field($model, 'clabe')->textInput() ?>
                </div>
                <div class="col-md-12 col-xs-12">
                    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-12 col-xs-12 text-center">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Agregar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">

    </div>

    <?php ActiveForm::end(); ?>

</div>