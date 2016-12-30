<?php

use yii\helpers\ArrayHelper;
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
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-2 col-xs-12">
                    <?= $form->field($model, 'phone')->textInput() ?>
                </div>
                <div class="col-md-2 col-xs-12">
                    <?= $form->field($model, 'clabe')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-2 col-xs-2">
                    <?= $form->field($model, 'type_shoes')->textInput() ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'descuento')->textInput(['maxlength' => true, 'placeholder'=>'Descuento 1']) ?>
                    <?= $form->field($model, 'descuento_dos')->textInput(['maxlength' => true, 'placeholder'=>'Descuento 2'])->label(false) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <h4 class="col-md-12">
                    Datos de la cuenta bancaria
                </h4>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                    <?= $form->field($model, 'acount_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                    <?= $form->field($model, 'acount')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                    <?= $form->field($model, 'interbank_clabe')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3 col-xs-3">
                    <?= $form->field($model, 'bank')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-xs-3">
                    <?= $form->field($model, 'rfc')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <div class="checkbox has-success" style="padding-top: 20px">
                        <label>
                            <input type="checkbox"> Emite facturas
                        </label>
                    </div>
                </div>
            </div>
            </div>
            <hr>
            <div class="row">
                <h4 class="col-md-12">
                    Datos de representante de ventas
                </h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="checkbox has-error">
                        <label class="">
                            <input type="checkbox"> Utilizar mismos datos de proovedor para representante
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'agent_name')->textInput() ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'agent_phone')->textInput() ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'agent_mail')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">

    </div>

    <?php ActiveForm::end(); ?>

</div>
