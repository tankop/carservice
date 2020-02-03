CREATE TABLE IF NOT EXISTS `clients`
(
    `id`     int(10)      NOT NULL AUTO_INCREMENT,
    `name`   varchar(256) NOT NULL,
    `idcard` varchar(128) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `cars`
(
    `client_id`  int(10)     NOT NULL,
    `car_id`     int(10)     NOT NULL,
    `type`       varchar(8)  NOT NULL,
    `registered` timestamp   NOT NULL,
    `ownbrand`   tinyint(1)  NOT NULL,
    `accident`   smallint(6) NOT NULL,
    PRIMARY KEY (`client_id`, `car_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
ALTER TABLE `cars`
    ADD CONSTRAINT `client_id_fk` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

CREATE TABLE IF NOT EXISTS `services`
(
    `client_id`   int(10)      NOT NULL,
    `car_id`      int(10)      NOT NULL,
    `lognumber`   int(10)      NOT NULL,
    `event`       varchar(128) NOT NULL,
    `eventtime`   timestamp    NULL DEFAULT NULL,
    `document_id` int(10)      NOT NULL,
    PRIMARY KEY (`client_id`, `car_id`, `lognumber`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

ALTER TABLE `services`
    ADD CONSTRAINT `service_client_id_fk` FOREIGN KEY (`client_id`, `car_id`) REFERENCES `cars` (`client_id`, `car_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;