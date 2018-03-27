CREATE TABLE `task` (
    `task_id` int(10) unsigned not null auto_increment,
    `business_id` int(10) unsigned not null,
    `user_id` int(10) unsigned not null,
    `summary` varchar(255) not null,
    `description` text not null,
    `task_status_id` int(10) unsigned default null,
    `views` int unsigned not null default 0,
    `created` datetime not null,
    PRIMARY KEY (`task_id`),
    INDEX `business_id` (`business_id`)
) charset=utf8;
