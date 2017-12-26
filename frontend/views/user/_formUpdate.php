<?php

use frontend\models\Tipousuario;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */


$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                
                <?php $data = Tipousuario::find()->all(); 
                       $data = ArrayHelper::map($data, 'id', 'descripcion')
                ?>
                <?= $form->field($model, 'tipoUsuario')->dropDownList($data,['prompt'=>'Select...'],['autofocus' => true]) ?>
            
                <?= $form->field($model, 'first_name')->textInput() ?>
            
                <?= $form->field($model, 'last_name')->textInput() ?>
            
                <?= $form->field($model, 'username')->textInput(/*['autofocus' => true]*/) ?>

                <?= $form->field($model, 'email') ?>

                <b>¿Desea actualizar contraseña?</b>
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Escriba nueva contraseña'])->label(false) ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

    <?php ActiveForm::end(); ?>

</div>
