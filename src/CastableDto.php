<?php

namespace JaeToole\CastableDto;

use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class CastableDto implements Castable, Arrayable, Jsonable
{
    public function __construct()
    {
    }

    public static function castUsing(array $arguments): Casts\DtoCast
    {
        return new \JaeToole\CastableDto\Casts\DtoCast(self::class, $arguments);
    }

    public function toJson($options = 0): bool|string
    {
        return json_encode($this->toArray(), $options);
    }

    public static function fromJson(string $json): self
    {
        return new self(...json_decode($json, associative: true));
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
