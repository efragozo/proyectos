<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Anticipos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anticipos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idProyecto')->textInput() ?>

    <?= $form->field($model, 'usuario')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'tipo')->textInput() ?>

    <?= $form->field($model, 'soporte')->textInput() ?>

    <?= $form->field($model, 'motivo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'valor')->textInput() ?>

    <?= $form->field($model, 'solant')->textInput() ?>

    <?= $form->field($model, 'fechaRecibo')->textInput() ?>

    <?= $form->field($model, 'fechaLeg')->textInput() ?>

    <?= $form->field($model, 'leg')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
