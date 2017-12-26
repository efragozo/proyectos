<?php

use frontend\models\Clientes;
use frontend\models\Tiposproyectos;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Modalidadproy;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-form">

    <?php $form = ActiveForm::begin([
            'id' => 'proyecto-update1',
            'enableAjaxValidation' => true        
          ]); 
    ?>

    <?= $form->field($model, 'fechaSolic')->widget(DatePicker::classname(), [
    //'language' => 'es',
        'name' => 'datetime_1',
        'options' => ['placeholder' => 'AAAA-MM-DDS','style'=>'width:100%;'],
        'convertFormat' => true,           
        'pluginOptions' => [
            'language' => 'en',
            'autoclose' => true,
            'format' => 'yyyy-MM-dd',
        ]
    ])?>
	<!--  -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>