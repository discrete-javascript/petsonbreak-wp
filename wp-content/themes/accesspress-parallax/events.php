<?php 
	/**
		Template Name: Event Page
		* The template for displaying all pages.
		*
		* This is the template that displays all pages by default.
		* Please note that this is the WordPress construct of pages
		* and that other 'pages' on your WordPress site will use a
		* different template.
		*
		* @package WordPress
		* @subpackage Twenty_Twelve
		* @since Twenty Twelve 1.0
	*/
	get_header();
	
?>
<style>
#news_n_updates .pet_house1{
	width:100%;
	background: #fff;
	
}

#news_n_updates .pet_house1 .news p{
	font-size: 13px;
    color: #333;
	line-height: 21px;
    font-weight: 500;
}

#news_n_updates .pet_house1 .news h3{
	font-size: 20px;
    color: #555;
    padding-bottom: 5px;
}

#news_n_updates .pet_house1 .news h3 a{
	color: #555;
	font-size: 15px;
}

#news_n_updates .news-title img{
	width:10px;
	height:10px;
}

#news_n_updates .news{
	margin-bottom: 0px;
    border-bottom: 1px solid #aaa;
}

#news_n_updates .news:last-child{
	border-bottom:0px;
}

#news_n_updates .news-section h2{
    color: #333;
    font-weight: 600;
    background: #fff;
    border-bottom: 1px solid #aaa;
    margin-bottom: 0px;
	font-size:20px;
}

#news_n_updates .news-section-div{
	padding:0px;
}
#news_n_updates .news-section-body{
	padding:10px 0px;
	height:250px;
	overflow:scroll;
}

#news_n_updates .news-section-body::-webkit-scrollbar {
    width: 6px;
    background-color: #F5F5F5;
}

#news_n_update .news-section-body::-webkit-scrollbar-thumb {
    background-color: #555;
    border: 2px solid #555555;
}



.ser_services{
 background-position:center center;
 background-repeat:no-repeat;
}

.pet-search-left{}
.pet-search-right{}	
#filter_frm .criteria_listing_Star input{float:left;}
.pet-search-left{float: left;width: 69%;}
.pet-search-right{float: right;width: 100%;background-color: #f2db5c;margin-bottom:15px;}
.pet-child-left{float: left;width: 28%;border-right: #d8d8d8 1px solid;padding: 0px 10px 0px 0px;}
.pet-child-right{float: right;border-left: #f2f2f2 1px solid;width: 72%;padding: 0px 0px 0px 10px;position:relative;}
.pet-child-right ul{}
.pet-child-right > ul > li{background: #fff;float: left;width: 100%;margin-bottom: 7px;height: 290px;}
.pet-child-right > ul > li:last-child{margin-bottom:0px;}
.pet-child-right ul li .float_left14{float: left;width: 40%;height: 100%;background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;}
.pet-child-right ul li .float_left14 img{height: 100%;width: 100%;}
.pet-child-right ul li .float_right14{float: right;width: 59%;height: 100%;padding: 10px}
.pet-child-right ul li .float_right14 .text-pack17{width: 100%;float: left;}
.pet-child-right ul li .float_right14 h2{font-size: 25px;font-weight: 600;color: #f2db5c;margin: 10px 0px;}

.boxs-41{width: 100%;float: left;}
.boxs-41 ul{float: left;width: 100%;}
.boxs-41 ul li{float: left;width: 50%;position: relative;    padding: 0px 8px 0px 0px;}
.boxs-41 ul li:nth-child(1){padding: 0px -5px 5px 0px;}
.boxs-41 ul li:nth-child(2){padding: 0px 0px 5px 5px;}
.boxs-41 ul li:nth-child(3){padding: 5px -5px 0px 0px;}
.boxs-41 ul li:nth-child(4){padding: 5px 0px 0px 5px;}


.boxImg1 img{width: 100%; height: 114px;
overflow: hidden;margin-left:-18px;}
.boxImg1-text{position: absolute;bottom:8px;left: 7px;right: 8px;}
.boxImg1-text h1{font-size: 15px;color: #fff;font-weight: 100;}
.boxImg1-text p{color: #fff;font-size: 13px;font-weight: 100;width: 100%;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;}
.boxImg1-text p a{color:#fff;font-size:15px;}




#quick_links .pet_house1{
	width:100%;
	background: #fff;
}

#quick_links .pet_house1 .news p{
	font-size: 13px;
    color: #333;
	line-height: 21px;
    font-weight: 500;
}

#quick_links .pet_house1 .news h3{
	font-size: 20px;
    color: #555;
    padding-bottom: 5px;
}

#quick_links .pet_house1 .news h3 a{
	color: #555;
	font-size: 15px;
}

#quick_links .news-title img{
	width:10px;
	height:10px;
}

#quick_links .news{
	margin-bottom: 0px;
    border-bottom: 1px solid #aaa;
}

#quick_links .news:last-child{
	border-bottom:0px;
}

#quick_links .quick-links-section h2{
    color: #333;
    font-weight: 600;
    background: #fff;
    border-bottom: 1px solid #aaa;
    margin-bottom: 0px;
	font-size:20px;
	padding:10px;
}



