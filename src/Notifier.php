<?php
namespace Rumd3x\Slack;

use JoliCode\Slack\ClientFactory;
use Rumd3x\Standards\NotifierInterface;

class Notifier implements NotifierInterface
{
    /**
     * Slack integration client instance
     *
     * @var \JoliCode\Slack\Api\Client
     */
    private $client;

    /**
     * @SuppressWarnings(PHPMD.StaticAccess)
     * @param string $slackKey
     */
    public function __construct(string $slackKey)
    {
        $this->client = ClientFactory::create($slackKey);
    }

    /**
     * @param Notification $notification
     * @return null|\JoliCode\Slack\Api\Model\ChatPostMessagePostResponse200|\JoliCode\Slack\Api\Model\ChatPostMessagePostResponsedefault|\Psr\Http\Message\ResponseInterface
     */
    public function notify(Notification $notification)
    {
        return $this->client->chatPostMessage($notification->toArray());
    }
}
