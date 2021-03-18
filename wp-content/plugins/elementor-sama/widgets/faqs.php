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
class Faqs extends Widget_Base {

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
		return 'faqs_section';
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
		return __( 'F&Q Section', 'elementor-smartpay' );
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
				'label' =>   esc_html__('Danh sách câu hỏi', 'elementor-smartpay')
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
		
		$faqcol1 = '';
		$faqcol2 = '';
		foreach ($settings['tabs'] as $i=>$a){
			$title = $a["title"];
			$content = $a["content"];
			if($i >= count($settings['tabs'])/2){
				$faqcol2 .= <<<EOF
				<div class="card">
					<div class="card-header" id="headingOne">
						<h2 class="mb-0">
						<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#faq-collapse-$i" aria-expanded="true" aria-controls="collapseOne"> $title</button>
						</h2>
					</div>
					<div id="faq-collapse-$i" class="collapse" aria-labelledby="headingOne" data-parent="#faq">
						<div class="card-body"> $content</div>
					</div>
				</div>
				EOF;
			}else{
				$faqcol1 .= <<<EOF
				<div class="card">
					<div class="card-header" id="heading4">
						<h2 class="mb-0">
						<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#faq-collapse-$i" aria-expanded="true" aria-controls="collapseOne"> $title</button>
						</h2>
					</div>
					<div id="faq-collapse-$i" class="collapse" aria-labelledby="faq-item-$i" data-parent="#faq">
					<div class="card-body"> $content</div>
					</div>
				</div>
				EOF;
			}
		}
		
		 

		$html = <<<EOF
		<div class="img-left-top imgintro animation-element slide-left"><img src="$theme_dir/assets/imgs/bg-xephang-bottom-01.png"/></div>
		<div class="sectiontittle">Câu hỏi thường gặp</div>
		<div class="container">
			<div class="sectionbox">
			<div class="img-left-top imgup imgintro animation-element slide slide-up d-none d-lg-block mgr-3 in-view" style=""><img src="$theme_dir/assets/imgs/faq.png" width="80" height="auto"></div>
			<div class="row" id="faq">
				<div class="col-12 col-md-6"> 
					<!--collapse info-->
					<div class="accordion tetcollapse" id="faq1">
						$faqcol1
					</div>
					<!--end collapse info--> 
				</div>
				<div class="col-12 col-md-6"> 
					<!--collapse info-->
					<div class="accordion tetcollapse" id="faq2">
						$faqcol2
					</div>
					<!--end collapse info--> 
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
