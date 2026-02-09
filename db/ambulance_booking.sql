-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2026 at 02:14 PM
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
-- Database: `ambulance_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '5c428d8875d2948607f3e3fe134d71b4', '2026-01-29 12:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserRead` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`, `UserRead`) VALUES
(1, 'emmanuel@patient.rw', 1, '2026-02-01', '2026-02-01', 'Emergency Response: Severe Respiratory Distress. Patient is chronic asthmatic. Requires high-flow oxygen and nebulization during transit to CHUK Emergency Centre.', 1, '2026-01-28 20:15:43', 0),
(2, 'claudine@patient.rw', 4, '2026-02-05', '2026-02-05', 'Mission: Critical Neo-Natal Transfer. 2-day old infant requires NICU transport with active incubator support. Destination: King Faisal Hospital.', 0, '2026-01-29 20:15:43', 0),
(3, 'jeanpierre@patient.rw', 2, '2026-02-10', '2026-02-10', 'Pre-authorized Mission: Cardiac Patient shifting from Home to Rwanda Military Hospital. Requires continuous ECG monitoring and ACLS technician.', 1, '2026-01-29 21:10:06', 0),
(4, 'alice@patient.rw', 3, '2026-02-12', '2026-02-12', 'Mission: Dialysis Patient recurring transport to Masaka District Hospital. Requires wheel-chair access and semi-fowler positioning.', 0, '2026-01-29 22:30:15', 0),
(5, 'patrick@patient.rw', 1, '2026-02-15', '2026-02-15', 'Emergency Protocol: Road Traffic Accident casualty on Rubavu Highway. Multiple fractures suspected. Mobilize Unit Alpha for urgent stabilization.', 2, '2026-01-29 23:45:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Force Motors Medical', '2026-01-18 16:24:34', NULL),
(2, 'Tata LifeCare', '2026-01-18 16:24:50', NULL),
(3, 'Mercedes-Benz Rescue', '2026-01-18 16:25:03', NULL),
(4, 'Mahindra Health', '2026-01-18 16:25:13', NULL),
(5, 'Toyota Pharma Hub', '2026-01-18 16:25:24', NULL),
(7, 'Ashok Leyland Rescue', '2026-01-19 06:22:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'HQ: Central Mission Control, E-Emergency Medical Centre, KG 7 Avenue, Kigali', 'dispatch@e-emergency.rw', '0788112233');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(1, 'Dr. Jean Mutabazi', 'dr.mutabazi@health.rw', '0788445566', 'Inquiry: Corporate contract for employee emergency health support at Vision City. Please share pricing for onsite ambulance standby.', '2026-01-20 10:03:07', 1),
(2, 'Carine Ingabire', 'carine@housing.rw', '0722889900', 'Request: Neighborhood emergency response setup in Gacuriro Estate. We need one BLS unit stationed during night shifts.', '2026-01-25 14:20:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Emergency Protocols', 'terms', 'E-Emergency Ambulance Services act as a rapid dispatch intermediary. Mission authorization is strictly dependent on real-time fleet availability and geographical proximity to the patient. All Advanced Life Support missions are logged and monitored via our Central Command to ensure medical standards are met during transit.'),
(2, 'Patient Privacy Registry', 'privacy', 'We uphold the highest Tier-1 HIPAA-compliant security for patient records. Mission logs, patient vitals, and diagnostic reports collected during dispatch are encrypted and shared only with the receiving hospital medical team.'),
(3, 'E-Emergency Mission Control', 'aboutus', 'E-Emergency is India premier tech-enabled Emergency Response Network. Our mission is to eliminate the critical time-gap between emergency and medical care. With a pan-India fleet of tech-integrated ambulances, we ensure that every mission is a life-saving success.'),
(11, 'Knowledge Base', 'faqs', 'Q: How is the dispatch time calculated? A: We use AI-driven traffic patterns to mission-route the nearest available unit. Q: Are the units ICU-ready? A: Yes, our ALS units are certified Mobile ICUs with life-support ventilators.');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(1, 'alerts@emergencyhub.in', '2026-01-22 16:35:32'),
(2, 'safety.lead@techcorp.com', '2026-01-28 10:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(1, 'jeanpierre@patient.rw', 'The paramedic team on Unit Alpha was incredible. They stabilized my father cardiac rhythm during the shift to Rwanda Military Hospital. Truly life-saving.', '2026-01-18 07:44:31', 1),
(2, 'claudine@patient.rw', 'E-Emergency neo-natal unit is a blessing. The incubator was top-quality and the nurse on board handled our 2-day old infant with extreme care during transport to King Faisal Hospital.', '2026-01-20 07:46:05', 1),
(3, 'emmanuel@patient.rw', 'Quick response. Within 12 minutes of booking, the ambulance was at our gate in Kimihurura. High-flow oxygen started immediately.', '2026-01-25 11:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(1, 'Emmanuel Habimana', 'emmanuel@patient.rw', '5c428d8875d2948607f3e3fe134d71b4', '0788123456', '15/05/1982', 'KG 15 Avenue, Kimihurura', 'Kigali', 'Rwanda', '2026-01-10 19:59:27', NULL),
(2, 'Claudine Uwimana', 'claudine@patient.rw', '5c428d8875d2948607f3e3fe134d71b4', '0722334455', '22/09/1995', 'KN 5 Road, Nyamirambo', 'Kigali', 'Rwanda', '2026-01-12 20:00:49', NULL),
(3, 'Jean-Pierre Ndayisaba', 'jeanpierre@patient.rw', '5c428d8875d2948607f3e3fe134d71b4', '0733445566', '05/11/1975', 'Sector 3, Muhanga Town', 'Muhanga', 'Rwanda', '2026-01-15 20:01:43', NULL),
(4, 'Alice Mukamana', 'alice@patient.rw', '5c428d8875d2948607f3e3fe134d71b4', '0766778899', '30/01/1988', 'Nyabugogo Main Road', 'Kigali', 'Rwanda', '2026-01-18 20:03:36', NULL),
(5, 'Patrick Nshimiyimana', 'patrick@patient.rw', '5c428d8875d2948607f3e3fe134d71b4', '0799112233', '14/02/1965', 'Rusizi Avenue, Rubavu District', 'Rubavu', 'Rwanda', '2026-01-22 21:05:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`) VALUES
(1, 'Command Unit Alpha (ALS)', 1, 'Advanced Life Support Unit. Fleet-lead for critical trauma and respiratory emergencies. Equipped with high-frequency ventilator and transport monitor.', 75000, 'Diesel', 2024, 7, 'five-door-gurkha-interior-dashboard.avif', 'TWIN-STRETCHER-AMBULANCE.png', '482-0-Trax-ambulance-from-Force-Motors.jpg', 'Saic-Maxus-V80-Diesel-Ambulance-Vehicle-with-Medical-Equipment.avif', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2026-01-19 11:46:23', '2026-01-29 20:22:20'),
(2, 'Cardiac Shield 02 (ICU)', 2, 'Mobile Cardiac ICU. Optimized for myocardial infarction response. Features external pacing and advanced hemodynamic monitoring.', 120000, 'CNG', 2025, 3, 'five-door-gurkha-interior-dashboard.avif', 'winger-ambulance-1673263831-2.jfif', 'unmlifecare_gallery-6.jpeg', 'Ford-Van-Type-Ambulance-17-scaled.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2026-01-19 16:16:17', '2026-01-29 20:30:29'),
(3, 'City Rescue BLS', 4, 'Basic Life Support unit for stable transfers and non-critical medical shifts. High-roof design with easy patient loading system.', 35000, 'Diesel', 2023, 5, 'mahindra-bolero-neo-plus-1-1695199324.jpg', 'istockphoto-854811528-612x612.jpg', 'hilux_ex_3.png', 'hilux_ex_3.png', '', 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 1, '2026-01-19 16:18:20', '2026-01-29 20:35:15'),
(4, 'Neo-Natal Guardian', 3, 'Specialized pediatric transport unit. Features active incubator, warmers, and specialized oxygenation for newborns.', 180000, 'CNG', 2025, 4, 'images.jfif', 'images (1).jfif', 'Mercedes-Benz-Automatic-ICU-Hospital-Patient-Transport-Medical-Rescue-Ambulance.avif', 'Mercedes-Emergency-Type-Ambulance3.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2026-01-19 16:18:43', '2026-01-29 20:38:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
