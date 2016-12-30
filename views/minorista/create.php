<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Minorista */

$this->title = Yii::t('app', 'Create Minorista');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Minoristas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minorista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
