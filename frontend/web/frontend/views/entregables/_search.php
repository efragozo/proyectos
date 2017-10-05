<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EntregablesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entregables-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idProyecto') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'categoria') ?>

    <?php // echo $form->field($model, 'usuario') ?>

    <?php // echo $form->field($model, 'revisor') ?>

    <?php // echo $form->field($model, 'fechaInicio') ?>

    <?php // echo $form->field($model, 'fechaEntrega') ?>

    <?php // echo $form->field($model, 'tiempoRevision') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'vistoIni') ?>

    <?php // echo $form->field($model, 'visto') ?>

    <?php // echo $form->field($model, 'cfechaRev') ?>

    <?php // echo $form->field($model, 'cfechaUsu') ?>

    <?php // echo $form->field($model, 'cambioRev') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
