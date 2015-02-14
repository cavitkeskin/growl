<?php

namespace BryanCrowe\Growl\Builder;

use \InvalidARgumentException;

abstract class BuilderAbstract implements BuilderInterface
{
    /**
     * The command's name.
     *
     * @var string
     */
    protected $command;

    /**
     * Constructor. Offers an opportunity to set a command's alias/path.
     *
     * @throws InvalidArgumentException If the argument isn't a string.
     */
    public function __construct($path = null)
    {
        if ($path === null) {
            return;
        }

        if (is_string($path)) {
            $this->command = $path;
        } else {
            throw new InvalidArgumentException('This constructor expects a string argument.');
        }
    }

    /**
     * Build the command string to be executed.
     *
     * @param array $options An array of options to use for building the command.
     * @return string
     */
    abstract public function build($options);
}
