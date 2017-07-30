<?php 
/**
 Template Name: Privacy Policy
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
global $mk_options;
?>


<style>
.con_left{float: left;width:68%;    padding: 28px 21px 40px 0px;}


.con_right{float: right;width:30%;background-color: #f2db5c;padding:20px;margin-top:30px;margin-right:15px;}
.con_right h2{    font-size: 22px;
    color: #fff;
font-weight: 100;    margin-bottom: 20px;}
.con_right p{font-size: 14px;
    color: #fff;
font-weight: 100;}

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

#petBrd-page-wrap{padding-bottom: 15px;}
.pet_breadcrumb { 
	list-style: none; 
	overflow: hidden; 
	font: 15px;
}
.pet_breadcrumb li { 
	float: left; 
}
.pet_breadcrumb li a {
	color: white;
	text-decoration: none; 
	padding: 5px 0 5px 55px;
	background: #636; 
	position: relative; 
	display: block;
	float: left;
}
.pet_breadcrumb li a:after { 
	content: " "; 
	display: block; 
	width: 0; 
	height: 0;
	border-top: 50px solid transparent;           /* Go big on the size, and let overflow hide */
	border-bottom: 50px solid transparent;
	border-left: 30px solid #636;
	position: absolute;
	top: 50%;
	margin-top: -50px; 
	left: 100%;
	z-index: 2; 
}	

.pet_breadcrumb li.pet_breadcrumbActive a{
background: #636; 
}

.pet_breadcrumb li.pet_breadcrumbActive a:after{
border-left: 30px solid #636;
}


.pet_breadcrumb li a:before { 
	content: " "; 
	display: block; 
	width: 0; 
	height: 0;
	border-top: 50px solid transparent;           /* Go big on the size, and let overflow hide */
	border-bottom: 50px solid transparent;
	border-left: 30px solid white;
	position: absolute;
	top: 50%;
	margin-top: -50px; 
	margin-left: 1px;
	left: 100%;
	z-index: 1; 
}	
.pet_breadcrumb li:first-child a {
	padding-left: 10px;
}

.pet_breadcrumb li:last-child a {
	background: white !important;
	color: black;
	pointer-events: none;
	cursor: default;
}
.pet_breadcrumb li:last-child a:after { border: 0; }


.breadcrumbActive{ background: hsla(34,85%,25%,1) !important;}	

.errSpan{
    height: 20px;
    color: #d77f3f;
    display:block;
    margin-bottom: 2px;
    line-height: 20px;
	width:100%;
	float:left;
}

.terms_conditions-all h3{
	font-size: 20px;
    font-weight: 600;
    margin-bottom: 22px;
    line-height: 35px;
}

.terms_conditions-all ul li{
	font-size: 14px;
    color: #302a3d;

    line-height: 27px;
    word-spacing: 4px;
}

.all_text.terms_conditions-all{margin-bottom:20px;}


.terms_conditions-all .ulFirst {padding-left: 20px;padding-bottom: 20px;}
.terms_conditions-all .ulFirst li{list-style-type: lower-roman;}
.terms_conditions-all .ulSecond{padding-left: 20px;
    padding-bottom: 20px;}
.terms_conditions-all .ulSecond li{list-style-type:disc;}
	address{font-size: 14px;
    color: #302a3d;
    margin-bottom: 30px;
    line-height: 24px;
    word-spacing: 4px;} 
.terms_conditions-all .ulThird{
	
}
.terms_conditions-all .ulThird{padding-left:20px;padding-bottom:20px;}

.terms_conditions-all .ulThird li{list-style-type: lower-alpha;}
.terms_conditions-all h4 i{font-weight: 600;display: inline-block;padding-bottom: 10px;}
.terms_conditions-all .ulFifteen,.ulSixteen,.ulSeventeen,.ulFourth,.ulFifth,.ulSixth,.ulSeventh,.ulEigth,.ulTenth,.ulEighteen,.ulTwelth{padding-left:40px;padding-bottom:20px;}

.terms_conditions-all .ulFifteen li,.ulSixteen li,.ulSeventeen li,.ulFourth li,.ulFifth li,.ulSixth li,.ulSeventh li , .ulEigth li,.ulTenth li,.ulTwelth li{list-style-type:disc}

