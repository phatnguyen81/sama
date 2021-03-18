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
class Cover extends Widget_Base {

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
		return 'cover_section';
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
		return __( 'Cover Section', 'elementor-sama' );
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
			'section_content',
			[
				'label' => __( 'Content', 'elementor-sama' ),
			]
		);

		$this->add_control(
            'cover_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Section title', 'elementor-sama'),
                'label_block' => true
            ]
		);
		

		$this->add_control(
			'cover_content',
			[
				'label' => __( 'Bảng xếp hạng', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Default description', 'elementor-sama' ),
				'placeholder' => __( 'Type your description here', 'elementor-sama' ),
			]
		);

	

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'elementor-sama' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'elementor-sama' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'elementor-sama' ),
					'uppercase' => __( 'UPPERCASE', 'elementor-sama' ),
					'lowercase' => __( 'lowercase', 'elementor-sama' ),
					'capitalize' => __( 'Capitalize', 'elementor-sama' ),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
				],
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

		$cover_title = $settings["cover_title"];
		$cover_content = $settings["cover_content"];


		$html = <<<EOF
		<div class="banner"> </div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 d-lg-none coverlogo"><img src="$theme_dir/assets/imgs/Jatakawhite.svg" alt=""/></div>
				<div class="col-lg-6">
					<div class="box-content text-white">
						<h1>$cover_title</h1>
						$cover_content
						<div class="text-center">
							<a href="#target" class="btn btn-outline-primary">Mục tiêu dự án</a>
							<a href="#donate" class="btn btn-primary">Hùn phước</a>
						</div>
					</div>
				</div>
			</div>
		</div>
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
