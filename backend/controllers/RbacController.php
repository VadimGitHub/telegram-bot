<?php

namespace backend\controllers;

use common\models\rbac\AuthItemSearch;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Class RbacController
 * @package backend\controllers
 */
class RbacController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['backend'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionRole()
    {
        $searchModel = new AuthItemSearch(['type' => 1]);
        $dataProvider = $searchModel->search();

        return $this->render('role', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
}
