<?php
return array (
  'app' => 
  array (
    'acl' => 
    array (
      'mandatory' => 
      array (
        'scopeLevel' => 
        array (
          'Note' => 
          array (
            'read' => 'own',
            'edit' => 'own',
            'delete' => 'own',
            'create' => 'yes',
          ),
          'Portal' => 
          array (
            'read' => 'all',
            'edit' => 'no',
            'delete' => 'no',
            'create' => 'no',
          ),
          'Attachment' => 
          array (
            'read' => 'own',
            'edit' => 'own',
            'delete' => 'own',
            'create' => 'yes',
          ),
          'EmailAccount' => 
          array (
            'read' => 'own',
            'edit' => 'own',
            'delete' => 'own',
            'create' => 'yes',
          ),
          'EmailFilter' => 
          array (
            'read' => 'own',
            'edit' => 'own',
            'delete' => 'own',
            'create' => 'yes',
          ),
          'EmailFolder' => 
          array (
            'read' => 'own',
            'edit' => 'own',
            'delete' => 'own',
            'create' => 'yes',
          ),
          'Preferences' => 
          array (
            'read' => 'own',
            'edit' => 'own',
            'delete' => 'no',
            'create' => 'no',
          ),
          'Notification' => 
          array (
            'read' => 'own',
            'edit' => 'no',
            'delete' => 'own',
            'create' => 'no',
          ),
          'ActionHistoryRecord' => 
          array (
            'read' => 'no',
            'edit' => 'no',
            'delete' => 'no',
            'create' => 'no',
          ),
          'Role' => false,
          'PortalRole' => false,
          'MassEmail' => 'Campaign',
          'CampaignLogRecord' => 'Campaign',
          'CampaignTrackingUrl' => 'Campaign',
          'EmailQueueItem' => false,
        ),
        'fieldLevel' => 
        array (
        ),
        'scopeFieldLevel' => 
        array (
          'Attachment' => 
          array (
            'parent' => false,
          ),
          'EmailFolder' => 
          array (
            'assignedUser' => false,
          ),
          'Email' => 
          array (
            'inboundEmails' => false,
            'emailAccounts' => false,
          ),
          'User' => 
          array (
            'dashboardTemplate' => false,
            'password' => false,
            'passwordConfirm' => false,
            'authMethod' => false,
            'apiKey' => false,
            'secretKey' => false,
            'token' => false,
          ),
        ),
      ),
      'default' => 
      array (
        'scopeLevel' => 
        array (
          'User' => 
          array (
            'read' => 'all',
            'edit' => 'no',
          ),
          'Import' => false,
          'Webhook' => false,
        ),
        'fieldLevel' => 
        array (
        ),
        'scopeFieldLevel' => 
        array (
          'User' => 
          array (
            'gender' => false,
          ),
        ),
      ),
      'strictDefault' => 
      array (
        'scopeLevel' => 
        array (
          'User' => 
          array (
            'read' => 'own',
            'edit' => 'no',
          ),
          'Team' => 
          array (
            'read' => 'team',
          ),
          'Import' => false,
          'Webhook' => false,
        ),
        'fieldLevel' => 
        array (
        ),
        'scopeFieldLevel' => 
        array (
          'User' => 
          array (
            'gender' => false,
          ),
        ),
      ),
      'valuePermissionList' => 
      array (
        0 => 'assignmentPermission',
        1 => 'userPermission',
        2 => 'portalPermission',
        3 => 'groupEmailAccountPermission',
        4 => 'exportPermission',
        5 => 'massUpdatePermission',
        6 => 'dataPrivacyPermission',
      ),
      'valuePermissionHighestLevels' => 
      array (
        'assignmentPermission' => 'all',
        'userPermission' => 'all',
        'portalPermission' => 'yes',
        'groupEmailAccountPermission' => 'all',
        'exportPermission' => 'yes',
        'massUpdatePermission' => 'yes',
        'dataPrivacyPermission' => 'yes',
      ),
      'permissionsDefaults' => 
      array (
        'assignmentPermission' => 'all',
        'userPermission' => 'all',
        'portalPermission' => 'no',
        'groupEmailAccountPermission' => 'no',
        'exportPermission' => 'yes',
        'massUpdatePermission' => 'yes',
        'dataPrivacyPermission' => 'no',
      ),
      'permissionsStrictDefaults' => 
      array (
        'assignmentPermission' => 'no',
        'userPermission' => 'no',
        'portalPermission' => 'no',
        'groupEmailAccountPermission' => 'no',
        'exportPermission' => 'no',
        'massUpdatePermission' => 'no',
        'dataPrivacyPermission' => 'no',
      ),
      'scopeLevelTypesDefaults' => 
      array (
        'boolean' => true,
        'record' => 
        array (
          'read' => 'all',
          'stream' => 'all',
          'edit' => 'all',
          'delete' => 'no',
          'create' => 'yes',
        ),
      ),
      'scopeLevelTypesStrictDefaults' => 
      array (
        'boolean' => false,
        'record' => false,
      ),
    ),
    'aclPortal' => 
    array (
      'mandatory' => 
      array (
        'scopeLevel' => 
        array (
          'User' => 
          array (
            'read' => 'own',
            'edit' => 'no',
            'delete' => 'no',
            'stream' => 'no',
            'create' => 'no',
          ),
          'Team' => false,
          'Note' => 
          array (
            'read' => 'own',
            'edit' => 'own',
            'delete' => 'own',
            'create' => 'yes',
          ),
          'Notification' => 
          array (
            'read' => 'own',
            'edit' => 'no',
            'delete' => 'own',
            'create' => 'no',
          ),
          'Portal' => false,
          'Attachment' => 
          array (
            'read' => 'own',
            'edit' => 'own',
            'delete' => 'own',
            'create' => 'yes',
          ),
          'EmailAccount' => false,
          'ExternalAccount' => false,
          'Role' => false,
          'PortalRole' => false,
          'EmailFilter' => false,
          'EmailFolder' => false,
          'EmailTemplate' => false,
          'ActionHistoryRecord' => false,
          'Preferences' => 
          array (
            'read' => 'own',
            'edit' => 'own',
            'delete' => 'no',
            'create' => 'no',
          ),
          'MassEmail' => 'Campaign',
          'CampaignLogRecord' => 'Campaign',
          'CampaignTrackingUrl' => 'Campaign',
          'EmailQueueItem' => false,
        ),
        'fieldLevel' => 
        array (
        ),
        'scopeFieldLevel' => 
        array (
          'Preferences' => 
          array (
            'smtpServer' => false,
            'smtpPort' => false,
            'smtpSecurity' => false,
            'smtpUsername' => false,
            'smtpPassword' => false,
            'smtpAuth' => false,
            'receiveAssignmentEmailNotifications' => false,
            'receiveMentionEmailNotifications' => false,
            'defaultReminders' => false,
            'autoFollowEntityTypeList' => false,
            'emailReplyForceHtml' => false,
            'emailReplyToAllByDefault' => false,
            'signature' => false,
            'followCreatedEntities' => false,
            'followEntityOnStreamPost' => false,
            'doNotFillAssignedUserIfNotRequired' => false,
            'useCustomTabList' => false,
            'tabList' => false,
            'emailUseExternalClient' => false,
            'assignmentNotificationsIgnoreEntityTypeList' => false,
            'assignmentEmailNotificationsIgnoreEntityTypeList' => false,
            'dashletsOptions' => false,
            'dashboardLayout' => false,
          ),
          'Call' => 
          array (
            'reminders' => false,
          ),
          'Meeting' => 
          array (
            'reminders' => false,
          ),
          'Attachment' => 
          array (
            'parent' => false,
          ),
          'Note' => 
          array (
            'isInternal' => false,
            'isGlobal' => false,
          ),
          'Email' => 
          array (
            'inboundEmails' => false,
            'emailAccounts' => false,
          ),
          'User' => 
          array (
            'dashboardTemplate' => false,
            'password' => false,
            'authMethod' => false,
            'apiKey' => false,
            'secretKey' => false,
            'token' => false,
            'isAdmin' => false,
            'type' => false,
            'contact' => false,
            'accounts' => false,
            'account' => false,
            'portalRoles' => false,
            'portals' => false,
            'roles' => false,
            'defaultTeam' => false,
            'isActive' => false,
          ),
        ),
      ),
      'strictDefault' => 
      array (
        'scopeLevel' => 
        array (
        ),
        'fieldLevel' => 
        array (
          'assignedUser' => 
          array (
            'read' => 'yes',
            'edit' => 'no',
          ),
          'assignedUsers' => 
          array (
            'read' => 'yes',
            'edit' => 'no',
          ),
          'teams' => false,
        ),
        'scopeFieldLevel' => 
        array (
          'User' => 
          array (
            'gender' => false,
          ),
          'KnowledgeBaseArticle' => 
          array (
            'assignedUser' => false,
          ),
          'Call' => 
          array (
            'users' => 
            array (
              'read' => 'yes',
              'edit' => 'no',
            ),
            'leads' => false,
          ),
          'Meeting' => 
          array (
            'users' => 
            array (
              'read' => 'yes',
              'edit' => 'no',
            ),
            'leads' => false,
          ),
          'Case' => 
          array (
            'status' => 
            array (
              'read' => 'yes',
              'edit' => 'no',
            ),
          ),
        ),
      ),
      'valuePermissionList' => 
      array (
        0 => 'exportPermission',
        1 => 'massUpdatePermission',
      ),
      'permissionsStrictDefaults' => 
      array (
        'exportPermission' => 'no',
        'massUpdatePermission' => 'no',
      ),
      'scopeLevelTypesStrictDefaults' => 
      array (
        'boolean' => false,
        'record' => false,
      ),
    ),
    'adminPanel' => 
    array (
      'system' => 
      array (
        'label' => 'System',
        'itemList' => 
        array (
          0 => 
          array (
            'url' => '#Admin/settings',
            'label' => 'Search ',
            'iconClass' => 'fas fa-search',
            'description' => 'search',
          ),
          1 => 
          array (
            'url' => '#Admin/integrations',
            'label' => 'Integrations',
            'iconClass' => 'fas fa-network-wired',
            'description' => 'integrations',
          ),
          2 => 
          array (
            'url' => 'http://www.fincrm.net/user-manual',
            'label' => 'User Manual',
            'iconClass' => 'fas fa-file-alt',
            'description' => 'user manual',
          ),
          3 => 
          array (
            'action' => 'clearCache',
            'label' => 'Clear Cache',
            'iconClass' => 'fas fa-broom',
            'description' => 'clearCache',
          ),
          4 => 
          array (
            'action' => 'rebuild',
            'label' => 'Rebuild',
            'iconClass' => 'fas fa-database',
            'description' => 'rebuild',
          ),
        ),
        'order' => 0,
      ),
      'users' => 
      array (
        'label' => 'Users',
        'itemList' => 
        array (
          0 => 
          array (
            'url' => '#OfficeLocation',
            'label' => 'Office Locations',
            'iconClass' => 'fas fa-map-marker-alt',
            'description' => 'officeLocation',
          ),
          1 => 
          array (
            'url' => '#Role',
            'label' => 'Roles',
            'iconClass' => 'fas fa-key',
            'description' => 'roles',
          ),
          2 => 
          array (
            'url' => '#User',
            'label' => 'Users',
            'iconClass' => 'fas fa-user',
            'description' => 'users',
          ),
          3 => 
          array (
            'url' => '#Team',
            'label' => 'Teams',
            'iconClass' => 'fas fa-users',
            'description' => 'teams',
          ),
          4 => 
          array (
            'url' => '#Admin/authLog',
            'label' => 'Auth Log',
            'iconClass' => 'fas fa-sign-in-alt',
            'description' => 'authLog',
          ),
          5 => 
          array (
            'url' => '#Admin/authTokens',
            'label' => 'Auth Token',
            'iconClass' => 'fas fa-shield-alt',
            'description' => 'authTokens',
          ),
          6 => 
          array (
            'url' => '#ActionHistoryRecord',
            'label' => 'Action History',
            'iconClass' => 'fas fa-history',
            'description' => 'actionHistory',
          ),
        ),
        'order' => 5,
      ),
      'customization' => 
      array (
        'label' => 'Customization',
        'itemList' => 
        array (
          0 => 
          array (
            'url' => '#Admin/layouts',
            'label' => 'Layout Manager',
            'iconClass' => 'fas fa-table',
            'description' => 'layoutManager',
          ),
          1 => 
          array (
            'url' => '#Admin/entityManager',
            'label' => 'Entity Manager',
            'iconClass' => 'fas fa-tools',
            'description' => 'entityManager',
          ),
        ),
        'order' => 10,
      ),
      'portal' => 
      array (
        'label' => 'Portal',
        'itemList' => 
        array (
          0 => 
          array (
            'url' => '#Portal',
            'label' => 'Portals',
            'iconClass' => 'fas fa-parking',
            'description' => 'portals',
          ),
          1 => 
          array (
            'url' => '#PortalUser',
            'label' => 'Portal Users',
            'iconClass' => 'fas fa-user',
            'description' => 'portalUsers',
          ),
          2 => 
          array (
            'url' => '#PortalRole',
            'label' => 'Portal Roles',
            'iconClass' => 'fas fa-key',
            'description' => 'portalRoles',
          ),
        ),
        'order' => 20,
      ),
      'data' => 
      array (
        'label' => 'Data',
        'itemList' => 
        array (
          0 => 
          array (
            'url' => '#Import',
            'label' => 'Import',
            'iconClass' => 'fas fa-file-import',
            'description' => 'import',
          ),
          1 => 
          array (
            'url' => '#Export',
            'label' => 'Export',
            'iconClass' => 'fas fa-file-import',
            'description' => 'export',
          ),
          2 => 
          array (
            'url' => '#Attachment',
            'label' => 'Attachment',
            'iconClass' => 'fas fa-paperclip',
            'description' => 'attachments',
          ),
        ),
        'order' => 25,
      ),
      'Holiday Policy' => 
      array (
        'label' => 'Miscellaneous',
        'itemList' => 
        array (
          0 => 
          array (
            'url' => '#HolidayCalender',
            'label' => 'Holiday Policy',
            'iconClass' => 'fa fa-calendar',
            'description' => 'Define your yearly holiday calendar and weekly off policy.',
          ),
          1 => 
          array (
            'url' => '#SenderID',
            'label' => 'Approved Sender IDs',
            'iconClass' => 'far fa-address-card',
            'description' => 'List of approved Sender Ids that can be used for SMS services.',
          ),
        ),
        'order' => 28,
      ),
    ),
    'auth2FAMethods' => 
    array (
      'Totp' => 
      array (
        'settings' => 
        array (
          'isAvailable' => true,
        ),
        'userApplyView' => 'views/user-security/modals/totp',
      ),
    ),
    'client' => 
    array (
      'scriptList' => 
      array (
        0 => 'client/finnova.min.js',
      ),
      'developerModeScriptList' => 
      array (
        0 => 'client/lib/jquery-2.1.4.min.js',
        1 => 'client/lib/underscore-min.js',
        2 => 'client/lib/es6-promise.min.js',
        3 => 'client/lib/backbone-min.js',
        4 => 'client/lib/handlebars.js',
        5 => 'client/lib/base64.js',
        6 => 'client/lib/jquery-ui.min.js',
        7 => 'client/lib/jquery.ui.touch-punch.min.js',
        8 => 'client/lib/moment.min.js',
        9 => 'client/lib/moment-timezone.min.js',
        10 => 'client/lib/moment-timezone-data.js',
        11 => 'client/lib/jquery.timepicker.min.js',
        12 => 'client/lib/jquery.autocomplete.js',
        13 => 'client/lib/bootstrap.min.js',
        14 => 'client/lib/bootstrap-datepicker.js',
        15 => 'client/lib/bull.js',
        16 => 'client/lib/marked.min.js',
        17 => 'client/lib/autobahn.js',
        18 => 'client/src/loader.js',
        19 => 'client/src/utils.js',
        20 => 'client/src/exceptions.js',
      ),
      'linkList' => 
      array (
        0 => 
        array (
          'href' => 'client/fonts/open-sans/open-sans-v16-cyrillic_latin_cyrillic-ext_latin-ext-regular.woff2',
          'as' => 'font',
          'type' => 'font/woff2',
          'rel' => 'preload',
          'noTimestamp' => true,
          'crossorigin' => true,
        ),
        1 => 
        array (
          'href' => 'client/fonts/open-sans/open-sans-v16-cyrillic_latin_cyrillic-ext_latin-ext-600.woff2',
          'as' => 'font',
          'type' => 'font/woff2',
          'rel' => 'preload',
          'noTimestamp' => true,
          'crossorigin' => true,
        ),
      ),
    ),
    'consoleCommands' => 
    array (
    ),
    'currency' => 
    array (
      'symbolMap' => 
      array (
        'AED' => 'د.إ',
        'AFN' => '؋',
        'ALL' => 'L',
        'ANG' => 'ƒ',
        'AOA' => 'Kz',
        'ARS' => '$',
        'AUD' => '$',
        'AWG' => 'ƒ',
        'AZN' => '₼',
        'BAM' => 'KM',
        'BBD' => '$',
        'BDT' => '৳',
        'BGN' => 'лв',
        'BHD' => '.د.ب',
        'BIF' => 'FBu',
        'BMD' => '$',
        'BND' => '$',
        'BOB' => 'Bs.',
        'BRL' => 'R$',
        'BSD' => '$',
        'BTN' => 'Nu.',
        'BWP' => 'P',
        'BYR' => 'p.',
        'BZD' => 'BZ$',
        'CAD' => '$',
        'CDF' => 'FC',
        'CHF' => 'Fr.',
        'CLP' => '$',
        'CNY' => '¥',
        'COP' => '$',
        'CRC' => '₡',
        'CUC' => '$',
        'CUP' => '₱',
        'CVE' => '$',
        'CZK' => 'Kč',
        'DJF' => 'Fdj',
        'DKK' => 'kr',
        'DOP' => 'RD$',
        'DZD' => 'دج',
        'EEK' => 'kr',
        'EGP' => '£',
        'ERN' => 'Nfk',
        'ETB' => 'Br',
        'EUR' => '€',
        'FJD' => '$',
        'FKP' => '£',
        'GBP' => '£',
        'GEL' => '₾',
        'GGP' => '£',
        'GHC' => '₵',
        'GHS' => 'GH₵',
        'GIP' => '£',
        'GMD' => 'D',
        'GNF' => 'FG',
        'GTQ' => 'Q',
        'GYD' => '$',
        'HKD' => '$',
        'HNL' => 'L',
        'HRK' => 'kn',
        'HTG' => 'G',
        'HUF' => 'Ft',
        'IDR' => 'Rp',
        'ILS' => '₪',
        'IMP' => '£',
        'INR' => '₹',
        'IQD' => 'ع.د',
        'IRR' => '﷼',
        'ISK' => 'kr',
        'JEP' => '£',
        'JMD' => 'J$',
        'JPY' => '¥',
        'KES' => 'KSh',
        'KGS' => 'лв',
        'KHR' => '៛',
        'KMF' => 'CF',
        'KPW' => '₩',
        'KRW' => '₩',
        'KYD' => '$',
        'KZT' => '₸',
        'LAK' => '₭',
        'LBP' => '£',
        'LKR' => '₨',
        'LRD' => '$',
        'LSL' => 'M',
        'LTL' => 'Lt',
        'LVL' => 'Ls',
        'MAD' => 'MAD',
        'MDL' => 'lei',
        'MGA' => 'Ar',
        'MKD' => 'ден',
        'MMK' => 'K',
        'MNT' => '₮',
        'MOP' => 'MOP$',
        'MUR' => '₨',
        'MVR' => 'Rf',
        'MWK' => 'MK',
        'MXN' => '$',
        'MYR' => 'RM',
        'MZN' => 'MT',
        'NAD' => '$',
        'NGN' => '₦',
        'NIO' => 'C$',
        'NOK' => 'kr',
        'NPR' => '₨',
        'NZD' => '$',
        'OMR' => '﷼',
        'PAB' => 'B/.',
        'PEN' => 'S/.',
        'PGK' => 'K',
        'PHP' => '₱',
        'PKR' => '₨',
        'PLN' => 'zł',
        'PYG' => 'Gs',
        'QAR' => '﷼',
        'RMB' => '￥',
        'RON' => 'lei',
        'RSD' => 'Дин.',
        'RUB' => '₽',
        'RWF' => 'R₣',
        'SAR' => '﷼',
        'SBD' => '$',
        'SCR' => '₨',
        'SDG' => 'ج.س.',
        'SEK' => 'kr',
        'SGD' => '$',
        'SHP' => '£',
        'SLL' => 'Le',
        'SOS' => 'S',
        'SRD' => '$',
        'SSP' => '£',
        'STD' => 'Db',
        'SVC' => '$',
        'SYP' => '£',
        'SZL' => 'E',
        'THB' => '฿',
        'TJS' => 'SM',
        'TMT' => 'T',
        'TND' => 'د.ت',
        'TOP' => 'T$',
        'TRL' => '₤',
        'TRY' => '₺',
        'TTD' => 'TT$',
        'TVD' => '$',
        'TWD' => 'NT$',
        'TZS' => 'TSh',
        'UAH' => '₴',
        'UGX' => 'USh',
        'USD' => '$',
        'UYU' => '$U',
        'UZS' => 'лв',
        'VEF' => 'Bs',
        'VND' => '₫',
        'VUV' => 'VT',
        'WST' => 'WS$',
        'XAF' => 'FCFA',
        'XBT' => 'Ƀ',
        'XCD' => '$',
        'XOF' => 'CFA',
        'XPF' => '₣',
        'YER' => '﷼',
        'ZAR' => 'R',
        'ZWD' => 'Z$',
        'BTC' => '฿',
      ),
    ),
    'defaultDashboardLayouts' => 
    array (
      'Standard' => 
      array (
        0 => 
        array (
          'name' => 'My Finnova',
          'layout' => 
          array (
            0 => 
            array (
              'id' => 'defaultActivities',
              'name' => 'Activities',
              'x' => 2,
              'y' => 2,
              'width' => 2,
              'height' => 2,
            ),
            1 => 
            array (
              'id' => 'defaultStream',
              'name' => 'Stream',
              'x' => 0,
              'y' => 0,
              'width' => 2,
              'height' => 4,
            ),
            2 => 
            array (
              'id' => 'defaultTasks',
              'name' => 'Tasks',
              'x' => 2,
              'y' => 4,
              'width' => 2,
              'height' => 2,
            ),
          ),
        ),
      ),
    ),
    'defaultDashboardOptions' => 
    array (
      'Standard' => 
      array (
        'defaultStream' => 
        array (
          'displayRecords' => 10,
        ),
      ),
    ),
    'deprecatedControllerActions' => 
    array (
      'BpmnProcess' => 
      array (
        'postActionStop' => true,
      ),
      'GoogleContacts' => 
      array (
        'actionPush' => true,
      ),
      'MailChimp' => 
      array (
        'actionUpdate' => true,
      ),
      'MailChimpCampaign' => 
      array (
        'actionCreate' => true,
      ),
      'MailChimpList' => 
      array (
        'actionCreate' => true,
      ),
      'MailChimpListGroup' => 
      array (
        'actionCreate' => true,
      ),
      'Quote' => 
      array (
        'postActionGetAttributesForEmail' => true,
      ),
      'Report' => 
      array (
        'actionPopulateTargetList' => true,
        'actionSyncTargetListWithReports' => true,
        'postActionExportList' => true,
        'postActionGetEmailAttributes' => true,
      ),
      'Voip' => 
      array (
        'actionChangeUserSettings' => true,
        'actionAddConnector' => true,
        'actionRemoveConnector' => true,
        'postActionTestConnection' => true,
      ),
      'VoipEvent' => 
      array (
        'actionCancel' => true,
        'actionSave' => true,
        'actionDial' => true,
        'actionDialFromCall' => true,
        'actionTestConnection' => true,
      ),
      'VoipMessage' => 
      array (
        'actionCancel' => true,
      ),
    ),
    'emailNotifications' => 
    array (
      'handlerClassNameMap' => 
      array (
        'Case' => '\\Finnova\\Modules\\Crm\\Business\\EmailNotificationHandlers\\CaseObj',
      ),
    ),
    'entityTemplateList' => 
    array (
      0 => 'Base',
      1 => 'BasePlus',
      2 => 'Event',
      3 => 'Person',
      4 => 'Company',
    ),
    'export' => 
    array (
      'formatList' => 
      array (
        0 => 'xlsx',
        1 => 'csv',
      ),
      'formatDefs' => 
      array (
        'csv' => 
        array (
          'mimeType' => 'text/csv',
          'fileExtension' => 'csv',
        ),
        'xlsx' => 
        array (
          'mimeType' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
          'fileExtension' => 'xlsx',
        ),
      ),
      'exportFormatClassNameMap' => 
      array (
        'csv' => '\\Finnova\\Core\\Export\\Csv',
        'xlsx' => '\\Finnova\\Core\\Export\\Xlsx',
      ),
    ),
    'fileStorage' => 
    array (
      'implementationClassNameMap' => 
      array (
        'FinnovaUploadDir' => '\\Finnova\\Core\\FileStorage\\Storages\\FinnovaUploadDir',
      ),
    ),
    'formula' => 
    array (
      'functionList' => 
      array (
        0 => 
        array (
          'name' => 'ifThenElse',
          'insertText' => 'ifThenElse(CONDITION, CONSEQUENT, ALTERNATIVE)',
        ),
        1 => 
        array (
          'name' => 'ifThen',
          'insertText' => 'ifThen(CONDITION, CONSEQUENT)',
        ),
        2 => 
        array (
          'name' => 'string\\concatenate',
          'insertText' => 'string\\concatenate(STRING_1, STRING_2)',
        ),
        3 => 
        array (
          'name' => 'string\\substring',
          'insertText' => 'string\\substring(STRING, START, LENGTH)',
        ),
        4 => 
        array (
          'name' => 'string\\contains',
          'insertText' => 'string\\contains(STRING, NEEDLE)',
        ),
        5 => 
        array (
          'name' => 'string\\test',
          'insertText' => 'string\\test(STRING, REGULAR_EXPRESSION)',
        ),
        6 => 
        array (
          'name' => 'string\\length',
          'insertText' => 'string\\length(STRING)',
        ),
        7 => 
        array (
          'name' => 'string\\trim',
          'insertText' => 'string\\trim(STRING)',
        ),
        8 => 
        array (
          'name' => 'string\\lowerCase',
          'insertText' => 'string\\lowerCase(STRING)',
        ),
        9 => 
        array (
          'name' => 'string\\upperCase',
          'insertText' => 'string\\upperCase(STRING)',
        ),
        10 => 
        array (
          'name' => 'datetime\\today',
          'insertText' => 'datetime\\today()',
        ),
        11 => 
        array (
          'name' => 'datetime\\now',
          'insertText' => 'datetime\\now()',
        ),
        12 => 
        array (
          'name' => 'datetime\\format',
          'insertText' => 'datetime\\format(VALUE)',
        ),
        13 => 
        array (
          'name' => 'datetime\\date',
          'insertText' => 'datetime\\date(VALUE)',
        ),
        14 => 
        array (
          'name' => 'datetime\\month',
          'insertText' => 'datetime\\month(VALUE)',
        ),
        15 => 
        array (
          'name' => 'datetime\\year',
          'insertText' => 'datetime\\year(VALUE)',
        ),
        16 => 
        array (
          'name' => 'datetime\\hour',
          'insertText' => 'datetime\\hour(VALUE)',
        ),
        17 => 
        array (
          'name' => 'datetime\\minute',
          'insertText' => 'datetime\\minute(VALUE)',
        ),
        18 => 
        array (
          'name' => 'datetime\\dayOfWeek',
          'insertText' => 'datetime\\dayOfWeek(VALUE)',
        ),
        19 => 
        array (
          'name' => 'datetime\\addMinutes',
          'insertText' => 'datetime\\addMinutes(VALUE, MINUTES)',
        ),
        20 => 
        array (
          'name' => 'datetime\\addHours',
          'insertText' => 'datetime\\addHours(VALUE, HOURS)',
        ),
        21 => 
        array (
          'name' => 'datetime\\addDays',
          'insertText' => 'datetime\\addDays(VALUE, DAYS)',
        ),
        22 => 
        array (
          'name' => 'datetime\\addWeeks',
          'insertText' => 'datetime\\addWeeks(VALUE, WEEKS)',
        ),
        23 => 
        array (
          'name' => 'datetime\\addMonths',
          'insertText' => 'datetime\\addMonths(VALUE, MONTHS)',
        ),
        24 => 
        array (
          'name' => 'datetime\\addYears',
          'insertText' => 'datetime\\addYears(VALUE, YEARS)',
        ),
        25 => 
        array (
          'name' => 'datetime\\diff',
          'insertText' => 'datetime\\diff(VALUE_1, VALUE_2, INTERVAL_TYPE)',
        ),
        26 => 
        array (
          'name' => 'number\\format',
          'insertText' => 'number\\format(VALUE)',
        ),
        27 => 
        array (
          'name' => 'number\\abs',
          'insertText' => 'number\\abs(VALUE)',
        ),
        28 => 
        array (
          'name' => 'number\\round',
          'insertText' => 'number\\round(VALUE, PRECISION)',
        ),
        29 => 
        array (
          'name' => 'number\\floor',
          'insertText' => 'number\\floor(VALUE)',
        ),
        30 => 
        array (
          'name' => 'number\\ceil',
          'insertText' => 'number\\ceil(VALUE)',
        ),
        31 => 
        array (
          'name' => 'entity\\isNew',
          'insertText' => 'entity\\isNew()',
        ),
        32 => 
        array (
          'name' => 'entity\\isAttributeChanged',
          'insertText' => 'entity\\isAttributeChanged(ATTRIBUTE)',
        ),
        33 => 
        array (
          'name' => 'entity\\isAttributeNotChanged',
          'insertText' => 'entity\\isAttributeNotChanged(ATTRIBUTE)',
        ),
        34 => 
        array (
          'name' => 'entity\\attribute',
          'insertText' => 'entity\\attribute(ATTRIBUTE)',
        ),
        35 => 
        array (
          'name' => 'entity\\attributeFetched',
          'insertText' => 'entity\\attributeFetched(ATTRIBUTE)',
        ),
        36 => 
        array (
          'name' => 'entity\\setAttribute',
          'insertText' => 'entity\\setAttribute(ATTRIBUTE, VALUE)',
        ),
        37 => 
        array (
          'name' => 'entity\\addLinkMultipleId',
          'insertText' => 'entity\\addLinkMultipleId(LINK, ID)',
        ),
        38 => 
        array (
          'name' => 'entity\\hasLinkMultipleId',
          'insertText' => 'entity\\hasLinkMultipleId(LINK, ID)',
        ),
        39 => 
        array (
          'name' => 'entity\\isRelated',
          'insertText' => 'entity\\isRelated(LINK, ID)',
        ),
        40 => 
        array (
          'name' => 'entity\\sumRelated',
          'insertText' => 'entity\\sumRelated(LINK, FIELD, FILTER)',
        ),
        41 => 
        array (
          'name' => 'entity\\countRelated',
          'insertText' => 'entity\\countRelated(LINK, FILTER)',
        ),
        42 => 
        array (
          'name' => 'record\\exists',
          'insertText' => 'record\\exists(ENTITY_TYPE, KEY, VALUE)',
        ),
        43 => 
        array (
          'name' => 'record\\count',
          'insertText' => 'record\\count(ENTITY_TYPE, KEY, VALUE)',
        ),
        44 => 
        array (
          'name' => 'env\\userAttribute',
          'insertText' => 'env\\userAttribute(ATTRIBUTE)',
        ),
      ),
    ),
    'jsLibs' => 
    array (
      'Flotr' => 
      array (
        'path' => 'client/lib/flotr2.js',
        'exportsTo' => 'window',
        'exportsAs' => 'Flotr',
      ),
      'Summernote' => 
      array (
        'path' => 'client/lib/summernote.min.js',
        'exportsTo' => '$',
        'exportsAs' => 'summernote',
      ),
      'Textcomplete' => 
      array (
        'path' => 'client/lib/jquery.textcomplete.js',
        'exportsTo' => '$',
        'exportsAs' => 'textcomplete',
      ),
      'Select2' => 
      array (
        'path' => 'client/lib/select2.min.js',
        'exportsTo' => '$',
        'exportsAs' => 'select2',
      ),
      'Selectize' => 
      array (
        'path' => 'client/lib/selectize.min.js',
        'exportsTo' => 'window',
        'exportsAs' => 'Selectize',
      ),
      'Cropper' => 
      array (
        'path' => 'client/lib/cropper.min.js',
        'exportsTo' => '$',
        'exportsAs' => 'cropper',
      ),
      'gridstack' => 
      array (
        'path' => 'client/lib/gridstack.all.js',
        'exportsTo' => '$',
        'exportsAs' => 'gridstack',
      ),
      'Colorpicker' => 
      array (
        'path' => 'client/lib/bootstrap-colorpicker.js',
        'exportsTo' => '$',
        'exportsAs' => 'colorpicker',
      ),
      'exif' => 
      array (
        'path' => 'client/lib/exif-js.js',
        'exportsTo' => 'window',
        'exportsAs' => 'EXIF',
      ),
      'full-calendar' => 
      array (
        'path' => 'client/modules/crm/lib/fullcalendar.min.js',
        'exportsTo' => '$',
        'exportsAs' => 'fullCalendar',
      ),
      'vis' => 
      array (
        'path' => 'client/modules/crm/lib/vis.min.js',
        'exportsAs' => 'vis',
        'noAppCache' => true,
      ),
    ),
    'metadata' => 
    array (
      'frontendHiddenPathList' => 
      array (
        0 => 
        array (
          0 => 'app',
          1 => 'metadata',
        ),
        1 => 
        array (
          0 => 'app',
          1 => 'loaders',
        ),
        2 => 
        array (
          0 => 'app',
          1 => 'consoleCommands',
        ),
        3 => 
        array (
          0 => 'app',
          1 => 'formula',
          2 => 'functionClassNameMap',
        ),
        4 => 
        array (
          0 => 'app',
          1 => 'fileStorage',
          2 => 'implementationClassNameMap',
        ),
        5 => 
        array (
          0 => 'app',
          1 => 'emailNotifications',
          2 => 'handlerClassNameMap',
        ),
        6 => 
        array (
          0 => 'app',
          1 => 'client',
        ),
        7 => 
        array (
          0 => 'app',
          1 => 'auth2FAMethods',
          2 => '__ANY__',
          3 => 'implementationClassName',
        ),
        8 => 
        array (
          0 => 'app',
          1 => 'auth2FAMethods',
          2 => '__ANY__',
          3 => 'implementationUserClassName',
        ),
        9 => 
        array (
          0 => 'authenticationMethods',
          1 => '__ANY__',
          2 => 'implementationClassName',
        ),
      ),
    ),
    'templates' => 
    array (
      'accessInfo' => 
      array (
        'scope' => 'User',
      ),
      'accessInfoPortal' => 
      array (
        'scope' => 'User',
      ),
      'assignment' => 
      array (
        'scopeListConfigParam' => 'assignmentEmailNotificationsEntityList',
      ),
      'mention' => 
      array (
        'scope' => 'Note',
      ),
      'noteEmailRecieved' => 
      array (
        'scope' => 'Note',
      ),
      'notePost' => 
      array (
        'scope' => 'Note',
      ),
      'notePostNoParent' => 
      array (
        'scope' => 'Note',
      ),
      'noteStatus' => 
      array (
        'scope' => 'Note',
      ),
      'passwordChangeLink' => 
      array (
        'scope' => 'User',
      ),
      'invitation' => 
      array (
        'scopeList' => 
        array (
          0 => 'Meeting',
          1 => 'Call',
        ),
        'module' => 'Crm',
      ),
      'reminder' => 
      array (
        'scopeList' => 
        array (
          0 => 'Meeting',
          1 => 'Call',
          2 => 'Task',
        ),
        'module' => 'Crm',
      ),
    ),
    'webSocket' => 
    array (
      'categories' => 
      array (
        'newNotification' => 
        array (
        ),
        'streamUpdate' => 
        array (
          'paramList' => 
          array (
            0 => 'scope',
            1 => 'id',
          ),
          'accessCheckCommand' => 'AclCheck --userId=:userId --scope=:scope --id=:id --action=stream',
        ),
        'popupNotifications.event' => 
        array (
        ),
      ),
    ),
    'popupNotifications' => 
    array (
      'event' => 
      array (
        'url' => 'Activities/action/popupNotifications',
        'interval' => 15,
        'useWebSocket' => true,
        'portalDisabled' => true,
        'view' => 'crm:views/meeting/popup-notification',
      ),
    ),
  ),
  'authenticationMethods' => 
  array (
    'Finnova' => 
    array (
      'settings' => 
      array (
        'isAvailable' => true,
      ),
    ),
    'LDAP' => 
    array (
      'settings' => 
      array (
        'isAvailable' => true,
        'layout' => 
        array (
          'label' => 'LDAP',
          'rows' => 
          array (
            0 => 
            array (
              0 => 
              array (
                'name' => 'ldapHost',
              ),
              1 => 
              array (
                'name' => 'ldapPort',
              ),
            ),
            1 => 
            array (
              0 => 
              array (
                'name' => 'ldapAuth',
              ),
              1 => 
              array (
                'name' => 'ldapSecurity',
              ),
            ),
            2 => 
            array (
              0 => 
              array (
                'name' => 'ldapUsername',
                'fullWidth' => true,
              ),
            ),
            3 => 
            array (
              0 => 
              array (
                'name' => 'ldapPassword',
              ),
              1 => 
              array (
                'name' => 'testConnection',
                'customLabel' => NULL,
                'view' => 'views/admin/authentication/fields/test-connection',
              ),
            ),
            4 => 
            array (
              0 => 
              array (
                'name' => 'ldapUserNameAttribute',
              ),
              1 => 
              array (
                'name' => 'ldapUserObjectClass',
              ),
            ),
            5 => 
            array (
              0 => 
              array (
                'name' => 'ldapAccountCanonicalForm',
              ),
              1 => 
              array (
                'name' => 'ldapBindRequiresDn',
              ),
            ),
            6 => 
            array (
              0 => 
              array (
                'name' => 'ldapBaseDn',
                'fullWidth' => true,
              ),
            ),
            7 => 
            array (
              0 => 
              array (
                'name' => 'ldapUserLoginFilter',
                'fullWidth' => true,
              ),
            ),
            8 => 
            array (
              0 => 
              array (
                'name' => 'ldapAccountDomainName',
              ),
              1 => 
              array (
                'name' => 'ldapAccountDomainNameShort',
              ),
            ),
            9 => 
            array (
              0 => 
              array (
                'name' => 'ldapTryUsernameSplit',
              ),
              1 => 
              array (
                'name' => 'ldapOptReferrals',
              ),
            ),
            10 => 
            array (
              0 => 
              array (
                'name' => 'ldapCreateFinnovaUser',
              ),
              1 => false,
            ),
            11 => 
            array (
              0 => 
              array (
                'name' => 'ldapUserFirstNameAttribute',
              ),
              1 => 
              array (
                'name' => 'ldapUserLastNameAttribute',
              ),
            ),
            12 => 
            array (
              0 => 
              array (
                'name' => 'ldapUserTitleAttribute',
              ),
              1 => false,
            ),
            13 => 
            array (
              0 => 
              array (
                'name' => 'ldapUserEmailAddressAttribute',
              ),
              1 => 
              array (
                'name' => 'ldapUserPhoneNumberAttribute',
              ),
            ),
            14 => 
            array (
              0 => 
              array (
                'name' => 'ldapUserTeams',
              ),
              1 => 
              array (
                'name' => 'ldapUserDefaultTeam',
              ),
            ),
            15 => 
            array (
              0 => 
              array (
                'name' => 'ldapPortalUserLdapAuth',
              ),
              1 => false,
            ),
            16 => 
            array (
              0 => 
              array (
                'name' => 'ldapPortalUserPortals',
              ),
              1 => 
              array (
                'name' => 'ldapPortalUserRoles',
              ),
            ),
          ),
        ),
        'fieldList' => 
        array (
          0 => 'ldapHost',
          1 => 'ldapPort',
          2 => 'ldapAuth',
          3 => 'ldapSecurity',
          4 => 'ldapUsername',
          5 => 'ldapPassword',
          6 => 'ldapBindRequiresDn',
          7 => 'ldapUserLoginFilter',
          8 => 'ldapBaseDn',
          9 => 'ldapAccountCanonicalForm',
          10 => 'ldapAccountDomainName',
          11 => 'ldapAccountDomainNameShort',
          12 => 'ldapAccountDomainName',
          13 => 'ldapAccountDomainNameShort',
          14 => 'ldapTryUsernameSplit',
          15 => 'ldapOptReferrals',
          16 => 'ldapCreateFinnovaUser',
          17 => 'ldapPortalUserLdapAuth',
        ),
        'dynamicLogic' => 
        array (
          'fields' => 
          array (
            'ldapUsername' => 
            array (
              'visible' => 
              array (
                'conditionGroup' => 
                array (
                  0 => 
                  array (
                    'type' => 'isTrue',
                    'attribute' => 'ldapAuth',
                  ),
                ),
              ),
            ),
            'ldapPassword' => 
            array (
              'visible' => 
              array (
                'conditionGroup' => 
                array (
                  0 => 
                  array (
                    'type' => 'isTrue',
                    'attribute' => 'ldapAuth',
                  ),
                ),
              ),
            ),
            'testConnection' => 
            array (
              'visible' => 
              array (
                'conditionGroup' => 
                array (
                  0 => 
                  array (
                    'type' => 'isTrue',
                    'attribute' => 'ldapAuth',
                  ),
                ),
              ),
            ),
            'ldapAccountDomainName' => 
            array (
              'visible' => 
              array (
                'conditionGroup' => 
                array (
                  0 => 
                  array (
                    'type' => 'in',
                    'attribute' => 'ldapAccountCanonicalForm',
                    'value' => 
                    array (
                      0 => 'Backslash',
                      1 => 'Principal',
                    ),
                  ),
                ),
              ),
            ),
            'ldapAccountDomainNameShort' => 
            array (
              'visible' => 
              array (
                'conditionGroup' => 
                array (
                  0 => 
                  array (
                    'type' => 'in',
                    'attribute' => 'ldapAccountCanonicalForm',
                    'value' => 
                    array (
                      0 => 'Backslash',
                      1 => 'Principal',
                    ),
                  ),
                ),
              ),
            ),
            'ldapUserTitleAttribute' => 
            array (
              'visible' => 
              array (
                'conditionGroup' => 
                array (
                  0 => 
                  array (
                    'type' => 'isTrue',
                    'attribute' => 'ldapCreateFinnovaUser',
                  ),
                ),
              ),
            ),
            'ldapUserFirstNameAttribute' => 
            array (
              'visible' => 
              array (
                'conditionGroup' => 
                array (
                  0 => 
                  array (
                    'type' => 'isTrue',
                    'attribute' => 'ldapCreateFinnovaUser',
                  ),
                ),
              ),
            ),
            'ldapUserLastNameAttribute' => 
            array (
              'visible' => 
              array (
                'conditionGroup' => 
                array (
                  0 => 
                  array (
                    'type' => 'isTrue',
                    'attribute' => 'ldapCreateFinnovaUser',
                  ),
                ),
              ),
            ),
            'ldapUserEmailAddressAttribute' => 
            array (
              'visible' => 
              array (
                'conditionGroup' => 
                array (
                  0 => 
                  array (
                    'type' => 'isTrue',
                    'attribute' => 'ldapCreateFinnovaUser',
                  ),
                ),
              ),
            ),
            'ldapUserPhoneNumberAttribute' => 
            array (
              'visible' => 
              array (
                'conditionGroup' => 
                array (
                  0 => 
                  array (
                    'type' => 'isTrue',
                    'attribute' => 'ldapCreateFinnovaUser',
                  ),
                ),
              ),
            ),
            'ldapUserTeams' => 
            array (
              'visible' => 
              array (
                'conditionGroup' => 
                array (
                  0 => 
                  array (
                    'type' => 'isTrue',
                    'attribute' => 'ldapCreateFinnovaUser',
                  ),
                ),
              ),
            ),
            'ldapUserDefaultTeam' => 
            array (
              'visible' => 
              array (
                'conditionGroup' => 
                array (
                  0 => 
                  array (
                    'type' => 'isTrue',
                    'attribute' => 'ldapCreateFinnovaUser',
                  ),
                ),
              ),
            ),
            'ldapPortalUserPortals' => 
            array (
              'visible' => 
              array (
                'conditionGroup' => 
                array (
                  0 => 
                  array (
                    'type' => 'isTrue',
                    'attribute' => 'ldapPortalUserLdapAuth',
                  ),
                ),
              ),
            ),
            'ldapPortalUserRoles' => 
            array (
              'visible' => 
              array (
                'conditionGroup' => 
                array (
                  0 => 
                  array (
                    'type' => 'isTrue',
                    'attribute' => 'ldapPortalUserLdapAuth',
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
    ),
  ),
  'clientDefs' => 
  array (
    'ActionHistoryRecord' => 
    array (
      'controller' => 'controllers/record',
      'createDisabled' => true,
      'recordViews' => 
      array (
        'list' => 'views/action-history-record/record/list',
      ),
      'modalViews' => 
      array (
        'detail' => 'views/action-history-record/modals/detail',
      ),
    ),
    'ApiUser' => 
    array (
      'controller' => 'controllers/api-user',
      'views' => 
      array (
        'detail' => 'views/user/detail',
        'list' => 'views/api-user/list',
      ),
      'recordViews' => 
      array (
        'list' => 'views/user/record/list',
        'detail' => 'views/user/record/detail',
        'edit' => 'views/user/record/edit',
        'detailSmall' => 'views/user/record/detail-quick',
        'editSmall' => 'views/user/record/edit-quick',
      ),
      'defaultSidePanelFieldLists' => 
      array (
        'detail' => 
        array (
          0 => 'avatar',
          1 => 'createdAt',
          2 => 'lastAccess',
        ),
        'detailSmall' => 
        array (
          0 => 'avatar',
          1 => 'createdAt',
        ),
        'edit' => 
        array (
          0 => 'avatar',
        ),
        'editSmall' => 
        array (
          0 => 'avatar',
        ),
      ),
      'filterList' => 
      array (
      ),
      'boolFilterList' => 
      array (
      ),
    ),
    'Attachment' => 
    array (
      'controller' => 'controllers/record',
      'createDisabled' => true,
      'recordViews' => 
      array (
        'list' => 'views/attachment/record/list',
        'detail' => 'views/attachment/record/detail',
      ),
      'modalViews' => 
      array (
        'detail' => 'views/attachment/modals/detail',
      ),
      'filterList' => 
      array (
        0 => 'orphan',
      ),
    ),
    'AuthLogRecord' => 
    array (
      'controller' => 'controllers/record',
      'recordViews' => 
      array (
        'list' => 'views/admin/auth-log-record/record/list',
        'detail' => 'views/admin/auth-log-record/record/detail',
        'detailSmall' => 'views/admin/auth-log-record/record/detail-small',
      ),
      'modalViews' => 
      array (
        'detail' => 'views/admin/auth-log-record/modals/detail',
      ),
      'filterList' => 
      array (
        0 => 'accepted',
        1 => 'denied',
      ),
      'createDisabled' => true,
      'relationshipPanels' => 
      array (
        'actionHistoryRecords' => 
        array (
          'createDisabled' => true,
          'selectDisabled' => true,
          'unlinkDisabled' => true,
          'rowActionsView' => 'views/record/row-actions/relationship-view-only',
        ),
      ),
    ),
    'AuthToken' => 
    array (
      'controller' => 'controllers/record',
      'recordViews' => 
      array (
        'list' => 'views/admin/auth-token/record/list',
        'detail' => 'views/admin/auth-token/record/detail',
        'detailSmall' => 'views/admin/auth-token/record/detail-small',
      ),
      'modalViews' => 
      array (
        'detail' => 'views/admin/auth-token/modals/detail',
      ),
      'filterList' => 
      array (
        0 => 'active',
        1 => 'inactive',
      ),
      'createDisabled' => true,
      'relationshipPanels' => 
      array (
        'actionHistoryRecords' => 
        array (
          'createDisabled' => true,
          'selectDisabled' => true,
          'unlinkDisabled' => true,
          'rowActionsView' => 'views/record/row-actions/relationship-view-only',
        ),
      ),
    ),
    'Dashboard' => 
    array (
      'controller' => 'controllers/dashboard',
      'iconClass' => 'fas fa-th-large',
    ),
    'DashboardTemplate' => 
    array (
      'controller' => 'controllers/record',
      'views' => 
      array (
        'detail' => 'views/dashboard-template/detail',
      ),
      'menu' => 
      array (
        'detail' => 
        array (
          'buttons' => 
          array (
            0 => 
            array (
              'action' => 'deployToUsers',
              'label' => 'Deploy to Users',
            ),
            1 => 
            array (
              'action' => 'deployToTeam',
              'label' => 'Deploy to Team',
            ),
          ),
        ),
      ),
      'searchPanelDisabled' => true,
    ),
    'DynamicLogic' => 
    array (
      'itemTypes' => 
      array (
        'and' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/group-base',
          'operator' => 'and',
        ),
        'or' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/group-base',
          'operator' => 'or',
        ),
        'not' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/group-not',
          'operator' => 'not',
        ),
        'equals' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-base',
          'operatorString' => '=',
        ),
        'notEquals' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-base',
          'operatorString' => '&ne;',
        ),
        'greaterThan' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-base',
          'operatorString' => '&gt;',
        ),
        'lessThan' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-base',
          'operatorString' => '&lt;',
        ),
        'greaterThanOrEquals' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-base',
          'operatorString' => '&ge;',
        ),
        'lessThanOrEquals' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-base',
          'operatorString' => '&le;',
        ),
        'isEmpty' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-operator-only-base',
          'operatorString' => '= &empty;',
        ),
        'isNotEmpty' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-operator-only-base',
          'operatorString' => '&ne; &empty;',
        ),
        'isTrue' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-operator-only-base',
          'operatorString' => '= 1',
        ),
        'isFalse' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-operator-only-base',
          'operatorString' => '= 0',
        ),
        'in' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-multiple-values-base',
          'operatorString' => '&isin;',
        ),
        'notIn' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-multiple-values-base',
          'operatorString' => '&notin;',
        ),
        'isToday' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-is-today',
          'operatorString' => '=',
        ),
        'inFuture' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-in-future',
          'operatorString' => '&isin;',
        ),
        'inPast' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-in-past',
          'operatorString' => '&isin;',
        ),
        'contains' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-value-link',
          'operatorString' => '&niv;',
        ),
        'notContains' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-value-link',
          'operatorString' => '&notni;',
        ),
        'has' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-value-enum',
          'operatorString' => '&niv;',
        ),
        'notHas' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions-string/item-value-enum',
          'operatorString' => '&notni;',
        ),
      ),
      'fieldTypes' => 
      array (
        'bool' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/base',
          'typeList' => 
          array (
            0 => 'isTrue',
            1 => 'isFalse',
          ),
        ),
        'varchar' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/base',
          'typeList' => 
          array (
            0 => 'equals',
            1 => 'notEquals',
            2 => 'isEmpty',
            3 => 'isNotEmpty',
          ),
        ),
        'email' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/base',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
          ),
        ),
        'phone' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/base',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
          ),
        ),
        'text' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/base',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
          ),
        ),
        'int' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/base',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
            2 => 'equals',
            3 => 'notEquals',
            4 => 'greaterThan',
            5 => 'lessThan',
            6 => 'greaterThanOrEquals',
            7 => 'lessThanOrEquals',
          ),
        ),
        'float' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/base',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
            2 => 'equals',
            3 => 'notEquals',
            4 => 'greaterThan',
            5 => 'lessThan',
            6 => 'greaterThanOrEquals',
            7 => 'lessThanOrEquals',
          ),
        ),
        'currency' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/base',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
            2 => 'equals',
            3 => 'notEquals',
            4 => 'greaterThan',
            5 => 'lessThan',
            6 => 'greaterThanOrEquals',
            7 => 'lessThanOrEquals',
          ),
        ),
        'date' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/date',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
            2 => 'isToday',
            3 => 'inFuture',
            4 => 'inPast',
            5 => 'equals',
            6 => 'notEquals',
          ),
        ),
        'datetime' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/date',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
            2 => 'isToday',
            3 => 'inFuture',
            4 => 'inPast',
          ),
        ),
        'datetimeOptional' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/date',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
            2 => 'isToday',
            3 => 'inFuture',
            4 => 'inPast',
          ),
        ),
        'enum' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/enum',
          'typeList' => 
          array (
            0 => 'equals',
            1 => 'notEquals',
            2 => 'isEmpty',
            3 => 'isNotEmpty',
            4 => 'in',
            5 => 'notIn',
          ),
        ),
        'link' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/link',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
            2 => 'equals',
            3 => 'notEquals',
          ),
        ),
        'file' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/link',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
          ),
        ),
        'image' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/link',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
          ),
        ),
        'linkParent' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/link-parent',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
            2 => 'equals',
            3 => 'notEquals',
          ),
        ),
        'linkMultiple' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/link-multiple',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
            2 => 'contains',
            3 => 'notContains',
          ),
        ),
        'foreign' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/base',
          'typeList' => 
          array (
            0 => 'equals',
            1 => 'notEquals',
            2 => 'isEmpty',
            3 => 'isNotEmpty',
          ),
        ),
        'id' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/enum',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
          ),
        ),
        'multiEnum' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/multi-enum',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
            2 => 'has',
            3 => 'notHas',
          ),
        ),
        'array' => 
        array (
          'view' => 'views/admin/dynamic-logic/conditions/field-types/multi-enum',
          'typeList' => 
          array (
            0 => 'isEmpty',
            1 => 'isNotEmpty',
            2 => 'has',
            3 => 'notHas',
          ),
        ),
      ),
      'conditionTypes' => 
      array (
        'isTrue' => 
        array (
          'valueType' => 'empty',
        ),
        'isFalse' => 
        array (
          'valueType' => 'empty',
        ),
        'isEmpty' => 
        array (
          'valueType' => 'empty',
        ),
        'isNotEmpty' => 
        array (
          'valueType' => 'empty',
        ),
        'equals' => 
        array (
          'valueType' => 'field',
        ),
        'notEquals' => 
        array (
          'valueType' => 'field',
        ),
        'greaterThan' => 
        array (
          'valueType' => 'field',
        ),
        'lessThan' => 
        array (
          'valueType' => 'field',
        ),
        'greaterThanOrEquals' => 
        array (
          'valueType' => 'field',
        ),
        'lessThanOrEquals' => 
        array (
          'valueType' => 'field',
        ),
        'in' => 
        array (
          'valueType' => 'field',
        ),
        'notIn' => 
        array (
          'valueType' => 'field',
        ),
        'contains' => 
        array (
          'valueType' => 'custom',
        ),
        'notContains' => 
        array (
          'valueType' => 'custom',
        ),
        'inPast' => 
        array (
          'valueType' => 'empty',
        ),
        'isFuture' => 
        array (
          'valueType' => 'empty',
        ),
        'isToday' => 
        array (
          'valueType' => 'empty',
        ),
        'has' => 
        array (
          'valueType' => 'field',
        ),
        'notHas' => 
        array (
          'valueType' => 'field',
        ),
      ),
    ),
    'Email' => 
    array (
      'controller' => 'controllers/email',
      'acl' => 'acl/email',
      'model' => 'models/email',
      'views' => 
      array (
        'list' => 'views/email/list',
        'detail' => 'views/email/detail',
      ),
      'recordViews' => 
      array (
        'list' => 'views/email/record/list',
        'detail' => 'views/email/record/detail',
        'edit' => 'views/email/record/edit',
        'editQuick' => 'views/email/record/edit-quick',
        'detailQuick' => 'views/email/record/detail-quick',
        'compose' => 'views/email/record/compose',
        'listRelated' => 'views/email/record/list-related',
      ),
      'modalViews' => 
      array (
        'detail' => 'views/email/modals/detail',
        'compose' => 'views/modals/compose-email',
      ),
      'quickCreateModalType' => 'compose',
      'defaultSidePanelFieldList' => 
      array (
        0 => 'teams',
        1 => 'replied',
        2 => 'replies',
      ),
      'menu' => 
      array (
        'list' => 
        array (
          'buttons' => 
          array (
            0 => 
            array (
              'label' => 'Compose',
              'action' => 'composeEmail',
              'style' => 'danger',
              'acl' => 'create',
            ),
          ),
          'dropdown' => 
          array (
            0 => 
            array (
              'label' => 'Archive Email',
              'link' => '#Email/create',
              'acl' => 'create',
            ),
            1 => false,
            2 => 
            array (
              'label' => 'Email Templates',
              'link' => '#EmailTemplate',
              'acl' => 'read',
              'aclScope' => 'EmailTemplate',
            ),
            3 => 
            array (
              'label' => 'Folders',
              'link' => '#EmailFolder',
              'configCheck' => '!emailFoldersDisabled',
            ),
            4 => 
            array (
              'label' => 'Filters',
              'link' => '#EmailFilter',
            ),
          ),
        ),
        'detail' => 
        array (
          'dropdown' => 
          array (
            0 => 
            array (
              'label' => 'Reply',
              'action' => 'reply',
              'acl' => 'read',
            ),
            1 => 
            array (
              'label' => 'Reply to All',
              'action' => 'replyToAll',
              'acl' => 'read',
            ),
            2 => 
            array (
              'label' => 'Forward',
              'action' => 'forward',
              'acl' => 'read',
            ),
          ),
        ),
      ),
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'replied' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isNotEmpty',
                  'attribute' => 'repliedId',
                  'data' => 
                  array (
                    'field' => 'replied',
                  ),
                ),
              ),
            ),
          ),
          'replies' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isNotEmpty',
                  'attribute' => 'repliesIds',
                  'data' => 
                  array (
                    'field' => 'replies',
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      'filterList' => 
      array (
      ),
      'defaultFilterData' => 
      array (
      ),
      'boolFilterList' => 
      array (
      ),
      'iconClass' => 'local_post_office',
    ),
    'EmailAccount' => 
    array (
      'controller' => 'controllers/email-account',
      'recordViews' => 
      array (
        'list' => 'views/email-account/record/list',
        'detail' => 'views/email-account/record/detail',
        'edit' => 'views/email-account/record/edit',
      ),
      'views' => 
      array (
        'list' => 'views/email-account/list',
      ),
      'inlineEditDisabled' => true,
      'searchPanelDisabled' => true,
      'formDependency' => 
      array (
        'storeSentEmails' => 
        array (
          'map' => 
          array (
            'true' => 
            array (
              0 => 
              array (
                'action' => 'show',
                'fields' => 
                array (
                  0 => 'sentFolder',
                ),
              ),
              1 => 
              array (
                'action' => 'setRequired',
                'fields' => 
                array (
                  0 => 'sentFolder',
                ),
              ),
            ),
          ),
          'default' => 
          array (
            0 => 
            array (
              'action' => 'hide',
              'fields' => 
              array (
                0 => 'sentFolder',
              ),
            ),
            1 => 
            array (
              'action' => 'setNotRequired',
              'fields' => 
              array (
                0 => 'sentFolder',
              ),
            ),
          ),
        ),
      ),
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'smtpUsername' => 
          array (
            'required' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'useImap',
                    ),
                    1 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'smtpAuth',
                    ),
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      'relationshipPanels' => 
      array (
        'filters' => 
        array (
          'select' => false,
          'rowActionsView' => 'views/record/row-actions/relationship-edit-and-remove',
          'unlinkDisabled' => true,
        ),
        'emails' => 
        array (
          'select' => false,
          'create' => false,
          'rowActionsView' => 'views/record/row-actions/remove-only',
          'unlinkDisabled' => true,
        ),
      ),
    ),
    'EmailFilter' => 
    array (
      'controller' => 'controllers/record',
      'modalViews' => 
      array (
        'edit' => 'views/email-filter/modals/edit',
      ),
      'recordViews' => 
      array (
        'detail' => 'views/email-filter/record/detail',
        'edit' => 'views/email-filter/record/edit',
        'editQuick' => 'views/email-filter/record/edit-small',
        'detailQuick' => 'views/email-filter/record/detail-small',
      ),
      'searchPanelDisabled' => false,
      'menu' => 
      array (
        'list' => 
        array (
          'buttons' => 
          array (
            0 => 
            array (
              'label' => 'Emails',
              'link' => '#Email',
              'style' => 'default',
              'aclScope' => 'Email',
            ),
          ),
        ),
      ),
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
    ),
    'EmailFolder' => 
    array (
      'controller' => 'controllers/record',
      'views' => 
      array (
        'list' => 'views/email-folder/list',
      ),
      'recordViews' => 
      array (
        'list' => 'views/email-folder/record/list',
      ),
      'menu' => 
      array (
        'list' => 
        array (
          'buttons' => 
          array (
            0 => 
            array (
              'label' => 'Emails',
              'link' => '#Email',
              'style' => 'default',
              'aclScope' => 'Email',
            ),
          ),
        ),
      ),
      'searchPanelDisabled' => true,
    ),
    'EmailTemplate' => 
    array (
      'controller' => 'controllers/record',
      'views' => 
      array (
        'list' => 'views/email-template/list',
      ),
      'recordViews' => 
      array (
        'edit' => 'views/email-template/record/edit',
        'detail' => 'views/email-template/record/detail',
        'editQuick' => 'views/email-template/record/edit-quick',
      ),
      'modalViews' => 
      array (
        'select' => 'views/modals/select-records-with-categories',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'information',
            'label' => 'Info',
            'view' => 'views/email-template/record/panels/information',
          ),
        ),
        'edit' => 
        array (
          0 => 
          array (
            'name' => 'information',
            'label' => 'Info',
            'view' => 'views/email-template/record/panels/information',
          ),
        ),
      ),
      'menu' => 
      array (
        'list' => 
        array (
          'dropdown' => 
          array (
            0 => 
            array (
              'label' => 'Manage Categories',
              'link' => '#EmailTemplateCategory',
              'acl' => 'edit',
              'aclScope' => 'EmailTemplateCategory',
            ),
          ),
        ),
      ),
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'filterList' => 
      array (
        0 => 'actual',
      ),
      'placeholderList' => 
      array (
        0 => 'today',
        1 => 'now',
        2 => 'currentYear',
        3 => 'optOutUrl',
        4 => 'optOutLink',
      ),
      'iconClass' => 'fas fa-envelope-square',
    ),
    'EmailTemplateCategory' => 
    array (
      'controller' => 'controllers/record-tree',
      'collection' => 'collections/tree',
      'menu' => 
      array (
        'listTree' => 
        array (
          'buttons' => 
          array (
            0 => 
            array (
              'label' => 'List View',
              'link' => '#EmailTemplateCategory/list',
              'acl' => 'read',
              'style' => 'default',
            ),
            1 => 
            array (
              'label' => 'Email Templates',
              'link' => '#EmailTemplate',
              'acl' => 'read',
              'aclScope' => 'EmailTemplate',
              'style' => 'default',
            ),
          ),
        ),
        'list' => 
        array (
          'buttons' => 
          array (
            0 => 
            array (
              'label' => 'Tree View',
              'link' => '#EmailTemplateCategory',
              'acl' => 'read',
              'style' => 'default',
            ),
            1 => 
            array (
              'label' => 'Email Templates',
              'link' => '#EmailTemplate',
              'acl' => 'read',
              'aclScope' => 'EmailTemplate',
              'style' => 'default',
            ),
          ),
        ),
      ),
      'relationshipPanels' => 
      array (
        'emailTemplates' => 
        array (
          'create' => false,
        ),
      ),
    ),
    'ExternalAccount' => 
    array (
      'controller' => 'controllers/external-account',
    ),
    'Home' => 
    array (
      'iconClass' => 'fas fa-th-large',
    ),
    'Import' => 
    array (
      'controller' => 'controllers/import',
      'acl' => 'acl/import',
      'recordViews' => 
      array (
        'list' => 'views/import/record/list',
        'detail' => 'views/import/record/detail',
      ),
      'views' => 
      array (
        'list' => 'views/import/list',
        'detail' => 'views/import/detail',
      ),
      'bottomPanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'imported',
            'label' => 'Imported',
            'view' => 'views/import/record/panels/imported',
            'createDisabled' => true,
            'selectDisabled' => true,
            'unlinkDisabled' => true,
          ),
          1 => 
          array (
            'name' => 'duplicates',
            'label' => 'Duplicates',
            'view' => 'views/import/record/panels/duplicates',
            'rowActionsView' => 'views/import/record/row-actions/duplicates',
            'createDisabled' => true,
            'selectDisabled' => true,
            'unlinkDisabled' => true,
          ),
          2 => 
          array (
            'name' => 'updated',
            'label' => 'Updated',
            'view' => 'views/import/record/panels/updated',
            'createDisabled' => true,
            'selectDisabled' => true,
            'unlinkDisabled' => true,
          ),
        ),
      ),
      'searchPanelDisabled' => true,
      'iconClass' => 'fas fa-file-import',
    ),
    'InboundEmail' => 
    array (
      'recordViews' => 
      array (
        'detail' => 'views/inbound-email/record/detail',
        'edit' => 'views/inbound-email/record/edit',
        'list' => 'views/inbound-email/record/list',
      ),
      'inlineEditDisabled' => true,
      'formDependency' => 
      array (
        'reply' => 
        array (
          'map' => 
          array (
            'true' => 
            array (
              0 => 
              array (
                'action' => 'show',
                'fields' => 
                array (
                  0 => 'replyEmailTemplate',
                  1 => 'replyFromAddress',
                  2 => 'replyFromName',
                ),
              ),
              1 => 
              array (
                'action' => 'setRequired',
                'fields' => 
                array (
                  0 => 'replyEmailTemplate',
                ),
              ),
            ),
          ),
          'default' => 
          array (
            0 => 
            array (
              'action' => 'hide',
              'fields' => 
              array (
                0 => 'replyEmailTemplate',
                1 => 'replyFromAddress',
                2 => 'replyFromName',
              ),
            ),
            1 => 
            array (
              'action' => 'setNotRequired',
              'fields' => 
              array (
                0 => 'replyEmailTemplate',
              ),
            ),
          ),
        ),
      ),
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'smtpUsername' => 
          array (
            'required' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'useImap',
                    ),
                    1 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'smtpAuth',
                    ),
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      'searchPanelDisabled' => true,
      'relationshipPanels' => 
      array (
        'filters' => 
        array (
          'select' => false,
          'rowActionsView' => 'views/record/row-actions/relationship-edit-and-remove',
          'unlinkDisabled' => true,
        ),
        'emails' => 
        array (
          'select' => false,
          'create' => false,
          'rowActionsView' => 'views/record/row-actions/remove-only',
          'unlinkDisabled' => true,
        ),
      ),
      'defaultSidePanelFieldLists' => 
      array (
        'detail' => 
        array (
        ),
        'detailSmall' => 
        array (
        ),
        'edit' => 
        array (
        ),
        'editSmall' => 
        array (
        ),
      ),
    ),
    'Job' => 
    array (
      'modalViews' => 
      array (
        'detail' => 'views/admin/job/modals/detail',
      ),
      'recordViews' => 
      array (
        'list' => 'views/admin/job/record/list',
        'detailQuick' => 'views/admin/job/record/detail-small',
      ),
    ),
    'LastViewed' => 
    array (
      'controller' => 'controllers/last-viewed',
      'views' => 
      array (
        'list' => 'views/last-viewed/list',
      ),
      'recordViews' => 
      array (
        'list' => 'views/last-viewed/record/list',
      ),
    ),
    'LeadCapture' => 
    array (
      'controller' => 'controllers/record',
      'searchPanelDisabled' => true,
      'recordViews' => 
      array (
        'detail' => 'views/lead-capture/record/detail',
      ),
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'targetList' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'subscribeToTargetList',
                ),
              ),
            ),
            'required' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'subscribeToTargetList',
                ),
              ),
            ),
          ),
          'subscribeContactToTargetList' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'subscribeToTargetList',
                ),
              ),
            ),
          ),
          'optInConfirmationLifetime' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'optInConfirmation',
                ),
              ),
            ),
            'required' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'optInConfirmation',
                ),
              ),
            ),
          ),
          'optInConfirmationSuccessMessage' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'optInConfirmation',
                ),
              ),
            ),
          ),
          'createLeadBeforeOptInConfirmation' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'optInConfirmation',
                ),
              ),
            ),
          ),
          'smtpAccount' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'optInConfirmation',
                ),
              ),
            ),
          ),
          'skipOptInConfirmationIfSubscribed' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'optInConfirmation',
                    ),
                    1 => 
                    array (
                      'type' => 'isNotEmpty',
                      'attribute' => 'targetListId',
                      'data' => 
                      array (
                        'field' => 'targetList',
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
          'optInConfirmationEmailTemplate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'optInConfirmation',
                ),
              ),
            ),
            'required' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'optInConfirmation',
                ),
              ),
            ),
          ),
          'apiKey' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isNotEmpty',
                  'attribute' => 'id',
                ),
              ),
            ),
          ),
        ),
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'request',
            'label' => 'Request',
            'isForm' => true,
            'view' => 'views/lead-capture/record/panels/request',
          ),
        ),
      ),
      'relationshipPanels' => 
      array (
        'logRecords' => 
        array (
          'rowActionsView' => 'views/record/row-actions/view-and-remove',
          'layout' => 'listForLeadCapture',
          'select' => false,
          'create' => false,
        ),
      ),
    ),
    'LeadCaptureLogRecord' => 
    array (
      'modalViews' => 
      array (
        'detail' => 'views/lead-capture-log-record/modals/detail',
      ),
    ),
    'Note' => 
    array (
      'collection' => 'collections/note',
      'recordViews' => 
      array (
        'edit' => 'views/note/record/edit',
        'editQuick' => 'views/note/record/edit',
        'listRelated' => 'views/stream/record/list',
      ),
      'modalViews' => 
      array (
        'edit' => 'views/note/modals/edit',
      ),
      'itemViews' => 
      array (
        'Post' => 'views/stream/notes/post',
      ),
    ),
    'Notification' => 
    array (
      'controller' => 'controllers/notification',
      'acl' => 'acl/notification',
      'aclPortal' => 'acl-portal/notification',
      'collection' => 'collections/note',
      'itemViews' => 
      array (
        'System' => 'views/notification/items/system',
      ),
    ),
    'PasswordChangeRequest' => 
    array (
      'controller' => 'controllers/password-change-request',
    ),
    'Portal' => 
    array (
      'controller' => 'controllers/record',
      'relationshipPanels' => 
      array (
        'users' => 
        array (
          'create' => false,
          'rowActionsView' => 'views/record/row-actions/relationship-unlink-only',
          'layout' => 'listSmall',
          'selectPrimaryFilterName' => 'activePortal',
        ),
      ),
      'searchPanelDisabled' => true,
    ),
    'PortalRole' => 
    array (
      'recordViews' => 
      array (
        'detail' => 'views/portal-role/record/detail',
        'edit' => 'views/portal-role/record/edit',
        'editQuick' => 'views/portal-role/record/edit',
        'list' => 'views/portal-role/record/list',
      ),
      'relationshipPanels' => 
      array (
        'users' => 
        array (
          'create' => false,
          'rowActionsView' => 'views/record/row-actions/relationship-unlink-only',
        ),
      ),
      'views' => 
      array (
        'list' => 'views/portal-role/list',
      ),
    ),
    'PortalUser' => 
    array (
      'controller' => 'controllers/portal-user',
      'views' => 
      array (
        'detail' => 'views/user/detail',
        'list' => 'views/portal-user/list',
      ),
      'recordViews' => 
      array (
        'list' => 'views/user/record/list',
        'detail' => 'views/user/record/detail',
        'edit' => 'views/user/record/edit',
        'detailSmall' => 'views/user/record/detail-quick',
        'editSmall' => 'views/user/record/edit-quick',
      ),
      'defaultSidePanelFieldLists' => 
      array (
        'detail' => 
        array (
          0 => 'avatar',
          1 => 'createdAt',
          2 => 'lastAccess',
        ),
        'detailSmall' => 
        array (
          0 => 'avatar',
          1 => 'createdAt',
        ),
        'edit' => 
        array (
          0 => 'avatar',
        ),
        'editSmall' => 
        array (
          0 => 'avatar',
        ),
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
        ),
        'detailSmall' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
        ),
      ),
      'filterList' => 
      array (
        0 => 'activePortal',
      ),
      'boolFilterList' => 
      array (
      ),
      'selectDefaultFilters' => 
      array (
        'filter' => 'activePortal',
      ),
      'iconClass' => 'far fa-user-circle',
    ),
    'Preferences' => 
    array (
      'recordViews' => 
      array (
        'edit' => 'views/preferences/record/edit',
      ),
      'views' => 
      array (
        'edit' => 'views/preferences/edit',
      ),
      'acl' => 'acl/preferences',
      'aclPortal' => 'acl-portal/preferences',
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'assignmentEmailNotificationsIgnoreEntityTypeList' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'receiveAssignmentEmailNotifications',
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'Role' => 
    array (
      'recordViews' => 
      array (
        'detail' => 'views/role/record/detail',
        'edit' => 'views/role/record/edit',
        'editQuick' => 'views/role/record/edit',
        'list' => 'views/role/record/list',
      ),
      'relationshipPanels' => 
      array (
        'users' => 
        array (
          'create' => false,
          'rowActionsView' => 'views/record/row-actions/relationship-unlink-only',
        ),
        'teams' => 
        array (
          'create' => false,
          'rowActionsView' => 'views/record/row-actions/relationship-unlink-only',
        ),
      ),
      'views' => 
      array (
        'list' => 'views/role/list',
      ),
    ),
    'ScheduledJob' => 
    array (
      'controller' => 'controllers/record',
      'relationshipPanels' => 
      array (
        'log' => 
        array (
          'readOnly' => true,
          'view' => 'views/scheduled-job/record/panels/log',
          'unlinkDisabled' => true,
        ),
      ),
      'recordViews' => 
      array (
        'list' => 'views/scheduled-job/record/list',
        'detail' => 'views/scheduled-job/record/detail',
      ),
      'views' => 
      array (
        'list' => 'views/scheduled-job/list',
      ),
      'jobWithTargetList' => 
      array (
        0 => 'CheckEmailAccounts',
        1 => 'CheckInboundEmails',
      ),
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'job' => 
          array (
            'readOnly' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isNotEmpty',
                  'attribute' => 'id',
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'ScheduledJobLogRecord' => 
    array (
      'controller' => 'controllers/record',
    ),
    'Stream' => 
    array (
      'controller' => 'controllers/stream',
      'iconClass' => 'fas fa-rss',
    ),
    'Team' => 
    array (
      'defaultSidePanel' => 
      array (
        'edit' => false,
        'editSmall' => false,
      ),
      'defaultSidePanelFieldLists' => 
      array (
        'detail' => 
        array (
          0 => 'createdAt',
        ),
      ),
      'relationshipPanels' => 
      array (
        'users' => 
        array (
          'create' => false,
          'rowActionsView' => 'views/record/row-actions/relationship-unlink-only',
          'layout' => 'listForTeam',
          'selectPrimaryFilterName' => 'active',
        ),
      ),
      'recordViews' => 
      array (
        'detail' => 'views/team/record/detail',
        'edit' => 'views/team/record/edit',
        'list' => 'views/team/record/list',
      ),
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'iconClass' => 'fas fa-users',
    ),
    'Template' => 
    array (
      'controller' => 'controllers/record',
      'recordViews' => 
      array (
        'detail' => 'views/template/record/detail',
        'edit' => 'views/template/record/edit',
      ),
      'formDependency' => 
      array (
        'printFooter' => 
        array (
          'map' => 
          array (
            'true' => 
            array (
              0 => 
              array (
                'action' => 'show',
                'fields' => 
                array (
                  0 => 'footer',
                  1 => 'footerPosition',
                ),
              ),
            ),
          ),
          'default' => 
          array (
            0 => 
            array (
              'action' => 'hide',
              'fields' => 
              array (
                0 => 'footer',
                1 => 'footerPosition',
              ),
            ),
          ),
        ),
      ),
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'body' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isNotEmpty',
                  'attribute' => 'entityType',
                ),
              ),
            ),
          ),
          'header' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isNotEmpty',
                  'attribute' => 'entityType',
                ),
              ),
            ),
          ),
          'pageWidth' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'pageFormat',
                  'value' => 'Custom',
                ),
              ),
            ),
            'required' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'pageFormat',
                  'value' => 'Custom',
                ),
              ),
            ),
          ),
          'pageHeight' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'pageFormat',
                  'value' => 'Custom',
                ),
              ),
            ),
            'required' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'pageFormat',
                  'value' => 'Custom',
                ),
              ),
            ),
          ),
        ),
      ),
      'iconClass' => 'fas fa-file-pdf',
    ),
    'User' => 
    array (
      'controller' => 'controllers/user',
      'model' => 'models/user',
      'acl' => 'acl/user',
      'views' => 
      array (
        'detail' => 'views/user/detail',
        'list' => 'views/user/list',
      ),
      'recordViews' => 
      array (
        'detail' => 'views/user/record/detail',
        'detailSmall' => 'views/user/record/detail-quick',
        'edit' => 'views/user/record/edit',
        'editSmall' => 'views/user/record/edit-quick',
        'list' => 'views/user/record/list',
      ),
      'modalViews' => 
      array (
        'detail' => 'views/user/modals/detail',
        'massUpdate' => 'views/user/modals/mass-update',
      ),
      'defaultSidePanel' => 
      array (
        'detail' => 
        array (
          'name' => 'default',
          'label' => false,
          'view' => 'views/user/record/panels/default-side',
          'isForm' => true,
        ),
        'detailSmall' => 
        array (
          'name' => 'default',
          'label' => false,
          'view' => 'views/user/record/panels/default-side',
          'isForm' => true,
        ),
        'edit' => 
        array (
          'name' => 'default',
          'label' => false,
          'view' => 'views/user/record/panels/default-side',
          'isForm' => true,
        ),
        'editSmall' => 
        array (
          'name' => 'default',
          'label' => false,
          'view' => 'views/user/record/panels/default-side',
          'isForm' => true,
        ),
      ),
      'defaultSidePanelFieldLists' => 
      array (
        'detail' => 
        array (
          0 => 'avatar',
          1 => 'createdAt',
          2 => 'lastAccess',
        ),
        'detailSmall' => 
        array (
          0 => 'avatar',
          1 => 'lastAccess',
        ),
        'edit' => 
        array (
          0 => 'avatar',
        ),
        'editSmall' => 
        array (
          0 => 'avatar',
        ),
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/user/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
        'detailSmall' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/user/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'relationshipPanels' => 
      array (
        'targetLists' => 
        array (
          'create' => false,
          'rowActionsView' => 'crm:views/record/row-actions/relationship-target',
          'layout' => 'listForTarget',
          'view' => 'crm:views/record/panels/target-lists',
        ),
      ),
      'layoutDefaultSidePanelDisabled' => true,
      'filterList' => 
      array (
        0 => 'active',
      ),
      'boolFilterList' => 
      array (
        0 => 'onlyMyTeam',
      ),
      'selectDefaultFilters' => 
      array (
        'filter' => 'active',
      ),
      'iconClass' => 'fas fa-user-circle',
    ),
    'Webhook' => 
    array (
      'controller' => 'controllers/record',
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'event' => 
          array (
            'readOnly' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isNotEmpty',
                  'attribute' => 'id',
                ),
              ),
            ),
          ),
          'secretKey' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isNotEmpty',
                  'attribute' => 'id',
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'Account' => 
    array (
      'controller' => 'controllers/record',
      'aclPortal' => 'crm:acl-portal/account',
      'views' => 
      array (
        'detail' => 'crm:views/account/detail',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
        'detailSmall' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'relationshipPanels' => 
      array (
        'contacts' => 
        array (
          'filterList' => 
          array (
            0 => 'all',
            1 => 'accountActive',
          ),
          'layout' => 'listForAccount',
          'orderBy' => 'name',
        ),
        'opportunities' => 
        array (
          'layout' => 'listForAccount',
        ),
        'campaignLogRecords' => 
        array (
          'rowActionsView' => 'views/record/row-actions/empty',
          'select' => false,
          'create' => false,
        ),
        'targetLists' => 
        array (
          'rowActionsView' => 'crm:views/record/row-actions/relationship-target',
          'layout' => 'listForTarget',
          'view' => 'crm:views/record/panels/target-lists',
        ),
      ),
      'filterList' => 
      array (
        0 => 
        array (
          'name' => 'recentlyCreated',
        ),
      ),
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'additionalLayouts' => 
      array (
        'detailConvert' => 
        array (
          'type' => 'detail',
        ),
      ),
      'iconClass' => 'receipt',
      'kanbanViewMode' => false,
      'color' => NULL,
    ),
    'Calendar' => 
    array (
      'colors' => 
      array (
        'Meeting' => '#558BBD',
        'Call' => '#CF605D',
        'Task' => '#76BA4E',
      ),
      'scopeList' => 
      array (
        0 => 'Meeting',
        1 => 'Call',
        2 => 'Task',
      ),
      'allDayScopeList' => 
      array (
        0 => 'Task',
      ),
      'modeList' => 
      array (
        0 => 'month',
        1 => 'agendaWeek',
        2 => 'timeline',
        3 => 'agendaDay',
      ),
      'canceledStatusList' => 
      array (
        0 => 'Not Held',
        1 => 'Canceled',
      ),
      'completedStatusList' => 
      array (
        0 => 'Held',
        1 => 'Completed',
      ),
      'additionalColorList' => 
      array (
        0 => '#AB78AD',
        1 => '#CC9B45',
      ),
      'iconClass' => 'date_range',
    ),
    'Call' => 
    array (
      'controller' => 'controllers/record',
      'acl' => 'crm:acl/call',
      'views' => 
      array (
        'detail' => 'crm:views/call/detail',
      ),
      'recordViews' => 
      array (
        'list' => 'crm:views/call/record/list',
        'detail' => 'crm:views/call/record/detail',
      ),
      'modalViews' => 
      array (
        'detail' => 'crm:views/meeting/modals/detail',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'attendees',
            'label' => 'Attendees',
            'view' => 'crm:views/meeting/record/panels/attendees',
            'sticked' => true,
            'isForm' => true,
            'notRefreshable' => true,
          ),
        ),
        'detailSmall' => 
        array (
          0 => 
          array (
            'name' => 'attendees',
            'label' => 'Attendees',
            'view' => 'crm:views/meeting/record/panels/attendees',
            'sticked' => true,
            'isForm' => true,
            'notRefreshable' => true,
          ),
        ),
        'edit' => 
        array (
          0 => 
          array (
            'name' => 'attendees',
            'label' => 'Attendees',
            'view' => 'crm:views/meeting/record/panels/attendees',
            'sticked' => true,
            'isForm' => true,
            'notRefreshable' => true,
          ),
        ),
        'editSmall' => 
        array (
          0 => 
          array (
            'name' => 'attendees',
            'label' => 'Attendees',
            'view' => 'crm:views/meeting/record/panels/attendees',
            'sticked' => true,
            'isForm' => true,
            'notRefreshable' => true,
          ),
        ),
      ),
      'filterList' => 
      array (
        0 => 
        array (
          'name' => 'planned',
        ),
        1 => 
        array (
          'name' => 'held',
          'style' => 'success',
        ),
        2 => 
        array (
          'name' => 'todays',
        ),
      ),
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'activityDefs' => 
      array (
        'link' => 'calls',
        'activitiesCreate' => true,
        'historyCreate' => true,
      ),
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'reminders' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'notEquals',
                      'attribute' => 'status',
                      'value' => 'Held',
                    ),
                    1 => 
                    array (
                      'type' => 'notEquals',
                      'attribute' => 'status',
                      'value' => 'Not Held',
                    ),
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      'iconClass' => 'call',
    ),
    'Campaign' => 
    array (
      'controller' => 'controllers/record',
      'menu' => 
      array (
        'list' => 
        array (
          'buttons' => 
          array (
            0 => 
            array (
              'label' => 'Target Lists',
              'link' => '#TargetList',
              'acl' => 'read',
              'style' => 'default',
              'aclScope' => 'TargetList',
            ),
          ),
          'dropdown' => 
          array (
            0 => 
            array (
              'label' => 'Mass Emails',
              'link' => '#MassEmail',
              'acl' => 'read',
              'aclScope' => 'MassEmail',
            ),
            1 => 
            array (
              'label' => 'Email Templates',
              'link' => '#EmailTemplate',
              'acl' => 'read',
              'aclScope' => 'EmailTemplate',
            ),
          ),
        ),
      ),
      'recordViews' => 
      array (
        'detail' => 'crm:views/campaign/record/detail',
      ),
      'views' => 
      array (
        'detail' => 'crm:views/campaign/detail',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'statistics',
            'label' => 'Statistics',
            'view' => 'crm:views/campaign/record/panels/campaign-stats',
            'hidden' => false,
            'isForm' => true,
          ),
        ),
      ),
      'relationshipPanels' => 
      array (
        'campaignLogRecords' => 
        array (
          'view' => 'crm:views/campaign/record/panels/campaign-log-records',
          'layout' => 'listForCampaign',
          'rowActionsView' => 'views/record/row-actions/remove-only',
          'select' => false,
          'create' => false,
        ),
      ),
      'filterList' => 
      array (
        0 => 'active',
      ),
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'targetLists' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'or',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'type',
                      'value' => 'Email',
                    ),
                    1 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'type',
                      'value' => 'Newsletter',
                    ),
                    2 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'type',
                      'value' => 'Mail',
                    ),
                  ),
                ),
              ),
            ),
          ),
          'excludingTargetLists' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'or',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'type',
                      'value' => 'Email',
                    ),
                    1 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'type',
                      'value' => 'Newsletter',
                    ),
                    2 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'type',
                      'value' => 'Mail',
                    ),
                  ),
                ),
              ),
            ),
          ),
          'contactsTemplate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'type',
                  'value' => 'Mail',
                ),
              ),
            ),
          ),
          'leadsTemplate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'type',
                  'value' => 'Mail',
                ),
              ),
            ),
          ),
          'accountsTemplate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'type',
                  'value' => 'Mail',
                ),
              ),
            ),
          ),
          'usersTemplate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'type',
                  'value' => 'Mail',
                ),
              ),
            ),
          ),
          'mailMergeOnlyWithAddress' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'type',
                  'value' => 'Mail',
                ),
              ),
            ),
          ),
        ),
        'panels' => 
        array (
          'mailMerge' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'type',
                  'value' => 'Mail',
                ),
              ),
            ),
          ),
        ),
      ),
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'iconClass' => 'fas fa-chart-line',
    ),
    'CampaignLogRecord' => 
    array (
      'acl' => 'crm:acl/campaign-tracking-url',
    ),
    'CampaignTrackingUrl' => 
    array (
      'controller' => 'controllers/record',
      'acl' => 'crm:acl/campaign-tracking-url',
      'recordViews' => 
      array (
        'edit' => 'crm:views/campaign-tracking-url/record/edit',
        'editQuick' => 'crm:views/campaign-tracking-url/record/edit-small',
      ),
      'defaultSidePanel' => 
      array (
        'edit' => false,
        'editSmall' => false,
      ),
    ),
    'Case' => 
    array (
      'controller' => 'controllers/record',
      'recordViews' => 
      array (
        'detail' => 'crm:views/case/record/detail',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/case/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
        'detailSmall' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/case/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'filterList' => 
      array (
        0 => 
        array (
          'name' => 'open',
        ),
        1 => 
        array (
          'name' => 'closed',
          'style' => 'success',
        ),
      ),
      'relationshipPanels' => 
      array (
        'articles' => 
        array (
          'create' => false,
          'recordListView' => 'crm:views/knowledge-base-article/record/list-for-case',
          'rowActionsView' => 'crm:views/knowledge-base-article/record/row-actions/for-case',
        ),
      ),
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'selectDefaultFilters' => 
      array (
        'filter' => 'open',
      ),
      'allowInternalNotes' => true,
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'number' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isNotEmpty',
                  'attribute' => 'id',
                ),
              ),
            ),
          ),
        ),
      ),
      'additionalLayouts' => 
      array (
        'detailPortal' => 
        array (
          'type' => 'detail',
        ),
        'detailSmallPortal' => 
        array (
          'type' => 'detail',
        ),
        'listPortal' => 
        array (
          'type' => 'list',
        ),
      ),
      'iconClass' => 'donut_small',
    ),
    'Contact' => 
    array (
      'controller' => 'controllers/record',
      'aclPortal' => 'crm:acl-portal/contact',
      'views' => 
      array (
        'detail' => 'crm:views/contact/detail',
      ),
      'recordViews' => 
      array (
        'detail' => 'crm:views/contact/record/detail',
        'detailQuick' => 'crm:views/contact/record/detail-small',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
        'detailSmall' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'relationshipPanels' => 
      array (
        'campaignLogRecords' => 
        array (
          'rowActionsView' => 'views/record/row-actions/empty',
          'select' => false,
          'create' => false,
        ),
        'opportunities' => 
        array (
          'layout' => 'listForContact',
        ),
        'targetLists' => 
        array (
          'create' => false,
          'rowActionsView' => 'crm:views/record/row-actions/relationship-target',
          'layout' => 'listForTarget',
          'view' => 'crm:views/record/panels/target-lists',
        ),
      ),
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'additionalLayouts' => 
      array (
        'detailConvert' => 
        array (
          'type' => 'detail',
        ),
        'listForAccount' => 
        array (
          'type' => 'listSmall',
        ),
      ),
      'filterList' => 
      array (
        0 => 'portalUsers',
      ),
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isNotEmpty',
                  'attribute' => 'accountId',
                ),
              ),
            ),
          ),
          'portalUser' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isNotEmpty',
                  'attribute' => 'portalUserId',
                  'data' => 
                  array (
                    'field' => 'portalUser',
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      'color' => '',
      'iconClass' => 'group',
    ),
    'Document' => 
    array (
      'controller' => 'controllers/record',
      'views' => 
      array (
        'list' => 'crm:views/document/list',
      ),
      'modalViews' => 
      array (
        'select' => 'crm:views/document/modals/select-records',
      ),
      'filterList' => 
      array (
        0 => 'active',
        1 => 'draft',
      ),
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'selectDefaultFilters' => 
      array (
        'filter' => 'active',
      ),
      'menu' => 
      array (
        'list' => 
        array (
          'dropdown' => 
          array (
            0 => 
            array (
              'label' => 'Manage Folders',
              'link' => '#DocumentFolder',
              'acl' => 'edit',
              'aclScope' => 'DocumentFolder',
            ),
          ),
        ),
      ),
      'iconClass' => 'far fa-file-alt',
    ),
    'DocumentFolder' => 
    array (
      'controller' => 'controllers/record-tree',
      'collection' => 'collections/tree',
      'menu' => 
      array (
        'listTree' => 
        array (
          'buttons' => 
          array (
            0 => 
            array (
              'label' => 'List View',
              'link' => '#DocumentFolder/list',
              'acl' => 'read',
              'style' => 'default',
            ),
            1 => 
            array (
              'label' => 'Documents',
              'link' => '#Document',
              'acl' => 'read',
              'style' => 'default',
              'aclScope' => 'Document',
            ),
          ),
        ),
        'list' => 
        array (
          'buttons' => 
          array (
            0 => 
            array (
              'label' => 'Tree View',
              'link' => '#DocumentFolder',
              'acl' => 'read',
              'style' => 'default',
            ),
            1 => 
            array (
              'label' => 'Documents',
              'link' => '#Document',
              'acl' => 'read',
              'style' => 'default',
              'aclScope' => 'Document',
            ),
          ),
        ),
      ),
    ),
    'EmailQueueItem' => 
    array (
      'controller' => 'controllers/record',
      'views' => 
      array (
        'list' => 'crm:views/email-queue-item/list',
      ),
      'recordViews' => 
      array (
        'list' => 'crm:views/email-queue-item/record/list',
      ),
    ),
    'KnowledgeBaseArticle' => 
    array (
      'controller' => 'controllers/record',
      'views' => 
      array (
        'list' => 'crm:views/knowledge-base-article/list',
      ),
      'recordViews' => 
      array (
        'editQuick' => 'crm:views/knowledge-base-article/record/edit-quick',
        'detailQuick' => 'crm:views/knowledge-base-article/record/detail-quick',
        'detail' => 'crm:views/knowledge-base-article/record/detail',
        'list' => 'crm:views/knowledge-base-article/record/list',
      ),
      'modalViews' => 
      array (
        'select' => 'crm:views/knowledge-base-article/modals/select-records',
      ),
      'filterList' => 
      array (
        0 => 
        array (
          'name' => 'published',
          'inPortalDisabled' => true,
        ),
      ),
      'boolFilterList' => 
      array (
        0 => 
        array (
          'name' => 'onlyMy',
          'inPortalDisabled' => true,
        ),
      ),
      'relationshipPanels' => 
      array (
        'cases' => 
        array (
          'create' => false,
          'rowActionsView' => 'views/record/row-actions/relationship-view-and-unlink',
        ),
      ),
      'menu' => 
      array (
        'list' => 
        array (
          'dropdown' => 
          array (
            0 => 
            array (
              'label' => 'Manage Categories',
              'link' => '#KnowledgeBaseCategory',
              'acl' => 'edit',
              'aclScope' => 'KnowledgeBaseCategory',
            ),
          ),
        ),
      ),
      'additionalLayouts' => 
      array (
        'detailPortal' => 
        array (
          'type' => 'detail',
        ),
        'detailSmallPortal' => 
        array (
          'type' => 'detail',
        ),
        'listPortal' => 
        array (
          'type' => 'list',
        ),
        'relationshipsPortal' => 
        array (
          'type' => 'relationships',
        ),
      ),
      'iconClass' => 'library_books',
    ),
    'KnowledgeBaseCategory' => 
    array (
      'controller' => 'controllers/record-tree',
      'collection' => 'collections/tree',
      'menu' => 
      array (
        'listTree' => 
        array (
          'buttons' => 
          array (
            0 => 
            array (
              'label' => 'List View',
              'link' => '#KnowledgeBaseCategory/list',
              'acl' => 'read',
              'style' => 'default',
            ),
            1 => 
            array (
              'label' => 'Articles',
              'link' => '#KnowledgeBaseArticle',
              'acl' => 'read',
              'style' => 'default',
              'aclScope' => 'KnowledgeBaseArticle',
            ),
          ),
        ),
        'list' => 
        array (
          'buttons' => 
          array (
            0 => 
            array (
              'label' => 'Tree View',
              'link' => '#KnowledgeBaseCategory',
              'acl' => 'read',
              'style' => 'default',
            ),
            1 => 
            array (
              'label' => 'Articles',
              'link' => '#KnowledgeBaseArticle',
              'acl' => 'read',
              'style' => 'default',
              'aclScope' => 'KnowledgeBaseArticle',
            ),
          ),
        ),
      ),
    ),
    'Lead' => 
    array (
      'controller' => 'crm:controllers/lead',
      'views' => 
      array (
        'detail' => 'crm:views/lead/detail',
      ),
      'recordViews' => 
      array (
        'detail' => 'crm:views/lead/record/detail',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'convertedTo',
            'label' => 'Converted To',
            'view' => 'crm:views/lead/record/panels/converted-to',
            'notRefreshable' => true,
            'hidden' => true,
            'style' => 'default',
            'isForm' => true,
          ),
          1 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          3 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
        'edit' => 
        array (
          0 => 
          array (
            'name' => 'convertedTo',
            'label' => 'Converted To',
            'view' => 'crm:views/lead/record/panels/converted-to',
            'notRefreshable' => true,
            'hidden' => true,
            'style' => 'success',
            'isForm' => true,
          ),
        ),
        'detailSmall' => 
        array (
          0 => 
          array (
            'name' => 'convertedTo',
            'label' => 'Converted To',
            'view' => 'crm:views/lead/record/panels/converted-to',
            'notRefreshable' => true,
            'hidden' => true,
            'style' => 'success',
            'isForm' => true,
          ),
          1 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          3 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
        'editSmall' => 
        array (
          0 => 
          array (
            'name' => 'convertedTo',
            'label' => 'Converted To',
            'view' => 'crm:views/lead/record/panels/converted-to',
            'notRefreshable' => true,
            'hidden' => true,
            'style' => 'success',
            'isForm' => true,
          ),
        ),
      ),
      'relationshipPanels' => 
      array (
        'campaignLogRecords' => 
        array (
          'rowActionsView' => 'views/record/row-actions/empty',
          'select' => false,
          'create' => false,
        ),
        'targetLists' => 
        array (
          'create' => false,
          'rowActionsView' => 'crm:views/record/row-actions/relationship-target',
          'layout' => 'listForTarget',
          'view' => 'crm:views/record/panels/target-lists',
        ),
      ),
      'filterList' => 
      array (
        0 => 
        array (
          'name' => 'actual',
        ),
        1 => 
        array (
          'name' => 'converted',
          'style' => 'success',
        ),
      ),
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'name' => 
          array (
            'required' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isEmpty',
                  'attribute' => 'accountName',
                ),
                1 => 
                array (
                  'type' => 'isEmpty',
                  'attribute' => 'emailAddress',
                ),
                2 => 
                array (
                  'type' => 'isEmpty',
                  'attribute' => 'phoneNumber',
                ),
              ),
            ),
          ),
          'convertedAt' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'status',
                      'value' => 'Converted',
                    ),
                    1 => 
                    array (
                      'type' => 'isNotEmpty',
                      'attribute' => 'convertedAt',
                    ),
                  ),
                ),
              ),
            ),
          ),
        ),
        'panels' => 
        array (
          'convertedTo' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'status',
                  'value' => 'Converted',
                ),
              ),
            ),
          ),
        ),
      ),
      'color' => '',
      'iconClass' => 'account_box',
    ),
    'MassEmail' => 
    array (
      'controller' => 'controllers/record',
      'acl' => 'crm:acl/mass-email',
      'recordViews' => 
      array (
        'detail' => 'crm:views/mass-email/record/detail',
        'edit' => 'crm:views/mass-email/record/edit',
        'editQuick' => 'crm:views/mass-email/record/edit-small',
      ),
      'views' => 
      array (
        'detail' => 'crm:views/mass-email/detail',
      ),
      'defaultSidePanel' => 
      array (
        'edit' => false,
        'editSmall' => false,
      ),
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'status' => 
          array (
            'readOnly' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'status',
                          'value' => 'Complete',
                        ),
                        1 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'status',
                          'value' => 'In Process',
                        ),
                        2 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'status',
                          'value' => 'Failed',
                        ),
                      ),
                    ),
                    1 => 
                    array (
                      'type' => 'isNotEmpty',
                      'attribute' => 'id',
                    ),
                  ),
                ),
              ),
            ),
          ),
        ),
        'options' => 
        array (
          'status' => 
          array (
            0 => 
            array (
              'optionList' => 
              array (
                0 => 'Draft',
                1 => 'Pending',
              ),
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'in',
                  'attribute' => 'status',
                  'value' => 
                  array (
                    0 => 'Draft',
                    1 => 'Pending',
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      'filterList' => 
      array (
        0 => 
        array (
          'name' => 'actual',
        ),
        1 => 
        array (
          'name' => 'complete',
          'style' => 'success',
        ),
      ),
    ),
    'Meeting' => 
    array (
      'controller' => 'controllers/record',
      'acl' => 'crm:acl/meeting',
      'views' => 
      array (
        'detail' => 'crm:views/meeting/detail',
      ),
      'recordViews' => 
      array (
        'list' => 'crm:views/meeting/record/list',
        'detail' => 'crm:views/meeting/record/detail',
      ),
      'modalViews' => 
      array (
        'detail' => 'crm:views/meeting/modals/detail',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'attendees',
            'label' => 'Attendees',
            'view' => 'crm:views/meeting/record/panels/attendees',
            'options' => 
            array (
              'fieldList' => 
              array (
                0 => 'users',
                1 => 'contacts',
                2 => 'leads',
              ),
            ),
            'sticked' => true,
            'isForm' => true,
            'notRefreshable' => true,
          ),
        ),
        'detailSmall' => 
        array (
          0 => 
          array (
            'name' => 'attendees',
            'label' => 'Attendees',
            'view' => 'crm:views/meeting/record/panels/attendees',
            'sticked' => true,
            'isForm' => true,
            'notRefreshable' => true,
          ),
        ),
        'edit' => 
        array (
          0 => 
          array (
            'name' => 'attendees',
            'label' => 'Attendees',
            'view' => 'crm:views/meeting/record/panels/attendees',
            'sticked' => true,
            'isForm' => true,
            'notRefreshable' => true,
          ),
        ),
        'editSmall' => 
        array (
          0 => 
          array (
            'name' => 'attendees',
            'label' => 'Attendees',
            'view' => 'crm:views/meeting/record/panels/attendees',
            'sticked' => true,
            'isForm' => true,
            'notRefreshable' => true,
          ),
        ),
      ),
      'filterList' => 
      array (
        0 => 
        array (
          'name' => 'planned',
        ),
        1 => 
        array (
          'name' => 'held',
          'style' => 'success',
        ),
        2 => 
        array (
          'name' => 'todays',
        ),
      ),
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'activityDefs' => 
      array (
        'link' => 'meetings',
        'activitiesCreate' => true,
        'historyCreate' => true,
      ),
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'reminders' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'notEquals',
                      'attribute' => 'status',
                      'value' => 'Held',
                    ),
                    1 => 
                    array (
                      'type' => 'notEquals',
                      'attribute' => 'status',
                      'value' => 'Not Held',
                    ),
                  ),
                ),
              ),
            ),
          ),
          'duration' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isFalse',
                  'attribute' => 'isAllDay',
                ),
              ),
            ),
          ),
        ),
      ),
      'iconClass' => 'business_center',
    ),
    'Opportunity' => 
    array (
      'controller' => 'controllers/record',
      'views' => 
      array (
        'detail' => 'crm:views/opportunity/detail',
      ),
      'recordViews' => 
      array (
        'edit' => 'crm:views/opportunity/record/edit',
        'editSmall' => 'crm:views/opportunity/record/edit-small',
        'list' => 'crm:views/opportunity/record/list',
        'kanban' => 'crm:views/opportunity/record/kanban',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/opportunity/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
        'detailSmall' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'filterList' => 
      array (
        0 => 
        array (
          'name' => 'open',
        ),
        1 => 
        array (
          'name' => 'won',
          'style' => 'success',
        ),
      ),
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'additionalLayouts' => 
      array (
        'detailConvert' => 
        array (
          'type' => 'detail',
        ),
        'listForAccount' => 
        array (
          'type' => 'listSmall',
        ),
        'listForContact' => 
        array (
          'type' => 'listSmall',
        ),
      ),
      'kanbanViewMode' => true,
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'lastStage' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'stage',
                  'value' => 'Closed Lost',
                ),
              ),
            ),
          ),
        ),
      ),
      'color' => '',
      'iconClass' => 'attach_money',
    ),
    'Target' => 
    array (
      'controller' => 'controllers/record',
      'views' => 
      array (
        'detail' => 'Crm:Target.Detail',
      ),
      'menu' => 
      array (
        'detail' => 
        array (
          'buttons' => 
          array (
            0 => 
            array (
              'label' => 'Convert to Lead',
              'action' => 'convertToLead',
              'acl' => 'edit',
            ),
          ),
        ),
      ),
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
    ),
    'TargetList' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'optedOut',
            'label' => 'Opted Out',
            'view' => 'crm:views/target-list/record/panels/opted-out',
          ),
        ),
      ),
      'recordViews' => 
      array (
        'detail' => 'crm:views/target-list/record/detail',
      ),
      'relationshipPanels' => 
      array (
        'contacts' => 
        array (
          'actionList' => 
          array (
            0 => 
            array (
              'label' => 'Unlink All',
              'action' => 'unlinkAllRelated',
              'acl' => 'edit',
              'data' => 
              array (
                'link' => 'contacts',
              ),
            ),
          ),
          'rowActionsView' => 'crm:views/target-list/record/row-actions/default',
          'view' => 'crm:views/target-list/record/panels/relationship',
          'massSelect' => true,
        ),
        'leads' => 
        array (
          'actionList' => 
          array (
            0 => 
            array (
              'label' => 'Unlink All',
              'action' => 'unlinkAllRelated',
              'acl' => 'edit',
              'data' => 
              array (
                'link' => 'leads',
              ),
            ),
          ),
          'rowActionsView' => 'crm:views/target-list/record/row-actions/default',
          'view' => 'crm:views/target-list/record/panels/relationship',
          'massSelect' => true,
        ),
        'accounts' => 
        array (
          'actionList' => 
          array (
            0 => 
            array (
              'label' => 'Unlink All',
              'action' => 'unlinkAllRelated',
              'acl' => 'edit',
              'data' => 
              array (
                'link' => 'accounts',
              ),
            ),
          ),
          'rowActionsView' => 'crm:views/target-list/record/row-actions/default',
          'view' => 'crm:views/target-list/record/panels/relationship',
          'massSelect' => true,
        ),
        'users' => 
        array (
          'create' => false,
          'actionList' => 
          array (
            0 => 
            array (
              'label' => 'Unlink All',
              'action' => 'unlinkAllRelated',
              'acl' => 'edit',
              'data' => 
              array (
                'link' => 'users',
              ),
            ),
          ),
          'rowActionsView' => 'crm:views/target-list/record/row-actions/default',
          'view' => 'crm:views/target-list/record/panels/relationship',
          'massSelect' => true,
        ),
      ),
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'entryCount' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isNotEmpty',
                  'attribute' => 'id',
                ),
              ),
            ),
          ),
          'optedOutCount' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isNotEmpty',
                  'attribute' => 'id',
                ),
              ),
            ),
          ),
        ),
      ),
      'iconClass' => 'fas fa-crosshairs',
    ),
    'Task' => 
    array (
      'controller' => 'controllers/record',
      'recordViews' => 
      array (
        'list' => 'crm:views/task/record/list',
        'detail' => 'crm:views/task/record/detail',
      ),
      'views' => 
      array (
        'list' => 'crm:views/task/list',
        'detail' => 'crm:views/task/detail',
      ),
      'modalViews' => 
      array (
        'detail' => 'crm:views/task/modals/detail',
      ),
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'dateCompleted' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'status',
                  'value' => 'Completed',
                ),
              ),
            ),
          ),
          'reminders' => 
          array (
            'visible' => NULL,
          ),
          'dateEnd' => 
          array (
            'visible' => NULL,
          ),
          'startDate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'has',
                  'attribute' => 'frequency',
                  'value' => 'Daily',
                ),
              ),
            ),
          ),
          'endDate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'has',
                  'attribute' => 'frequency',
                  'value' => 'Daily',
                ),
              ),
            ),
          ),
          'frequency' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'createRecurringSeriesOfTasks',
                ),
              ),
            ),
          ),
          'repeat' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Daily',
                ),
              ),
            ),
          ),
          'weeklyrepeat' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Weekly',
                ),
              ),
            ),
          ),
          'weeklyrepeatOn' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Weekly',
                ),
                2 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'weeklyrepeat',
                      'value' => 'Custom',
                    ),
                  ),
                ),
              ),
            ),
          ),
          'weeklystartDate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Weekly',
                ),
              ),
            ),
          ),
          'weeklyendDate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Weekly',
                ),
              ),
            ),
          ),
          'monthlyRepeatOn' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Monthly',
                ),
                2 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'monthlyRepeat',
                      'value' => 'Custom',
                    ),
                  ),
                ),
              ),
            ),
          ),
          'monthlyStartDate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Monthly',
                ),
              ),
            ),
          ),
          'monthlyEndDate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Monthly',
                ),
              ),
            ),
          ),
          'monthlyRepeat' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Monthly',
                ),
              ),
            ),
          ),
          'numberOfRecurringTasks' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Custom',
                ),
              ),
            ),
          ),
          'customStartDate1' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Custom',
                ),
                2 => 
                array (
                  'type' => 'or',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '1',
                    ),
                    1 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '2',
                        ),
                      ),
                    ),
                    2 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '3',
                    ),
                    3 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '4',
                        ),
                      ),
                    ),
                    4 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '5',
                    ),
                    5 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '6',
                        ),
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
          'customStartDate2' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Custom',
                ),
                2 => 
                array (
                  'type' => 'or',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '2',
                    ),
                    1 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '3',
                        ),
                      ),
                    ),
                    2 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '4',
                    ),
                    3 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '5',
                        ),
                      ),
                    ),
                    4 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '6',
                    ),
                  ),
                ),
              ),
            ),
          ),
          'customStartDate3' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Custom',
                ),
                2 => 
                array (
                  'type' => 'or',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '3',
                    ),
                    1 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '4',
                        ),
                      ),
                    ),
                    2 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '5',
                    ),
                    3 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '6',
                        ),
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
          'customStartDate4' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Custom',
                ),
                2 => 
                array (
                  'type' => 'or',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '4',
                    ),
                    1 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '5',
                        ),
                      ),
                    ),
                    2 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '6',
                    ),
                  ),
                ),
              ),
            ),
          ),
          'customStartDate5' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Custom',
                ),
                2 => 
                array (
                  'type' => 'or',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '5',
                    ),
                    1 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '6',
                        ),
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
          'customStartDate6' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Custom',
                ),
                2 => 
                array (
                  'type' => 'or',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '6',
                    ),
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      'filterList' => 
      array (
        0 => 'actual',
        1 => 
        array (
          'name' => 'completed',
          'style' => 'success',
        ),
        2 => 
        array (
          'name' => 'todays',
        ),
        3 => 
        array (
          'name' => 'overdue',
          'style' => 'danger',
        ),
        4 => 
        array (
          'name' => 'deferred',
        ),
      ),
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'iconClass' => 'event_note',
      'kanbanViewMode' => true,
    ),
    'BillingEntity' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'kanbanViewMode' => false,
      'color' => NULL,
      'iconClass' => NULL,
    ),
    'ClosedTask' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'color' => '#a7a726',
      'iconClass' => 'fas fa-stop-circle',
      'dynamicLogic' => 
      array (
        'fields' => 
        array (
          'frequency' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'createRecurringSeriesOfTasks',
                ),
              ),
            ),
          ),
          'repeat' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'createRecurringSeriesOfTasks',
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Daily',
                ),
              ),
            ),
          ),
          'weeklyrepeat' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'createRecurringSeriesOfTasks',
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Weekly',
                ),
              ),
            ),
          ),
          'weeklyrepeatOn' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'createRecurringSeriesOfTasks',
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Weekly',
                ),
                2 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'weeklyrepeat',
                  'value' => 'Custom',
                ),
              ),
            ),
          ),
          'weeklystartDate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'createRecurringSeriesOfTasks',
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Weekly',
                ),
              ),
            ),
          ),
          'weeklyendDate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'createRecurringSeriesOfTasks',
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Weekly',
                ),
              ),
            ),
          ),
          'monthlyRepeat' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'createRecurringSeriesOfTasks',
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Monthly',
                ),
              ),
            ),
          ),
          'monthlyRepeatOn' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'createRecurringSeriesOfTasks',
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Monthly',
                ),
                2 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'monthlyRepeat',
                  'value' => 'Custom',
                ),
              ),
            ),
          ),
          'monthlyStartDate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'createRecurringSeriesOfTasks',
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Monthly',
                ),
              ),
            ),
          ),
          'monthlyEndDate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'isTrue',
                  'attribute' => 'createRecurringSeriesOfTasks',
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Monthly',
                ),
              ),
            ),
          ),
          'customStartDate1' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Custom',
                ),
                2 => 
                array (
                  'type' => 'or',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '1',
                    ),
                    1 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '2',
                        ),
                      ),
                    ),
                    2 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '3',
                    ),
                    3 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '4',
                        ),
                      ),
                    ),
                    4 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '5',
                    ),
                    5 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '6',
                        ),
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
          'customStartDate2' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Custom',
                ),
                2 => 
                array (
                  'type' => 'or',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '2',
                    ),
                    1 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '3',
                        ),
                      ),
                    ),
                    2 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '4',
                    ),
                    3 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '5',
                        ),
                      ),
                    ),
                    4 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '6',
                    ),
                  ),
                ),
              ),
            ),
          ),
          'customStartDate3' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Custom',
                ),
                2 => 
                array (
                  'type' => 'or',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '3',
                    ),
                    1 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '4',
                        ),
                      ),
                    ),
                    2 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '5',
                    ),
                    3 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '6',
                        ),
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
          'customStartDate4' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Custom',
                ),
                2 => 
                array (
                  'type' => 'or',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '4',
                    ),
                    1 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '5',
                        ),
                      ),
                    ),
                    2 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '6',
                    ),
                  ),
                ),
              ),
            ),
          ),
          'customStartDate5' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Custom',
                ),
                2 => 
                array (
                  'type' => 'or',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '5',
                    ),
                    1 => 
                    array (
                      'type' => 'or',
                      'value' => 
                      array (
                        0 => 
                        array (
                          'type' => 'equals',
                          'attribute' => 'numberOfRecurringTasks',
                          'value' => '6',
                        ),
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ),
          'customStartDate6' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Custom',
                ),
                2 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'equals',
                      'attribute' => 'numberOfRecurringTasks',
                      'value' => '6',
                    ),
                  ),
                ),
              ),
            ),
          ),
          'numberOfRecurringTasks' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Custom',
                ),
              ),
            ),
          ),
          'endDate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Daily',
                ),
              ),
            ),
          ),
          'startDate' => 
          array (
            'visible' => 
            array (
              'conditionGroup' => 
              array (
                0 => 
                array (
                  'type' => 'and',
                  'value' => 
                  array (
                    0 => 
                    array (
                      'type' => 'isTrue',
                      'attribute' => 'createRecurringSeriesOfTasks',
                    ),
                  ),
                ),
                1 => 
                array (
                  'type' => 'equals',
                  'attribute' => 'frequency',
                  'value' => 'Daily',
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'ContactList' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'color' => '#fcfcfc',
      'iconClass' => 'fas fa-bars',
      'kanbanViewMode' => false,
    ),
    'ContentTemplate' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
    ),
    'Demo' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'iconClass' => 'fas fa-book-open',
    ),
    'Designation' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'color' => '#c33434',
      'iconClass' => 'fas fa-angle-right',
    ),
    'EmailReminder' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'color' => '#b45a5a',
      'iconClass' => 'fas fa-angle-double-left',
      'kanbanViewMode' => false,
    ),
    'Estimate' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'color' => '#B7BDC5',
      'iconClass' => 'insert_comment',
    ),
    'Export' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'color' => '#e9eff6',
    ),
    'ExportResult' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'color' => '#e9eff6',
    ),
    'HolidayCalender' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'kanbanViewMode' => false,
      'color' => NULL,
      'iconClass' => NULL,
    ),
    'ImportResult' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'kanbanViewMode' => false,
      'color' => NULL,
      'iconClass' => NULL,
    ),
    'Invoice' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'color' => '#B7BDC5',
      'iconClass' => 'local_atm',
    ),
    'MessageLog' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'iconClass' => 'fas fa-align-left',
      'kanbanViewMode' => false,
      'color' => NULL,
    ),
    'MyCampaigns' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'iconClass' => 'fas fa-address-book',
      'kanbanViewMode' => false,
      'color' => NULL,
    ),
    'OfficeLocation' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'color' => '#22a252',
      'iconClass' => 'fas fa-tags',
    ),
    'Payments' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'color' => '#B7BDC5',
      'iconClass' => 'description',
      'kanbanViewMode' => false,
    ),
    'SMSReminder' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'color' => '#8b3a3a',
      'iconClass' => 'fas fa-edit',
    ),
    'SendSMSData' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'color' => '#8b3535',
      'iconClass' => 'fas fa-angle-double-right',
      'kanbanViewMode' => false,
    ),
    'SenderID' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
    ),
    'SentEmailReminder' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'color' => '#6d1e1e',
      'iconClass' => 'fas fa-angle-double-right',
    ),
    'SentMessages' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'iconClass' => 'fas fa-check',
      'kanbanViewMode' => false,
      'color' => NULL,
    ),
    'TEsting2811' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
    ),
    'Test' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
    ),
    'TestEntity2710' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'iconClass' => 'fas fa-angle-double-down',
    ),
    'TestingEntity' => 
    array (
      'controller' => 'controllers/record',
      'boolFilterList' => 
      array (
        0 => 'onlyMy',
      ),
      'sidePanels' => 
      array (
        'detail' => 
        array (
          0 => 
          array (
            'name' => 'activities',
            'label' => 'Activities',
            'view' => 'crm:views/record/panels/activities',
            'aclScope' => 'Activities',
          ),
          1 => 
          array (
            'name' => 'history',
            'label' => 'History',
            'view' => 'crm:views/record/panels/history',
            'aclScope' => 'Activities',
          ),
          2 => 
          array (
            'name' => 'tasks',
            'label' => 'Tasks',
            'view' => 'crm:views/record/panels/tasks',
            'aclScope' => 'Task',
          ),
        ),
      ),
      'iconClass' => 'fas fa-align-justify',
    ),
  ),
  'dashlets' => 
  array (
    'Emails' => 
    array (
      'view' => 'views/dashlets/emails',
      'aclScope' => 'Email',
      'entityType' => 'Email',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
            'trim' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateSent',
          'order' => 'desc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'subject',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'dateSent',
                  'view' => 'views/fields/datetime-short',
                ),
                1 => 
                array (
                  'name' => 'personStringData',
                  'view' => 'views/email/fields/person-string-data-for-expanded',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'inbox',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'Records' => 
    array (
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
            'trim' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
              8 => 50,
            ),
          ),
          'entityType' => 
          array (
            'type' => 'enum',
            'view' => 'views/dashlets/fields/records/entity-type',
            'translation' => 'Global.scopeNames',
          ),
          'primaryFilter' => 
          array (
            'type' => 'enum',
            'view' => 'views/dashlets/fields/records/primary-filter',
          ),
          'boolFilterList' => 
          array (
            'type' => 'multiEnum',
            'view' => 'views/dashlets/fields/records/bool-filter-list',
          ),
          'sortBy' => 
          array (
            'type' => 'enum',
            'view' => 'views/dashlets/fields/records/sort-by',
          ),
          'sortDirection' => 
          array (
            'type' => 'enum',
            'view' => 'views/dashlets/fields/records/sort-direction',
            'options' => 
            array (
              0 => 'asc',
              1 => 'desc',
            ),
            'translation' => 'EntityManager.options.sortDirection',
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'displayRecords' => 10,
          'autorefreshInterval' => 0.5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
            ),
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'entityType',
                ),
                1 => false,
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'primaryFilter',
                ),
                1 => 
                array (
                  'name' => 'sortBy',
                ),
              ),
              3 => 
              array (
                0 => 
                array (
                  'name' => 'boolFilterList',
                ),
                1 => 
                array (
                  'name' => 'sortDirection',
                ),
              ),
              4 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              5 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                ),
                1 => false,
              ),
            ),
          ),
        ),
      ),
    ),
    'Stream' => 
    array (
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
            'trim' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
            ),
          ),
          'skipOwn' => 
          array (
            'type' => 'bool',
            'tooltip' => true,
          ),
        ),
        'defaults' => 
        array (
          'displayRecords' => 10,
          'autorefreshInterval' => 0.5,
          'skipOwn' => false,
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'skipOwn',
                ),
                1 => false,
              ),
            ),
          ),
        ),
      ),
    ),
    'Activities' => 
    array (
      'view' => 'crm:views/dashlets/activities',
      'options' => 
      array (
        'view' => 'crm:views/dashlets/options/activities',
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'enabledScopeList' => 
          array (
            'type' => 'multiEnum',
            'translation' => 'Global.scopeNamesPlural',
            'required' => true,
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
              8 => 50,
            ),
          ),
          'futureDays' => 
          array (
            'type' => 'int',
            'min' => 0,
            'required' => true,
          ),
        ),
        'defaults' => 
        array (
          'displayRecords' => 10,
          'autorefreshInterval' => 0.5,
          'futureDays' => 3,
          'enabledScopeList' => 
          array (
            0 => 'Meeting',
            1 => 'Call',
            2 => 'Task',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'enabledScopeList',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'futureDays',
                ),
                1 => false,
              ),
            ),
          ),
        ),
      ),
    ),
    'Calendar' => 
    array (
      'view' => 'crm:views/dashlets/calendar',
      'aclScope' => 'Calendar',
      'options' => 
      array (
        'view' => 'crm:views/dashlets/options/calendar',
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'enabledScopeList' => 
          array (
            'type' => 'multiEnum',
            'translation' => 'Global.scopeNamesPlural',
            'required' => true,
          ),
          'mode' => 
          array (
            'type' => 'enum',
            'options' => 
            array (
              0 => 'basicWeek',
              1 => 'agendaWeek',
              2 => 'timeline',
              3 => 'month',
              4 => 'basicDay',
              5 => 'agendaDay',
            ),
          ),
          'users' => 
          array (
            'type' => 'linkMultiple',
            'entity' => 'User',
            'view' => 'views/fields/assigned-users',
            'sortable' => true,
          ),
          'teams' => 
          array (
            'type' => 'linkMultiple',
            'entity' => 'Team',
            'view' => 'crm:views/calendar/fields/teams',
          ),
        ),
        'defaults' => 
        array (
          'autorefreshInterval' => 0.5,
          'mode' => 'month',
          'enabledScopeList' => 
          array (
            0 => 'Meeting',
            1 => 'Call',
            2 => 'Task',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'mode',
                ),
                1 => 
                array (
                  'name' => 'enabledScopeList',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'users',
                ),
                1 => false,
              ),
              3 => 
              array (
                0 => 
                array (
                  'name' => 'teams',
                ),
                1 => false,
              ),
            ),
          ),
        ),
      ),
    ),
    'Calls' => 
    array (
      'view' => 'crm:views/dashlets/calls',
      'aclScope' => 'Call',
      'entityType' => 'Call',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateStart',
          'order' => 'asc',
          'displayRecords' => 5,
          'populateAssignedUser' => true,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'dateStart',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'planned',
            'advanced' => 
            array (
              1 => 
              array (
                'type' => 'or',
                'value' => 
                array (
                  1 => 
                  array (
                    'type' => 'today',
                    'field' => 'dateStart',
                    'dateTime' => true,
                  ),
                  2 => 
                  array (
                    'type' => 'future',
                    'field' => 'dateEnd',
                    'dateTime' => true,
                  ),
                ),
              ),
            ),
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                ),
                1 => false,
              ),
            ),
          ),
        ),
      ),
    ),
    'Cases' => 
    array (
      'view' => 'views/dashlets/abstract/record-list',
      'aclScope' => 'Case',
      'entityType' => 'Case',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'number',
          'order' => 'desc',
          'displayRecords' => 5,
          'populateAssignedUser' => true,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'number',
                ),
                1 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
                2 => 
                array (
                  'name' => 'type',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'priority',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'open',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                ),
                1 => false,
              ),
            ),
          ),
        ),
      ),
    ),
    'Leads' => 
    array (
      'view' => 'views/dashlets/abstract/record-list',
      'aclScope' => 'Lead',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'createdAt',
          'order' => 'desc',
          'displayRecords' => 5,
          'populateAssignedUser' => true,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
                1 => 
                array (
                  'name' => 'addressCity',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'source',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actual',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                ),
                1 => false,
              ),
            ),
          ),
        ),
      ),
    ),
    'Meetings' => 
    array (
      'view' => 'crm:views/dashlets/meetings',
      'aclScope' => 'Meeting',
      'entityType' => 'Meeting',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateStart',
          'order' => 'asc',
          'displayRecords' => 5,
          'populateAssignedUser' => true,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'dateStart',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'planned',
            'advanced' => 
            array (
              1 => 
              array (
                'type' => 'or',
                'value' => 
                array (
                  1 => 
                  array (
                    'type' => 'today',
                    'field' => 'dateStart',
                    'dateTime' => true,
                  ),
                  2 => 
                  array (
                    'type' => 'future',
                    'field' => 'dateEnd',
                    'dateTime' => true,
                  ),
                ),
              ),
            ),
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                ),
                1 => false,
              ),
            ),
          ),
        ),
      ),
    ),
    'Opportunities' => 
    array (
      'view' => 'views/dashlets/abstract/record-list',
      'aclScope' => 'Opportunity',
      'entityType' => 'Opportunity',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'closeDate',
          'order' => 'asc',
          'displayRecords' => 5,
          'populateAssignedUser' => true,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'stage',
                ),
                1 => 
                array (
                  'name' => 'amount',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'open',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                ),
                1 => false,
              ),
            ),
          ),
        ),
      ),
    ),
    'OpportunitiesByLeadSource' => 
    array (
      'view' => 'crm:views/dashlets/opportunities-by-lead-source',
      'aclScope' => 'Opportunity',
      'options' => 
      array (
        'view' => 'crm:views/dashlets/options/chart',
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'dateFrom' => 
          array (
            'type' => 'date',
            'required' => true,
          ),
          'dateTo' => 
          array (
            'type' => 'date',
            'required' => true,
          ),
          'dateFilter' => 
          array (
            'type' => 'enum',
            'options' => 
            array (
              0 => 'currentYear',
              1 => 'currentQuarter',
              2 => 'currentMonth',
              3 => 'currentFiscalYear',
              4 => 'currentFiscalQuarter',
              5 => 'ever',
              6 => 'between',
            ),
            'default' => 'currentYear',
            'translation' => 'Global.options.dateSearchRanges',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'dateFilter',
                ),
                1 => false,
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'dateFrom',
                ),
                1 => 
                array (
                  'name' => 'dateTo',
                ),
              ),
            ),
          ),
        ),
        'defaults' => 
        array (
          'dateFilter' => 'currentYear',
        ),
      ),
    ),
    'OpportunitiesByStage' => 
    array (
      'view' => 'crm:views/dashlets/opportunities-by-stage',
      'aclScope' => 'Opportunity',
      'options' => 
      array (
        'view' => 'crm:views/dashlets/options/chart',
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'dateFrom' => 
          array (
            'type' => 'date',
            'required' => true,
          ),
          'dateTo' => 
          array (
            'type' => 'date',
            'required' => true,
          ),
          'dateFilter' => 
          array (
            'type' => 'enum',
            'options' => 
            array (
              0 => 'currentYear',
              1 => 'currentQuarter',
              2 => 'currentMonth',
              3 => 'currentFiscalYear',
              4 => 'currentFiscalQuarter',
              5 => 'ever',
              6 => 'between',
            ),
            'default' => 'currentYear',
            'translation' => 'Global.options.dateSearchRanges',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'dateFilter',
                ),
                1 => false,
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'dateFrom',
                ),
                1 => 
                array (
                  'name' => 'dateTo',
                ),
              ),
            ),
          ),
        ),
        'defaults' => 
        array (
          'dateFilter' => 'currentYear',
        ),
      ),
    ),
    'SalesByMonth' => 
    array (
      'view' => 'crm:views/dashlets/sales-by-month',
      'aclScope' => 'Opportunity',
      'options' => 
      array (
        'view' => 'crm:views/dashlets/options/chart',
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'dateFrom' => 
          array (
            'type' => 'date',
            'required' => true,
          ),
          'dateTo' => 
          array (
            'type' => 'date',
            'required' => true,
          ),
          'dateFilter' => 
          array (
            'type' => 'enum',
            'options' => 
            array (
              0 => 'currentYear',
              1 => 'currentQuarter',
              2 => 'currentFiscalYear',
              3 => 'currentFiscalQuarter',
              4 => 'between',
            ),
            'default' => 'currentYear',
            'translation' => 'Global.options.dateSearchRanges',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'dateFilter',
                ),
                1 => false,
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'dateFrom',
                ),
                1 => 
                array (
                  'name' => 'dateTo',
                ),
              ),
            ),
          ),
        ),
        'defaults' => 
        array (
          'dateFilter' => 'currentYear',
        ),
      ),
    ),
    'SalesPipeline' => 
    array (
      'view' => 'crm:views/dashlets/sales-pipeline',
      'aclScope' => 'Opportunity',
      'options' => 
      array (
        'view' => 'crm:views/dashlets/options/chart',
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'dateFrom' => 
          array (
            'type' => 'date',
            'required' => true,
          ),
          'dateTo' => 
          array (
            'type' => 'date',
            'required' => true,
          ),
          'dateFilter' => 
          array (
            'type' => 'enum',
            'options' => 
            array (
              0 => 'currentYear',
              1 => 'currentQuarter',
              2 => 'currentMonth',
              3 => 'currentFiscalYear',
              4 => 'currentFiscalQuarter',
              5 => 'ever',
              6 => 'between',
            ),
            'default' => 'currentYear',
            'translation' => 'Global.options.dateSearchRanges',
          ),
          'useLastStage' => 
          array (
            'type' => 'bool',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                  'span' => 2,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'dateFilter',
                ),
                1 => 
                array (
                  'name' => 'useLastStage',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'dateFrom',
                ),
                1 => 
                array (
                  'name' => 'dateTo',
                ),
              ),
            ),
          ),
        ),
        'defaults' => 
        array (
          'dateFilter' => 'currentYear',
        ),
      ),
    ),
    'Tasks' => 
    array (
      'view' => 'crm:views/dashlets/tasks',
      'aclScope' => 'Task',
      'entityType' => 'Task',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'ClosingMonth' => 
    array (
      'view' => 'custom:views/dashlets/ClosingMonth',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'ConvertedLeads' => 
    array (
      'view' => 'custom:views/dashlets/ConvertedLeads',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'LeadsKanban' => 
    array (
      'view' => 'custom:views/dashlets/LeadsKanban',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'LeadsPipelinesChart' => 
    array (
      'view' => 'custom:views/dashlets/LeadsPipelinesChart',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'LeadsTabs' => 
    array (
      'view' => 'custom:views/dashlets/LeadsTabs',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'MyUserBranches' => 
    array (
      'view' => 'custom:views/dashlets/MyUserBranches',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'MyUserEntities' => 
    array (
      'view' => 'custom:views/dashlets/MyUserEntities',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'NewAccount' => 
    array (
      'view' => 'custom:views/dashlets/NewAccount',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'NewLeads' => 
    array (
      'view' => 'custom:views/dashlets/NewLeads',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'NewOpportunites' => 
    array (
      'view' => 'custom:views/dashlets/NewOpportunites',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'OpportunitiesLeadSource' => 
    array (
      'view' => 'custom:views/dashlets/OpportunitiesLeadSource',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'OverDue' => 
    array (
      'view' => 'custom:views/dashlets/OverDue',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'RevenueForecast' => 
    array (
      'view' => 'custom:views/dashlets/RevenueForecast',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'SalesPipelineGraph' => 
    array (
      'view' => 'custom:views/dashlets/SalesPipelineGraph',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'SubscriptionDetails' => 
    array (
      'view' => 'custom:views/dashlets/SubscriptionDetails',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'TransactionList' => 
    array (
      'view' => 'custom:views/dashlets/TransactionList',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'Users' => 
    array (
      'view' => 'custom:views/dashlets/Users',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'addWindow' => 
    array (
      'view' => 'custom:views/dashlets/addWindow',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'calls' => 
    array (
      'view' => 'custom:views/dashlets/calls',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'things' => 
    array (
      'view' => 'custom:views/dashlets/things',
      'entityType' => 'Lead',
      'options' => 
      array (
        'fields' => 
        array (
          'title' => 
          array (
            'type' => 'varchar',
            'required' => true,
          ),
          'autorefreshInterval' => 
          array (
            'type' => 'enumFloat',
            'options' => 
            array (
              0 => 0,
              1 => 0.5,
              2 => 1,
              3 => 2,
              4 => 5,
              5 => 10,
            ),
          ),
          'displayRecords' => 
          array (
            'type' => 'enumInt',
            'options' => 
            array (
              0 => 3,
              1 => 4,
              2 => 5,
              3 => 7,
              4 => 10,
              5 => 15,
              6 => 20,
              7 => 30,
            ),
          ),
          'expandedLayout' => 
          array (
            'type' => 'base',
            'view' => 'views/dashlets/fields/records/expanded-layout',
          ),
        ),
        'defaults' => 
        array (
          'orderBy' => 'dateEnd',
          'order' => 'asc',
          'displayRecords' => 5,
          'expandedLayout' => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'name',
                  'link' => true,
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'status',
                ),
                1 => 
                array (
                  'name' => 'dateEnd',
                ),
              ),
            ),
          ),
          'searchData' => 
          array (
            'bool' => 
            array (
              'onlyMy' => true,
            ),
            'primary' => 'actualStartingNotInFuture',
          ),
        ),
        'layout' => 
        array (
          0 => 
          array (
            'rows' => 
            array (
              0 => 
              array (
                0 => 
                array (
                  'name' => 'title',
                ),
              ),
              1 => 
              array (
                0 => 
                array (
                  'name' => 'displayRecords',
                ),
                1 => 
                array (
                  'name' => 'autorefreshInterval',
                ),
              ),
              2 => 
              array (
                0 => 
                array (
                  'name' => 'expandedLayout',
                  'fullWidth' => true,
                ),
              ),
            ),
          ),
        ),
      ),
    ),
  ),
  'entityAcl' => 
  array (
    'AuthLogRecord' => 
    array (
      'fields' => 
      array (
        'username' => 
        array (
          'readOnly' => true,
        ),
        'portal' => 
        array (
          'readOnly' => true,
        ),
        'user' => 
        array (
          'readOnly' => true,
        ),
        'ipAddress' => 
        array (
          'readOnly' => true,
        ),
        'authToken' => 
        array (
          'readOnly' => true,
        ),
        'isDenied' => 
        array (
          'readOnly' => true,
        ),
        'denialReason' => 
        array (
          'readOnly' => true,
        ),
        'microtime' => 
        array (
          'readOnly' => true,
        ),
        'requestUrl' => 
        array (
          'readOnly' => true,
        ),
        'requestMethod' => 
        array (
          'readOnly' => true,
        ),
      ),
    ),
    'AuthToken' => 
    array (
      'fields' => 
      array (
        'hash' => 
        array (
          'internal' => true,
          'readOnly' => true,
        ),
        'token' => 
        array (
          'internal' => true,
          'readOnly' => true,
        ),
        'secret' => 
        array (
          'internal' => true,
          'readOnly' => true,
        ),
        'portal' => 
        array (
          'readOnly' => true,
        ),
        'user' => 
        array (
          'readOnly' => true,
        ),
        'ipAddress' => 
        array (
          'readOnly' => true,
        ),
        'lastAccess' => 
        array (
          'readOnly' => true,
        ),
        'createdAt' => 
        array (
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'readOnly' => true,
        ),
      ),
    ),
    'Email' => 
    array (
      'fields' => 
      array (
        'users' => 
        array (
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'users' => 
        array (
          'onlyAdmin' => true,
        ),
      ),
    ),
    'EmailAccount' => 
    array (
      'fields' => 
      array (
        'password' => 
        array (
          'internal' => true,
        ),
        'smtpPassword' => 
        array (
          'internal' => true,
        ),
        'fetchData' => 
        array (
          'readOnly' => true,
        ),
      ),
    ),
    'InboundEmail' => 
    array (
      'fields' => 
      array (
        'password' => 
        array (
          'internal' => true,
        ),
        'smtpPassword' => 
        array (
          'internal' => true,
        ),
        'fetchData' => 
        array (
          'readOnly' => true,
        ),
      ),
    ),
    'User' => 
    array (
      'fields' => 
      array (
        'userName' => 
        array (
          'nonAdminReadOnly' => true,
        ),
        'apiKey' => 
        array (
          'onlyAdmin' => true,
          'readOnly' => true,
          'nonAdminReadOnly' => true,
        ),
        'password' => 
        array (
          'internal' => true,
          'nonAdminReadOnly' => true,
        ),
        'passwordConfirm' => 
        array (
          'internal' => true,
          'nonAdminReadOnly' => true,
        ),
        'authLogRecordId' => 
        array (
          'internal' => true,
        ),
        'authMethod' => 
        array (
          'onlyAdmin' => true,
        ),
        'secretKey' => 
        array (
          'readOnly' => true,
          'onlyAdmin' => true,
        ),
        'isAdmin' => 
        array (
          'readOnly' => true,
        ),
        'isSuperAdmin' => 
        array (
          'readOnly' => true,
        ),
        'isActive' => 
        array (
          'nonAdminReadOnly' => true,
        ),
        'isPortalUser' => 
        array (
          'nonAdminReadOnly' => true,
        ),
        'teams' => 
        array (
          'nonAdminReadOnly' => true,
        ),
        'roles' => 
        array (
          'nonAdminReadOnly' => true,
        ),
        'portals' => 
        array (
          'nonAdminReadOnly' => true,
        ),
        'portalRoles' => 
        array (
          'nonAdminReadOnly' => true,
        ),
        'contact' => 
        array (
          'nonAdminReadOnly' => true,
        ),
        'accounts' => 
        array (
          'nonAdminReadOnly' => true,
        ),
        'type' => 
        array (
          'nonAdminReadOnly' => true,
        ),
      ),
      'links' => 
      array (
        'teams' => 
        array (
          'nonAdminReadOnly' => true,
        ),
        'roles' => 
        array (
          'onlyAdmin' => true,
        ),
        'preferences' => 
        array (
          'onlyAdmin' => true,
        ),
      ),
    ),
  ),
  'entityDefs' => 
  array (
    'ActionHistoryRecord' => 
    array (
      'fields' => 
      array (
        'number' => 
        array (
          'type' => 'autoincrement',
          'index' => true,
        ),
        'targetType' => 
        array (
          'view' => 'views/action-history-record/fields/target-type',
          'translation' => 'Global.scopeNames',
        ),
        'target' => 
        array (
          'type' => 'linkParent',
          'view' => 'views/action-history-record/fields/target',
        ),
        'data' => 
        array (
          'type' => 'jsonObject',
        ),
        'action' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'read',
            1 => 'update',
            2 => 'create',
            3 => 'delete',
          ),
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'hasSeconds' => true,
        ),
        'user' => 
        array (
          'type' => 'link',
        ),
        'userType' => 
        array (
          'type' => 'foreign',
          'link' => 'user',
          'field' => 'type',
          'view' => 'views/fields/foreign-enum',
          'notStorable' => true,
        ),
        'ipAddress' => 
        array (
          'type' => 'varchar',
          'maxLength' => '39',
        ),
        'authToken' => 
        array (
          'type' => 'link',
        ),
        'authLogRecord' => 
        array (
          'type' => 'link',
        ),
      ),
      'links' => 
      array (
        'user' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'target' => 
        array (
          'type' => 'belongsToParent',
        ),
        'authToken' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'AuthToken',
          'foreignName' => 'id',
          'foreign' => 'actionHistoryRecords',
        ),
        'authLogRecord' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'AuthLogRecord',
          'foreignName' => 'id',
          'foreign' => 'actionHistoryRecords',
        ),
      ),
      'collection' => 
      array (
        'sortBy' => 'number',
        'asc' => false,
        'textFilterFields' => 
        array (
          0 => 'ipAddress',
          1 => 'userName',
        ),
        'orderBy' => 'number',
        'order' => 'desc',
      ),
    ),
    'ArrayValue' => 
    array (
      'fields' => 
      array (
        'value' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'maxLength' => 100,
        ),
        'entity' => 
        array (
          'type' => 'linkParent',
        ),
        'attribute' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
        ),
      ),
      'indexes' => 
      array (
        'entityTypeValue' => 
        array (
          'columns' => 
          array (
            0 => 'entityType',
            1 => 'value',
          ),
        ),
        'entityValue' => 
        array (
          'columns' => 
          array (
            0 => 'entityType',
            1 => 'entityId',
            2 => 'value',
          ),
        ),
      ),
    ),
    'Attachment' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
          'view' => 'views/attachment/fields/name',
        ),
        'type' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
        ),
        'size' => 
        array (
          'type' => 'int',
          'min' => 0,
        ),
        'parent' => 
        array (
          'type' => 'linkParent',
          'view' => 'views/attachment/fields/parent',
        ),
        'related' => 
        array (
          'type' => 'linkParent',
          'noLoad' => true,
          'view' => 'views/attachment/fields/parent',
        ),
        'sourceId' => 
        array (
          'type' => 'varchar',
          'maxLength' => 36,
          'readOnly' => true,
          'disabled' => true,
          'index' => true,
        ),
        'field' => 
        array (
          'type' => 'varchar',
          'disabled' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'contents' => 
        array (
          'type' => 'text',
          'notStorable' => true,
        ),
        'role' => 
        array (
          'type' => 'enum',
          'maxLength' => 36,
          'options' => 
          array (
            0 => 'Attachment',
            1 => 'Inline Attachment',
            2 => 'Import File',
            3 => 'Export File',
            4 => 'Mail Merge',
            5 => 'Mass Pdf',
          ),
        ),
        'storage' => 
        array (
          'type' => 'varchar',
          'maxLength' => 24,
          'default' => NULL,
        ),
        'storageFilePath' => 
        array (
          'type' => 'varchar',
          'maxLength' => 260,
          'default' => NULL,
        ),
        'global' => 
        array (
          'type' => 'bool',
          'default' => false,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'parent' => 
        array (
          'type' => 'belongsToParent',
          'foreign' => 'attachments',
        ),
        'related' => 
        array (
          'type' => 'belongsToParent',
        ),
      ),
      'collection' => 
      array (
        'sortBy' => 'createdAt',
        'asc' => false,
        'orderBy' => 'createdAt',
        'order' => 'desc',
      ),
      'indexes' => 
      array (
        'parent' => 
        array (
          'columns' => 
          array (
            0 => 'parentType',
            1 => 'parentId',
          ),
        ),
      ),
      'sourceList' => 
      array (
        0 => 'Document',
      ),
    ),
    'AuthLogRecord' => 
    array (
      'fields' => 
      array (
        'username' => 
        array (
          'type' => 'varchar',
          'readOnly' => true,
          'maxLength' => 100,
        ),
        'portal' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'user' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'authToken' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'ipAddress' => 
        array (
          'type' => 'varchar',
          'maxLength' => '45',
          'readOnly' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
          'hasSeconds' => true,
        ),
        'isDenied' => 
        array (
          'type' => 'bool',
          'readOnly' => true,
        ),
        'denialReason' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'CREDENTIALS',
            2 => 'INACTIVE_USER',
            3 => 'IS_PORTAL_USER',
            4 => 'IS_NOT_PORTAL_USER',
            5 => 'USER_IS_NOT_IN_PORTAL',
          ),
          'readOnly' => true,
        ),
        'requestTime' => 
        array (
          'type' => 'float',
          'readOnly' => true,
        ),
        'requestUrl' => 
        array (
          'type' => 'varchar',
          'readOnly' => true,
        ),
        'requestMethod' => 
        array (
          'type' => 'varchar',
          'readOnly' => true,
          'maxLength' => '15',
        ),
        'authTokenIsActive' => 
        array (
          'type' => 'foreign',
          'link' => 'authToken',
          'field' => 'isActive',
          'readOnly' => true,
          'view' => 'views/fields/foreign-bool',
        ),
        'authenticationMethod' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Finnova',
            1 => 'LDAP',
            2 => 'ApiKey',
            3 => 'Hmac',
          ),
        ),
      ),
      'links' => 
      array (
        'user' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
          'noJoin' => true,
        ),
        'portal' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Portal',
        ),
        'authToken' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'AuthToken',
          'foreign' => 'authLog',
          'foreignName' => 'id',
        ),
        'actionHistoryRecords' => 
        array (
          'type' => 'hasMany',
          'entity' => 'ActionHistoryRecord',
          'foreign' => 'authLogRecord',
        ),
      ),
      'collection' => 
      array (
        'sortBy' => 'requestTime',
        'asc' => false,
        'textFilterFields' => 
        array (
          0 => 'ipAddress',
          1 => 'username',
        ),
        'orderBy' => 'requestTime',
        'order' => 'desc',
      ),
      'indexes' => 
      array (
        'ipAddress' => 
        array (
          'columns' => 
          array (
            0 => 'ipAddress',
          ),
        ),
        'ipAddressRequestTime' => 
        array (
          'columns' => 
          array (
            0 => 'ipAddress',
            1 => 'requestTime',
          ),
        ),
        'requestTime' => 
        array (
          'columns' => 
          array (
            0 => 'requestTime',
          ),
        ),
      ),
    ),
    'AuthToken' => 
    array (
      'fields' => 
      array (
        'token' => 
        array (
          'type' => 'varchar',
          'maxLength' => '36',
          'index' => true,
          'readOnly' => true,
        ),
        'hash' => 
        array (
          'type' => 'varchar',
          'maxLength' => 150,
          'index' => true,
          'readOnly' => true,
        ),
        'secret' => 
        array (
          'type' => 'varchar',
          'maxLength' => '36',
          'readOnly' => true,
        ),
        'userId' => 
        array (
          'type' => 'varchar',
          'maxLength' => '36',
          'readOnly' => true,
        ),
        'user' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'portal' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'ipAddress' => 
        array (
          'type' => 'varchar',
          'maxLength' => '45',
          'readOnly' => true,
        ),
        'isActive' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'lastAccess' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
          'hasSeconds' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
          'hasSeconds' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'user' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'portal' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Portal',
        ),
        'actionHistoryRecords' => 
        array (
          'type' => 'hasMany',
          'entity' => 'ActionHistoryRecord',
          'foreign' => 'authToken',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'lastAccess',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'ipAddress',
          1 => 'userName',
        ),
        'sortBy' => 'lastAccess',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'token' => 
        array (
          'columns' => 
          array (
            0 => 'token',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'Currency' => 
    array (
      'fields' => 
      array (
        'rate' => 
        array (
          'type' => 'float',
        ),
      ),
    ),
    'DashboardTemplate' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
          'trim' => true,
          'required' => true,
        ),
        'layout' => 
        array (
          'type' => 'jsonArray',
          'view' => 'views/settings/fields/dashboard-layout',
          'inlineEditDisabled' => true,
          'required' => true,
        ),
        'dashletsOptions' => 
        array (
          'type' => 'jsonObject',
          'disabled' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'name',
        'order' => 'asc',
        'sortBy' => 'name',
        'asc' => true,
      ),
    ),
    'Email' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'subject' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'notStorable' => true,
          'view' => 'views/email/fields/subject',
          'disabled' => true,
          'trim' => true,
        ),
        'fromName' => 
        array (
          'type' => 'varchar',
          'readOnly' => true,
          'notStorable' => true,
          'textFilterDisabled' => true,
          'layoutFiltersDisabled' => true,
        ),
        'fromAddress' => 
        array (
          'type' => 'varchar',
          'readOnly' => true,
          'notStorable' => true,
          'textFilterDisabled' => true,
          'layoutFiltersDisabled' => true,
        ),
        'fromString' => 
        array (
          'type' => 'varchar',
        ),
        'replyToString' => 
        array (
          'type' => 'varchar',
        ),
        'replyToName' => 
        array (
          'type' => 'varchar',
          'readOnly' => true,
          'notStorable' => true,
          'textFilterDisabled' => true,
          'layoutFiltersDisabled' => true,
        ),
        'replyToAddress' => 
        array (
          'type' => 'varchar',
          'readOnly' => true,
          'notStorable' => true,
          'textFilterDisabled' => true,
          'layoutFiltersDisabled' => true,
        ),
        'addressNameMap' => 
        array (
          'type' => 'jsonObject',
          'disabled' => true,
          'readOnly' => true,
        ),
        'from' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'required' => true,
          'view' => 'views/email/fields/from-address-varchar',
          'textFilterDisabled' => true,
        ),
        'to' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'required' => true,
          'view' => 'views/email/fields/email-address-varchar',
          'textFilterDisabled' => true,
        ),
        'cc' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'view' => 'views/email/fields/email-address-varchar',
          'textFilterDisabled' => true,
        ),
        'bcc' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'view' => 'views/email/fields/email-address-varchar',
          'textFilterDisabled' => true,
        ),
        'replyTo' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'view' => 'views/email/fields/email-address-varchar',
          'textFilterDisabled' => true,
        ),
        'personStringData' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'disabled' => true,
          'view' => 'views/email/fields/person-string-data',
        ),
        'isRead' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'default' => true,
          'readOnly' => true,
        ),
        'isNotRead' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutListDisabled' => true,
          'layoutDetailDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'readOnly' => true,
        ),
        'isReplied' => 
        array (
          'type' => 'bool',
          'readOnly' => true,
        ),
        'isNotReplied' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutListDisabled' => true,
          'layoutDetailDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'readOnly' => true,
        ),
        'isImportant' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'default' => false,
        ),
        'inTrash' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'default' => false,
        ),
        'folderId' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'default' => false,
          'textFilterDisabled' => true,
        ),
        'isUsers' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'default' => false,
        ),
        'folder' => 
        array (
          'type' => 'link',
          'notStorable' => true,
          'readOnly' => true,
        ),
        'nameHash' => 
        array (
          'type' => 'text',
          'notStorable' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'typeHash' => 
        array (
          'type' => 'text',
          'notStorable' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'idHash' => 
        array (
          'type' => 'text',
          'notStorable' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'messageId' => 
        array (
          'type' => 'varchar',
          'maxLength' => 255,
          'readOnly' => true,
          'index' => true,
          'textFilterDisabled' => true,
        ),
        'messageIdInternal' => 
        array (
          'type' => 'varchar',
          'maxLength' => 300,
          'readOnly' => true,
          'textFilterDisabled' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'base',
          'notStorable' => true,
          'view' => 'views/email/fields/email-address',
        ),
        'fromEmailAddress' => 
        array (
          'type' => 'link',
          'view' => 'views/email/fields/from-email-address',
          'textFilterDisabled' => true,
        ),
        'toEmailAddresses' => 
        array (
          'type' => 'linkMultiple',
        ),
        'ccEmailAddresses' => 
        array (
          'type' => 'linkMultiple',
        ),
        'replyToEmailAddresses' => 
        array (
          'type' => 'linkMultiple',
        ),
        'bodyPlain' => 
        array (
          'type' => 'text',
          'seeMoreDisabled' => true,
          'clientReadOnly' => true,
        ),
        'body' => 
        array (
          'type' => 'wysiwyg',
          'view' => 'views/email/fields/body',
          'attachmentField' => 'attachments',
          'useIframe' => true,
        ),
        'isHtml' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Draft',
            1 => 'Sending',
            2 => 'Sent',
            3 => 'Archived',
            4 => 'Failed',
          ),
          'default' => 'Archived',
          'clientReadOnly' => true,
        ),
        'attachments' => 
        array (
          'type' => 'attachmentMultiple',
          'sourceList' => 
          array (
            0 => 'Document',
          ),
        ),
        'hasAttachment' => 
        array (
          'type' => 'bool',
          'readOnly' => true,
        ),
        'parent' => 
        array (
          'type' => 'linkParent',
          'entityList' => 
          array (
            0 => 'Account',
            1 => 'Lead',
            2 => 'Contact',
            3 => 'Opportunity',
            4 => 'Case',
            5 => 'EmailReminder',
            6 => 'SentEmailReminder',
            7 => 'SMSReminder',
            8 => 'SendSMSData',
            9 => 'Estimate',
            10 => 'Invoice',
            11 => 'Payments',
            12 => 'Designation',
            13 => 'OfficeLocation',
            14 => 'ClosedTask',
            15 => 'Export',
            16 => 'ExportResult',
            17 => 'ContactList',
            18 => 'MyCampaigns',
            19 => 'MessageLog',
            20 => 'SentMessages',
            21 => 'BillingEntity',
            22 => 'HolidayCalender',
            23 => 'TestDemo',
            24 => 'NSICData',
            25 => 'Demo',
            26 => 'TestEntity2710',
          ),
        ),
        'dateSent' => 
        array (
          'type' => 'datetime',
        ),
        'deliveryDate' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'sentBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'noLoad' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'replied' => 
        array (
          'type' => 'link',
          'noJoin' => true,
          'readOnly' => true,
        ),
        'replies' => 
        array (
          'type' => 'linkMultiple',
          'readOnly' => true,
          'orderBy' => 'dateSent',
        ),
        'isSystem' => 
        array (
          'type' => 'bool',
          'default' => false,
          'readOnly' => true,
        ),
        'isJustSent' => 
        array (
          'type' => 'bool',
          'default' => false,
          'disabled' => true,
          'notStorable' => true,
        ),
        'isBeingImported' => 
        array (
          'type' => 'bool',
          'disabled' => true,
          'notStorable' => true,
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'users' => 
        array (
          'type' => 'linkMultiple',
          'noLoad' => true,
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'readOnly' => true,
          'columns' => 
          array (
            'inTrash' => 'inTrash',
            'folderId' => 'folderId',
          ),
        ),
        'assignedUsers' => 
        array (
          'type' => 'linkMultiple',
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'readOnly' => true,
        ),
        'inboundEmails' => 
        array (
          'type' => 'linkMultiple',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'noLoad' => true,
        ),
        'emailAccounts' => 
        array (
          'type' => 'linkMultiple',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'noLoad' => true,
        ),
        'account' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
        ),
        'assignedUsers' => 
        array (
          'type' => 'hasMany',
          'entity' => 'User',
          'relationName' => 'entityUser',
        ),
        'users' => 
        array (
          'type' => 'hasMany',
          'entity' => 'User',
          'foreign' => 'emails',
          'additionalColumns' => 
          array (
            'isRead' => 
            array (
              'type' => 'bool',
              'default' => false,
            ),
            'isImportant' => 
            array (
              'type' => 'bool',
              'default' => false,
            ),
            'inTrash' => 
            array (
              'type' => 'bool',
              'default' => false,
            ),
            'folderId' => 
            array (
              'type' => 'varchar',
              'default' => NULL,
              'maxLength' => 24,
            ),
          ),
        ),
        'sentBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'attachments' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Attachment',
          'foreign' => 'parent',
          'relationName' => 'attachments',
        ),
        'parent' => 
        array (
          'type' => 'belongsToParent',
          'entityList' => 
          array (
          ),
          'foreign' => 'emails',
        ),
        'replied' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Email',
          'foreign' => 'replies',
        ),
        'replies' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Email',
          'foreign' => 'replied',
        ),
        'fromEmailAddress' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'EmailAddress',
        ),
        'toEmailAddresses' => 
        array (
          'type' => 'hasMany',
          'entity' => 'EmailAddress',
          'relationName' => 'emailEmailAddress',
          'conditions' => 
          array (
            'addressType' => 'to',
          ),
          'additionalColumns' => 
          array (
            'addressType' => 
            array (
              'type' => 'varchar',
              'len' => '4',
            ),
          ),
        ),
        'ccEmailAddresses' => 
        array (
          'type' => 'hasMany',
          'entity' => 'EmailAddress',
          'relationName' => 'emailEmailAddress',
          'conditions' => 
          array (
            'addressType' => 'cc',
          ),
          'additionalColumns' => 
          array (
            'addressType' => 
            array (
              'type' => 'varchar',
              'len' => '4',
            ),
          ),
        ),
        'bccEmailAddresses' => 
        array (
          'type' => 'hasMany',
          'entity' => 'EmailAddress',
          'relationName' => 'emailEmailAddress',
          'conditions' => 
          array (
            'addressType' => 'bcc',
          ),
          'additionalColumns' => 
          array (
            'addressType' => 
            array (
              'type' => 'varchar',
              'len' => '4',
            ),
          ),
        ),
        'replyToEmailAddresses' => 
        array (
          'type' => 'hasMany',
          'entity' => 'EmailAddress',
          'relationName' => 'emailEmailAddress',
          'conditions' => 
          array (
            'addressType' => 'rto',
          ),
          'additionalColumns' => 
          array (
            'addressType' => 
            array (
              'type' => 'varchar',
              'len' => '4',
            ),
          ),
        ),
        'inboundEmails' => 
        array (
          'type' => 'hasMany',
          'entity' => 'InboundEmail',
          'foreign' => 'emails',
        ),
        'emailAccounts' => 
        array (
          'type' => 'hasMany',
          'entity' => 'EmailAccount',
          'foreign' => 'emails',
        ),
        'account' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Account',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'dateSent',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
          1 => 'bodyPlain',
          2 => 'body',
        ),
        'countDisabled' => true,
        'fullTextSearch' => true,
        'sortBy' => 'dateSent',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'createdById' => 
        array (
          'columns' => 
          array (
            0 => 'createdById',
          ),
        ),
        'dateSent' => 
        array (
          'columns' => 
          array (
            0 => 'dateSent',
            1 => 'deleted',
          ),
        ),
        'dateSentStatus' => 
        array (
          'columns' => 
          array (
            0 => 'dateSent',
            1 => 'status',
            2 => 'deleted',
          ),
        ),
      ),
    ),
    'EmailAccount' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'maxLength' => 100,
          'trim' => true,
          'view' => 'views/email-account/fields/email-address',
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Active',
            1 => 'Inactive',
          ),
          'default' => 'Active',
        ),
        'host' => 
        array (
          'type' => 'varchar',
          'trim' => true,
        ),
        'port' => 
        array (
          'type' => 'varchar',
          'default' => '143',
        ),
        'ssl' => 
        array (
          'type' => 'bool',
        ),
        'username' => 
        array (
          'type' => 'varchar',
          'trim' => true,
        ),
        'password' => 
        array (
          'type' => 'password',
        ),
        'monitoredFolders' => 
        array (
          'type' => 'varchar',
          'default' => 'INBOX',
          'view' => 'views/email-account/fields/folders',
          'tooltip' => true,
        ),
        'sentFolder' => 
        array (
          'type' => 'varchar',
          'view' => 'views/email-account/fields/folder',
        ),
        'storeSentEmails' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'keepFetchedEmailsUnread' => 
        array (
          'type' => 'bool',
        ),
        'fetchSince' => 
        array (
          'type' => 'date',
          'required' => true,
        ),
        'fetchData' => 
        array (
          'type' => 'jsonObject',
          'readOnly' => true,
        ),
        'emailFolder' => 
        array (
          'type' => 'link',
          'view' => 'views/email-account/fields/email-folder',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => true,
          'view' => 'views/fields/assigned-user',
        ),
        'useImap' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'useSmtp' => 
        array (
          'type' => 'bool',
        ),
        'smtpHost' => 
        array (
          'type' => 'varchar',
          'trim' => true,
        ),
        'smtpPort' => 
        array (
          'type' => 'int',
          'min' => 0,
          'max' => 9999,
          'default' => 587,
        ),
        'smtpAuth' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'smtpSecurity' => 
        array (
          'type' => 'enum',
          'default' => 'TLS',
          'options' => 
          array (
            0 => '',
            1 => 'SSL',
            2 => 'TLS',
          ),
        ),
        'smtpUsername' => 
        array (
          'type' => 'varchar',
          'trim' => true,
        ),
        'smtpPassword' => 
        array (
          'type' => 'password',
        ),
        'smtpAuthMechanism' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'login',
            1 => 'crammd5',
            2 => 'plain',
          ),
          'default' => 'login',
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'filters' => 
        array (
          'type' => 'hasChildren',
          'foreign' => 'parent',
          'entity' => 'EmailFilter',
        ),
        'emails' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Email',
          'foreign' => 'emailAccounts',
        ),
        'emailFolder' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'EmailFolder',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'name',
        'order' => 'asc',
        'sortBy' => 'name',
        'asc' => true,
      ),
    ),
    'EmailAddress' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
        ),
        'lower' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'index' => true,
        ),
        'invalid' => 
        array (
          'type' => 'bool',
        ),
        'optOut' => 
        array (
          'type' => 'bool',
        ),
      ),
      'links' => 
      array (
      ),
      'collection' => 
      array (
        'orderBy' => 'name',
        'order' => 'asc',
        'sortBy' => 'name',
        'asc' => true,
      ),
    ),
    'EmailFilter' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'maxLength' => 100,
          'tooltip' => true,
          'trim' => true,
        ),
        'from' => 
        array (
          'type' => 'varchar',
          'maxLength' => 255,
          'tooltip' => true,
          'trim' => true,
        ),
        'to' => 
        array (
          'type' => 'varchar',
          'maxLength' => 255,
          'tooltip' => true,
          'trim' => true,
        ),
        'subject' => 
        array (
          'type' => 'varchar',
          'maxLength' => 255,
          'tooltip' => true,
        ),
        'bodyContains' => 
        array (
          'type' => 'array',
          'tooltip' => true,
        ),
        'isGlobal' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'parent' => 
        array (
          'type' => 'linkParent',
        ),
        'action' => 
        array (
          'type' => 'enum',
          'default' => 'Skip',
          'options' => 
          array (
            0 => 'Skip',
            1 => 'Move to Folder',
          ),
          'view' => 'views/email-filter/fields/action',
        ),
        'emailFolder' => 
        array (
          'type' => 'link',
          'view' => 'views/email-filter/fields/email-folder',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'parent' => 
        array (
          'type' => 'belongsToParent',
          'entityList' => 
          array (
            0 => 'User',
            1 => 'EmailAccount',
            2 => 'InboundEmail',
          ),
        ),
        'emailFolder' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'EmailFolder',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
    ),
    'EmailFolder' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'maxLength' => 64,
          'trim' => true,
        ),
        'order' => 
        array (
          'type' => 'int',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'skipNotifications' => 
        array (
          'type' => 'bool',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'order',
        'order' => 'asc',
        'sortBy' => 'order',
        'asc' => true,
      ),
    ),
    'EmailTemplate' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'subject' => 
        array (
          'type' => 'varchar',
        ),
        'body' => 
        array (
          'type' => 'wysiwyg',
          'view' => 'views/email-template/fields/body',
          'useIframe' => true,
        ),
        'isHtml' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'oneOff' => 
        array (
          'type' => 'bool',
          'default' => false,
          'tooltip' => true,
        ),
        'attachments' => 
        array (
          'type' => 'attachmentMultiple',
        ),
        'category' => 
        array (
          'type' => 'link',
          'view' => 'views/fields/link-category-tree',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
      ),
      'links' => 
      array (
        'attachments' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Attachment',
          'foreign' => 'parent',
        ),
        'category' => 
        array (
          'type' => 'belongsTo',
          'foreign' => 'emailTemplates',
          'entity' => 'EmailTemplateCategory',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
          1 => 'bodyPlain',
          2 => 'body',
          3 => 'subject',
        ),
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
    ),
    'EmailTemplateCategory' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'order' => 
        array (
          'type' => 'int',
          'minValue' => 1,
          'required' => true,
          'textFilterDisabled' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
        ),
        'parent' => 
        array (
          'type' => 'link',
        ),
        'childList' => 
        array (
          'type' => 'jsonArray',
          'notStorable' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'parent' => 
        array (
          'type' => 'belongsTo',
          'foreign' => 'children',
          'entity' => 'EmailTemplateCategory',
        ),
        'children' => 
        array (
          'type' => 'hasMany',
          'foreign' => 'parent',
          'entity' => 'EmailTemplateCategory',
        ),
        'emailTemplates' => 
        array (
          'type' => 'hasMany',
          'foreign' => 'category',
          'entity' => 'EmailTemplate',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'parent',
        'order' => 'asc',
        'sortBy' => 'parent',
        'asc' => true,
      ),
      'additionalTables' => 
      array (
        'EmailTemplateCategoryPath' => 
        array (
          'fields' => 
          array (
            'id' => 
            array (
              'type' => 'id',
              'dbType' => 'int',
              'len' => '11',
              'autoincrement' => true,
            ),
            'ascendorId' => 
            array (
              'type' => 'varchar',
              'len' => '100',
              'index' => true,
            ),
            'descendorId' => 
            array (
              'type' => 'varchar',
              'len' => '24',
              'index' => true,
            ),
          ),
        ),
      ),
    ),
    'Extension' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
        ),
        'version' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'maxLength' => 50,
        ),
        'fileList' => 
        array (
          'type' => 'jsonArray',
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'isInstalled' => 
        array (
          'type' => 'bool',
          'default' => false,
        ),
        'checkVersionUrl' => 
        array (
          'type' => 'url',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
    ),
    'ExternalAccount' => 
    array (
      'fields' => 
      array (
        'id' => 
        array (
          'type' => 'id',
          'maxLength' => 64,
        ),
        'data' => 
        array (
          'type' => 'jsonObject',
        ),
        'enabled' => 
        array (
          'type' => 'bool',
        ),
      ),
    ),
    'Import' => 
    array (
      'fields' => 
      array (
        'entityType' => 
        array (
          'type' => 'enum',
          'translation' => 'Global.scopeNames',
          'required' => true,
          'readOnly' => true,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'In Process',
            1 => 'Complete',
            2 => 'Failed',
          ),
          'readOnly' => true,
          'style' => 
          array (
            'Complete' => 'success',
            'Failed' => 'danger',
          ),
        ),
        'file' => 
        array (
          'type' => 'file',
          'required' => true,
          'readOnly' => true,
        ),
        'importedCount' => 
        array (
          'type' => 'int',
          'readOnly' => true,
          'notStorable' => true,
        ),
        'duplicateCount' => 
        array (
          'type' => 'int',
          'readOnly' => true,
          'notStorable' => true,
        ),
        'updatedCount' => 
        array (
          'type' => 'int',
          'readOnly' => true,
          'notStorable' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
    ),
    'InboundEmail' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'maxLength' => 100,
          'view' => 'views/inbound-email/fields/email-address',
          'trim' => true,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Active',
            1 => 'Inactive',
          ),
          'default' => 'Active',
        ),
        'host' => 
        array (
          'type' => 'varchar',
          'trim' => true,
        ),
        'port' => 
        array (
          'type' => 'varchar',
          'default' => '143',
        ),
        'ssl' => 
        array (
          'type' => 'bool',
        ),
        'username' => 
        array (
          'type' => 'varchar',
          'trim' => true,
        ),
        'password' => 
        array (
          'type' => 'password',
        ),
        'monitoredFolders' => 
        array (
          'type' => 'varchar',
          'default' => 'INBOX',
          'view' => 'views/inbound-email/fields/folders',
          'tooltip' => true,
        ),
        'fetchSince' => 
        array (
          'type' => 'date',
          'required' => true,
        ),
        'fetchData' => 
        array (
          'type' => 'jsonObject',
          'readOnly' => true,
        ),
        'assignToUser' => 
        array (
          'type' => 'link',
          'tooltip' => true,
        ),
        'team' => 
        array (
          'type' => 'link',
          'tooltip' => true,
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'tooltip' => true,
        ),
        'addAllTeamUsers' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
          'default' => true,
        ),
        'sentFolder' => 
        array (
          'type' => 'varchar',
          'view' => 'views/inbound-email/fields/folder',
        ),
        'storeSentEmails' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'keepFetchedEmailsUnread' => 
        array (
          'type' => 'bool',
        ),
        'useImap' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'useSmtp' => 
        array (
          'type' => 'bool',
        ),
        'smtpIsShared' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'smtpIsForMassEmail' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'smtpHost' => 
        array (
          'type' => 'varchar',
          'trim' => true,
        ),
        'smtpPort' => 
        array (
          'type' => 'int',
          'min' => 0,
          'max' => 9999,
          'default' => 587,
        ),
        'smtpAuth' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'smtpSecurity' => 
        array (
          'type' => 'enum',
          'default' => 'TLS',
          'options' => 
          array (
            0 => '',
            1 => 'SSL',
            2 => 'TLS',
          ),
        ),
        'smtpUsername' => 
        array (
          'type' => 'varchar',
          'trim' => true,
        ),
        'smtpPassword' => 
        array (
          'type' => 'password',
        ),
        'smtpAuthMechanism' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'login',
            1 => 'crammd5',
            2 => 'plain',
          ),
          'default' => 'login',
        ),
        'createCase' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'caseDistribution' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'Direct-Assignment',
            2 => 'Round-Robin',
            3 => 'Least-Busy',
          ),
          'default' => 'Direct-Assignment',
          'tooltip' => true,
        ),
        'targetUserPosition' => 
        array (
          'type' => 'enum',
          'view' => 'views/inbound-email/fields/target-user-position',
          'tooltip' => true,
        ),
        'reply' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'replyEmailTemplate' => 
        array (
          'type' => 'link',
        ),
        'replyFromAddress' => 
        array (
          'type' => 'varchar',
        ),
        'replyToAddress' => 
        array (
          'type' => 'varchar',
          'tooltip' => true,
        ),
        'replyFromName' => 
        array (
          'type' => 'varchar',
        ),
        'fromName' => 
        array (
          'type' => 'varchar',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'foreign' => 'inboundEmails',
        ),
        'assignToUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'team' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Team',
        ),
        'replyEmailTemplate' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'EmailTemplate',
        ),
        'filters' => 
        array (
          'type' => 'hasChildren',
          'foreign' => 'parent',
          'entity' => 'EmailFilter',
        ),
        'emails' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Email',
          'foreign' => 'inboundEmails',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'name',
        'order' => 'asc',
        'sortBy' => 'name',
        'asc' => true,
      ),
    ),
    'Integration' => 
    array (
      'fields' => 
      array (
        'data' => 
        array (
          'type' => 'jsonObject',
        ),
        'enabled' => 
        array (
          'type' => 'bool',
        ),
      ),
    ),
    'Job' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'view' => 'views/admin/job/fields/name',
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Pending',
            1 => 'Ready',
            2 => 'Running',
            3 => 'Success',
            4 => 'Failed',
          ),
          'default' => 'Pending',
          'style' => 
          array (
            'Success' => 'success',
            'Failed' => 'danger',
            'Running' => 'warning',
            'Ready' => 'warning',
          ),
        ),
        'executeTime' => 
        array (
          'type' => 'datetime',
          'required' => true,
          'hasSeconds' => true,
        ),
        'number' => 
        array (
          'type' => 'int',
          'index' => true,
          'readOnly' => true,
          'view' => 'views/fields/autoincrement',
          'dbType' => 'bigint',
          'unique' => true,
          'autoincrement' => true,
        ),
        'serviceName' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'maxLength' => 100,
        ),
        'methodName' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
        ),
        'job' => 
        array (
          'type' => 'varchar',
          'view' => 'views/scheduled-job/fields/job',
        ),
        'data' => 
        array (
          'type' => 'jsonObject',
        ),
        'scheduledJob' => 
        array (
          'type' => 'link',
        ),
        'scheduledJobJob' => 
        array (
          'type' => 'foreign',
          'link' => 'scheduledJob',
          'field' => 'job',
        ),
        'queue' => 
        array (
          'type' => 'varchar',
          'maxLength' => 36,
          'default' => NULL,
        ),
        'startedAt' => 
        array (
          'type' => 'datetime',
          'hasSeconds' => true,
        ),
        'executedAt' => 
        array (
          'type' => 'datetime',
          'hasSeconds' => true,
        ),
        'pid' => 
        array (
          'type' => 'int',
        ),
        'attempts' => 
        array (
          'type' => 'int',
        ),
        'targetId' => 
        array (
          'type' => 'varchar',
          'maxLength' => 48,
        ),
        'targetType' => 
        array (
          'type' => 'varchar',
          'maxLength' => 64,
        ),
        'failedAttempts' => 
        array (
          'type' => 'int',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
          'hasSeconds' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
          'hasSeconds' => true,
        ),
      ),
      'links' => 
      array (
        'scheduledJob' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'ScheduledJob',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'number',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'id',
          1 => 'name',
          2 => 'methodName',
          3 => 'serviceName',
          4 => 'scheduledJob',
        ),
        'sortBy' => 'number',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'executeTime' => 
        array (
          'columns' => 
          array (
            0 => 'status',
            1 => 'executeTime',
          ),
        ),
        'status' => 
        array (
          'columns' => 
          array (
            0 => 'status',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'LeadCapture' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
          'trim' => true,
        ),
        'campaign' => 
        array (
          'type' => 'link',
        ),
        'isActive' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'subscribeToTargetList' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'subscribeContactToTargetList' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'targetList' => 
        array (
          'type' => 'link',
        ),
        'fieldList' => 
        array (
          'type' => 'multiEnum',
          'default' => 
          array (
            0 => 'firstName',
            1 => 'lastName',
            2 => 'emailAddress',
          ),
          'view' => 'views/lead-capture/fields/field-list',
          'required' => true,
          'ignoreFieldList' => 
          array (
            0 => 'targetList',
            1 => 'targetLists',
            2 => 'acceptanceStatusMeetings',
            3 => 'acceptanceStatusCalls',
            4 => 'campaign',
            5 => 'source',
            6 => 'teams',
            7 => 'createdOpportunity',
            8 => 'createdAccount',
            9 => 'createdContact',
          ),
        ),
        'duplicateCheck' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'optInConfirmation' => 
        array (
          'type' => 'bool',
        ),
        'optInConfirmationEmailTemplate' => 
        array (
          'type' => 'link',
        ),
        'optInConfirmationLifetime' => 
        array (
          'type' => 'int',
          'default' => 48,
          'min' => 1,
        ),
        'optInConfirmationSuccessMessage' => 
        array (
          'type' => 'text',
          'tooltip' => true,
        ),
        'createLeadBeforeOptInConfirmation' => 
        array (
          'type' => 'bool',
        ),
        'skipOptInConfirmationIfSubscribed' => 
        array (
          'type' => 'bool',
        ),
        'leadSource' => 
        array (
          'type' => 'enum',
          'view' => 'crm:views/opportunity/fields/lead-source',
          'customizationOptionsDisabled' => true,
          'default' => 'Web Site',
        ),
        'apiKey' => 
        array (
          'type' => 'varchar',
          'maxLength' => 36,
          'readOnly' => true,
          'view' => 'views/lead-capture/fields/api-key',
        ),
        'targetTeam' => 
        array (
          'type' => 'link',
        ),
        'exampleRequestUrl' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'readOnly' => true,
        ),
        'exampleRequestMethod' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'readOnly' => true,
        ),
        'exampleRequestPayload' => 
        array (
          'type' => 'text',
          'notStorable' => true,
          'readOnly' => true,
          'seeMoreDisabled' => true,
        ),
        'inboundEmail' => 
        array (
          'type' => 'link',
        ),
        'smtpAccount' => 
        array (
          'type' => 'base',
          'notStorable' => true,
          'view' => 'views/lead-capture/fields/smtp-account',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'targetList' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'TargetList',
        ),
        'campaign' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Campaign',
        ),
        'targetTeam' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Team',
        ),
        'inboundEmail' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'InboundEmail',
        ),
        'optInConfirmationEmailTemplate' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'EmailTemplate',
        ),
        'logRecords' => 
        array (
          'type' => 'hasMany',
          'entity' => 'LeadCaptureLogRecord',
          'foreign' => 'leadCapture',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'name',
        'order' => 'asc',
        'sortBy' => 'name',
        'asc' => true,
      ),
    ),
    'LeadCaptureLogRecord' => 
    array (
      'fields' => 
      array (
        'number' => 
        array (
          'type' => 'autoincrement',
          'index' => true,
          'readOnly' => true,
        ),
        'data' => 
        array (
          'type' => 'jsonObject',
        ),
        'isCreated' => 
        array (
          'type' => 'bool',
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'leadCapture' => 
        array (
          'type' => 'link',
        ),
        'target' => 
        array (
          'type' => 'linkParent',
        ),
      ),
      'links' => 
      array (
        'leadCapture' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'LeadCapture',
          'foreign' => 'logRecords',
        ),
        'target' => 
        array (
          'type' => 'belongsToParent',
          'entityList' => 
          array (
            0 => 'Contact',
            1 => 'Lead',
          ),
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'number',
        'order' => 'desc',
        'sortBy' => 'number',
        'asc' => false,
      ),
    ),
    'NextNumber' => 
    array (
      'fields' => 
      array (
        'entityType' => 
        array (
          'type' => 'varchar',
          'index' => true,
        ),
        'fieldName' => 
        array (
          'type' => 'varchar',
        ),
        'value' => 
        array (
          'type' => 'int',
          'default' => 1,
        ),
      ),
    ),
    'Note' => 
    array (
      'fields' => 
      array (
        'post' => 
        array (
          'type' => 'text',
          'rows' => 30,
        ),
        'data' => 
        array (
          'type' => 'jsonObject',
          'readOnly' => true,
        ),
        'type' => 
        array (
          'type' => 'varchar',
          'readOnly' => true,
          'view' => 'views/fields/enum',
          'options' => 
          array (
            0 => 'Post',
          ),
        ),
        'targetType' => 
        array (
          'type' => 'varchar',
        ),
        'parent' => 
        array (
          'type' => 'linkParent',
          'readOnly' => true,
        ),
        'related' => 
        array (
          'type' => 'linkParent',
          'readOnly' => true,
        ),
        'attachments' => 
        array (
          'type' => 'attachmentMultiple',
          'view' => 'views/stream/fields/attachment-multiple',
        ),
        'number' => 
        array (
          'type' => 'autoincrement',
          'index' => true,
          'dbType' => 'bigint',
          'readOnly' => true,
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'noLoad' => true,
        ),
        'portals' => 
        array (
          'type' => 'linkMultiple',
          'noLoad' => true,
        ),
        'users' => 
        array (
          'type' => 'linkMultiple',
          'noLoad' => true,
        ),
        'isGlobal' => 
        array (
          'type' => 'bool',
        ),
        'createdByGender' => 
        array (
          'type' => 'foreign',
          'link' => 'createdBy',
          'field' => 'gender',
        ),
        'notifiedUserIdList' => 
        array (
          'type' => 'jsonArray',
          'notStorable' => true,
          'disabled' => true,
        ),
        'isInternal' => 
        array (
          'type' => 'bool',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'attachments' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Attachment',
          'relationName' => 'attachments',
          'foreign' => 'parent',
        ),
        'parent' => 
        array (
          'type' => 'belongsToParent',
          'foreign' => 'notes',
        ),
        'superParent' => 
        array (
          'type' => 'belongsToParent',
        ),
        'related' => 
        array (
          'type' => 'belongsToParent',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'foreign' => 'notes',
        ),
        'portals' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Portal',
          'foreign' => 'notes',
        ),
        'users' => 
        array (
          'type' => 'hasMany',
          'entity' => 'User',
          'foreign' => 'notes',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'number',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'post',
        ),
        'sortBy' => 'number',
        'asc' => false,
      ),
      'statusStyles' => 
      array (
        'Lead' => 
        array (
          'Assigned' => 'primary',
          'In Process' => 'primary',
        ),
        'Case' => 
        array (
          'Assigned' => 'primary',
        ),
        'Opportunity' => 
        array (
          'Proposal' => 'primary',
          'Negotiation' => 'primary',
        ),
        'Task' => 
        array (
          'Started' => 'primary',
          'Canceled' => 'danger',
        ),
      ),
      'indexes' => 
      array (
        'createdAt' => 
        array (
          'type' => 'index',
          'columns' => 
          array (
            0 => 'createdAt',
          ),
        ),
        'parent' => 
        array (
          'type' => 'index',
          'columns' => 
          array (
            0 => 'parentId',
            1 => 'parentType',
          ),
        ),
        'parentAndSuperParent' => 
        array (
          'type' => 'index',
          'columns' => 
          array (
            0 => 'parentId',
            1 => 'parentType',
            2 => 'superParentId',
            3 => 'superParentType',
          ),
        ),
        'createdByNumber' => 
        array (
          'columns' => 
          array (
            0 => 'createdById',
            1 => 'number',
          ),
        ),
      ),
    ),
    'Notification' => 
    array (
      'fields' => 
      array (
        'number' => 
        array (
          'type' => 'autoincrement',
          'dbType' => 'bigint',
          'index' => true,
        ),
        'data' => 
        array (
          'type' => 'jsonObject',
        ),
        'noteData' => 
        array (
          'type' => 'jsonObject',
          'notStorable' => true,
        ),
        'type' => 
        array (
          'type' => 'varchar',
        ),
        'read' => 
        array (
          'type' => 'bool',
        ),
        'emailIsProcessed' => 
        array (
          'type' => 'bool',
        ),
        'user' => 
        array (
          'type' => 'link',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'message' => 
        array (
          'type' => 'text',
        ),
        'related' => 
        array (
          'type' => 'linkParent',
          'readOnly' => true,
        ),
        'relatedParent' => 
        array (
          'type' => 'linkParent',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'user' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'related' => 
        array (
          'type' => 'belongsToParent',
        ),
        'relatedParent' => 
        array (
          'type' => 'belongsToParent',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'number',
        'order' => 'desc',
        'sortBy' => 'number',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'createdAt' => 
        array (
          'type' => 'index',
          'columns' => 
          array (
            0 => 'createdAt',
          ),
        ),
        'user' => 
        array (
          'type' => 'index',
          'columns' => 
          array (
            0 => 'userId',
            1 => 'createdAt',
          ),
        ),
      ),
    ),
    'PasswordChangeRequest' => 
    array (
      'fields' => 
      array (
        'requestId' => 
        array (
          'type' => 'varchar',
          'maxLength' => 64,
          'index' => true,
        ),
        'user' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'index' => true,
        ),
        'url' => 
        array (
          'type' => 'url',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'user' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
      ),
    ),
    'PhoneNumber' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'maxLength' => 36,
          'index' => true,
        ),
        'type' => 
        array (
          'type' => 'enum',
        ),
        'numeric' => 
        array (
          'type' => 'varchar',
          'maxLength' => 36,
          'index' => true,
        ),
        'invalid' => 
        array (
          'type' => 'bool',
        ),
        'optOut' => 
        array (
          'type' => 'bool',
        ),
      ),
      'links' => 
      array (
      ),
      'collection' => 
      array (
        'orderBy' => 'name',
        'order' => 'asc',
        'sortBy' => 'name',
        'asc' => true,
      ),
    ),
    'Portal' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
          'trim' => true,
          'required' => true,
          'options' => 
          array (
          ),
        ),
        'logo' => 
        array (
          'type' => 'image',
        ),
        'url' => 
        array (
          'type' => 'url',
          'notStorable' => true,
          'readOnly' => true,
        ),
        'customId' => 
        array (
          'type' => 'varchar',
          'maxLength' => 36,
          'view' => 'views/portal/fields/custom-id',
          'trim' => true,
          'index' => true,
        ),
        'isActive' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'isDefault' => 
        array (
          'type' => 'bool',
          'default' => false,
          'notStorable' => true,
        ),
        'portalRoles' => 
        array (
          'type' => 'linkMultiple',
        ),
        'tabList' => 
        array (
          'type' => 'array',
          'view' => 'views/portal/fields/tab-list',
        ),
        'quickCreateList' => 
        array (
          'type' => 'array',
          'translation' => 'Global.scopeNames',
          'view' => 'views/portal/fields/quick-create-list',
        ),
        'companyLogo' => 
        array (
          'type' => 'image',
        ),
        'theme' => 
        array (
          'type' => 'enum',
          'view' => 'views/preferences/fields/theme',
          'translation' => 'Global.themes',
          'default' => '',
        ),
        'language' => 
        array (
          'type' => 'enum',
          'view' => 'views/preferences/fields/language',
          'default' => '',
        ),
        'timeZone' => 
        array (
          'type' => 'enum',
          'detault' => '',
          'view' => 'views/preferences/fields/time-zone',
        ),
        'dateFormat' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'MM/DD/YYYY',
            1 => 'YYYY-MM-DD',
            2 => 'DD.MM.YYYY',
            3 => 'DD/MM/YYYY',
          ),
          'default' => '',
          'view' => 'views/preferences/fields/date-format',
        ),
        'timeFormat' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'HH:mm',
            1 => 'hh:mma',
            2 => 'hh:mmA',
            3 => 'hh:mm A',
            4 => 'hh:mm a',
          ),
          'default' => '',
          'view' => 'views/preferences/fields/time-format',
        ),
        'weekStart' => 
        array (
          'type' => 'enumInt',
          'options' => 
          array (
            0 => 0,
            1 => 1,
          ),
          'default' => -1,
          'view' => 'views/preferences/fields/week-start',
        ),
        'defaultCurrency' => 
        array (
          'type' => 'enum',
          'default' => '',
          'view' => 'views/preferences/fields/default-currency',
        ),
        'dashboardLayout' => 
        array (
          'type' => 'jsonArray',
          'view' => 'views/settings/fields/dashboard-layout',
        ),
        'dashletsOptions' => 
        array (
          'type' => 'jsonObject',
          'disabled' => true,
        ),
        'customUrl' => 
        array (
          'type' => 'url',
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'users' => 
        array (
          'type' => 'hasMany',
          'entity' => 'User',
          'foreign' => 'portals',
        ),
        'portalRoles' => 
        array (
          'type' => 'hasMany',
          'entity' => 'PortalRole',
          'foreign' => 'portals',
        ),
        'notes' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Note',
          'foreign' => 'portals',
        ),
        'articles' => 
        array (
          'type' => 'hasMany',
          'entity' => 'KnowledgeBaseArticle',
          'foreign' => 'portals',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'name',
        'order' => 'asc',
        'sortBy' => 'name',
        'asc' => true,
      ),
    ),
    'PortalRole' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'maxLength' => 150,
          'required' => true,
          'type' => 'varchar',
          'trim' => true,
        ),
        'data' => 
        array (
          'type' => 'jsonObject',
        ),
        'fieldData' => 
        array (
          'type' => 'jsonObject',
        ),
        'exportPermission' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'not-set',
            1 => 'yes',
            2 => 'no',
          ),
          'default' => 'not-set',
          'tooltip' => true,
          'translation' => 'Role.options.levelList',
        ),
        'massUpdatePermission' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'not-set',
            1 => 'yes',
            2 => 'no',
          ),
          'default' => 'not-set',
          'tooltip' => true,
          'translation' => 'Role.options.levelList',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'users' => 
        array (
          'type' => 'hasMany',
          'entity' => 'User',
          'foreign' => 'portalRoles',
        ),
        'portals' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Portal',
          'foreign' => 'portalRoles',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'name',
        'order' => 'asc',
        'sortBy' => 'name',
        'asc' => true,
      ),
    ),
    'Preferences' => 
    array (
      'fields' => 
      array (
        'timeZone' => 
        array (
          'type' => 'enum',
          'detault' => '',
          'view' => 'views/preferences/fields/time-zone',
        ),
        'dateFormat' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'MM/DD/YYYY',
            1 => 'YYYY-MM-DD',
            2 => 'DD.MM.YYYY',
            3 => 'DD/MM/YYYY',
          ),
          'default' => '',
          'view' => 'views/preferences/fields/date-format',
        ),
        'timeFormat' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'HH:mm',
            1 => 'hh:mma',
            2 => 'hh:mmA',
            3 => 'hh:mm A',
            4 => 'hh:mm a',
          ),
          'default' => '',
          'view' => 'views/preferences/fields/time-format',
        ),
        'weekStart' => 
        array (
          'type' => 'enumInt',
          'options' => 
          array (
            0 => 0,
            1 => 1,
          ),
          'default' => -1,
          'view' => 'views/preferences/fields/week-start',
        ),
        'defaultCurrency' => 
        array (
          'type' => 'enum',
          'default' => '',
          'view' => 'views/preferences/fields/default-currency',
        ),
        'thousandSeparator' => 
        array (
          'type' => 'varchar',
          'default' => ',',
          'maxLength' => 1,
          'view' => 'views/settings/fields/thousand-separator',
        ),
        'decimalMark' => 
        array (
          'type' => 'varchar',
          'default' => '.',
          'required' => true,
          'maxLength' => 1,
        ),
        'dashboardLayout' => 
        array (
          'type' => 'jsonArray',
          'view' => 'views/settings/fields/dashboard-layout',
        ),
        'dashletsOptions' => 
        array (
          'type' => 'jsonObject',
        ),
        'sharedCalendarUserList' => 
        array (
          'type' => 'jsonArray',
        ),
        'calendarViewDataList' => 
        array (
          'type' => 'jsonArray',
        ),
        'presetFilters' => 
        array (
          'type' => 'jsonObject',
        ),
        'smtpEmailAddress' => 
        array (
          'type' => 'varchar',
          'readOnly' => true,
          'notStorable' => true,
          'view' => 'views/preferences/fields/smtp-email-address',
          'trim' => true,
        ),
        'smtpServer' => 
        array (
          'type' => 'varchar',
          'trim' => true,
        ),
        'smtpPort' => 
        array (
          'type' => 'int',
          'min' => 0,
          'max' => 9999,
          'default' => 25,
        ),
        'smtpAuth' => 
        array (
          'type' => 'bool',
          'default' => false,
        ),
        'smtpSecurity' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'SSL',
            2 => 'TLS',
          ),
        ),
        'smtpUsername' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'smtpPassword' => 
        array (
          'type' => 'password',
        ),
        'language' => 
        array (
          'type' => 'enum',
          'default' => '',
          'view' => 'views/preferences/fields/language',
        ),
        'exportDelimiter' => 
        array (
          'type' => 'varchar',
          'default' => ',',
          'required' => true,
          'maxLength' => 1,
        ),
        'receiveAssignmentEmailNotifications' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'receiveMentionEmailNotifications' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'receiveStreamEmailNotifications' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'assignmentNotificationsIgnoreEntityTypeList' => 
        array (
          'type' => 'checklist',
          'translation' => 'Global.scopeNamesPlural',
          'view' => 'views/preferences/fields/assignment-notifications-ignore-entity-type-list',
        ),
        'assignmentEmailNotificationsIgnoreEntityTypeList' => 
        array (
          'type' => 'checklist',
          'translation' => 'Global.scopeNamesPlural',
          'view' => 'views/preferences/fields/assignment-email-notifications-ignore-entity-type-list',
        ),
        'autoFollowEntityTypeList' => 
        array (
          'type' => 'multiEnum',
          'view' => 'views/preferences/fields/auto-follow-entity-type-list',
          'translation' => 'Global.scopeNamesPlural',
          'notStorable' => true,
          'tooltip' => true,
        ),
        'signature' => 
        array (
          'type' => 'wysiwyg',
          'view' => 'views/preferences/fields/signature',
        ),
        'defaultReminders' => 
        array (
          'type' => 'jsonArray',
          'view' => 'crm:views/meeting/fields/reminders',
        ),
        'theme' => 
        array (
          'type' => 'enum',
          'view' => 'views/preferences/fields/theme',
          'translation' => 'Global.themes',
        ),
        'useCustomTabList' => 
        array (
          'type' => 'bool',
          'default' => false,
        ),
        'tabList' => 
        array (
          'type' => 'array',
          'view' => 'views/preferences/fields/tab-list',
        ),
        'emailReplyToAllByDefault' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'emailReplyForceHtml' => 
        array (
          'type' => 'bool',
          'default' => false,
        ),
        'isPortalUser' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
        ),
        'doNotFillAssignedUserIfNotRequired' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'followEntityOnStreamPost' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'followCreatedEntities' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'followCreatedEntityTypeList' => 
        array (
          'type' => 'multiEnum',
          'view' => 'views/preferences/fields/auto-follow-entity-type-list',
          'translation' => 'Global.scopeNamesPlural',
          'tooltip' => true,
        ),
        'emailUseExternalClient' => 
        array (
          'type' => 'bool',
        ),
        'scopeColorsDisabled' => 
        array (
          'type' => 'bool',
        ),
        'tabColorsDisabled' => 
        array (
          'type' => 'bool',
        ),
      ),
    ),
    'Role' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'maxLength' => 150,
          'required' => true,
          'type' => 'varchar',
          'trim' => true,
        ),
        'assignmentPermission' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'not-set',
            1 => 'all',
            2 => 'team',
            3 => 'no',
          ),
          'default' => 'not-set',
          'tooltip' => true,
          'translation' => 'Role.options.levelList',
        ),
        'userPermission' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'not-set',
            1 => 'all',
            2 => 'team',
            3 => 'no',
          ),
          'default' => 'not-set',
          'tooltip' => true,
          'translation' => 'Role.options.levelList',
        ),
        'portalPermission' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'not-set',
            1 => 'yes',
            2 => 'no',
          ),
          'default' => 'not-set',
          'tooltip' => true,
          'translation' => 'Role.options.levelList',
        ),
        'exportPermission' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'not-set',
            1 => 'yes',
            2 => 'no',
          ),
          'default' => 'not-set',
          'tooltip' => true,
          'translation' => 'Role.options.levelList',
        ),
        'massUpdatePermission' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'not-set',
            1 => 'yes',
            2 => 'no',
          ),
          'default' => 'not-set',
          'tooltip' => true,
          'translation' => 'Role.options.levelList',
        ),
        'dataPrivacyPermission' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'not-set',
            1 => 'yes',
            2 => 'no',
          ),
          'default' => 'not-set',
          'tooltip' => true,
          'translation' => 'Role.options.levelList',
        ),
        'data' => 
        array (
          'type' => 'jsonObject',
        ),
        'fieldData' => 
        array (
          'type' => 'jsonObject',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'users' => 
        array (
          'type' => 'hasMany',
          'entity' => 'User',
          'foreign' => 'roles',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'foreign' => 'roles',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'name',
        'order' => 'asc',
        'sortBy' => 'name',
        'asc' => true,
      ),
    ),
    'ScheduledJob' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'job' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'view' => 'views/scheduled-job/fields/job',
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Active',
            1 => 'Inactive',
          ),
          'default' => 'Active',
        ),
        'scheduling' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'view' => 'views/scheduled-job/fields/scheduling',
          'tooltip' => true,
          'trim' => true,
        ),
        'lastRun' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'isInternal' => 
        array (
          'type' => 'bool',
          'readOnly' => true,
          'disabled' => true,
          'default' => false,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'log' => 
        array (
          'type' => 'hasMany',
          'entity' => 'ScheduledJobLogRecord',
          'foreign' => 'scheduledJob',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'name',
        'order' => 'asc',
        'sortBy' => 'name',
        'asc' => true,
      ),
      'jobSchedulingMap' => 
      array (
        'CheckInboundEmails' => '*/2 * * * *',
        'CheckEmailAccounts' => '*/1 * * * *',
        'SendEmailReminders' => '*/2 * * * *',
        'Cleanup' => '1 1 * * 0',
        'AuthTokenControl' => '*/6 * * * *',
        'SendEmailNotifications' => '*/2 * * * *',
        'ProcessWebhookQueue' => '*/5 * * * *',
        'ProcessMassEmail' => '15 * * * *',
        'ControlKnowledgeBaseArticleStatus' => '10 1 * * *',
      ),
      'jobs' => 
      array (
        'Dummy' => 
        array (
          'isSystem' => true,
          'scheduling' => '1 */12 * * *',
        ),
        'CheckNewVersion' => 
        array (
          'name' => 'Check for New Version',
          'isSystem' => true,
          'scheduling' => '15 5 * * *',
        ),
        'CheckNewExtensionVersion' => 
        array (
          'name' => 'Check for New Versions of Installed Extensions',
          'isSystem' => true,
          'scheduling' => '25 5 * * *',
        ),
        'ProcessJobQueueQ0' => 
        array (
          'name' => 'Process Job Queue q0',
          'isSystem' => true,
          'scheduling' => '* * * * *',
        ),
        'ProcessJobQueueQ1' => 
        array (
          'name' => 'Process Job Queue q1',
          'isSystem' => true,
          'scheduling' => '*/1 * * * *',
        ),
        'ProcessJobQueueE0' => 
        array (
          'name' => 'Process Job Queue e0',
          'isSystem' => true,
          'scheduling' => '* * * * *',
        ),
        'SubmitPopupReminders' => 
        array (
          'name' => 'Submit Popup Reminders',
          'isSystem' => true,
          'scheduling' => '* * * * *',
        ),
      ),
    ),
    'ScheduledJobLogRecord' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'readOnly' => true,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'readOnly' => true,
          'options' => 
          array (
            0 => 'Success',
            1 => 'Failed',
          ),
          'style' => 
          array (
            'Success' => 'success',
            'Failed' => 'danger',
          ),
        ),
        'executionTime' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
          'hasSeconds' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'scheduledJob' => 
        array (
          'type' => 'link',
        ),
        'target' => 
        array (
          'type' => 'linkParent',
        ),
      ),
      'links' => 
      array (
        'scheduledJob' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'ScheduledJob',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'executionTime',
        'order' => 'desc',
        'sortBy' => 'executionTime',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'scheduledJobIdExecutionTime' => 
        array (
          'type' => 'index',
          'columns' => 
          array (
            0 => 'scheduledJobId',
            1 => 'executionTime',
          ),
        ),
      ),
    ),
    'Settings' => 
    array (
      'fields' => 
      array (
        'useCache' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'recordsPerPage' => 
        array (
          'type' => 'int',
          'min' => 1,
          'max' => 200,
          'default' => 20,
          'required' => true,
          'tooltip' => true,
        ),
        'recordsPerPageSmall' => 
        array (
          'type' => 'int',
          'min' => 1,
          'max' => 100,
          'default' => 10,
          'required' => true,
          'tooltip' => true,
        ),
        'timeZone' => 
        array (
          'type' => 'enum',
          'default' => 'UTC',
          'options' => 
          array (
            0 => 'UTC',
            1 => 'Africa/Abidjan',
            2 => 'Africa/Accra',
            3 => 'Africa/Addis_Ababa',
            4 => 'Africa/Algiers',
            5 => 'Africa/Asmara',
            6 => 'Africa/Bamako',
            7 => 'Africa/Bangui',
            8 => 'Africa/Banjul',
            9 => 'Africa/Bissau',
            10 => 'Africa/Blantyre',
            11 => 'Africa/Brazzaville',
            12 => 'Africa/Bujumbura',
            13 => 'Africa/Cairo',
            14 => 'Africa/Casablanca',
            15 => 'Africa/Ceuta',
            16 => 'Africa/Conakry',
            17 => 'Africa/Dakar',
            18 => 'Africa/Dar_es_Salaam',
            19 => 'Africa/Djibouti',
            20 => 'Africa/Douala',
            21 => 'Africa/El_Aaiun',
            22 => 'Africa/Freetown',
            23 => 'Africa/Gaborone',
            24 => 'Africa/Harare',
            25 => 'Africa/Johannesburg',
            26 => 'Africa/Juba',
            27 => 'Africa/Kampala',
            28 => 'Africa/Khartoum',
            29 => 'Africa/Kigali',
            30 => 'Africa/Kinshasa',
            31 => 'Africa/Lagos',
            32 => 'Africa/Libreville',
            33 => 'Africa/Lome',
            34 => 'Africa/Luanda',
            35 => 'Africa/Lubumbashi',
            36 => 'Africa/Lusaka',
            37 => 'Africa/Malabo',
            38 => 'Africa/Maputo',
            39 => 'Africa/Maseru',
            40 => 'Africa/Mbabane',
            41 => 'Africa/Mogadishu',
            42 => 'Africa/Monrovia',
            43 => 'Africa/Nairobi',
            44 => 'Africa/Ndjamena',
            45 => 'Africa/Niamey',
            46 => 'Africa/Nouakchott',
            47 => 'Africa/Ouagadougou',
            48 => 'Africa/Porto-Novo',
            49 => 'Africa/Sao_Tome',
            50 => 'Africa/Tripoli',
            51 => 'Africa/Tunis',
            52 => 'Africa/Windhoek',
            53 => 'America/Adak',
            54 => 'America/Anchorage',
            55 => 'America/Anguilla',
            56 => 'America/Antigua',
            57 => 'America/Araguaina',
            58 => 'America/Argentina/Buenos_Aires',
            59 => 'America/Argentina/Catamarca',
            60 => 'America/Argentina/Cordoba',
            61 => 'America/Argentina/Jujuy',
            62 => 'America/Argentina/La_Rioja',
            63 => 'America/Argentina/Mendoza',
            64 => 'America/Argentina/Rio_Gallegos',
            65 => 'America/Argentina/Salta',
            66 => 'America/Argentina/San_Juan',
            67 => 'America/Argentina/San_Luis',
            68 => 'America/Argentina/Tucuman',
            69 => 'America/Argentina/Ushuaia',
            70 => 'America/Aruba',
            71 => 'America/Asuncion',
            72 => 'America/Atikokan',
            73 => 'America/Bahia',
            74 => 'America/Bahia_Banderas',
            75 => 'America/Barbados',
            76 => 'America/Belem',
            77 => 'America/Belize',
            78 => 'America/Blanc-Sablon',
            79 => 'America/Boa_Vista',
            80 => 'America/Bogota',
            81 => 'America/Boise',
            82 => 'America/Cambridge_Bay',
            83 => 'America/Campo_Grande',
            84 => 'America/Cancun',
            85 => 'America/Caracas',
            86 => 'America/Cayenne',
            87 => 'America/Cayman',
            88 => 'America/Chicago',
            89 => 'America/Chihuahua',
            90 => 'America/Costa_Rica',
            91 => 'America/Creston',
            92 => 'America/Cuiaba',
            93 => 'America/Curacao',
            94 => 'America/Danmarkshavn',
            95 => 'America/Dawson',
            96 => 'America/Dawson_Creek',
            97 => 'America/Denver',
            98 => 'America/Detroit',
            99 => 'America/Dominica',
            100 => 'America/Edmonton',
            101 => 'America/Eirunepe',
            102 => 'America/El_Salvador',
            103 => 'America/Fortaleza',
            104 => 'America/Glace_Bay',
            105 => 'America/Godthab',
            106 => 'America/Goose_Bay',
            107 => 'America/Grand_Turk',
            108 => 'America/Grenada',
            109 => 'America/Guadeloupe',
            110 => 'America/Guatemala',
            111 => 'America/Guayaquil',
            112 => 'America/Guyana',
            113 => 'America/Halifax',
            114 => 'America/Havana',
            115 => 'America/Hermosillo',
            116 => 'America/Indiana/Indianapolis',
            117 => 'America/Indiana/Knox',
            118 => 'America/Indiana/Marengo',
            119 => 'America/Indiana/Petersburg',
            120 => 'America/Indiana/Tell_City',
            121 => 'America/Indiana/Vevay',
            122 => 'America/Indiana/Vincennes',
            123 => 'America/Indiana/Winamac',
            124 => 'America/Inuvik',
            125 => 'America/Iqaluit',
            126 => 'America/Jamaica',
            127 => 'America/Juneau',
            128 => 'America/Kentucky/Louisville',
            129 => 'America/Kentucky/Monticello',
            130 => 'America/Kralendijk',
            131 => 'America/La_Paz',
            132 => 'America/Lima',
            133 => 'America/Los_Angeles',
            134 => 'America/Lower_Princes',
            135 => 'America/Maceio',
            136 => 'America/Managua',
            137 => 'America/Manaus',
            138 => 'America/Marigot',
            139 => 'America/Martinique',
            140 => 'America/Matamoros',
            141 => 'America/Mazatlan',
            142 => 'America/Menominee',
            143 => 'America/Merida',
            144 => 'America/Metlakatla',
            145 => 'America/Mexico_City',
            146 => 'America/Miquelon',
            147 => 'America/Moncton',
            148 => 'America/Monterrey',
            149 => 'America/Montevideo',
            150 => 'America/Montserrat',
            151 => 'America/Nassau',
            152 => 'America/New_York',
            153 => 'America/Nipigon',
            154 => 'America/Nome',
            155 => 'America/Noronha',
            156 => 'America/North_Dakota/Beulah',
            157 => 'America/North_Dakota/Center',
            158 => 'America/North_Dakota/New_Salem',
            159 => 'America/Ojinaga',
            160 => 'America/Panama',
            161 => 'America/Pangnirtung',
            162 => 'America/Paramaribo',
            163 => 'America/Phoenix',
            164 => 'America/Port-au-Prince',
            165 => 'America/Port_of_Spain',
            166 => 'America/Porto_Velho',
            167 => 'America/Puerto_Rico',
            168 => 'America/Rainy_River',
            169 => 'America/Rankin_Inlet',
            170 => 'America/Recife',
            171 => 'America/Regina',
            172 => 'America/Resolute',
            173 => 'America/Rio_Branco',
            174 => 'America/Santa_Isabel',
            175 => 'America/Santarem',
            176 => 'America/Santiago',
            177 => 'America/Santo_Domingo',
            178 => 'America/Sao_Paulo',
            179 => 'America/Scoresbysund',
            180 => 'America/Sitka',
            181 => 'America/St_Barthelemy',
            182 => 'America/St_Johns',
            183 => 'America/St_Kitts',
            184 => 'America/St_Lucia',
            185 => 'America/St_Thomas',
            186 => 'America/St_Vincent',
            187 => 'America/Swift_Current',
            188 => 'America/Tegucigalpa',
            189 => 'America/Thule',
            190 => 'America/Thunder_Bay',
            191 => 'America/Tijuana',
            192 => 'America/Toronto',
            193 => 'America/Tortola',
            194 => 'America/Vancouver',
            195 => 'America/Whitehorse',
            196 => 'America/Winnipeg',
            197 => 'America/Yakutat',
            198 => 'America/Yellowknife',
            199 => 'Antarctica/Casey',
            200 => 'Antarctica/Davis',
            201 => 'Antarctica/DumontDUrville',
            202 => 'Antarctica/Macquarie',
            203 => 'Antarctica/Mawson',
            204 => 'Antarctica/McMurdo',
            205 => 'Antarctica/Palmer',
            206 => 'Antarctica/Rothera',
            207 => 'Antarctica/Syowa',
            208 => 'Antarctica/Vostok',
            209 => 'Arctic/Longyearbyen',
            210 => 'Asia/Aden',
            211 => 'Asia/Almaty',
            212 => 'Asia/Amman',
            213 => 'Asia/Anadyr',
            214 => 'Asia/Aqtau',
            215 => 'Asia/Aqtobe',
            216 => 'Asia/Ashgabat',
            217 => 'Asia/Baghdad',
            218 => 'Asia/Bahrain',
            219 => 'Asia/Baku',
            220 => 'Asia/Bangkok',
            221 => 'Asia/Beirut',
            222 => 'Asia/Bishkek',
            223 => 'Asia/Brunei',
            224 => 'Asia/Choibalsan',
            225 => 'Asia/Chongqing',
            226 => 'Asia/Colombo',
            227 => 'Asia/Damascus',
            228 => 'Asia/Dhaka',
            229 => 'Asia/Dili',
            230 => 'Asia/Dubai',
            231 => 'Asia/Dushanbe',
            232 => 'Asia/Gaza',
            233 => 'Asia/Harbin',
            234 => 'Asia/Hebron',
            235 => 'Asia/Ho_Chi_Minh',
            236 => 'Asia/Hong_Kong',
            237 => 'Asia/Hovd',
            238 => 'Asia/Irkutsk',
            239 => 'Asia/Jakarta',
            240 => 'Asia/Jayapura',
            241 => 'Asia/Jerusalem',
            242 => 'Asia/Kabul',
            243 => 'Asia/Kamchatka',
            244 => 'Asia/Karachi',
            245 => 'Asia/Kashgar',
            246 => 'Asia/Kathmandu',
            247 => 'Asia/Khandyga',
            248 => 'Asia/Kolkata',
            249 => 'Asia/Krasnoyarsk',
            250 => 'Asia/Kuala_Lumpur',
            251 => 'Asia/Kuching',
            252 => 'Asia/Kuwait',
            253 => 'Asia/Macau',
            254 => 'Asia/Magadan',
            255 => 'Asia/Makassar',
            256 => 'Asia/Manila',
            257 => 'Asia/Muscat',
            258 => 'Asia/Nicosia',
            259 => 'Asia/Novokuznetsk',
            260 => 'Asia/Novosibirsk',
            261 => 'Asia/Omsk',
            262 => 'Asia/Oral',
            263 => 'Asia/Phnom_Penh',
            264 => 'Asia/Pontianak',
            265 => 'Asia/Pyongyang',
            266 => 'Asia/Qatar',
            267 => 'Asia/Qyzylorda',
            268 => 'Asia/Rangoon',
            269 => 'Asia/Riyadh',
            270 => 'Asia/Sakhalin',
            271 => 'Asia/Samarkand',
            272 => 'Asia/Seoul',
            273 => 'Asia/Shanghai',
            274 => 'Asia/Singapore',
            275 => 'Asia/Taipei',
            276 => 'Asia/Tashkent',
            277 => 'Asia/Tbilisi',
            278 => 'Asia/Tehran',
            279 => 'Asia/Thimphu',
            280 => 'Asia/Tokyo',
            281 => 'Asia/Ulaanbaatar',
            282 => 'Asia/Urumqi',
            283 => 'Asia/Ust-Nera',
            284 => 'Asia/Vientiane',
            285 => 'Asia/Vladivostok',
            286 => 'Asia/Yakutsk',
            287 => 'Asia/Yekaterinburg',
            288 => 'Asia/Yerevan',
            289 => 'Atlantic/Azores',
            290 => 'Atlantic/Bermuda',
            291 => 'Atlantic/Canary',
            292 => 'Atlantic/Cape_Verde',
            293 => 'Atlantic/Faroe',
            294 => 'Atlantic/Madeira',
            295 => 'Atlantic/Reykjavik',
            296 => 'Atlantic/South_Georgia',
            297 => 'Atlantic/St_Helena',
            298 => 'Atlantic/Stanley',
            299 => 'Australia/Adelaide',
            300 => 'Australia/Brisbane',
            301 => 'Australia/Broken_Hill',
            302 => 'Australia/Currie',
            303 => 'Australia/Darwin',
            304 => 'Australia/Eucla',
            305 => 'Australia/Hobart',
            306 => 'Australia/Lindeman',
            307 => 'Australia/Lord_Howe',
            308 => 'Australia/Melbourne',
            309 => 'Australia/Perth',
            310 => 'Australia/Sydney',
            311 => 'Europe/Amsterdam',
            312 => 'Europe/Andorra',
            313 => 'Europe/Athens',
            314 => 'Europe/Belgrade',
            315 => 'Europe/Berlin',
            316 => 'Europe/Bratislava',
            317 => 'Europe/Brussels',
            318 => 'Europe/Bucharest',
            319 => 'Europe/Budapest',
            320 => 'Europe/Busingen',
            321 => 'Europe/Chisinau',
            322 => 'Europe/Copenhagen',
            323 => 'Europe/Dublin',
            324 => 'Europe/Gibraltar',
            325 => 'Europe/Guernsey',
            326 => 'Europe/Helsinki',
            327 => 'Europe/Isle_of_Man',
            328 => 'Europe/Istanbul',
            329 => 'Europe/Jersey',
            330 => 'Europe/Kaliningrad',
            331 => 'Europe/Kiev',
            332 => 'Europe/Lisbon',
            333 => 'Europe/Ljubljana',
            334 => 'Europe/London',
            335 => 'Europe/Luxembourg',
            336 => 'Europe/Madrid',
            337 => 'Europe/Malta',
            338 => 'Europe/Mariehamn',
            339 => 'Europe/Minsk',
            340 => 'Europe/Monaco',
            341 => 'Europe/Moscow',
            342 => 'Europe/Oslo',
            343 => 'Europe/Paris',
            344 => 'Europe/Podgorica',
            345 => 'Europe/Prague',
            346 => 'Europe/Riga',
            347 => 'Europe/Rome',
            348 => 'Europe/Samara',
            349 => 'Europe/San_Marino',
            350 => 'Europe/Sarajevo',
            351 => 'Europe/Simferopol',
            352 => 'Europe/Skopje',
            353 => 'Europe/Sofia',
            354 => 'Europe/Stockholm',
            355 => 'Europe/Tallinn',
            356 => 'Europe/Tirane',
            357 => 'Europe/Uzhgorod',
            358 => 'Europe/Vaduz',
            359 => 'Europe/Vatican',
            360 => 'Europe/Vienna',
            361 => 'Europe/Vilnius',
            362 => 'Europe/Volgograd',
            363 => 'Europe/Warsaw',
            364 => 'Europe/Zagreb',
            365 => 'Europe/Zaporozhye',
            366 => 'Europe/Zurich',
            367 => 'Indian/Antananarivo',
            368 => 'Indian/Chagos',
            369 => 'Indian/Christmas',
            370 => 'Indian/Cocos',
            371 => 'Indian/Comoro',
            372 => 'Indian/Kerguelen',
            373 => 'Indian/Mahe',
            374 => 'Indian/Maldives',
            375 => 'Indian/Mauritius',
            376 => 'Indian/Mayotte',
            377 => 'Indian/Reunion',
            378 => 'Pacific/Apia',
            379 => 'Pacific/Auckland',
            380 => 'Pacific/Chatham',
            381 => 'Pacific/Chuuk',
            382 => 'Pacific/Easter',
            383 => 'Pacific/Efate',
            384 => 'Pacific/Enderbury',
            385 => 'Pacific/Fakaofo',
            386 => 'Pacific/Fiji',
            387 => 'Pacific/Funafuti',
            388 => 'Pacific/Galapagos',
            389 => 'Pacific/Gambier',
            390 => 'Pacific/Guadalcanal',
            391 => 'Pacific/Guam',
            392 => 'Pacific/Honolulu',
            393 => 'Pacific/Johnston',
            394 => 'Pacific/Kiritimati',
            395 => 'Pacific/Kosrae',
            396 => 'Pacific/Kwajalein',
            397 => 'Pacific/Majuro',
            398 => 'Pacific/Marquesas',
            399 => 'Pacific/Midway',
            400 => 'Pacific/Nauru',
            401 => 'Pacific/Niue',
            402 => 'Pacific/Norfolk',
            403 => 'Pacific/Noumea',
            404 => 'Pacific/Pago_Pago',
            405 => 'Pacific/Palau',
            406 => 'Pacific/Pitcairn',
            407 => 'Pacific/Pohnpei',
            408 => 'Pacific/Port_Moresby',
            409 => 'Pacific/Rarotonga',
            410 => 'Pacific/Saipan',
            411 => 'Pacific/Tahiti',
            412 => 'Pacific/Tarawa',
            413 => 'Pacific/Tongatapu',
            414 => 'Pacific/Wake',
            415 => 'Pacific/Wallis',
          ),
        ),
        'dateFormat' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'MM/DD/YYYY',
            1 => 'YYYY-MM-DD',
            2 => 'DD.MM.YYYY',
            3 => 'DD/MM/YYYY',
          ),
          'default' => 'MM/DD/YYYY',
        ),
        'timeFormat' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'HH:mm',
            1 => 'hh:mma',
            2 => 'hh:mmA',
            3 => 'hh:mm A',
            4 => 'hh:mm a',
          ),
          'default' => 'HH:mm',
        ),
        'weekStart' => 
        array (
          'type' => 'enumInt',
          'options' => 
          array (
            0 => 0,
            1 => 1,
          ),
          'default' => 0,
        ),
        'fiscalYearShift' => 
        array (
          'type' => 'enumInt',
          'default' => 0,
          'view' => 'views/settings/fields/fiscal-year-shift',
        ),
        'thousandSeparator' => 
        array (
          'type' => 'varchar',
          'default' => ',',
          'maxLength' => 1,
          'view' => 'views/settings/fields/thousand-separator',
        ),
        'decimalMark' => 
        array (
          'type' => 'varchar',
          'default' => '.',
          'required' => true,
          'maxLength' => 1,
        ),
        'currencyList' => 
        array (
          'type' => 'multiEnum',
          'default' => 
          array (
            0 => 'USD',
            1 => 'EUR',
          ),
          'options' => 
          array (
            0 => 'AED',
            1 => 'ANG',
            2 => 'ARS',
            3 => 'AUD',
            4 => 'BAM',
            5 => 'BGN',
            6 => 'BHD',
            7 => 'BND',
            8 => 'BOB',
            9 => 'BRL',
            10 => 'BWP',
            11 => 'CAD',
            12 => 'CHF',
            13 => 'CLP',
            14 => 'CNY',
            15 => 'COP',
            16 => 'CRC',
            17 => 'CZK',
            18 => 'DKK',
            19 => 'DOP',
            20 => 'DZD',
            21 => 'EEK',
            22 => 'EGP',
            23 => 'EUR',
            24 => 'FJD',
            25 => 'GBP',
            26 => 'GNF',
            27 => 'HKD',
            28 => 'HNL',
            29 => 'HRK',
            30 => 'HUF',
            31 => 'IDR',
            32 => 'ILS',
            33 => 'INR',
            34 => 'IRR',
            35 => 'JMD',
            36 => 'JOD',
            37 => 'JPY',
            38 => 'KES',
            39 => 'KRW',
            40 => 'KWD',
            41 => 'KYD',
            42 => 'KZT',
            43 => 'LBP',
            44 => 'LKR',
            45 => 'LTL',
            46 => 'LVL',
            47 => 'MAD',
            48 => 'MDL',
            49 => 'MKD',
            50 => 'MMK',
            51 => 'MUR',
            52 => 'MXN',
            53 => 'MYR',
            54 => 'NAD',
            55 => 'NGN',
            56 => 'NIO',
            57 => 'NOK',
            58 => 'NPR',
            59 => 'NZD',
            60 => 'OMR',
            61 => 'PEN',
            62 => 'PGK',
            63 => 'PHP',
            64 => 'PKR',
            65 => 'PLN',
            66 => 'PYG',
            67 => 'QAR',
            68 => 'RON',
            69 => 'RSD',
            70 => 'RUB',
            71 => 'SAR',
            72 => 'SCR',
            73 => 'SEK',
            74 => 'SGD',
            75 => 'SKK',
            76 => 'SLL',
            77 => 'SVC',
            78 => 'THB',
            79 => 'TND',
            80 => 'TRY',
            81 => 'TTD',
            82 => 'TWD',
            83 => 'TZS',
            84 => 'UAH',
            85 => 'UGX',
            86 => 'USD',
            87 => 'UYU',
            88 => 'UZS',
            89 => 'VND',
            90 => 'YER',
            91 => 'ZAR',
            92 => 'ZMK',
          ),
          'required' => true,
        ),
        'defaultCurrency' => 
        array (
          'type' => 'enum',
          'default' => 'USD',
          'required' => true,
          'view' => 'views/settings/fields/default-currency',
        ),
        'baseCurrency' => 
        array (
          'type' => 'enum',
          'default' => 'USD',
          'required' => true,
          'view' => 'views/settings/fields/default-currency',
        ),
        'currencyRates' => 
        array (
          'type' => 'base',
          'view' => 'views/settings/fields/currency-rates',
        ),
        'outboundEmailIsShared' => 
        array (
          'type' => 'bool',
          'default' => false,
          'tooltip' => true,
        ),
        'outboundEmailFromName' => 
        array (
          'type' => 'varchar',
          'default' => 'FinnovaCRM',
          'trim' => true,
        ),
        'outboundEmailFromAddress' => 
        array (
          'type' => 'varchar',
          'default' => 'crm@example.com',
          'trim' => true,
        ),
        'smtpServer' => 
        array (
          'type' => 'varchar',
        ),
        'smtpPort' => 
        array (
          'type' => 'int',
          'min' => 0,
          'max' => 9999,
          'required' => true,
          'default' => 587,
        ),
        'smtpAuth' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'smtpSecurity' => 
        array (
          'type' => 'enum',
          'default' => 'TLS',
          'options' => 
          array (
            0 => '',
            1 => 'SSL',
            2 => 'TLS',
          ),
        ),
        'smtpUsername' => 
        array (
          'type' => 'varchar',
          'required' => true,
        ),
        'smtpPassword' => 
        array (
          'type' => 'password',
        ),
        'tabList' => 
        array (
          'type' => 'array',
          'view' => 'views/settings/fields/tab-list',
        ),
        'quickCreateList' => 
        array (
          'type' => 'array',
          'translation' => 'Global.scopeNames',
          'view' => 'views/settings/fields/quick-create-list',
        ),
        'language' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'en_US',
          ),
          'default' => 'en_US',
          'view' => 'views/settings/fields/language',
          'isSorted' => true,
        ),
        'globalSearchEntityList' => 
        array (
          'type' => 'multiEnum',
          'translation' => 'Global.scopeNames',
          'view' => 'views/settings/fields/global-search-entity-list',
        ),
        'exportDelimiter' => 
        array (
          'type' => 'varchar',
          'default' => ',',
          'required' => true,
          'maxLength' => 1,
        ),
        'companyLogo' => 
        array (
          'type' => 'image',
        ),
        'authenticationMethod' => 
        array (
          'type' => 'enum',
          'default' => 'Finnova',
          'view' => 'views/settings/fields/authentication-method',
        ),
        'auth2FA' => 
        array (
          'type' => 'bool',
        ),
        'auth2FAMethodList' => 
        array (
          'type' => 'multiEnum',
          'view' => 'views/settings/fields/auth-two-fa-method-list',
        ),
        'passwordRecoveryDisabled' => 
        array (
          'type' => 'bool',
        ),
        'passwordRecoveryForAdminDisabled' => 
        array (
          'type' => 'bool',
        ),
        'passwordGenerateLength' => 
        array (
          'type' => 'int',
          'min' => 6,
          'max' => 150,
          'required' => true,
        ),
        'passwordStrengthLength' => 
        array (
          'type' => 'int',
          'max' => 150,
          'min' => 1,
        ),
        'passwordStrengthLetterCount' => 
        array (
          'type' => 'int',
          'max' => 150,
          'min' => 0,
        ),
        'passwordStrengthNumberCount' => 
        array (
          'type' => 'int',
          'max' => 150,
          'min' => 0,
        ),
        'passwordStrengthBothCases' => 
        array (
          'type' => 'bool',
        ),
        'ldapHost' => 
        array (
          'type' => 'varchar',
          'required' => true,
        ),
        'ldapPort' => 
        array (
          'type' => 'varchar',
          'default' => 389,
        ),
        'ldapSecurity' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'SSL',
            2 => 'TLS',
          ),
        ),
        'ldapAuth' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'ldapUsername' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'tooltip' => true,
        ),
        'ldapPassword' => 
        array (
          'type' => 'password',
          'tooltip' => true,
        ),
        'ldapBindRequiresDn' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'ldapUserLoginFilter' => 
        array (
          'type' => 'varchar',
          'tooltip' => true,
        ),
        'ldapBaseDn' => 
        array (
          'type' => 'varchar',
          'tooltip' => true,
        ),
        'ldapAccountCanonicalForm' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Dn',
            1 => 'Username',
            2 => 'Backslash',
            3 => 'Principal',
          ),
          'tooltip' => true,
        ),
        'ldapAccountDomainName' => 
        array (
          'type' => 'varchar',
          'tooltip' => true,
        ),
        'ldapAccountDomainNameShort' => 
        array (
          'type' => 'varchar',
          'tooltip' => true,
        ),
        'ldapAccountFilterFormat' => 
        array (
          'type' => 'varchar',
        ),
        'ldapTryUsernameSplit' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'ldapOptReferrals' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'ldapPortalUserLdapAuth' => 
        array (
          'type' => 'bool',
          'default' => false,
          'tooltip' => true,
        ),
        'ldapCreateFinnovaUser' => 
        array (
          'type' => 'bool',
          'default' => true,
          'tooltip' => true,
        ),
        'ldapUserNameAttribute' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'tooltip' => true,
        ),
        'ldapUserObjectClass' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'tooltip' => true,
        ),
        'ldapUserFirstNameAttribute' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'tooltip' => true,
        ),
        'ldapUserLastNameAttribute' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'tooltip' => true,
        ),
        'ldapUserTitleAttribute' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'tooltip' => true,
        ),
        'ldapUserEmailAddressAttribute' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'tooltip' => true,
        ),
        'ldapUserPhoneNumberAttribute' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'tooltip' => true,
        ),
        'ldapUserDefaultTeam' => 
        array (
          'type' => 'link',
          'tooltip' => true,
          'entity' => 'Team',
        ),
        'ldapUserTeams' => 
        array (
          'type' => 'linkMultiple',
          'tooltip' => true,
          'entity' => 'Team',
        ),
        'ldapPortalUserPortals' => 
        array (
          'type' => 'linkMultiple',
          'tooltip' => true,
          'entity' => 'Portal',
        ),
        'ldapPortalUserRoles' => 
        array (
          'type' => 'linkMultiple',
          'tooltip' => true,
          'entity' => 'PortalRole',
        ),
        'exportDisabled' => 
        array (
          'type' => 'bool',
          'default' => false,
        ),
        'emailNotificationsDelay' => 
        array (
          'type' => 'int',
          'min' => 0,
          'max' => 18000,
        ),
        'assignmentEmailNotifications' => 
        array (
          'type' => 'bool',
          'default' => false,
        ),
        'assignmentEmailNotificationsEntityList' => 
        array (
          'type' => 'multiEnum',
          'translation' => 'Global.scopeNamesPlural',
          'view' => 'views/settings/fields/assignment-email-notifications-entity-list',
        ),
        'assignmentNotificationsEntityList' => 
        array (
          'type' => 'multiEnum',
          'translation' => 'Global.scopeNamesPlural',
          'view' => 'views/settings/fields/assignment-notifications-entity-list',
        ),
        'postEmailNotifications' => 
        array (
          'type' => 'bool',
          'default' => false,
        ),
        'updateEmailNotifications' => 
        array (
          'type' => 'bool',
          'default' => false,
        ),
        'mentionEmailNotifications' => 
        array (
          'type' => 'bool',
          'default' => false,
        ),
        'streamEmailNotifications' => 
        array (
          'type' => 'bool',
          'default' => false,
        ),
        'portalStreamEmailNotifications' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'streamEmailNotificationsEntityList' => 
        array (
          'type' => 'multiEnum',
          'translation' => 'Global.scopeNamesPlural',
          'view' => 'views/settings/fields/stream-email-notifications-entity-list',
          'tooltip' => true,
        ),
        'streamEmailNotificationsTypeList' => 
        array (
          'type' => 'multiEnum',
          'options' => 
          array (
            0 => 'Post',
            1 => 'Status',
            2 => 'EmailReceived',
          ),
        ),
        'b2cMode' => 
        array (
          'type' => 'bool',
          'default' => false,
          'tooltip' => true,
        ),
        'avatarsDisabled' => 
        array (
          'type' => 'bool',
          'default' => false,
        ),
        'followCreatedEntities' => 
        array (
          'type' => 'bool',
          'default' => false,
          'tooltip' => true,
        ),
        'adminPanelIframeUrl' => 
        array (
          'type' => 'varchar',
        ),
        'displayListViewRecordCount' => 
        array (
          'type' => 'bool',
        ),
        'userThemesDisabled' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'theme' => 
        array (
          'type' => 'enum',
          'view' => 'views/settings/fields/theme',
          'translation' => 'Global.themes',
        ),
        'emailMessageMaxSize' => 
        array (
          'type' => 'float',
          'min' => 0,
          'tooltip' => true,
        ),
        'inboundEmailMaxPortionSize' => 
        array (
          'type' => 'int',
          'min' => 1,
          'max' => 500,
        ),
        'personalEmailMaxPortionSize' => 
        array (
          'type' => 'int',
          'min' => 1,
          'max' => 500,
        ),
        'maxEmailAccountCount' => 
        array (
          'type' => 'int',
        ),
        'massEmailMaxPerHourCount' => 
        array (
          'type' => 'int',
          'min' => 1,
        ),
        'authTokenLifetime' => 
        array (
          'type' => 'float',
          'min' => 0,
          'default' => 0,
          'tooltip' => true,
        ),
        'authTokenMaxIdleTime' => 
        array (
          'type' => 'float',
          'min' => 0,
          'default' => 0,
          'tooltip' => true,
        ),
        'authTokenPreventConcurrent' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'dashboardLayout' => 
        array (
          'type' => 'jsonArray',
          'view' => 'views/settings/fields/dashboard-layout',
        ),
        'dashletsOptions' => 
        array (
          'type' => 'jsonObject',
          'disabled' => true,
        ),
        'siteUrl' => 
        array (
          'type' => 'varchar',
        ),
        'applicationName' => 
        array (
          'type' => 'varchar',
        ),
        'readableDateFormatDisabled' => 
        array (
          'type' => 'bool',
        ),
        'addressFormat' => 
        array (
          'type' => 'enumInt',
          'options' => 
          array (
            0 => 1,
            1 => 2,
            2 => 3,
            3 => 4,
          ),
        ),
        'addressPreview' => 
        array (
          'type' => 'address',
          'notStorable' => true,
          'readOnly' => true,
          'view' => 'views/settings/fields/address-preview',
        ),
        'currencyFormat' => 
        array (
          'type' => 'enumInt',
          'options' => 
          array (
            0 => 1,
            1 => 2,
          ),
        ),
        'currencyDecimalPlaces' => 
        array (
          'type' => 'int',
          'tooltip' => true,
          'min' => 0,
          'max' => 20,
        ),
        'notificationSoundsDisabled' => 
        array (
          'type' => 'bool',
        ),
        'calendarEntityList' => 
        array (
          'type' => 'multiEnum',
          'view' => 'views/settings/fields/calendar-entity-list',
        ),
        'activitiesEntityList' => 
        array (
          'type' => 'multiEnum',
          'view' => 'views/settings/fields/activities-entity-list',
        ),
        'historyEntityList' => 
        array (
          'type' => 'multiEnum',
          'view' => 'views/settings/fields/history-entity-list',
        ),
        'googleMapsApiKey' => 
        array (
          'type' => 'varchar',
          'onlyUser' => true,
        ),
        'massEmailDisableMandatoryOptOutLink' => 
        array (
          'type' => 'bool',
        ),
        'massEmailOpenTracking' => 
        array (
          'type' => 'bool',
        ),
        'aclStrictMode' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'aclAllowDeleteCreated' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'lastViewedCount' => 
        array (
          'type' => 'int',
          'min' => 1,
          'max' => 200,
          'default' => 20,
          'required' => true,
        ),
        'adminNotifications' => 
        array (
          'type' => 'bool',
        ),
        'adminNotificationsNewVersion' => 
        array (
          'type' => 'bool',
        ),
        'adminNotificationsNewExtensionVersion' => 
        array (
          'type' => 'bool',
        ),
        'textFilterUseContainsForVarchar' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'scopeColorsDisabled' => 
        array (
          'type' => 'bool',
        ),
        'tabColorsDisabled' => 
        array (
          'type' => 'bool',
        ),
        'tabIconsDisabled' => 
        array (
          'type' => 'bool',
        ),
        'emailAddressIsOptedOutByDefault' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'outboundEmailBccAddress' => 
        array (
          'type' => 'varchar',
          'trim' => true,
        ),
        'cleanupDeletedRecords' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'addressCountryList' => 
        array (
          'type' => 'multiEnum',
        ),
        'addressCityList' => 
        array (
          'type' => 'multiEnum',
        ),
        'addressStateList' => 
        array (
          'type' => 'multiEnum',
        ),
        'jobRunInParallel' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'jobMaxPortion' => 
        array (
          'type' => 'int',
          'tooltip' => true,
        ),
        'jobPoolConcurrencyNumber' => 
        array (
          'type' => 'int',
          'tooltip' => true,
          'min' => 1,
        ),
        'daemonInterval' => 
        array (
          'type' => 'int',
          'tooltip' => true,
        ),
        'daemonMaxProcessNumber' => 
        array (
          'type' => 'int',
          'tooltip' => true,
          'min' => 1,
        ),
        'daemonProcessTimeout' => 
        array (
          'type' => 'int',
          'tooltip' => true,
        ),
        'cronDisabled' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'maintenanceMode' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
        ),
        'useWebSocket' => 
        array (
          'type' => 'bool',
        ),
        'addressPreviewStreet' => 
        array (
          'notStorable' => true,
          'readOnly' => true,
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'addressPreviewCity' => 
        array (
          'notStorable' => true,
          'readOnly' => true,
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'addressPreviewState' => 
        array (
          'notStorable' => true,
          'readOnly' => true,
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'addressPreviewCountry' => 
        array (
          'notStorable' => true,
          'readOnly' => true,
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'addressPreviewPostalCode' => 
        array (
          'notStorable' => true,
          'readOnly' => true,
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'addressPreviewMap' => 
        array (
          'notStorable' => true,
          'readOnly' => true,
          'type' => 'map',
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
    ),
    'Team' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
          'trim' => true,
          'required' => true,
          'options' => 
          array (
          ),
        ),
        'roles' => 
        array (
          'type' => 'linkMultiple',
          'tooltip' => true,
        ),
        'positionList' => 
        array (
          'type' => 'array',
          'tooltip' => true,
        ),
        'userRole' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'disabled' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'users' => 
        array (
          'type' => 'hasMany',
          'entity' => 'User',
          'foreign' => 'teams',
        ),
        'roles' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Role',
          'foreign' => 'teams',
        ),
        'notes' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Note',
          'foreign' => 'teams',
        ),
        'inboundEmails' => 
        array (
          'type' => 'hasMany',
          'entity' => 'InboundEmail',
          'foreign' => 'teams',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'name',
        'order' => 'asc',
        'sortBy' => 'name',
        'asc' => true,
      ),
    ),
    'Template' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'body' => 
        array (
          'type' => 'wysiwyg',
          'view' => 'views/template/fields/body',
        ),
        'header' => 
        array (
          'type' => 'wysiwyg',
          'view' => 'views/template/fields/body',
        ),
        'footer' => 
        array (
          'type' => 'wysiwyg',
          'view' => 'views/template/fields/body',
          'tooltip' => true,
        ),
        'entityType' => 
        array (
          'type' => 'enum',
          'required' => true,
          'translation' => 'Global.scopeNames',
          'view' => 'views/fields/entity-type',
        ),
        'leftMargin' => 
        array (
          'type' => 'float',
          'default' => 10,
        ),
        'rightMargin' => 
        array (
          'type' => 'float',
          'default' => 10,
        ),
        'topMargin' => 
        array (
          'type' => 'float',
          'default' => 10,
        ),
        'bottomMargin' => 
        array (
          'type' => 'float',
          'default' => 25,
        ),
        'printFooter' => 
        array (
          'type' => 'bool',
        ),
        'footerPosition' => 
        array (
          'type' => 'float',
          'default' => 15,
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'variables' => 
        array (
          'type' => 'base',
          'notStorable' => true,
          'tooltip' => true,
        ),
        'pageOrientation' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Portrait',
            1 => 'Landscape',
          ),
          'default' => 'Portrait',
        ),
        'pageFormat' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'A3',
            1 => 'A4',
            2 => 'A5',
            3 => 'A6',
            4 => 'A7',
            5 => 'Custom',
          ),
          'default' => 'A4',
        ),
        'pageWidth' => 
        array (
          'type' => 'float',
          'min' => 1,
        ),
        'pageHeight' => 
        array (
          'type' => 'float',
          'min' => 1,
        ),
        'fontFace' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'aealarabiya',
            2 => 'aefurat',
            3 => 'cid0cs',
            4 => 'cid0ct',
            5 => 'cid0jp',
            6 => 'cid0kr',
            7 => 'courier',
            8 => 'dejavusans',
            9 => 'dejavusanscondensed',
            10 => 'dejavusansextralight',
            11 => 'dejavusansmono',
            12 => 'dejavuserif',
            13 => 'dejavuserifcondensed',
            14 => 'freemono',
            15 => 'freesans',
            16 => 'freeserif',
            17 => 'helvetica',
            18 => 'hysmyeongjostdmedium',
            19 => 'kozgopromedium',
            20 => 'kozminproregular',
            21 => 'msungstdlight',
            22 => 'pdfacourier',
            23 => 'pdfahelvetica',
            24 => 'pdfasymbol',
            25 => 'pdfatimes',
            26 => 'stsongstdlight',
            27 => 'symbol',
            28 => 'times',
          ),
          'default' => '',
        ),
      ),
      'links' => 
      array (
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
        ),
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'name',
        'order' => 'asc',
        'sortBy' => 'name',
        'asc' => true,
      ),
    ),
    'UniqueId' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'index' => true,
        ),
        'data' => 
        array (
          'type' => 'jsonObject',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'terminateAt' => 
        array (
          'type' => 'datetime',
        ),
        'target' => 
        array (
          'type' => 'linkParent',
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'target' => 
        array (
          'type' => 'belongsToParent',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
    ),
    'User' => 
    array (
      'fields' => 
      array (
        'isAdmin' => 
        array (
          'type' => 'bool',
          'tooltip' => true,
          'disabled' => true,
        ),
        'userName' => 
        array (
          'type' => 'varchar',
          'maxLength' => 50,
          'required' => true,
          'view' => 'views/user/fields/user-name',
          'tooltip' => true,
        ),
        'name' => 
        array (
          'type' => 'personName',
          'view' => 'views/user/fields/name',
        ),
        'type' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'regular',
            1 => 'admin',
            2 => 'portal',
            3 => 'system',
            4 => 'super-admin',
            5 => 'api',
          ),
          'default' => 'regular',
          'maxLength' => 24,
          'index' => true,
          'inlineEditDisabled' => true,
          'layoutDetailDisabled' => true,
          'layoutMassUpdateDisabled' => true,
        ),
        'password' => 
        array (
          'type' => 'password',
          'maxLength' => 150,
          'internal' => true,
          'disabled' => true,
        ),
        'passwordConfirm' => 
        array (
          'type' => 'password',
          'maxLength' => 150,
          'internal' => true,
          'disabled' => true,
          'notStorable' => true,
        ),
        'authMethod' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'ApiKey',
            1 => 'Hmac',
          ),
          'maxLength' => 24,
          'layoutMassUpdateDisabled' => true,
          'layoutDetailDisabled' => true,
          'layoutFiltersDisabled' => true,
          'layoutListDisabled' => true,
        ),
        'apiKey' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
          'readOnly' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDetailDisabled' => true,
          'layoutFiltersDisabled' => true,
          'layoutListDisabled' => true,
        ),
        'secretKey' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
          'readOnly' => true,
          'notStorable' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDetailDisabled' => true,
          'layoutFiltersDisabled' => true,
          'layoutListDisabled' => true,
        ),
        'salutationName' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'Mr.',
            2 => 'Ms.',
            3 => 'Mrs.',
            4 => 'Dr.',
          ),
        ),
        'firstName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 100,
          'default' => '',
        ),
        'lastName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 100,
          'required' => true,
          'default' => '',
        ),
        'isActive' => 
        array (
          'type' => 'bool',
          'layoutDetailDisabled' => true,
          'tooltip' => true,
          'default' => true,
        ),
        'isPortalUser' => 
        array (
          'type' => 'bool',
          'disabled' => true,
        ),
        'isSuperAdmin' => 
        array (
          'type' => 'bool',
          'default' => false,
          'disabled' => true,
        ),
        'title' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
          'trim' => true,
        ),
        'position' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
          'notStorable' => true,
          'where' => 
          array (
            'LIKE' => 
            array (
              'leftJoins' => 
              array (
                0 => 
                array (
                  0 => 'teams',
                  1 => 'teamsPosition',
                ),
              ),
              'sql' => 'teamsPositionMiddle.role LIKE {value}',
              'distinct' => true,
            ),
            '=' => 
            array (
              'leftJoins' => 
              array (
                0 => 
                array (
                  0 => 'teams',
                  1 => 'teamsPosition',
                ),
              ),
              'sql' => 'teamsPositionMiddle.role = {value}',
              'distinct' => true,
            ),
            '<>' => 
            array (
              'leftJoins' => 
              array (
                0 => 
                array (
                  0 => 'teams',
                  1 => 'teamsPosition',
                ),
              ),
              'sql' => 'teamsPositionMiddle.role <> {value}',
              'distinct' => true,
            ),
            'IS NULL' => 
            array (
              'leftJoins' => 
              array (
                0 => 
                array (
                  0 => 'teams',
                  1 => 'teamsPosition',
                ),
              ),
              'sql' => 'teamsPositionMiddle.role IS NULL',
              'distinct' => true,
            ),
            'IS NOT NULL' => 
            array (
              'leftJoins' => 
              array (
                0 => 
                array (
                  0 => 'teams',
                  1 => 'teamsPosition',
                ),
              ),
              'sql' => 'teamsPositionMiddle.role IS NOT NULL',
              'distinct' => true,
            ),
          ),
          'trim' => true,
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'textFilterDisabled' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
          'required' => true,
          'layoutMassUpdateDisabled' => true,
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Mobile',
            1 => 'Office',
            2 => 'Home',
            3 => 'Fax',
            4 => 'Other',
          ),
          'defaultType' => 'Mobile',
          'required' => true,
        ),
        'token' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'disabled' => true,
        ),
        'authTokenId' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'disabled' => true,
        ),
        'authLogRecordId' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'disabled' => true,
        ),
        'ipAddress' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'disabled' => true,
        ),
        'defaultTeam' => 
        array (
          'type' => 'link',
          'layoutDetailDisabled' => true,
          'tooltip' => true,
        ),
        'acceptanceStatus' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'exportDisabled' => true,
          'disabled' => true,
        ),
        'acceptanceStatusMeetings' => 
        array (
          'type' => 'enum',
          'notStorable' => true,
          'layoutAvailabilityList' => 
          array (
            0 => 'filters',
          ),
          'importDisabled' => true,
          'exportDisabled' => true,
          'view' => 'crm:views/lead/fields/acceptance-status',
          'link' => 'meetings',
          'column' => 'status',
        ),
        'acceptanceStatusCalls' => 
        array (
          'type' => 'enum',
          'notStorable' => true,
          'layoutAvailabilityList' => 
          array (
            0 => 'filters',
          ),
          'importDisabled' => true,
          'exportDisabled' => true,
          'view' => 'crm:views/lead/fields/acceptance-status',
          'link' => 'calls',
          'column' => 'status',
        ),
        'teamRole' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'disabled' => true,
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'tooltip' => true,
          'columns' => 
          array (
            'role' => 'userRole',
          ),
          'additionalAttributeList' => 
          array (
            0 => 'columns',
          ),
          'layoutDetailDisabled' => true,
          'view' => 'views/user/fields/teams',
          'default' => 'javascript: return {teamsIds: []}',
        ),
        'roles' => 
        array (
          'type' => 'linkMultiple',
          'layoutDetailDisabled' => true,
          'tooltip' => true,
        ),
        'portals' => 
        array (
          'type' => 'linkMultiple',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'tooltip' => true,
        ),
        'portalRoles' => 
        array (
          'type' => 'linkMultiple',
          'layoutDetailDisabled' => true,
          'tooltip' => true,
        ),
        'contact' => 
        array (
          'type' => 'link',
          'layoutDetailDisabled' => true,
          'view' => 'views/user/fields/contact',
        ),
        'accounts' => 
        array (
          'type' => 'linkMultiple',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
        ),
        'account' => 
        array (
          'type' => 'link',
          'notStorable' => true,
          'foreignAccessDisabled' => true,
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'readOnly' => true,
        ),
        'portal' => 
        array (
          'type' => 'link',
          'notStorable' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'avatar' => 
        array (
          'type' => 'image',
          'view' => 'views/user/fields/avatar',
          'layoutDetailDisabled' => true,
          'previewSize' => 'small',
        ),
        'sendAccessInfo' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'disabled' => true,
        ),
        'gender' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'Male',
            2 => 'Female',
            3 => 'Neutral',
          ),
          'default' => '',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'dashboardTemplate' => 
        array (
          'type' => 'link',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
        ),
        'lastAccess' => 
        array (
          'type' => 'datetime',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'layoutFiltersDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDetailDisabled' => true,
          'directAccessDisabled' => true,
        ),
        'officeLocation' => 
        array (
          'type' => 'link',
        ),
        'aadharno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'accountno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'addDocuments' => 
        array (
          'type' => 'attachmentMultiple',
          'previewSize' => 'medium',
          'sourceList' => 
          array (
          ),
          'accept' => 
          array (
          ),
          'isCustom' => true,
        ),
        'address' => 
        array (
          'type' => 'address',
          'dynamicLogicVisible' => NULL,
          'dynamicLogicReadOnly' => NULL,
          'name' => 'address',
          'label' => 'Address',
          'inlineEditDisabled' => false,
          'tooltipText' => NULL,
          'tooltip' => false,
          'isCustom' => true,
        ),
        'bankname' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'bloodgroup' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Not Set',
            1 => 'A+',
            2 => 'A-',
            3 => 'B+',
            4 => 'B-',
            5 => 'O+',
            6 => 'O-',
            7 => 'AB+',
            8 => 'AB-',
          ),
          'style' => 
          array (
            'Not Set' => NULL,
            'A+' => NULL,
            'A-' => NULL,
            'B+' => NULL,
            'B-' => NULL,
            'O+' => NULL,
            'O-' => NULL,
            'AB+' => NULL,
            'AB-' => NULL,
          ),
          'default' => 'Not Set',
          'isCustom' => true,
        ),
        'branch' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'employeeid' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'fathername' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'ifsccode' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'pancardno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'spouse' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'userParent' => 
        array (
          'type' => 'link',
          'required' => true,
        ),
        'designations' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
          'maxLength' => 255,
        ),
        'officeLocations' => 
        array (
          'type' => 'linkMultiple',
          'layoutDetailDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'noLoad' => true,
          'importDisabled' => true,
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'layoutMassUpdateDisabled' => true,
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'addressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'addressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'addressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'addressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'addressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'addressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'defaultTeam' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Team',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'foreign' => 'users',
          'additionalColumns' => 
          array (
            'role' => 
            array (
              'type' => 'varchar',
              'len' => 100,
            ),
          ),
          'layoutRelationshipsDisabled' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'roles' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Role',
          'foreign' => 'users',
          'layoutRelationshipsDisabled' => true,
        ),
        'portals' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Portal',
          'foreign' => 'users',
          'layoutRelationshipsDisabled' => true,
        ),
        'portalRoles' => 
        array (
          'type' => 'hasMany',
          'entity' => 'PortalRole',
          'foreign' => 'users',
          'layoutRelationshipsDisabled' => true,
        ),
        'dashboardTemplate' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'DashboardTemplate',
        ),
        'preferences' => 
        array (
          'type' => 'hasOne',
          'entity' => 'Preferences',
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'users',
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'users',
        ),
        'emails' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Email',
          'foreign' => 'users',
        ),
        'notes' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Note',
          'foreign' => 'users',
          'layoutRelationshipsDisabled' => true,
        ),
        'contact' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Contact',
          'foreign' => 'portalUser',
        ),
        'accounts' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Account',
          'foreign' => 'portalUsers',
          'relationName' => 'AccountPortalUser',
        ),
        'tasks' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Task',
          'foreign' => 'assignedUser',
        ),
        'targetLists' => 
        array (
          'type' => 'hasMany',
          'entity' => 'TargetList',
          'foreign' => 'users',
        ),
        'targetListIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'officeLocation' => 
        array (
          'type' => 'belongsTo',
          'foreign' => 'users',
          'entity' => 'OfficeLocation',
          'audited' => false,
          'isCustom' => true,
        ),
        'addDocuments' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Attachment',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
          'relationName' => 'attachments',
          'disabled' => true,
        ),
        'userParent' => 
        array (
          'type' => 'belongsTo',
          'foreign' => 'users',
          'entity' => 'User',
          'audited' => false,
          'isCustom' => true,
        ),
        'officeLocations' => 
        array (
          'type' => 'hasMany',
          'foreign' => 'user',
          'entity' => 'OfficeLocation',
          'audited' => false,
          'isCustom' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'userName',
        'order' => 'asc',
        'textFilterFields' => 
        array (
          0 => 'name',
          1 => 'userName',
        ),
        'sortBy' => 'userName',
        'asc' => true,
      ),
    ),
    'UserData' => 
    array (
      'fields' => 
      array (
        'imapHandlers' => 
        array (
          'type' => 'jsonObject',
        ),
        'smtpHandlers' => 
        array (
          'type' => 'jsonObject',
        ),
        'auth2FA' => 
        array (
          'type' => 'bool',
        ),
        'auth2FAMethod' => 
        array (
          'type' => 'enum',
        ),
        'auth2FATotpSecret' => 
        array (
          'type' => 'varchar',
          'maxLength' => 32,
        ),
      ),
      'links' => 
      array (
        'user' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
      ),
    ),
    'Webhook' => 
    array (
      'fields' => 
      array (
        'event' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
          'required' => true,
        ),
        'url' => 
        array (
          'type' => 'varchar',
          'maxLength' => 512,
          'required' => true,
        ),
        'isActive' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'user' => 
        array (
          'type' => 'link',
          'view' => 'views/webhook/fields/user',
        ),
        'entityType' => 
        array (
          'type' => 'varchar',
          'readOnly' => true,
          'view' => 'views/fields/entity-type',
        ),
        'type' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'create',
            1 => 'update',
            2 => 'fieldUpdate',
            3 => 'delete',
          ),
          'readOnly' => true,
        ),
        'field' => 
        array (
          'type' => 'varchar',
          'readOnly' => true,
        ),
        'secretKey' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
          'readOnly' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutFiltersDisabled' => true,
          'layoutListDisabled' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'user' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'event',
        ),
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'event' => 
        array (
          'columns' => 
          array (
            0 => 'event',
          ),
        ),
        'entityTypeType' => 
        array (
          'columns' => 
          array (
            0 => 'entityType',
            1 => 'type',
          ),
        ),
        'entityTypeField' => 
        array (
          'columns' => 
          array (
            0 => 'entityType',
            1 => 'field',
          ),
        ),
      ),
    ),
    'WebhookEventQueueItem' => 
    array (
      'fields' => 
      array (
        'number' => 
        array (
          'type' => 'autoincrement',
          'dbType' => 'bigint',
        ),
        'event' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
          'required' => true,
        ),
        'target' => 
        array (
          'type' => 'linkParent',
        ),
        'data' => 
        array (
          'type' => 'jsonObject',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'isProcessed' => 
        array (
          'type' => 'bool',
        ),
      ),
      'links' => 
      array (
      ),
      'collection' => 
      array (
        'orderBy' => 'number',
        'order' => 'desc',
        'sortBy' => 'number',
        'asc' => false,
      ),
    ),
    'WebhookQueueItem' => 
    array (
      'fields' => 
      array (
        'number' => 
        array (
          'type' => 'autoincrement',
          'dbType' => 'bigint',
        ),
        'event' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
          'required' => true,
        ),
        'webhook' => 
        array (
          'type' => 'link',
        ),
        'target' => 
        array (
          'type' => 'linkParent',
        ),
        'data' => 
        array (
          'type' => 'jsonObject',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Pending',
            1 => 'Success',
            2 => 'Failed',
          ),
          'default' => 'Pending',
          'maxLength' => 15,
        ),
        'processedAt' => 
        array (
          'type' => 'datetime',
        ),
        'attempts' => 
        array (
          'type' => 'int',
          'default' => 0,
        ),
        'processAt' => 
        array (
          'type' => 'datetime',
        ),
      ),
      'links' => 
      array (
        'webhook' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Webhook',
          'foreignName' => 'id',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'number',
        'order' => 'desc',
        'sortBy' => 'number',
        'asc' => false,
      ),
    ),
    'Account' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'maxLength' => 249,
          'required' => true,
          'trim' => true,
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
          'isPersonalData' => true,
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'type' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'Customer',
            2 => 'Investor',
            3 => 'Partner',
            4 => 'Reseller',
          ),
          'default' => '',
        ),
        'industry' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'Advertising',
            2 => 'Aerospace',
            3 => 'Agriculture',
            4 => 'Apparel & Accessories',
            5 => 'Architecture',
            6 => 'Automotive',
            7 => 'Banking',
            8 => 'Biotechnology',
            9 => 'Building Materials & Equipment',
            10 => 'Chemical',
            11 => 'Construction',
            12 => 'Consulting',
            13 => 'Computer',
            14 => 'Culture',
            15 => 'Creative',
            16 => 'Defense',
            17 => 'Education',
            18 => 'Electronics',
            19 => 'Electric Power',
            20 => 'Energy',
            21 => 'Entertainment & Leisure',
            22 => 'Finance',
            23 => 'Food & Beverage',
            24 => 'Grocery',
            25 => 'Healthcare',
            26 => 'Hospitality',
            27 => 'Insurance',
            28 => 'Legal',
            29 => 'Manufacturing',
            30 => 'Mass Media',
            31 => 'Marketing',
            32 => 'Mining',
            33 => 'Music',
            34 => 'Publishing',
            35 => 'Petroleum',
            36 => 'Real Estate',
            37 => 'Retail',
            38 => 'Service',
            39 => 'Sports',
            40 => 'Software',
            41 => 'Support',
            42 => 'Shipping',
            43 => 'Travel',
            44 => 'Technology',
            45 => 'Telecommunications',
            46 => 'Television',
            47 => 'Transportation',
            48 => 'Testing, Inspection & Certification',
            49 => 'Venture Capital',
            50 => 'Wholesale',
            51 => 'Water',
          ),
          'default' => '',
          'isSorted' => true,
        ),
        'sicCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'contactRole' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'disabled' => true,
          'maxLength' => 100,
        ),
        'contactIsInactive' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'default' => false,
          'disabled' => true,
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
          'trim' => true,
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
          'trim' => true,
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'campaign' => 
        array (
          'type' => 'link',
          'layoutListDisabled' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'targetLists' => 
        array (
          'type' => 'linkMultiple',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'importDisabled' => true,
          'exportDisabled' => true,
          'noLoad' => true,
        ),
        'targetList' => 
        array (
          'type' => 'link',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutFiltersDisabled' => true,
          'entity' => 'TargetList',
          'directAccessDisabled' => true,
        ),
        'originalLead' => 
        array (
          'type' => 'link',
          'layoutMassUpdateDisabled' => true,
          'layoutListDisabled' => true,
          'readOnly' => true,
          'view' => 'views/fields/link-one',
        ),
        'targetListIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'stream' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'experience' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'gstno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'wanttoaddgstdetails' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Yes',
            1 => 'No',
          ),
          'style' => 
          array (
            'Yes' => NULL,
            'No' => NULL,
          ),
          'default' => 'No',
          'isCustom' => true,
        ),
        'howmanygstdetails' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '1',
            1 => '2',
            2 => '3',
            3 => '4',
            4 => '5',
            5 => '6',
            6 => '7',
            7 => '8',
            8 => '9',
            9 => '10',
            10 => '11',
            11 => '12',
            12 => '13',
            13 => '14',
            14 => '15',
            15 => '16',
            16 => '17',
            17 => '18',
            18 => '19',
            19 => '20',
            20 => '21',
            21 => '22',
            22 => '23',
            23 => '24',
            24 => '25',
            25 => '26',
            26 => '27',
            27 => '28',
            28 => '29',
            29 => '30',
            30 => '31',
            31 => '32',
            32 => '33',
            33 => '34',
            34 => '35',
            35 => '36',
            36 => '37',
          ),
          'style' => 
          array (
            1 => NULL,
            2 => NULL,
            3 => NULL,
            4 => NULL,
            5 => NULL,
            6 => NULL,
            7 => NULL,
            8 => NULL,
            9 => NULL,
            10 => NULL,
            11 => NULL,
            12 => NULL,
            13 => NULL,
            14 => NULL,
            15 => NULL,
            16 => NULL,
            17 => NULL,
            18 => NULL,
            19 => NULL,
            20 => NULL,
            21 => NULL,
            22 => NULL,
            23 => NULL,
            24 => NULL,
            25 => NULL,
            26 => NULL,
            27 => NULL,
            28 => NULL,
            29 => NULL,
            30 => NULL,
            31 => NULL,
            32 => NULL,
            33 => NULL,
            34 => NULL,
            35 => NULL,
            36 => NULL,
            37 => NULL,
          ),
          'default' => '1',
          'isCustom' => true,
        ),
        'totalnumberofgst' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'doyouhavegstnum' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Yes',
            1 => 'No',
          ),
          'style' => 
          array (
            'Yes' => NULL,
            'No' => NULL,
          ),
          'default' => 'No',
          'isCustom' => true,
        ),
        'panno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'contacts' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Contact',
          'foreign' => 'accounts',
        ),
        'opportunities' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Opportunity',
          'foreign' => 'account',
        ),
        'cases' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Case',
          'foreign' => 'account',
        ),
        'documents' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Document',
          'foreign' => 'accounts',
          'audited' => true,
        ),
        'meetingsPrimary' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'account',
          'layoutRelationshipsDisabled' => true,
        ),
        'emailsPrimary' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Email',
          'foreign' => 'account',
          'layoutRelationshipsDisabled' => true,
        ),
        'callsPrimary' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'account',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasksPrimary' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Task',
          'foreign' => 'account',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
          'audited' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
          'audited' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'emails' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Email',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'campaign' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Campaign',
          'foreign' => 'accounts',
          'noJoin' => true,
        ),
        'campaignLogRecords' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'CampaignLogRecord',
          'foreign' => 'parent',
        ),
        'targetLists' => 
        array (
          'type' => 'hasMany',
          'entity' => 'TargetList',
          'foreign' => 'accounts',
        ),
        'portalUsers' => 
        array (
          'type' => 'hasMany',
          'entity' => 'User',
          'foreign' => 'accounts',
        ),
        'originalLead' => 
        array (
          'type' => 'hasOne',
          'entity' => 'Lead',
          'foreign' => 'createdAccount',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
          1 => 'emailAddress',
        ),
        'fullTextSearch' => false,
        'countDisabled' => false,
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'createdAt' => 
        array (
          'columns' => 
          array (
            0 => 'createdAt',
            1 => 'deleted',
          ),
        ),
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'Call' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Planned',
            1 => 'Held',
            2 => 'Not Held',
          ),
          'default' => 'Planned',
          'style' => 
          array (
            'Held' => 'success',
          ),
          'audited' => true,
        ),
        'dateStart' => 
        array (
          'type' => 'datetime',
          'required' => true,
          'default' => 'javascript: return this.dateTime.getNow(15);',
          'audited' => true,
        ),
        'dateEnd' => 
        array (
          'type' => 'datetime',
          'required' => true,
          'view' => 'crm:views/call/fields/date-end',
          'after' => 'dateStart',
        ),
        'duration' => 
        array (
          'type' => 'duration',
          'start' => 'dateStart',
          'end' => 'dateEnd',
          'options' => 
          array (
            0 => 300,
            1 => 600,
            2 => 900,
            3 => 1800,
            4 => 2700,
            5 => 3600,
            6 => 7200,
          ),
          'default' => 300,
          'notStorable' => true,
          'select' => 'TIMESTAMPDIFF(SECOND, call.date_start, call.date_end)',
          'orderBy' => 'duration {direction}',
        ),
        'reminders' => 
        array (
          'type' => 'jsonArray',
          'notStorable' => true,
          'view' => 'crm:views/meeting/fields/reminders',
          'layoutListDisabled' => true,
        ),
        'direction' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Outbound',
            1 => 'Inbound',
          ),
          'default' => 'Outbound',
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'parent' => 
        array (
          'type' => 'linkParent',
          'entityList' => 
          array (
            0 => 'Account',
            1 => 'Contact',
            2 => 'Lead',
            3 => 'Opportunity',
            4 => 'Case',
            5 => 'ImportResult',
          ),
        ),
        'account' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'acceptanceStatus' => 
        array (
          'type' => 'enum',
          'notStorable' => true,
          'options' => 
          array (
            0 => 'None',
            1 => 'Accepted',
            2 => 'Tentative',
            3 => 'Declined',
          ),
          'style' => 
          array (
            'Accepted' => 'success',
            'Declined' => 'danger',
            'Tentative' => 'warning',
          ),
          'layoutDetailDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'importDisabled' => true,
          'exportDisabled' => true,
          'where' => 
          array (
            '=' => 
            array (
              'leftJoins' => 
              array (
                0 => 'users',
                1 => 'contacts',
                2 => 'leads',
              ),
              'sql' => 'contactsMiddle.status = {value} OR leadsMiddle.status = {value} OR usersMiddle.status = {value}',
              'distinct' => true,
            ),
            '<>' => 'call.id NOT IN (SELECT call_id FROM call_contact WHERE deleted = 0 AND status = {value}) AND call.id NOT IN (SELECT call_id FROM call_user WHERE deleted = 0 AND status = {value}) AND call.id NOT IN (SELECT call_id FROM call_lead WHERE deleted = 0 AND status = {value})',
            'IN' => 
            array (
              'leftJoins' => 
              array (
                0 => 'users',
                1 => 'leads',
                2 => 'contacts',
              ),
              'sql' => 'contactsMiddle.status IN {value} OR leadsMiddle.status IN {value} OR usersMiddle.status IN {value}',
              'distinct' => true,
            ),
            'NOT IN' => 'call.id NOT IN (SELECT call_id FROM call_contact WHERE deleted = 0 AND status IN {value}) AND call.id NOT IN (SELECT call_id FROM call_user WHERE deleted = 0 AND status IN {value}) AND call.id NOT IN (SELECT call_id FROM call_lead WHERE deleted = 0 AND status IN {value})',
            'IS NULL' => 
            array (
              'leftJoins' => 
              array (
                0 => 'users',
                1 => 'contacts',
                2 => 'leads',
              ),
              'sql' => 'contactsMiddle.status IS NULL AND leadsMiddle.status IS NULL AND usersMiddle.status IS NULL',
              'distinct' => true,
            ),
            'IS NOT NULL' => 'call.id NOT IN (SELECT call_id FROM call_contact WHERE deleted = 0 AND status IS NULL) OR call.id NOT IN (SELECT call_id FROM call_user WHERE deleted = 0 AND status IS NULL) OR call.id NOT IN (SELECT call_id FROM call_lead WHERE deleted = 0 AND status IS NULL)',
          ),
          'view' => 'crm:views/meeting/fields/acceptance-status',
        ),
        'users' => 
        array (
          'type' => 'linkMultiple',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'view' => 'crm:views/meeting/fields/users',
          'columns' => 
          array (
            'status' => 'acceptanceStatus',
          ),
          'additionalAttributeList' => 
          array (
            0 => 'columns',
          ),
          'orderBy' => 'name',
        ),
        'contacts' => 
        array (
          'type' => 'linkMultiple',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'view' => 'crm:views/call/fields/contacts',
          'columns' => 
          array (
            'status' => 'acceptanceStatus',
          ),
          'additionalAttributeList' => 
          array (
            0 => 'columns',
          ),
          'orderBy' => 'name',
        ),
        'leads' => 
        array (
          'type' => 'linkMultiple',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'view' => 'crm:views/call/fields/leads',
          'columns' => 
          array (
            'status' => 'acceptanceStatus',
          ),
          'additionalAttributeList' => 
          array (
            0 => 'columns',
          ),
          'orderBy' => 'name',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'phoneNumbersMap' => 
        array (
          'type' => 'jsonObject',
          'notStorable' => true,
          'disabled' => true,
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => true,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'stream' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
      ),
      'links' => 
      array (
        'account' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Account',
        ),
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'users' => 
        array (
          'type' => 'hasMany',
          'entity' => 'User',
          'foreign' => 'calls',
          'additionalColumns' => 
          array (
            'status' => 
            array (
              'type' => 'varchar',
              'len' => '36',
              'default' => 'None',
            ),
          ),
        ),
        'contacts' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Contact',
          'foreign' => 'calls',
          'additionalColumns' => 
          array (
            'status' => 
            array (
              'type' => 'varchar',
              'len' => '36',
              'default' => 'None',
            ),
          ),
        ),
        'leads' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Lead',
          'foreign' => 'calls',
          'additionalColumns' => 
          array (
            'status' => 
            array (
              'type' => 'varchar',
              'len' => '36',
              'default' => 'None',
            ),
          ),
        ),
        'parent' => 
        array (
          'type' => 'belongsToParent',
          'foreign' => 'calls',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'dateStart',
        'order' => 'desc',
        'sortBy' => 'dateStart',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'dateStartStatus' => 
        array (
          'columns' => 
          array (
            0 => 'dateStart',
            1 => 'status',
          ),
        ),
        'dateStart' => 
        array (
          'columns' => 
          array (
            0 => 'dateStart',
            1 => 'deleted',
          ),
        ),
        'status' => 
        array (
          'columns' => 
          array (
            0 => 'status',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
        'assignedUserStatus' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'status',
          ),
        ),
      ),
    ),
    'Campaign' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Planning',
            1 => 'Active',
            2 => 'Inactive',
            3 => 'Complete',
          ),
          'default' => 'Planning',
        ),
        'type' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Email',
            1 => 'Newsletter',
            2 => 'Web',
            3 => 'Television',
            4 => 'Radio',
            5 => 'Mail',
          ),
          'default' => 'Email',
        ),
        'startDate' => 
        array (
          'type' => 'date',
        ),
        'endDate' => 
        array (
          'type' => 'date',
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'targetLists' => 
        array (
          'type' => 'linkMultiple',
          'tooltip' => true,
        ),
        'excludingTargetLists' => 
        array (
          'type' => 'linkMultiple',
          'tooltip' => true,
        ),
        'sentCount' => 
        array (
          'type' => 'int',
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'openedCount' => 
        array (
          'view' => 'crm:views/campaign/fields/int-with-percentage',
          'type' => 'int',
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'clickedCount' => 
        array (
          'view' => 'crm:views/campaign/fields/int-with-percentage',
          'type' => 'int',
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'optedInCount' => 
        array (
          'type' => 'int',
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'optedOutCount' => 
        array (
          'view' => 'crm:views/campaign/fields/int-with-percentage',
          'type' => 'int',
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'bouncedCount' => 
        array (
          'view' => 'crm:views/campaign/fields/int-with-percentage',
          'type' => 'int',
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'hardBouncedCount' => 
        array (
          'type' => 'int',
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'softBouncedCount' => 
        array (
          'type' => 'int',
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'leadCreatedCount' => 
        array (
          'type' => 'int',
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'openedPercentage' => 
        array (
          'type' => 'int',
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'clickedPercentage' => 
        array (
          'type' => 'int',
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'optedOutPercentage' => 
        array (
          'type' => 'int',
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'bouncedPercentage' => 
        array (
          'type' => 'int',
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'revenue' => 
        array (
          'type' => 'currency',
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'budget' => 
        array (
          'type' => 'currency',
        ),
        'contactsTemplate' => 
        array (
          'type' => 'link',
          'view' => 'crm:views/campaign/fields/template',
          'targetEntityType' => 'Contact',
        ),
        'leadsTemplate' => 
        array (
          'type' => 'link',
          'view' => 'crm:views/campaign/fields/template',
          'targetEntityType' => 'Lead',
        ),
        'accountsTemplate' => 
        array (
          'type' => 'link',
          'view' => 'crm:views/campaign/fields/template',
          'targetEntityType' => 'Account',
        ),
        'usersTemplate' => 
        array (
          'type' => 'link',
          'view' => 'crm:views/campaign/fields/template',
          'targetEntityType' => 'User',
        ),
        'mailMergeOnlyWithAddress' => 
        array (
          'type' => 'bool',
          'default' => true,
        ),
        'revenueCurrency' => 
        array (
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'revenueConverted' => 
        array (
          'notStorable' => true,
          'directAccessDisabled' => true,
          'readOnly' => true,
          'disabled' => true,
          'type' => 'currencyConverted',
          'importDisabled' => true,
        ),
        'budgetCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'budgetConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'targetLists' => 
        array (
          'type' => 'hasMany',
          'entity' => 'TargetList',
          'foreign' => 'campaigns',
        ),
        'excludingTargetLists' => 
        array (
          'type' => 'hasMany',
          'entity' => 'TargetList',
          'foreign' => 'campaignsExcluding',
          'relationName' => 'campaignTargetListExcluding',
        ),
        'accounts' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Account',
          'foreign' => 'campaign',
        ),
        'contacts' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Contact',
          'foreign' => 'campaign',
        ),
        'leads' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Lead',
          'foreign' => 'campaign',
        ),
        'opportunities' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Opportunity',
          'foreign' => 'campaign',
        ),
        'campaignLogRecords' => 
        array (
          'type' => 'hasMany',
          'entity' => 'CampaignLogRecord',
          'foreign' => 'campaign',
        ),
        'trackingUrls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'CampaignTrackingUrl',
          'foreign' => 'campaign',
        ),
        'massEmails' => 
        array (
          'type' => 'hasMany',
          'entity' => 'MassEmail',
          'foreign' => 'campaign',
          'layoutRelationshipsDisabled' => true,
        ),
        'contactsTemplate' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Template',
          'noJoin' => true,
        ),
        'leadsTemplate' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Template',
          'noJoin' => true,
        ),
        'accountsTemplate' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Template',
          'noJoin' => true,
        ),
        'usersTemplate' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Template',
          'noJoin' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'createdAt' => 
        array (
          'columns' => 
          array (
            0 => 'createdAt',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'CampaignLogRecord' => 
    array (
      'fields' => 
      array (
        'action' => 
        array (
          'type' => 'enum',
          'required' => true,
          'maxLength' => 50,
          'options' => 
          array (
            0 => 'Sent',
            1 => 'Opened',
            2 => 'Opted Out',
            3 => 'Bounced',
            4 => 'Clicked',
            5 => 'Opted In',
            6 => 'Lead Created',
          ),
        ),
        'actionDate' => 
        array (
          'type' => 'datetime',
          'required' => true,
        ),
        'data' => 
        array (
          'type' => 'jsonObject',
          'view' => 'crm:views/campaign-log-record/fields/data',
        ),
        'stringData' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
        ),
        'stringAdditionalData' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
        ),
        'application' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'maxLength' => 36,
          'default' => 'Finnova',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'campaign' => 
        array (
          'type' => 'link',
        ),
        'parent' => 
        array (
          'type' => 'linkParent',
        ),
        'object' => 
        array (
          'type' => 'linkParent',
        ),
        'queueItem' => 
        array (
          'type' => 'link',
        ),
        'isTest' => 
        array (
          'type' => 'bool',
          'default' => false,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'campaign' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Campaign',
          'foreign' => 'campaignLogRecords',
        ),
        'queueItem' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'EmailQueueItem',
          'noJoin' => true,
        ),
        'parent' => 
        array (
          'type' => 'belongsToParent',
          'entityList' => 
          array (
            0 => 'Account',
            1 => 'Contact',
            2 => 'Lead',
            3 => 'Opportunity',
            4 => 'User',
          ),
        ),
        'object' => 
        array (
          'type' => 'belongsToParent',
          'entityList' => 
          array (
            0 => 'Email',
            1 => 'CampaignTrackingUrl',
          ),
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'actionDate' => 
        array (
          'columns' => 
          array (
            0 => 'actionDate',
            1 => 'deleted',
          ),
        ),
        'action' => 
        array (
          'columns' => 
          array (
            0 => 'action',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'CampaignTrackingUrl' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'url' => 
        array (
          'type' => 'url',
          'required' => true,
        ),
        'urlToUse' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'readOnly' => true,
        ),
        'campaign' => 
        array (
          'type' => 'link',
          'required' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'campaign' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Campaign',
          'foreign' => 'trackingUrls',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'name',
        'order' => 'asc',
        'sortBy' => 'name',
        'asc' => true,
      ),
    ),
    'Case' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'number' => 
        array (
          'type' => 'autoincrement',
          'index' => true,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'New',
            1 => 'Assigned',
            2 => 'Pending',
            3 => 'Closed',
            4 => 'Rejected',
            5 => 'Duplicate',
          ),
          'default' => 'New',
          'style' => 
          array (
            'Closed' => 'success',
            'Duplicate' => 'danger',
            'Rejected' => 'danger',
          ),
          'audited' => true,
          'fieldManagerAdditionalParamList' => 
          array (
            0 => 
            array (
              'name' => 'notActualOptions',
              'view' => 'views/admin/field-manager/fields/not-actual-options',
            ),
          ),
          'notActualOptions' => 
          array (
            0 => 'Closed',
            1 => 'Rejected',
            2 => 'Duplicate',
          ),
        ),
        'priority' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Low',
            1 => 'Normal',
            2 => 'High',
            3 => 'Urgent',
          ),
          'default' => 'Normal',
          'displayAsLabel' => true,
          'style' => 
          array (
            'High' => 'warning',
            'Urgent' => 'danger',
          ),
          'audited' => true,
        ),
        'type' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'Question',
            2 => 'Incident',
            3 => 'Problem',
          ),
          'default' => '',
          'audited' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'account' => 
        array (
          'type' => 'link',
        ),
        'lead' => 
        array (
          'type' => 'link',
        ),
        'contact' => 
        array (
          'type' => 'link',
          'view' => 'crm:views/case/fields/contact',
        ),
        'contacts' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'crm:views/case/fields/contacts',
          'orderBy' => 'name',
        ),
        'inboundEmail' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'attachments' => 
        array (
          'type' => 'attachmentMultiple',
        ),
        'stream' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'inboundEmail' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'InboundEmail',
        ),
        'account' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Account',
          'foreign' => 'cases',
        ),
        'lead' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Lead',
          'foreign' => 'cases',
        ),
        'contact' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Contact',
          'foreign' => 'casesPrimary',
        ),
        'contacts' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Contact',
          'foreign' => 'cases',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
          'audited' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
          'audited' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
          'audited' => true,
        ),
        'emails' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Email',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'articles' => 
        array (
          'type' => 'hasMany',
          'entity' => 'KnowledgeBaseArticle',
          'foreign' => 'cases',
          'audited' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'number',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
          1 => 'number',
        ),
        'sortBy' => 'number',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'status' => 
        array (
          'columns' => 
          array (
            0 => 'status',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
        'assignedUserStatus' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'status',
          ),
        ),
      ),
    ),
    'Contact' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'personName',
          'isPersonalData' => true,
        ),
        'salutationName' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'Mr.',
            2 => 'Ms.',
            3 => 'Mrs.',
            4 => 'Dr.',
          ),
        ),
        'firstName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 100,
          'default' => '',
        ),
        'lastName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 100,
          'required' => true,
          'default' => '',
        ),
        'accountId' => 
        array (
          'type' => 'varchar',
          'where' => 
          array (
            '=' => 'contact.id IN (SELECT contact_id FROM account_contact WHERE deleted = 0 AND account_id = {value})',
            '<>' => 'contact.id NOT IN (SELECT contact_id FROM account_contact WHERE deleted = 0 AND account_id = {value})',
            'IN' => 'contact.id IN (SELECT contact_id FROM account_contact WHERE deleted = 0 AND account_id IN {value})',
            'NOT IN' => 'contact.id NOT IN (SELECT contact_id FROM account_contact WHERE deleted = 0 AND account_id IN {value})',
            'IS NULL' => 'contact.account_id IS NULL',
            'IS NOT NULL' => 'contact.account_id IS NOT NULL',
          ),
          'customizationDisabled' => true,
          'disabled' => true,
        ),
        'title' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
          'notStorable' => true,
          'select' => 
          array (
            'sql' => 'accountContact.role',
            'leftJoins' => 
            array (
              0 => 
              array (
                0 => 'AccountContact',
                1 => 'accountContact',
                2 => 
                array (
                  'contact.id:' => 'accountContact.contactId',
                  'contact.accountId:' => 'accountContact.accountId',
                  'accountContact.deleted' => false,
                ),
              ),
            ),
          ),
          'orderBy' => 
          array (
            'sql' => 'accountContact.role {direction}',
            'leftJoins' => 
            array (
              0 => 
              array (
                0 => 'AccountContact',
                1 => 'accountContact',
                2 => 
                array (
                  'contact.id:' => 'accountContact.contactId',
                  'contact.accountId:' => 'accountContact.accountId',
                  'accountContact.deleted' => false,
                ),
              ),
            ),
          ),
          'where' => 
          array (
            'LIKE' => 
            array (
              'leftJoins' => 
              array (
                0 => 'accounts',
              ),
              'sql' => 'accountsMiddle.role LIKE {value}',
              'distinct' => true,
            ),
            '=' => 
            array (
              'leftJoins' => 
              array (
                0 => 'accounts',
              ),
              'sql' => 'accountsMiddle.role = {value}',
              'distinct' => true,
            ),
            '<>' => 
            array (
              'leftJoins' => 
              array (
                0 => 'accounts',
              ),
              'sql' => 'accountsMiddle.role <> {value}',
              'distinct' => true,
            ),
            'IS NULL' => 
            array (
              'leftJoins' => 
              array (
                0 => 'accounts',
              ),
              'sql' => 'accountsMiddle.role IS NULL',
              'distinct' => true,
            ),
            'IS NOT NULL' => 
            array (
              'leftJoins' => 
              array (
                0 => 'accounts',
              ),
              'sql' => 'accountsMiddle.role IS NOT NULL',
              'distinct' => true,
            ),
          ),
          'trim' => true,
          'textFilterDisabled' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
          'isPersonalData' => true,
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Mobile',
            1 => 'Office',
            2 => 'Home',
            3 => 'Fax',
            4 => 'Other',
          ),
          'defaultType' => 'Mobile',
          'isPersonalData' => true,
        ),
        'doNotCall' => 
        array (
          'type' => 'bool',
        ),
        'address' => 
        array (
          'type' => 'address',
          'isPersonalData' => true,
        ),
        'addressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'addressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'addressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'addressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'addressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'account' => 
        array (
          'type' => 'link',
          'view' => 'crm:views/contact/fields/account',
        ),
        'accounts' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'crm:views/contact/fields/accounts',
          'columns' => 
          array (
            'role' => 'contactRole',
            'isInactive' => 'contactIsInactive',
          ),
          'orderBy' => 'name',
        ),
        'accountRole' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutFiltersDisabled' => true,
          'layoutAvailabilityList' => 
          array (
            0 => 'listForAccount',
          ),
          'exportDisabled' => true,
          'importDisabled' => true,
          'view' => 'crm:views/contact/fields/account-role',
          'textFilterDisabled' => true,
        ),
        'accountIsInactive' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'select' => 
          array (
            'sql' => 'accountContact.is_inactive',
            'leftJoins' => 
            array (
              0 => 
              array (
                0 => 'AccountContact',
                1 => 'accountContact',
                2 => 
                array (
                  'contact.id:' => 'accountContact.contactId',
                  'contact.accountId:' => 'accountContact.accountId',
                  'accountContact.deleted' => false,
                ),
              ),
            ),
          ),
          'orderBy' => 
          array (
            'sql' => 'accountContact.is_inactive {direction}',
            'leftJoins' => 
            array (
              0 => 
              array (
                0 => 'AccountContact',
                1 => 'accountContact',
                2 => 
                array (
                  'contact.id:' => 'accountContact.contactId',
                  'contact.accountId:' => 'accountContact.accountId',
                  'accountContact.deleted' => false,
                ),
              ),
            ),
          ),
          'where' => 
          array (
            '= TRUE' => 
            array (
              'leftJoins' => 
              array (
                0 => 
                array (
                  0 => 'AccountContact',
                  1 => 'accountContactFilterIsInactive',
                  2 => 
                  array (
                    'contact.accountId:' => 'accountContactFilterIsInactive.accountId',
                  ),
                ),
              ),
              'sql' => 'accountContactFilterIsInactive.is_inactive = true',
            ),
            '= FALSE' => 
            array (
              'leftJoins' => 
              array (
                0 => 
                array (
                  0 => 'AccountContact',
                  1 => 'accountContactFilterIsInactive',
                  2 => 
                  array (
                    'contact.accountId:' => 'accountContactFilterIsInactive.accountId',
                  ),
                ),
              ),
              'sql' => 'accountContactFilterIsInactive.is_inactive <> true OR accountContactFilterIsInactive.is_inactive IS NULL',
            ),
          ),
          'layoutListDisabled' => true,
          'layoutDetailDisabled' => true,
          'layoutMassUpdateDisabled' => true,
        ),
        'accountType' => 
        array (
          'type' => 'foreign',
          'link' => 'account',
          'field' => 'type',
          'readOnly' => true,
          'view' => 'views/fields/foreign-enum',
        ),
        'opportunityRole' => 
        array (
          'type' => 'enum',
          'notStorable' => true,
          'options' => 
          array (
            0 => '',
            1 => 'Decision Maker',
            2 => 'Evaluator',
            3 => 'Influencer',
          ),
          'layoutMassUpdateDisabled' => true,
          'layoutListDisabled' => true,
          'layoutDetailDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'where' => 
          array (
            '=' => 
            array (
              'leftJoins' => 
              array (
                0 => 'opportunities',
              ),
              'sql' => 'opportunitiesMiddle.role = {value}',
              'distinct' => true,
            ),
            '<>' => 'contact.id NOT IN (SELECT contact_id FROM contact_opportunity WHERE deleted = 0 AND role = {value})',
            'IN' => 
            array (
              'leftJoins' => 
              array (
                0 => 'opportunities',
              ),
              'sql' => 'opportunitiesMiddle.role IN {value}',
              'distinct' => true,
            ),
            'NOT IN' => 'contact.id NOT IN (SELECT contact_id FROM contact_opportunity WHERE deleted = 0 AND role IN {value})',
            'LIKE' => 
            array (
              'leftJoins' => 
              array (
                0 => 'opportunities',
              ),
              'sql' => 'opportunitiesMiddle.role LIKE {value}',
              'distinct' => true,
            ),
            'IS NULL' => 
            array (
              'leftJoins' => 
              array (
                0 => 'opportunities',
              ),
              'sql' => 'opportunitiesMiddle.role IS NULL',
              'distinct' => true,
            ),
            'IS NOT NULL' => 'contact.id NOT IN (SELECT contact_id FROM contact_opportunity WHERE deleted = 0 AND role IS NULL)',
          ),
          'view' => 'crm:views/contact/fields/opportunity-role',
        ),
        'acceptanceStatus' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'exportDisabled' => true,
          'disabled' => true,
        ),
        'acceptanceStatusMeetings' => 
        array (
          'type' => 'enum',
          'notStorable' => true,
          'layoutAvailabilityList' => 
          array (
            0 => 'filters',
          ),
          'importDisabled' => true,
          'exportDisabled' => true,
          'view' => 'crm:views/lead/fields/acceptance-status',
          'link' => 'meetings',
          'column' => 'status',
        ),
        'acceptanceStatusCalls' => 
        array (
          'type' => 'enum',
          'notStorable' => true,
          'layoutAvailabilityList' => 
          array (
            0 => 'filters',
          ),
          'importDisabled' => true,
          'exportDisabled' => true,
          'view' => 'crm:views/lead/fields/acceptance-status',
          'link' => 'calls',
          'column' => 'status',
        ),
        'campaign' => 
        array (
          'type' => 'link',
          'layoutListDisabled' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'targetLists' => 
        array (
          'type' => 'linkMultiple',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'importDisabled' => true,
          'noLoad' => true,
        ),
        'targetList' => 
        array (
          'type' => 'link',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutFiltersDisabled' => true,
          'exportDisabled' => true,
          'entity' => 'TargetList',
          'directAccessDisabled' => true,
        ),
        'portalUser' => 
        array (
          'type' => 'link',
          'layoutMassUpdateDisabled' => true,
          'layoutListDisabled' => true,
          'readOnly' => true,
          'notStorable' => true,
          'view' => 'views/fields/link-one',
        ),
        'originalLead' => 
        array (
          'type' => 'link',
          'layoutMassUpdateDisabled' => true,
          'layoutListDisabled' => true,
          'readOnly' => true,
          'view' => 'views/fields/link-one',
        ),
        'targetListIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'stream' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'addressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'account' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Account',
        ),
        'accounts' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Account',
          'foreign' => 'contacts',
          'additionalColumns' => 
          array (
            'role' => 
            array (
              'type' => 'varchar',
              'len' => 100,
            ),
            'isInactive' => 
            array (
              'type' => 'bool',
              'default' => false,
            ),
          ),
          'additionalAttributeList' => 
          array (
            0 => 'columns',
          ),
          'layoutRelationshipsDisabled' => true,
        ),
        'opportunities' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Opportunity',
          'foreign' => 'contacts',
        ),
        'casesPrimary' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Case',
          'foreign' => 'contact',
          'layoutRelationshipsDisabled' => true,
        ),
        'cases' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Case',
          'foreign' => 'contacts',
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'contacts',
          'layoutRelationshipsDisabled' => true,
          'audited' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'contacts',
          'layoutRelationshipsDisabled' => true,
          'audited' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
          'audited' => true,
        ),
        'emails' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Email',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'campaign' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Campaign',
          'foreign' => 'contacts',
          'noJoin' => true,
        ),
        'campaignLogRecords' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'CampaignLogRecord',
          'foreign' => 'parent',
        ),
        'targetLists' => 
        array (
          'type' => 'hasMany',
          'entity' => 'TargetList',
          'foreign' => 'contacts',
        ),
        'portalUser' => 
        array (
          'type' => 'hasOne',
          'entity' => 'User',
          'foreign' => 'contact',
        ),
        'originalLead' => 
        array (
          'type' => 'hasOne',
          'entity' => 'Lead',
          'foreign' => 'createdContact',
        ),
        'documents' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Document',
          'foreign' => 'contacts',
          'audited' => true,
        ),
        'tasksPrimary' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Task',
          'foreign' => 'contact',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
          1 => 'emailAddress',
        ),
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'createdAt' => 
        array (
          'columns' => 
          array (
            0 => 'createdAt',
            1 => 'deleted',
          ),
        ),
        'firstName' => 
        array (
          'columns' => 
          array (
            0 => 'firstName',
            1 => 'deleted',
          ),
        ),
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'firstName',
            1 => 'lastName',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'Document' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'view' => 'crm:views/document/fields/name',
          'trim' => true,
        ),
        'file' => 
        array (
          'type' => 'file',
          'required' => true,
          'view' => 'crm:views/document/fields/file',
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Active',
            1 => 'Draft',
            2 => 'Expired',
            3 => 'Canceled',
          ),
          'style' => 
          array (
            'Canceled' => 'danger',
            'Expired' => 'danger',
          ),
        ),
        'type' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'Contract',
            2 => 'NDA',
            3 => 'EULA',
            4 => 'License Agreement',
          ),
        ),
        'publishDate' => 
        array (
          'type' => 'date',
          'required' => true,
          'default' => 'javascript: return this.dateTime.getToday();',
        ),
        'expirationDate' => 
        array (
          'type' => 'date',
          'after' => 'publishDate',
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'accounts' => 
        array (
          'type' => 'linkMultiple',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'importDisabled' => true,
          'noLoad' => true,
        ),
        'folder' => 
        array (
          'type' => 'link',
          'view' => 'views/fields/link-category-tree',
        ),
      ),
      'links' => 
      array (
        'accounts' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Account',
          'foreign' => 'documents',
        ),
        'opportunities' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Opportunity',
          'foreign' => 'documents',
        ),
        'leads' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Lead',
          'foreign' => 'documents',
        ),
        'contacts' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Contact',
          'foreign' => 'documents',
        ),
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'folder' => 
        array (
          'type' => 'belongsTo',
          'foreign' => 'documents',
          'entity' => 'DocumentFolder',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
    ),
    'DocumentFolder' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'parent' => 
        array (
          'type' => 'link',
        ),
        'childList' => 
        array (
          'type' => 'jsonArray',
          'notStorable' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'parent' => 
        array (
          'type' => 'belongsTo',
          'foreign' => 'children',
          'entity' => 'DocumentFolder',
        ),
        'children' => 
        array (
          'type' => 'hasMany',
          'foreign' => 'parent',
          'entity' => 'DocumentFolder',
        ),
        'documents' => 
        array (
          'type' => 'hasMany',
          'foreign' => 'folder',
          'entity' => 'Document',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'parent',
        'order' => 'asc',
        'sortBy' => 'parent',
        'asc' => true,
      ),
      'additionalTables' => 
      array (
        'DocumentFolderPath' => 
        array (
          'fields' => 
          array (
            'id' => 
            array (
              'type' => 'id',
              'dbType' => 'int',
              'len' => '11',
              'autoincrement' => true,
            ),
            'ascendorId' => 
            array (
              'type' => 'varchar',
              'len' => '100',
              'index' => true,
            ),
            'descendorId' => 
            array (
              'type' => 'varchar',
              'len' => '24',
              'index' => true,
            ),
          ),
        ),
      ),
    ),
    'EmailQueueItem' => 
    array (
      'fields' => 
      array (
        'massEmail' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Pending',
            1 => 'Sent',
            2 => 'Failed',
            3 => 'Sending',
          ),
          'readOnly' => true,
        ),
        'attemptCount' => 
        array (
          'type' => 'int',
          'readOnly' => true,
          'default' => 0,
        ),
        'target' => 
        array (
          'type' => 'linkParent',
          'readOnly' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'sentAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'varchar',
          'readOnly' => true,
        ),
        'isTest' => 
        array (
          'type' => 'bool',
        ),
      ),
      'links' => 
      array (
        'massEmail' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'MassEmail',
          'foreign' => 'queueItems',
        ),
        'target' => 
        array (
          'type' => 'belongsToParent',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
    ),
    'KnowledgeBaseArticle' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Draft',
            1 => 'In Review',
            2 => 'Published',
            3 => 'Archived',
          ),
          'view' => 'crm:views/knowledge-base-article/fields/status',
          'default' => 'Draft',
        ),
        'language' => 
        array (
          'type' => 'enum',
          'view' => 'crm:views/knowledge-base-article/fields/language',
          'default' => '',
          'customizationOptionsDisabled' => true,
        ),
        'type' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Article',
          ),
        ),
        'portals' => 
        array (
          'type' => 'linkMultiple',
          'tooltip' => true,
        ),
        'publishDate' => 
        array (
          'type' => 'date',
        ),
        'expirationDate' => 
        array (
          'type' => 'date',
          'after' => 'publishDate',
        ),
        'order' => 
        array (
          'type' => 'int',
          'disableFormatting' => true,
          'textFilterDisabled' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'categories' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/link-multiple-category-tree',
        ),
        'attachments' => 
        array (
          'type' => 'attachmentMultiple',
        ),
        'body' => 
        array (
          'type' => 'wysiwyg',
        ),
      ),
      'links' => 
      array (
        'cases' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Case',
          'foreign' => 'articles',
        ),
        'portals' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Portal',
          'foreign' => 'articles',
        ),
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'categories' => 
        array (
          'type' => 'hasMany',
          'foreign' => 'articles',
          'entity' => 'KnowledgeBaseCategory',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'order',
        'order' => 'asc',
        'sortBy' => 'order',
        'asc' => true,
      ),
    ),
    'KnowledgeBaseCategory' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'order' => 
        array (
          'type' => 'int',
          'required' => true,
          'disableFormatting' => true,
          'textFilterDisabled' => true,
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'parent' => 
        array (
          'type' => 'link',
        ),
        'childList' => 
        array (
          'type' => 'jsonArray',
          'notStorable' => true,
        ),
        'articlecount' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'categorycount' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'parent' => 
        array (
          'type' => 'belongsTo',
          'foreign' => 'children',
          'entity' => 'KnowledgeBaseCategory',
        ),
        'children' => 
        array (
          'type' => 'hasMany',
          'foreign' => 'parent',
          'entity' => 'KnowledgeBaseCategory',
        ),
        'articles' => 
        array (
          'type' => 'hasMany',
          'foreign' => 'categories',
          'entity' => 'KnowledgeBaseArticle',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'parent',
        'orderByColumn' => 'parentId',
        'order' => 'asc',
        'sortBy' => 'parent',
        'asc' => true,
      ),
      'additionalTables' => 
      array (
        'KnowledgeBaseCategoryPath' => 
        array (
          'fields' => 
          array (
            'id' => 
            array (
              'type' => 'id',
              'dbType' => 'int',
              'len' => '11',
              'autoincrement' => true,
            ),
            'ascendorId' => 
            array (
              'type' => 'varchar',
              'len' => '100',
              'index' => true,
            ),
            'descendorId' => 
            array (
              'type' => 'varchar',
              'len' => '24',
              'index' => true,
            ),
          ),
        ),
      ),
    ),
    'Lead' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'personName',
          'isPersonalData' => true,
        ),
        'salutationName' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Mr.',
            1 => 'Ms.',
            2 => 'Mrs.',
            3 => 'Dr.',
          ),
          'required' => true,
          'style' => 
          array (
            'Mr.' => NULL,
            'Ms.' => NULL,
            'Mrs.' => NULL,
            'Dr.' => NULL,
          ),
          'default' => 'Mr.',
        ),
        'firstName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 100,
          'default' => NULL,
          'required' => true,
          'options' => 
          array (
          ),
        ),
        'lastName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 100,
          'default' => NULL,
          'required' => true,
          'options' => 
          array (
          ),
        ),
        'title' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'New',
            1 => 'Assigned',
            2 => 'In Process',
            3 => 'Converted',
            4 => 'Recycled',
            5 => 'Dead',
            6 => 'Open',
            7 => 'Qualified',
          ),
          'default' => 'New',
          'style' => 
          array (
            'Converted' => 'success',
            'Recycled' => 'danger',
            'Dead' => 'danger',
            'New' => NULL,
            'Assigned' => NULL,
            'In Process' => NULL,
            'Open' => NULL,
            'Qualified' => NULL,
          ),
          'audited' => true,
          'fieldManagerAdditionalParamList' => 
          array (
            0 => 
            array (
              'name' => 'notActualOptions',
              'view' => 'views/admin/field-manager/fields/not-actual-options',
            ),
          ),
          'notActualOptions' => 
          array (
            0 => 'Converted',
            1 => 'Recycled',
            2 => 'Dead',
          ),
        ),
        'source' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Call',
            1 => 'Email',
            2 => 'Existing Customer',
            3 => 'Partner',
            4 => 'Public Relations',
            5 => 'Web Site',
            6 => 'Campaign',
            7 => 'Other',
          ),
          'default' => '',
        ),
        'industry' => 
        array (
          'type' => 'enum',
          'view' => 'crm:views/lead/fields/industry',
          'customizationOptionsDisabled' => true,
          'default' => '',
          'isSorted' => true,
        ),
        'opportunityAmount' => 
        array (
          'type' => 'currency',
          'audited' => true,
        ),
        'opportunityAmountConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'address' => 
        array (
          'type' => 'address',
          'isPersonalData' => true,
        ),
        'addressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'addressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'addressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'addressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'addressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
          'isPersonalData' => true,
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Mobile',
            1 => 'Office',
            2 => 'Home',
            3 => 'Fax',
            4 => 'Other',
          ),
          'defaultType' => 'Mobile',
          'isPersonalData' => true,
        ),
        'doNotCall' => 
        array (
          'type' => 'bool',
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'convertedAt' => 
        array (
          'type' => 'datetime',
          'layoutMassUpdateDisabled' => true,
          'readOnly' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'accountName' => 
        array (
          'type' => 'varchar',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'view' => 'views/fields/assigned-user',
        ),
        'acceptanceStatus' => 
        array (
          'type' => 'varchar',
          'notStorable' => true,
          'exportDisabled' => true,
          'disabled' => true,
        ),
        'acceptanceStatusMeetings' => 
        array (
          'type' => 'enum',
          'notStorable' => true,
          'layoutAvailabilityList' => 
          array (
            0 => 'filters',
          ),
          'importDisabled' => true,
          'exportDisabled' => true,
          'view' => 'crm:views/lead/fields/acceptance-status',
          'link' => 'meetings',
          'column' => 'status',
        ),
        'acceptanceStatusCalls' => 
        array (
          'type' => 'enum',
          'notStorable' => true,
          'layoutAvailabilityList' => 
          array (
            0 => 'filters',
          ),
          'importDisabled' => true,
          'exportDisabled' => true,
          'view' => 'crm:views/lead/fields/acceptance-status',
          'link' => 'calls',
          'column' => 'status',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'campaign' => 
        array (
          'type' => 'link',
          'layoutListDisabled' => true,
        ),
        'createdAccount' => 
        array (
          'type' => 'link',
          'layoutDetailDisabled' => true,
          'layoutMassUpdateDisabled' => true,
        ),
        'createdContact' => 
        array (
          'type' => 'link',
          'layoutDetailDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'view' => 'crm:views/lead/fields/created-contact',
        ),
        'createdOpportunity' => 
        array (
          'type' => 'link',
          'layoutDetailDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'view' => 'crm:views/lead/fields/created-opportunity',
        ),
        'targetLists' => 
        array (
          'type' => 'linkMultiple',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'importDisabled' => true,
          'noLoad' => true,
        ),
        'targetList' => 
        array (
          'type' => 'link',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutFiltersDisabled' => true,
          'entity' => 'TargetList',
          'directAccessDisabled' => true,
        ),
        'targetListIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'readOnly' => true,
          'disabled' => true,
        ),
        'leadType' => 
        array (
          'type' => 'enum',
          'required' => true,
          'options' => 
          array (
            0 => 'Hot Lead',
            1 => 'Cold Lead',
            2 => 'Warm Lead',
            3 => 'Dead Lead',
          ),
          'style' => 
          array (
            'Hot Lead' => NULL,
            'Cold Lead' => NULL,
            'Warm Lead' => NULL,
            'Dead Lead' => NULL,
          ),
          'isSorted' => true,
          'default' => 'Hot Lead',
          'isCustom' => true,
        ),
        'stream' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'opportunityAmountCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'addressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'leads',
          'layoutRelationshipsDisabled' => true,
          'audited' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'leads',
          'layoutRelationshipsDisabled' => true,
          'audited' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
          'audited' => true,
        ),
        'cases' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Case',
          'foreign' => 'lead',
          'audited' => true,
        ),
        'emails' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Email',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'createdAccount' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Account',
          'noJoin' => true,
          'foreign' => 'originalLead',
        ),
        'createdContact' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Contact',
          'noJoin' => true,
          'foreign' => 'originalLead',
        ),
        'createdOpportunity' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Opportunity',
          'noJoin' => true,
          'foreign' => 'originalLead',
        ),
        'campaign' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Campaign',
          'foreign' => 'leads',
          'noJoin' => true,
        ),
        'campaignLogRecords' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'CampaignLogRecord',
          'foreign' => 'parent',
        ),
        'targetLists' => 
        array (
          'type' => 'hasMany',
          'entity' => 'TargetList',
          'foreign' => 'leads',
        ),
        'documents' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Document',
          'foreign' => 'leads',
          'audited' => true,
        ),
      ),
      'convertEntityList' => 
      array (
        0 => 'Account',
        1 => 'Contact',
        2 => 'Opportunity',
      ),
      'convertFields' => 
      array (
        'Contact' => 
        array (
        ),
        'Account' => 
        array (
          'name' => 'accountName',
          'billingAddressStreet' => 'addressStreet',
          'billingAddressCity' => 'addressCity',
          'billingAddressState' => 'addressState',
          'billingAddressPostalCode' => 'addressPostalCode',
          'billingAddressCountry' => 'addressCountry',
        ),
        'Opportunity' => 
        array (
          'amount' => 'opportunityAmount',
          'leadSource' => 'source',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
          1 => 'accountName',
          2 => 'emailAddress',
        ),
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'firstName' => 
        array (
          'columns' => 
          array (
            0 => 'firstName',
            1 => 'deleted',
          ),
        ),
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'firstName',
            1 => 'lastName',
          ),
        ),
        'status' => 
        array (
          'columns' => 
          array (
            0 => 'status',
            1 => 'deleted',
          ),
        ),
        'createdAt' => 
        array (
          'columns' => 
          array (
            0 => 'createdAt',
            1 => 'deleted',
          ),
        ),
        'createdAtStatus' => 
        array (
          'columns' => 
          array (
            0 => 'createdAt',
            1 => 'status',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
        'assignedUserStatus' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'status',
          ),
        ),
      ),
    ),
    'MassEmail' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Draft',
            1 => 'Pending',
            2 => 'Complete',
            3 => 'In Process',
            4 => 'Failed',
          ),
          'default' => 'Pending',
        ),
        'storeSentEmails' => 
        array (
          'type' => 'bool',
          'default' => false,
          'tooltip' => true,
        ),
        'optOutEntirely' => 
        array (
          'type' => 'bool',
          'default' => false,
          'tooltip' => true,
        ),
        'fromAddress' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'view' => 'crm:views/mass-email/fields/from-address',
        ),
        'fromName' => 
        array (
          'type' => 'varchar',
        ),
        'replyToAddress' => 
        array (
          'type' => 'varchar',
          'trim' => true,
        ),
        'replyToName' => 
        array (
          'type' => 'varchar',
        ),
        'startAt' => 
        array (
          'type' => 'datetime',
          'required' => true,
        ),
        'emailTemplate' => 
        array (
          'type' => 'link',
          'required' => true,
          'view' => 'crm:views/mass-email/fields/email-template',
        ),
        'campaign' => 
        array (
          'type' => 'link',
        ),
        'targetLists' => 
        array (
          'type' => 'linkMultiple',
          'required' => true,
          'tooltip' => true,
        ),
        'excludingTargetLists' => 
        array (
          'type' => 'linkMultiple',
          'tooltip' => true,
        ),
        'inboundEmail' => 
        array (
          'type' => 'link',
        ),
        'smtpAccount' => 
        array (
          'type' => 'base',
          'notStorable' => true,
          'view' => 'crm:views/mass-email/fields/smtp-account',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'emailTemplate' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'EmailTemplate',
        ),
        'campaign' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Campaign',
          'foreign' => 'massEmails',
        ),
        'targetLists' => 
        array (
          'type' => 'hasMany',
          'entity' => 'TargetList',
          'foreign' => 'massEmails',
        ),
        'excludingTargetLists' => 
        array (
          'type' => 'hasMany',
          'entity' => 'TargetList',
          'foreign' => 'massEmailsExcluding',
          'relationName' => 'massEmailTargetListExcluding',
        ),
        'inboundEmail' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'InboundEmail',
        ),
        'queueItems' => 
        array (
          'type' => 'hasMany',
          'entity' => 'EmailQueueItem',
          'foreign' => 'massEmail',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
    ),
    'Meeting' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Planned',
            1 => 'Held',
            2 => 'Not Held',
          ),
          'default' => 'Planned',
          'style' => 
          array (
            'Held' => 'success',
          ),
          'audited' => true,
        ),
        'dateStart' => 
        array (
          'type' => 'datetimeOptional',
          'view' => 'crm:views/meeting/fields/date-start',
          'required' => true,
          'default' => 'javascript: return this.dateTime.getNow(15);',
          'audited' => true,
          'minuteStep' => 30,
        ),
        'dateEnd' => 
        array (
          'type' => 'datetimeOptional',
          'view' => 'crm:views/meeting/fields/date-end',
          'required' => true,
          'after' => 'dateStart',
          'minuteStep' => 30,
        ),
        'isAllDay' => 
        array (
          'type' => 'bool',
          'readOnly' => true,
          'layoutListDisabled' => true,
          'layoutDetailDisabled' => true,
          'layoutMassUpdateDisabled' => true,
        ),
        'duration' => 
        array (
          'type' => 'duration',
          'start' => 'dateStart',
          'end' => 'dateEnd',
          'options' => 
          array (
            0 => 900,
            1 => 1800,
            2 => 3600,
            3 => 7200,
            4 => 10800,
            5 => 86400,
          ),
          'default' => 3600,
          'notStorable' => true,
          'select' => 'TIMESTAMPDIFF(SECOND, meeting.date_start, meeting.date_end)',
          'orderBy' => 'duration {direction}',
        ),
        'reminders' => 
        array (
          'type' => 'jsonArray',
          'notStorable' => true,
          'view' => 'crm:views/meeting/fields/reminders',
          'layoutListDisabled' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'parent' => 
        array (
          'type' => 'linkParent',
          'entityList' => 
          array (
            0 => 'Account',
            1 => 'Contact',
            2 => 'Lead',
            3 => 'Opportunity',
            4 => 'Case',
            5 => 'ImportResult',
          ),
        ),
        'account' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'acceptanceStatus' => 
        array (
          'type' => 'enum',
          'notStorable' => true,
          'options' => 
          array (
            0 => 'None',
            1 => 'Accepted',
            2 => 'Tentative',
            3 => 'Declined',
          ),
          'style' => 
          array (
            'Accepted' => 'success',
            'Declined' => 'danger',
            'Tentative' => 'warning',
          ),
          'layoutDetailDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'importDisabled' => true,
          'exportDisabled' => true,
          'where' => 
          array (
            '=' => 
            array (
              'leftJoins' => 
              array (
                0 => 'users',
                1 => 'contacts',
                2 => 'leads',
              ),
              'sql' => 'contactsMiddle.status = {value} OR leadsMiddle.status = {value} OR usersMiddle.status = {value}',
              'distinct' => true,
            ),
            '<>' => 'meeting.id NOT IN (SELECT meeting_id FROM contact_meeting WHERE deleted = 0 AND status = {value}) AND meeting.id NOT IN (SELECT meeting_id FROM meeting_user WHERE deleted = 0 AND status = {value}) AND meeting.id NOT IN (SELECT meeting_id FROM lead_meeting WHERE deleted = 0 AND status = {value})',
            'IN' => 
            array (
              'leftJoins' => 
              array (
                0 => 'users',
                1 => 'leads',
                2 => 'contacts',
              ),
              'sql' => 'contactsMiddle.status IN {value} OR leadsMiddle.status IN {value} OR usersMiddle.status IN {value}',
              'distinct' => true,
            ),
            'NOT IN' => 'meeting.id NOT IN (SELECT meeting_id FROM contact_meeting WHERE deleted = 0 AND status IN {value}) AND meeting.id NOT IN (SELECT meeting_id FROM meeting_user WHERE deleted = 0 AND status IN {value}) AND meeting.id NOT IN (SELECT meeting_id FROM lead_meeting WHERE deleted = 0 AND status IN {value})',
            'IS NULL' => 
            array (
              'leftJoins' => 
              array (
                0 => 'users',
                1 => 'contacts',
                2 => 'leads',
              ),
              'sql' => 'contactsMiddle.status IS NULL AND leadsMiddle.status IS NULL AND usersMiddle.status IS NULL',
              'distinct' => true,
            ),
            'IS NOT NULL' => 'meeting.id NOT IN (SELECT meeting_id FROM contact_meeting WHERE deleted = 0 AND status IS NULL) OR meeting.id NOT IN (SELECT meeting_id FROM meeting_user WHERE deleted = 0 AND status IS NULL) OR meeting.id NOT IN (SELECT meeting_id FROM lead_meeting WHERE deleted = 0 AND status IS NULL)',
          ),
          'view' => 'crm:views/meeting/fields/acceptance-status',
        ),
        'users' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'crm:views/meeting/fields/users',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'columns' => 
          array (
            'status' => 'acceptanceStatus',
          ),
          'additionalAttributeList' => 
          array (
            0 => 'columns',
          ),
          'orderBy' => 'name',
        ),
        'contacts' => 
        array (
          'type' => 'linkMultiple',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'view' => 'crm:views/meeting/fields/contacts',
          'columns' => 
          array (
            'status' => 'acceptanceStatus',
          ),
          'additionalAttributeList' => 
          array (
            0 => 'columns',
          ),
          'orderBy' => 'name',
        ),
        'leads' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'crm:views/meeting/fields/attendees',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'columns' => 
          array (
            'status' => 'acceptanceStatus',
          ),
          'additionalAttributeList' => 
          array (
            0 => 'columns',
          ),
          'orderBy' => 'name',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => true,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'stream' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'dateStartDate' => 
        array (
          'type' => 'date',
          'disabled' => true,
        ),
        'dateEndDate' => 
        array (
          'type' => 'date',
          'disabled' => true,
        ),
      ),
      'links' => 
      array (
        'account' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Account',
        ),
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'users' => 
        array (
          'type' => 'hasMany',
          'entity' => 'User',
          'foreign' => 'meetings',
          'additionalColumns' => 
          array (
            'status' => 
            array (
              'type' => 'varchar',
              'len' => '36',
              'default' => 'None',
            ),
          ),
        ),
        'contacts' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Contact',
          'foreign' => 'meetings',
          'additionalColumns' => 
          array (
            'status' => 
            array (
              'type' => 'varchar',
              'len' => '36',
              'default' => 'None',
            ),
          ),
        ),
        'leads' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Lead',
          'foreign' => 'meetings',
          'additionalColumns' => 
          array (
            'status' => 
            array (
              'type' => 'varchar',
              'len' => '36',
              'default' => 'None',
            ),
          ),
        ),
        'parent' => 
        array (
          'type' => 'belongsToParent',
          'foreign' => 'meetings',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'dateStart',
        'order' => 'desc',
        'sortBy' => 'dateStart',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'dateStartStatus' => 
        array (
          'columns' => 
          array (
            0 => 'dateStart',
            1 => 'status',
          ),
        ),
        'dateStart' => 
        array (
          'columns' => 
          array (
            0 => 'dateStart',
            1 => 'deleted',
          ),
        ),
        'status' => 
        array (
          'columns' => 
          array (
            0 => 'status',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
        'assignedUserStatus' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'status',
          ),
        ),
      ),
    ),
    'Opportunity' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'amount' => 
        array (
          'type' => 'currency',
          'required' => true,
          'audited' => true,
        ),
        'amountConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
        'amountWeightedConverted' => 
        array (
          'type' => 'float',
          'readOnly' => true,
          'notStorable' => true,
          'select' => 
          array (
            'sql' => 'opportunity.amount * amountCurrencyRate.rate * opportunity.probability / 100',
            'leftJoins' => 
            array (
              0 => 
              array (
                0 => 'Currency',
                1 => 'amountCurrencyRate',
                2 => 
                array (
                  'amountCurrencyRate.id:' => 'amountCurrency',
                ),
              ),
            ),
          ),
          'where' => 
          array (
            '=' => 
            array (
              'sql' => '(opportunity.amount * amountCurrencyRate.rate * opportunity.probability / 100) = {value}',
              'leftJoins' => 
              array (
                0 => 
                array (
                  0 => 'Currency',
                  1 => 'amountCurrencyRate',
                  2 => 
                  array (
                    'amountCurrencyRate.id:' => 'amountCurrency',
                  ),
                ),
              ),
            ),
            '<' => 
            array (
              'sql' => '(opportunity.amount * amountCurrencyRate.rate * opportunity.probability / 100) < {value}',
              'leftJoins' => 
              array (
                0 => 
                array (
                  0 => 'Currency',
                  1 => 'amountCurrencyRate',
                  2 => 
                  array (
                    'amountCurrencyRate.id:' => 'amountCurrency',
                  ),
                ),
              ),
            ),
            '>' => 
            array (
              'sql' => '(opportunity.amount * amountCurrencyRate.rate * opportunity.probability / 100) > {value}',
              'leftJoins' => 
              array (
                0 => 
                array (
                  0 => 'Currency',
                  1 => 'amountCurrencyRate',
                  2 => 
                  array (
                    'amountCurrencyRate.id:' => 'amountCurrency',
                  ),
                ),
              ),
            ),
            '<=' => 
            array (
              'sql' => '(opportunity.amount * amountCurrencyRate.rate * opportunity.probability / 100) <= {value}',
              'leftJoins' => 
              array (
                0 => 
                array (
                  0 => 'Currency',
                  1 => 'amountCurrencyRate',
                  2 => 
                  array (
                    'amountCurrencyRate.id:' => 'amountCurrency',
                  ),
                ),
              ),
            ),
            '>=' => 
            array (
              'sql' => '(opportunity.amount * amountCurrencyRate.rate * opportunity.probability / 100) >= {value}',
              'leftJoins' => 
              array (
                0 => 
                array (
                  0 => 'Currency',
                  1 => 'amountCurrencyRate',
                  2 => 
                  array (
                    'amountCurrencyRate.id:' => 'amountCurrency',
                  ),
                ),
              ),
            ),
            '<>' => 
            array (
              'sql' => '(opportunity.amount * amountCurrencyRate.rate * opportunity.probability / 100) <> {value}',
              'leftJoins' => 
              array (
                0 => 
                array (
                  0 => 'Currency',
                  1 => 'amountCurrencyRate',
                  2 => 
                  array (
                    'amountCurrencyRate.id:' => 'amountCurrency',
                  ),
                ),
              ),
            ),
            'IS NULL' => 
            array (
              'sql' => 'opportunity.amount IS NULL',
              'leftJoins' => 
              array (
                0 => 
                array (
                  0 => 'Currency',
                  1 => 'amountCurrencyRate',
                  2 => 
                  array (
                    'amountCurrencyRate.id:' => 'amountCurrency',
                  ),
                ),
              ),
            ),
            'IS NOT NULL' => 
            array (
              'sql' => 'opportunity.amount IS NOT NULL',
              'leftJoins' => 
              array (
                0 => 
                array (
                  0 => 'Currency',
                  1 => 'amountCurrencyRate',
                  2 => 
                  array (
                    'amountCurrencyRate.id:' => 'amountCurrency',
                  ),
                ),
              ),
            ),
          ),
          'orderBy' => 
          array (
            'sql' => 'amountWeightedConverted {direction}',
            'leftJoins' => 
            array (
              0 => 
              array (
                0 => 'Currency',
                1 => 'amountCurrencyRate',
                2 => 
                array (
                  'amountCurrencyRate.id:' => 'amountCurrency',
                ),
              ),
            ),
          ),
          'view' => 'views/fields/currency-converted',
        ),
        'account' => 
        array (
          'type' => 'link',
        ),
        'contacts' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'crm:views/opportunity/fields/contacts',
          'columns' => 
          array (
            'role' => 'opportunityRole',
          ),
          'additionalAttributeList' => 
          array (
            0 => 'columns',
          ),
          'orderBy' => 'name',
        ),
        'stage' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Unqualified',
            1 => 'Qualified',
            2 => 'Proposal',
            3 => 'Negotiation',
            4 => 'Closed Won',
            5 => 'Closed Lost',
          ),
          'view' => 'crm:views/opportunity/fields/stage',
          'default' => 'Unqualified',
          'audited' => true,
          'probabilityMap' => 
          array (
            'Prospecting' => 10,
            'Qualification' => 20,
            'Proposal' => 50,
            'Negotiation' => 80,
            'Closed Won' => 100,
            'Closed Lost' => 0,
            'Unqualified' => 10,
            'Qualified' => 20,
          ),
          'style' => 
          array (
            'Closed Won' => 'success',
            'Closed Lost' => 'danger',
            'Unqualified' => NULL,
            'Qualified' => NULL,
            'Proposal' => NULL,
            'Negotiation' => NULL,
          ),
          'fieldManagerAdditionalParamList' => 
          array (
            0 => 
            array (
              'name' => 'probabilityMap',
              'view' => 'crm:views/opportunity/admin/field-manager/fields/probability-map',
            ),
          ),
          'isSorted' => false,
        ),
        'lastStage' => 
        array (
          'type' => 'enum',
          'view' => 'crm:views/opportunity/fields/last-stage',
          'customizationOptionsDisabled' => true,
          'customizationDefaultDisabled' => true,
        ),
        'probability' => 
        array (
          'type' => 'int',
          'required' => true,
          'min' => 0,
          'max' => 100,
        ),
        'leadSource' => 
        array (
          'type' => 'enum',
          'view' => 'crm:views/opportunity/fields/lead-source',
          'customizationOptionsDisabled' => true,
          'translation' => 'Lead.options.source',
          'default' => '',
        ),
        'closeDate' => 
        array (
          'type' => 'date',
          'required' => true,
          'audited' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'campaign' => 
        array (
          'type' => 'link',
        ),
        'originalLead' => 
        array (
          'type' => 'link',
          'layoutMassUpdateDisabled' => true,
          'layoutListDisabled' => true,
          'readOnly' => true,
          'view' => 'views/fields/link-one',
        ),
        'contactRole' => 
        array (
          'type' => 'enum',
          'notStorable' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDetailDisabled' => true,
          'layoutAvailabilityList' => 
          array (
            0 => 'listForContact',
          ),
          'customizationDefaultDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'where' => 
          array (
            '=' => 
            array (
              'leftJoins' => 
              array (
                0 => 'contacts',
              ),
              'sql' => 'contactsMiddle.role = {value}',
              'distinct' => true,
            ),
            '<>' => 'opportunity.id NOT IN (SELECT opportunity_id FROM contact_opportunity WHERE deleted = 0 AND role = {value})',
            'IN' => 
            array (
              'leftJoins' => 
              array (
                0 => 'contacts',
              ),
              'sql' => 'contactsMiddle.role IN {value}',
              'distinct' => true,
            ),
            'NOT IN' => 'opportunity.id NOT IN (SELECT opportunity_id FROM contact_opportunity WHERE deleted = 0 AND role IN {value})',
            'LIKE' => 
            array (
              'leftJoins' => 
              array (
                0 => 'contacts',
              ),
              'sql' => 'contactsMiddle.role LIKE {value}',
              'distinct' => true,
            ),
            'IS NULL' => 
            array (
              'leftJoins' => 
              array (
                0 => 'contacts',
              ),
              'sql' => 'contactsMiddle.role IS NULL',
              'distinct' => true,
            ),
            'IS NOT NULL' => 'opportunity.id NOT IN (SELECT opportunity_id FROM contact_opportunity WHERE deleted = 0 AND role IS NULL)',
          ),
          'view' => 'crm:views/opportunity/fields/contact-role',
          'customizationOptionsDisabled' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'lossReason' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'None',
            1 => 'Lost to Competitor',
            2 => 'No Budget',
            3 => 'No Response',
            4 => 'Pricing',
          ),
          'style' => 
          array (
            'None' => NULL,
            'Lost to Competitor' => NULL,
            'No Budget' => NULL,
            'No Response' => NULL,
            'Pricing' => NULL,
          ),
          'default' => 'None',
          'isCustom' => true,
        ),
        'stream' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'amountCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'account' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Account',
          'foreign' => 'opportunities',
        ),
        'contacts' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Contact',
          'foreign' => 'opportunities',
          'additionalColumns' => 
          array (
            'role' => 
            array (
              'type' => 'varchar',
              'len' => 50,
            ),
          ),
        ),
        'meetings' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
          'audited' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
          'audited' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
          'audited' => true,
        ),
        'emails' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Email',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'documents' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Document',
          'foreign' => 'opportunities',
          'audited' => true,
        ),
        'campaign' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Campaign',
          'foreign' => 'opportunities',
          'noJoin' => true,
        ),
        'originalLead' => 
        array (
          'type' => 'hasOne',
          'entity' => 'Lead',
          'foreign' => 'createdOpportunity',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'stage' => 
        array (
          'columns' => 
          array (
            0 => 'stage',
            1 => 'deleted',
          ),
        ),
        'lastStage' => 
        array (
          'columns' => 
          array (
            0 => 'lastStage',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
        'createdAt' => 
        array (
          'columns' => 
          array (
            0 => 'createdAt',
            1 => 'deleted',
          ),
        ),
        'createdAtStage' => 
        array (
          'columns' => 
          array (
            0 => 'createdAt',
            1 => 'stage',
          ),
        ),
        'assignedUserStage' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'stage',
          ),
        ),
      ),
    ),
    'Reminder' => 
    array (
      'fields' => 
      array (
        'remindAt' => 
        array (
          'type' => 'datetime',
          'index' => true,
        ),
        'startAt' => 
        array (
          'type' => 'datetime',
          'index' => true,
        ),
        'type' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Popup',
            1 => 'Email',
          ),
          'maxLength' => 36,
          'index' => true,
          'default' => 'Popup',
        ),
        'seconds' => 
        array (
          'type' => 'enumInt',
          'options' => 
          array (
            0 => 0,
            1 => 60,
            2 => 120,
            3 => 300,
            4 => 600,
            5 => 900,
            6 => 1800,
            7 => 3600,
            8 => 7200,
            9 => 10800,
            10 => 18000,
            11 => 86400,
            12 => 172800,
            13 => 259200,
            14 => 432000,
          ),
          'default' => 0,
        ),
        'entityType' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
        ),
        'entityId' => 
        array (
          'type' => 'varchar',
          'maxLength' => 50,
        ),
        'userId' => 
        array (
          'type' => 'varchar',
          'maxLength' => 50,
        ),
        'isSubmitted' => 
        array (
          'type' => 'bool',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'remindAt',
        'order' => 'desc',
        'sortBy' => 'remindAt',
        'asc' => false,
      ),
    ),
    'Target' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'personName',
        ),
        'salutationName' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'Mr.',
            2 => 'Mrs.',
            3 => 'Ms.',
            4 => 'Dr.',
            5 => 'Drs.',
          ),
        ),
        'firstName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 100,
          'default' => '',
        ),
        'lastName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 100,
          'required' => true,
          'default' => '',
        ),
        'title' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
        ),
        'accountName' => 
        array (
          'type' => 'varchar',
          'maxLength' => 100,
        ),
        'website' => 
        array (
          'type' => 'url',
        ),
        'address' => 
        array (
          'type' => 'address',
        ),
        'addressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'addressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'addressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'addressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'addressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Mobile',
            1 => 'Office',
            2 => 'Home',
            3 => 'Fax',
            4 => 'Other',
          ),
          'defaultType' => 'Mobile',
        ),
        'doNotCall' => 
        array (
          'type' => 'bool',
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'addressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'firstName' => 
        array (
          'columns' => 
          array (
            0 => 'firstName',
            1 => 'deleted',
          ),
        ),
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'firstName',
            1 => 'lastName',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'TargetList' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'entryCount' => 
        array (
          'type' => 'int',
          'readOnly' => true,
          'notStorable' => true,
          'layoutFiltersDisabled' => true,
          'layoutMassUpdateDisabled' => true,
        ),
        'optedOutCount' => 
        array (
          'type' => 'int',
          'readOnly' => true,
          'notStorable' => true,
          'layoutListDisabled' => true,
          'layoutFiltersDisabled' => true,
          'layoutMassUpdateDisabled' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'campaigns' => 
        array (
          'type' => 'link',
        ),
        'includingActionList' => 
        array (
          'type' => 'multiEnum',
          'view' => 'crm:views/target-list/fields/including-action-list',
          'layoutDetailDisabled' => true,
          'layoutFiltersDisabled' => true,
          'layoutLinkDisabled' => true,
          'notStorable' => true,
          'disabled' => true,
        ),
        'excludingActionList' => 
        array (
          'type' => 'multiEnum',
          'view' => 'crm:views/target-list/fields/including-action-list',
          'layoutDetailDisabled' => true,
          'layoutFiltersDisabled' => true,
          'layoutLinkDisabled' => true,
          'notStorable' => true,
          'disabled' => true,
        ),
        'targetStatus' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Listed',
            1 => 'Opted Out',
          ),
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'layoutDetailDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'exportDisabled' => true,
          'importDisabled' => true,
          'view' => 'crm:views/target-list/fields/target-status',
        ),
        'isOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'layoutDetailDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'campaigns' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Campaign',
          'foreign' => 'targetLists',
        ),
        'massEmails' => 
        array (
          'type' => 'hasMany',
          'entity' => 'MassEmail',
          'foreign' => 'targetLists',
        ),
        'campaignsExcluding' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Campaign',
          'foreign' => 'excludingTargetLists',
        ),
        'massEmailsExcluding' => 
        array (
          'type' => 'hasMany',
          'entity' => 'MassEmail',
          'foreign' => 'excludingTargetLists',
        ),
        'accounts' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Account',
          'foreign' => 'targetLists',
          'additionalColumns' => 
          array (
            'optedOut' => 
            array (
              'type' => 'bool',
            ),
          ),
        ),
        'contacts' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Contact',
          'foreign' => 'targetLists',
          'additionalColumns' => 
          array (
            'optedOut' => 
            array (
              'type' => 'bool',
            ),
          ),
        ),
        'leads' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Lead',
          'foreign' => 'targetLists',
          'additionalColumns' => 
          array (
            'optedOut' => 
            array (
              'type' => 'bool',
            ),
          ),
        ),
        'users' => 
        array (
          'type' => 'hasMany',
          'entity' => 'User',
          'foreign' => 'targetLists',
          'additionalColumns' => 
          array (
            'optedOut' => 
            array (
              'type' => 'bool',
            ),
          ),
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'createdAt' => 
        array (
          'columns' => 
          array (
            0 => 'createdAt',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'Task' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Open',
            1 => 'Started',
            2 => 'Completed',
          ),
          'style' => 
          array (
            'Completed' => 'completed',
            'Started' => 'started',
            'Open' => 'open',
          ),
          'default' => 'Open',
          'audited' => true,
          'fieldManagerAdditionalParamList' => 
          array (
            0 => 
            array (
              'name' => 'notActualOptions',
              'view' => 'views/admin/field-manager/fields/not-actual-options',
            ),
          ),
          'notActualOptions' => 
          array (
            0 => 'Completed',
            1 => 'Canceled',
            2 => 'Deferred',
          ),
          'required' => false,
          'isSorted' => false,
          'readOnly' => false,
          'tooltip' => false,
        ),
        'priority' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Low',
            1 => 'Normal',
            2 => 'High',
            3 => 'Urgent',
          ),
          'default' => 'Normal',
          'displayAsLabel' => true,
          'style' => 
          array (
            'High' => 'high',
            'Urgent' => 'urgent',
            'Low' => 'low',
            'Normal' => 'normal',
          ),
          'audited' => true,
        ),
        'dateStart' => 
        array (
          'type' => 'datetimeOptional',
          'before' => NULL,
          'notNull' => false,
          'required' => true,
          'useNumericFormat' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'minuteStep' => 30,
        ),
        'dateEnd' => 
        array (
          'type' => 'datetimeOptional',
          'after' => NULL,
          'view' => 'crm:views/task/fields/date-end',
          'audited' => true,
          'notNull' => false,
          'required' => true,
          'useNumericFormat' => false,
          'readOnly' => false,
          'tooltip' => false,
          'minuteStep' => 30,
        ),
        'dateStartDate' => 
        array (
          'readOnly' => false,
          'type' => 'date',
          'disabled' => true,
        ),
        'dateEndDate' => 
        array (
          'readOnly' => false,
          'type' => 'date',
          'disabled' => true,
        ),
        'dateCompleted' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'isOverdue' => 
        array (
          'type' => 'bool',
          'readOnly' => true,
          'notStorable' => true,
          'view' => 'crm:views/task/fields/is-overdue',
          'disabled' => true,
        ),
        'reminders' => 
        array (
          'type' => 'jsonArray',
          'notStorable' => true,
          'view' => 'crm:views/meeting/fields/reminders',
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'parent' => 
        array (
          'type' => 'linkParent',
          'entityList' => 
          array (
            0 => 'Account',
            1 => 'Contact',
            2 => 'Lead',
            3 => 'Opportunity',
            4 => 'Case',
            5 => 'ImportResult',
          ),
        ),
        'account' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'contact' => 
        array (
          'type' => 'link',
          'readOnly' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => true,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'attachments' => 
        array (
          'type' => 'attachmentMultiple',
          'sourceList' => 
          array (
            0 => 'Document',
          ),
        ),
        'createRecurringSeriesOfTasks' => 
        array (
          'notNull' => true,
          'type' => 'bool',
          'default' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
        ),
        'startDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'required' => false,
          'useNumericFormat' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
        ),
        'endDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'required' => false,
          'useNumericFormat' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
          'after' => NULL,
        ),
        'frequency' => 
        array (
          'type' => 'enum',
          'required' => false,
          'options' => 
          array (
            0 => 'Daily',
            1 => 'Weekly',
            2 => 'Monthly',
            3 => 'Custom',
          ),
          'default' => 'Daily',
          'isSorted' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
          'style' => 
          array (
            'Daily' => NULL,
            'Weekly' => NULL,
            'Monthly' => NULL,
            'Custom' => NULL,
          ),
        ),
        'repeat' => 
        array (
          'type' => 'enum',
          'required' => false,
          'options' => 
          array (
            0 => 'Every day',
          ),
          'default' => 'Every day',
          'isSorted' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
          'style' => 
          array (
            'Every day' => NULL,
          ),
        ),
        'weeklyrepeat' => 
        array (
          'type' => 'enum',
          'required' => false,
          'options' => 
          array (
            0 => 'Every week',
            1 => 'Custom',
          ),
          'default' => 'Every week',
          'isSorted' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
          'style' => 
          array (
            'Every week' => NULL,
            'Custom' => NULL,
          ),
        ),
        'weeklyrepeatOn' => 
        array (
          'type' => 'enum',
          'required' => false,
          'options' => 
          array (
            0 => 'Monday',
            1 => 'Tuesday',
            2 => 'Wednesday',
            3 => 'Thursday',
            4 => 'Friday',
            5 => 'Saturday',
            6 => 'Sunday',
          ),
          'default' => 'Monday',
          'isSorted' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
          'style' => 
          array (
            'Monday' => NULL,
            'Tuesday' => NULL,
            'Wednesday' => NULL,
            'Thursday' => NULL,
            'Friday' => NULL,
            'Saturday' => NULL,
            'Sunday' => NULL,
          ),
        ),
        'weeklystartDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'required' => false,
          'useNumericFormat' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
        ),
        'weeklyendDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'required' => false,
          'useNumericFormat' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
          'after' => NULL,
        ),
        'monthlyRepeatOn' => 
        array (
          'type' => 'enum',
          'required' => false,
          'options' => 
          array (
            0 => '01',
            1 => '02',
            2 => '03',
            3 => '04',
            4 => '05',
            5 => '06',
            6 => '07',
            7 => '08',
            8 => '09',
            9 => '10',
            10 => '11',
            11 => '12',
            12 => '13',
            13 => '14',
            14 => '15',
            15 => '16',
            16 => '17',
            17 => '18',
            18 => '19',
            19 => '20',
            20 => '21',
            21 => '22',
            22 => '23',
            23 => '24',
            24 => '25',
            25 => '26',
            26 => '27',
            27 => '28',
            28 => '29',
            29 => '30',
            30 => '31',
          ),
          'default' => '01',
          'isSorted' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
          'style' => 
          array (
            10 => NULL,
            11 => NULL,
            12 => NULL,
            13 => NULL,
            14 => NULL,
            15 => NULL,
            16 => NULL,
            17 => NULL,
            18 => NULL,
            19 => NULL,
            20 => NULL,
            21 => NULL,
            22 => NULL,
            23 => NULL,
            24 => NULL,
            25 => NULL,
            26 => NULL,
            27 => NULL,
            28 => NULL,
            29 => NULL,
            30 => NULL,
            31 => NULL,
            '01' => NULL,
            '02' => NULL,
            '03' => NULL,
            '04' => NULL,
            '05' => NULL,
            '06' => NULL,
            '07' => NULL,
            '08' => NULL,
            '09' => NULL,
          ),
        ),
        'monthlyStartDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'required' => false,
          'useNumericFormat' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
        ),
        'monthlyEndDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'required' => false,
          'useNumericFormat' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
          'after' => NULL,
        ),
        'monthlyRepeat' => 
        array (
          'type' => 'enum',
          'required' => false,
          'options' => 
          array (
            0 => 'Every Month',
            1 => 'Custom',
          ),
          'default' => 'Every Month',
          'isSorted' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
          'style' => 
          array (
            'Every Month' => NULL,
            'Custom' => NULL,
          ),
        ),
        'numberOfRecurringTasks' => 
        array (
          'type' => 'enum',
          'required' => false,
          'options' => 
          array (
            0 => '1',
            1 => '2',
            2 => '3',
            3 => '4',
            4 => '5',
            5 => '6',
          ),
          'default' => '1',
          'isSorted' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
          'style' => 
          array (
            1 => NULL,
            2 => NULL,
            3 => NULL,
            4 => NULL,
            5 => NULL,
            6 => NULL,
          ),
        ),
        'customStartDate1' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'required' => false,
          'useNumericFormat' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
        ),
        'customStartDate2' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'required' => false,
          'useNumericFormat' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
        ),
        'customStartDate3' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'required' => false,
          'useNumericFormat' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
        ),
        'customStartDate4' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'required' => false,
          'useNumericFormat' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
        ),
        'customStartDate5' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'required' => false,
          'useNumericFormat' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
        ),
        'customStartDate6' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'required' => false,
          'useNumericFormat' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
          'isCustom' => true,
        ),
        'completedAt' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'closedAt' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'stream' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
          'foreign' => 'tasks',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'entityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'parent' => 
        array (
          'type' => 'belongsToParent',
          'foreign' => 'tasks',
        ),
        'account' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Account',
        ),
        'contact' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'Contact',
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'dateStartStatus' => 
        array (
          'columns' => 
          array (
            0 => 'dateStart',
            1 => 'status',
          ),
        ),
        'dateEndStatus' => 
        array (
          'columns' => 
          array (
            0 => 'dateEnd',
            1 => 'status',
          ),
        ),
        'dateStart' => 
        array (
          'columns' => 
          array (
            0 => 'dateStart',
            1 => 'deleted',
          ),
        ),
        'status' => 
        array (
          'columns' => 
          array (
            0 => 'status',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
        'assignedUserStatus' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'status',
          ),
        ),
      ),
    ),
    'BillingEntity' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'panno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'udyamRegistrationNo' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'addressstreet' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'addresscity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'addressstate' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'addresspostalcode' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailid' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'phoneno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
        ),
        'fullTextSearch' => false,
        'countDisabled' => false,
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'ClosedTask' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
          'inlineEditDisabled' => true,
          'options' => 
          array (
          ),
        ),
        'description' => 
        array (
          'type' => 'text',
          'inlineEditDisabled' => true,
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
          'inlineEditDisabled' => true,
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
          'inlineEditDisabled' => true,
        ),
        'closedat' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'completedat' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'createRecurringSeriesOfTasks' => 
        array (
          'notNull' => true,
          'type' => 'bool',
          'isCustom' => true,
          'inlineEditDisabled' => true,
        ),
        'customStartDate1' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'customStartDate2' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'customStartDate3' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'customStartDate4' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'customStartDate5' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'customStartDate6' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'endDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'frequency' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Daily',
            1 => 'Weekly',
            2 => 'Monthly',
            3 => 'Custom',
          ),
          'style' => 
          array (
            'Daily' => NULL,
            'Weekly' => NULL,
            'Monthly' => NULL,
            'Custom' => NULL,
          ),
          'default' => 'Daily',
          'isCustom' => true,
        ),
        'monthlyEndDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'monthlyRepeat' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Every Month',
            1 => 'Custom',
          ),
          'style' => 
          array (
            'Every Month' => NULL,
            'Custom' => NULL,
          ),
          'default' => 'Every Month',
          'isCustom' => true,
        ),
        'monthlyRepeatOn' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '01',
            1 => '02',
            2 => '03',
            3 => '04',
            4 => '05',
            5 => '06',
            6 => '07',
            7 => '08',
            8 => '09',
            9 => '10',
            10 => '11',
            11 => '12',
            12 => '13',
            13 => '14',
            14 => '15',
            15 => '16',
            16 => '17',
            17 => '18',
            18 => '19',
            19 => '20',
            20 => '21',
            21 => '22',
            22 => '23',
            23 => '24',
            24 => '25',
            25 => '26',
            26 => '27',
            27 => '28',
            28 => '29',
            29 => '30',
            30 => '31',
          ),
          'style' => 
          array (
            10 => NULL,
            11 => NULL,
            12 => NULL,
            13 => NULL,
            14 => NULL,
            15 => NULL,
            16 => NULL,
            17 => NULL,
            18 => NULL,
            19 => NULL,
            20 => NULL,
            21 => NULL,
            22 => NULL,
            23 => NULL,
            24 => NULL,
            25 => NULL,
            26 => NULL,
            27 => NULL,
            28 => NULL,
            29 => NULL,
            30 => NULL,
            31 => NULL,
            '01' => NULL,
            '02' => NULL,
            '03' => NULL,
            '04' => NULL,
            '05' => NULL,
            '06' => NULL,
            '07' => NULL,
            '08' => NULL,
            '09' => NULL,
          ),
          'default' => '01',
          'isCustom' => true,
        ),
        'monthlyStartDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'numberOfRecurringTasks' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '1',
            1 => '2',
            2 => '3',
            3 => '4',
            4 => '5',
            5 => '6',
          ),
          'style' => 
          array (
            1 => NULL,
            2 => NULL,
            3 => NULL,
            4 => NULL,
            5 => NULL,
            6 => NULL,
          ),
          'default' => '1',
          'isCustom' => true,
        ),
        'repeat' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Every day',
          ),
          'style' => 
          array (
            'Every day' => NULL,
          ),
          'default' => 'Every day',
          'isCustom' => true,
        ),
        'startDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'weeklyendDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'weeklyrepeat' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Every week',
            1 => 'Custom',
          ),
          'style' => 
          array (
            'Every week' => NULL,
            'Custom' => NULL,
          ),
          'default' => 'Every week',
          'isCustom' => true,
        ),
        'weeklyrepeatOn' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Monday',
            1 => 'Tuesday',
            2 => 'Wednesday',
            3 => 'Thursday',
            4 => 'Friday',
            5 => 'Saturday',
            6 => 'Sunday',
          ),
          'style' => 
          array (
            'Monday' => NULL,
            'Tuesday' => NULL,
            'Wednesday' => NULL,
            'Thursday' => NULL,
            'Friday' => NULL,
            'Saturday' => NULL,
            'Sunday' => NULL,
          ),
          'default' => 'Monday',
          'isCustom' => true,
        ),
        'weeklystartDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'status' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
          'inlineEditDisabled' => true,
        ),
        'parent' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
          'inlineEditDisabled' => true,
        ),
        'priority' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
          'inlineEditDisabled' => true,
        ),
        'dateStart' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
          'inlineEditDisabled' => true,
        ),
        'dateEnd' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
          'inlineEditDisabled' => true,
        ),
        'dateCompleted' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
          'inlineEditDisabled' => true,
        ),
        'DateCompleted' => 
        array (
          'name' => 'DateCompleted',
          'dynamicLogicVisible' => NULL,
          'dynamicLogicReadOnly' => NULL,
          'inlineEditDisabled' => true,
          'tooltip' => false,
          'isCustom' => true,
        ),
        'DateEnd' => 
        array (
          'name' => 'DateEnd',
          'dynamicLogicVisible' => NULL,
          'dynamicLogicReadOnly' => NULL,
          'inlineEditDisabled' => true,
          'tooltip' => false,
          'isCustom' => true,
        ),
        'attachments' => 
        array (
          'type' => 'attachmentMultiple',
          'previewSize' => 'medium',
          'sourceList' => 
          array (
          ),
          'accept' => 
          array (
          ),
          'isCustom' => true,
          'inlineEditDisabled' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'attachments' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Attachment',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
          'relationName' => 'attachments',
          'disabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'ContactList' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'totalcontacts' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'listname' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'totalEmails' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
          1 => 'emailAddress',
          2 => 'listname',
          3 => 'totalEmails',
          4 => 'totalcontacts',
        ),
        'fullTextSearch' => false,
        'countDisabled' => false,
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'ContentTemplate' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => true,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'templateName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'principleEntityId' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'templateId' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'contentType' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'categoryType' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'senderId' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'templateType' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'templateContents' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'Demo' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'Designation' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'EmailReminder' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'emailBody' => 
        array (
          'type' => 'text',
          'rowsMin' => 2,
          'cutHeight' => 200,
          'isCustom' => true,
        ),
        'emailCc' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailStatus' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailTo' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'fileName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'folderName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'sendEmailDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'sendEmailTime' => 
        array (
          'name' => 'sendEmailTime',
          'label' => 'Send Email Time',
          'type' => 'time',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
          'dynamicLogicVisible' => NULL,
          'dynamicLogicReadOnly' => NULL,
          'inlineEditDisabled' => false,
          'tooltip' => false,
        ),
        'status' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'subject' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'sendEmailDateTime' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
        ),
        'fullTextSearch' => false,
        'countDisabled' => false,
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'Estimate' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 200,
          'trim' => true,
          'options' => 
          array (
          ),
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'adjustments' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'amount' => 
        array (
          'type' => 'currency',
          'isCustom' => true,
        ),
        'account' => 
        array (
          'type' => 'link',
          'required' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
        ),
        'billfromname' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billingaddressgstin' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billtoname' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'cGST' => 
        array (
          'type' => 'currency',
          'isCustom' => true,
        ),
        'date' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'discountamount' => 
        array (
          'type' => 'currency',
          'isCustom' => true,
        ),
        'discountoption' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'discounttype' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'discountvalue' => 
        array (
          'type' => 'currency',
          'isCustom' => true,
        ),
        'gST' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'IGST',
            2 => 'CGST/SGST',
          ),
          'style' => 
          array (
            '' => NULL,
            'IGST' => NULL,
            'CGST/SGST' => NULL,
          ),
          'default' => '',
          'isCustom' => true,
        ),
        'gstRate' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => '0',
            2 => '1',
            3 => '2',
            4 => '3',
            5 => '5',
            6 => '6',
            7 => '12',
            8 => '18',
            9 => '28',
          ),
          'style' => 
          array (
            0 => NULL,
            1 => NULL,
            2 => NULL,
            3 => NULL,
            5 => NULL,
            6 => NULL,
            12 => NULL,
            18 => NULL,
            28 => NULL,
            '' => NULL,
          ),
          'default' => '',
          'isCustom' => true,
        ),
        'hsn' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'igst' => 
        array (
          'type' => 'currency',
          'isCustom' => true,
        ),
        'invoiceNumber' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'placeofsupply' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'quantity' => 
        array (
          'type' => 'int',
          'isCustom' => true,
        ),
        'rate' => 
        array (
          'type' => 'currency',
          'isCustom' => true,
        ),
        'sGST' => 
        array (
          'type' => 'currency',
          'isCustom' => true,
        ),
        'sessionid' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'shippingaddressgstin' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Open',
            1 => 'Accepted',
            2 => 'Declined',
            3 => 'Pending',
            4 => 'Rejected',
          ),
          'style' => 
          array (
            'Open' => NULL,
            'Accepted' => NULL,
            'Declined' => NULL,
            'Pending' => NULL,
            'Rejected' => NULL,
          ),
          'default' => 'Open',
          'isCustom' => true,
        ),
        'subTotal' => 
        array (
          'type' => 'currency',
          'isCustom' => true,
        ),
        'total' => 
        array (
          'type' => 'currency',
          'isCustom' => true,
        ),
        'estimatedate' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billfrompanno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billtopanno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'filename' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'userName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
          'maxLength' => 150,
        ),
        'billingfromemail' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billingfromphone' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billingtoemail' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billingtophone' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billingfromUdyamno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billingtoUdyamno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'poOrderNo' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'termsConditions' => 
        array (
          'type' => 'text',
          'rowsMin' => 2,
          'cutHeight' => 200,
          'isCustom' => true,
        ),
        'comment' => 
        array (
          'type' => 'text',
          'rowsMin' => 2,
          'cutHeight' => 200,
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'amountCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'amountConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
        'cGSTCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'cGSTConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
        'discountamountCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'discountamountConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
        'discountvalueCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'discountvalueConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
        'igstCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'igstConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
        'rateCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'rateConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
        'sGSTCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'sGSTConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
        'subTotalCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'subTotalConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
        'totalCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'totalConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'account' => 
        array (
          'type' => 'belongsTo',
          'foreign' => 'estimatess1',
          'entity' => 'Account',
          'audited' => false,
          'isCustom' => true,
        ),
      ),
      'collection' => 
      array (
        'sortBy' => 'createdAt',
        'asc' => false,
        'orderBy' => 'createdAt',
        'order' => 'desc',
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'Export' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'ExportResult' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'entity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'isCronJob' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '0',
            1 => '1',
          ),
          'style' => 
          array (
            0 => NULL,
            1 => NULL,
          ),
          'default' => '0',
          'isCustom' => true,
        ),
        'file' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '0',
            1 => '1',
          ),
          'style' => 
          array (
            0 => NULL,
            1 => NULL,
          ),
          'default' => '0',
          'isCustom' => true,
        ),
        'dbQuery' => 
        array (
          'type' => 'text',
          'rowsMin' => 2,
          'cutHeight' => 200,
          'isCustom' => true,
        ),
        'isExported' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Pending',
          ),
          'style' => 
          array (
            'Pending' => NULL,
          ),
          'isSorted' => true,
          'default' => 'Pending',
          'isCustom' => true,
        ),
        'columns' => 
        array (
          'type' => 'text',
          'rowsMin' => 2,
          'cutHeight' => 200,
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'HolidayCalender' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
        ),
        'fullTextSearch' => false,
        'countDisabled' => false,
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'ImportResult' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'entityName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'noOfRecords' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
        ),
        'fullTextSearch' => false,
        'countDisabled' => false,
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'Invoice' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 200,
          'trim' => true,
          'options' => 
          array (
          ),
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'account1' => 
        array (
          'type' => 'link',
        ),
        'accountid' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'accountno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'adjustments' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'balance' => 
        array (
          'type' => 'currency',
          'isCustom' => true,
        ),
        'bankname' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'beneficiary' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billfromname' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billingaddressgstin' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billtoname' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'branch' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'buyerorderno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'discountamount' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'date' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'discountoption' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'discounttype' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'discountvalue' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'dueDate' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'duedate' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'estimateid' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'estimateno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'gst' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'hsn' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'ifsc' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'invoicedate' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'invoiceno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'orderdate' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'paymentDate' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'paymentStatus' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'Success',
            2 => 'Failed',
          ),
          'style' => 
          array (
            '' => NULL,
            'Success' => NULL,
            'Failed' => NULL,
          ),
          'default' => '',
          'isCustom' => true,
        ),
        'paymentdate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'paymentstatus' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'placeofsupply' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'shippingaddressgstin' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'status' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'total' => 
        array (
          'type' => 'currency',
          'isCustom' => true,
        ),
        'account' => 
        array (
          'type' => 'link',
        ),
        'billfrompan' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billtopan' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'filename' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billingEntityId' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'numberOfDays' => 
        array (
          'type' => 'int',
          'isCustom' => true,
        ),
        'invoiceDatefilter' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'invoiceDuedatefilter' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'holderName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'bankUpi' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'bankaccountType' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'cgst' => 
        array (
          'notNull' => false,
          'type' => 'float',
          'isCustom' => true,
        ),
        'sgst' => 
        array (
          'notNull' => false,
          'type' => 'float',
          'isCustom' => true,
        ),
        'gstRate' => 
        array (
          'notNull' => false,
          'type' => 'float',
          'isCustom' => true,
        ),
        'igst' => 
        array (
          'notNull' => false,
          'type' => 'float',
          'isCustom' => true,
        ),
        'rate' => 
        array (
          'notNull' => false,
          'type' => 'float',
          'isCustom' => true,
        ),
        'subTotal' => 
        array (
          'notNull' => false,
          'type' => 'float',
          'isCustom' => true,
        ),
        'totalDiscount' => 
        array (
          'notNull' => false,
          'type' => 'float',
          'isCustom' => true,
        ),
        'totalTax' => 
        array (
          'notNull' => false,
          'type' => 'float',
          'isCustom' => true,
        ),
        'billingfromemail' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billingfromphone' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billingtoemail' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billingtophone' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billingfromUdyamno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'billingtoUdyamno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'poOrderNo' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'termsConditions' => 
        array (
          'type' => 'text',
          'rowsMin' => 2,
          'cutHeight' => 200,
          'isCustom' => true,
        ),
        'userName' => 
        array (
          'type' => 'text',
          'rowsMin' => 2,
          'cutHeight' => 200,
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'balanceCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'balanceConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
        'totalCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'totalConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'account1' => 
        array (
          'type' => 'belongsTo',
          'foreign' => 'invoices',
          'entity' => 'Account',
          'audited' => false,
          'isCustom' => true,
        ),
        'account' => 
        array (
          'type' => 'belongsTo',
          'foreign' => 'invoices1',
          'entity' => 'Account',
          'audited' => false,
          'isCustom' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'MessageLog' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'subDomainName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'totalMessages' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'sentMessages' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'remainingMessages' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'planExpiryDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'senderId' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
        ),
        'fullTextSearch' => false,
        'countDisabled' => false,
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'MyCampaigns' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'campaignsName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'listName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'listId' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'smsBody' => 
        array (
          'type' => 'text',
          'rowsMin' => 2,
          'cutHeight' => 200,
          'isCustom' => true,
        ),
        'sendFrom' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'sendSmsTime' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'sendSmsDate' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'domainname' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'contentTemplateId' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'contentTemplateName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'scheduledAt' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
        ),
        'fullTextSearch' => false,
        'countDisabled' => false,
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'OfficeLocation' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'gstin' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'typeofoffice' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'Registred Office',
            2 => 'Corporate Office',
            3 => 'Branch',
          ),
          'style' => 
          array (
            '' => NULL,
            'Registred Office' => NULL,
            'Corporate Office' => NULL,
            'Branch' => NULL,
          ),
          'default' => '',
          'isCustom' => true,
        ),
        'user' => 
        array (
          'type' => 'link',
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'user' => 
        array (
          'type' => 'belongsTo',
          'foreign' => 'officeLocations',
          'entity' => 'User',
          'audited' => false,
          'isCustom' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'Payments' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'amountcredited' => 
        array (
          'type' => 'currency',
          'isCustom' => true,
        ),
        'balance' => 
        array (
          'type' => 'currency',
          'isCustom' => true,
        ),
        'billedamount' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'createddate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'invoiceno' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'mode' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Cash',
            1 => 'RTGS/NEFT',
            2 => 'PayTM',
          ),
          'style' => 
          array (
            'Cash' => NULL,
            'RTGS/NEFT' => NULL,
            'PayTM' => NULL,
          ),
          'default' => 'Cash',
          'isCustom' => true,
        ),
        'paymentdate' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'paymentstatus' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => '',
            1 => 'Success',
            2 => 'Failed',
          ),
          'style' => 
          array (
            '' => NULL,
            'Success' => NULL,
            'Failed' => NULL,
          ),
          'default' => '',
          'isCustom' => true,
        ),
        'account' => 
        array (
          'type' => 'link',
          'required' => false,
          'audited' => false,
          'readOnly' => false,
          'tooltip' => false,
        ),
        'paymenttype' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'pdate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'tds' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'transactionid' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'accountName1' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'amountcreditedCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'amountcreditedConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
        'balanceCurrency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'balanceConverted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
        ),
        'fullTextSearch' => false,
        'countDisabled' => false,
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'SMSReminder' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'folderName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'mobileNo' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'reminderDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'reminderTime' => 
        array (
          'name' => 'reminderTime',
          'label' => 'Reminder Time',
          'type' => 'Time',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
          'dynamicLogicVisible' => NULL,
          'dynamicLogicReadOnly' => NULL,
          'inlineEditDisabled' => false,
          'tooltip' => false,
        ),
        'smsBody' => 
        array (
          'type' => 'text',
          'rowsMin' => 2,
          'cutHeight' => 200,
          'isCustom' => true,
        ),
        'smsStatus' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'status' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'sendSmsDateTime' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'sendFrom' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'contentTemplateName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
        ),
        'fullTextSearch' => false,
        'countDisabled' => false,
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'SendSMSData' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'deliveryStatus' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'folderName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'mobileNo' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'reminderDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'reminderTime' => 
        array (
          'name' => 'reminderTime',
          'label' => 'Reminder Time',
          'type' => 'time',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
          'dynamicLogicVisible' => NULL,
          'dynamicLogicReadOnly' => NULL,
          'inlineEditDisabled' => false,
          'tooltip' => false,
        ),
        'smsBody' => 
        array (
          'type' => 'text',
          'rowsMin' => 2,
          'cutHeight' => 200,
          'isCustom' => true,
        ),
        'smsShootId' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'smsStatus' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'status' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'sendSmsDateTime' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'contentTemplateName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'sendFrom' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
        ),
        'fullTextSearch' => false,
        'countDisabled' => false,
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'SenderID' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => true,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'senderId' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'categoryType' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'status' => 
        array (
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Active',
          ),
          'style' => 
          array (
            'Active' => NULL,
          ),
          'default' => 'Active',
          'isCustom' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'SentEmailReminder' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'emailBody' => 
        array (
          'type' => 'text',
          'rowsMin' => 2,
          'cutHeight' => 200,
          'isCustom' => true,
        ),
        'emailCc' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailStatus' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailTo' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'fileName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'folderName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'sendEmailDate' => 
        array (
          'notNull' => false,
          'type' => 'date',
          'isCustom' => true,
        ),
        'sendEmailTime' => 
        array (
          'name' => 'sendEmailTime',
          'label' => 'Send Email Time',
          'type' => 'time',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
          'dynamicLogicVisible' => NULL,
          'dynamicLogicReadOnly' => NULL,
          'inlineEditDisabled' => false,
          'tooltip' => false,
        ),
        'status' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'subject' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'sendEmailDateTime' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'SentMessages' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'campaignsName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'listName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'listId' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'smsBody' => 
        array (
          'type' => 'text',
          'rowsMin' => 2,
          'cutHeight' => 200,
          'isCustom' => true,
        ),
        'sendFrom' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'sendsmsdate' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'sendsmstime' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'totalSentSms' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'totalDeliveredSMS' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'totalNotDeliveredSMS' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'contentTemplateName' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'scheduledAt' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'options' => 
          array (
          ),
          'isCustom' => true,
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'textFilterFields' => 
        array (
          0 => 'name',
        ),
        'fullTextSearch' => false,
        'countDisabled' => false,
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'TEsting2811' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'Test' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => true,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'TestEntity2710' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
    'TestingEntity' => 
    array (
      'fields' => 
      array (
        'name' => 
        array (
          'type' => 'varchar',
          'required' => true,
          'trim' => true,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'website' => 
        array (
          'type' => 'url',
          'strip' => true,
        ),
        'emailAddress' => 
        array (
          'type' => 'email',
        ),
        'phoneNumber' => 
        array (
          'type' => 'phone',
          'typeList' => 
          array (
            0 => 'Office',
            1 => 'Mobile',
            2 => 'Fax',
            3 => 'Other',
          ),
          'defaultType' => 'Office',
        ),
        'billingAddress' => 
        array (
          'type' => 'address',
        ),
        'billingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'billingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'billingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'shippingAddress' => 
        array (
          'type' => 'address',
          'view' => 'crm:views/account/fields/shipping-address',
        ),
        'shippingAddressStreet' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'shippingAddressCity' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressState' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressCountry' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'shippingAddressPostalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'createdAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'modifiedAt' => 
        array (
          'type' => 'datetime',
          'readOnly' => true,
        ),
        'createdBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'Stream' => 
        array (
          'type' => 'varchar',
          'maxLength' => 2000,
          'trim' => true,
        ),
        'modifiedBy' => 
        array (
          'type' => 'link',
          'readOnly' => true,
          'view' => 'views/fields/user',
        ),
        'assignedUser' => 
        array (
          'type' => 'link',
          'required' => false,
          'view' => 'views/fields/assigned-user',
        ),
        'teams' => 
        array (
          'type' => 'linkMultiple',
          'view' => 'views/fields/teams',
        ),
        'emailAddressIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'phoneNumberIsOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
        'billingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
        'shippingAddressMap' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'links' => 
      array (
        'createdBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'modifiedBy' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'assignedUser' => 
        array (
          'type' => 'belongsTo',
          'entity' => 'User',
        ),
        'teams' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Team',
          'relationName' => 'EntityTeam',
          'layoutRelationshipsDisabled' => true,
        ),
        'meetings' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Meeting',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'calls' => 
        array (
          'type' => 'hasMany',
          'entity' => 'Call',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
        'tasks' => 
        array (
          'type' => 'hasChildren',
          'entity' => 'Task',
          'foreign' => 'parent',
          'layoutRelationshipsDisabled' => true,
        ),
      ),
      'collection' => 
      array (
        'orderBy' => 'createdAt',
        'order' => 'desc',
        'sortBy' => 'createdAt',
        'asc' => false,
      ),
      'indexes' => 
      array (
        'name' => 
        array (
          'columns' => 
          array (
            0 => 'name',
            1 => 'deleted',
          ),
        ),
        'assignedUser' => 
        array (
          'columns' => 
          array (
            0 => 'assignedUserId',
            1 => 'deleted',
          ),
        ),
      ),
    ),
  ),
  'fields' => 
  array (
    'address' => 
    array (
      'actualFields' => 
      array (
        0 => 'street',
        1 => 'city',
        2 => 'state',
        3 => 'country',
        4 => 'postalCode',
      ),
      'fields' => 
      array (
        'street' => 
        array (
          'type' => 'text',
          'maxLength' => 255,
          'dbType' => 'varchar',
        ),
        'city' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-city',
          'customizationOptionsDisabled' => true,
        ),
        'state' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-state',
          'customizationOptionsDisabled' => true,
        ),
        'country' => 
        array (
          'type' => 'varchar',
          'trim' => true,
          'maxLength' => 255,
          'view' => 'views/fields/address-country',
          'customizationOptionsDisabled' => true,
        ),
        'postalCode' => 
        array (
          'type' => 'varchar',
          'maxLength' => 40,
          'trim' => true,
        ),
        'map' => 
        array (
          'type' => 'map',
          'notStorable' => true,
          'readOnly' => true,
          'layoutListDisabled' => true,
          'provider' => 'Google',
          'height' => 300,
          'exportDisabled' => true,
          'importDisabled' => true,
        ),
      ),
      'notMergeable' => true,
      'notCreatable' => false,
      'filter' => true,
      'skipOrmDefs' => true,
      'personalData' => true,
    ),
    'array' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'options',
          'type' => 'array',
          'view' => 'views/admin/field-manager/fields/options',
        ),
        2 => 
        array (
          'name' => 'translation',
          'type' => 'varchar',
          'hidden' => true,
        ),
        3 => 
        array (
          'name' => 'allowCustomOptions',
          'type' => 'bool',
          'hidden' => true,
        ),
        4 => 
        array (
          'name' => 'noEmptyString',
          'type' => 'bool',
          'default' => false,
        ),
        5 => 
        array (
          'name' => 'maxCount',
          'type' => 'int',
          'min' => 1,
        ),
        6 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        7 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'validationList' => 
      array (
        0 => 'required',
        1 => 'maxCount',
      ),
      'filter' => true,
      'notCreatable' => false,
      'notSortable' => true,
      'fieldDefs' => 
      array (
        'type' => 'jsonArray',
        'storeArrayValues' => true,
      ),
      'translatedOptions' => true,
      'dynamicLogicOptions' => true,
      'personalData' => true,
    ),
    'arrayInt' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'options',
          'type' => 'arrayInt',
        ),
        2 => 
        array (
          'name' => 'translation',
          'type' => 'varchar',
          'hidden' => true,
        ),
        3 => 
        array (
          'name' => 'noEmptyString',
          'type' => 'bool',
          'default' => false,
        ),
        4 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        5 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'filter' => true,
      'notCreatable' => true,
      'fieldDefs' => 
      array (
        'type' => 'jsonArray',
      ),
    ),
    'attachmentMultiple' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'sourceList',
          'type' => 'multiEnum',
          'view' => 'views/admin/field-manager/fields/source-list',
        ),
        2 => 
        array (
          'name' => 'maxFileSize',
          'type' => 'float',
          'tooltip' => true,
          'min' => 0,
        ),
        3 => 
        array (
          'name' => 'previewSize',
          'type' => 'enum',
          'default' => 'medium',
          'options' => 
          array (
            0 => '',
            1 => 'x-small',
            2 => 'small',
            3 => 'medium',
            4 => 'large',
          ),
        ),
        4 => 
        array (
          'name' => 'accept',
          'type' => 'multiEnum',
          'noEmptyString' => true,
          'allowCustomOptions' => true,
          'options' => 
          array (
            0 => 'image/*',
            1 => 'audio/*',
            2 => 'video/*',
            3 => '.pdf',
          ),
          'tooltip' => 'fileAccept',
        ),
      ),
      'actualFields' => 
      array (
        0 => 'ids',
      ),
      'notActualFields' => 
      array (
        0 => 'names',
        1 => 'types',
      ),
      'linkDefs' => 
      array (
        'type' => 'hasChildren',
        'entity' => 'Attachment',
        'foreign' => 'parent',
        'layoutRelationshipsDisabled' => true,
        'relationName' => 'attachments',
        'disabled' => true,
      ),
      'notSortable' => true,
      'filter' => true,
      'personalData' => true,
    ),
    'autoincrement' => 
    array (
      'params' => 
      array (
      ),
      'notCreatable' => false,
      'filter' => true,
      'fieldDefs' => 
      array (
        'type' => 'int',
        'autoincrement' => true,
        'unique' => true,
      ),
      'textFilter' => true,
      'readOnly' => true,
    ),
    'base' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
        ),
      ),
      'filter' => false,
      'notCreatable' => true,
      'fieldDefs' => 
      array (
        'notStorable' => true,
      ),
    ),
    'bool' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'default',
          'type' => 'bool',
        ),
        1 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        2 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'filter' => true,
      'fieldDefs' => 
      array (
        'notNull' => true,
      ),
    ),
    'checklist' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'options',
          'type' => 'array',
          'view' => 'views/admin/field-manager/fields/options',
          'noEmptyString' => true,
          'required' => true,
        ),
        2 => 
        array (
          'name' => 'isSorted',
          'type' => 'bool',
        ),
        3 => 
        array (
          'name' => 'translation',
          'type' => 'varchar',
          'hidden' => true,
        ),
        4 => 
        array (
          'name' => 'maxCount',
          'type' => 'int',
          'min' => 1,
        ),
        5 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        6 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'validationList' => 
      array (
        0 => 'required',
        1 => 'maxCount',
      ),
      'filter' => true,
      'notCreatable' => false,
      'notSortable' => true,
      'fieldDefs' => 
      array (
        'type' => 'jsonArray',
        'storeArrayValues' => true,
      ),
      'translatedOptions' => true,
      'dynamicLogicOptions' => true,
      'personalData' => true,
    ),
    'colorpicker' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'default',
          'type' => 'colorpicker',
        ),
        2 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        3 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'filter' => false,
      'fieldDefs' => 
      array (
        'type' => 'varchar',
        'maxLength' => 7,
      ),
      'notCreatable' => true,
    ),
    'currency' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'default',
          'type' => 'float',
        ),
        2 => 
        array (
          'name' => 'min',
          'type' => 'float',
        ),
        3 => 
        array (
          'name' => 'max',
          'type' => 'float',
        ),
        4 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        5 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'actualFields' => 
      array (
        0 => 'currency',
        1 => '',
      ),
      'fields' => 
      array (
        'currency' => 
        array (
          'type' => 'enum',
          'view' => 'views/fields/currency-list',
          'layoutDetailDisabled' => true,
          'layoutListDisabled' => true,
          'layoutMassUpdateDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'customizationRequiredDisabled' => true,
          'customizationOptionsDisabled' => true,
          'customizationIsSortedDisabled' => true,
          'customizationDisplayAsLabelDisabled' => true,
          'customizationAuditedDisabled' => true,
          'customizationReadOnlyDisabled' => true,
          'customizationDefaultView' => 'views/admin/field-manager/fields/currency-default',
          'maxLength' => 6,
        ),
        'converted' => 
        array (
          'type' => 'currencyConverted',
          'readOnly' => true,
          'importDisabled' => true,
        ),
      ),
      'validationList' => 
      array (
        0 => 'required',
        1 => 'min',
        2 => 'max',
      ),
      'filter' => true,
      'personalData' => true,
    ),
    'currencyConverted' => 
    array (
      'params' => 
      array (
      ),
      'filter' => true,
      'notCreatable' => true,
      'skipOrmDefs' => true,
    ),
    'date' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'default',
          'type' => 'enum',
          'view' => 'views/admin/field-manager/fields/date/default',
          'options' => 
          array (
            0 => '',
            1 => 'javascript: return this.dateTime.getToday();',
            2 => 'javascript: return this.dateTime.getDateShiftedFromToday(1, \'days\');',
            3 => 'javascript: return this.dateTime.getDateShiftedFromToday(2, \'days\');',
            4 => 'javascript: return this.dateTime.getDateShiftedFromToday(3, \'days\');',
            5 => 'javascript: return this.dateTime.getDateShiftedFromToday(4, \'days\');',
            6 => 'javascript: return this.dateTime.getDateShiftedFromToday(5, \'days\');',
            7 => 'javascript: return this.dateTime.getDateShiftedFromToday(6, \'days\');',
            8 => 'javascript: return this.dateTime.getDateShiftedFromToday(7, \'days\');',
            9 => 'javascript: return this.dateTime.getDateShiftedFromToday(8, \'days\');',
            10 => 'javascript: return this.dateTime.getDateShiftedFromToday(9, \'days\');',
            11 => 'javascript: return this.dateTime.getDateShiftedFromToday(10, \'days\');',
            12 => 'javascript: return this.dateTime.getDateShiftedFromToday(1, \'weeks\');',
            13 => 'javascript: return this.dateTime.getDateShiftedFromToday(2, \'weeks\');',
            14 => 'javascript: return this.dateTime.getDateShiftedFromToday(3, \'weeks\');',
            15 => 'javascript: return this.dateTime.getDateShiftedFromToday(1, \'months\');',
            16 => 'javascript: return this.dateTime.getDateShiftedFromToday(2, \'months\');',
            17 => 'javascript: return this.dateTime.getDateShiftedFromToday(3, \'months\');',
            18 => 'javascript: return this.dateTime.getDateShiftedFromToday(4, \'months\');',
            19 => 'javascript: return this.dateTime.getDateShiftedFromToday(5, \'months\');',
            20 => 'javascript: return this.dateTime.getDateShiftedFromToday(6, \'months\');',
            21 => 'javascript: return this.dateTime.getDateShiftedFromToday(7, \'months\');',
            22 => 'javascript: return this.dateTime.getDateShiftedFromToday(8, \'months\');',
            23 => 'javascript: return this.dateTime.getDateShiftedFromToday(9, \'months\');',
            24 => 'javascript: return this.dateTime.getDateShiftedFromToday(10, \'months\');',
            25 => 'javascript: return this.dateTime.getDateShiftedFromToday(11, \'months\');',
            26 => 'javascript: return this.dateTime.getDateShiftedFromToday(1, \'year\');',
          ),
          'translation' => 'FieldManager.options.dateDefault',
        ),
        2 => 
        array (
          'name' => 'after',
          'type' => 'varchar',
        ),
        3 => 
        array (
          'name' => 'before',
          'type' => 'varchar',
        ),
        4 => 
        array (
          'type' => 'bool',
          'name' => 'useNumericFormat',
        ),
        5 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        6 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'validationList' => 
      array (
        0 => 'required',
      ),
      'filter' => true,
      'fieldDefs' => 
      array (
        'notNull' => false,
      ),
      'personalData' => true,
    ),
    'datetime' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'default',
          'type' => 'enum',
          'view' => 'views/admin/field-manager/fields/date/default',
          'options' => 
          array (
            0 => '',
            1 => 'javascript: return this.dateTime.getNow(1);',
            2 => 'javascript: return this.dateTime.getNow(5);',
            3 => 'javascript: return this.dateTime.getNow(15);',
            4 => 'javascript: return this.dateTime.getNow(30);',
            5 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(1, \'hours\', 15);',
            6 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(2, \'hours\', 15);',
            7 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(3, \'hours\', 15);',
            8 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(4, \'hours\', 15);',
            9 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(5, \'hours\', 15);',
            10 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(6, \'hours\', 15);',
            11 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(7, \'hours\', 15);',
            12 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(8, \'hours\', 15);',
            13 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(9, \'hours\', 15);',
            14 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(10, \'hours\', 15);',
            15 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(11, \'hours\', 15);',
            16 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(12, \'hours\', 15);',
            17 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(1, \'days\', 15);',
            18 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(2, \'days\', 15);',
            19 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(3, \'days\', 15);',
            20 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(4, \'days\', 15);',
            21 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(5, \'days\', 15);',
            22 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(6, \'days\', 15);',
            23 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(1, \'week\', 15);',
          ),
          'translation' => 'FieldManager.options.dateTimeDefault',
        ),
        2 => 
        array (
          'name' => 'after',
          'type' => 'varchar',
        ),
        3 => 
        array (
          'name' => 'before',
          'type' => 'varchar',
        ),
        4 => 
        array (
          'type' => 'bool',
          'name' => 'useNumericFormat',
        ),
        5 => 
        array (
          'type' => 'bool',
          'name' => 'hasSeconds',
          'hidden' => true,
        ),
        6 => 
        array (
          'type' => 'enumInt',
          'name' => 'minuteStep',
          'options' => 
          array (
            0 => 30,
            1 => 15,
            2 => 10,
            3 => 5,
            4 => 1,
          ),
        ),
        7 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        8 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'validationList' => 
      array (
        0 => 'required',
      ),
      'filter' => true,
      'fieldDefs' => 
      array (
        'notNull' => false,
      ),
      'personalData' => true,
    ),
    'datetimeOptional' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'default',
          'type' => 'enum',
          'view' => 'views/admin/field-manager/fields/date/default',
          'options' => 
          array (
            0 => '',
            1 => 'javascript: return this.dateTime.getNow(1);',
            2 => 'javascript: return this.dateTime.getNow(5);',
            3 => 'javascript: return this.dateTime.getNow(15);',
            4 => 'javascript: return this.dateTime.getNow(30);',
            5 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(1, \'hours\', 15);',
            6 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(2, \'hours\', 15);',
            7 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(3, \'hours\', 15);',
            8 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(4, \'hours\', 15);',
            9 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(5, \'hours\', 15);',
            10 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(6, \'hours\', 15);',
            11 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(7, \'hours\', 15);',
            12 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(8, \'hours\', 15);',
            13 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(9, \'hours\', 15);',
            14 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(10, \'hours\', 15);',
            15 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(11, \'hours\', 15);',
            16 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(12, \'hours\', 15);',
            17 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(1, \'days\', 15);',
            18 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(2, \'days\', 15);',
            19 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(3, \'days\', 15);',
            20 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(4, \'days\', 15);',
            21 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(5, \'days\', 15);',
            22 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(6, \'days\', 15);',
            23 => 'javascript: return this.dateTime.getDateTimeShiftedFromNow(1, \'week\', 15);',
          ),
          'translation' => 'FieldManager.options.dateTimeDefault',
        ),
        2 => 
        array (
          'name' => 'after',
          'type' => 'varchar',
        ),
        3 => 
        array (
          'name' => 'before',
          'type' => 'varchar',
        ),
        4 => 
        array (
          'type' => 'bool',
          'name' => 'useNumericFormat',
        ),
        5 => 
        array (
          'type' => 'enumInt',
          'name' => 'minuteStep',
          'options' => 
          array (
            0 => 30,
            1 => 15,
            2 => 10,
            3 => 5,
            4 => 1,
          ),
        ),
        6 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        7 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'actualFields' => 
      array (
        0 => '',
        1 => 'date',
      ),
      'fields' => 
      array (
        'date' => 
        array (
          'type' => 'date',
          'disabled' => true,
        ),
      ),
      'validationList' => 
      array (
        0 => 'required',
      ),
      'filter' => true,
      'notCreatable' => true,
      'fieldDefs' => 
      array (
        'type' => 'datetime',
        'notNull' => false,
      ),
      'view' => 'views/fields/datetime-optional',
      'personalData' => true,
    ),
    'duration' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'default',
          'type' => 'int',
        ),
        1 => 
        array (
          'name' => 'options',
          'type' => 'arrayInt',
        ),
      ),
      'notCreatable' => true,
      'fieldDefs' => 
      array (
        'type' => 'int',
      ),
    ),
    'email' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
      ),
      'actualFields' => 
      array (
        0 => 'isOptedOut',
        1 => '',
      ),
      'notActualFields' => 
      array (
        0 => 'data',
      ),
      'fields' => 
      array (
        'isOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'mergeDisabled' => true,
          'foreignAccessDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
      ),
      'validationList' => 
      array (
        0 => 'required',
        1 => 'emailAddress',
      ),
      'mandatoryValidationList' => 
      array (
        0 => 'emailAddress',
      ),
      'notCreatable' => true,
      'filter' => true,
      'fieldDefs' => 
      array (
        'notStorable' => true,
      ),
      'textFilter' => true,
      'personalData' => true,
    ),
    'enum' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'options',
          'type' => 'array',
          'view' => 'views/admin/field-manager/fields/options-with-style',
        ),
        2 => 
        array (
          'name' => 'default',
          'type' => 'enum',
          'view' => 'views/admin/field-manager/fields/options/default',
        ),
        3 => 
        array (
          'name' => 'isSorted',
          'type' => 'bool',
        ),
        4 => 
        array (
          'name' => 'translation',
          'type' => 'varchar',
          'hidden' => true,
        ),
        5 => 
        array (
          'name' => 'style',
          'type' => 'jsonObject',
          'hidden' => true,
        ),
        6 => 
        array (
          'name' => 'displayAsLabel',
          'type' => 'bool',
        ),
        7 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        8 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'validationList' => 
      array (
        0 => 'required',
      ),
      'filter' => true,
      'fieldDefs' => 
      array (
        'type' => 'varchar',
      ),
      'translatedOptions' => true,
      'dynamicLogicOptions' => true,
      'personalData' => true,
    ),
    'enumFloat' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'options',
          'type' => 'array',
        ),
        1 => 
        array (
          'name' => 'default',
          'type' => 'float',
        ),
        2 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        3 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'filter' => true,
      'notCreatable' => true,
      'fieldDefs' => 
      array (
        'type' => 'float',
      ),
    ),
    'enumInt' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'options',
          'type' => 'array',
        ),
        1 => 
        array (
          'name' => 'default',
          'type' => 'int',
        ),
        2 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        3 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'filter' => true,
      'notCreatable' => true,
      'fieldDefs' => 
      array (
        'type' => 'int',
      ),
    ),
    'file' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'sourceList',
          'type' => 'multiEnum',
          'view' => 'views/admin/field-manager/fields/source-list',
        ),
        2 => 
        array (
          'name' => 'maxFileSize',
          'type' => 'float',
          'tooltip' => true,
          'min' => 0,
        ),
        3 => 
        array (
          'name' => 'accept',
          'type' => 'multiEnum',
          'noEmptyString' => true,
          'allowCustomOptions' => true,
          'options' => 
          array (
            0 => 'image/*',
            1 => 'audio/*',
            2 => 'video/*',
            3 => '.pdf',
          ),
          'tooltip' => 'fileAccept',
        ),
        4 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
      ),
      'actualFields' => 
      array (
        0 => 'id',
      ),
      'notActualFields' => 
      array (
        0 => 'name',
      ),
      'validationList' => 
      array (
        0 => 'required',
      ),
      'filter' => true,
      'linkDefs' => 
      array (
        'type' => 'belongsTo',
        'entity' => 'Attachment',
        'skipOrmDefs' => true,
        'disabled' => true,
      ),
      'personalData' => true,
    ),
    'float' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'default',
          'type' => 'float',
        ),
        2 => 
        array (
          'name' => 'min',
          'type' => 'float',
        ),
        3 => 
        array (
          'name' => 'max',
          'type' => 'float',
        ),
        4 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        5 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'validationList' => 
      array (
        0 => 'required',
        1 => 'min',
        2 => 'max',
      ),
      'filter' => true,
      'fieldDefs' => 
      array (
        'notNull' => false,
      ),
    ),
    'foreign' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'link',
          'type' => 'varchar',
          'view' => 'views/admin/field-manager/fields/foreign/link',
          'required' => true,
        ),
        1 => 
        array (
          'name' => 'field',
          'type' => 'varchar',
          'view' => 'views/admin/field-manager/fields/foreign/field',
          'required' => true,
        ),
        2 => 
        array (
          'name' => 'view',
          'type' => 'varchar',
          'hidden' => true,
        ),
      ),
      'fieldTypeList' => 
      array (
        0 => 'varchar',
        1 => 'enum',
        2 => 'enumInt',
        3 => 'enumFloat',
        4 => 'int',
        5 => 'float',
        6 => 'url',
        7 => 'date',
        8 => 'datetime',
        9 => 'text',
        10 => 'number',
        11 => 'bool',
        12 => 'email',
        13 => 'phone',
      ),
      'fieldTypeViewMap' => 
      array (
        'varchar' => 'views/fields/foreign-varchar',
        'enum' => 'views/fields/foreign-enum',
        'enumInt' => 'views/fields/foreign-int',
        'enumFloat' => 'views/fields/foreign-float',
        'int' => 'views/fields/foreign-int',
        'float' => 'views/fields/foreign-float',
        'url' => 'views/fields/foreign-url',
        'date' => 'views/fields/foreign-date',
        'datetime' => 'views/fields/foreign-datetime',
        'text' => 'views/fields/foreign-text',
        'number' => 'views/fields/foreign-varchar',
        'bool' => 'views/fields/foreign-bool',
        'email' => 'views/fields/foreign-email',
        'phone' => 'views/fields/foreign-phone',
      ),
      'filter' => true,
      'notCreatable' => false,
      'fieldDefs' => 
      array (
        'readOnly' => true,
      ),
    ),
    'image' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'previewSize',
          'type' => 'enum',
          'default' => 'small',
          'options' => 
          array (
            0 => 'x-small',
            1 => 'small',
            2 => 'medium',
            3 => 'large',
          ),
        ),
        2 => 
        array (
          'name' => 'maxFileSize',
          'type' => 'float',
          'tooltip' => true,
          'min' => 0,
        ),
        3 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
      ),
      'actualFields' => 
      array (
        0 => 'id',
      ),
      'notActualFields' => 
      array (
        0 => 'name',
      ),
      'validationList' => 
      array (
        0 => 'required',
      ),
      'filter' => true,
      'linkDefs' => 
      array (
        'type' => 'belongsTo',
        'entity' => 'Attachment',
        'skipOrmDefs' => true,
        'disabled' => true,
      ),
      'personalData' => true,
    ),
    'int' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'default',
          'type' => 'int',
        ),
        2 => 
        array (
          'name' => 'min',
          'type' => 'int',
        ),
        3 => 
        array (
          'name' => 'max',
          'type' => 'int',
        ),
        4 => 
        array (
          'name' => 'disableFormatting',
          'type' => 'bool',
        ),
        5 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        6 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'validationList' => 
      array (
        0 => 'required',
        1 => 'min',
        2 => 'max',
      ),
      'filter' => true,
      'textFilter' => true,
      'textFilterForeign' => true,
      'personalData' => true,
    ),
    'jsonArray' => 
    array (
      'notCreatable' => true,
      'notMergeable' => true,
      'notSortable' => true,
      'filter' => false,
    ),
    'jsonObject' => 
    array (
      'notCreatable' => true,
      'notMergeable' => true,
      'filter' => false,
    ),
    'link' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        2 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
        3 => 
        array (
          'name' => 'default',
          'type' => 'link',
          'view' => 'views/admin/field-manager/fields/link/default',
        ),
      ),
      'actualFields' => 
      array (
        0 => 'id',
      ),
      'notActualFields' => 
      array (
        0 => 'name',
      ),
      'validationList' => 
      array (
        0 => 'required',
      ),
      'filter' => true,
      'notCreatable' => true,
    ),
    'linkMultiple' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'sortable',
          'type' => 'bool',
          'default' => false,
          'hidden' => true,
        ),
        2 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
        3 => 
        array (
          'name' => 'default',
          'type' => 'linkMultiple',
          'view' => 'views/admin/field-manager/fields/link-multiple/default',
        ),
      ),
      'actualFields' => 
      array (
        0 => 'ids',
      ),
      'notActualFields' => 
      array (
        0 => 'names',
      ),
      'validationList' => 
      array (
        0 => 'required',
      ),
      'notCreatable' => true,
      'notSortable' => true,
      'filter' => true,
    ),
    'linkParent' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'entityList',
          'type' => 'multiEnum',
          'view' => 'views/admin/field-manager/fields/entity-list',
        ),
        2 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        3 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'actualFields' => 
      array (
        0 => 'id',
        1 => 'type',
      ),
      'notActualFields' => 
      array (
        0 => 'name',
      ),
      'validationList' => 
      array (
        0 => 'required',
      ),
      'filter' => true,
      'notCreatable' => true,
      'fieldDefs' => 
      array (
        'notStorable' => true,
      ),
    ),
    'map' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'provider',
          'type' => 'enum',
          'options' => 
          array (
            0 => 'Google',
          ),
          'default' => 'Google',
        ),
        1 => 
        array (
          'name' => 'height',
          'type' => 'int',
          'default' => 300,
        ),
      ),
      'filter' => false,
      'notCreatable' => true,
      'notSortable' => true,
      'fieldDefs' => 
      array (
        'notStorable' => true,
      ),
    ),
    'multiEnum' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'options',
          'type' => 'array',
          'view' => 'views/admin/field-manager/fields/options-with-style',
        ),
        2 => 
        array (
          'name' => 'isSorted',
          'type' => 'bool',
        ),
        3 => 
        array (
          'name' => 'translation',
          'type' => 'varchar',
          'hidden' => true,
        ),
        4 => 
        array (
          'name' => 'allowCustomOptions',
          'type' => 'bool',
        ),
        5 => 
        array (
          'name' => 'maxCount',
          'type' => 'int',
          'min' => 1,
        ),
        6 => 
        array (
          'name' => 'style',
          'type' => 'jsonObject',
          'hidden' => true,
        ),
        7 => 
        array (
          'name' => 'displayAsLabel',
          'type' => 'bool',
        ),
        8 => 
        array (
          'name' => 'displayAsList',
          'type' => 'bool',
        ),
        9 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        10 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'validationList' => 
      array (
        0 => 'required',
        1 => 'maxCount',
      ),
      'filter' => true,
      'notCreatable' => false,
      'notSortable' => true,
      'fieldDefs' => 
      array (
        'type' => 'jsonArray',
        'storeArrayValues' => true,
      ),
      'translatedOptions' => true,
      'dynamicLogicOptions' => true,
      'personalData' => true,
    ),
    'number' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'prefix',
          'type' => 'varchar',
          'maxLength' => 16,
        ),
        1 => 
        array (
          'name' => 'nextNumber',
          'type' => 'int',
          'min' => 0,
          'required' => true,
          'default' => 1,
        ),
        2 => 
        array (
          'name' => 'padLength',
          'type' => 'int',
          'default' => 5,
          'required' => true,
          'min' => 1,
          'max' => 20,
        ),
      ),
      'filter' => true,
      'fieldDefs' => 
      array (
        'type' => 'varchar',
        'len' => 36,
        'notNull' => false,
        'unique' => false,
      ),
      'hookClassName' => '\\Finnova\\Core\\Utils\\FieldManager\\Hooks\\NumberType',
      'textFilter' => true,
      'readOnly' => true,
    ),
    'password' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
      ),
      'notSortable' => true,
      'notCreatable' => true,
      'filter' => false,
    ),
    'personName' => 
    array (
      'actualFields' => 
      array (
        0 => 'salutation',
        1 => 'first',
        2 => 'last',
      ),
      'notActualFields' => 
      array (
        0 => '',
      ),
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
      ),
      'fields' => 
      array (
        'salutation' => 
        array (
          'type' => 'enum',
        ),
        'first' => 
        array (
          'type' => 'varchar',
          'trim' => true,
        ),
        'last' => 
        array (
          'type' => 'varchar',
          'trim' => true,
        ),
      ),
      'naming' => 'prefix',
      'notMergeable' => true,
      'notCreatable' => true,
      'filter' => true,
      'skipOrmDefs' => true,
      'personalData' => true,
      'textFilter' => true,
      'fullTextSearch' => true,
      'validationList' => 
      array (
        0 => 'required',
      ),
      'fullTextSearchColumnList' => 
      array (
        0 => 'first',
        1 => 'last',
      ),
    ),
    'phone' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'typeList',
          'type' => 'array',
          'default' => 
          array (
            0 => 'Mobile',
            1 => 'Office',
            2 => 'Home',
            3 => 'Fax',
            4 => 'Other',
          ),
          'view' => 'views/admin/field-manager/fields/options',
        ),
        2 => 
        array (
          'name' => 'defaultType',
          'type' => 'varchar',
          'default' => 'Mobile',
        ),
        3 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
      ),
      'actualFields' => 
      array (
        0 => 'isOptedOut',
        1 => '',
      ),
      'notActualFields' => 
      array (
        0 => 'data',
      ),
      'fields' => 
      array (
        'isOptedOut' => 
        array (
          'type' => 'bool',
          'notStorable' => true,
          'layoutDetailDisabled' => true,
          'layoutDefaultSidePanelDisabled' => true,
          'foreignAccessDisabled' => true,
          'mergeDisabled' => true,
          'customizationDefaultDisabled' => true,
          'customizationReadOnlyDisabled' => true,
        ),
      ),
      'validationList' => 
      array (
        0 => 'required',
      ),
      'notCreatable' => true,
      'filter' => true,
      'fieldDefs' => 
      array (
        'notStorable' => true,
      ),
      'translatedOptions' => true,
      'textFilter' => true,
      'personalData' => true,
    ),
    'rangeCurrency' => 
    array (
      'actualFields' => 
      array (
        0 => 'from',
        1 => 'to',
      ),
      'fields' => 
      array (
        'from' => 
        array (
          'type' => 'currency',
        ),
        'to' => 
        array (
          'type' => 'currency',
        ),
      ),
      'naming' => 'prefix',
      'notMergeable' => true,
      'notCreatable' => true,
      'filter' => false,
      'skipOrmDefs' => true,
    ),
    'rangeFloat' => 
    array (
      'actualFields' => 
      array (
        0 => 'from',
        1 => 'to',
      ),
      'fields' => 
      array (
        'from' => 
        array (
          'type' => 'float',
        ),
        'to' => 
        array (
          'type' => 'float',
        ),
      ),
      'naming' => 'prefix',
      'notMergeable' => true,
      'notCreatable' => true,
      'filter' => false,
      'skipOrmDefs' => true,
    ),
    'rangeInt' => 
    array (
      'actualFields' => 
      array (
        0 => 'from',
        1 => 'to',
      ),
      'fields' => 
      array (
        'from' => 
        array (
          'type' => 'int',
        ),
        'to' => 
        array (
          'type' => 'int',
        ),
      ),
      'naming' => 'prefix',
      'notMergeable' => true,
      'notCreatable' => true,
      'filter' => false,
      'skipOrmDefs' => true,
    ),
    'text' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'default',
          'type' => 'text',
        ),
        2 => 
        array (
          'name' => 'maxLength',
          'type' => 'int',
        ),
        3 => 
        array (
          'name' => 'seeMoreDisabled',
          'type' => 'bool',
          'tooltip' => true,
        ),
        4 => 
        array (
          'name' => 'rows',
          'type' => 'int',
          'min' => 1,
        ),
        5 => 
        array (
          'name' => 'rowsMin',
          'type' => 'int',
          'default' => 2,
          'min' => 1,
          'hidden' => true,
        ),
        6 => 
        array (
          'name' => 'cutHeight',
          'type' => 'int',
          'default' => 200,
          'min' => 1,
        ),
        7 => 
        array (
          'name' => 'displayRawText',
          'type' => 'bool',
        ),
        8 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'filter' => true,
      'personalData' => true,
      'textFilter' => true,
      'textFilterForeign' => true,
      'fullTextSearch' => true,
    ),
    'url' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'default',
          'type' => 'varchar',
        ),
        2 => 
        array (
          'name' => 'maxLength',
          'type' => 'int',
        ),
        3 => 
        array (
          'name' => 'strip',
          'type' => 'bool',
        ),
        4 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        5 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'filter' => true,
      'fieldDefs' => 
      array (
        'type' => 'varchar',
      ),
      'personalData' => true,
    ),
    'varchar' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'default',
          'type' => 'varchar',
        ),
        2 => 
        array (
          'name' => 'maxLength',
          'type' => 'int',
        ),
        3 => 
        array (
          'name' => 'trim',
          'type' => 'bool',
          'default' => true,
        ),
        4 => 
        array (
          'name' => 'options',
          'type' => 'multiEnum',
        ),
        5 => 
        array (
          'name' => 'audited',
          'type' => 'bool',
        ),
        6 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
      ),
      'validationList' => 
      array (
        0 => 'required',
        1 => 'maxLength',
      ),
      'filter' => true,
      'personalData' => true,
      'textFilter' => true,
      'textFilterForeign' => true,
      'dynamicLogicOptions' => true,
      'fullTextSearch' => true,
    ),
    'wysiwyg' => 
    array (
      'params' => 
      array (
        0 => 
        array (
          'name' => 'required',
          'type' => 'bool',
          'default' => false,
        ),
        1 => 
        array (
          'name' => 'default',
          'type' => 'text',
        ),
        2 => 
        array (
          'name' => 'height',
          'type' => 'int',
        ),
        3 => 
        array (
          'name' => 'minHeight',
          'type' => 'int',
        ),
        4 => 
        array (
          'name' => 'readOnly',
          'type' => 'bool',
        ),
        5 => 
        array (
          'name' => 'attachmentField',
          'type' => 'varchar',
          'hidden' => true,
        ),
        6 => 
        array (
          'name' => 'useIframe',
          'type' => 'bool',
        ),
      ),
      'filter' => true,
      'fieldDefs' => 
      array (
        'type' => 'text',
      ),
      'personalData' => true,
      'textFilter' => true,
      'fullTextSearch' => true,
    ),
  ),
  'integrations' => 
  array (
    '99acres' => 
    array (
      'fields' => 
      array (
        'apiKey' => 
        array (
          'type' => 'varchar',
          'maxLength' => 255,
          'required' => true,
        ),
      ),
      'allowUserAccounts' => false,
      'view' => 'views/admin/integrations/99acres',
      'authMethod' => '99acres',
    ),
    'FacebookLead' => 
    array (
      'fields' => 
      array (
        'apiKey' => 
        array (
          'type' => 'varchar',
          'maxLength' => 255,
          'required' => true,
        ),
      ),
      'allowUserAccounts' => false,
      'view' => 'views/admin/integrations/Facebook-Lead',
      'authMethod' => 'FacebookLead',
    ),
    'GoogleFormExtension' => 
    array (
      'fields' => 
      array (
        'apiKey' => 
        array (
          'type' => 'varchar',
          'maxLength' => 255,
          'required' => true,
        ),
      ),
      'allowUserAccounts' => false,
      'view' => 'views/admin/integrations/google-form-extension',
      'authMethod' => 'GoogleFormExtension',
    ),
    'GoogleMaps' => 
    array (
      'fields' => 
      array (
        'apiKey' => 
        array (
          'type' => 'varchar',
          'maxLength' => 255,
          'required' => true,
        ),
      ),
      'allowUserAccounts' => false,
      'view' => 'views/admin/integrations/google-maps',
      'authMethod' => 'GoogleMaps',
    ),
    'indiaMart' => 
    array (
      'fields' => 
      array (
        'apiKey' => 
        array (
          'type' => 'varchar',
          'maxLength' => 255,
          'required' => true,
        ),
      ),
      'allowUserAccounts' => false,
      'view' => 'views/admin/integrations/indiaMart',
      'authMethod' => 'indiaMart',
    ),
    'magicbricks' => 
    array (
      'fields' => 
      array (
        'apiKey' => 
        array (
          'type' => 'varchar',
          'maxLength' => 255,
          'required' => true,
        ),
      ),
      'allowUserAccounts' => false,
      'view' => 'views/admin/integrations/magicbricks',
      'authMethod' => 'magicbricks',
    ),
  ),
  'scopes' => 
  array (
    'ArrayValue' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'Attachment' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'AuthLogRecord' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'AuthToken' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'Currency' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'Dashboard' => 
    array (
      'entity' => false,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'Email' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => true,
      'acl' => true,
      'aclPortal' => 'recordAllAccountContactOwnNo',
      'notifications' => true,
      'object' => true,
      'customizable' => true,
      'activity' => true,
      'activityStatusList' => 
      array (
        0 => 'Draft',
      ),
      'historyStatusList' => 
      array (
        0 => 'Archived',
        1 => 'Sent',
      ),
    ),
    'EmailAccount' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
    ),
    'EmailAccountScope' => 
    array (
      'entity' => false,
      'layouts' => false,
      'tab' => false,
      'acl' => 'boolean',
    ),
    'EmailAddress' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'EmailFilter' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'notifications' => false,
      'object' => false,
      'customizable' => false,
    ),
    'EmailTemplate' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => true,
      'acl' => true,
      'customizable' => false,
    ),
    'EmailTemplateCategory' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => 'recordAllTeamNo',
      'customizable' => true,
      'importable' => false,
      'type' => 'CategoryTree',
      'notifications' => false,
    ),
    'Extension' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'ExternalAccount' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => 'boolean',
      'aclPortal' => false,
      'customizable' => false,
    ),
    'Import' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => true,
      'acl' => 'boolean',
      'customizable' => false,
    ),
    'InboundEmail' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
    ),
    'Integration' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'Job' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'LastViewed' => 
    array (
      'entity' => false,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'LeadCapture' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'LeadCaptureLogRecord' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'Note' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'Notification' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'PasswordChangeRequest' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'PhoneNumber' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'Portal' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'PortalRole' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'PortalUser' => 
    array (
    ),
    'Preferences' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'Role' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'ScheduledJob' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'ScheduledJobLogRecord' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'Stream' => 
    array (
      'entity' => false,
      'layouts' => false,
      'tab' => true,
      'acl' => false,
      'customizable' => false,
    ),
    'Team' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => true,
      'acl' => true,
      'aclActionList' => 
      array (
        0 => 'read',
      ),
      'aclLevelList' => 
      array (
        0 => 'all',
        1 => 'team',
        2 => 'no',
      ),
      'customizable' => false,
    ),
    'Template' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => true,
      'acl' => 'recordAllTeamNo',
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'disabled' => false,
    ),
    'UniqueId' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'customizable' => false,
    ),
    'User' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclActionList' => 
      array (
        0 => 'read',
        1 => 'edit',
      ),
      'aclActionLevelListMap' => 
      array (
        'edit' => 
        array (
          0 => 'own',
          1 => 'no',
        ),
      ),
      'customizable' => true,
      'object' => true,
    ),
    'UserData' => 
    array (
      'entity' => true,
    ),
    'Webhook' => 
    array (
      'entity' => true,
      'acl' => 'boolean',
    ),
    'WebhookEventQueueItem' => 
    array (
      'entity' => true,
    ),
    'WebhookQueueItem' => 
    array (
      'entity' => true,
    ),
    'Account' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => 'recordAllAccountNo',
      'module' => 'Crm',
      'customizable' => true,
      'stream' => true,
      'importable' => true,
      'notifications' => true,
      'object' => true,
      'hasPersonalData' => true,
      'disabled' => false,
      'statusField' => NULL,
    ),
    'Activities' => 
    array (
      'entity' => false,
      'layouts' => false,
      'tab' => false,
      'acl' => 'boolean',
      'aclPortal' => 'boolean',
      'module' => 'Crm',
      'customizable' => false,
    ),
    'Calendar' => 
    array (
      'entity' => false,
      'tab' => true,
      'acl' => 'boolean',
      'module' => 'Crm',
    ),
    'Call' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => 'recordAllAccountContactOwnNo',
      'module' => 'Crm',
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'calendar' => true,
      'activity' => true,
      'object' => true,
      'activityStatusList' => 
      array (
        0 => 'Planned',
      ),
      'historyStatusList' => 
      array (
        0 => 'Held',
        1 => 'Not Held',
      ),
      'statusField' => 'status',
    ),
    'Campaign' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'module' => 'Crm',
      'customizable' => true,
      'stream' => false,
      'importable' => false,
      'object' => true,
      'statusField' => 'status',
    ),
    'CampaignLogRecord' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'module' => 'Crm',
      'customizable' => false,
      'stream' => false,
      'importable' => false,
    ),
    'CampaignTrackingUrl' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'module' => 'Crm',
      'customizable' => false,
      'stream' => false,
      'importable' => false,
    ),
    'Case' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => 'recordAllAccountContactOwnNo',
      'module' => 'Crm',
      'customizable' => true,
      'stream' => true,
      'importable' => true,
      'notifications' => true,
      'object' => true,
      'statusField' => 'status',
    ),
    'Contact' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => 'recordAllAccountContactNo',
      'module' => 'Crm',
      'customizable' => true,
      'stream' => true,
      'importable' => true,
      'notifications' => true,
      'object' => true,
      'hasPersonalData' => true,
    ),
    'Document' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'module' => 'Crm',
      'customizable' => true,
      'importable' => false,
      'notifications' => true,
      'object' => true,
    ),
    'DocumentFolder' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => 'recordAllTeamNo',
      'aclPortal' => 'recordAllNo',
      'module' => 'Crm',
      'customizable' => true,
      'importable' => false,
      'type' => 'CategoryTree',
      'stream' => false,
      'notifications' => false,
    ),
    'EmailQueueItem' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'notifications' => false,
      'object' => false,
      'customizable' => false,
      'module' => 'Crm',
    ),
    'KnowledgeBaseArticle' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => 'recordAllTeamNo',
      'aclPortal' => 'recordAllNo',
      'module' => 'Crm',
      'customizable' => true,
      'importable' => true,
      'notifications' => false,
      'object' => true,
    ),
    'KnowledgeBaseCategory' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => 'recordAllTeamNo',
      'aclPortal' => 'recordAllNo',
      'module' => 'Crm',
      'customizable' => true,
      'importable' => false,
      'type' => 'CategoryTree',
      'stream' => false,
      'notifications' => false,
    ),
    'Lead' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => 'recordAllOwnNo',
      'module' => 'Crm',
      'customizable' => true,
      'stream' => true,
      'importable' => true,
      'notifications' => true,
      'object' => true,
      'statusField' => 'status',
      'hasPersonalData' => true,
    ),
    'MassEmail' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'notifications' => false,
      'object' => false,
      'customizable' => false,
      'module' => 'Crm',
    ),
    'Meeting' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => 'recordAllAccountContactOwnNo',
      'module' => 'Crm',
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'calendar' => true,
      'activity' => true,
      'object' => true,
      'activityStatusList' => 
      array (
        0 => 'Planned',
      ),
      'historyStatusList' => 
      array (
        0 => 'Held',
        1 => 'Not Held',
      ),
      'statusField' => 'status',
    ),
    'Opportunity' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => 'recordAllAccountContactOwnNo',
      'module' => 'Crm',
      'customizable' => true,
      'stream' => true,
      'importable' => true,
      'notifications' => true,
      'object' => true,
      'statusField' => 'stage',
      'kanbanStatusIgnoreList' => 
      array (
        0 => 'Closed Lost',
      ),
    ),
    'Reminder' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'module' => 'Crm',
      'customizable' => false,
      'importable' => false,
    ),
    'Target' => 
    array (
      'entity' => false,
      'layouts' => false,
      'tab' => false,
      'acl' => false,
      'module' => 'Crm',
      'customizable' => false,
      'importable' => false,
      'notifications' => false,
      'object' => true,
    ),
    'TargetList' => 
    array (
      'entity' => true,
      'layouts' => false,
      'tab' => true,
      'acl' => true,
      'module' => 'Crm',
      'customizable' => false,
      'stream' => false,
      'importable' => false,
      'notifications' => true,
      'object' => true,
    ),
    'Task' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'activityStatusList' => 
      array (
        0 => 'Not Started',
        1 => 'Started',
      ),
      'historyStatusList' => 
      array (
        0 => 'Completed',
      ),
      'module' => 'Crm',
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'calendar' => true,
      'object' => true,
      'statusField' => 'status',
      'stream' => true,
      'kanbanStatusIgnoreList' => 
      array (
        0 => 'Canceled',
        1 => 'Deferred',
      ),
    ),
    'BillingEntity' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
      'statusField' => NULL,
    ),
    'ClosedTask' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
    'ContactList' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => false,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
      'statusField' => NULL,
    ),
    'ContentTemplate' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => false,
      'disabled' => false,
      'type' => 'Base',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
    'Demo' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
    'Designation' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
    'EmailReminder' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
      'statusField' => NULL,
    ),
    'Estimate' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
    'Export' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => false,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
    'ExportResult' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => false,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
    'HolidayCalender' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => false,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
      'statusField' => NULL,
    ),
    'ImportResult' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
      'statusField' => NULL,
    ),
    'Invoice' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
    'MessageLog' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => false,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
      'statusField' => NULL,
    ),
    'MyCampaigns' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => false,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
      'statusField' => NULL,
    ),
    'OfficeLocation' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
    'Payments' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
      'statusField' => NULL,
    ),
    'SMSReminder' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
    'SendSMSData' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
      'statusField' => NULL,
    ),
    'SenderID' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => false,
      'disabled' => false,
      'type' => 'Base',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
    'SentEmailReminder' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
    'SentMessages' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => false,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
      'statusField' => NULL,
    ),
    'TEsting2811' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
    'Test' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => false,
      'disabled' => false,
      'type' => 'Base',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
    'TestEntity2710' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
    'TestingEntity' => 
    array (
      'entity' => true,
      'layouts' => true,
      'tab' => true,
      'acl' => true,
      'aclPortal' => true,
      'aclPortalLevelList' => 
      array (
        0 => 'all',
        1 => 'account',
        2 => 'contact',
        3 => 'own',
        4 => 'no',
      ),
      'customizable' => true,
      'importable' => true,
      'notifications' => true,
      'stream' => true,
      'disabled' => false,
      'type' => 'Company',
      'module' => 'Custom',
      'object' => true,
      'isCustom' => true,
    ),
  ),
  'themes' => 
  array (
    'Finnova' => 
    array (
      'stylesheet' => 'client/css/finnova/espo.css',
      'stylesheetIframe' => 'client/css/finnova/espo-iframe.css',
      'dashboardCellHeight' => 155,
      'dashboardCellMargin' => 19,
      'navbarHeight' => 43,
      'modalFooterAtTheTop' => true,
      'modalFullHeight' => true,
      'fontSize' => 14,
      'textColor' => '#333',
      'chartGridColor' => '#ddd',
      'chartSuccessColor' => '#87C956',
      'chartTickColor' => '#e8eced',
      'chartColorList' => 
      array (
        0 => '#6FA8D6',
        1 => '#4E6CAD',
        2 => '#EDC555',
        3 => '#ED8F42',
        4 => '#DE6666',
        5 => '#7CC4A4',
        6 => '#8A7CC2',
        7 => '#D4729B',
        8 => '#bfbfbf',
      ),
      'chartColorAlternativeList' => 
      array (
        0 => '#6FA8D6',
        1 => '#EDC555',
        2 => '#ED8F42',
        3 => '#7CC4A4',
        4 => '#D4729B',
      ),
    ),
    'FinnovaRtl' => 
    array (
      'stylesheet' => 'client/css/finnova/espo-rtl.css',
      'stylesheetIframe' => 'client/css/finnova/espo-rtl-iframe.css',
      'dashboardCellHeight' => 155,
      'dashboardCellMargin' => 19,
      'navbarHeight' => 43,
      'modalFooterAtTheTop' => true,
      'modalFullHeight' => true,
      'fontSize' => 14,
      'textColor' => '#333',
      'chartGridColor' => '#ddd',
      'chartTickColor' => '#e8eced',
      'chartSuccessColor' => '#87C956',
      'chartColorList' => 
      array (
        0 => '#6FA8D6',
        1 => '#4E6CAD',
        2 => '#EDC555',
        3 => '#ED8F42',
        4 => '#DE6666',
        5 => '#7CC4A4',
        6 => '#8A7CC2',
        7 => '#D4729B',
        8 => '#bfbfbf',
      ),
      'chartColorAlternativeList' => 
      array (
        0 => '#6FA8D6',
        1 => '#EDC555',
        2 => '#ED8F42',
        3 => '#7CC4A4',
        4 => '#D4729B',
      ),
    ),
    'FinnovaVertical' => 
    array (
      'stylesheet' => 'client/css/finnova/espo-vertical.css',
      'stylesheetIframe' => 'client/css/finnova/espo-vertical-iframe.css',
      'navbarIsVertical' => true,
      'recordTopButtonsStickTop' => 61,
      'recordTopButtonsBlockHeight' => 21,
      'dashboardCellHeight' => 155,
      'dashboardCellMargin' => 19,
      'modalFooterAtTheTop' => true,
      'modalFullHeight' => true,
      'fontSize' => 14,
      'navbarHeight' => 30,
      'logo' => 'client/img/fincrm_logo.png',
      'textColor' => '#333',
      'chartGridColor' => '#ddd',
      'chartTickColor' => '#e8eced',
      'chartSuccessColor' => '#87C956',
      'chartColorList' => 
      array (
        0 => '#6FA8D6',
        1 => '#4E6CAD',
        2 => '#EDC555',
        3 => '#ED8F42',
        4 => '#DE6666',
        5 => '#7CC4A4',
        6 => '#8A7CC2',
        7 => '#D4729B',
        8 => '#bfbfbf',
      ),
      'chartColorAlternativeList' => 
      array (
        0 => '#6FA8D6',
        1 => '#EDC555',
        2 => '#ED8F42',
        3 => '#7CC4A4',
        4 => '#D4729B',
      ),
    ),
    'Hazyblue' => 
    array (
      'stylesheet' => 'client/css/finnova/hazyblue.css',
      'stylesheetIframe' => 'client/css/finnova/hazyblue-iframe.css',
      'dashboardCellHeight' => 155,
      'dashboardCellMargin' => 19,
      'navbarHeight' => 43,
      'modalFooterAtTheTop' => true,
      'modalFullHeight' => true,
      'fontSize' => 14,
      'textColor' => '#333',
      'chartGridColor' => '#ddd',
      'chartTickColor' => '#e8eced',
      'chartSuccessColor' => '#85b75f',
      'chartColorList' => 
      array (
        0 => '#6FA8D6',
        1 => '#EDC555',
        2 => '#DE6666',
        3 => '#8A7CC2',
        4 => '#c1834d',
        5 => '#4E6CAD',
        6 => '#ED8F42',
        7 => '#d69cc7',
        8 => '#bfbfbf',
      ),
      'chartColorAlternativeList' => 
      array (
        0 => '#6FA8D6',
        1 => '#EDC555',
        2 => '#DE6666',
        3 => '#8A7CC2',
        4 => '#c1834d',
      ),
    ),
    'HazyblueVertical' => 
    array (
      'stylesheet' => 'client/css/finnova/hazyblue-vertical.css',
      'stylesheetIframe' => 'client/css/finnova/hazyblue-vertical-iframe.css',
      'navbarIsVertical' => true,
      'recordTopButtonsStickTop' => 61,
      'recordTopButtonsBlockHeight' => 21,
      'dashboardCellHeight' => 155,
      'dashboardCellMargin' => 19,
      'modalFooterAtTheTop' => true,
      'modalFullHeight' => true,
      'fontSize' => 14,
      'navbarHeight' => 30,
      'logo' => 'client/img/fincrm_logo.png',
      'textColor' => '#333',
      'chartGridColor' => '#ddd',
      'chartTickColor' => '#e8eced',
      'chartSuccessColor' => '#85b75f',
      'chartColorList' => 
      array (
        0 => '#6FA8D6',
        1 => '#EDC555',
        2 => '#DE6666',
        3 => '#8A7CC2',
        4 => '#c1834d',
        5 => '#4E6CAD',
        6 => '#ED8F42',
        7 => '#d69cc7',
        8 => '#bfbfbf',
      ),
      'chartColorAlternativeList' => 
      array (
        0 => '#6FA8D6',
        1 => '#EDC555',
        2 => '#DE6666',
        3 => '#8A7CC2',
        4 => '#c1834d',
      ),
    ),
    'Sakura' => 
    array (
      'stylesheet' => 'client/css/finnova/sakura.css',
      'stylesheetIframe' => 'client/css/finnova/sakura-iframe.css',
      'dashboardCellHeight' => 155,
      'dashboardCellMargin' => 19,
      'navbarHeight' => 43,
      'modalFooterAtTheTop' => true,
      'modalFullHeight' => true,
      'fontSize' => 14,
      'textColor' => '#333',
      'chartGridColor' => '#ddd',
      'chartTickColor' => '#e8eced',
      'chartSuccessColor' => '#83CD77',
      'chartColorList' => 
      array (
        0 => '#6FA8D6',
        1 => '#4E6CAD',
        2 => '#EDC555',
        3 => '#ED8F42',
        4 => '#DE6666',
        5 => '#7CC4A4',
        6 => '#8A7CC2',
        7 => '#D4729B',
        8 => '#bfbfbf',
      ),
      'chartColorAlternativeList' => 
      array (
        0 => '#6FA8D6',
        1 => '#EDC555',
        2 => '#ED8F42',
        3 => '#7CC4A4',
        4 => '#D4729B',
      ),
    ),
    'SakuraVertical' => 
    array (
      'stylesheet' => 'client/css/finnova/sakura-vertical.css',
      'stylesheetIframe' => 'client/css/finnova/sakura-vertical-iframe.css',
      'navbarIsVertical' => true,
      'recordTopButtonsStickTop' => 61,
      'recordTopButtonsBlockHeight' => 21,
      'dashboardCellHeight' => 155,
      'dashboardCellMargin' => 19,
      'modalFooterAtTheTop' => true,
      'modalFullHeight' => true,
      'fontSize' => 14,
      'navbarHeight' => 30,
      'logo' => 'client/img/fincrm_logo.png',
      'textColor' => '#333',
      'chartGridColor' => '#ddd',
      'chartTickColor' => '#e8eced',
      'chartSuccessColor' => '#83CD77',
      'chartColorList' => 
      array (
        0 => '#6FA8D6',
        1 => '#4E6CAD',
        2 => '#EDC555',
        3 => '#ED8F42',
        4 => '#DE6666',
        5 => '#7CC4A4',
        6 => '#8A7CC2',
        7 => '#D4729B',
        8 => '#bfbfbf',
      ),
      'chartColorAlternativeList' => 
      array (
        0 => '#6FA8D6',
        1 => '#EDC555',
        2 => '#ED8F42',
        3 => '#7CC4A4',
        4 => '#D4729B',
      ),
    ),
    'Violet' => 
    array (
      'stylesheet' => 'client/css/finnova/violet.css',
      'stylesheetIframe' => 'client/css/finnova/violet-iframe.css',
      'dashboardCellHeight' => 155,
      'dashboardCellMargin' => 19,
      'navbarHeight' => 43,
      'modalFooterAtTheTop' => true,
      'modalFullHeight' => true,
      'textColor' => '#333',
      'fontSize' => 14,
      'chartGridColor' => '#ddd',
      'chartTickColor' => '#e8eced',
      'chartSuccessColor' => '#7BC169',
      'chartColorList' => 
      array (
        0 => '#6FA8D6',
        1 => '#4E6CAD',
        2 => '#EDC555',
        3 => '#ED8F42',
        4 => '#DE6666',
        5 => '#7CC4A4',
        6 => '#8A7CC2',
        7 => '#D4729B',
        8 => '#bfbfbf',
      ),
      'chartColorAlternativeList' => 
      array (
        0 => '#6FA8D6',
        1 => '#EDC555',
        2 => '#ED8F42',
        3 => '#7CC4A4',
        4 => '#D4729B',
      ),
    ),
    'VioletVertical' => 
    array (
      'stylesheet' => 'client/css/finnova/violet-vertical.css',
      'stylesheetIframe' => 'client/css/finnova/violet-vertical-iframe.css',
      'navbarIsVertical' => true,
      'recordTopButtonsStickTop' => 61,
      'recordTopButtonsBlockHeight' => 21,
      'dashboardCellHeight' => 155,
      'dashboardCellMargin' => 19,
      'modalFooterAtTheTop' => true,
      'modalFullHeight' => true,
      'fontSize' => 14,
      'navbarHeight' => 30,
      'logo' => 'client/img/fincrm_logo.png',
      'textColor' => '#333',
      'chartGridColor' => '#ddd',
      'chartTickColor' => '#e8eced',
      'chartSuccessColor' => '#7BC169',
      'chartColorList' => 
      array (
        0 => '#6FA8D6',
        1 => '#4E6CAD',
        2 => '#EDC555',
        3 => '#ED8F42',
        4 => '#DE6666',
        5 => '#7CC4A4',
        6 => '#8A7CC2',
        7 => '#D4729B',
        8 => '#bfbfbf',
      ),
      'chartColorAlternativeList' => 
      array (
        0 => '#6FA8D6',
        1 => '#EDC555',
        2 => '#ED8F42',
        3 => '#7CC4A4',
        4 => '#D4729B',
      ),
    ),
  ),
);
?>