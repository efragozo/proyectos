<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Entregables */

$this->title = 'Create Entregables';
$this->params['breadcrumbs'][] = ['label' => 'Entregables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entregables-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
