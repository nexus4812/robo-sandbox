<?php

namespace RoboSandbox\Robo\Container\ServiceProviders;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Psr\Log\LoggerInterface;
use Robo\Config\Config;
use RoboSandbox\Domain\Service\Repository\GitRepository;
use RoboSandbox\Domain\Service\Repository\GitRepositoryInterface;

class ServiceProvider extends AbstractServiceProvider
{
    /**
     * The provides method is a way to let the container
     * know that a service is provided by this service
     * provider. Every service that is registered via
     * this service provider must have an alias added
     * to this array or it will be ignored.
     */
    public function provides(string $id): bool
    {
        $services = [
            Config::class,
            GitRepositoryInterface::class,
            LoggerInterface::class,
        ];

        return in_array($id, $services, true);
    }

    public function register(): void
    {
        $this->getContainer()->addShared(Config::class, function (): Config {
            return new Config();
        });

        $this->getContainer()->addShared(GitRepositoryInterface::class, function (): GitRepositoryInterface {
            return new GitRepository();
        });

        $this->getContainer()->addShared(Config::class, function () {
            return new Config();
        });
    }
}
