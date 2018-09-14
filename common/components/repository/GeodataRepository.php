<?php

namespace common\components\repository;

use common\models\Geodata;

/**
 * Class GeodataRepository
 * @package common\components\repository
 */
class GeodataRepository
{

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAllPlace()
    {
        return Geodata::find()
            ->asArray()
            ->all();
    }

}
