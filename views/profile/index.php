<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Usuarios');
?>
<div class="profile-index">
    <div class="card">
        <div class="card-heading bg-primary">
            <h4 class="m0 text-capitalize">
                <?= Html::encode($this->title) ?>
                <?= Html::a(Yii::t('app', '<i class="fa fa-plus"></i> Agregar'), ['create'], ['class' => 'pull-right btn btn-danger']) ?>
            </h4>
        </div>
        <div class="card-body">
            <p>

            </p>
            <?php Pjax::begin(); ?>    <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'name',
                         'email:email',
                         'address',
                         'phone',
                         [
                             'attribute' => 'status',
                             'value' => function ($model) {
                                 $status = $model->status;
                                 if ($status == 1)
                                     return Yii::t('app', "Activado");
                                 else
                                     return Yii::t("app", "Desactivado");
                             }
                         ],
                        [
                            'attribute' => 'user_type',
                            'filter'=>[
                                1 => Yii::t('app', 'Administrador'),
                                2 => Yii::t('app', 'Cajero'),
                                3 => Yii::t('app', 'Capturista'),
                                4 => Yii::t('app', 'Vendedor')
                            ],
                            'value' => function ($model) {
                                $role = $model->user_type;
                                if($role == 1)
                                    return Yii::t('app', "Administrador");
                                else if($role == 2)
                                    return Yii::t("app","Cajero");
                                else if($role == 3)
                                    return Yii::t("app","Capturista");
                                else if($role == 4)
                                    return Yii::t("app","Vendedor");
                            }
                        ],
                        ['class' => 'yii\grid\ActionColumn',
                            'template' => '{view} {update} {status}',
                            'buttons' => [
                                'view' => function ($url, $model) {
                                    return Html::a('<i class="fa fa-eye" aria-hidden="true"></i> Ver detalle',
                                        Url::to(['view', 'id' => $model->id]), [
                                            'data-pjax' => 0,
                                            'aria-label' => 'Ver detalle',
                                            'title' => 'Ver detalle',
                                            'class' => 'btn btn-xs btn-default mb-sm text-inverse'
                                        ]);
                                },
                                'update' => function ($url, $model) {
                                    return Html::a('<i class="fa fa-pencil" aria-hidden="true"></i> Actualizar',
                                        Url::to(['update', 'id' => $model->id]), [
                                            'data-pjax' => 0,
                                            'aria-label' => 'Actualizar',
                                            'title' => 'Actualizar',
                                            'class' => 'btn btn-xs btn-default mb-sm text-primary'
                                        ]);
                                },
                                'status' => function ($url, $model) {
                                    if($model->status == 1) {
                                        return Html::a('<i class="fa fa-times" aria-hidden="true"></i> Desactivar',
                                            Url::to(['activate', 'id' => $model->id, 'status' => 0]), [
                                                'data-pjax' => 0,
                                                'aria-label' => 'Desactivar',
                                                'title' => 'Desactivar',
                                                'class' => 'btn btn-xs btn-default mb-sm text-danger',
                                                'data-confirm' => '¿Está seguro de desactivar este elemento?',
                                                'data-method' => 'post'
                                            ]);
                                    } else {
                                        return Html::a('<i class="fa fa-check" aria-hidden="true"></i> Activar',
                                            Url::to(['activate', 'id' => $model->id, 'status' => 1]), [
                                                'data-pjax' => 0,
                                                'aria-label' => 'Activar',
                                                'title' => 'Activar',
                                                'class' => 'btn btn-xs btn-default mb-sm text-success',
                                                'data-confirm' => '¿Está seguro de activar este elemento?',
                                                'data-method' => 'post'
                                            ]);
                                    }
                                }
                            ],
                        ],
                    ],
                ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
