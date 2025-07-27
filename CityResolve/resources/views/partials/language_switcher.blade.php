{{-- resources/views/partials/language_switcher.blade.php --}}
<form action="{{ route('language.switch') }}" method="POST" class="d-flex align-items-center h-100">
    @csrf
    {{-- You can keep or remove the icon based on your design preference --}}
    {{-- <i class="bi bi-translate fs-5 me-2 text-white"></i> --}}

    <label for="locale-select" class="visually-hidden">{{ __('Select Language') }}</label>
    <select name="locale" id="locale-select" onchange="this.form.submit()"
            class="form-select form-select-sm"
            style="width: auto; background-color: var(--primary-green-dark); color: white; border: 1px solid var(--primary-green-dark);">
        @foreach (config('app.supported_locales') as $code => $name)
            <option value="{{ $code }}" {{ app()->getLocale() == $code ? 'selected' : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
</form>