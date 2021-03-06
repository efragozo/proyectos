<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectos */

$this->title = 'Update Proyectos: ' . $model->nombreProyecto;
$this->params['breadcrumbs'][] = ['label' => 'Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proyectos-update">
 <h1><?= Html::encode($this->title) ?></h1>    
    <!-- Renderizamos el formulario -->
    <?= $this->render('_formProyecto', [
        'model' => $model,
        'dataTproy' => $dataTproy,
        'dataCli' => $dataCli,
        'dataModalidad' => $dataModalidad
    ]) ?>
    
   

</div>
