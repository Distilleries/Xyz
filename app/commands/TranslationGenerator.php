<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class TranslationGenerator extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'translation';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Dispatch the parsing of file to generate the .pot';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->call('l4gettext:compile');
		$this->call('l4gettext:extract');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(

		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(

		);
	}

}
