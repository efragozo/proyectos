<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Anticipos */

$this->title = 'Create Anticipos';
$this->params['breadcrumbs'][] = ['label' => 'Anticipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anticipos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
