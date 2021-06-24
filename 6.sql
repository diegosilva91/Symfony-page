SELECT COUNT(departamentos.codDepto) as N_Empleados, departamentos.codDepto
FROM departamentos
         INNER JOIN empleados
                    ON departamentos.codDepto = empleados.codDepto
GROUP BY departamentos.codDepto
HAVING departamentos.codDepto > 3;
/*más de 3 empleados*/