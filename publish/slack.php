<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Slack Hook
    |--------------------------------------------------------------------------
    |
    | The webhook url used to send slack notifications
    |
    */

    'webhook' => env('SLACK_WEBHOOK', null),


    /*
    |--------------------------------------------------------------------------
    | Slack Default Channel
    |--------------------------------------------------------------------------
    |
    | The default channel that will be use in case there is no channel set
    |
    */
    'default_channel' => env('SLACK_DEFAULT_CHANNEL', "task-errors"),

];
