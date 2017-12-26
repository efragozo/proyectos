<?php
$usuarioid = Yii::$app->user->identity->id;
$usernom = Yii::$app->user->identity->username;

use frontend\models\Entregas;
use frontend\models\Permisos;
use frontend\models\Proyectos;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Entregables;
use DeepCopyTest\Matcher\Y;

/* @var $this yii\web\View */
/* @var $model frontend\models\Entregables */

/* Traemos el nombre del proyecto teniendo en cuenta el idProyecto de la tabla entregables */
$dataNomProyecto = Proyectos::findOne($model->idProyecto)->nombreProyecto;
$this->title = $model->codigo .' de '. $dataNomProyecto ;
$this->params['breadcrumbs'][] = ['label' => 'Entregables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if(!Yii::$app->user->isGuest){
/* Taremos el rol del usuario logueado */
$rol = Permisos::find()->select('rol')->where(['idusuario' => $usuarioid]) ->one()->rol;
/* Traemos el revisor que esta asociado a la actividad o entregable del usuario legueado */
$revisor = Entregables::findOne($model->id)->revisor;
/* Creamos un pequeño artilugio para darle un entero a un texto*/
if ( $usernom == $revisor){
    $revisorok=1;
}
    else {
        $revisorok=0;
    }
}
//traemos la fecha actual y la convertimos en una cadena de numeros
$fecha_actual = strtotime(date("Y-m-d H:i:00",time()));
$fecha_entrega = strtotime($model->fechaEntrega,time());

//print_r($revisor.' '.$usernom.' '.$usuarioid);
$entregatarea = Entregables::findOne($model->id)->vistoIni;
?>
<div class="entregables-view">

    <h1><?php //Html::encode($this->title) ?></h1>
    <!-- mostramos el boton si el rol cumple con la especificacion, de lo contrario el boton se inabilita -->
<?php if ($rol<=3){?>
    <p>
        <?= /* Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */'&nbsp;&nbsp;&nbsp;&nbsp;'.Html::a('Editar elementos', '#', [
            'id' => '_form',
            'class' => 'btn btn-primary',
            'value' => Yii::$app->urlManager->createUrl('entregables/update?id='.$model['id']),
            'onclick' => '$("#modal").modal("show")
                             .find("#contenido")
                             .load($(this).attr("value"));
                              $(".modal-lg").css("width","1024px");',])
            ?>
    </p>
 <?php }?>   
<div class="col-lg-6">  
<!-- Esta es la primera vista de las actividades -->
<?php \insolita\wgadminlte\LteBox::begin([
        'type'=>\insolita\wgadminlte\LteConst::TYPE_SUCCESS,
            'isSolid'=>true,
            /* 'boxTools'=>([Html::a('Editar elementos', '#', [
            'id' => '_form',
            'class' => 'btn btn-primary',
            'value' => Yii::$app->urlManager->createUrl('entregables/update?id='.$model['id']),
            'onclick' => '$("#modal").modal("show")
                             .find("#contenido")
                             .load($(this).attr("value"));
                              $(".modal-lg").css("width","1024px");',]) 
            ]),*/
             'tooltip'=>'this tooltip description',
             'title'=>'Vista general de la actividad',
             'footer'=>'Datos obtenidos',
  ])?>
<!-- Mostramos una tabla detalle con cada uno de los campos requeridos  -->
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        [
           'attribute' => 'idProyecto',
            'value' => $dataNomProyecto
        ],
        'codigo',
        'nombre',
        'categoria',
        'usuario',
        'revisor',
        'fechaInicio',
     /* 'fechaEntrega',
        'tiempoRevision',
        'estado',
        'vistoIni',
        'visto',
        'cfechaRev',
        'cfechaUsu',
        'cambioRev', */
        ],
    ]) 
?>
<?php \insolita\wgadminlte\LteBox::end()?>
</div>

