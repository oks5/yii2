<?php
use yii\helpers\Html;


?>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" >
    <?php
        $active = 'active';
        foreach ($promotions as $promotion) {
    ?>
    <div class="carousel-item <?=$active?>">
        <?= Html::img(str_replace('../../../../', '../../', json_decode($promotion->urlImage)), ['alt' => 'Наш логотип', 'class' => "d-block w-10"]) ?>
     
    </div>
    <?php
         $active = '';
        }
    ?>
  </div>
</div>
