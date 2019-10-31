{include file="header.tpl"}

    <a href="{BASE_URL}insertarGenero">Nuevo Genero</a>
    <div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-image">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$generos item=genero}
                    <tr>
                        <td>{$genero->id_genero}</td>
                        <td>{$genero->nombre}</td>
                        <td><a href="modificarForm/{$genero->id_genero}">Modificar</td>
                        <td><a href="borrarGenero/{$genero->id_genero}">Eliminar</td>
                    </tr>
                {/foreach}
            </tbody>
            </table>   
        </div>
    </div>
    </div>
</body>
</html>