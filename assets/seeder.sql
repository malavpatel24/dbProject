-- MySQL dump 10.13  Distrib 5.7.13, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: locBucket
-- ------------------------------------------------------
-- Server version	5.7.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `located_in`
--

LOCK TABLES `located_in` WRITE;
/*!40000 ALTER TABLE `located_in` DISABLE KEYS */;
/*!40000 ALTER TABLE `located_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (22,'Tampa',NULL,'Tampa is a city on Tampa Bay, along Florida’s Gulf Coast. A major business center, it’s also known for its museums and other cultural offerings. Busch Gardens is an African-themed amusement park with thrill rides and animal-viewing areas. The historic Ybor City neighborhood, developed by Cuban and Spanish cigar-factory workers at the turn of the 20th century, is a dining and nightlife destination.',1,'Cost varies'),(23,'Disneyland',NULL,'Disneyland Park, originally Disneyland, is the first of two theme parks built at the Disneyland Resort in Anaheim, California, opened on July 17, 1955. It is the only theme park designed and built under the direct supervision of Walt Disney.',2,'Tickets cost around $100'),(24,'Maine',NULL,'Maine, the northeasternmost U.S. state, is known for its rocky coastline, maritime history and nature areas like the granite and spruce islands of Acadia National Park. Moose are plentiful in Baxter State Park, home to Mt. Katahdin, endpoint of the Appalachian Trail. Lighthouses such as the candy-striped beacon at West Quoddy Head, dot the coast, as do lobster shacks and sandy beaches like Ogunquit and Old Orchard.',3,'Cost Varies'),(25,'Four Freedoms Park',NULL,'Four Freedoms Park and Recreation Center, located in Cape Coral, FL, is nestled on 3.2 acres overlooking Bimini Basin. The park is located off of Cape Coral Pkwy between Coronado Pkwy and Santa Barbara Blvd. The park’s large, shaded, fenced in area provides playground equipment geared toward all ages and there are several picnic areas on site, as well as a sunbathing only beach with scenic views of Bimini Basin. ',4,'FREE!!'),(26,'North Rim',NULL,'North Rim is a populated place in Coconino County, Arizona, United States. It is located adjacent to the Grand Canyon within Grand Canyon National Park. The area includes a Visitor Center, the Grand Canyon Lodge, and a number of hiking trails, including the Bright Angel Point Trail and Transept Trail. North Rim is 57 miles south-southeast of Fredonia. North Rim has a post office with ZIP code 86052.',5,'4 day trips from $1,210'),(27,'Mount Rushmore',NULL,'Mount Rushmore National Memorial is a massive sculpture carved into Mount Rushmore in the Black Hills region of South Dakota. Completed in 1941 under the direction of Gutzon Borglum and his son Lincoln, the sculpture\'s roughly 60-ft.-high granite faces depict U.S. presidents George Washington, Thomas Jefferson, Theodore Roosevelt and Abraham Lincoln. The site also features a museum with interactive exhibits.',6,'Only a $10 parking fee'),(28,'Guadalupe Mountains',NULL,'Guadalupe Mountains National Park is in the vast Chihuahuan Desert of western Texas. It’s known for its bright-white Salt Basin Dunes, wildlife-rich grassland and fossilized reef mountains. The Guadalupe Peak Trail weaves up through a conifer forest to the state’s highest summit, with views of the rocky El Capitan peak to the south. In the north, the McKittrick Canyon Trail is known for its colorful fall foliage.',7,'7-day trips from $1,586');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
INSERT INTO `pictures` VALUES (5,22,'22image.png'),(6,23,'23image.png'),(7,24,'24image.png'),(8,25,'25image.png'),(9,26,'26image.png'),(10,27,'27image.png'),(11,28,'28image.png');
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `rankings`
--

LOCK TABLES `rankings` WRITE;
/*!40000 ALTER TABLE `rankings` DISABLE KEYS */;
INSERT INTO `rankings` VALUES (7,22,-1),(7,23,-1),(7,24,-1),(7,25,1),(7,26,1),(7,27,-1),(7,28,1);
/*!40000 ALTER TABLE `rankings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'User'),(2,'Photographer'),(3,'Admin');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'City'),(2,'Amusement Park'),(3,'State'),(4,'Park'),(5,'Campsite'),(6,'Historical Monument'),(7,'National Park');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user_locations`
--

LOCK TABLES `user_locations` WRITE;
/*!40000 ALTER TABLE `user_locations` DISABLE KEYS */;
INSERT INTO `user_locations` VALUES (7,23,1,NULL),(7,25,2,NULL),(7,28,3,NULL),(15,22,1,NULL);
/*!40000 ALTER TABLE `user_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'Kevin Dennis','kevin@kevin.com','$2y$10$FBnzPgXt1vjCmzEm5FqIvuGTT4uAfsTjuyl9Q7SZ6y39rjoNQl7Pa',3,NULL),(8,'Chris','chris@chris.com','$2y$10$vz.PzyEROvJ3zB5bvh80NOZkt.zy.lxm/GuxTwvvDZagNDMvzocGe',3,NULL),(9,'Malav','malav@malav.com','$2y$10$4afPrq/3nw.PgGa343jbtu8B3DIZ8GJvm5xdqD27ge3lU/RrAKwua',3,NULL),(10,'Johnny','Johnny@aol.com','$2y$10$omk5YtXDfLLVgqEn0tDkRu0isYSFVrQP1RqxOZVfhgeeVticA/tXO',1,NULL),(11,'Mary','mary@aol.com','$2y$10$KKMuazSy7fyepRAUTA4aBuJKeHH8rD9llXgF7erJNALKjNJDCkxJG',2,NULL),(12,'Susie','susie@aol.com','$2y$10$Wh5DAAB0Ryg0rrcWOuz2n.4kjBJQpVxZ3BgJ3NaSaum1.KE/LRewy',1,NULL),(13,'Mark','mark@aol.com','$2y$10$zq84mywoCLl61qPRUOg/a.8ftktHczKNlxDioOiOaj1vNE.RyrK02',2,NULL),(14,'k','k@o.com','$2y$10$ONUQ6kDaCvydMON6L.UVfexeX3Zji1umPQsKsLVZqcJcammMbKWcC',1,NULL),(15,'test','test@test.com','$2y$10$2UqDhLxNERb985aP.Ta11OxJtAHeDNu9zYIYpNysViGpLX6mW0DKq',1,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-17 18:05:48
