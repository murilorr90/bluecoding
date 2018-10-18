---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Reservations
<!-- START_fcbe63f1cfce9685a0994ece470ec19a -->
## List Reservations

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/reservations" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/reservations",
    "method": "GET",
    "headers": {
        "accept": "application/json",
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": true,
    "code": 200,
    "message": "Reservations retrieved successfully",
    "response": [
        {
            "id": 1,
            "host_id": 1,
            "created_at": "2018-10-18 00:21:43",
            "updated_at": "2018-10-18 00:21:44",
            "guests": [
                {
                    "id": 2,
                    "reservation_id": 1,
                    "name": "Milford Kling"
                },
                {
                    "id": 3,
                    "reservation_id": 1,
                    "name": "Gaston Goyette"
                }
            ]
        }
    ]
}
```

### HTTP Request
`GET api/v1/reservations`


<!-- END_fcbe63f1cfce9685a0994ece470ec19a -->

<!-- START_8c00e783877bcb5d7e0066f97c08f4c2 -->
## Create Reservation

> Example request:

```bash
curl -X POST "http://localhost/api/v1/reservations" \
    -H "Accept: application/json" \
    -d "host_id"=13 \
        -d "guests"=[] 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/reservations",
    "method": "POST",
    "data": {
        "host_id": 13,
        "guests": "[]"
    },
    "headers": {
        "accept": "application/json",
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/reservations`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    host_id | integer |  required  | 
    guests | array |  required  | 

<!-- END_8c00e783877bcb5d7e0066f97c08f4c2 -->

<!-- START_d6dac569095ee9f19ee944e2a26350c6 -->
## Show Reservation

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/reservations/{reservation}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/reservations/{reservation}",
    "method": "GET",
    "headers": {
        "accept": "application/json",
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": true,
    "code": 200,
    "message": "Reservation retrieved successfully",
    "response": {
        "id": 1,
        "host_id": 1,
        "created_at": "2018-10-18 00:21:43",
        "updated_at": "2018-10-18 00:21:44",
        "guests": [
            {
                "id": 2,
                "reservation_id": 1,
                "email": "marilie.klein@example.net",
                "name": "Milford Kling",
                "first_name": "Milford",
                "last_name": "Kling",
                "is_host": true,
                "date_of_birth": "2005-12-09 00:00:00",
                "latitude": "-26.517850",
                "longitude": "-46.091975",
                "created_at": "2018-10-17 16:49:49",
                "updated_at": "2018-10-17 16:49:49"
            },
            {
                "id": 3,
                "reservation_id": 1,
                "email": "ignacio65@example.org",
                "name": "Gaston Goyette",
                "first_name": "Gaston",
                "last_name": "Goyette",
                "is_host": true,
                "date_of_birth": "1990-06-15 00:00:00",
                "latitude": "-27.201541",
                "longitude": "-46.671625",
                "created_at": "2018-10-17 16:49:49",
                "updated_at": "2018-10-17 16:49:49"
            }
        ]
    }
}
```

### HTTP Request
`GET api/v1/reservations/{reservation}`


<!-- END_d6dac569095ee9f19ee944e2a26350c6 -->

<!-- START_a557669c857738380ee248cb591d4f63 -->
## Delete Reservation

> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/reservations/{reservation}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/reservations/{reservation}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json",
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/reservations/{reservation}`


<!-- END_a557669c857738380ee248cb591d4f63 -->

<!-- START_cdc92d2c94a2c054214ef74358b9f339 -->
## Add Guest to Reservation

> Example request:

```bash
curl -X PATCH "http://localhost/api/v1/reservations/{reservation}/add-guest" \
    -H "Accept: application/json" \
    -d "guests"=[] 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/reservations/{reservation}/add-guest",
    "method": "PATCH",
    "data": {
        "guests": "[]"
    },
    "headers": {
        "accept": "application/json",
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PATCH api/v1/reservations/{reservation}/add-guest`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    guests | array |  required  | 

<!-- END_cdc92d2c94a2c054214ef74358b9f339 -->

#Users
<!-- START_1aff981da377ba9a1bbc56ff8efaec0d -->
## List Users

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/users" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/users",
    "method": "GET",
    "headers": {
        "accept": "application/json",
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": true,
    "code": 200,
    "message": "Users retrieved successfully",
    "response": [
        {
            "id": 1,
            "reservation_id": null,
            "email": "alda83@example.org",
            "name": "Gay Frami",
            "first_name": "Gay",
            "last_name": "Frami",
            "is_host": false,
            "date_of_birth": "1985-05-20 00:00:00",
            "latitude": "-27.852451",
            "longitude": "-46.566261",
            "created_at": "2018-10-17 16:49:49",
            "updated_at": "2018-10-17 16:49:49"
        },
        {
            "id": 2,
            "reservation_id": 1,
            "email": "marilie.klein@example.net",
            "name": "Milford Kling",
            "first_name": "Milford",
            "last_name": "Kling",
            "is_host": true,
            "date_of_birth": "2005-12-09 00:00:00",
            "latitude": "-26.517850",
            "longitude": "-46.091975",
            "created_at": "2018-10-17 16:49:49",
            "updated_at": "2018-10-17 16:49:49"
        },
        {
            "id": 3,
            "reservation_id": 1,
            "email": "ignacio65@example.org",
            "name": "Gaston Goyette",
            "first_name": "Gaston",
            "last_name": "Goyette",
            "is_host": true,
            "date_of_birth": "1990-06-15 00:00:00",
            "latitude": "-27.201541",
            "longitude": "-46.671625",
            "created_at": "2018-10-17 16:49:49",
            "updated_at": "2018-10-17 16:49:49"
        }
    ]
}
```

### HTTP Request
`GET api/v1/users`


<!-- END_1aff981da377ba9a1bbc56ff8efaec0d -->

<!-- START_4194ceb9a20b7f80b61d14d44df366b4 -->
## Create User

> Example request:

```bash
curl -X POST "http://localhost/api/v1/users" \
    -H "Accept: application/json" \
    -d "email"=ltXRKjOKni6HM06L \
        -d "name"=21lB0YIvVhWtOATt \
        -d "first_name"=0qG3rLacV0TCmJbC \
        -d "last_name"=pH6vIVNZ8kUMsp7z \
        -d "is_host"= \
        -d "date_of_birth"=O0Q7K7Q2zXfRZgs1 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/users",
    "method": "POST",
    "data": {
        "email": "ltXRKjOKni6HM06L",
        "name": "21lB0YIvVhWtOATt",
        "first_name": "0qG3rLacV0TCmJbC",
        "last_name": "pH6vIVNZ8kUMsp7z",
        "is_host": false,
        "date_of_birth": "O0Q7K7Q2zXfRZgs1"
    },
    "headers": {
        "accept": "application/json",
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/users`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | 
    name | string |  required  | 
    first_name | string |  required  | 
    last_name | string |  required  | 
    is_host | boolean |  optional  | 
    date_of_birth | date |  required  | 

<!-- END_4194ceb9a20b7f80b61d14d44df366b4 -->

<!-- START_cedc85e856362e0e3b46f5dcd9f8f5d0 -->
## Show User

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/users/{user}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/users/{user}",
    "method": "GET",
    "headers": {
        "accept": "application/json",
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": true,
    "code": 200,
    "message": "User retrieved successfully",
    "response": {
        "id": 1,
        "reservation_id": null,
        "email": "alda83@example.org",
        "name": "Gay Frami",
        "first_name": "Gay",
        "last_name": "Frami",
        "is_host": false,
        "date_of_birth": "1985-05-20 00:00:00",
        "latitude": "-27.852451",
        "longitude": "-46.566261",
        "created_at": "2018-10-17 16:49:49",
        "updated_at": "2018-10-17 16:49:49"
    }
}
```

### HTTP Request
`GET api/v1/users/{user}`


<!-- END_cedc85e856362e0e3b46f5dcd9f8f5d0 -->

<!-- START_824a2630a132ea37db74caa4e230a83c -->
## Update User

> Example request:

```bash
curl -X PUT "http://localhost/api/v1/users/{user}" \
    -H "Accept: application/json" \
    -d "email"=YclzzdbWn9jQNVSs \
        -d "name"=LiY2U7TxRRipWSyi \
        -d "first_name"=N8qqVrOYwCS134qb \
        -d "last_name"=Fbpe6anlSRJSSHCz \
        -d "is_host"= \
        -d "date_of_birth"=L49qB0WMZi28wMGJ 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/users/{user}",
    "method": "PUT",
    "data": {
        "email": "YclzzdbWn9jQNVSs",
        "name": "LiY2U7TxRRipWSyi",
        "first_name": "N8qqVrOYwCS134qb",
        "last_name": "Fbpe6anlSRJSSHCz",
        "is_host": false,
        "date_of_birth": "L49qB0WMZi28wMGJ"
    },
    "headers": {
        "accept": "application/json",
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/users/{user}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  optional  | 
    name | string |  optional  | 
    first_name | string |  optional  | 
    last_name | string |  optional  | 
    is_host | boolean |  optional  | 
    date_of_birth | date |  optional  | 

<!-- END_824a2630a132ea37db74caa4e230a83c -->

<!-- START_22354fc95c42d81a744eece68f5b9b9a -->
## Delete User

> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/users/{user}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/users/{user}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json",
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/users/{user}`


<!-- END_22354fc95c42d81a744eece68f5b9b9a -->

<!-- START_8ee5e2ea8adb6e94ad8028723a7bde75 -->
## Show All Guests

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/users/{user}/guests" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/users/{user}/guests",
    "method": "GET",
    "headers": {
        "accept": "application/json",
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": true,
    "code": 200,
    "message": "Guests retrieved successfully",
    "response": {
        "2": "Milford Kling",
        "3": "Gaston Goyette"
    }
}
```

### HTTP Request
`GET api/v1/users/{user}/guests`


<!-- END_8ee5e2ea8adb6e94ad8028723a7bde75 -->

<!-- START_35025481b92be0a72dc43f1b77ed66d9 -->
## Show All Recommendations

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/users/{user}/recommendations" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/users/{user}/recommendations",
    "method": "GET",
    "headers": {
        "accept": "application/json",
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "success": true,
    "code": 200,
    "message": "Recommendations retrieved successfully",
    "response": [
        {
            "id": 3,
            "name": "Gaston Goyette",
            "email": "ignacio65@example.org",
            "distance": 45.435
        }
    ]
}
```

### HTTP Request
`GET api/v1/users/{user}/recommendations`


<!-- END_35025481b92be0a72dc43f1b77ed66d9 -->


