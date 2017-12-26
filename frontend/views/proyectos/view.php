<?php

use frontend\models\Clientes;
use frontend\models\Tiposproyectos;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\DetailView;
use frontend\models\Modalidadproy;
use frontend\models\Proyectos;
use frontend\models\Urls;
use frontend\models\Entregables;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectos */

$this->title = $model->nombreProyecto .' - Código: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyectos-view">

    <h1><?php // Html::encode($this->title) ?></h1>

    <p>
        <?php 
       /*  $positivos = count(Entregables::find()->where(['idProyecto'=>$model->id])->andWhere(['estado'=>1])->all());
        $negativos = count(Entregables::find()->where(['idProyecto'=>$model->id])->andWhere(['estado'=>0])->all()); */
        ?>
        <?php /*Html::a('Delete', ['delete', 'id' => $model->id], [
             'class' => 'btn btn-danger',
             'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <div class="col-lg-6">  
    <?php \insolita\wgadminlte\LteBox::begin([
        'type'=>\insolita\wgadminlte\LteConst::TYPE_SUCCESS,
             'isSolid'=>true,
             'boxTools'=>([Html::a('Editar elementos', '#', [
                'id' => '_formFechaInterna',
                'class' => 'btn btn-primary',
                'value' => Yii::$app->urlManager->createUrl('proyectos/update?id='.$model['id']),
                'onclick' => '$("#modal").modal("show")
                             .find("#contenido")
                             .load($(this).attr("value"));
                              $(".modal-lg").css("width","1024px");',])
                 ]),//'<button class="btn btn-success btn-xs create_button" ><i class="fa fa-plus-circle"></i> Editar datos</button>',
             'tooltip'=>'Puede editar los elementos de esta caja',
             'title'=>'Vista general de proyecto',
             'footer'=>'Datos obtenidos',
         ])?>
       <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nombreProyecto',
            
            //'idCliente',
            /*Traemos dependiendo el id del proyecto, el nombre del cliente de la tabla cliente*/
            [
                'attribute'=>'idCliente',
                'value'=> Clientes::findOne($model->idCliente)->nombreCli
            ],
            'fechaCreado',
            //'fechaFinInterna',
            
            //'fechaFin',
            //'tipoProyecto',
           /*Traemos dependiendo el id del proyecto, el tipo de proyecto de la tabla tiposproyectos*/
            [
                'attribute'=>'tipoProyecto',
                'value'=> Tiposproyectos::findOne($model->tipoProyecto)->tipo
            ],
            
            'centroCosto',
            
            [
                'attribute'=>'costo',
                'value' => Yii::$app->formatter->asDecimal($model->costo) 
                
            ],
            //ccof
           /*Traemos dependiendo el id del proyecto, la modalidad del proyecto de la tabla modalidadproy*/
            [
                'attribute'=>'ccof',
                'value'=> Modalidadproy::findOne($model->ccof)->modalidad
            ],
            /*'imprcronograma',
            'cronograma',
            'entregables',*/
            //'finalizado',
            /*En este campo llamamos la funcion proyectoFinalizado y le enviamos por parametro el campo finalizado del modelo a esta función,
             * la cual nos devolvera un string que nos dirá si esta activo o finalizado*/
            
            (count(Entregables::find()->where(['idProyecto'=>$model->id])->andWhere(['estado'=> 0])->all())) >= 1 ?
            [
                'attribute'=>'finalizado',
                'value'=> $model-> proyectoFinalizado($model->finalizado),                
            ]:
            //hacemos un si para ver si el proyecto esta finalizado, si es correcto entonces solo muestra la respuesta, en este caso diria entregado
            (Proyectos::findOne($model->id)->finalizado)==1 ?
            [
                'attribute'=>'finalizado',
                'value'=> $model-> proyectoFinalizado($model->finalizado),
            ]:
            //si el proyecto no ha sido finalizado pero ya todos los entregables estan entregados entonces mostrar� el boton de finalizar.
            [
                'attribute'=>'finalizado',
                'format'=>'raw',
                'value'=> $model-> proyectoFinalizado($model->finalizado).' '.                                           
                 Html::a(' Finalizar', '#', [
                    'id' => '_formFinproyecto',
                    'class' => 'fa fa-pencil',
                    'value' => Yii::$app->urlManager->createUrl('proyectos/update_fin_proyecto?id='.$model['id']),
                    'onclick' => '$("#modal").modal("show")
                         .find("#contenido")
                         .load($(this).attr("value"));
                          $(".modal-lg").css("width","1024px");',]),
            ],            
            //'fechaSolic',
            //'rehabilitado',
        ],
    ]) ?>
    <?php \insolita\wgadminlte\LteBox::end()?>
	</div> 
	<?php $impreso='Impreso'; $noimpreso='No Impreso';?>
	<div class="col-lg-6">  
    <?php \insolita\wgadminlte\LteBox::begin([
        'type'=>\insolita\wgadminlte\LteConst::TYPE_WARNING,
            'isSolid'=>true,
            'boxTools'=>([Html::a('Editar elementos', '#', [
            'id' => '_formFechaInterna',
            'class' => 'btn btn-primary',
            'value' => Yii::$app->urlManager->createUrl('proyectos/update3?id='.$model['id']),
            'onclick' => '$("#modal").modal("show")
                             .find("#contenido")
                             .load($(this).attr("value"));
                              $(".modal-lg").css("width","1024px");',])
            ]),
             'tooltip'=>'this tooltip description',
             'title'=>'Vista general de proyecto',
             'footer'=>'Datos obtenidos',
         ])?>
       <?php 
       //->where(['proyecto' => $model->id])->one();
       $url2= Urls::find()->where(['proyecto' => $model->id])->one();
       ?>
       
       <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'nombreProyecto',
            //'idCliente',
            /* [
                'attribute'=>'idCliente',
                'value'=> Clientes::findOne($model->idCliente)->nombreCli
            ],
            'fechaCreado', */
            //'fechaFinInterna',
            ['attribute'=>'fechaFinInterna',
                'format'=>'raw',
                'value'=>Proyectos::findOne($model->id)->fechaFinInterna.' '.
                    Html::a('', '#', [
                    'id' => '_formFechaInterna',
                    'class' => 'glyphicon glyphicon-pencil',
                    'value' => Yii::$app->urlManager->createUrl('proyectos/update1?id='.$model['id']),
                    'onclick' => '$("#modal").modal("show")
                         .find("#contenido")
                         .load($(this).attr("value"));
                          $(".modal-lg").css("width","1024px");',])
            ],            
            //'fechaFin',
            ['attribute'=>'fechaFin',
                'format'=>'raw',
                'value'=>Proyectos::findOne($model->id)->fechaFin.' '.
                Html::a('', '#', [
                    'id' => '_formFechaFin',
                    'class' => 'glyphicon glyphicon-pencil',
                    'value' => Yii::$app->urlManager->createUrl('proyectos/update2?id='.$model['id']),
                    'onclick' => '$("#modal").modal("show")
                         .find("#contenido")
                         .load($(this).attr("value"));
                          $(".modal-lg").css("width","1024px");',])
            ],
            //'tipoProyecto',
            /* [
                'attribute'=>'tipoProyecto',
                'value'=> Tiposproyectos::findOne($model->tipoProyecto)->tipo
            ],
            'centroCosto',
            'costo', */
            //ccof
            /* [
                'attribute'=>'ccof',
                'value'=> Modalidadproy::findOne($model->ccof)->modalidad
            ], */
            //'imprcronograma',
            /*Aqui mostramos un texto dependiendo del valor que trae la consulta del modelo, 
            con una funcion que esta en el modelo muestra si esta impreso o no el cronograma*/
            (Proyectos::findOne($model->id)->imprcronograma) !== 1 ?
            [
                'attribute'=>'imprcronograma',
                'format'=>'raw',
                'value'=> $model-> imprimeCronograma(Proyectos::findOne($model->id)->imprcronograma).' '.
                     Html::a('', '#', [
                    'id' => '_formImpCronoProyecto',
                    'class' => 'glyphicon glyphicon-saved',
                    'value' => Yii::$app->urlManager->createUrl('proyectos/update_imp_cronograma?id='.$model->id),
                    'onclick' => '$("#modal").modal("show")
                         .find("#contenido")
                         .load($(this).attr("value"));
                          $(".modal-lg").css("width","1024px");',])
            ]:
            [
                'attribute'=>'imprcronograma',
                'format'=>'raw',
                'value'=> $model-> imprimeCronograma(Proyectos::findOne($model->id)->imprcronograma)
            ],
            //'cronograma',            
           
            (Proyectos::findOne($model->id)->cronograma) == 0 ? //este signo de cierre de interrogación significa si o if
            ['attribute'=>'cronograma',
                'format'=>'raw',
                'value'=>Proyectos::findOne($model->id)->cronograma.' '.
                Html::a('', '#', [
                    'id' => '_formFechaFin',
                    'class' => 'glyphicon glyphicon-open',
                    'value' => Yii::$app->urlManager->createUrl('urls/create?id='.$model->id),
                    'onclick' => '$("#modal").modal("show")
                         .find("#contenido")
                         .load($(this).attr("value"));
                          $(".modal-lg").css("width","1024px");',])
            ] : //si no o else, sisgnifican eso dos puntos
            //<a href="<?= Yii::getAlias('@frontHome').'/uploads/'.$model->urlproyecto  ?<" download> Ver Archivo</a>             
            [
                'attribute'=>'cronograma',
                'format'=>'raw',
                'value'=> Html::a('&nbsp;Download',                    
                          Yii::getAlias('@frontHome').'/uploads/'.$url2->urlproyecto, 
                          ['id' => 'descarga-cronograma','class'=>'fa fa-download', 'download'=>true])
            ],
            /* Hacemos el conteo de los entregables pertenecientes a ese proyecto, si hay entregables se mostrara el boton ver entregables, 
             * en caso contrario se mostarar� un boton de subir entregables */
            (count(Entregables::find()->where(['idProyecto'=>$model->id])->all())) >= 1 ? /* iniciamos el SI con el signo "?" */
            [
                'attribute' => 'entregables',
                'format' => 'raw',
                'value' => Html::a(' ver entregables', ['entregables/?id='.$model->id], 
                    ['class' => 'fa fa-eye']).' '.Html::a(' Upload more', '#', [
                        'id' => '_form',
                        'class' => 'fa fa-upload',
                        'value' => Yii::$app->urlManager->createUrl('entregables/create?id='.$model->id),
                        'onclick' => '$("#modal").modal("show")
                         .find("#contenido")
                         .load($(this).attr("value"));
                          $(".modal-lg").css("width","1024px");',]),
                    
                
            ]:/* hacemos un SINO con el signo ":" */
            [
                'attribute' => 'entregables',
                'format' => 'raw',
                'value' => Html::a(' Upload', '#', [
                    'id' => '_form',
                    'class' => 'fa fa-upload',
                    'value' => Yii::$app->urlManager->createUrl('entregables/create?id='.$model->id),
                    'onclick' => '$("#modal").modal("show")
                         .find("#contenido")
                         .load($(this).attr("value"));
                          $(".modal-lg").css("width","1024px");',])
                
            ],/* finalizamos el SI */
            //'finalizado',
            //'fechaSolic',
            ['attribute'=>'fechaSolic',
                'format'=>'raw',
                'value'=>Proyectos::findOne($model->id)->fechaSolic.' '.
                Html::a('', '#', [
                    'id' => '_formFechaOInicio',
                    'class' => 'glyphicon glyphicon-pencil',
                    'value' => Yii::$app->urlManager->createUrl('proyectos/update4?id='.$model['id']),
                    'onclick' => '$("#modal").modal("show")
                         .find("#contenido")
                         .load($(this).attr("value"));
                          $(".modal-lg").css("width","1024px");',])
            ],
            //'rehabilitado',
        ],
    ]) ?>
    <?php \insolita\wgadminlte\LteBox::end()?>
	</div> 
	<?php 
// 	   echo'<pre>';
// 	   print_r(scandir(Yii::getAlias('@frontHome/frontend/web/uploads/')));
	   
	
	?>
	</div>
	<?php
            Modal::begin([
                'id' => 'modal',
                //'header' => '<h4 class="modal-title"></h4>',
                //'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
            ]);
        
         
        echo "<div class='well' id='contenido'></div>";
         
        Modal::end();
        ?>
