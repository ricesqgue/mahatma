#Cantidad de libros vendidos por genero.
select sum(d.cantidad), l.genero from libro l join compraDetalle d on l.id = d.idLibro group by l.genero;


#Top 10 de libros vendidos.
select sum(d.cantidad) as total, l.nombre from libro l join compraDetalle d on l.id = d.idLibro group by l.id order by total desc limit 10;

#Compra de hombres vs mujeres

select sum(d.cantidad) as total, if(u.genero = 'm','Hombres','Mujeres') from compraDetalle d join compraTotal t on d.idCompraTotal = t.idCompraTotal join usuario u on t.idUsuario = u.id group by u.genero