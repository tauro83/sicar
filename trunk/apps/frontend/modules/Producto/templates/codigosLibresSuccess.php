<h1 class="titulo_principal">Códigos Libres</h1>

<div id="codlibres" >

<ul id="codigoslibres"><?php
        $i = 100;
        $j = 0;
        while ($j<20 && $i <= 999999)
        {
            $producto = Producto::consultarProductoPorCodigo($i);
            if ($producto==null){
                echo ("<li>$i</li>");
                ++$j;
                ++$i;
            }
            else{
                ++$i;
            }
        }        
?></ul>
    
</div>
