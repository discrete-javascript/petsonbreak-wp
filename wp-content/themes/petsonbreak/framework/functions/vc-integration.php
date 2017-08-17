<?php
if (!class_exists('WPBakeryShortCode'))
    return false;

require_once locate_template("portfolio-styles/classic.php");
require_once locate_template("portfolio-styles/ajax.php");
require_once locate_template("portfolio-styles/masonry.php");
require_once locate_template("portfolio-styles/grid.php");
require_once locate_template("blog-styles/modern.php");
require_once locate_template("blog-styles/classic.php");
require_once locate_template("blog-styles/grid.php");
require_once locate_template("blog-styles/newspaper.php");
require_once locate_template("blog-styles/spotlight.php");
require_once locate_template("blog-styles/thumbnail.php");
require_once locate_template("blog-styles/magazine.php");
require_once locate_template("blog-styles/news-loop.php");

function mk_vc_mapper()
{
    require_once locate_template('shortcodes-config/config-head.php');
    require_once locate_template('shortcodes-config/general.php');
    require_once locate_template('shortcodes-config/typography.php');
    require_once locate_template('shortcodes-config/loops.php');
    require_once locate_template('shortcodes-config/slideshows.php');
    require_once locate_template('shortcodes-config/social.php');
    if(defined( 'MODIFIED_VC_ACTIVATED')) {
      require_once locate_template('shortcodes-config/vc_map.php');
    }
}
add_action('vc_mapper_init_before', 'mk_vc_mapper');


/*
Sets Visual Composer as a theme
*/
add_action('vc_before_init', 'mk_set_vc_as_theme');
function mk_set_vc_as_theme()
{
    vc_set_as_theme($disable_updater = true);

    if(defined( 'MODIFIED_VC_ACTIVATED')) {
        $child_dir = get_stylesheet_directory() . '/shortcodes';
        $parent_dir = get_template_directory() . '/shortcodes';

        vc_set_shortcodes_parent_templates_dir($parent_dir);
        vc_set_shortcodes_templates_dir($child_dir);
    } else {

        $child_dir = get_template_directory() . '/shortcodes';
        $parent_dir = get_template_directory() . '/shortcodes';
        vc_set_shortcodes_templates_dir($parent_dir);
        vc_set_shortcodes_templates_dir($child_dir);
    }



    vc_disable_frontend();

}

/*-----------------*/



/*
Add Range Option to Visual Composer Params
*/
if (function_exists('add_shortcode_param')) {
    add_shortcode_param('range', 'mk_range_settings_field');
}

function mk_range_settings_field($settings, $value)
{
    $dependency = vc_generate_dependencies_attributes($settings);
    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
    $type       = isset($settings['type']) ? $settings['type'] : '';
    $min        = isset($settings['min']) ? $settings['min'] : '';
    $max        = isset($settings['max']) ? $settings['max'] : '';
    $step       = isset($settings['step']) ? $settings['step'] : '';
    $unit       = isset($settings['unit']) ? $settings['unit'] : '';
    $uniqeID    = uniqid();
    $output     = '';
    $output .= '<div class="mk-ui-input-slider" ><div ' . $dependency . ' class="mk-range-input ' . $dependency . '" data-value="' . $value . '" data-min="' . $min . '" data-max="' . $max . '" data-step="' . $step . '" id="rangeInput-' . $uniqeID . '"></div><input name="' . $param_name . '"  class="range-input-selector wpb_vc_param_value ' . $param_name . ' ' . $type . '" type="text" value="' . $value . '"/><span class="unit">' . $unit . '</span></div>';
    $output .= '<script type="text/javascript">

        var range_wrapper_' . $uniqeID . ' = jQuery("#rangeInput-' . $uniqeID . '"),

            mk_min = parseFloat(range_wrapper_' . $uniqeID . '.attr("data-min")),
            mk_max = parseFloat(range_wrapper_' . $uniqeID . '.attr("data-max")),
            mk_step = parseFloat(range_wrapper_' . $uniqeID . '.attr("data-step")),
            mk_value = parseFloat(range_wrapper_' . $uniqeID . '.attr("data-value"));

            range_wrapper_' . $uniqeID . '.slider({
                  value:mk_value,
                  min: mk_min,
                  max: mk_max,
                  step: mk_step,
                  slide: function( event, ui ) {
                    range_wrapper_' . $uniqeID . '.siblings(".range-input-selector").val(ui.value );
                  }
            });

    </script>';
    return $output;
}





