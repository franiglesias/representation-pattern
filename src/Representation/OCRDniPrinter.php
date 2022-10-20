<?php

declare (strict_types=1);

namespace App\Representation;


use App\Fillable;

final class OCRDniPrinter implements Fillable
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


    public function ocr(): string
    {
        $fullName = mb_strtoupper(str_replace(' ', '<', sprintf('%2$s<<%1$s', $this->name, $this->surname)));

        return sprintf("%-'<31s", $fullName);
    }
}
