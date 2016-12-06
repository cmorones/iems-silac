<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\docente\models\ConsumoMaterialesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consumo-materiales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_material') ?>

    <?= $form->field($model, 'id_plantel') ?>

    <?= $form->field($model, 'id_sesion') ?>

    <?= $form->field($model, 'id_materia') ?>

    <?php // echo $form->field($model, 'cantidad') ?>

    <?php // echo $form->field($model, 'fecha_reg') ?>

    <?php // echo $form->field($model, 'fecha_mod') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
