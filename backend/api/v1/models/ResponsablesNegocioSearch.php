<?php

namespace backend\api\v1\models;

use tecnocen\roa\ResourceSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use Yii;

class ResponsablesNegocioSearch extends ResponsablesNegocio implements ResourceSearch

{
	/**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function search(array $params, $formName = '')
    {
        $id_usuario = Yii::$app->user->identity->id;
        $this->load($params, $formName);
        if (!$this->validate()) {
            return null;
        }

        $query = static::find()->where(['id_usuario' => $id_usuario]);

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => ArrayHelper::getValue($params,'registros',20) ]
        ]);
    }
}