<div class="col-lg-6">  
<!-- Esta es la segunda vista de las actividades -->
<?php \insolita\wgadminlte\LteBox::begin([
        'type'=>\insolita\wgadminlte\LteConst::TYPE_PRIMARY,
            'isSolid'=>true,
            'boxTools'=>([Html::a('Entregar esta tarea', '#', [
            'id' => '_form',
            'class' => 'btn btn-primary',
            'value' => Yii::$app->urlManager->createUrl('entregas/create?id='.$model->id),
            'onclick' => '$("#modal").modal("show")
                             .find("#contenido")
                             .load($(this).attr("value"));
                              $(".modal-lg").css("width","80%");',])
            ]), 
             'tooltip'=>'this tooltip description',
             'title'=>'Vista general de la actividad',
             'footer'=>'Datos obtenidos',
  ])?>
<!-- En esta parte mostramos los diferentes campos que vienen del modelo una lista de detalle -->
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          /* 'id',
            'idProyecto',
            'codigo',
            'nombre',
            'categoria',
            'usuario',
            'revisor',
            'fechaInicio', */
            'fechaEntrega',
            [
                'attribute'=>'tiempoRevision',
                'value'=> $model->tiempoRevision. ' Horas'
            ],
            //'tiempoRevision',           
            /*En este campo llamamos la funcion entregaFinalizada y le enviamos por parametro el campo estado del modelo a esta funciÃ³n,
             * la cual nos devolvera un string que nos dirÃ¡ si esta activa o finalizado.
             * Tambien dependiendo de la condicion mostramso un boton Aceptar, Devolver, esto solo será visto por el revisor o por los coordinadores y admin*/
            ($model -> resultarea($entregatarea, $revisorok) ==1 )? 
            [
                'attribute'=>'estado',
                'format'=>'raw',
                'value'=> $model-> entregaFinalizada($model->estado).' '.
                 Html::a(' Aceptar', '#', [
                    'id' => '_formaceptar',
                    'class' => 'fa fa-check',
                    'value' => Yii::$app->urlManager->createUrl('entregables/update_aceptar?id='.$model['id']),
                    'onclick' => '$("#modal").modal("show")
                         .find("#contenido")
                         .load($(this).attr("value"));
                          $(".modal-lg").css("width","1024px");',]).'  '.
                Html::a(' Devolver', '#', [
                    'id' => '_formdevolver',
                    'class' => 'fa fa-mail-reply',
                    'value' => Yii::$app->urlManager->createUrl('entregables/update_devolver?id='.$model['id']),
                    'onclick' => '$("#modal").modal("show")
                         .find("#contenido")
                         .load($(this).attr("value"));
                          $(".modal-lg").css("width","1024px");',]).' '.
                Html::a(' Seguimiento', ['entregas/?id='.$model->id],
                    ['class' => 'fa fa-eye']),
            ]:            
            [
                'attribute'=>'estado', 
                'format'=>'raw',
                'value'=> $model-> entregaFinalizada($model->estado).' '.
                    Html::a(' Seguimiento', ['entregas/?id='.$model->id],
                    ['class' => 'fa fa-eye']),
            ],
            [
                'attribute'=>'fechaEntrega','label'=>'Tiempo de entrega',
                'format'=>'raw',
                'class'=>'box box-success',                
                'value'=> $model->comparefecha($model->estado,$fecha_entrega, $fecha_actual),
                
            ],
            //'vistoIni',
            //'visto',
            //'cfechaRev',
            //'cfechaUsu',
            //'cambioRev',
        ],
    ]) ?>
<?php \insolita\wgadminlte\LteBox::end()?>
</div>

</div>
<!-- Traemos las propiedades de las funciones modal de boostrap, lo cual nos permitirá mostrar ventanas modal -->
    <?php
            Modal::begin([
                'id' => 'modal',
                //'header' => '<h4 class="modal-title"></h4>',
                //'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
            ]);
            
             
            echo "<div class='well' id='contenido'></div>";
             
            Modal::end();
    ?>
