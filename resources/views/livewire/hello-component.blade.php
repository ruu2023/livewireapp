<div>
    {{-- In work, do what you enjoy. --}}
    This is Livewire comopnent!!
    {{ $message }}
    @livewire('notification', [
        'title' => $alert_title,
        'content' => $alert_content,
    ])
    <input type="text" wire:model="input" />
    <button wire:click="doAction">click</button>
    {{-- <ul>
        <li>name: "{{ $name }}", pass: "{{ $pass }}"</li>
        <li>[update: {{ $check }}]</li>
    </ul>
    <form wire:submit="updateMessage">
        <div><input type="text" wire:model="name"></div>
        <div><input type="password" wire:model="pass"></div>
        <div><button type="submit">Click</button></div>
    </form> --}}
</div>
