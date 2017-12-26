<?php

use frontend\models\Entregables;
use frontend\models\Permisos;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Entregas */
/* @var $form yii\widgets\ActiveForm */
?> 

<div class="entregas-form">

    <?php $form = ActiveForm::begin([
                        'id' => 'entregas-create',
                         'enableAjaxValidation' => true                        
                      ]); ?>     
    
     
   
    
    <?php //$form->field($model, 'idRev')->textInput(['readonly'=>true]) ?>
    
    <?php // $form->field($model, 'idEntregable')->textInput(['readonly'=>true]) ?>

    <?php // $form->field($model, 'fechaEnvio')->hiddenInput(['value'=>date('Y-m-d H:i:s')])->label(false) ?>
    
    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6, 'readonly'=>true]) ?>
	   
    <?php // $form->field($model, 'ruta')->textInput(['maxlength' => true, 'readonly'=>true]) ?>

    <?php // $form->field($model, 'archivo')->textInput(['maxlength' => true, 'readonly'=>true]) ?>    

 	<?= $form->field($model, 'observacion')->textarea(['rows' => 6]) ?>
 		
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
