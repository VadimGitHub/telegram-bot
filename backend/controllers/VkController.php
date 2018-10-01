<?php

namespace backend\controllers;

use common\models\vk\GroupVk;
use common\forms\vk\GroupVkForm;
use common\services\vk\VkGroupService;
use common\models\vk\GroupVkSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * VkController implements the CRUD actions for GroupVk model.
 */
class VkController extends Controller
{
    /**
     * Lists all GroupVk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GroupVkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GroupVk model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        /** @var GroupVk $model */
        $model = $this->findModel($id);
        $modelForm = new GroupVkForm();
        $modelForm->setAttributes($model->getAttributes());

        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelForm' => $modelForm,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \Exception
     */
    public function actionCreate()
    {
        $model = new GroupVk();
        $modelForm = new GroupVkForm();

        if ($modelForm->load(Yii::$app->request->post()) && $modelForm->validate()) {
            $service = new VkGroupService(new GroupVk());
            $model = $service->create($modelForm->attributes);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'modelForm' => $modelForm,
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        /** @var GroupVk $model */
        $model = $this->findModel($id);
        $modelForm = new GroupVkForm();
        $modelForm->setAttributes($model->getAttributes());

        if ($modelForm->load(Yii::$app->request->post()) && $modelForm->validate()) {
            $service = new VkGroupService($model);
            $service->update($modelForm->attributes);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelForm' => $modelForm,
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
     * Finds the GroupVk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GroupVk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GroupVk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
