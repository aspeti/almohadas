insert into rol (id_rol,nombre, descripcion, eliminado)values
(1,"admin","administrador",0),
(2,"cliente","cliente",0);

insert into usuario(id_usuario,fecha_creacion,eliminado,email,password,nombre,apellido,id_rol)values
(1,CURDATE(),0,"admin@gmail.com",MD5("admin"),'Admin','Apellido',1),
(2,CURDATE(),0,"usuario@gmail.com",MD5("usuario"),'usuario','Vargas',2),
(3,CURDATE(),0,"fabiola@gmail.com",MD5("fabiola"),'Fabiola','Perez',2),
(4,CURDATE(),0,"mario@gmail.com",MD5("mario"),'Mario','Lopez',2);


insert into comprobante (id_comprobante,nombre,cantidad,serie)values(1,'recibo',1,'001');


insert into categoria(id_categoria,nombre, descripcion, eliminado) value
(1,"Comercial", "Almohadas comerciales",0), 
(2,"Empresarial", "Almohadas empresarial",0);


INSERT INTO producto (codigo, fecha_creacion, eliminado, nombre, descripcion, precio, id_categoria)
VALUES
('ALM001', NOW(), 0, 'Almohada Suave', 'Almohada suave y cómoda para un sueño tranquilo', 25.00, 1),
('ALM002', NOW(), 0, 'Almohada Firme', 'Almohada firme para un soporte adecuado del cuello', 30.00, 2),
('ALM003', NOW(), 0, 'Almohada Ortopédica', 'Almohada ortopédica para un mejor soporte de la espalda', 35.00, 1);