<h1 class="titulo_principal"> <?php echo $titulo ?></h1>
<?php if (!empty($dfs)): ?>
    <?php if (count($dfs)): ?>
       <div style="margin-top:2%; width:100%;">
            <table  id="resultado_consulta_fechas"></table>
            <div id="pager"></div>
        </div>

 <?php //echo DocumentoDeFacturacion::xmlStringDataDocumentos($dfs) ?>
        <script type="text/javascript">
            /*************************************************
            *Nombre: function()
            *Parametros:

            *Descripción: Genera grid jqGrid, carga los datos en forma de XML y luego los presenta
                          de acuerdo a la estructura declarada en el código (Número columnas, filas).
            * Autor: Jhonny PIncay Nieves
         **************************************************/
      $(function(){
                $("#resultado_consulta_fechas").jqGrid({
                    datatype: 'xmlstring',
                    datastr : "<?php echo preg_replace("[\n|\r|\n\r]", ' ', DocumentoDeFacturacion::xmlStringDataDocumentos($dfs)) ?>",
                    colNames:['Código','Fecha Emisión','Valor Total','Cliente/Proveedor','Tipo'],
                    colModel :[
                        {name:'codigo', index:'codigo', width:40, align:'center'},
                        {name:'emision', index:'emision', width:40, align:'center'},
                        {name:'total', index:'total', width:40, align:'center', sortable:false},
                        {name:'cli_prov', index:'cli_prov', width:100, align:'center', sortable:false},
                        {name:'tipo', index:'tipo', width:40, align:'center', sortable:false}
                    ],
                    pager: jQuery('#pager'),
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
               jQuery("resultado_consulta_fechas").jqGrid('navGrid','pager',{del:false,add:false,edit:false,search:false});
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

