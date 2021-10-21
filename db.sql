create database `20171001`;
use `20171001`;
create table `userinfo`(
    `id` int unsigned not null primary key auto_increment,
    `username` varchar(50) not null unique,
    `password` char(10) not null,
    `permission` enum("admin","user") default "user",
    `alias` varchar(50)
)charset='utf8' ;

create table `order`(
    `id` int unsigned not null primary key auto_increment,
    `date` timestamp not null default current_timestamp,
    `username` varchar(50) not null,
    `room` char(10)
)charset='utf8';

insert into `userinfo` (`username`,`password`,`permission`,`alias`) values
("20171001-admin","123456","admin","chujiaqi"),
("20171001-1","123456","user","user1")

insert info `userinfo` set `username`="20171001-1"