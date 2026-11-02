<?php

namespace EvoMark\LaravelActionsIdeHelper\Service\Generator\DocBlock;

use EvoMark\LaravelActionsIdeHelper\Service\ActionInfo;

interface DocBlockGeneratorInterface
{
    public static function create(): self;

    /**
     * @param  \EvoMark\LaravelActionsIdeHelper\Service\ActionInfo  $info
     * @return \phpDocumentor\Reflection\DocBlock\Tag[]
     */
    public function generate(ActionInfo $info): array;
}
