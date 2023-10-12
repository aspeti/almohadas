ALTER TABLE `almohadas_db`.`producto` 
ADD COLUMN `img` VARCHAR(45) NULL AFTER `precio`;

ALTER TABLE `almohadas_db`.`producto` 
ADD COLUMN `codigo` VARCHAR(45) NULL AFTER `precio`;