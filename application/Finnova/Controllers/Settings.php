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

use Finnova\Core\Exceptions\Forbidden;
use Finnova\Core\Exceptions\BadRequest;

class Settings extends \Finnova\Core\Controllers\Base
{
    protected function getConfigData()
    {
        $data = $this->getServiceFactory()->create('Settings')->getConfigData();

        $data->jsLibs = $this->getMetadata()->get(['app', 'jsLibs']);

        unset($data->loginView);
        $loginView = $this->getMetadata()->get(['clientDefs', 'App', 'loginView']);
        if ($loginView) {
            $data->loginView = $loginView;
        }

        return $data;
    }

    public function actionRead($params, $data)
    {
        return $this->getConfigData();
    }

    public function actionUpdate($params, $data, $request)
    {
        return $this->actionPatch($params, $data, $request);
    }

    public function actionPatch($params, $data, $request)
    {
        if (!$this->getUser()->isAdmin()) {
            throw new Forbidden();
        }

        if (!$request->isPut() && !$request->isPatch()) {
            throw new BadRequest();
        }

        $this->getServiceFactory()->create('Settings')->setConfigData($data);

        return $this->getConfigData();
    }

    public function postActionTestLdapConnection($params, $data)
    {
        if (!$this->getUser()->isAdmin()) {
            throw new Forbidden();
        }

        if (!isset($data->password)) {
            $data->password = $this->getConfig()->get('ldapPassword');
        }

        $data = get_object_vars($data);

        $ldapUtils = new \Finnova\Core\Utils\Authentication\LDAP\Utils();
        $options = $ldapUtils->normalizeOptions($data);

        $ldapClient = new \Finnova\Core\Utils\Authentication\LDAP\Client($options);
        $ldapClient->bind(); //an exception if no connection

        return true;
    }
}
