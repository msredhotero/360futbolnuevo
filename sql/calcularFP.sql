/*insert into tbconductabck6*/

select
cc.idconducta,
t.fecha13 - t.fecha11 + cc.puntos as puntos,
t.nombre,
t.refequipo,
t.idc

from (
select
max((case when d.reffecha = 32 then d.puntos else 0 end)) as fecha11,
max((case when d.reffecha = 34 then d.puntos else 0 end)) as fecha13,
max((case when d.reffecha = 34 then d.idconducta else 0 end)) as idc,
d.nombre,
d.refequipo
from		dbfixture fix
inner
join		(select tge.idtorneoge,c.puntos,c.refequipo,e.nombre,c.reffecha,c.idconducta from tbconducta c
					inner join dbequipos e on e.idequipo = c.refequipo
					inner join dbtorneoge tge on tge.refequipo = c.refequipo
					where c.reffecha in (32,34)) d
on			fix.reftorneoge_a = d.idtorneoge or fix.reftorneoge_b = d.idtorneoge

where		fix.reffecha in (32,34) and fix.cancha in ('Cancha 1A','Cancha 1B','Cancha 6A','Cancha 6B') and d.refequipo <> 110
group by d.nombre,d.refequipo
) t
inner
join	tbconducta cc
on		cc.refequipo = t.refequipo and cc.reffecha = 33
where t.idc > 0

