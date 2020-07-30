<?php

declare(strict_types=1);

namespace Cron\Tests;

use Cron\FieldFactory;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @author Michael Dowling <mtdowling@gmail.com>
 *
 * @coversDefaultClass \Cron\FieldFactory
 */
class FieldFactoryTest extends TestCase
{
    /**
     * @covers ::getField
     */
    public function testRetrievesFieldInstances()
    {
        $mappings = [
            0 => 'Cron\MinutesField',
            1 => 'Cron\HoursField',
            2 => 'Cron\DayOfMonthField',
            3 => 'Cron\MonthField',
            4 => 'Cron\DayOfWeekField',
        ];

        $f = new FieldFactory();

        foreach ($mappings as $position => $class) {
            $this->assertSame($class, \get_class($f->getField($position)));
        }
    }

    /**
     * @covers ::getField
     */
    public function testValidatesFieldPosition()
    {
        $this->expectException(InvalidArgumentException::class);
        $f = new FieldFactory();
        $f->getField(-1);
    }
}
