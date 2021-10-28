<?php

test("arrays containing multiple items aren't simple arrays")
    ->expect(is_simple_array(['foo', 'bar']))->toBeFalse()
    ->expect(is_simple_array([['foo'], ['bar']]))->toBeFalse();

test("arrays containing a non-array aren't simple arrays")
    ->expect(
        is_simple_array(['foo'])
    )->toBeFalse();

test("arrays containing a single array are simple arrays")
    ->expect(
        is_simple_array([['foo', 'bar']])
    )->toBeTrue();
