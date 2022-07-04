<?php

namespace JaeToole\CastableDto\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class DtoCast implements CastsAttributes
{
    /**
     * @param string $class
     * @param array $parameters
     */
    public function __construct(
        protected string $class,
        protected array $parameters = []
    ) {
    }

    /**
     * Transform the attribute from the underlying model values.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return $this->class::fromJson($value);
    }

    /**
     * Transform the attribute to its underlying model values.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        if (is_null($value)) {
            return;
        }

        if (is_array($value)) {
            $value = new $this->class(...$value);
        }

        if (! $value instanceof $this->class) {
            throw new \InvalidArgumentException("Value must be a type of [$this->class], array, or null");
        }

        return $value->toJson();
    }
}
