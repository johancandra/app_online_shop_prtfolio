	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>				
				<li>
					<a href="#"><?php echo $page_menu_; ?></a>
				</li>
				<li class="active">				            
            		<?php echo $page_name; ?>				
				</li>
			</ul><!-- /.breadcrumb -->			
			<div class="nav-search" id="nav-search">
				<form class="form-search">
					<span class="input-icon">
						<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
						<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				</form>
			</div><!-- /.nav-search -->
		</div>		
		<div class="page-content">
			<div class="page-header">
				<h1>
					Tables
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						<?php echo $page_name; ?>
					</small>
				</h1>
			</div><!-- /.page-header -->			
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
						<div class="col-xs-12">
							<table id="simple-table" class="table  table-bordered table-hover">
								<thead>
									<tr>
										<th>id </th>
										<th>name </th>
										<th>price_curr </th>
										<th>price </th>
										<th>description </th>
										<th>sub_type </th>
										<th>image </th>
										<th>total item </th>
										<th></th>
									</tr>
								</thead>								
								<tbody>
                       				<?php foreach($prod_list as $prod_lists){?>
									<tr>
										<td class="center">
											<?php echo $prod_lists->id;?>
										</td>
										<td class="center">
											<?php echo $prod_lists->name;?>
										</td>
										<td class="center">
											<?php echo $prod_lists->price_curr;?>
										</td>
										<td class="center">
											<?php echo $prod_lists->price;?>
										</td>
										<td class="center">
											<?php echo $prod_lists->description;?>
										</td>
										<td class="center">
											<?php echo $prod_lists->sub_type;?>
										</td>
										<td class="center">
											<?php echo $prod_lists->image;?>
										</td>
										<td class="center">
											<?php echo $prod_lists->total_item;?>
										</td>
										<td>
											<div class="hidden-sm hidden-xs btn-group">
												<button class="btn btn-xs btn-success">
													<i class="ace-icon fa fa-check bigger-120"></i>
												</button>
												<button onclick="show_product_list_popup('<?php echo base_url();?>',1);" class="btn btn-xs btn-info">
													<i class="ace-icon fa fa-pencil bigger-120"></i>
												</button>
												<button class="btn btn-xs btn-danger">
													<i class="ace-icon fa fa-trash-o bigger-120"></i>
												</button>
												<button class="btn btn-xs btn-warning">
													<i class="ace-icon fa fa-flag bigger-120"></i>
												</button>
											</div>		
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>

						    <div class="row">
						        <ul id="prod_list_page" class="pagination alg-right-pad">
						            <li><a onclick="load_prod_page('<?php echo(base_url());?>',<?php echo($page_);?>,<?php echo($length);?>,'<?php echo($sort);?>','<?php echo($sort_type);?>','before');">&laquo;</a></li>
						            <?php foreach($pages as $pages_):?>
						            <li><a href="<?php echo(base_url().'cms/view_product_list?page='.$pages_.'&length=5&sort='.$sort.'&sort_type='.$sort_type);?>"><?php echo $pages_; ?></a></li>
						            <?php endforeach;?>
						            <li><a onclick="load_prod_page('<?php echo(base_url());?>',<?php echo($page_);?>,<?php echo($length);?>,'<?php echo($sort);?>','<?php echo($sort_type);?>','next');">&raquo;</a></li>
						        </ul>
						    </div>
						</div><!-- /.span -->
					</div><!-- /.row -->	
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>