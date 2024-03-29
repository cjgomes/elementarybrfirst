<?php class AboutMeWidget extends WP_Widget
{
    function AboutMeWidget(){
		$widget_ops = array( 'description' => 'Perfil do Autor' );
		$control_ops = array( 'width' => 400, 'height' => 300 );
		parent::WP_Widget( false, $name='Sobre o Autor', $widget_ops, $control_ops );
    }

	/* Displays the Widget in the front-end */
    function widget( $args, $instance ){
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? 'Sobre o Autor' : esc_html( $instance['title'] ) );
		$imagePath = empty( $instance['imagePath'] ) ? '' : esc_url( $instance['imagePath'] );
		$aboutText = empty( $instance['aboutText'] ) ? '' : $instance['aboutText'];

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title; ?>
		<div class="clearfix">
			<img src="<?php echo et_new_thumb_resize( et_multisite_thumbnail($imagePath), 74, 74, '', true ); ?>" id="about-image" alt="" />
			<?php echo( $aboutText )?>
		</div> <!-- end about me section -->
	<?php
		echo $after_widget;
	}

	/*Saves the settings. */
    function update( $new_instance, $old_instance ){
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['imagePath'] = esc_url( $new_instance['imagePath'] );
		$instance['aboutText'] = current_user_can('unfiltered_html') ? $new_instance['aboutText'] : stripslashes( wp_filter_post_kses( addslashes($new_instance['aboutText']) ) );

		return $instance;
	}

	/*Creates the form for the widget in the back-end. */
    function form( $instance ){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title'=>'Sobre o Autor', 'imagePath'=>'', 'aboutText'=>'' ) );

		$title = esc_attr( $instance['title'] );
		$imagePath = esc_url( $instance['imagePath'] );
		$aboutText = esc_textarea( $instance['aboutText'] );

		# Title
		echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Título:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
		# Image
		echo '<p><label for="' . $this->get_field_id('imagePath') . '">' . 'Imagem:' . '</label><textarea cols="20" rows="2" class="widefat" id="' . $this->get_field_id('imagePath') . '" name="' . $this->get_field_name('imagePath') . '" >'. $imagePath .'</textarea></p>';
		# About Text
		echo '<p><label for="' . $this->get_field_id('aboutText') . '">' . 'Texto:' . '</label><textarea cols="20" rows="5" class="widefat" id="' . $this->get_field_id('aboutText') . '" name="' . $this->get_field_name('aboutText') . '" >'. $aboutText .'</textarea></p>';
	}

}// end AboutMeWidget class

function AboutMeWidgetInit() {
	register_widget('AboutMeWidget');
}

add_action('widgets_init', 'AboutMeWidgetInit'); ?>