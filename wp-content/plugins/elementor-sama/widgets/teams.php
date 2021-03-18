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
class Teams extends Widget_Base {

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
		return 'teams_section';
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
		return __( 'Teams Section', 'elementor-sama' );
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
			'teams_section',
			[
				'label' => __( 'Teams', 'elementor-sama' ),
			]
		);

		$this->add_control(
			'teams_image',
			[
				'label' => __( 'Hình', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
            'teams_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Tiêu đề', 'elementor-sama'),
                'label_block' => true
            ]
		);

		
		$this->add_control(
			'teams_content',
			[
				'label' => __( 'Nội dung', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Default description', 'elementor-sama' ),
				'placeholder' => __( 'Type your description here', 'elementor-sama' ),
			]
		);
		$this->end_controls_section();

		
		// Các thành viên thực hiện dự án
		$this->start_controls_section(
			'team_member_section',
			[
				'label' => __( 'Các thành viên thực hiện dự án', 'elementor-sama' ),
			]
		);

		$team_member_repeater = new \Elementor\Repeater();

		$team_member_repeater->add_control(
			'team_member_image',
			[
				'label' => __( 'Hình', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$team_member_repeater->add_control(
            'team_member_fullname', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Họ & tên', 'elementor-sama'),
                'label_block' => true
            ]
        );

		$team_member_repeater->add_control(
            'team_member_role', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Vai trò', 'elementor-sama'),
                'label_block' => true
            ]
        );

		$team_member_repeater->add_control(
            'team_member_introduction', [
                'type' => Controls_Manager::WYSIWYG,
                'label' =>   esc_html__('Giới thiệu', 'elementor-sama'),
                'label_block' => true
            ]
        );

	    $this->add_control(
            'team_member_repeater',
            [
                'type' => Controls_Manager::REPEATER,
                'prevent_empty' => false,
				'fields' => $team_member_repeater->get_controls(),
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

		$teams_image_url = $settings["teams_image"]['url'];
		$teams_title = $settings["teams_title"];
		$teams_content = $settings["teams_content"];


		$team_member_html = '';

		foreach ($settings['team_member_repeater'] as $member){
		
			$team_member_html .= '<div class="item">
									<p class="text-center"><img src="' . $member['team_member_image']['url'] . '" alt="" class="w-50"/></p>
									<h4 class="text-center">'. $member['team_member_fullname'] .'</h4>
									<p class="cl-white text-center">' . $member['team_member_role'] . '</p>
									' . $member['team_member_introduction'] . '
								</div>';
		}


		$html = <<<EOF
		<section class="pdsection team" id="teams">
			<div class="container">
				<div class="row mgb3rem">
					<div class="col-12 col-md-6 text-center"><img src="$teams_image_url" alt="" class="w-smaller"/></div>
					<div class="col-12 col-md-6">
						<h2 class="cl-white">$teams_title</h2>
						$teams_content
						<button type="button" class="btn btn-primary btnlong"  onclick=" window.open('http://www.google.com', '_blank'); return false;">Xem thêm Proposal Du bút</button>
					</div>
				</div>
				<h2>Các thành viên thực hiện dự án</h2>
				<div class="owl-carousel owl-theme listteam">
					$team_member_html
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
