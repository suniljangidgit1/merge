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
class TemplateFileManager
{
    protected $config;

    protected $metadata;

    protected $fileManager;

    public function __construct(Config $config, Metadata $metadata, File\Manager $fileManager)
    {
        $this->config = $config;
        $this->metadata = $metadata;
        $this->fileManager = $fileManager;
    }

    protected function getConfig()
    {
        return $this->config;
    }

    protected function getMetadata()
    {
        return $this->metadata;
    }

    protected function getFileManager()
    {
        return $this->fileManager;
    }

    public function getTemplate($type, $name, $entityType = null, $defaultModuleName = null)
    {
        $fileName = $this->getTemplateFileName($type, $name, $entityType, $defaultModuleName);

        return file_get_contents($fileName);
    }

    public function saveTemplate($type, $name, $contents, $entityType = null)
    {
	include('application/Finnova/Core/Utils/myconfig.php');
        $language = $this->getConfig()->get('language');
        if ($entityType) {
            $fileName = "custom/Finnova/Custom/{$db}/Resources/templates/{$type}/{$language}/{$entityType}/{$name}.tpl";
        } else {
            $fileName = "custom/Finnova/Custom/{$db}/Resources/templates/{$type}/{$language}/{$name}.tpl";
        }

        $this->getFileManager()->putContents($fileName, $contents);
    }

    public function resetTemplate($type, $name, $entityType = null)
    {
	include('application/Finnova/Core/Utils/myconfig.php');
        $language = $this->getConfig()->get('language');
        if ($entityType) {
            $fileName = "custom/Finnova/Custom/{$db}/Resources/templates/{$type}/{$language}/{$entityType}/{$name}.tpl";
        } else {
            $fileName = "custom/Finnova/Custom/{$db}/Resources/templates/{$type}/{$language}/{$name}.tpl";
        }

        $this->getFileManager()->removeFile($fileName);
    }

    protected function getTemplateFileName($type, $name, $entityType = null, $defaultModuleName = null)
    {
        $language = $this->getConfig()->get('language');
	include('application/Finnova/Core/Utils/myconfig.php');
        if ($entityType) {
            $moduleName = $this->getMetadata()->getScopeModuleName($entityType);

            $fileName = "custom/Finnova/Custom/{$db}/Resources/templates/{$type}/{$language}/{$entityType}/{$name}.tpl";
            if (file_exists($fileName)) return $fileName;

            if ($moduleName) {
                $fileName = "application/Finnova/Modules/{$moduleName}/Resources/templates/{$type}/{$language}/{$entityType}/{$name}.tpl";
                if (file_exists($fileName)) return $fileName;
            }

            $fileName = "application/Finnova/Resources/templates/{$type}/{$language}/{$entityType}/{$name}.tpl";
            if (file_exists($fileName)) return $fileName;
        }

        $fileName = "custom/Finnova/Custom/{$db}/Resources/templates/{$type}/{$language}/{$name}.tpl";
        if (file_exists($fileName)) return $fileName;

        if ($defaultModuleName) {
            $fileName = "application/Finnova/Modules/{$defaultModuleName}/Resources/templates/{$type}/{$language}/{$name}.tpl";
        } else {
            $fileName = "application/Finnova/Resources/templates/{$type}/{$language}/{$name}.tpl";
        }
        if (file_exists($fileName)) return $fileName;

        $language = 'en_US';

        if ($entityType) {
            $fileName = "custom/Finnova/Custom/{$db}/Resources/templates/{$type}/{$language}/{$entityType}/{$name}.tpl";
            if (file_exists($fileName)) return $fileName;

            if ($moduleName) {
                $fileName = "application/Finnova/Modules/{$moduleName}/Resources/templates/{$type}/{$language}/{$entityType}/{$name}.tpl";
                if (file_exists($fileName)) return $fileName;
            }

            $fileName = "application/Finnova/Resources/templates/{$type}/{$language}/{$entityType}/{$name}.tpl";
            if (file_exists($fileName)) return $fileName;
        }

        $fileName = "custom/Finnova/Custom/{$db}/Resources/templates/{$type}/{$language}/{$name}.tpl";
        if (file_exists($fileName)) return $fileName;

        if ($defaultModuleName) {
            $fileName = "application/Finnova/Modules/{$defaultModuleName}/Resources/templates/{$type}/{$language}/{$name}.tpl";
        } else {
            $fileName = "application/Finnova/Resources/templates/{$type}/{$language}/{$name}.tpl";
        }

        return $fileName;
    }
}

