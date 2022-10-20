<?php

declare (strict_types=1);

namespace App\Representation;


use App\Fillable;

final class FullNamePrinter implements Fillable
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
        return sprintf('%1$s %2$s', $this->name, $this->surname);
    }
}
