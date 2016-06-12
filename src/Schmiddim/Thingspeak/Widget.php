<?php


namespace Schmiddim\Thingspeak;


use Schmiddim\Widget\AbstractWidget;

class Widget extends AbstractWidget
{

	/**
	 * @var array
	 */
	protected $widgetOptions = array(
		'classname' => 'thingspeak_widget',
		'description' => 'Shows Thingspeak channels',
	);

	/**
	 * @var string
	 */
	protected $idBase ='thingspeak_widget';

	/**
	 * @var string
	 */
	protected $widgetName ='Thingspeak Widget';

	/**
	 * @var array
	 */
	protected $widgetParams = array(
		array('name' => 'Title',
			'id' => 'title',
			'default' => 'No Title set'
		),
		array('name' => 'Thingspeak ID',
			'id' => 'thingspeakId',
			'default' => '123778'
		),
		array('name' => 'Number Of Results',
			'id' => 'numberOfResults',
			'default' => '100'
		),
	);

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 * @return void
	 */
	public function widget($args, $instance)
	{

		echo $args['before_widget'];
		if (!empty($instance['title'])) {
			echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
		}
		// outputs the content of the widget
		printf('
		<iframe width="450"
				height="260"
				style="border: 1px solid #cccccc;"
				src="https://thingspeak.com/channels/%s/charts/1?bgcolor=%%23ffffff&color=%%23d62020&days=2&dynamic=true&results=%s&timescale=10&type=line">

</iframe>

		'
			, $instance['thingspeakId']
			, $instance['numberOfResults']

		);


		echo $args['after_widget'];

	}


}