<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Livewire Uploads Testing Error</title>

    <style>
        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        .page-wrapper {
            max-width: 500px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .file-row {
            display: flex;
            justify-content: space-between;
            padding: 20px 0;
        }

        .file-chooser {
            padding: 20px 0;
        }

    </style>
    @livewireStyles()
</head>

<body>
    <div class="page-wrapper">
        <livewire:uploads-form />
    </div>
    @livewireScripts()
</body>
