<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use kartik\select2\Select2;
    use kartik\depdrop\DepDrop;
    use yii\helpers\Url;
    use kartik\widgets\FileInput;


    $this->title = 'Створення товару';
    $this->params['breadcrumbs'][] = ['label' => 'Товар', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">
    <div class="panel-heading">
    <h4><?= $this->title ?></h4>
    </div>
    <?php
        $form = ActiveForm::begin(['id' => 'tovar-create']);
    ?>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'name')->textInput();?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
            <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
                    'data' => $category,
                    'language' => 'uk-UA',
                    'options' => [
                        'id' => 'category',
                        'placeholder' => 'Виберіть ...',
                        'multiple' => false,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>
            </div>
            <div class="col-md-6">
                <?= Html::hiddenInput('sel-subcategory', $model->subcategory_id, ['id' => 'sel-subcategory']);?>
                <?= $form->field($model, 'subcategory_id')->widget(DepDrop::classname(), [
                    'type' => DepDrop::TYPE_SELECT2,
                    'data' => [],
                    'options' => [
                        'id' => 'subcategory-id', 
                        'placeholder' => 'Почніть вводити назву підкатегоріїї ...'],
                    'select2Options' => ['pluginOptions' => 
                        [
                            'allowClear' => true,
                            'multiple' => false,
                        ]
                    ],
                    'pluginOptions' => [
                        'depends' => ['category'],
                        'initialize' => true,
                        'initDepends' => ['category'],
                        'url' => Url::to(['/select-data/sub-category']),
                        'params' => ['category', 'sel-subcategory'],
                        'loadingText' => 'Очікуйте завантаження ...',
                    ]
                ]);?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
            <?= $form->field($model, 'discount_id')->widget(Select2::classname(), [
                    'data' => $discount,
                    'language' => 'uk-UA',
                    'options' => [
                        'id' => 'discount',
                        'placeholder' => 'Виберіть ...',
                        'multiple' => false,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>
            </div>

            <div class="col-md-3">
                <?= $form->field($model, 'price')->textInput(['type' => 'number', 'min' => '0', 'step' => '0.01']); ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'count')->textInput(['type' => 'number', 'min' => '0', 'step' => '1']); ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
            <?= $form->field($model, 'imageFile')->widget(FileInput::classname(), [
              'options' =>
               ['accept' => 'image/*',
              'multiple' => true,
              'max' => 5,

              ],
              'pluginOptions' => [
                'initialPreview'=> $imagePath_prew,
                // Url::to([$imagePath_prew[0]], true),
                'initialPreviewAsData'=>true,      
                'showCaption' => false,
                'showRemove' => true,
                'showUpload' => false,
                'removeClass' => 'btn btn-default pull-right',
                'browseClass' => 'btn btn-primary pull-right',
                'removeLabel' => 'видалити',
                'browseLabel' => 'завантажити'
            ],
              ]); ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'description')->textarea(['row' => '5']);?>
            </div>
        </div>    
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php
        ActiveForm::end();
    ?>
</div>