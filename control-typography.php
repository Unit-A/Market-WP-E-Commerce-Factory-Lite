<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class Factory_Lite_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'factory-lite-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'factory-lite' ),
				'family'      => esc_html__( 'Font Family', 'factory-lite' ),
				'size'        => esc_html__( 'Font Size',   'factory-lite' ),
				'weight'      => esc_html__( 'Font Weight', 'factory-lite' ),
				'style'       => esc_html__( 'Font Style',  'factory-lite' ),
				'line_height' => esc_html__( 'Line Height', 'factory-lite' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'factory-lite' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'factory-lite-ctypo-customize-controls' );
		wp_enqueue_style(  'factory-lite-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'factory-lite' ),
        'Abril Fatface' => __( 'Abril Fatface', 'factory-lite' ),
        'Acme' => __( 'Acme', 'factory-lite' ),
        'Anton' => __( 'Anton', 'factory-lite' ),
        'Architects Daughter' => __( 'Architects Daughter', 'factory-lite' ),
        'Arimo' => __( 'Arimo', 'factory-lite' ),
        'Arsenal' => __( 'Arsenal', 'factory-lite' ),
        'Arvo' => __( 'Arvo', 'factory-lite' ),
        'Alegreya' => __( 'Alegreya', 'factory-lite' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'factory-lite' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'factory-lite' ),
        'Bangers' => __( 'Bangers', 'factory-lite' ),
        'Boogaloo' => __( 'Boogaloo', 'factory-lite' ),
        'Bad Script' => __( 'Bad Script', 'factory-lite' ),
        'Bitter' => __( 'Bitter', 'factory-lite' ),
        'Bree Serif' => __( 'Bree Serif', 'factory-lite' ),
        'BenchNine' => __( 'BenchNine', 'factory-lite' ),
        'Cabin' => __( 'Cabin', 'factory-lite' ),
        'Cardo' => __( 'Cardo', 'factory-lite' ),
        'Courgette' => __( 'Courgette', 'factory-lite' ),
        'Cherry Swash' => __( 'Cherry Swash', 'factory-lite' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'factory-lite' ),
        'Crimson Text' => __( 'Crimson Text', 'factory-lite' ),
        'Cuprum' => __( 'Cuprum', 'factory-lite' ),
        'Cookie' => __( 'Cookie', 'factory-lite' ),
        'Chewy' => __( 'Chewy', 'factory-lite' ),
        'Days One' => __( 'Days One', 'factory-lite' ),
        'Dosis' => __( 'Dosis', 'factory-lite' ),
        'Droid Sans' => __( 'Droid Sans', 'factory-lite' ),
        'Economica' => __( 'Economica', 'factory-lite' ),
        'Fredoka One' => __( 'Fredoka One', 'factory-lite' ),
        'Fjalla One' => __( 'Fjalla One', 'factory-lite' ),
        'Francois One' => __( 'Francois One', 'factory-lite' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'factory-lite' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'factory-lite' ),
        'Great Vibes' => __( 'Great Vibes', 'factory-lite' ),
        'Handlee' => __( 'Handlee', 'factory-lite' ),
        'Hammersmith One' => __( 'Hammersmith One', 'factory-lite' ),
        'Inconsolata' => __( 'Inconsolata', 'factory-lite' ),
        'Indie Flower' => __( 'Indie Flower', 'factory-lite' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'factory-lite' ),
        'Julius Sans One' => __( 'Julius Sans One', 'factory-lite' ),
        'Josefin Slab' => __( 'Josefin Slab', 'factory-lite' ),
        'Josefin Sans' => __( 'Josefin Sans', 'factory-lite' ),
        'Kanit' => __( 'Kanit', 'factory-lite' ),
        'Lobster' => __( 'Lobster', 'factory-lite' ),
        'Lato' => __( 'Lato', 'factory-lite' ),
        'Lora' => __( 'Lora', 'factory-lite' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'factory-lite' ),
        'Lobster Two' => __( 'Lobster Two', 'factory-lite' ),
        'Merriweather' => __( 'Merriweather', 'factory-lite' ),
        'Monda' => __( 'Monda', 'factory-lite' ),
        'Montserrat' => __( 'Montserrat', 'factory-lite' ),
        'Muli' => __( 'Muli', 'factory-lite' ),
        'Marck Script' => __( 'Marck Script', 'factory-lite' ),
        'Noto Serif' => __( 'Noto Serif', 'factory-lite' ),
        'Open Sans' => __( 'Open Sans', 'factory-lite' ),
        'Overpass' => __( 'Overpass', 'factory-lite' ),
        'Overpass Mono' => __( 'Overpass Mono', 'factory-lite' ),
        'Oxygen' => __( 'Oxygen', 'factory-lite' ),
        'Orbitron' => __( 'Orbitron', 'factory-lite' ),
        'Patua One' => __( 'Patua One', 'factory-lite' ),
        'Pacifico' => __( 'Pacifico', 'factory-lite' ),
        'Padauk' => __( 'Padauk', 'factory-lite' ),
        'Playball' => __( 'Playball', 'factory-lite' ),
        'Playfair Display' => __( 'Playfair Display', 'factory-lite' ),
        'PT Sans' => __( 'PT Sans', 'factory-lite' ),
        'Philosopher' => __( 'Philosopher', 'factory-lite' ),
        'Permanent Marker' => __( 'Permanent Marker', 'factory-lite' ),
        'Poiret One' => __( 'Poiret One', 'factory-lite' ),
        'Quicksand' => __( 'Quicksand', 'factory-lite' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'factory-lite' ),
        'Raleway' => __( 'Raleway', 'factory-lite' ),
        'Rubik' => __( 'Rubik', 'factory-lite' ),
        'Rokkitt' => __( 'Rokkitt', 'factory-lite' ),
        'Russo One' => __( 'Russo One', 'factory-lite' ),
        'Righteous' => __( 'Righteous', 'factory-lite' ),
        'Slabo' => __( 'Slabo', 'factory-lite' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'factory-lite' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'factory-lite'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'factory-lite' ),
        'Sacramento' => __( 'Sacramento', 'factory-lite' ),
        'Shrikhand' => __( 'Shrikhand', 'factory-lite' ),
        'Tangerine' => __( 'Tangerine', 'factory-lite' ),
        'Ubuntu' => __( 'Ubuntu', 'factory-lite' ),
        'VT323' => __( 'VT323', 'factory-lite' ),
        'Varela Round' => __( 'Varela Round', 'factory-lite' ),
        'Vampiro One' => __( 'Vampiro One', 'factory-lite' ),
        'Vollkorn' => __( 'Vollkorn', 'factory-lite' ),
        'Volkhov' => __( 'Volkhov', 'factory-lite' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'factory-lite' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'factory-lite' ),
			'100' => esc_html__( 'Thin',       'factory-lite' ),
			'300' => esc_html__( 'Light',      'factory-lite' ),
			'400' => esc_html__( 'Normal',     'factory-lite' ),
			'500' => esc_html__( 'Medium',     'factory-lite' ),
			'700' => esc_html__( 'Bold',       'factory-lite' ),
			'900' => esc_html__( 'Ultra Bold', 'factory-lite' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'factory-lite' ),
			'normal'  => esc_html__( 'Normal', 'factory-lite' ),
			'italic'  => esc_html__( 'Italic', 'factory-lite' ),
			'oblique' => esc_html__( 'Oblique', 'factory-lite' )
		);
	}
}
