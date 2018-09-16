<?php

namespace common\models\vk;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\vk\GroupVk;

/**
 * GroupVkSearch represents the model behind the search form of `common\models\vk\GroupVk`.
 */
class GroupVkSearch extends GroupVk
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'screen_name', 'owner_id', 'type'], 'safe'],
            [['is_closed'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = GroupVk::find();

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
            'is_closed' => $this->is_closed,
        ]);

        $query->andFilterWhere(['ilike', 'title', $this->title])
            ->andFilterWhere(['ilike', 'screen_name', $this->screen_name])
            ->andFilterWhere(['ilike', 'owner_id', $this->owner_id])
            ->andFilterWhere(['ilike', 'type', $this->type]);

        return $dataProvider;
    }
}
