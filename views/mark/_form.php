<?php

use app\models\Provider;
use messaging\shared\presenters\MaterialDesignPresenter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mark */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mark-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card card-default">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4 col-xs-12">
                    <?= $form->field($model,'provider_id')->dropDownList(ArrayHelper::map(Provider::find()->asArray()->all(), 'id', 'name'), [
                            'prompt' => Yii::t( 'app', 'Seleccionar' ),
                        ])?>
                </div>
                <div class="col-md-4 col-xs-12">
                    <?= $form->field($model, 'clabe')->textInput() ?>
                </div>
    <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
