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

namespace Finnova\SelectManagers;

class User extends \Finnova\Core\SelectManagers\Base
{
    protected function access(&$result)
    {
        parent::access($result);

        if (!$this->getUser()->isAdmin()) {
            $result['whereClause'][] = [
                'isActive' => true,
                'type!=' => ['api']
            ];
        }
        if ($this->getAcl()->get('portalPermission') !== 'yes') {
            $result['whereClause'][] = [
                'OR' => [
                    ['type!=' => 'portal'],
                    ['id' => $this->getUser()->id]
                ]
            ];
        }

        if (!$this->getUser()->isSuperAdmin()) {
            $result['whereClause'][] = [
                'type!=' => 'super-admin'
            ];
        }

        $result['whereClause'][] = [
            'type!=' => 'system'
        ];
    }

    protected function filterActive(&$result)
    {
        $result['whereClause'][] = [
            'isActive' => true,
            'type' => ['regular', 'admin']
        ];
    }

    protected function filterActivePortal(&$result)
    {
        $result['whereClause'][] = [
            'isActive' => true,
            'type' => 'portal'
        ];
    }

    protected function filterPortal(&$result)
    {
        $result['whereClause'][] = [
            'type' => 'portal'
        ];
    }

    protected function filterApi(&$result)
    {
        $result['whereClause'][] = [
            'type' => 'api'
        ];
    }

    protected function filterActiveApi(&$result)
    {
        $result['whereClause'][] = [
            'isActive' => true,
            'type' => 'api'
        ];
    }

    protected function filterInternal(&$result)
    {
        $result['whereClause'][] = [
            'type!=' => ['portal', 'api', 'system']
        ];
    }

    protected function boolFilterOnlyMyTeam(&$result)
    {
        $teamIdList = $this->getUser()->getLinkMultipleIdList('teams');

        if (count($teamIdList) === 0) {
            return [
                'id' => null
            ];
        }

        $this->addLeftJoin(['teams', 'teamsOnlyMyFilter'], $result);
        $this->setDistinct(true, $result);
        return [
            'teamsOnlyMyFilterMiddle.teamId' => $teamIdList
        ];
    }

    protected function accessOnlyOwn(&$result)
    {
        $result['whereClause'][] = [
            'id' => $this->getUser()->id
        ];
    }

    protected function accessPortalOnlyOwn(&$result)
    {
        $result['whereClause'][] = [
            'id' => $this->getUser()->id
        ];
    }

    protected function accessOnlyTeam(&$result)
    {
        $this->setDistinct(true, $result);
        $this->addLeftJoin(['teams', 'teamsAccess'], $result);
        $result['whereClause'][] = [
            'OR' => [
                'teamsAccess.id' => $this->getUser()->getLinkMultipleIdList('teams'),
                'id' => $this->getUser()->id
            ]
        ];
    }
}
