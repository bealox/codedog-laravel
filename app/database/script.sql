
/*----------------
--Parent User
----------------*/
CREATE TABLE IF NOT EXISTS `SeekdogTest` . `User` (
`email` VARCHAR(255) NOT NULL,
`password` VARCHAR(32) NOT NULL,
`create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
`delete_time` TIMESTAMP NULL,
`id` int NOT NULL,
`registered` CHAR(0) DEFAULT NULL,
PRIMARY KEY (`id`)
);

/*--------------
------ Post
--------------*/

CREATE TABLE IF NOT EXISTS `SeekdogTest`. `Post` (
`create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
`delete_time` TIMESTAMP NULL,
`title` VARCHAR(32) NULL,
`description` TEXT NULL,
`user_id` int NOT NULL,
`type_id` int NOT NULL,
`id` int NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY(`user_id`) REFERENCES `user`(`id`)
);
/*---------------
------ Dog breed categories
--------------*/

CREATE TABLE IF NOT EXISTS `SeekdogTest`. `DogBreed` (
`name` VARCHAR(32) NOT NULL,
`id` int NOT NULL,
PRIMARY KEY (`id`)
);


/*---------------
--------- Many to many b/w dogbreed to puppypost
--------------*/

CREATE TABLE IF NOT EXISTS `SeekdogTest`. `Dogbreed_Breeder` (
dogBreed_id int NOT NULL,
puppyPost_id int NOT NULL,
PRIMARY KEY (dogbreed_id, breeder_id),
FOREIGN KEY (dogbreed_id) REFERENCES dogbreed (id),
FOREIGN KEY (breeder_id) REFERENCES breeder(id)
)

/*---------------
--------- Many to many b/w dogbreed and breeder
--------------*/

CREATE TABLE IF NOT EXISTS `SeekdogTest`. `Post_Breeder` (
dogBreed_id int NOT NULL,
post_id int NOT NULL,
PRIMARY KEY (dogbreed_id, post_id),
FOREIGN KEY (dogbreed_id) REFERENCES DogBreed (id),
FOREIGN KEY (post_id) REFERENCES Post(id)
)



John Adolfo
Programmer

automaton
The Brew Tower
Tribeca
166 Albert Street
East Melbourne, VIC 3002
T +61 3 8415 0007
F +61 3 9415 7500
john@automaton.com.au


/*----------------
--Parent User
----------------*/
CREATE TABLE IF NOT EXISTS `SeekdogTest` . `User` (
`email` VARCHAR(255) NOT NULL,
`password` VARCHAR(32) NOT NULL,
`create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
`delete_time` TIMESTAMP NULL,
`id` int NOT NULL,
`registered` CHAR(0) DEFAULT NULL,
PRIMARY KEY (`id`)
);

/*--------------
------ Post
--------------*/

CREATE TABLE IF NOT EXISTS `SeekdogTest`. `Post` (
`create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
`delete_time` TIMESTAMP NULL,
`title` VARCHAR(32) NULL,
`description` TEXT NULL,
`user_id` int NOT NULL,
`type_id` int NOT NULL,
`id` int NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY(`user_id`) REFERENCES `user`(`id`)
);
/*---------------
------ Dog breed categories
--------------*/

CREATE TABLE IF NOT EXISTS `SeekdogTest`. `DogBreed` (
`name` VARCHAR(32) NOT NULL,
`id` int NOT NULL,
PRIMARY KEY (`id`)
);


/*---------------
--------- Many to many b/w dogbreed to puppypost
--------------*/

CREATE TABLE IF NOT EXISTS `SeekdogTest`. `Dogbreed_Breeder` (
dogBreed_id int NOT NULL,
puppyPost_id int NOT NULL,
PRIMARY KEY (dogbreed_id, breeder_id),
FOREIGN KEY (dogbreed_id) REFERENCES dogbreed (id),
FOREIGN KEY (breeder_id) REFERENCES breeder(id)
)

/*---------------
--------- Many to many b/w dogbreed and breeder
--------------*/

CREATE TABLE IF NOT EXISTS `SeekdogTest`. `Post_Breeder` (
dogBreed_id int NOT NULL,
post_id int NOT NULL,
PRIMARY KEY (dogbreed_id, post_id),
FOREIGN KEY (dogbreed_id) REFERENCES DogBreed (id),
FOREIGN KEY (post_id) REFERENCES Post(id)
)



John Adolfo
Programmer

automaton
The Brew Tower
Tribeca
166 Albert Street
East Melbourne, VIC 3002
T +61 3 8415 0007
F +61 3 9415 7500
john@automaton.com.au

`id` int NOT NULL,
PRIMARY KEY (`id`)
);


/*---------------
--------- Many to many b/w dogbreed to puppypost
--------------*/

CREATE TABLE IF NOT EXISTS `SeekdogTest`. `Dogbreed_Breeder` (
dogBreed_id int NOT NULL,
puppyPost_id int NOT NULL,
PRIMARY KEY (dogbreed_id, breeder_id),
FOREIGN KEY (dogbreed_id) REFERENCES dogbreed (id),
FOREIGN KEY (breeder_id) REFERENCES breeder(id)
)

/*---------------
--------- Many to many b/w dogbreed and breeder
--------------*/

CREATE TABLE IF NOT EXISTS `SeekdogTest`. `Post_Breeder` (
dogBreed_id int NOT NULL,
post_id int NOT NULL,
PRIMARY KEY (dogbreed_id, post_id),
FOREIGN KEY (dogbreed_id) REFERENCES DogBreed (id),
FOREIGN KEY (post_id) REFERENCES Post(id)
)



John Adolfo
Programmer

automaton
The Brew Tower
Tribeca
166 Albert Street
East Melbourne, VIC 3002
T +61 3 8415 0007
F +61 3 9415 7500
john@automaton.com.au


