<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectos */

$this->title = 'Create Proyectos';
$this->params['breadcrumbs'][] = ['label' => 'Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyectos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formProyectoCrear', [
        'model' => $model,
        'dataTproy' => $dataTproy,
        'dataCli' => $dataCli,
        'dataModalidad' => $dataModalidad
    ]) ?>

</div>
