<?php

use app\models\Profile;
use kartik\file\FileInput;
use messaging\shared\presenters\MaterialDesignPresenter;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form" ng-controller="MainController">
    <?php if(isset($model->name)): ?> <span ng-init='name = "<?= $model->name ?>"'></span> <?php endif; ?>
    <?php if(isset($model->email)): ?> <span ng-init='email = "<?= $model->email?>"'></span> <?php endif; ?>
    <?php if(isset($model->phone)): ?> <span ng-init='phone = "<?= $model->phone ?>"'></span> <?php endif; ?>
    <?php if(isset($model->address)): ?> <span ng-init='address = "<?= $model->address ?>"'></span> <?php endif; ?>
    <?php if(isset($model->user_type)): ?> <span ng-init='user_type = "<?= $model->user_type?>"'></span> <?php endif; ?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="card card-default">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <?= $form->field($model, 'name',
                        ['template' => MaterialDesignPresenter::getInputIconTemplate("fa-user")])->textInput([
                        'ng-model' =>'name',
                        'class' => ($model->name) ? 'ng-dirty fix-width-material-input' : ''
                    ]) ?>

                </div>
                <div class="col-md-4 col-xs-12">
                    <?= $form->field($model, 'email',
                        ['template' => MaterialDesignPresenter::getInputIconTemplate("fa-envelope")])->textInput([
                        'ng-model' => 'email',
                        'required' => 'required',
                        'class' => ($model->email) ? 'ng-dirty fix-width-material-input' : '']) ?>
                </div>
                <div class="col-md-4 col-xs-12">
                    <?= $form->field($model, 'phone',
                        ['template' => MaterialDesignPresenter::getInputIconTemplate('fa-phone-square')])->textInput([
                        'ng-model' => 'phone',
                        'class' => ($model->phone) ? 'ng-dirty fix-width-material-input' : ''
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-xs-8">
                    <?= $form->field($model, 'address',
                        ['template' => MaterialDesignPresenter::getInputIconTemplate('fa-street-view')])->textInput([
                        'ng-model' => 'address',
                        'class' => ($model->address) ? 'ng-dirty fix-width-material-input' : 'fix-width-material-input']) ?>
                </div>
                <div class="col-md-4 col-xs-4">
                    <?= $form->field($model, 'user_type',
                        ['template' => MaterialDesignPresenter::getDropDownListTemplate()])->dropDownList(Profile::getUserType(),[
                        'prompt' => Yii::t('app', 'Seleccionar'),
                        'ng-model' => 'user_type'
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-xs-3">
                    <?= $form->field($model, 'nss',
                        ['template' => MaterialDesignPresenter::getInputIconTemplate('fa-newspaper-o')])->textInput([
                        'class' => ($model->address) ? 'ng-dirty fix-width-material-input' : 'fix-width-material-input']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-6">

                    <?= $form->field($model, 'imagePhoto')->widget(FileInput::className(), [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'showRemove' => false,
                            'showUpload' => false
                        ]
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-6">

                    <?= $form->field($model, 'inePhoto')->widget(FileInput::className(), [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'showRemove' => false,
                            'showUpload' => false
                        ]
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-6">

                    <?= $form->field($model, 'request_jobPhoto')->widget(FileInput::className(), [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'showRemove' => false,
                            'showUpload' => false
                        ]
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-6">

                    <?= $form->field($model, 'addressPhoto')->widget(FileInput::className(), [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'showRemove' => false,
                            'showUpload' => false
                        ]
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <?= $form->field($model, 'birth_certificatePhoto')->widget(FileInput::className(), [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'showRemove' => false,
                            'showUpload' => false
                        ]
                    ]) ?>
                </div>
            </div>
            <div class="row text-center">
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '<i class="fa fa-floppy-o"></i> Guardar') : Yii::t('app', '<i class="fa fa-pencil-square-o"></i> Editar'), ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
