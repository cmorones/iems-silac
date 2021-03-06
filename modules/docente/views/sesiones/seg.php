<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


?>

<script>
  $(document).ready(function () {
    $.fn.modal.Constructor.prototype.enforceFocus = function () {
    if (console && console.log) { 
        console.log("patched"); 
    } 
};
});
</script>
<div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title"><i class="fa fa-graduation-cap"></i>Solicitud de materiales para esta sesión</h3>
	</div><!-- /.box-header -->
    
    <p>
       <?php echo Html::a('<i class="fa fa-arrow-circle-left"></i> ' .Yii::t('app', "Atras"), ['/docente/sesiones'],['class'=>'btn btn-back', 'style'=>'color:#fff']);?>
    
        <?= Html::button('Agregar Entrada', ['value'=>Url::to('index.php?r=docente/consumo-materiales/create&id='.$id),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>



<?php
$query = "SELECT 
  cat_matyreact.nombre, 
  cat_matyreact.clave, 
  consumo_lab.id, 
  consumo_lab.id_material, 
  consumo_lab.cantidad,
  consumo_lab.estado, 
  cat_tipo.nombre as tipo, 
  consumo_lab.id_materia
FROM 
  public.consumo_lab, 
  public.cat_matyreact, 
  public.cat_tipo
WHERE 
  cat_matyreact.id = consumo_lab.id_material AND
  cat_tipo.id = cat_matyreact.tipo AND
  consumo_lab.id_sesion = $id";
$materiales = \Yii::$app->db ->createCommand($query)->queryAll();

$i=1;
?>
<div class="row-fluid">
     <div class="span12">
         <?php $form = ActiveForm::begin(); ?>
 
     	<table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Num</th>
                                    <th>Tipo</th>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Existencias</th>
                                    <th>Estado</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                foreach ($materiales as $product):

                                    if ($product['estado']==1) {
                                      $estado ="<span class=\"badge bg-red\">En proceso</span>";
                                    }elseif ($product['estado']==2) {
                                      $estado ="<span class=\"badge bg-red\">Autorizado</span>";
                                    }

                                  ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$product['tipo']?></td>
                                        <td><?=$product['clave']?></td>
                                        <td><?=$product['nombre']?></td>
                                      
                                        <td>
                                        <input type="text" size="6" name="qty[<?=$product['id']?>]" value=<?=$product['cantidad']?>>
                                        
                                        </td>
                                        <td>Existencias</td>
                                        <td><?//=$estado?></td>
                                        <td><input type="checkbox" name="remove[]" value="<?=$product['id']?>"></td>
                                    </tr>
                                <?php 
                                $i++;
                                endforeach; ?>		  
                            </tbody>
                           
                        </table>

                       	

						<div class="col-xs-1 right-padding">
						   <div class="form-group">
        <?= Html::submitButton('Actualizar cantidades', ['class' => 'btn btn-primary', 'name'=>'update']) ?>
    </div>
						</div>	

                  <?php ActiveForm::end(); ?>       

                      
	</div>
     </div>
</div>
<?php
      yii\bootstrap\Modal::begin([

        'header'=>'<h4>Agregar Materiales a la sesión</h4',
        'id'=>'modal',
        'size'=>'modal-lg',
        
        ]);

      echo "<div id='modalContent'></div>";

      yii\bootstrap\Modal::end();


    ?>
</div>