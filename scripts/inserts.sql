insert into rol (nombre, descripcion, eliminado)values
("admin","administrador",0),
("cliente","cliente",0);

insert into usuario(fecha_creacion,eliminado,email,password,nombre,apellido,id_rol)values
(CURDATE(),0,"admin@gmail.com",MD5("admin"),'Admin','Apellido',1),
(CURDATE(),0,"usuario@gmail.com",MD5("usuario"),'usuario','Vargas',2);


insert into comprobante (nombre,cantidad,serie)values('recibo',1,'001')
