<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ModelsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Modelos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="models-index">
    <div class="card">
        <div class="card-heading bg-primary">
            <h4 class="m0 text-capitalize">
                <?= Html::encode($this->title) ?>
                <?= Html::a(Yii::t('app', 'Agregar Modelo'), ['create'], ['class' => 'btn btn-success pull-right']) ?>
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'name',
                //            'clabe',
                //            'color',
                //            'type_genero',
                //             'type_shoes',
                //             'tipo_suela',
                //             'tipo_forro',
                //             'precio_provedor',
                //             'precio_minorista',
                //             'precio_mayorista',
                //             'mark_id',
                //             'one_Photo',
                //             'two_Photo',
                //             'tree_Photo',
                //             'update_date',
                //             'create_date',
                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{view} {update}',
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
                                    }
//                                    'status' => function ($url, $model) {
//                                        if($model->status == 1) {
//                                            return Html::a('<i class="fa fa-times" aria-hidden="true"></i> Desactivar',
//                                                Url::to(['activate', 'id' => $model->id, 'status' => 0]), [
//                                                    'data-pjax' => 0,
//                                                    'aria-label' => 'Desactivar',
//                                                    'title' => 'Desactivar',
//                                                    'class' => 'btn btn-xs btn-default mb-sm text-danger',
//                                                    'data-confirm' => '¿Está seguro de desactivar este elemento?',
//                                                    'data-method' => 'post'
//                                                ]);
//                                        } else {
//                                            return Html::a('<i class="fa fa-check" aria-hidden="true"></i> Activar',
//                                                Url::to(['activate', 'id' => $model->id, 'status' => 1]), [
//                                                    'data-pjax' => 0,
//                                                    'aria-label' => 'Activar',
//                                                    'title' => 'Activar',
//                                                    'class' => 'btn btn-xs btn-default mb-sm text-success',
//                                                    'data-confirm' => '¿Está seguro de activar este elemento?',
//                                                    'data-method' => 'post'
//                                                ]);
//                                        }
//                                    }
                                ],
                            ],
                        ],
                    ]); ?>
</div>
