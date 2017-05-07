<?php

namespace app\controllers;

use Yii;
use app\models\Model;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use app\models\Name;
use app\models\NameSearch;
use app\models\Phone;
use app\models\PhoneSearch;
use app\models\City;
use app\models\UploadImage;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * NameController implements the CRUD actions for Name model.
 */
class NameController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['subcat1'],
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Name models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NameSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Name model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        //$phones = $model->phones;
        $searchModel = new PhoneSearch();
        $dataProvider = $searchModel->search([
            'PhoneSearch' => [
                'name_id' => $id
            ]
        ]);
        return $this->render('view', [
            'model' => $model,
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Name model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Name();
        $model_img = new UploadImage();
        $modelsPhone = [new Phone()];

        if ($model->load(Yii::$app->request->post())) {
            $modelsPhone = Model::createMultiple(Phone::classname());
            Model::loadMultiple($modelsPhone, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPhone) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsPhone as $modelPhone) {
                            $modelPhone->name_id = $model->id;
                            if (! ($flag = $modelPhone->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        $url = Url::previous(Yii::$app->controller->id.'_create');
                        return $this->redirect(isset($url) ? $url : ['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        Url::remember(Yii::$app->request->referrer,Yii::$app->controller->id.'_create');
        return $this->render('create', [
            'model' => $model,
            'model_img' => $model_img,
            'modelsPhone' => (empty($modelsPhone)) ? [new Phone()] : $modelsPhone
        ]);        
    }

    /**
     * Updates an existing Name model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model_img = new UploadImage();
        $model = $this->findModel($id);
        $modelsPhone = $model->phones;
        $model_img->img = $model->img;
        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsPhone, 'id', 'id');
            $modelsPhone = Model::createMultiple(Phone::classname(), $modelsPhone);
            Model::loadMultiple($modelsPhone, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsPhone, 'id', 'id')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPhone) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            Phone::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsPhone as $modelPhone) {
                            $modelPhone->name_id = $model->id;
                            if (! ($flag = $modelPhone->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        $url = Url::previous(Yii::$app->controller->id.'_update');
                        return $this->redirect(isset($url) ? $url : ['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        Url::remember(Yii::$app->request->referrer,Yii::$app->controller->id.'_update');
        return $this->render('update', [
            'model' => $model,
            'model_img' => $model_img,
            'modelsPhone' => (empty($modelsPhone)) ? [new Phone()] : $modelsPhone
        ]);
    }

    /**
     * Deletes an existing Name model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $string = Yii::$app->request->referrer;
        if(stristr($string, '/name/view') === FALSE) {
            return $this->redirect($string);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Name model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Name the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Name::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     *
     */
    public function actionSubcat1() {
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $param1 = null;
                $param2 = null;
                if (!empty($_POST['depdrop_params'])) {
                    $params = $_POST['depdrop_params'];
                    $param1 = $params[0]; // get the value of input-type-1
                    $param2 = $params[1]; // get the value of input-type-2
                }
     
                $out = City::getCitiesListForCountry($cat_id, $param1, $param2); 
                $selected = '';//self::getDefaultSubCat($cat_id);
                // the getDefaultSubCat function will query the database
                // and return the default sub cat for the cat_id
                
                echo Json::encode(['output'=>$out, 'selected'=>$selected]);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }


    /**
     *
     */
    public function actionLoadImg() {
        $model_img = new UploadImage();
        if ($model_img->load(Yii::$app->request->post())) {
            $model_img->imageFile = UploadedFile::getInstance($model_img, 'imageFile');
            if ($model_img->upload()) {
                // file is uploaded successfully
                echo Json::encode(['src' => $model_img->img]);
                return;            
            }
        }
        echo Json::encode(['src' => 'no-img']);
        return;
    }

    /**
     *
     */
    public function actionDeleteImg() {
        if (!empty($_POST['file_name'])) {
            $path  = Yii::getAlias('@app').'/web/tmp_avatars/'.$_POST['file_name'];
            if (file_exists($path)){
                unlink($path);
            }
        }
        echo Json::encode(['src' => 'no-img']);
        return;
    }
}
