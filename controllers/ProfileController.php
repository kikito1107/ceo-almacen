<?php

namespace app\controllers;

use Yii;
use app\models\Profile;
use app\models\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Profile();

        if (Yii::$app->request->isPost) {

            $model->imagePhoto = UploadedFile::getInstance($model, 'imagePhoto');
            $model->inePhoto = UploadedFile::getInstance($model, 'inePhoto');
            $model->request_jobPhoto = UploadedFile::getInstance($model, 'request_jobPhoto');
            $model->addressPhoto = UploadedFile::getInstance($model, 'addressPhoto');
            $model->birth_certificatePhoto = UploadedFile::getInstance($model, 'birth_certificatePhoto');

            if(!empty($model->imagePhoto)) {
                $model->upload('imagePhoto', 'image_Photo');

            }

            if(!empty($model->inePhoto)) {
                $model->upload('inePhoto', 'ine_Photo');
            }

            if(!empty($model->request_jobPhoto)) {
                $model->upload('request_jobPhoto', 'request_job_Photo');
            }

            if(!empty($model->addressPhoto)) {
                $model->upload('addressPhoto', 'address_Photo');
            }

            if(!empty($model->birth_certificatePhoto)) {
                $model->upload('birth_certificatePhoto', 'birth_certificate_Photo');
            }

            $model->load(Yii::$app->request->post());

            if($model->validate() && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $model->imagePhoto = UploadedFile::getInstance($model, 'imagePhoto');
            $model->imageLicense = UploadedFile::getInstance($model, 'imageLicense');
            if(!empty($model->imagePhoto)) {
                $model->upload('imagePhoto', 'image_Photo');
            }

            if(!empty($model->imageLicense)) {
                $model->upload('imageLicense', 'image_license');
            }

            $model->load(Yii::$app->request->post());

            if($model->validate() && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Activa/Desactiva un elemento
     * @param $id
     * @param $status
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionActivate($id, $status)
    {
        $model = $this->findModel($id);

        $model->setAttribute('status', $status);

        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Devuelve el avatar del usuario
     * @param $id
     * @throws NotFoundHttpException
     */
    public function actionAvatar($id)
    {
        $model = $this->findModel($id);
        $file = Yii::getAlias("@app/web/uploads/image/". $model->image_Photo);
        $image = Yii::$app->image->load($file);
        header("Content-Type: " . mime_content_type($file));
        /** @noinspection PhpUndefinedMethodInspection */
        echo $image->resize(270, 270)->render();
    }
}
