<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="{{ asset('/docs/css/style.css') }}" />
    <script src="{{ asset('/docs/js/all.js') }}"></script>


          <script>
        $(function() {
            setupLanguages(["bash","javascript"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="/docs/images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Welcome to the generated API reference.</p>
<!-- END_INFO -->
<h1>Address</h1>
<!-- START_e42092a5b160722e3d5ce8b7d8f257eb -->
<h2>Get All Provinces</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/delivery/public/api/address/get-provinces" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "No records found",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "Invalid Request",
    "code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/address/get-provinces</code></p>
<!-- END_e42092a5b160722e3d5ce8b7d8f257eb -->
<!-- START_f5e9a91929db7d97a2d53d5b30513816 -->
<h2>Get Districts by Province</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/delivery/public/api/address/get-districts/1?ID=neque" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/delivery/public/api/address/get-districts/1"
);

let params = {
    "ID": "neque",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "X-Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "No records found",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "Invalid Request",
    "code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/address/get-districts/{province}</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>ID</code></td>
<td>required</td>
<td>province ID.</td>
</tr>
</tbody>
</table>
<!-- END_f5e9a91929db7d97a2d53d5b30513816 -->
<h1>Customer</h1>
<!-- START_6d3b73c9be3c193458b240664e54cf4b -->
<h2>Login APIs</h2>
<p>User Login</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/delivery/public/api/customer/auth/login" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"phone":"quaerat","password":"voluptate"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "The phone field is required.",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "Phone\/Password Mismatched",
    "code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/customer/auth/login</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>phone</code></td>
<td>string</td>
<td>required</td>
<td>valid phone number &amp; 10 digit in length.</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>min 6 in length.</td>
</tr>
</tbody>
</table>
<!-- END_6d3b73c9be3c193458b240664e54cf4b -->
<!-- START_e881e14e03f0ef3158cbfe0dea9fd07c -->
<h2>Register APIs</h2>
<p>User Registration</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/delivery/public/api/customer/auth/register" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"name":"veritatis","phone":3,"password":"qui","email":"id","image":"non","companyName":"omnis","companyDistrict":20,"companyStreetName":"esse","companyPhone":"voluptates","companyOwnerName":"rerum","companyLat":"nihil","companyLon":"ex"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "The Full Name field is required.",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "The email has already been taken.",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "The password must be at least 6 characters.",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "Login error",
    "code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/customer/auth/register</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>required</td>
<td>full name 4-100 in length.</td>
</tr>
<tr>
<td><code>phone</code></td>
<td>integer</td>
<td>required</td>
<td>10 digit &amp; unique.</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>6-100 in length.</td>
</tr>
<tr>
<td><code>email</code></td>
<td>string</td>
<td>optional</td>
<td>unique &amp; valid email address.</td>
</tr>
<tr>
<td><code>image</code></td>
<td>file</td>
<td>optional</td>
<td>accepts: jpeg,png,gif, filesize upto 2MB.</td>
</tr>
<tr>
<td><code>companyName</code></td>
<td>string</td>
<td>optional</td>
<td>company name.</td>
</tr>
<tr>
<td><code>companyDistrict</code></td>
<td>integer</td>
<td>optional</td>
<td>district ID required if companyName is given.</td>
</tr>
<tr>
<td><code>companyStreetName</code></td>
<td>string</td>
<td>optional</td>
<td>street name required if companyName is given.</td>
</tr>
<tr>
<td><code>companyPhone</code></td>
<td>string</td>
<td>optional</td>
<td>company phone 7-10 in length.</td>
</tr>
<tr>
<td><code>companyOwnerName</code></td>
<td>string</td>
<td>optional</td>
<td>owner name.</td>
</tr>
<tr>
<td><code>companyLat</code></td>
<td>string</td>
<td>optional</td>
<td>latitude.</td>
</tr>
<tr>
<td><code>companyLon</code></td>
<td>string</td>
<td>optional</td>
<td>longitude.</td>
</tr>
</tbody>
</table>
<!-- END_e881e14e03f0ef3158cbfe0dea9fd07c -->
<!-- START_6e4a4dd74aeaf49b4db1c597e87fbc24 -->
<h2>Get Info APIs</h2>
<p>Authenticated User Info
Header: X-Authorization: Bearer {token}</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/delivery/public/api/customer/auth/get-info" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "User not found",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "Invalid Request",
    "code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/customer/auth/get-info</code></p>
<!-- END_6e4a4dd74aeaf49b4db1c597e87fbc24 -->
<!-- START_f897a17a903bd1988b312f26760249da -->
<h2>Update Profile APIs</h2>
<p>Update Profile</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/delivery/public/api/customer/auth/update-profile" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"name":"veritatis","phone":2,"email":"unde"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "The Full Name field is required.",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "The email has already been taken.",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "Invalid Request",
    "code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/customer/auth/update-profile</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>required</td>
<td>full name 4-100 in length.</td>
</tr>
<tr>
<td><code>phone</code></td>
<td>integer</td>
<td>required</td>
<td>10 digit &amp; unique.</td>
</tr>
<tr>
<td><code>email</code></td>
<td>string</td>
<td>optional</td>
<td>unique &amp; valid email address.</td>
</tr>
</tbody>
</table>
<!-- END_f897a17a903bd1988b312f26760249da -->
<!-- START_8136a0b3168f949c58f068dd7befbef3 -->
<h2>Update Profile Picture APIs</h2>
<p>Update Profile Picture</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/delivery/public/api/customer/auth/update-profile-picture" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"image":"expedita"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "The Image failed to upload.",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "Invalid Request",
    "code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/customer/auth/update-profile-picture</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>image</code></td>
<td>file</td>
<td>optional</td>
<td>accepts: jpeg,png,gif, filesize upto 2MB.</td>
</tr>
</tbody>
</table>
<!-- END_8136a0b3168f949c58f068dd7befbef3 -->
<h1>User</h1>
<!-- START_bcb0a656ae0448c978e0894c78ccd85a -->
<h2>Login APIs</h2>
<p>User Login</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/delivery/public/api/user/auth/login" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"phone":"id","password":"explicabo"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "The phone field is required.",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "Phone\/Password Mismatched",
    "code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/user/auth/login</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>phone</code></td>
<td>string</td>
<td>required</td>
<td>valid phone number &amp; 10 digit in length.</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>min 6 in length.</td>
</tr>
</tbody>
</table>
<!-- END_bcb0a656ae0448c978e0894c78ccd85a -->
<!-- START_a94acbd257ac6cbc80053652463ec24c -->
<h2>Register APIs</h2>
<p>User Registration</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/delivery/public/api/user/auth/register" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"name":"sapiente","phone":4,"password":"aut","email":"unde","image":"ratione","vechileType":"quis","vechileNumber":"et","documentType":"qui","documentFront":"accusamus","documentBack":"voluptas","districtId":4,"phone2":"accusamus","phone3":"vel"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "The Full Name field is required.",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "The email has already been taken.",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "The password must be at least 6 characters.",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "The Image failed to upload.",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "Login error",
    "code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/user/auth/register</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>required</td>
<td>full name 4-100 in length.</td>
</tr>
<tr>
<td><code>phone</code></td>
<td>integer</td>
<td>required</td>
<td>10 digit &amp; unique.</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>6-100 in length.</td>
</tr>
<tr>
<td><code>email</code></td>
<td>string</td>
<td>optional</td>
<td>unique &amp; valid email address.</td>
</tr>
<tr>
<td><code>image</code></td>
<td>file</td>
<td>optional</td>
<td>accepts: jpeg,png,gif, filesize upto 2MB.</td>
</tr>
<tr>
<td><code>vechileType</code></td>
<td>string</td>
<td>required</td>
<td>walker/bike/van/mini truck.</td>
</tr>
<tr>
<td><code>vechileNumber</code></td>
<td>string</td>
<td>required</td>
<td>full vechile number.</td>
</tr>
<tr>
<td><code>documentType</code></td>
<td>string</td>
<td>required</td>
<td>citizenship/license.</td>
</tr>
<tr>
<td><code>documentFront</code></td>
<td>file</td>
<td>required</td>
<td>accepts: jpeg,png,gif, filesize upto 2MB.</td>
</tr>
<tr>
<td><code>documentBack</code></td>
<td>file</td>
<td>required</td>
<td>accepts: jpeg,png,gif, filesize upto 2MB.</td>
</tr>
<tr>
<td><code>districtId</code></td>
<td>integer</td>
<td>required</td>
<td>district ID.</td>
</tr>
<tr>
<td><code>phone2</code></td>
<td>string</td>
<td>required</td>
<td>Emergency Contact Number 1 7-10 in length.</td>
</tr>
<tr>
<td><code>phone3</code></td>
<td>string</td>
<td>optional</td>
<td>Emergency Contact Number 2 7-10 in length.</td>
</tr>
</tbody>
</table>
<!-- END_a94acbd257ac6cbc80053652463ec24c -->
<!-- START_a03429a357f72418bbcdb69cc13a5f7f -->
<h2>Get Info APIs</h2>
<p>Authenticated User Info
Header: X-Authorization: Bearer {token}</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/delivery/public/api/user/auth/get-info" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "User not found",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "Invalid Request",
    "code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/user/auth/get-info</code></p>
<!-- END_a03429a357f72418bbcdb69cc13a5f7f -->
<!-- START_a0aadb54c04b4c206c4156f5b60e7552 -->
<h2>Update Profile APIs</h2>
<p>Update Profile</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/delivery/public/api/user/auth/update-profile" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"name":"aut","phone":13,"email":"aut"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "The Full Name field is required.",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "The email has already been taken.",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "Invalid Request",
    "code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/user/auth/update-profile</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>required</td>
<td>full name 4-100 in length.</td>
</tr>
<tr>
<td><code>phone</code></td>
<td>integer</td>
<td>required</td>
<td>10 digit &amp; unique.</td>
</tr>
<tr>
<td><code>email</code></td>
<td>string</td>
<td>optional</td>
<td>unique &amp; valid email address.</td>
</tr>
</tbody>
</table>
<!-- END_a0aadb54c04b4c206c4156f5b60e7552 -->
<!-- START_977ea3cc4d551887b4079a4ad0ff71e2 -->
<h2>Update Profile Picture APIs</h2>
<p>Update Profile Picture</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/delivery/public/api/user/auth/update-profile-picture" \
    -H "Content-Type: application/json" \
    -H "X-Authorization: Bearer {token}" \
    -d '{"image":"molestiae"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "The Image failed to upload.",
    "code": 200
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "Invalid Request",
    "code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/user/auth/update-profile-picture</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>image</code></td>
<td>file</td>
<td>optional</td>
<td>accepts: jpeg,png,gif, filesize upto 2MB.</td>
</tr>
</tbody>
</table>
<!-- END_977ea3cc4d551887b4079a4ad0ff71e2 -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                              </div>
                </div>
    </div>
  </body>
</html>