<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name="robots" content="index, follow" />
  <meta name="keywords" content="" />
  <meta name="title" content="" />
  <meta name="description" content="" />
<title>MetroSite</title>

<!-- ////////////////////////////////// -->
<!-- //      Start Stylesheets       // -->
<!-- ////////////////////////////////// -->
<link href="<?= $assets?>/css/style.css" rel="stylesheet" type="text/css" />

<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        // -->
<!-- ////////////////////////////////// -->
<script type="text/javascript" src="<?= $assets?>/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?= $assets?>/js/dropdown.js"></script>
<script src="<?= $assets?>/js/jquery.cycle.all.js" type="text/javascript"></script>
<script type="text/javascript">
   $(function(){     
         $('#slideshow').cycle({
            timeout: 5000,  // milliseconds between slide transitions (0 to disable auto advance)
            fx:      'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...            
            pager:   '#pager',  // selector for element to use as pager container
            pause:   0,	  // true to enable "pause on hover"
			cleartypeNoBg: true, // set to true to disable extra cleartype fixing (leave false to force background color setting on slides)
            pauseOnPagerHover: 0 // true to pause when hovering over pager link
        });
     });
</script>
<script type="text/javascript" src="<?= $assets?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?= $assets?>/js/Grandesign_Neue_Serif_400-Grandesign_Neue_Serif_700-Grandesign_Neue_Serif_italic_400.font.js"></script>
<script type="text/javascript">
            Cufon.replace('h1') ('h2') ('h3') ('h4') ('h5') ('h6') ('#mainmenu ul li a', { 
				hover: true
			 }) ('.butmore', { 
				textShadow: '0px 1px 0px #fff'
			 }) ('#twitter', { 
				textShadow: '0px 1px 0px #fff'
			 });
