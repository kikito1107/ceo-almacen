<?php

use app\models\Provider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MarkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Marcas');
?>
<?php
    $providers = Provider::find()->asArray()->all();
    $data = [];
    foreach ($providers as $provider){
        array_push($data, $provider["name"]);
    }
?>
<div class="mark-index">
    <div class="card">
        <div class="card-heading bg-primary">
            <h4 class="m0 text-capitalize">
                <?= Html::encode($this->title) ?>
                <?= Html::a(Yii::t('app', '<i class="fa fa-plus"></i> Agregar'), ['create'], ['class' => 'pull-right btn btn-danger']) ?>
            </h4>
        </div>
        <div class="card-body">
            <p></p>
            <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
//                        'id',
                        'name',
                        [
                            'attribute' =>'provider_id',
                            'value' => function ($model){
                                return $model->provider->name;
                            }
                        ],
//                        'provider_id',
                        'clabe',
                        //'update_date',
                        // 'create_date',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
