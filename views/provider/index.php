<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProviderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Proveedores');
?>
<div class="provider-index">
    <div class="card">
        <div class="card-body">
            <p></p>
            <?php Pjax::begin(); ?>
            <?php
//            GridView::widget([
//                'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
//                'columns' => [
//                    ['class' => 'yii\grid\SerialColumn'],
//                        'name',
//                        'location',
//                        'phone',
//                        'rfc',
//                        'type_shoes',
//                        'clabe',
//                        ['class' => 'yii\grid\ActionColumn'],
//                    ]
//                ]);

            echo \kartik\grid\GridView::widget([
                'dataProvider'=>$dataProvider,
                'autoXlFormat'=>true,
                'export'=>[
                    'fontAwesome'=>true,
                    'showConfirmAlert'=>false,
                    'target'=> \kartik\grid\GridView::TARGET_BLANK
                ],
                'columns'=>[
                    [
                        'attribute'=>'id',
                        'format'=>'text',
                        'width'=>'100px',
                        'pageSummary'=>'Total'
                    ],
                    [
                        'attribute'=>'name',
                        'format'=>'text',
                        'width'=>'120px'
                    ],
                    [
                        'attribute'=>'location',
                        'format'=>'text',
                        'width'=>'100px'
                    ],
                    [
                        'attribute'=>'phone',
                        'format'=>'text',
                        'hAlign'=>'center',
                        'width'=>'100px'
                    ],
                    [
                        'attribute'=>'rfc',
                        'format'=>'text',
                        'hAlign'=>'right',
                        'width'=>'100px',
                        'pageSummary'=>true
                    ],
                    [
                        'attribute'=>'clabe',
                        'format'=>'text',
                        'hAlign'=>'right',
                        'width'=>'100px',
                        'pageSummary'=>true
                    ]
                ],
                'pjax'=>true,
//                'showPageSummary'=>true,
                'panel'=>[
                    'type'=>'primary',
                    'heading'=>$this->title . Html::a(Yii::t('app', '<i class="fa fa-plus"></i> Agregar'), ['create'], ['class' => 'pull-right btn btn-danger'])
                ]
            ]);
            ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
