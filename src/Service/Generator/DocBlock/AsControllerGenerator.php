<?php


namespace EvoMark\LaravelActionsIdeHelper\Service\Generator\DocBlock;

use Lorisleiva\Actions\Concerns\AsController;
use EvoMark\LaravelActionsIdeHelper\Service\ActionInfo;

class AsControllerGenerator extends DocBlockGeneratorBase implements DocBlockGeneratorInterface
{
    protected string $context = AsController::class;
    /**
     * @inheritDoc
     */
    #[\Override]
    public function generate(ActionInfo $info): array
    {
        return [];
    }
}
