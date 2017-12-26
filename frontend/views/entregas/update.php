<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Entregas */

$this->title = 'Update Entregas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Entregas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entregas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formupdate_entregas', [
        'model' => $model,        
    ]) ?>

</div>
