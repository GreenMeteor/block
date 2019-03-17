<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

use humhub\components\Application;
use humhub\modules\user\controllers\AccountController;
use humhub\modules\user\widgets\AccountMenu;

/** @noinspection MissedFieldInspection */
return [
    'id' => 'block-modules',
    'class' => 'humhub\modules\blockmodules\Module',
    'namespace' => 'humhub\modules\blockmodules',
    'events' => [
        [AccountController::class, AccountController::EVENT_BEFORE_ACTION, ['\humhub\modules\blockmodules\Events', 'onControllerAction']],
        [AccountMenu::class, AccountMenu::EVENT_BEFORE_RUN, ['\humhub\modules\blockmodules\Events', 'onAccountMenu']]
    ]
];
?>
