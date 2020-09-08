<?php
use yii\helpers\Html;
use common\models\Tovar;

?>


<div class="container">
<div class="row">

<?php

foreach ($tovar as $tovar) {
    $images = json_decode($tovar->urlImages);
    $image = $images[0];
    
?>
    <div class="col-md-4">
    <div class="card " style="width: 22rem;">
        <?= Html::img(str_replace('../../../../', '../../../', $image), ['alt' => 'товар', 'class' => "d-block w-5 h-5"]) ?>
        <div class="card-body">
            <h5 class="card-title"><?=$tovar->name?></h5>
            <p class="card-text"><?=$tovar->description?></p>
            
            <a href="#" class="btn btn-primary btn-sm">КУПИТИ</a>
           
            <a href="../../backend/web/tovar/" class="btn btn-primary btn-sm">ПЕРЕГЛЯНУТИ</a>
            
        </div>
    </div>        
    </div>
    

        <?php
         $active = '';
        }
        ?> 
     </div>
     </div>    
        

    
    
  
