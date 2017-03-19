<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Specsheets;

/**
 * SpecsheetsSearch represents the model behind the search form about `app\models\Specsheets`.
 */
class SpecsheetsSearch extends Specsheets
{

    public $specsheet_status;
    public $specsheet_category;
    public $is_not_archived;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_ref', 'status_ref'], 'integer'],
            [['date_created', 'title', 'description', 'file', 'thumbnail', 'specsheet_status', 'specsheet_category'], 'safe'],
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
        $query = Specsheets::find();
        $query->joinWith(['status']);
        $query->joinWith(['category']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['specsheet_status'] = [
                'asc' => ['statuses.description' => SORT_ASC],
                'desc' => ['statuses.description' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['specsheet_category'] = [
                'asc' => ['categories.description' => SORT_ASC],
                'desc' => ['categories.description' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date_created' => $this->date_created,
            'category_ref' => $this->category_ref,
           // 'status_ref' => $this->status_ref,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'thumbnail', $this->thumbnail]);
        
        $query->andFilterWhere(['like', 'statuses.description', $this->specsheet_status]);
        $query->andFilterWhere(['like', 'categories.description', $this->specsheet_category]);
// var_dump($this->is_not_archived); die();
        if(isset($this->is_not_archived)){
            $query->andFilterWhere(['<>', 'status_ref', 3]);
        }
        return $dataProvider;
    }
}
