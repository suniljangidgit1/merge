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

namespace Finnova\Core\Utils\Authentication\TwoFA;

use \Finnova\Core\Utils\Config;
use \Finnova\Core\ORM\EntityManager;
use \Finnova\Core\Utils\Auth;
use \Finnova\Core\Container;
use \Finnova\Entities\User;

abstract class Base implements \Finnova\Core\Interfaces\Injectable
{
    use \Finnova\Core\Traits\Injectable;

    protected $dependencyList = [
        'config',
        'entityManager',
    ];

    abstract public function verifyCode(User $user, string $code) : bool;

    public function getLoginData(User $user) : array
    {
        return [];
    }
}
