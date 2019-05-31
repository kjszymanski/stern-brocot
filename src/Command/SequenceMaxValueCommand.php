<?php

namespace App\Command;

use App\Math\SternBrocotSequence;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SequenceMaxValueCommand extends Command
{
    const COMMAND_NAME = 'app:seq-max-value';

    protected static $defaultName = self::COMMAND_NAME;

    protected function configure()
    {
        $this
            ->setDescription('Calculating maximum value of n first elements of sequence.')
            ->setHelp('Provide up to 10 n values - each value in one line.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        for ($i = 0; $i < 10; $i++) {
            $line = fgets(STDIN);
            $n = (int)$line;

            if (!is_int($n)) {
                $output->writeln($this->getHelp() . ' ' . $line . ' is not integer.');
            } else {
                $output->writeln(SternBrocotSequence::calculateMaxValueInSentence($n));
            }
        }
    }
}