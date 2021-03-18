<?php
namespace ElementorSama\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Publish extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'publish_section';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Publish Section', 'elementor-sama' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'sama' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'elementor-sama' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
	
		
		$this->start_controls_section(
			'publish_list',
			[
				'label' => __( 'Tác phẩm đã xuất bản', 'elementor-sama' ),
			]
		);

		$publish_repeater = new \Elementor\Repeater();

		$publish_repeater->add_control(
			'publish_image',
			[
				'label' => __( 'Hình', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$publish_repeater->add_control(
            'publish_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Chú thích', 'elementor-sama'),
                'label_block' => true
            ]
        );

		$publish_repeater->add_control(
            'publish_popup_id', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Popup ID', 'elementor-sama'),
                'label_block' => true
            ]
        );



	    $this->add_control(
            'publish_repeater',
            [
                'type' => Controls_Manager::REPEATER,
                'prevent_empty' => false,
				'fields' => $publish_repeater->get_controls(),
				'label' =>   esc_html__('Danh sách bước', 'elementor-smartpay')
            ]
        );

		$this->end_controls_section();

	
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$theme_dir = get_template_directory_uri();

		
		

		$publish_html = '';

		foreach ($settings['publish_repeater'] as $item){
			// $popup = do_shortcode('[sg_popup id="'.$item['publish_popup_id'].'" event="click" wrap="span"]<img src="'. $item['publish_image']['url'] .'" alt=""/>[/sg_popup]');
			//$popup = '<img src="'. $item['publish_image']['url'] .'" alt=""/ class="'. $item['publish_popup_id'] .'">';
			$publish_html .= '<div class="item"> 
								<img src="'. $item['publish_image']['url'] .'" alt=""/ class="'. $item['publish_popup_id'] .'">
								<p>'. $item['publish_title'] .'</p>
							</div>';
		}


		$html = <<<EOF
		<section class="pdsection" id="public">
			<div class="container">
				<h2 class="text-center">Tác phẩm đã xuất bản</h2>
				<div class="owl-carousel owl-theme public">
					$publish_html
				</div>
			</div>
		</section>
		
		EOF;
		echo $html;
	
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		?>
		<div class="title">
			{{{ settings.title }}}
		</div>
		<?php
	}
}
