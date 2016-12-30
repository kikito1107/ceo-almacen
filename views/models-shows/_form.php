<?php

use app\models\Mark;
use app\models\ModelsShows;
use app\models\Provider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModelsShows */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="models-shows-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model,'name')->dropDownList(ArrayHelper::map(Provider::find()->asArray()->all(), 'id', 'name'), [
                'prompt' => Yii::t( 'app', 'Seleccionar' ),
            ])?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'clabe')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'cantidad')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'type_genero')->dropDownList(ModelsShows::getUserShoes()); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'type_shoes')->dropDownList(ModelsShows::getTypeShoes()) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'tipo_suela')->dropDownList(ModelsShows::getTypeSuela()) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'tipo_forro')->dropDownList(ModelsShows::getTypeForro()) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'precio_provedor')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'precio_minorista')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'precio_mayorista')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model,'mark_id')->dropDownList(ArrayHelper::map(Mark::find()->asArray()->all(), 'id', 'name'), [
                'prompt' => Yii::t( 'app', 'Seleccionar' ),
            ])?>
        </div>
    </div>
    <td><input id="'.$i.'" type="text" max="3" required="required" class="corrida"/></td>
    <div class="row">
        <div class="col-md-12">
<!--            --><?//= $form->field($model, 'corrida')->textInput(['maxlength' => true]) ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="21" class="text-center">Corrida</th>
                        </tr>
                        <tr>
                            <th colspan="7" class="text-center">Corrida de bebe</th>
                            <th colspan="5" class="text-center">Corrida de niño</th>
                            <th colspan="9" class="text-center">Dama y caballero</th>
                        </tr>
                        <tr>
                            <?php
                                for ($i = 10; $i <= 30; $i++) {
                                    echo '<th>'.$i.'</th>';
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tr_corrida">
                            <?php
                            for ($i = 1; $i <= 21; $i++) {
                                echo '<td><input id="'.$i.'" type="text" max="3" required="required" style="border: 1px solid green;width: 40px;padding: 1px 6px;font-size: 15px;"/></td>';
                            }
                            ?>
                        </tr>
                        <tr>
                            <th colspan="20"></th>
                            <th>Pares totales = sum(corrida[])</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!--    --><?//= $form->field($model, 'update_date')->textInput() ?>

<!--    --><?//= $form->field($model, 'create_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
