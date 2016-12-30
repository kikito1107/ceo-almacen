<?php

use app\models\Mark;
use app\models\Models;
use app\models\Provider;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Models */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="models-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'clabe')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'type_shoes')->dropDownList(Models::getTypeShoes()) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'tipo_suela')->dropDownList(Models::getTypeSuela()) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'tipo_forro')->dropDownList(Models::getTypeForro()) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'onePhoto')->widget(FileInput::className(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showRemove' => false,
                    'showUpload' => false
                ]
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'twoPhoto')->widget(FileInput::className(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showRemove' => false,
                    'showUpload' => false
                ]
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'treePhoto')->widget(FileInput::className(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showRemove' => false,
                    'showUpload' => false
                ]
            ]) ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <h4 class="col-md-12">Datos de proovedor</h4>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model,'mark_id')->dropDownList(ArrayHelper::map(Provider::find()->asArray()->all(), 'id', 'name'), [
                'prompt' => Yii::t( 'app', 'Seleccionar' ),
            ])?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'precio_provedor')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'precio_minorista')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'precio_mayorista')->textInput() ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar y exportar PDF') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
