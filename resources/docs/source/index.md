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

<!-- END_INFO -->

#Auth


<!-- START_bcb0a656ae0448c978e0894c78ccd85a -->
## Login APIs
User Login

> Example request:

```bash
curl -X POST \
    "http://localhost/delivery/public/api/user/auth/login" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"phone":"cumque","password":"et"}'

```

```javascript
const url = new URL(
    "http://localhost/delivery/public/api/user/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "X-Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "phone": "cumque",
    "password": "et"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "data": {
        "name": "Name Example",
        "email": "example@gmail.com",
        "phone": null,
        "image": null,
        "created_at": "2020-04-14 15:00",
        "token": "JWT Token"
    },
    "message": "Logged in successfully",
    "code": 200
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "The phone field is required.",
    "code": 200
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "Phone\/Password Mismatched",
    "code": 200
}
```

### HTTP Request
`POST api/user/auth/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `phone` | string |  required  | valid phone number & min 10-15 in length.
        `password` | string |  required  | min 6 in length.
    
<!-- END_bcb0a656ae0448c978e0894c78ccd85a -->

<!-- START_165c62d5ff80a04a29110deb9fb8a7c6 -->
## Social Login APIs
Social Login eg. facebook, google

> Example request:

```bash
curl -X POST \
    "http://localhost/delivery/public/api/user/auth/social-login" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"name":"sint","phone":19,"email":"iusto","image":"deserunt","social_id":"et","provider":"omnis"}'

```

```javascript
const url = new URL(
    "http://localhost/delivery/public/api/user/auth/social-login"
);

let headers = {
    "Content-Type": "application/json",
    "X-Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "name": "sint",
    "phone": 19,
    "email": "iusto",
    "image": "deserunt",
    "social_id": "et",
    "provider": "omnis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "data": {
        "name": "Name Example",
        "email": "example@gmail.com",
        "phone": null,
        "image": null,
        "created_at": "2020-04-14 15:00",
        "token": "JWT Token"
    },
    "message": "Logged in successfully",
    "code": 201
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "The social id field is required.",
    "code": 200
}
```

### HTTP Request
`POST api/user/auth/social-login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | full name max 100 in length.
        `phone` | integer |  optional  | unique & min 10-15 in length.
        `email` | string |  optional  | unique & valid email address.
        `image` | string |  optional  | image link of user.
        `social_id` | string |  required  | social id of user.
        `provider` | string |  required  | social provider eg.facebook.
    
<!-- END_165c62d5ff80a04a29110deb9fb8a7c6 -->

<!-- START_a94acbd257ac6cbc80053652463ec24c -->
## Register APIs
User Registration

> Example request:

```bash
curl -X POST \
    "http://localhost/delivery/public/api/user/auth/register" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"name":"quis","phone":12,"password":"beatae","email":"minima","image":"accusantium"}'

```

```javascript
const url = new URL(
    "http://localhost/delivery/public/api/user/auth/register"
);

let headers = {
    "Content-Type": "application/json",
    "X-Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "name": "quis",
    "phone": 12,
    "password": "beatae",
    "email": "minima",
    "image": "accusantium"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "status": true,
    "data": {
        "name": "Name Example",
        "email": "example@gmail.com",
        "phone": null,
        "image": null,
        "created_at": "2020-04-14 15:00",
        "token": "JWT Token"
    },
    "message": "Registered successfully",
    "code": 201
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "The Full Name field is required.",
    "code": 200
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "The email has already been taken.",
    "code": 200
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "The password must be at least 6 characters.",
    "code": 200
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "The Image failed to upload.",
    "code": 200
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "Login error",
    "code": 200
}
```

### HTTP Request
`POST api/user/auth/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | full name max 100 in length.
        `phone` | integer |  required  | unique & min 10-15 in length.
        `password` | string |  required  | min 6 in length.
        `email` | string |  optional  | unique & valid email address.
        `image` | file |  optional  | accepts: jpeg,png,gif, filesize upto 2MB.
    
<!-- END_a94acbd257ac6cbc80053652463ec24c -->

<!-- START_a03429a357f72418bbcdb69cc13a5f7f -->
## Get Info APIs
Authenticated User Info
Header: X-Authorization: Bearer {token}

> Example request:

```bash
curl -X GET \
    -G "http://localhost/delivery/public/api/user/auth/get-info" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://localhost/delivery/public/api/user/auth/get-info"
);

let headers = {
    "Content-Type": "application/json",
    "X-Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "data": {
        "name": "Name Example",
        "email": "example@gmail.com",
        "phone": null,
        "image": null,
        "socialLogin": false,
        "created_at": "2020-04-14 15:00"
    },
    "message": "User info fetched successfully",
    "code": 200
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "User not found",
    "code": 200
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "Invalid Request",
    "code": 200
}
```

### HTTP Request
`GET api/user/auth/get-info`


<!-- END_a03429a357f72418bbcdb69cc13a5f7f -->

<!-- START_a0aadb54c04b4c206c4156f5b60e7552 -->
## Update Profile APIs
Update Profile

> Example request:

```bash
curl -X POST \
    "http://localhost/delivery/public/api/user/auth/update-profile" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"name":"impedit","phone":18,"email":"quidem"}'

```

```javascript
const url = new URL(
    "http://localhost/delivery/public/api/user/auth/update-profile"
);

let headers = {
    "Content-Type": "application/json",
    "X-Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "name": "impedit",
    "phone": 18,
    "email": "quidem"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "status": true,
    "data": {
        "name": "Name Example",
        "email": "example@gmail.com",
        "phone": null,
        "image": null,
        "created_at": "2020-04-14 15:00"
    },
    "message": "Profile Updated successfully",
    "code": 201
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "The Full Name field is required.",
    "code": 200
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "The email has already been taken.",
    "code": 200
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "Invalid Request",
    "code": 200
}
```

### HTTP Request
`POST api/user/auth/update-profile`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | max 100 in length.
        `phone` | integer |  required  | unique & min 10-15 in length.
        `email` | string |  optional  | optional unique & valid email address.
    
<!-- END_a0aadb54c04b4c206c4156f5b60e7552 -->

<!-- START_977ea3cc4d551887b4079a4ad0ff71e2 -->
## Update Profile Picture APIs
Update Profile Picture

> Example request:

```bash
curl -X POST \
    "http://localhost/delivery/public/api/user/auth/update-profile-picture" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"image":"sed"}'

```

```javascript
const url = new URL(
    "http://localhost/delivery/public/api/user/auth/update-profile-picture"
);

let headers = {
    "Content-Type": "application/json",
    "X-Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "image": "sed"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "status": true,
    "data": {
        "name": "Name Example",
        "email": "example@gmail.com",
        "phone": null,
        "image": null,
        "created_at": "2020-04-14 15:00"
    },
    "message": "Profile Updated successfully",
    "code": 201
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "The Image failed to upload.",
    "code": 200
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "Invalid Request",
    "code": 200
}
```

### HTTP Request
`POST api/user/auth/update-profile-picture`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `image` | file |  optional  | accepts: jpeg,png,gif, filesize upto 2MB.
    
<!-- END_977ea3cc4d551887b4079a4ad0ff71e2 -->