.terms_conditions-all .ulNinth{padding-left: 20px;padding-bottom: 20px;}
.terms_conditions-all .ulNinth li{list-style-type:lower-alpha;}

.terms_conditions-all .ulThirteenth{padding-left:60px;padding-bottom:20px;}
.terms_conditions-all .ulThirteenth li{list-style-type:circle;}
.terms_conditions-all .ulForteen{padding-left:60px;padding-bottom:20px;}
.terms_conditions-all .ulForteen li{list-style-type:disc;}
.terms_conditions-all .contactDesclaimer{    background: #636;
    color: #fff;
    font-size: 15px;
    padding: 10px;
    margin-bottom: 10px;}
.mail-link{color:#51bce6;}

.mail-link a{color:#51bce6;}
.mail-link a:hover{color:#51bce6;}


.privacy_policy .terms_conditions-all .ulFirst{
	padding-left: 40px;
}

.privacy_policy .terms_conditions-all .ulFirst li{
	list-style-type:lower-alpha;
}

.privacy_policy .terms_conditions-all .ulSecond li{
	list-style-type:lower-alpha;
}

.privacy_policy .terms_conditions-all .ulSecond{
	padding-left: 40px;
}


.all_text{padding: 0px 0px;}
.all_text h1{font-size: 30px;font-weight: 600;margin-bottom: 22px;}
.all_text p{font-size: 14px;color: #302a3d;margin-bottom: 30px;line-height: 27px;
    word-spacing: 4px;}


</style>



<div class="terms_conditions privacy_policy"  style="background: #fff;">
	<div class="container search-vendor-container">
	<div class="con_left">
		<div id="petBrd-page-wrap">
		  <ul class="pet_breadcrumb">
					<li class=" pet_breadcrumbStep pet_breadcrumbActive"><a href="<?php echo site_url();?>">Home</a></li>
					<li class="pet_breadcrumbStep"><a href="#">Privacy Policy</a></li>
				</ul>
			</div>
		<div class="pet-search-left">
			<div class="all_text terms_conditions-all" style="margin-left:100px;">
				
				
						<h1>OUR COMMITMENT TO PRIVACY</h1>
						<p>Our Privacy Policy was developed as an extension of our commitment to combine quality products and services with integrity in dealing with our users.  The Policy is designed to assist you in understanding how we collect, use and safeguard the personal information you provide to us and to assist you in making informed decisions when using our site and our products and services.</p>
						
					
						
						
						<h1>REGISTRATION</h1>
						
						<p>If you register on PetsonBreak.com as a member/Vendor, we collect and store all the information you enter. Our statistics are derived from this information. This information may be used to target our registered members for offering new, better services and promotions. PetsonBreak.com and its partners to contact you regarding new services and products in which you may be interested might use your e-mail address.</p>
						
						<p>We also display certain information you enter on your specific profile detail page including but not limited to: your name and other personal details.</p>
						
						
					
						
						<h1>NO USE OF OUR SITE BY PERSONS UNDER 18</h1>
						
						<p><i>No person under 18 should use or disclose information on this site.</i></p>
						
						<h1>REGISTRATION OBLIGATIONS</h1>
						<p>If you register in PetsonBreak.com, you agree to:</p>
						<ul class="ulFirst">
						<li>provide true, accurate, current and complete information about yourself, your pet(s) and about business (incase you are registering yourself as Vendor)</li>
						
						<li>maintain and promptly update the Registration Content to keep it true, accurate, current and complete. If you provide any information that is untrue, inaccurate, not current or incomplete, PetsonBreak.com has reasonable grounds to suspect that such information is untrue, inaccurate, not current or incomplete and PetsonBreak.com reserves the right to suspend or terminate your services.</li>
						
					
						
						</ul>
						
						<p>Your PetsonBreak.com Account Information and Profile are password-protected so that other PetsonBreak.com members and / or third parties will not have the ability to access, edit or delete this personal information. Any password protection system may be vulnerable to certain attacks, and therefore PetsonBreak.com cannot 100% guarantee the protection of your personal information from malicious third parties. We recommend you to do not disclose your password to anyone and change your password from time to time.</p>
						
						<p>We use secure socket layer (SSL) encryption to protect the transmission of the information you submit to us when you use oursecure online forms. The information you provide to us is stored securely.</p>
						
						<p>Financial transactions are carried out securely on our behalf by a third party payment processing company. We do not collect, store or have access to the financial information you disclose to our payment processor.</p>
						
						<p>If you choose to post information on PetsonBreak.com or maintain email or telephone contact with us, we may retain such information also and its transmission via email is not secured.</p>
						
						
						<h1>PUBLISHING INFORMATION</h1>
						
						<p>All of your Publishing Information will be publicly available on PetsonBreak.com and therefore accessible by visitors and members.</p>
						
						<p>Any Published Information that you may use on PetsonBreak.com forms becomes public information and you respond for them (including but not limited to the rights of confidentiality and copyrights).</p>
						
						<p>Any Published Information that you may use on PetsonBreak.com forms becomes public information and you respond for them (including but not limited to the rights of confidentiality and copyrights).</p>
						
						<p>If you submit any information to PetsonBreak.com to be published on our site through the publishing forms you are deemed to have given consent to the publication of such information.</p>
						
						
						<p>We will never share your email address or phone numbers with other members, only you can do this by giving away this information on areas where free text can be entered such as profile details or messages between members. We might provide your IP address only to members you contact, just to be able to keep and maintain a high quality site by trying to eliminate scam and fraud as much as possible.</p>
						
						
						<h1>COOKIES</h1>
						
						
						<p>PetsonBreak.com uses cookies only to maintain your information as you move throughout this site and facilitate your member activities. A cookie is a small piece of information used to identify an individual when the person is accessing a site. At no time is any personal information stored in a cookie, nor is any tracking information made available to other sites for any reason. Cookies are used only for the intended purpose and scope of PetsonBreak.com.</p>
						
						
						<h1>INFORMATION DISCLOSURE</h1>
						
						<p>PetsonBreak.com does not disclose the collected information (except the Publishing Information) to any third parties, unless acting under the belief that such action is necessary to:</p>
						
						<ul class="ulSecond">
						 <li>conform to legal requirements or comply with legal process</li>
						 
						<li>protect and defend the rights or property of PetsonBreak.com</li>
						
						<li>act to protect the interests of its members or others.</li>
					
						</ul>
						
						<p>We reserve the right to disclose any collected information to authorities where we have reason to believe that such disclosure is necessary to identify, contact or bring legal action against someone who may be infringing or threatening to infringe, or who may otherwise be causing injury to or interference with, the title, rights, interests or property of PetsonBreak.com, our members, customers, partners, other web site users or anyone else who could be harmed by such activities.</p>
						
						<p>We reserve the right to disclose any collected information in response to a judicial order or when we believe that such disclosure is required by law, regulation or administrative order of any court, governmental or regulatory authority.</p>
						
						<p>PetsonBreak.com considers and respects an individual's privacy seriously and importantly. The services we provide require that we collect, process, use, display and distribute certain details you provide us. Therefore, PetsonBreak.com does not guarantee that your information will be protected from exposure in any particular party or group. If you would like to remove your member account you can do this while you are logged in.</p>
						
						
						<p>We welcome your additional input regarding our Privacy Policy or our services provided to you.</p>
						
						<p>YOUR USE OF PETSONBREAK.COM MEANS THAT YOU ACCEPT THE PRACTICES SET FORTH IN THIS POLICY.  WE RESERVE THE RIGHT TO MAKE CHANGES TO THE POLICY BY POSTING THE NEW VERSION WITH A NEW EFFECTIVE DATE.  YOUR CONTINUED USE INDICATES YOUR AGREEMENT TO THE CHANGES.</p>
						
				
				
			</div>
	 </div>
	 </div>
	 <div class="con_right">
		<div class="pet-search-right">
			<?php  echo getPopularCategories();?>
		</div>
		
				<div id="quick_links">
			<?php  echo getQuickLinks();?>
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




<?php get_footer(); ?>

