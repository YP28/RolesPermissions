CREATE TABLE `roles` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	UNIQUE INDEX `name` (`name`),
	PRIMARY KEY (`id`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB;

CREATE TABLE `roles_roleable` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `role_id` INT(11) NOT NULL,
  `roleable_type` VARCHAR(255) NOT NULL,
  `roleable_id` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `role_id_roleable_type_roleable_id` (`role_id`, `roleable_type`, `roleable_id`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB;

CREATE TABLE `permissions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `subject` VARCHAR(255) NOT NULL,
  `type` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `subject_type` (`subject`, `type`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB;

CREATE TABLE `roles_permissions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `role_id` INT(11) NOT NULL,
  `permission_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `role_id_permission_id` (`role_id`, `permission_id`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB;