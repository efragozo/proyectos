<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?php //Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<div class="box box-success">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tipoUsuario',
            'first_name',
            'last_name',
            'username',
            /*'auth_key',
            'password_hash',
            'password_reset_token',*/
            'email:email',
            /*'status',
            'created_at',
            'updated_at',*/
        ],
    ]) ?>
</div>
</div>
