

DROP DATABASE IF EXISTS poultry;
CREATE DATABASE poultry;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


USE poultry;

-- --------------------------------------------------------

--
-- Table structure for table `BirdsMortality`
--

CREATE TABLE `BirdsMortality` (
  `BirdsMortality_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Deaths` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `BirdsMortality`
--

INSERT INTO `BirdsMortality` (`BirdsMortality_ID`, `Date`, `Deaths`) VALUES
(23, '2020-12-15', 5),
(24, '2020-12-15', 9),
(30, '2020-12-14', 19),
(32, '2020-12-15', 12);

-- --------------------------------------------------------

--
-- Table structure for table `BirdsPurchase`
--

CREATE TABLE `BirdsPurchase` (
  `BirdsPurchase_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `NumberOfBirds` int(11) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `BirdsPurchase`
--

INSERT INTO `BirdsPurchase` (`BirdsPurchase_ID`, `Date`, `NumberOfBirds`, `Price`) VALUES
(2, '2020-12-18', 40, 200),
(5, '2020-12-11', 89, 11570),
(8, '2020-12-14', 12, 488);

-- --------------------------------------------------------



-- --------------------------------------------------------

--
-- Table structure for table `FeedConsumption`
--

CREATE TABLE `FeedConsumption` (
  `FeedConsumption_ID` int(11) NOT NULL,
  `ConsDate` date NOT NULL,
  `Quantity` float NOT NULL,
  `Price` float NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `FeedConsumption`
--
INSERT INTO `FeedConsumption` (`FeedConsumption_ID`, `ConsDate`, `Quantity`, `Price`) VALUES
(21, '2020-12-18', 1000, 34);

-- --------------------------------------------------------

--
-- Table structure for table `FeedPurchase`
--

CREATE TABLE `FeedPurchase` (
  `FeedPurchase_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Quantity` float NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `FeedPurchase`
--

INSERT INTO `FeedPurchase` (`FeedPurchase_ID`, `Date`, `Quantity`, `Price`) VALUES
(5, '2020-12-08', 4040, 61700.9),
(6, '2020-12-18', 400, 370000),
(7, '2020-12-12', 3000, 670000),
(8, '2020-12-18', 100, 22),
(9, '2020-12-15', 100, 2000),
(10, '2020-12-12', 12440, 1200000);

-- --------------------------------------------------------

--
-- Table structure for table `Production`
--

CREATE TABLE `Production` (
  `Production_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `NumberOfEggs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Production`
--

INSERT INTO `Production` (`Production_ID`, `Date`, `NumberOfEggs`) VALUES
(6, '2020-12-25', 100),
(7, '2020-12-14', 120);

-- --------------------------------------------------------

--
-- Table structure for table `Sales`
--

CREATE TABLE `Sales` (
  `Sales_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `NumberOfEggs` int(11) NOT NULL,
  `Revenue` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Sales`
--

INSERT INTO `Sales` (`Sales_ID`, `Date`, `NumberOfEggs`, `Revenue`) VALUES
(9, '2020-12-12', 120, 200),
(10, '2020-12-17', 12, 180);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`User_ID`, `Username`, `Password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BirdsMortality`
--
ALTER TABLE `BirdsMortality`
  ADD PRIMARY KEY (`BirdsMortality_ID`);

--
-- Indexes for table `BirdsPurchase`
--
ALTER TABLE `BirdsPurchase`
  ADD PRIMARY KEY (`BirdsPurchase_ID`);

--

--
-- Indexes for table `FeedConsumption`
-- Indexes for table `FeedConsumption`
ALTER TABLE `FeedConsumption`
ADD PRIMARY KEY (`FeedConsumption_ID`);

-- Indexes for table `FeedPurchase`
ALTER TABLE `FeedPurchase`
ADD PRIMARY KEY (`FeedPurchase_ID`);

--
-- Indexes for table `Production`
--
ALTER TABLE `Production`
  ADD PRIMARY KEY (`Production_ID`);

--
-- Indexes for table `Sales`
--
ALTER TABLE `Sales`
  ADD PRIMARY KEY (`Sales_ID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--
-- Create a trigger to update the number of eggs after a sale is made
DELIMITER //

CREATE TRIGGER update_eggs_after_sale
AFTER INSERT ON Sales
FOR EACH ROW
BEGIN
    DECLARE eggs_sold INT;
    SET eggs_sold = NEW.NumberOfEggs;
    UPDATE Production
    SET NumberOfEggs = NumberOfEggs - eggs_sold;
END;
//

DELIMITER ;


--
-- AUTO_INCREMENT for table `BirdsMortality`
--
ALTER TABLE `BirdsMortality`
  MODIFY `BirdsMortality_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `BirdsPurchase`
--
ALTER TABLE `BirdsPurchase`
  MODIFY `BirdsPurchase_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--

-- AUTO_INCREMENT for table `FeedConsumption`
--
ALTER TABLE `FeedConsumption`
  MODIFY `FeedConsumption_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `FeedPurchase`
--
ALTER TABLE `FeedPurchase`
  MODIFY `FeedPurchase_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Production`
--
ALTER TABLE `Production`
  MODIFY `Production_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Sales`
--
ALTER TABLE `Sales`
  MODIFY `Sales_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;