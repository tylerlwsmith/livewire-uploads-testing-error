# Livewire Uploads Testing Error: minimum reproduction

When using `Livewire::test()`, modifying an array that contains a fake upload will throw an `InvalidArgumentException` with the message `Type is not supported`.

I think this is related to issues [#1222](https://github.com/livewire/livewire/issues/1222) and [#2353](https://github.com/livewire/livewire/issues/2353). 
Josué Artaud suggested that this issue may be caused by the `Illuminate\Http\UploadedFile` class not being serializable to JSON.

To reproduce the issue, clone the repo, run `composer install`, then run `php artisan test`.

I am using Livewire version `2.6`.

Relevant files:

* `app/Http/Livewire/UploadsForm.php`
* `resources/views/livewire/uploads-form.blade.php`
* `tests/Feature/UploadsTest.php`
