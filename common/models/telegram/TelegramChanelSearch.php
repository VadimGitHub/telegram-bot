<?php

namespace common\models\telegram;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TelegramChanelSearch represents the model behind the search form of `common\models\telegram\TelegramChanel`.
 */
class TelegramChanelSearch extends TelegramChanel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'chat_id'], 'safe'],
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
        $query = TelegramChanel::find();

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
        ]);

        $query
            ->andFilterWhere(['ilike', 'title', $this->title])
            ->andFilterWhere(['ilike', 'chat_id', $this->chat_id]);

        return $dataProvider;
    }
}
