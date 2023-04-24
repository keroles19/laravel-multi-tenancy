@props([
    'type' => 'text',
    'label' => '',
    'required' => false,
    'placeholder' => '',
    'autocomplete' => false,
])

@php( $identifier = $attributes->whereStartsWith('wire:model')->first())

<div class="{{ $attributes->get('class') }}">
    <label for="{{ $identifier }}"
           class="block text-sm font-medium leading-5 text-gray-700">{{ $label }}
    </label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <input
            {{ $attributes->whereStartsWith('wire:model') }}
            id="{{ $identifier }}"
            type="{{ $type }}"

            @if ($required)
                required
            @endif

            @error($identifier)
            class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
            aria-invalid="true"
            aria-describedby="{{ $identifier }}-error"
            @else
                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
            placeholder="{{ $placeholder }}"
            @endif

            @if ($autocomplete === false)
                autocomplete="new-{{ $identifier }}"
            data-lpignore="true"
            @endif
        />
        @error($identifier)
        <div wire:key="error_svg_{{ $identifier }}"
             class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                      clip-rule="evenodd"/>
            </svg>
        </div>
        @enderror
    </div>
    @error($identifier)
    <p wire:key="error_{{ $identifier }}" class="mt-2 text-sm text-red-600" id="{{ $identifier }}-error">{{ $message }}
    </p>
    @enderror
</div>

