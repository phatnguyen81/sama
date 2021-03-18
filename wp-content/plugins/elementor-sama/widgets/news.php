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
class News extends Widget_Base {

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
		return 'news_section';
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
		return __( 'News Section', 'elementor-smartpay' );
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
            'news_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Section title', 'elementor-smartpay'),
                'label_block' => true
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
			'publish_date',
			[
				'label' => __( 'Publish Date', 'elementor-smartpay' ),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
			]
		);

		$repeater->add_control(
			'news_url',
			[
				'label' => __( 'Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$repeater->add_control(
			'news_image',
			[
				'label' => __( 'Hình ảnh', 'elementor-smartpay' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
                                
        $this->add_control(
            'news',
            [
                'type' => Controls_Manager::REPEATER,
                'prevent_empty' => false,
				'fields' => $repeater->get_controls(),
				'label' =>   esc_html__('Danh sách tin tức', 'elementor-smartpay')
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
		
		$news_title = $settings["news_title"];
		$news = '';
		foreach ($settings['news'] as $i=>$a){
			$imgurl = $a["news_image"]["url"];
			$newsdate = $a["publish_date"];
			if($newsdate){
				$newsdate = (new \DateTime($newsdate))->format('d-m-yy');
			}
			$title = $a["title"];
			$url = $a["news_url"]["url"];
			$target = $a['news_url']['is_external'] ? ' target="_blank"' : '';
			$news .= <<<EOF
			<div class="col-12 col-md-4"> <a href="$url" $target><img src="$imgurl" class="img-fluid"/> </a>
				<div class="small">$newsdate</div>
				<p><a href="$url" $target>$title</a></p>
			</div>
			EOF;
		}
		
		 

		$html = <<<EOF
		<div class="img-right-bottom imgintro animation-element slide-up"><img src="$theme_dir/assets/imgs/bg-thele-right-01.png"/></div>
			<div class="sectiontittle">$news_title</div>
			<div class="container">
			<div class="sectionbox">
				<div class="row maxnews">
				$news
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
