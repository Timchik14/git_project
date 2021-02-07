<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;

class MyThirdCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('question')
            ->setDescription('return string');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $question1 = new Question('Please enter your name$ ');
        $name = $helper->ask($input, $output, $question1);

        $question2 = new Question('Please enter your age$ ');
        $age = $helper->ask($input, $output, $question2);

        $question3 = new ChoiceQuestion(
            'Please select your sex (defaults to male)$ ',
            ['male', 'female'],
            0
        );

        $question3->setErrorMessage('Sex %s is invalid.');

        $sex = $helper->ask($input, $output, $question3);
        $output->writeln('Sex: ' . $sex . ', name: ' . $name . ', age: ' . $age);
        return Command::SUCCESS;
    }

}
