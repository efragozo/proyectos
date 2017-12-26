<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\widgets\Pjax;
use frontend\models\Entregas;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EntregasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Entregas';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php 
/* $entregas = Entregas::find();
print_r($entregas); */
?>
<div class="entregas-index">

    <h1><?php //Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //Html::a('Create Entregas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box box-success">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'idRev',
            'fechaEnvio',
            'descripcion:ntext',
            'ruta',
            // 'archivo',
            // 'observacion:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acciones',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{view}{update}',
                /*
                 * Una vez establecido los botones se procede a configurar con un callback
                 * Obteniendo dos argumentos , la url que se guarda mediante el return
                 * O cualquier otra cosa, y el modelo
                 * */
                
                'buttons' => [
                    'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#',[
                        'id' => '_formProyecto',
                        //'class' => 'fa fa-pencil',
                        'value' => Yii::$app->urlManager->createUrl('entregas/update?id='.$model['id']),
                        'onclick' => '$("#modal").modal("show")
                                                .find("#contenido")
                                                .load($(this).attr("value"));
                                                $(".modal-dialog ").css("width","80%");',
                    ]);
                    
                    },]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div></div>
<?php
            Modal::begin([
                'id' => 'modal',
                //'header' => '<h4 class="modal-title"></h4>',
                'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
            ]);
        
         
        echo "<div class='well' id='contenido'></div>";
         
        Modal::end();
        ?>
