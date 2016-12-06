<?php

namespace app\modules\docente;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\docente\models\ConsumoMateriales;

/**
 * ConsumoMaterialesSearch represents the model behind the search form about `app\modules\docente\models\ConsumoMateriales`.
 */
class ConsumoMaterialesSearch extends ConsumoMateriales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_material', 'id_plantel', 'id_sesion', 'id_materia'], 'integer'],
            [['cantidad'], 'number'],
            [['fecha_reg', 'fecha_mod'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ConsumoMateriales::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_material' => $this->id_material,
            'id_plantel' => $this->id_plantel,
            'id_sesion' => $this->id_sesion,
            'id_materia' => $this->id_materia,
            'cantidad' => $this->cantidad,
            'fecha_reg' => $this->fecha_reg,
            'fecha_mod' => $this->fecha_mod,
        ]);

        return $dataProvider;
    }
}
