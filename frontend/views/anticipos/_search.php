<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AnticiposSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anticipos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idProyecto') ?>

    <?= $form->field($model, 'usuario') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'soporte') ?>

    <?php // echo $form->field($model, 'motivo') ?>

    <?php // echo $form->field($model, 'valor') ?>

    <?php // echo $form->field($model, 'solant') ?>

    <?php // echo $form->field($model, 'fechaRecibo') ?>

    <?php // echo $form->field($model, 'fechaLeg') ?>

    <?php // echo $form->field($model, 'leg') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
