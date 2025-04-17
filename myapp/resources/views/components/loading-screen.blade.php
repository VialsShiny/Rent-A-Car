@props(['id_name' => 'loading-screen'])

<div class="fixed z-10 inset-0 h-screen w-full bg-gray-500 bg-opacity-50 flex justify-center items-center hidden"
    id="{{ $id_name }}">
    <div role="status" class="w-96 flex justify-center gap-6">
        <div class="w-16 h-16 rounded-full bg-black transition animate-bounce [animation-delay:100ms]"></div>
        <div class="w-16 h-16 rounded-full bg-black transition animate-bounce [animation-delay:200ms]"></div>
        <div class="w-16 h-16 rounded-full bg-black transition animate-bounce [animation-delay:300ms]"></div>
    </div>
</div>
