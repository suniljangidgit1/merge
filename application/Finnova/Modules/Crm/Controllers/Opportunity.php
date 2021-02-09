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

namespace Finnova\Modules\Crm\Controllers;

use \Finnova\Core\Exceptions\Error;
use \Finnova\Core\Exceptions\Forbidden;
use \Finnova\Core\Exceptions\BadRequest;

class Opportunity extends \Finnova\Core\Controllers\Record
{

    public function actionReportByLeadSource($params, $data, $request)
    {
        $level = $this->getAcl()->getLevel('Opportunity', 'read');
        if (!$level || $level == 'no') {
            throw new Forbidden();
        }

        $dateFrom = $request->get('dateFrom');
        $dateTo = $request->get('dateTo');
        $dateFilter = $request->get('dateFilter');

        return $this->getService('Opportunity')->reportByLeadSource($dateFilter, $dateFrom, $dateTo);
    }

    public function actionReportByStage($params, $data, $request)
    {
        $level = $this->getAcl()->getLevel('Opportunity', 'read');
        if (!$level || $level == 'no') {
            throw new Forbidden();
        }

        $dateFrom = $request->get('dateFrom');
        $dateTo = $request->get('dateTo');
        $dateFilter = $request->get('dateFilter');

        return $this->getService('Opportunity')->reportByStage($dateFilter, $dateFrom, $dateTo);
    }

    public function actionReportSalesByMonth($params, $data, $request)
    {
        $level = $this->getAcl()->getLevel('Opportunity', 'read');
        if (!$level || $level == 'no') {
            throw new Forbidden();
        }

        $dateFrom = $request->get('dateFrom');
        $dateTo = $request->get('dateTo');
        $dateFilter = $request->get('dateFilter');

        return $this->getService('Opportunity')->reportSalesByMonth($dateFilter, $dateFrom, $dateTo);
    }

    public function actionReportSalesPipeline($params, $data, $request)
    {
        $level = $this->getAcl()->getLevel('Opportunity', 'read');
        if (!$level || $level == 'no') {
            throw new Forbidden();
        }

        $dateFrom = $request->get('dateFrom');
        $dateTo = $request->get('dateTo');
        $dateFilter = $request->get('dateFilter');
        $useLastStage = $request->get('useLastStage') === 'true';

        return $this->getService('Opportunity')->reportSalesPipeline($dateFilter, $dateFrom, $dateTo, $useLastStage);
    }

    public function getActionEmailAddressList($params, $data, $request)
    {
        if (!$request->get('id')) throw new BadRequest();
        if (!$this->getAcl()->checkScope($this->name, 'read')) throw new Forbidden();

        return $this->getRecordService()->getEmailAddressList($request->get('id'));
    }
}