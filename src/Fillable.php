<?php

declare (strict_types=1);

namespace App;

interface Fillable
{
    public function fill(string $field, string $value): void;
}
