<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mail</title>
</head>

<body style="font-family: Arial, sans-serif;  background-color: #f3f4f6; margin: 0; padding: 0;">
    <div
        style="min-height: 500px; padding: 24px; justify-content: center; align-items: center;">

        <main style="width: 100%; padding-bottom: 48px;">
            {{ $slot }}
        </main>

        <div
            style="width: 100%; text-align: center; padding: 16px; border-top: 1px solid #e5e7eb;">
            <p style="font-size: 0.875rem; color: #6b7280;">&copy; {{ date('Y') }} Rent a Car. Tous droits réservés.
            </p>
        </div>
    </div>
</body>

</html>
