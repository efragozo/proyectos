<?php

use dosamigos\switchinput\SwitchBox;
use frontend\models\Clientes;
use frontend\models\Tiposproyectos;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Modalidadproy;
use frontend\models\Proyectos;
use kartik\date\DatePicker;
use kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectos */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="proyectos-form"> 
        	<?php $form = ActiveForm::begin([
                    'id' => 'proyecto-update3',
                    'enableAjaxValidation' => true        
                  ]); 
            ?>  
<div class="col-lg-6">
    
    <?php  //$form->field($model, 'finalizado')->textInput() ?>     
           
    <?= $form->field($model, 'imprcronograma')->widget(SwitchInput::className(),[                
        'name' => 'switch1', 
        'pluginOptions' => [
            'handleWidth'=>80,
            'onColor' => 'success',
            'offColor' => 'warning',
            'onText' => 'Impreso',
            'offText' => 'No Impreso',
                ]
            ])
     ?>

    <?= $form->field($model, 'cronograma')->textInput() ?>
 	
    <?= $form->field($model, 'entregables')->textInput() ?>
</div>
<div class="col-lg-6">
    <?php //$form->field($model, 'finalizado')->textInput()?>
    	
    <!-- Utilizamos kartik/date para usar DatePicker -->
    <?= $form->field($model, 'fechaSolic')->widget(DatePicker::classname(), [
    //'language' => 'es',
        'name' => 'datetime_1',
        'options' => ['placeholder' => 'AAAA-MM-DDS','style'=>'width:100%;'],
        'convertFormat' => true,           
        'pluginOptions' => [
            'language' => 'en',
            'autoclose' => true,
            'format' => 'yyyy-MM-dd',
        ],
         ])
    ?>
	<!-- fin de este control -->
	
	<!-- Utilizamos kartik/date para usar DatePicker -->
    <?= $form->field($model, 'rehabilitado')-> widget(DatePicker::classname(), [
    //'language' => 'es',
        'name' => 'datetime_1',
        'options' => ['placeholder' => 'AAAA-MM-DDS','style'=>'width:100%;'],
        'convertFormat' => true,           
        'pluginOptions' => [
            'language' => 'en',
            'autoclose' => true,
            'format' => 'yyyy-MM-dd',
        ],
         ])
    
    ?> 
</div>
	<!-- Fin de este control -->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
   

</div>
