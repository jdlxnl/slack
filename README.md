# Package
Ads some decoration and utility functions around Laravels slack notification channel.
Mainly focussed around Personas as sender, and functionality to build
custom payloads.

## Installation
Add the package by loading it through composer.

```shell
composer require jdlxnl/slack
```

## Usage
```php
    use Jdlx\Slack\Notifications\SlackNotification;
    use Jdlx\Slack\Sender;
    use Jdlx\Slack\Slack;
    use Jdlx\Task\Slack\Attachment\TaskFailure;

    $builder = (new TaskFailure())->withJob($job)->withTaskLog($log);

    Slack::channel()->notify(
            new SlackNotification(
                $title,
                Sender::persona(Sender::TASK_RUNNER),
                $builder->toSlackAttachment()
            ));
```

