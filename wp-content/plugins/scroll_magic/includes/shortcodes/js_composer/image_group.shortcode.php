<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) && ! class_exists( 'WPBakeryShortCode_Scrollmagic_Imagegroup' ) ) {
	class WPBakeryShortCode_Scrollmagic_Imagegroup extends WPBakeryShortCodesContainer {
	}
} else {
	add_action( 'init', function(){
		global $composer_settings;
		if ( ! empty( $composer_settings ) ) {
			if ( array_key_exists( 'COMPOSER_LIB', $composer_settings ) ) {
				$lib_dir = $composer_settings['COMPOSER_LIB'];
				if ( file_exists( $lib_dir . 'shortcodes.php' ) ) {
					require_once( $lib_dir . 'shortcodes.php' );
				}
			}
		}
		if ( class_exists( 'WPBakeryShortCodesContainer' ) && ! class_exists( 'WPBakeryShortCode_Scrollmagic_Imagegroup' ) ) {
			class WPBakeryShortCode_Scrollmagic_Imagegroup extends WPBakeryShortCodesContainer {
			}
		}
	} );
}

if ( ! class_exists( 'Bestbug_Scrollmagic_Image_Group_Shortcode' ) ) {
	/**
	 * Bestbug_Scrollmagic_Image_Group_Shortcode Class
	 *
	 * @since	1.0
	 */
	class Bestbug_Scrollmagic_Image_Group_Shortcode {

		/**
		 * Constructor
		 *
		 * @return	void
		 * @since	1.0
		 */
		function __construct() {
			add_action( 'init', array( $this, 'init' ) );
		}

		public function init() {
			
			add_shortcode( 'bb_sm_image_group', array( $this, 'shortcode' ) );
			add_shortcode( BESTBUG_SCROLLMAGIC_IMAGE_GROUP_SHORTCODE, array( $this, 'shortcode' ) );
			if ( defined( 'WPB_VC_VERSION' ) && function_exists( 'vc_add_param' ) ) {
				$this->vc_shortcode();
			}

        }
        
        public function vc_shortcode() {
			vc_map( array(
			    "name" => esc_html__( "Image group", 'bestbug' ),
			    "base" => BESTBUG_SCROLLMAGIC_IMAGE_GROUP_SHORTCODE,
			    "as_parent" => array('except' => BESTBUG_SCROLLMAGIC_IMAGE_GROUP_SHORTCODE),
			    "content_element" => true,
				"icon" => "bb_sm_imagesgroup",
			    "js_view" => 'VcColumnView',
				"description" => esc_html__( "Image Group specifies the horizontal alignment of Single Image", 'bestbug' ),
				'category' => esc_html( sprintf( esc_html__( 'by %s', 'bestbug' ), BESTBUG_SM_CATEGORY ) ),
			    "params" => array(
					array(
						'type'        => 'dropdown',
						'heading'     => 'Align',
						'param_name'  => 'align',
						'value' => array(
							'Left' => 'left',
							'Center' => 'center',
							'Right' => 'right',
						),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'bestbug' ),
						'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'bestbug'),
						'param_name' => 'el_class',
					),
					array(
						'type' => 'css_editor',
						'heading' => 'CSS box',
						'param_name' => 'css',
						'group' => 'Design Options',
					),
			    ),
			) );
        }
		public function settings($attr = BESTBUG_SCROLLMAGIC_IMAGE_GROUP_SHORTCODE) {
			return BESTBUG_SCROLLMAGIC_IMAGE_GROUP_SHORTCODE;
		}
		
		public function shortcode( $atts, $content = null ) {
			$atts = shortcode_atts( array(
				'bbsm_scene' => '',
				'scenes' => '',
				'align' => '',
				'css' => '',
				'el_class' => '',
			), $atts );
			$attr = $atts;
			
			if(!isset($attr['el_class'])) {
				$attr['el_class'] = '';
			}
			if(!isset($attr['css'])) {
				$attr['css'] = '';
			}
			if(!isset($attr['scenes'])) {
				$attr['scenes'] = '';
			}
			if(!isset($attr['align'])) {
				$attr['align'] = 'left';
			}
			if(!isset($attr['bbsm_scene'])) {
				$attr['bbsm_scene'] = '';
			}
			// for compatible with old version
			$scene = str_replace(","," ", trim($attr['bbsm_scene']));
			
			$css_class = apply_filters( BestBug_Helper::$VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, BestBug_Helper::vc_shortcode_custom_css_class( $attr['css'], ' ' ), BESTBUG_SCROLLMAGIC_SEQUENCE_IMAGE_SHORTCODE, $atts );
			$css_class .= ' ' . $attr['el_class'] . ' bbsm-text-' . $attr['align']. ' ' . $attr['scenes'] . ' ' . $scene;

			return '<div class="'.esc_attr($css_class).'">'.do_shortcode($content).'</div>';
		}
        
    }
	
	new Bestbug_Scrollmagic_Image_Group_Shortcode();
}

