<?php

namespace backend\controllers;

use common\components\telegram\TelegramComponent;
use common\forms\TelegramMessageForm;
use Yii;
use common\models\telegram\TelegramChanel;
use common\models\telegram\TelegramChanelSearch;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * TelegramController implements the CRUD actions for TelegramChanel model.
 */
class TelegramController extends Controller
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TelegramChanelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Страница отпарвки сообщений
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionMessage($id)
    {
        $formMessage = new TelegramMessageForm();
        $model = $this->findModel($id);

        if ($formMessage->load(Yii::$app->request->post()) && $formMessage->validate()) {
            /** @var TelegramComponent $telegram */
            $telegram = Yii::$app->telegram;
            $telegram->sendMessage($model, $formMessage);
        }

        return $this->render('message', [
            'formMessage' => $formMessage,
            'model' => $model
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TelegramChanel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @return TelegramChanel|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = TelegramChanel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
