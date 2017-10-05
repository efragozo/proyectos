<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EntregasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entregas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idRev') ?>

    <?= $form->field($model, 'fechaEnvio') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'ruta') ?>

    <?php // echo $form->field($model, 'archivo') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
