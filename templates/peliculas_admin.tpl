{include file="header.tpl"}

    <a href="{BASE_URL}insertar">Nueva Pelicula</a>
    <div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-image">
            <thead>
                <tr>
                <th scope="col">Pelicula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Genero</th>
                <th scope="col">Info</th>
                <th scope="col">Modificar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$peliculas item=pelicula}
                    {foreach from=$generos item=genero}
                        {if ($pelicula->id_genero) == ($genero->id_genero)}
                            <tr>
                                <td width="400px"><img height="100px" width="200px" src="data:image/jpg;base64,{php} echo base64_encode($_smarty_tpl->tpl_vars['pelicula']->value->image);{/php}"/></td>
                                <td>{$pelicula->nombre}</td>
                                <td>{$genero->nombre}</td>
                                <td><a href="vermas/{$pelicula->id_pelicula}">Ver Mas</td>
                                <td><a href="modificar/{$pelicula->id_pelicula}">Modificar</td>
                                <td><a href="borrar/{$pelicula->id_pelicula}">Eliminar</td>
                            </tr>
                        {/if}
                    {/foreach}
                {/foreach}
            </tbody>
            </table>   
        </div>
    </div>
    </div>
</body>
</html>