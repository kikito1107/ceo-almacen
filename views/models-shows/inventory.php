<?php
/**
 * Created by PhpStorm.
 * User: saul
 * Date: 22/11/16
 * Time: 12:44
 */
use yii\helpers\Html;
    $this->title = Yii::t('app', 'Gestión de inventario');
$title2 = Yii::t('app', 'Ordenes de pedido');

?>
<div class="provider-index">
    <div class="card">
        <div class="card-heading bg-primary">
            <h4 class="m0 text-capitalize">
                <?= Html::encode($this->title) ?>
            </h4>
        </div>
        <div class="card-body">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <?= Html::a(Yii::t('app', 'Ver inventario'), ['models-shows/'], ['class' => 'btn btn-lg btn-danger']) ?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <?= Html::a(Yii::t('app', 'Agregar modelos a inventario'), ['models-shows/create'], ['class' => 'btn btn-lg btn-danger']) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-heading bg-primary">
            <h4 class="m0 text-">
                <?= Html::encode($title2) ?>
            </h4>
        </div>
        <div class="card-body">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <?= Html::a(Yii::t('app', 'Realizar nueva orden de pedido'), ['models-shows/create'], ['class' => 'btn btn-lg btn-danger']) ?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <?= Html::a(Yii::t('app', 'Validar orden de pedido'), [''], ['class' => 'btn btn-lg btn-danger']) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>