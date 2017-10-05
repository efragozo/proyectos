<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Entregables */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entregables-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idProyecto')->textInput() ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usuario')->textInput() ?>

    <?= $form->field($model, 'revisor')->textInput() ?>

    <?= $form->field($model, 'fechaInicio')->textInput() ?>

    <?= $form->field($model, 'fechaEntrega')->textInput() ?>

    <?= $form->field($model, 'tiempoRevision')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'vistoIni')->textInput() ?>

    <?= $form->field($model, 'visto')->textInput() ?>

    <?= $form->field($model, 'cfechaRev')->textInput() ?>

    <?= $form->field($model, 'cfechaUsu')->textInput() ?>

    <?= $form->field($model, 'cambioRev')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
