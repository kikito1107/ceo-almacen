<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mayorista */

$this->title = Yii::t('app', 'Create Mayorista');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mayoristas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mayorista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
