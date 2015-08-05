<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://lostwebdesigns.com
 * @since      1.0.0
 *
 * @package    Wp_Cbf
 * @subpackage Wp_Cbf/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">

	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

	<h2 class="nav-tab-wrapper">Clean up</h2>

	<form method="post" name="cleanup_options" action="options.php">

	<?php
	//Grab all options

		$options = get_option($this->plugin_name);

		// Cleanup
		$cleanup = $options['cleanup'];
		$comments_css_cleanup = $options['comments_css_cleanup'];
		$gallery_css_cleanup = $options['gallery_css_cleanup'];
		$body_class_slug = $options['body_class_slug'];
		$jquery_cdn = $options['jquery_cdn'];
		$cdn_provider = $options['cdn_provider'];
	?>


	<?php
		settings_fields( $this->plugin_name );
		do_settings_sections( $this->plugin_name );
	?>

	<!-- remove some meta and generators from the <head> -->
	<fieldset>
		<legend class="screen-reader-text"><span>Clean WordPress head section</span></legend>
		<label for="<?php echo $this->plugin_name;?>-cleanup">
			<input type="checkbox" id="<?php echo $this->plugin_name;?>-cleanup" name="<?php echo $this->plugin_name;?>[cleanup]" value="1" <?php checked( $cleanup, 1 ); ?> />
			<span><?php esc_attr_e( 'Clean up the head section', $this->plugin_name ); ?></span>
		</label>
	</fieldset>

	<!-- remove injected CSS from comments widgets -->
	<fieldset>
		<legend class="screen-reader-text"><span>Remove Injected CSS for comment widget</span></legend>
		<label for="<?php echo $this->plugin_name;?>-comments_css_cleanup">
			<input type="checkbox" id="<?php echo $this->plugin_name;?>-comments_css_cleanup" name="<?php echo $this->plugin_name;?>[comments_css_cleanup]" value="1" <?php checked( $comments_css_cleanup, 1 ); ?> />
			<span><?php esc_attr_e( 'Remove Injected CSS for comment widget', $this->plugin_name ); ?></span>
		</label>
	</fieldset>

	<!-- remove injected CSS from gallery -->
	<fieldset>
		<legend class="screen-reader-text"><span>Remove Injected CSS for galleries</span></legend>
		<label for="<?php echo $this->plugin_name;?>-gallery_css_cleanup">
			<input type="checkbox" id="<?php echo $this->plugin_name;?>-gallery_css_cleanup" name="<?php echo $this->plugin_name;?>[gallery_css_cleanup]" value="1" <?php checked( $gallery_css_cleanup, 1 ); ?>  />
			<span><?php esc_attr_e( 'Remove Injected CSS for galleries', $this->plugin_name ); ?></span>
		</label>
	</fieldset>

	<!-- add post,page or product slug class to body class -->
	<fieldset>
		<legend class="screen-reader-text"><span><?php _e('Add Post, page or product slug to body class', $this->plugin_name);?></span></legend>
		<label for="<?php echo $this->plugin_name;?>-body_class_slug">
			<input type="checkbox" id="<?php echo $this->plugin_name;?>-body_class_slug" name="<?php echo $this->plugin_name;?>[body_class_slug]" value="1" <?php checked( $body_class_slug, 1 ); ?>  />
			<span><?php esc_attr_e('Add Post slug to body class', $this->plugin_name);?></span>
		</label>
	</fieldset>

	<!-- load jQuery from CDN -->
	<fieldset>
		<legend class="screen-reader-text"><span><?php _e('Load jQuery from CDN instead of the basic wordpress script', $this->plugin_name);?></span></legend>
		<label for="<?php echo $this->plugin_name;?>-jquery_cdn">
			<input type="checkbox"  id="<?php echo $this->plugin_name;?>-jquery_cdn" name="<?php echo $this->plugin_name;?>[jquery_cdn]" value="1" <?php checked($jquery_cdn,1);?>/>
			<span><?php esc_attr_e('Load jQuery from CDN', $this->plugin_name);?></span>
		</label>
                <fieldset>
                    <p>You can choose your own cdn provider and jQuery version(default will be Google Cdn and version 1.11.1)-Recommended CDN are <a href="https://cdnjs.com/libraries/jquery">CDNjs</a>, <a href="https://code.jquery.com/jquery/">jQuery official CDN</a>, <a href="https://developers.google.com/speed/libraries/#jquery">Google CDN</a> and <a href="http://www.asp.net/ajax/cdn#jQuery_Releases_on_the_CDN_0">Microsoft CDN</a></p>
                    <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name);?></span></legend>
                    <input type="url" class="regular-text" id="<?php echo $this->plugin_name;?>-cdn_provider" name="<?php echo $this->plugin_name;?>[cdn_provider]" value="<?php if(!empty($cdn_provider)) echo $cdn_provider;?>"/>
                </fieldset>
	</fieldset>



            <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

    </form>

</div>
