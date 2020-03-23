BULK INSERT a1702029.a1702029.[Materiales]
   FROM 'e:\wwwroot\rcortese\materiales.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )
 BULK INSERT a1702029.a1702029.[Proveedores]
   FROM 'e:\wwwroot\rcortese\proveedores.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )
BULK INSERT a1702029.a1702029.[Proyectos]
   FROM 'e:\wwwroot\rcortese\proyectos.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )
      
 SET DATEFORMAT dmy
BULK INSERT a1702029.a1702029.[Entregan]
   FROM 'e:\wwwroot\rcortese\entregan.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )
      
