ALTER TABLE `number_of_cores_tablet` CHANGE `name_number_of_cores` `name_number_of_cores` INT NOT NULL;
ALTER TABLE `screen_size_tablet` CHANGE `name_screen_size` `name_screen_size` INT NOT NULL ;
ALTER TABLE `tablet` ADD `manufacture` INT NOT NULL;
ALTER TABLE `tablet` ADD `cost` INT NOT NULL AFTER `image_name` ;