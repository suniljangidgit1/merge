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

use \Finnova\Core\Exceptions\Forbidden;
use \Finnova\Core\Exceptions\BadRequest;

class EmailAccount extends \Finnova\Core\Controllers\Record
{
    public function postActionGetFolders($params, $data)
    {
        print_r($data); die;
        return $this->getRecordService()->getFolders([
            'host' => $data->host ?? null,
            'port' => $data->port ?? null,
            'ssl' =>  $data->ssl ?? false,
            'username' => $data->username ?? null,
            'password' => $data->password ?? null,
            'id' => $data->id ?? null,
            'emailAddress' => $data->emailAddress ?? null,
            'userId' => $data->userId ?? null,
        ]);
    }

    protected function checkControllerAccess()
    {
        if (!$this->getAcl()->check('EmailAccountScope')) {
            throw new Forbidden();
        }
    }

    public function postActionTestConnection($params, $data, $request)
    {
        if (is_null($data->password)) {
            $emailAccount = $this->getEntityManager()->getEntity('EmailAccount', $data->id);
            if (!$emailAccount || !$emailAccount->id) {
                throw new Error();
            }

            if ($emailAccount->get('assignedUserId') != $this->getUser()->id && !$this->getUser()->isAdmin()) {
                throw new Forbidden();
            }

            $data->password = $this->getContainer()->get('crypt')->decrypt($emailAccount->get('password'));
        }

        return $this->getRecordService()->testConnection(get_object_vars($data));
    }
}
