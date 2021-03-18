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
class Donate extends Widget_Base {

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
		return 'donate_section';
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
		return __( 'Donate Section', 'elementor-sama' );
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
			'donate_section',
			[
				'label' => __( 'Mục tiêu dự án', 'elementor-sama' ),
			]
		);

		$this->add_control(
			'donate_content',
			[
				'label' => __( 'Phật tự hùn phước', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Type your content here', 'elementor-sama' ),
			]
		);

		$this->add_control(
			'donate_qrcode',
			[
				'label' => __( 'QR Code', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Type your content here', 'elementor-sama' ),
			]
		);

		$this->add_control(
			'donate_register_donate_form',
			[
				'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Short code form đăng ký hùn phước', 'elementor-sama'),
                'label_block' => true
			]
		);

		$this->add_control(
			'donate_register_receive_book',
			[
				'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Short code form đăng ký nhận sách', 'elementor-sama'),
                'label_block' => true
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

		$donate_register_donate_form = do_shortcode($settings["donate_register_donate_form"]);
		$donate_register_receive_book = do_shortcode($settings["donate_register_receive_book"]);

		$donate_content = $settings["donate_content"];
		$donate_qrcode = $settings["donate_qrcode"];

		$html = <<<EOF
		<section class="pdsection donate" id="donate">
			<div class="container">
				<div class="cont-small">
					<nav class="nav-justified">
						<div class="nav nav-tabs" id="nav-tab" role="tablist"> <a class="nav-item nav-link active" id="fund-tab" data-toggle="tab" href="#fund" role="tab" aria-controls="fund" aria-selected="true">Phật tử hùn phước </a> <a class="nav-item nav-link" id="getbook-tab" data-toggle="tab" href="#getbook" role="tab" aria-controls="getbook" aria-selected="false">Đăng ký nhận sách</a> </div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="fund" role="tabpanel" aria-labelledby="fund-tab">
							<div class="row">
								<div class="col-12 col-md-6 mgb3rem">$donate_content</div>
								<div class="col-12 col-md-6 bddot">$donate_qrcode</div>
							</div>
							$donate_register_donate_form
						</div>
						<div class="tab-pane fade" id="getbook" role="tabpanel" aria-labelledby="getbook-tab">
							$donate_register_receive_book
						</div>
					</div>
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
