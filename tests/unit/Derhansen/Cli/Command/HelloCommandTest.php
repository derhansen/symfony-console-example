<?php

namespace tests\Derhansen\Cli\Command;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Derhansen\Cli\Command\HelloCommand;

require_once __DIR__ . '/../../../bootstrap.php';

class TestCommandTest extends \PHPUnit_Framework_TestCase {

	/**
	 * Test if command returns expected string
	 *
	 * @test
	 */
	public function testExecute() {
		$application = new Application();
		$application->add(new HelloCommand());

		$command = $application->find('hello');
		$commandTester = new CommandTester($command);
		$commandTester->execute(array('command' => $command->getName()));

		$this->assertRegExp('/Hello World!/', $commandTester->getDisplay());
	}

}