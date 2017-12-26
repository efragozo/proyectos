<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Entregables */

$this->title = 'Subida Excel';
$this->params['breadcrumbs'][] = ['label' => 'Entregables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entregables-create">

    <?= $this->render('_subidaExcel', [
        'model' => $model,
        'envio' => $envio
    ]) ?>

</div> 
