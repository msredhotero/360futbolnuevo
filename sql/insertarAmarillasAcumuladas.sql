/*insert into tbsuspendidos*/
/*insert into dbsuspendidosfechas*/
select
/* para los suspendidosfechas */
'',t.idjugador,t.refequipo, 30	
/* para los suspendidos */
'',t.refequipo,t.idjugador, 'Doble Amarilla', 1, '2015-01-05', t.idfixture
/*t.refequipo, t.nombre, t.apyn, t.dni, (case when t.cantidad > 3 then mod(t.cantidad,3) else t.cantidad end) as cantidad,ultimafecha,fecha,t.idjugador*/
				from
				(
				select
					a.refequipo, e.nombre, j.apyn, j.dni, count(a.amarillas) as cantidad,max(fi.reffecha) as ultimafecha, max(ff.tipofecha) as fecha,j.idjugador, max(fi.idfixture) as idfixture
					from		tbamonestados a
					inner
					join		dbequipos e
					on			e.idequipo = a.refequipo
					inner
					join		dbjugadores j
					on			j.idjugador = a.refjugador
					inner
					join		dbfixture fi
					on			fi.idfixture = a.reffixture
					inner
					join		tbfechas ff
					on			ff.idfecha = fi.reffecha
					where	refequipo in (select
											distinct e.idequipo
											from		dbtorneoge tge
											inner
											join		dbequipos e
											on			e.idequipo = tge.refequipo
											inner
											join		dbfixture fix
											on			fix.reftorneoge_a = tge.idtorneoge or fix.reftorneoge_b = tge.idtorneoge
											inner
											join		dbtorneos t
											on			t.idtorneo = tge.reftorneo
											inner
											join		tbtipotorneo tp
											on			tp.idtipotorneo = t.reftipotorneo
											where		tp.idtipotorneo in (1,2,3))
					and a.amarillas <> 2
					group by a.refequipo, e.nombre, j.apyn, j.dni,j.idjugador
				) t
					where (cantidad = 3 and ultimafecha = 29)
					
					order by (case when t.cantidad > 3 then mod(t.cantidad,3) else t.cantidad end) desc,t.nombre, t.apyn