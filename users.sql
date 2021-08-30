CREATE DATABASE 'logingoogle';
CREATE TABLE `users` (
`uid` int NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`username` varchar(25) NOT NULL UNIQUE,
`password` varchar(200) NOT NULL ,
`email` varchar(100) NOT NULL,
`name` varchar(100) NOT NULL,
`profile_pic` varchar(200) NOT NULL,
`google_auth_code` varchar(16) NOT NULL /* 16 digit code */
);

