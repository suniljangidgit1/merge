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

ob_start();

$result = array('success' => true, 'errors' => array());

$phpRequiredList = $installer->getSystemRequirementList('php', true);

foreach ($phpRequiredList as $name => $details) {
    if (!$details['acceptable']) {

        switch ($details['type']) {
            case 'version':
                $result['success'] = false;
                $result['errors']['phpVersion'] = $details['required'];
                break;

            default:
                $result['success'] = false;
                $result['errors']['phpRequires'][] = $name;
                break;
        }
    }
}

if ($result['success'] && !empty($_REQUEST['dbName']) && !empty($_REQUEST['hostName']) && !empty($_REQUEST['dbUserName'])) {
    $connect = false;

    $dbName = trim($_REQUEST['dbName']);
    if (strpos($_REQUEST['hostName'],':') === false) {
        $_REQUEST['hostName'] .= ":";
    }
    list($hostName, $port) = explode(':', trim($_REQUEST['hostName']));
    $dbUserName = trim($_REQUEST['dbUserName']);
    $dbUserPass = trim($_REQUEST['dbUserPass']);

    $databaseParams = [
        'host' => $hostName,
        'port' => $port,
        'user' => $dbUserName,
        'password' => $dbUserPass,
        'dbname' => $dbName,
    ];

    $isConnected = true;

    try {
        $installer->checkDatabaseConnection($databaseParams, true);
    } catch (\Exception $e) {
        $isConnected = false;
        $result['success'] = false;
        $result['errors']['dbConnect']['errorCode'] = $e->getCode();
        $result['errors']['dbConnect']['errorMsg'] = $e->getMessage();
    }

    if ($isConnected) {
        $databaseRequiredList = $installer->getSystemRequirementList('database', true, ['database' => $databaseParams]);

        foreach ($databaseRequiredList as $name => $details) {
            if (!$details['acceptable']) {            

                switch ($details['type']) {
                    case 'version':
                        $result['success'] = false;
                        $result['errors'][$name] = $details['required'];
                        break;

                    default:
                        $result['success'] = false;
                        $result['errors'][$name][] = $name;
                        break;
                }
            }
        }
    }

}

ob_clean();
echo json_encode($result);
