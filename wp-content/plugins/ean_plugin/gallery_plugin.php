<!--<script src="<?php //echo $Plugin_URL; ?>/js/jquery-1.6.1.min.js" type="text/javascript"></script>-->
<link rel="stylesheet" href="<?php echo $Plugin_URL; ?>/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="<?php echo $Plugin_URL; ?>/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'dark_square',slideshow:7000, autoplay_slideshow: false});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				
			});
			</script>

<style>
.album_list { width:100%}
.content .album_list li{ width:32%; list-style:none; float:left; }
</style>

<div style="width:100%">
<h1><?php the_title();?></h1>
<?php  global $wpdb;

 $results_arr =$wpdb->get_results("select * from twc_albums WHERE  published='Yes' and status_deleted=0");
 //print_r($results_arr);
  $album_list ="<ul class='album_list'>";
 if(count($results_arr) >0){
	 foreach($results_arr as $results_obj){
		$coun_arr = $wpdb->get_results("select img_name from  twc_album_files where  album_id='".$results_obj->id."' and  published='Yes' and status_deleted='0' and set_in_gallery='Yes'"); 
		$count_str='';
		if(count($coun_arr) >0)
		{ 
		  $count_str =' ('.count($coun_arr).') '; 
		  $album_list.= '<li><a class="gallery_images_adm" href="'.site_url().'/?page_id='.$_REQUEST['page_id'].'&album='.$results_obj->id.'" style="background:url('.$Plugin_URL.'/images/albums/covers/'.$results_obj->cover_img.') center bottom no-repeat"></a>';
		  $album_list.= '<p class="ptag_center"><a href="'.site_url().'/?page_id='.$_REQUEST['page_id'].'&album='.$results_obj->id.'">'.$results_obj->title.''.$count_str.'</a></p>';
		    $album_list.= '</li>';
	   }
	 }
 }
$album_list.= "</ul>";

if(!isset($_REQUEST['album']) && ($_REQUEST['album']=='')){
	echo $album_list;
}
	
?>
</div> 

<?php if(isset($_REQUEST['album']) && ($_REQUEST['album']!='')){?> 
<div  style="text-align:right; margin-bottom:15px;margin-top:-15px"><b>Album List :</b>
 <select name="album_id" id="album_id">
 <?php 
  $albums_arr =$wpdb->get_results("select * from twc_albums WHERE set_permission='Public' and published='Yes' and status_deleted=0 order by title ASC");
  foreach($albums_arr as $albums_obj){
	if($albums_obj->id==$_REQUEST['album']){ $selected ='selected="selected"';}  
	else{$selected='';}
	echo '<option value='.$albums_obj->id.' '.$selected.'>'.ucfirst($albums_obj->title).'</option>';
  }
 ?>
 </select>
</div>           
<div class="gallerydiv gallery clearfix">
  <ul class="gallerydiv">
    <?php 
	global $wpdb;
	$sql = "select img_name from  twc_album_files where set_permission='Public' and album_id='".$_REQUEST['album']."' and  published='Yes' and status_deleted='0'";
	$Results_sql = $wpdb->get_results($sql);
  if(count($Results_sql)>0){	
	foreach ( $Results_sql as $Results_sql ){
		$img_path = $Results_sql->img_name;
	
	?>
    <li><a href="<?php echo $Plugin_URL; ?>/images/albums/files/<?php echo $img_path; ?>" rel="prettyPhoto[gallery1]" style="background:url(<?php echo $Plugin_URL; ?>/images/albums/files/thumbnail/<?php echo $img_path; ?>) center" >&nbsp;</a></li>
    
    <?php 
		}
  }
  else{
	  $message_arr =$wpdb->get_results("select * from twc_messages WHERE id='TWCD1380538924TWC52495a2cab980' and published='Yes' and status_deleted='0'");
	  $message_obj =$message_arr[0];
	  echo '<l>'.$message_obj->messages_content.'</li>';
  }
		?>
  </ul>
</div>
<?php }?>

<script language="javascript">
$("#album_id").change(function(){
	var id =$(this).val();	
	window.location.href="<?php echo site_url();?>/?page_id=<?php echo $_REQUEST['page_id'];?>&album="+id;
})
</script>
