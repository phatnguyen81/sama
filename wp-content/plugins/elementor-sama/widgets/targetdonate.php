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
class TargetDonate extends Widget_Base {

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
		return 'targetdonate_section';
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
		return __( 'Target Donate Section', 'elementor-sama' );
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
			'targetdonate_section',
			[
				'label' => __( 'Mục tiêu dự án', 'elementor-sama' ),
			]
		);

		$this->add_control(
            'targetdonate_target', [
                'type' => Controls_Manager::NUMBER,
                'label' =>   esc_html__('Kế hoạch', 'elementor-sama'),
                'label_block' => true
            ]
		);

		
		$this->add_control(
            'targetdonate_perform', [
                'type' => Controls_Manager::NUMBER,
                'label' =>   esc_html__('Thực hiện', 'elementor-sama'),
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

		$targetdonate_target = number_format((float)$settings["targetdonate_target"]);
		$targetdonate_perform = number_format((float)$settings["targetdonate_perform"]);
		$percent = (int)((float)$settings["targetdonate_perform"]*100/(float)$settings["targetdonate_target"]);
		$html = <<<EOF
		<section class="targetdonate">
			<div class="bg-overlay"> </div>
			<div class="container">
				<div class="cont-small">
					<div class="donatebox mgb3rem">
						<h3 class="text-center">Tiến độ huy động dự án</h3>
						<p class="text-center"><span class=" text-uppercase">Mục tiêu:</span> Huy động <strong>$targetdonate_target đồng</strong> từ nguồn tịnh của phật </p>
						<div class="progress">
							<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: $percent%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div class="row">
							<div class="col-6 cl-darkgreen">Đã hoàn thành</div>
							<div class="col-6 text-right cl-darkgreen"> $percent%
								<p class="font-weight-bold">$targetdonate_perform đồng</p>
							</div>
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
