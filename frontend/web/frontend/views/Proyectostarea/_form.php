<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectostarea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectostarea-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTarea')->textInput() ?>

    <?= $form->field($model, 'idProyecto')->textInput() ?>

    <?= $form->field($model, 'horas')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
