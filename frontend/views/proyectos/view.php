<?php

use frontend\models\Clientes;
use frontend\models\Tiposproyectos;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use frontend\models\Modalidadproy;
use frontend\models\Proyectos;
use frontend\models\Urls;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectos */

$this->title = $model->nombreProyecto;
$this->params['breadcrumbs'][] = ['label' => 'Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyectos-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'costo',
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
            [
                'attribute'=>'finalizado',
                'value'=> $model-> proyectoFinalizado($model->finalizado),                
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
                Html::a('Subir cronograma', '#', [
                    'id' => '_formFechaFin',
                    'class' => 'btn btn-success',
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
            'entregables',
            //'finalizado',
            'fechaSolic',
            'rehabilitado',
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
                'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
            ]);
        
         
        echo "<div class='well' id='contenido'></div>";
         
        Modal::end();
        ?>
