!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name="robots" content="index, follow" />
  <meta name="keywords" content="" />
  <meta name="title" content="" />
  <meta name="description" content="" />
<title>Metro Site</title>

<!-- ////////////////////////////////// -->
<!-- //      Start Stylesheets       // -->
<!-- ////////////////////////////////// -->
<link href="<?= $assets?>/css/style.css" rel="stylesheet" type="text/css" />

<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        // -->
<!-- ////////////////////////////////// -->
<script type="text/javascript" src="<?= $assets?>/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?= $assets?>/js/dropdown.js"></script>
<script type="text/javascript" src="<?= $assets?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?= $assets?>/js/Grandesign_Neue_Serif_400-Grandesign_Neue_Serif_700-Grandesign_Neue_Serif_italic_400.font.js"></script>
<script type="text/javascript">
            Cufon.replace('h1') ('h2') ('h3') ('h4') ('h5') ('h6') ('#mainmenu ul li a', { 
				hover: true
			 });
</script>
<!--[if IE 6]>    
    <script type="text/javascript" src="<?= $assets?>/js/DD_belatedPNG.js"></script>
	<script type="text/javascript"> 
	   DD_belatedPNG.fix('img'); 
	</script>    
<![endif]-->
 
</head>
<body>
<div id="container">
	<div id="top_ridge"></div>
    <div id="main">
    
    	<!-- BEGIN OF TOP -->
    	<div id="top">
        	<div id="top_area">
            
            	<!-- BEGIN OF LOGO -->
            	<div id="logo">
                	<a href="index.html">f!</a>
                </div>
                <!-- END OF LOGO -->
                
                <!-- BEGIN OF MAINMENU -->
                <div id="mainmenu">
                    <ul id="menu">
                        <li><a href="<?= site_url();?>/">Home</a></li>
                        <li><a href="<?= site_url();?>/About/index">About</a></li>
                        <li><a href="<?= site_url();?>/Blog/index/">Blog</a></li>
                        <li><a href="<?= site_url();?>/Contact/index">Contact</a></li>
                        <li><a href="#">Pages</a>
                            <ul>
                                <li><a href="faq.html">FAQ page</a></li>
                                <li><a href="element.html">Element page</a></li>
                                <li><a href="single.html">Single page</a></li>
                                <li><a href="fullwidth.html">Fullwidth page</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- END OF MAINMENU -->
                
            </div>
        </div>
        <!-- END OF TOP -->
        
        <!-- BEGIN OF CONTENT -->
        <div id="content">
            <div id="content_main">
            <h1 class="title_page">Blog</h1>
            <h2 class="desc_title">Story from us</h2><br />
            
            <? if (have_posts()) :?>
            	<? while (have_posts()) : the_post();?>
            
            <div <?php post_class(); ?> id="post post-<?php the_ID(); ?>"><!-- Blog Post 1 -->
            	<div class="entry_icon">
                	<ul>
                    	<li><img src="<?= $assets?>/images/icon-author.png" alt="" class="imgleft" /><a href="#"><?php the_author(); ?></a></li>
                        <li><img src="<?= $assets?>/images/icon-calendar.png" alt="" class="imgleft" /><?php the_time(); ?></li>
                        <!-- <li><img src="<?= $assets?>/images/icon-comment.png" alt="" class="imgleft" /><a href="#">2 Comments</a></li> -->
                        <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;', '', 'Comments Closed'); ?>
                        <!-- <li><img src="<?= $assets?>/images/icon-tag.png" alt="" class="imgleft" /><a href="#">Tag1</a></li>-->
                        <?php the_tags('Tags:' . ' ', ', ', '<br />'); ?>
                        <?php get_the_category_list(', '); ?>
                    </ul>
                </div>
                <div class="entry_text">
                	<img src="<?= $assets?>/images/post1.jpg" alt="" />
                    <h2 class="post_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_content('Read the rest of this entry &raquo;');?></p>
                </div>
                <div class="clr"></div>
            </div>
            
            <? endwhile;?>
            
            <div class="pagenavi"><!-- Page Navigation -->
            	<span class="page">Page :</span><a href="#">1</a><a href="#" class="current">2</a><a href="#">3</a><a href="#">4</a>
            </div>
            
            </div>
            <? else : ?>
            
            <? endif;?>
            <!-- BEGIN OF SIDEBAR -->
            <div id="content_right">
            	<div id="sidebar">
            	<ul>
            		<li>
                    	<h2>Categories</h2>
                         <div class="side_box">
                         	<ul>
                                <li><a href="#">Web Design and Programing</a></li>
                                <li><a href="#">Photoshop and Illustrator</a></li>
                                <li><a href="#">SEO and Internet Maeketing</a></li>
                                <li><a href="#">Jquery,  AJAX, and PHP</a></li>
                                <li><a href="#">Lifestyle and Technology</a></li>
                            </ul>
                         </div>
                    </li>
            		<li>
                    	<h2>Archives</h2>
                         <div class="side_box">
                         	<ul>
                                <li><a href="#">December, 2010</a></li>
                                <li><a href="#">November, 2010</a></li>
                                <li><a href="#">September, 2010</a></li>
                                <li><a href="#">Agustus, 2010</a></li>
                            </ul>
                         </div>
                    </li>
            		<li>
                    	<h2>Our Sponsors</h2>
                         <div class="side_box" id="widget_ads">
                             <a href="#"><img src="<?= $assets?>/images/ads1.gif" alt="" /></a>
                             <a href="#"><img src="<?= $assets?>/images/ads2.gif" alt="" /></a>
                             <a href="#"><img src="<?= $assets?>/images/ads3.gif" alt="" /></a>
                             <a href="#"><img src="<?= $assets?>/images/ads4.gif" alt="" /></a>
                         </div>
                    </li>
                </ul>
                </div>
                <!-- END OF SIDEBAR -->
                
            </div>
            <div class="clr"></div>            
        </div>
        <!-- END OF CONTENT -->
        
        <!-- BEGIN OF FOOTER -->        
        <div id="footer">
        	<div id="footer_area">
            	<img src="<?= $assets?>/images/logo-footer.png" alt="" /><br />
                Copyright &copy; 2010 Metrosite Company.  All rights reserved <!-- copyright text here -->
            </div>
        </div>
        <!-- END OF FOOTER -->
        
    </div>
    <div id="bottom_ridge"></div>
</div>
</body>
</html>