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

#Address


<!-- START_e42092a5b160722e3d5ce8b7d8f257eb -->
## Get All Provinces

> Example request:

```bash
curl -X GET \
    -G "http://localhost/delivery/public/api/address/get-provinces" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://localhost/delivery/public/api/address/get-provinces"
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
    "data": [
        {
            "id": 1,
            "name": "Province 1"
        },
        {
            "id": 2,
            "name": "Province 2"
        },
        {
            "id": 3,
            "name": "Province 3"
        },
        {
            "id": 4,
            "name": "Gandaki"
        },
        {
            "id": 5,
            "name": "Province 5"
        },
        {
            "id": 6,
            "name": "Karnali"
        },
        {
            "id": 7,
            "name": "Sudurpaschim"
        }
    ],
    "message": "data fetched successfully",
    "code": 200
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "No records found",
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
`GET api/address/get-provinces`


<!-- END_e42092a5b160722e3d5ce8b7d8f257eb -->

<!-- START_f5e9a91929db7d97a2d53d5b30513816 -->
## Get Districts by Province

> Example request:

```bash
curl -X GET \
    -G "http://localhost/delivery/public/api/address/get-districts/1?ID=neque" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://localhost/delivery/public/api/address/get-districts/1"
);

let params = {
    "ID": "neque",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

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
    "data": [
        {
            "id": 1,
            "name": "Bhojpur"
        },
        {
            "id": 2,
            "name": "Dhankuta"
        }
    ],
    "message": "data fetched successfully",
    "code": 200
}
```
> Example response (200):

```json
{
    "status": false,
    "message": "No records found",
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
`GET api/address/get-districts/{province}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `ID` |  required  | province ID.

<!-- END_f5e9a91929db7d97a2d53d5b30513816 -->

#Customer


<!-- START_6d3b73c9be3c193458b240664e54cf4b -->
## Login APIs
User Login

> Example request:

```bash
curl -X POST \
    "http://localhost/delivery/public/api/customer/auth/login" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"phone":"quaerat","password":"voluptate"}'

```

```javascript
const url = new URL(
    "http://localhost/delivery/public/api/customer/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "X-Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "phone": "quaerat",
    "password": "voluptate"
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
null
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
`POST api/customer/auth/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `phone` | string |  required  | valid phone number & 10 digit in length.
        `password` | string |  required  | min 6 in length.
    
<!-- END_6d3b73c9be3c193458b240664e54cf4b -->

<!-- START_e881e14e03f0ef3158cbfe0dea9fd07c -->
## Register APIs
User Registration

> Example request:

```bash
curl -X POST \
    "http://localhost/delivery/public/api/customer/auth/register" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"name":"veritatis","phone":3,"password":"qui","email":"id","image":"non","companyName":"omnis","companyDistrict":20,"companyStreetName":"esse","companyPhone":"voluptates","companyOwnerName":"rerum","companyLat":"nihil","companyLon":"ex"}'

```

```javascript
const url = new URL(
    "http://localhost/delivery/public/api/customer/auth/register"
);

let headers = {
    "Content-Type": "application/json",
    "X-Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "name": "veritatis",
    "phone": 3,
    "password": "qui",
    "email": "id",
    "image": "non",
    "companyName": "omnis",
    "companyDistrict": 20,
    "companyStreetName": "esse",
    "companyPhone": "voluptates",
    "companyOwnerName": "rerum",
    "companyLat": "nihil",
    "companyLon": "ex"
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
null
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
    "message": "Login error",
    "code": 200
}
```

### HTTP Request
`POST api/customer/auth/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | full name 4-100 in length.
        `phone` | integer |  required  | 10 digit & unique.
        `password` | string |  required  | 6-100 in length.
        `email` | string |  optional  | unique & valid email address.
        `image` | file |  optional  | accepts: jpeg,png,gif, filesize upto 2MB.
        `companyName` | string |  optional  | company name.
        `companyDistrict` | integer |  optional  | district ID required if companyName is given.
        `companyStreetName` | string |  optional  | street name required if companyName is given.
        `companyPhone` | string |  optional  | company phone 7-10 in length.
        `companyOwnerName` | string |  optional  | owner name.
        `companyLat` | string |  optional  | latitude.
        `companyLon` | string |  optional  | longitude.
    
<!-- END_e881e14e03f0ef3158cbfe0dea9fd07c -->

<!-- START_6e4a4dd74aeaf49b4db1c597e87fbc24 -->
## Get Info APIs
Authenticated User Info
Header: X-Authorization: Bearer {token}

> Example request:

```bash
curl -X GET \
    -G "http://localhost/delivery/public/api/customer/auth/get-info" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://localhost/delivery/public/api/customer/auth/get-info"
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
        "email": null,
        "phone": "98xxxxxxxx",
        "image": null,
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
`GET api/customer/auth/get-info`


<!-- END_6e4a4dd74aeaf49b4db1c597e87fbc24 -->

<!-- START_f897a17a903bd1988b312f26760249da -->
## Update Profile APIs
Update Profile

> Example request:

```bash
curl -X POST \
    "http://localhost/delivery/public/api/customer/auth/update-profile" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"name":"veritatis","phone":2,"email":"unde"}'

