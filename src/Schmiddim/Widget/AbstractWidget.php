<?php

namespace Schmiddim\Widget;


class AbstractWidget extends \WP_Widget
{

	/**
	 * @var array
	 */
	protected $widgetOptions = array();

	/**
	 * @var array
	 */
	protected $widgetParams = array();

	/**
	 * @var string
	 */
	protected $idBase = 'Default Name';

	/**
	 * @var string
	 */
	protected $widgetName = 'default-identifier';

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{

		parent::__construct($this->getIdBase(), $this->getWidgetName(), $this->getWidgetOptions());
	}


	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 * @return void
	 */
	public function form($instance)
	{


		foreach ($this->getWidgetParams() as $paramArray) {
			$value = !empty($instance[$paramArray['id']]) ? $instance[$paramArray['id']] : __($paramArray['default'], 'text_domain');

			printf('<p><label for="%s">%s</label>
			<input class="widefat" id="%s" name="%s" type="text" value="%s"></p>',

				esc_attr($this->get_field_id($paramArray['id'])),
				translate(esc_attr($paramArray['name'])),
				esc_attr($this->get_field_id($paramArray['id'])),
				esc_attr($this->get_field_name($paramArray['id'])),
				esc_attr($value)
			);
		}
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 * @return array
	 */
	public function update($new_instance, $old_instance)
	{
		$instance = array();

		foreach ($this->getWidgetParams() as $paramArray) {

			$instance[$paramArray['id']] = (!empty($new_instance[$paramArray['id']])) ? strip_tags($new_instance[$paramArray['id']]) : '';

		}

		return $instance;
	}

	/**
	 * @return array
	 */
	public function getWidgetOptions()
	{
		return $this->widgetOptions;
	}

	/**
	 * @param array $widgetOptions
	 */
	public function setWidgetOptions($widgetOptions)
	{
		$this->widgetOptions = $widgetOptions;
	}

	/**
	 * @return array
	 */
	public function getWidgetParams()
	{
		return $this->widgetParams;
	}

	/**
	 * @param array $widgetParams
	 */
	public function setWidgetParams($widgetParams)
	{
		$this->widgetParams = $widgetParams;
	}

	/**
	 * @return string
	 */
	public function getIdBase()
	{
		return $this->idBase;
	}

	/**
	 * @param string $idBase
	 */
	public function setIdBase($idBase)
	{
		$this->idBase = $idBase;
	}

	/**
	 * @return string
	 */
	public function getWidgetName()
	{
		return $this->widgetName;
	}

	/**
	 * @param string $widgetName
	 */
	public function setWidgetName($widgetName)
	{
		$this->widgetName = $widgetName;
	}



}