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

namespace Finnova\Core\Upgrades\Actions\Base;
use Finnova\Core\Exceptions\Error;

class Upload extends \Finnova\Core\Upgrades\Actions\Base
{
    /**
     * Upload an upgrade/extension package
     *
     * @param  [type] $contents
     * @return string  ID of upgrade/extension process
     */
    public function run($data)
    {
        $processId = $this->createProcessId();

        $GLOBALS['log']->debug('Installation process ['.$processId.']: start upload the package.');

        $this->initialize();

        $this->beforeRunAction();

        $packagePath = $this->getPackagePath();
        $packageArchivePath = $this->getPackagePath(true);

        if (!empty($data)) {
            list($prefix, $contents) = explode(',', $data);
            $contents = base64_decode($contents);
        }

        $res = $this->getFileManager()->putContents($packageArchivePath, $contents);
        if ($res === false) {
            throw new Error('Could not upload the package.');
        }

        $this->unzipArchive();

        $this->isAcceptable();

        $this->afterRunAction();

        $this->finalize();

        $GLOBALS['log']->debug('Installation process ['.$processId.']: end upload the package.');

        return $processId;
    }
}