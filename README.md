Yii 2 RESTful with RBAC _*pretty url_
===================================================

Konfigurasi
-------------

### API Structure

Berikut adalah structure API yang digunakan,

```php
|= api
|== config
|== modules
|=== v1
|==== controllers
```

### Database

Ubah konfigurasi database pada direktori `config/db.php`, contoh
```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '12345',
    'charset' => 'utf8',
];
```
**NOTE**: jangan lupa `$ composer update `

Install
-------------

Lakukan migrate untuk memunculkan tabel RBAC,

```console
    $ yii migrate
```

Setelah itu, buka browser dan ketikan
```php
    http://localhost/<dir>/web/
```
Untuk memastikkan aplikasi telah berjalan.

Penggunaan
-------------
Berikut adalah daftar akses yang dapat digunakan*
```php
GET /users: list all users page by page;
HEAD /users: show the overview information of user listing;
POST /users: create a new user;
GET /users/123: return the details of the user 123;
HEAD /users/123: show the overview information of user 123;
PATCH /users/123 and PUT /users/123: update the user 123;
DELETE /users/123: delete the user 123;
OPTIONS /users: show the supported verbs regarding endpoint /users;
OPTIONS /users/123: show the supported verbs regarding endpoint /users/123.
```

Masukkan header pada client yang digunakan (misal, postman)
```
    Authorization : Bearer <auth key>
```
**auth_key**: berasal tabel user

Referensi
-------------
API :
http://tacktile.net/blog/2015/12/22/create-restful-api-using-yii2-basic-template-with-authentication-part-i/
http://www.yiiframework.com/doc-2.0/guide-rest-authentication.html

RBAC :
http://www.yiiframework.com/doc-2.0/guide-security-authorization.html#role-based-access-control-rbac
