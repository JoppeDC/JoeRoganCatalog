<?php

namespace App\Command;

use App\Service\Sync\YoutubeSync;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class YoutubeSyncCommand extends Command
{
    protected static $defaultName = 'youtube:sync-joe';

    /**
     * @var YoutubeSync
     */
    private $youtubeSync;

    public function __construct(?string $name = null, YoutubeSync $youtubeSync)
    {
        $this->youtubeSync = $youtubeSync;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setDescription("Syncs all Joe Rogan Experience's.");
        $this->setHelp("This command wil sync all the Joe Rogan Experience episode's.");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->youtubeSync->syncPlaylist('UUzQUP1qoWDoEbmsQxvdjxgQ');
    }
}
