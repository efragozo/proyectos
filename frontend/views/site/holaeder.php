<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
if (!Yii::$app->user->isGuest)
{
    
    
$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>
    Como estas?
    <?= $name ?>

</div>
<?php
}

?>