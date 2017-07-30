<?php 
/**
 Template Name: FAQ
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
#faq .faq-container{padding:28px 0px 50px 0px;}
.faq_title h3{    font-size: 30px;
    font-weight: 600;
    margin-bottom: 25px;
    border-bottom: 1px solid #e1e1e1;
    padding-bottom: 25px;}
.ans_div{display:none;}
.faq-tab{background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fcfcfc), to(#efefef));
    background: -webkit-linear-gradient(top, #fcfcfc, #efefef);
    background: -moz-linear-gradient(top, #fcfcfc, #efefef);
    background: -ms-linear-gradient(top, #fcfcfc, #efefef);
    background: -o-linear-gradient(top, #fcfcfc, #efefef);
    color: #333;
    padding: 10px 15px;
    cursor: pointer;
        border: 1px #e1e1e1 solid;
    border-radius: 7px;
    margin-bottom: 10px;
	text-align:center;
}
.faq-tab h3{font-size:13px;line-height:17px;}
.ques_div h3{color: #00a5d8;
    font-size: 15px;font-weight:600;    line-height: 28px;cursor:pointer;}
.ques_ans_div{}
.faq-categories{    padding: 15px;
    border: 1px solid #e1e1e1;}

.ques_div{padding-bottom: 15px;}
.ans_div{padding-bottom:15px;}
.ans_div p{    font-size: 13px;
    line-height: 25px;}
.faq-tab.isActive{    background: #4f4f4f;
    color: #fff;
    -moz-box-shadow: inset 0 0 10px #000000;
    -webkit-box-shadow: inset 0 0 10px #000000;
    box-shadow: inset 0 0 10px #000000;}
.faq-tab.isActive h3{color:#fff;}

.plusIcon{}
.plusIcon span{}
.question_div{}


</style>

<script type="text/javascript">
  $(document).ready(function() {
	$('.tabcls').css("display","none");
	$('.active').css("display","block");
    $(".faq-tab").click(function(){
	    $(this).addClass('isActive').siblings().removeClass('isActive');
		var rel = $(this).attr('rel');
		
		$('.tabcls').css("display","none");
		$('#faqCat_' + rel).css("display","block");
       
    });  
	
	
	$('.ques_div').click(function(){
	    
		$(this).parent('.ques_ans_div').find('.ans_div').slideToggle();
		$(this).parent('.ques_ans_div').siblings().find('.ans_div').slideUp();
		})
	
  });
  
  
  
  
  
</script>



<div id="faq"  style="background: #fff;">
	<div class="container faq-container">
		<div class="col-md-10 faq-main col-md-offset-1">
		   <div  class="row">
		     <div class="col-md-12">
			   
			     <div class="faq_title">
				   <h3>FREQUENTLY ASKED QUESTIONS</h3>
				 </div>
				 
			 </div>
		   
		     <div class="col-md-4">
				<div class="faq-categories">
					
					<div class="faq-tab isActive" rel="1">
					  <h3>Holidays / weekend getaways /camping sites</h3>	
					</div>
					
					
					<div class="faq-tab" rel="2">
					  <h3>Transportation – pet friendly cabs / services</h3>	
					</div>
					
					<div class="faq-tab" rel="3">
					  <h3>Other questions</h3>	
					</div>
						
				</div>
			 
			 </div>
			 
			<div class="col-md-8">
			 
			 	<div class="faq-questions">
					
					<div class="tabcls active" id="faqCat_1">
					  
					   <div class="ques_ans_div">
					     
					
						 
					   
					     <div class="ques_div">
					     <h3>How does petsonbreak.com works ? How can I search for pet friendly hotels/villas/location ?</h3>
						  </div>
						 <div class="ans_div">
						 <p>Petsonbreak helps you explore, select and book properties for holidays with your pet. You can do a quick search on our homepage based on the destination you have in mind or search properties  from your city. On the Holidays page you can also explore different experiences that Petsonbreak holidays have to offer. After browsing through different properties you have made your choice, click on book to be directed to the booking page.</p>
						 <span>By default our aggregated search engine shows pet friendly resorts/villas/hotels for you to make easy choice and book instantly without any hassle.</span>
						
					   </div>
					
					 </div>
					 
					 
					   <div class="ques_ans_div">
					     <div class="ques_div">
					     <h3>How do you define PET FRIENDLY ? </h3>
						  </div>
						 <div class="ans_div">
						 <p>We consider a property pet friendly, if their policies allow your pet to accompany you during your stay at the property. The facilities and amenities offered by each hotel/resort/homestay vary. You can access their detailed pet policy when you view the listing.</p>
						 
						 </div>
					   </div>
					
					 
					 
					   <div class="ques_ans_div">
					     <div class="ques_div">
							 <h3>Are pets allowed in rooms ? is there pet food available ? is there any care taker available ?  </h3>
							 	 </div>
						 <div class="ans_div">
						 <p>We try to give you max information once you select your hotel ,The facilities and amenities offered by each hotel/resort/homestay vary. You can access their detailed pet policy when you view the listing.</p>
						 
						 </div>
					   </div>
				
					 
					   <div class="ques_ans_div">
					     <div class="ques_div">
							 <h3>What do I have to pay ? can I pay online ? </h3>
							  </div>
						 <div class="ans_div">
						 <p>Our site is powered with payment getaway’s and you can pay by credit card/debit card/net banking .You pay the room fare plus pet fee (if any) as mentioned by the property in their listing. Taxes as applicable will be charged. No extra room charge/fee over and above this amount will be levied by petsonbreak.com .In most cases, we receive a small commission from the hotel when you book your room on www.petsonbreak.com. Please support our site (and keep it free!) by booking your room on Petsonbreak.com and letting our hotel partners know you found them on our site. Thanks!</p>
						 
						 </div>
					   </div>
					
					 
					 
				   <div class="ques_ans_div">
					     <div class="ques_div">
							 <h3>How do I change/modify/cancel a booking ?  </h3>
							 	 </div>
						 <div class="ans_div">
						 <p>You can login to your account and manage bookings from your dashboard. However, a modification / cancellation / refund will take place as per the property’s stated terms in this regard on their listing page.In most cases cancellation within 24 hrs are non refundable ,For refunds and cancellation , respective hotel/resort/villa policies will be applicable and petsonbreak.com will follow the same . pls call us on 8999306724 as well as drop us mail on <a href="" class="mail-link">info@petsonbreak.com</a> for such issues .</p>
						 
						 </div>
					   </div>
				
					 
					    <div class="ques_ans_div">
					     <div class="ques_div">
							 <h3>What is the cancellation/refund policy ?when do I get refund ?   </h3>
							  </div>
						 <div class="ans_div">
						 <p>The cancellation / refund policy varies from property to property since we extend their cancellation / refund terms to the customers. Therefore, please go through the stated refund / cancellation policy (on the listing page) for the property that you are booking. Once we process your cancellation to respective properties , if the said booking is eligible for refund , as per respective property policies , after getting refund from them , the same will be directed to you , The process takes min 7 to 10 days ,petsonbreak.com is not responsible in the event of bookings done by guest for non-refundable properties or if the property management doesn’t approve refund , petsonbreak.com follows respective hotel/villa/resort refundable policy by default .</p>
						 
						 </div>
					   </div>
					
					 
					 
					 
					</div>
					
					<div class="tabcls" id="faqCat_2">
						<div class="ques_ans_div">
					     <div class="ques_div">
							 <h3>How do I book pet friendly cabs/self driven services ?   </h3>
							  </div>
						 <div class="ans_div">
						 <p>You need to call us on 8999306724 or drop us mail with details on <a href="" class="mail-link">info@petsobreak.com</a> , our service expert will immediately respond to your request and process the same as per cab available nearest to your location .You will receive an SMS confirmation on your registered mobile number with the car details if the booking is confirmed. Our cab services are charged as per garage to garage.</p>
						 
						 </div>
					   </div>
					
					 
					<div class="ques_ans_div">
					     <div class="ques_div">
							 <h3>What are the charges ?  </h3>
							  </div>
							 <div class="ans_div">
						 <p>All our pet friendly cabs are charged on regular terrify available in the market .we charge over and above a nominal fee ,which goes towards keeping the vehicle clean  , infectant  free ,for next pet traveller . Self driven cabs are on request and charges are case specific .You need to call us on 8999306724 or drop us mail with details on <a href="" class="mail-link">info@petsobreak.com.</a></p>
						 
						 </div>
					   </div>
					
					 
					 
					<div class="ques_ans_div">
							<div class="ques_div">
							 <h3>Cab payment terms  </h3>
							  </div>
							 <div class="ans_div">
						 <p>Pet friendly cabs charges to paid on completion on trip , for self driven option ,we ask for security deposit which is refundable at the time of vehicle return , upon inspection of vehicle ,the same is returned to customer</p>
						 
						 </div>
					   </div>
					
					 
					 
					</div>
					
					
					<div class="tabcls" id="faqCat_3">
							 
					<div class="ques_ans_div">
							<div class="ques_div">
							 <h3>How can I become a member of Petsonbreak.com?</h3>
							  </div>
							 <div class="ans_div">
						 <p>You can subscribe to our newsletter by entering your email address by clicking the "sign up" button. By registering for the Petsonbreak.com newsletter, you'll be the first to know about "members only" travel discounts, sweepstakes, and special offers from our advertisers.</p>
						 
						 </div>
					   </div>
					
					 	<div class="ques_ans_div">
							<div class="ques_div">
								<h3>I'm planning a dog event. How can I add it to the website?</h3>
									 </div>
							 <div class="ans_div">
						 <p>If you know about or are organizing a dog event that isn't already on our site, you can email us about it at <a href="" class="mail-link">woof@petsonbreak.com.</a></p>
						 
						 </div>
					   </div>
				
					 
					<div class="ques_ans_div">
							<div class="ques_div">
								<h3>I know of another pet friendly hotel. Who should I tell?</h3>
								 </div>
							 <div class="ans_div">
						 <p>Know of another hotel that allows pets? You can let us know about it by emailing <a href="" class="mail-link">woof@petsonbreak.com.</a></p>
						 
						 </div>
					   </div>
					
					 
					 
					 <div class="ques_ans_div">
							<div class="ques_div">
								<h3>My favorite place to bring my pet  isn't listed. How can I add it to the website?</h3>
									 </div>
							 <div class="ans_div">
						 <p>To add a great dog park, beach, or other attraction to Petsonbreak.com, please email <a href="" class="mail-link">woof@petsonbreak.com.</a></p>
						 
						 </div>
					   </div>
				
					 
					 	 <div class="ques_ans_div">
							<div class="ques_div">
								<h3>I know of a great restaurant that allows pets. How can I add it to the website?</h3>
								 </div>
							 <div class="ans_div">
						 <p>To add a pet friendly restaurant to the website, please email <a href="" class="mail-link">woof@petsonbreak.com.</a></p>
						 
						 </div>
					   </div>
					
					 
					 <div class="ques_ans_div">
							 <div class="ques_div">
								<h3>How can I add my pet friendly hotel to the website?</h3>
								 </div>
							 <div class="ans_div">
						 <p>For information on adding your pet friendly hotel, motel, bed & breakfast, vacation rental, or other pet business on Petsonbreak.com, please sign up as VENDOR , once you sign up our team will visit as well as send contract form ,post inspection your property will be listed FREE , alternatively drop us mail on <a href="" class="mail-link">info@petsonbreak.com.</a></p>
						 
						 </div>
					   </div>
					
					 
					 <div class="ques_ans_div">
						 <div class="ques_div">
								<h3>Is petsonbreak.com hiring?</h3>
								 </div>
							 <div class="ans_div">
						 <p>Yes! Petsonbreak.com is always looking for a few good "dog people" to join our team. We have positions available both remotely and at ourHO . Please email a cover letter and resume to <a href="" class="mail-link">woof@petsonbreak.com.</a> for consideration.</p>
						 
						 </div>
					   </div>
					
					 
					  <div class="ques_ans_div">
						 <div class="ques_div">
								<h3>How can I contact Petsonbreak.com?</h3>
									 </div>
							 <div class="ans_div">
						 <p>We can also be contacted by email at <a href="" class="mail-link">info@petsonbreak.com.</a>, or by phone at 8999 306 724 / 7566 485 676.</p>
						 
						 </div>
					   </div>
				
					 
					 
					</div>
					
				
				</div>
			 </div>
			 
			 
		   
		   </div>
		  
		</div>
	
	</div>
</div>




<?php get_footer(); ?>

