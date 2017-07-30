<?php 
/**
 Template Name:Register Page
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
<div class="container" style="display: flex;">
	<div class="con_left">
		<form>
		<h2 class="register-page1">Register</h2>
		
		<ul class="modalLogin-loginFields">
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Name</span></label>
				<input name="username" placeholder="Name" title="Email address is required." type="email">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email</span></label>
				<input name="username"  placeholder="Name" title="Email address is required." type="email">
			</li>
			
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email</span></label>
				<input name="username"  placeholder="Name" title="Email address is required." type="email">
			</li>
			
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email</span></label>
				<input name="username"  placeholder="Name" title="Email address is required." type="email">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email</span></label>
				<input name="username"  placeholder="Name" title="Email address is required." type="email">
			</li>
			
			<li>
				<label class="nrd-loginModal-label u-vr2x" for="username"><span>Email</span></label>
				<input name="username"  placeholder="Name" title="Email address is required." type="email">
			</li>
                                
           </ul>
		   <div class="register-btn">
				<a href="http://petsonbreak.com/register/" class="btn_1 green medium">Register now</a>
			</div>
		   
		 </form>  

	</div>

	<div class="con_right">
		<h2>Petfinder makes adopting easier</h2>
		<p>Save and manage your pet searches and email communications</p>
		<p>Learn helpful pet care tips and receive expert advice</p>
		<p>Get involved and help promote adoptable pets in your area</p>
		<div class="">
		<img src="http://petsonbreak.com/wp-content/themes/adivaha/images/dog.png" alt="" style="   width: 100%;">
		</div>

	</div>

</div>

<div style="height: 120px;">


</div>

<style>
.con_left{float: left;width:70%;    padding: 28px 21px 40px 0px;

}
.con_right{float: right;width:30%;background-color: #663366;padding: 30px;}
.con_right h2{    font-size: 22px;
    color: #fff;
    font-style: italic;
    font-weight: 100;    margin-bottom: 20px;}
.con_right p{font-size: 14px;
    color: #fff;
    font-style: italic;
    font-weight: 100;}
.modalLogin-loginFields{}
.modalLogin-loginFields li{float: left;width: 49.5%;}
.modalLogin-loginFields li label{display: block;font-size: 21px;color: #777;font-weight: 300;    font-style: italic;margin-bottom: 16px;}
.modalLogin-loginFields li input{    height: 40px;
    margin-bottom: 25px;
    width: 100%;
    padding: 0px 0px 0px 9px;
    border-radius: 4px;
    border: 1px solid #777;}

.modalLogin-loginFields li:nth-child(2n-2){width: 49.5%;float: right;}
	
.register-btn{clear: both;float: left;width: 100%;padding: 28px 0px;}
.register-btn a{background: #663366;color: #fff;padding: 10px 25px;font-size: 14px;    border-radius: 4px;}
.register-page1{    font-size: 33px;
    font-weight: 300;
    border-bottom: 1px solid #ddd;
    color: #777;
    padding: 0px 0px 17px 0px;
    margin-bottom: 28px;}
	
a:hover, a:focus, a:active{color:#777;}
	
</style>

<?php get_footer(); ?>
