<?
class ET_Builder_Module_Extended_CTA extends ET_Builder_Module {
	function init() {
		$this->name       = esc_html__( 'Call To Action', 'et_builder' );
		$this->slug       = 'et_pb_cta';
		$this->fb_support = true;

		$this->whitelisted_fields = array(
			'title',
			'button_url_1',
			'url_new_window_1',
			'button_text_1',
			'button_url_2',
			'url_new_window_2',
			'button_text_2',
			'use_background_color',
			'background_color',
			'background_layout',
			'text_orientation',
			'content_new',
			'admin_label',
			'module_id',
			'module_class',
			'max_width',
			'max_width_tablet',
			'max_width_phone',
		);

		$this->fields_defaults = array(
			'url_new_window_1'       => array( 'off' ),
			'use_background_color' => array( 'on' ),
			'background_color'     => array( et_builder_accent_color(), 'add_default_setting' ),
			'background_layout'    => array( 'dark' ),
			'text_orientation'     => array( 'center' ),
		);

		$this->main_css_element = '%%order_class%%.et_pb_promo';
		$this->advanced_options = array(
			'fonts' => array(
				'header' => array(
					'label'    => esc_html__( 'Header', 'et_builder' ),
					'css'      => array(
						'main' => "{$this->main_css_element} h2",
						'important' => 'all',
					),
				),
				'body'   => array(
					'label'    => esc_html__( 'Body', 'et_builder' ),
					'css'      => array(
						'line_height' => "{$this->main_css_element} p",
					),
				),
			),
			'background' => array(
				'use_background_color' => false,
			),
			'border' => array(),
			'custom_margin_padding' => array(
				'css' => array(
					'important' => 'all',
				),
			),
			'button' => array(
				'button' => array(
					'label' => esc_html__( 'Button', 'et_builder' ),
				),
			),
		);
		$this->custom_css_options = array(
			'promo_description' => array(
				'label'    => esc_html__( 'Promo Description', 'et_builder' ),
				'selector' => '.et_pb_promo_description',
			),
			'promo_button' => array(
				'label'    => esc_html__( 'Promo Button', 'et_builder' ),
				'selector' => '.et_pb_promo .et_pb_button.et_pb_promo_button',
				'no_space_before_selector' => true,
			),
			'promo_title' => array(
				'label'    => esc_html__( 'Promo Title', 'et_builder' ),
				'selector' => '.et_pb_promo_description h2',
			),
		);
	}

