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

namespace Finnova\EntryPoints;

use \Finnova\Core\Exceptions\NotFound;
use \Finnova\Core\Exceptions\Forbidden;
use \Finnova\Core\Exceptions\BadRequest;

class Attachment extends \Finnova\Core\EntryPoints\Base
{
    public static $authRequired = true;

    protected $allowedFileTypes = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/webp',
    ];

    public function run()
    {
        $id = $_GET['id'];
        if (empty($id)) {
            throw new BadRequest();
        }

        $attachment = $this->getEntityManager()->getEntity('Attachment', $id);

        if (!$attachment) {
            throw new NotFound();
        }

        if (!$this->getAcl()->checkEntity($attachment)) {
            throw new Forbidden();
        }

        $fileName = $this->getEntityManager()->getRepository('Attachment')->getFilePath($attachment);

        if (!file_exists($fileName)) {
            throw new NotFound();
        }

        $fileType = $attachment->get('type');

        if (!in_array($fileType, $this->allowedFileTypes)) {
            throw new Forbidden("EntryPoint Attachment: Not allowed type {$fileType}.");
        }

        if ($attachment->get('type')) {
            header('Content-Type: ' . $fileType);
        }

        header('Pragma: public');
        header('Content-Length: ' . filesize($fileName));
        readfile($fileName);
        exit;
    }
}
