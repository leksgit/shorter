<?php

namespace App\DTO {

    use Spatie\LaravelData\Data;

    class ShortCreateDTO extends Data
    {
        public string $source_url;
        public int $allowed_number_of_uses = 0;
        public int $hours_available = 24;
    }
}
