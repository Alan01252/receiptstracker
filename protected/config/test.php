<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
			'db'=>array(
					'connectionString' => 'mysql:host=localhost;dbname=openbooking',
					'emulatePrepare' => true,
					'username' => 'openbooking',
					'password' => 'password',
					'charset' => 'utf8',
					'enableParamLogging'=>true,
			),
		),
	)
);
