<?php
    namespace backend\controllers;
    use Yii;

    use yii\web\Controller;
    use common\models\SubCategory;
    use common\models\Tovar;

    class SelectDataController extends Controller
    {
        public function actionSubCategory()
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if (isset($_POST['depdrop_all_params']['category'])){
                $output = [];
                $category = $_POST['depdrop_all_params']['category'];
               
                $sub_categories = SubCategory::findAll(['category_id' => $category]);
                foreach ($sub_categories as $value){
                    $output[] = [
                        'id' => $value->id,
                        'name' => $value->name,
                    ];
                }
                $selected = [];
                if ($_POST['depdrop_all_params']['sel-subcategory'] != ''){
                    $sel_category = $_POST['depdrop_all_params']['sel-subcategory'];
                    $select = SubCategory::findOne(['id' => $sel_category]);
                    $selected = [
                        'id' => $select->id,
                        'name' => $select->name,
                    ];
                }               
                return ['output' =>$output, 'selected'=>$selected];
            }
        }
        public function actionFileDeleteTovar($id)
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if (isset($_POST['key'])){
                $name_file = $_POST['key'];
                unlink('../../images/tovar/' . $name_file);
                $tovar = Tovar::findOne(['id' => $id]);
                $images_array = json_decode($tovar->urlImages, true);
                $result = [];
                foreach ($images_array as $image){
                    if ($image != '../../../../images/tovar/' . $name_file){
                        $result[]= $image;
                    }
                }
                $tovar->urlImages = json_encode($result);
                $tovar->save();
            }
            return true;
        }
    }