<?php

declare(strict_types=1);

namespace Tests\Unit;

use ChapaPhp\Application\Header;
use ChapaPhp\Application\HeaderBuilder;
use ChapaPhp\Application\HeaderKey;
use Tests\TestCase;

/**
 * @internal
 */
final class HeaderBuilderTest extends TestCase
{
    private HeaderBuilder $headerBuilder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->headerBuilder = new HeaderBuilder();
    }

    /**
     * @test
     */
    public function should_be_able_to_create_a_new_header_builder(): void
    {
        $this->assertInstanceOf(HeaderBuilder::class, $this->headerBuilder);
    }

    /**
     * @test
     */
    public function should_be_header_class_to_be_a_target_class(): void
    {
        $this->assertEquals(Header::class, $this->headerBuilder->targetType());
    }

    public static function headerProvider(): iterable
    {
        if (!isset(self::$faker)) {
            self::$faker = \Faker\Factory::create();
        }

        yield HeaderKey::SOURCE->value => [
            'key' => HeaderKey::SOURCE,
            'value' => self::$faker->uuid,
        ];

        yield HeaderKey::TIMESTAMP->value => [
            'key' => HeaderKey::TIMESTAMP,
            'value' => (string) self::$faker->dateTime->getTimestamp(),
        ];
    }

    /**
     * @test
     *
     * @dataProvider headerProvider
     */
    public function should_be_able_to_build_a_header(HeaderKey $key, string $value): void
    {
        $header = $this->headerBuilder
            ->withKey($key)
            ->withValue($value)
            ->build()
        ;
        $this->assertEquals($key, $header->key());
        $this->assertEquals($value, $header->value());
    }
}
