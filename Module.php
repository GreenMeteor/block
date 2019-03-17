<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\blockmodules;

use Yii;
use yii\helpers\Url;

class Module extends \humhub\components\Module
{

    /**
     * @var array a map of controllerId.actionId pairs which are forbidden
     */
    public $forbiddenActions = [
        'account.edit.modules',
    ];

    /**
     * @inheritdoc
     */
    public $resourcesPath = 'resources';

}