/*
Add Toggle Option to Visual Composer Params
*/
if (function_exists('add_shortcode_param')) {
    add_shortcode_param('toggle', 'mk_toggle_param_field');
}
function mk_toggle_param_field($settings, $value)
{
    $dependency = vc_generate_dependencies_attributes($settings);
    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
    $type       = isset($settings['type']) ? $settings['type'] : '';
    $output     = '';
    $uniqeID    = uniqid();

    $output .= '<span class="mk-toggle-button mk-composer-toggle" id="toggle-switch-' . $uniqeID . '"><span class="toggle-handle"></span><input type="hidden" ' . $dependency . ' class="wpb_vc_param_value ' . $dependency . ' ' . $param_name . ' ' . $type . '" value="' . $value . '" name="' . $param_name . '"/></span>';

    $output .= '<script type="text/javascript">

        var this_toggle_' . $uniqeID . ' = jQuery("#toggle-switch-' . $uniqeID . '"),
            this_input_' . $uniqeID . ' = this_toggle_' . $uniqeID . '.find("input");

        if(this_input_' . $uniqeID . '.val() == "true"){
            this_toggle_' . $uniqeID . '.addClass("on");
        } else {
            this_toggle_' . $uniqeID . '.addClass("off");
        }

        this_toggle_' . $uniqeID . '.click(function() {

            if(this_toggle_' . $uniqeID . '.hasClass("on")) {
                    this_toggle_' . $uniqeID . '.removeClass("on").addClass("off");
                    this_input_' . $uniqeID . '.val("false");
            } else {
                    this_toggle_' . $uniqeID . '.removeClass("off").addClass("on");
                    this_input_' . $uniqeID . '.val("true");
            }
        });

    </script>';

    return $output;
}




if (function_exists('add_shortcode_param')) {
    add_shortcode_param('item_id', 'mk_item_id_form_field');
}
function mk_item_id_form_field ($settings, $value) {
    $dependency = vc_generate_dependencies_attributes($settings);

    if(empty($value)) {
        $value = time() . '-' . uniqid();
    }
    return '<div class="my_param_block">'
      .'<input name="'.$settings['param_name']
      .'" class="wpb_vc_param_value wpb-textinput '
      .$settings['param_name'].' '.$settings['type'].'_field" type="hidden" value="'
      .$value.'" ' . $dependency . ' />'
      .'<label>'.$value.'</label>'
      .'</div>';
}



/*
Add Upload Option to Visual Composer Params
*/
if (function_exists('add_shortcode_param')) {
    add_shortcode_param('upload', 'mk_upload_param_field');
}
function mk_upload_param_field($settings, $value)
{
    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
    $type       = isset($settings['type']) ? $settings['type'] : '';
    $output     = '';
    $uniqeID    = uniqid();

    $output .= '<div class="upload-option">';
    $output .= '<input class="mk-upload-url vc-mk-upload-url wpb_vc_param_value ' . $param_name . ' ' . $type . '" type="text" id="' . $uniqeID . '" name="' . $param_name . '" size="50"  value="' . $value . '" /><a class="option-upload-button button thickbox" id="' . $uniqeID . '_button" href="#">' . __('Upload', 'mk_framework') . '</a>';
    $output .= '<span id="' . $uniqeID . '-preview" class="show-upload-image" alt=""><img src="' . $value . '" title="" /></span></div>';

    $output .= '<script type="text/javascript">

        var _custom_media = true,
          _orig_send_attachment = wp.media.editor.send.attachment;

      jQuery("#' . $uniqeID . '_button").click(function(e) {

        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = jQuery(this);
        var id = button.attr("id").replace("_button", "");
        _custom_media = true;
        wp.media.editor.send.attachment = function(props, attachment){
          if ( _custom_media ) {
            jQuery("#"+id).val(attachment.url);
            jQuery("#"+id+"-preview img").attr("src", attachment.url);
          } else {
            return _orig_send_attachment.apply( this, [props, attachment] );
          };
        }
        wp.media.editor.open(button);
        return false;
      });
      jQuery(".add_media").on("click", function(){
        _custom_media = false;
      });

    </script>';

    return $output;
}






