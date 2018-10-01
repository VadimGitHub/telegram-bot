<?php

namespace common\models\vk;

use yii\base\Model;
use yii\data\ActiveDataProvider;

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

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'is_closed' => $this->is_closed,
            'type' => $this->type,
        ]);

        $query
            ->andFilterWhere(['ilike', 'title', $this->title])
            ->andFilterWhere(['ilike', 'screen_name', $this->screen_name])
            ->andFilterWhere(['ilike', 'owner_id', $this->owner_id]);

        return $dataProvider;
    }
}
