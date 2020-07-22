<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class PromotionForm extends Model
{
    public $name;
    public $description;
    public $imageFile;

    public function rules()
    {
        return [
            [['name', 'description'], 'required',  'message' =>'невіррний тип'],
            [['name', 'description'], 'string', 'message' =>'трреба значення'],
            // ['imageFile', 'file', 'skipOnEmpty' => false, 'extensions' => 'png','jpg' ],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg',  'message' =>'треба файл good format'],
        ];
    }

    public function attributeLabels()
    {
        return [
        'name' => 'Назва акції',
        'description' => 'Опис ',
        'imageFile' => 'Rартинка',
        ];        
    }
    public function upload(){
        if($this->validate('name, description')){
            $this->imageFile->saveAs($this->imagePath());
            return true;
        }
        return false;
    }
    public function imagePath()
    {
        return '../../uploads/' . $this->imageFile->baseName . '.' .  $this->imageFile->extension;
    }

}