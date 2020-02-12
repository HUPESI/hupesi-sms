[![GitHub issues](https://img.shields.io/github/issues/hupesi/hupesi-sms.svg?style=flat-square)](https://github.com/hupesi/hupesi-sms/issues)
[![GitHub stars](https://img.shields.io/github/stars/hupesi/hupesi-sms.svg?style=flat-square)](https://github.com/hupesi/hupesi-sms/stargazers)

# HUPESI SMS API

HUPESI SMS API is build for HUPESI SMS - A Bulk SMS Web App


### Prerequisites

To run HUPESI SMS API you have to install HUPESI SMS Application Files on your server.
For more details please visit: [HUPESI SMS](https://sms.hupesi.com/)
```
php >=7.0
HUPESI SMS - Bulk SMS Web App
```

### Installing
Via Composer
```
composer require hupesi/hupesi-sms
```

And Via Bash

```
git clone https://github.com/hupesi/hupesi-sms.git
```

## Usage


 ### Step 1:
If install HUPESI SMS API using Git Clone then load your HUPESI SMS API Class file and Use namespace.
```php
require_once 'src/Class_HUPESI_SMS_API.php';
use HUPESISMS\HUPESISMSAPI;
```
If install HUPESI SMS API using Composer then Require/Include autoload.php file in the index.php of your project or whatever file you need to use **HUPESI SMS API** classes:.
```php
require 'vendor/autoload.php';
use HUPESISMS\HUPESISMSAPI;
```
### Step 2:
set your API_KEY from `https://sms.hupesi.com/sms-api/info` (your application install url)
```php
$api_key = 'qwertyuiop1234567890=';
```
### Step 3:
Change the from number below. It can be a valid phone number or a String
```php
$from = '254700000000';
```

### Step 4:
the number we are sending to - Any phone number
```php
$destination = '254700000000';
```
For multiple number please use Comma (,) after every single number.
```php
$destination = '254700000000,254700000000,254700000000,254700000000';
```
You can insert maximum 100 numbers using comma in single api request.

You have to must include Country code at beginning of the phone number.  

### Step 5:
Replace your Install URL like `https://sms.hupesi.com/sms/api` with `https://sms.hupesi.com/`
`sms/api` is mandatory on your install url

```php
$url = 'https://sms.hupesi.com/sms/api';
```
// SMS Body
```php
$sms = 'This is a test message from HUPESI SMS';
```
// Unicode SMS
```php
$unicode = '1'; //For Unicode message
```
// Voice SMS
```php
$voice = '1'; //For voice message
```
// MMS SMS
```php
$mms = '1'; //For mms message
$media_url = 'https://yourmediaurl.com'; //Insert your media url
```
// Schedule SMS
```php
$schedule_date = '11/02/2020 10:20 AM'; //Date like this format: m/d/Y h:i A
```
// Create Plain/text SMS Body for request
```php
$sms_body = array(
    'api_key' => $api_key,
    'to' => $destination,
    'from' => $from,
    'sms' => $sms
);
```
// Create Unicode SMS Body for request
```php
$sms_body = array(
    'api_key' => $api_key,
    'to' => $destination,
    'from' => $from,
    'sms' => $sms,
    'unicode' => $unicode,
);
```

// Create Voice SMS Body for request
```php
$sms_body = array(
    'api_key' => $api_key,
    'to' => $destination,
    'from' => $from,
    'sms' => $sms,
    'voice' => $voice,
);
```
// Create MMS SMS Body for request
```php
$sms_body = array(
    'api_key' => $api_key,
    'to' => $destination,
    'from' => $from,
    'sms' => $sms, //optional
    'mms' => $mms,
    'media_url' => $media_url,
);
```
// Create Schedule SMS Body for request
```php
$sms_body = array(
    'api_key' => $api_key,
    'to' => $destination,
    'from' => $from,
    'sms' => $sms,
    'schedule' => $schedule_date,
);
```

### Step 6:
Initiate a new HUPESI SMS API request
```php
$client = new HUPESISMSAPI();
```

## Send SMS
Finally send your sms through HUPESI SMS API
```php
$response = $client->send_sms($sms_body, $url);
```

## Get Inbox
Get your all message
```php
$get_inbox=$client->get_inbox($api_key,$url);
```

## Get Balance
Get your account balance
```php
$get_balance=$client->check_balance($api_key,$url);
```
## Response
HUPESI SMS API return response with `json` format, like:

```json
{"code":"ok","message":"Successfully Send"}
```

## Status Code Replies

| Status | Message |
| --- | --- |
| `ok` | Successfully Send |
| `100` | Bad gateway requested |
| `101` | Wrong action |
| `102` | Authentication failed |
| `103` | Invalid phone number |
| `104` | Phone coverage not active |
| `105` | Insufficient balance |
| `106` | Invalid Sender ID |
| `107` | Invalid SMS Type |
| `108` | SMS Gateway not active |
| `109` | Invalid Schedule Time |
| `110` | Media url required |
| `111` | SMS contain spam word. Wait for approval |

## Authors

* **HUPESI ©2020** - *WEBSITE* - [HUPESI](https://hupesi.com)
