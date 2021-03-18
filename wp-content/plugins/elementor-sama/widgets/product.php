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
class Product extends Widget_Base {

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
		return 'product_section';
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
		return __( 'Product Section', 'elementor-sama' );
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
			'product_section',
			[
				'label' => __( 'Chi tiết sản phẩm', 'elementor-sama' ),
			]
		);

		$this->add_control(
            'product_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Tên sản phẩm', 'elementor-sama'),
                'label_block' => true
            ]
        );

		$this->add_control(
            'product_price', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Giá', 'elementor-sama'),
                'label_block' => true
            ]
        );

		$this->add_control(
			'product_description',
			[
				'label' => __( 'Chi tiết sản phẩm', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Type your content here', 'elementor-sama' ),
			]
		);

		$this->add_control(
			'product_translate_vietnamese_link',
			[
				'label' => __( 'Bản dịch tiếng việt', 'elementor-sama' ),
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
			'product_translate_english_link',
			[
				'label' => __( 'Bản dịch tiếng anh', 'elementor-sama' ),
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
			'product_download_link',
			[
				'label' => __( 'Proposal dự án', 'elementor-sama' ),
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

		$this->end_controls_section();
		
		$this->start_controls_section(
			'product_image_list',
			[
				'label' => __( 'Danh sách hình ảnh', 'elementor-sama' ),
			]
		);

		$product_repeater = new \Elementor\Repeater();

		$product_repeater->add_control(
			'product_image',
			[
				'label' => __( 'Hình', 'elementor-sama' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$product_repeater->add_control(
            'product_image_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Chú thích', 'elementor-sama'),
                'label_block' => true
            ]
        );



	    $this->add_control(
            'product_image_repeater',
            [
                'type' => Controls_Manager::REPEATER,
                'prevent_empty' => false,
				'fields' => $product_repeater->get_controls(),
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

		$product_title = $settings['product_title'];
		$product_price = $settings['product_price'];
		$product_description = $settings['product_description'];
		
		$product_translate_vietnamese_link_target = $settings['product_translate_vietnamese_link']['is_external'] ? ' target="_blank"' : '';
		$product_translate_vietnamese_link_nofollow = $settings['product_translate_vietnamese_link']['nofollow'] ? ' rel="nofollow"' : '';
		$product_translate_vietnamese_link_url = $settings["product_translate_vietnamese_link"]['url'];
	
		$product_translate_english_link_target = $settings['product_translate_english_link']['is_external'] ? ' target="_blank"' : '';
		$product_translate_english_link_nofollow = $settings['product_translate_english_link']['nofollow'] ? ' rel="nofollow"' : '';
		$product_translate_english_link_url = $settings["product_translate_english_link"]['url'];

		$product_download_link_target = $settings['product_download_link']['is_external'] ? ' target="_blank"' : '';
		$product_download_link_link_nofollow = $settings['product_download_link']['nofollow'] ? ' rel="nofollow"' : '';
		$product_download_link_link_url = $settings["product_download_link"]['url'];

		$product_html = '';

		foreach ($settings['product_image_repeater'] as $item){
			$product_html .= '<div class="item"> 
								<img src="'. $item['product_image']['url'] .'" width="1536" height="746" alt=""/>
								<p>'. $item['product_image_title'] .'</p>
							</div>';
		}


		$html = <<<EOF
		<section class="pdsection">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2>$product_title</h2>
					</div>
					<div class="col-12 col-md-6">
						<div class="owl-carousel owl-theme steps-product">
							$product_html
						</div>
					</div>
					<div class="col-12 col-md-6">
						<p class="txtbig">$product_price</p>
						$product_description
						<div class="translate">
							<a href="$product_translate_vietnamese_link_url" $product_translate_vietnamese_link_target $product_translate_vietnamese_link_nofollow><img src="$theme_dir/assets/imgs/icon-green.svg" alt="" width="16"/>Bản dịch tiếng Việt tham khảo</a> 
							<a href="$product_translate_english_link_url" $product_translate_english_link_target $product_translate_english_link_nofollow><img src="$theme_dir/assets/imgs/icon-green.svg" alt="" width="16"/>Bản dịch tiếng Anh tham khảo</a> 
						</div>
						<div class="text-center">
							<a href="$product_download_link_link_url" $product_download_link_target $product_download_link_link_nofollow class="btn btn-outline-primary">Tải Proposal dự án</a>
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
