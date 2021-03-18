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
class Supporter extends Widget_Base {

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
		return 'supporter_section';
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
		return __( 'Supporter Section', 'elementor-sama' );
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
			'supporter_list',
			[
				'label' => __( 'Các đơn vị hỗ trợ', 'elementor-sama' ),
			]
		);

		$this->add_control(
            'supporter_content', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Nội dung', 'elementor-sama'),
                'label_block' => true
            ]
        );


		$supporter_repeater = new \Elementor\Repeater();

		$supporter_repeater->add_control(
			'supporter_image',
			[
				'label' => __( 'Hình', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);



	    $this->add_control(
            'supporter_repeater',
            [
                'type' => Controls_Manager::REPEATER,
                'prevent_empty' => false,
				'fields' => $supporter_repeater->get_controls(),
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

		$supporter_content = $settings["supporter_content"];


		$supporter_html = '';

		foreach ($settings['supporter_repeater'] as $item){
		
			$supporter_html .= '<img src="'. $item['supporter_image']['url'] .'" alt=""/>';
		}


		$html = <<<EOF
		<section class="pdsection bg-gray">
			<div class="container">
				<h2 class="text-center">Các đơn vị hỗ trợ</h2>
				<p class="text-center cl-gray pdb2rem">$supporter_content</p>
				<div class="partner text-center">$supporter_html</div>
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
