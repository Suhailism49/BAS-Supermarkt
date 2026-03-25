<?php
// Import klant.sql into database

try {
    $conn = new PDO(
        "mysql:host=localhost;charset=utf8mb4",
        "root",
        ""
    );
    
    // Create database
    $conn->exec("CREATE DATABASE IF NOT EXISTS `bas`");
    
    // Now select it
    $conn = new PDO(
        "mysql:host=localhost;dbname=bas;charset=utf8mb4",
        "root",
        ""
    );
    
    // Drop existing table if it exists
    $conn->exec("DROP TABLE IF EXISTS `klant`");
    
    // Create table directly
    $sql = <<<SQL
CREATE TABLE `klant` (
  `klantId` int(11) NOT NULL,
  `klantNaam` varchar(45) DEFAULT NULL,
  `klantEmail` varchar(45) NOT NULL,
  `klantAdres` varchar(45) NOT NULL,
  `klantPostcode` varchar(6) DEFAULT NULL,
  `klantWoonplaats` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`klantId`),
  UNIQUE KEY `KlantenId_UNIQUE` (`klantId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `klant` MODIFY `klantId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

INSERT INTO `klant` (`klantId`, `klantNaam`, `klantEmail`, `klantAdres`, `klantPostcode`, `klantWoonplaats`) VALUES
(1, 'Win', 'win@gmail.com', 'Slige', '1234 W', 'Rotterdam'),
(2, 'Hiiii', 'Hi@gmail.com', 'Latte', '4321', 'Rotterdam'),
(3, 'bbb', 'bbb', '', NULL, NULL),
(4, 'eee', 'eee', '', NULL, NULL),
(5, 'eee', 'eee', '', NULL, NULL);
SQL;
    
    $conn->exec($sql);
    
    echo "Database and table created successfully!\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>