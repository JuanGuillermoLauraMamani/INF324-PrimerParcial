Select n.sigla, n.notaf,n.ci,p.ci,COUNT(p.departamento)
	from nota n, persona p 
	where n.ci=p.ci
   group by sigla

Select n.sigla, n.notaf,n.ci,p.ci,p.departamento
from nota n, persona p 
	where n.ci=p.ci  
ORDER BY `p`.`departamento`  


   SELECT AVG(n.notaf)
from nota n, persona p
where n.ci=p.ci
and p.departamento='02'
GROUP by n.sigla

SELECT departamento
from nota n,persona p
where n.ci=p.ci
GROUP by departamento