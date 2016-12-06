<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\docente\models\ConsumoMateriales */

/*$this->title = 'Create Consumo Materiales';
$this->params['breadcrumbs'][] = ['label' => 'Consumo Materiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="consumo-materiales-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
