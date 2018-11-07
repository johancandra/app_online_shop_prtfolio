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
										<th class="center">
											<label class="pos-rel">
												<input type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</th>
										<th class="detail-col">Details</th>
										<th>Domain</th>
										<th>Price</th>
										<th class="hidden-480">Clicks</th>
										<th>
											<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
											Update
										</th>
										<th class="hidden-480">Status</th>
										<th></th>
									</tr>
								</thead>								
								<tbody>
									<tr>
										<td class="center">
											<label class="pos-rel">
												<input type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</td>
										<td class="center">
											<div class="action-buttons">
												<a href="#" class="green bigger-140 show-details-btn" title="Show Details">
													<i class="ace-icon fa fa-angle-double-down"></i>
													<span class="sr-only">Details</span>
												</a>
											</div>
										</td>
										<td>
											<a href="#">ace.com</a>
										</td>
										<td>$45</td>
										<td class="hidden-480">3,330</td>
										<td>Feb 12</td>										<td class="hidden-480">
											<span class="label label-sm label-warning">Expiring</span>
										</td>
										<td>
											<div class="hidden-sm hidden-xs btn-group">
												<button class="btn btn-xs btn-success">
													<i class="ace-icon fa fa-check bigger-120"></i>
												</button>
												<button class="btn btn-xs btn-info">
													<i class="ace-icon fa fa-pencil bigger-120"></i>
												</button>
												<button class="btn btn-xs btn-danger">
													<i class="ace-icon fa fa-trash-o bigger-120"></i>
												</button>
												<button class="btn btn-xs btn-warning">
													<i class="ace-icon fa fa-flag bigger-120"></i>
												</button>
											</div>											
											<div class="hidden-md hidden-lg">
												<div class="inline pos-rel">
													<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
														<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
													</button>
													<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
														<li>
															<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																<span class="blue">
																	<i class="ace-icon fa fa-search-plus bigger-120"></i>
																</span>
															</a>
														</li>
														<li>
															<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																<span class="green">
																	<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																</span>
															</a>
														</li>
														<li>
															<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																<span class="red">
																	<i class="ace-icon fa fa-trash-o bigger-120"></i>
																</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- /.span -->
					</div><!-- /.row -->	
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>