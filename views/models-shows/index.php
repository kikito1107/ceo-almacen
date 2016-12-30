<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ModelsShowsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Inventario');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['models-shows/inventory']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="models-shows-index">
    <div class="card">
        <div class="card-heading bg-primary">
            <h4 class="m0 text-capitalize">
                <?= Html::encode($this->title) ?>
<!--                --><?//= Html::a(Yii::t('app', '<i class="fa fa-plus"></i> Agregar'), ['create'], ['class' => 'pull-right btn btn-danger']) ?>
            </h4>
        </div>
        <div class="card-body">
            <p>Listado general de todo lo que se maneja en el inventario con filtros de busqueda y capacidad total</p>
            <hr>
            <div class="row">
                <div class="col-md-2">
                    <p>Cantidad de pares: <span class="bg-danger">xx</span></p>
                </div>
                <div class="col-md-2">
                    <p>Precio estimado en bodega: <span class="bg-danger">xx</span></p>
                </div>
                <div class="col-md-2">
                    <p>Proovedores activos: <span class="bg-danger">xx</span></p>
                </div>
                <div class="col-md-2">
                    <p>Pares dados a credito: <span class="bg-danger">xx</span></p>
                </div>
                <div class="col-md-2">
                    <p>Venta promedio: <span class="bg-danger">xx</span></p>
                </div>
                <div class="col-md-2">
                    <p>Modelo más vendido: <span class="bg-danger">xxxxx</span></p>
                </div>
            </div>
        </div>
<!--            --><?//= GridView::widget([
//                'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
//                'columns' => [
//                    ['class' => 'yii\grid\SerialColumn'],
//
//                    //'id',
//                    'name',
//                    //'clabe',
//                    //'color',
//                    //'type_genero',
//                    // 'type_shoes',
//                    // 'tipo_suela',
//                    // 'tipo_forro',
//                    'precio_provedor',
//                    // 'precio_minorista',
//                    // 'precio_mayorista',
//                    'cantidad',
//                    // 'corrida',
//                    'mark_id',
//                    // 'update_date',
//                    // 'create_date',
//
//                    ['class' => 'yii\grid\ActionColumn'],
//                ],
//            ]); ?>
<!--        </div>-->
    </div>
</div>
