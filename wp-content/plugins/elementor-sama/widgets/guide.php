<?php

namespace ElementorSmartpay\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Guide extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'guide_section';
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
	public function get_title()
	{
		return __('Guide Section', 'elementor-smartpay');
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
	public function get_icon()
	{
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
	public function get_categories()
	{
		return ['smartpay'];
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
	public function get_script_depends()
	{
		return ['elementor-smartpay'];
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
	protected function _register_controls()
	{
		$this->start_controls_section(
			'section_content',
			[
				'label' => __('Content', 'elementor-smartpay'),
			]
		);

		$this->add_control(
            'guide_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Section title', 'elementor-smartpay'),
                'label_block' => true
            ]
        );


		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __('Style', 'elementor-smartpay'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __('Text Transform', 'elementor-smartpay'),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __('None', 'elementor-smartpay'),
					'uppercase' => __('UPPERCASE', 'elementor-smartpay'),
					'lowercase' => __('lowercase', 'elementor-smartpay'),
					'capitalize' => __('Capitalize', 'elementor-smartpay'),
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

	protected function render_guide_steps($term_id)
	{
		$posts_array = get_posts(
			array(
				'posts_per_page' => -1,
				'post_type' => 'guide-step',
				'tax_query' => array(
					array(
						'taxonomy' => 'guide_group',
						'field' => 'term_id',
						'terms' => $term_id,
					)
				)
			)
		);
		$html = '<div class"row">';
		$slider = '';
		$accordion = '';
		$j = 0;
		foreach ($posts_array as $p) {
			$slider .= '<div class="carousel-item' . ($j == 0 ? ' active' : ' ') . '"> <img src="' . get_the_post_thumbnail_url($p->ID) . '" alt="First Image" class="img-fluid"> </div>';
			$accordion .= '<div class="card">';
			$accordion .= '<div class="card-header" id="heading-' . $term_id . '-' . $p->ID . '">';
			$accordion .= '<h2 class="mb-0">';
			$accordion .= '<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-' . $term_id . '-' . $p->ID . '" aria-expanded="true" aria-controls="collapseOne"> ' . $p->post_title . '</button>';
			$accordion .= '</h2>';
			$accordion .= '</div>';
			$accordion .= '<div id="collapse-' . $term_id . '-' . $p->ID . '" class="guide-step collapse' . ($j == 0 ? ' show' : ' ') . '" aria-labelledby="heading-' . $term_id . '-' . $p->ID . '" data-parent="#accordion-' . $term_id . '" data-carousel-id="landingpage-'.$term_id.'" data-step-index="'.$j.'">';
			$accordion .= '<div class="card-body">' . $p->post_content . '</div>';
			$accordion .= '</div>';
			$accordion .= '</div>';
			$j++;
		}
		$html = <<<EOF
		<div class="row">
			<div class="col-12 col-md-6 col-lg-7">
				<div class="accordion tetcollapse" id="accordion-$term_id" data-slider-id="landingpage-$term_id" >
				$accordion
				</div>
			</div>
			<div class="col-12 col-md-6 col-lg-5">
			<div id="landingpage-$term_id" class="carousel slideguide animation-element slide slide-left" data-ride="landingpage-$term_id" data-interval="false" data-term-id="$term_id">  
				<div class="carousel-inner" role="listbox">
				$slider
				</div>
				<a class="carousel-control-prev" href="#landingpage-$term_id" role="button" data-slide="prev"> 
					<span class="carousel-control-prev-icon" aria-hidden="true"></span> 
					<span class="sr-only">Previous</span> 
				</a> 
				<a class="carousel-control-next" href="#landingpage-$term_id" role="button" data-slide="next"> 
					<span class="carousel-control-next-icon" aria-hidden="true"></span> 
					<span class="sr-only">Next</span> 
				</a> 
			</div>
		</div>
		</div>
		EOF;
		return $html;
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$guide_title = $settings["guide_title"];

		$theme_dir = get_template_directory_uri();

		$parent_groups = get_terms(array(
			'taxonomy' => 'guide_group',
			'parent'        => 0,
			'hide_empty'    => false
		));
		$tabtitles = '';
		$tabcontents = '';
		$i = 0;
		foreach ($parent_groups as $a) {

			$tabtitles .= '<li class="flex-lg-fill text-center nav-item " role="presentation"> <a class="guide-tab nav-link' . ($i == 0 ? ' active' : ' ') . '" id="guide-tab-' . $i . '" data-toggle="tab" href="#guide-item-' . $i . '" role="tab" aria-controls="guide-item-' . $i . '" aria-selected="' . ($i == 0 ? 'true' : 'false') . '">' . $a->name . '</a> </li>';
			$tabcontents .= '<div class="tab-pane fade' . ($i == 0 ? ' show active' : ' ') . '" id="guide-item-' . $i . '" role="tabpanel" aria-labelledby="guide-item-' . $i . '">';
			$child_groups = get_terms(array(
				'taxonomy' => 'guide_group',
				'parent'        => $a->term_id,
				'hide_empty'    => false
			));

			if (empty($child_groups)) {
				$tabcontents .= $this->render_guide_steps($a->term_id);
			} else {
				$j = 0;
				$subtabtitles = '<ul class="nav nav-tabs tabs flex-lg-row d-none" role="tablist" id="sub-guide-tab-' . $a->term_id . '">';
				$tabcontents .= '<div class="col-md-6 col-lg-7 mb-3"><select class="selectpicker" id="select-sub-guide-tab-' . $a->term_id . '">';
				$subtabcontents = '<div class="tab-content" id="subhuongdantabContent">';
				foreach ($child_groups as $c) {
					$tabcontents .= '<option value="' . $j . '">' . $c->name . '</option>';
					$subtabtitles .= '<li class="flex-lg-fill text-center nav-item " role="presentation"> <a class="guide-tab nav-link' . ($j == 0 ? ' active' : ' ') . '" id="guide-tab-' . $i . '" data-toggle="tab" href="#sub-guide-item-' . $c->term_id . '-' . $j . '" role="tab" aria-controls="sub-guide-item-' . $c->term_id . '-' . $j . '" aria-selected="' . ($j == 0 ? 'true' : 'false') . '">' . $c->name . '</a> </li>';
					$subtabcontents .= '<div class="tab-pane fade' . ($j == 0 ? ' show active' : ' ') . '" id="sub-guide-item-' . $c->term_id . '-' . $j . '" role="tabpanel" aria-labelledby="sub-guide-item-' . $c->term_id . '-' . $j . '">';
					$subtabcontents .= $this->render_guide_steps($c->term_id);
					$subtabcontents .= '</div>';
					$j++;
				}
				$subtabtitles .= '</ul>';
				$subtabcontents .= '</div>';
				$tabcontents .= '</select></div>';
				$tabcontents .= $subtabtitles;
				$tabcontents .= $subtabcontents;
				$tabcontents .= <<<EOF
				<script>
				jQuery(document).ready(function(){
					jQuery('#select-sub-guide-tab-$a->term_id').on('change', function (e) {
						jQuery('#sub-guide-tab-$a->term_id li a').eq(jQuery(this).val()).tab('show');
						
					});
				});
				</script>
				EOF;
			}
			$tabcontents .= '</div>';
			$i++;
		}



		$html = <<<EOF
		<div class="img-left-top imgintro animation-element slide-left"><img src="$theme_dir/assets/imgs/bg-huongdan-top-left-01.png"/></div>
		<div class="sectiontittle">$guide_title</div>
		<div class="container">
			<div class="sectionbox">
			<div class="row">
				<div class="col-12 col-md-12 col-lg-12"> 
				<!--tabs-->
				<ul class="nav nav-tabs tabs flex-lg-row" id="huongdantab" role="tablist">
				$tabtitles
				</ul>
				<div class="tab-content" id="huongdantabContent">
				$tabcontents 
				</div>
				<!--endtabs--> 
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
	protected function _content_template()
	{
?>
		<div class="title">
			{{{ settings.title }}}
		</div>
<?php
	}
}
