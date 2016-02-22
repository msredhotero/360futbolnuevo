/*insert into tbsuspendidos*/
/*insert into dbsuspendidosfechas*/
select

/* para los suspendidosfechas */
'',j.idjugador,a.refequipo, 30	
/* para los suspendidos */
'',a.refequipo,j.idjugador, 'Doble Amarilla', 1, '2015-01-05', fi.idfixture
/*a.refequipo, e.nombre, j.apyn, j.dni, a.amarillas as cantidad,fi.reffecha as ultimafecha, ff.tipofecha as fecha,j.idjugador*/
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
											where		tp.idtipotorneo in (1,2,3) and fix.reffecha = 29)
					and a.amarillas = 2
and fi.reffecha = 29					
group by a.refequipo, fi.idfixture,j.idjugador
					