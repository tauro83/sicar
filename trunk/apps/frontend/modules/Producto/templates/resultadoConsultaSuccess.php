<h1 class="titulo_principal"> <?php echo $titulo ?></h1>
<?php if (!empty($productos)): ?>
    <?php if (count($productos)): ?>
       <div style="margin-top:2%; width:100%;">
            <table  id="resultado_consulta_marca"></table>
            <div id="pager_marca"></div>
        </div>
        <script type="text/javascript">
            /*************************************************
            *Nombre: function()
            *Parametros:

            *Descripción: Genera grid jqGrid, carga los datos en forma de XML y luego los presenta
                          de acuerdo a la estructura declarada en el código (Número columnas, filas).
            * Autor: Jhonny PIncay Nieves
         **************************************************/
            $(function(){
                $("#resultado_consulta_marca").jqGrid({
                    datatype: 'xmlstring',
                    datastr : "<?php echo preg_replace("[\n|\r|\n\r]", ' ', Producto::xmlStringDataProductos($productos)) ?>",
                    colNames:['Código','Nombre','Prec. Unitario','Prec. N.Venta','Prec. Factura'],
                    colModel :[
                        {name:'codigo', index:'codigo', width:23, align:'center'},
                        {name:'nombre', index:'nombre', width:145, align:'left'},
                        {name:'unitario', index:'unitario', width:40, align:'center', sortable:false},
                        {name:'nventa', index:'nventa', width:40, align:'center', sortable:false},
                        {name:'factura', index:'factura', width:40, align:'center',sortable:false},

                    ],
                    pager: jQuery('#pager_marca'),
                    rowNum:50,
                    rownumbers: true,
                    height:'100%',
                    autowidth:true,
                    rowList:[10,20,30],
                    sortname: 'codigo',
                    sortorder: 'desc',
                    viewrecords: true
//                     caption: 'Productos Por Marca'

                });
               jQuery("resultado_consulta_marca").jqGrid('navGrid','pager_marca',{del:false,add:false,edit:false,search:false});
            });


        </script>

    <?php else: ?>
          <div class="ui-widget">
                 <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
                     <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .7em;"></span>
                          <strong> No existen resultados para presentar. </strong>
                     </p>
                 </div>
             </div>
    <?php endif; ?>
<?php endif; ?>
