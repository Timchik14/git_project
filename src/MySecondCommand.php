<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MySecondCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('text')
            ->setDescription('return string')
            ->setDefinition([
                new InputArgument('string', InputArgument::REQUIRED),
                new InputOption('times', 't', InputOption::VALUE_OPTIONAL)
            ])
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $arg = $input->getArgument('string');
        $opt = $input->getOption('times') ? $input->getOption('times') : 2;
        $i = 1;
        while ($i <= $opt) {
            $output->writeln($arg);
            $i++;
        }

        return Command::SUCCESS;
    }
}
