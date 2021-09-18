# Livewire Uploads Testing Error: minimum reproduction

When using `Livewire::test()`, modifying an array that contains an upload will throw an `InvalidArgumentException` with the message `Type is not supported`. The code works on the front-end: it only throws this exception during testing.

Here is the test:
```php
    public function it_can_delete_an_upload()
    {
        $image_1 = UploadedFile::fake()->image('avatar.jpg');
        $image_2 = UploadedFile::fake()->image('avatar2.jpg');

        Livewire::test(UploadsForm::class, ['uploads' => [$image_1, $image_2]])
            ->call('deleteUpload', 1)
            ->assertCount('uploads', 1);
    }
```

And here is the code for the `deleteUpload` method it is calling:
```php
    public function deleteUpload($index)
    {
        $this->uploads = collect($this->uploads)
            ->filter(function ($_value, $key) use ($index) {
                    return $index != $key;
            })
            ->values() // Rekey array to prevent errors.
            ->toArray();
    }
```

I think this is related to issues [#1222](https://github.com/livewire/livewire/issues/1222) and [#2353](https://github.com/livewire/livewire/issues/2353). 
Josué Artaud suggested that this issue may be caused by the `Illuminate\Http\UploadedFile` class not being serializable to JSON.

To reproduce the issue, clone the repo, run `composer install`, then run `php artisan test`.

I am using Livewire version 2.6, PHP 8.0.10 and Laravel 8.

Relevant files:

* `app/Http/Livewire/UploadsForm.php`
* `resources/views/livewire/uploads-form.blade.php`
* `tests/Feature/UploadsTest.php`
