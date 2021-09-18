<div>
    @if ($status === 'editing')
        <form wire:submit.prevent="submit">
            <h2>Upload files</h2>

            <p>
                Select files below. Once you've selected a file, you will have 
                the opportunity to select another, or delete a file you've 
                previously selected.
            </p>

            @for ($i = 0; $i < count($uploads); $i++)
                <div class="file-row">
                    <p>{{ $uploads[$i]->getClientOriginalName() }}</p>

                    <input 
                        type="button" 
                        value="Delete" 
                        wire:click="deleteUpload({{ $i }})"
                        wire:key="delete-upload:{{ $i }}"
                    >
                </div>
            @endfor

            <div>
                <input 
                    type="file" 
                    class="file-chooser" 
                    wire:model="uploads.{{ count($uploads) }}"
                    wire:key="upload:{{ count($uploads) }}"
                >
            </div>

            <input type="submit" value="Submit">
        </form>
    @elseif($status === 'submitted')
        <p>Thank you for submitting.</p>
    @endif
</div>
