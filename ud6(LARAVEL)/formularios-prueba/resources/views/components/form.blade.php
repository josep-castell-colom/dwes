<form class="flex flex-col p-6 w-3/4">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" placeholder="Título del post" class="text-gray-900">
    <label for="extracto" class="mt-6">Extracto:</label>
    <input type="text" name="extracto" id="extracto" placeholder="Extracto del post" class="text-gray-900">
    <label for="contenido" class="mt-6">Contenido:</label>
    <textarea name="contenido" id="contenido" placeholder="Bla, bla, bla..." class="text-gray-900"></textarea>
    <fieldset class="mt-6 flex items-center justify-around">
        <label for="caducable">Caducable:</label>
        <input type="checkbox" name="caducable" id="caducable">
        <label for="comentable">Comentable:</label>
        <input type="checkbox" name="comentable" id="comentable">
        <label for="acceso">Acceso:</label>
        <select name="acceso" id="acceso" class="text-gray-900">
            <option value="privado">Privado</option>
            <option value="publico">Público</option>
        </select>
    </fieldset>
    <button type="submit" class="w-36 self-center bg-sky-500/50 hover:bg-sky-500/75 border-gray-900 p-6 mt-8 rounded">Enviar</button>
</form>