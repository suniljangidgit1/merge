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
use \Finnova\Core\Exceptions\NotFound;

class LeadCapture extends \Finnova\Core\Controllers\Record
{
    public function postActionLeadCapture($params, $data, $request, $response)
    {
        if (empty($params['apiKey'])) throw new BadRequest('No API key provided.');
        if (empty($data)) throw new BadRequest('No payload provided.');

        $allowOrigin = $this->getConfig()->get('leadCaptureAllowOrigin', '*');
        $response->headers->set('Access-Control-Allow-Origin', $allowOrigin);

        return $this->getRecordService()->leadCapture($params['apiKey'], $data);
    }

    public function optionsActionLeadCapture($params, $data, $request, $response)
    {
        if (empty($params['apiKey'])) throw new BadRequest('No API key provided.');

        if (!$this->getRecordService()->isApiKeyValid($params['apiKey'])) {
            throw new NotFound();
        }

        $allowOrigin = $this->getConfig()->get('leadCaptureAllowOrigin', '*');

        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept');
        $response->headers->set('Access-Control-Allow-Origin', $allowOrigin);
        $response->headers->set('Access-Control-Allow-Methods', 'POST');

        return true;
    }

    public function postActionGenerateNewApiKey($params, $data, $request)
    {
        if (empty($data->id)) throw new BadRequest();

        return $this->getRecordService()->generateNewApiKeyForEntity($data->id)->getValueMap();
    }

    public function getActionSmtpAccountDataList()
    {
        if (!$this->getUser()->isAdmin()) throw new Forbidden();

        return $this->getServiceFactory()->create('LeadCapture')->getSmtpAccountDataList();
    }
}
