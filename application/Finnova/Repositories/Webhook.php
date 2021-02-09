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

namespace Finnova\Repositories;

use Finnova\ORM\Entity;

class Webhook extends \Finnova\Core\ORM\Repositories\RDB
{
    protected $hooksDisabled = true;

    protected $processFieldsAfterSaveDisabled = true;

    protected $processFieldsBeforeSaveDisabled = true;

    protected $processFieldsAfterRemoveDisabled = true;

    protected function beforeSave(Entity $entity, array $options = [])
    {
        if ($entity->isNew()) {
            $this->fillSecretKey($entity);
        }
        parent::beforeSave($entity);
        $this->processSettingAdditionalFields($entity);
    }

    protected function fillSecretKey(Entity $entity)
    {
        $secretKey = \Finnova\Core\Utils\Util::generateKey();
        $entity->set('secretKey', $secretKey);
    }

    protected function processSettingAdditionalFields(Entity $entity)
    {
        $event = $entity->get('event');
        if (!$event) return;

        $arr = explode('.', $event);
        if (count($arr) !== 2 && count($arr) !== 3) return;

        $arr = explode('.', $event);
        $entityType = $arr[0];
        $type = $arr[1];

        $entity->set('entityType', $entityType);
        $entity->set('type', $type);

        $field = null;

        if (!$entityType) return;

        if ($type === 'fieldUpdate') {
            if (count($arr) == 3) {
                $field = $arr[2];
            }
            $entity->set('field', $field);
        } else {
            $entity->set('field', null);
        }
    }
}