/*
Add MultiSelect Option to Visual Composer Params
*/
if (function_exists('add_shortcode_param')) {
    add_shortcode_param('multiselect', 'mk_multiselect_param_field');
}
function mk_multiselect_param_field($settings, $value)
{
    $dependency = vc_generate_dependencies_attributes($settings);
    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
    $type       = isset($settings['type']) ? $settings['type'] : '';
    $options    = isset($settings['options']) ? $settings['options'] : '';
    $output     = '';
    $uniqeID    = uniqid();

    $output .= '<select multiple="multiple" name="' . $param_name . '" id="multiselect-' . $uniqeID . '" style="width:100%" ' . $dependency . ' class="wpb-multiselect ' . $dependency . ' wpb_vc_param_value ' . $param_name . ' ' . $type . '">';
    if ($options != null && !empty($options)) {
        foreach ($options as $key => $option) {
            $selected = '';
            if (in_array($key, explode(',', $value))) {
                $selected = ' selected="selected"';
            }
            $output .= '<option value="' . $key . '"' . $selected . '>' . $option . '</option>';
        }
    }
    $output .= '</select>';

    $output .= '<script type="text/javascript">

        jQuery("#multiselect-' . $uniqeID . '").chosen();

    </script>';

    return $output;
}





/*
Add Visual Selector Option to Visual Composer Params
*/
if (function_exists('add_shortcode_param')) {
    add_shortcode_param('visual_selector', 'mk_visual_selector_param_field');
}
function mk_visual_selector_param_field($settings, $value)
{
    $dependency = vc_generate_dependencies_attributes($settings);
    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
    $border     = isset($settings['border']) ? $settings['border'] : '';
    $type       = isset($settings['type']) ? $settings['type'] : '';
    $options    = isset($settings['value']) ? $settings['value'] : '';
    $output     = '';
    $uniqeID    = uniqid();

    $border_css = ($border == 'true') ? 'border:1px solid #ddd;' : '';


    $output .= '<div class="mk-visual-selector" id="visual-selector' . $uniqeID . '">';
    foreach ($options as $key => $option) {
        $output .= '<a style="margin:10px 10px 0 0;' . $border_css . '" href="#" rel="' . $option . '"><img  src="' . THEME_ADMIN_ASSETS_URI . '/images/' . $key . '" /></a>';
    }
    $output .= '<input name="' . $param_name . '" id="' . $param_name . '" ' . $dependency . ' class="wpb_vc_param_value ' . $dependency . ' ' . $param_name . ' ' . $type . '" type="hidden" value="' . $value . '"/>';
    $output .= '</div>';

    $output .= '<script type="text/javascript">

        mk_visual_selector();

    </script>';

    return $output;
}




/*
Add Range Option to Visual Composer Params
*/
if (function_exists('add_shortcode_param')) {
    add_shortcode_param('theme_fonts', 'mk_fonts_settings_field');
}

