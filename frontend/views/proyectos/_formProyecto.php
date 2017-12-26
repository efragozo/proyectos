<?php

use frontend\models\Clientes;
use frontend\models\Tiposproyectos;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Modalidadproy;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-form">
<?php $form = ActiveForm::begin([
            'id' => 'proyecto-update',
            'action' => 'update?id='.$model->id,
            'enableAjaxValidation' => true
        
          ]); 
    ?>
<div class="col-lg-6">
    

    <?= $form->field($model, 'nombreProyecto')->textInput(['maxlength' => true]) ?>
    
    <!-- Creamos dropdownlist con los clientes -->
    
    <?= $form->field($model, 'idCliente')->dropDownList($dataCli,['prompt'=>'Select...']);?>
    
    <?php //$form->field($model, 'idCliente')->textInput() ?>

    <?php //$form->field($model, 'fechaCreado')->textInput() ?>

    <?php // $form->field($model, 'fechaFinInterna')->textInput() ?>

    <?php //$form->field($model, 'fechaFin')->textInput() ?>
    
    <!-- Creamos dropdownlist con los tipos de proyectos -->
       
    <?= $form->field($model, 'tipoProyecto')->dropDownList($dataTproy, ['prompt'=>'Select...']);?>
</div>
<div class="col-lg-6">
    <?php //$form->field($model, 'tipoProyecto')->textInput() ?>

    <?= $form->field($model, 'centroCosto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costo')->textInput(['maxlength' => true]) ?>
    
	
    <?= $form->field($model, 'ccof')->dropDownList($dataModalidad,['prompt'=>'Select...']); ?>

    <?php //$form->field($model, 'imprcronograma')->textInput() ?>

    <?php //$form->field($model, 'cronograma')->textInput() ?>

    <?php //$form->field($model, 'entregables')->textInput() ?>

    <?php //$form->field($model, 'finalizado')->textInput() ?>

    <?php //$form->field($model, 'fechaSolic')->textInput() ?>

    <?php //$form->field($model, 'rehabilitado')->textInput() ?>
</div>
    <div class="form-group">
        <?= Html::button('Guardar Cambios',['onclick' => '$("#proyecto-update").submit();','class'=>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
