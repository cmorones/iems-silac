<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\docente\models\ConsumoMateriales */

$this->title = 'Update Consumo Materiales: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Consumo Materiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="consumo-materiales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
