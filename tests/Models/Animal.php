<?php

namespace JaeToole\CastableDto\Tests\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JaeToole\CastableDto\Tests\DataTransferObjects\CharacteristicsDto;

class Animal extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $guarded = [
        'id',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'characteristics' => CharacteristicsDto::class,
    ];

    /**
     * @return AnimalFactory
     */
    protected static function newFactory()
    {
        return AnimalFactory::new();
    }
}

class AnimalFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Animal::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'characteristics' => [
                'sound' => $this->faker->word,
                'age' => $this->faker->numberBetween(1, 10),
            ],
        ];
    }
}
