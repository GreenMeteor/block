<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

use humhub\modules\blockmodules\Events;
use humhub\modules\user\controllers\AccountController;
use humhub\modules\user\widgets\AccountMenu;

/** @noinspection MissedFieldInspection */
return [
    'id' => 'blockmodules',
    'class' => 'humhub\modules\blockmodules\Module',
    'namespace' => 'humhub\modules\blockmodules',
    'events' => [
        [
            'class' => AccountController::class,
            'event' => AccountController::EVENT_BEFORE_ACTION,
            'callback' => [Events::class, 'onControllerAction']
        ],
        [
            'class' => AccountMenu::class,
            'event' => AccountMenu::EVENT_BEFORE_RUN,
            'callback' => [Events::class, 'onAccountMenu']
        ],
        [
            'class' => '\humhub\modules\calendar\widgets\CalendarControls',
            'event' => 'beforeRun',
            'callback' => [Events::class, 'onCalendarControlsBeforeRun']
        ],
    ]
];
?>
