<div class="col-md-3 text-center">
    <?php foreach($promo as $promo_):?>
    <div class=" col-md-12 col-sm-6 col-xs-6" >
        <div class="offer-text">
            <?=$promo_->promo;?>
        </div>
        <div class="thumbnail product-box">
            <img src="<?php echo base_url();?><?=$promo_->img_url;?>" alt="" />
            <div class="caption">
                <h3><a href="#"><?=$promo_->name;?> </a></h3>
                <p><a href="#"><?=$promo_->description;?> </a></p>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>