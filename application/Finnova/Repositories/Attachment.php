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

use Finnova\Core\Utils\Util;

use \Aws\S3\S3Client;

class Attachment extends \Finnova\Core\ORM\Repositories\RDB
{
    protected $imageTypeList = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/webp',
    ];

    protected $imageThumbList = [
        'xxx-small',
        'xx-small',
        'x-small',
        'small',
        'medium',
        'large',
        'x-large',
        'xx-large',
    ];

    protected function init()
    {
        parent::init();
        $this->addDependency('container');
        $this->addDependency('config');
    }

    protected function getFileManager()
    {
        return $this->getInjection('container')->get('fileManager');
    }

    protected function getFileStorageManager()
    {
        return $this->getInjection('container')->get('fileStorageManager');
    }

    protected function getConfig()
    {
        return $this->getInjection('config');
    }

    public function beforeSave(Entity $entity, array $options = array())
    {
        parent::beforeSave($entity, $options);

        $storage = $entity->get('storage');
        if (!$storage) {
            $entity->set('storage', $this->getConfig()->get('defaultFileStorage', null));
        }

        if ($entity->isNew()) {
            if (!$entity->has('size') && $entity->has('contents')) {
                $entity->set('size', mb_strlen($entity->get('contents')));
            }
        }
    }

    public function save(Entity $entity, array $options = array())
    {
        $isNew = $entity->isNew();

        if ($isNew) {
            $entity->id = Util::generateId();

            if (!empty($entity->id) && $entity->has('contents')) {
                $contents = $entity->get('contents');
                $storeResult = $this->getFileStorageManager()->putContents($entity, $contents);
                if ($storeResult === false) {
                    throw new \Finnova\Core\Exceptions\Error("Could not store the file");
                }
            }
        }

        $result = parent::save($entity, $options);
        $this->restrictionBeforeSave( $entity,$options, $result );
        
        return $result;
    }

    protected function afterRemove(Entity $entity, array $options = array())
    {
        parent::afterRemove($entity, $options);

        $duplicateCount = $this->where([
            'OR' => [
                [
                    'sourceId' => $entity->getSourceId()
                ],
                [
                    'id' => $entity->getSourceId()
                ]
            ],
        ])->count();

        if ($duplicateCount === 0) {
            $this->getFileStorageManager()->unlink($entity);

            if (in_array($entity->get('type'), $this->imageTypeList)) {
                $this->removeImageThumbs($entity);
            }
        }
    }

    public function removeImageThumbs($entity)
    {
        foreach ($this->imageThumbList as $suffix) {
            $filePath = "data/upload/thumbs/".$entity->getSourceId()."_{$suffix}";
            if ($this->getFileManager()->isFile($filePath)) {
                $this->getFileManager()->removeFile($filePath);
            }
        }
    }

    public function getCopiedAttachment(Entity $entity, $role = null)
    {
        $attachment = $this->get();

        $attachment->set(array(
            'sourceId' => $entity->getSourceId(),
            'name' => $entity->get('name'),
            'type' => $entity->get('type'),
            'size' => $entity->get('size'),
            'role' => $entity->get('role')
        ));

        if ($role) {
            $attachment->set('role', $role);
        }

        $this->save($attachment);

        return $attachment;
    }

    public function getContents(Entity $entity)
    {
        return $this->getFileStorageManager()->getContents($entity);
    }

    public function getFilePath(Entity $entity)
    {
        return $this->getFileStorageManager()->getLocalFilePath($entity);
    }

    public function hasDownloadUrl(Entity $entity)
    {
        return $this->getFileStorageManager()->hasDownloadUrl($entity);
    }

    public function getDownloadUrl(Entity $entity)
    {
        return $this->getFileStorageManager()->getDownloadUrl($entity);
    }

    // To convert folder byte size into GB/MB/KB/byte 
    public function formatSizeUnits( $bytes, $sizeIn = "GB" ) {

        if ( $sizeIn == "GB" ) {
            $bytes = number_format($bytes / 1073741824, 2);
        } elseif ( $sizeIn == "MB" ) {
            $bytes = number_format($bytes / 1048576, 2);
        } elseif ( $sizeIn == "KB" ) {
            $bytes = number_format($bytes / 1024, 2);
        } elseif ( $sizeIn == "BYTES" ) {
            $bytes = $bytes;
        } else {
            $bytes = '0';
        }

        return $bytes;
    }

    // To get domain storage limit 
    public function getDomainStorageLimit() {

        include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
        
        $dbWebName      = "fincrm_web"; // CHANGE DATBASE IF FINCRM WEBSITE DB NAME CHANGED
        
        $connWeb        = mysqli_connect($servername, $username, $password , $dbWebName);
        if (!$connWeb) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // To get domain user limit as per plan
        $sql = "
            SELECT u.u_id,rzom.id,pm.pId,pm.pStorageLimit FROM users as u 
            INNER JOIN rz_order_master as rzom ON u.rz_om_id = rzom.id AND u.u_id = rzom.uId
            INNER JOIN plan_master as pm ON rzom.pId = pm.pId
            WHERE u.u_domain_name = '".trim($dbname)."' ";
        
        $res        = mysqli_query($connWeb, $sql);
        $row        = mysqli_fetch_array($res); 
        // echo "<pre>";print_r($row);die;
        return $count = isset( $row["pStorageLimit"] ) ? $row["pStorageLimit"] : 0 ;
    }

    /* To remove attachment records */
    public function removeLastRecords( $lastId = "" ) {

        include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
        
        $connWeb        = mysqli_connect( $servername, $username, $password , $dbname);
        if (!$connWeb) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = " DELETE FROM `attachment` WHERE `attachment`.`id` = '$lastId' ";
        $res        = mysqli_query($connWeb, $sql);
        return 1;

    }

    // To convert GB to bytes
    public function convertMemorySize( $strval, string $to_unit = 'b' ) {
        
        /*https://stackoverflow.com/questions/2510434/format-bytes-to-kilobytes-megabytes-gigabytes
       */

        $strval    = strtolower(str_replace(' ', '', $strval));
        $val       = floatval($strval);
        $to_unit   = strtolower(trim($to_unit))[0];
        $from_unit = str_replace($val, '', $strval);
        $from_unit = empty($from_unit) ? 'b' : trim($from_unit)[0];
        $units     = 'kmgtph';  // (k)ilobyte, (m)egabyte, (g)igabyte and so on...

        // Convert to bytes
        if ($from_unit !== 'b')
            $val *= 1024 ** (strpos($units, $from_unit) + 1);

        // Convert to unit
        if ($to_unit !== 'b')
            $val /= 1024 ** (strpos($units, $to_unit) + 1);

        return $val;
    }

    // To restrict attachment while upload in CRM 
    public function restrictionBeforeSave( $entity,$options, $attachmentId = "" ) {

        
        require $_SERVER['DOCUMENT_ROOT'].'/task_cron/vendor/autoload.php';
        include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
        
        clearstatcache();
        $size   = $entity->get('size');
        $client = S3Client::factory(array(
            'endpoint' => 'https://s3.us-west-1.wasabisys.com',
            'profile' => 'wasabi',
            'region' => 'us-west-1',
            'version' => 'latest',
            'use_path_style_endpoint' => true,
            'credentials' => [
                'key'    => "GI3UTP02EJ725OAN0YFG",
                'secret' => "CKNVXvmLog113PJwrRU04oyISYmIPznDEwfz4k57",
            ]
        ));

        $s3Size     = 0;
        $bucket     = "fincrm";
        $folder     = isset( $_SERVER["SERVER_NAME"] ) ? $_SERVER["SERVER_NAME"] : ""; 
        $objects    = $client->getIterator('ListObjects', array(
                        "Bucket" => $bucket,
                        "Prefix" => "Production/".$folder."/",
                    ));
        
        $i = 0;
        foreach ($objects as $object) {
            $s3Size = $s3Size+$object['Size'];
        }
     
        $s3BucketSize       = $this->formatSizeUnits($s3Size, "BYTES" );
        $currentFileSize    = $this->formatSizeUnits( $size, "BYTES" );
        $planStorageLimit   = $this->getDomainStorageLimit();
        $finalExisting      = ( (int) $s3BucketSize + (int) $currentFileSize );
        // $finalExisting      = $this->formatSizeUnits( $finalExisting, "GB" );
        $planStorageLimit   = $this->convertMemorySize( $planStorageLimit."Gb", "b" );
        
        if( $finalExisting > $planStorageLimit ) {

            // If limit exceeded delete last records from attachment table
            $this->removeLastRecords( $attachmentId );
            throw new \Finnova\Core\Exceptions\Error("<script>$.alert({ title: 'Alert!', content: 'Your space limit is over. Please contact admin if you wish to add more documents.', type: 'dark', typeAnimated: true, });</script>");
        }
        
        return true;


    }

}
