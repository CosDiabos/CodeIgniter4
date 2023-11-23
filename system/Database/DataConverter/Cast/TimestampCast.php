<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace CodeIgniter\Database\DataConverter\Cast;

use CodeIgniter\I18n\Time;

/**
 * Class TimestampCast
 *
 * PHP: Time <--> DB column: int
 *
 * @extends BaseCast<Time, int, int|string>
 */
class TimestampCast extends BaseCast
{
    /**
     * {@inheritDoc}
     */
    public static function fromDatabase(mixed $value, array $params = []): Time
    {
        if (! is_int($value) && ! is_string($value)) {
            self::invalidTypeValueError($value);
        }

        return Time::createFromTimestamp((int) $value);
    }

    /**
     * {@inheritDoc}
     */
    public static function toDatabase(mixed $value, array $params = []): int
    {
        if (! $value instanceof Time) {
            self::invalidTypeValueError($value);
        }

        return $value->getTimestamp();
    }
}
