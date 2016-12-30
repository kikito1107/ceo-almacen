<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $model app\models\Provider */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Providores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="provider-view">
    <div class="card card-default">
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
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
//                    'id',
                    'name',
                    'location',
                    'phone',
                    'descuento',
                    'rfc',
                    'acount_name',
                    'acount',
                    'interbank_clabe',
                    'bank',
                    'type_shoes',
//                    'status',
                    'clabe',
                    'agent_name',
                    'agent_phone',
                    'agent_mail' ,
                    'update_date',
                    'create_date'

                ],
            ]) ?>
        </div>
    </div>    
</div>
