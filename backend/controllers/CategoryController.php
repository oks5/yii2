<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use common\models\Category;
use yii\data\ActiveDataProvider;
use common\models\CategoryForm;


class CategoryController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCreate()
    {
        $model = new CategoryForm;
        if ($model->load(Yii::$app->request->post())){           
            if($model->upload()){
               $category = new Category;
               $category->name = $model ->name;
               $category->description = $model ->description;               
               if ($category->save()){
                $this->redirect(['category/index']);
               }
               
            }
        }

        return $this->render('create', ['model' => $model]);
    }
    public function actionDelete($id)
    {
        $category = Category::findOne(['id' => $id]);
        $category->delete();
        $this->redirect(['category/index']);
    }

    
    public function actionUpdate($id)
    {
        $model = new CategoryForm;
        $category = Category::findOne(['id' => $id]);
        if ($model->load(Yii::$app->request->post())){
          
            if($model->upload()){
                $category->name = $model->name;
                $category->description = $model->description;
            
                if ($category->save()){
                    $this->redirect(['category/index']);
                }
            }
        }
        $model->name = $category->name;
        $model->description = $category->description;
        
        return $this->render('create', ['model' => $model]);
    }
}