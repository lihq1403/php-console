<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-03-17
 * Time: 11:38
 */

namespace Inhere\Console\Traits;

use Inhere\Console\Console;
use Inhere\Console\IO\Input;
use Inhere\Console\IO\InputInterface;
use Inhere\Console\IO\Output;
use Inhere\Console\IO\OutputInterface;

/**
 * Class InputOutputAwareTrait
 *
 * @package Inhere\Console\Traits
 */
trait InputOutputAwareTrait
{
    /**
     * @var Input|InputInterface
     */
    protected $input;

    /**
     * @var Output|OutputInterface
     */
    protected $output;

    /**
     * @return string
     */
    public function getScript(): string
    {
        return $this->input->getScript();
    }

    /**
     * @return string
     */
    public function getScriptName(): string
    {
        return $this->input->getScriptName();
    }

    /**
     * @return string
     */
    public function getCommandName(): string
    {
        return $this->input->getCommand();
    }

    /**
     * @param int|string  $name
     * @param mixed $default
     *
     * @return mixed|null
     * @see Input::getArg()
     */
    public function getArg($name, $default = null)
    {
        return $this->input->getArg($name, $default);
    }

    /**
     * @param string $default
     *
     * @return string
     * @see Input::getFirstArg()
     */
    public function getFirstArg(string $default = ''): string
    {
        return $this->input->getFirstArg($default);
    }

    /**
     * @param int|string $name
     *
     * @return mixed
     * @see Input::getRequiredArg()
     */
    public function getRequiredArg($name)
    {
        return $this->input->getRequiredArg($name);
    }

    /**
     * @param array $names
     * @param mixed  $default
     *
     * @return bool|mixed|null
     * @see Input::getSameArg()
     */
    public function getSameArg(array $names, $default = null)
    {
        return $this->input->getSameArg($names, $default);
    }

    /**
     * {@inheritdoc}
     * @see Input::getOpt()
     */
    public function getOpt($name, $default = null)
    {
        return $this->input->getOpt($name, $default);
    }

    /**
     * {@inheritdoc}
     * @see Input::getSameOpt()
     */
    public function getSameOpt(array $names, $default = null)
    {
        return $this->input->getSameOpt($names, $default);
    }

    /**
     * {@inheritdoc}
     * @see Input::getRequiredOpt()
     */
    public function getRequiredOpt(string $name)
    {
        return $this->input->getRequiredOpt($name);
    }

    /**
     * @param string $question
     * @param bool   $nl
     *
     * @return string
     */
    public function read(string $question = '', bool $nl = false): string
    {
        return $this->input->read($question, $nl);
    }

    /**
     * @param mixed    $message
     * @param bool     $nl
     * @param bool|int $quit
     *
     * @return int
     */
    public function write($message, $nl = true, $quit = false): int
    {
        return $this->output->write($message, $nl, $quit);
    }

    /**
     * @param mixed    $message
     * @param bool|int $quit
     *
     * @return int
     */
    public function writeln($message, $quit = false): int
    {
        return $this->output->write($message, true, $quit);
    }

    /**
     * @return Input|InputInterface
     */
    public function getInput(): InputInterface
    {
        return $this->input;
    }

    /**
     * @param InputInterface $input
     */
    public function setInput(InputInterface $input): void
    {
        $this->input = $input;
    }

    /**
     * @return Output|OutputInterface
     */
    public function getOutput(): OutputInterface
    {
        return $this->output;
    }

    /**
     * @param Output|OutputInterface $output
     */
    public function setOutput(OutputInterface $output): void
    {
        $this->output = $output;
    }

    /**
     * get debug level value
     *
     * @return int
     */
    public function getVerbLevel(): int
    {
        return (int)$this->input->getLongOpt('debug', Console::VERB_ERROR);
    }

    /**
     * check is given verbose level
     *
     * @param int $level
     *
     * @return bool
     */
    public function isDebug(int $level = Console::VERB_DEBUG): bool
    {
        return $level <= $this->getVerbLevel();
    }
}
