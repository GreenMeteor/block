<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\blockmodules;

use humhub\components\Controller;
use humhub\modules\user\widgets\AccountMenu;
use Yii;
use yii\base\ActionEvent;
use yii\helpers\Url;
use yii\web\HttpException;

class Events
{
    public static function onControllerAction(ActionEvent $event)
    {
        /** @var Controller $controller */
        $controller = $event->sender;

        /** @var Module $module */
        $module = Yii::$app->getModule('block-modules');

        if (in_array($controller->id . '.' . $event->action->id, $module->forbiddenActions)) {
            $event->isValid = false;
            $event->result = Yii::$app->response->redirect(['/activity/user']);
        }
    }

    public static function onAccountMenu($event)
    {
        /** @var AccountMenu $accountMenu */
        $accountMenu = $event->sender;

        $accountMenu->deleteItemByUrl(Url::to(['/user/account/edit-modules']));

    }
}
