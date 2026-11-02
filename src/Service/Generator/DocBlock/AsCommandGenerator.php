<?php


namespace EvoMark\LaravelActionsIdeHelper\Service\Generator\DocBlock;

use Lorisleiva\Actions\Concerns\AsCommand;
use EvoMark\LaravelActionsIdeHelper\Service\ActionInfo;

class AsCommandGenerator extends DocBlockGeneratorBase implements DocBlockGeneratorInterface
{
    protected string $context = AsCommand::class;
    /**
     * @inheritDoc
     */
    #[\Override]
    public function generate(ActionInfo $info): array
    {
        return [];
    }
}
