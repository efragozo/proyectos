<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Entregables */

$this->title = 'Update Entregables: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Entregables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entregables-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formupdate', [
        'model' => $model,
        'dataUsuario' => $dataUsuario,
        'dataProyecto' => $dataProyecto
    ]) ?>

</div>
