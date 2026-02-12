@auth
<div class="fi-topbar-item hidden lg:flex items-center ml-6 lg:ml-8 xl:ml-14 flex-shrink-0">
    <div class="flex flex-col leading-tight min-w-[140px]">
        @php
            $hour = now()->hour;
            $greeting = $hour < 12 ? 'Good morning ☀️' : ($hour < 17 ? 'Good afternoon 🌤️' : 'Good evening 🌙');
            $firstName = explode(' ', auth()->user()->name)[0];

        @endphp

        <span class="text-sm font-semibold truncate">
            {{ $greeting }}, {{ $firstName }}
        </span>
        <span class="text-xs text-gray-500 dark:text-gray-400">
            {{ now()->format('D, M j, Y') }}
        </span>
    </div>
</div>
@endauth
