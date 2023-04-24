<div>
    <form wire:submit.prevent="submit">
        <input type="text" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror

        <button class="btn btn-info" type="submit">Save</button>
    </form>
</div>
