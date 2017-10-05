<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tipousuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipousuario-form">

    <?php $formulario = ActiveForm::begin([
            'id' => 'formulario-creacion',
            'enableAjaxValidation' => true,
            'enableClientValidation' => false
    ]); ?>

    
    
    <div class="col-lg-4">
        <?= $formulario->field($model, 'descripcion')->textInput([
                'id' => 'campo-descripcion',

               // 'required' => true
        ]) ?>




        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
     </div>  
    <?php ActiveForm::end(); ?>

</div>
