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
class Comic extends Widget_Base {

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
		return 'comic_section';
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
		return __( 'Comic Section', 'elementor-sama' );
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
			'proposal_section',
			[
				'label' => __( 'Proposal', 'elementor-sama' ),
			]
		);

		$this->add_control(
            'proposal_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Ti??u ?????', 'elementor-sama'),
                'label_block' => true
            ]
		);

		
		$this->add_control(
			'proposal_content',
			[
				'label' => __( 'N???i dung', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Default description', 'elementor-sama' ),
				'placeholder' => __( 'Type your description here', 'elementor-sama' ),
			]
		);
		
		$this->add_control(
			'proposal_translate_vietnamese_link',
			[
				'label' => __( 'B???n d???ch ti???ng vi???t', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor-sama' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'proposal_translate_english_link',
			[
				'label' => __( 'B???n d???ch ti???ng anh', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor-sama' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'proposal_download_link',
			[
				'label' => __( 'Proposal d??? ??n', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor-sama' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);


		$this->add_control(
            'proposal_shortcode_read_try_it', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Shortcode ?????c th???', 'elementor-sama'),
                'label_block' => true
            ]
		);

		$this->end_controls_section();
		// C??C B?????C TH???C HI???N D??? 
		$this->start_controls_section(
			'step_project_section',
			[
				'label' => __( 'C??c b?????c th??? hi???n d??? ??n', 'elementor-sama' ),
			]
		);

		$step_project_repeater = new \Elementor\Repeater();

		$step_project_repeater->add_control(
			'step_project_image',
			[
				'label' => __( 'H??nh', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$step_project_repeater->add_control(
            'step_project_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Ch?? th??ch', 'elementor-sama'),
                'label_block' => true
            ]
        );

	    $this->add_control(
            'steps_project',
            [
                'type' => Controls_Manager::REPEATER,
                'prevent_empty' => false,
				'fields' => $step_project_repeater->get_controls(),
				'label' =>   esc_html__('Danh s??ch b?????c', 'elementor-smartpay')
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'project_objectives_section',
			[
				'label' => __( 'M???c ti??u d??? ??n', 'elementor-sama' ),
			]
		);

		$this->add_control(
            'project_objectives_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Ti??u d???', 'elementor-sama'),
                'label_block' => true
            ]
		);
		

		$this->add_control(
            'project_objectives_sub_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Ti??u d??? nh???', 'elementor-sama'),
                'label_block' => true
            ]
		);

		
		$this->add_control(
			'project_objectives_image_1',
			[
				'label' => __( 'H??nh 1', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'project_objectives_image_1_title',
			[
				'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Ti??u d??? h??nh 1', 'elementor-sama'),
                'label_block' => true
			]
		);

		$this->add_control(
            'project_objectives_image_1_description', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Ch?? th??ch h??nh 1', 'elementor-sama'),
                'label_block' => true
            ]
		);

		$this->add_control(
			'project_objectives_image_2',
			[
				'label' => __( 'H??nh 2', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'project_objectives_image_2_title',
			[
				'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Ti??u d??? h??nh 2', 'elementor-sama'),
                'label_block' => true
			]
		);

		$this->add_control(
            'project_objectives_image_2_description', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Ch?? th??ch h??nh 2', 'elementor-sama'),
                'label_block' => true
            ]
		);

		$this->add_control(
			'project_objectives_image_3',
			[
				'label' => __( 'H??nh 3', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'project_objectives_image_3_title',
			[
				'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Ti??u d??? h??nh 3', 'elementor-sama'),
                'label_block' => true
			]
		);

		$this->add_control(
            'project_objectives_image_3_description', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Ch?? th??ch h??nh 3', 'elementor-sama'),
                'label_block' => true
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

		$proposal_title = $settings["proposal_title"];
		$proposal_content = $settings["proposal_content"];
	
		$proposal_translate_vietnamese_link_target = $settings['proposal_translate_vietnamese_link']['is_external'] ? ' target="_blank"' : '';
		$proposal_translate_vietnamese_link_nofollow = $settings['proposal_translate_vietnamese_link']['nofollow'] ? ' rel="nofollow"' : '';
		$proposal_translate_vietnamese_link_url = $settings["proposal_translate_vietnamese_link"]['url'];
	
		$proposal_translate_english_link_target = $settings['proposal_translate_english_link']['is_external'] ? ' target="_blank"' : '';
		$proposal_translate_english_link_nofollow = $settings['proposal_translate_english_link']['nofollow'] ? ' rel="nofollow"' : '';
		$proposal_translate_english_link_url = $settings["proposal_translate_english_link"]['url'];

		$proposal_download_link_target = $settings['proposal_download_link']['is_external'] ? ' target="_blank"' : '';
		$proposal_download_link_link_nofollow = $settings['proposal_download_link']['nofollow'] ? ' rel="nofollow"' : '';
		$proposal_download_link_link_url = $settings["proposal_download_link"]['url'];

		$proposal_shortcode_read_try_it = do_shortcode($settings['proposal_shortcode_read_try_it']);

		$steps_project_html = '';

		foreach ($settings['steps_project'] as $step){
		
			$steps_project_html .= '<div class="item"> <img src="' . $step['step_project_image']['url'] . '" width="1536" height="746" alt=""/><p>' . $step['step_project_title'] . '</p></div>';
		}

		$project_objectives_title = $settings['project_objectives_title'];
		$project_objectives_sub_title = $settings['project_objectives_sub_title'];

		$project_objectives_image_1_url = $settings['project_objectives_image_1']['url'];
		$project_objectives_image_1_title = $settings['project_objectives_image_1_title'];
		$project_objectives_image_1_description = $settings['project_objectives_image_1_description'];

		$project_objectives_image_2_url = $settings['project_objectives_image_2']['url'];
		$project_objectives_image_2_title = $settings['project_objectives_image_2_title'];
		$project_objectives_image_2_description = $settings['project_objectives_image_2_description'];

		$project_objectives_image_3_url = $settings['project_objectives_image_3']['url'];
		$project_objectives_image_3_title = $settings['project_objectives_image_3_title'];
		$project_objectives_image_3_description = $settings['project_objectives_image_3_description'];

		$html = <<<EOF
		<section class="comic pdsection" id="comic">
			<div class="container">
				$proposal_title
				<div class="cont-small">
					$proposal_content
					<div class="translate"> 
						<a href="$proposal_translate_vietnamese_link_url" $proposal_translate_vietnamese_link_target $proposal_translate_vietnamese_link_nofollow><img src="$theme_dir/assets/imgs/icon-green.svg" alt="" width="16"/>B???n d???ch ti???ng Vi???t tham kh???o</a> 
						<a href="$proposal_translate_english_link_url" $proposal_translate_english_link_target $proposal_translate_english_link_nofollow><img src="$theme_dir/assets/imgs/icon-green.svg" alt="" width="16"/>B???n d???ch ti???ng Anh tham kh???o</a> </div>
					<div class="text-center">
						<a href="$proposal_download_link_link_url" $proposal_download_link_target $proposal_download_link_link_nofollow class="btn btn-outline-primary">T???i Proposal d??? ??n</a>
						$proposal_shortcode_read_try_it
					</div>
				</div>
				<div class="mgt3rem">
					<h3 class="text-center">C??c b?????c th???c hi???n d??? ??n</h3>
					<div class="owl-carousel owl-theme steps">
						$steps_project_html
					</div>

				</div>
				<div class="cont-small" id="target">
					<h3 class="text-center mgt3rem">$project_objectives_title</h3>
					<p class="text-center cl-gray pdb2rem">$project_objectives_sub_title</p>
					<div class="row txt-target">
						<div class="col-md-4 pdb2rem">
							<div class="row">
								<div class="col-4 col-md-12 text-center"><img src="$project_objectives_image_1_url" alt="" class="w-smaller"/></div>
								<div class="col-8 col-md-12 d-flex align-items-center">
									<div class="w-100">
										<h4>$project_objectives_image_1_title</h4>
										<p>$project_objectives_image_1_description</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 pdb2rem">
							<div class="row">
								<div class="col-4 col-md-12 text-center"><img src="$project_objectives_image_2_url" alt="" class="w-smaller"/></div>
								<div class="col-8 col-md-12 d-flex align-items-center">
									<div class="w-100">
									<h4>$project_objectives_image_2_title</h4>
									<p>$project_objectives_image_2_description</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 pdb2rem">
							<div class="row">
								<div class="col-4 col-md-12 text-center"><img src="$project_objectives_image_3_url" alt="" class="w-smaller"/></div>
								<div class="col-8 col-md-12 d-flex align-items-center">
									<div class="w-100">
									<h4>$project_objectives_image_3_title</h4>
									<p>$project_objectives_image_3_description</p>
									</div>
								</div>
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
