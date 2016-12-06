<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\modules\docente\models\InventarioLab;
use app\models\CatMatyreact;
use kartik\select2\Select2;
use yii\db\Query; 

/* @var $this yii\web\View */
/* @var $model app\modules\docente\models\ConsumoMateriales */
/* @var $form yii\widgets\ActiveForm */
/*

SELECT 
  inventario_lab.id_catmat, 
  cat_matyreact.nombre, 
  inventario_lab.id_plantel
FROM 
  public.inventario_lab, 
  public.cat_matyreact
WHERE 
  cat_matyreact.id = inventario_lab.id_catmat;


  */

?>

<div class="consumo-materiales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'id_material')->textInput() ?>

     <?php 

    $query = "SELECT 
  inventario_lab.id_catmat, 
  cat_matyreact.nombre
FROM 
  public.inventario_lab, 
  public.cat_matyreact
WHERE 
  cat_matyreact.id = inventario_lab.id_catmat";


     $materiales = \Yii::$app->db ->createCommand($query)->queryAll();

        $remitentes['falso'] = 'Seleccionar';
        //$remitentes[1] = 'Balanza';

         foreach ($materiales as $value) {
                    $remitentes[$value['id_catmat']] = "$value[nombre]";
                }
        ?>            

     <?= $form->field($model, 'id_material')->widget(Select2::classname(), [
       'value' => false, // value to initialize
      // 'data'=> $remitentes,
       'data'=> $remitentes,
       'language'=> 'es',
       'options'=> ['placeholder' => 'Selecionar reactivo y/o material'],
       'pluginOptions' => [
       'allowClear' => true
       ],

    ]); ?>


    <?= $form->field($model, 'cantidad')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
