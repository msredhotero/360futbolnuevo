select
*
from (
select
t.tipofecha, t.nombre, sum(t.puntos) as puntos, t.idequipo, t.idfecha
from
(
	select
	f.tipofecha,e.nombre, sum(a.amarillas) as puntos, f.idfecha, e.idequipo
	from		tbamonestados a
	inner
	join		dbequipos e
	on			e.idequipo = a.refequipo
	inner
	join		dbfixture fix
	on			fix.idfixture = a.reffixture
	inner
	join		tbfechas f
	on			f.idfecha = fix.reffecha
	inner
	join		dbtorneoge tge
	on			tge.refequipo = e.idequipo
				and fix.reftorneoge_a = tge.idtorneoge or fix.reftorneoge_b = tge.idtorneoge 

	where		a.amarillas = 1 and tge.reftorneo = 37
	group by 	f.tipofecha,e.nombre, f.idfecha, e.idequipo
	
/*
	union all

	select
	f.tipofecha,e.nombre, sum(3) as puntos, f.idfecha
	from		tbamonestados a
	inner
	join		dbequipos e
	on			e.idequipo = a.refequipo
	inner
	join		dbfixture fix
	on			fix.idfixture = a.reffixture
	inner
	join		tbfechas f
	on			f.idfecha = fix.reffecha
	where		a.amarillas = 2
	group by 	f.tipofecha,e.nombre, f.idfecha
*/
	union all

	select
	f.tipofecha,e.nombre, sum(3) as puntos, sp.idfecha, e.idequipo
	from		tbsuspendidos a
	inner
	join		dbequipos e
	on			e.idequipo = a.refequipo
	inner
	join		(select refsuspendido,min(reffecha) as idfecha from dbsuspendidosfechas group by refsuspendido)  sp
	on			sp.refsuspendido = a.idsuspendido
	inner
	join		tbfechas f
	on			f.idfecha = sp.idfecha -1
	inner
	join		dbfixture fix
	on			fix.idfixture = a.reffixture
	inner
	join		dbtorneoge tge
	on			tge.refequipo = e.idequipo
				and fix.reftorneoge_a = tge.idtorneoge or fix.reftorneoge_b = tge.idtorneoge 

	where		tge.reftorneo = 37
	group by 	f.tipofecha,e.nombre, sp.idfecha, e.idequipo
) as t

group by t.tipofecha, t.nombre, t.idequipo, t.idfecha
) as tt

inner
join		dbtorneoge tge
on			tge.refequipo = tt.idequipo and tge.reftorneo = 37
inner
join		dbfixture fix
on			fix.reftorneoge_a = tge.idtorneoge and fix.reffecha = tt.idfecha
where		tt.idfecha = 24
order by 	2