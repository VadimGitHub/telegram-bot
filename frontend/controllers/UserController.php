<?php
namespace frontend\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Контроллер для пользователей
 * Class UserController
 * @package frontend\controllers
 */
class UserController extends Controller
{
    /**
     * @return array
     */
    public function behaviors() :array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['personal'],
                'rules' => [
                    [
                        'actions' => ['personal'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionPersonal()
    {
        return $this->render('personal');
    }
}
