<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ModalidadProy */

$this->title = 'Update Modalidad Proy: ' . $model->ccof;
$this->params['breadcrumbs'][] = ['label' => 'Modalidad Proys', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ccof, 'url' => ['view', 'id' => $model->ccof]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modalidad-proy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
