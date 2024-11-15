<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div class="flex items-center space-x-2 rtl:space-x-reverse">
        @php
            $record = $this->getRecord();
            $icon = $record ? $record->icon : null;
        @endphp
        
        @if($icon)
            <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100">
                <i class="{{ $icon }}" style="font-size: 20px;"></i>
            </div>
            <span class="text-gray-500">{{ $icon }}</span>
        @else
            <span class="text-gray-400">No icon selected</span>
        @endif
    </div>
</x-dynamic-component> 