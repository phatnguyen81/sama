<?php
if (!class_exists('Smartpay_Theme_Options')) {

    /* class Smartpay_Theme_Options sẽ chứa toàn bộ code tạo options trong theme từ Redux Framework */
    class Smartpay_Theme_Options
    {
        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct()
        {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (true == Redux_Helpers::isTheme(__FILE__)) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }
        }

        public function initSettings()
        {

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public function setArguments()
        {
            $theme = wp_get_theme(); // Lưu các đối tượng trả về bởi hàm wp_get_theme() vào biến $theme để làm một số việc tùy thích.
            $this->args = array(
                // Các thiết lập cho trang Options
                'opt_name'  => 'smartpay_options', // Tên biến trả dữ liệu của từng options, ví dụ: tp_options['field_1']
                'display_name' => $theme->get('Name'), // Thiết lập tên theme hiển thị trong Theme Options
                'menu_type'          => 'menu',
                'allow_sub_menu'     => true,
                'menu_title'         => __('Smartpay Theme Options', 'smartpay'),
                'page_title'         => __('Smartpay Theme Options', 'smartpay'),
                'dev_mode' => false,
                'customizer' => true,
                'menu_icon' => '', // Đường dẫn icon của menu option
                // Chức năng Hint tạo dấu chấm hỏi ở mỗi option để hướng dẫn người dùng */
                'hints'              => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'   => 'light',
                        'shadow'  => true,
                        'rounded' => false,
                        'style'   => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show' => array(
                            'effect'   => 'slide',
                            'duration' => '500',
                            'event'    => 'mouseover',
                        ),
                        'hide' => array(
                            'effect'   => 'slide',
                            'duration' => '500',
                            'event'    => 'click mouseleave',
                        ),
                    ),
                ) // end Hints
            );
        }
        public function setHelpTabs()
        {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'      => 'redux-help-tab-1',
                'title'   => __('Theme Information 1', 'smartpay'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'smartpay')
            );

            $this->args['help_tabs'][] = array(
                'id'      => 'redux-help-tab-2',
                'title'   => __('Theme Information 2', 'smartpay'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'smartpay')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'smartpay');
        }
        public function setSections()
        {

            // Home Section
            $this->sections[] = array(
                'title'  => __('General', 'smartpay'),
                'desc'   => __('All of settings for header on this theme.', 'smartpay'),
                'icon'   => 'el-icon-home',
                'fields' => array(
                    // Mỗi array là một field
                 
                    array(
                        'id'       => 'video-landingpage',
                        'type'     => 'media',
                        'title'    => __( 'Banner video', 'smartpay' ),
                        'library_filter' => array('mp4', 'm4v','webm', 'mkv'),
                        'mode' => false,
                        'preview' => false,
                        'url' => true,
                        'desc'     => __( 'Video ở trang landing page', 'smartpay' ),
                    ),
                    array(
                        'id'       => 'video-gioithieu',
                        'type'     => 'media',
                        'title'    => __( 'Video giới thiệu', 'smartpay' ),
                        'library_filter' => array('mp4','m4v','webm', 'mkv'),
                        'mode' => false,
                        'preview' => false,
                        'url' => true,
                        'desc'     => __( 'Video ở phần giới thiệu', 'smartpay' ),
                    ),
                    array(
                        'id'       => 'playnow-url',
                        'type'     => 'text',
                        'title'    => __( 'Chơi ngày URL', 'smartpay' ),
                        'desc'     => __( 'Link chơi ngay', 'smartpay   ' ),
                    ),
                )
            ); // end section

        }
        /* Kích hoạt class Smartpay_Theme_Options vào Redux Framework */
    }
    global $reduxConfig;
    $reduxConfig = new Smartpay_Theme_Options();
}
