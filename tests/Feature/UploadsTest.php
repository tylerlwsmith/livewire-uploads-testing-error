<?php

namespace Tests\Feature;

use App\Http\Livewire\UploadsForm;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use Tests\TestCase;

class UploadsTest extends TestCase
{
    /** @test */
    public function it_can_delete_an_upload()
    {
        $image_1 = UploadedFile::fake()->image('avatar.jpg');
        $image_2 = UploadedFile::fake()->image('avatar2.jpg');

        Livewire::test(UploadsForm::class, ['uploads' => [$image_1, $image_2]])
            ->call('deleteUpload', 1)
            ->assertCount('uploads', 1);
    }
}
