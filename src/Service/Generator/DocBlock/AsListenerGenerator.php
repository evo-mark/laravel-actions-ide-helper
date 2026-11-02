<?php


namespace EvoMark\LaravelActionsIdeHelper\Service\Generator\DocBlock;

use Lorisleiva\Actions\Concerns\AsListener;
use EvoMark\LaravelActionsIdeHelper\Service\ActionInfo;

class AsListenerGenerator extends DocBlockGeneratorBase implements DocBlockGeneratorInterface
{
    protected string $context = AsListener::class;
    /**
     * @inheritDoc
     */
    #[\Override]
    public function generate(ActionInfo $info): array
    {
        return [];
    }
}
