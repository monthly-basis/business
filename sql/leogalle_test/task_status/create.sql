CREATE TABLE `task_status` (
    `task_status_id` int(10) unsigned not null auto_increment,
    `name` varchar(255) NOT NULL,
    `order` int(3) DEFAULT NULL,
    PRIMARY KEY (`task_status_id`)
) charset=utf8;
