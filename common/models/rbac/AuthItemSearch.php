<?php

namespace common\models\rbac;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AuthItemSearch represents the model behind the search form of `common\models\rbac\AuthItem`.
 */
class AuthItemSearch extends AuthItem
{
    public $type;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'rule_name', 'data'], 'safe'],
            [['type', 'created_at', 'updated_at'], 'integer'],
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
    public function search(array $params = null) : ActiveDataProvider
    {
        $query = AuthItem::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'description', $this->description])
            ->andFilterWhere(['ilike', 'rule_name', $this->rule_name])
            ->andFilterWhere(['ilike', 'data', $this->data]);

        return $dataProvider;
    }
}
