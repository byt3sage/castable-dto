<?php

it('can store record with dto', function () {
    \JaeToole\CastableDto\Tests\Models\Animal::query()
        ->create(
            [
                'name' => 'Luis',
                'characteristics' => new \JaeToole\CastableDto\Tests\DataTransferObjects\CharacteristicsDto(
                    'roar',
                    10,
                    true
                ),
            ]
        );

    $this->assertDatabaseHas('animals', [
        'characteristics' => '{"sound":"roar","age":"10"}',
    ]);
});

it('can cast existing record to dto', function () {
    $model = \JaeToole\CastableDto\Tests\Models\Animal::factory()->createOne(
        [
            'characteristics' => new \JaeToole\CastableDto\Tests\DataTransferObjects\CharacteristicsDto(
                'roar',
                10,
                true
            ),
        ]
    );

    expect($model->characteristics)
        ->toBeInstanceOf(\JaeToole\CastableDto\Tests\DataTransferObjects\CharacteristicsDto::class)
        ->and($model->characteristics)
        ->toHaveProperties(
            [
                'sound',
                'age',
            ]
        );
});
