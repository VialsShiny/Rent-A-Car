@props(['icon' => 'ri-error-warning-line', 'title' => 'Undefined', 'info' => 'Not Found'])

<div class="min-w-44 p-6 bg-gray-500/10 rounded-2xl flex flex-col gap-2 hover:bg-gray-500/20 transition-all ease-in-out duration-500">
    <i class="text-2xl {{ $icon }}"></i>
    <strong>{{ $title }}</strong>
    <em class="font-thin not-italic">{{ ucfirst($info) }}</em>
</div>