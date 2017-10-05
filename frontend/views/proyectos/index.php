<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProyectosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyectos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyectos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= 
            Html::a('Crear Proyecto', '#', [
                'id' => 'detalle',
                'class' => 'btn btn-success',
                'value' => Yii::$app->urlManager->createUrl('proyectos/create'),
                'onclick' => '$("#modal").modal("show")
                     .find("#contenido")
                     .load($(this).attr("value"));
                      $(".modal-lg").css("width","1024px");',]);
            /*Html::a('Create Proyectos', ['create'], ['class' => 'btn btn-success'])*/ 
            ?>
    </p>
    <?php Pjax::begin(); ?>    
    <?= GridView::widget([
            
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,                
                'columns' => [                
                   ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    'nombreProyecto',
                    //'idCliente',
                    [
                        'attribute'=>'idCliente',
                        'value'=>'clientes.nombreCli'
                    ],
                    'fechaCreado',
                    'fechaFinInterna',
                    // 'fechaFin',
                    // 'tipoProyecto',
                    // 'centroCosto',
                    // 'ccof',
                    // 'imprcronograma',
                    // 'cronograma',
                    // 'entregables',
                    // 'finalizado',
                    // 'fechaSolic',
                    // 'rehabilitado',
                    //                     
                    [
                        'class' => 'yii\grid\ActionColumn',
                        /*Podemos asignar el nombre de dicha columna, color y si
                         * indicamos el template los botones que se van a renderizar
                         */
                        'header' => 'Acciones',
                        'headerOptions' => ['style' => 'color:#337ab7'],
                        'template' => '{view}{update}{delete}',
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
                                'value' => Yii::$app->urlManager->createUrl('proyectos/update?id='.$model['id']),
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
                    
                    
                        ['class' => 'yii\grid\CheckboxColumn']
                        
                        
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


