-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 03:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p2hcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adname` varchar(225) NOT NULL,
  `adsurname` varchar(225) NOT NULL,
  `adusername` varchar(225) NOT NULL,
  `adpass` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adname`, `adsurname`, `adusername`, `adpass`) VALUES
('aurora ', 'malibag', 'au_malibag@hcms.com', 'aumabaho'),
('reign ', 'heneroso ', 'admin', 'admin123'),
('juana', 'dela cruz ', 'HW_JuanaDC ', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `admin1`
--

CREATE TABLE `admin1` (
  `ad_id` int(225) NOT NULL,
  `ad_fname` varchar(225) NOT NULL,
  `ad_lname` varchar(225) NOT NULL,
  `ad_email` varchar(255) NOT NULL,
  `ad_pass` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin1`
--

INSERT INTO `admin1` (`ad_id`, `ad_fname`, `ad_lname`, `ad_email`, `ad_pass`) VALUES
(1, 'little mermaid ', 'gaspar', 'administator@gmail.com', 'password'),
(0, 'administrator ', 'BHW', 'administrator', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_supp`
--

CREATE TABLE `emergency_supp` (
  `er_supId` int(225) NOT NULL,
  `prdct_name` varchar(225) NOT NULL,
  `pstck_in` int(225) NOT NULL,
  `pstck_out` int(225) NOT NULL,
  `pstck_exprd` int(225) NOT NULL,
  `pstck_avail` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency_supp`
--

INSERT INTO `emergency_supp` (`er_supId`, `prdct_name`, `pstck_in`, `pstck_out`, `pstck_exprd`, `pstck_avail`) VALUES
(1, 'oxygen tank ', 5, 2, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `inv_meds`
--

CREATE TABLE `inv_meds` (
  `med_id` int(225) NOT NULL,
  `meds_name` varchar(225) NOT NULL,
  `stock_in` int(225) NOT NULL,
  `stock_out` int(225) NOT NULL,
  `stock_exp` int(225) NOT NULL,
  `stock_avail` int(225) NOT NULL,
  `med_dscrptn` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inv_meds`
--

INSERT INTO `inv_meds` (`med_id`, `meds_name`, `stock_in`, `stock_out`, `stock_exp`, `stock_avail`, `med_dscrptn`) VALUES
(1, 'Acetaminophen (Tylenol) ', 100, 20, 5, 75, 'Sample Description'),
(2, 'Ibuprofen (Advil)', 75, 20, 5, 75, ''),
(21, 'pills ', 1000, 0, 0, 1000, '28 tables per box '),
(22, 'biogesic', 10000, 0, 0, 10000, '50 capsules per box '),
(23, 'metformin', 100, 0, 0, 100, ' 300 caps per box '),
(24, '', 0, 4, 2, 92, '');

-- --------------------------------------------------------

--
-- Table structure for table `inv_medsup`
--

CREATE TABLE `inv_medsup` (
  `med_supId` int(225) NOT NULL,
  `prod_name` varchar(225) NOT NULL,
  `stck_in` int(225) NOT NULL,
  `stck_out` int(225) NOT NULL,
  `stck_expired` int(225) NOT NULL,
  `stck_avl` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inv_medsup`
--

INSERT INTO `inv_medsup` (`med_supId`, `prod_name`, `stck_in`, `stck_out`, `stck_expired`, `stck_avl`) VALUES
(1, 'Gauze Pads/Bandages:', 1000, 0, 0, 1000),
(10, 'Adhesive Bandages (Band-Aids)', 10000, 0, 0, 10000),
(11, 'Alcohol Swabs', 20000, 0, 0, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(225) NOT NULL,
  `p_name` varchar(225) NOT NULL,
  `p_age` varchar(225) NOT NULL,
  `p_bday` varchar(225) NOT NULL,
  `p_address` varchar(225) NOT NULL,
  `p_contper` varchar(225) NOT NULL,
  `p_type` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `p_name`, `p_age`, `p_bday`, `p_address`, `p_contper`, `p_type`) VALUES
(110406, 'MARCO, APOLLO LUNA', '3', '2022-08-20', 'PALIPARAN 2 ', 'Father', 'pedia'),
(110407, 'ARIAS, JACKIELOU ', '22', '2002-06-02', 'STA. MARIA DASMARINAS', 'Mother', 'pedia'),
(110408, 'PINGOL, ALLEN JAY M.', '21', '2002-11-10', 'SALAWAG DASMARINAS ', 'Mother', 'Pedia'),
(110409, 'DUMLAO,ANGELINE ', '23', '2002-01-04', 'SALAWAG DASMARINAS ', 'CLARISE ROBLES ', 'Senior'),
(110410, 'DELA CRUZ, MARIA JUANA ', '67', '1957-01-15', 'PALIPARAN 3 DASMARINAS CAVITE ', 'DELA CRUZ JUANITO - HUSBAND ', 'Senior');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emergency_supp`
--
ALTER TABLE `emergency_supp`
  ADD PRIMARY KEY (`er_supId`);

--
-- Indexes for table `inv_meds`
--
ALTER TABLE `inv_meds`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `inv_medsup`
--
ALTER TABLE `inv_medsup`
  ADD PRIMARY KEY (`med_supId`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emergency_supp`
--
ALTER TABLE `emergency_supp`
  MODIFY `er_supId` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inv_meds`
--
ALTER TABLE `inv_meds`
  MODIFY `med_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `inv_medsup`
--
ALTER TABLE `inv_medsup`
  MODIFY `med_supId` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110411;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
