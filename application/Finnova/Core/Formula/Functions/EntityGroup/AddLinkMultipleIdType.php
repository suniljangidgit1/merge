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

namespace Finnova\Core\Formula\Functions\EntityGroup;

use \Finnova\ORM\Entity;
use \Finnova\Core\Exceptions\Error;

class AddLinkMultipleIdType extends \Finnova\Core\Formula\Functions\Base
{
    public function process(\StdClass $item)
    {
        if (!property_exists($item, 'value')) {
            throw new Error();
        }

        if (!is_array($item->value)) {
            throw new Error();
        }

        if (count($item->value) < 2) {
            throw new Error();
        }

        $link = $this->evaluate($item->value[0]);
        $id = $this->evaluate($item->value[1]);

        if (!is_string($link)) {
            throw new Error();
        }

        if (is_array($id)) {
            $idList = $id;
            foreach ($idList as $id) {
                if (!is_string($id)) {
                    throw new Error();
                }
                $this->getEntity()->addLinkMultipleId($link, $id);
            }
        } else {
            if (!is_string($id)) {
                return;
            }
            $this->getEntity()->addLinkMultipleId($link, $id);
        }
    }
}