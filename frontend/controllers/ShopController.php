<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Promotions;
use common\models\Tovar;




/**
 * Shop controller
 */
class ShopController extends Controller
{
    public function actionIndex()
    {
        $promotions = Promotions::find()        
        ->all();

        return $this->render('index',  [
            'promotions' => $promotions,
        ]);       
    }

    public function actionTovar()
    {
        $tovar = Tovar::find()        
        ->all();

        return $this->render('tovar',  [
            'tovar' => $tovar,
        ]);       
    }

    
}

   