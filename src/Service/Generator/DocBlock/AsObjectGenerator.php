<?php


namespace EvoMark\LaravelActionsIdeHelper\Service\Generator\DocBlock;

use Lorisleiva\Actions\Concerns\AsObject;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Php\Argument;
use phpDocumentor\Reflection\TypeResolver;
use EvoMark\LaravelActionsIdeHelper\Service\ActionInfo;

class AsObjectGenerator extends DocBlockGeneratorBase implements DocBlockGeneratorInterface
{
    protected string $context = AsObject::class;

    /**
     * @param  \EvoMark\LaravelActionsIdeHelper\Service\ActionInfo  $info
     * @return \phpDocumentor\Reflection\DocBlock\Tag[]
     */
    #[\Override]
    public function generate(ActionInfo $info): array
    {
        $method = $this->findMethod($info, 'handle');
        return $method == null ? [] : [new \EvoMark\LaravelActionsIdeHelper\Service\Generator\DocBlock\Custom\Method('run', $method->getArguments(), $method->getReturnType(), true)];
    }
}
