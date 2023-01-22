@if ($errors->any())
    @foreach ($errors->all() as $message)
        <p class="bg-red-100/80 text-red-600 w-fit p-px m-2 rounded">{{ $message }}</p>
    @endforeach
@endif
<label for="titulo" class="after:content-['*'] after:ml-0.5 after:text-red-500">{{ __('Title') }}:</label>
<input type="text" name="titulo" id="titulo" placeholder="{{ __('Post\'s title') }}" class="text-gray-900"
    value="{{ old('titulo', $post->titulo ?? '') }}" required>
@error('titulo')
    <span class="bg-red-100/80 text-red-600 w-fit p-px m-2 rounded">{{ $errors->first('titulo') }}</span>
@enderror
<label for="extracto" class="mt-6 after:content-['*'] after:ml-0.5 after:text-red-500">{{ __('Extract') }}:</label>
<input type="text" name="extracto" id="extracto" placeholder="{{ __('Post\'s extract') }}" class="text-gray-900"
    value="{{ old('extracto', $post->extracto ?? '') }}" required>
@error('extracto')
    <span class="bg-red-100/80 text-red-600 w-fit p-px m-2 rounded">{{ $errors->first('extracto') }}</span>
@enderror
<label for="contenido" class="mt-6 after:content-['*'] after:ml-0.5 after:text-red-500">{{ __('Content') }}:</label>
<textarea name="contenido" id="contenido" placeholder="{{ __('Blah, blah, blah...') }}" class="text-gray-900" required>{{ old('contenido', $post->contenido ?? '') }}</textarea>
@error('contenido')
    <span class="bg-red-100/80 text-red-600 w-fit p-px m-2 rounded">{{ $errors->first('contenido') }}</span>
@enderror
<fieldset class="mt-6 mx-24 flex items-center justify-around">
    <div>
        <label for="caducable">{{ __('Expirable') }}:</label>
        <input type="checkbox" name="caducable" id="caducable" @if (old('caducable') === 'on' || (isset($post) && $post->caducable === true)) checked @endif>
    </div>
    <div>
        <label for="comentable">{{ __('Commentable') }}:</label>
        <input type="checkbox" name="comentable" id="comentable" @if (old('comentable') === 'on' || (isset($post) && $post->comentable === true)) checked @endif>
    </div>
    <div>
        <label for="acceso">{{ __('Access') }}:</label>
        <select name="acceso" id="acceso" class="text-gray-900">
            <option value="publico" @if (old('acceso') === 'publico' || (isset($post) && $post->acceso == 'publico')) selected @endif>{{ __('Public') }}</option>
            <option value="privado" @if (old('acceso') === 'privado' || (isset($post) && $post->acceso == 'privado')) selected @endif>{{ __('Private') }}</option>
        </select>
    </div>
</fieldset>
<button type="submit"
    class="w-36 self-center bg-sky-500/50 hover:bg-sky-500/75 border-gray-900 py-4 mt-8 rounded">{{ __('Send') }}</button>
<small>{{ __('Fields with') }} <span class="text-red-500">*</span> {{ __('are required') }}.</small>
