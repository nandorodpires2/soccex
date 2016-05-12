select	t.time_nome,
			count(*) as cadastros
from		perfil p
			inner join time t on p.time_id = t.time_id
group by t.time_id