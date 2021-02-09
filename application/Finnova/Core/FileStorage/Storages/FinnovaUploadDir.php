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

namespace Finnova\Core\FileStorage\Storages;

use \Finnova\Entities\Attachment;

use \Finnova\Core\Exceptions\Error;

use \Aws\S3\S3Client;

require $_SERVER['DOCUMENT_ROOT'].'/task_cron/vendor/autoload.php';


class FinnovaUploadDir extends Base
{
    protected $dependencyList = ['fileManager'];
    
    protected $fileTypesToShowInline = array(
        'application/pdf',
        'application/vnd.ms-word',
        'application/vnd.ms-excel',
        'application/vnd.oasis.opendocument.text',
        'application/vnd.oasis.opendocument.spreadsheet',
        'text/plain',
        'application/msword',
        'application/msexcel'
    );

    protected function getFileManager()
    {
        return $this->getInjection('fileManager');
    }


      public function unlink(Attachment $attachment)
    {

        $sourceId = $attachment->getSourceId();
         // $s3 = new S3Client([
         //    'region'  => 'ap-south-1',
         //    'version' => '2006-03-01',
         //    'credentials' => [
         //        'key'    => "AKIAVKMGGRZRUOQQMSEE",
         //        'secret' => "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",
         //     ]
         // ]); 
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

         return $result = $client->deleteObject(array(
                'Bucket' => 'fincrm',
                'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/data/'. $sourceId
        )); 
         // return $this->getFileManager()->unlink($this->getFilePath($attachment));

    }


    public function isFile(Attachment $attachment)
    {
        return $this->getFileManager()->isFile($this->getFilePath($attachment));
    }

      public function getContents(Attachment $attachment)
    {
        $sourceId = $attachment->getSourceId();
         // $s3 = new S3Client([
         //    'region'  => 'ap-south-1',
         //    'version' => '2006-03-01',
         //    'credentials' => [
         //        'key'    => "AKIAVKMGGRZRUOQQMSEE",
         //        'secret' => "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",
         //     ]
         // ]); 
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
         
         $result = $client->getObject(array(
            'Bucket' => 'fincrm',
            'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/data/'. $sourceId,
            'SaveAs' => 'data/upload/'.$sourceId
        ));
        
         return $this->getFileManager()->getContents($this->getFilePath($attachment));
    }

    public function putContents(Attachment $attachment, $contents)
    {
        $sourceId = $attachment->getSourceId();

        
         // $s3 = new S3Client([
         //    'region'  => 'ap-south-1',
         //    'version' => '2006-03-01',
         //    'credentials' => [
         //        'key'    => "AKIAVKMGGRZRUOQQMSEE",
         //        'secret' => "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",
         //     ]
         // ]);
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
         
         $type = $attachment->get('type');
         if (in_array($type, $this->fileTypesToShowInline)) {
          return $result = $client->putObject([
            'Bucket' => 'fincrm',
            'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/data/'. $sourceId ,
            'Body'   => $contents       
        ]);
        }else{
          $result = $client->putObject([
            'Bucket' => 'fincrm',
            'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/data/'. $sourceId ,
            'Body'   => $contents       
        ]);

          return $this->getFileManager()->putContents($this->getFilePath($attachment), $contents);
        }
         
          
    }

    public function getLocalFilePath(Attachment $attachment)
    {
        return $this->getFilePath($attachment);
    }

    protected function getFilePath(Attachment $attachment)
    {
        $sourceId = $attachment->getSourceId();
        
        return 'data/upload/'. $sourceId;

    }

    public function getDownloadUrl(Attachment $attachment)
    {
        throw new Error();
    }

    public function hasDownloadUrl(Attachment $attachment)
    {
        return false;
    }
}
