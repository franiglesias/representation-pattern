<?php

declare (strict_types=1);

namespace App\Representation;


use App\Fillable;

final class ListNamePrinter implements Fillable
{
    private string $name;
    private string $surname;

    public function fill(string $field, string $value): void
    {
        if ($field === 'name') {
            $this->name = $value;
        }

        if ($field === 'surname') {
            $this->surname = $value;
        }
    }

    public function print(): string
    {
        return sprintf('%2$s, %1$s', $this->name, $this->surname);
    }
}
