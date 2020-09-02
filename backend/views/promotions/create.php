<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Url;

?>

<div class="row">
<div class="col-md-12">
<h3>ДОДАТИ АКЦІЮ</h3>
</div>
</div>


<div class="row">
<div class="col-md-12">
<?php
    $form = ActiveForm::begin(
        [
            'method' => 'post',
            'options' => [
            'enctype' => 'multipart/form-data'
            ]
        ]
        );


        
        echo $form->field($model, 'name')->textInput();
        echo $form->field($model, 'description')->textarea(['row' => '5']);
        echo $form->field($model, 'imageFile')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
                'multiple' => false,
                // 'max' => 5,
            ],
            'pluginOptions' => [
                'initialPreview'=> $imagePath_prew,    
                'initialPreviewConfig' => $imagePath_conf,                 
                'initialPreviewAsData'=>true,
                'showCaption' => false,
                'showRemove' => true,
                'showUpload' => false,
                'removeClass' => 'btn btn-default pull-right',
                'browseClass' => 'btn btn-primary pull-right',
                'removeLabel' => 'Видалити',
                'browseLabel' =>  'Завантажити',
                'deleteUrl' => Url::to(['/select-data/' . $promotion_id . '/file-delete-tovar']),
                'overwriteInitial'=>false,
            ],
        ]);
    ?>

        <div class="form-group">
        <?= Html::submitButton('ЗБЕРЕГТИ АКЦІЮ', ['class' => 'btn btn-primary pull-left']) ?>
        </div>

        <?php
        ActiveForm::end();
        ?>


    </div>
</div>

