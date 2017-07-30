<?php
/*
Plugin Name: Share Line
Plugin URI:  http://URI_Of_Page_Describing_Plugin_and_Updates
Description: This plugin can create a Line button to share content to friend, timeline, group
Version:     1.1
Author:      Karun Jaraslertsuwan
Author URI:  http://www.oxygenyoyo.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: share-content-line
*/


/*
=====================================================
                Menu Control
=====================================================
*/

add_action( 'admin_menu', 'slb_add_share_line_menu' );

function slb_add_share_line_menu() {
  
    add_options_page(
        'Share Line',
        'Share Line',
        'manage_options',
        'share_line_plugin',
        'slb_share_line_form'
    );

    
}


function slb_share_line_form()
{
    ?>
    <div class="wrap">
        <h2>Share Line Plugin Options</h2>
        <form action="options.php" method="post">
            <?php settings_fields('slb_share_line_setting_group'); ?>
            <?php do_settings_sections('slb_share_line_setting_main_form'); ?>
            <?php submit_button(); ?>
            
        </form>
    </div>
<?php
}

add_action( 'admin_init', 'slb_share_line_register_settings' );

function slb_share_line_register_settings() {
    
    register_setting(
        'slb_share_line_setting_group',  // settings section
        'slb_share_line_data_array' // setting name
    );

    add_settings_section(
        'slb_share_line_main_section',
        'Main setting',
        'slb_share_line_section_html',
        'slb_share_line_setting_main_form'
    );

    add_settings_field(
        'plugin-image', 
        'Style Button', 
        'slb_share_line_setting_image', 
        'slb_share_line_setting_main_form', 
        'slb_share_line_main_section'
    );


    wp_enqueue_style('share_line_style', plugins_url('css/style.css', __FILE__ ));
}



/*
=====================================================
                Setting Page
=====================================================
*/

function slb_share_line_section_html()
{
    echo '';
}

function slb_share_line_setting_image() {
    $options = get_option('slb_share_line_data_array');
    

    $imageStyleValues = array(
                1 => '20x20',
                2 => '30x30',
                3 => '36x60',
                4 => '40x40',
                5 => '78x20'
    );

    ?>
    <ul class="button-style-wrap">
        <?php foreach ($imageStyleValues as $imageStyleValue => $imageSize): ?> 
        <?php 
            $checked = '';

            if($imageStyleValue == $options['image'])
            {
                $checked = 'checked';
            }
        ?>
        <li>
            <div class="share-line-radio-wrap">
                <input id='plugin-image-<?php echo $imageStyleValue; ?>' type="radio" name="slb_share_line_data_array[image]" value='<?php echo $imageStyleValue; ?>' <?php echo $checked; ?>>    
            </div>
            <div class="share-line-button-image">
                <label for="plugin-image-<?php echo $imageStyleValue; ?>">
                    <img  src="<?php echo plugins_url( 'images/linebutton_' . $imageSize . '_en.png', __FILE__ ) ?>" alt="line style button">    
                </label>
            </div>
            
            
        </li>
        <?php endforeach; ?>
    </ul>
    
    
    <?php
} 


function slb_is_mobile() {
    $useragent=$_SERVER['HTTP_USER_AGENT'];
    return (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)));   
}



/*
=====================================================
                Front End
=====================================================
*/


function slb_snap_line_share($content) {

    if( slb_is_mobile() )
    {
        $options = get_option('slb_share_line_data_array');
        $imageStyleValues = array(
            1 => '20x20',
            2 => '30x30',
            3 => '36x60',
            4 => '40x40',
            5 => '78x20'
        );

        $widths = array(
            1 => 20,
            2 => 30,
            3 => 36,
            4 => 40,
            5 => 78
        );

        $heights = array(
            1 => 20,
            2 => 30,
            3 => 60,
            4 => 40,
            5 => 20
        );

        
        $title = get_the_title();
        $link = get_the_permalink();
        $lineHtml = '<a href="http://line.me/R/msg/text/?' . $title . '%0D%0A' . $link . '">
            <img src="' . plugins_url( 'images/linebutton_' . $imageStyleValues[$options['image']] . '_en.png', __FILE__ )  . '" width="' . $widths[$options['image']] . '" height="' . $heights[$options['image']] . '" alt="LINE it!" />
        </a>';
        $content .= $lineHtml;    
    }

    return $content;
}
add_filter( 'the_content', 'slb_snap_line_share' );


