<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MyCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('say_hello')
            ->setDescription('return string')
            ->setDefinition([
                new InputArgument('arg', InputArgument::REQUIRED),
            ])
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $arg = $input->getArgument('arg');
        $text = 'Hello ' . $arg;
        $output->writeln($text);
        return Command::SUCCESS;
    }
}
