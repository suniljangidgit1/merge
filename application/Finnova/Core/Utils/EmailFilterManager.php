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

namespace Finnova\Core\Utils;

use \Finnova\Core\ORM\EntityManager;
use \Finnova\Entities\Email;

class EmailFilterManager
{
    private $entityManager;

    private $data = [];

    protected $filtersMatcher = null;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    protected function getEntityManager()
    {
        return $this->entityManager;
    }

    protected function getFiltersMatcher()
    {
        if (!$this->filtersMatcher) {
            $this->filtersMatcher = new \Finnova\Core\Mail\FiltersMatcher();
        }
        return $this->filtersMatcher;
    }

    public function getMatchingFilter(Email $email, $userId)
    {
        if (!array_key_exists($userId, $this->data)) {
            $emailFilterList = $this->getEntityManager()->getRepository('EmailFilter')->where([
                'parentId' => $userId,
                'parentType' => 'User'
            ])->order('LIST:action:Skip,Move to Folder')->find();
            $this->data[$userId] = $emailFilterList;
        }
        foreach ($this->data[$userId] as $emailFilter) {
            if ($this->getFiltersMatcher()->match($email, $emailFilter)) {
                return $emailFilter;
            }
        }
    }
}
