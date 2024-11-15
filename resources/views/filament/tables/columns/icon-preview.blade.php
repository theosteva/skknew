<div class="flex items-center space-x-2 rtl:space-x-reverse">
    @if($getState())
        <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100">
            <i class="{{ $getState() }}" style="font-size: 16px;"></i>
        </div>
    @else
        <span class="text-gray-400">-</span>
    @endif
</div> 