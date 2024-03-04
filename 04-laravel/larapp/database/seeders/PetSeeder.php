<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pet;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add a record with Eloquent ORM
        $pet = new Pet;
        $pet->name     = "Pocholo";
        $pet->photo    = "1708697222.png";
        $pet->kind     = "Dog";
        $pet->weight   = 10;
        $pet->age      = 4;
        $pet->breed    = "Pug";
        $pet->location = "Manizales";
        $pet->save();
    }
}
