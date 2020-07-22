<?php

namespace backend\models;

use yii\base\Model;

class CategoryForm extends Model
{
    public $name;
    public $description;
   

    public function rules()
    {
        return [
            [['name', 'description'], 'required',  'message' =>'невіррний тип'],
            [['name', 'description'], 'string', 'message' =>'трреба значення'],
          
            
        ];
    }

    public function attributeLabels()
    {
        return [
        'name' => 'Назва категорії',
        'description' => 'Опис категорії',
 
        ];        
    }
    public function upload(){
        if($this->validate('name, description')){
           
            return true;
        }
        return false;
    }
    

}