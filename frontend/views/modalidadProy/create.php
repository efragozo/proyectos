<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ModalidadProy */

$this->title = 'Create Modalidad Proy';
$this->params['breadcrumbs'][] = ['label' => 'Modalidad Proys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modalidad-proy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
