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
use \Aws\S3\S3Client;

require $_SERVER['DOCUMENT_ROOT'].'/task_cron/vendor/autoload.php';
class Download extends \Finnova\Core\EntryPoints\Base
{
    public static $authRequired = true;

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

    public function run()
    {
        if (empty($_GET['id'])) {
            throw new BadRequest();
        }

        $id = $_GET['id'];
        
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
            'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/data/'. $_GET['id'],
            'SaveAs' => 'data/upload/'.$_GET['id']
        ));


        $attachment = $this->getEntityManager()->getEntity('Attachment', $id);

        if (!$attachment) {
            throw new NotFound();
        }

        if (!$this->getAcl()->checkEntity($attachment)) {
            throw new Forbidden();
        }

        $sourceId = $attachment->getSourceId();

        if ($this->getEntityManager()->getRepository('Attachment')->hasDownloadUrl($attachment)) {
            $downloadUrl = $this->getEntityManager()->getRepository('Attachment')->getDownloadUrl($attachment);

            header('Location: ' . $downloadUrl);
            unlink('data/upload/'.$_GET['id']);
            exit;
        }

        $fileName = $this->getEntityManager()->getRepository('Attachment')->getFilePath($attachment);

        if (!file_exists($fileName)) {
            throw new NotFound();
        }

        $outputFileName = $attachment->get('name');
        $outputFileName = str_replace("\"", "\\\"", $outputFileName);

        $type = $attachment->get('type');

        $disposition = 'attachment';
        if (in_array($type, $this->fileTypesToShowInline)) {
            $disposition = 'inline';
        }

        header('Content-Description: File Transfer');
        if ($type) {
            header('Content-Type: ' . $type);
        }
        header("Content-Disposition: " . $disposition . ";filename=\"" . $outputFileName . "\"");
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fileName));

        readfile($fileName);
        unlink('data/upload/'.$_GET['id']);
        exit;
    }
}
