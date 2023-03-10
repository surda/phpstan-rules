<?php declare(strict_types=1);

namespace Tests\Surda\PHPStan\Rules;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use Surda\PHPStan\Rules\DisallowedFunctionCallsRule;

class DisallowedFunctionCallsRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new DisallowedFunctionCallsRule($this->createReflectionProvider());
    }

    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/strict-calls.php'], [
            [
                'Call to function dump() is not allowed.',
                5,
            ],
            [
                'Call to function bdump() is not allowed.',
                6,
            ],
            [
                'Call to function dumpe() is not allowed.',
                7,
            ],
        ]);
    }
}