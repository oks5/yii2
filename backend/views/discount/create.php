<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Discount */

$this->title = 'Create Discount';
$this->params['breadcrumbs'][] = ['label' => 'Discounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
