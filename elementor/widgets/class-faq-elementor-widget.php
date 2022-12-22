<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Elementor\core\Schemes;

class Restho_Faq_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'restho_faq';
    }

    public function get_title()
    {
        return esc_html__('EG FAQ', 'restho-core');
    }

    public function get_icon()
    {
        return 'eicon-accordion';
    }

    public function get_categories()
    {
        return ['restho_widgets'];
    }

    protected function register_controls()
    {
        //-------------Content-------------------//

        $this->start_controls_section(
            'restho_section_content_faq',
            [
                'label' => esc_html__('FAQ', 'restho-core')
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'restho_section_content_faq_title',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Curious about how to build your?', 'restho-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'restho_section_content_faq_description',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 15,
                'default' => esc_html__("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightl", 'restho-core'),
                'placeholder' => esc_html__('Type your description here', 'restho-core'),
            ]
        );

        $this->add_control(
            'restho_faq_section_list',
            [
                'label' => esc_html__('FAQ Lists', 'restho-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'restho_section_content_faq_title' => esc_html__('If you are going to use a passage of need ?', 'restho-core'),
                    ],

                ],
                'title_field' => '{{{ restho_section_content_faq_title }}}',
            ]
        );

        $this->end_controls_section();


        //General Style Section Start
        $this->start_controls_section(
            'restho_faq_style_general_section',
            [
                'label' => esc_html__('General', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_faq_style_icon_color',
            [
                'label' => esc_html__('Icon Color', 'restho-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-area .accordion .accordion-item .accordion-header .accordion-button::after' => 'color: {{VALUE}};border:1px solid {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'restho_faq_style_bg_color',
            [
                'label'     => esc_html__('Background Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-area .accordion .accordion-item .accordion-header .accordion-button' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .faq-area .accordion .accordion-item .accordion-header .accordion-button:not(.collapsed)' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .faq-area .accordion .accordion-item .accordion-collapse' => 'background: {{VALUE}}',


                ],
            ]
        );
        $this->end_controls_section();

        //Title Style Section Start
        $this->start_controls_section(
            'restho_faq_style_title_section',
            [
                'label' => esc_html__('Title', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_faq_style_title_color',
            [
                'label'     => esc_html__('Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-area .accordion .accordion-item .accordion-header .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_faq_style_title_typography',
                'selector' => '{{WRAPPER}} .faq-area .accordion .accordion-item .accordion-header .accordion-button',

            ]
        );
        $this->end_controls_section();

        //Description Style Section Start
        $this->start_controls_section(
            'restho_faq_style_description_section',
            [
                'label' => esc_html__('Description', 'restho-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'restho_faq_style_description_color',
            [
                'label'     => esc_html__('Text Color', 'restho-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-area .accordion .accordion-item .accordion-collapse .accordion-body' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'restho-core'),
                'name'     => 'restho_faq_style_description_typography',
                'selector' => '{{WRAPPER}} .faq-area .accordion .accordion-item .accordion-collapse .accordion-body',

            ]
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $faqlists = $settings['restho_faq_section_list'];
?>
       <div class="faq-area">
            <div class="accordion" id="accordionExample">
                <?php if (!empty($faqlists)) :   ?>
                    <?php 
                        $i = 0;
                        foreach ($faqlists as $key => $item) :
                        $i++;
                        ?>
                        <div class="accordion-item">
                            <?php if (!empty($item['restho_section_content_faq_title'])) : ?>
                                <h2 class="accordion-header" id="heading<?php echo $key; ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key; ?>" aria-expanded="false" aria-controls="collapse<?php echo $key; ?>">
                                        <?php echo esc_html($item['restho_section_content_faq_title']) ?>
                                    </button>
                                </h2>
                            <?php endif ?>
                            <div id="collapse<?php echo $key; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $key; ?>" data-bs-parent="#accordionExample" style="">
                                <?php if (!empty($item['restho_section_content_faq_description'])) : ?>
                                    <div class="accordion-body">
                                        <?php echo esc_html($item['restho_section_content_faq_description']) ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
            
        
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Restho_Faq_Widget());