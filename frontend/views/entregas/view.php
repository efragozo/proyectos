<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Entregas */

$this->title = 'Mostrando entrega';
$this->params['breadcrumbs'][] = ['label' => 'Entregas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entregas-view">

    <h1><?php // Html::encode($this->title) ?></h1>

    <p>
        <?php //Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php /*Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>
<div class="col-lg-6">  
<!-- Esta es la primera vista de las actividades -->
<?php \insolita\wgadminlte\LteBox::begin([
        'type'=>\insolita\wgadminlte\LteConst::TYPE_SUCCESS,
            'isSolid'=>true,
             'tooltip'=>'this tooltip description',
             'title'=>'Vista general de la entrega',
             'footer'=>'Datos obtenidos',
  ])?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'idRev',
            'fechaEnvio',
            'descripcion:ntext',
            'ruta',
            'archivo',
            //'observacion:ntext',
        ],
    ]) ?>
<?php \insolita\wgadminlte\LteBox::end()?>
</div>
<div class="col-lg-6">  
<!-- Esta es la primera vista de las actividades -->
<?php \insolita\wgadminlte\LteBox::begin([
        'type'=>\insolita\wgadminlte\LteConst::TYPE_WARNING,
            'isSolid'=>true,
             'tooltip'=>'this tooltip description',
             'title'=>'Vista general de las observaciones',
             'footer'=>'Datos obtenidos',
  ])?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            /* 'idRev',
            'fechaEnvio',
            'descripcion:ntext',
            'ruta',
            'archivo', */
            'observacion:ntext',
        ],
    ]) ?>
<?php \insolita\wgadminlte\LteBox::end()?>
</div>