function mk_fonts_settings_field($settings, $value)
{
    $dependency = vc_generate_dependencies_attributes($settings);
    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
    $type       = isset($settings['type']) ? $settings['type'] : '';
    $uniqeID    = uniqid();
    $output     = '';
    $output .= '<select name="' . $param_name . '" id="' . $param_name . '" class="mk-shortcode-fonts-list wpb-select wpb_vc_param_value ' . $param_name . ' ' . $type . '">';

    $google_webfonts = array(
        'ABeeZee',
        'Abel',
        'Source+Sans+Pro',
        'Abril+Fatface',
        'Acid',
        'Aclonica',
        'Acme',
        'Actor',
        'Adamina',
        'Advent+Pro',
        'Aguafina+Script',
        'Aladin',
        'Aldrich',
        'Alegreya',
        'Alegreya+SC',
        'Alex+Brush',
        'Alfa+Slab+One',
        'Alice',
        'Alike',
        'Alike+Angular',
        'Allan',
        'Allan',
        'Allerta',
        'Allerta+Stencil',
        'Allura',
        'Almendra',
        'Almendra+SC',
        'Amaranth',
        'Amatic+SC',
        'Amethysta',
        'Andada',
        'Andika',
        'Annie+Use+Your+Telescope',
        'Anonymous+Pro',
        'Antic',
        'Antic+Didone',
        'Antic+Slab',
        'Anton',
        'Arapey',
        'Arbutus',
        'Architects+Daughter',
        'Arimo',
        'Arizonia',
        'Armata',
        'Artifika',
        'Arvo',
        'Asap',
        'Asset',
        'Astloch',
        'Asul',
        'Atomic+Age',
        'Aubrey',
        'Audiowide',
        'Average',
        'Averia+Gruesa+Libre',
        'Averia+Libre',
        'Averia+Sans+Libre',
        'Averia+Serif+Libre',
        'Bad+Script',
        'Balthazar',
        'Bangers',
        'Basic',
        'Baumans',
        'Belgrano',
        'Belleza',
        'Bentham',
        'Berkshire+Swash',
        'Bevan',
        'Bigshot+One',
        'Bilbo',
        'Bilbo+Swash+Caps',
        'Bitter',
        'Black+Ops+One',
        'Bonbon',
        'Boogaloo',
        'Bowlby+One',
        'Bowlby+One+SC',
        'Brawler',
        'Bree+Serif',
        'Bubblegum+Sans',
        'Buda',
        'Buda',
        'Buenard',
        'Butcherman',
        'Butcherman+Caps',
        'Butterfly+Kids',
        'Cabin',
        'Cabin+Condensed',
        'Cabin+Sketch',
        'Cabin+Sketch',
        'Cabin',
        'Caesar+Dressing',
        'Cagliostro',
        'Calligraffitti',
        'Cambo',
        'Candal',
        'Cantarell',
        'Cantata+One',
        'Cardo',
        'Carme',
        'Carter+One',
        'Caudex',
        'Cedarville+Cursive',
        'Ceviche+One',
        'Changa+One',
        'Chango',
        'Chau+Philomene+One',
        'Chelsea+Market',
        'Cherry+Cream+Soda',
        'Chewy',
        'Chicle',
        'Chivo',
        'Coda',
        'Coda',
        'Codystar',
        'Comfortaa',
        'Coming+Soon',
        'Concert+One',
        'Condiment',
        'Contrail+One',
        'Convergence',
        'Cookie',
        'Copse',
        'Corben',
        'Corben',
        'Cousine',
        'Coustard',
        'Covered+By+Your+Grace',
        'Crafty+Girls',
        'Creepster',
        'Creepster+Caps',
        'Crete+Round',
        'Crimson',
        'Crushed',
        'Cuprum',
        'Cutive',
        'Damion',
        'Dancing+Script',
        'Dawning+of+a+New+Day',
        'Days+One',
        'Delius',
        'Delius+Swash+Caps',
        'Delius+Unicase',
        'Della+Respira',
        'Devonshire',
        'Didact+Gothic',
        'Diplomata',
        'Diplomata+SC',
        'Doppio+One',
        'Dorsa',
        'Dosis',
        'Dr+Sugiyama',
        'Droid+Sans',
        'Droid+Sans+Mono',
        'Droid+Serif',
        'Duru+Sans',
        'Dynalight',
        'EB+Garamond',
        'Eater',
        'Eater+Caps',
        'Economica',
        'Electrolize',
        'Emblema+One',
        'Emilys+Candy',
        'Engagement',
        'Enriqueta',
        'Erica+One',
        'Esteban',
        'Euphoria+Script',
        'Ewert',
        'Exo',
        'Expletus+Sans',
        'Fanwood+Text',
        'Fascinate',
        'Fascinate+Inline',
        'Federant',
        'Federo',
        'Felipa',
        'Fjord+One',
        'Flamenco',
        'Flavors',
        'Fondamento',
        'Fontdiner+Swanky',
        'Forum',
        'Francois+One',
        'Fredericka+the+Great',
        'Fredoka+One',
        'Fresca',
        'Frijole',
        'Fugaz+One',
        'Fjalla+One',
        'Galdeano',
        'Gentium+Basic',
        'Gentium+Book+Basic',
        'Geo',
        'Geostar',
        'Geostar+Fill',
        'Germania+One',
        'Give+You+Glory',
        'Glass+Antiqua',
        'Glegoo',
        'Gloria+Hallelujah',
        'Goblin+One',
        'Gochi+Hand',
        'Gorditas',
        'Goudy+Bookletter+1911',
        'Graduate',
        'Gravitas+One',
        'Great+Vibes',
        'Gruppo',
        'Gudea',
        'Habibi',
        'Hammersmith+One',
        'Handlee',
        'Happy+Monkey',
        'Henny+Penny',
        'Herr+Von+Muellerhoff',
        'Holtwood+One+SC',
        'Homemade+Apple',
        'Homenaje',
        'IM+Fell',
        'Iceberg',
        'Iceland',
        'Imprima',
        'Inconsolata',
        'Inder',
        'Indie+Flower',
        'Inika',
        'Irish+Grover',
        'Irish+Growler',
        'Istok+Web',
        'Italiana',
        'Italianno',
        'Jim+Nightshade',
        'Jockey+One',
        'Jolly+Lodger',
        'Josefin+Sans',
        'Josefin+Slab',
        'Judson',
        'Julee',
        'Junge',
        'Jura',
        'Just+Another+Hand',
        'Just+Me+Again+Down+Here',
        'Kameron',
        'Karla',
        'Kaushan+Script',
        'Kelly+Slab',
        'Kenia',
        'Knewave',
        'Kotta+One',
        'Kranky',
        'Kreon',
        'Kristi',
        'Krona+One',
        'La+Belle+Aurore',
        'Lancelot',
        'Lato',
        'League+Script',
        'Leckerli+One',
        'Ledger',
        'Lekton',
        'Lemon',
        'Lilita+One',
        'Limelight',
        'Linden+Hill',
        'Lobster',
        'Lobster+Two',
        'Londrina+Shadow',
        'Londrina+Sketch',
        'Londrina+Solid',
        'LondrinaOutline',
        'Lora',
        'Love+Ya+Like+A+Sister',
        'Loved+by+the+King',
        'Lovers+Quarrel',
        'Luckiest+Guy',
        'Lusitana',
        'Lustria',
        'Macondo',
        'Macondo+Swash+Caps',
        'Magra',
        'Maiden+Orange',
        'Mako',
        'Marck+Script',
        'Marko+One',
        'Marmelad',
        'Marvel',
        'Mate',
        'Mate+SC',
        'Maven+Pro',
        'Meddon',
        'MedievalSharp',
        'Medula+One',
        'Megrim',
        'Merienda+One',
        'Merriweather',
        'Metamorphous',
        'Metrophobic',
        'Michroma',
        'Miltonian',
        'Miltonian+Tattoo',
        'Miniver',
        'Miss+Fajardose',
        'Miss+Saint+Delafield',
        'Modern+Antiqua',
        'Molengo',
        'Monofett',
        'Monoton',
        'Monsieur+La+Doulaise',
        'Montaga',
        'Montez',
        'Montserrat',
        'Mountains+of+Christmas',
        'Mr+Bedford',
        'Mr+Bedfort',
        'Mr+Dafoe',
        'Mr+De+Haviland',
        'Mrs+Saint+Delafield',
        'Mrs+Sheppards',
        'Muli',
        'Mystery+Quest',
        'Neucha',
        'Neuton',
        'News+Cycle',
        'Niconne',
        'Nixie+One',
        'Nobile',
        'Norican',
        'Nosifer',
        'Nosifer+Caps',
        'Noticia+Text',
        'Nova+Flat',
        'Nova+Mono',
        'Nova+Oval',
        'Nova+Round',
        'Nova+Script',
        'Nova+Slim',
        'Numans',
        'Nunito',
        'Old+Standard+TT',
        'Oldenburg',
        'Oleo+Script',
        'Open+Sans',
        'Orbitron',
        'Original+Surfer',
        'Oswald',
        'Over+the+Rainbow',
        'Overlock',
        'Overlock+SC',
        'Ovo',
        'Oxygen',
        'PT+Mono',
        'PT+Sans',
        'PT+Sans+Narrow',
        'PT+Serif',
        'PT+Serif+Caption',
        'Pacifico',
        'Parisienne',
        'Passero+One',
        'Passion+One',
        'Patrick+Hand',
        'Patua+One',
        'Paytone+One',
        'Permanent+Marker',
        'Petrona',
        'Philosopher',
        'Piedra',
        'Pinyon+Script',
        'Plaster',
        'Play',
        'Playball',
        'Playfair+Display',
        'Podkova',
        'Poiret+One',
        'Poller+One',
        'Poly',
        'Pompiere',
        'Pontano+Sans',
        'Port+Lligat+Sans',
        'Port+Lligat+Slab',
        'Prata',
        'Press+Start+2P',
        'Princess+Sofia',
        'Prociono',
        'Prosto+One',
        'Puritan',
        'Quantico',
        'Quattrocento',
        'Quattrocento+Sans',
        'Questrial',
        'Quicksand',
        'Qwigley',
        'Radley',
        'Raleway',
        'Raleway',
        'Rammetto+One',
        'Rancho',
        'Rationale',
        'Redressed',
        'Reenie+Beanie',
        'Revalia',
        'Ribeye',
        'Ribeye+Marrow',
        'Righteous',
        'Roboto',
        'Rochester',
        'Rock+Salt',
        'Rokkitt',
        'Ropa+Sans',
        'Rosario',
        'Rosarivo',
        'Rouge+Script',
        'Ruda',
        'Ruge+Boogie',
        'Ruluko',
        'Ruslan+Display',
        'Russo One',
        'Ruthie',
        'Sail',
        'Salsa',
        'Sancreek',
        'Sansita+One',
        'Sarina',
        'Satisfy',
        'Schoolbell',
        'Seaweed+Script',
        'Sevillana',
        'Shadows+Into+Light',
        'Shadows+Into+Light+Two',
        'Shanti',
        'Share',
        'Shojumaru',
        'Short+Stack',
        'Sigmar+One',
        'Signika',
        'Signika+Negative',
        'Simonetta',
        'Sirin+Stencil',
        'Six+Caps',
        'Slackey',
        'Smokum',
        'Smythe',
        'Sniglet',
        'Sniglet',
        'Snippet',
        'Sofia',
        'Sonsie+One',
        'Sorts+Mill+Goudy',
        'Special+Elite',
        'Spicy+Rice',
        'Spinnaker',
        'Spirax',
        'Squada+One',
        'Stardos+Stencil',
        'Stint+Ultra+Condensed',
        'Stint+Ultra+Expanded',
        'Stoke',
        'Sue+Ellen+Francisco',
        'Sunshiney',
        'Supermercado+One',
        'Swanky+and+Moo+Moo',
        'Syncopate',
        'Tangerine',
        'Telex',
        'Tenor+Sans',
        'Terminal+Dosis',
        'Terminal+Dosis+Light',
        'The+Girl+Next+Door',
        'Tienne',
        'Tinos',
        'Titillium+Web',
        'Titan+One',
        'Trade+Winds',
        'Trocchi',
        'Trochut',
        'Trykker',
        'Tulpen+One',
        'Ubuntu',
        'Ubuntu+Condensed',
        'Ubuntu+Mono',
        'Ultra',
        'Uncial+Antiqua',
        'UnifrakturCook',
        'UnifrakturCook',
        'UnifrakturMaguntia',
        'Unkempt',
        'Unlock',
        'Unna',
        'VT323',
        'Varela',
        'Varela+Round',
        'Vast+Shadow',
        'Vibur',
        'Vidaloka',
        'Viga',
        'Voces',
        'Volkhov',
        'Vollkorn',
        'Voltaire',
        'Waiting+for+the+Sunrise',
        'Wallpoet',
        'Walter+Turncoat',
        'Wellfleet',
        'Wire+One',
        'Yanone+Kaffeesatz',
        'Yellowtail',
        'Yeseva+One',
        'Yesteryear',
        'Zeyada'
    );


    $safe_fonts = array(
        'Arial, Helvetica, sans-serif',
        'Arial Black, Gadget, sans-serif',
        'Bookman Old Style, serif',
        'Comic Sans MS, cursive',
        'Courier, monospace',
        'Courier New, Courier, monospace',
        'Garamond, serif',
        'Georgia, serif',
        'Impact, Charcoal, sans-serif',
        'Lucida Console, Monaco, monospace',
        'Lucida Grande, Lucida Sans Unicode, sans-serif',
        'MS Sans Serif, Geneva, sans-serif',
        'MS Serif, New York, sans-serif',
        'Palatino Linotype, Book Antiqua, Palatino, serif',
        'Tahoma, Geneva, sans-serif',
        'Times New Roman, Times, serif',
        'Trebuchet MS, Helvetica, sans-serif',
        'Verdana, Geneva, sans-serif'
    );

    $output .= '<option data-type="" value="none">Select Font</option>';
    /* List Safe Fonts */
    foreach ($safe_fonts as $safe_font) {

        $output .= '<option data-type="safefont" ';
        if ($value == $safe_font) {
            $output .= ' selected="selected"';
        }
        $output .= " value='" . $safe_font . "' >- Safe Font - " . $safe_font . "</option>";
    }

    /* List Google Fonts */
    foreach ($google_webfonts as $google_webfont) {

        $output .= '<option data-type="google" ';
        if ($value == $google_webfont) {
            $output .= ' selected="selected"';
        }
        $output .= 'value="' . $google_webfont . '" >- Google Fonts - ' . str_replace('+', ' ', $google_webfont) . '</option>';
    }

    $fontface   = array();
    $stylesheet = FONTFACE_DIR . '/fontface_stylesheet.css';
    if (file_exists($stylesheet)) {
        $file_content = file_get_contents($stylesheet);
        if (preg_match_all("/@font-face\s*{.*?font-family\s*:\s*('|\")(.*?)\\1.*?}/is", $file_content, $matchs)) {
            foreach ($matchs[0] as $index => $css) {
                $fontface[$matchs[2][$index]] = array(
                    'name' => $matchs[2][$index],
                    'css' => $css
                );
            }

        }
    }

    $count = 1;
    foreach ($fontface as $val => $font) {
        $output .= '<option data-type="fontface" ';
        if ($value == $val) {
            $output .= ' selected="selected"';
        }
        $output .= ' value="' . $val . '" >- Fontface - ' . $font['name'] . '</option>';
        $count++;
    }

    $output .= '</select>';

    $output .= '<script type="text/javascript">

                           mk_shortcode_fonts();

                </script>';

    return $output;
}



