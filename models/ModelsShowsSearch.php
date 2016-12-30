<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ModelsShows;

/**
 * ModelsShowsSearch represents the model behind the search form about `app\models\ModelsShows`.
 */
class ModelsShowsSearch extends ModelsShows
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'precio_provedor', 'precio_minorista', 'precio_mayorista', 'cantidad', 'mark_id'], 'integer'],
            [['name', 'clabe', 'color', 'type_genero', 'type_shoes', 'tipo_suela', 'tipo_forro', 'corrida', 'update_date', 'create_date'], 'safe'],
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
        $query = ModelsShows::find();

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
            'precio_provedor' => $this->precio_provedor,
            'precio_minorista' => $this->precio_minorista,
            'precio_mayorista' => $this->precio_mayorista,
            'cantidad' => $this->cantidad,
            'mark_id' => $this->mark_id,
            'update_date' => $this->update_date,
            'create_date' => $this->create_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'clabe', $this->clabe])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'type_genero', $this->type_genero])
            ->andFilterWhere(['like', 'type_shoes', $this->type_shoes])
            ->andFilterWhere(['like', 'tipo_suela', $this->tipo_suela])
            ->andFilterWhere(['like', 'tipo_forro', $this->tipo_forro])
            ->andFilterWhere(['like', 'corrida', $this->corrida]);

        return $dataProvider;
    }
}
