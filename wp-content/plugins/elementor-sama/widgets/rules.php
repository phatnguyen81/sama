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
class Rules extends Widget_Base {

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
		return 'rules_section';
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
		return __( 'Rules Section', 'elementor-smartpay' );
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
            'rules_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Section title', 'elementor-smartpay'),
                'label_block' => true
            ]
        );


		$this->add_control(
			'rules_content',
			[
				'label' => __( 'Thể lệ', 'elementor-smartpay' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Default description', 'elementor-smartpay' ),
				'placeholder' => __( 'Type your description here', 'elementor-smartpay' ),
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
				'label' =>   esc_html__('Tabs điều lệ', 'elementor-smartpay')
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

		$rules_title = $settings["rules_title"];
		$rules_content = $settings['rules_content'];

		$tabtitles = '';
		$tabcontents = '';
		$i = 0;
		foreach ($settings['tabs'] as $a){
		
			$tabtitles .= '<li class="flex-lg-fill text-center nav-item " role="presentation"> <a class="nav-link'.($i==0?' active':' ').'" id="rules-tab-'.$i.'" data-toggle="tab" href="#rules-item-'.$i.'" role="tab" aria-controls="top-item-'.$i.'" aria-selected="'.($i==0?'true':'false').'">'.$a['title'].'</a> </li>';
			$tabcontents .= '<div class="tab-pane fade'.($i==0?' show active':' ').'" id="rules-item-'.$i.'" role="tabpanel" aria-labelledby="rules-item-'.$i.'">'.$a['content'].'</div>';
			$i++;
		}
		
		 

		$html = <<<EOF
		<div class="img-right-bottom imgintro animation-element slide-up"><img src="$theme_dir/assets/imgs/bg-thele-right-01.png"/></div>
		<div class="sectiontittle">$rules_title</div>
		<div class="container">
			<div class="sectionbox">
			<p class="w-75 m-auto text-justify cldarkblue">$rules_content</p>
			<div class="row mgt4r">
				<div class="col-12 col-md-8"> 
				<!--tab-->
				<ul class="nav nav-tabs tabs flex-md-row" id="rulestab" role="tablist">
				$tabtitles
				</ul>
				<div class="tab-content" id="rulestabContent">
				$tabcontents
				</div>
				<!--endtab--> 
				
				</div>
				<div class="d-none d-md-block col-md-4 bgrule"> &nbsp; </div>
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
