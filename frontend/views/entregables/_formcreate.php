<?php

use frontend\models\Proyectos;
use frontend\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use phpDocumentor\Reflection\Types\Integer;

/* @var $this yii\web\View */
/* @var $model frontend\models\Entregables */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entregables-form">

    <?php $form = ActiveForm::begin([
                        'id' => 'entregables-create2',
                         'enableAjaxValidation' => true
                        
                      ]);
    ?>
    <div class="col-lg-6">
   
    <!-- Creamos Select con los proyectos -->
    <?= 
    
            
        $form->field($model, 'idProyecto')->widget(Select2::classname(), [
        'name' => 'select2-1',
        'data' => $dataProyecto,          
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => [
            'placeholder' => 'Seleccione uno..'
        ],
        'pluginOptions' => [
        'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>
    
    <?php //$dataUsuario = ArrayHelper::map(User::find()->all(), 'username', 'first_name', 'last_name'); ?>
    <!-- Creamos dropdownlist con los usuarios -->
    <?= $form->field($model, 'usuario')->widget(Select2::classname(), [
        'name' => 'select2-2',
        'data' => $dataUsuario,
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => [
                        'multiple' => false,'placeholder' => 'Select a user ...'
                     ],
        'pluginOptions' => [
        'allowClear' => true
            ],
        ]);
    ?>
    </div>
	<div class="col-lg-6">
     

    <?php //$dataUsuario = ArrayHelper::map(User::find()->all(), 'username', 'first_name', 'last_name'); ?>
    <!-- Creamos dropdownlist con los revisores -->
    <?= $form->field($model, 'revisor')->widget(Select2::classname(), [
        'name' => 'select2-3',
        'data' => $dataUsuario,
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Select a user ...'],
        'pluginOptions' => [
        'allowClear' => true
            ],
        ]);
    ?>
    
    <!-- Agregamos el campo fecha de inicio con el DatePicker -->
    <?= $form->field($model, 'fechaInicio')->widget(DateTimePicker::classname(), [
    //'language' => 'es',
        'name' => 'datetime_1',
        'options' => ['placeholder' => 'AAAA-MM-DD HH:MM:SS','style'=>'width:100%;'],
        'convertFormat' => true,           
        'pluginOptions' => [
            'language' => 'en',
            'autoclose' => true,
            'format' => 'yyyy-MM-dd H:i:s',
        ]
    ])?>
	<!--  -->
    
    <!-- Agregamos el campo fecha de Entrega con el DatePicker -->    
    <?= $form->field($model, 'fechaEntrega')->widget(DateTimePicker::classname(), [
    //'language' => 'es',
        'name' => 'datetime_2',
        'options' => ['placeholder' => 'AAAA-MM-DD HH:MM:SS','style'=>'width:100%;'],
        'convertFormat' => true,
        'pluginOptions' => [
            'language' => 'en',
            'autoclose' => true,
            'format' => 'yyyy-MM-dd H:i:s',
        ]
    ])?>
	<!--  -->   

    <?= $form->field($model, 'tiempoRevision')->input('number') ?>

    <!--<?php // $form->field($model, 'estado')->textInput() ?>

    <?php // $form->field($model, 'vistoIni')->textInput() ?>

    <?php // $form->field($model, 'visto')->textInput() ?>

    <?php // $form->field($model, 'cfechaRev')->textInput() ?>

    <?php // $form->field($model, 'cfechaUsu')->textInput() ?>

    <?php // $form->field($model, 'cambioRev')->textInput() ?>-->
	</div>
    <div class="form-group">
        <?= '&nbsp;&nbsp;&nbsp;&nbsp;'.Html::submitButton($model->isNewRecord ? 'Create2' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
