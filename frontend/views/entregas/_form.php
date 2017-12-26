<?php

use frontend\models\Entregables;
use frontend\models\Permisos;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Entregas */
/* @var $form yii\widgets\ActiveForm */
?>
 <?php 
             /* guardamos el id del usuario logueado */
             $usuarioid = Yii::$app->user->identity->id;
             $usuarionombre = Yii::$app->user->identity->username;
             /* Consulta con menor igual que $rol = Permisos::find()->select('rol')->where(['idusuario' => $usuarioid]) ->andWhere(['AND','rol' <= 3])-> one()->rol; */
             $rol = Permisos::find()->select('rol')->where(['idusuario' => $usuarioid]) ->one()->rol;
             //echo 'Permiso '.$usuarioid . ' rol: ' .$permiso;
             //$dato = Yii::$app->user->identity->tipoUsuario;
        
           
         ?>

<div class="entregas-form">

    <?php $form = ActiveForm::begin([
                        'id' => 'entregas-create',
                         'enableAjaxValidation' => true                        
                      ]); ?>      
    
     
   
    
    <?= $form->field($model, 'idRev')->hiddenInput(['value'=>$entregables->revisor])->label(false) ?>
    
    <?= $form->field($model, 'idEntregable')->hiddenInput(['value'=>$entregables->id])->label(false) ?>

    <?= $form->field($model, 'fechaEnvio')->hiddenInput(['value'=>date('Y-m-d H:i:s')])->label(false) ?>
<?php 
if ($usuarionombre == $entregables->usuario){  
?>
    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6, 'placeholder' => "Descripción de la entrega"]) ?>
<?php }else {?> 
    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6, 'readonly'=>true]) ?>
<?php }?>	   
    <?= $form->field($model, 'ruta')->textInput(['maxlength' => true,'placeholder' => "\\workstation\proyecto\carpeta\archivo"]) ?>

    <?= $form->field($model, 'archivo')->textInput(['maxlength' => true, 'placeholder'=>"nombre-archivo.(dwg,docx,xlsx, etc)"]) ?>
    
<?php 
if ($usuarionombre == $entregables->revisor){  
?>
 	<?= $form->field($model, 'observacion')->textarea(['rows' => 6, 'placeholder'=>"Observaciones por parte del revisor"]) ?>
<?php }else {?>
 	<?= $form->field($model, 'observacion')->textarea(['rows' => 6, 'readonly'=>true, 'placeholder'=>"Observaciones por parte del revisor"]) ?>
<?php }?>	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
