<?php

namespace RoboSandbox\Domain\Service\Repository;

use Robo\Config\Config;
use Robo\Tasks;

class GitRepository extends Tasks implements GitRepositoryInterface
{
    public function gitPull(): void
    {
        $cmd = "git pull";
        $result = $this->taskExec($cmd)->run();
    }
}
