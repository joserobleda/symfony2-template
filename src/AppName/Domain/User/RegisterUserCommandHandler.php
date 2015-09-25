<?php

namespace AppName\Domain\User;

use Symfony\Bridge\Monolog\Logger;

class RegisterUserCommandHandler
{
	/**
	 * @var Logger
	 */
	private $logger;

	public function __construct(Logger $logger)
	{
		$this->logger = $logger;
	}

	public function handle(RegisterUserCommand $command)
	{
		$this->logger->info('register user command recieved!');
	}
}
