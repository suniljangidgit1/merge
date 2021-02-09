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

namespace Finnova\Controllers;

use Finnova\Core\Exceptions\Error;
use Finnova\Core\Exceptions\Forbidden;
use Finnova\Core\Exceptions\NotFound;
use Finnova\Core\Exceptions\BadRequest;

class DataPrivacy extends \Finnova\Core\Controllers\Base
{
    protected function checkControllerAccess()
    {
        if ($this->getAcl()->get('dataPrivacyPermission') === 'no') {
            throw new Forbidden();
        }
    }

    public function postActionErase($params, $data)
    {
        if (empty($data->entityType) || empty($data->id) || empty($data->fieldList) || !is_array($data->fieldList)) {
            throw new BadRequest();
        }

        return $this->getServiceFactory()->create('DataPrivacy')->erase($data->entityType, $data->id, $data->fieldList);
    }

}
