@php
    $user = auth()->user();
    $roles = $user->roles->pluck('name')->join(', ') ?: 'Tidak ada role';
@endphp

<div class="px-4 py-3">
    <p class="text-xs text-gray-500 dark:text-gray-400">
        Role: {{ $roles }}
    </p>
</div> 