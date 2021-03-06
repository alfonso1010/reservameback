<?php

namespace backend\api\v1\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class PagosNegocio extends \common\models\PagosNegocio {

	/**
	 * @inheritdoc
	 */
	public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'slug' => [
                'class' => \tecnocen\roa\behaviors\Slug::class,
                'resourceName' => 'pagos-negocio',
                'idAttribute' => 'id_pagos_negocio',
            ],
        ]);
    }	

	/**
	 * @inheritdoc
	 */
	public function getLinks() {
		return array_merge($this->slugLinks, [
				'curies'      => new \yii\web\Link([
						'name'      => 'docs',
						'title'     => 'Resource Documentation',
						'href'      => 'http://swagger.com/demo/{rel}',
						'templated' => true,
					])
			]);
	}

}