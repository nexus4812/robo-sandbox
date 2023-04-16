<?php

namespace RoboSandbox\Robo\Plugin\Commands;


use Robo\Symfony\ConsoleIO;
use Robo\Tasks;

class DeployTaskCommand extends Tasks
{
    function hello(ConsoleIO $io, $world)
    {
        $io->say("Hello, $world");
    }

    /**
     * Deploy task.
     */
    public function deploy()
    {
        // Clone the repository.
        $this->taskGitStack()
            ->cloneShallow('https://github.com/example/repo.git', 'path/to/destination')
            ->run();

        // Install dependencies.
        $this->taskComposerInstall()
            ->dir('path/to/destination')
            ->run();

        // Sync files to release directory.
        $this->taskRsync()
            ->fromPath('path/to/destination/')
            ->toHost('user@example.com:/var/www/html')
            ->recursive()
            ->exclude('.git')
            ->run();
    }
}
