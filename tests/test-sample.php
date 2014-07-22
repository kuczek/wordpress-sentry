<?php

require_once( dirname(__FILE__) . '/../class.wp-raven-client.php' );


class SampleTest extends WP_UnitTestCase {

	function setUp() {
		add_option('sentry-settings', array(
			'dsn' => $_SERVER['DSN'],
			'reporting_level' => 'E_ALL'
		));
	}

	function testMessage() {

		$client = new WP_Raven_Client();

		// Capture a message
		$event_id = $client->getIdent($client->captureMessage('phpunit test message'));

		// Assert it
		$this->assertNotEmpty($event_id);
	}
}