	function get_fields() {
		$fields = array(
			'title' => array(
				'label'           => esc_html__( 'Title', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your value to action title here.', 'et_builder' ),
			),
			'button_url_1' => array(
				'label'           => esc_html__( 'Button 1 URL', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input the destination URL for your first CTA button.', 'et_builder' ),
			),
			'url_new_window_1' => array(
				'label'           => esc_html__( 'Url 1 Opens', 'et_builder' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'et_builder' ),
					'on'  => esc_html__( 'In The New Tab', 'et_builder' ),
				),
				'description'       => esc_html__( 'Here you can choose whether or not your first link opens in a new window', 'et_builder' ),
			),
			'button_text_1' => array(
				'label'           => esc_html__( 'Button Text 1', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired button (#1) text, or leave blank for no button.', 'et_builder' ),
			),
			'button_url_2' => array(
				'label'           => esc_html__( 'Button 2 URL', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input the destination URL for your CTA button.', 'et_builder' ),
			),
			'url_new_window_2' => array(
				'label'           => esc_html__( 'Url 2 Opens', 'et_builder' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'et_builder' ),
					'on'  => esc_html__( 'In The New Tab', 'et_builder' ),
				),
				'description'       => esc_html__( 'Here you can choose whether or not your second link opens in a new window', 'et_builder' ),
			),
			'button_text_2' => array(
				'label'           => esc_html__( 'Button Text', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired button (#2) text, or leave blank for no button.', 'et_builder' ),
			),
			'use_background_color' => array(
				'label'           => esc_html__( 'Use Background Color', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'color_option',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'affects'           => array(
					'background_color',
				),
				'description'        => esc_html__( 'Here you can choose whether background color setting below should be used or not.', 'et_builder' ),
			),
			'background_color' => array(
				'label'             => esc_html__( 'Background Color', 'et_builder' ),
				'type'              => 'color-alpha',
				'depends_default'   => true,
				'description'       => esc_html__( 'Here you can define a custom background color for your CTA.', 'et_builder' ),
			),
			'background_layout' => array(
				'label'           => esc_html__( 'Text Color', 'et_builder' ),
				'type'            => 'select',
				'option_category' => 'color_option',
				'options'         => array(
					'dark'  => esc_html__( 'Light', 'et_builder' ),
					'light' => esc_html__( 'Dark', 'et_builder' ),
				),
				'description' => esc_html__( 'Here you can choose whether your text should be light or dark. If you are working with a dark background, then your text should be light. If your background is light, then your text should be set to dark.', 'et_builder' ),
			),
			'text_orientation' => array(
				'label'             => esc_html__( 'Text Orientation', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => et_builder_get_text_orientation_options(),
				'description'       => esc_html__( 'This will adjust the alignment of the module text.', 'et_builder' ),
			),
			'content_new' => array(
				'label'           => esc_html__( 'Content', 'et_builder' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input the main text content for your module here.', 'et_builder' ),
			),
			'max_width' => array(
				'label'           => esc_html__( 'Max Width', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'mobile_options'  => true,
				'validate_unit'   => true,
			),
			'max_width_tablet' => array(
				'type'     => 'skip',
				'tab_slug' => 'advanced',
			),
			'max_width_phone' => array(
				'type'     => 'skip',
				'tab_slug' => 'advanced',
			),
			'disabled_on' => array(
				'label'           => esc_html__( 'Disable on', 'et_builder' ),
				'type'            => 'multiple_checkboxes',
				'options'         => array(
					'phone'   => esc_html__( 'Phone', 'et_builder' ),
					'tablet'  => esc_html__( 'Tablet', 'et_builder' ),
					'desktop' => esc_html__( 'Desktop', 'et_builder' ),
				),
				'additional_att'  => 'disable_on',
				'option_category' => 'configuration',
				'description'     => esc_html__( 'This will disable the module on selected devices', 'et_builder' ),
			),
			'admin_label' => array(
				'label'       => esc_html__( 'Admin Label', 'et_builder' ),
				'type'        => 'text',
				'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'et_builder' ),
			),
			'module_id' => array(
				'label'           => esc_html__( 'CSS ID', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'module_class' => array(
				'label'           => esc_html__( 'CSS Class', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'option_class'    => 'et_pb_custom_css_regular',
			),
		);
		return $fields;
	}

	function shortcode_callback( $atts, $content = null, $function_name ) {
		$module_id            = $this->shortcode_atts['module_id'];
		$module_class         = $this->shortcode_atts['module_class'];
		$title                = $this->shortcode_atts['title'];
		$button_url_1_1           = $this->shortcode_atts['button_url_1_1'];
		$button_text_1          = $this->shortcode_atts['button_text_1'];
		$background_color     = $this->shortcode_atts['background_color'];
		$background_layout    = $this->shortcode_atts['background_layout'];
		$text_orientation     = $this->shortcode_atts['text_orientation'];
		$use_background_color = $this->shortcode_atts['use_background_color'];
		$url_new_window_1       = $this->shortcode_atts['url_new_window_1'];
		$max_width            = $this->shortcode_atts['max_width'];
		$max_width_tablet     = $this->shortcode_atts['max_width_tablet'];
		$max_width_phone      = $this->shortcode_atts['max_width_phone'];
		$custom_icon          = $this->shortcode_atts['button_icon'];
		$button_custom        = $this->shortcode_atts['custom_button'];

		$module_class = ET_Builder_Element::add_module_order_class( $module_class, $function_name );

		if ( is_rtl() && 'left' === $text_orientation ) {
			$text_orientation = 'right';
		}

		if ( '' !== $max_width_tablet || '' !== $max_width_phone || '' !== $max_width ) {
			$max_width_values = array(
				'desktop' => $max_width,
				'tablet'  => $max_width_tablet,
				'phone'   => $max_width_phone,
			);

			$additional_css = 'center' === $text_orientation ? '; margin: 0 auto;' : '';

			et_pb_generate_responsive_css( $max_width_values, '%%order_class%%', 'max-width', $function_name, $additional_css );
		}

		$class = " et_pb_module et_pb_bg_layout_{$background_layout} et_pb_text_align_{$text_orientation}";

		$output = sprintf(
			'<div%6$s class="et_pb_promo%4$s%7$s%8$s"%5$s>
				<div class="et_pb_promo_description">
					%1$s
					%2$s
				</div>
				%3$s
			</div>',
			( '' !== $title ? '<h2>' . esc_html( $title ) . '</h2>' : '' ),
			$this->shortcode_content,
			(
				'' !== $button_url_1 && '' !== $button_text_1
					? sprintf( '<a class="et_pb_promo_button et_pb_button%5$s" href="%1$s"%3$s%4$s>%2$s</a>',
						esc_url( $button_url_1 ),
						esc_html( $button_text_1 ),
						( 'on' === $url_new_window_1 ? ' target="_blank"' : '' ),
						'' !== $custom_icon && 'on' === $button_custom ? sprintf(
							' data-icon="%1$s"',
							esc_attr( et_pb_process_font_icon( $custom_icon ) )
						) : '',
						'' !== $custom_icon && 'on' === $button_custom ? ' et_pb_custom_button_icon' : ''
					)
					: ''
			),
			esc_attr( $class ),
			( 'on' === $use_background_color
				? sprintf( ' style="background-color: %1$s;"', esc_attr( $background_color ) )
				: ''
			),
			( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
			( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' ),
			( 'on' !== $use_background_color ? ' et_pb_no_bg' : '' )
		);

		return $output;
	}
}
new ET_Builder_Module_Extended_CTA;
?>