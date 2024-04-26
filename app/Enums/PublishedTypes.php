<?php

namespace App\Enums;

class PublishedTypes
{
    const int PUBLISHED = 1;
    const int NOT_PUBLISHED = 0;

    /**
     * @var string[]
     */
    public static array $LABELS = [
        self::PUBLISHED => 'published',
        self::NOT_PUBLISHED => 'not published'
    ];
}
