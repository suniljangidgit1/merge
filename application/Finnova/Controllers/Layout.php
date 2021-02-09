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

use Finnova\Core\Utils as Utils;
use \Finnova\Core\Exceptions\NotFound;
use \Finnova\Core\Exceptions\Error;
use \Finnova\Core\Exceptions\Forbidden;
use \Finnova\Core\Exceptions\BadRequest;

class Layout extends \Finnova\Core\Controllers\Base
{
    public function actionRead($params, $data)
    {
        return $this->getServiceFactory()->create('Layout')->getForFrontend($params['scope'], $params['name']);
    }

    public function actionUpdate($params, $data, $request)
    {
        if (is_object($data)) {
            $data = get_object_vars($data);
        }

        if (!$this->getUser()->isAdmin()) {
            throw new Forbidden();
        }

        if (!$request->isPut() && !$request->isPatch()) {
            throw new BadRequest();
        }

        $layoutManager = $this->getContainer()->get('layout');
        $layoutManager->set($data, $params['scope'], $params['name']);
        $result = $layoutManager->save();

        if ($result === false) {
            throw new Error("Error while saving layout.");
        }

        $this->getContainer()->get('dataManager')->updateCacheTimestamp();

        return $layoutManager->get($params['scope'], $params['name']);
    }

    public function actionPatch($params, $data, $request)
    {
        return $this->actionUpdate($params, $data, $request);
    }

    public function postActionResetToDefault($params, $data, $request)
    {
        if (!$this->getUser()->isAdmin()) {
            throw new Forbidden();
        }

        if (empty($data->scope) || empty($data->name)) {
            throw new BadRequest();
        }

        $this->getContainer()->get('dataManager')->updateCacheTimestamp();

        return $this->getContainer()->get('layout')->resetToDefault($data->scope, $data->name);
    }
}
