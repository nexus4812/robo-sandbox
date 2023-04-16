<?php

namespace RoboSandbox\Robo;

use League\Container\ReflectionContainer;
use Robo\Common\ConfigAwareTrait;
use Robo\Config\Config;
use Robo\Robo;
use Robo\Runner as RoboRunner;
use RoboSandbox\Robo\Container\ServiceProviders\ServiceProvider;
use RoboSandbox\Robo\Plugin\Commands\DeployTaskCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MyApplication
{
    const APPLICATION_NAME = 'My Application';
    const REPOSITORY = 'org/project';

    use ConfigAwareTrait;


    private const COMMANDS = [
        DeployTaskCommand::class
    ];

    private $runner;

    public function __construct(
        Config          $config,
        InputInterface  $input = NULL,
        OutputInterface $output = NULL
    )
    {
        // Create applicaton.
        $application = new Application(self::APPLICATION_NAME, 'master');

        // Create and configure container.

        // container provided by The PHP League
        // https://container.thephpleague.com/4.x/
        $container = Robo::createContainer($application, $config);

        // Add ServiceProviders
        $container->addServiceProvider(new ServiceProvider());

        Robo::finalizeContainer($container);

        // Instantiate Robo Runner.
        $this->runner = new RoboRunner();
        $this->runner->setContainer($container);
        $this->runner->setSelfUpdateRepository(self::REPOSITORY);
    }

    public function run(InputInterface $input, OutputInterface $output): int
    {
        return $this->runner->run(input:$input, output:$output, commandFiles: self::COMMANDS);
    }
}
