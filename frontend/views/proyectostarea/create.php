<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectostarea */

$this->title = 'Create Proyectostarea';
$this->params['breadcrumbs'][] = ['label' => 'Proyectostareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyectostarea-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
