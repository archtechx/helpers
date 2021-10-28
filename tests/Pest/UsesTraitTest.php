<?php

it('checks for the presence of a trait', function () {
    expect(uses_trait(Foo::class, FirstTrait::class))->toBeTrue();
    expect(uses_trait(Foo::class, SecondTrait::class))->toBeFalse();
});

it('checks recursively', function () {
    expect(uses_trait(Bar::class, FirstTrait::class))->toBeTrue(); // inherited
    expect(uses_trait(Bar::class, SecondTrait::class))->toBeTrue();
});

it('accepts both objects and classes', function () {
    expect(uses_trait(new Foo, FirstTrait::class))->toBeTrue();
    expect(uses_trait(new Foo, SecondTrait::class))->toBeFalse();
});

trait FirstTrait {}
trait SecondTrait {}

class Foo
{
    use FirstTrait;
}

class Bar extends Foo
{
    use SecondTrait;
}
