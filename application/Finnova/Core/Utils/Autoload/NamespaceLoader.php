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

namespace Finnova\Core\Utils\Autoload;

use Finnova\Core\Utils\Util;

class NamespaceLoader
{
    private $config;

    private $fileManager;

    private $classLoader;

    private $namespaces;

    protected $autoloadFilePath = 'vendor/autoload.php';

    /**
     * Namespace files
     * @var array
     */
    protected $namespacesPaths = [
        'psr-4' => 'vendor/composer/autoload_psr4.php',
        'psr-0' => 'vendor/composer/autoload_namespaces.php',
        'classmap' => 'vendor/composer/autoload_classmap.php',
    ];

    /**
     * Method names in ClassLoader
     * @var array
     */
    protected $methodNameMap = [
        'psr-4' => 'addPsr4',
        'psr-0' => 'add',
        'classmap' => 'addClassMap',
    ];

    protected $vendorNamespaces;

    protected $vendorNamespacesCacheFile = 'data/cache/{*}/application/autoload-vendor-namespaces.php';

    public function __construct(\Finnova\Core\Utils\Config $config, \Finnova\Core\Utils\File\Manager $fileManager)
    {
        $this->config = $config;
        $this->fileManager = $fileManager;
        $this->classLoader = new \Composer\Autoload\ClassLoader();
    }

    protected function getConfig()
    {
        return $this->config;
    }

    protected function getFileManager()
    {
        return $this->fileManager;
    }

    protected function getClassLoader()
    {
        return $this->classLoader;
    }

    public function register(array $autoloadList)
    {
        $classLoader = $this->getClassLoader();
        $this->addListToClassLoader($classLoader, $autoloadList);
        $classLoader->register(true);
    }

    protected function loadNamespaces($basePath = '')
    {
        $namespaces = [];

        foreach ($this->namespacesPaths as $type => $path) {
            $mapFile = Util::concatPath($basePath, $path);
            if (file_exists($mapFile)) {
                $map = require($mapFile);
                if (!empty($map) && is_array($map)) {
                    $namespaces[$type] = $map;
                }
            }
        }

        return $namespaces;
    }

    protected function getNamespaces()
    {
        if (!$this->namespaces) {
            $this->namespaces = $this->loadNamespaces();
        }

        return $this->namespaces;
    }

    protected function getNamespaceList($type, $default = [])
    {
        $namespaces = $this->getNamespaces();

        if (isset($namespaces[$type])) {
            return array_keys($namespaces[$type]);
        }

        return $default;
    }

    protected function addNamespace($type, $name, $path)
    {
        if (!$this->namespaces) {
            $this->getNamespaces();
        }

        $this->namespaces[$type][$name] = (array) $path;
    }

    protected function hasNamespace($type, $name)
    {
        if (in_array($name, $this->getNamespaceList($type))) {
            return true;
        }

        if (!preg_match('/\\\$/', $name)) {
            $name = $name . '\\';
            if (in_array($name, $this->getNamespaceList($type))) {
                return true;
            }
        }

        return false;
    }

    protected function addListToClassLoader($classLoader, array $list, $skipVendorNamespaces = false)
    {
        foreach ($this->methodNameMap as $type => $methodName) {
            if (!isset($list[$type])) continue;

            if (!method_exists($classLoader, $methodName)) {
                $GLOBALS['log']->warning('Autoload: ClassLoader method ['. $methodName .'] is not found.');
                continue;
            }

            foreach ($list[$type] as $prefix => $path) {
                if (!$skipVendorNamespaces) {
                    $vendorNamespaces = $this->getVendorNamespaces($path);
                    if (!empty($vendorNamespaces)) {
                        $this->addListToClassLoader($classLoader, $vendorNamespaces, true);
                    }
                }

                if (!$this->hasNamespace($type, $prefix)) {
                    try {
                        $classLoader->$methodName($prefix, $path);
                        $this->addNamespace($type, $prefix, $path);
                    } catch (\Exception $e) {
                        $GLOBALS['log']->warning('Autoload: error adding the namespace ['. $prefix .']');
                    }
                }
            }
        }
    }

    protected function getVendorNamespaces($path)
    {
	include('application/Finnova/Core/Utils/myconfig.php');
	$customDataPath = str_replace('{*}', $cacheDataPath, $this->vendorNamespacesCacheFile);

        if (!isset($this->vendorNamespaces)) {
            $this->vendorNamespaces = [];
	
            if (file_exists($customDataPath) && $this->getConfig()->get('useCache')) {
                $this->vendorNamespaces = $this->getFileManager()->getPhpContents($customDataPath);
                if (!is_array($this->vendorNamespaces)) {
                    $this->vendorNamespaces = [];
                }
            }
        }

        if (!array_key_exists($path, $this->vendorNamespaces)) {
            $vendorPath = $this->findVendorPath($path);
            if ($vendorPath) {
                $this->vendorNamespaces[$path] = $this->loadNamespaces($vendorPath);

                if ($this->getConfig()->get('useCache')) {
                    $this->getFileManager()->putPhpContents($customDataPath, $this->vendorNamespaces);
                }
            }
        }

        if (isset($this->vendorNamespaces[$path])) {
            return $this->vendorNamespaces[$path];
        }
    }

    protected function findVendorPath($path)
    {
        $vendor = Util::concatPath($path, $this->autoloadFilePath);
        if (file_exists($vendor)) {
            return $path;
        }

        $parentDir = dirname($path);
        if (!empty($parentDir) && $parentDir != '.') {
            return $this->findVendorPath($parentDir);
        }
    }
}
