<?php
namespace Derhansen\Cli\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class HelloCommand extends Command {

	/**
	 * Configuration
	 *
	 * @return void
	 */
	protected function configure() {
		$this->setName("hello")
			->setDescription("This command prints 'Hello World!'")
			->setDefinition(array(
				new InputOption('flag', 'f', InputOption::VALUE_NONE, 'Raise a flag'),
				new InputArgument('activities', InputArgument::IS_ARRAY, 'Space-separated activities to perform', null),
			))
			->setHelp("The <info>hello</info> command just prints 'Hello World!'");
	}

	/**
	 * Executes the command
	 *
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int|null|void
	 */
	protected function execute(InputInterface $input, OutputInterface $output) {
		$output->writeln("Hello World!");
	}
}