<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class EdgeTwitterWidget extends WP_Widget {
	private $params;
	
	public function __construct() {
		parent::__construct(
			'edge_twitter_widget',
			esc_html__( 'Edge Twitter Widget', 'edge-twitter-feed' ),
			array(
				'description' => esc_html__( 'Display your Twitter feed', 'edge-twitter-feed' )
			)
		);
		
		$this->setParams();
	}
	
	private function setParams() {
		$this->params = array(
			array(
				'name'  => 'title',
				'type'  => 'textfield',
				'title' => esc_html__( 'Title', 'edge-twitter-feed' )
			),
			array(
				'name'    => 'type_of_widget',
				'type'    => 'dropdown',
				'title'   => esc_html__( 'Type', 'edge-twitter-feed' ),
				'options' => array(
					'standard' => esc_html__( 'Standard', 'edge-twitter-feed' ),
					'slider'   => esc_html__( 'Slider', 'edge-twitter-feed' )
				)
			),
			array(
				'name'  => 'user_id',
				'type'  => 'textfield',
				'title' => esc_html__( 'User ID', 'edge-twitter-feed' )
			),
			array(
				'name'  => 'count',
				'type'  => 'textfield',
				'title' => esc_html__( 'Number of Tweets', 'edge-twitter-feed' )
			),
			array(
				'name'    => 'show_tweet_icon',
				'type'    => 'dropdown',
				'title'   => esc_html__( 'Show Tweet Icon', 'edge-twitter-feed' ),
				'options' => array(
					'yes' => esc_html__( 'Yes', 'edge-twitter-feed' ),
					'no'  => esc_html__( 'No', 'edge-twitter-feed' )
				)
			),
			array(
				'name'    => 'show_tweet_time',
				'type'    => 'dropdown',
				'title'   => esc_html__( 'Show Tweet Time', 'edge-twitter-feed' ),
				'options' => array(
					'no'  => esc_html__( 'No', 'edge-twitter-feed' ),
					'yes' => esc_html__( 'Yes', 'edge-twitter-feed' )
				)
			),
			array(
				'name'  => 'transient_time',
				'type'  => 'textfield',
				'title' => esc_html__( 'Tweets Cache Time', 'edge-twitter-feed' )
			)
		);
	}
	
	public function form( $instance ) {
		foreach ( $this->params as $param_array ) {
			$param_name    = $param_array['name'];
			${$param_name} = isset( $instance[ $param_name ] ) ? esc_attr( $instance[ $param_name ] ) : '';
		}
		
		foreach ( $this->params as $param ) {
			switch ( $param['type'] ) {
				case 'textfield':
					?>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( $param['name'] ) ); ?>"><?php echo esc_html( $param['title'] ); ?></label>
						<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $param['name'] ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $param['name'] ) ); ?>" type="text" value="<?php echo esc_attr( ${$param['name']} ); ?>"/>
					</p>
					<?php
					break;
				case 'dropdown':
					?>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( $param['name'] ) ); ?>"><?php echo esc_html( $param['title'] ); ?></label>
						<?php if ( isset( $param['options'] ) && is_array( $param['options'] ) && count( $param['options'] ) ) { ?>
							<select class="widefat" name="<?php echo esc_attr( $this->get_field_name( $param['name'] ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( $param['name'] ) ); ?>">
								<?php foreach ( $param['options'] as $param_option_key => $param_option_val ) {
									$option_selected = '';
									if ( ${$param['name']} == $param_option_key ) {
										$option_selected = 'selected';
									}
									?>
									<option <?php echo esc_attr( $option_selected ); ?> value="<?php echo esc_attr( $param_option_key ); ?>"><?php echo esc_attr( $param_option_val ); ?></option>
								<?php } ?>
							</select>
						<?php } ?>
					</p>
					
					<?php
					break;
			}
		}
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		foreach ( $this->params as $param ) {
			$param_name = $param['name'];
			
			$instance[ $param_name ] = sanitize_text_field( $new_instance[ $param_name ] );
		}
		
		return $instance;
	}
	
	public function widget( $args, $instance ) {
		extract( $instance );

		echo adorn_edge_get_module_part($args['before_widget']);
		
		if ( ! empty( $title ) ) {
			echo adorn_edge_get_module_part($args['before_title'] . $title . $args['after_title']);
		}
		
		$user_id        = ! empty( $user_id ) ? $user_id : '';
		$count          = ! empty( $count ) ? $count : '';
		$transient_time = ! empty( $transient_time ) ? $transient_time : 0;
		
		$twitter_style = ( $show_tweet_icon != 'yes' ) ? 'padding: 0;' : '';
		
		$type_of_widget = ! empty( $type_of_widget ) ? $type_of_widget : 'standard';
		
		$holder_classes = 'edge-twitter-' . esc_attr( $type_of_widget );
		$slider_data    = array();
		
		if ( $type_of_widget === 'slider' ) {
			$holder_classes .= ' edge-owl-slider';
			$slider_data['data-enable-pagination'] = 'yes';
		}
		
		$twitter_api = EdgeTwitterApi::getInstance();
		
		if ( $twitter_api->hasUserConnected() ) {
			$response = $twitter_api->fetchTweets( $user_id, $count, array(
				'transient_time' => $transient_time,
				'transient_id'   => 'edge_twitter_' . $args['widget_id']
			) );
			
			if ( $response->status ) {
				if ( is_array( $response->data ) && count( $response->data ) ) { ?>
					<ul class="edge-twitter-widget <?php echo esc_attr( $holder_classes ); ?>" <?php echo adorn_edge_get_inline_attrs( $slider_data ); ?>>
						<?php foreach ( $response->data as $tweet ) { ?>
							
							<?php if ( $type_of_widget == 'slider' ) { ?>
								
								<li class="edge-tweet-holder">
									<div class="edge-tweet-text" <?php adorn_edge_inline_style( $twitter_style ); ?>>
										<?php echo wp_kses_post( $twitter_api->getHelper()->getTweetText( $tweet ) ); ?>
										<?php if ( $show_tweet_time == 'yes' ) { ?>
											<a class="edge-tweet-time" target="_blank" href="<?php echo esc_url( $twitter_api->getHelper()->getTweetURL( $tweet ) ); ?>">
												<?php if ( $show_tweet_icon == 'yes' ) { ?>
													<span class="edge-twitter-icon"><i class="social_twitter"></i></span>
												<?php } ?>
												<?php echo wp_kses_post( $twitter_api->getHelper()->getTweetTime( $tweet ) ); ?>
											</a>
										<?php } ?>
									</div>
								</li>
							
							<?php } else { ?>
								
								<li class="edge-tweet-holder">
									<?php if ( $show_tweet_icon == 'yes' ) { ?>
										<div class="edge-twitter-icon"><i class="social_twitter"></i></div>
									<?php } ?>
									<div class="edge-tweet-text" <?php adorn_edge_inline_style( $twitter_style ); ?>>
										<?php echo wp_kses_post( $twitter_api->getHelper()->getTweetText( $tweet ) ); ?>
										<?php if ( $show_tweet_time == 'yes' ) { ?>
											<a class="edge-tweet-time" target="_blank" href="<?php echo esc_url( $twitter_api->getHelper()->getTweetURL( $tweet ) ); ?>">
												<?php echo wp_kses_post( $twitter_api->getHelper()->getTweetTime( $tweet ) ); ?>
											</a>
										<?php } ?>
									</div>
								</li>
							
							<?php } ?>
						
						<?php } ?>
					</ul>
				<?php }
			} else {
				echo esc_html( $response->message );
			}
		} else {
			esc_html_e( 'It seems that you haven\'t connected with your Twitter account', 'edge-twitter-feed' );
		}

		echo adorn_edge_get_module_part($args['after_widget']);
	}
}

function edge_twitter_widget_load() {
	register_widget( 'EdgeTwitterWidget' );
}

add_action( 'widgets_init', 'edge_twitter_widget_load' );