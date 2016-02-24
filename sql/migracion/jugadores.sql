insert into 360migracion.dbjugadores(apellido,nombre,idequipo,dni,invitado,expulsado,email,facebook)
SELECT 
apellido,
nombre,
je.id_equipo,
dni,
0,
0,
mail,
''
FROM jugador j
inner join jugador_equipo je on j.id = je.id_jugador