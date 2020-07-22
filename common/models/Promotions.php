<?php
    namespace common\models;

    use yii\db\ActiveRecord;

    /**
     * 
     * @property int $id
     * @property string $name
     * @property string description
     * @property string $urlImage
     * 
     */

     class Promotions extends ActiveRecord
     {
         /**
          * {@inheritdoc}          
          */
        public static function tableName()
        {
            return 'promotions';
        }
        /**
          * {@inheritdoc}          
          */
        public  function rules()
        {
           return [
             [['name', 'description', 'urlImage'], 'string'],
             [['id'], 'integer'],
           ];
        }
        /**
          * {@inheritdoc}          
          */




        public  function attributeLabels()
        {

        }
     }
