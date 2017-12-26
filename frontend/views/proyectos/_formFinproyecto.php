<?php

use frontend\models\Clientes;
use frontend\models\Tiposproyectos;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\Modalidadproy;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-form text-center">
<?php $form = ActiveForm::begin([
            'id' => 'finproyecto',
            'enableAjaxValidation' => true        
          ]); 
    ?>
<?=\insolita\wgadminlte\Alert::widget([
              'type'=>\insolita\wgadminlte\LteConst::TYPE_WARNING,
              'text'=>'¿Seguro que desea finalizar este proyecto?',
    'closable'=>false
     ]);?>
<div class="col-lg-6">
    

    <?= $form->field($model, 'finalizado')->hiddenInput(['value'=>1])->label(false) ?>
    

    
</div>
<?php
    \insolita\wgadminlte\Alert::begin([
                 'type'=>\insolita\wgadminlte\LteConst::TYPE_SUCCESS,
                 'closable'=>false
             ]);?>
    
    <div class="">    	
        <?= Html::button('Aceptar',['onclick' => '$("#finproyecto").submit();','class'=>'btn btn-success']) ?>
    </div>
<?php \insolita\wgadminlte\Alert::end()?>

    <?php ActiveForm::end(); ?>

</div>
