<?php

namespace common\components\service;

use Yii;
use common\components\repository\GeodataRepository;

/**
 * Class GeodataService
 * @package common\components\service
 */
class GeodataService
{

    /** @var GeodataRepository */
    private $repository;

    /**
     * GeodataService constructor.
     * @throws \yii\base\InvalidConfigException
     */
    public function __construct()
    {
        $this->repository = Yii::createObject(GeodataRepository::class);
    }

    /**
     * Получить все места из базы
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAllPlace()
    {
        /** @var array $data */
        $data = $this->repository->getAllPlace();

        return $data;
    }

}