if (function_exists('add_shortcode_param')) {
    add_shortcode_param('hidden_input', 'mk_hidden_input_settings_field');
}

function mk_hidden_input_settings_field($settings, $value)
{
    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
    $type       = isset($settings['type']) ? $settings['type'] : '';

    $output = '<input name="' . $param_name . '" id="' . $param_name . '" class="wpb_vc_param_value mk_shortcode_hidden ' . $param_name . ' ' . $type . '" type="hidden" value="' . $value . '"/>';

    return $output;
}



class WPBakeryShortCode_mk_table extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_icon_box extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_icon_box2 extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_mini_callout extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_custom_sidebar extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_gallery extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_social_networks extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_advanced_gmaps extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_swipe_slideshow extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_portfolio extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_news extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_blog extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_blog_teaser extends WPBakeryShortCode {
}

class WPBakeryShortCode_mk_skype extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_moving_image extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_font_icons extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_blockquote extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_milestone extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_dropcaps extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_highlight extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_tooltip extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_skill_meter extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_skill_meter_chart extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_chart extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_steps extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_custom_list extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_message_box extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_divider extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_button extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_toggle extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_fancy_title extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_title_box extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_circle_image extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_pricing_table extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_employees extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_clients extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_testimonials extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_flexslider extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_layerslider extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_revslider extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_woocommerce_recent_carousel extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_image_slideshow extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_image extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_fullwidth_slideshow extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_Laptop_slideshow extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_lcd_slideshow extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_padding_divider extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_contact_form extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_faq extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_contact_info extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_portfolio_carousel extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_blog_carousel extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_blog_showcase extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_audio extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_countdown extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_news_tab extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_edge_slider extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_banner_builder extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_icarousel extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_animated_columns extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_tab_slider extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_flipbox extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_edge_one_pager extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_custom_box extends WPBakeryShortCodesContainer
{
}

