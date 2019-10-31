{include file="header.tpl"}

    <p><a href="{URL_GENEROS_ADMIN}">Modificar Generos</a></p>
    <div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-image">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$generos item=genero}
                    <tr>
                        <td>{$genero->id_genero}</td>
                        <td>{$genero->nombre}</td>
                    </tr>
                {/foreach}
            </tbody>
            </table>   
        </div>
    </div>
    </div>
</body>
</html>