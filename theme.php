<?php if ( !defined( 'HABARI_PATH' ) ) { die( 'No direct access' ); }

class html5BoilerplateTheme extends Theme
{
	/**
	 * Execute on theme init to apply these filters to output
	 */
	public function action_init_theme()
	{
		// Apply Format::autop() to comment content...
		Format::apply( 'autop', 'comment_content_out' );
		// Truncate content excerpt at "more" or 56 characters...
		Format::apply( 'autop', 'post_content_excerpt' );
		Format::apply_with_hook_params( 'more', 'post_content_excerpt', '', 56, 1 );
	}

	/**
	 * On theme activation, do the following
	 */
	public function action_theme_activation( )
	{
		// Add activation actions here
	}

	/**
	 * On theme de-activation, do the following
	 */
	public function action_theme_deactivation() 
	{
		// Add deactivation actions here
	}

	/**
	 * Is this theme configurable?
	 */
	public function filter_theme_config( $configurable )
	{
		$configurable = true;
		return $configurable;
	}

	/**
	 * Present a configuration form for the theme. 
	 * 
	 * Add FormUI elements as you need them.
	 * 
	 * This is only shown if filter_theme_config() has $configurable = true.
	 */
	public function action_theme_ui( $theme )
	{
		$ui = new FormUI( strtolower( __CLASS__ ) );
		$ui->append( 'text', 'analytics_id', __CLASS__ . 'analytics_id', _t( 'Google Analytics Site ID (UA-XXXXX-X)') );

		// Save
		$ui->append( 'submit', 'save', _t( 'Save' ) );
		$ui->set_option( 'success_message', _t( 'Options saved' ) );
		$ui->out();
	}

	/**
	 * Add some variables to the template output
	 */
	public function action_add_template_vars( $theme, $handler_vars )
	{
		if ( !$this->template_engine->assigned( 'pages' ) ) {
            $this->assign('pages', Posts::get( array( 'content_type' => 'page', 'status' => Post::status( 'published' ), 'nolimit' => 1 ) ) );
        }
        if ( !$this->template_engine->assigned( 'user' ) ) {
            $this->assign('user', User::identify() );
        }
		if ( !$this->template_engine->assigned( 'loggedin' ) ) {
            $this->assign('loggedin', User::identify()->loggedin );
        }

		// Add the stylesheets
		Stack::add( 'template_stylesheet', array( Site::get_url( 'theme' ) . '/css/style.css', 'screen' ), 'style' );
		
		// Add javascript support files
		/* All JavaScript at the bottom, except for Modernizr and Respond.
	       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
	       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ */
		// Javascript in the header
		Stack::add( 'template_header_javascript', Site::get_url( 'theme' ) . '/js/libs/modernizr-2.0.min.js', 'modernizr' );
		Stack::add( 'template_header_javascript', Site::get_url( 'theme' ) . '/js/libs/respond.min.js', 'respond' );
		
		// Javascript in the footer
		// Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline
		Stack::add( 'template_footer_javascript', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js', 'jquery' );
		Stack::add( 'template_footer_javascript', 'window.jQuery || document.write(\'<script src="js/libs/jquery-1.6.1.min.js"><\/script>\')', 'jq_fallback', 'jquery' );
		
		// Scripts concatenated and minified via ant build script 
		Stack::add( 'template_footer_javascript', array( Site::get_url( 'theme' ) . '/js/plugins.js', 'async' ), 'jq_plugins', 'jq_fallback' );
		Stack::add( 'template_footer_javascript', array( Site::get_url( 'theme' ) . '/js/script.js', 'async' ), 'jq_scripts', 'jq_fallback' );
				
	}
		
}
?>