class WPBakeryShortCode_mk_content_box extends WPBakeryShortCodesContainer
{
}

class WPBakeryShortCode_mk_page_title_box extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_imagebox extends WPBakeryShortCodesContainer
{
}

class WPBakeryShortCode_mk_slideshow_box extends WPBakeryShortCodesContainer
{
}

class WPBakeryShortCode_mk_imagebox_item extends WPBakeryShortCode
{
}

class WPBakeryShortCode_mk_theatre_slider extends WPBakeryShortCode
{
}




class WPBakeryShortCode_mk_page_section extends WPBakeryShortCode
{
    protected $predefined_atts = array('el_class' => '');

    protected function content($atts, $content = null)
    {
        $prefix = '';
        return $prefix . $this->loadTemplate($atts, $content);
    }

    /* This returs block controls
    ---------------------------------------------------------- */
    public function getColumnControls($controls, $extended_css = '')
    {
        global $vc_row_layouts;
        $controls_start = '<div class="controls controls_row vc_clearfix">';
        $controls_end   = '</div>';

        //Create columns
        $controls_layout = '<span class="vc_row_layouts vc_control">';
        foreach ($vc_row_layouts as $layout) {
            $controls_layout .= '<a class="vc_control-set-column set_columns ' . $layout['icon_class'] . '" data-cells="' . $layout['cells'] . '" data-cells-mask="' . $layout['mask'] . '" title="' . $layout['title'] . '"></a> ';
        }
        $controls_layout .= '<br/><a class="vc_control-set-column set_columns custom_columns" data-cells="custom" data-cells-mask="custom" title="' . __('Custom layout', 'js_composer') . '">' . __('Custom', 'js_composer') . '</a> ';
        $controls_layout .= '</span>';

        $controls_move       = ' <a class="vc_control column_move" href="#" title="' . __('Drag Page Section to reorder', 'js_composer') . '"><i class="vc_icon"></i></a>';
        $controls_add        = ' <a class="vc_control column_add" href="#" title="' . __('Add column', 'js_composer') . '"><i class="vc_icon"></i></a>';
        $controls_delete     = '<a class="vc_control column_delete" href="#" title="' . __('Delete this Page Section', 'js_composer') . '"><i class="vc_icon"></i></a>';
        $controls_edit       = ' <a class="vc_control column_edit" href="#" title="' . __('Edit this Page Section', 'js_composer') . '"><i class="vc_icon"></i></a>';
        $controls_clone      = ' <a class="vc_control column_clone" href="#" title="' . __('Clone this Page Section', 'js_composer') . '"><i class="vc_icon"></i></a>';
        $controls_toggle     = ' <span class="vc_control vc_row_section_mark" title="' . $this->settings['name'] . '">' . $this->settings['name'] . '</span><a class="vc_control column_toggle" href="#" title="' . __('Toggle row', 'js_composer') . '"><i class="vc_icon"></i></a>';
        $controls_center_end = '</span>';

        $row_edit_clone_delete = '<span class="vc_row_edit_clone_delete">';
        $row_edit_clone_delete .= $controls_delete . $controls_clone . $controls_edit . $controls_toggle;

        //$column_controls_full =  $controls_start. $controls_move . $controls_center_start . $controls_layout . $controls_delete . $controls_clone . $controls_edit . $controls_center_end . $controls_end;
        $column_controls_full = $controls_start . $controls_move . $controls_layout . $controls_add . $row_edit_clone_delete . $controls_end;

        return $column_controls_full;
    }

