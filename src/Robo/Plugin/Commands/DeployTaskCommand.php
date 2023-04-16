<?php

namespace RoboSandbox\Robo\Plugin\Commands;

use Robo\Tasks;
use RoboSandbox\Domain\Service\Repository\GitRepositoryInterface;

class DeployTaskCommand extends Tasks
{

    /**
     * Deploy task.
     */
    public function deploy()
    {
        $this->git->gitPull();
    }
}
