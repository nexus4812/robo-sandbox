<?php

namespace RoboSandbox\Robo\Plugin\Commands;


use Robo\Symfony\ConsoleIO;
use Robo\Tasks;

class HelloWorldCommand extends Tasks
{
    /**
     * This is a debug command
     *
     * @param ConsoleIO $io
     * @param $world
     * @return void
     */
    function hello(ConsoleIO $io, $world): void
    {
        $io->say("Hello, $world");
    }
}
