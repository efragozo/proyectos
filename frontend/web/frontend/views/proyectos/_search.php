<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProyectosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombreProyecto') ?>

    <?= $form->field($model, 'idCliente') ?>

    <?= $form->field($model, 'fechaCreado') ?>

    <?= $form->field($model, 'fechaFinInterna') ?>

    <?php // echo $form->field($model, 'fechaFin') ?>

    <?php // echo $form->field($model, 'tipoProyecto') ?>

    <?php // echo $form->field($model, 'centroCosto') ?>

    <?php // echo $form->field($model, 'costo') ?>

    <?php // echo $form->field($model, 'ccof') ?>

    <?php // echo $form->field($model, 'imprcronograma') ?>

    <?php // echo $form->field($model, 'cronograma') ?>

    <?php // echo $form->field($model, 'entregables') ?>

    <?php // echo $form->field($model, 'finalizado') ?>

    <?php // echo $form->field($model, 'fechaSolic') ?>

    <?php // echo $form->field($model, 'rehabilitado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