    public function contentAdmin($atts, $content = null)
    {
        $width = $el_class = '';
        extract(shortcode_atts($this->predefined_atts, $atts));

        $output = '';

        $column_controls = $this->getColumnControls($this->settings('controls'));

        for ($i = 0; $i < count($width); $i++) {
            $output .= '<div' . $this->customAdminBockParams() . ' data-element_type="' . $this->settings["base"] . '" class="wpb_' . $this->settings['base'] . ' wpb_vc_row wpb_sortable">';
            $output .= str_replace("%column_size%", 1, $column_controls);
            $output .= '<div class="wpb_element_wrapper">';
            $output .= '<div class="vc_row vc_row-fluid wpb_row_container vc_container_for_children">';
            if ($content == '' && !empty($this->settings["default_content_in_template"])) {
                $output .= do_shortcode(shortcode_unautop($this->settings["default_content_in_template"]));
            } else {
                $output .= do_shortcode(shortcode_unautop($content));

            }
            $output .= '</div>';
            if (isset($this->settings['params'])) {
                $inner = '';
                foreach ($this->settings['params'] as $param) {
                    $param_value = isset($$param['param_name']) ? $$param['param_name'] : '';
                    if (is_array($param_value)) {
                        // Get first element from the array
                        reset($param_value);
                        $first_key   = key($param_value);
                        $param_value = $param_value[$first_key];
                    }
                    $inner .= $this->singleParamHtmlHolder($param, $param_value);
                }
                $output .= $inner;
            }
            $output .= '</div>';
            $output .= '</div>';
        }

        return $output;
    }

