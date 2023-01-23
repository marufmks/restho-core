<?php

//Post tags custom widget
class Egns_Address extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            //Base ID of our widget
            'egns_address',

            //Widget name
            __('Egns Address', 'restho-core'),

            //Widget description
            array('description' => __('Egns Footer Address', 'restho-core'),)
        );
    }

    public function widget($args, $instance)
    {

        echo $args['before_widget'];
?>
        <div class="footer-widget one">
            <div class="widget-title">
                <?php if (!empty($instance['heading_title'])) : ?>
                    <h3><?php echo  esc_html(__($instance['heading_title'], 'restho-core')); ?></h3>
                <?php endif; ?>
            </div>
            <div class="contact-info">
                <div class="single-contact">
                    <span class="title"><?php echo esc_html__('Phone:', 'restho-core') ?></span>
                    <?php if (!empty($instance['contact_number'])) : ?>
                        <span class="content"><a href="tel:<?php echo  esc_html($instance['contact_number'], 'restho-core') ?>"><?php echo  esc_html(__($instance['contact_number'], 'restho-core')); ?></a></span>
                    <?php endif; ?>
                </div>
                <div class="single-contact">
                    <span class="title"><?php echo esc_html__('Email:', 'restho-core') ?></span>
                    <?php if (!empty($instance['email_address'])) : ?>
                        <span class="content"><a href="<?php echo  esc_url('mailto:' . $instance['email_address']) ?>"><?php echo  esc_html(__($instance['email_address'], 'restho-core')); ?></a></span>
                    <?php endif; ?>
                </div>
                <div class="single-contact">
                    <span class="title"><?php echo esc_html__('Fax ID:', 'restho-core') ?></span>
                    <?php if (!empty($instance['fax_number'])) : ?>
                        <span class="content"><a href="tel:<?php echo  esc_html($instance['fax_number'], 'restho-core') ?>"><?php echo  esc_html(__($instance['fax_number'], 'restho-core')); ?></a></span>
                    <?php endif; ?>
                </div>
                <div class="single-contact">
                    <span class="title"><?php echo esc_html__('Location:', 'restho-core') ?></span>
                    <?php if (!empty($instance['address'] )) : ?>
                        <span class="content"><a href="<?php echo esc_html($instance['address_link']) ?>"><?php echo wp_kses($instance['address'], wp_kses_allowed_html('post')); ?></a></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php
        echo $args['after_widget'];
    }

    //Widget Backend
    public function form($instance)
    {
       
        $heading_title = '';
        if (isset($instance['heading_title'])) {
            $heading_title = $instance['heading_title'];
        }
        $contact_number = '';
        if (isset($instance['contact_number'])) {
            $contact_number = $instance['contact_number'];
        }
        $email_address = '';
        if (isset($instance['email_address'])) {
            $email_address = $instance['email_address'];
        }
        $fax_number = '';
        if (isset($instance['fax_number'])) {
            $fax_number = $instance['fax_number'];
        }

        $address_link = '';
        if (isset($instance['address_link'])) {
            $address_link = $instance['address_link'];
        }

        $address = '';
        if (isset($instance['address'])) {
            $address = $instance['address'];
        }

    ?>

        <p>
            <label for="<?php echo $this->get_field_id('heading_title'); ?>"><?php _e('Title:', 'restho-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('heading_title'); ?>" name="<?php echo $this->get_field_name('heading_title'); ?>" type="text" value="<?php echo esc_attr($heading_title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('contact_number'); ?>"><?php _e('Phone Number:', 'restho-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('contact_number'); ?>" name="<?php echo $this->get_field_name('contact_number'); ?>" type="text" value="<?php echo esc_attr($contact_number); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('email_address'); ?>"><?php _e('Email:', 'restho-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email_address'); ?>" name="<?php echo $this->get_field_name('email_address'); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('fax_number'); ?>"><?php _e('Fax ID:', 'restho-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('fax_number'); ?>" name="<?php echo $this->get_field_name('fax_number'); ?>" type="text" value="<?php echo esc_attr($fax_number); ?>" />
        </p>


        <p>
            <label for="<?php echo $this->get_field_id('address_link'); ?>"><?php _e('Address link:', 'restho-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('address_link'); ?>" name="<?php echo $this->get_field_name('address_link'); ?>" type="text" value="<?php echo esc_attr($address_link); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:', 'restho-core'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo esc_attr($address); ?>" />
        </p>


<?php
    }

    //Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['heading_title'] = (!empty($new_instance['heading_title'])) ? strip_tags($new_instance['heading_title']) : '';
        $instance['contact_number'] = (!empty($new_instance['contact_number'])) ? strip_tags($new_instance['contact_number']) : '';
        $instance['fax_number'] = (!empty($new_instance['fax_number'])) ? strip_tags($new_instance['fax_number']) : '';
        $instance['email_address'] = (!empty($new_instance['email_address'])) ? strip_tags($new_instance['email_address']) : '';
        $instance['address_link'] = (!empty($new_instance['address_link'])) ? strip_tags($new_instance['address_link']) : '';
        $instance['address'] = (!empty($new_instance['address'])) ? strip_tags($new_instance['address']) : '';
        return $instance;
    }
}
if (!function_exists('Egns_Address')) {
    function Egns_Address()
    {
        register_widget('Egns_Address');
    }
    add_action('widgets_init', 'Egns_Address');
}
