<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UrlsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Urls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="urls-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
     <?= Html::a('Subir cronograma', '#', [
                'id' => 'detalle',
                'class' => 'btn btn-success',
                'value' => Yii::$app->urlManager->createUrl('urls/create'),
                'onclick' => '$("#modal").modal("show")
                     .find("#contenido")
                     .load($(this).attr("value"));
                      $(".modal-lg").css("width","1024px");',]);?>
        <?php // Html::a('Create Urls', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'proyecto',
            'urlproyecto:url',
            'urlcronogrma:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
<?php
            Modal::begin([
                'id' => 'modal',
                //'header' => '<h4 class="modal-title"></h4>',
                'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
            ]);
        
         
        echo "<div class='well' id='contenido'></div>";
         
        Modal::end();
        ?>