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
<div class="col-lg-6">
    <?php $form = ActiveForm::begin([
            'id' => 'proyecto-update',
            'enableAjaxValidation' => true
        
          ]); 
    ?>

    <?= $form->field($model, 'nombreProyecto')->textInput(['maxlength' => true]) ?>
    
    <!-- Creamos dropdownlist con los clientes -->
    <?php $dataCli = Clientes::find()->all(); $dataCli = ArrayHelper::map($dataCli, 'id', 'nombreCli')?>
    <?= $form->field($model, 'idCliente')->dropDownList($dataCli,['prompt'=>'Select...']);?>
    
    <?php //$form->field($model, 'idCliente')->textInput() ?>

    <?php //$form->field($model, 'fechaCreado')->textInput() ?>

    <?php // $form->field($model, 'fechaFinInterna')->textInput() ?>

    <?php //$form->field($model, 'fechaFin')->textInput() ?>
    
    <!-- Creamos dropdownlist con los tipos de proyectos -->
    <?php $dataTproy = Tiposproyectos::find()->all(); $dataTproy = ArrayHelper::map($dataTproy, 'id', 'tipo')?>    
    <?= $form->field($model, 'tipoProyecto')->dropDownList($dataTproy, ['prompt'=>'Select...']);?>
    </div>
<div class="col-lg-6">
    <?php //$form->field($model, 'tipoProyecto')->textInput() ?>

    <?= $form->field($model, 'centroCosto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costo')->textInput(['maxlength' => true]) ?>
    
	<?php $dataModalidad = Modalidadproy::find()->all(); $dataModalidad = ArrayHelper::map($dataModalidad, 'ccof', 'modalidad')?>
    <?= $form->field($model, 'ccof')->dropDownList($dataModalidad,['prompt'=>'Select...']); ?>

    <?php //$form->field($model, 'imprcronograma')->textInput() ?>

    <?php //$form->field($model, 'cronograma')->textInput() ?>

    <?php //$form->field($model, 'entregables')->textInput() ?>

    <?php //$form->field($model, 'finalizado')->textInput() ?>

    <?php //$form->field($model, 'fechaSolic')->textInput() ?>

    <?php //$form->field($model, 'rehabilitado')->textInput() ?>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