#quick_links .quick-links-section-div{
	padding:0px;
}
#quick_links .quick-links-section-body{
	padding:0px;
}

#quick_links .quick-links-section-body ul li{

	border-bottom: 1px solid #F6F6F6;
    font-size: 15px;
    color: #777;
	cursor:pointer;
}

#quick_links .quick-links-section-body ul li a.quick_petsrv{
	color: #777;
}

#quick_links .quick-links-section-body ul li>span{
		padding:15px 10px 10px 15px;
		display: inline-block;
		width: 100%;
		border:1px solid transparent;
}

#quick_links .quick-links-section-body ul li.isActive>span{
	border-bottom:1px solid #e8e8e8;
}

#quick_links .quick-links-section-body ul li>span{
	
}


#quick_links .quick-links-section-body ul li>span .fa-left{
	padding-right:12px;
}

#quick_links .quick-links-section-body ul li>span .fa-plane{
	color:#A3CCFF;
}

#quick_links .quick-links-section-body ul li>span .fa-cutlery{
	color:#FCC66E;
}

#quick_links .quick-links-section-body ul li>span .fa-taxi{
	color:#E072BE;
}
#quick_links .quick-links-section-body ul li>span .fa-calendar{
	color:#EBB4DA;
}
#quick_links .quick-links-section-body ul li>span .fa-paw{
	color:#00BEA6;
}

#quick_links .quick-links-section-body ul li>span .fa-tags{
	color:#A3CCFF;
}







#quick_links .quick-links-section-body ul li>span .fa-right{
	float: right;
    font-size: 21px;
    color: #ccc;
	transition:0.2s ease-in-out;

}

#quick_links .quick-links-section-body ul li.isActive>span .fa-right{
	transform: rotate(90deg);
    transition: 0.2s ease-in-out;
}

#quick_links .quick-links-section-body ul li>span:hover{
	background:#F6F6F6;

}


#quick_links .quick-links-section-body ul li .quick-sub-menu{
 display:none;	
 padding-left:20px;
}

#quick_links .quick-links-section-body ul li .quick-sub-menu li{
	 padding:15px 0 10px 35px;
}

#quick_links .quick-links-section-body::-webkit-scrollbar {
    width: 6px;
    background-color: #F5F5F5;
}

#quick_links .quick-links-section-body::-webkit-scrollbar-thumb {
    background-color: #555;
    border: 2px solid #555555;
}

.con_right{float: right;width:30%;background-color: #f2db5c;padding:20px;margin-top:30px;margin-right:15px;}
.con_right h2{    font-size: 22px;
    color: #fff;
font-weight: 100;    margin-bottom: 20px;}
.con_right p{font-size: 14px;
    color: #fff;
font-weight: 100;}

.con_left{float: left;width:68%;    padding: 28px 21px 40px 0px;}
</style>
<div id="events_page" style="background:#fff;">
	 <div class="container search-vendor-container">
	     
	    
		<div class="con_left" >
			<div class="no-offers" style="text-align:center;padding-top:60px;">
		    <img src="<?php echo get_template_directory_uri();?>/images/no-event.png?var=sdf"/>
		  </div>
			
		</div>
	
	<div class="con_right">

		<div class="pet-search-right">
			<?php  echo getPopularCategories();?>
		</div>
	    <div id="quick_links">
			<?php echo getQuickLinks();?>
		</div>
		
		<div id="news_n_updates">
		<h2><?php echo $mk_options['latest_news'];?></h2>
			<div class="pet_house1 news-section">
    
  <div class="news-section-div">
   
     <div class="news-section-body">
      <?php $results =$wpdb->get_results("select * from twc_news where published='Yes' and status_deleted=0");
          foreach($results as $obj){?>
       <div class="news">
         <h3><span class="news-title"><img src="<?php echo get_template_directory_uri();?>/images/rightN.png"></span>
		 <a href="<?php echo site_url().'/news-and-updates/?id='.$obj->id;?>"><?php echo stripslashes($obj->title);?></a></h3>
         <p><?php echo stripcslashes(substr($obj->description,0,148)); ?>...</p>
       </div>
       <?php } ?>

     </div>
  </div>
</div>
		</div>
		
	</div>
	</div>
</div>

<div class="height_class1457" style="">
	
	
</div>


<?php get_footer(); ?>

