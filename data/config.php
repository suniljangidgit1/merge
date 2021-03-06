<?php

$HTTP_HOST 	= $_SERVER['SERVER_NAME'];
$servername = '164.52.205.204';
$username 	= 'proadmin';
$password 	= 'mJmxCj*92WuFcfB_';
$dbname 	= 'crmdev';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if($HTTP_HOST=='164.52.205.201'){
$sql = "SELECT * FROM host_record where domain_url like '%$HTTP_HOST%' AND status=2";
    
}else{
$sql = "SELECT * FROM host_record where domain_url like '%$HTTP_HOST%' AND status=1";
}
$result = $conn->query($sql);
$HostResult=mysqli_fetch_array($result,MYSQLI_ASSOC);

$configSetting=$HostResult['config_details']; 

$configSetting = stripslashes(html_entity_decode($configSetting));
$finalConfigArray=json_decode($configSetting,TRUE);

if($HostResult['domain_url']==$HTTP_HOST){

$db=$finalConfigArray['database']['dbname'];
$user=$finalConfigArray['database']['user'];
$password=$finalConfigArray['database']['password'];
$passwordSalt=$finalConfigArray['passwordSalt'];
$siteUrl=$finalConfigArray['siteUrl'];
$cryptKey=$finalConfigArray['cryptKey'];
$hashSecretKey=$finalConfigArray['hashSecretKey'];

}else{
    header("errorPage.php");
}

return [
'cacheTimestamp' => 1572689079,
'database' => [
'driver' => 'pdo_mysql',
'host' => 'localhost',
'port' => '',
'charset' => 'utf8mb4',
'dbname' => $db,
'user' => $user,
'password' => $password
],
'useCache' => true,
'recordsPerPage' => 20,
'recordsPerPageSmall' => 5,
'applicationName' => 'FinCRM',
'version' => '5.7.6',
'timeZone' => 'UTC',
'dateFormat' => 'MM/DD/YYYY',
'readableDateFormatDisabled' => true,
'timeFormat' => 'hh:mm a',
'weekStart' => 0,
'thousandSeparator' => ',',
'decimalMark' => '.',
'exportDelimiter' => ';',
'currencyList' => [
0 => 'USD'
],
'defaultCurrency' => 'USD',
'baseCurrency' => 'USD',
'currencyRates' => [

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
3 => 'Opportunity',
4 => 'Case',
5 => 'Email',
6 => 'Calendar',
7 => 'Meeting',
8 => 'Call',
9 => 'Task',
10 => '_delimiter_',
// 11 => 'Document',
11 => 'Campaign',
12 => 'KnowledgeBaseArticle',
13 => 'Stream',
14 => 'User'
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
'siteUrl' => $siteUrl,
'passwordSalt' => $passwordSalt,
 'cryptKey' => $cryptKey,
 'hashSecretKey' => $hashSecretKey,
'defaultPermissions' => [
'user' => 33,
'group' => 33
],
'fullTextSearchMinLength' => 4
];

?>
