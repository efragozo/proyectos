<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombreProyecto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idCliente')->textInput() ?>

    <?= $form->field($model, 'fechaCreado')->textInput() ?>

    <?= $form->field($model, 'fechaFinInterna')->textInput() ?>

    <?= $form->field($model, 'fechaFin')->textInput() ?>

    <?= $form->field($model, 'tipoProyecto')->textInput() ?>

    <?= $form->field($model, 'centroCosto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ccof')->textInput() ?>

    <?= $form->field($model, 'imprcronograma')->textInput() ?>

    <?= $form->field($model, 'cronograma')->textInput() ?>

    <?= $form->field($model, 'entregables')->textInput() ?>

    <?= $form->field($model, 'finalizado')->textInput() ?>

    <?= $form->field($model, 'fechaSolic')->textInput() ?>

    <?= $form->field($model, 'rehabilitado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
