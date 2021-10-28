<?php

it('returns the inner array if a simple array is supplied')
    ->expect(
        variadic_array([['foo', 'bar']])
    )->toBe(['foo', 'bar']);

it('returns the array if a non-simple array is supplied')
    ->expect(
        variadic_array(['foo', 'bar'])
    )->toBe(['foo', 'bar']);
