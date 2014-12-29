<?php

namespace BryanCrowe\Growl\Builder;

class TerminalNotifierBuilder extends BuilderAbstract
{
    /**
     * The command's name.
     *
     * @var string
     */
    protected $command = 'terminal-notifier';

    /**
     * Constructor. Offers an opportunity to set a command's alias.
     *
     * @throws InvalidArgumentException If the argument isn't a string.
     */
    public function __construct()
    {
        $args = func_get_args();
        if (!empty($args)) {
            if (is_string($args[0])) {
                $this->command = $args[0];
            } else {
                throw new InvalidArgumentException('This constructor expects a string argument.');
            }
        }
    }

    /**
     * Builds the terminal-notifier command to be executed.
     *
     * @param array $options An array of options to use for building the command.
     *
     * @return string The fully-built command to execute.
     */
    public function build($options)
    {
        $command = $this->command;

        if (isset($options['title'])) {
            $command .= ' -title ' . $options['title'];
        }
        if (isset($options['subtitle'])) {
            $command .= ' -subtitle ' . $options['subtitle'];
        }
        if (isset($options['message'])) {
            $command .= ' -message ' . $options['message'];
        }
        if (isset($options['appIcon'])) {
            $command .= ' -appIcon ' . $options['appIcon'];
        }
        if (isset($options['contentImage'])) {
            $command .= ' -contentImage ' . $options['contentImage'];
        }
        if (isset($options['open'])) {
            $command .= ' -open ' . $options['open'];
        }

        return $command;
    }
}
