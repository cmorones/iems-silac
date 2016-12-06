<?php

namespace app\modules\docente\models;

use Yii;

/**
 * This is the model class for table "consumo_materiales".
 *
 * @property integer $id
 * @property integer $id_material
 * @property integer $id_plantel
 * @property integer $id_sesion
 * @property integer $id_materia
 * @property double $cantidad
 * @property string $fecha_reg
 * @property string $fecha_mod
 */
class ConsumoMateriales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'consumo_lab';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_material', 'id_plantel', 'id_sesion', 'id_materia'], 'integer'],
            [['cantidad'], 'number'],
            [['fecha_reg', 'fecha_mod'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_material' => 'Material',
            'id_plantel' => 'Id Plantel',
            'id_sesion' => 'Id Sesion',
            'id_materia' => 'Id Materia',
            'cantidad' => 'Cantidad',
            'fecha_reg' => 'Fecha Reg',
            'fecha_mod' => 'Fecha Mod',
        ];
    }
}
