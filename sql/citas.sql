

SELECT * 
FROM Citas ci INNER JOIN Consulta co 
ON ci.idCita = idCita 
INNER JOIN paciente p
ON ci.IdPaciente = p.IdPaciente
INNER JOIN medicos m
ON ci.MedicoID = m.ID
INNER JOIN DetConsulta dc 
ON co.IdConsulta = dc.IdConsulta