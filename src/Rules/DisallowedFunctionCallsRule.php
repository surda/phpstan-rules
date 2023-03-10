<?php declare(strict_types=1);

namespace Surda\PHPStan\Rules;

use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Name;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\ReflectionProvider;
use PHPStan\Rules\Rule;
use function sprintf;
use function strtolower;

class DisallowedFunctionCallsRule implements Rule
{
    /** @var string[] */
    private $functions = [
        'dump',
        'dumpe',
        'bdump',
    ];

    /** @var ReflectionProvider */
    private $reflectionProvider;

    public function __construct(ReflectionProvider $reflectionProvider)
    {
        $this->reflectionProvider = $reflectionProvider;
    }

    public function getNodeType(): string
    {
        return FuncCall::class;
    }

    /**
     * @param FuncCall $node
     * @return string[] errors
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (!$node->name instanceof Name) {
            return [];
        }

        $functionName = $this->reflectionProvider->resolveFunctionName($node->name, $scope);
        if ($functionName === null) {
            return [];
        }

        $functionName = strtolower($functionName);
        if (!in_array($functionName, $this->functions, true)) {
            return [];
        }

        return [sprintf('Call to function %s() is not allowed.', $functionName)];
    }
}