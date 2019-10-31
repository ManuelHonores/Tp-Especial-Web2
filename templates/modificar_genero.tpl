{include file="header.tpl"}

<center>
    <form action="{BASE_URL}modificarGenero" method="POST"> <br><br>
        <input type="text" REQUIRED name="nombre" placeholder="Nombre:{$genero->nombre}">
        <input type="text" name="id" readonly="readonly" value="{$genero->id_genero}"> <br><br>
        <input type="submit" value="Aceptar">
    </form>
</center>
{include file="footer.tpl"}