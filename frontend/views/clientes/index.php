<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ClientesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clíentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= 
            Html::a('Crear Cl&iacute;ente', '#', [
                'id' => 'detalle',
                'class' => 'btn btn-success',
                'value' => Yii::$app->urlManager->createUrl('clientes/create'),
                'onclick' => '$("#modal").modal("show")
                         .find("#contenido")
                         .load($(this).attr("value"));
                          $(".modal-lg").css("width","1024px");',]);
                //Html::a('Create Clientes', ['create'], ['class' => 'btn btn-success']) 
         ?>
         
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombreCli:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
            
            'header' => 'Acciones',
                        'headerOptions' => ['style' => 'color:#337ab7'],
            'template' => '{view}{update}{delete}',
            
            'buttons' => [
                'update' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#',[
                    'id' => 'detalle',
                    //'class' => 'fa fa-pencil',
                    'value' => Yii::$app->urlManager->createUrl('clientes/update?id='.$model['id']),
                    'onclick' => '$("#modal").modal("show")
                                                .find("#contenido")
                                                .load($(this).attr("value"));
                                                $(".modal-dialog ").css("width","1228px");',
                        ]);
                
                },
                
                /*' view' => function ($url, $model) {
                 return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '#',[
                 'id' => 'detalle',
                 //'class' => 'fa fa-eye',
                 'value' => Yii::$app->urlManager->createUrl('proyectos/view?id='.$model['id']),
                 'onclick' => '$("#modal").modal("show")
                 .find("#contenido")
                 .load($(this).attr("value"));
                 $(".modal-lg").css("width","1024px");',
                 ]);
                 
                 }, */
                ],
                
                ],
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
