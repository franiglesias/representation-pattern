<?php

declare (strict_types=1);

namespace App;


final class PersonName
{

    private string $name;
    private string $surname;

    public function __construct(string $name, string $surname)
    {
        $this->name    = $name;
        $this->surname = $surname;
    }

    public function fill(Fillable $printer): Fillable
    {
        $printer->fill('name', $this->name);
        $printer->fill('surname', $this->surname);

        return $printer;
    }
}
