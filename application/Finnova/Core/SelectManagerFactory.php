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

class SelectManagerFactory
{
    private $entityManager;

    private $user;

    private $acl;

    private $metadata;

    private $injectableFactory;

    private $FieldManagerUtil;

    public function __construct(
        $entityManager,
        \Finnova\Entities\User $user,
        Acl $acl,
        AclManager $aclManager,
        Utils\Metadata $metadata,
        Utils\Config $config,
        Utils\FieldManagerUtil $fieldManagerUtil,
        InjectableFactory $injectableFactory
    )
    {
        $this->entityManager = $entityManager;
        $this->user = $user;
        $this->acl = $acl;
        $this->aclManager = $aclManager;
        $this->metadata = $metadata;
        $this->config = $config;
        $this->fieldManagerUtil = $fieldManagerUtil;
        $this->injectableFactory = $injectableFactory;
    }

    public function create(string $entityType, ?\Finnova\Entities\User $user = null) : \Finnova\Core\SelectManagers\Base
    {
        $normalizedName = Util::normilizeClassName($entityType);

        $className = '\\Finnova\\Custom\\SelectManagers\\' . $normalizedName;
        if (!class_exists($className)) {
            $moduleName = $this->metadata->getScopeModuleName($entityType);
            if ($moduleName) {
                $className = '\\Finnova\\Modules\\' . $moduleName . '\\SelectManagers\\' . $normalizedName;
            } else {
                $className = '\\Finnova\\SelectManagers\\' . $normalizedName;
            }
            if (!class_exists($className)) {
                $className = '\\Finnova\\Core\\SelectManagers\\Base';
            }
        }

        if ($user) {
            $acl = $this->aclManager->createUserAcl($user);
        } else {
            $acl = $this->acl;
            $user = $this->user;
        }

        $selectManager = new $className(
            $this->entityManager,
            $user,
            $acl,
            $this->aclManager,
            $this->metadata,
            $this->config,
            $this->fieldManagerUtil,
            $this->injectableFactory
        );
        $selectManager->setEntityType($entityType);

        return $selectManager;
    }
}
