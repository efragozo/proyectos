<?php

use frontend\models\Proyectos;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\Urls */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="urls-form">

    <?php $form = ActiveForm::begin([
            'id' => 'proyecto-update',
            'enableAjaxValidation' => true,
            'options' => ['enctype' => 'multipart/form-data'],        
          ]); 
    ?>

	<h3><?= 'Proyecto Id: ' . $id?></h3>
    <?= $form->field($model, 'proyecto')->hiddenInput(['value' => $id])->label(false) ?>

	<a href="<?= Yii::getAlias('@frontHome').'/uploads/'.$model->urlproyecto?>" download> Ver Archivo</a>
    <?= $form->field($model, 'urlproyecto')->widget(FileInput::classname(), [
            'options' => ['accept' => 'upload/*', 'required' => true],
            'pluginOptions'=>['allowedFileExtensions'=>['mpp','pdf'],'showUpload' => false,],
        ]);?>

    <?= $form->field($model, 'urlcronogrma')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
