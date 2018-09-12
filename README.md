# GAPI-Support-for-Laravel
Google Analytics PHP Interface Support for Laravel

Original: https://github.com/erebusnz/gapi-google-analytics-php-interface/

## Installation
```
composer require nimpla/gapi-support-for-laravel
```

## Example
Here you can find an example of using GAPI in Laravel
```php
use Nimpla\Gapi\Gapi;

public function getAnalytics($gaId) {
    $serviceAccount = 'test@test.iam.gserviceaccount.com';
    $key = Storage::disk('local')->get('serviceaccount_key.p12');
    $gapi = new Gapi($serviceAccount, $key);
    $gapi->requestReportData($gaId, array('userType'), array('visits'), null, null, '7daysAgo', 'yesterday');
    return $gapi->getVisits();
}
```
