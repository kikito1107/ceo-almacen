<?php

use app\models\Profile;
use auth\models\User;
use messaging\shared\presenters\MaterialDesignPresenter;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
$this->title = $model->name;

?>
<div class="profile-view">
    <div class="card">
        <div class="card-heading bg-primary">
            <h4 class="m0 text-capitalize">
                <?= Html::encode($this->title) ?>
            </h4>
        </div>
        <div class="card-offset">
            <div class="card-offset-item text-right">
                <!-- START dropdown-->
                <div uib-dropdown="dropdown2" class="pull-right dropdown" style="">
                    <button type="button" uib-dropdown-toggle="" class="btn btn-danger btn-circle dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                        <em class="fa fa-ellipsis-v" aria-hidden="true"></em>
                    </button>
                    <ul role="menu" class="dropdown-menu md-dropdown-menu dropdown-menu-right">
                        <li>
                            <?= Html::a(Yii::t('app', '<em class="fa fa-pencil"></em> Actualizar datos'), ['update', 'id' => $model->id], []) ?>
                        </li>
                        <?php if(is_object($model->user)): ?>
                            <li>
                                <?= Html::a(Yii::t('app', '<em class="fa fa-user-secret"></em> Actualizar inicio de sesión'),
                                    ['/auth/user/update', 'id' => $model->user_id], []) ?>
                            </li>
                        <?php endif;?>
                        <?php if($model->status == 1): ?>
                            <li>
                                <?= Html::a(Yii::t('app', '<em class="fa fa-times"></em> Desactivar'), ['activate', 'id' => $model->id, 'status' => false], [
                                    'data' => [
                                        'confirm' => Yii::t('app', '¿Está seguro de que desea desactivar este elemento?'),
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </li>
                        <?php else: ?>
                            <li>
                                <?= Html::a(Yii::t('app', '<em class="fa fa-check"></em> Activar'), ['activate', 'id' => $model->id, 'status' => true], [
                                    'data' => [
                                        'confirm' => Yii::t('app', '¿Está seguro de que desea activar este elemento?'),
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- END dropdown-->
            </div>
        </div>
        <div class="card-body bg-white">
        <div class="row">
            <div class="col-md-2 col-xs-12 ">
                <a href="#">
                    <?= Html::img("@web/uploads/image/" . $model->image_Photo, ['class' => 'img-thumbnail']) ?>
                </a>
            </div>
            <div class="col-md-10 col-xs-12 bs-callout-info">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <strong><?= $model->getAttributeLabel('name') ?> :</strong>
                            </div>
                            <div class="col-md-9">
                                <p><?= $model->name; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <strong><?= $model->getAttributeLabel('email') ?></strong>
                            </div>
                            <div class="col-md-9">
                                <p><?= $model->email ?> </p>
                            </div>        
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <strong><?= $model->getAttributeLabel('address') ?></strong>
                            </div>
                            <div class="col-md-9">
                                <p><?= $model->address?> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <strong><?= $model->getAttributeLabel('phone') ?></strong>
                            </div>
                            <div class="col-md-9">
                                <p><?= $model->phone ?> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <strong><?= $model->getAttributeLabel('user_type') ?></strong>
                            </div>
                            <div class="col-md-9">
                                <p>
                                    <?php
                                        $role = $model->user_type;
                                        if($role == 1)
                                            echo Yii::t('app', "Administrador");
                                        else if($role == 2)
                                            echo Yii::t("app","Cajero");
                                        else if($role == 3)
                                            echo Yii::t("app","Capturista");
                                        else if($role == 4)
                                            echo Yii::t("app","Vendedor");
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <strong><?= $model->getAttributeLabel('create_date') ?></strong>
                            </div>
                            <div class="col-md-3">
                                <p><?= $model->create_date ?> </p>
                            </div>
                            <div class="col-md-3">
                                <strong><?= $model->getAttributeLabel('update_date') ?></strong>
                            </div>
                            <div class="col-md-3">
                                <p><?= $model->update_date ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
