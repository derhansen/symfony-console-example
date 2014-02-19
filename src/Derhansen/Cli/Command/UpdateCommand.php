<?php

namespace Derhansen\Cli\Command;

use Herrera\Phar\Update\Manager;
use Herrera\Phar\Update\Manifest;
use Herrera\Json\Exception\FileException;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateCommand extends Command {

	/**
	 * Update path
	 */
	const MANIFEST_FILE = 'http://derhansen.github.io/symfony-console-example/manifest.json';

	/**
	 * Configuration
	 * @return void
	 */
	protected function configure() {
		$this
			->setName('update')
			->setDescription('Updates test.phar to the latest version')
			->addOption('major', null, InputOption::VALUE_NONE, 'Allow major version update')
		;
	}

	/**
	 * Executes the update command
	 *
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return bool|int|null
	 */
	protected function execute(InputInterface $input, OutputInterface $output) {
		$output->writeln('Looking for updates...');

		try {
			$manager = new Manager(Manifest::loadFile(self::MANIFEST_FILE));
		} catch (FileException $e) {
			$output->writeln('<error>Updates could not be fetched</error>');
			return TRUE;
		}

		$currentVersion = $this->getApplication()->getVersion();
		$allowMajor = $input->getOption('major');

		if ($manager->update($currentVersion, $allowMajor)) {
			$output->writeln('<info>Updated to latest version</info>');
		} else {
			$output->writeln('<comment>Already up-to-date</comment>');
		}
	}
}