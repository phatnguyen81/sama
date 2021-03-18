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
class Top extends Widget_Base {

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
		return 'top_section';
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
		return __( 'Top Section', 'elementor-smartpay' );
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
            'top_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Section title', 'elementor-smartpay'),
                'label_block' => true
            ]
		);
		
		$this->add_control(
            'top_5_text', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Top 5 title', 'elementor-smartpay'),
                'label_block' => true
            ]
        );


		$this->add_control(
			'top_content',
			[
				'label' => __( 'Bảng xếp hạng', 'elementor-smartpay' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Default description', 'elementor-smartpay' ),
				'placeholder' => __( 'Type your description here', 'elementor-smartpay' ),
			]
		);

		$this->add_control(
			'top_1_name',
			[
				'label' => __( 'Top 1 Name', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_1_phone',
			[
				'label' => __( 'Top 1 Phone', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_1_description',
			[
				'label' => __( 'Top 1 Description', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_1_price',
			[
				'label' => __( 'Top 1 Price', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_1_image',
			[
				'label' => __( 'Top 1 Image', 'elementor-smartpay' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'top_2_name',
			[
				'label' => __( 'Top 2 Name', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_2_phone',
			[
				'label' => __( 'Top 2 Phone', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_2_description',
			[
				'label' => __( 'Top 2 Description', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_2_price',
			[
				'label' => __( 'Top 2 Price', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_2_image',
			[
				'label' => __( 'Top 2 Image', 'elementor-smartpay' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'top_3_name',
			[
				'label' => __( 'Top 3 Name', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_3_phone',
			[
				'label' => __( 'Top 3 Phone', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_3_description',
			[
				'label' => __( 'Top 3 Description', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_3_price',
			[
				'label' => __( 'Top 3 Price', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_3_image',
			[
				'label' => __( 'Top 3 Image', 'elementor-smartpay' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'top_4_name',
			[
				'label' => __( 'Top 4 Name', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_4_phone',
			[
				'label' => __( 'Top 4 Phone', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_4_description',
			[
				'label' => __( 'Top 4 Description', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_4_price',
			[
				'label' => __( 'Top 4 Price', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_4_image',
			[
				'label' => __( 'Top 4 Image', 'elementor-smartpay' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'top_5_name',
			[
				'label' => __( 'Top 5 Name', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_5_phone',
			[
				'label' => __( 'Top 5 Phone', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_5_description',
			[
				'label' => __( 'Top 5 Description', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_5_price',
			[
				'label' => __( 'Top 5 Price', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'top_5_image',
			[
				'label' => __( 'Top 5 Image', 'elementor-smartpay' ),
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
				'label' =>   esc_html__('Tabs xếp hạng', 'elementor-smartpay')
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

		$top_title = $settings["top_title"];
		$top_5_text = $settings["top_5_text"];
		$top_content = $settings["top_content"];
		$top_1_name = $settings["top_1_name"];
		$top_1_phone = $settings["top_1_phone"];
		$top_1_description = $settings["top_1_description"];
		$top_1_price = $settings["top_1_price"];
		$top_1_image = $settings["top_1_image"]['url'];

		$top_2_name = $settings["top_2_name"];
		$top_2_phone = $settings["top_2_phone"];
		$top_2_description = $settings["top_2_description"];
		$top_2_price = $settings["top_2_price"];
		$top_2_image = $settings["top_2_image"]['url'];

		$top_3_name = $settings["top_3_name"];
		$top_3_phone = $settings["top_3_phone"];
		$top_3_description = $settings["top_3_description"];
		$top_3_price = $settings["top_3_price"];
		$top_3_image = $settings["top_3_image"]['url'];
		
		$top_4_name = $settings["top_4_name"];
		$top_4_phone = $settings["top_4_phone"];
		$top_4_description = $settings["top_4_description"];
		$top_4_price = $settings["top_4_price"];
		$top_4_image = $settings["top_4_image"]['url'];

		$top_5_name = $settings["top_5_name"];
		$top_5_phone = $settings["top_5_phone"];
		$top_5_description = $settings["top_5_description"];
		$top_5_price = $settings["top_5_price"];
		$top_5_image = $settings["top_5_image"]['url'];

		$tabtitles = '';
		$tabcontents = '';
		$i = 0;
		foreach ($settings['tabs'] as $a){
		
			$tabtitles .= '<li class="flex-lg-fill text-center nav-item " role="presentation"> <a class="nav-link'.($i==0?' active':' ').'" id="top-tab-'.$i.'" data-toggle="tab" href="#top-item-'.$i.'" role="tab" aria-controls="top-item-'.$i.'" aria-selected="'.($i==0?'true':'false').'">'.$a['title'].'</a> </li>';
			$tabcontents .= '<div class="tab-pane fade'.($i==0?' show active':' ').'" id="top-item-'.$i.'" role="tabpanel" aria-labelledby="top-item-'.$i.'">'.$a['content'].'</div>';
			$i++;
		}
		
		 

		$html = <<<EOF
		<div class="img-right-top imgintro animation-element slide-up"><img src="$theme_dir/assets/imgs/bg-xephang-top-01.png"/></div>
		<div class="img-left-bottom imgintro animation-element slide-up"><img src="$theme_dir/assets/imgs/bg-xephang-bottom-01.png"/></div>
		<div class="sectiontittle">$top_title</div>
		<div class="container">
			<div class="sectionbox">
			<p class="w-75 m-auto text-justify cldarkblue">$top_content</p>
			<div class="titbox"><span>$top_5_text</span></div>
			<div class="listtop justify-content-center">
			
				<div class="atop  animation-element slide-up">
				<div class="imgtop"><img src="$top_1_image" width="303" height="303" /></div>
				<span>TOP 1</span>
				<p><strong>$top_1_name</strong><br />
				$top_1_phone<br />
				$top_1_description
				<h4 class="awardtext">$top_1_price</h4>
				</p>
				</div>
				<div class="atop animation-element slide-up">
				<div class="imgtop"><img src="$top_2_image" width="303" height="303" /></div>
				<span>TOP 2</span>
				<p><strong>$top_2_name</strong><br />
				$top_2_phone<br />
				$top_2_description
				<h4 class="awardtext">$top_2_price</h4>
				</p>
				</div>
				<div class="atop animation-element slide-up">
				<div class="imgtop"><img src="$top_3_image" width="303" height="303" /></div>
				<span>TOP 3</span>
				<p><strong>$top_3_name</strong><br />
				$top_3_phone<br />
				$top_3_description
				<h4 class="awardtext">$top_3_price</h4>
				</p>
				</div>
				<div class="atop animation-element slide-up">
				<div class="imgtop"><img src="$top_4_image" width="303" height="303" /></div>
				<span>TOP 4</span>
				<p><strong>$top_4_name</strong><br />
				$top_4_phone<br />
				$top_4_description
				<h4 class="awardtext">$top_4_price</h4>
				</p>
				</div>
				<div class="atop animation-element slide-up">
				<div class="imgtop"><img src="$top_5_image" width="303" height="303" /></div>
				<span>TOP 5</span>
				<p><strong>$top_5_name</strong><br />
				$top_5_phone<br />
				$top_5_description
				<h4 class="awardtext">$top_5_price</h4>
				</p>
				</div>
			</div>
			<div class="titbox d-md-none weektable"><span>Bảng xếp hạng tuần</span></div>
			<!--tabs Bang xep hang-->
			<ul class="nav nav-tabs tabs flex-lg-row" id="toptab" role="tablist">
			$tabtitles
			</ul>
			<div class="tab-content" id="topContent">
			$tabcontents
			</div>
			<!--endtabs Bang xep hang--> 
			
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
