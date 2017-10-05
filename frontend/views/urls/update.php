<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Urls */

$this->title = 'Update Urls: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Urls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="urls-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update', [
        'model' => $model,
        'id' =>  $id
    ]) ?>

</div>
