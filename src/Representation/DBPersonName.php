<?php

declare (strict_types=1);

namespace App\Representation;


final class DBPersonName
{
    public function __construct(private string $name, private string $surname)
    {
    }

    public function name(): string
    {
        return $this->name;
    }

    public function surname(): string
    {
        return $this->surname;
    }
}
