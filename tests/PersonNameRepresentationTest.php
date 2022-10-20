<?php

namespace App\Tests;

use App\PersonName;
use App\Representation\DBPersonName;
use App\Representation\FullNamePrinter;
use App\Representation\ListNamePrinter;
use App\Representation\MapToORMEntity;
use App\Representation\OCRDniPrinter;
use PHPUnit\Framework\TestCase;

class PersonNameRepresentationTest extends TestCase
{
    /** @test */
    public function shouldBeRepresentedAsListName(): void
    {
        $this->assertListName(
            new PersonName("Fran", "Iglesias Gómez"),
            "Iglesias Gómez, Fran"
        );
    }

    /** @test */
    public function shouldBeRepresentedAsFullName(): void
    {
        $this->assertFullName(
            new PersonName("Fran", "Iglesias Gómez"),
            "Fran Iglesias Gómez"
        );
    }

    /** @test */
    public function shouldBeRepresentedAsDNI(): void
    {
        $this->assertDniName(
            new PersonName("Francisco José", "Iglesias Gómez"),
            "IGLESIAS<GÓMEZ<<FRANCISCO<JOSÉ"
        );
    }

    /** @test */
    public function shouldBeRepresentedAsDTO(): void
    {
        $this->assertDto(
            new PersonName("Fran", "Iglesias Gómez"),
            new DBPersonName("Fran", "Iglesias Gómez")
        );
    }


    public function assertListName(PersonName $name, string $expected): void
    {
        $printer  = $name->fill(new ListNamePrinter());
        $listName = $printer->print();
        $this->assertEquals($expected, $listName);
    }

    public function assertFullName(PersonName $name, string $expected): void
    {
        $printer  = $name->fill(new FullNamePrinter());
        $fullName = $printer->print();
        $this->assertEquals($expected, $fullName);
    }

    public function assertDniName(PersonName $name, string $expected): void
    {
        $printer = $name->fill(new OCRDniPrinter());
        $dniName = $printer->ocr();
        $this->assertEquals($expected, $dniName);
    }

    public function assertDto(PersonName $name, DBPersonName $expected): void
    {
        $printer = $name->fill(new MapToORMEntity());
        $dniName = $printer->dto();
        $this->assertEquals($expected, $dniName);
    }
}
