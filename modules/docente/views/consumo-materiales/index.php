<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\docente\models\ConsumoMaterialesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consumo Materiales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumo-materiales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Consumo Materiales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_material',
            'id_plantel',
            'id_sesion',
            'id_materia',
            // 'cantidad',
            // 'fecha_reg',
            // 'fecha_mod',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
