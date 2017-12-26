<?php

use frontend\models\Proyectos;
use frontend\models\User;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Html;
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
                'id' => 'entregables-create',
                 'enableAjaxValidation' => false
       ]);
    ?>
    
    <?= $form->field($model, 'excel')->fileInput() ?>
    <?= Html::submitButton('Enviar') ?>
<?php ActiveForm::end()?>    
    <br>
    <?php if(count($envio) !==0): ?> 
    <?php  echo '<p>Se han encontrado errores al procesar su solicitud, abajo encontrará una descripción detallada, por favor corregir.</p><br>'; ?>
    <?php foreach ($envio as$key => $value): ?>
    <?= $value.'<br>';?>    
    
    <?php endforeach;?>
    <br><input type="button" onclick="location.reload();" value="Reintentar" />
    <?php endif;?>

</div>
