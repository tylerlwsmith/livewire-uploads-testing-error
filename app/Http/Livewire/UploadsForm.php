<?php

namespace App\Http\Livewire;

use Illuminate\Http\UploadedFile;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class UploadsForm extends Component
{
    use WithFileUploads;

    /**
     * @var "editing"|"submitted"
     */
    public $status = "editing";

    /**
     * @var UploadedFile|TemporaryUploadedFile
     */
    public $uploads = [];

    public function deleteUpload($index)
    {
        $this->uploads = collect($this->uploads)
            ->filter(function ($_value, $key) use ($index) {
                    return $index != $key;
            })
            ->values() // Rekey array to prevent errors.
            ->toArray();
    }

    public function submit()
    {
        $this->status = "submitted";
    }

    public function render()
    {
        return view('livewire.uploads-form');
    }
}
