## Questify Q5T URL Shortener API Client for Laravel 5 


#### Installation

Update composer.json file:
```
{
    // ...
    "require": {
        "evgeny-l/q5t-api-client" : "dev-master"
    }
    // ...
    "repositories": [
        {
            "type": "vcs",
            "no-api": true,
            "url":  "git@github.com:evgeny-l/q5t-api-client.git"
        }
    ]
    // ...
}

```
**Update composer**.

Update `services.php` config:
```
    'q5t_api' => [
        'api_url'       => env('Q5T_API_URL', 'https://q5t.co/api/v1/'),
        'access_token'  => env('Q5T_API_ACCESS_TOKEN'),
        'timeout'       => 3,
    ],
```

Update `.env` file with your API access token:
```
# Q5T API
Q5T_API_ACCESS_TOKEN=PLACE_YOUR_TOKEN_HERE
```

Update `app.php` config file:
```
    'providers' => [
        //...
        ShowHeroes\VideoLibraryAPI\VideoLibraryAPIClientServiceProvider::class,
    ],
```
