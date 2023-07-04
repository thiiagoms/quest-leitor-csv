<?php

declare(strict_types=1);

namespace Quest\Helpers;

use PrettyPrint\Printer;

class Container
{
    /**
     * Container dependency
     *
     * @var array
     */
    private array $dependencies = [];

    /**
     * Add new dependency in container
     *
     * @param string $class
     * @param callable $callback
     * @return void
     */
    public function set(string $class, callable $callback)
    {
        $this->dependencies[$class] = $callback;
    }

    /**
     * Retrieve class from container
     *
     * @param string $class
     * @return mixed
     */
    public function get(string $class): mixed
    {
        if (! array_key_exists($class, $this->dependencies)) {
            Printer::error("Dependency {$class} doesn't exists");
            exit;
        }

        $handler = $this->dependencies[$class];

        return $handler($this);
    }
}
