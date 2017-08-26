<?php 
/**
 Template Name: Search Vendor
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

$extQuery ='';
if($_REQUEST['sid']!=''){
	$extQuery.=" and service_category='".$_REQUEST['sid']."'";
}
if($_REQUEST['destName']!=''){
	//$extQuery.=" and LCASE(city)='".strtolower($_REQUEST['destName'])."'";
	$extQuery.=" and LCASE(city)LIKE '%".strtolower($_REQUEST['destName'])."'";
}

$results=$wpdb->get_results("select count(*) as total, MIN(price) as minPrice, MAX(price) as maxPrice from twc_vendor_services where 1 ".$extQuery." ");

$objs =$results[0];
$num_of_products =$objs->total;
$num_of_pages=ceil($num_of_products/$limit);
$LR=$objs->minPrice;
$MR=$objs->maxPrice;

$strResults1 =$wpdb->get_results("select count(*) avg_rating from twc_vendor_services  where 1 ".$extQuery." and avg_rating='1'");
$coun_star1 =$strResults1[0];

$strResults2 =$wpdb->get_results("select count(*) avg_rating from twc_vendor_services  where 1 ".$extQuery." and avg_rating='2'");
$coun_star2 =$strResults2[0];

$strResults3 =$wpdb->get_results("select count(*) avg_rating from twc_vendor_services  where 1 ".$extQuery." and avg_rating='3'");
$coun_star3 =$strResults3[0];

$strResults4 =$wpdb->get_results("select count(*) avg_rating from twc_vendor_services  where 1 ".$extQuery." and avg_rating='4'");
$coun_star4 =$strResults4[0];

$strResults5 =$wpdb->get_results("select count(*) avg_rating from twc_vendor_services  where 1 ".$extQuery." and avg_rating='5'");
$coun_star5 =$strResults5[0];

$serviceTitle ='';
if($_REQUEST['sid']!='' && $_REQUEST['destName']!=''){
	$serviceTitle.=getFieldByID('title','twc_service_category',$_REQUEST['sid']). ' in ' .$_REQUEST['destName'];
} elseif($_REQUEST['sid']!='' || $_REQUEST['destName']='') {
	$serviceTitle.=getFieldByID('title','twc_service_category',$_REQUEST['sid']);
} elseif($_REQUEST['destName']!='' || $_REQUEST['sid']='') {
	$serviceTitle.=$_REQUEST['destName'];
} else {
	$serviceTitle.='Pet Services';
}

?>

<input type="hidden" name="page" id="page" value="1">
<div class="parallax-search-frame">
    <div class="parallax-service-title">
        <p><?php echo $serviceTitle; ?></p>
    </div>
</div>
<div class="container search-vendor-container">
    <div class="tab-content menu-bar">
                                    <div id="searchbox" class="tab-pane menu-bar">
                                        <?php if($_REQUEST['destName']!=''){ ?>
                                        <input type="text"
                                             name="searchName"
                                             id="searchName"
                                             class="form-control menu-bar-textbox" value="<?php echo $_REQUEST['destName'] ;?>" placeholder="Discover and Unleash Happiness you cherish">
                                        <?php }  else {?>
                                        <input type="text" name="searchName" id="searchName" class="form-control menu-bar-textbox" value="" placeholder="Discover and Unleash Happiness you cherish">
                                        <?php } ?>
                                        <span class="input-group-addon city_search"
                                            id="basic-addon2" style="cursor: pointer;">
                                          SNIFF
                                        </span>
                                        
                                    </div>
                                <span class="err_searchName"></span>
                              </div>
                                  
    <div class="con_left search-results-container">
        <div class="pet-search-container">
            <div class="search-items pet-child-right">
                <div class="row">
                    <div class="no-of-results col-md-12">
                        Loading Results...
                    </div>
                    <div class="col-lg-12">
                        <ul id="serviceList">
                        </ul>
                    </div>
                </div>
                <div class="pagination-div" id="pagination">
                </div>
            </div>
        </div>
    </div>
</div>

<style>
	.pagination li a{background-color: #636;color: #fff;}
</style>
<?php get_footer(); ?>
<script src="<?php echo get_theme_file_uri( '/js/jquery-ui.js' ); ?>"></script> 


<div class="filter-opac"></div>
<script>
    var url_string = window.location.href;
        var url = new URL(url_string);
        var sidParams = url.searchParams.get("sid");
    $('.city_search').click(function(){
	if($('#searchName').val()===''){
		$('.err_searchName').html('<span class="error_search">Please select category and your city name.</span>');
		//alert('Please enter city name for search');
		$('.err_searchName').show(1).delay(2000).hide(1);
		$('#searchName').focus();
		return false;
	}
	else{
		var city=$('#searchName').val();
		var sid = $('#sel_category').val();
		//alert(sid);
		window.location.href="<?php echo site_url();?>/search-vendor/?sid="+sidParams+"&destName="+city;
                var store = window.localStorage;
                store.setItem('cityValue', city);
		}
	});
        
        var selectedCity = window.localStorage.cityValue;
        var textBoxValue = $('#searchName').val();
        if(selectedCity && !textBoxValue) {
            document.querySelector('#searchName').value = selectedCity;
        }
</script>
<script>
$('.close-filter,.filter-opac').click(function() {
    $('.pet-child-left').removeClass('width-set_results-left-slider');
    $('.filter-opac').fadeOut();
})
$('.filter-btn').click(function() {
    $('.pet-child-left').addClass('width-set_results-left-slider');
    $('.filter-opac').fadeIn();
})
$('.modify-btn').click(function() {
    $('.horizontal-box').slideToggle();
})
</script>


<style>
.filter-opac{position:fixed;background:rgba(0,0,0,0.8);top:0;left:0;right:0;bottom:0;display:none;z-index: 21;}
.width-set_results-left-slider{display: block !important;}
.pet_breadcrumb li:last-child a{	background:none !important;}
.pet_breadcrumb li:last-child a:before{	border-left:none;}
</style>

<script>
$('.pagination').on('click','li.nextPage',function(){
	$(this).addClass('active').siblings().removeClass('active');
})
</script>

<script>
$(document).ready(function() {
    var scrollbar = $("#slider-range").slider({
        range: true,
        min: <?php echo round($LR);?>,
        max: <?php echo round($MR);?>,
        values: [<?php echo round($LR);?>, <?php echo round($MR);?>],
        step: 1,
        slide: function(event, ui) {
            $("#Cri_Price").val(ui.values[0] + "-" + ui.values[1]);
            $(".min_price").html("$" + ui.values[0]);
            $(".max_price").html("$" + ui.values[1]);
        }
    });
    var handleHelper = scrollbar.find(".ui-slider-handle").mouseup(function() {
        $('#page').val(0);
        searchVendorServices();
        pagingList();
    })
});
$('.Filter_Cls').click(function() {
    $('#page').val(0);
    searchVendorServices();
    pagingList();
})
searchVendorServices();
pagingList();

function changePage() {
    $('.nextPage').click(function() {
        var p = $(this).attr('rel');
        $('#page').val(p);
        searchVendorServices();
        pagingList();
    });
}

function searchVendorServices() {
    var page = $('#page').val();
    var filter_Data = $('#filter_frm').serialize();
    $.ajax({
        type: "post",
        url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
        data: "action=searchVendorServices&sid=<?php echo $_REQUEST['sid'];?>&destName=<?php echo $_REQUEST['destName'];?>&p=" + page + '&' + filter_Data,
        success: function(Data) {
            var myData = "";
            myData = JSON.parse(Data);
            var str = '';
            if (myData.length > 0) {
	            for (a = 0; a < myData.length; a++) {
	                str += '<li>';
	                if (!!(myData[a].image_path)) {
	                    str += '<div class="search-items float_left14" style="background-image:url(<?php echo get_template_directory_uri(); ?>/uploads/vendor_thumbs/' + myData[a].image_path + ');">';
	                } else {
	                    str += '<div class="search-items float_left14" style="background-image:url(<?php echo get_template_directory_uri(); ?>/uploads/vendor_thumbs/no-image.png">';
	                }
	                str += '</div>';
	                str += '<div class="search-items float_right14">';
	                str += '<div class="search-items text-pack17">';
	                str += '<div class="search-items top-panel">';
	                str += '<h2>' + myData[a].title + '</h2>';
	                str += '<div class="search-item-address add_Srvc">' + myData[a].address + ',' + myData[a].city + '</div>';
	                if (!!(myData[a].time_from) && !!(myData[a].time_to)) {
	                    str += '<div class="add_Srvc">' + myData[a].time_from + ' to ' + myData[a].time_to + '</div>';
	                } else {
	                    str += 'TIME: U/A'
	                }
	                str += '<div class="search-item-desc off_Srvc">' + myData[a].description + '</div>';
	                str += '</div>';
	                str += '<div class="search-items bottom-panel">';
	                str += '<div class="search-items rating-container">';
	                str += '<span>RATINGS & REVIEW</span><span class="item-rating">' + myData[a].avg_rating + '</span>';
	                str += '</div>'
	                <?php if($userID!==''){?>
	                str += '<div class="search-items book-now-button"><a href="<?php echo site_url();?>/login/?redirectPage=details-page&id=' + myData[a].id + '&destName=<?php echo $_REQUEST['
	                destName '];?>">MORE INFO</a></div>';
	                <?php }else{?>
	                str += '<div class="search-items book-now-button"><a href="<?php echo site_url();?>/details-page/?id=' + myData[a].id + '&destName=<?php echo $_REQUEST['
	                destName '];?>">MORE INFO</a></div>';
	                <?php } ?>
	                str += '</div>';
	                str += '</div>';
	                str += '</div>';
	                str += '</li>';
	            }
	        }
            $('#serviceList').html(str);
            if (myData.length > 0) {
            	$('.no-of-results').html('' + myData.length + ' OF '+ myData[0]['total_records'] +' RESULTS AVAILABLE')
        	} else {
        		$('.no-of-results').html('No Result Found');
        	}
        }
    })
}

function pagingList() {
    var page = $('#page').val();
    var filter_Data = $('#filter_frm').serialize();
    $.ajax({
        type: "GET",
        url: "<?php echo get_template_directory_uri(); ?>/custom-ajax.php",
        data: "action=pagingList&sid=<?php echo $_REQUEST['sid'];?>&destName=<?php echo $_REQUEST['destName'];?>&p=" + page + '&' + filter_Data,
        success: function(Data) {
            $('#pagination').html(Data);
            changePage();
        }
    })
}
</script>