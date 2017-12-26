
         <!-- Aceptar que el cronograma se ha impreso -->
<div class="proyectos-update">

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyectos */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update3';
?>

    
 <h1><?= Html::encode($this->title) ?></h1>
    
<!-- Renderizamos el formulario -->
    <?= $this->render('_formImpCronoProyecto', [
        'model' => $model,
    ]) ?>

</div>

