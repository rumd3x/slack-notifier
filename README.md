# slack-notifier
Wrapper for sending customized channel notifications using slack.

## Install
```
composer require rumd3x/slack-notifier
```

## Usage
```php
<?php
$slack = new Rumd3x\Slack\Notifier('SLACK-API-KEY');

$notification = new Rumd3x\Slack\Notification('message text', 'channel', 'api-user');

// Optional - Add attachments
$attachment1 = new Rumd3x\Slack\Attachment('attachment text');
$attachment1->withColor(Rumd3x\Slack\Attachment::COLOR_DEFAULT); // Optional
$attachment1->withFooter('footnote'); // Optional
// Optionally add fields to your attachments
$attachment1 = new Rumd3x\Slack\Field('type_short_or_full', 'field_title', 'description_optional');
$attachment1->addField($attachment1);

$notification->attach($attachment1);

$slack->notify($notification);
```
