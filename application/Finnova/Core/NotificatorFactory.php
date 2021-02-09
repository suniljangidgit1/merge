<?php
/************************************************************************
 * This file is part of FinnovaCRM.
 *
 * FinnovaCRM - Open Source CRM application.
 * Copyright (C) 2014-2019 Yuri Kuznetsov, Taras Machyshyn, Oleksiy Avramenko
 * Website: https://www.fincrm.net
 *
 * FinnovaCRM is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * FinnovaCRM is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with FinnovaCRM. If not, see http://www.gnu.org/licenses/.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "FinnovaCRM" word.
 ************************************************************************/

namespace Finnova\Core;

use \Finnova\Core\Exceptions\Error;

use \Finnova\Core\Utils\Util;
use \Finnova\Core\InjectableFactory;

class NotificatorFactory extends InjectableFactory
{
    public function create($entityType)
    {
        $normalizedName = Util::normilizeClassName($entityType);

        $className = '\\Finnova\\Custom\\Notificators\\' . $normalizedName;
        if (!class_exists($className)) {
            $moduleName = $this->getMetadata()->getScopeModuleName($entityType);
            if ($moduleName) {
                $className = '\\Finnova\\Modules\\' . $moduleName . '\\Notificators\\' . $normalizedName;
            } else {
                $className = '\\Finnova\\Notificators\\' . $normalizedName;
            }
            if (!class_exists($className)) {
                $className = '\\Finnova\\Core\\Notificators\\Base';
            }
        }

        $obj = $this->createByClassName($className);
        $obj->setEntityType($entityType);

        return $obj;
    }
}