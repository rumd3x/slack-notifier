<?php
namespace Rumd3x\Slack;

use Rumd3x\Standards\NotificationInterface;

class Notification implements NotificationInterface
{
    public $text;
    public $channel;
    public $username;
    public $attachments;

    /**
     * @param string $text
     */
    public function __construct(string $text, string $channel, string $username)
    {
        $this->text = $text;
        $this->channel = $channel;
        $this->username = $username;
        $this->attachments = collect();
    }

    /**
     * @param Attachment $attachment
     * @return self
     */
    public function attach(Attachment $attachment)
    {
        $this->attachments->push($attachment);
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = [
            'text' => $this->text,
            'channel' => $this->channel,
        ];

        if (!$this->attachments->isEmpty()) {
            $array['attachments'] = json_encode(
                $this->attachments->map(function ($item) {
                    return $item->toArray();
                })->all()
            );
        }

        return $array;
    }
}
