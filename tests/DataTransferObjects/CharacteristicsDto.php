<?php

namespace JaeToole\CastableDto\Tests\DataTransferObjects;

class CharacteristicsDto extends \JaeToole\CastableDto\CastableDto
{
    /**
     * @param string $sound
     * @param string $age
     * @param bool $friendly
     */
    public function __construct(
        public string $sound,
        public string $age,
        private bool $friendly = true
    ) {
    }
}