</script>
<script src="<?= $assets?>/js/jquery.cycle.all.js" type="text/javascript"></script>
<script type="text/javascript">

  $(function() {
  	//for homepage slideshow
	$('#slideshow').cycle({
            timeout: 5000,  // milliseconds between slide transitions (0 to disable auto advance)
            fx:      'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc... 
			prev:   '#slideprev', // selector for element to use as click trigger for next slide  
			next:   '#slidenext', // selector for element to use as click trigger for previous slide 
            pause:   0,	  // true to enable "pause on hover"
			cleartypeNoBg:   true, // set to true to disable extra cleartype fixing (leave false to force background color setting on slides) 
            pauseOnPagerHover: 0 // true to pause when hovering over pager link
    });
  
	//for scroll box
	$('#container_scroll').cycle({
            timeout: 0,  // milliseconds between slide transitions (0 to disable auto advance)
            fx:     'scrollHorz', // choose your transition type, ex: fade, scrollUp, shuffle, etc...     
			prev:   '#arrowprev', // selector for element to use as click trigger for next slide  
			next:   '#arrownext', // selector for element to use as click trigger for previous slide 
			cleartypeNoBg:   true, // set to true to disable extra cleartype fixing (leave false to force background color setting on slides)
			height:154, // container height 
            pauseOnPagerHover: 0 // true to pause when hovering over pager link
    });
	     
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
                        <li class="current"><a href="<?= site_url();?>/">Home</a></li>
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
        
        <!-- BEGIN OF HEADER -->
        <div id="header">
        	<div id="slidenav">
            <div id="slideprev"></div>
            <div id="slidenext"></div>
            </div>
            
            <!-- BEGIN OF SLIDESHOW -->
        	<ul id="slideshow">
            
            <li><!-- slide 1 -->
                <img src="<?= $assets?>/images/slide1.jpg" alt="" />
                <div class="slidetext">
                    <div class="padtext">
                    <h2><a href="#">Synergy between art &amp; technology</a></h2>
                    <span>sit dolor sit amet polusta imusu dollor met itum sumosta liposus manalkumil manilukamna dolusta simulta minkum kumnosti dolum sumnosta lopsumosi Itaque earum rerum hic tenet sapiente delectus, ut aut reiciendis voluptatibus</span>
                    </div>
                </div>
            </li>
            
            <li><!-- slide 2 -->
                <img src="<?= $assets?>/images/slide2.jpg" alt="" />
                <div class="slidetext">
                    <div class="padtext">
                    <h2><a href="#">Business strength lies in your confidence</a></h2>
                    <span>sit dolor sit amet polusta imusu dollor met itum sumosta liposus manalkumil manilukamna dolusta simulta minkum kumnosti dolum sumnosta lopsumosi Itaque earum rerum hic tenet sapiente delectus, ut aut reiciendis voluptatibus</span>
                    </div>
                </div>
            </li>
            
            <li><!-- slide 3 -->
                <img src="<?= $assets?>/images/slide3.jpg" alt="" />
                <div class="slidetext">
                    <div class="padtext">
                    <h2><a href="#">Reach your business to the highest peak</a></h2>
                    <span>sit dolor sit amet polusta imusu dollor met itum sumosta liposus manalkumil manilukamna dolusta simulta minkum kumnosti dolum sumnosta lopsumosi Itaque earum rerum hic tenet sapiente delectus, ut aut reiciendis voluptatibus</span>
                    </div>
                </div>
            </li>
            
            <li><!-- slide 4 -->
                <img src="<?= $assets?>/images/slide4.jpg" alt="" />
                <div class="slidetext">
                    <div class="padtext">
                    <h2><a href="#">Nature is the best teacher for your business</a></h2>
                    <span>sit dolor sit amet polusta imusu dollor met itum sumosta liposus manalkumil manilukamna dolusta simulta minkum kumnosti dolum sumnosta lopsumosi Itaque earum rerum hic tenet sapiente delectus, ut aut reiciendis voluptatibus maiores alias</span>
                    </div>
                </div>
            </li>
            
            </ul>
            <!-- END OF SLIDESHOW -->
            
        	<div id="twitter"><a href="#"><img src="<?= $assets?>/images/twitter.png" alt="" class="imgleft" />follow us on twiter</a></div><!-- end of twitter -->
        </div>
        <!-- END OF HEADER -->
        
        <!-- BEGIN OF CONTENT -->
        <div id="content">
        <h1 class="welcome_text">Hi..!! We are a web agency based on Indonesia<br />
We always bring smart and fresh solution to your business</h1>
		
        <!-- begin of home text -->
		<div id="homepage_text">
        	<div class="two_column">
                <img src="<?= $assets?>/images/icon1.png" alt="" class="imgleft" />
                <h3 class="title">Increase you business market</h3>
                <p class="text-front">Lorem ipsum dolor sit amet, consectetur adipisicing elitsed dolo eiusmod tempor incididunt ut labore et dolore magna aliquaenil adminim veniam, quis nostrud exercitation ullamco laboris nisir ut aliquip ex ea commodo consequat duis aute</p>
                <a href="#" class="butmore">get more info</a>
            </div>
        	<div class="two_column nomargin">
                <img src="<?= $assets?>/images/icon2.png" alt="" class="imgleft" />
                <h3 class="title">We have many fresh idea</h3>
                <p class="text-front">Lorem ipsum dolor sit amet, consectetur adipisicing elitsed dolo eiusmod tempor incididunt ut labore et dolore magna aliquaenil adminim veniam, quis nostrud exercitation ullamco laboris nisir ut aliquip ex ea commodo consequat duis aute</p>
                <a href="#" class="butmore">get more info</a>
            </div>
            <div class="clr"></div>
        </div>
        <!-- end of home text -->
        
        <!-- begin of bottom box -->
        <div id="bottom_box">
            <div id="arrowprev"></div>
            <div id="arrownext"></div>
            
            <!-- begin of container_scroll -->
       		<ul id="container_scroll">
            
            	<li><!-- team 1 -->
                    <div class="c_left"><img src="<?= $assets?>/images/people.gif" alt="" class="imgcustom" /></div>
                    <div class="c_right">
                        <h3>Mr. Gunawan Widjaya - Co Founder Metrosite</h3>
                        <span>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia </span>
                        <div class="social_network">
                        Follow us on : <a href="#"><img src="<?= $assets?>/images/icon-fb.png" alt="" /></a> <a href="#"><img src="<?= $assets?>/images/icon-twitter.png" alt="" /></a> <a href="#"><img src="<?= $assets?>/images/icon-flickr.png" alt="" /></a> <a href="#"><img src="<?= $assets?>/images/icon-linkedin.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="clr"></div>
                </li>
                
            	<li><!-- team 2 -->
                    <div class="c_left"><img src="<?= $assets?>/images/people.gif" alt="" class="imgcustom" /></div><!-- end of .c_left -->
                    <div class="c_right">
                        <h3>Mrs. Endang Fitriani - CEO</h3>
                        <span>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia</span>
                        <div class="social_network">
                        Follow us on : <a href="#"><img src="<?= $assets?>/images/icon-fb.png" alt="" /></a> <a href="#"><img src="<?= $assets?>/images/icon-twitter.png" alt="" /></a> <a href="#"><img src="<?= $assets?>/images/icon-flickr.png" alt="" /></a> <a href="#"><img src="<?= $assets?>/images/icon-linkedin.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="clr"></div>
                </li>
                
            </ul>
            <!-- end of container_scroll -->
            
        </div>
        <!-- end of bottom box -->
        
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
</html>s