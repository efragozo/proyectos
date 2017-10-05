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
            'id' => 'proyecto-update2',
            'enableAjaxValidation' => true        
          ]); 
    ?>

    <?= $form->field($model, 'fechaFin')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['placeholder' => 'AAAA-MM-DD','style'=>'width:100%;'],
    ])->label(false)?>
	<!--  -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>