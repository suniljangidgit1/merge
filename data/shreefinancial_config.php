<?php
return [
    'cacheTimestamp' => 1611317340,
    'database' => [
        'driver' => 'pdo_mysql',
        'host' => '164.52.205.204',
        'port' => '',
        'charset' => 'utf8mb4',
        'dbname' => 'shreefinancial',
        'user' => 'proadmin',
        'password' => 'mJmxCj*92WuFcfB_'
    ],
    'useCache' => true,
    'recordsPerPage' => 20,
    'recordsPerPageSmall' => 5,
    'applicationName' => 'FinCRM',
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
        6 => 'Calendar',
        7 => 'Meeting',
        8 => 'Call',
        9 => 'KnowledgeBaseArticle',
        10 => '_delimiter_'
    ],
    'quickCreateList' => [
        0 => 'Account',
        1 => 'Contact',
        2 => 'Lead',
        3 => 'Opportunity',
        4 => 'Meeting',
        5 => 'Call',
        6 => 'Task',
        7 => 'Case'
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
            'name' => 'Overview',
            'layout' => [
                0 => (object) [
                    'id' => 'd422011',
                    'name' => 'Calendar',
                    'x' => 0,
                    'y' => 0,
                    'width' => 1,
                    'height' => 2
                ],
                1 => (object) [
                    'id' => 'd166787',
                    'name' => 'calls',
                    'x' => 1,
                    'y' => 0,
                    'width' => 1,
                    'height' => 2
                ],
                2 => (object) [
                    'id' => 'd883574',
                    'name' => 'things',
                    'x' => 3,
                    'y' => 0,
                    'width' => 1,
                    'height' => 2
                ],
                3 => (object) [
                    'id' => 'd46809',
                    'name' => 'OverDue',
                    'x' => 0,
                    'y' => 2,
                    'width' => 1,
                    'height' => 2
                ],
                4 => (object) [
                    'id' => 'd181235',
                    'name' => 'NewAccount',
                    'x' => 1,
                    'y' => 2,
                    'width' => 1,
                    'height' => 2
                ],
                5 => (object) [
                    'id' => 'd460509',
                    'name' => 'Stream',
                    'x' => 3,
                    'y' => 2,
                    'width' => 1,
                    'height' => 2
                ]
            ],
            'id' => '7917210'
        ],
        1 => (object) [
            'name' => 'Leads',
            'layout' => [
                0 => (object) [
                    'id' => 'd781200',
                    'name' => 'ConvertedLeads',
                    'x' => 0,
                    'y' => 0,
                    'width' => 1,
                    'height' => 1
                ],
                1 => (object) [
                    'id' => 'd578764',
                    'name' => 'NewLeads',
                    'x' => 1,
                    'y' => 0,
                    'width' => 1,
                    'height' => 1
                ],
                2 => (object) [
                    'id' => 'd698299',
                    'name' => 'things',
                    'x' => 3,
                    'y' => 0,
                    'width' => 1,
                    'height' => 2
                ],
                3 => (object) [
                    'id' => 'd652127',
                    'name' => 'LeadsKanban',
                    'x' => 0,
                    'y' => 1,
                    'width' => 3,
                    'height' => 2
                ],
                4 => (object) [
                    'id' => 'd368540',
                    'name' => 'Stream',
                    'x' => 3,
                    'y' => 2,
                    'width' => 1,
                    'height' => 3
                ],
                5 => (object) [
                    'id' => 'd505484',
                    'name' => 'LeadsPipelinesChart',
                    'x' => 0,
                    'y' => 3,
                    'width' => 1,
                    'height' => 2
                ],
                6 => (object) [
                    'id' => 'd307414',
                    'name' => 'LeadsTabs',
                    'x' => 1,
                    'y' => 3,
                    'width' => 1,
                    'height' => 2
                ]
            ],
            'id' => '8728035'
        ],
        2 => (object) [
            'name' => 'Opportunities',
            'layout' => [
                0 => (object) [
                    'id' => 'd796643',
                    'name' => 'NewOpportunites',
                    'x' => 0,
                    'y' => 0,
                    'width' => 3,
                    'height' => 1
                ],
                1 => (object) [
                    'id' => 'd614942',
                    'name' => 'things',
                    'x' => 3,
                    'y' => 0,
                    'width' => 1,
                    'height' => 2
                ],
                2 => (object) [
                    'id' => 'd116049',
                    'name' => 'RevenueForecast',
                    'x' => 0,
                    'y' => 1,
                    'width' => 1,
                    'height' => 2
                ],
                3 => (object) [
                    'id' => 'd70926',
                    'name' => 'ClosingMonth',
                    'x' => 1,
                    'y' => 1,
                    'width' => 1,
                    'height' => 2
                ],
                4 => (object) [
                    'id' => 'd850618',
                    'name' => 'Stream',
                    'x' => 3,
                    'y' => 2,
                    'width' => 1,
                    'height' => 3
                ],
                5 => (object) [
                    'id' => 'd77732',
                    'name' => 'SalesPipelineGraph',
                    'x' => 0,
                    'y' => 3,
                    'width' => 1,
                    'height' => 2
                ],
                6 => (object) [
                    'id' => 'd133340',
                    'name' => 'OpportunitiesLeadSource',
                    'x' => 1,
                    'y' => 3,
                    'width' => 1,
                    'height' => 2
                ]
            ],
            'id' => '5497009'
        ],
        3 => (object) [
            'name' => 'Users',
            'layout' => [
                0 => (object) [
                    'id' => 'd576231',
                    'name' => 'things',
                    'x' => 3,
                    'y' => 0,
                    'width' => 1,
                    'height' => 2
                ],
                1 => (object) [
                    'id' => 'd841551',
                    'name' => 'Stream',
                    'x' => 3,
                    'y' => 2,
                    'width' => 1,
                    'height' => 3
                ],
                2 => (object) [
                    'id' => 'd998495',
                    'name' => 'SubscriptionDetails',
                    'x' => 0,
                    'y' => 3,
                    'width' => 1,
                    'height' => 2
                ],
                3 => (object) [
                    'id' => 'd607247',
                    'name' => 'TransactionList',
                    'x' => 1,
                    'y' => 3,
                    'width' => 1,
                    'height' => 2
                ],
                4 => (object) [
                    'id' => 'd222551',
                    'name' => 'MyUserEntities',
                    'x' => 1,
                    'y' => 1,
                    'width' => 1,
                    'height' => 2
                ],
                5 => (object) [
                    'id' => 'd703238',
                    'name' => 'MyUserBranches',
                    'x' => 0,
                    'y' => 1,
                    'width' => 1,
                    'height' => 2
                ],
                6 => (object) [
                    'id' => 'd483073',
                    'name' => 'Users',
                    'x' => 0,
                    'y' => 0,
                    'width' => 3,
                    'height' => 1
                ]
            ],
            'id' => '8556986'
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
    'siteUrl' => 'https://shreefinancial.fincrm.net',
    'passwordSalt' => '5f266b10a6b7d311',
    'cryptKey' => '419a3dbb6d99c45c862688d253c9f798',
    'hashSecretKey' => 'eb24e115dcab8deeb9c535d87bbdcbb8',
    'defaultPermissions' => [
        'user' => 33,
        'group' => 33
    ],
    'fullTextSearchMinLength' => 4,
    'companyLogoId' => NULL,
    'companyLogoName' => NULL,
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