-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 08:12 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `catogary`
--

CREATE TABLE `catogary` (
  `idCatogary` int(11) NOT NULL,
  `CatogaryName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countrycode` char(3) NOT NULL,
  `countryname` varchar(200) NOT NULL,
  `code` char(2) DEFAULT NULL,
  `currency` varchar(5) NOT NULL,
  `currency_rate` float NOT NULL,
  `select_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countrycode`, `countryname`, `code`, `currency`, `currency_rate`, `select_status`) VALUES
('ABW', 'Aruba', 'AW', '0', 1, 0),
('ADM', 'ADMIN', 'HZ', 'EUR', 1, 0),
('AFG', 'Afghanistan', 'AF', '0', 1, 0),
('AGO', 'Angola', 'AO', '0', 1, 0),
('AIA', 'Anguilla', 'AI', '0', 1, 0),
('ALA', 'Åland', 'AX', '0', 1, 0),
('ALB', 'Albania', 'AL', '0', 1, 0),
('AND', 'Andorra', 'AD', '0', 1, 0),
('ARE', 'United Arab Emirates', 'AE', '0', 1, 0),
('ARG', 'Argentina', 'AR', '0', 1, 0),
('ARM', 'Armenia', 'AM', '0', 1, 0),
('ASM', 'American Samoa', 'AS', '0', 1, 0),
('ATA', 'Antarctica', 'AQ', '0', 1, 0),
('ATF', 'French Southern Territories', 'TF', '0', 1, 0),
('ATG', 'Antigua and Barbuda', 'AG', '0', 1, 0),
('AUS', 'Australia', 'AU', '0', 1, 0),
('AUT', 'Austria', 'AT', '0', 1, 0),
('AZE', 'Azerbaijan', 'AZ', '0', 1, 0),
('BDI', 'Burundi', 'BI', '0', 1, 0),
('BEL', 'Belgium', 'BE', '0', 1, 0),
('BEN', 'Benin', 'BJ', '0', 1, 0),
('BES', 'Bonaire', 'BQ', '0', 1, 0),
('BFA', 'Burkina Faso', 'BF', '0', 1, 0),
('BGD', 'Bangladesh', 'BD', 'BDT', 100, 1),
('BGR', 'Bulgaria', 'BG', '0', 1, 0),
('BHR', 'Bahrain', 'BH', '0', 1, 0),
('BHS', 'Bahamas', 'BS', '0', 1, 0),
('BIH', 'Bosnia and Herzegovina', 'BA', '0', 1, 0),
('BLM', 'Saint Barthélemy', 'BL', '0', 1, 0),
('BLR', 'Belarus', 'BY', '0', 1, 0),
('BLZ', 'Belize', 'BZ', '0', 1, 0),
('BMU', 'Bermuda', 'BM', '0', 1, 0),
('BOL', 'Bolivia', 'BO', '0', 1, 0),
('BRA', 'Brazil', 'BR', '0', 1, 0),
('BRB', 'Barbados', 'BB', '0', 1, 0),
('BRN', 'Brunei', 'BN', '0', 1, 0),
('BTN', 'Bhutan', 'BT', '0', 1, 0),
('BVT', 'Bouvet Island', 'BV', '0', 1, 0),
('BWA', 'Botswana', 'BW', '0', 1, 0),
('CAF', 'Central African Republic', 'CF', '0', 1, 0),
('CAN', 'Canada', 'CA', '0', 1, 0),
('CCK', 'Cocos [Keeling] Islands', 'CC', '0', 1, 0),
('CHE', 'Switzerland', 'CH', '0', 1, 0),
('CHL', 'Chile', 'CL', '0', 1, 0),
('CHN', 'China', 'CN', '0', 1, 0),
('CIV', 'Ivory Coast', 'CI', '0', 1, 0),
('CMR', 'Cameroon', 'CM', '0', 1, 0),
('COD', 'Democratic Republic of the Congo', 'CD', '0', 1, 0),
('COG', 'Republic of the Congo', 'CG', '0', 1, 0),
('COK', 'Cook Islands', 'CK', '0', 1, 0),
('COL', 'Colombia', 'CO', '0', 1, 0),
('COM', 'Comoros', 'KM', '0', 1, 0),
('CPV', 'Cape Verde', 'CV', '0', 1, 0),
('CRI', 'Costa Rica', 'CR', '0', 1, 0),
('CUB', 'Cuba', 'CU', '0', 1, 0),
('CUW', 'Curacao', 'CW', '0', 1, 0),
('CXR', 'Christmas Island', 'CX', '0', 1, 0),
('CYM', 'Cayman Islands', 'KY', '0', 1, 0),
('CYP', 'Cyprus', 'CY', '0', 1, 0),
('CZE', 'Czech Republic', 'CZ', '0', 1, 0),
('DEU', 'Germany', 'DE', '0', 1, 0),
('DJI', 'Djibouti', 'DJ', '0', 1, 0),
('DMA', 'Dominica', 'DM', '0', 1, 0),
('DNK', 'Denmark', 'DK', '0', 1, 0),
('DOM', 'Dominican Republic', 'DO', '0', 1, 0),
('DZA', 'Algeria', 'DZ', '0', 1, 0),
('ECU', 'Ecuador', 'EC', '0', 1, 0),
('EGY', 'Egypt', 'EG', '0', 1, 0),
('ERI', 'Eritrea', 'ER', '0', 1, 0),
('ESH', 'Western Sahara', 'EH', '0', 1, 0),
('ESP', 'Spain', 'ES', '0', 1, 0),
('EST', 'Estonia', 'EE', '0', 1, 0),
('ETH', 'Ethiopia', 'ET', '0', 1, 0),
('FIN', 'Finland', 'FI', '0', 1, 0),
('FJI', 'Fiji', 'FJ', '0', 1, 0),
('FLK', 'Falkland Islands', 'FK', '0', 1, 0),
('FRA', 'France', 'FR', '0', 1, 0),
('FRO', 'Faroe Islands', 'FO', '0', 1, 0),
('FSM', 'Micronesia', 'FM', '0', 1, 0),
('GAB', 'Gabon', 'GA', '0', 1, 0),
('GBR', 'United Kingdom', 'GB', '0', 1, 0),
('GEO', 'Georgia', 'GE', '0', 1, 0),
('GGY', 'Guernsey', 'GG', '0', 1, 0),
('GHA', 'Ghana', 'GH', '0', 1, 0),
('GIB', 'Gibraltar', 'GI', '0', 1, 0),
('GIN', 'Guinea', 'GN', '0', 1, 0),
('GLP', 'Guadeloupe', 'GP', '0', 1, 0),
('GMB', 'Gambia', 'GM', '0', 1, 0),
('GNB', 'Guinea-Bissau', 'GW', '0', 1, 0),
('GNQ', 'Equatorial Guinea', 'GQ', '0', 1, 0),
('GRC', 'Greece', 'GR', '0', 1, 0),
('GRD', 'Grenada', 'GD', '0', 1, 0),
('GRL', 'Greenland', 'GL', '0', 1, 0),
('GTM', 'Guatemala', 'GT', '0', 1, 0),
('GUF', 'French Guiana', 'GF', '0', 1, 0),
('GUM', 'Guam', 'GU', '0', 1, 0),
('GUY', 'Guyana', 'GY', '0', 1, 0),
('HKG', 'Hong Kong', 'HK', '0', 1, 0),
('HMD', 'Heard Island and McDonald Islands', 'HM', '0', 1, 0),
('HND', 'Honduras', 'HN', '0', 1, 0),
('HRV', 'Croatia', 'HR', '0', 1, 0),
('HTI', 'Haiti', 'HT', '0', 1, 0),
('HUN', 'Hungary', 'HU', '0', 1, 0),
('IDN', 'Indonesia', 'ID', 'IDR', 150, 1),
('IMN', 'Isle of Man', 'IM', '0', 1, 0),
('IND', 'India', 'IN', 'INR', 2.5, 1),
('IOT', 'British Indian Ocean Territory', 'IO', '0', 1, 0),
('IRL', 'Ireland', 'IE', '0', 1, 0),
('IRN', 'Iran', 'IR', '0', 1, 0),
('IRQ', 'Iraq', 'IQ', '0', 1, 0),
('ISL', 'Iceland', 'IS', '0', 1, 0),
('ISR', 'Israel', 'IL', '0', 1, 0),
('ITA', 'Italy', 'IT', '0', 1, 0),
('JAM', 'Jamaica', 'JM', '0', 1, 0),
('JEY', 'Jersey', 'JE', '0', 1, 0),
('JOR', 'Jordan', 'JO', '0', 1, 0),
('JPN', 'Japan', 'JP', '0', 1, 0),
('KAZ', 'Kazakhstan', 'KZ', '0', 1, 0),
('KEN', 'Kenya', 'KE', '0', 1, 0),
('KGZ', 'Kyrgyzstan', 'KG', '0', 1, 0),
('KHM', 'Cambodia', 'KH', '0', 1, 0),
('KIR', 'Kiribati', 'KI', '0', 1, 0),
('KNA', 'Saint Kitts and Nevis', 'KN', '0', 1, 0),
('KOR', 'South Korea', 'KR', '0', 1, 0),
('KWT', 'Kuwait', 'KW', '0', 1, 0),
('LAO', 'Laos', 'LA', '0', 1, 0),
('LBN', 'Lebanon', 'LB', '0', 1, 0),
('LBR', 'Liberia', 'LR', '0', 1, 0),
('LBY', 'Libya', 'LY', '0', 1, 0),
('LCA', 'Saint Lucia', 'LC', '0', 1, 0),
('LIE', 'Liechtenstein', 'LI', '0', 1, 0),
('LKA', 'Sri Lanka', 'LK', 'Rs', 200, 1),
('LSO', 'Lesotho', 'LS', '0', 1, 0),
('LTU', 'Lithuania', 'LT', '0', 1, 0),
('LUX', 'Luxembourg', 'LU', '0', 1, 0),
('LVA', 'Latvia', 'LV', '0', 1, 0),
('MAC', 'Macao', 'MO', '0', 1, 0),
('MAF', 'Saint Martin', 'MF', '0', 1, 0),
('MAR', 'Morocco', 'MA', '0', 1, 0),
('MCO', 'Monaco', 'MC', '0', 1, 0),
('MDA', 'Moldova', 'MD', '0', 1, 0),
('MDG', 'Madagascar', 'MG', '0', 1, 0),
('MDV', 'Maldives', 'MV', '0', 1, 0),
('MEX', 'Mexico', 'MX', '0', 1, 0),
('MHL', 'Marshall Islands', 'MH', '0', 1, 0),
('MKD', 'Macedonia', 'MK', '0', 1, 0),
('MLI', 'Mali', 'ML', '0', 1, 0),
('MLT', 'Malta', 'MT', '0', 1, 0),
('MMR', 'Myanmar [Burma]', 'MM', '0', 1, 0),
('MNE', 'Montenegro', 'ME', '0', 1, 0),
('MNG', 'Mongolia', 'MN', '0', 1, 0),
('MNP', 'Northern Mariana Islands', 'MP', '0', 1, 0),
('MOZ', 'Mozambique', 'MZ', '0', 1, 0),
('MRT', 'Mauritania', 'MR', '0', 1, 0),
('MSR', 'Montserrat', 'MS', '0', 1, 0),
('MTQ', 'Martinique', 'MQ', '0', 1, 0),
('MUS', 'Mauritius', 'MU', '0', 1, 0),
('MWI', 'Malawi', 'MW', '0', 1, 0),
('MYS', 'Malaysia', 'MY', '0', 1, 0),
('MYT', 'Mayotte', 'YT', '0', 1, 0),
('NAM', 'Namibia', 'NA', '0', 1, 0),
('NCL', 'New Caledonia', 'NC', '0', 1, 0),
('NER', 'Niger', 'NE', '0', 1, 0),
('NFK', 'Norfolk Island', 'NF', '0', 1, 0),
('NGA', 'Nigeria', 'NG', '0', 1, 0),
('NIC', 'Nicaragua', 'NI', '0', 1, 0),
('NIU', 'Niue', 'NU', '0', 1, 0),
('NLD', 'Netherlands', 'NL', '0', 1, 0),
('NOR', 'Norway', 'NO', '0', 1, 0),
('NPL', 'Nepal', 'NP', '0', 1, 0),
('NRU', 'Nauru', 'NR', '0', 1, 0),
('NZL', 'New Zealand', 'NZ', '0', 1, 0),
('OMN', 'Oman', 'OM', '0', 1, 0),
('PAK', 'Pakistan', 'PK', 'Pkr', 192, 0),
('PAN', 'Panama', 'PA', '0', 1, 0),
('PCN', 'Pitcairn Islands', 'PN', '0', 1, 0),
('PER', 'Peru', 'PE', '0', 1, 0),
('PHL', 'Philippines', 'PH', '0', 1, 0),
('PLW', 'Palau', 'PW', '0', 1, 0),
('PNG', 'Papua New Guinea', 'PG', '0', 1, 0),
('POL', 'Poland', 'PL', '0', 1, 0),
('PRI', 'Puerto Rico', 'PR', '0', 1, 0),
('PRK', 'North Korea', 'KP', '0', 1, 0),
('PRT', 'Portugal', 'PT', '0', 1, 0),
('PRY', 'Paraguay', 'PY', '0', 1, 0),
('PSE', 'Palestine', 'PS', '0', 1, 0),
('PYF', 'French Polynesia', 'PF', '0', 1, 0),
('QAT', 'Qatar', 'QA', '0', 1, 0),
('REU', 'Réunion', 'RE', '0', 1, 0),
('ROU', 'Romania', 'RO', '0', 1, 0),
('RUS', 'Russia', 'RU', '0', 1, 0),
('RWA', 'Rwanda', 'RW', '0', 1, 0),
('SAU', 'Saudi Arabia', 'SA', '0', 1, 0),
('SDN', 'Sudan', 'SD', '0', 1, 0),
('SEN', 'Senegal', 'SN', '0', 1, 0),
('SGP', 'Singapore', 'SG', '0', 1, 0),
('SGS', 'South Georgia and the South Sandwich Islands', 'GS', '0', 1, 0),
('SHN', 'Saint Helena', 'SH', '0', 1, 0),
('SJM', 'Svalbard and Jan Mayen', 'SJ', '0', 1, 0),
('SLB', 'Solomon Islands', 'SB', '0', 1, 0),
('SLE', 'Sierra Leone', 'SL', '0', 1, 0),
('SLV', 'El Salvador', 'SV', '0', 1, 0),
('SMR', 'San Marino', 'SM', '0', 1, 0),
('SOM', 'Somalia', 'SO', '0', 1, 0),
('SPM', 'Saint Pierre and Miquelon', 'PM', '0', 1, 0),
('SRB', 'Serbia', 'RS', '0', 1, 0),
('SSD', 'South Sudan', 'SS', '0', 1, 0),
('STP', 'São Tomé and Príncipe', 'ST', '0', 1, 0),
('SUR', 'Suriname', 'SR', '0', 1, 0),
('SVK', 'Slovakia', 'SK', '0', 1, 0),
('SVN', 'Slovenia', 'SI', '0', 1, 0),
('SWE', 'Sweden', 'SE', '0', 1, 0),
('SWZ', 'Swaziland', 'SZ', '0', 1, 0),
('SXM', 'Sint Maarten', 'SX', '0', 1, 0),
('SYC', 'Seychelles', 'SC', '0', 1, 0),
('SYR', 'Syria', 'SY', '0', 1, 0),
('TCA', 'Turks and Caicos Islands', 'TC', '0', 1, 0),
('TCD', 'Chad', 'TD', '0', 1, 0),
('TGO', 'Togo', 'TG', '0', 1, 0),
('THA', 'Thailand', 'TH', 'THB', 39, 1),
('TJK', 'Tajikistan', 'TJ', '0', 1, 0),
('TKL', 'Tokelau', 'TK', '0', 1, 0),
('TKM', 'Turkmenistan', 'TM', '0', 1, 0),
('TLS', 'East Timor', 'TL', '0', 1, 0),
('TON', 'Tonga', 'TO', '0', 1, 0),
('TTO', 'Trinidad and Tobago', 'TT', '0', 1, 0),
('TUN', 'Tunisia', 'TN', '0', 1, 0),
('TUR', 'Turkey', 'TR', '0', 1, 0),
('TUV', 'Tuvalu', 'TV', '0', 1, 0),
('TWN', 'Taiwan', 'TW', '0', 1, 0),
('TZA', 'Tanzania', 'TZ', '0', 1, 0),
('UGA', 'Uganda', 'UG', '0', 1, 0),
('UKR', 'Ukraine', 'UA', '0', 1, 0),
('UMI', 'U.S. Minor Outlying Islands', 'UM', '0', 1, 0),
('URY', 'Uruguay', 'UY', '0', 1, 0),
('USA', 'United States', 'US', '0', 1, 0),
('UZB', 'Uzbekistan', 'UZ', '0', 1, 0),
('VAT', 'Vatican City', 'VA', '0', 1, 0),
('VCT', 'Saint Vincent and the Grenadines', 'VC', '0', 1, 0),
('VEN', 'Venezuela', 'VE', '0', 1, 0),
('VGB', 'British Virgin Islands', 'VG', '0', 1, 0),
('VIR', 'U.S. Virgin Islands', 'VI', '0', 1, 0),
('VNM', 'Vietnam', 'VN', 'dong', 27165, 0),
('VUT', 'Vanuatu', 'VU', '0', 1, 0),
('WLF', 'Wallis and Futuna', 'WF', '0', 1, 0),
('WSM', 'Samoa', 'WS', '0', 1, 0),
('XKX', 'Kosovo', 'XK', '0', 1, 0),
('YEM', 'Yemen', 'YE', '0', 1, 0),
('ZAF', 'South Africa', 'ZA', '0', 1, 0),
('ZMB', 'Zambia', 'ZM', '0', 1, 0),
('ZWE', 'Zimbabwe', 'ZW', '0', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `idCourse` int(11) NOT NULL,
  `CName` varchar(45) DEFAULT NULL,
  `fee` int(11) NOT NULL,
  `countrycode` varchar(5) NOT NULL,
  `delstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`idCourse`, `CName`, `fee`, `countrycode`, `delstatus`) VALUES
(2, 'PHP Programming For Beginners', 50000, 'LK', 1),
(5, 'Black Belt', 12000, 'LK', 1),
(7, 'Black belt 2', 45800, 'IN', 0),
(10, '5s Audit ', 8000, 'LK', 1),
(12, 'Quality certificates', 35000, 'PK', 0),
(13, 'Level 01', 80000, 'LK', 0),
(14, 'Level 01', 15000, 'IN', 1),
(15, 'Level 01', 15000, 'IN', 1),
(16, 'Level 02', 50000, 'LK', 1),
(17, 'Level 02', 50000, 'LK', 1),
(18, 'Level 02', 50000, 'LK', 1),
(19, 'Quality certificates', 500000, 'ID', 1),
(20, 'Quality certificates', 250000, 'TH', 1),
(21, 'Six sigma black belt', 250000, 'ID', 0),
(22, 'Six sigma black belt', 190000, 'TH', 0);

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `con_id` varchar(4) NOT NULL,
  `f_name` text NOT NULL,
  `f_reg_no` varchar(20) NOT NULL,
  `f_add_no` varchar(20) NOT NULL,
  `f_add_street` varchar(20) NOT NULL,
  `f_add_city` varchar(20) NOT NULL,
  `f_tp_land` varchar(14) NOT NULL,
  `f_tp_mo` varchar(14) NOT NULL,
  `f_mail` varchar(40) NOT NULL,
  `f_web` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`con_id`, `f_name`, `f_reg_no`, `f_add_no`, `f_add_street`, `f_add_city`, `f_tp_land`, `f_tp_mo`, `f_mail`, `f_web`) VALUES
('ID', 'The Lean Six Sigma Company \r\nCo.Reg.No: PV00221161\r\n5, First cross street, Pagoda, Nugegoda\r\nTel:           +94 112199954	\r\nMobile:    +94 777281347\r\nEmail:       info@theleansixsigmacompany.Asia   Website:  www.theleansixsigmacompany.Asia\r\n                                                                                                                                   ', 'PV00169713', '226', 'Nawalapitiya road', 'Ginigathena', '0512242753', '+94776578578', 'kavirajhh@yahoo.com', 'wwwheezi.net  ');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_send`
--

CREATE TABLE `invoice_send` (
  `idInvoice` int(11) NOT NULL,
  `Date` timestamp NULL DEFAULT NULL,
  `StdEmail` varchar(45) DEFAULT NULL,
  `StdName` varchar(45) DEFAULT NULL,
  `StdAdd` varchar(45) DEFAULT NULL,
  `CoursePrice` int(11) NOT NULL,
  `Discount` int(11) DEFAULT NULL,
  `idCourse` varchar(45) DEFAULT NULL,
  `SenderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `countrycode` varchar(4) NOT NULL,
  `share` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`countrycode`, `share`) VALUES
('BD', 10),
('IN', 25),
('ID', 10),
('TH', 25),
('LK', 25);

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `idStudent` int(11) NOT NULL,
  `FName` varchar(45) DEFAULT NULL,
  `LName` varchar(45) DEFAULT NULL,
  `Country` varchar(45) DEFAULT NULL,
  `Tp` int(11) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `organizaton` varchar(20) NOT NULL,
  `position` varchar(10) NOT NULL,
  `contact_through` varchar(10) NOT NULL,
  `Courseid` varchar(45) DEFAULT NULL,
  `CourseFee` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `SenderId` int(11) NOT NULL,
  `date` date NOT NULL,
  `delstatus` int(11) NOT NULL,
  `invoiceno` varchar(15) NOT NULL,
  `rate` int(11) NOT NULL,
  `no_part` int(11) NOT NULL DEFAULT 1,
  `comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`idStudent`, `FName`, `LName`, `Country`, `Tp`, `Email`, `organizaton`, `position`, `contact_through`, `Courseid`, `CourseFee`, `discount`, `SenderId`, `date`, `delstatus`, `invoiceno`, `rate`, `no_part`, `comments`) VALUES
(82, 'Hemal', 'Kaviraj', 'ID', 776578578, 'kavirajhh@yahoo.com', 'iwave', '', 'Internet', '21', 250000, 0, 20, '2021-08-21', 0, 'ID20210801', 150, 2, ''),
(83, 'Hemal', 'Kaviraj', 'ID', 776578578, 'kavirajhh@yahoo.com', 'iwave', '', 'Internet', '21', 250000, 10, 20, '2021-08-21', 0, 'ID20210802', 150, 1, ''),
(84, 'Hemal', 'Kaviraj', 'TH', 776578578, 'kavirajhh@yahoo.com', 'iwave', '', 'Internet', '22', 190000, 10, 18, '2021-08-21', 0, 'TH20210801', 39, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration2`
--

CREATE TABLE `student_registration2` (
  `idStudent` int(11) NOT NULL,
  `FName` varchar(45) DEFAULT NULL,
  `LName` varchar(45) DEFAULT NULL,
  `Country` varchar(45) DEFAULT NULL,
  `Tp` int(11) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `organizaton` varchar(20) NOT NULL,
  `position` varchar(10) NOT NULL,
  `contact_through` varchar(10) NOT NULL,
  `Courseid` varchar(45) DEFAULT NULL,
  `CourseFee` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `SenderId` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `delstatus` int(11) NOT NULL,
  `invoiceno` varchar(15) NOT NULL,
  `rate` int(11) NOT NULL,
  `no_part` int(11) NOT NULL DEFAULT 1,
  `comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_registration2`
--

INSERT INTO `student_registration2` (`idStudent`, `FName`, `LName`, `Country`, `Tp`, `Email`, `organizaton`, `position`, `contact_through`, `Courseid`, `CourseFee`, `discount`, `SenderId`, `date`, `delstatus`, `invoiceno`, `rate`, `no_part`, `comments`) VALUES
(153, 'Hemal', 'Kaviraj', 'ID', 776578578, 'kavirajhh@yahoo.com', 'iwave', '', 'Internet', '21', 250000, 0, 20, '2021-08-21', 0, 'ID20210801', 150, 1, ''),
(154, 'Hemal', 'Kaviraj', 'ID', 776578578, 'kavirajhh@yahoo.com', 'iwave', '', 'Internet', '21', 250000, 0, 20, '2021-08-21', 0, 'ID20210802', 150, 1, ''),
(155, 'Hemal', 'Kaviraj', 'TH', 776578578, 'kavirajhh@yahoo.com', 'iwave', '', 'Internet', '22', 190000, 0, 18, '2021-08-21', 0, 'TH20210801', 39, 1, ''),
(156, 'Hemal', 'Kaviraj', 'ID', 776578578, 'kavirajhh@yahoo.com', 'iwave', '', 'Internet', '21', 250000, 0, 20, '2021-08-01', 0, 'ID20210803', 150, 1, ''),
(157, 'Hemal', 'Kaviraj', 'ID', 776578578, 'kavirajhh@yahoo.com', 'iwave', '', 'Internet', '21', 250000, 0, 20, '2021-08-26', 0, 'ID20210804', 150, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `pw` varchar(20) DEFAULT NULL,
  `FName` varchar(30) DEFAULT NULL,
  `LName` varchar(20) DEFAULT NULL,
  `ustatus` varchar(45) DEFAULT NULL,
  `TP` varchar(14) DEFAULT NULL,
  `countrycode` varchar(8) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `privilages` varchar(20) NOT NULL,
  `delstatus` int(11) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `branch` varchar(25) NOT NULL,
  `bankAccountNumber` varchar(20) NOT NULL,
  `accname` varchar(45) NOT NULL,
  `ifsc` text NOT NULL,
  `swift` varchar(15) NOT NULL,
  `des` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `Username`, `pw`, `FName`, `LName`, `ustatus`, `TP`, `countrycode`, `email`, `privilages`, `delstatus`, `bank`, `branch`, `bankAccountNumber`, `accname`, `ifsc`, `swift`, `des`) VALUES
(14, 'India', '1234', 'India', 'Manager', '2', '1245789658', 'IN', 'India@gmail.com', '', 0, 'India Bank', 'New del', '11111', 'six sigma india', '', '', ''),
(17, 'admin', '123', 'admin', 'heezinet', '1', '07765785778', 'HZ', 'hemal@heezi.net', 'abcdefgh', 0, 'Sampath Bank', 'Pitakotte', '2147483647', 'The Lean Six Sigma Company (Pvt) ltd', '', '', 'Managing Partner'),
(18, 'user', '123', 'user', '123', '2', '123', 'TH', 'admin@heezi.net', '', 0, 'Sampath Bank', 'Pitakotte', '11111', 'The Lean Six Sigma Company (Pvt) ltd', '', '', 'MMX2'),
(19, 'Thisumi', 'Thihasna', 'Thisumi', 'Thihasna', '2', '776578578', 'ID', 'info@heezi.net', '', 0, 'BOC', 'Kandy', '10210322150', 'heeziNet', 'hdfc0000636', '1233 ', 'Managing Partner'),
(20, 'Hemal', '123', 'Hemal', 'Hashantha', '2', '512242753', 'ID', 'info@heezi.net', '', 0, 'BOC', 'Kandy', '10210322150', 'heeziNet', 'hdfc0000636', '1233 ', 'Developer'),
(21, 'Hemal123', 'Kaviraj', 'Hemal123', 'Kaviraj', '2', '0776578578', 'LK', 'kavirajhh@yahoo.com', '', 0, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `userstatus`
--

CREATE TABLE `userstatus` (
  `iduserstatus` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `privilages` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userstatus`
--

INSERT INTO `userstatus` (`iduserstatus`, `type`, `privilages`) VALUES
(1, 'Admin', 'acdefghijklmnopqrz'),
(2, 'Country Manager', 'abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catogary`
--
ALTER TABLE `catogary`
  ADD PRIMARY KEY (`idCatogary`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countrycode`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`idCourse`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `invoice_send`
--
ALTER TABLE `invoice_send`
  ADD PRIMARY KEY (`idInvoice`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`idStudent`);

--
-- Indexes for table `student_registration2`
--
ALTER TABLE `student_registration2`
  ADD PRIMARY KEY (`idStudent`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- Indexes for table `userstatus`
--
ALTER TABLE `userstatus`
  ADD PRIMARY KEY (`iduserstatus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catogary`
--
ALTER TABLE `catogary`
  MODIFY `idCatogary` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `idCourse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `invoice_send`
--
ALTER TABLE `invoice_send`
  MODIFY `idInvoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `idStudent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `student_registration2`
--
ALTER TABLE `student_registration2`
  MODIFY `idStudent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `userstatus`
--
ALTER TABLE `userstatus`
  MODIFY `iduserstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
