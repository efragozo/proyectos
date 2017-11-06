<?php

use dosamigos\switchinput\SwitchBox;
use frontend\models\Clientes;
use frontend\models\Tiposproyectos;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Modalidadproy;
use frontend\models\Proyectos;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectos */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="proyectos-form col-lg-12"> 
        	<?php $form = ActiveForm::begin([
                    'id' => 'proyecto-update3',
                    'enableAjaxValidation' => true        
                  ]); 
            ?>  
<div class="col-md-6">
    
    <?php //$form->field($model, 'finalizado')->textInput() ?>
     
           <?php 
            	echo '<b> <br>';
                    echo "¿El Cronograma se ha impreso?";
                echo '</b><br>';
        	?>
    <?= $form->field($model, 'imprcronograma')->widget(SwitchBox::className(),[                
            'options' => [
                'label' => false
            ],
            'name' => 'tags_mode', 'checked' => true, 
            'clientOptions' => [
                'size' => 'large', 
                'onColor' => 'success', 
                'offColor' => 'warning', 
                'onText' => 'Impreso', 
                'offText' => 'No Imp.',]      
            ])->label(false);
     ?>

    <?= $form->field($model, 'cronograma')->textInput() ?>
 	
    <?= $form->field($model, 'entregables')->textInput() ?>
    </div>
    <div class="col-md-6">
    <?php //$form->field($model, 'finalizado')->textInput() ?>
    	<?php 
        	echo '<b><br>';
                echo 'Fecha Orden de Inicio';
            echo '</b><br>';
    	?>
	<!-- Utilizamos jui para usar DatePicker -->
    <?= $form->field($model, 'fechaSolic')->widget(\yii\jui\DatePicker::classname(), [
        //'language' => 'es',
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['placeholder' => 'AAAA-MM-DD','style'=>'width:100%;'],
         ])->label(false)
    ?>
	<!-- fin de este control -->
	<!-- Usamos el siuiente codigo para agregar una descripción al campo -->
	<?php 
    	echo '<b>';
            echo 'Reactivar el proyecto';
        echo '</b><br>';
	?>
	<!-- Utilizamos jui para usar DatePicker -->
    <?= $form->field($model, 'rehabilitado')-> widget(\yii\jui\DatePicker::classname(), [
        //'language' => 'es',
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['placeholder' => 'AAAA-MM-DD','style'=>'width:100%;'],
         ])->label(false)
    
    ?>
	<!-- Fin de este control -->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>

</div>
