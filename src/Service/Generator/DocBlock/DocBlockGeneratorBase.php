<?php


namespace EvoMark\LaravelActionsIdeHelper\Service\Generator\DocBlock;

use phpDocumentor\Reflection\Type;
use phpDocumentor\Reflection\TypeResolver;
use EvoMark\LaravelActionsIdeHelper\Service\ActionInfo;

class DocBlockGeneratorBase implements DocBlockGeneratorInterface
{
    #[\Override]
    public static function create(): static
    {
        return new static();
    }

    protected function resolveType(string $type): Type
    {
        return (new TypeResolver())->resolve($type);
    }

    protected function resolveAsUnionType(string ...$types): Type
    {
        return (new TypeResolver())->resolve(implode('|', $types));
    }

    #[\Override]
    public function generate(ActionInfo $info): array
    {
        return [];
    }

    protected function findMethod(ActionInfo $info, string ...$methods): ?\phpDocumentor\Reflection\Php\Method
    {
        foreach ($methods as $method) {
            $m = collect($info->classInfo->getMethods())
                ->filter(fn(\phpDocumentor\Reflection\Php\Method $m) => $m->getName() == $method)
                ->first();
            if (!empty($m)) {
                return $m;
            }
        }
        return null;
    }
}
