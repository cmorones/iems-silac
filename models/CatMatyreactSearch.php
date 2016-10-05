<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatMatyreact;

/**
 * CatMatyreactSearch represents the model behind the search form about `app\models\CatMatyreact`.
 */
class CatMatyreactSearch extends CatMatyreact
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'categoria', 'tipo', 'tipo_des', 'unidad', 'status'], 'integer'],
            [['clave', 'nombre', 'imagen'], 'safe'],
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
        $query = CatMatyreact::find();

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
            'categoria' => $this->categoria,
            'tipo' => $this->tipo,
            'tipo_des' => $this->tipo_des,
            'unidad' => $this->unidad,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'clave', $this->clave])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'imagen', $this->imagen]);

        return $dataProvider;
    }
}
