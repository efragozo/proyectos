<?php

use frontend\models\Permisos;
use kartik\dialog\Dialog;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EntregablesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Entregables';
$this->params['breadcrumbs'][] = $this->title;

$usuarioid = Yii::$app->user->identity->id;
$rol = Permisos::find()->select('rol')->where(['idusuario' => $usuarioid]) ->one()->rol;
?>
<div class="entregables-index">

    <h1><?php //Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php 
    
    if ($rol<=3){     
    
    ?>
    <p>
        <?= 
            Html::a('Crear tareas desde Excel', '#', [
                'id' => 'detalle',
                'class' => 'btn btn-success',
                'value' => Yii::$app->urlManager->createUrl('entregables/create2'),
                'onclick' => '$("#modal").modal("show")
                     .find("#contenido")
                     .load($(this).attr("value"));
                      $(".modal-lg").css("width","80%");',]);
            /*Html::a('Create Proyectos', ['create'], ['class' => 'btn btn-success'])*/ 
            ?>
    </p>
    <?php } ?>
    <div class="box box-success">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'idProyecto',
            'codigo',
            'nombre',
            'categoria',
            'usuario',
            'revisor',
            // 'fechaInicio',
            // 'fechaEntrega',
            // 'tiempoRevision',
            //'estado',
            // 'vistoIni',
            // 'visto',
            // 'cfechaRev',
            // 'cfechaUsu',
            // 'cambioRev',
            /* Especificamos el tipo de rol, si el rol que me trae la consulta es menor igual a 3 entonces pueden editar y eliminar, si no solo pueden ver */
            $rol<=3 ?
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
                        'value' => Yii::$app->urlManager->createUrl('entregables/update?id='.$model['id']),
                        'onclick' => '$("#modal").modal("show")
                                                .find("#contenido")
                                                .load($(this).attr("value"));
                                                $(".modal-dialog ").css("width","80%");',
                    ]);
                    
                    },
                    Dialog::widget(['overrideYiiConfirm' => true]).
                    'delete' => function($url, $model){
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                        'class' => '',
                        'data' => [
                            'confirm' => 'Are you absolutely sure ? You will lose all the information about this task with this action.',
                            'method' => 'post',
                        ],
                    ]);
                    }
                    ],
                
            ]:
            [
                'class' => 'yii\grid\ActionColumn',
                /*Podemos asignar el nombre de dicha columna, color y si
                 * indicamos el template los botones que se van a renderizar
                 */
                'header' => 'Acciones',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{view}',
                 /*
                 * Una vez establecido los botones se procede a configurar con un callback
                 * Obteniendo dos argumentos , la url que se guarda mediante el return
                 * O cualquier otra cosa, y el modelo
                 * */             
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
