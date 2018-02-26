CREATE TABLE `business` (
    `business_id` int(10) unsigned not null auto_increment,
    `user_id` int(10) not null,
    `name` varchar(255) not null,
    `description` varchar(255) not null,
    `website` varchar(255) not null,
    `views` int unsigned not null default 0,
    `created` datetime not null,
    PRIMARY KEY (`business_id`),
    INDEX (`user_id`)
) charset=utf8;
