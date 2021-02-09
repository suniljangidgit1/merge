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

class Module
{
    private $fileManager;

    private $useCache;

    private $unifier;

    protected $data = null;

    protected $cacheFile = 'data/cache/{*}/application/modules.php';

    protected $paths = array(
        'corePath' => 'application/Finnova/Resources/module.json',
        'modulePath' => 'application/Finnova/Modules/{*}/Resources/module.json',
        'customPath' => 'custom/Finnova/Custom/{*}/Resources/module.json',
    );

    public function __construct(File\Manager $fileManager, $useCache = false)
    {
        $this->fileManager = $fileManager;

        $this->unifier = new \Finnova\Core\Utils\File\FileUnifier($this->fileManager);

        $this->useCache = $useCache;
    }

    protected function getConfig()
    {
        return $this->config;
    }

    protected function getFileManager()
    {
        return $this->fileManager;
    }

    protected function getUnifier()
    {
        return $this->unifier;
    }

    public function get($key = '', $returns = null)
    {
        if (!isset($this->data)) {
            $this->init();
        }

        if (empty($key)) {
            return $this->data;
        }

        return Util::getValueByKey($this->data, $key, $returns);
    }

    public function getAll()
    {
        return $this->get();
    }

    protected function init()
    {
	include('application/Finnova/Core/Utils/myconfig.php');
	$customDataPath = str_replace('{*}', $cacheDataPath, $this->cacheFile);

        if (file_exists($customDataPath) && $this->useCache) {
            $this->data = $this->getFileManager()->getPhpContents($customDataPath);
        } else {
            $this->data = $this->getUnifier()->unify($this->paths, true);

            if ($this->useCache) {
                $result = $this->getFileManager()->putPhpContents($customDataPath, $this->data);
                if ($result == false) {
                    throw new \Finnova\Core\Exceptions\Error('Module - Cannot save unified modules.');
                }
            }
        }
    }
}