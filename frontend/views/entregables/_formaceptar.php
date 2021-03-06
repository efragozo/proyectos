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

<div class="entregables-form text-center">

    <?php $form = ActiveForm::begin([
                        'id' => 'entregables-create-aceptar',
                         'enableAjaxValidation' => true
                        
                      ]);
    ?>
   <?=\insolita\wgadminlte\Alert::widget([
              'type'=>\insolita\wgadminlte\LteConst::TYPE_WARNING,
              'text'=>'¿Seguro que desea aceptar esta tarea?',
    'closable'=>false
     ]);?>
<div class="col-lg-6">
    

    <?= $form->field($model, 'vistoIni')->hiddenInput(['value'=>1])->label(false) ?>
    <?= $form->field($model, 'cfechaRev')->hiddenInput(['value'=>date('Y-m-d H:i:s')])->label(false) ?>
    

    
</div>
<?php
    \insolita\wgadminlte\Alert::begin([
                 'type'=>\insolita\wgadminlte\LteConst::TYPE_SUCCESS,
                 'closable'=>false
             ]);?>
    
    <div class="">    	
        <?= Html::button('Aceptar',['onclick' => '$("#entregables-create-aceptar").submit();','class'=>'btn btn-success']) ?>
    </div>
<?php \insolita\wgadminlte\Alert::end()?>

    <?php ActiveForm::end(); ?>

</div>
