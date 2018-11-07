
    <div>
        <ol class="breadcrumb">
            <li><a href="<?php echo(base_url());?>">Home</a></li>
            <li class="active"><?=$sub_type;?></li>
        </ol>
    </div>
    <!-- /.div -->
    <div class="row">
        <div class="btn-group alg-right-pad">
            <button type="button" class="btn btn-default"><strong><?=$product['total_item'];?>  </strong>items</button>
            <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    Sort Products &nbsp;<span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo(base_url().'display/view_home?page=1&length=3&sub_type='.$product['sub_type'].'&sort=price&sort_type=asc');?>">By Price Low</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo(base_url().'display/view_home?page=1&length=3&sub_type='.$product['sub_type'].'&sort=price&sort_type=desc');?>">By Price High</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <?php foreach($product_ as $products):?>
        <div class="col-md-4 text-center col-sm-6 col-xs-6">
            <div class="thumbnail product-box">
                <img src="<?php echo (base_url().$products->image);?>" alt="" />
                <div class="caption">
                    <h3><a href="#"><?=$products->name;?></a></h3>
                    <p>Price : <strong><?=$products->price_curr;?> <?=$products->price;?></strong></p>
                    <p><?=$products->description;?></p>
                    <?php if($this->session->userdata('firstname')){ ?>
                    <p><a href="<?php echo(base_url().'display/view_order?list_id='.$products->id);?>" class="btn btn-success" role="button">Add Chart</a><?php } ?> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                </div>
            </div>
        </div>
        <?php endforeach;?>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <ul id="prod_list_page" class="pagination alg-right-pad">
            <li><a onclick="load_prod_page('<?php echo(base_url());?>',<?php echo($product['page_']);?>,<?php echo($product['length']);?>,'<?php echo($product['sub_type']);?>','<?php echo($product['sort']);?>','<?php echo($product['sort_type']);?>','before');">&laquo;</a></li>
            <?php foreach($page as $pages):?>
            <li><a href="<?php echo(base_url().'display/view_home?page='.$pages.'&length=3&sub_type='.$product['sub_type'].'&sort='.$product['sort'].'&sort_type='.$product['sort_type']);?>"><?php echo $pages; ?></a></li>
            <?php endforeach;?>
            <li><a onclick="load_prod_page('<?php echo(base_url());?>',<?php echo($product['page_']);?>,<?php echo($product['length']);?>,'<?php echo($product['sub_type']);?>','<?php echo($product['sort']);?>','<?php echo($product['sort_type']);?>','next');">&raquo;</a></li>
        </ul>
    </div>
    <!-- /.row -->