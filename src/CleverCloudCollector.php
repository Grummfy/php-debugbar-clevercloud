<?php

namespace Grummfy\DebugBar;

use DebugBar\DataCollector\DataCollectorInterface;
use DebugBar\DataCollector\Renderable;

class CleverCloudCollector implements Renderable, DataCollectorInterface
{
	/**
	 * @var array
	 */
	protected $data = array();

	public function __construct(array $hide = array())
	{
		$data = [
			'APP_ID',
			'INSTANCE_ID',
			'INSTANCE_TYPE',
			'COMMIT_ID',
			'APP_HOME',
			'INSTANCE_NUMBER'
		];

		foreach ($hide as $v)
		{
			if (isset($data[ $v ]))
			{
				unset($data[ $v ]);
			}
		}
		unset($v);

		foreach ($data as $v)
		{
			$this->data[ $v ] = getenv($v);
		}
	}

	public function collect()
	{
		return $this->data;
	}

	public function getWidgets()
	{
		return array(
			'clevercloud' => array(
				'title'     => 'Clever Cloud',
				'map'       => 'clevercloud',
				'icon'      => 'check',
				'widget'    => 'PhpDebugBar.Widgets.VariableListWidget',
				'default'   => '{}'
			),
		);
	}

	public function getName()
	{
		return 'clevercloud';
	}
}
