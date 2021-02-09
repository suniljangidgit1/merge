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

namespace Finnova\Services;

class Layout extends \Finnova\Core\Services\Base
{
    protected function init()
    {
        $this->addDependency('acl');
        $this->addDependency('layout');
        $this->addDependency('metadata');
    }

    protected function getAcl()
    {
        return $this->getInjection('acl');
    }

    protected function getMetadata()
    {
        return $this->getInjection('metadata');
    }

    public function getForFrontend(string $scope, string $name)
    {
        $dataString = $this->getInjection('layout')->get($scope, $name);

        if (!$dataString) {
            throw new NotFound("Layout {$scope}:{$scope} is not found.");
        }

        if (!$this->getUser()->isAdmin()) {
            if ($name === 'relationships') {
                $data = json_decode($dataString);
                if (is_array($data)) {
                    foreach ($data as $i => $link) {
                        $foreignEntityType = $this->getMetadata()->get(['entityDefs', $scope, 'links', $link, 'entity']);
                        if ($foreignEntityType) {
                            if (!$this->getAcl()->check($foreignEntityType)) {
                                unset($data[$i]);
                            }
                        }
                    }
                    $data = array_values($data);
                    $dataString = json_encode($data);
                }
            }
        }

        return $dataString;
    }
}
