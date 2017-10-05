<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Urls */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="urls-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'proyecto')->textInput() ?>

    <?= $form->field($model, 'urlproyecto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urlcronogrma')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
