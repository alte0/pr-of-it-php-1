<?php

namespace App\System;
class View
{
    protected array $data = [];

    public function assign(string $name, mixed $value): void
    {
        $this->data[$name] = $value;
    }

    public function display(string $template): void
    {
        include $template;
    }

    public function render(string $template): bool|string|null
    {
        if (is_file($template)) {
            ob_start();

            extract($this->data);

            include $template;

            $contents = ob_get_contents();

            ob_end_clean();
        } else {
            $contents = null;
        }

        return $contents;
    }
}