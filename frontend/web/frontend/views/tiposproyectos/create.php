<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TiposProyectos */

$this->title = 'Create Tipos Proyectos';
$this->params['breadcrumbs'][] = ['label' => 'Tipos Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipos-proyectos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
