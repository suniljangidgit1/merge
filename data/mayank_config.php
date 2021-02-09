<?php
return [
    'cacheTimestamp' => 1597385310,
    'database' => [
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'port' => '',
        'charset' => 'utf8mb4',
        'dbname' => 'mayank',
        'user' => 'root',
        'password' => 'root'
    ],
    'useCache' => true,
    'recordsPerPage' => 20,
    'recordsPerPageSmall' => 5,
    'applicationName' => 'FinnovaCRM',
    'version' => '5.7.6',
    'timeZone' => 'Asia/Kolkata',
    'dateFormat' => 'DD/MM/YYYY',
    'readableDateFormatDisabled' => true,
    'timeFormat' => 'hh:mm a',
    'weekStart' => 1,
    'thousandSeparator' => ',',
    'decimalMark' => '.',
    'exportDelimiter' => ';',
    'currencyList' => [
        0 => 'USD',
        1 => 'INR'
    ],
    'defaultCurrency' => 'INR',
    'baseCurrency' => 'INR',
    'currencyRates' => [
        'USD' => 77
    ],
    'outboundEmailIsShared' => true,
    'outboundEmailFromName' => 'FinnovaCRM',
    'outboundEmailFromAddress' => '',
    'smtpServer' => '',
    'smtpPort' => '587',
    'smtpAuth' => false,
    'smtpSecurity' => 'TLS',
    'smtpUsername' => 'admin',
    'smtpPassword' => 'admin',
    'languageList' => [
        0 => 'en_GB',
        1 => 'en_US',
        2 => 'es_MX',
        3 => 'cs_CZ',
        4 => 'da_DK',
        5 => 'de_DE',
        6 => 'es_ES',
        7 => 'hr_HR',
        8 => 'hu_HU',
        9 => 'fa_IR',
        10 => 'fr_FR',
        11 => 'id_ID',
        12 => 'it_IT',
        13 => 'lt_LT',
        14 => 'lv_LV',
        15 => 'nb_NO',
        16 => 'nl_NL',
        17 => 'tr_TR',
        18 => 'sk_SK',
        19 => 'sr_RS',
        20 => 'ro_RO',
        21 => 'ru_RU',
        22 => 'pl_PL',
        23 => 'pt_BR',
        24 => 'uk_UA',
        25 => 'vi_VN',
        26 => 'zh_CN'
    ],
    'language' => 'en_US',
    'logger' => [
        'path' => 'data/logs/finnova.log',
        'level' => 'WARNING',
        'rotation' => true,
        'maxFileNumber' => 30
    ],
    'authenticationMethod' => 'Finnova',
    'globalSearchEntityList' => [
        0 => 'Account',
        1 => 'Contact',
        2 => 'Lead',
        3 => 'Opportunity'
    ],
    'tabList' => [
        0 => 'Account',
        1 => 'Contact',
        2 => 'Lead',
        3 => 'Task',
        4 => 'Opportunity',
        5 => 'Case',
        6 => 'Email',
        7 => 'Calendar',
        8 => 'Meeting',
        9 => 'Call',
        10 => 'KnowledgeBaseArticle',
        11 => '_delimiter_',
        12 => 'Campaign',
        13 => 'Stream',
        14 => 'User',
        15 => 'EntityDemo',
        16 => 'ABCD',
        17 => 'TestDemo'
    ],
    'quickCreateList' => [
        0 => 'Account',
        1 => 'Contact',
        2 => 'Lead',
        3 => 'Opportunity',
        4 => 'Meeting',
        5 => 'Call',
        6 => 'Task',
        7 => 'Case',
        8 => 'Email'
    ],
    'exportDisabled' => false,
    'adminNotifications' => true,
    'adminNotificationsNewVersion' => true,
    'adminNotificationsCronIsNotConfigured' => true,
    'adminNotificationsNewExtensionVersion' => true,
    'assignmentEmailNotifications' => false,
    'assignmentEmailNotificationsEntityList' => [
        0 => 'Lead',
        1 => 'Opportunity',
        2 => 'Task',
        3 => 'Case'
    ],
    'assignmentNotificationsEntityList' => [
        0 => 'Meeting',
        1 => 'Call',
        2 => 'Task',
        3 => 'Email'
    ],
    'portalStreamEmailNotifications' => true,
    'streamEmailNotificationsEntityList' => [
        0 => 'Case'
    ],
    'streamEmailNotificationsTypeList' => [
        0 => 'Post',
        1 => 'Status',
        2 => 'EmailReceived'
    ],
    'emailNotificationsDelay' => 30,
    'emailMessageMaxSize' => 10,
    'notificationsCheckInterval' => 10,
    'maxEmailAccountCount' => 2,
    'followCreatedEntities' => false,
    'b2cMode' => false,
    'restrictedMode' => false,
    'theme' => 'HazyblueVertical',
    'massEmailMaxPerHourCount' => 100,
    'personalEmailMaxPortionSize' => 50,
    'inboundEmailMaxPortionSize' => 50,
    'authTokenLifetime' => 0,
    'authTokenMaxIdleTime' => 120,
    'userNameRegularExpression' => '[^a-z0-9\\-@_\\.\\s]',
    'addressFormat' => 1,
    'displayListViewRecordCount' => true,
    'dashboardLayout' => [
        0 => (object) [
            'name' => 'My Finnova',
            'layout' => [
                0 => (object) [
                    'id' => 'default-activities',
                    'name' => 'Activities',
                    'x' => 2,
                    'y' => 2,
                    'width' => 2,
                    'height' => 4
                ],
                1 => (object) [
                    'id' => 'default-stream',
                    'name' => 'Stream',
                    'x' => 0,
                    'y' => 0,
                    'width' => 2,
                    'height' => 4
                ]
            ]
        ]
    ],
    'calendarEntityList' => [
        0 => 'Meeting',
        1 => 'Call',
        2 => 'Task'
    ],
    'activitiesEntityList' => [
        0 => 'Meeting',
        1 => 'Call'
    ],
    'historyEntityList' => [
        0 => 'Meeting',
        1 => 'Call',
        2 => 'Email'
    ],
    'cleanupJobPeriod' => '1 month',
    'cleanupActionHistoryPeriod' => '15 days',
    'cleanupAuthTokenPeriod' => '1 month',
    'currencyFormat' => 2,
    'currencyDecimalPlaces' => 2,
    'aclStrictMode' => true,
    'aclAllowDeleteCreated' => false,
    'aclAllowDeleteCreatedThresholdPeriod' => '24 hours',
    'inlineAttachmentUploadMaxSize' => 20,
    'textFilterUseContainsForVarchar' => false,
    'tabColorsDisabled' => false,
    'massPrintPdfMaxCount' => 50,
    'emailKeepParentTeamsEntityList' => [
        0 => 'Case'
    ],
    'recordListMaxSizeLimit' => 200,
    'noteDeleteThresholdPeriod' => '1 month',
    'noteEditThresholdPeriod' => '7 days',
    'emailForceUseExternalClient' => false,
    'useWebSocket' => false,
    'auth2FAMethodList' => [
        0 => 'Totp'
    ],
    'isInstalled' => true,
    'siteUrl' => 'http://mayank.fincrm.net',
    'passwordSalt' => 'a3f69783b093f3ef',
    'cryptKey' => 'fc01805918689ffea6aa1502a3c264be',
    'hashSecretKey' => 'dbeeb14b13520bac24ee4014e7c0a2d2',
    'defaultPermissions' => [
        'user' => 33,
        'group' => 33
    ],
    'fullTextSearchMinLength' => 4,
    'companyLogoId' => '5eff0d43487bf42c8',
    'companyLogoName' => 'logo_new.png',
    'userThemesDisabled' => false,
    'avatarsDisabled' => false,
    'scopeColorsDisabled' => false,
    'tabIconsDisabled' => false,
    'dashletsOptions' => (object) [
        
    ],
    'maintenanceMode' => false,
    'cronDisabled' => false,
    'emailAddressIsOptedOutByDefault' => false,
    'cleanupDeletedRecords' => false,
    'fiscalYearShift' => 0,
    'addressCountryList' => [
        
    ],
    'addressCityList' => [
        
    ],
    'addressStateList' => [
        
    ]
];
?>