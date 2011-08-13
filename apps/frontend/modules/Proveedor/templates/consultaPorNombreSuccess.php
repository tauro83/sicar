<h1 class="titulo_principal"><?php echo $titulo ?></h1>
<?php if (!empty($proveedores)): ?>
    <?php if (count($proveedores)): ?>
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
                    datastr : "<?php echo preg_replace("[\n|\r|\n\r]", ' ', Proveedor::xmlStringDataProveedores($proveedores,$consulta,$delete)) ?>",
                    colNames:['Nombre','Dirección','Teléfono','Responsable'],
                    colModel :[
                        {name:'nombre', index:'nombre', width:45, align:'center'},
                        {name:'direccion', index:'direccion', width:45, align:'center', sortable:false},
                        {name:'telefono', index:'telefono', width:20, align:'center', sortable:false},
                        {name:'responsable', index:'responsable', width:30, align:'center', sortable:false},

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
