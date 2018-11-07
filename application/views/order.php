<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?=doctype('html5');?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <META HTTP-EQUIV="Pragma" CONTENT="private">
    <META HTTP-EQUIV="Cache-Control" CONTENT="private, max-age=5400, pre-check=5400">
    <META HTTP-EQUIV="Expires" CONTENT="<?php echo date(DATE_RFC822,strtotime("1 day")); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bootstrap E-Commerce Template- DIGI Shop mini</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="<?php echo base_url();?>assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><strong>DIGI</strong> Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Track Order</a></li>
                    <?php if($this->session->userdata('firstname')){ ?>
                    <li><a><?php echo $this->session->userdata('firstname'); ?></a></li>
                    <li><a href="<?php echo(base_url().'display/logout');?>">Logout</a></li>
                    <?php }else{ ?>
                    <li><a onclick="show_login_popup()">Login</a></li>
                    <li><a onclick="show_register_popup()">Signup</a></li>
                    <?php } ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">24x7 Support <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><strong>Call: </strong>+09-456-567-890</a></li>
                            <li><a href="#"><strong>Mail: </strong>info@yourdomain.com</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><strong>Address: </strong>
                                <div>
                                    234, New york Street,<br />
                                    Just Location, USA
                                </div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" placeholder="Enter Keyword Here ..." class="form-control">
                    </div>
                    &nbsp; 
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="well well-lg offer-box text-center">


                   Today's Offer : &nbsp; <span class="glyphicon glyphicon-cog"></span>&nbsp;40 % off  on purchase of $ 2,000 and above till 24 dec !                
              
               
                </div>
                <div class="main box-border">
                    <div id="mi-slider" class="mi-slider">
                        <?php foreach($sliding['image'] as $slidings):?>
                        <ul>
                            <?php foreach($slidings->image as $image):?>
                            <li><a href="#">
                                <img src="<?php echo (base_url().$image->image_slider);?>" alt="img01"><h4><?=$image->name;?></h4>
                            </a></li>
                            <?php endforeach;?> 
                        </ul>
                        <?php endforeach;?>
                        <nav>
                            <?php foreach($sliding['category'] as $slidings):?>
                            <a href="#"><?=$slidings?></a>
                            <?php endforeach;?>
                        </nav>
                    </div>
                    
                </div>
                <br />
            </div>
            <!-- /.col -->            
            <?php
			  	$this->load->view('promo',$promo);
			?>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">            
                <div>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo(base_url());?>">Home</a></li>
                        <li>Order</li>
                        <li class="active"><?=$product[0]->name;?></li>
                    </ol>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 text-center col-sm-12 col-xs-12">
                        <div style="padding-top: 10px;padding-bottom: 5px;display:none;">List Id</div>
                        <div style="display:none;">
                            <input id="list_id" name="list_id" type="number" value="<?=$product[0]->id;?>" class="form-control">
                        </div>
                        <div style="padding-top: 10px;padding-bottom: 5px;text-align: left;">Product</div>
                        <div>
                            <input id="product" name="product" type="text" value="<?=$product[0]->name;?>" class="form-control" disabled="disabled">
                        </div>
                        <div style="padding-top: 10px;padding-bottom: 5px;text-align: left;">Total</div>
                        <div>
                            <input id="total" name="total" type="number" placeholder="Enter Total Product Here ..." class="form-control">
                        </div>
                        <input value="Add Chart" type="submit" onclick="add_to_chart('<?php echo(base_url());?>');" style="margin-top: 20px;width: 100%;height: 40px;background-color: #18b424;color: #fff;border: none;">
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <div class="col-md-12 download-app-box text-center">

        <span class="glyphicon glyphicon-download-alt"></span>Download Our Android App and Get 10% additional Off on all Products . <a href="#" class="btn btn-danger btn-lg">DOWNLOAD  NOW</a>

    </div>

    <!--Footer -->
    <div class="col-md-12 footer-box">


        <div class="row small-box ">
            <strong>Mobiles :</strong> <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> | 
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |
              <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  <a href="#">Sony</a> | 
            <a href="#">Microx</a> |<a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  
            <a href="#">Sony</a> | <a href="#">Microx</a> | view all items
         
        </div>
        <div class="row small-box ">
            <strong>Laptops :</strong> <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx Laptops</a> | 
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |
              <a href="#">Sony Laptops</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  <a href="#">Sony</a> | 
            <a href="#">Microx</a> |<a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  
            <a href="#">Sony</a> | <a href="#">Microx</a> | view all items
        </div>
        <div class="row small-box ">
            <strong>Tablets : </strong><a href="#">samsung</a> |  <a href="#">Sony Tablets</a> | <a href="#">Microx</a> | 
            <a href="#">samsung </a>|  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |
              <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung Tablets</a> |  <a href="#">Sony</a> | 
            <a href="#">Microx</a> |<a href="#">samsung Tablets</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  
            <a href="#">Sony</a> | <a href="#">Microx Tablets</a> | view all items
            
        </div>
        <div class="row small-box pad-botom ">
            <strong>Computers :</strong> <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> | 
            <a href="#">samsung Computers</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |
              <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  <a href="#">Sony</a> | 
            <a href="#">Microx Computers</a> |<a href="#">samsung Computers</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx Computers</a> |<a href="#">samsung</a> |  
            <a href="#">Sony</a> | <a href="#">Microx</a> | view all items
            
        </div>
        <div class="row">
            <div class="col-md-4">
                <strong>Send a Quick Query </strong>
                <hr>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Email address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="3" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <strong>Our Location</strong>
                <hr>
                <p>
                     234, New york Street,<br />
                                    Just Location, USA<br />
                    Call: +09-456-567-890<br>
                    Email: info@yourdomain.com<br>
                </p>

                2014 www.yourdomain.com | All Right Reserved
            </div>
            <div class="col-md-4 social-box">
                <strong>We are Social </strong>
                <hr>
                <a href="#"><i class="fa fa-facebook-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-twitter-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-google-plus-square fa-3x c"></i></a>
                <a href="#"><i class="fa fa-linkedin-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-pinterest-square fa-3x "></i></a>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nec nisl odio. Mauris vehicula at nunc id posuere. Curabitur nec nisl odio. Mauris vehicula at nunc id posuere. 
                </p>
            </div>
        </div>
        <hr>
    </div>
    <!-- /.col -->
    <div class="col-md-12 end-box ">
        &copy; 2014 | &nbsp; All Rights Reserved | &nbsp; www.yourdomain.com | &nbsp; 24x7 support | &nbsp; Email us: info@yourdomain.com
    </div>

    <div id="order_popup" class="white_content2" style="height:100%;display:none;top: 0px;">
        <div style="display:table-cell;vertical-align:middle;width:100%;">
            <div style="padding: 15px;text-align: justify; font-size:13px">
                <div align="center" style="padding:5px;background-color:#6A75F0;color:white;">Order</div>
                <div align="left" style="padding:10px;background-color:white;">
                    <div overflow-scroll="true" style="max-height:200px;overflow-y: scroll;margin-bottom: 10px;">
                        <div>
                            <div style="padding-top: 10px;padding-bottom: 5px;">Please wait while process your order</div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <div id="order_popup_" class="black_overlay" style="position:absolute;display: none;"></div>

    <div class="white_content2" style="height:100%;display:none;top: 0px;">
        <div style="display:table-cell;vertical-align:middle;width:100%;">
            <div style="padding: 15px;text-align: justify; font-size:13px">
                <div align="center" style="padding:5px;background-color:#6A75F0;color:white;">Judul</div>
                <div align="left" style="padding:10px;background-color:white;">
                  <div overflow-scroll="true" style="max-height:200px;overflow-y: scroll;margin-bottom: 10px;">Pesan</div>
                  <button onclick="hide_login_popup()" style="width: 100%;height: 40px;background-color: #18b424;color: #fff;border: none;">Ok</button>
                </div>    
            </div>
        </div>
    </div>
    <div class="black_overlay" style="position:absolute;display: none;"></div>

    <!-- /.col -->
    <!--Footer end -->
    <!--Core JavaScript file  -->
    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
    <!--bootstrap JavaScript file  -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    <!--Slider JavaScript file  -->
    <script src="<?php echo base_url();?>assets/ItemSlider/js/modernizr.custom.63321.js"></script>
    <script src="<?php echo base_url();?>assets/ItemSlider/js/jquery.catslider.js"></script>
    <script src="<?php echo base_url();?>assets/js/list.js?v=0.0.1"></script>
    <script>
        $(function () {

            $('#mi-slider').catslider();

        });
		</script>
</body>
</html>
