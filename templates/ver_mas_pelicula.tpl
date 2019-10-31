{include file="header.tpl"}

    <div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-image">
            <thead>
                <tr>
                <th scope="col">Pelicula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descipcion</th>
                <th scope="col">Genero</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="400px"><img height="100px" width="200px" src="data:image/jpg;base64,{php} echo base64_encode($_smarty_tpl->tpl_vars['pelicula']->value->image);{/php}"/></td>
                    <td>{$pelicula->nombre}</td>
                    <td>{$pelicula->descripcion}</td>
                    <td>{$genero->nombre}</td>
                </tr>
            
            </tbody>
            </table>   
        </div>
    </div>
    </div>
</body>
</html>