    public function customAdminBockParams()
    {
        return '';
    }

    public function buildStyle($bg_image = '', $bg_color = '', $bg_image_repeat = '', $font_color = '', $padding = '', $margin_bottom = '')
    {
        $has_image = false;
        $style     = '';
        if ((int) $bg_image > 0 && ($image_url = wp_get_attachment_url($bg_image, 'large')) !== false) {
            $has_image = true;
            $style .= "background-image: url(" . $image_url . ");";
        }
        if (!empty($bg_color)) {
            $style .= vc_get_css_color('background-color', $bg_color);
        }
        if (!empty($bg_image_repeat) && $has_image) {
            if ($bg_image_repeat === 'cover') {
                $style .= "background-repeat:no-repeat;background-size: cover;";
            } elseif ($bg_image_repeat === 'contain') {
                $style .= "background-repeat:no-repeat;background-size: contain;";
            } elseif ($bg_image_repeat === 'no-repeat') {
                $style .= 'background-repeat: no-repeat;';
            }
        }
        if (!empty($font_color)) {
            $style .= vc_get_css_color('color', $font_color); // 'color: '.$font_color.';';
        }
        if ($padding != '') {
            $style .= 'padding: ' . (preg_match('/(px|em|\%|pt|cm)$/', $padding) ? $padding : $padding . 'px') . ';';
        }
        if ($margin_bottom != '') {
            $style .= 'margin-bottom: ' . (preg_match('/(px|em|\%|pt|cm)$/', $margin_bottom) ? $margin_bottom : $margin_bottom . 'px') . ';';
        }
        return empty($style) ? $style : ' style="' . $style . '"';
    }
}

