copy "data\sql\1cliente.sql" "..\..\bin\mysql\mysql5.5.8\bin\" /Y
copy "data\sql\2proveedor.sql" "..\..\bin\mysql\mysql5.5.8\bin\" /Y
copy "data\sql\3producto.sql" "..\..\bin\mysql\mysql5.5.8\bin\" /Y
copy "data\sql\4documento.sql" "..\..\bin\mysql\mysql5.5.8\bin\" /Y
copy "data\sql\5detalle.sql" "..\..\bin\mysql\mysql5.5.8\bin\" /Y
cd..
cd..
cd bin
cd mysql
cd mysql5.5.8
cd bin
mysql -u root < 1cliente.sql
mysql -u root < 2proveedor.sql
mysql -u root < 3producto.sql
mysql -u root < 4documento.sql
mysql -u root < 5detalle.sql
