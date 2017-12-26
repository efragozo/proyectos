<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\Tipousuario;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?php //Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row box box-success">
        <div class="col-md-12 .col-md-offset-6">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
               <div  class="col-lg-6">
                <?php $data = Tipousuario::find()->all(); 
                       $data = ArrayHelper::map($data, 'id', 'descripcion')
                ?>
                <?= $form->field($model, 'tipoUsuario')->dropDownList($data,['prompt'=>'Select...'],['autofocus' => true]) ?>
            
                <?= $form->field($model, 'first_name')->textInput() ?>
            
                <?= $form->field($model, 'last_name')->textInput() ?>
            	</div>
            	<div  class="col-lg-6"> 
                <?= $form->field($model, 'username')->textInput(/*['autofocus' => true]*/) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
				</div>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
