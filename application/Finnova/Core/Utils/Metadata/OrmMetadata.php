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

namespace Finnova\Core\Utils\Metadata;

use Finnova\Core\Utils\Util;

class OrmMetadata
{
    protected $data = array();

    protected $cacheFile = 'data/cache/{*}/application/ormMetadata.php';

    protected $metadata;

    protected $fileManager;

    protected $config;

    protected $useCache;

    public function __construct(\Finnova\Core\Utils\Metadata $metadata, \Finnova\Core\Utils\File\Manager $fileManager, $config)
    {
        $this->metadata = $metadata;
        $this->fileManager = $fileManager;

        $this->useCache = false;
        if ($config instanceof \Finnova\Core\Utils\Config) {
            $this->config = $config;
            $this->useCache = $this->config->get('useCache', false);
        } elseif (is_bool($config)) {
            $this->useCache = $config;
        }
    }

    protected function getConverter()
    {
        if (!isset($this->converter)) {
            $this->converter = new \Finnova\Core\Utils\Database\Converter($this->metadata, $this->fileManager, $this->config);
        }

        return $this->converter;
    }

    protected function getFileManager()
    {
        return $this->fileManager;
    }

    protected function getConfig()
    {
        return $this->config;
    }

    public function clearData()
    {
        $this->ormData = null;
    }

    public function getData($reload = false)
    {
        if (!empty($this->ormData) && !$reload) {
            return $data;
        }
	include('application/Finnova/Core/Utils/myconfig.php');
	$customDataPath = str_replace('{*}', $cacheDataPath, $this->cacheFile);

        if (!file_exists($customDataPath) || !$this->useCache || $reload) {
            $this->data = $this->getConverter()->process();

            if ($this->useCache) {
                $result = $this->getFileManager()->putPhpContents($customDataPath, $this->data);
                if ($result == false) {
                    throw new \Finnova\Core\Exceptions\Error('OrmMetadata::getData() - Cannot save ormMetadata to cache file');
                }
            }
        }

        if (empty($this->data)) {
            $this->data = $this->getFileManager()->getPhpContents($customDataPath);
        }

        return $this->data;
    }

    public function get($key = null, $default = null)
    {
        $result = Util::getValueByKey($this->getData(), $key, $default);
        return $result;
    }
}
