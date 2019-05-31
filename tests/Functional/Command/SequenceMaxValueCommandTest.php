<?php

namespace App\Tests\Functional\Command;

use App\Command\SequenceMaxValueCommand;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Process\Process;

class SequenceMaxValueCommandTest extends KernelTestCase
{
    /**
     * @test
     */
    public function shouldReturnMaxValuesForSequences()
    {
        $process = new Process(['bin/console', SequenceMaxValueCommand::COMMAND_NAME]);
        $process->setInput(file_get_contents(__DIR__ . '/../../Resources/example-in.txt'));
        $process->run();

        if (!$process->isSuccessful()) {
            $this->fail('Running console command '. SequenceMaxValueCommand::COMMAND_NAME .' failed.');
        }

        $this->assertEquals(
            trim(file_get_contents(__DIR__ . '/../../Resources/example-out.txt')),
            trim($process->getOutput())
        );
    }
}
