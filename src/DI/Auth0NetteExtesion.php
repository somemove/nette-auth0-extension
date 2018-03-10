<?php declare(strict_types=1);

	namespace Somemove\Auth0NetteExtesion\DI;

	use \Nette\DI\Compiler;
	use \Nette\DI\CompilerExtension;

	final class Auth0NetteExtesion extends CompilerExtension {

		public $defaults = [
			'response_mode' => 'query',
			'response_type' => 'code',
			'domain' => NULL,
			'audience' => NULL,
			'scope' => NULL,
			'client_id' => NULL,
			'client_secret' => NULL,
			'redirect_uri' => NULL,
			'persist_user' => false,
			'persist_access_token' => false,
			'persist_refresh_token' => false,
			'persist_id_token' => false,
			'state_handler' => false,
			'store' => false,
			'debug' => false,
		];

		public function loadConfiguration() {
			$config = $this->validateConfig($this->defaults);

			$builder = $this->getContainerBuilder();

			$builder
				->addDefinition($this->prefix('auth0'))
				->setClass('Auth0\SDK\Auth0', [$config])
			;
		}

	}

?>