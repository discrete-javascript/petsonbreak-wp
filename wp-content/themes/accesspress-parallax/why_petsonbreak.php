<?php 
/**
 Template Name: Why PetsonBreak?
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

body{background:#fff !important;
}

#ajaxItem1.showAjax{
	background: #FB0051;
}

#ajaxItem2.showAjax{
	background: #543468;
}

#ajaxItem3.showAjax{
	background: #7792AB;
}

#ajaxItem4.showAjax{
	background: #7BE6C8;
}

#ajaxItem5.showAjax{
	background: #FFC432;
}

#ajaxItem1.hiddenAjax{
	background: #FB0051;
}

#ajaxItem2.hiddenAjax{
	background: #543468;
}

#ajaxItem3.hiddenAjax{
	background: #7792AB;
}

#ajaxItem4.hiddenAjax{
	background: #7BE6C8;
}

#ajaxItem5.hiddenAjax{
	background: #FFC432;
}





.showAjax .showAjax_cont{
    opacity: 0;
	animation-name: showAjax_Item_anim;
	animation-fill-mode: forwards;
	  animation-duration: 0.4; 
	  animation-timing-function: ease-out; 
	  animation-delay: 1.2s;
	  
	-webkit-animation-name: showAjax_Item_anim;
	-webkit-animation-fill-mode: forwards;
	  -webkit-animation-duration: 0.4; 
	  -webkit-animation-timing-function: ease-out; 
	  -webkit-animation-delay: 1.2s;
	  
	  	-moz-animation-name: showAjax_Item_anim;
	-moz-animation-fill-mode: forwards;
	  -moz-animation-duration: 0.4; 
	  -moz-animation-timing-function: ease-out; 
	  -moz-animation-delay: 1.2s;
	  
	  	-ms-animation-name: showAjax_Item_anim;
	-ms-animation-fill-mode: forwards;
	  -ms-animation-duration: 0.4; 
	  -ms-animation-timing-function: ease-out; 
	  -ms-animation-delay: 1.2s;
	  
	  	-o-animation-name: showAjax_Item_anim;
	-o-animation-fill-mode: forwards;
	  -o-animation-duration: 0.4; 
	  -o-animation-timing-function: ease-out; 
	  -o-animation-delay: 1.2s;
	  
	  
	}

@keyframes showAjax_Item_anim {
    0%   {opacity:0;}
    100% {opacity: 1;}
}



@-webkit-keyframes showAjax_Item_anim {
    0%   {opacity:0;}
    100% {opacity: 1;}
}



@-moz-keyframes showAjax_Item_anim {
    0%   {opacity:0;}
    100% {opacity: 1;}
}



@-ms-keyframes showAjax_Item_anim {
    0%   {opacity:0;}
    100% {opacity: 1;}
}



@-o-keyframes showAjax_Item_anim {
    0%   {opacity:0;}
    100% {opacity: 1;}
}



.hiddenAjax{
	background: #7792AB;padding:20px;color:#fff;position: absolute;
    top: 5px;
	bottom:5px;	
    visibility: hidden;
    opacity: 0;
    transition: 0.5s ease-in-out 0.2s;
    }
	
.ajaxItemDiv:first-child >.ajaxItem{padding:5px;height:400px;width:100%;}
	
.ajaxItemDiv:first-child > .colHalf{width:100%;}
.ajaxItemDiv{width: 100%;float: left;}
.ajaxItemDiv .colHalf{width: 50%;float: left;height: 295px;position:relative;padding:5px;}



.closeAjDiv{position: absolute;top:10px;right:20px;color: #fff;cursor:pointer;}
.ajaxItem{float:left;position:relative;text-align: justify;}
.ajaxItem:not(.fullajaxItem):hover{opacity:0.9;transition:0.2s linear;}

.ajaxItem:not(.fullajaxItem):hover:before{
	opacity:1;
	right: 3px;
    bottom: 3px;
    transition: 0.2s linear;
}

.ajaxItem:before{height: 18px;
    width: 18px;
    background-image: url(../images/svg/ajax-expand.svg);
    background-repeat: no-repeat;
    background-size: contain;
    bottom: 9px;
    opacity: 0;
    position: absolute;
    right: 9px;
	transition: 0.2s linear;
    -webkit-transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
    z-index: 6;
	content:'';}


.fullajaxItemGone .hiddenAjax .showAjax_cont{
    opacity: 1;
	animation-name: hiddenAjax_Item_anim;
	animation-fill-mode: forwards;
	  animation-duration: 0.4s; 
	  animation-timing-function: ease-out;
	  
	 -webkit-animation-name: hiddenAjax_Item_anim;
	-webkit-animation-fill-mode: forwards;
	  -webkit-animation-duration: 0.4s; 
	  -webkit-animation-timing-function: ease-out; 
	  
	  	-moz-animation-name: hiddenAjax_Item_anim;
	-moz-animation-fill-mode: forwards;
	  -moz-animation-duration: 0.4s; 
	  -moz-animation-timing-function: ease-out; 
	  
	  	-ms-animation-name: hiddenAjax_Item_anim;
	-ms-animation-fill-mode: forwards;
	  -ms-animation-duration: 0.4s; 
	  -ms-animation-timing-function: ease-out; 
	  
	  	-o-animation-name: hiddenAjax_Item_anim;
	-o-animation-fill-mode: forwards;
	  -o-animation-duration: 0.4s; 
	  -o-animation-timing-function: ease-out; 
	}

@keyframes hiddenAjax_Item_anim {
    0%   {opacity:1;}
    100% {opacity: 0;}
}

@-webkit-keyframes hiddenAjax_Item_anim {
    0%   {opacity:1;}
    100% {opacity: 0;}
}

@-moz-keyframes hiddenAjax_Item_anim {
    0%   {opacity:1;}
    100% {opacity: 0;}
}
@-ms-keyframes hiddenAjax_Item_anim {
    0%   {opacity:1;}
    100% {opacity: 0;}
}
@-o-keyframes hiddenAjax_Item_anim {
    0%   {opacity:1;}
    100% {opacity: 0;}
}



.fullajaxItemGone .hiddenAjax {
    opacity:1;
	visibility:visible;
	animation-name: fullhiddenAjax_Item_anim;
	animation-fill-mode: forwards;
	  animation-duration: 0.2s; 
	  animation-timing-function: ease-out; 
	  animation-delay: 1.2s;
	  
	  	-webkit-animation-name: fullhiddenAjax_Item_anim;
	-webkit-animation-fill-mode: forwards;
	  -webkit-animation-duration: 0.2s; 
	  -webkit-animation-timing-function: ease-out; 
	  -webkit-animation-delay: 1.2s;
	  
	  	-moz-animation-name: fullhiddenAjax_Item_anim;
	-moz-animation-fill-mode: forwards;
	  -moz-animation-duration: 0.2s; 
	  -moz-animation-timing-function: ease-out; 
	  -moz-animation-delay: 1.2s;
	  
	  	-ms-animation-name: fullhiddenAjax_Item_anim;
	-ms-animation-fill-mode: forwards;
	  -ms-animation-duration: 0.2s; 
	  -ms-animation-timing-function: ease-out; 
	  -ms-animation-delay: 1.2s;
	  
	  	-o-animation-name: fullhiddenAjax_Item_anim;
	-o-animation-fill-mode: forwards;
	  -o-animation-duration: 0.2s; 
	  -o-animation-timing-function: ease-out; 
	  -o-animation-delay: 1.2s;
	}

@keyframes fullhiddenAjax_Item_anim {
    0%   {
	transform:scale(1);
	opacity:1;
	visibility:visible;
	}
    100% {transform:scale(0);
	transform-origin:center;
	visibility:hidden;border-radius:100%;
	opacity:0;
	}
}


@-webkit-keyframes fullhiddenAjax_Item_anim {
    0%   {
	transform:scale(1);
	opacity:1;
	visibility:visible;
	}
    100% {transform:scale(0);
	transform-origin:center;
	visibility:hidden;border-radius:100%;
	opacity:0;
	}
}


@-moz-keyframes fullhiddenAjax_Item_anim {
    0%   {
	transform:scale(1);
	opacity:1;
	visibility:visible;
	}
    100% {transform:scale(0);
	transform-origin:center;
	visibility:hidden;border-radius:100%;
	opacity:0;
	}
}


@-ms-keyframes fullhiddenAjax_Item_anim {
    0%   {
	transform:scale(1);
	opacity:1;
	visibility:visible;
	}
    100% {transform:scale(0);
	transform-origin:center;
	visibility:hidden;border-radius:100%;
	opacity:0;
	}
}


@-o-keyframes fullhiddenAjax_Item_anim {
    0%   {
	transform:scale(1);
	opacity:1;
	visibility:visible;
	}
    100% {transform:scale(0);
	transform-origin:center;
	visibility:hidden;border-radius:100%;
	opacity:0;
	}
}

.siblingFull{
	animation-name:   siblingFullAnim;
    animation-duration: 0.4s; 
    animation-timing-function: ease-out; 
    animation-delay: 0.4s;
    animation-fill-mode: forwards;
	
	-webkit-animation-name:   siblingFullAnim;
    -webkit-animation-duration: 0.4s; 
    -webkit-animation-timing-function: ease-out; 
    -webkit-animation-delay: 0.4s;
    -webkit-animation-fill-mode: forwards;
	
	-moz-animation-name:   siblingFullAnim;
    -moz-animation-duration: 0.4s; 
    -moz-animation-timing-function: ease-out; 
    -moz-animation-delay: 0.4s;
    -moz-animation-fill-mode: forwards;
	
	-ms-animation-name:   siblingFullAnim;
    -ms-animation-duration: 0.4s; 
    -ms-animation-timing-function: ease-out; 
    -ms-animation-delay: 0.4s;
    -ms-animation-fill-mode: forwards;
	
	
	-o-animation-name:   siblingFullAnim;
    -o-animation-duration: 0.4s; 
    -o-animation-timing-function: ease-out; 
    -o-animation-delay: 0.4s;
    -o-animation-fill-mode: forwards;
	
	}
  
.fullajaxItem{
  animation-name:   fullajaxItem_anim;
  animation-duration: 0.4s; 
  animation-timing-function: ease-out; 
  animation-delay: 0.4s;
  animation-fill-mode: forwards;
  
  
  -webkit-animation-name:   fullajaxItem_anim;
  -webkit-animation-duration: 0.4s; 
  -webkit-animation-timing-function: ease-out; 
  -webkit-animation-delay: 0.4s;
  -webkit-animation-fill-mode: forwards;
  
   -moz-animation-name:   fullajaxItem_anim;
   -moz-animation-duration: 0.4s; 
  -moz-animation-timing-function: ease-out; 
  -moz-animation-delay: 0.4s;
  -moz-animation-fill-mode: forwards;
  
   -ms-animation-name:   fullajaxItem_anim;
  -ms-animation-duration: 0.4s; 
  -ms-animation-timing-function: ease-out; 
  -ms-animation-delay: 0.4s;
  -ms-animation-fill-mode: forwards;
  
   -o-animation-name:   fullajaxItem_anim;
  -o-animation-duration: 0.4s; 
  -o-animation-timing-function: ease-out; 
  -o-animation-delay: 0.4s;
  -o-animation-fill-mode: forwards;
  
  
  }

@keyframes fullajaxItem_anim{
	0%{
     	
	}
	
	100%{
	    width:100%;
     	min-height: 810px;
	}
}


@-webkit-keyframes fullajaxItem_anim{
	0%{
     	
	}
	
	100%{
	    width:100%;
     	min-height: 810px;
	}
}


@-moz-keyframes fullajaxItem_anim{
	0%{
     	
	}
	
	100%{
	    width:100%;
     	min-height: 810px;
	}
}


@-ms-keyframes fullajaxItem_anim{
	0%{
     	
	}
	
	100%{
	    width:100%;
     	min-height: 810px;
	}
}


@-o-keyframes fullajaxItem_anim{
	0%{
     	
	}
	
	100%{
	    width:100%;
     	min-height: 810px;
	}
}



@keyframes siblingFullAnim{
	0%{
     	
	}
	
	100%{
	    width:100%;
	}
}

@-webkit-keyframes siblingFullAnim{
	0%{
     	
	}
	
	100%{
	    width:100%;
	}
}


@-moz-keyframes siblingFullAnim{
	0%{
     	
	}
	
	100%{
	    width:100%;
	}
}


@-ms-keyframes siblingFullAnim{
	0%{
     	
	}
	
	100%{
	    width:100%;
	}
}


@-o-keyframes siblingFullAnim{
	0%{
     	
	}
	
	100%{
	    width:100%;
	}
}



.fullajaxItemGone{
  width:100%;
  float: left;
  min-height: 810px;
  position: relative;
  padding:5px;
  animation-name:   fullajaxItemGone;
  animation-duration: 0.4s; 
  animation-timing-function: ease-out; 
  animation-delay: 0.4s;
  animation-fill-mode: forwards;
  
  
  -webkit-animation-name:   fullajaxItemGone;
  -webkit-animation-duration: 0.4s; 
  -webkit-animation-timing-function: ease-out; 
  -webkit-animation-delay: 0.4s;
  -webkit-animation-fill-mode: forwards;
  
  -moz-animation-name:   fullajaxItemGone;
  -moz-animation-duration: 0.4s; 
  -moz-animation-timing-function: ease-out; 
  -moz-animation-delay: 0.4s;
  -moz-animation-fill-mode: forwards;
  
  -o-animation-name:   fullajaxItemGone;
  -o-animation-duration: 0.4s; 
  -o-animation-timing-function: ease-out; 
  -o-animation-delay: 0.4s;
  -o-animation-fill-mode: forwards;
  
  -ms-animation-name:   fullajaxItemGone;
  -ms-animation-duration: 0.4s; 
  -ms-animation-timing-function: ease-out; 
  -ms-animation-delay: 0.4s;
  -ms-animation-fill-mode: forwards;
  
  
}

@keyframes fullajaxItemGone{
	0%{
	 width:100%;
	 min-height: 810px;
	}
	
	100%{
	    width:50%;
		min-height: 295px;
		height:295px;
	}
}


@-webkit-keyframes fullajaxItemGone{
	0%{
	 width:100%;
	 min-height: 810px;
	 }
	
	100%{
	    width:50%;
		min-height: 295px;
		height:295px;
	}
}

@-moz-keyframes fullajaxItemGone{
	0%{
	 width:100%;
	 min-height: 810px;
	}
	
	100%{
	    width:50%;
		min-height: 295px;
		height:295px;
	}
}

@-ms-keyframes fullajaxItemGone{
	0%{
	 width:100%;
	 min-height: 810px;
	}
	
	100%{
	    width:50%;
		min-height: 295px;
		height:295px;
	}
}

@-o-keyframes fullajaxItemGone{
	0%{
	 width:100%;
	 min-height: 810px;
	}
	
	100%{
	    width:50%;
		min-height: 295px;
		height:295px;
	}
}


.ajaxItemDiv:first-child > .fullajaxItemGone{
	  width:100%;
	  float: left;
	  min-height: 810px;
	  position: relative;
	  padding:5px;
	  animation-name:   firstfullajaxItemGone;
	  animation-duration: 0.4s; 
	  animation-timing-function: ease-out; 
	  animation-delay: 0.4s;
	  animation-fill-mode: forwards;
	  
	  -webkit-animation-name:   firstfullajaxItemGone;
	  -webkit-animation-duration: 0.4s; 
	  -webkit-animation-timing-function: ease-out; 
	  -webkit-animation-delay: 0.4s;
	  -webkit-animation-fill-mode: forwards;
	  
	  -moz-animation-name:   firstfullajaxItemGone;
	  -moz-animation-duration: 0.4s; 
	  -moz-animation-timing-function: ease-out; 
	  -moz-animation-delay: 0.4s;
	  -moz-animation-fill-mode: forwards;
	  
	  -ms-animation-name:   firstfullajaxItemGone;
	  -ms-animation-duration: 0.4s; 
	  -ms-animation-timing-function: ease-out; 
	  -ms-animation-delay: 0.4s;
	  -ms-animation-fill-mode: forwards;
	  
	  -o-animation-name:   firstfullajaxItemGone;
	  -o-animation-duration: 0.4s; 
	  -o-animation-timing-function: ease-out; 
	  -o-animation-delay: 0.4s;
	  -o-animation-fill-mode: forwards;
}


@keyframes firstfullajaxItemGone{
	0%{
		width:100%;
	 min-height: 810px;
	}
	
	100%{
	    width:100%;
		min-height: 295px;
		height:295px;
	}
}


@-webkit-keyframes firstfullajaxItemGone{
	0%{
		width:100%;
		min-height: 810px;
	}
	
	100%{
	    width:100%;
		min-height: 295px;
		height:295px;
	}
}

@-moz-keyframes firstfullajaxItemGone{
	0%{
		width:100%;
	 min-height: 810px;
	}
	
	100%{
	    width:100%;
		min-height: 295px;
		height:295px;
	}
}
@-ms-keyframes firstfullajaxItemGone{
	0%{
		width:100%;
	 min-height: 810px;
	}
	
	100%{
	    width:100%;
		min-height: 295px;
		height:295px;
	}
}
@-o-keyframes firstfullajaxItemGone{
	0%{
		width:100%;
	 min-height: 810px;
	}
	
	100%{
	    width:100%;
		min-height: 295px;
		height:295px;
	}
}





.siblingFullGone{
  width:100%;
  float: left;
  height: 295px;
  position: relative;
  padding:5px;
  animation-name:   siblingFullGone;
  animation-duration: 0.4s; 
  animation-timing-function: ease-out; 
  animation-delay: 0.4s;
  animation-fill-mode: forwards;
  
  
  -webkit-animation-name:   siblingFullGone;
  -webkit-animation-duration: 0.4s; 
  -webkit-animation-timing-function: ease-out; 
  -webkit-animation-delay: 0.4s;
  -webkit-animation-fill-mode: forwards;
  
   -moz-animation-name:   siblingFullGone;
  -moz-animation-duration: 0.4s; 
  -moz-animation-timing-function: ease-out; 
  -moz-animation-delay: 0.4s;
  -moz-animation-fill-mode: forwards;
  
    -ms-animation-name:   siblingFullGone;
  -ms-animation-duration: 0.4s; 
  -ms-animation-timing-function: ease-out; 
  -ms-animation-delay: 0.4s;
  -ms-animation-fill-mode: forwards;
  
    -o-animation-name:   siblingFullGone;
  -o-animation-duration: 0.4s; 
  -o-animation-timing-function: ease-out; 
  -o-animation-delay: 0.4s;
  -o-animation-fill-mode: forwards;
  
  
  }

@keyframes siblingFullGone{
	0%{
	 width:100%;
	}
	
	100%{
	    width:50%;
	}
}

@-webkit-keyframes siblingFullGone{
	0%{
	 width:100%;
	}
	
	100%{
	    width:50%;
	}
}


@-moz-keyframes siblingFullGone{
	0%{
	 width:100%;
	}
	
	100%{
	    width:50%;
	}
}

@-ms-keyframes siblingFullGone{
	0%{
	 width:100%;
	}
	
	100%{
	    width:50%;
	}
}

@-o-keyframes siblingFullGone{
	0%{
	 width:100%;
	}
	
	100%{
	    width:50%;
	}
}

.showAjax{ 
    padding: 20px;
    color: #fff;
    position: absolute;
    top: 5px;
    left: 5px;
    bottom: 5px;
    right: 5px;
	display: block;
	opacity: 1;
    visibility: visible;
	transform:scale(0);
	border-radius:200% 0px 0px 0px;
	transform-origin:right bottom;
	animation-name: showAjax_Anim;
	animation-fill-mode: forwards;
	 animation-duration: 0.4s; 
	 animation-timing-function: ease-in; 
	 
	-webkit-animation-name: showAjax_Anim;
	-webkit-animation-fill-mode: forwards;
	 -webkit-animation-duration: 0.4s; 
	 -webkit-animation-timing-function: ease-in; 
	 
	-moz-animation-name: showAjax_Anim;
	-moz-animation-fill-mode: forwards;
	-moz-animation-duration: 0.4s; 
	 -moz-animation-timing-function: ease-in; 
	 
	 	-ms-animation-name: showAjax_Anim;
	-ms-animation-fill-mode: forwards;
	 -ms-animation-duration: 0.4s; 
	 -ms-animation-timing-function: ease-in; 
	 
	 	-o-animation-name: showAjax_Anim;
	-o-animation-fill-mode: forwards;
	 -o-animation-duration: 0.4s; 
	 -o-animation-timing-function: ease-in; 
}


@keyframes showAjax_Anim{
	0%{
	 transform:scale(0);
	 border-radius:200% 0px 0px 0px;
	 }
	 
	90%{
		border-radius:200% 0px 0px 0px;}
	 
	 
	
	100%{
	 transform:scale(1);
	 border-radius:0%;
		}
	
}

@-webkit-keyframes showAjax_Anim{
	0%{
	 transform:scale(0);
	 border-radius:200% 0px 0px 0px;
	 }
	 
	90%{
		border-radius:200% 0px 0px 0px;}
	 
	 
	
	100%{
	 transform:scale(1);
	 border-radius:0%;
		}
	
}

@-moz-keyframes showAjax_Anim{
	0%{
	 transform:scale(0);
	 border-radius:200% 0px 0px 0px;
	 }
	 
	90%{
		border-radius:200% 0px 0px 0px;}
	 
	 
	
	100%{
	 transform:scale(1);
	 border-radius:0%;
		}
	
}

@-ms-keyframes showAjax_Anim{
	0%{
	 transform:scale(0);
	 border-radius:200% 0px 0px 0px;
	 }
	 
	90%{
		border-radius:200% 0px 0px 0px;}
	 
	 
	
	100%{
	 transform:scale(1);
	 border-radius:0%;
		}
	
}

@-o-keyframes showAjax_Anim{
	0%{
	 transform:scale(0);
	 border-radius:200% 0px 0px 0px;
	 }
	 
	90%{
		border-radius:200% 0px 0px 0px;}
	 
	 
	
	100%{
	 transform:scale(1);
	 border-radius:0%;
		}
	
}


#why_petson.custom_pages{padding:28px 0px 40px 0px;width:100%;float:left;overflow:hidden;}
	#why_petson .content-part{padding:5px;padding-bottom:60px;}
	#why_petson .content-part>h1{font-size: 30px;font-weight: 600;margin-bottom: 22px;}
	#why_petson .content-part>p{font-size: 15px;line-height: 38px;}
	#why_petson .col_remain2{width:30%;float:left;height:379px;}
	#why_petson .colOneRemain{width:70%;float:left;height:379px;}
	#why_petson .colone_third{width:33.33333%;height:379px;}
	#why_petson .ajaxItem{padding:5px;}
	
	#why_petson #d3 .default_images{

	}
	
#why_petson .paris-14{
    background:none;
    max-width:100%;
}


	#why_petson #d4 .default_content a{background:#FF0052;}
	#why_petson #d4 .default_content a .paris-14{position: absolute;
    bottom: 0px;
    top: 0px;
    right: 0px;
    left: 0px;
    padding: 15px;
    width: 100%;}
	
	#why_petson #d4 .default_content a .paris-14 h2{
	    font-size: 26px;
	}
	
	#why_petson #d4 .default_content a .paris-14 p{    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    text-align: center;
    font-style: normal;
	font-size:16px;}
	#why_petson .ajaxItemDiv:first-child >.ajaxItem.colone_third:first-child{width: 70%;
    float: left;}
	#why_petson .ajaxItemDiv:first-child >.ajaxItem.colone_third:nth-child(2){width: 30%;
    float: left;}
	
	#why_petson .ajaxItemDiv:nth-child(3) >.ajaxItem.colone_third:first-child{width: 30%;
    float: left;}
	#why_petson .ajaxItemDiv:nth-child(3) >.ajaxItem.colone_third:nth-child(2){width: 70%;
    float: left;}
	#why_petson #d2 .default_content a{background:#87e77b;}
	#why_petson #d5 .default_content a{background:#803F6E;}
	#why_petson #d5 .default_content a .paris-14{
	    position: absolute;
    bottom: 0px;
    top: 0px;
    right: 0px;
    left: 0px;
    padding: 15px;
    width: 100%;
	}
	
	
	#why_petson #d5 .default_content a .paris-14 .d5-paris-14{    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    text-align: center;
    font-style: normal;}
	
	#why_petson #d5 .default_content a .paris-14 .d5-paris-14 > h1{
	    color: #fff;
    font-size: 55px;
    font-weight: 500;
	}
	
	#why_petson #d5 .default_content a .paris-14 .d5-paris-14 > h5{
	    color: #fff;
    font-size: 25px;
    font-weight: 400;
    margin-top: 25px;
	}
	
	#why_petson #d5 .default_content a .paris-14 .d5-paris-14 > p{
	    font-size: 16px;
    font-style: normal;
	}
	
	
	#why_petson #d6 .default_content a{background:#87e77b;}
	#why_petson #d6 .default_content a .paris-14{position: absolute;
    bottom: 0px;
    top: 0px;
    right: 0px;
    left: 0px;
    padding: 15px;
    width: 100%;}
	
	#why_petson #d6 .default_content a .paris-14 h2{
	font-size:26px;
	}
	
	#why_petson #d6 .default_content a .paris-14 p{    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    text-align: center;
    font-style: normal;
	font-size:16px;}
	#why_petson .showAj_desc{font-size:16px;line-height:35px;padding-bottom:10px;}
	#why_petson #d2 .showAjax_cont > ul li{
	font-size:16px;
	line-height:40px;}
	
	#why_petson #d5 .showAjax_cont > ul li{
	font-size:16px;
	line-height:40px;}
	
	#why_petson #d4.colone_third{
	padding:5px;
	float: left;
    position: relative;
	}
	
	#why_petson #d4.colone_third .default_content > a{
	cursor:default;
	}
	
	
	#why_petson #d6.col_remain2{
	padding:5px;
	float: left;
    position: relative;
	}
	
	#why_petson #d6.col_remain2 .default_content>a{
	cursor:default;
	}
	
	
	#why_petson #d7.colOneRemain{
	padding:5px;
	float: left;
    position: relative;
	}
	
	#why_petson #d7.colOneRemain .default_content>a{
	cursor:default;
	}
	
   #d5.colone_third {
   float:left;
   padding:5px;
   position:relative;}
	
	
   #why_petson #d5.colone_third  .default_content>a {
    cursor: default;
    }

    #why_petson #ajaxItem6.showAjax{
	background:#71CFEA;
	}
	
	#why_petson #ajaxItem7.showAjax{
	background:#932B35;
	}
	
	#why_petson .asParnt_ulFirst{
	padding-left: 15px;
	}
	
	#why_petson .asParnt_ulFirst>li{
	list-style-type: decimal;

	}
	
	#why_petson .asParnt_ulSecond{
	 padding-left: 30px;
	}
	
	#why_petson .asParnt_ulSecond > li{
	  list-style-type:lower-alpha;
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
	background: #F47555; 
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
	border-left: 30px solid #F47555;
	position: absolute;
	top: 50%;
	margin-top: -50px; 
	left: 100%;
	z-index: 2; 
}	

.pet_breadcrumb li.pet_breadcrumbActive a{
background: #F47555; 
}

.pet_breadcrumb li.pet_breadcrumbActive a:after{
border-left: 30px solid #F47555;
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

.default_content{
	position: relative;
	width: 100%;
	float: left;
	height: 100%;
}

.default_content a{
    position: relative;
    display: block;
    width: 100%;
    float: left;
    height: 100%;

}

.default_content a img{
	width: 100%;
	height: 100%;

}
.showAjax_box{
	width: 49%;
    float: left;
	height: 295px;
}

.showAjax_box a{
    position: relative;
    display: block;
    width: 100%;
    float: left;
    height: 100%;
    background: #000;
}
.showAjax_box a img{
    width: 100%;
    height: 100%;
    opacity: 0.8;
}

.showAjax_box:first-child{
	margin-right: 1%;
	margin-bottom: 10px;
}

.showAjax_box:nth-child(2){
	margin-left: 1%;
	margin-bottom: 10px;
}

.showAjax_box:nth-child(3){
	margin-right:1%;
}
.showAjax_box:nth-child(4){
	margin-left: 1%;
}
.showAjax_Item{
	
}
.showAjax_Ite>h3{
	
}

.showAj_title{
	color: #fff;
    font-weight: 500;
    font-size: 23px;
    margin: 20px 0px;
}

.showAj_desc{
	padding-bottom:20px;
    text-align:justify;
}

.paris-14{position: absolute;bottom: 20px;left: 20px;max-width: 85%;width: auto;background: rgba(0,0,0,0.6);padding: 5px;text-align: left;}
.paris-14 h2{margin-bottom: 5px;font-size: 17px;color: #fff;font-weight: 500;}
.paris-14 p{font-size: 15px;color: #fff;}

</style>


<div style="padding:20px;">

<div class="custom_pages" id="why_petson">
		
		
			<div id="petBrd-page-wrap">
	
			

				<ul class="pet_breadcrumb">
					<li class=" pet_breadcrumbStep pet_breadcrumbActive"><a href="<?php echo site_url();?>">Home</a></li>
					<li class="pet_breadcrumbStep"><a href="#">Why Petsonbreak</a></li>
					
					
				</ul>
			
			</div>
				
		
	 	<div class="content-part">
		  <h1>Well we say why not? </h1>
		  <p style="text-align: justify;text-justify: inter-word;">At PetsonBreak we mean what we say and are committed to providing superlative experiences that can rarely be found elsewhere. For us, PetsonBreak is more than just a travel company; it is the embodiment of everything that we are truly passionate about. PetsonBreak is owned and staffed by pet people for whom work related with pets and travel is not simply an interesting job, but an all-consuming passion. </p>
		  <p style="text-align: justify;text-justify: inter-word;">We believe that travel should not simply be a business, but a way of exploring and understanding the diverse cultures, people and traditions that inhabit in this world and what more you can ask if your furry friend can tag along in these adventurous trips.</p>
		</div>
	<div class="custom_page_ajaxItem">
	<div class="ajaxItemDiv" >
	    
	
	
		<div class="ajaxItem colOneRemain" id="d1" rel="ajaxItem1">
        <div class="default_content">
                 <a href="javascript:void(0);">		 <div class="default_images" style="background: url(<?php echo get_template_directory_uri();?>/images/asCompany.jpg);
    background-size: cover;
    width: 100%;
    float: left;
    height: 100%;
    background-position: center center;">
			  </div>
                    <div class="paris-14">
                        <h1 style="font-weight:bold;font-size:28px;color:white;">For Pet Parents</h1>
                        <p></p>
                    </div>
                </a>
        </div>
		<div class="hiddenAjax" id="ajaxItem1">
		<div class="showAjax_cont">
		<span class="closeAjDiv" rel="1">X</span><h3 class="showAj_title">For Pet parents</h3>
		<p class="showAj_desc">Being Pet Parent ourselves we know how frustrating it is when we need some pet related information and we couldn’t find any due to dedicated and missing pet platform. When we envisioned PetsonBreak and started working and putting the concept from paper to reality, we ensured that PetsonBreak should offer all types of services that a pet parent needs. Following are some reasons why you can depend on PetsonBreak to keep you and your extended pet family happy and healthy:</p>
		
		
		<h5>Efficient and Pet friendly Travel service</h5>
		
		<p class="showAj_desc">PetsonBreak embodies the passion and enthusiasm that go hand in hand with both short weekend and long adventure travel along with your furry friends. Though we are enormously excited about the short weekend trips that we offer and these can be further customized based on your requirements. Put simply, these are trips are for real pet passionate travellers seeking adventure. Our wealth of personal experience we have gained over the years in Tour and travel Industry and working in far flung corners of nearby your cities are invaluable in showing you some of the truly forgotten corners, and our philosophy recognizes that there is more to travel than simply ticking off sights.</p>
		
		<p class="showAj_desc">To travel with PetsonBreak is to rediscover the meaning of YOUNG, WILD AND FREE travel; to explore remote pet friendly locations, to gaze in wonder at little seen sights, and to learn from and interact with other pet passionate intriguing peoples</p>
		
		<h5>Pet Friendly Cabs/ Self drive options</h5>
		
		
		<p class="showAj_desc">We are quite sure that you must have come across situations when we wanted to carry your pet and most of the Auto/Taxi refuses and bluntly says No on your face. PetsonBreak provides information about pet friendly taxicabs that you can book whenever you need one, be it within the city or you are planning weekend getaway with your pets. Explore these services with all available options like rent a car or self drive, compare competitive rates and you never have to leave your pet at home.</p>
		
		
		<h5>Pet Friendly Restaurants</h5>
		
		
		<p class="showAj_desc">They might be four-legged and furry, but for most of us, pets are an integral part of the family – in fact, at times, more revered than fellow humans. While you can take your pet out for a walk, letting them accompany you for a meal or a snack is still not a very feasible option. Fortunately, few restaurateurs (pet-lovers themselves) in the city are ensuring that there are enough pet-friendly restaurants in the city.</p>
		
		<p class="showAj_desc">Check with PetsonBreak for list of pet friendly restaurants in your city, apart from food, there are plenty of toys and other merchandise to keep your pet occupied while you sip on your coffee.</p>
		
		
		<h5>Events – chance to socialize you pets</h5>
		
		<p class="showAj_desc">As the pet awareness is increasing among the pet parents globally many Events are being planned and organized. PetsonBreak will provide information of such events so that you can plan your day ahead and spend some quality time with your furry friends. For details check our Events Section here</p>
		
		
		<h5>Pet transport/Relocation Services </h5>
		
		<p class="showAj_desc">With the hectic and ambitious lifestyle we often get stuck when we need to relocate (for Good) our furry friends. So far the only convenient and quick options were using the Airlines and relax. But there are limitations, Flights being an expensive affair (especially in Domestic Relocations) it also has very selective reach/presence.  PetsonBreak provides you various Relocation Options to choose based on your budget that to Free of cost. Select the right service provider, negotiate and check all legalities and paper work involved, Finalize and Freeze the relocation partner without our interference.</p>
		
		
		<h5>Reviews and Rating</h5>
		
		<p class="showAj_desc">This probably is the best feature that we have incorporated with all services we offer on PetsonBreak. Before you hop onto any deal we strongly recommend you to read the reviews and check the rating and learn more about the unbiased public opinion on the offered service/product. This is a good idea for small businesses, as customers are more likely to comment when they have positive experiences, and simultaneously negative reviews confirm why they don’t feel positive about it. Do not forget to rate and write reviews about the services you have either enjoyed or felt disappointed.</p>
		
		
		
		
		</div>
	</div></div>
	
	        <div class="col_remain2 ajaxItem" id="d2" rel="ajaxItem2">
                <div class="default_content">
                  <a href="javascript:void(0);">
					  <div class="paris-14">
     
				           <h1 style="font-weight:bold;font-size:28px;color:white;">For Investors</h1>
                  <p></p>
                </div>
                </a>
               </div><div class="hiddenAjax" id="ajaxItem2">
		<div class="showAjax_cont">
		<span class="closeAjDiv" rel="2">X</span><h3 class="showAj_title">For Investors</h3>
		
		<p class="showAj_desc">We as a team has spent lot of time energy and resources in analyzing ways that will help us build the most effective pet community and generate sales. Instead of wasting time and money trying to come up with some rocket science concept we decided to follow our passion. Being frank and open about PetsonBreak, we are very much certain that Investors/Angles with brick and mortar approach will not be able to understand our passion and commitment we have as Founders of PetsonBreak, But all those Investors with unbiased approach to new ideas and concept we can assure with confidence that PetsonBreak will give you the maximum return on your investment.</p>
		
		<h5>Our background, experience, and credibility</h5>
		
		<p class="showAj_desc">After spending more than a decade in Pet Industry and a lifetime of living and travelling especially across India (Country with most diverse and largest market of opportunities), we have tried to gain knowledge and formed relationships with the most impressive experts in their fields. We pride ourselves on being able to know most pain points as pet parents so that you can trust PetsonBreak to get exactly what you’re after.</p>
		
		<p class="showAj_desc">Petsonbreak.com is our initiative to bring the hospitality industry close to pet owners, in a different way, where we help the community grow, also support in sustainable tourism growth through our unique concept. </p>
		
	
		</div>
	</div></div>
		
	
	
	</div>
<div class="ajaxItemDiv">

        <div class="colone_third ajaxItem" id="d3" rel="ajaxItem3">
          <div class="default_content">
             <a href="javascript:void(0);">
			 <div class="default_images" style="background: url(<?php echo get_template_directory_uri();?>/images/asHumans.jpg);
    background-size: cover;
    width: 100%;
    float: left;
    height: 100%;
    background-position: center center;">
			  </div>
          <div class="paris-14">
            <h1 style="font-weight:bold;font-size:28px;color:white;">Is The Market Ready For Petsonbreak?</h2>
            <p></p>
          </div>
          </a>
               </div><div class="hiddenAjax" id="ajaxItem3">
		<div class="showAjax_cont">
		<span class="closeAjDiv" rel="3">X</span><h3 class="showAj_title">Is The Market Ready For Petsonbreak?</h3>
		
		<p class="showAj_desc">No online platform exist as on date</p>

		<p class="showAj_desc">Many Consumers Believe That Pets Are People, Too</p>
		<p class="showAj_desc">Marketers Target Tech-Savvy Shoppers</p>
		<p class="showAj_desc">Dogs Continue to Gain Popularity</p>
		
		
		</div>
	</div></div>
	
	
	        <div class="colone_third" id="d4" rel="ajaxItem4">
                <div class="default_content">
                  <a href="javascript:void(0);">
                <div class="paris-14">
                  <h2>Did you know the Fact#1</h2>
                  <p>The most dogs ever owned by one person were 5,000 Mastiffs owner by Kubla Khan</p>
                </div>
                </a>
               </div><div class="hiddenAjax" id="ajaxItem4">
		<div class="showAjax_cont">
		<span class="closeAjDiv" rel="4">X</span>
		</div>
	</div></div>
	
	
	        <div class="colone_third " id="d5" rel="ajaxItem5">
          <div class="default_content">
             <a href="javascript:void(0);">
          <div class="paris-14">
		    <div class="d5-paris-14">
            <h1>5</h2>
            <h5>Reasons</h5>
			<p>Smallest of businesses cannot ignore</p>
			</div>
          </div>
          </a>
               </div><div class="hiddenAjax" id="ajaxItem5">
		<div class="showAjax_cont">
		<span class="closeAjDiv" rel="5">X</span><h3 class="showAj_title">Top 5 Reasons why smallest of businesses cannot ignore PetsonBreak.com </h3>
		<p class="showAj_desc">"We don't have a storefront. We don't need a storefront” All we need is web presence.  We work for you by working with you. Amazing things come from collaboration</p>
		
		<p class="showAj_desc">There are plenty of compelling reasons how smallest of businesses today can benefit from a PetsonBreak, but here are six key considerations:</p>
		
		<ul>
		 <li><b>1. FREE Listing:</b> PetsonBreak provides free online platform where any storefront owner (shopkeeper) can list all the services he has to offer. PetsonBreak has tried covering almost all the services related to Pet Industry from both buyer and seller prospective. </li>
		 
		 <li><b>2. Visibility:</b> PetsonBreak provides free online platform where any storefront owner (shopkeeper) can list all the services he has to offer. PetsonBreak has tried covering almost all the services related to Pet Industry from both buyer and seller prospective. </li>
			
			
		<li><b>3. Reach:</b>With #PetsonBreak, you are no longer limited to a customer base that is in physical proximity to your shop/store. Your place of business may be in Mumbai, India but your customers can be in various global locations.</li>
		
		<li><b>4. Customer service:</b>When customers can log onto your storefront, read reviews and easily find the information they want-when they want it-their satisfaction increases.</li>
			
		<li><b>5. Competition:</b>A professional looking Web site can level the playing field for smaller companies trying to compete against larger enterprises. It's also a way to stay in the game; even if people can't find you on the Web chances are they can find your competitors.</li>
		
		<li><b>5. Credibility:</b>When you can draw attention of customers, partners, or even potential employees to your page’s review and ratings on #Petsonbreak, it tells them you are a serious business.</li>
			
		</ul>
		
		<p>With the advent of free, easy-to-use navigation, it's difficult to come up with a reason not to for registering your business on #PetsonBreak</p>
		
		</div>
	</div></div>

    </div>
<div class="ajaxItemDiv">

        <div class="col_remain2" id="d6" rel="ajaxItem6">
          <div class="default_content">
             <a href="javascript:void(0);">
          <div class="paris-14">
            <h2>Did you know the Fact#2</h2>
			<p>Dogs dont't feel guilt. They are just reacting to your reprimand.</p>
          </div>
          </a>
               </div><div class="hiddenAjax" id="ajaxItem6">
		<div class="showAjax_cont">
		<span class="closeAjDiv" rel="6">X</span>
		</div>
	</div></div>
	
	
	
        <div class="colOneRemain" id="d7" rel="ajaxItem7">
				<div class="default_content">
             <a href="javascript:void(0);"><div class="default_images" style="background: url(<?php echo get_template_directory_uri();?>/images/asLast.jpg);
			background-size: cover;
			width: 100%;
			float: left;
			height: 100%;
			background-position: center center;">
					  </div>
          <div class="paris-14">
           
            <p></p>
          </div>
          </a>
               </div><div class="hiddenAjax" id="ajaxItem7">
		<div class="showAjax_cont">
		<span class="closeAjDiv" rel="7">X</span>
		</div>
	</div></div>
	
	
    </div></div></div>
	
	</div>

<script type="text/javascript">
function ajaxcall() {

    $(".ajaxItem").click(function(event){
	
		
    if(!$(event.target).hasClass('closeAjDiv') ){
          if ($(this).hasClass('siblingFull')){
         $(this).addClass('fullajaxItem').removeClass('siblingFull')
        .siblings().addClass('siblingFull').removeClass('fullajaxItem');
        var rel = $(this).attr('rel');
        $('.showAjax').addClass('hiddenAjax').removeClass('showAjax');
         $('#' + rel).addClass('showAjax').removeClass('hiddenAjax');
		 
		 
		 
		 
    }


    else if(!$(this).hasClass('fullajaxItem')){
        $('.ajaxItem').removeClass('fullajaxItem');
        $('.ajaxItem').removeClass('siblingFull');
        $(this).addClass('fullajaxItem')
        .siblings().addClass('siblingFull');
        var rel = $(this).attr('rel');
        $('.showAjax').addClass('hiddenAjax').removeClass('showAjax');
         $('#' + rel).addClass('showAjax').removeClass('hiddenAjax');
    }  
    }

   
    }); 

    $('.closeAjDiv').click(function(){
	    var rel =$(this).attr('rel');
		$('#d'+rel).removeClass('colone_third').addClass('fullajaxItemGone').siblings().removeClass('colone_third').addClass('siblingFullGone');
		setTimeout(function(){removeT(rel) }, 1400);
		
        $(this).parents('.ajaxItem').removeClass('fullajaxItem')
        .siblings().removeClass('siblingFull');
        $('.showAjax').addClass('hiddenAjax').removeClass('showAjax');
        })
		
		

		function removeT(rel){ 
		  $('#d'+rel).removeClass('fullajaxItemGone').addClass('colone_third').siblings().removeClass('siblingFullGone').addClass('colone_third');
		}

	   $('.ajaxItem').on('click', function(){
			$('html,body').animate({scrollTop: $(this).offset().top - 150}, 800);
		}); 
	

  }
  
  setTimeout(ajaxcall, 4000);
  
  
</script>

<?php get_footer(); ?>

<style>
	 body{background:#fff;}
	 .main_Container{background:#fff;}
	
	
	@keyframes fullajaxItem_anim{
	
	0% {
		}

	100% {
		width: 100%;
		min-height: 1055px;
	}
	
	}
	
	#d1.fullajaxItem{
	animation-name: d1fullajaxItem_anim !important;
	}
	
	
	@keyframes d1fullajaxItem_anim{
	
	0% {
		}

	100% {
		width: 100%;
		min-height: 1680px;
	}
	
	}
	
	
	
	#d3.fullajaxItem{
	animation-name: d3fullajaxItem_anim !important;
	}
	
	
	@keyframes d3fullajaxItem_anim{
	
	0% {
		}

	100% {
		width: 100%;
		min-height: 325px;
	}
	
	}
	
	
	#d5.fullajaxItem{
	animation-name: d5fullajaxItem_anim !important;
	}
	
	
	@keyframes d5fullajaxItem_anim{
	
	0% {
		}

	100% {
		width: 100%;
		min-height: 780px;
	}
	
	}
	
	
	
	
	
	
	
	
	
	.showAj_title{
	font-weight:900;
	}
	
	.showAjax_cont h5{
	    color: #fff;
    font-size: 20px;
    padding: 15px 0px;
	}
	
	
</style>

<script>
 	
	
</script>

