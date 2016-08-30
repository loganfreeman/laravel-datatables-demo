# Laravel 5.3 with Datatables demo

### instructions

```shell
laravel new datatables
cd /path/to/datatables
php artisan migrate
```

##### Seed some users data using `tinker`

```shell
php artisan tinker
```

```
>>> factory(App\User::class, 100)->create();
```

##### install Laravel Datatables package

```shell
composer require yajra/laravel-datatables-oracle
```

*Add Datatables Service Provider and Facade on config/app.php.*

providers:
```
Yajra\Datatables\DatatablesServiceProvider::class,
```
aliases:
```
'Datatables' => Yajra\Datatables\Facades\Datatables::class,
```

*Finally, publish the configuratiion files:*
```shell
php artisan vendor:publish
```
