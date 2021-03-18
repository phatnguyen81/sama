<?php
namespace ElementorSmartpay\Widgets;

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
class Award extends Widget_Base {

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
		return 'award_section';
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
		return __( 'Award Section', 'elementor-smartpay' );
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
		return [ 'smartpay' ];
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
		return [ 'elementor-smartpay' ];
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
				'label' => __( 'Content', 'elementor-smartpay' ),
			]
		);

		$this->add_control(
            'award_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Section title', 'elementor-smartpay'),
                'label_block' => true
            ]
		);
		
		$this->add_control(
            'loc_vang_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Tiêu đề', 'elementor-smartpay'),
                'label_block' => true
            ]
        );


		$this->add_control(
			'loc_vang_content',
			[
				'label' => __( 'Nội dung', 'elementor-smartpay' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Default description', 'elementor-smartpay' ),
				'placeholder' => __( 'Type your description here', 'elementor-smartpay' ),
			]
		);

		$this->add_control(
			'award_label_1',
			[
				'label' => __( 'Giải thưởng 1', 'elementor-hello-world' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
		);
		$this->add_control(
			'award_image_1',
			[
				'label' => __( 'Hình giải thưởng 1', 'elementor-smartpay' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'award_label_2',
			[
				'label' => __( 'Giải thưởng 2', 'elementor-hello-world' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
		);
		$this->add_control(
			'award_image_2',
			[
				'label' => __( 'Hình giải thưởng 2', 'elementor-smartpay' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'award_label_3',
			[
				'label' => __( 'Giải thưởng 3', 'elementor-hello-world' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
		);
		$this->add_control(
			'award_image_3',
			[
				'label' => __( 'Hình giải thưởng 3', 'elementor-smartpay' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);




 		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'type', [
                'label' =>   esc_html__('Population', 'elementor-smartpay'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'content' => [
                        'title' =>   esc_html__('Content', 'elementor-smartpay'),
                        'icon' => ' eicon-document-file',
                    ],
                    'template' => [
                        'title' =>   esc_html__('Template', 'elementor-smartpay'),
                        'icon' => 'eicon-image-rollover',
                    ]
                ],
                'default' => 'content',
                'label_block' => true,                
            ]
        );

        $repeater->add_control(
            'title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Label', 'elementor-smartpay'),
                'label_block' => true
            ]
        );


        $repeater->add_control(
            'content', [
                'type' => Controls_Manager::WYSIWYG,
                'label' =>   esc_html__('Content', 'elementor-smartpay'),
                'label_block' => true,
                'condition' => [
                    'type' => 'content',
                ],
            ]
        );


                                
        $this->add_control(
            'tabs',
            [
                'type' => Controls_Manager::REPEATER,
                'prevent_empty' => false,
				'fields' => $repeater->get_controls(),
				'label' =>   esc_html__('Tabs giải thưởng', 'elementor-smartpay')
            ]
        );
	

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'elementor-smartpay' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'elementor-smartpay' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'elementor-smartpay' ),
					'uppercase' => __( 'UPPERCASE', 'elementor-smartpay' ),
					'lowercase' => __( 'lowercase', 'elementor-smartpay' ),
					'capitalize' => __( 'Capitalize', 'elementor-smartpay' ),
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
		$award_title = $settings["award_title"];
		$loc_vang_content = $settings["loc_vang_content"];
		$loc_vang_title = $settings["loc_vang_title"];
		$giai_thuong_1 = $settings["award_label_1"];
		$giai_thuong_2 = $settings["award_label_2"];
		$giai_thuong_3 = $settings["award_label_3"];
		$hinh_giai_thuong_1 = $settings["award_image_1"]['url'];
		$hinh_giai_thuong_2 = $settings["award_image_2"]['url'];
		$hinh_giai_thuong_3 = $settings["award_image_3"]['url'];

		

		$tabtitles = '';
		$tabcontents = '';
		$i = 0;
		foreach ($settings['tabs'] as $a){
		
			$tabtitles .= '<li class="flex-lg-fill text-center nav-item " role="presentation"> <a class="nav-link'.($i==0?' active':' ').'" id="award-tab-'.$i.'" data-toggle="tab" href="#award-item-'.$i.'" role="tab" aria-controls="award-item-'.$i.'" aria-selected="'.($i==0?'true':'false').'">'.$a['title'].'</a> </li>';
			$tabcontents .= '<div class="tab-pane fade'.($i==0?' show active':' ').'" id="award-item-'.$i.'" role="tabpanel" aria-labelledby="award-item-'.$i.'">'.$a['content'].'</div>';
			$i++;
		}
		
		 

		$html = <<<EOF
		<div class="img-left-top imgintro animation-element slide-up"><img src="$theme_dir/assets/imgs/bg-giaithuong-top-left.png" /></div>
		<div class="img-right-bottom imgintro animation-element slide-up"><img src="$theme_dir/assets/imgs/bg-giaithuong-bottom-right.png"  /></div>
		<div class="sectiontittle">$award_title</div>
		<div class="container">
		  <div class="sectionbox">
			<div class="img-right-top imgup imgintro animation-element slide slide-up d-none d-lg-block mgr-3"><img src="$theme_dir/assets/imgs/head-giaithuong.png" width="150" height="auto" /></div>
			<div class="titbox"><span>$loc_vang_title</span></div>
			<p class="w-75 m-auto text-justify cldarkblue">$loc_vang_content</p>
			<div class="row ">
			  <div class="col-12 col-md-4 text-center animation-element slide-up"> <img src="$hinh_giai_thuong_1" width="325" height="325" class="img-fluid"/>
				<h5 class="award-det cldarkblue">
				$giai_thuong_1
				</h5>
			  </div>
			  <div class="col-6 col-md-4 text-center animation-element slide-up"> <img src="$hinh_giai_thuong_2" width="325" height="325" class="img-fluid"/>
			  <h5 class="award-det cldarkblue">
			  $giai_thuong_2
			  </h5>
			  </div>
			  <div class="col-6 col-md-4 text-center animation-element slide-up"> <img src="$hinh_giai_thuong_3" width="325" height="325" class="img-fluid"/>
			  <h5 class="award-det cldarkblue">
			  $giai_thuong_3
			  </h5>
			  </div>
			</div>
			<!--tabs giaithuong-->
			<ul class="nav nav-tabs tabs mgt4r flex-lg-row" id="myTab" role="tablist">
				$tabtitles
			</ul>
			<div class="tab-content" id="myTabContent">
				$tabcontents
			</div>
			<!--endtabs giaithuong--> 
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