```

```javascript
const url = new URL(
    "http://localhost/delivery/public/api/customer/auth/update-profile"
);

let headers = {
    "Content-Type": "application/json",
    "X-Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "name": "veritatis",
    "phone": 2,
    "email": "unde"
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
        "email": null,
        "phone": "98xxxxxxxx",
        "image": null,
        "created_at": "2020-04-14 15:00"
    },
    "message": "Profile Updated successfully",
    "code": 200
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
`POST api/customer/auth/update-profile`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | full name 4-100 in length.
        `phone` | integer |  required  | 10 digit & unique.
        `email` | string |  optional  | unique & valid email address.
    
<!-- END_f897a17a903bd1988b312f26760249da -->

<!-- START_8136a0b3168f949c58f068dd7befbef3 -->
## Update Profile Picture APIs
Update Profile Picture

> Example request:

```bash
curl -X POST \
    "http://localhost/delivery/public/api/customer/auth/update-profile-picture" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"image":"expedita"}'

```

```javascript
const url = new URL(
    "http://localhost/delivery/public/api/customer/auth/update-profile-picture"
);

let headers = {
    "Content-Type": "application/json",
    "X-Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "image": "expedita"
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
        "email": null,
        "phone": "98xxxxxxxx",
        "image": null,
        "created_at": "2020-04-14 15:00"
    },
    "message": "Profile Updated successfully",
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
    "message": "Invalid Request",
    "code": 200
}
```

### HTTP Request
`POST api/customer/auth/update-profile-picture`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `image` | file |  optional  | accepts: jpeg,png,gif, filesize upto 2MB.
    
<!-- END_8136a0b3168f949c58f068dd7befbef3 -->

#User


<!-- START_bcb0a656ae0448c978e0894c78ccd85a -->
## Login APIs
User Login

> Example request:

```bash
curl -X POST \
    "http://localhost/delivery/public/api/user/auth/login" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"phone":"id","password":"explicabo"}'

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
    "phone": "id",
    "password": "explicabo"
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
    `phone` | string |  required  | valid phone number & 10 digit in length.
        `password` | string |  required  | min 6 in length.
    
<!-- END_bcb0a656ae0448c978e0894c78ccd85a -->

<!-- START_a94acbd257ac6cbc80053652463ec24c -->
## Register APIs
User Registration

> Example request:

```bash
curl -X POST \
    "http://localhost/delivery/public/api/user/auth/register" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"name":"sapiente","phone":4,"password":"aut","email":"unde","image":"ratione","vechileType":"quis","vechileNumber":"et","documentType":"qui","documentFront":"accusamus","documentBack":"voluptas","districtId":4,"phone2":"accusamus","phone3":"vel"}'

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
    "name": "sapiente",
    "phone": 4,
    "password": "aut",
    "email": "unde",
    "image": "ratione",
    "vechileType": "quis",
    "vechileNumber": "et",
    "documentType": "qui",
    "documentFront": "accusamus",
    "documentBack": "voluptas",
    "districtId": 4,
    "phone2": "accusamus",
    "phone3": "vel"
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
        "email": null,
        "phone": "98xxxxxxxx",
        "image": null,
        "created_at": "2020-04-14 15:00",
        "token": "JWT Token"
    },
    "message": "Registered successfully",
    "code": 200
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
    `name` | string |  required  | full name 4-100 in length.
        `phone` | integer |  required  | 10 digit & unique.
        `password` | string |  required  | 6-100 in length.
        `email` | string |  optional  | unique & valid email address.
        `image` | file |  optional  | accepts: jpeg,png,gif, filesize upto 2MB.
        `vechileType` | string |  required  | walker/bike/van/mini truck.
        `vechileNumber` | string |  required  | full vechile number.
        `documentType` | string |  required  | citizenship/license.
        `documentFront` | file |  required  | accepts: jpeg,png,gif, filesize upto 2MB.
        `documentBack` | file |  required  | accepts: jpeg,png,gif, filesize upto 2MB.
        `districtId` | integer |  required  | district ID.
        `phone2` | string |  required  | Emergency Contact Number 1 7-10 in length.
        `phone3` | string |  optional  | Emergency Contact Number 2 7-10 in length.
    
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
        "email": null,
        "phone": "98xxxxxxxx",
        "image": null,
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
    -d '{"name":"aut","phone":13,"email":"aut"}'

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
    "name": "aut",
    "phone": 13,
    "email": "aut"
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
        "email": null,
        "phone": "98xxxxxxxx",
        "image": null,
        "created_at": "2020-04-14 15:00"
    },
    "message": "Profile Updated successfully",
    "code": 200
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
    `name` | string |  required  | full name 4-100 in length.
        `phone` | integer |  required  | 10 digit & unique.
        `email` | string |  optional  | unique & valid email address.
    
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
    -d '{"image":"molestiae"}'

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
    "image": "molestiae"
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
        "email": null,
        "phone": "98xxxxxxxx",
        "image": null,
        "created_at": "2020-04-14 15:00"
    },
    "message": "Profile Updated successfully",
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


