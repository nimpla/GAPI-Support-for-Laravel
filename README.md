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

public function getGapi() {
    $serviceAccount = 'test@test.iam.gserviceaccount.com';
    $key = Storage::disk('local')->get('serviceaccount_key.p12');
    $gapi = new Gapi($serviceAccount, $key);
    return $gapi;
}

public function getAnalytics($gaId) {
    $gapi = $this->getGapi();
    $gapi->requestReportData($gaId, array('userType'), array('visits'), null, null, '7daysAgo', 'yesterday');
    return $gapi->getVisits();
}

public function getAnalyticsExtended($gaId) {
    $gapi = $this->getGapi();
    $gapi->requestReportData($gaId, array('week'), array('users', 'visits', 'pageViews', 'timeOnPage', 'avgSessionDuration', 'bounceRate'), 'week', null, '30daysAgo', 'today');
    
    $data = [];
    $count = 0;
    foreach($gapi->getResults() as $result) {
        $data[$count]['week'] = $result->getWeek();
        $data[$count]['users'] = $result->getUsers();
        $data[$count]['visits'] = $result->getVisits();
        $data[$count]['pageViews'] = $result->getPageViews();
        $data[$count]['timeOnPage'] = $result->getTimeOnPage();
        $data[$count]['avgSessionDuration'] = $result->getAvgSessionDuration();
        $data[$count]['bounceRate'] = $result->getBounceRate();
        $count++;
    }

    return response()->json($data);
}
```
