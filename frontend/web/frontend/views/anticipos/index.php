<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AnticiposSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Anticipos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anticipos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Anticipos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idProyecto',
            'usuario',
            'fecha',
            'tipo',
            // 'soporte',
            // 'motivo:ntext',
            // 'valor',
            // 'solant',
            // 'fechaRecibo',
            // 'fechaLeg',
            // 'leg',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
