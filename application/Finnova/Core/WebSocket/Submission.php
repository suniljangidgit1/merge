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

namespace Finnova\Core\WebSocket;

class Submission
{
    protected $config;

    public function __construct(\Finnova\Core\Utils\Config $config)
    {
        $this->config = $config;
    }

    public function submit(string $topic, ?string $userId = null, $data = null)
    {
        if (!$data) $data = (object) [];

        $dsn = $this->config->get('webSocketSubmissionDsn', 'tcp://localhost:5555');

        if ($userId) {
            $data->userId = $userId;
        }
        $data->topicId = $topic;

        try {
            $context = new \ZMQContext();
            $socket = $context->getSocket(\ZMQ::SOCKET_PUSH, 'my pusher');
            $socket->connect($dsn);

            $socket->send(json_encode($data));

            $socket->setSockOpt(\ZMQ::SOCKOPT_LINGER, 1000);
            $socket->disconnect($dsn);
        } catch (\Throwable $e) {
            $GLOBALS['log']->error("WebSocketSubmission: " . $e->getMessage());
        }
    }
}
