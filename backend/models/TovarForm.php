<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class TovarForm extends Model
{
    public $name;
    public $description;
    public $imageFile;
    public $count;
    public $category_id;
    public $subcategory_id;
    public $price;
    public $discount_id;


    public function rules()
    {
        return [
            [['name', 'description'], 'string', 'message' =>'невірний тип'],
            [['category_id', 'subcategory_id', 'discount_id'], 'integer', 'message' =>'невірний тип'],
            [['price'], 'double',  'min'=> 0, 'message' =>'невірний тип'],
            [['count'], 'integer',  'min'=> 0, 'message' =>'невірний тип'],
            [['name', 'description', 'category_id', 'subcategory_id'], 'required',  'message' =>'невірний тип'],
            // [['name', 'description'], 'string', 'message' =>'треба значення'],
            [['count', 'price'], 'required', 'message' =>'треба значення'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg',  'maxFiles' => 15],
        ];
    }

    public function attributeLabels()
    {
        return [
        'name' => 'Назва товару',
        'description' => 'Опис товару',
        'imageFile' => 'Kартинка товару',
        'count' => 'кількість товару',
        'category_id' => 'категорія товару',
        'subcategory_id' => 'підкатегорія товару',
        'price' => 'ціна товару',
        'discount_id' => 'знижка на товар',
        ];        
    }
    public function upload()
    {
        if($this->validate()){
            $result = [];
            foreach ($this->imageFile as $file) {
                $fileName = md5(microtime() . rand(0, 10000));
                $imagePath = '../../images/tovar/' . $fileName . '.' . $file->extension;
                $file->saveAs($imagePath);
                $result[] = '../../' . $imagePath;

            }
            
            return $result;
        }
        return false;
    }
    // public function imagePath()
    // {
    //     return '../../uploads/' . $this->imageFile->baseName . '.' .  $this->imageFile->extension;
    // }

}