# buffer-php

Buffer API library client for PHP

__This library is generated by [alpaca](https://github.com/pksunkara/alpaca)__

## Installation

Make sure you have [composer](https://getcomposer.org) installed.

Add the following to your composer.json

```js
{
    "require": {
        "pksunkara/buffer-alpaca": "*"
    }
}
```

Update your dependencies

```bash
$ php composer.phar update
```

> This package follows the `PSR-0` convention names for its classes, which means you can easily integrate these classes loading in your own autoloader.

## Usage

```php
<?php

// This file is generated by Composer
require_once 'vendor/autoload.php';

// Then we instantiate a client (as shown below)
```

### Build a client

##### Without any authentication

```php
$client = new \Buffer\Client();

// If you need to send options
$client = new \Buffer\Client(array(), $options);
```

##### Oauth acess token

```php
$client = new \Buffer\Client('1a2b3', $options);
```

##### Oauth client secret

```php
$auth = array('client_id' => '09a8b7', 'client_secret' => '1a2b3');

$client = new \Buffer\Client($auth, $options);
```

### Response information

```php
$response = $client->klass('args')->method('args');

$response->body;
// >>> 'Hello world!'

$response->code;
// >>> 200

$response->headers;
// >>> array('content-type' => 'text/html')
```
##### HTML response

```php
$response->body;
// >>> 'The username is pksunkara!'
```

##### JSON response

```php
$response->body;
// >>> array('user' => 'pksunkara')
```

### Request body information

##### RAW request

```php
$body = 'username=pksunkara';
```

##### FORM request

```php
$body = array('user' => 'pksunkara');
```


### Information api

Returns api instance to get auxilary information about Buffer useful when creating your app.

```php
$info = $client->info();
```

##### Services and configuration (GET /info/configuration)

Returns an object with the current configuration that Buffer is using, including supported services, their icons and the varying limits of character and schedules.

```php
$data = $info->show($options);
```

### Authenticated user api

Returns authenticated user api instance.

```php
$user = $client->user();
```

##### Create a social update (POST /updates/create)

Create one or more new status updates.

```php
$data = $user->createUpdate($text, $profile_ids, $options);
```

##### List of user's social profiles (GET /profiles)

Returns an array of social media profiles connected to the authenticated users account.

```php
$data = $user->profiles($options);
```

##### User information (GET /user)

Returns information about the authenticated user.

```php
$data = $user->show($options);
```

### Links api

Returns api instance to get information about links shared through Buffer.

```php
$link = $client->link();
```

##### Amount of link shares (GET /link/shares)

Returns an object with a the numbers of shares a link has had using Buffer.

```php
$data = $link->shares($url, $options);
```

### Social profiles api

Returns a social media profile api instance.

```php
$profile = $client->profile($id);
```

##### List profile's pending updates (GET /profiles/:id/updates/pending)

Returns an array of updates that are currently in the buffer for an individual social media profile.

```php
$data = $profile->pending($options);
```

##### Edit profile's updates order (POST /profiles/:id/updates/reorder)

Edit the order at which statuses for the specified social media profile will be sent out of the buffer.

```php
$data = $profile->reorder($order, $options);
```

##### List profile's sent updates (GET /profiles/:id/updates/sent)

Returns an array of updates that have been sent from the buffer for an individual social media profile.

```php
$data = $profile->sent($options);
```

##### Get this social profile (GET /profiles/:id)

Returns details of the single specified social media profile.

```php
$data = $profile->show($options);
```

##### Shuffle profile's updates (POST /profiles/:id/updates/shuffle)

Randomize the order at which statuses for the specified social media profile will be sent out of the buffer.

```php
$data = $profile->shuffle($options);
```

### Posting schedules api

Returns scheduling api instance for social media profile.

```php
$schedule = $client->schedule($id);
```

##### Get profile's posting schedules (GET /profiles/:id/schedules)

Returns details of the posting schedules associated with a social media profile.

```php
$data = $schedule->list($options);
```

##### Update profile's posting schedules (POST /profiles/:id/schedules/update)

Set the posting schedules for the specified social media profile.

```php
$data = $schedule->update($schedules, $options);
```

### Social updates api

Returns a social media update api instance.

```php
$update = $client->update($id);
```

##### Delete this update (POST /updates/:id/destroy)

Permanently delete an existing status update.

```php
$data = $update->destroy($options);
```

##### List interactions of the update (GET /updates/:id/interactions)

Returns the detailed information on individual interactions with the social media update such as favorites, retweets and likes.

```php
$data = $update->interactions($options);
```

##### Share this update (POST /updates/:id/share)

Immediately shares a single pending update and recalculates times for updates remaining in the queue.

```php
$data = $update->share($options);
```

##### Get this social update (GET /updates/:id)

Returns a single social media update.

```php
$data = $update->show($options);
```

##### Move this update to top (POST /updates/:id/move_to_top)

Move an existing status update to the top of the queue and recalculate times for all updates in the queue. Returns the update with its new posting time.

```php
$data = $update->top($options);
```

##### Edit this update (POST /updates/:id/update)

Edit an existing, individual status update.

```php
$data = $update->update($text, $options);
```

## Contributors
Here is a list of [Contributors]((https://github.com/alpaca-api/buffer-node/contributors)

### TODO

## License
MIT

## Bug Reports
Report [here](https://github.com/alpaca-api/buffer-node/issues).

## Contact
Pavan Kumar Sunkara (pavan.sss1991@gmail.com)
