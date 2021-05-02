-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 06:58 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_groups`
--

CREATE TABLE `account_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `groupName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_groups`
--

INSERT INTO `account_groups` (`id`, `groupName`, `status`, `position`, `createBy`, `updateBy`, `deleteBy`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Assets', 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(2, 'Liabilities', 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(3, 'Income', 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(4, 'Production', 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(5, 'Expences', 0, 0, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_setups`
--

CREATE TABLE `account_setups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `placementType` int(11) NOT NULL,
  `headName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteStatus` tinyint(1) DEFAULT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_setups`
--

INSERT INTO `account_setups` (`id`, `placementType`, `headName`, `headCode`, `status`, `deleteStatus`, `createBy`, `updateBy`, `deleteBy`, `created_at`, `updated_at`, `delete_at`) VALUES
(4, 15, '45', '1020101', 1, NULL, 1, NULL, NULL, '2021-04-30 22:10:26', NULL, NULL),
(5, 15, '46', '2020201', 1, NULL, 1, NULL, NULL, '2021-04-30 22:11:22', NULL, NULL),
(6, 15, '47', '1020101', 1, NULL, 1, NULL, NULL, '2021-04-30 23:19:43', NULL, NULL),
(7, 15, '48', '10202', 1, NULL, 1, NULL, NULL, '2021-04-30 23:47:16', NULL, NULL),
(8, 15, '49', '1020102', 1, NULL, 1, NULL, NULL, '2021-05-01 00:15:33', NULL, NULL),
(9, 15, '50', '2020201', 1, NULL, 1, NULL, NULL, '2021-05-01 00:16:02', NULL, NULL),
(10, 15, '51', '1020102', 1, NULL, 1, NULL, NULL, '2021-05-01 00:18:40', NULL, NULL),
(11, 15, '52', '10202', 1, NULL, 1, NULL, NULL, '2021-05-01 00:19:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_setup_head_lists`
--

CREATE TABLE `account_setup_head_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `placementId` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteStatus` tinyint(1) DEFAULT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_setup_head_lists`
--

INSERT INTO `account_setup_head_lists` (`id`, `placementId`, `name`, `status`, `deleteStatus`, `createBy`, `updateBy`, `deleteBy`, `created_at`, `updated_at`, `delete_at`) VALUES
(1, 1, 'Local Purchase', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(2, 1, 'Carriage Inward', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(3, 1, 'Others Purchase Cost', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(4, 1, 'Damage & Warranty', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(5, 1, 'Liability Others Purchase Cost', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(6, 1, 'Prov-Damage & Warranty', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(7, 1, 'Purchase Discount', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(10, 2, 'Local Inventory', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(11, 2, 'Opening Account', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(12, 3, 'Opening Account', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(13, 4, 'Labor Cost', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(14, 4, 'Transport Cost', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(15, 4, 'Discount', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(16, 4, 'Cash Account', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(17, 5, 'Accounts Payable Supplier', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(18, 6, 'Accounts Payable Saller Hub', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(19, 7, 'Accounts Receivable General Customer', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(23, 7, 'Accounts Receivable Marchent', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(25, 8, 'cash at bank', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(26, 9, 'From Bank', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(27, 9, 'From Other', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(28, 10, 'Bank', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(29, 10, 'Plot', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(30, 10, 'Flat', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(31, 10, 'Land', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(32, 11, 'Deposit Bank', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(33, 11, 'Deposit Other', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(34, 12, 'Pre-payment Office', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(35, 12, 'Pre-payment Other', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(36, 13, 'Advance Salary', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(37, 13, 'Advance Other', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(38, 14, 'Transportation & Carring Expances', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(39, 14, 'Cost of Carriage Inward', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(40, 14, 'Travelling Expenses', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(41, 14, 'Liability Carriage Inward', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(42, 14, 'Liability Others Purchase Cost', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(43, 14, 'Prov-Damage & Warranty', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(44, 14, 'Non Operating Income', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(45, 15, 'cash payment voucher dr', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(46, 15, 'cash payment voucher cr', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(47, 15, 'cash receive voucher dr', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(48, 15, 'cash receive voucher cr', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(49, 15, 'bank payment voucher dr', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(50, 15, 'bank payment voucher cr', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(51, 15, 'bank receive voucher dr', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(52, 15, 'bank receive voucher cr', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(53, 16, 'Local Inventroy', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(54, 16, 'Import  Inventroy', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(55, 16, 'Local Purchase', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(56, 16, 'Import Purchase', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(57, 16, 'Local Cost of good sold', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(58, 16, 'Import Cost of good sold', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(59, 16, 'Local Sale', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(60, 16, 'Import Sale', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(61, 17, 'Sales Return', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(62, 17, 'Purchase Return', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(63, 18, 'Company', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(64, 18, 'Personal', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(65, 19, 'Tax', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(66, 19, 'Vat', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(67, 19, 'Expens', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(68, 20, 'Local Agent Deposit', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(69, 20, 'Foreign Agent Deposit', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(70, 20, 'Liabilitie Commission RSC', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(71, 20, 'Liabilitie Commission NSC', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(72, 20, 'Liabilitie Commission Division', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(73, 20, 'Liabilitie Commission District', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(74, 20, 'Liabilitie Commission Thana', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(75, 20, 'Liabilitie Commission SC', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(76, 20, 'Liabilitie Commission ASC', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(77, 20, 'Liabilitie Commission Affiliate', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(80, 1, 'Import Purchase', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(81, 1, 'Inventory Finish Goods Local', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(82, 1, 'Inventory Finish Goods Import', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(83, 1, 'Liability Carriage Inward', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(84, 4, 'Cost of good sold Local', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(85, 4, 'Cost of good sold Import', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(86, 4, 'Inventory Finish Goods Local', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(87, 4, 'Inventory Finish Goods Import', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(88, 4, 'Sales Product Local', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(89, 4, 'Sales Product Import', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(90, 21, 'Cash Account', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(91, 4, 'Inter Branch stock account', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL),
(92, 22, 'Accounts Payable Vendors', 1, NULL, 1, NULL, NULL, '2021-04-29 06:29:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_setup_placement_lists`
--

CREATE TABLE `account_setup_placement_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteStatus` tinyint(1) DEFAULT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_setup_placement_lists`
--

INSERT INTO `account_setup_placement_lists` (`id`, `name`, `status`, `deleteStatus`, `createBy`, `updateBy`, `deleteBy`, `created_at`, `updated_at`, `delete_at`) VALUES
(1, 'Purchase Invoice', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(2, 'Opening Inventory', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(3, 'Opening Voucher', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(4, 'Sale Invoice', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(5, 'Supplier Registration', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(6, 'Salerhub Registration', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(7, 'Customer Registration', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(8, 'Bank Book', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(9, 'Loan Payable Register', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(10, 'Investment Register', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(11, 'Deposit & Security Register', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(12, 'Prepayment Register', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(13, 'Advance Payment Register', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(14, 'Product Update', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(15, 'Voucher Entry', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(16, 'Add Category', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(17, 'Product Return', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(18, 'Loans Receivable Register', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(19, 'Vat,Tax & Expans', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(20, 'Agent Deposit Register', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(21, 'Branch Setup', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL),
(22, 'Vendor Registration', 1, NULL, 1, NULL, NULL, '2021-04-29 06:31:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `add_product_supplier_entries`
--

CREATE TABLE `add_product_supplier_entries` (
  `productSupplierId` bigint(20) UNSIGNED NOT NULL,
  `productSupplierName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productSupplierCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productSupplierPhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productSupplierHotLine` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productSupplierMail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productSupplierFb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productSupplierWeb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productSupplierImo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productSupplierAddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopId` int(11) DEFAULT NULL,
  `shopTypeId` int(11) DEFAULT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_product_supplier_entries`
--

INSERT INTO `add_product_supplier_entries` (`productSupplierId`, `productSupplierName`, `productSupplierCode`, `productSupplierPhone`, `productSupplierHotLine`, `productSupplierMail`, `productSupplierFb`, `productSupplierWeb`, `productSupplierImo`, `productSupplierAddress`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'saiful', '1', '0170101001', '12222222', 'saiful@gmail.com', 'fsf', 'fsdfsd', '01910101010', 'Barisal', 1, 1, 3, 3, '2020-03-26 04:11:30', '2020-03-30 05:02:23'),
(2, 'Mamun', '2', '01712121212', '111111111', 'mamun@gmail.com', 'aaaaa', 'aaaaaa', '0190000010', 'Dhaka', 1, 1, 3, 3, '2020-03-26 04:11:30', '2020-03-30 05:03:36'),
(3, 'Rana', '3', '0171212121', '33333333', 'rana@gmail.com', 'sssssssssss', 'sssssssssss', '01900099999', 'Barisal', 1, 1, 3, 3, '2020-03-26 04:11:30', '2020-03-30 05:02:31'),
(4, 'Manun2', '1', '0170000000', 'aaaaaaaaa', 'sdss@gmail.com', 'sssssssssss', 'fsdfsd', '535', 'sadf', 1, 1, 5, NULL, '2020-03-26 04:11:30', NULL),
(5, 'Miraj', '4', '01712121222', '34444444', 'sdddrrr@gmail.com', 'fsf', 'fsdfsd', '017000000', 'Pabna', 1, 1, 3, 3, '2020-03-26 04:11:30', '2020-03-30 05:02:49'),
(6, 'Imran', '5', '0170000012', '12222222', 'imran@gmail.com', 'imran', 'imran', 'imran', 'imran', 1, 1, 3, NULL, '2020-07-13 07:04:40', NULL),
(7, 'Kawsir', '6', '0170034541', '2562', 'ransdfdsa@gmail.com', 'ransdfdsa', 'ransdfdsa', 'ransdfdsa', 'ransdfdsa', 1, 1, 3, 3, '2020-07-13 09:12:39', '2021-04-18 07:14:09'),
(8, 'Md Nazmul Huda', '1', '01812454358', '01812454358', 'info@gmail.com', 'fb.com/nazmulfci', 'doofaz.it.com', '01812454358', 'Dhaka', 2, 4, 14, NULL, '2021-03-08 05:13:04', '2021-03-08 05:13:05'),
(10, 'Arif', '1', '0181245435833', '01831710927', 'doofazinfo@gmail.com', 'fb.com/doofazit', 'www.doofazit.com', '01812454358', 'H#99, Sher shah suri road, townhall, mohammadpur, Dhaka-1207', 3, 4, 3, 3, '2021-04-18 08:25:22', '2021-04-24 15:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `adminlicence_types`
--

CREATE TABLE `adminlicence_types` (
  `licenceTypesId` bigint(20) UNSIGNED NOT NULL,
  `licenceTypeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `licenceTypeStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminlicence_types`
--

INSERT INTO `adminlicence_types` (`licenceTypesId`, `licenceTypeName`, `licenceTypeStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'R-1235', 1, 1, 1, '2020-03-26 15:35:01', '2020-06-24 09:24:19'),
(2, 'R-3456', 1, 1, 1, '2020-03-26 15:35:05', '2020-06-24 09:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` int(11) NOT NULL DEFAULT 3,
  `shopName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopSirialId` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastLoginIp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refferTypeId` int(11) NOT NULL,
  `refferUserId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `shopLicenceTypeId` int(11) NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `haveBranch` int(11) NOT NULL,
  `totalBranch` int(11) NOT NULL,
  `currencyId` int(11) NOT NULL,
  `paymentStatus` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL,
  `deleteStatus` tinyint(1) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role`, `shopName`, `shopSirialId`, `email`, `password`, `pass`, `lastLoginIp`, `refferTypeId`, `refferUserId`, `shopTypeId`, `shopLicenceTypeId`, `website`, `facebook`, `youtube`, `haveBranch`, `totalBranch`, `currencyId`, `paymentStatus`, `status`, `deleteStatus`, `createBy`, `updateBy`, `deleteBy`, `created_at`, `updated_at`, `delete_at`) VALUES
(3, 3, 'dealtaj', 1011, 'dealtaj@gmail.com', '$2y$10$0.dsuKtKA6TfX6.0Kzf3KOEXtXLC98FvYyOAcKxzvIRmtrqSVIGse', '123', '1', 0, 2, 4, 0, NULL, NULL, NULL, 1, 2, 6, 2, 1, 0, 1, NULL, NULL, '2021-04-14 16:29:39', '2021-04-24 15:33:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_bussiness_types`
--

CREATE TABLE `admin_bussiness_types` (
  `bussinessTypeId` bigint(20) UNSIGNED NOT NULL,
  `bussinessTypeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bussinessTypeStatus` int(11) NOT NULL,
  `createBy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updateBy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_bussiness_types`
--

INSERT INTO `admin_bussiness_types` (`bussinessTypeId`, `bussinessTypeName`, `bussinessTypeStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'HP', 1, '1', NULL, '2020-06-24 10:29:46', NULL),
(2, 'Asus', 1, '1', NULL, '2020-06-24 10:30:05', NULL),
(4, 'Dell', 1, '1', NULL, '2020-06-24 10:34:03', '2020-06-24 10:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `admin_entries`
--

CREATE TABLE `admin_entries` (
  `adminId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_entries`
--

INSERT INTO `admin_entries` (`adminId`, `name`, `phone`, `email`, `userId`, `password`, `address`, `role`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'Shohel Rana', '0170000000', 'shohelrana@gmail.com', 1, '123456', 'Pabna', 2, 1, NULL, '2020-06-24 07:38:15', NULL),
(2, 'Shohel Rana 2', '0170000002', 'shohelranaweb@gmail.com', 2, '12345', 'Dhaka', 2, 1, 1, '2021-03-16 21:15:31', '2021-03-16 21:15:31'),
(3, 'arif', '01882061784', 'arif@gmail.com', 3, '12345678', 'sdfdf', 2, 1, NULL, '2021-03-16 21:11:16', NULL),
(4, 'do', '12', 'do@gmail.com', 4, '12345678', 'df', 2, 1, NULL, '2021-03-24 08:32:24', NULL),
(5, 'Nazmul', '1632077744', 'nazmul@gmail.com', 5, '12345678', 'Elida Ho', 2, 1, NULL, '2021-03-24 09:05:35', NULL),
(6, 'saiful', '01', 'saiful@gmail.com', 6, '12345678', 'zddf', 2, 1, NULL, '2021-03-24 09:06:02', NULL),
(7, 'Acc Saiful', '01812454358', 'acc@gmail.com', 7, '11111111', 'Nikunja, khilkhet\nHouse#10,Road#7/D,Dhaka', 2, 1, 35, '2021-04-11 15:18:58', '2021-04-11 15:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `admin_grades`
--

CREATE TABLE `admin_grades` (
  `gradeId` bigint(20) UNSIGNED NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gradeStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_grades`
--

INSERT INTO `admin_grades` (`gradeId`, `grade`, `gradeStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'B', '1', 1, 1, '2020-04-15 08:47:03', '2020-06-28 12:09:56'),
(3, 'A', '1', 1, 1, '2020-04-15 10:16:47', '2020-04-15 14:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `admin_holiday_setups`
--

CREATE TABLE `admin_holiday_setups` (
  `holidaySetupId` bigint(20) UNSIGNED NOT NULL,
  `holidayTypeId` int(11) NOT NULL,
  `holidayStartDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holidayEndDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holidaySetupStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_holiday_setups`
--

INSERT INTO `admin_holiday_setups` (`holidaySetupId`, `holidayTypeId`, `holidayStartDate`, `holidayEndDate`, `holidaySetupStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(3, 2, '2020-04-06', '2020-04-09', 1, 1, NULL, '2020-04-06 10:17:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_holiday_types`
--

CREATE TABLE `admin_holiday_types` (
  `holidayTypeId` bigint(20) UNSIGNED NOT NULL,
  `holidayTypeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holidayTypeStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_holiday_types`
--

INSERT INTO `admin_holiday_types` (`holidayTypeId`, `holidayTypeName`, `holidayTypeStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'Friday', 1, 1, 1, '2020-04-06 09:42:10', '2020-04-06 09:48:31'),
(2, 'Sunday', 1, 1, 1, '2020-04-06 09:42:23', '2020-04-06 09:56:14'),
(3, 'Monday', 1, 1, 1, '2020-04-06 09:56:52', '2020-06-24 09:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menus`
--

CREATE TABLE `admin_menus` (
  `adminMenuId` bigint(20) UNSIGNED NOT NULL,
  `adminMenuTitleId` int(11) NOT NULL,
  `adminMenuName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminMenuPosition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminMenuUrl` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminMenuIcon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminMenuStatus` int(11) NOT NULL,
  `adminSubMenuStatus` tinyint(1) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menus`
--

INSERT INTO `admin_menus` (`adminMenuId`, `adminMenuTitleId`, `adminMenuName`, `adminMenuPosition`, `adminMenuUrl`, `adminMenuIcon`, `adminMenuStatus`, `adminSubMenuStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, 'Product Sales', '1', 'product@sales', 'pe-7s-paint-bucket', 1, 0, 1, NULL, '2020-02-11 06:36:13', '2020-02-12 04:58:09'),
(2, 1, 'Product Report', '4', NULL, 'pe-7s-piggy', 1, 1, 1, 1, '2020-02-11 06:37:14', '2021-03-10 07:44:42'),
(3, 1, 'Sales Report', '5', NULL, 'pe-7s-paint-bucket', 1, 1, 1, NULL, '2020-02-11 06:37:51', '2020-02-11 06:37:51'),
(4, 2, 'Purchase', '1', NULL, NULL, 1, 1, 1, NULL, '2020-02-11 06:38:44', '2020-02-11 06:38:44'),
(5, 2, 'Purchase Report', '2', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:39:28', '2020-02-11 06:39:28'),
(6, 3, 'Inventory', '1', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:40:01', '2020-02-11 06:40:01'),
(7, 3, 'Inventory Report', '2', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:40:27', '2020-02-11 06:40:27'),
(8, 3, 'Inventory Shortage', '3', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:40:52', '2020-02-11 06:40:52'),
(9, 4, 'Account', '1', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:42:09', '2020-02-11 06:42:09'),
(10, 5, 'HR Management', '1', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:42:43', '2020-02-11 06:42:43'),
(11, 5, 'HR Report', '2', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:43:05', '2020-02-11 06:43:05'),
(12, 6, 'Asset', '1', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:43:21', '2020-02-11 06:43:21'),
(14, 7, 'Admin Setup', '1', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:44:00', '2020-02-11 06:44:00'),
(15, 7, 'Mother Admin', '2', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:44:18', '2020-02-11 06:44:18'),
(16, 7, 'Support Admin', '3', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:44:38', '2020-02-11 06:44:38'),
(17, 7, 'Billing Admin', '4', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:45:03', '2020-02-11 06:45:03'),
(18, 7, 'Sub Admin', '5', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:45:21', '2020-02-11 06:45:21'),
(19, 7, 'Suspentd & Unsuspend', '6', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:46:04', '2020-02-11 06:46:04'),
(20, 7, 'Marketing Admin', '7', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:46:40', '2020-02-11 06:46:40'),
(21, 7, 'Saler Man', '8', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:47:04', '2020-02-11 06:47:04'),
(22, 7, 'Delivery Section', '9', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:47:23', '2020-02-11 06:47:23'),
(23, 7, 'IP Query', '10', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:47:51', '2020-02-11 06:47:51'),
(24, 7, 'Information Edit Admin', '11', NULL, 'fa fa-user', 1, 1, 1, NULL, '2020-02-11 06:48:22', '2020-02-12 06:30:09'),
(26, 9, 'Shop Admin Setting', '1', NULL, NULL, 1, 1, 1, NULL, '2020-03-05 09:05:42', '2020-03-05 09:05:42'),
(27, 9, 'Product Setup', '2', NULL, NULL, 1, 1, 1, 1, '2020-03-05 09:06:36', '2020-03-05 11:41:20'),
(29, 9, 'Shop Report', '3', NULL, NULL, 1, 1, 6, 1, '2020-03-14 02:58:31', '2020-03-14 04:13:54'),
(30, 6, 'Asset Report', '3', NULL, NULL, 1, 1, 1, NULL, '2020-04-05 06:00:46', '2020-04-05 06:00:46'),
(36, 1, 'Product Price Entry', '2', 'productprice@entry', 'pe-7s-mouse', 1, 0, 1, 1, '2020-07-15 04:50:49', '2020-07-15 04:55:19'),
(37, 1, 'Product Discount Entry', '3', 'productdiscount@entry', 'pe-7s-helm', 1, 0, 1, 1, '2020-07-15 04:51:44', '2021-03-10 07:48:52'),
(38, 4, 'Accounting Report', '2', '#', NULL, 1, 1, 1, NULL, '2020-10-16 04:03:27', '2020-10-16 04:03:27'),
(39, 10, 'Warranty Accept', '1', '#', NULL, 1, 0, 1, NULL, '2020-10-18 09:52:00', '2020-10-18 09:52:00'),
(40, 14, 'New Request', '1', '@', 'ff', 1, 0, 1, NULL, '2021-03-16 21:13:30', '2021-03-16 21:13:30'),
(41, 15, 'Shop Registration', '1', 'shopRegistration', NULL, 1, 0, 1, 1, '2021-03-24 09:08:28', '2021-03-25 04:20:58'),
(42, 15, 'Report', '2', '#', 'fa-user', 1, 1, 1, NULL, '2021-03-24 09:09:04', '2021-03-24 09:09:04'),
(43, 17, 'chart Of Accounts', '1', 'chartOfAccounts', 'metismenu-icon pe-7s-paint-bucket  bg-danger text-white rounded', 1, 0, 1, NULL, '2021-04-25 06:09:57', '2021-04-25 06:09:57'),
(44, 17, 'Account Setup', '2', 'accountSetup', 'fa-user', 1, 0, 1, NULL, '2021-04-29 06:44:02', '2021-04-29 06:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_permissions`
--

CREATE TABLE `admin_menu_permissions` (
  `adminMenuPermissionId` bigint(20) UNSIGNED NOT NULL,
  `adminId` int(11) NOT NULL,
  `adminType` int(11) NOT NULL,
  `menuTitleId` int(11) NOT NULL,
  `menuId` int(11) NOT NULL,
  `subMenuId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullAccess` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viewAccess` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addAccess` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editAccess` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissionStatus` tinyint(1) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu_permissions`
--

INSERT INTO `admin_menu_permissions` (`adminMenuPermissionId`, `adminId`, `adminType`, `menuTitleId`, `menuId`, `subMenuId`, `fullAccess`, `viewAccess`, `addAccess`, `editAccess`, `permissionStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 2, '1', NULL, NULL, '1', NULL, 1, 1, NULL, '2020-03-14 04:16:00', '2020-03-14 04:16:00'),
(2, 1, 2, 1, 2, '2', NULL, NULL, '1', NULL, 1, 1, NULL, '2020-03-14 04:16:00', '2020-03-14 04:16:00'),
(3, 1, 2, 1, 2, '3', NULL, NULL, NULL, '1', 1, 1, NULL, '2020-03-14 04:16:00', '2020-03-14 04:16:00'),
(4, 1, 2, 1, 2, '4', NULL, NULL, NULL, '1', 1, 1, NULL, '2020-03-14 04:16:00', '2020-03-14 04:16:00'),
(5, 1, 2, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2020-03-14 04:16:00', '2020-03-14 04:16:00'),
(6, 3, 8, 14, 40, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2021-03-16 21:16:52', '2021-03-16 21:16:52'),
(7, 7, 15, 15, 42, '249', '1', NULL, NULL, NULL, 1, 1, NULL, '2021-04-11 15:22:35', '2021-04-11 15:22:35'),
(8, 7, 15, 15, 42, '249', NULL, '1', NULL, NULL, 1, 1, NULL, '2021-04-11 15:22:35', '2021-04-11 15:22:35'),
(9, 7, 15, 15, 42, '249', NULL, NULL, '1', NULL, 1, 1, NULL, '2021-04-11 15:22:35', '2021-04-11 15:22:35'),
(10, 7, 15, 15, 42, '249', NULL, NULL, NULL, '1', 1, 1, NULL, '2021-04-11 15:22:35', '2021-04-11 15:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_title_name1s`
--

CREATE TABLE `admin_menu_title_name1s` (
  `adminMenuTitleId` bigint(20) UNSIGNED NOT NULL,
  `adminMenuTitleName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminMenuTitlePosition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminMenuTitleIcon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminMenuTitleStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminMenuTitlePermission` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_title_names`
--

CREATE TABLE `admin_menu_title_names` (
  `adminMenuTitleId` bigint(20) UNSIGNED NOT NULL,
  `adminMenuTitleName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminMenuTitlePosition` int(11) NOT NULL,
  `adminMenuTitleIcon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminMenuTitleStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminMenuTitlePermission` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu_title_names`
--

INSERT INTO `admin_menu_title_names` (`adminMenuTitleId`, `adminMenuTitleName`, `adminMenuTitlePosition`, `adminMenuTitleIcon`, `adminMenuTitleStatus`, `adminMenuTitlePermission`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'SALES', 1, NULL, '1', 1, 1, 1, '2020-02-11 00:33:15', '2021-03-15 13:14:05'),
(2, 'PURCHASE', 2, NULL, '1', 1, 1, 1, '2020-02-11 00:33:37', '2020-03-18 00:11:38'),
(3, 'INVENTORY', 3, NULL, '1', 1, 1, 1, '2020-02-11 00:33:51', '2020-03-13 22:18:23'),
(4, 'ACCOUNTING', 4, NULL, '1', 1, 1, 1, '2020-02-11 00:34:14', '2020-03-18 00:11:43'),
(5, 'HR MANAGEMENT', 5, NULL, '1', 1, 1, 1, '2020-02-11 00:34:34', '2020-03-18 00:11:29'),
(6, 'ASSET', 6, NULL, '1', 1, 1, 1, '2020-02-11 00:34:58', '2020-03-18 00:11:34'),
(7, 'ADMIN', 7, NULL, '0', 0, 1, 1, '2020-02-11 00:35:11', '2021-03-10 05:36:07'),
(9, 'SHOP SETTINGS', 0, NULL, '1', 1, 1, 1, '2020-03-05 03:04:08', '2021-04-05 18:54:38'),
(10, 'Warranty', 9, NULL, '1', 1, 1, NULL, '2020-10-18 03:42:42', NULL),
(14, 'Verifiaction', 11, NULL, '1', 0, 1, 1, '2021-03-16 15:12:51', '2021-04-05 18:57:40'),
(15, 'Cashbook Sales Center', 12, NULL, '1', 0, 1, 1, '2021-03-24 03:07:44', '2021-04-05 18:57:37'),
(17, 'Accounting Setup', 13, 'metismenu-icon pe-7s-paint-bucket  bg-danger text-white rounded', '1', 1, 1, NULL, '2021-04-25 06:02:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_meta_key_descriptions`
--

CREATE TABLE `admin_meta_key_descriptions` (
  `metaKeyId` bigint(20) UNSIGNED NOT NULL,
  `metaKey` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metaDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `metaStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_meta_key_descriptions`
--

INSERT INTO `admin_meta_key_descriptions` (`metaKeyId`, `metaKey`, `metaDescription`, `metaStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, '1', 'Title', 1, 1, NULL, '2020-03-26 15:38:23', '2020-03-26 15:38:23'),
(2, '2', 'Title', 1, 1, NULL, '2020-03-26 15:38:32', '2020-03-26 15:38:32'),
(3, '3', 'Title', 1, 1, NULL, '2020-03-26 15:38:38', '2020-03-26 15:38:38'),
(4, '1', 'Title', 1, 1, 1, '2020-06-24 09:17:24', '2020-06-24 09:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `admin_name_of_degrees`
--

CREATE TABLE `admin_name_of_degrees` (
  `nameOfDegreeId` bigint(20) UNSIGNED NOT NULL,
  `nameOfDegree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degreeStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_name_of_degrees`
--

INSERT INTO `admin_name_of_degrees` (`nameOfDegreeId`, `nameOfDegree`, `degreeStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'Masters', '1', 1, 1, '2020-04-15 08:44:12', '2020-04-15 13:56:19'),
(3, 'Honears', '1', 1, 1, '2020-04-15 08:46:47', '2020-06-28 12:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `admin_name_of_institutes`
--

CREATE TABLE `admin_name_of_institutes` (
  `nameOfInstituteId` bigint(20) UNSIGNED NOT NULL,
  `nameOfInstitute` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instituteStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_name_of_institutes`
--

INSERT INTO `admin_name_of_institutes` (`nameOfInstituteId`, `nameOfInstitute`, `instituteStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(2, 'School2', '1', 1, 1, '2020-04-15 08:43:00', '2020-06-28 12:09:58'),
(5, 'School1', '1', 1, 1, '2020-04-15 08:52:53', '2020-04-15 12:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `admin_purchase_types`
--

CREATE TABLE `admin_purchase_types` (
  `purchaseTypeId` bigint(20) UNSIGNED NOT NULL,
  `purchaseTypeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchaseTypeStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_purchase_types`
--

INSERT INTO `admin_purchase_types` (`purchaseTypeId`, `purchaseTypeName`, `purchaseTypeStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(4, 'Export', 1, 1, NULL, '2020-03-22 04:47:03', '2020-03-22 04:47:03'),
(5, 'Import', 1, 1, 1, '2020-06-24 10:13:38', '2020-06-24 10:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `admin_setups`
--

CREATE TABLE `admin_setups` (
  `adminSetupId` bigint(20) UNSIGNED NOT NULL,
  `adminId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminTypeId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_setups`
--

INSERT INTO `admin_setups` (`adminSetupId`, `adminId`, `adminTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, '1', '2', 1, NULL, '2020-03-14 04:01:52', NULL),
(2, '3', '8', 1, NULL, '2021-03-16 21:16:28', NULL),
(3, '6', '14', 1, NULL, '2021-03-24 09:06:19', NULL),
(4, '5', '14', 1, NULL, '2021-03-24 09:06:24', NULL),
(5, '7', '15', 1, NULL, '2021-04-11 15:20:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_skill_grades`
--

CREATE TABLE `admin_skill_grades` (
  `skillGradeId` bigint(20) UNSIGNED NOT NULL,
  `skillGrade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skillGradeStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_skill_grades`
--

INSERT INTO `admin_skill_grades` (`skillGradeId`, `skillGrade`, `skillGradeStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(2, '70', '1', 1, 1, '2020-04-15 09:00:56', '2020-04-15 14:55:29'),
(3, '80', '1', 1, 1, '2020-04-15 10:16:30', '2020-06-28 12:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_sub_menus`
--

CREATE TABLE `admin_sub_menus` (
  `adminSubMenuId` bigint(20) UNSIGNED NOT NULL,
  `adminMenuId` int(11) NOT NULL,
  `adminSubMenuName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminSubMenuUrl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminSubMenuePosition` int(11) NOT NULL,
  `adminSubMenueStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_sub_menus`
--

INSERT INTO `admin_sub_menus` (`adminSubMenuId`, `adminMenuId`, `adminSubMenuName`, `adminSubMenuUrl`, `adminSubMenuePosition`, `adminSubMenueStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 2, 'Sales Product Price', 'salesproduct@price', 1, 1, 1, 1, '2020-02-11 00:50:31', '2020-07-18 23:34:20'),
(2, 2, 'Sales Product Discount Price', 'salesproduct@discountprice', 2, 1, 1, 1, '2020-02-11 00:53:10', '2020-07-18 23:35:47'),
(4, 2, 'Product Shortage', 'product@shortage', 4, 1, 1, NULL, '2020-02-11 00:54:07', '2020-02-11 00:54:07'),
(5, 2, 'Return product', 'return@product', 5, 1, 1, NULL, '2020-02-11 00:54:50', '2020-02-11 00:54:50'),
(6, 2, 'Damage Product', 'damage@product', 6, 1, 1, NULL, '2020-02-11 00:55:28', '2020-02-11 00:55:28'),
(7, 2, 'Date Expaired Product', 'dataexpaired@product', 7, 1, 1, NULL, '2020-02-11 00:56:03', '2020-02-11 00:56:03'),
(8, 2, 'Date Expaired Notification', 'dataexpaired@notification', 8, 1, 1, NULL, '2020-02-11 00:56:33', '2020-02-11 00:56:33'),
(9, 3, 'Today Cash Sales', 'todaycash@sales', 1, 1, 1, NULL, '2020-02-11 00:58:09', '2020-02-11 00:58:09'),
(10, 3, 'Today Due Sales', 'todaydue@sales', 2, 1, 1, NULL, '2020-02-11 00:58:53', '2020-02-11 00:58:53'),
(11, 3, 'Today Cash Receive', 'todaycash@receive', 3, 1, 1, NULL, '2020-02-11 01:00:08', '2020-02-11 01:00:08'),
(12, 3, 'Today Discount', 'today@discount', 4, 1, 1, NULL, '2020-02-11 01:00:46', '2020-02-11 01:00:46'),
(13, 3, 'Total Due', 'total@due', 5, 1, 1, NULL, '2020-02-11 01:01:45', '2020-02-11 01:01:45'),
(14, 3, 'Total Sales', 'total@sales', 6, 1, 1, NULL, '2020-02-11 01:02:23', '2020-02-11 01:02:23'),
(15, 3, 'Total Receive', 'total@receive', 7, 1, 1, NULL, '2020-02-11 01:03:00', '2020-02-11 01:03:00'),
(16, 3, 'Total Discount', 'total@discount', 8, 1, 1, NULL, '2020-02-11 01:03:30', '2020-02-11 01:03:30'),
(17, 3, 'Fixed Customer List', 'fixedcustomer@list', 9, 1, 1, NULL, '2020-02-11 01:04:06', '2020-02-11 01:04:06'),
(18, 3, 'Local Customer List', 'localcustomer@list', 10, 1, 1, NULL, '2020-02-11 01:06:20', '2020-02-11 01:06:20'),
(19, 3, 'Profit & Loss', 'profit@loss', 11, 1, 1, NULL, '2020-02-11 01:07:01', '2020-02-11 01:07:01'),
(20, 3, 'Sales & Discount', 'sale@discount', 12, 1, 1, NULL, '2020-02-11 01:07:26', '2020-02-11 01:07:26'),
(21, 3, 'Gift Item', 'gift@item', 13, 1, 1, NULL, '2020-02-11 01:12:01', '2020-02-11 01:12:01'),
(22, 3, 'Balance Sheet', 'balance@sheet', 14, 1, 1, NULL, '2020-02-11 01:12:46', '2020-02-11 01:12:46'),
(23, 3, 'Sales Vouchar', 'sale@vouchar', 15, 1, 1, NULL, '2020-02-11 01:13:18', '2020-02-11 01:13:18'),
(24, 3, 'Sales Retarn', 'sale@return', 16, 1, 1, NULL, '2020-02-11 01:13:44', '2020-02-11 01:13:44'),
(25, 3, 'Customer Statement', 'customer@statement', 17, 1, 1, NULL, '2020-02-11 01:14:18', '2020-02-11 01:14:18'),
(26, 4, 'Brand Entry', 'shopaddproduct@brand', 1, 1, 1, 1, '2020-02-11 01:15:17', '2021-03-14 11:30:13'),
(27, 4, 'Purchase Entry', 'purchase@entry', 2, 1, 1, NULL, '2020-02-11 01:15:50', '2020-02-11 01:15:50'),
(28, 4, 'Product Supplier Entry', 'productsupplier@entry', 4, 1, 1, 1, '2020-02-11 01:16:23', '2020-07-13 00:57:31'),
(29, 5, 'Product Supplier Report', 'productsupplier@report', 1, 1, 1, 1, '2020-02-11 01:17:01', '2020-07-13 00:56:10'),
(32, 5, 'Due Supplyer List', 'duesupplier@list', 4, 1, 1, NULL, '2020-02-11 02:24:19', '2020-02-11 02:24:19'),
(33, 5, 'Supplier Payment', 'supplier@payment', 5, 1, 1, NULL, '2020-02-11 02:24:53', '2020-02-11 02:24:53'),
(34, 5, 'Purchase Return', 'purchase@return', 6, 1, 1, NULL, '2020-02-11 02:25:34', '2020-02-11 02:25:34'),
(36, 5, 'Purchase Balance Sheet', 'purchasebalance@sheet', 8, 1, 1, NULL, '2020-02-11 02:28:21', '2020-02-11 02:28:21'),
(39, 5, 'Purchase Invoice Report', 'purchaseinvoice@report', 11, 1, 1, 1, '2020-02-11 02:30:08', '2020-07-13 01:13:48'),
(40, 6, 'Category Entry', 'add@category', 1, 1, 1, 1, '2020-02-11 02:31:33', '2020-03-30 04:32:11'),
(45, 6, 'Product Name Entry', 'productname@entry', 6, 1, 1, 1, '2020-02-11 02:34:19', '2020-03-21 06:15:51'),
(46, 6, 'QR Code Entry', 'qrcode@entry', 7, 1, 1, NULL, '2020-02-11 02:35:32', '2020-02-11 02:35:32'),
(47, 7, 'Stock Summary Report', 'stocksummary@report', 1, 1, 1, 1, '2020-02-11 02:36:28', '2020-07-19 00:03:50'),
(49, 7, 'Stock Shortage Report', 'stockshortage@report', 3, 1, 1, 1, '2020-02-11 02:42:25', '2020-07-19 01:26:56'),
(50, 7, 'Category Report', 'category@report', 4, 1, 1, NULL, '2020-02-11 02:43:33', '2020-02-11 02:43:33'),
(51, 8, 'Brand Wise Shortage', 'brandwise@shortage', 1, 1, 1, NULL, '2020-02-11 02:45:43', '2020-02-11 02:45:43'),
(55, 8, 'Supplier Wise Shortage', 'supplierwise@shortage', 5, 1, 1, NULL, '2020-02-11 02:48:27', '2020-02-11 02:48:27'),
(56, 9, 'Voucher Entry', 'voucherEntry', 1, 1, 1, 1, '2020-02-11 02:50:28', '2021-04-27 13:53:14'),
(57, 9, 'Bank Statement', 'bank@statement', 2, 1, 1, NULL, '2020-02-11 02:50:54', '2020-02-11 02:50:54'),
(58, 9, 'Income Summary', 'income@summary', 3, 1, 1, NULL, '2020-02-11 02:51:24', '2020-02-11 02:51:24'),
(59, 9, 'Expense Summary', 'expense@summary', 4, 1, 1, NULL, '2020-02-11 02:52:26', '2020-02-11 02:52:26'),
(60, 9, 'Privacy Summary', 'privacy@summary', 5, 1, 1, NULL, '2020-02-11 02:53:47', '2020-02-11 02:53:47'),
(61, 9, 'Payment Summary', 'payment@summary', 6, 1, 1, NULL, '2020-02-11 02:54:19', '2020-02-11 02:54:19'),
(62, 9, 'Received & Payment Summary', 'receivedpayment@summary', 7, 1, 1, NULL, '2020-02-11 02:55:03', '2020-02-11 02:55:03'),
(63, 9, 'Income Statement', 'income@statement', 8, 1, 1, NULL, '2020-02-11 02:55:30', '2020-02-11 02:55:30'),
(64, 9, 'Balance Sheet', 'balance@sheet', 9, 1, 1, NULL, '2020-02-11 02:55:59', '2020-02-11 02:55:59'),
(65, 9, 'Cash Book', 'cash@book', 10, 1, 1, NULL, '2020-02-11 02:56:26', '2020-02-11 02:56:26'),
(66, 9, 'Bank Ledger', 'bank@ledger', 11, 1, 1, NULL, '2020-02-11 02:57:01', '2020-02-11 02:57:01'),
(67, 9, 'Customer Ledger', 'customer@ledger', 12, 1, 1, NULL, '2020-02-11 02:58:40', '2020-02-11 02:58:40'),
(68, 9, 'Supplier Ledger', 'supplier@ledger', 13, 1, 1, NULL, '2020-02-11 02:59:56', '2020-02-11 02:59:56'),
(69, 9, 'Low Ledger', 'low@ledger', 14, 1, 1, NULL, '2020-02-11 03:00:23', '2020-02-11 03:00:23'),
(70, 9, 'Expense Ledger', 'expense@ledger', 15, 1, 1, NULL, '2020-02-11 03:01:05', '2020-02-11 03:01:05'),
(71, 9, 'Trial Balance', 'trial@balance', 16, 1, 1, NULL, '2020-02-11 03:02:01', '2020-02-11 03:02:01'),
(72, 9, 'Bank Reconciliation Statement', 'bankreconciliation@statement', 17, 1, 1, NULL, '2020-02-11 03:02:54', '2020-02-11 03:02:54'),
(73, 10, 'Employee Entry', 'employee@entry', 1, 1, 1, NULL, '2020-02-11 03:04:35', '2020-02-11 03:04:35'),
(74, 10, 'Salary Start Setup', 'salarystart@setup', 2, 1, 1, 1, '2020-02-11 03:05:03', '2020-06-26 03:42:46'),
(75, 10, 'Salary Grade Entry', 'salarygrade@entry', 3, 1, 1, 1, '2020-02-11 03:06:33', '2020-04-18 04:44:58'),
(76, 10, 'Holiday Setup', 'holiday@setup', 8, 1, 1, 1, '2020-02-11 03:07:50', '2020-04-18 05:45:16'),
(77, 10, 'Leave Entry', 'leave@entry', 5, 1, 1, NULL, '2020-02-11 03:08:24', '2020-02-11 03:08:24'),
(78, 10, 'Job Department Entry', 'jobdepartment@entry', 6, 1, 1, NULL, '2020-02-11 03:09:13', '2020-02-11 03:09:13'),
(79, 10, 'Salary Increment Entry', 'salaryincrement@entry', 7, 1, 1, NULL, '2020-02-11 03:09:40', '2020-02-11 03:09:40'),
(80, 11, 'Employee Report', 'employee@report', 1, 1, 1, 1, '2020-02-11 03:12:22', '2020-04-16 00:56:24'),
(81, 11, 'Salary Sheet Report', 'salarysheet@report', 2, 1, 1, 1, '2020-02-11 03:13:10', '2020-04-16 00:56:55'),
(82, 11, 'Leave Report', 'leave@report', 3, 1, 1, NULL, '2020-02-11 03:13:37', '2020-02-11 03:13:37'),
(83, 11, 'Attendance Report', 'attendance@report', 4, 1, 1, NULL, '2020-02-11 03:14:03', '2020-02-11 03:14:03'),
(84, 11, 'Payslip Report', 'payslip@report', 5, 1, 1, 1, '2020-02-11 03:15:35', '2020-04-16 00:57:12'),
(85, 11, 'Employe Statement', 'employe@statement', 6, 1, 1, NULL, '2020-02-11 03:16:34', '2020-02-11 03:16:34'),
(86, 11, 'Bonus Report', 'bonus@report', 7, 1, 1, NULL, '2020-02-11 03:17:07', '2020-02-11 03:17:07'),
(87, 11, 'Yearly Leave Calendar', 'yearlyleave@calendar', 8, 1, 1, NULL, '2020-02-11 03:17:58', '2020-02-11 03:17:58'),
(88, 11, 'Pay Grade Report', 'paygrade@report', 9, 1, 1, 1, '2020-02-11 03:19:22', '2020-04-16 00:58:09'),
(89, 11, 'Salary Due Report', 'salary@due@report', 10, 1, 1, 1, '2020-02-11 03:20:01', '2020-04-16 00:57:46'),
(90, 12, 'Asset Entry', 'asset@entry', 1, 1, 1, NULL, '2020-02-11 03:20:41', '2020-02-11 03:20:41'),
(91, 12, 'Asset Brand Entry', 'assetbrand@entry', 2, 1, 1, NULL, '2020-02-11 03:21:23', '2020-02-11 03:21:23'),
(92, 12, 'Asset Category Entry', 'assetcategory@entry', 3, 1, 1, NULL, '2020-02-11 03:21:51', '2020-02-11 03:21:51'),
(93, 12, 'Asset Product Entry', 'assetproduct@entry', 4, 1, 1, 1, '2020-02-11 03:23:02', '2020-07-21 23:37:12'),
(94, 12, 'Asset Supplier Entry', 'assetsupplier@entry', 5, 1, 1, NULL, '2020-02-11 03:23:31', '2020-02-11 03:23:31'),
(104, 14, 'Accounting Only Company', 'accountingonly@company', 1, 1, 1, NULL, '2020-02-11 03:38:57', '2020-02-11 03:38:57'),
(105, 14, 'Create Business Type', 'createbusiness@type', 2, 1, 1, NULL, '2020-02-11 03:39:30', '2020-02-11 03:39:30'),
(106, 14, 'Create Client', 'create@client', 3, 1, 1, NULL, '2020-02-11 03:39:55', '2020-02-11 03:39:55'),
(107, 14, 'Create Staff', 'create@staff', 4, 1, 1, NULL, '2020-02-11 03:40:16', '2020-02-11 03:40:16'),
(108, 14, 'Create Menu', 'create@menu', 5, 1, 1, NULL, '2020-02-11 03:40:50', '2020-02-11 03:40:50'),
(109, 14, 'Create Marketing Type', 'createmarketing@type', 6, 1, 1, NULL, '2020-02-11 03:41:15', '2020-02-11 03:41:15'),
(110, 14, 'Create Commission', 'create@commission', 7, 1, 1, NULL, '2020-02-11 03:41:40', '2020-02-11 03:41:40'),
(111, 14, 'Create Admin', 'create@admin', 8, 1, 1, NULL, '2020-02-11 03:42:10', '2020-02-11 03:42:10'),
(112, 14, 'Create Agent', 'create@agent', 9, 1, 1, NULL, '2020-02-11 03:42:38', '2020-02-11 03:42:38'),
(113, 14, 'Create Liana Type', 'createliana@type', 10, 1, 1, NULL, '2020-02-11 04:23:06', '2020-02-11 04:23:06'),
(114, 14, 'Process Shop', 'process@shop', 11, 1, 1, NULL, '2020-02-11 04:23:32', '2020-02-11 04:23:32'),
(115, 14, 'Sales Target Create', 'salestarget@create', 12, 1, 1, NULL, '2020-02-11 04:23:56', '2020-02-11 04:23:56'),
(116, 14, 'Create Client IP', 'createclient@ip', 13, 1, 1, NULL, '2020-02-11 04:25:10', '2020-02-11 04:25:10'),
(117, 14, 'Purchase', 'purchase', 14, 1, 1, NULL, '2020-02-11 04:26:09', '2020-02-11 04:26:09'),
(118, 14, 'IP Notice', 'ip@notice', 15, 1, 1, NULL, '2020-02-11 04:26:36', '2020-02-11 04:26:36'),
(119, 14, 'Sales', 'sales', 16, 1, 1, NULL, '2020-02-11 04:27:03', '2020-02-11 04:27:03'),
(120, 14, 'Delivery Section', 'delivery@section', 17, 1, 1, NULL, '2020-02-11 04:27:33', '2020-02-11 04:27:33'),
(121, 14, 'Inventory', 'inventory', 18, 1, 1, NULL, '2020-02-11 04:28:12', '2020-02-11 04:28:12'),
(122, 14, 'Client Followp', 'client@followp', 19, 1, 1, NULL, '2020-02-11 04:29:05', '2020-02-11 04:29:05'),
(123, 14, 'Asset', 'asset', 20, 1, 1, NULL, '2020-02-11 04:29:29', '2020-02-11 04:29:29'),
(124, 14, 'HR', 'hr', 21, 1, 1, NULL, '2020-02-11 04:30:12', '2020-02-11 04:30:12'),
(125, 14, 'Reporting', 'reporting', 22, 1, 1, NULL, '2020-02-11 04:30:31', '2020-02-11 04:30:31'),
(126, 14, 'Message', 'message', 23, 1, 1, NULL, '2020-02-11 04:30:49', '2020-02-11 04:30:49'),
(127, 14, 'Notification', 'notification', 24, 1, 1, NULL, '2020-02-11 04:31:11', '2020-02-11 04:31:11'),
(128, 15, 'Setup', 'setup', 1, 1, 1, NULL, '2020-02-11 04:45:47', '2020-02-11 04:45:47'),
(129, 15, 'Support Admin', 'support@admin', 2, 1, 1, NULL, '2020-02-11 04:46:16', '2020-02-11 04:46:16'),
(130, 15, 'Billing Address', 'billing@address', 3, 1, 1, NULL, '2020-02-11 04:46:40', '2020-02-11 04:46:40'),
(131, 15, 'Sub Admin', 'sub@admin', 4, 1, 1, NULL, '2020-02-11 04:47:06', '2020-02-11 04:47:06'),
(132, 15, 'Suspend & Unsuspend Admin', 'suspend@unsuspend@admin', 5, 1, 1, NULL, '2020-02-11 04:48:06', '2020-02-11 04:48:06'),
(133, 15, 'Marketing Admin', 'marketing@admin', 6, 1, 1, NULL, '2020-02-11 04:48:35', '2020-02-11 04:48:35'),
(134, 15, 'Commission base Man', 'commissionbase@man', 7, 1, 1, NULL, '2020-02-11 04:48:59', '2020-02-11 04:48:59'),
(135, 15, 'Delivery Section', 'delivery@section@', 8, 1, 1, NULL, '2020-02-11 04:49:22', '2020-02-11 04:49:22'),
(136, 15, 'IP Query & Block Admin', 'ipquery@blockadmin', 9, 1, 1, NULL, '2020-02-11 04:51:29', '2020-02-11 04:51:29'),
(137, 15, 'Information Edit', 'information@edit', 10, 1, 1, NULL, '2020-02-11 04:51:51', '2020-02-11 04:51:51'),
(138, 15, 'Sales Team', 'sales@team', 11, 1, 1, NULL, '2020-02-11 04:52:17', '2020-02-11 04:52:17'),
(139, 15, 'Shop List', 'shop@list', 12, 1, 1, NULL, '2020-02-11 04:52:43', '2020-02-11 04:52:43'),
(140, 15, 'Report', 'report', 13, 1, 1, NULL, '2020-02-11 04:53:03', '2020-02-11 04:53:03'),
(141, 15, 'Menu Permission', 'menu@permission', 14, 1, 1, NULL, '2020-02-11 04:53:24', '2020-02-11 04:53:24'),
(142, 16, 'Problem Entry', 'problem@entry', 1, 1, 1, NULL, '2020-02-11 04:54:07', '2020-02-11 04:54:07'),
(143, 16, 'Client Update', 'client@update', 2, 1, 1, NULL, '2020-02-11 04:59:20', '2020-02-11 04:59:20'),
(144, 16, 'Today Support Calendar', 'todaysupport@calendar', 3, 1, 1, NULL, '2020-02-11 05:00:12', '2020-02-11 05:00:12'),
(145, 16, 'Feedback', 'feedback', 4, 1, 1, NULL, '2020-02-11 05:03:53', '2020-02-11 05:03:53'),
(146, 16, 'Message', 'support@message', 5, 1, 1, NULL, '2020-02-11 05:04:43', '2020-02-11 05:04:43'),
(147, 17, 'Billing Report Daily', 'billingreport@daily', 1, 1, 1, NULL, '2020-02-11 05:27:45', '2020-02-11 05:27:45'),
(148, 17, 'Due Bill', 'due@bill', 2, 1, 1, NULL, '2020-02-11 05:28:26', '2020-02-11 05:28:26'),
(149, 17, 'Due Bill Feedback', 'duebill@feedback', 3, 1, 1, NULL, '2020-02-11 05:28:49', '2020-02-11 05:28:49'),
(150, 17, 'Message', 'billing@message', 4, 1, 1, NULL, '2020-02-11 05:32:00', '2020-02-11 05:32:00'),
(151, 17, 'Over Due Bill', 'overdue@bill', 5, 1, 1, NULL, '2020-02-11 05:32:23', '2020-02-11 05:32:23'),
(152, 18, 'Menu Permission', 'subadmin@menu@permission', 1, 1, 1, NULL, '2020-02-11 05:33:07', '2020-02-11 05:33:07'),
(153, 18, 'Menu Notification', 'subadmin@menu@notification', 2, 1, 1, NULL, '2020-02-11 05:33:36', '2020-02-11 05:33:36'),
(154, 18, 'Message', 'subadmin@message', 3, 1, 1, NULL, '2020-02-11 05:33:58', '2020-02-11 05:33:58'),
(155, 18, 'Report', 'subadmin@report', 4, 1, 1, NULL, '2020-02-11 05:34:30', '2020-02-11 05:34:30'),
(156, 19, 'Billing Admin Report', 'billingadmin@report', 1, 1, 1, NULL, '2020-02-11 05:35:10', '2020-02-11 05:35:10'),
(157, 19, 'Suspend List', 'suspend@list', 2, 1, 1, NULL, '2020-02-11 05:35:31', '2020-02-11 05:35:31'),
(158, 19, 'Unsuspend List', 'unsuspend@list', 3, 1, 1, NULL, '2020-02-11 05:36:23', '2020-02-11 05:36:23'),
(159, 19, 'Message', 'suspend@unsuspend@message', 4, 1, 1, NULL, '2020-02-11 05:36:40', '2020-02-11 05:36:40'),
(160, 20, 'Saler Man List', 'marketing@salermanlist', 1, 1, 1, NULL, '2020-02-11 05:37:28', '2020-02-11 05:37:28'),
(161, 20, 'Saler Target', 'marketing@salertarget', 2, 1, 1, NULL, '2020-02-11 05:37:50', '2020-02-11 05:37:50'),
(162, 20, 'Saler Target Achieve', 'marketing@salertargetachieve', 3, 1, 1, NULL, '2020-02-11 05:38:17', '2020-02-11 05:38:17'),
(163, 20, 'Inactive List', 'marketing@inactivelist', 4, 1, 1, NULL, '2020-02-11 05:39:46', '2020-02-11 05:39:46'),
(164, 20, 'Proposed Client', 'marketing@proposedclient', 5, 1, 1, NULL, '2020-02-11 05:41:05', '2020-02-11 05:41:05'),
(165, 20, 'Proposed Followp', 'marketing@proposedfollowp', 6, 1, 1, NULL, '2020-02-11 05:42:21', '2020-02-11 05:42:21'),
(166, 20, 'Message', 'marketing@message', 7, 1, 1, NULL, '2020-02-11 05:42:56', '2020-02-11 05:42:56'),
(167, 20, 'Shop Entry', 'marketing@shopentry', 8, 1, 1, NULL, '2020-02-11 05:43:25', '2020-02-11 05:43:25'),
(168, 21, 'Shop Entry', 'salerman@shopentry', 1, 1, 1, NULL, '2020-02-11 06:20:01', '2020-02-11 06:20:01'),
(169, 21, 'Proposer Shop', 'salerman@proposershop', 2, 1, 1, NULL, '2020-02-11 06:20:24', '2020-02-11 06:20:24'),
(170, 21, 'Inactive List', 'salerman@inactivelist', 3, 1, 1, NULL, '2020-02-11 06:20:53', '2020-02-11 06:20:53'),
(171, 21, 'Profile', 'salerman@profile', 4, 1, 1, NULL, '2020-02-11 06:21:11', '2020-02-11 06:21:11'),
(172, 21, 'Message', 'salerman@message', 5, 1, 1, NULL, '2020-02-11 06:21:32', '2020-02-11 06:21:32'),
(173, 21, 'Total Earning', 'salerman@totalearning', 6, 1, 1, NULL, '2020-02-11 06:21:53', '2020-02-11 06:21:53'),
(174, 21, 'Monthly Earning', 'salerman@monthlyearning', 7, 1, 1, NULL, '2020-02-11 06:22:21', '2020-02-11 06:22:21'),
(175, 22, 'Update Shop Information', 'update@shopinformation', 1, 1, 1, NULL, '2020-02-11 06:22:57', '2020-02-11 06:22:57'),
(176, 22, 'Delivery Report', 'delivery@report', 2, 1, 1, NULL, '2020-02-11 06:23:48', '2020-02-11 06:23:48'),
(177, 22, 'Delivery Calendar', 'delivery@calendar', 3, 1, 1, NULL, '2020-02-11 06:24:23', '2020-02-11 06:24:23'),
(178, 22, 'Delivery Request', 'delivery@request', 4, 1, 1, NULL, '2020-02-11 06:25:16', '2020-02-11 06:25:16'),
(179, 22, 'Message', 'delivery@message', 5, 1, 1, NULL, '2020-02-11 06:25:40', '2020-02-11 06:25:40'),
(180, 22, 'Contact Support Admin', 'delivery@supportadmin', 6, 1, 1, NULL, '2020-02-11 06:26:03', '2020-02-11 06:26:03'),
(181, 23, 'IP add', 'ip@add', 1, 1, 1, NULL, '2020-02-11 06:28:36', '2020-02-11 06:28:36'),
(182, 23, 'IP Lock', 'ip@lock', 2, 1, 1, NULL, '2020-02-11 06:29:04', '2020-02-11 06:29:04'),
(183, 23, 'IP Unlock', 'ip@unblock', 3, 1, 1, NULL, '2020-02-11 06:29:50', '2020-02-11 06:29:50'),
(184, 23, 'Message', 'ipquery@message', 4, 1, 1, NULL, '2020-02-11 06:30:11', '2020-02-11 06:30:11'),
(185, 24, 'Support panding', 'support@panding', 1, 1, 1, NULL, '2020-02-11 06:30:53', '2020-02-11 06:30:53'),
(186, 24, 'Complete Edit', 'complete@edit', 2, 1, 1, NULL, '2020-02-11 06:32:53', '2020-02-11 06:32:53'),
(187, 24, 'Search', 'editadmin@search', 3, 1, 1, NULL, '2020-02-11 06:33:16', '2020-02-12 00:10:51'),
(188, 24, 'Message', 'editadmin@message', 4, 1, 1, NULL, '2020-02-11 06:33:31', '2020-02-12 00:42:03'),
(191, 26, 'Add Category', 'shopadd@category', 1, 1, 1, NULL, '2020-03-05 03:10:21', '2020-03-05 03:10:21'),
(192, 26, 'Add Product Brand', 'shopaddproduct@brand', 2, 1, 1, NULL, '2020-03-05 03:13:30', '2020-03-05 03:13:30'),
(194, 26, 'Add Employee', 'shopadd@employee', 3, 1, 1, 1, '2020-03-05 03:15:42', '2020-04-05 00:59:06'),
(195, 26, 'Add Product Supplier Entry', 'shopaddproductsupplier@entry', 4, 1, 1, 1, '2020-03-05 03:16:38', '2020-04-05 00:59:13'),
(200, 26, 'Add Bank', 'shopadd@bank', 5, 1, 1, 1, '2020-03-05 03:52:45', '2020-04-05 00:59:21'),
(203, 27, 'Product Code Entry', 'shopproductcode@entry', 1, 1, 1, NULL, '2020-03-05 06:02:22', '2020-03-05 06:02:22'),
(204, 27, 'Product Entry', 'shopproduct@entry', 2, 1, 1, NULL, '2020-03-05 06:03:04', '2020-03-05 06:03:04'),
(205, 27, 'Product Price Setup', 'shopproductprice@setup', 3, 1, 1, 1, '2020-03-05 06:04:17', '2020-03-25 05:48:58'),
(206, 27, 'Discount Setup', 'shopdiscount@setup', 4, 1, 1, NULL, '2020-03-05 06:05:40', '2020-03-05 06:05:40'),
(207, 29, 'Category Report', 'categoryReport', 1, 1, 1, 1, '2020-03-14 01:11:50', '2021-04-19 10:58:23'),
(208, 29, 'Product Report', 'product@report', 2, 1, 1, 1, '2020-03-14 01:12:17', '2020-04-04 05:47:07'),
(209, 27, 'Add Expence Type', 'shopaddexpencetype@entry', 5, 1, 4, NULL, '2020-03-15 02:54:41', '2020-03-15 02:54:41'),
(210, 27, 'Loan Provider Entry', 'shoploanprovider@entry', 6, 1, 4, NULL, '2020-03-15 02:58:57', '2020-03-15 02:58:57'),
(211, 27, 'Loan Entry', 'shoploan@entry', 7, 1, 4, 4, '2020-03-15 03:03:13', '2020-03-15 03:05:03'),
(212, 27, 'Add Income Type', 'shopaddincometype@entry', 8, 1, 4, NULL, '2020-03-15 03:34:52', '2020-03-15 03:34:52'),
(213, 29, 'Product  Supplier Report', 'productsupplier@report', 3, 1, 1, 1, '2020-03-18 03:33:43', '2020-04-04 05:47:19'),
(215, 29, 'Income Type Report', 'incometype@report', 4, 1, 1, 1, '2020-03-18 06:00:15', '2020-04-05 00:03:28'),
(216, 29, 'Expence Type Report', 'expencetype@report', 5, 1, 1, 1, '2020-03-18 06:02:16', '2020-04-05 00:03:40'),
(217, 29, 'Product Brand Report', 'productbrand@report', 6, 1, 1, 1, '2020-03-21 00:52:07', '2020-04-05 00:03:47'),
(219, 7, 'Product Name Without Price', 'productname@withoutprice', 5, 1, 1, 1, '2020-03-31 21:24:07', '2020-03-31 21:24:35'),
(220, 7, 'Product Name With Price', 'productname@withprice', 6, 1, 1, NULL, '2020-03-31 21:25:13', '2020-03-31 21:25:13'),
(223, 7, 'Low Quantity Product Report', 'lowquantityproduct@report', 10, 1, 1, 1, '2020-04-01 01:53:44', '2020-07-20 03:41:01'),
(224, 7, 'Expired Date Over Product Report', 'expiredateoverproduct@report', 11, 1, 1, 1, '2020-04-01 01:54:26', '2020-07-20 03:41:12'),
(225, 7, 'Expired Date Soon Product Report', 'expiredatesoonproduct@report', 12, 1, 1, 1, '2020-04-01 01:55:44', '2020-07-20 03:41:28'),
(226, 7, 'Product Category With Price', 'productcategory@withprice', 9, 1, 1, NULL, '2020-04-01 21:50:04', '2020-04-01 21:50:04'),
(228, 30, 'Asset Brand Report', 'assetbrand@report', 1, 1, 1, NULL, '2020-04-05 00:01:37', '2020-04-05 00:01:37'),
(229, 30, 'Asset Category Report', 'assetcategory@report', 2, 1, 1, NULL, '2020-04-05 00:02:02', '2020-04-05 00:02:02'),
(230, 30, 'Asset Supplier Report', 'assetsupplier@report', 3, 1, 1, NULL, '2020-04-05 00:02:30', '2020-04-05 00:02:30'),
(231, 11, 'Job Department Report', 'jobdepartment@report', 11, 1, 1, NULL, '2020-04-06 06:57:14', '2020-04-06 06:57:14'),
(232, 11, 'Salary Grade Report', 'salarygrade@report', 12, 1, 1, 1, '2020-04-06 06:58:35', '2020-04-18 04:55:15'),
(233, 11, 'Holiday Report', 'holiday@report', 14, 1, 1, 1, '2020-04-06 06:59:20', '2020-04-18 05:43:04'),
(234, 10, 'Salary Grade Setup', 'salarygrade@setup', 4, 1, 1, 1, '2020-04-18 04:59:01', '2020-04-18 05:44:49'),
(235, 11, 'Salary Grade Setup Report', 'salarygrade@setupreport', 13, 1, 1, 1, '2020-04-18 05:01:28', '2020-04-18 05:43:51'),
(237, 10, 'Employee Atttendance', 'employee@atttendance', 9, 1, 1, NULL, '2020-06-28 08:55:03', '2020-06-28 08:55:03'),
(238, 30, 'Asset Code Report', 'assetcode@report', 4, 1, 1, NULL, '2020-07-04 01:38:06', '2020-07-04 01:38:06'),
(239, 30, 'Asset Entry Report', 'assetentry@report', 5, 1, 1, NULL, '2020-07-04 23:50:19', '2020-07-04 23:50:19'),
(240, 12, 'Asset Status Entry', 'asset@status', 6, 1, 1, 1, '2020-07-08 08:52:29', '2020-07-09 02:26:03'),
(241, 30, 'Asset Damage Report', 'assetdamage@report', 6, 1, 1, 1, '2020-07-09 02:21:25', '2020-07-09 02:25:07'),
(242, 30, 'Asset Waranty Report', 'assetwaranty@report', 7, 1, 1, 1, '2020-07-09 02:21:55', '2020-07-09 02:24:19'),
(243, 30, 'Asset Guarantee Report', 'assetgurantee@report', 8, 1, 1, 1, '2020-07-09 02:22:22', '2020-07-09 02:24:12'),
(244, 30, 'Asset Unused Report', 'assetunused@report', 9, 1, 1, 1, '2020-07-09 02:22:57', '2020-07-09 02:24:06'),
(245, 30, 'Asset Theft Report', 'assettheft@report', 10, 1, 1, 1, '2020-07-09 02:23:24', '2020-07-09 02:23:57'),
(246, 5, 'Purchase Product Report', 'purchaseproduct@report', 12, 1, 1, NULL, '2020-07-13 05:51:09', '2020-07-13 05:51:09'),
(247, 3, 'Customer List Report', 'customerlist@report', 18, 1, 1, NULL, '2020-07-22 05:35:15', '2020-07-22 05:35:15'),
(248, 5, 'Brand Report', 'productbrand@list', 13, 1, 1, 1, '2021-03-14 12:15:18', '2021-03-14 12:49:29'),
(249, 42, 'Shop List', 'adminReportShopList', 1, 1, 1, 1, '2021-03-24 09:39:28', '2021-04-11 06:42:43'),
(250, 26, 'Employee Type Entry', 'shopemployee@typecreate', 6, 1, 1, NULL, '2021-04-05 17:37:40', '2021-04-05 17:37:40'),
(251, 26, 'Shop Menu Permission', 'shopmenu@permission', 7, 1, 1, NULL, '2021-04-05 17:44:20', '2021-04-05 17:44:20'),
(252, 26, 'Shop Menu Permission List', 'shopmenu@permissionlist', 8, 1, 1, NULL, '2021-04-05 17:44:49', '2021-04-05 17:44:49'),
(253, 26, 'Invoice Setup', 'invoiceSetup', 9, 1, 1, NULL, '2021-04-05 17:45:13', '2021-04-05 17:45:13'),
(254, 26, 'QR Code Setup', 'qrCodeSetup', 10, 1, 1, NULL, '2021-04-05 17:45:33', '2021-04-05 17:45:33'),
(255, 26, 'Branch Setup', 'branchSetup', 11, 1, 1, NULL, '2021-04-05 17:45:56', '2021-04-05 17:45:56'),
(257, 42, 'Shop Branch Update', 'shopBranchUpdate', 2, 1, 1, NULL, '2021-04-13 13:10:29', '2021-04-13 13:10:29'),
(258, 9, 'Chart Of Accounts', 'chartOfAccounts', 18, 1, 1, NULL, '2021-04-25 05:04:00', '2021-04-25 05:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_types`
--

CREATE TABLE `admin_types` (
  `adminTypeId` bigint(20) UNSIGNED NOT NULL,
  `adminTypeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminTypeStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_types`
--

INSERT INTO `admin_types` (`adminTypeId`, `adminTypeName`, `adminTypeStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(8, 'Verification', '1', 1, NULL, '2021-03-16 21:09:56', NULL),
(9, 'IT DPT', '1', 1, NULL, '2021-03-16 21:10:05', NULL),
(10, 'Billing DPT', '1', 1, NULL, '2021-03-16 21:10:13', NULL),
(11, 'Sales & marketing', '1', 1, NULL, '2021-03-16 21:10:21', NULL),
(12, 'Call Center', '1', 1, NULL, '2021-03-16 21:10:31', NULL),
(13, 'Training DPT', '1', 1, NULL, '2021-03-16 21:10:38', NULL),
(14, 'Cashbook Sales Center', '1', 1, NULL, '2021-03-24 09:04:55', NULL),
(15, 'Accounts', '1', 1, NULL, '2021-04-11 15:18:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `asset_brand_entries`
--

CREATE TABLE `asset_brand_entries` (
  `assetBrandEntryId` bigint(20) UNSIGNED NOT NULL,
  `assetBrandName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assetBrandStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_brand_entries`
--

INSERT INTO `asset_brand_entries` (`assetBrandEntryId`, `assetBrandName`, `assetBrandStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'Rubel', 1, 1, NULL, '2020-03-16 04:22:21', NULL),
(2, 'Rubel Khan', 1, 3, 3, '2020-03-21 09:39:34', '2020-03-21 09:42:36'),
(3, 'aaaaaaaa', 1, 3, 3, '2020-03-21 09:44:49', '2020-04-04 04:30:55'),
(4, 'RRRRRR', 1, 3, 1, '2020-03-21 10:58:18', '2020-06-24 09:17:09'),
(5, 'Rubel Khan dd', 1, 1, 1, '2020-03-21 10:58:44', '2020-06-24 09:16:49'),
(6, 'Shohel', 1, 3, NULL, '2020-07-04 09:40:34', NULL),
(7, 'kkkkkkk', 1, 1, NULL, '2020-07-22 08:01:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `asset_code_entries`
--

CREATE TABLE `asset_code_entries` (
  `assetCodeEntryId` bigint(20) UNSIGNED NOT NULL,
  `assetCategoryId` int(11) NOT NULL,
  `assetPorductName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assetPorductCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assetCodeStatus` tinyint(1) NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_code_entries`
--

INSERT INTO `asset_code_entries` (`assetCodeEntryId`, `assetCategoryId`, `assetPorductName`, `assetPorductCode`, `assetCodeStatus`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, 'Table Asset', 'Table 201', 1, 1, 1, 3, NULL, '2020-07-05 12:01:35', '2020-07-05 12:01:35'),
(2, 2, 'Table Sub', 'Table 202', 1, 1, 1, 3, 1, '2020-07-05 12:01:48', '2020-07-05 12:38:23'),
(3, 3, 'Table Third', 'Table 203', 1, 1, 1, 3, 1, '2020-07-05 12:02:07', '2020-07-05 12:29:19'),
(4, 4, 'Table Four', 'Table 201', 1, 1, 1, 3, 1, '2020-07-05 12:03:58', '2020-07-05 12:29:23'),
(5, 5, 'Table Five', 'Table 201', 1, 1, 1, 3, 1, '2020-07-05 12:04:14', '2020-07-05 12:37:33'),
(6, 8, 'Table Six', 'Table 201', 1, 1, 1, 3, 1, '2020-07-05 12:04:33', '2020-07-08 06:54:42'),
(7, 9, 'Table Seven', 'Table 205', 1, 1, 1, 3, 1, '2020-07-05 12:05:04', '2020-07-05 12:37:08'),
(8, 5, 'Table Asset', 'Table 205', 1, 1, 1, 3, NULL, '2020-07-08 05:19:54', '2020-07-08 05:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `asset_statuses`
--

CREATE TABLE `asset_statuses` (
  `assetStatusId` bigint(20) UNSIGNED NOT NULL,
  `shopAssetEntryId` int(11) NOT NULL,
  `typeSelectId` int(11) NOT NULL,
  `typeOptionId` int(11) NOT NULL,
  `sendDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiveDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarkSendTime` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarkReceiveTime` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_entries`
--

CREATE TABLE `bank_entries` (
  `bankEntryId` bigint(20) UNSIGNED NOT NULL,
  `bankName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankTypeEntryId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_entries`
--

INSERT INTO `bank_entries` (`bankEntryId`, `bankName`, `bankTypeEntryId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(3, 'Agent Bank', 2, 1, NULL, '2020-03-26 15:44:08', '2020-03-26 15:44:08'),
(4, 'DBBL', 1, 1, NULL, '2020-03-26 15:44:12', '2020-03-26 15:44:12'),
(7, 'Agent Bank', 1, 1, NULL, '2020-06-24 09:01:22', '2020-06-24 09:01:22'),
(8, 'Dhaka Bank', 1, 1, 1, '2020-06-24 11:10:49', '2020-06-25 05:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `bank_type_entries`
--

CREATE TABLE `bank_type_entries` (
  `bankTypeEntryId` bigint(20) UNSIGNED NOT NULL,
  `bankTypeEntryName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankTypeEntryStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_type_entries`
--

INSERT INTO `bank_type_entries` (`bankTypeEntryId`, `bankTypeEntryName`, `bankTypeEntryStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'Dutch Bangla Bank', '1', 1, 1, '2020-03-18 09:29:36', '2020-06-24 09:16:27'),
(2, 'Uttra Bank', '1', 1, NULL, '2020-03-18 09:29:40', '2020-03-18 09:29:40'),
(3, 'Dutch Bangla Bank Asia', '1', 1, 1, '2020-06-24 09:02:17', '2020-06-24 09:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `basic_infos`
--

CREATE TABLE `basic_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religious` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branch_information`
--

CREATE TABLE `branch_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopId` int(11) NOT NULL,
  `branchName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchCode` int(11) NOT NULL,
  `branchMobileNo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchRepresentativeName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchRepresentativeMobileNo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentStatus` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deleteStatus` tinyint(1) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_information`
--

INSERT INTO `branch_information` (`id`, `shopId`, `branchName`, `branchCode`, `branchMobileNo`, `branchRepresentativeName`, `branchRepresentativeMobileNo`, `branchAddress`, `paymentStatus`, `status`, `deleteStatus`, `createBy`, `updateBy`, `deleteBy`, `created_at`, `updated_at`, `delete_at`) VALUES
(19, 3, 'sdf', 1, 'sdf', 'sdf', 'sdf', 'sdf', 0, 1, 1, 1, NULL, NULL, '2021-04-17 09:10:44', '2021-04-17 09:10:44', NULL),
(20, 3, 'a', 2, 'a', 'a', 'a', 'a', 0, 1, 1, 1, NULL, NULL, '2021-04-17 09:11:00', '2021-04-17 09:11:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand_entries`
--

CREATE TABLE `brand_entries` (
  `brandId` bigint(20) UNSIGNED NOT NULL,
  `brandName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandStatus` int(11) NOT NULL,
  `createByType` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_entries`
--

INSERT INTO `brand_entries` (`brandId`, `brandName`, `brandStatus`, `createByType`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(5, 'Asus', 1, 3, 3, 3, '2020-07-12 05:49:05', '2021-03-14 15:46:46'),
(6, 'Sumsung', 1, 3, 3, NULL, '2020-07-12 05:50:05', '2020-07-12 05:50:05'),
(8, 'DoofazITt', 1, 3, 3, 3, '2020-12-14 05:42:13', '2020-12-14 05:43:40'),
(9, 'Pran', 1, 14, 14, NULL, '2021-03-08 05:14:16', '2021-03-08 05:14:16'),
(11, 'Radhuni', 1, 14, 14, 14, '2021-03-14 15:46:09', '2021-03-14 15:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` bigint(20) UNSIGNED NOT NULL,
  `categoryName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryPosition` int(11) NOT NULL DEFAULT 1,
  `categoryStatus` int(11) NOT NULL,
  `subCategoryStatus` tinyint(1) NOT NULL,
  `shopTypeId` int(11) DEFAULT NULL,
  `previousId` int(11) DEFAULT NULL,
  `label` int(11) NOT NULL DEFAULT 1,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`, `categoryPosition`, `categoryStatus`, `subCategoryStatus`, `shopTypeId`, `previousId`, `label`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(9, 'Mans Fashion', 1, 1, 1, 4, NULL, 1, 1, NULL, '2021-04-19 04:56:40', '2021-04-19 04:56:40'),
(10, 'Shirt', 1, 1, 1, 4, 9, 2, 1, NULL, '2021-04-19 04:57:01', '2021-04-19 04:57:01'),
(11, 'Formal', 1, 1, 1, 4, 10, 3, 1, NULL, '2021-04-19 04:57:32', '2021-04-19 04:57:32'),
(12, 'Womans Fashion', 2, 1, 1, 4, NULL, 1, 3, NULL, '2021-04-19 04:59:01', '2021-04-19 04:59:01'),
(13, 'Saree', 1, 1, 1, 4, 12, 2, 3, NULL, '2021-04-19 04:59:25', '2021-04-19 04:59:25'),
(14, 'Cotton', 1, 1, 1, 4, 13, 3, 3, NULL, '2021-04-19 04:59:42', '2021-04-19 04:59:42'),
(15, 'Home App', 3, 1, 1, 4, NULL, 1, 3, NULL, '2021-04-19 10:59:53', '2021-04-19 10:59:53'),
(16, 'Kichen', 1, 1, 1, 4, 15, 2, 3, NULL, '2021-04-19 11:00:49', '2021-04-19 11:00:49'),
(17, 'sareee', 2, 1, 1, 4, 12, 2, 3, NULL, '2021-04-19 11:02:13', '2021-04-19 11:02:13'),
(18, 'mosharee', 2, 1, 1, 4, 13, 3, 1, NULL, '2021-04-19 11:03:41', '2021-04-19 11:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_accounts`
--

CREATE TABLE `chart_of_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `headLavel` int(11) NOT NULL,
  `headName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headCode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dr_cr` int(11) NOT NULL,
  `headGroupId` int(11) NOT NULL,
  `headGroupType` int(11) NOT NULL,
  `lastCode` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `autoCreate` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chart_of_accounts`
--

INSERT INTO `chart_of_accounts` (`id`, `headLavel`, `headName`, `headCode`, `pre_code`, `dr_cr`, `headGroupId`, `headGroupType`, `lastCode`, `status`, `position`, `autoCreate`, `createBy`, `updateBy`, `deleteBy`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Asset', '1', '0', 1, 1, 1, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 09:36:41', NULL, NULL),
(2, 2, 'Non Current Assets', '101', '1', 1, 1, 1, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 09:37:16', NULL, NULL),
(3, 2, 'Current Assets', '102', '1', 1, 1, 1, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 09:37:34', NULL, NULL),
(4, 3, 'Cash & Bank Balance', '10201', '102', 1, 1, 1, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 09:38:02', NULL, NULL),
(5, 4, 'Cash in Hand', '1020101', '10201', 1, 1, 2, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 09:38:33', NULL, NULL),
(6, 4, 'Cash at Bank', '1020102', '10201', 1, 1, 2, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 09:38:57', NULL, NULL),
(7, 5, 'General Cash', '102010101', '1020101', 1, 1, 4, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 09:43:37', NULL, NULL),
(8, 5, 'Petty Cash', '102010102', '1020101', 1, 1, 4, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 09:50:57', NULL, NULL),
(9, 5, 'CAB-DBBL Rampura Branch', '102010201', '1020102', 1, 1, 4, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 09:57:57', '2021-05-01 00:52:13', NULL),
(10, 1, 'Equities & Liabilities', '2', '0', 1, 1, 1, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 10:27:05', NULL, NULL),
(11, 2, 'Equities', '201', '2', 1, 1, 1, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 10:27:19', NULL, NULL),
(12, 2, 'Liabilities', '202', '2', 1, 1, 1, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 10:27:34', NULL, NULL),
(13, 3, 'Non Current liabilities', '20201', '202', 1, 2, 1, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 10:28:53', NULL, NULL),
(14, 3, 'Current liabilities', '20202', '202', 1, 2, 1, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 10:29:14', NULL, NULL),
(15, 4, 'Accounts Payable', '2020201', '20202', 1, 2, 2, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 10:29:55', NULL, NULL),
(16, 5, 'Accounts Payable Supplier', '202020101', '2020201', 1, 2, 3, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 10:30:25', NULL, NULL),
(17, 6, 'AP-Rabeya Enterprise', '20202010101', '202020101', 1, 1, 4, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 22:46:56', NULL, NULL),
(18, 3, 'Accounts Receiveable', '10202', '102', 1, 1, 2, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 23:41:31', NULL, NULL),
(19, 4, 'Accounts Receiveable Customer', '1020201', '10202', 1, 1, 3, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 23:43:04', NULL, NULL),
(20, 5, 'ARC-Md-Nazmul-Huda', '102020101', '1020201', 1, 1, 4, 0, 1, 0, 0, 1, NULL, NULL, '2021-04-30 23:44:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_account_group_types`
--

CREATE TABLE `chart_of_account_group_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chart_of_account_group_types`
--

INSERT INTO `chart_of_account_group_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Group', NULL, NULL),
(2, 'Ladger', NULL, NULL),
(3, 'Sub Ladger', NULL, NULL),
(4, 'Register', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commission_type_entries`
--

CREATE TABLE `commission_type_entries` (
  `commissionTypeEntryId` bigint(20) UNSIGNED NOT NULL,
  `commissionTypeEntryName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commissionTypeEntryStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commission_type_entries`
--

INSERT INTO `commission_type_entries` (`commissionTypeEntryId`, `commissionTypeEntryName`, `commissionTypeEntryStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'Rubel', 1, 1, NULL, '2020-06-24 10:38:08', NULL),
(3, 'Rubel Khan', 1, 1, NULL, '2020-06-24 10:42:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_information`
--

CREATE TABLE `company_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_logos`
--

CREATE TABLE `company_logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iso` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nicename` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso3` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numcode` int(11) NOT NULL,
  `phonecode` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93, NULL, NULL),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355, NULL, NULL),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213, NULL, NULL),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684, NULL, NULL),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376, NULL, NULL),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244, NULL, NULL),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264, NULL, NULL),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', '', 0, 0, NULL, NULL),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268, NULL, NULL),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54, NULL, NULL),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374, NULL, NULL),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297, NULL, NULL),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61, NULL, NULL),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43, NULL, NULL),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994, NULL, NULL),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242, NULL, NULL),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973, NULL, NULL),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880, NULL, NULL),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246, NULL, NULL),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375, NULL, NULL),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32, NULL, NULL),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501, NULL, NULL),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229, NULL, NULL),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441, NULL, NULL),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975, NULL, NULL),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591, NULL, NULL),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387, NULL, NULL),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267, NULL, NULL),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', '', 0, 0, NULL, NULL),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55, NULL, NULL),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', '', 0, 246, NULL, NULL),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673, NULL, NULL),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359, NULL, NULL),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226, NULL, NULL),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257, NULL, NULL),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855, NULL, NULL),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237, NULL, NULL),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1, NULL, NULL),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238, NULL, NULL),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345, NULL, NULL),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236, NULL, NULL),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235, NULL, NULL),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56, NULL, NULL),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86, NULL, NULL),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', '', 0, 61, NULL, NULL),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', '', 0, 672, NULL, NULL),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57, NULL, NULL),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269, NULL, NULL),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242, NULL, NULL),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242, NULL, NULL),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682, NULL, NULL),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506, NULL, NULL),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225, NULL, NULL),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385, NULL, NULL),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53, NULL, NULL),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357, NULL, NULL),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420, NULL, NULL),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45, NULL, NULL),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253, NULL, NULL),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767, NULL, NULL),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809, NULL, NULL),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593, NULL, NULL),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20, NULL, NULL),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503, NULL, NULL),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240, NULL, NULL),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291, NULL, NULL),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372, NULL, NULL),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251, NULL, NULL),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500, NULL, NULL),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298, NULL, NULL),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679, NULL, NULL),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358, NULL, NULL),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33, NULL, NULL),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594, NULL, NULL),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689, NULL, NULL),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', '', 0, 0, NULL, NULL),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241, NULL, NULL),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220, NULL, NULL),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995, NULL, NULL),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49, NULL, NULL),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233, NULL, NULL),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350, NULL, NULL),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30, NULL, NULL),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299, NULL, NULL),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473, NULL, NULL),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590, NULL, NULL),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671, NULL, NULL),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502, NULL, NULL),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224, NULL, NULL),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245, NULL, NULL),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592, NULL, NULL),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509, NULL, NULL),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', '', 0, 0, NULL, NULL),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39, NULL, NULL),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504, NULL, NULL),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852, NULL, NULL),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36, NULL, NULL),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354, NULL, NULL),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91, NULL, NULL),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62, NULL, NULL),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98, NULL, NULL),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964, NULL, NULL),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353, NULL, NULL),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972, NULL, NULL),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39, NULL, NULL),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876, NULL, NULL),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81, NULL, NULL),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962, NULL, NULL),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7, NULL, NULL),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254, NULL, NULL),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686, NULL, NULL),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850, NULL, NULL),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82, NULL, NULL),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965, NULL, NULL),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996, NULL, NULL),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856, NULL, NULL),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371, NULL, NULL),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961, NULL, NULL),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266, NULL, NULL),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231, NULL, NULL),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218, NULL, NULL),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423, NULL, NULL),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370, NULL, NULL),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352, NULL, NULL),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853, NULL, NULL),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389, NULL, NULL),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261, NULL, NULL),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265, NULL, NULL),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60, NULL, NULL),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960, NULL, NULL),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223, NULL, NULL),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356, NULL, NULL),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692, NULL, NULL),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596, NULL, NULL),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222, NULL, NULL),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230, NULL, NULL),
(137, 'YT', 'MAYOTTE', 'Mayotte', '', 0, 269, NULL, NULL),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52, NULL, NULL),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691, NULL, NULL),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373, NULL, NULL),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377, NULL, NULL),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976, NULL, NULL),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664, NULL, NULL),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212, NULL, NULL),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258, NULL, NULL),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95, NULL, NULL),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264, NULL, NULL),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674, NULL, NULL),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977, NULL, NULL),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31, NULL, NULL),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599, NULL, NULL),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687, NULL, NULL),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64, NULL, NULL),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505, NULL, NULL),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227, NULL, NULL),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234, NULL, NULL),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683, NULL, NULL),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672, NULL, NULL),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670, NULL, NULL),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47, NULL, NULL),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968, NULL, NULL),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92, NULL, NULL),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680, NULL, NULL),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', '', 0, 970, NULL, NULL),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507, NULL, NULL),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675, NULL, NULL),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595, NULL, NULL),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51, NULL, NULL),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63, NULL, NULL),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0, NULL, NULL),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48, NULL, NULL),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351, NULL, NULL),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787, NULL, NULL),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974, NULL, NULL),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262, NULL, NULL),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40, NULL, NULL),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70, NULL, NULL),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250, NULL, NULL),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290, NULL, NULL),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869, NULL, NULL),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758, NULL, NULL),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508, NULL, NULL),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784, NULL, NULL),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684, NULL, NULL),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378, NULL, NULL),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239, NULL, NULL),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966, NULL, NULL),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221, NULL, NULL),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', '', 0, 381, NULL, NULL),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248, NULL, NULL),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232, NULL, NULL),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65, NULL, NULL),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421, NULL, NULL),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386, NULL, NULL),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677, NULL, NULL),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252, NULL, NULL),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27, NULL, NULL),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', '', 0, 0, NULL, NULL),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34, NULL, NULL),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94, NULL, NULL),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249, NULL, NULL),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597, NULL, NULL),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47, NULL, NULL),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268, NULL, NULL),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46, NULL, NULL),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41, NULL, NULL),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963, NULL, NULL),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886, NULL, NULL),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992, NULL, NULL),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255, NULL, NULL),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66, NULL, NULL),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', '', 0, 670, NULL, NULL),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228, NULL, NULL),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690, NULL, NULL),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676, NULL, NULL),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868, NULL, NULL),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216, NULL, NULL),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90, NULL, NULL),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370, NULL, NULL),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649, NULL, NULL),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688, NULL, NULL),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256, NULL, NULL),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380, NULL, NULL),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971, NULL, NULL),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44, NULL, NULL),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1, NULL, NULL),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', '', 0, 1, NULL, NULL),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598, NULL, NULL),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998, NULL, NULL),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678, NULL, NULL),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58, NULL, NULL),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84, NULL, NULL),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284, NULL, NULL),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340, NULL, NULL),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681, NULL, NULL),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212, NULL, NULL),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967, NULL, NULL),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260, NULL, NULL),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codeBdt` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minor_unit` int(11) NOT NULL,
  `symbol` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `country`, `currency`, `code`, `codeBdt`, `minor_unit`, `symbol`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', NULL, 1, '1', NULL, NULL),
(2, 'Afghanistan', 'Afghani', 'AFN', NULL, 2, '؋', NULL, NULL),
(3, 'Åland Islands', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(4, 'Albania', 'Lek', 'ALL', NULL, 2, 'Lek', NULL, NULL),
(5, 'Algeria', 'Algerian Dinar', 'DZD', NULL, 2, '', NULL, NULL),
(6, 'American Samoa', 'US Dollar', 'USD', 'USD_BDT', 2, '$', NULL, NULL),
(7, 'Andorra', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(8, 'Angola', 'Kwanza', 'AOA', NULL, 2, '', NULL, NULL),
(9, 'Anguilla', 'East Caribbean Dollar', 'XCD', NULL, 2, '', NULL, NULL),
(10, 'Antigua And Barbuda', 'East Caribbean Dollar', 'XCD', NULL, 2, '', NULL, NULL),
(11, 'Argentina', 'Argentine Peso', 'ARS', NULL, 2, '$', NULL, NULL),
(12, 'Armenia', 'Armenian Dram', 'AMD', NULL, 2, '', NULL, NULL),
(13, 'Aruba', 'Aruban Florin', 'AWG', NULL, 2, '', NULL, NULL),
(14, 'Australia', 'Australian Dollar', 'AUD', NULL, 2, '$', NULL, NULL),
(15, 'Austria', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(16, 'Azerbaijan', 'Azerbaijan Manat', 'AZN', NULL, 2, '', NULL, NULL),
(17, 'Bahamas', 'Bahamian Dollar', 'BSD', NULL, 2, '$', NULL, NULL),
(18, 'Bahrain', 'Bahraini Dinar', 'BHD', NULL, 3, '', NULL, NULL),
(19, 'Bangladesh', 'Taka', 'BDT', NULL, 2, '৳', NULL, NULL),
(20, 'Barbados', 'Barbados Dollar', 'BBD', NULL, 2, '$', NULL, NULL),
(21, 'Belarus', 'Belarusian Ruble', 'BYN', NULL, 2, '', NULL, NULL),
(22, 'Belgium', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(23, 'Belize', 'Belize Dollar', 'BZD', NULL, 2, 'BZ$', NULL, NULL),
(24, 'Benin', 'CFA Franc BCEAO', 'XOF', NULL, 0, '', NULL, NULL),
(25, 'Bermuda', 'Bermudian Dollar', 'BMD', NULL, 2, '', NULL, NULL),
(26, 'Bhutan', 'Indian Rupee', 'INR', NULL, 2, '₹', NULL, NULL),
(27, 'Bhutan', 'Ngultrum', 'BTN', NULL, 2, '', NULL, NULL),
(28, 'Bolivia', 'Boliviano', 'BOB', NULL, 2, '', NULL, NULL),
(29, 'Bolivia', 'Mvdol', 'BOV', NULL, 2, '', NULL, NULL),
(30, 'Bonaire, Sint Eustatius And Saba', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(31, 'Bosnia And Herzegovina', 'Convertible Mark', 'BAM', NULL, 2, '', NULL, NULL),
(32, 'Botswana', 'Pula', 'BWP', NULL, 2, '', NULL, NULL),
(33, 'Bouvet Island', 'Norwegian Krone', 'NOK', NULL, 2, '', NULL, NULL),
(34, 'Brazil', 'Brazilian Real', 'BRL', NULL, 2, 'R$', NULL, NULL),
(35, 'British Indian Ocean Territory', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(36, 'Brunei Darussalam', 'Brunei Dollar', 'BND', NULL, 2, '', NULL, NULL),
(37, 'Bulgaria', 'Bulgarian Lev', 'BGN', NULL, 2, 'лв', NULL, NULL),
(38, 'Burkina Faso', 'CFA Franc BCEAO', 'XOF', NULL, 0, '', NULL, NULL),
(39, 'Burundi', 'Burundi Franc', 'BIF', NULL, 0, '', NULL, NULL),
(40, 'Cabo Verde', 'Cabo Verde Escudo', 'CVE', NULL, 2, '', NULL, NULL),
(41, 'Cambodia', 'Riel', 'KHR', NULL, 2, '៛', NULL, NULL),
(42, 'Cameroon', 'CFA Franc BEAC', 'XAF', NULL, 0, '', NULL, NULL),
(43, 'Canada', 'Canadian Dollar', 'CAD', NULL, 2, '$', NULL, NULL),
(44, 'Cayman Islands', 'Cayman Islands Dollar', 'KYD', NULL, 2, '', NULL, NULL),
(45, 'Central African Republic', 'CFA Franc BEAC', 'XAF', NULL, 0, '', NULL, NULL),
(46, 'Chad', 'CFA Franc BEAC', 'XAF', NULL, 0, '', NULL, NULL),
(47, 'Chile', 'Chilean Peso', 'CLP', NULL, 0, '$', NULL, NULL),
(48, 'Chile', 'Unidad de Fomento', 'CLF', NULL, 4, '', NULL, NULL),
(49, 'China', 'Yuan Renminbi', 'CNY', NULL, 2, '¥', NULL, NULL),
(50, 'Christmas Island', 'Australian Dollar', 'AUD', NULL, 2, '', NULL, NULL),
(51, 'Cocos (keeling) Islands', 'Australian Dollar', 'AUD', NULL, 2, '', NULL, NULL),
(52, 'Colombia', 'Colombian Peso', 'COP', NULL, 2, '$', NULL, NULL),
(53, 'Colombia', 'Unidad de Valor Real', 'COU', NULL, 2, '', NULL, NULL),
(54, 'Comoros', 'Comorian Franc ', 'KMF', NULL, 0, '', NULL, NULL),
(55, 'Congo (the Democratic Republic Of The)', 'Congolese Franc', 'CDF', NULL, 2, '', NULL, NULL),
(56, 'Congo', 'CFA Franc BEAC', 'XAF', NULL, 0, '', NULL, NULL),
(57, 'Cook Islands', 'New Zealand Dollar', 'NZD', NULL, 2, '$', NULL, NULL),
(58, 'Costa Rica', 'Costa Rican Colon', 'CRC', NULL, 2, '', NULL, NULL),
(59, 'Côte D\'ivoire', 'CFA Franc BCEAO', 'XOF', NULL, 0, '', NULL, NULL),
(60, 'Croatia', 'Kuna', 'HRK', NULL, 2, 'kn', NULL, NULL),
(61, 'Cuba', 'Cuban Peso', 'CUP', NULL, 2, '', NULL, NULL),
(62, 'Cuba', 'Peso Convertible', 'CUC', NULL, 2, '', NULL, NULL),
(63, 'Curaçao', 'Netherlands Antillean Guilder', 'ANG', NULL, 2, '', NULL, NULL),
(64, 'Cyprus', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(65, 'Czechia', 'Czech Koruna', 'CZK', NULL, 2, 'Kč', NULL, NULL),
(66, 'Denmark', 'Danish Krone', 'DKK', NULL, 2, 'kr', NULL, NULL),
(67, 'Djibouti', 'Djibouti Franc', 'DJF', NULL, 0, '', NULL, NULL),
(68, 'Dominica', 'East Caribbean Dollar', 'XCD', NULL, 2, '', NULL, NULL),
(69, 'Dominican Republic', 'Dominican Peso', 'DOP', NULL, 2, '', NULL, NULL),
(70, 'Ecuador', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(71, 'Egypt', 'Egyptian Pound', 'EGP', NULL, 2, '', NULL, NULL),
(72, 'El Salvador', 'El Salvador Colon', 'SVC', NULL, 2, '', NULL, NULL),
(73, 'El Salvador', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(74, 'Equatorial Guinea', 'CFA Franc BEAC', 'XAF', NULL, 0, '', NULL, NULL),
(75, 'Eritrea', 'Nakfa', 'ERN', NULL, 2, '', NULL, NULL),
(76, 'Estonia', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(77, 'Eswatini', 'Lilangeni', 'SZL', NULL, 2, '', NULL, NULL),
(78, 'Ethiopia', 'Ethiopian Birr', 'ETB', NULL, 2, '', NULL, NULL),
(79, 'European Union', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(80, 'Falkland Islands [Malvinas]', 'Falkland Islands Pound', 'FKP', NULL, 2, '', NULL, NULL),
(81, 'Faroe Islands', 'Danish Krone', 'DKK', NULL, 2, '', NULL, NULL),
(82, 'Fiji', 'Fiji Dollar', 'FJD', NULL, 2, '', NULL, NULL),
(83, 'Finland', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(84, 'France', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(85, 'French Guiana', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(86, 'French Polynesia', 'CFP Franc', 'XPF', NULL, 0, '', NULL, NULL),
(87, 'French Southern Territories', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(88, 'Gabon', 'CFA Franc BEAC', 'XAF', NULL, 0, '', NULL, NULL),
(89, 'Gambia', 'Dalasi', 'GMD', NULL, 2, '', NULL, NULL),
(90, 'Georgia', 'Lari', 'GEL', NULL, 2, '₾', NULL, NULL),
(91, 'Germany', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(92, 'Ghana', 'Ghana Cedi', 'GHS', NULL, 2, '', NULL, NULL),
(93, 'Gibraltar', 'Gibraltar Pound', 'GIP', NULL, 2, '', NULL, NULL),
(94, 'Greece', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(95, 'Greenland', 'Danish Krone', 'DKK', NULL, 2, '', NULL, NULL),
(96, 'Grenada', 'East Caribbean Dollar', 'XCD', NULL, 2, '', NULL, NULL),
(97, 'Guadeloupe', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(98, 'Guam', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(99, 'Guatemala', 'Quetzal', 'GTQ', NULL, 2, '', NULL, NULL),
(100, 'Guernsey', 'Pound Sterling', 'GBP', NULL, 2, '£', NULL, NULL),
(101, 'Guinea', 'Guinean Franc', 'GNF', NULL, 0, '', NULL, NULL),
(102, 'Guinea-bissau', 'CFA Franc BCEAO', 'XOF', NULL, 0, '', NULL, NULL),
(103, 'Guyana', 'Guyana Dollar', 'GYD', NULL, 2, '', NULL, NULL),
(104, 'Haiti', 'Gourde', 'HTG', NULL, 2, '', NULL, NULL),
(105, 'Haiti', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(106, 'Heard Island And Mcdonald Islands', 'Australian Dollar', 'AUD', NULL, 2, '', NULL, NULL),
(107, 'Holy See (Vatican)', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(108, 'Honduras', 'Lempira', 'HNL', NULL, 2, '', NULL, NULL),
(109, 'Hong Kong', 'Hong Kong Dollar', 'HKD', NULL, 2, '$', NULL, NULL),
(110, 'Hungary', 'Forint', 'HUF', NULL, 2, 'ft', NULL, NULL),
(111, 'Iceland', 'Iceland Krona', 'ISK', NULL, 0, '', NULL, NULL),
(112, 'India', 'Indian Rupee', 'INR', NULL, 2, '₹', NULL, NULL),
(113, 'Indonesia', 'Rupiah', 'IDR', NULL, 2, 'Rp', NULL, NULL),
(114, 'International Monetary Fund (IMF)', 'SDR (Special Drawing Right)', 'XDR', NULL, 0, '', NULL, NULL),
(115, 'Iran', 'Iranian Rial', 'IRR', NULL, 2, '', NULL, NULL),
(116, 'Iraq', 'Iraqi Dinar', 'IQD', NULL, 3, '', NULL, NULL),
(117, 'Ireland', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(118, 'Isle Of Man', 'Pound Sterling', 'GBP', NULL, 2, '£', NULL, NULL),
(119, 'Israel', 'New Israeli Sheqel', 'ILS', NULL, 2, '₪', NULL, NULL),
(120, 'Italy', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(121, 'Jamaica', 'Jamaican Dollar', 'JMD', NULL, 2, '', NULL, NULL),
(122, 'Japan', 'Yen', 'JPY', NULL, 0, '¥', NULL, NULL),
(123, 'Jersey', 'Pound Sterling', 'GBP', NULL, 2, '£', NULL, NULL),
(124, 'Jordan', 'Jordanian Dinar', 'JOD', NULL, 3, '', NULL, NULL),
(125, 'Kazakhstan', 'Tenge', 'KZT', NULL, 2, '', NULL, NULL),
(126, 'Kenya', 'Kenyan Shilling', 'KES', NULL, 2, 'Ksh', NULL, NULL),
(127, 'Kiribati', 'Australian Dollar', 'AUD', NULL, 2, '', NULL, NULL),
(128, 'Korea (the Democratic People’s Republic Of)', 'North Korean Won', 'KPW', NULL, 2, '', NULL, NULL),
(129, 'Korea (the Republic Of)', 'Won', 'KRW', NULL, 0, '₩', NULL, NULL),
(130, 'Kuwait', 'Kuwaiti Dinar', 'KWD', NULL, 3, '', NULL, NULL),
(131, 'Kyrgyzstan', 'Som', 'KGS', NULL, 2, '', NULL, NULL),
(132, 'Lao People’s Democratic Republic', 'Lao Kip', 'LAK', NULL, 2, '', NULL, NULL),
(133, 'Latvia', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(134, 'Lebanon', 'Lebanese Pound', 'LBP', NULL, 2, '', NULL, NULL),
(135, 'Lesotho', 'Loti', 'LSL', NULL, 2, '', NULL, NULL),
(136, 'Lesotho', 'Rand', 'ZAR', NULL, 2, '', NULL, NULL),
(137, 'Liberia', 'Liberian Dollar', 'LRD', NULL, 2, '', NULL, NULL),
(138, 'Libya', 'Libyan Dinar', 'LYD', NULL, 3, '', NULL, NULL),
(139, 'Liechtenstein', 'Swiss Franc', 'CHF', NULL, 2, '', NULL, NULL),
(140, 'Lithuania', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(141, 'Luxembourg', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(142, 'Macao', 'Pataca', 'MOP', NULL, 2, '', NULL, NULL),
(143, 'North Macedonia', 'Denar', 'MKD', NULL, 2, '', NULL, NULL),
(144, 'Madagascar', 'Malagasy Ariary', 'MGA', NULL, 2, '', NULL, NULL),
(145, 'Malawi', 'Malawi Kwacha', 'MWK', NULL, 2, '', NULL, NULL),
(146, 'Malaysia', 'Malaysian Ringgit', 'MYR', NULL, 2, 'RM', NULL, NULL),
(147, 'Maldives', 'Rufiyaa', 'MVR', NULL, 2, '', NULL, NULL),
(148, 'Mali', 'CFA Franc BCEAO', 'XOF', NULL, 0, '', NULL, NULL),
(149, 'Malta', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(150, 'Marshall Islands', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(151, 'Martinique', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(152, 'Mauritania', 'Ouguiya', 'MRU', NULL, 2, '', NULL, NULL),
(153, 'Mauritius', 'Mauritius Rupee', 'MUR', NULL, 2, '', NULL, NULL),
(154, 'Mayotte', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(155, 'Member Countries Of The African Development Bank Group', 'ADB Unit of Account', 'XUA', NULL, 0, '', NULL, NULL),
(156, 'Mexico', 'Mexican Peso', 'MXN', NULL, 2, '$', NULL, NULL),
(157, 'Mexico', 'Mexican Unidad de Inversion (UDI)', 'MXV', NULL, 2, '', NULL, NULL),
(158, 'Micronesia', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(159, 'Moldova', 'Moldovan Leu', 'MDL', NULL, 2, '', NULL, NULL),
(160, 'Monaco', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(161, 'Mongolia', 'Tugrik', 'MNT', NULL, 2, '', NULL, NULL),
(162, 'Montenegro', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(163, 'Montserrat', 'East Caribbean Dollar', 'XCD', NULL, 2, '', NULL, NULL),
(164, 'Morocco', 'Moroccan Dirham', 'MAD', NULL, 2, ' .د.م ', NULL, NULL),
(165, 'Mozambique', 'Mozambique Metical', 'MZN', NULL, 2, '', NULL, NULL),
(166, 'Myanmar', 'Kyat', 'MMK', NULL, 2, '', NULL, NULL),
(167, 'Namibia', 'Namibia Dollar', 'NAD', NULL, 2, '', NULL, NULL),
(168, 'Namibia', 'Rand', 'ZAR', NULL, 2, '', NULL, NULL),
(169, 'Nauru', 'Australian Dollar', 'AUD', NULL, 2, '', NULL, NULL),
(170, 'Nepal', 'Nepalese Rupee', 'NPR', NULL, 2, '', NULL, NULL),
(171, 'Netherlands', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(172, 'New Caledonia', 'CFP Franc', 'XPF', NULL, 0, '', NULL, NULL),
(173, 'New Zealand', 'New Zealand Dollar', 'NZD', NULL, 2, '$', NULL, NULL),
(174, 'Nicaragua', 'Cordoba Oro', 'NIO', NULL, 2, '', NULL, NULL),
(175, 'Niger', 'CFA Franc BCEAO', 'XOF', NULL, 0, '', NULL, NULL),
(176, 'Nigeria', 'Naira', 'NGN', NULL, 2, '₦', NULL, NULL),
(177, 'Niue', 'New Zealand Dollar', 'NZD', NULL, 2, '$', NULL, NULL),
(178, 'Norfolk Island', 'Australian Dollar', 'AUD', NULL, 2, '', NULL, NULL),
(179, 'Northern Mariana Islands', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(180, 'Norway', 'Norwegian Krone', 'NOK', NULL, 2, 'kr', NULL, NULL),
(181, 'Oman', 'Rial Omani', 'OMR', NULL, 3, '', NULL, NULL),
(182, 'Pakistan', 'Pakistan Rupee', 'PKR', NULL, 2, 'Rs', NULL, NULL),
(183, 'Palau', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(184, 'Panama', 'Balboa', 'PAB', NULL, 2, '', NULL, NULL),
(185, 'Panama', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(186, 'Papua New Guinea', 'Kina', 'PGK', NULL, 2, '', NULL, NULL),
(187, 'Paraguay', 'Guarani', 'PYG', NULL, 0, '', NULL, NULL),
(188, 'Peru', 'Sol', 'PEN', NULL, 2, 'S', NULL, NULL),
(189, 'Philippines', 'Philippine Peso', 'PHP', NULL, 2, '₱', NULL, NULL),
(190, 'Pitcairn', 'New Zealand Dollar', 'NZD', NULL, 2, '$', NULL, NULL),
(191, 'Poland', 'Zloty', 'PLN', NULL, 2, 'zł', NULL, NULL),
(192, 'Portugal', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(193, 'Puerto Rico', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(194, 'Qatar', 'Qatari Rial', 'QAR', NULL, 2, '', NULL, NULL),
(195, 'Réunion', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(196, 'Romania', 'Romanian Leu', 'RON', NULL, 2, 'lei', NULL, NULL),
(197, 'Russian Federation', 'Russian Ruble', 'RUB', NULL, 2, '₽', NULL, NULL),
(198, 'Rwanda', 'Rwanda Franc', 'RWF', NULL, 0, '', NULL, NULL),
(199, 'Saint Barthélemy', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(200, 'Saint Helena, Ascension And Tristan Da Cunha', 'Saint Helena Pound', 'SHP', NULL, 2, '', NULL, NULL),
(201, 'Saint Kitts And Nevis', 'East Caribbean Dollar', 'XCD', NULL, 2, '', NULL, NULL),
(202, 'Saint Lucia', 'East Caribbean Dollar', 'XCD', NULL, 2, '', NULL, NULL),
(203, 'Saint Martin (French Part)', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(204, 'Saint Pierre And Miquelon', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(205, 'Saint Vincent And The Grenadines', 'East Caribbean Dollar', 'XCD', NULL, 2, '', NULL, NULL),
(206, 'Samoa', 'Tala', 'WST', NULL, 2, '', NULL, NULL),
(207, 'San Marino', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(208, 'Sao Tome And Principe', 'Dobra', 'STN', NULL, 2, '', NULL, NULL),
(209, 'Saudi Arabia', 'Saudi Riyal', 'SAR', NULL, 2, '', NULL, NULL),
(210, 'Senegal', 'CFA Franc BCEAO', 'XOF', NULL, 0, '', NULL, NULL),
(211, 'Serbia', 'Serbian Dinar', 'RSD', NULL, 2, '', NULL, NULL),
(212, 'Seychelles', 'Seychelles Rupee', 'SCR', NULL, 2, '', NULL, NULL),
(213, 'Sierra Leone', 'Leone', 'SLL', NULL, 2, '', NULL, NULL),
(214, 'Singapore', 'Singapore Dollar', 'SGD', NULL, 2, '$', NULL, NULL),
(215, 'Sint Maarten (Dutch Part)', 'Netherlands Antillean Guilder', 'ANG', NULL, 2, '', NULL, NULL),
(216, 'Sistema Unitario De Compensacion Regional De Pagos \"sucre\"\"\"', 'Sucre', 'XSU', NULL, 0, '', NULL, NULL),
(217, 'Slovakia', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(218, 'Slovenia', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(219, 'Solomon Islands', 'Solomon Islands Dollar', 'SBD', NULL, 2, '', NULL, NULL),
(220, 'Somalia', 'Somali Shilling', 'SOS', NULL, 2, '', NULL, NULL),
(221, 'South Africa', 'Rand', 'ZAR', NULL, 2, 'R', NULL, NULL),
(222, 'South Sudan', 'South Sudanese Pound', 'SSP', NULL, 2, '', NULL, NULL),
(223, 'Spain', 'Euro', 'EUR', NULL, 2, '€', NULL, NULL),
(224, 'Sri Lanka', 'Sri Lanka Rupee', 'LKR', NULL, 2, 'Rs', NULL, NULL),
(225, 'Sudan (the)', 'Sudanese Pound', 'SDG', NULL, 2, '', NULL, NULL),
(226, 'Suriname', 'Surinam Dollar', 'SRD', NULL, 2, '', NULL, NULL),
(227, 'Svalbard And Jan Mayen', 'Norwegian Krone', 'NOK', NULL, 2, '', NULL, NULL),
(228, 'Sweden', 'Swedish Krona', 'SEK', NULL, 2, 'kr', NULL, NULL),
(229, 'Switzerland', 'Swiss Franc', 'CHF', NULL, 2, '', NULL, NULL),
(230, 'Switzerland', 'WIR Euro', 'CHE', NULL, 2, '', NULL, NULL),
(231, 'Switzerland', 'WIR Franc', 'CHW', NULL, 2, '', NULL, NULL),
(232, 'Syrian Arab Republic', 'Syrian Pound', 'SYP', NULL, 2, '', NULL, NULL),
(233, 'Taiwan', 'New Taiwan Dollar', 'TWD', NULL, 2, '', NULL, NULL),
(234, 'Tajikistan', 'Somoni', 'TJS', NULL, 2, '', NULL, NULL),
(235, 'Tanzania, United Republic Of', 'Tanzanian Shilling', 'TZS', NULL, 2, '', NULL, NULL),
(236, 'Thailand', 'Baht', 'THB', NULL, 2, '฿', NULL, NULL),
(237, 'Timor-leste', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(238, 'Togo', 'CFA Franc BCEAO', 'XOF', NULL, 0, '', NULL, NULL),
(239, 'Tokelau', 'New Zealand Dollar', 'NZD', NULL, 2, '$', NULL, NULL),
(240, 'Tonga', 'Pa’anga', 'TOP', NULL, 2, '', NULL, NULL),
(241, 'Trinidad And Tobago', 'Trinidad and Tobago Dollar', 'TTD', NULL, 2, '', NULL, NULL),
(242, 'Tunisia', 'Tunisian Dinar', 'TND', NULL, 3, '', NULL, NULL),
(243, 'Turkey', 'Turkish Lira', 'TRY', NULL, 2, '₺', NULL, NULL),
(244, 'Turkmenistan', 'Turkmenistan New Manat', 'TMT', NULL, 2, '', NULL, NULL),
(245, 'Turks And Caicos Islands', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(246, 'Tuvalu', 'Australian Dollar', 'AUD', NULL, 2, '', NULL, NULL),
(247, 'Uganda', 'Uganda Shilling', 'UGX', NULL, 0, '', NULL, NULL),
(248, 'Ukraine', 'Hryvnia', 'UAH', NULL, 2, '₴', NULL, NULL),
(249, 'United Arab Emirates', 'UAE Dirham', 'AED', NULL, 2, 'د.إ', NULL, NULL),
(250, 'United Kingdom Of Great Britain And Northern Ireland', 'Pound Sterling', 'GBP', NULL, 2, '£', NULL, NULL),
(251, 'United States Minor Outlying Islands', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(252, 'United States Of America', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(253, 'United States Of America', 'US Dollar (Next day)', 'USN', NULL, 2, '', NULL, NULL),
(254, 'Uruguay', 'Peso Uruguayo', 'UYU', NULL, 2, '', NULL, NULL),
(255, 'Uruguay', 'Uruguay Peso en Unidades Indexadas (UI)', 'UYI', NULL, 0, '', NULL, NULL),
(256, 'Uruguay', 'Unidad Previsional', 'UYW', NULL, 4, '', NULL, NULL),
(257, 'Uzbekistan', 'Uzbekistan Sum', 'UZS', NULL, 2, '', NULL, NULL),
(258, 'Vanuatu', 'Vatu', 'VUV', NULL, 0, '', NULL, NULL),
(259, 'Venezuela', 'Bolívar Soberano', 'VES', NULL, 2, '', NULL, NULL),
(260, 'Vietnam', 'Dong', 'VND', NULL, 0, '₫', NULL, NULL),
(261, 'Virgin Islands (British)', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(262, 'Virgin Islands (U.S.)', 'US Dollar', 'USD', NULL, 2, '$', NULL, NULL),
(263, 'Wallis And Futuna', 'CFP Franc', 'XPF', NULL, 0, '', NULL, NULL),
(264, 'Western Sahara', 'Moroccan Dirham', 'MAD', NULL, 2, '', NULL, NULL),
(265, 'Yemen', 'Yemeni Rial', 'YER', NULL, 2, '', NULL, NULL),
(266, 'Zambia', 'Zambian Kwacha', 'ZMW', NULL, 2, '', NULL, NULL),
(267, 'Zimbabwe', 'Zimbabwe Dollar', 'ZWL', NULL, 2, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_bn_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `district_name`, `district_bn_name`, `lat`, `lon`, `website`, `created_at`, `updated_at`) VALUES
(1, 3, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd', NULL, NULL),
(2, 3, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd', NULL, NULL),
(3, 3, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd', NULL, NULL),
(4, 3, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd', NULL, NULL),
(5, 3, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd', NULL, NULL),
(6, 3, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd', NULL, NULL),
(7, 3, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd', NULL, NULL),
(8, 3, 'Manikganj', 'মানিকগঞ্জ', '0', '0', 'www.manikganj.gov.bd', NULL, NULL),
(9, 3, 'Munshiganj', 'মুন্সিগঞ্জ', '0', '0', 'www.munshiganj.gov.bd', NULL, NULL),
(10, 3, 'Mymensingh', 'ময়মনসিং', '0', '0', 'www.mymensingh.gov.bd', NULL, NULL),
(11, 3, 'Narayanganj', 'নারায়াণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd', NULL, NULL),
(12, 3, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd', NULL, NULL),
(13, 3, 'Netrokona', 'নেত্রকোনা', '24.870955', '90.727887', 'www.netrokona.gov.bd', NULL, NULL),
(14, 3, 'Rajbari', 'রাজবাড়ি', '23.7574305', '89.6444665', 'www.rajbari.gov.bd', NULL, NULL),
(15, 3, 'Shariatpur', 'শরীয়তপুর', '0', '0', 'www.shariatpur.gov.bd', NULL, NULL),
(16, 3, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd', NULL, NULL),
(17, 3, 'Tangail', 'টাঙ্গাইল', '0', '0', 'www.tangail.gov.bd', NULL, NULL),
(18, 5, 'Bogra', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd', NULL, NULL),
(19, 5, 'Joypurhat', 'জয়পুরহাট', '0', '0', 'www.joypurhat.gov.bd', NULL, NULL),
(20, 5, 'Naogaon', 'নওগাঁ', '0', '0', 'www.naogaon.gov.bd', NULL, NULL),
(21, 5, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd', NULL, NULL),
(22, 5, 'Nawabganj', 'নবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd', NULL, NULL),
(23, 5, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd', NULL, NULL),
(24, 5, 'Rajshahi', 'রাজশাহী', '0', '0', 'www.rajshahi.gov.bd', NULL, NULL),
(25, 5, 'Sirajgonj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd', NULL, NULL),
(26, 6, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd', NULL, NULL),
(27, 6, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd', NULL, NULL),
(28, 6, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd', NULL, NULL),
(29, 6, 'Lalmonirhat', 'লালমনিরহাট', '0', '0', 'www.lalmonirhat.gov.bd', NULL, NULL),
(30, 6, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd', NULL, NULL),
(31, 6, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd', NULL, NULL),
(32, 6, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd', NULL, NULL),
(33, 6, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd', NULL, NULL),
(34, 1, 'Barguna', 'বরগুনা', '0', '0', 'www.barguna.gov.bd', NULL, NULL),
(35, 1, 'Barisal', 'বরিশাল', '0', '0', 'www.barisal.gov.bd', NULL, NULL),
(36, 1, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd', NULL, NULL),
(37, 1, 'Jhalokati', 'ঝালকাঠি', '0', '0', 'www.jhalakathi.gov.bd', NULL, NULL),
(38, 1, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd', NULL, NULL),
(39, 1, 'Pirojpur', 'পিরোজপুর', '0', '0', 'www.pirojpur.gov.bd', NULL, NULL),
(40, 2, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd', NULL, NULL),
(41, 2, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd', NULL, NULL),
(42, 2, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd', NULL, NULL),
(43, 2, 'Chittagong', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd', NULL, NULL),
(44, 2, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd', NULL, NULL),
(45, 2, 'Cox\'s Bazar', 'কক্স বাজার', '0', '0', 'www.coxsbazar.gov.bd', NULL, NULL),
(46, 2, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd', NULL, NULL),
(47, 2, 'Khagrachari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd', NULL, NULL),
(48, 2, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd', NULL, NULL),
(49, 2, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd', NULL, NULL),
(50, 2, 'Rangamati', 'রাঙ্গামাটি', '0', '0', 'www.rangamati.gov.bd', NULL, NULL),
(51, 7, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd', NULL, NULL),
(52, 7, 'Maulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd', NULL, NULL),
(53, 7, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd', NULL, NULL),
(54, 7, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd', NULL, NULL),
(55, 4, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd', NULL, NULL),
(56, 4, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd', NULL, NULL),
(57, 4, 'Jessore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd', NULL, NULL),
(58, 4, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd', NULL, NULL),
(59, 4, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd', NULL, NULL),
(60, 4, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd', NULL, NULL),
(61, 4, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd', NULL, NULL),
(62, 4, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd', NULL, NULL),
(63, 4, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd', NULL, NULL),
(64, 4, 'Satkhira', 'সাতক্ষীরা', '0', '0', 'www.satkhira.gov.bd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_bn_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `division_name`, `division_bn_name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Barisal', 'বরিশাল', 18, NULL, NULL),
(2, 'Chittagong', 'চট্টগ্রাম', 18, NULL, NULL),
(3, 'Dhaka', 'ঢাকা', 18, NULL, NULL),
(4, 'Khulna', 'খুলনা', 18, NULL, NULL),
(5, 'Rajshahi', 'রাজশাহী', 18, NULL, NULL),
(6, 'Rangpur', 'রংপুর', 18, NULL, NULL),
(7, 'Sylhet', 'সিলেট', 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `employeeAttendanceId` bigint(20) UNSIGNED NOT NULL,
  `employeEntryId` int(11) NOT NULL,
  `employeeInDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeeInTime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeeOutDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employeeOutTime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendanceStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`employeeAttendanceId`, `employeEntryId`, `employeeInDate`, `employeeInTime`, `employeeOutDate`, `employeeOutTime`, `attendanceStatus`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 2, '02-07-2020', '00:00', NULL, '00:00', 'L', 1, 1, 3, NULL, '2020-07-02 09:35:45', NULL),
(2, 1, '02-07-2020', '00:00', NULL, '00:00', 'L', 1, 1, 3, NULL, '2020-07-02 09:35:45', NULL),
(3, 3, '02-07-2020', '00:00', NULL, NULL, 'A', 1, 1, 3, NULL, '2020-07-02 09:35:46', NULL),
(4, 4, '02-07-2020', '00:00', NULL, NULL, 'A', 1, 1, 3, NULL, '2020-07-02 09:35:46', NULL),
(5, 5, '02-07-2020', '00:00', NULL, NULL, 'A', 1, 1, 3, NULL, '2020-07-02 09:35:46', NULL),
(6, 6, '02-07-2020', '03:36:05 PM', NULL, NULL, 'P', 1, 1, 3, NULL, '2020-07-02 09:35:46', '2020-07-02 09:36:05'),
(7, 6, '15-07-2020', '00:00', NULL, NULL, 'A', 1, 1, 3, NULL, '2020-07-15 05:12:48', NULL),
(8, 5, '15-07-2020', '00:00', NULL, NULL, 'A', 1, 1, 3, NULL, '2020-07-15 05:12:48', NULL),
(9, 4, '15-07-2020', '00:00', NULL, NULL, 'A', 1, 1, 3, NULL, '2020-07-15 05:12:48', NULL),
(10, 3, '15-07-2020', '00:00', NULL, NULL, 'A', 1, 1, 3, NULL, '2020-07-15 05:12:48', NULL),
(11, 2, '15-07-2020', '00:00', NULL, NULL, 'A', 1, 1, 3, NULL, '2020-07-15 05:12:48', NULL),
(12, 1, '15-07-2020', '00:00', NULL, NULL, 'A', 1, 1, 3, NULL, '2020-07-15 05:12:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_banking_entries`
--

CREATE TABLE `employee_banking_entries` (
  `employeeBankingId` bigint(20) UNSIGNED NOT NULL,
  `employeEntryId` int(11) NOT NULL,
  `bankTypeId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankNameId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountNumber` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_banking_entries`
--

INSERT INTO `employee_banking_entries` (`employeeBankingId`, `employeEntryId`, `bankTypeId`, `bankNameId`, `accountName`, `accountNumber`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, '2', '4', 'Malek', 119191919, 1, 1, 3, NULL, '2020-04-16 13:26:59', '2020-04-16 13:26:59'),
(2, 1, '2', '5', 'Malek', 119191919, 1, 1, 3, NULL, '2020-04-19 08:04:26', '2020-04-19 08:04:26'),
(3, 2, '2', '5', 'Malek', 119191919, 1, 1, 3, NULL, '2020-04-19 08:04:36', '2020-04-19 08:04:36'),
(4, 1, '1', '5', 'Malek', 119191919, 1, 1, 3, NULL, '2020-04-22 14:46:19', '2020-04-22 14:46:19'),
(5, 1, '2', '3', 'Malek', 119191919, 1, 1, 3, NULL, '2020-04-22 14:46:42', '2020-04-22 14:46:42'),
(6, 8, '1', '8', 'dd', 222, 1, 1, 3, NULL, '2020-10-16 16:59:59', '2020-10-16 16:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `employee_education_entries`
--

CREATE TABLE `employee_education_entries` (
  `employeeEducationId` bigint(20) UNSIGNED NOT NULL,
  `employeEntryId` int(11) NOT NULL,
  `nameOfInstituteId` int(11) NOT NULL,
  `nameOfDegreeId` int(11) NOT NULL,
  `gradeId` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_education_entries`
--

INSERT INTO `employee_education_entries` (`employeeEducationId`, `employeEntryId`, `nameOfInstituteId`, `nameOfDegreeId`, `gradeId`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 3, 3, 1, 1, 3, NULL, '2020-04-16 11:38:12', '2020-04-16 11:38:12'),
(2, 2, 2, 3, 1, 1, 1, 3, NULL, '2020-04-16 11:38:25', '2020-04-16 11:38:25'),
(3, 2, 5, 3, 3, 1, 1, 3, NULL, '2020-04-19 06:53:48', '2020-04-19 06:53:48'),
(4, 1, 2, 3, 3, 1, 1, 3, NULL, '2020-06-28 14:38:43', '2020-06-28 14:38:43'),
(5, 8, 5, 3, 3, 1, 1, 3, NULL, '2020-10-16 16:59:02', '2020-10-16 16:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave_entries`
--

CREATE TABLE `employee_leave_entries` (
  `employeeLeaveId` bigint(20) UNSIGNED NOT NULL,
  `employeEntryId` int(11) NOT NULL,
  `startDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commitment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leave_entries`
--

INSERT INTO `employee_leave_entries` (`employeeLeaveId`, `employeEntryId`, `startDate`, `endDate`, `commitment`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(3, 1, '2020-07-01', '2020-07-06', 'tik', 1, 1, 3, NULL, '2020-07-02 09:35:20', '2020-07-02 09:35:20'),
(4, 2, '2020-07-01', '2020-07-08', 'ok', 1, 1, 3, NULL, '2020-07-02 09:35:38', '2020-07-02 09:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `employee_professional_entries`
--

CREATE TABLE `employee_professional_entries` (
  `employeeProfessionalId` bigint(20) UNSIGNED NOT NULL,
  `employeEntryId` int(11) NOT NULL,
  `organizationName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearOfExprience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_professional_entries`
--

INSERT INTO `employee_professional_entries` (`employeeProfessionalId`, `employeEntryId`, `organizationName`, `designation`, `yearOfExprience`, `address`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rana Garmans', 'Rana', '2 Years', 'Dhaka', 1, 1, 3, NULL, '2020-04-16 11:42:26', '2020-04-16 11:42:26'),
(2, 8, 'feni', 'ce', '3', 'fsdf', 1, 1, 3, NULL, '2020-10-16 16:59:19', '2020-10-16 16:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `employee_skill_entries`
--

CREATE TABLE `employee_skill_entries` (
  `employeeSkillId` bigint(20) UNSIGNED NOT NULL,
  `employeEntryId` int(11) NOT NULL,
  `skillType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameOfInstitute` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durationOfSkill` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skillGradeId` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_skill_entries`
--

INSERT INTO `employee_skill_entries` (`employeeSkillId`, `employeEntryId`, `skillType`, `nameOfInstitute`, `durationOfSkill`, `skillGradeId`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lorem', 'Lorem me', '201', 2, 1, 1, 3, NULL, '2020-04-16 11:55:59', '2020-04-16 11:55:59'),
(2, 1, 'Lorem', 'School', '201', 3, 1, 1, 3, NULL, '2020-04-19 08:02:45', '2020-04-19 08:02:45'),
(3, 8, 'fsdf', 'dsf', 'd', 3, 1, 1, 3, NULL, '2020-10-16 16:59:32', '2020-10-16 16:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade_entries`
--

CREATE TABLE `grade_entries` (
  `gradeEntryId` bigint(20) UNSIGNED NOT NULL,
  `gradeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gradeAmount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gradeStatus` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_entries`
--

INSERT INTO `grade_entries` (`gradeEntryId`, `gradeName`, `gradeAmount`, `gradeStatus`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'A-', '75', 1, 1, 1, 3, 3, '2020-04-06 10:46:22', '2020-12-30 09:04:26'),
(2, 'B-', '65', 1, 1, 1, 3, 3, '2020-04-06 11:24:43', '2020-04-06 12:18:00'),
(3, 'C +', '50', 1, 1, 1, 3, 3, '2020-04-06 11:25:17', '2020-04-18 11:42:20'),
(4, 'D +', '60', 1, 1, 1, 3, 3, '2020-04-18 10:49:26', '2020-04-18 11:42:06'),
(5, 'A+', '85', 1, 1, 1, 3, 3, '2020-04-18 10:52:31', '2020-04-18 11:42:07'),
(6, 'F', '40', 1, 1, 1, 3, NULL, '2020-04-18 11:42:37', '2020-04-18 11:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_for_type_lists`
--

CREATE TABLE `invoice_for_type_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_for_type_lists`
--

INSERT INTO `invoice_for_type_lists` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sales', 1, '2021-03-09 05:04:33', '2021-03-09 05:04:33'),
(2, 'Purchase', 1, '2021-03-09 05:04:33', '2021-03-09 05:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_setups`
--

CREATE TABLE `invoice_setups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopId` int(11) NOT NULL,
  `invoiceForId` int(11) NOT NULL,
  `invoiceTypeId` int(11) NOT NULL,
  `invoiceFormetId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_setups`
--

INSERT INTO `invoice_setups` (`id`, `shopId`, `invoiceForId`, `invoiceTypeId`, `invoiceFormetId`, `status`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 1, 1, 1, 1, '2021-03-14 10:40:19', '2021-03-14 10:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_setup_details`
--

CREATE TABLE `invoice_setup_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoiceSetupId` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `toText` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titleText` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `themeColor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subTotal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grandTotal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noticeTitle` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noticeDetails` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generatedFrom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thankyou` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_setup_details`
--

INSERT INTO `invoice_setup_details` (`id`, `invoiceSetupId`, `logo`, `address`, `toText`, `titleText`, `themeColor`, `subTotal`, `vat`, `discount`, `grandTotal`, `noticeTitle`, `noticeDetails`, `generatedFrom`, `thankyou`, `created_at`, `updated_at`) VALUES
(2, 2, '1615718419.png', '99 shersha suri road, Townhall, Mohammadpur, Dhaka-1207, Bangladesh.', 'Customer Information', 'Invoice#', '#00ad23', 'Sub Total', 'Vat', 'Discount', 'Grand Total', 'Notice :', 'This is notice box.', 'Invoice was created on a computer and is valid without the signature and seal.', 'Thank You !', '2021-03-14 10:40:20', '2021-03-14 10:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_type_lists`
--

CREATE TABLE `invoice_type_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_type_lists`
--

INSERT INTO `invoice_type_lists` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Printer', 1, '2021-03-09 06:54:46', '2021-03-09 06:54:46'),
(2, 'POS Machin', 1, '2021-03-09 06:54:46', '2021-03-09 06:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `job_department_entries`
--

CREATE TABLE `job_department_entries` (
  `jobDepartmentEntryId` bigint(20) UNSIGNED NOT NULL,
  `employeeTypeId` int(11) NOT NULL,
  `jobDepartmentName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jobDepartmentStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_department_entries`
--

INSERT INTO `job_department_entries` (`jobDepartmentEntryId`, `employeeTypeId`, `jobDepartmentName`, `jobDepartmentStatus`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(3, 2, 'Markting', '1', 1, 1, 3, NULL, '2020-04-22 11:42:41', '2020-04-22 11:42:41'),
(4, 6, 'Online', '1', 1, 1, 3, NULL, '2020-06-25 06:23:58', '2020-06-25 06:23:58'),
(5, 7, 'Ofline', '1', 1, 1, 3, NULL, '2020-06-28 08:04:30', '2020-06-28 08:04:30'),
(6, 3, 'Saler', '1', 1, 1, 3, NULL, '2020-06-28 08:04:47', '2020-06-28 08:04:47'),
(7, 2, 'Area Saler', '1', 1, 1, 3, 3, '2020-06-28 08:04:58', '2020-12-14 05:19:38'),
(8, 9, 'IT Security', '1', 2, 2, 14, NULL, '2020-12-14 05:15:49', '2020-12-14 05:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(51, '2014_10_12_000000_create_users_table', 1),
(52, '2014_10_12_100000_create_password_resets_table', 1),
(53, '2019_08_19_000000_create_failed_jobs_table', 1),
(56, '2020_02_03_045618_create_brand_entries_table', 1),
(57, '2020_02_03_063049_create_admin_types_table', 1),
(58, '2020_02_03_090508_create_admin_sub_menus_table', 1),
(59, '2020_02_03_090730_create_admin_menus_table', 1),
(60, '2020_02_03_100621_create_admin_menu_permissions_table', 1),
(61, '2020_02_05_164421_create_admin_entries_table', 1),
(62, '2020_02_05_175229_create_admin_setups_table', 1),
(64, '2020_02_13_115001_create_unite_entries_table', 1),
(65, '2020_02_13_150905_create_bank_type_entries_table', 1),
(66, '2020_02_13_153156_create_bank_entries_table', 1),
(67, '2020_02_13_155043_create_asset_brand_entries_table', 1),
(68, '2020_02_15_102600_create_shop_customer_type_entries_table', 1),
(69, '2020_02_15_113621_create_admin_bussiness_types_table', 1),
(71, '2020_02_15_153841_create_commission_type_entries_table', 1),
(72, '2020_02_15_163930_create_admin_holiday_types_table', 1),
(73, '2020_02_15_183557_create_admin_holiday_setups_table', 1),
(75, '2020_02_16_100426_create_adminlicence_types_table', 1),
(76, '2020_02_16_111531_create_admin_meta_key_descriptions_table', 1),
(80, '2020_03_03_182955_create_shop_menu_permissions_table', 1),
(83, '2020_03_08_120334_create_shop_loan_provider_entries_table', 1),
(85, '2020_03_08_170427_create_shop_loan_entries_table', 1),
(86, '2020_03_09_094942_create_shop_add_bank_entries_table', 1),
(87, '2020_03_09_120607_create_shop_expence_type_entries_table', 1),
(88, '2020_03_09_150634_create_shop_income_type_entries_table', 1),
(89, '2020_03_09_180509_create_shop_employee_login_time_entries_table', 1),
(91, '2020_03_12_114805_create_categories_table', 2),
(92, '2020_03_15_152314_create_shop_add_income_types_table', 3),
(97, '2020_03_08_111707_create_add_product_supplier_entries_table', 7),
(98, '2020_03_08_160800_create_shop_add_asset_supplier_entries_table', 8),
(101, '2020_03_21_174828_create_admin_purchase_types_table', 10),
(105, '2020_03_21_194801_create_product_categories_table', 11),
(107, '2020_03_21_195710_create_product_names_table', 12),
(113, '2020_03_22_124356_create_purchase_product_entries_table', 13),
(123, '2020_02_17_161955_create_product_brand_entries_table', 16),
(125, '2020_03_22_123533_create_purchase_invoices_table', 17),
(126, '2020_03_26_173752_create_product_price_setup_details_table', 18),
(130, '2020_04_06_163655_create_grade_entries_table', 20),
(132, '2020_04_15_142827_create_admin_name_of_institutes_table', 22),
(133, '2020_04_15_142908_create_admin_name_of_degrees_table', 22),
(134, '2020_04_15_142925_create_admin_grades_table', 22),
(135, '2020_04_15_142949_create_admin_skill_grades_table', 22),
(136, '2020_03_02_191519_create_shop_employee_entries_table', 23),
(138, '2020_04_16_165452_create_employee_education_entries_table', 24),
(139, '2020_04_16_173239_create_employee_professional_entries_table', 24),
(140, '2020_04_16_175112_create_employee_skill_entries_table', 25),
(141, '2020_04_16_192416_create_employee_banking_entries_table', 26),
(144, '2020_04_18_185504_create_salary_grade_setups_table', 27),
(146, '2020_03_02_152213_create_shop_employee_types_table', 28),
(147, '2020_02_16_095356_create_job_department_entries_table', 29),
(153, '2020_06_26_171056_create_start_salary_setups_table', 30),
(164, '2020_06_27_170923_create_employee_leave_entries_table', 31),
(165, '2020_06_29_103652_create_employee_attendances_table', 31),
(168, '2020_04_04_113741_create_shop_asset_categories_table', 33),
(169, '2020_07_04_120134_create_asset_code_entries_table', 34),
(170, '2020_07_04_154302_create_asset_code_entries_table', 35),
(180, '2020_07_04_185904_create_shop_asset_entries_table', 36),
(185, '2020_07_08_224919_create_asset_statuses_table', 37),
(190, '2020_07_11_151012_create_purchase_product_details_table', 38),
(198, '2020_07_14_122004_create_purchase_product_total_quantities_table', 40),
(199, '2020_07_14_175224_create_purchase_product_total_prices_table', 41),
(210, '2020_07_18_132048_create_sales_product_discount_price_entries_table', 42),
(212, '2020_07_22_163558_create_sales_customer_entries_table', 43),
(215, '2020_07_15_193338_create_sales_product_price_entries_table', 44),
(226, '2020_07_25_171317_create_sales_product_entries_table', 45),
(227, '2020_07_26_181559_create_sales_invoices_table', 45),
(228, '2021_03_03_160420_create_admin_menu_title_name1s_table', 46),
(229, '2021_03_03_194018_create_company_logos_table', 46),
(231, '2021_03_05_214750_create_websites_table', 47),
(232, '2021_03_06_093402_create_website_infos_table', 48),
(233, '2021_03_06_172359_create_vendors_table', 49),
(235, '2021_03_06_201553_create_purchase_types_table', 50),
(236, '2021_03_07_122915_create_basic_infos_table', 51),
(237, '2021_03_07_123325_create_religiouses_table', 51),
(238, '2021_03_08_170156_create_qr_code_setups_table', 52),
(239, '2021_03_09_110312_create_invoice_for_type_lists_table', 53),
(240, '2021_03_09_125342_create_invoice_type_lists_table', 54),
(250, '2021_03_12_224758_create_invoice_setup_details_table', 56),
(251, '2021_03_12_215830_create_invoice_setups_table', 57),
(256, '2021_03_30_151502_create_divisions_table', 60),
(257, '2021_03_30_153536_create_districts_table', 60),
(258, '2021_03_31_111242_create_upazilas_table', 60),
(259, '2021_03_31_111443_create_unions_table', 60),
(260, '2021_03_31_111613_create_wards_table', 60),
(262, '2021_03_30_151355_create_countries_table', 61),
(271, '2020_02_15_124421_create_shop_type_entries_table', 67),
(272, '2021_04_02_212604_create_shop_information_table', 68),
(274, '2020_02_09_193833_create_admin_menu_title_names_table', 70),
(282, '2021_04_05_142658_create_shops_table', 71),
(283, '2021_04_07_114506_create_admins_table', 71),
(285, '2021_04_09_175423_create_branch_information_table', 72),
(286, '2021_03_24_134624_create_shop_owner_information_table', 73),
(287, '2021_04_03_000408_create_shop_contact_person_information_table', 73),
(288, '2021_04_03_004116_create_shop_representative_information_table', 73),
(289, '2021_04_03_012254_create_shop_address_locations_table', 73),
(296, '2021_04_11_213716_create_shop_statuses_table', 74),
(297, '2021_04_11_225024_create_shop_payment_statuses_table', 75),
(299, '2021_04_12_135904_create_shop_billing_amounts_table', 76),
(300, '2021_04_12_142738_create_shop_account_intormations_table', 77),
(301, '2021_04_13_004559_create_currencies_table', 78),
(303, '2021_04_17_100207_create_shop_billing_grace_information_table', 79),
(304, '2020_07_11_171219_create_purchase_product_more_fields_table', 80),
(308, '2021_04_25_112753_create_chart_of_accounts_table', 81),
(309, '2021_04_25_225940_create_account_groups_table', 81),
(310, '2021_04_26_104415_create_chart_of_account_group_types_table', 82),
(316, '2021_04_29_073309_create_voucher_types_table', 83),
(318, '2021_04_29_114640_create_account_setup_head_lists_table', 83),
(319, '2021_04_29_114846_create_account_setup_placement_lists_table', 83),
(320, '2021_04_29_113901_create_account_setups_table', 84),
(327, '2021_05_01_121723_create_voucher_information_table', 85),
(328, '2021_05_01_122532_create_voucher_information_reports_table', 85);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_brand_entries`
--

CREATE TABLE `product_brand_entries` (
  `productBrandEntryId` bigint(20) UNSIGNED NOT NULL,
  `productBrandName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productBrandPosition` int(11) NOT NULL,
  `productBrandStatus` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_brand_entries`
--

INSERT INTO `product_brand_entries` (`productBrandEntryId`, `productBrandName`, `productBrandPosition`, `productBrandStatus`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'radhuni', 1, 1, 4, 3, 3, '2021-04-18 04:03:26', '2021-04-18 04:39:55'),
(2, 'ACIA', 2, 1, 4, 3, 3, '2021-04-18 04:40:06', '2021-04-18 04:40:45'),
(3, 'kkkkllk', 3, 1, 4, 1, NULL, '2021-04-18 04:56:38', '2021-04-18 04:56:38'),
(4, 'asdf', 4, 1, 4, 1, 1, '2021-04-18 04:58:40', '2021-04-18 04:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `poductCategoryId` bigint(20) UNSIGNED NOT NULL,
  `productNameId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `label` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`poductCategoryId`, `productNameId`, `categoryId`, `label`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(23, 12, 1, 1, 1, 1, 3, NULL, '2020-12-29 09:39:49', '2020-12-29 09:39:49'),
(24, 13, 1, 1, 1, 1, 3, NULL, '2020-12-29 10:09:53', '2020-12-29 10:09:53'),
(25, 13, 2, 2, 1, 1, 3, NULL, '2020-12-29 10:09:53', '2020-12-29 10:09:53'),
(26, 14, 25, 1, 2, 2, 14, NULL, '2021-03-08 05:18:53', '2021-03-08 05:18:53'),
(27, 14, 26, 2, 2, 2, 14, NULL, '2021-03-08 05:18:53', '2021-03-08 05:18:53'),
(28, 14, 27, 3, 2, 2, 14, NULL, '2021-03-08 05:18:53', '2021-03-08 05:18:53'),
(35, 17, 9, 1, 3, 4, 3, NULL, '2021-04-22 05:25:51', '2021-04-22 05:25:51'),
(36, 17, 10, 2, 3, 4, 3, NULL, '2021-04-22 05:25:51', '2021-04-22 05:25:51'),
(37, 17, 11, 3, 3, 4, 3, NULL, '2021-04-22 05:25:51', '2021-04-22 05:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_names`
--

CREATE TABLE `product_names` (
  `productNameId` bigint(20) UNSIGNED NOT NULL,
  `productName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productCode` int(11) DEFAULT NULL,
  `productQRNumber` int(11) DEFAULT NULL,
  `priceStatus` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_names`
--

INSERT INTO `product_names` (`productNameId`, `productName`, `productCode`, `productQRNumber`, `priceStatus`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(12, 'hjnhb', 1, 67, '1', 1, 1, 3, NULL, '2020-12-29 09:39:49', NULL),
(13, 'xcx', 2, 676, '1', 1, 1, 3, NULL, '2020-12-29 10:09:52', NULL),
(14, 'Full Time Box Biscut', 1, 1, '1', 2, 2, 14, NULL, '2021-03-08 05:18:52', NULL),
(17, 'Full T-Shirt', 1, NULL, '1', 3, 4, 3, NULL, '2021-04-22 05:25:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_price_setup_details`
--

CREATE TABLE `product_price_setup_details` (
  `productPriceSetupid` bigint(20) UNSIGNED NOT NULL,
  `categoryId` int(11) NOT NULL,
  `productNameId` int(11) NOT NULL,
  `productBrandId` int(11) NOT NULL,
  `batchNo` int(11) DEFAULT NULL,
  `mfgDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelNo` int(11) DEFAULT NULL,
  `warranty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guranty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification` int(11) NOT NULL,
  `mrp` int(11) NOT NULL,
  `salesPrice` int(11) NOT NULL,
  `holeSalesPrice` int(11) NOT NULL,
  `relativePrice` int(11) NOT NULL,
  `condition` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `advantage` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `useSystem` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopUserId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `updateBy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_price_setup_details`
--

INSERT INTO `product_price_setup_details` (`productPriceSetupid`, `categoryId`, `productNameId`, `productBrandId`, `batchNo`, `mfgDate`, `expDate`, `modelNo`, `warranty`, `guranty`, `notification`, `mrp`, `salesPrice`, `holeSalesPrice`, `relativePrice`, `condition`, `advantage`, `detail`, `useSystem`, `shopId`, `shopUserId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 6, 1, '2020-04-23', '2020-04-25', 1, '1 Years', '2 Month', 10, 40, 41, 41, 41, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 1, 1, '3', NULL, '2020-04-02 04:53:18', NULL),
(2, 6, 4, 5, 2, '2020-04-06', '2020-04-01', 2, NULL, NULL, 10, 35, 35, 35, 35, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 1, 1, '3', NULL, '2020-04-02 04:53:55', NULL),
(3, 10, 7, 3, 3, '2010-02-01', '2010-04-01', 3, NULL, NULL, 10, 35, 35, 35, 35, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 1, 1, '3', NULL, '2020-04-02 04:55:04', NULL),
(4, 1, 2, 1, 3, '2020-04-01', '2020-04-24', 3, '1 Years', '2 Month', 10, 35, 35, 35, 35, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 1, 1, '3', NULL, '2020-04-02 04:57:12', NULL),
(5, 1, 3, 3, 4, '2020-04-08', '2020-04-24', 4, '1 Years', '2 Month', 10, 40, 40, 40, 40, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 1, 1, '3', NULL, '2020-04-02 04:58:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoices`
--

CREATE TABLE `purchase_invoices` (
  `purchaseInvoiceId` bigint(20) UNSIGNED NOT NULL,
  `purchaseDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchaseInvoiceNo` int(11) NOT NULL,
  `purchaseTypeId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productSupplierId` int(11) NOT NULL,
  `totalPurchaseValue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carriageInward` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalAmount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplierPayable` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otherCost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `damageAndWarranty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalProductCost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previousPayableDue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currentPayable` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `shopUserId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_invoices`
--

INSERT INTO `purchase_invoices` (`purchaseInvoiceId`, `purchaseDate`, `purchaseInvoiceNo`, `purchaseTypeId`, `productSupplierId`, `totalPurchaseValue`, `carriageInward`, `totalAmount`, `discount`, `supplierPayable`, `otherCost`, `damageAndWarranty`, `totalProductCost`, `previousPayableDue`, `currentPayable`, `shopId`, `shopTypeId`, `shopUserId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, '24/04/2021', 1, '20', 10, '9900', NULL, '9900', NULL, '9900', NULL, NULL, '9900', NULL, '9900', 3, 4, 3, 3, NULL, '2021-04-24 15:51:14', '2021-04-24 15:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product_details`
--

CREATE TABLE `purchase_product_details` (
  `purchaseProductDetailsId` bigint(20) UNSIGNED NOT NULL,
  `purchaseInvoiceNo` bigint(20) UNSIGNED NOT NULL,
  `productSupplierId` bigint(20) UNSIGNED NOT NULL,
  `purchaseProductId` bigint(20) UNSIGNED NOT NULL,
  `productId` int(11) NOT NULL,
  `modelNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batchNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qrCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mfgLicenseNO` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty` int(11) DEFAULT NULL,
  `selectMothOrYearWarranty` int(11) DEFAULT NULL,
  `guarantee` int(11) DEFAULT NULL,
  `selectMothOrYearGuarantee` int(11) DEFAULT NULL,
  `mfgDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiryDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `taxAmount` int(11) DEFAULT NULL,
  `taxAmountType` int(11) DEFAULT NULL,
  `quantityType` int(11) DEFAULT NULL,
  `quantityNoti` int(11) DEFAULT NULL,
  `proDescription` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proAdvantage` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_product_details`
--

INSERT INTO `purchase_product_details` (`purchaseProductDetailsId`, `purchaseInvoiceNo`, `productSupplierId`, `purchaseProductId`, `productId`, `modelNo`, `batchNo`, `qrCode`, `mfgLicenseNO`, `warranty`, `selectMothOrYearWarranty`, `guarantee`, `selectMothOrYearGuarantee`, `mfgDate`, `expiryDate`, `tax`, `taxAmount`, `taxAmountType`, `quantityType`, `quantityNoti`, `proDescription`, `proAdvantage`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 1, 17, '0123654', '258741', '123654789', '147852369', 1, 3, 1, 2, '2021-04-01', '2021-04-30', 0, NULL, NULL, 3, 10, 'sai', 'ful', 3, 4, 3, NULL, '2021-04-24 15:50:45', '2021-04-24 15:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product_entries`
--

CREATE TABLE `purchase_product_entries` (
  `purchaseProductId` bigint(20) UNSIGNED NOT NULL,
  `purchaseInvoiceNo` int(11) NOT NULL,
  `productSupplierId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitId` int(11) NOT NULL,
  `unitPrice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalPrice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_product_entries`
--

INSERT INTO `purchase_product_entries` (`purchaseProductId`, `purchaseInvoiceNo`, `productSupplierId`, `productId`, `brandId`, `quantity`, `unitId`, `unitPrice`, `totalPrice`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 17, 8, 10, 3, '1000', '9900', 3, 4, 3, NULL, '2021-04-24 15:49:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product_more_fields`
--

CREATE TABLE `purchase_product_more_fields` (
  `purchaseProductMoreFieldId` bigint(20) UNSIGNED NOT NULL,
  `serialId` bigint(20) UNSIGNED NOT NULL,
  `purchaseInvoiceNo` bigint(20) UNSIGNED NOT NULL,
  `purchaseProductId` bigint(20) UNSIGNED NOT NULL,
  `optionName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optionWork` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_product_more_fields`
--

INSERT INTO `purchase_product_more_fields` (`purchaseProductMoreFieldId`, `serialId`, `purchaseInvoiceNo`, `purchaseProductId`, `optionName`, `optionWork`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'asd', '100', 3, 4, 3, NULL, '2021-04-24 15:50:45', NULL),
(2, 2, 1, 1, 'china', 'monitor', 3, 4, 3, NULL, '2021-04-24 15:50:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product_total_prices`
--

CREATE TABLE `purchase_product_total_prices` (
  `purchaseProductTotalPriceId` bigint(20) UNSIGNED NOT NULL,
  `productId` int(11) NOT NULL,
  `totalQuantity` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_product_total_prices`
--

INSERT INTO `purchase_product_total_prices` (`purchaseProductTotalPriceId`, `productId`, `totalQuantity`, `totalPrice`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 17, 10, 9900, 3, 4, 3, NULL, '2021-04-24 15:49:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product_total_quantities`
--

CREATE TABLE `purchase_product_total_quantities` (
  `productTotalQuantityId` bigint(20) UNSIGNED NOT NULL,
  `productSupplierId` int(11) NOT NULL,
  `totalQuantity` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_product_total_quantities`
--

INSERT INTO `purchase_product_total_quantities` (`productTotalQuantityId`, `productSupplierId`, `totalQuantity`, `totalPrice`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 10, 10, 9900, 3, 4, 3, NULL, '2021-04-24 15:51:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_types`
--

CREATE TABLE `purchase_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchaseType` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_types`
--

INSERT INTO `purchase_types` (`id`, `purchaseType`, `status`, `created_at`, `updated_at`) VALUES
(20, 'Export', 0, '2021-03-07 17:40:32', '2021-03-08 10:19:26'),
(22, 'Import', 0, '2021-03-07 17:41:09', '2021-03-07 17:41:09'),
(25, 'Export & Import', 0, '2021-03-08 10:19:08', '2021-03-08 10:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `qr_code_setups`
--

CREATE TABLE `qr_code_setups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoiceShowStatus` int(11) NOT NULL,
  `scanInformation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qr_code_setups`
--

INSERT INTO `qr_code_setups` (`id`, `invoiceShowStatus`, `scanInformation`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(18, 0, 'sdsadas', 1, 1, '2021-03-13 09:51:51', '2021-03-13 15:02:03'),
(20, 0, 'nazmulfci edt', 1, 1, '2021-03-13 15:02:03', '2021-03-13 19:24:46'),
(21, 1, 'kghgjhg', 1, 1, '2021-04-07 18:50:13', '2021-04-07 18:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `religiouses`
--

CREATE TABLE `religiouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `religiousName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religiouses`
--

INSERT INTO `religiouses` (`id`, `religiousName`, `created_at`, `updated_at`) VALUES
(1, 'Islam', '2021-03-07 06:36:54', '2021-03-07 06:36:54'),
(2, 'Hinduism', '2021-03-07 06:36:54', '2021-03-07 06:36:54'),
(3, 'Christianity', '2021-03-07 06:36:54', '2021-03-07 06:36:54'),
(4, 'Buddhism', '2021-03-07 06:36:54', '2021-03-07 06:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `salary_grade_setups`
--

CREATE TABLE `salary_grade_setups` (
  `salaryGradeSetupId` bigint(20) UNSIGNED NOT NULL,
  `employeEntryId` int(11) NOT NULL,
  `gradeEntryId` int(11) NOT NULL,
  `salaryGradeSetupStatus` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_grade_setups`
--

INSERT INTO `salary_grade_setups` (`salaryGradeSetupId`, `employeEntryId`, `gradeEntryId`, `salaryGradeSetupStatus`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 1, 1, 1, 3, 3, '2020-06-26 09:25:09', '2020-06-26 09:35:16'),
(2, 7, 4, 1, 1, 1, 3, NULL, '2020-06-26 10:10:23', '2020-06-26 10:10:23'),
(3, 2, 1, 1, 1, 1, 3, NULL, '2020-06-26 10:10:34', '2020-06-26 10:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `sales_customer_entries`
--

CREATE TABLE `sales_customer_entries` (
  `salesCustomerEntryId` bigint(20) UNSIGNED NOT NULL,
  `customerTypeId` int(11) NOT NULL,
  `customerName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerPhone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerImoNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerFacebookID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerAddress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `referenceName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referenceEmail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referencePhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_customer_entries`
--

INSERT INTO `sales_customer_entries` (`salesCustomerEntryId`, `customerTypeId`, `customerName`, `customerEmail`, `customerPhone`, `customerImoNumber`, `customerFacebookID`, `customerAddress`, `referenceName`, `referenceEmail`, `referencePhone`, `customerStatus`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, 'Anissa Heidenreich DVM', 'eleonore.gerhold@example.net', '3', NULL, NULL, 'Dr. Korbin Mosciski', NULL, NULL, NULL, '0', 1, 1, 3, 3, '2020-07-22 15:17:25', '2020-07-26 10:39:48'),
(2, 1, 'Guido Heathcote', 'cruz71@example.net', '5', NULL, NULL, 'Bertrand Johnston', NULL, NULL, NULL, '1', 1, 1, 3, 3, '2020-07-22 15:17:25', '2020-07-24 12:50:17'),
(3, 3, 'Georgiana Gibson', 'vonrueden.franco@example.com', '8', NULL, NULL, 'Joanne Baumbach', NULL, NULL, NULL, '1', 1, 1, 3, 3, '2020-07-22 15:17:25', '2020-07-24 12:49:27'),
(4, 1, 'Tobin Gibson', 'goconnell@example.net', '2', NULL, NULL, 'Lilla Welch', NULL, NULL, NULL, '1', 1, 1, 3, NULL, '2020-07-22 15:17:26', '2020-07-22 15:17:26'),
(5, 3, 'Kraig Ullrich', 'anthony74@example.org', '4', NULL, NULL, 'Easter Bruen', NULL, NULL, NULL, '1', 1, 1, 3, NULL, '2020-07-22 15:17:26', '2020-07-22 15:17:26'),
(6, 2, 'Ms. Keira Terry', 'alejandra76@example.net', '2', NULL, NULL, 'Travon Greenholt', NULL, NULL, NULL, '1', 1, 1, 3, NULL, '2020-07-22 15:17:26', '2020-07-22 15:17:26'),
(7, 3, 'Darrell O\'Conner', 'mmoen@example.net', '4', NULL, NULL, 'Kennedy Schimmel', NULL, NULL, NULL, '1', 1, 1, 3, NULL, '2020-07-22 15:17:26', '2020-07-22 15:17:26'),
(8, 3, 'Jaydon Spencer', 'dpowlowski@example.org', '9', NULL, NULL, 'Mr. Sherman Mann', NULL, NULL, NULL, '1', 1, 1, 3, NULL, '2020-07-22 15:17:26', '2020-07-22 15:17:26'),
(9, 3, 'Kaycee Collier', 'abernathy.camille@example.com', '11', NULL, NULL, 'Anna D\'Amore', NULL, NULL, NULL, '1', 1, 1, 3, NULL, '2020-07-22 15:17:26', '2020-07-22 15:17:26'),
(10, 2, 'Frederick Schulist', 'cecilia12@example.com', '8', NULL, NULL, 'Karine Bahringer', NULL, NULL, NULL, '1', 1, 1, 3, NULL, '2020-07-22 15:17:26', '2020-07-22 15:17:26'),
(11, 1, 'arif', 'arif@gmail.com', '999', '9999', 'fdsf', 'fsdfsd', 'fsdf', 'd@gmail.com', '888', '1', 1, 1, 3, NULL, NULL, NULL),
(12, 4, 'Edward D. Veilleux', 'info@gmail.com', '1632077744', '01812454358', 'fb.com/nazmulfci', 'Elida Ho', NULL, NULL, NULL, '1', 2, 2, 14, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoices`
--

CREATE TABLE `sales_invoices` (
  `salesInvoiceId` bigint(20) UNSIGNED NOT NULL,
  `salesDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salesInvoiceNo` int(11) NOT NULL,
  `salesCustomerTypeId` int(11) NOT NULL,
  `salesCustomerId` int(11) NOT NULL,
  `totalQuantity` int(11) NOT NULL,
  `totalBalance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discountPrice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalVat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vatCalculate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalPayable` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previousDue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currentTotalAmount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currentPaidAmount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `shopUserId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_invoices`
--

INSERT INTO `sales_invoices` (`salesInvoiceId`, `salesDate`, `salesInvoiceNo`, `salesCustomerTypeId`, `salesCustomerId`, `totalQuantity`, `totalBalance`, `discountPrice`, `totalVat`, `vatCalculate`, `totalPayable`, `previousDue`, `currentTotalAmount`, `currentPaidAmount`, `shopId`, `shopTypeId`, `shopUserId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, '08-08-2020', 1, 3, 3, 7, '2700', '0', NULL, '2700', '2700', '500', '2900', '2400', 1, 1, 3, 3, 3, '2020-08-08 07:07:08', '2020-08-08 09:29:30'),
(2, '18-10-2020', 2, 2, 10, 1, '600', '0', '10', '600', '660', '600', '660', '60', 1, 1, 3, 3, NULL, '2020-10-18 01:22:24', '2020-10-18 01:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `sales_product_discount_price_entries`
--

CREATE TABLE `sales_product_discount_price_entries` (
  `salesProductDiscountPriceId` bigint(20) UNSIGNED NOT NULL,
  `purchaseProductId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `mrpDiscountAmount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrpDiscountType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrpStartDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrpExpiredDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrpPrice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesDiscountAmount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesDiscountType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesStartDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesExpiredDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesPrice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wholesaleDiscountAmount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wholesaleDiscountType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wholesaleStartDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wholesaleExpiredDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wholesalePrice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialDiscountAmount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialDiscountType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialStartDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialExpiredDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialPrice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eCommerceDiscountAmount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eCommerceDiscountType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eCommerceStartDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eCommerceExpiredDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eCommercePrice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_product_discount_price_entries`
--

INSERT INTO `sales_product_discount_price_entries` (`salesProductDiscountPriceId`, `purchaseProductId`, `productId`, `mrpDiscountAmount`, `mrpDiscountType`, `mrpStartDate`, `mrpExpiredDate`, `mrpPrice`, `salesDiscountAmount`, `salesDiscountType`, `salesStartDate`, `salesExpiredDate`, `salesPrice`, `wholesaleDiscountAmount`, `wholesaleDiscountType`, `wholesaleStartDate`, `wholesaleExpiredDate`, `wholesalePrice`, `specialDiscountAmount`, `specialDiscountType`, `specialStartDate`, `specialExpiredDate`, `specialPrice`, `eCommerceDiscountAmount`, `eCommerceDiscountType`, `eCommerceStartDate`, `eCommerceExpiredDate`, `eCommercePrice`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '50', '1', '2020-07-18', '2020-07-26', '350', '100', '1', '2020-07-05', '2020-07-26', '300', NULL, NULL, '', '', '400', NULL, NULL, '', '', '400', '20', '1', '2020-07-04', '2020-07-11', '380', 1, 1, 3, NULL, '2020-07-20 06:12:28', NULL),
(2, 2, 2, '50', '1', '2020-07-02', '2020-07-26', '550', '100', '1', '2020-07-04', '2020-07-26', '500', NULL, NULL, '', '', '600', NULL, NULL, '', '', '600', NULL, NULL, '', '', '600', 1, 1, 3, NULL, '2020-07-25 04:52:53', NULL),
(3, 2, 2, '100', '1', '2020-10-18', '2020-10-19', '500', NULL, NULL, '', '', '600', NULL, NULL, '', '', '600', NULL, NULL, '', '', '600', NULL, NULL, '', '', '600', 1, 1, 3, NULL, '2020-10-18 01:56:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_product_entries`
--

CREATE TABLE `sales_product_entries` (
  `salesProductEntryId` bigint(20) UNSIGNED NOT NULL,
  `salesInvoiceNo` int(11) NOT NULL,
  `salesDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salesCustomerId` int(11) NOT NULL,
  `purchaseProductId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `unitId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `discountPrice` int(11) DEFAULT NULL,
  `priceType` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_product_entries`
--

INSERT INTO `sales_product_entries` (`salesProductEntryId`, `salesInvoiceNo`, `salesDate`, `salesCustomerId`, `purchaseProductId`, `productId`, `brandId`, `unitId`, `quantity`, `unitPrice`, `totalPrice`, `discountPrice`, `priceType`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, '', 5, 2, 2, 6, 4, 2, 600, 1200, NULL, 2, 1, 1, 3, NULL, '2020-08-08 07:07:02', NULL),
(5, 1, '', 3, 3, 3, 6, 3, 5, 300, 1500, NULL, 1, 1, 1, 3, NULL, '2020-08-08 08:57:43', NULL),
(6, 2, '', 10, 2, 2, 6, 3, 1, 600, 600, NULL, 1, 1, 1, 3, NULL, '2020-10-18 01:21:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_product_price_entries`
--

CREATE TABLE `sales_product_price_entries` (
  `salesProductPriceEntryId` bigint(20) UNSIGNED NOT NULL,
  `purchaseProductId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `mrpPrice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesPrice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wholesalePrice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialPrice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eCommercePrice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `alertQuantity` int(11) DEFAULT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_product_price_entries`
--

INSERT INTO `sales_product_price_entries` (`salesProductPriceEntryId`, `purchaseProductId`, `productId`, `mrpPrice`, `salesPrice`, `wholesalePrice`, `specialPrice`, `eCommercePrice`, `quantity`, `alertQuantity`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '400', '400', '300', '300', '300', 5, 11, 1, 1, 3, NULL, '2020-07-24 14:54:38', NULL),
(2, 2, 2, '600', '600', '600', '600', '600', 5, 9, 1, 1, 3, NULL, '2020-07-24 14:57:03', NULL),
(3, 3, 3, '300', '300', '300', '300', '300', 15, NULL, 1, 1, 3, NULL, '2020-07-24 15:01:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `shopInfoId` bigint(20) UNSIGNED NOT NULL,
  `shopName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopSirialId` int(11) NOT NULL,
  `shopUserName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastLoginIp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refferTypeId` int(11) NOT NULL,
  `refferUserId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `shopLicenceTypeId` int(11) NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `haveBranch` int(11) NOT NULL,
  `totalBranch` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deleteStatus` tinyint(1) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_account_intormations`
--

CREATE TABLE `shop_account_intormations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopId` int(11) NOT NULL,
  `billingDate` datetime DEFAULT NULL,
  `billingGraceDate` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billAmount` double DEFAULT NULL,
  `totalMonth` double DEFAULT NULL,
  `totalPaid` double DEFAULT NULL,
  `currentDue` double DEFAULT NULL,
  `topupCurrentBalance` double DEFAULT NULL,
  `topupTotalBalance` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_account_intormations`
--

INSERT INTO `shop_account_intormations` (`id`, `shopId`, `billingDate`, `billingGraceDate`, `billAmount`, `totalMonth`, `totalPaid`, `currentDue`, `topupCurrentBalance`, `topupTotalBalance`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 490, NULL, NULL, NULL, NULL, NULL, '2021-04-14 16:26:44', '2021-04-14 16:26:44'),
(2, 2, NULL, NULL, 490, NULL, NULL, NULL, NULL, NULL, '2021-04-14 16:27:37', '2021-04-14 16:27:37'),
(3, 3, '2021-05-15 13:54:14', '', 1090, 0, 0, 0, 109.93, 0, '2021-04-14 16:29:39', '2021-04-24 15:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `shop_address_locations`
--

CREATE TABLE `shop_address_locations` (
  `shopALId` bigint(20) UNSIGNED NOT NULL,
  `shopId` int(11) NOT NULL,
  `branchId` int(11) NOT NULL,
  `countryId` int(11) NOT NULL,
  `divisionId` int(11) NOT NULL,
  `districtId` int(11) NOT NULL,
  `thanaId` int(11) NOT NULL,
  `unionId` int(11) DEFAULT NULL,
  `wardId` int(11) DEFAULT NULL,
  `addressLine1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressLine2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `back` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopSize` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marketName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `areaKnownName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `deleteStatus` tinyint(1) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_address_locations`
--

INSERT INTO `shop_address_locations` (`shopALId`, `shopId`, `branchId`, `countryId`, `divisionId`, `districtId`, `thanaId`, `unionId`, `wardId`, `addressLine1`, `addressLine2`, `front`, `back`, `left`, `right`, `shopSize`, `marketName`, `shopNo`, `areaKnownName`, `status`, `deleteStatus`, `createBy`, `updateBy`, `deleteBy`, `created_at`, `updated_at`, `delete_at`) VALUES
(1, 3, 1, 18, 2, 46, 107, 1, 1, 'Nikunja, khilkhet\nHouse#10,Road#7/D,Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-04-14 16:29:39', '2021-04-14 16:29:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_add_asset_supplier_entries`
--

CREATE TABLE `shop_add_asset_supplier_entries` (
  `assetSupplierId` bigint(20) UNSIGNED NOT NULL,
  `assetSupplierName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assetSupplierCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assetSupplierPhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assetSupplierHotLine` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assetSupplierMail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assetSupplierFb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assetSupplierWeb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assetSupplierImo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assetSupplierAddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopTypeId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_add_asset_supplier_entries`
--

INSERT INTO `shop_add_asset_supplier_entries` (`assetSupplierId`, `assetSupplierName`, `assetSupplierCode`, `assetSupplierPhone`, `assetSupplierHotLine`, `assetSupplierMail`, `assetSupplierFb`, `assetSupplierWeb`, `assetSupplierImo`, `assetSupplierAddress`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'Rana', '1', '01707999999', 'aaaaaa', 'a@gmailc.om', 'aaaaaa', 'aaaa', 'aaaaa', 'Korona Virus', NULL, 3, NULL, '2020-03-18 10:20:19', '2020-03-18 10:20:19'),
(2, 'Sojib', '1', '017000000', 'ssssssssss', 'ssaa@gmail.om', 'ssssss', 'ssssss', 'ssssss', 'Brisal', '1', 3, 3, '2020-03-18 10:23:39', '2020-04-05 06:53:45'),
(3, 'Shohel', '2', '017079991', 'ssssssssss', 'ssaaa@gmail.om', 'ssssss', 'ssssss', '019000000', 'Dhaka', '1', 3, 3, '2020-03-18 10:32:36', '2020-04-05 06:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `shop_add_bank_entries`
--

CREATE TABLE `shop_add_bank_entries` (
  `bankId` bigint(20) UNSIGNED NOT NULL,
  `bankTypeEntryId` int(11) NOT NULL,
  `bankEntryId` int(11) NOT NULL,
  `bankBranch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankAccountName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankAccountNumber` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_add_bank_entries`
--

INSERT INTO `shop_add_bank_entries` (`bankId`, `bankTypeEntryId`, `bankEntryId`, `bankBranch`, `bankAccountName`, `bankAccountNumber`, `status`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'Korona', 'Korona Vairus', 100000000, 0, 3, 3, '2020-06-24 11:08:29', '2020-06-24 11:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `shop_add_income_types`
--

CREATE TABLE `shop_add_income_types` (
  `shopIncomeTypeId` bigint(20) UNSIGNED NOT NULL,
  `shopIncomeTypeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopIncomeTypeStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_asset_categories`
--

CREATE TABLE `shop_asset_categories` (
  `assetCategoryId` bigint(20) UNSIGNED NOT NULL,
  `assetCategoryName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assetCategoryPosition` int(11) NOT NULL DEFAULT 1,
  `assetCategoryStatus` int(11) NOT NULL,
  `assetSubCategoryStatus` tinyint(1) NOT NULL,
  `previousId` int(11) DEFAULT NULL,
  `label` int(11) NOT NULL DEFAULT 1,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_asset_categories`
--

INSERT INTO `shop_asset_categories` (`assetCategoryId`, `assetCategoryName`, `assetCategoryPosition`, `assetCategoryStatus`, `assetSubCategoryStatus`, `previousId`, `label`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'table Update', 1, 1, 1, NULL, 1, 1, 1, 3, 3, '2020-07-04 06:24:24', '2020-07-08 07:06:00'),
(2, 'table Sub', 1, 1, 1, 1, 2, 1, 1, 3, 3, '2020-07-04 06:24:33', '2020-07-22 07:29:37'),
(3, 'table Third', 1, 1, 1, 2, 3, 1, 1, 3, 3, '2020-07-04 06:25:07', '2020-07-08 07:05:12'),
(4, 'Table Third Two', 2, 1, 1, 2, 3, 1, 1, 3, 3, '2020-07-05 07:00:09', '2020-07-08 07:05:03'),
(5, 'Category Two', 2, 1, 1, NULL, 1, 1, 1, 3, NULL, '2020-07-05 10:59:17', '2020-07-05 10:59:17'),
(6, 'table Four', 1, 1, 1, 3, 4, 1, 1, 3, NULL, '2020-07-05 11:58:27', '2020-07-05 11:58:27'),
(7, 'table Five', 1, 1, 1, 6, 5, 1, 1, 3, NULL, '2020-07-05 11:58:42', '2020-07-05 11:58:42'),
(8, 'table Six', 1, 1, 1, 7, 6, 1, 1, 3, NULL, '2020-07-05 11:59:02', '2020-07-05 11:59:02'),
(9, 'table Seven', 1, 1, 1, 8, 7, 1, 1, 3, 3, '2020-07-05 11:59:23', '2020-07-08 07:46:29'),
(10, 'table Eight', 1, 1, 0, 9, 8, 1, 1, 3, NULL, '2020-07-05 12:00:41', '2020-07-05 12:00:41'),
(11, 'table sub ok', 2, 1, 1, 1, 2, 1, 1, 3, 3, '2020-07-08 07:07:01', '2020-07-08 07:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `shop_asset_entries`
--

CREATE TABLE `shop_asset_entries` (
  `shopAssetEntryId` bigint(20) UNSIGNED NOT NULL,
  `assetCategoryId` int(11) NOT NULL,
  `assetProductId` int(11) NOT NULL,
  `assetSupplierId` int(11) NOT NULL,
  `assetBrandId` int(11) NOT NULL,
  `purchasedate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mfgDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiryDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoiceNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productQuantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productCost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalProductCost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currentPayable` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previousPayableDue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depreciation` double(20,3) DEFAULT NULL,
  `depreciationDay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depreciationMonth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depreciationYear` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selectMothOrYearWarranty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guarantee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selectMothOrYearGuarantee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_asset_entries`
--

INSERT INTO `shop_asset_entries` (`shopAssetEntryId`, `assetCategoryId`, `assetProductId`, `assetSupplierId`, `assetBrandId`, `purchasedate`, `mfgDate`, `expiryDate`, `invoiceNo`, `modelNo`, `productQuantity`, `productCost`, `totalProductCost`, `currentPayable`, `previousPayableDue`, `depreciation`, `depreciationDay`, `depreciationMonth`, `depreciationYear`, `warranty`, `selectMothOrYearWarranty`, `guarantee`, `selectMothOrYearGuarantee`, `color`, `size`, `description`, `status`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 5, 8, 3, 6, '2020-07-09', '2020-07-09', '2020-07-09', '20', '20', '2', '2500', '5000', '5000', NULL, 3.205, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, 1, 3, NULL, '2020-07-09 09:44:16', '2020-07-09 09:44:16'),
(2, 11, 7, 3, 3, NULL, NULL, NULL, NULL, NULL, '2', '5000', '10000', '1000', '9000', 5.952, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, 1, 3, NULL, '2020-07-09 09:45:04', '2020-07-09 09:45:04'),
(3, 4, 4, 2, 3, NULL, NULL, NULL, '20', '20', '5', '500', '2500', '2500', NULL, 0.278, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, 1, 3, NULL, '2020-07-09 09:45:38', '2020-07-09 09:45:38'),
(4, 6, 4, 3, 6, NULL, NULL, NULL, '555', '555', '2', '2500', '5000', '14000', '', 1.389, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, 1, 3, NULL, '2020-07-09 09:51:05', '2020-07-09 10:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `shop_billing_amounts`
--

CREATE TABLE `shop_billing_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `billType` int(11) NOT NULL COMMENT '1.Shop/2.Branch',
  `billAmount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_billing_amounts`
--

INSERT INTO `shop_billing_amounts` (`id`, `billType`, `billAmount`, `created_at`, `updated_at`) VALUES
(1, 1, 490, '2021-04-12 08:10:08', '2021-04-12 08:10:12'),
(2, 2, 300, '2021-04-12 08:10:15', '2021-04-12 08:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `shop_billing_grace_information`
--

CREATE TABLE `shop_billing_grace_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_billing_grace_information`
--

INSERT INTO `shop_billing_grace_information` (`id`, `shopId`, `date`, `message`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 3, '2021-04-22 00:00:00', 'for lockdown', 1, 1, '2021-04-17 04:26:01', '2021-04-17 04:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `shop_contact_person_information`
--

CREATE TABLE `shop_contact_person_information` (
  `shopCPInfoId` bigint(20) UNSIGNED NOT NULL,
  `shopId` int(11) NOT NULL,
  `CPName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CPMobileNo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CPEmail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CPAddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CPPhoneNo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `deleteStatus` tinyint(1) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_contact_person_information`
--

INSERT INTO `shop_contact_person_information` (`shopCPInfoId`, `shopId`, `CPName`, `CPMobileNo`, `CPEmail`, `CPAddress`, `CPPhoneNo`, `status`, `deleteStatus`, `createBy`, `updateBy`, `deleteBy`, `created_at`, `updated_at`, `delete_at`) VALUES
(1, 1, 'd', 'd', NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-04-14 16:26:44', '2021-04-14 16:26:44', NULL),
(2, 2, 'd', 'd', NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-04-14 16:27:37', '2021-04-14 16:27:37', NULL),
(3, 3, 'd', 'd', NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-04-14 16:29:39', '2021-04-14 16:29:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_customer_type_entries`
--

CREATE TABLE `shop_customer_type_entries` (
  `shopCustomerTypeEntryId` bigint(20) UNSIGNED NOT NULL,
  `shopCustomerName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopCustomerStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_customer_type_entries`
--

INSERT INTO `shop_customer_type_entries` (`shopCustomerTypeEntryId`, `shopCustomerName`, `shopCustomerStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'Fixed Customer', 1, 1, 1, '2020-06-24 07:54:29', '2020-07-22 08:00:44'),
(2, 'Gust Customer', 1, 1, 1, '2020-06-24 10:42:36', '2020-07-22 08:00:45'),
(3, 'Ecommer Customer', 1, 1, NULL, '2020-07-22 08:11:52', NULL),
(4, 'Retail Customer', 1, 1, NULL, '2021-03-15 19:54:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_employee_entries`
--

CREATE TABLE `shop_employee_entries` (
  `shopEmployeeEntryId` bigint(20) UNSIGNED NOT NULL,
  `jobDepartmentId` int(11) NOT NULL,
  `employeeTypeId` int(11) NOT NULL,
  `userName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fatherName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motherName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` int(11) NOT NULL,
  `sex` int(11) NOT NULL,
  `maritalStatus` int(11) NOT NULL,
  `nidNumber` int(11) NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentAddress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanentAddress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopId` int(11) DEFAULT NULL,
  `shopTypeId` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_employee_entries`
--

INSERT INTO `shop_employee_entries` (`shopEmployeeEntryId`, `jobDepartmentId`, `employeeTypeId`, `userName`, `password`, `fullName`, `fatherName`, `motherName`, `dateOfBirth`, `phoneNumber`, `religion`, `sex`, `maritalStatus`, `nidNumber`, `nationality`, `presentAddress`, `permanentAddress`, `shopId`, `shopTypeId`, `status`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'malek', '12345', 'Malek', 'Md.Malek Khan', 'Mrs.MalekBegum', '2020-04-18', '01700000000', 1, 1, 1, 12345678, 'Bangladeshi', 'Boga', 'Boga', 1, 1, 1, 3, 3, '2020-04-16 06:29:26', '2020-06-27 04:39:55'),
(2, 3, 1, 'kalek', '12345', 'Kalek', 'Md.Kalek Khan', 'Mrs.KalekBegum', '2020-04-30', '01700000000', 1, 1, 1, 12345678, 'Bangladeshi', 'Dhaka', 'Dhaka', 1, 1, 2, 3, 3, '2020-04-16 06:30:13', '2020-06-27 04:39:54'),
(3, 4, 6, 'malekkhan', '12345', 'Rubel Khan', 'Md.Dulal Khan', 'Mrs.Ruzina Begum', '2020-06-24', '1708797991', 1, 1, 1, 12345678, 'Bangladeshi', 'Bangladeshi', 'Bangladeshi', 1, 1, 1, 3, NULL, '2020-06-25 06:28:00', NULL),
(4, 4, 2, 'eng.rubelkh', '12345', 'Rubel Khan ok', 'Md.Dulal Khan', 'Mrs.Ruzina Begum', '2020-07-11', '01708797991', 1, 1, 1, 12345678, 'Bangladeshi', 'Bangladeshi', 'Bangladeshi', 1, 1, 1, 3, NULL, '2020-06-25 06:31:31', NULL),
(5, 4, 6, 'eng.rubel', '12345', 'Rubel Khan 797991', 'Md.Malek Khan', 'Mrs.Ruzina Begum', '2020-07-08', '1708797991', 1, 1, 1, 12345678, 'Bangladeshi', 'Bangladeshi', 'Bangladeshi', 1, 1, 1, 3, 3, '2020-06-25 06:33:21', '2020-06-26 14:59:34'),
(6, 4, 2, 'eng.rubelkhan', '12345', 'Rubel Khan 2', 'Md.Dulal Khan', 'Mrs.Ruzina Begum', '2020-06-23', '01708797991', 1, 1, 2, 10101010, 'Bangladeshi', 'Dhaka', 'Dhaka', 1, 1, 1, 3, 3, '2020-06-25 06:35:11', '2020-06-26 14:59:36'),
(8, 7, 2, 'dealtaj', 'dealtaj', 'dealtaj', 'dealtaj', 'saifulf', '2020-10-16', '01812454358', 1, 1, 2, 1994, 'bangladeshi', 'Dhaka', 'Dhaka', 1, 1, 1, 3, 3, '2020-10-16 16:56:15', '2020-10-16 16:57:58'),
(9, 5, 7, 'arif', '12345678', 'arif', 'ari', 'mo', '2021-03-16', '1632077744', 1, 1, 1, 123, 'sdf', 'Elida Ho', 'Elida Ho', 2, 2, 1, 14, NULL, '2021-03-15 20:23:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_employee_login_time_entries`
--

CREATE TABLE `shop_employee_login_time_entries` (
  `employeeLoginTimeId` bigint(20) UNSIGNED NOT NULL,
  `employeeId` int(11) NOT NULL,
  `employeeLoginTimeStart` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeeLoginTimeEnd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeeLoginOffDay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeeLoginStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_employee_types`
--

CREATE TABLE `shop_employee_types` (
  `shopEmployeeTypeId` bigint(20) UNSIGNED NOT NULL,
  `shopEmployeeTypeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopEmployeeTypeStatus` tinyint(1) NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBY` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_employee_types`
--

INSERT INTO `shop_employee_types` (`shopEmployeeTypeId`, `shopEmployeeTypeName`, `shopEmployeeTypeStatus`, `shopId`, `shopTypeId`, `createBy`, `updateBY`, `created_at`, `updated_at`) VALUES
(1, 'Saler', 1, 1, 1, 3, 3, '2020-04-22 10:31:34', '2020-04-22 10:36:41'),
(2, 'Manager', 1, 1, 1, 3, 3, '2020-04-22 10:36:18', '2020-04-22 11:47:53'),
(3, 'Manager Branch', 1, 0, 0, 1, NULL, '2020-06-24 07:58:29', '2020-06-24 07:58:29'),
(5, 'Manager Two', 0, 1, 1, 3, 3, '2020-06-24 08:15:21', '2020-12-14 04:58:07'),
(6, 'Manager OR', 1, 0, 0, 1, 1, '2020-06-24 09:20:32', '2020-06-24 09:20:44'),
(7, 'Saler Shop Two', 1, 2, 2, 14, NULL, '2020-06-27 06:26:01', '2020-06-27 06:26:02'),
(8, 'Sales Manager', 1, 1, 1, 3, NULL, '2020-10-15 18:17:14', '2020-10-15 18:17:14'),
(9, 'IT Expert', 1, 1, 1, 3, NULL, '2020-12-14 04:29:00', '2020-12-14 04:29:00'),
(10, 'Sales Man', 1, 1, 1, 3, NULL, '2020-12-14 04:29:47', '2020-12-14 04:29:47'),
(11, 'Marketing', 1, 1, 1, 3, NULL, '2020-12-14 04:37:11', '2020-12-14 04:37:11'),
(12, 'b', 1, 2, 2, 14, NULL, '2021-03-16 20:17:11', '2021-03-16 20:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `shop_expence_type_entries`
--

CREATE TABLE `shop_expence_type_entries` (
  `shopExpenceTypeId` bigint(20) UNSIGNED NOT NULL,
  `shopExpenceTypeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopExpenceTypeStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_expence_type_entries`
--

INSERT INTO `shop_expence_type_entries` (`shopExpenceTypeId`, `shopExpenceTypeName`, `shopExpenceTypeStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'rana', 1, 1, NULL, '2020-03-16 04:16:35', NULL),
(2, 'Transport', 1, 3, NULL, '2020-03-18 06:14:15', NULL),
(3, 'online', 1, 3, NULL, '2020-03-18 12:18:26', NULL),
(4, 'Ofline', 1, 1, 1, '2020-06-24 09:44:43', '2020-06-24 09:44:43'),
(7, 'online2', 1, 1, 1, '2020-06-24 10:06:13', '2020-06-24 10:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `shop_income_type_entries`
--

CREATE TABLE `shop_income_type_entries` (
  `shopIncomeTypeId` bigint(20) UNSIGNED NOT NULL,
  `shopIncomeTypeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopIncomeTypeStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_income_type_entries`
--

INSERT INTO `shop_income_type_entries` (`shopIncomeTypeId`, `shopIncomeTypeName`, `shopIncomeTypeStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'direct sale', 1, 3, NULL, '2020-03-18 06:14:35', NULL),
(4, 'Local sale', 1, 1, NULL, '2020-06-24 10:12:37', '2020-06-24 10:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `shop_information`
--

CREATE TABLE `shop_information` (
  `shopInfoId` bigint(20) UNSIGNED NOT NULL,
  `shopName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopSirialId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopUserName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastLoginIp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refferTypeId` int(11) NOT NULL,
  `refferUserId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `shopLicenceTypeId` int(11) NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `haveBranch` int(11) NOT NULL,
  `totalBranch` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deleteStatus` tinyint(1) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleteDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_information`
--

INSERT INTO `shop_information` (`shopInfoId`, `shopName`, `shopSirialId`, `shopUserName`, `password`, `pass`, `lastLoginIp`, `refferTypeId`, `refferUserId`, `shopTypeId`, `shopLicenceTypeId`, `website`, `facebook`, `youtube`, `haveBranch`, `totalBranch`, `status`, `deleteStatus`, `createBy`, `updateBy`, `deleteBy`, `created_at`, `updated_at`, `deleteDate`) VALUES
(1, 'dd', '101-1', 'dd', '123', '123', '1', 0, 1, 1, 0, NULL, NULL, NULL, 1, 100, 1, 0, 1, NULL, NULL, '2021-04-03 17:37:26', '2021-04-04 08:29:12', NULL),
(2, 'asdasd', '102-1', 'ddd', '123', '123', '1', 0, 2, 1, 0, NULL, NULL, NULL, 2, 0, 0, 0, 1, NULL, NULL, '2021-04-03 17:41:40', '2021-04-03 17:41:40', NULL),
(3, 'fsdf', '101-1', 'fsdf', '123', '123', '1', 0, 24, 4, 0, NULL, NULL, NULL, 1, 0, 0, 0, 1, NULL, NULL, '2021-04-03 18:32:27', '2021-04-03 18:32:27', NULL),
(4, 'dealtaj', '103-1', 'dealtaj', '123', '123', '1', 0, 2, 2, 0, NULL, NULL, NULL, 2, 0, 0, 0, 1, NULL, NULL, '2021-04-03 19:23:33', '2021-04-03 19:23:33', NULL),
(5, 'dealtaj1', '102-1', 'dealtaj1', '123', '123', '1', 0, 1, 2, 0, NULL, NULL, NULL, 1, 5, 0, 0, 1, NULL, NULL, '2021-04-03 19:26:38', '2021-04-03 20:00:55', NULL),
(6, 'd', '102-1', 'd@gmail.com', '$2y$10$ZhFz.6z/1Ms9W1hi0K7Hp.ZquSQtDdSMpH8qVTvl9bVikFMtncqfu', '123', '1', 0, 1, 3, 0, NULL, NULL, NULL, 2, 0, 0, 0, 1, NULL, NULL, '2021-04-03 19:56:21', '2021-04-04 07:56:48', NULL),
(7, 'aladin', '101-2', 'saladin', '$2y$10$UiDy4bKrbX3wfeN.ngQ8A.VnSbN9yIo3bDZKYOOPQde.AFdjz8hWO', '123', '1', 0, 2, 4, 0, NULL, NULL, NULL, 2, 0, 0, 0, 1, NULL, NULL, '2021-04-04 10:02:40', '2021-04-04 10:02:40', NULL),
(8, 'fsd', '101-3', 'sdfsdf', '$2y$10$1sLrV74M4KFCup9q8x9m1eIXc1ysEFN6Hd.lTJW2eBKiJPd0A0sjq', '123', '1', 0, 2, 4, 0, NULL, NULL, NULL, 2, 0, 0, 0, 1, NULL, NULL, '2021-04-04 10:06:58', '2021-04-04 10:06:58', NULL),
(9, 'fsd', '101-3', 'fsdafdsafdasfdsaf', '$2y$10$34PER4Z6bQ3YuDTVbz7rZerGAg.5sf5F5DXVU3BvzyzP5r/GF4J3q', '123', '1', 0, 2, 4, 0, NULL, NULL, NULL, 2, 0, 0, 0, 1, NULL, NULL, '2021-04-04 10:08:02', '2021-04-04 10:08:02', NULL),
(10, 'dssfds', '101-4', 'sdfdfsdfsd', '$2y$10$jarcmj9PTAU/EUKwLDVNz.XXHBOrNDti7Jl95swuE7mloq8X/RoLi', '123', '1', 0, 1, 4, 0, NULL, NULL, NULL, 2, 0, 0, 0, 1, NULL, NULL, '2021-04-04 10:28:59', '2021-04-04 10:28:59', NULL),
(11, 'nazmul', '101-5', 'nazmul', '$2y$10$mBmNewZ6W4LEKGrKuI4md.zcTT6nMZ6TfQ5PeHa4WGQpyg1RXQCJC', '123', '1', 0, 28, 4, 0, NULL, NULL, NULL, 2, 0, 0, 0, 1, NULL, NULL, '2021-04-04 11:31:38', '2021-04-04 11:31:38', NULL),
(12, 's', '101-6', 's', '$2y$10$aRJq2w5dqKWXJDoaWByum.L.nHvh7/VkZG/CjlbrPDJ.uRRigQW0S', '123', '1', 0, 1, 4, 0, NULL, NULL, NULL, 2, 0, 0, 0, 1, NULL, NULL, '2021-04-04 11:49:23', '2021-04-04 11:49:23', NULL),
(13, 'ds', '101-7', 'ds', '$2y$10$gEEC0lwtW7sq9ZD62yXpteD592d8lSa2JYZaXM.8sxoMu70zg0aqG', '123', '1', 0, 2, 4, 0, NULL, NULL, NULL, 2, 0, 0, 0, 1, NULL, NULL, '2021-04-04 11:51:13', '2021-04-04 11:51:13', NULL),
(14, 'a', '101-8', 'a', '$2y$10$wUHgjuH8kWLwGOyQaGhdd.W3jvpfkqDlSoLvfYijPB/SS4ybioDTq', '123', '1', 0, 1, 4, 0, NULL, NULL, NULL, 2, 0, 0, 0, 1, NULL, NULL, '2021-04-04 11:54:02', '2021-04-04 11:54:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_loan_entries`
--

CREATE TABLE `shop_loan_entries` (
  `loanEntryId` bigint(20) UNSIGNED NOT NULL,
  `loanProviderId` int(11) NOT NULL,
  `loanAmount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loanCondition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loanCommitment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loanStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_loan_provider_entries`
--

CREATE TABLE `shop_loan_provider_entries` (
  `loanProviderId` bigint(20) UNSIGNED NOT NULL,
  `loanProviderName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loanProviderPhone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loanProviderAddress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `loanProviderStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_menu_permissions`
--

CREATE TABLE `shop_menu_permissions` (
  `shopMenuPermissionId` bigint(20) UNSIGNED NOT NULL,
  `employeeEntryId` int(11) NOT NULL,
  `employeeTypeId` int(11) NOT NULL,
  `menuTitleId` int(11) NOT NULL,
  `menuId` int(11) NOT NULL,
  `subMenuId` int(11) DEFAULT NULL,
  `fullAccess` int(11) DEFAULT NULL,
  `viewAccess` int(11) DEFAULT NULL,
  `addAccess` int(11) DEFAULT NULL,
  `editAccess` int(11) DEFAULT NULL,
  `permissionStatus` tinyint(1) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_menu_permissions`
--

INSERT INTO `shop_menu_permissions` (`shopMenuPermissionId`, `employeeEntryId`, `employeeTypeId`, `menuTitleId`, `menuId`, `subMenuId`, `fullAccess`, `viewAccess`, `addAccess`, `editAccess`, `permissionStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 1, 2, 1, 1, NULL, NULL, NULL, 1, 3, NULL, '2020-06-25 10:57:09', '2020-06-25 10:57:09'),
(2, 7, 2, 1, 2, 2, 1, NULL, NULL, NULL, 1, 3, NULL, '2020-06-25 10:57:09', '2020-06-25 10:57:09'),
(3, 7, 2, 1, 2, 3, 1, NULL, NULL, NULL, 1, 3, NULL, '2020-06-25 10:57:09', '2020-06-25 10:57:09'),
(4, 7, 2, 1, 2, 4, 1, NULL, NULL, NULL, 1, 3, NULL, '2020-06-25 10:57:09', '2020-06-25 10:57:09'),
(5, 7, 2, 1, 2, 5, 1, NULL, NULL, NULL, 1, 3, NULL, '2020-06-25 10:57:09', '2020-06-25 10:57:09'),
(6, 7, 2, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 3, NULL, '2020-06-25 10:57:10', '2020-06-25 10:57:10'),
(7, 8, 2, 1, 2, 1, 1, NULL, NULL, NULL, 1, 3, NULL, '2020-10-16 17:01:14', '2020-10-16 17:01:14'),
(8, 8, 2, 1, 2, 2, 1, NULL, NULL, NULL, 1, 3, NULL, '2020-10-16 17:01:14', '2020-10-16 17:01:14'),
(9, 8, 2, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 3, NULL, '2020-10-16 17:01:14', '2020-10-16 17:01:14'),
(10, 9, 7, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 14, NULL, '2021-03-15 20:26:15', '2021-03-15 20:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `shop_owner_information`
--

CREATE TABLE `shop_owner_information` (
  `shopOwnerInfoId` bigint(20) UNSIGNED NOT NULL,
  `shopId` int(11) NOT NULL,
  `shopOwnerName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopOwnerMobileNo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopOwnerEmail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopOwnerAddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopOwnerPhoneNo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `deleteStatus` tinyint(1) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleteDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_owner_information`
--

INSERT INTO `shop_owner_information` (`shopOwnerInfoId`, `shopId`, `shopOwnerName`, `shopOwnerMobileNo`, `shopOwnerEmail`, `shopOwnerAddress`, `shopOwnerPhoneNo`, `status`, `deleteStatus`, `createBy`, `updateBy`, `deleteBy`, `created_at`, `updated_at`, `deleteDate`) VALUES
(1, 1, 'd', 'd', NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-04-14 16:26:44', '2021-04-14 16:26:44', NULL),
(2, 2, 'd', 'd', NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-04-14 16:27:37', '2021-04-14 16:27:37', NULL),
(3, 3, 'd', 'd', NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-04-14 16:29:39', '2021-04-14 16:29:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_payment_statuses`
--

CREATE TABLE `shop_payment_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paymentStatusName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = Due, 2 = Paid, 3 = Grace, 4 = Alert',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_payment_statuses`
--

INSERT INTO `shop_payment_statuses` (`id`, `paymentStatusName`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Due', 1, '2021-04-11 17:26:48', '2021-04-11 17:26:51'),
(2, 'Paid', 2, '2021-04-11 17:26:55', '2021-04-11 17:26:57'),
(3, 'Grace', 3, '2021-04-11 17:27:00', '2021-04-11 17:27:03'),
(4, 'Aleart', 4, '2021-04-11 17:27:06', '2021-04-11 17:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `shop_representative_information`
--

CREATE TABLE `shop_representative_information` (
  `shopRepInfoId` bigint(20) UNSIGNED NOT NULL,
  `shopId` int(11) NOT NULL,
  `SRName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SRMobileNo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SREmail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SRAddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SRPhoneNo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `deleteStatus` tinyint(1) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_representative_information`
--

INSERT INTO `shop_representative_information` (`shopRepInfoId`, `shopId`, `SRName`, `SRMobileNo`, `SREmail`, `SRAddress`, `SRPhoneNo`, `status`, `deleteStatus`, `createBy`, `updateBy`, `deleteBy`, `created_at`, `updated_at`, `delete_at`) VALUES
(1, 1, 'd', 'd', NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-04-14 16:26:45', '2021-04-14 16:26:45', NULL),
(2, 2, 'd', 'd', NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-04-14 16:27:37', '2021-04-14 16:27:37', NULL),
(3, 3, 'd', 'd', NULL, NULL, NULL, 1, 1, 1, NULL, NULL, '2021-04-14 16:29:39', '2021-04-14 16:29:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_statuses`
--

CREATE TABLE `shop_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `statusName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = Inactive, 2 = Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_statuses`
--

INSERT INTO `shop_statuses` (`id`, `statusName`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Inactive', 1, '2021-04-11 16:18:40', '2021-04-11 16:18:43'),
(2, 'Active', 2, '2021-04-11 16:18:46', '2021-04-11 16:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `shop_type_entries`
--

CREATE TABLE `shop_type_entries` (
  `shopTypeEntryId` bigint(20) UNSIGNED NOT NULL,
  `shopTypeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopTypeCode` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `shopTypeStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_type_entries`
--

INSERT INTO `shop_type_entries` (`shopTypeEntryId`, `shopTypeName`, `shopTypeCode`, `shopTypeStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(2, 'Consumar', '103', 1, 1, 1, '2021-04-03 17:58:41', '2021-04-03 18:04:31'),
(3, 'Grochary', '102', 1, 1, 1, '2021-04-03 18:02:42', '2021-04-03 18:04:19'),
(4, 'Pharmecy', '101', 1, 1, NULL, '2021-04-03 18:04:42', NULL),
(5, 'Fashion', '104', 1, 1, NULL, '2021-04-19 04:53:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `start_salary_setups`
--

CREATE TABLE `start_salary_setups` (
  `salarySetupId` bigint(20) UNSIGNED NOT NULL,
  `employeEntryId` int(11) NOT NULL,
  `jobDepartmentId` int(11) NOT NULL,
  `gradeEntryId` int(11) NOT NULL,
  `startDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthDate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salarySetupStatus` tinyint(1) NOT NULL,
  `paymentStatus` int(11) NOT NULL DEFAULT 0,
  `shopId` int(11) NOT NULL,
  `shopTypeId` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `start_salary_setups`
--

INSERT INTO `start_salary_setups` (`salarySetupId`, `employeEntryId`, `jobDepartmentId`, `gradeEntryId`, `startDate`, `monthDate`, `salarySetupStatus`, `paymentStatus`, `shopId`, `shopTypeId`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 2, 7, 5, '1991-12-06 08:36:02', '08', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:13:35', '2020-06-28 08:13:35'),
(2, 2, 3, 2, '1973-10-25 22:38:47', '08', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:13:35', '2020-06-28 08:13:35'),
(3, 2, 6, 5, '1973-12-01 21:35:08', '08', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:35', '2020-06-28 08:13:35'),
(4, 2, 4, 3, '1977-04-10 14:15:45', '08', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(5, 2, 4, 1, '1979-07-15 12:25:20', '08', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(6, 1, 6, 2, '1970-12-11 23:46:20', '04', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(7, 1, 3, 6, '2010-01-21 12:31:01', '04', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(8, 1, 7, 2, '2005-07-14 10:14:54', '04', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(9, 1, 4, 1, '2016-04-22 12:25:45', '04', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(10, 5, 6, 2, '1977-07-17 03:51:16', '05', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(11, 3, 4, 2, '2006-10-08 16:36:58', '05', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(12, 5, 4, 2, '2008-07-30 02:00:06', '10', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(13, 3, 7, 3, '2020-04-26 01:49:42', '11', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(14, 5, 5, 4, '2001-11-02 13:25:28', '08', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(15, 3, 5, 2, '1983-03-16 11:50:01', '09', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(16, 4, 6, 1, '1980-03-23 08:17:45', '12', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(17, 5, 3, 2, '2012-02-17 18:15:36', '12', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(18, 2, 5, 4, '1979-05-21 02:56:38', '09', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(19, 2, 7, 5, '1989-08-03 15:01:15', '08', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(20, 5, 6, 3, '1972-01-19 03:33:06', '08', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(21, 1, 6, 1, '2007-04-27 18:28:58', '01', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(22, 2, 7, 4, '2011-05-07 22:38:55', '02', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(23, 2, 6, 4, '2008-12-28 20:18:06', '02', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(24, 4, 5, 2, '1991-06-30 13:26:46', '07', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(25, 4, 6, 2, '2002-10-11 18:49:48', '03', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(26, 4, 4, 3, '1978-09-28 07:31:42', '10', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(27, 2, 6, 3, '2016-04-16 07:58:18', '12', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:13:36', '2020-06-28 08:13:36'),
(28, 4, 4, 4, '1977-01-09 06:05:29', '10', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(29, 1, 7, 5, '1986-10-04 17:20:40', '10', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(30, 4, 3, 6, '2017-07-22 09:38:57', '05', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(31, 4, 3, 5, '1986-02-07 02:03:44', '05', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(32, 5, 4, 1, '2002-11-15 05:27:59', '03', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(33, 1, 5, 6, '2002-09-07 00:46:11', '04', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(34, 4, 4, 6, '1985-08-27 05:15:21', '05', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(35, 3, 4, 4, '2011-03-20 14:05:24', '09', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(36, 5, 7, 6, '2009-03-29 14:49:45', '10', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(37, 6, 3, 1, '2015-09-09 15:31:48', '07', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(38, 6, 5, 3, '2003-06-05 22:31:51', '03', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(39, 4, 7, 6, '1992-01-27 12:39:22', '05', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(40, 1, 3, 1, '1998-04-19 18:53:21', '01', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(41, 2, 3, 6, '1975-10-19 04:02:54', '01', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(42, 3, 7, 5, '1972-11-07 02:39:31', '08', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(43, 3, 6, 5, '2004-10-26 10:35:18', '09', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(44, 2, 5, 3, '2019-09-08 23:14:45', '01', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(45, 6, 7, 6, '2012-01-18 16:17:27', '09', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(46, 2, 6, 1, '1980-10-08 14:51:22', '05', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(47, 5, 7, 3, '1981-10-16 02:19:04', '10', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(48, 1, 3, 4, '1982-08-13 06:31:29', '02', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(49, 4, 7, 4, '2015-11-12 02:31:49', '06', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(50, 5, 3, 1, '2005-07-17 18:55:39', '03', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:13:37', '2020-06-28 08:13:37'),
(51, 6, 3, 2, '1987-08-13 05:18:46', '02', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:32:55', '2020-06-28 08:32:55'),
(52, 5, 5, 3, '1993-10-16 10:55:06', '06', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:32:55', '2020-06-28 08:32:55'),
(53, 3, 4, 5, '2013-07-24 20:29:23', '03', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:32:55', '2020-06-28 08:32:55'),
(54, 3, 4, 2, '2020-03-07 00:00:06', '10', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(55, 2, 6, 5, '1986-03-12 19:46:09', '08', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(56, 3, 6, 5, '1991-05-11 09:17:19', '06', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(57, 4, 6, 2, '1982-06-11 17:46:12', '10', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(58, 6, 4, 1, '2007-06-24 18:50:08', '03', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(59, 2, 3, 2, '1986-03-05 13:50:06', '12', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(60, 5, 3, 4, '2002-03-08 09:36:42', '06', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(61, 1, 6, 6, '1980-03-24 15:28:33', '05', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(62, 4, 7, 3, '1985-03-22 10:03:45', '02', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(63, 4, 4, 3, '1992-07-11 12:57:02', '08', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(64, 2, 7, 6, '1993-04-10 11:12:16', '08', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(65, 2, 7, 6, '1988-06-22 13:06:10', '06', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(66, 1, 3, 4, '2000-11-27 06:37:31', '06', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(67, 2, 4, 5, '1982-02-17 19:07:43', '03', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(68, 5, 5, 4, '1972-11-14 10:59:44', '10', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(69, 4, 6, 1, '2018-11-13 21:50:45', '09', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(70, 6, 5, 6, '2006-09-20 00:41:01', '03', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(71, 1, 4, 5, '1996-08-04 23:57:47', '11', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:32:56', '2020-06-28 08:32:56'),
(72, 2, 5, 5, '1996-04-29 12:17:52', '11', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(73, 2, 7, 5, '2002-10-14 03:21:33', '12', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(74, 3, 4, 1, '1973-01-11 10:53:31', '10', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(75, 6, 7, 2, '1984-03-05 16:56:29', '05', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(76, 2, 5, 5, '1989-11-13 07:00:36', '12', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(77, 5, 6, 6, '1979-09-15 01:51:27', '04', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(78, 3, 3, 2, '1999-03-19 20:53:36', '10', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(79, 4, 6, 2, '1997-09-09 15:36:12', '05', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(80, 1, 6, 6, '2005-11-05 14:29:37', '08', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(81, 6, 7, 1, '1995-08-17 10:20:04', '05', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(82, 1, 7, 2, '1983-05-05 07:50:49', '05', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(83, 6, 3, 5, '2012-04-29 15:40:49', '03', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(84, 5, 4, 6, '1991-09-25 05:22:56', '05', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(85, 3, 7, 1, '1993-10-16 18:07:42', '08', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(86, 3, 6, 1, '1971-08-11 00:26:52', '04', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(87, 4, 4, 5, '1982-04-26 03:14:13', '12', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(88, 5, 5, 3, '1980-12-28 01:44:51', '11', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(89, 1, 6, 2, '2006-10-22 11:23:57', '07', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(90, 4, 3, 1, '1986-01-15 17:38:44', '12', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(91, 5, 6, 6, '1988-03-06 03:43:29', '11', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(92, 4, 3, 2, '1985-07-24 05:38:53', '04', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(93, 2, 6, 4, '1981-05-20 18:44:00', '12', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(94, 1, 5, 6, '2012-02-23 11:01:00', '04', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(95, 2, 4, 2, '1978-03-22 07:32:44', '11', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(96, 4, 3, 3, '2010-01-27 00:17:26', '05', 1, 1, 1, 1, 3, NULL, '2020-06-28 08:32:57', '2020-06-28 08:32:57'),
(97, 2, 4, 5, '1992-09-10 20:32:56', '06', 1, 0, 1, 1, 3, NULL, '2020-06-28 08:32:58', '2020-06-28 08:32:58'),
(98, 2, 4, 1, '2005-07-12 23:49:18', '10', 2, 0, 1, 1, 3, NULL, '2020-06-28 08:32:58', '2020-06-28 08:32:58'),
(99, 6, 7, 6, '1977-08-11 00:02:09', '09', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:32:58', '2020-06-28 08:32:58'),
(100, 3, 6, 3, '1994-06-21 22:42:23', '09', 2, 1, 1, 1, 3, NULL, '2020-06-28 08:32:58', '2020-06-28 08:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `unions`
--

CREATE TABLE `unions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `upazila_id` int(11) NOT NULL,
  `union_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `union_bn_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unions`
--

INSERT INTO `unions` (`id`, `upazila_id`, `union_name`, `union_bn_name`, `created_at`, `updated_at`) VALUES
(1, 107, 'Fazilpur', '', NULL, NULL),
(2, 107, 'Barahipur', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unite_entries`
--

CREATE TABLE `unite_entries` (
  `uniteEntryId` bigint(20) UNSIGNED NOT NULL,
  `uniteEntryName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uniteEntryStatus` int(11) NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unite_entries`
--

INSERT INTO `unite_entries` (`uniteEntryId`, `uniteEntryName`, `uniteEntryStatus`, `createBy`, `updateBy`, `created_at`, `updated_at`) VALUES
(1, 'Box', 1, 1, NULL, '2020-03-22 04:48:05', NULL),
(2, 'PC', 1, 1, 1, '2020-03-22 04:48:12', '2020-06-24 08:49:20'),
(3, 'KG', 1, 1, 1, '2020-06-24 08:48:41', '2020-06-24 08:50:34'),
(4, 'KA', 1, 1, 1, '2020-06-24 08:50:03', '2020-06-25 05:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` int(11) NOT NULL,
  `upazila_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazila_bn_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `upazila_name`, `upazila_bn_name`, `created_at`, `updated_at`) VALUES
(1, 34, 'Amtali', 'আমতলী', '0000-00-00 00:00:00', '2016-04-06 00:48:15'),
(2, 34, 'Bamna ', 'বামনা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 34, 'Barguna Sadar ', 'বরগুনা সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 34, 'Betagi ', 'বেতাগি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 34, 'Patharghata ', 'পাথরঘাটা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 34, 'Taltali ', 'তালতলী', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 35, 'Muladi ', 'মুলাদি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 35, 'Babuganj ', 'বাবুগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 35, 'Agailjhara ', 'আগাইলঝরা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 35, 'Barisal Sadar ', 'বরিশাল সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 35, 'Bakerganj ', 'বাকেরগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 35, 'Banaripara ', 'বানাড়িপারা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 35, 'Gaurnadi ', 'গৌরনদী', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 35, 'Hizla ', 'হিজলা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 35, 'Mehendiganj ', 'মেহেদিগঞ্জ ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 35, 'Wazirpur ', 'ওয়াজিরপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 36, 'Bhola Sadar ', 'ভোলা সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 36, 'Burhanuddin ', 'বুরহানউদ্দিন', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 36, 'Char Fasson ', 'চর ফ্যাশন', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 36, 'Daulatkhan ', 'দৌলতখান', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 36, 'Lalmohan ', 'লালমোহন', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 36, 'Manpura ', 'মনপুরা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 36, 'Tazumuddin ', 'তাজুমুদ্দিন', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 37, 'Jhalokati Sadar ', 'ঝালকাঠি সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 37, 'Kathalia ', 'কাঁঠালিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 37, 'Nalchity ', 'নালচিতি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 37, 'Rajapur ', 'রাজাপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 38, 'Bauphal ', 'বাউফল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 38, 'Dashmina ', 'দশমিনা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 38, 'Galachipa ', 'গলাচিপা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 38, 'Kalapara ', 'কালাপারা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 38, 'Mirzaganj ', 'মির্জাগঞ্জ ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 38, 'Patuakhali Sadar ', 'পটুয়াখালী সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 38, 'Dumki ', 'ডুমকি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 38, 'Rangabali ', 'রাঙ্গাবালি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 39, 'Bhandaria', 'ভ্যান্ডারিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 39, 'Kaukhali', 'কাউখালি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 39, 'Mathbaria', 'মাঠবাড়িয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 39, 'Nazirpur', 'নাজিরপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 39, 'Nesarabad', 'নেসারাবাদ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 39, 'Pirojpur Sadar', 'পিরোজপুর সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 39, 'Zianagar', 'জিয়ানগর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 40, 'Bandarban Sadar', 'বান্দরবন সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 40, 'Thanchi', 'থানচি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 40, 'Lama', 'লামা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 40, 'Naikhongchhari', 'নাইখংছড়ি ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 40, 'Ali kadam', 'আলী কদম', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 40, 'Rowangchhari', 'রউয়াংছড়ি ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 40, 'Ruma', 'রুমা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 41, 'Brahmanbaria Sadar ', 'ব্রাহ্মণবাড়িয়া সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 41, 'Ashuganj ', 'আশুগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 41, 'Nasirnagar ', 'নাসির নগর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 41, 'Nabinagar ', 'নবীনগর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 41, 'Sarail ', 'সরাইল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 41, 'Shahbazpur Town', 'শাহবাজপুর টাউন', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 41, 'Kasba ', 'কসবা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 41, 'Akhaura ', 'আখাউরা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 41, 'Bancharampur ', 'বাঞ্ছারামপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 41, 'Bijoynagar ', 'বিজয় নগর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 42, 'Chandpur Sadar', 'চাঁদপুর সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 42, 'Faridganj', 'ফরিদগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 42, 'Haimchar', 'হাইমচর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 42, 'Haziganj', 'হাজীগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 42, 'Kachua', 'কচুয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 42, 'Matlab Uttar', 'মতলব উত্তর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 42, 'Matlab Dakkhin', 'মতলব দক্ষিণ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 42, 'Shahrasti', 'শাহরাস্তি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 43, 'Anwara ', 'আনোয়ারা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 43, 'Banshkhali ', 'বাশখালি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 43, 'Boalkhali ', 'বোয়ালখালি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 43, 'Chandanaish ', 'চন্দনাইশ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 43, 'Fatikchhari ', 'ফটিকছড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 43, 'Hathazari ', 'হাঠহাজারী', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 43, 'Lohagara ', 'লোহাগারা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 43, 'Mirsharai ', 'মিরসরাই', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 43, 'Patiya ', 'পটিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 43, 'Rangunia ', 'রাঙ্গুনিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 43, 'Raozan ', 'রাউজান', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 43, 'Sandwip ', 'সন্দ্বীপ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 43, 'Satkania ', 'সাতকানিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 43, 'Sitakunda ', 'সীতাকুণ্ড', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 44, 'Barura ', 'বড়ুরা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 44, 'Brahmanpara ', 'ব্রাহ্মণপাড়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 44, 'Burichong ', 'বুড়িচং', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 44, 'Chandina ', 'চান্দিনা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 44, 'Chauddagram ', 'চৌদ্দগ্রাম', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 44, 'Daudkandi ', 'দাউদকান্দি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 44, 'Debidwar ', 'দেবীদ্বার', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 44, 'Homna ', 'হোমনা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 44, 'Comilla Sadar ', 'কুমিল্লা সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 44, 'Laksam ', 'লাকসাম', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 44, 'Monohorgonj ', 'মনোহরগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 44, 'Meghna ', 'মেঘনা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 44, 'Muradnagar ', 'মুরাদনগর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 44, 'Nangalkot ', 'নাঙ্গালকোট', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 44, 'Comilla Sadar South ', 'কুমিল্লা সদর দক্ষিণ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 44, 'Titas ', 'তিতাস', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 45, 'Chakaria ', 'চকরিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 45, 'Chakaria ', 'চকরিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 45, 'Cox\'s Bazar Sadar ', 'কক্স বাজার সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 45, 'Kutubdia ', 'কুতুবদিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 45, 'Maheshkhali ', 'মহেশখালী', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 45, 'Ramu ', 'রামু', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 45, 'Teknaf ', 'টেকনাফ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 45, 'Ukhia ', 'উখিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 45, 'Pekua ', 'পেকুয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 46, 'Feni Sadar', 'ফেনী সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 46, 'Chagalnaiya', 'ছাগল নাইয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 46, 'Daganbhyan', 'দাগানভিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 46, 'Parshuram', 'পরশুরাম', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 46, 'Fhulgazi', 'ফুলগাজি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 46, 'Sonagazi', 'সোনাগাজি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 47, 'Dighinala ', 'দিঘিনালা ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 47, 'Khagrachhari ', 'খাগড়াছড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 47, 'Lakshmichhari ', 'লক্ষ্মীছড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 47, 'Mahalchhari ', 'মহলছড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 47, 'Manikchhari ', 'মানিকছড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 47, 'Matiranga ', 'মাটিরাঙ্গা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 47, 'Panchhari ', 'পানছড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 47, 'Ramgarh ', 'রামগড়', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 48, 'Lakshmipur Sadar ', 'লক্ষ্মীপুর সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 48, 'Raipur ', 'রায়পুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 48, 'Ramganj ', 'রামগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 48, 'Ramgati ', 'রামগতি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 48, 'Komol Nagar ', 'কমল নগর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 49, 'Noakhali Sadar ', 'নোয়াখালী সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 49, 'Begumganj ', 'বেগমগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 49, 'Chatkhil ', 'চাটখিল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 49, 'Companyganj ', 'কোম্পানীগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 49, 'Shenbag ', 'শেনবাগ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 49, 'Hatia ', 'হাতিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 49, 'Kobirhat ', 'কবিরহাট ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 49, 'Sonaimuri ', 'সোনাইমুরি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 49, 'Suborno Char ', 'সুবর্ণ চর ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 50, 'Rangamati Sadar ', 'রাঙ্গামাটি সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 50, 'Belaichhari ', 'বেলাইছড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 50, 'Bagaichhari ', 'বাঘাইছড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 50, 'Barkal ', 'বরকল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 50, 'Juraichhari ', 'জুরাইছড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 50, 'Rajasthali ', 'রাজাস্থলি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 50, 'Kaptai ', 'কাপ্তাই', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 50, 'Langadu ', 'লাঙ্গাডু', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 50, 'Nannerchar ', 'নান্নেরচর ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 50, 'Kaukhali ', 'কাউখালি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 2, 'Faridpur Sadar ', 'ফরিদপুর সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 2, 'Boalmari ', 'বোয়ালমারী', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 2, 'Alfadanga ', 'আলফাডাঙ্গা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 2, 'Madhukhali ', 'মধুখালি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 2, 'Bhanga ', 'ভাঙ্গা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 2, 'Nagarkanda ', 'নগরকান্ড', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 2, 'Charbhadrasan ', 'চরভদ্রাসন ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 2, 'Sadarpur ', 'সদরপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 2, 'Shaltha ', 'শালথা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 3, 'Gazipur Sadar-Joydebpur', 'গাজীপুর সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 3, 'Kaliakior', 'কালিয়াকৈর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 3, 'Kapasia', 'কাপাসিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 3, 'Sripur', 'শ্রীপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 3, 'Kaliganj', 'কালীগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 3, 'Tongi', 'টঙ্গি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 4, 'Gopalganj Sadar ', 'গোপালগঞ্জ সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 4, 'Kashiani ', 'কাশিয়ানি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 4, 'Kotalipara ', 'কোটালিপাড়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 4, 'Muksudpur ', 'মুকসুদপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 4, 'Tungipara ', 'টুঙ্গিপাড়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 5, 'Dewanganj ', 'দেওয়ানগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 5, 'Baksiganj ', 'বকসিগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 5, 'Islampur ', 'ইসলামপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 5, 'Jamalpur Sadar ', 'জামালপুর সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 5, 'Madarganj ', 'মাদারগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 5, 'Melandaha ', 'মেলানদাহা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 5, 'Sarishabari ', 'সরিষাবাড়ি ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 5, 'Narundi Police I.C', 'নারুন্দি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 6, 'Astagram ', 'অষ্টগ্রাম', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 6, 'Bajitpur ', 'বাজিতপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 6, 'Bhairab ', 'ভৈরব', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 6, 'Hossainpur ', 'হোসেনপুর ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 6, 'Itna ', 'ইটনা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 6, 'Karimganj ', 'করিমগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 6, 'Katiadi ', 'কতিয়াদি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 6, 'Kishoreganj Sadar ', 'কিশোরগঞ্জ সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 6, 'Kuliarchar ', 'কুলিয়ারচর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 6, 'Mithamain ', 'মিঠামাইন', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 6, 'Nikli ', 'নিকলি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 6, 'Pakundia ', 'পাকুন্ডা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 6, 'Tarail ', 'তাড়াইল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 7, 'Madaripur Sadar', 'মাদারীপুর সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 7, 'Kalkini', 'কালকিনি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 7, 'Rajoir', 'রাজইর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 7, 'Shibchar', 'শিবচর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 8, 'Manikganj Sadar ', 'মানিকগঞ্জ সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 8, 'Singair ', 'সিঙ্গাইর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 8, 'Shibalaya ', 'শিবালয়', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 8, 'Saturia ', 'সাঠুরিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 8, 'Harirampur ', 'হরিরামপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 8, 'Ghior ', 'ঘিওর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 8, 'Daulatpur ', 'দৌলতপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 9, 'Lohajang ', 'লোহাজং', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 9, 'Sreenagar ', 'শ্রীনগর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 9, 'Munshiganj Sadar ', 'মুন্সিগঞ্জ সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 9, 'Sirajdikhan ', 'সিরাজদিখান', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 9, 'Tongibari ', 'টঙ্গিবাড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 9, 'Gazaria ', 'গজারিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 10, 'Bhaluka', 'ভালুকা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 10, 'Trishal', 'ত্রিশাল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 10, 'Haluaghat', 'হালুয়াঘাট', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 10, 'Muktagachha', 'মুক্তাগাছা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 10, 'Dhobaura', 'ধবারুয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 10, 'Fulbaria', 'ফুলবাড়িয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 10, 'Gaffargaon', 'গফরগাঁও', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 10, 'Gauripur', 'গৌরিপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 10, 'Ishwarganj', 'ঈশ্বরগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 10, 'Mymensingh Sadar', 'ময়মনসিং সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 10, 'Nandail', 'নন্দাইল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 10, 'Phulpur', 'ফুলপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 11, 'Araihazar ', 'আড়াইহাজার', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 11, 'Sonargaon ', 'সোনারগাঁও', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 11, 'Bandar', 'বান্দার', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 11, 'Naryanganj Sadar ', 'নারায়ানগঞ্জ সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 11, 'Rupganj ', 'রূপগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 11, 'Siddirgonj ', 'সিদ্ধিরগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 12, 'Belabo ', 'বেলাবো', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 12, 'Monohardi ', 'মনোহরদি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 12, 'Narsingdi Sadar ', 'নরসিংদী সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 12, 'Palash ', 'পলাশ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 12, 'Raipura , Narsingdi', 'রায়পুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 12, 'Shibpur ', 'শিবপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 13, 'Kendua Upazilla', 'কেন্দুয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 13, 'Atpara Upazilla', 'আটপাড়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 13, 'Barhatta Upazilla', 'বরহাট্টা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 13, 'Durgapur Upazilla', 'দুর্গাপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 13, 'Kalmakanda Upazilla', 'কলমাকান্দা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 13, 'Madan Upazilla', 'মদন', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 13, 'Mohanganj Upazilla', 'মোহনগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 13, 'Netrakona-S Upazilla', 'নেত্রকোনা সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 13, 'Purbadhala Upazilla', 'পূর্বধলা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 13, 'Khaliajuri Upazilla', 'খালিয়াজুরি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 14, 'Baliakandi ', 'বালিয়াকান্দি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 14, 'Goalandaghat ', 'গোয়ালন্দ ঘাট', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 14, 'Pangsha ', 'পাংশা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 14, 'Kalukhali ', 'কালুখালি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 14, 'Rajbari Sadar ', 'রাজবাড়ি সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 15, 'Shariatpur Sadar -Palong', 'শরীয়তপুর সদর ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 15, 'Damudya ', 'দামুদিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 15, 'Naria ', 'নড়িয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 15, 'Jajira ', 'জাজিরা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 15, 'Bhedarganj ', 'ভেদারগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 15, 'Gosairhat ', 'গোসাইর হাট ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 16, 'Jhenaigati ', 'ঝিনাইগাতি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 16, 'Nakla ', 'নাকলা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 16, 'Nalitabari ', 'নালিতাবাড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 16, 'Sherpur Sadar ', 'শেরপুর সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 16, 'Sreebardi ', 'শ্রীবরদি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 17, 'Tangail Sadar ', 'টাঙ্গাইল সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 17, 'Sakhipur ', 'সখিপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 17, 'Basail ', 'বসাইল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 17, 'Madhupur ', 'মধুপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 17, 'Ghatail ', 'ঘাটাইল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 17, 'Kalihati ', 'কালিহাতি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 17, 'Nagarpur ', 'নগরপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 17, 'Mirzapur ', 'মির্জাপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 17, 'Gopalpur ', 'গোপালপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 17, 'Delduar ', 'দেলদুয়ার', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 17, 'Bhuapur ', 'ভুয়াপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 17, 'Dhanbari ', 'ধানবাড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 55, 'Bagerhat Sadar ', 'বাগেরহাট সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 55, 'Chitalmari ', 'চিতলমাড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 55, 'Fakirhat ', 'ফকিরহাট', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 55, 'Kachua ', 'কচুয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, 55, 'Mollahat ', 'মোল্লাহাট ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, 55, 'Mongla ', 'মংলা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 55, 'Morrelganj ', 'মরেলগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 55, 'Rampal ', 'রামপাল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 55, 'Sarankhola ', 'স্মরণখোলা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 56, 'Damurhuda ', 'দামুরহুদা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 56, 'Chuadanga-S ', 'চুয়াডাঙ্গা সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 56, 'Jibannagar ', 'জীবন নগর ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, 56, 'Alamdanga ', 'আলমডাঙ্গা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, 57, 'Abhaynagar ', 'অভয়নগর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, 57, 'Keshabpur ', 'কেশবপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, 57, 'Bagherpara ', 'বাঘের পাড়া ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, 57, 'Jessore Sadar ', 'যশোর সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, 57, 'Chaugachha ', 'চৌগাছা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, 57, 'Manirampur ', 'মনিরামপুর ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, 57, 'Jhikargachha ', 'ঝিকরগাছা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, 57, 'Sharsha ', 'সারশা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, 58, 'Jhenaidah Sadar ', 'ঝিনাইদহ সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, 58, 'Maheshpur ', 'মহেশপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, 58, 'Kaliganj ', 'কালীগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, 58, 'Kotchandpur ', 'কোট চাঁদপুর ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, 58, 'Shailkupa ', 'শৈলকুপা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 58, 'Harinakunda ', 'হাড়িনাকুন্দা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, 59, 'Terokhada ', 'তেরোখাদা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, 59, 'Batiaghata ', 'বাটিয়াঘাটা ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, 59, 'Dacope ', 'ডাকপে', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, 59, 'Dumuria ', 'ডুমুরিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 59, 'Dighalia ', 'দিঘলিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, 59, 'Koyra ', 'কয়ড়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, 59, 'Paikgachha ', 'পাইকগাছা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, 59, 'Phultala ', 'ফুলতলা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, 59, 'Rupsa ', 'রূপসা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, 60, 'Kushtia Sadar', 'কুষ্টিয়া সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(307, 60, 'Kumarkhali', 'কুমারখালি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, 60, 'Daulatpur', 'দৌলতপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, 60, 'Mirpur', 'মিরপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(310, 60, 'Bheramara', 'ভেরামারা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, 60, 'Khoksa', 'খোকসা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(312, 61, 'Magura Sadar ', 'মাগুরা সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(313, 61, 'Mohammadpur ', 'মোহাম্মাদপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, 61, 'Shalikha ', 'শালিখা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, 61, 'Sreepur ', 'শ্রীপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, 62, 'angni ', 'আংনি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(317, 62, 'Mujib Nagar ', 'মুজিব নগর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, 62, 'Meherpur-S ', 'মেহেরপুর সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, 63, 'Narail-S Upazilla', 'নড়াইল সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, 63, 'Lohagara Upazilla', 'লোহাগাড়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, 63, 'Kalia Upazilla', 'কালিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, 64, 'Satkhira Sadar ', 'সাতক্ষীরা সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, 64, 'Assasuni ', 'আসসাশুনি ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(324, 64, 'Debhata ', 'দেভাটা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(325, 64, 'Tala ', 'তালা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(326, 64, 'Kalaroa ', 'কলরোয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(327, 64, 'Kaliganj ', 'কালীগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(328, 64, 'Shyamnagar ', 'শ্যামনগর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(329, 18, 'Adamdighi', 'আদমদিঘী', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(330, 18, 'Bogra Sadar', 'বগুড়া সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(331, 18, 'Sherpur', 'শেরপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(332, 18, 'Dhunat', 'ধুনট', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(333, 18, 'Dhupchanchia', 'দুপচাচিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(334, 18, 'Gabtali', 'গাবতলি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(335, 18, 'Kahaloo', 'কাহালু', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(336, 18, 'Nandigram', 'নন্দিগ্রাম', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(337, 18, 'Sahajanpur', 'শাহজাহানপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(338, 18, 'Sariakandi', 'সারিয়াকান্দি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(339, 18, 'Shibganj', 'শিবগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(340, 18, 'Sonatala', 'সোনাতলা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(341, 19, 'Joypurhat S', 'জয়পুরহাট সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(342, 19, 'Akkelpur', 'আক্কেলপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(343, 19, 'Kalai', 'কালাই', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(344, 19, 'Khetlal', 'খেতলাল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(345, 19, 'Panchbibi', 'পাঁচবিবি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(346, 20, 'Naogaon Sadar ', 'নওগাঁ সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(347, 20, 'Mohadevpur ', 'মহাদেবপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(348, 20, 'Manda ', 'মান্দা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(349, 20, 'Niamatpur ', 'নিয়ামতপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(350, 20, 'Atrai ', 'আত্রাই', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(351, 20, 'Raninagar ', 'রাণীনগর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(352, 20, 'Patnitala ', 'পত্নীতলা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(353, 20, 'Dhamoirhat ', 'ধামইরহাট ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(354, 20, 'Sapahar ', 'সাপাহার', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(355, 20, 'Porsha ', 'পোরশা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(356, 20, 'Badalgachhi ', 'বদলগাছি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(357, 21, 'Natore Sadar ', 'নাটোর সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(358, 21, 'Baraigram ', 'বড়াইগ্রাম', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(359, 21, 'Bagatipara ', 'বাগাতিপাড়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(360, 21, 'Lalpur ', 'লালপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(361, 21, 'Natore Sadar ', 'নাটোর সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(362, 21, 'Baraigram ', 'বড়াই গ্রাম', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(363, 22, 'Bholahat ', 'ভোলাহাট', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(364, 22, 'Gomastapur ', 'গোমস্তাপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(365, 22, 'Nachole ', 'নাচোল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(366, 22, 'Nawabganj Sadar ', 'নবাবগঞ্জ সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(367, 22, 'Shibganj ', 'শিবগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(368, 23, 'Atgharia ', 'আটঘরিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(369, 23, 'Bera ', 'বেড়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(370, 23, 'Bhangura ', 'ভাঙ্গুরা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(371, 23, 'Chatmohar ', 'চাটমোহর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(372, 23, 'Faridpur ', 'ফরিদপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(373, 23, 'Ishwardi ', 'ঈশ্বরদী', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(374, 23, 'Pabna Sadar ', 'পাবনা সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(375, 23, 'Santhia ', 'সাথিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(376, 23, 'Sujanagar ', 'সুজানগর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(377, 24, 'Bagha', 'বাঘা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(378, 24, 'Bagmara', 'বাগমারা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(379, 24, 'Charghat', 'চারঘাট', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(380, 24, 'Durgapur', 'দুর্গাপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(381, 24, 'Godagari', 'গোদাগারি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(382, 24, 'Mohanpur', 'মোহনপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(383, 24, 'Paba', 'পবা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(384, 24, 'Puthia', 'পুঠিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(385, 24, 'Tanore', 'তানোর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(386, 25, 'Sirajganj Sadar ', 'সিরাজগঞ্জ সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(387, 25, 'Belkuchi ', 'বেলকুচি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(388, 25, 'Chauhali ', 'চৌহালি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(389, 25, 'Kamarkhanda ', 'কামারখান্দা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(390, 25, 'Kazipur ', 'কাজীপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(391, 25, 'Raiganj ', 'রায়গঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(392, 25, 'Shahjadpur ', 'শাহজাদপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(393, 25, 'Tarash ', 'তারাশ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(394, 25, 'Ullahpara ', 'উল্লাপাড়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(395, 26, 'Birampur ', 'বিরামপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(396, 26, 'Birganj', 'বীরগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(397, 26, 'Biral ', 'বিড়াল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(398, 26, 'Bochaganj ', 'বোচাগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(399, 26, 'Chirirbandar ', 'চিরিরবন্দর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(400, 26, 'Phulbari ', 'ফুলবাড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(401, 26, 'Ghoraghat ', 'ঘোড়াঘাট', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(402, 26, 'Hakimpur ', 'হাকিমপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(403, 26, 'Kaharole ', 'কাহারোল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(404, 26, 'Khansama ', 'খানসামা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(405, 26, 'Dinajpur Sadar ', 'দিনাজপুর সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(406, 26, 'Nawabganj', 'নবাবগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(407, 26, 'Parbatipur ', 'পার্বতীপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(408, 27, 'Fulchhari', 'ফুলছড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(409, 27, 'Gaibandha sadar', 'গাইবান্ধা সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(410, 27, 'Gobindaganj', 'গোবিন্দগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(411, 27, 'Palashbari', 'পলাশবাড়ী', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(412, 27, 'Sadullapur', 'সাদুল্যাপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(413, 27, 'Saghata', 'সাঘাটা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(414, 27, 'Sundarganj', 'সুন্দরগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(415, 28, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(416, 28, 'Nageshwari', 'নাগেশ্বরী', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(417, 28, 'Bhurungamari', 'ভুরুঙ্গামারি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(418, 28, 'Phulbari', 'ফুলবাড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(419, 28, 'Rajarhat', 'রাজারহাট', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(420, 28, 'Ulipur', 'উলিপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(421, 28, 'Chilmari', 'চিলমারি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(422, 28, 'Rowmari', 'রউমারি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(423, 28, 'Char Rajibpur', 'চর রাজিবপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(424, 29, 'Lalmanirhat Sadar', 'লালমনিরহাট সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(425, 29, 'Aditmari', 'আদিতমারি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(426, 29, 'Kaliganj', 'কালীগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(427, 29, 'Hatibandha', 'হাতিবান্ধা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(428, 29, 'Patgram', 'পাটগ্রাম', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(429, 30, 'Nilphamari Sadar', 'নীলফামারী সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(430, 30, 'Saidpur', 'সৈয়দপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(431, 30, 'Jaldhaka', 'জলঢাকা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(432, 30, 'Kishoreganj', 'কিশোরগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(433, 30, 'Domar', 'ডোমার', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(434, 30, 'Dimla', 'ডিমলা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(435, 31, 'Panchagarh Sadar', 'পঞ্চগড় সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(436, 31, 'Debiganj', 'দেবীগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(437, 31, 'Boda', 'বোদা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(438, 31, 'Atwari', 'আটোয়ারি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(439, 31, 'Tetulia', 'তেতুলিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(440, 32, 'Badarganj', 'বদরগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(441, 32, 'Mithapukur', 'মিঠাপুকুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(442, 32, 'Gangachara', 'গঙ্গাচরা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(443, 32, 'Kaunia', 'কাউনিয়া', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(444, 32, 'Rangpur Sadar', 'রংপুর সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(445, 32, 'Pirgachha', 'পীরগাছা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(446, 32, 'Pirganj', 'পীরগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(447, 32, 'Taraganj', 'তারাগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(448, 33, 'Thakurgaon Sadar ', 'ঠাকুরগাঁও সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(449, 33, 'Pirganj ', 'পীরগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(450, 33, 'Baliadangi ', 'বালিয়াডাঙ্গি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(451, 33, 'Haripur ', 'হরিপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(452, 33, 'Ranisankail ', 'রাণীসংকইল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(453, 51, 'Ajmiriganj', 'আজমিরিগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(454, 51, 'Baniachang', 'বানিয়াচং', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(455, 51, 'Bahubal', 'বাহুবল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(456, 51, 'Chunarughat', 'চুনারুঘাট', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(457, 51, 'Habiganj Sadar', 'হবিগঞ্জ সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(458, 51, 'Lakhai', 'লাক্ষাই', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(459, 51, 'Madhabpur', 'মাধবপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(460, 51, 'Nabiganj', 'নবীগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(461, 51, 'Shaistagonj ', 'শায়েস্তাগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(462, 52, 'Moulvibazar Sadar', 'মৌলভীবাজার', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(463, 52, 'Barlekha', 'বড়লেখা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(464, 52, 'Juri', 'জুড়ি', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(465, 52, 'Kamalganj', 'কামালগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(466, 52, 'Kulaura', 'কুলাউরা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(467, 52, 'Rajnagar', 'রাজনগর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(468, 52, 'Sreemangal', 'শ্রীমঙ্গল', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(469, 53, 'Bishwamvarpur', 'বিসশম্ভারপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(470, 53, 'Chhatak', 'ছাতক', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(471, 53, 'Derai', 'দেড়াই', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(472, 53, 'Dharampasha', 'ধরমপাশা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(473, 53, 'Dowarabazar', 'দোয়ারাবাজার', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(474, 53, 'Jagannathpur', 'জগন্নাথপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(475, 53, 'Jamalganj', 'জামালগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(476, 53, 'Sulla', 'সুল্লা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(477, 53, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(478, 53, 'Shanthiganj', 'শান্তিগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(479, 53, 'Tahirpur', 'তাহিরপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(480, 54, 'Sylhet Sadar', 'সিলেট সদর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(481, 54, 'Beanibazar', 'বেয়ানিবাজার', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(482, 54, 'Bishwanath', 'বিশ্বনাথ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(483, 54, 'Dakshin Surma ', 'দক্ষিণ সুরমা', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(484, 54, 'Balaganj', 'বালাগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(485, 54, 'Companiganj', 'কোম্পানিগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(486, 54, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(487, 54, 'Golapganj', 'গোলাপগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(488, 54, 'Gowainghat', 'গোয়াইনঘাট', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(489, 54, 'Jaintiapur', 'জয়ন্তপুর', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(490, 54, 'Kanaighat', 'কানাইঘাট', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(491, 54, 'Zakiganj', 'জাকিগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(492, 54, 'Nobigonj', 'নবীগঞ্জ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(493, 1, 'Adabor', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(494, 1, 'Airport', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(495, 1, 'Badda', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(496, 1, 'Banani', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(497, 1, 'Bangshal', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(498, 1, 'Bhashantek', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(499, 1, 'Cantonment', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(500, 1, 'Chackbazar', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(501, 1, 'Darussalam', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(502, 1, 'Daskhinkhan', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(503, 1, 'Demra', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(504, 1, 'Dhamrai', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(505, 1, 'Dhanmondi', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(506, 1, 'Dohar', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(507, 1, 'Gandaria', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(508, 1, 'Gulshan', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(509, 1, 'Hazaribag', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(510, 1, 'Jatrabari', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(511, 1, 'Kafrul', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(512, 1, 'Kalabagan', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(513, 1, 'Kamrangirchar', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(514, 1, 'Keraniganj', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(515, 1, 'Khilgaon', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(516, 1, 'Khilkhet', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(517, 1, 'Kotwali', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(518, 1, 'Lalbag', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(519, 1, 'Mirpur Model', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(520, 1, 'Mohammadpur', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(521, 1, 'Motijheel', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(522, 1, 'Mugda', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(523, 1, 'Nawabganj', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(524, 1, 'New Market', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(525, 1, 'Pallabi', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(526, 1, 'Paltan', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(527, 1, 'Ramna', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(528, 1, 'Rampura', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(529, 1, 'Rupnagar', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(530, 1, 'Sabujbag', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(531, 1, 'Savar', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(532, 1, 'Shah Ali', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(533, 1, 'Shahbag', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(534, 1, 'Shahjahanpur', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(535, 1, 'Sherebanglanagar', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(536, 1, 'Shyampur', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(537, 1, 'Sutrapur', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(538, 1, 'Tejgaon', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(539, 1, 'Tejgaon I/A', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(540, 1, 'Turag', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(541, 1, 'Uttara', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(542, 1, 'Uttara West', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(543, 1, 'Uttarkhan', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(544, 1, 'Vatara', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(545, 1, 'Wari', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(546, 1, 'Others', '', '2016-04-06 05:00:09', '0000-00-00 00:00:00'),
(547, 35, 'Airport', 'এয়ারপোর্ট', '2016-04-06 05:22:44', '0000-00-00 00:00:00'),
(548, 35, 'Kawnia', 'কাউনিয়া', '2016-04-06 05:24:16', '0000-00-00 00:00:00'),
(549, 35, 'Bondor', 'বন্দর', '2016-04-06 05:26:55', '0000-00-00 00:00:00'),
(550, 35, 'Others', 'অন্যান্য', '2016-04-06 05:27:50', '0000-00-00 00:00:00'),
(551, 24, 'Boalia', 'বোয়ালিয়া', '2016-04-06 05:31:49', '0000-00-00 00:00:00'),
(552, 24, 'Motihar', 'মতিহার', '2016-04-06 05:32:36', '0000-00-00 00:00:00'),
(553, 24, 'Shahmokhdum', 'শাহ্ মকখদুম ', '2016-04-06 05:35:51', '0000-00-00 00:00:00'),
(554, 24, 'Rajpara', 'রাজপারা ', '2016-04-06 05:38:08', '0000-00-00 00:00:00'),
(555, 24, 'Others', 'অন্যান্য', '2016-04-06 05:38:45', '0000-00-00 00:00:00'),
(556, 43, 'Akborsha', 'Akborsha', '2016-04-06 05:56:37', '0000-00-00 00:00:00'),
(557, 43, 'Baijid bostami', 'বাইজিদ বোস্তামী', '2016-04-06 06:09:14', '0000-00-00 00:00:00'),
(558, 43, 'Bakolia', 'বাকোলিয়া', '2016-04-06 06:10:28', '0000-00-00 00:00:00'),
(559, 43, 'Bandar', 'বন্দর', '2016-04-06 06:11:29', '0000-00-00 00:00:00'),
(560, 43, 'Chandgaon', 'চাঁদগাও', '2016-04-06 06:12:10', '0000-00-00 00:00:00'),
(561, 43, 'Chokbazar', 'চকবাজার', '2016-04-06 06:12:46', '0000-00-00 00:00:00'),
(562, 43, 'Doublemooring', 'ডাবল মুরিং', '2016-04-06 06:13:46', '0000-00-00 00:00:00'),
(563, 43, 'EPZ', 'ইপিজেড', '2016-04-06 06:14:31', '0000-00-00 00:00:00'),
(564, 43, 'Hali Shohor', 'হলী শহর', '2016-04-06 06:15:30', '0000-00-00 00:00:00'),
(565, 43, 'Kornafuli', 'কর্ণফুলি', '2016-04-06 06:16:05', '0000-00-00 00:00:00'),
(566, 43, 'Kotwali', 'কোতোয়ালী', '2016-04-06 06:16:44', '0000-00-00 00:00:00'),
(567, 43, 'Kulshi', 'কুলশি', '2016-04-06 06:17:45', '0000-00-00 00:00:00'),
(568, 43, 'Pahartali', 'পাহাড়তলী', '2016-04-06 06:19:02', '0000-00-00 00:00:00'),
(569, 43, 'Panchlaish', 'পাঁচলাইশ', '2016-04-06 06:20:00', '0000-00-00 00:00:00'),
(570, 43, 'Potenga', 'পতেঙ্গা', '2016-04-06 06:20:56', '0000-00-00 00:00:00'),
(571, 43, 'Shodhorgat', 'সদরঘাট', '2016-04-06 06:21:55', '0000-00-00 00:00:00'),
(572, 43, 'Others', 'অন্যান্য', '2016-04-06 06:22:27', '0000-00-00 00:00:00'),
(573, 44, 'Others', 'অন্যান্য', '2016-04-06 06:37:35', '0000-00-00 00:00:00'),
(574, 59, 'Aranghata', 'আড়াংঘাটা', '2016-04-06 07:30:26', '0000-00-00 00:00:00'),
(575, 59, 'Daulatpur', 'দৌলতপুর', '2016-04-06 07:31:48', '0000-00-00 00:00:00'),
(576, 59, 'Harintana', 'হারিন্তানা ', '2016-04-06 07:33:42', '0000-00-00 00:00:00'),
(577, 59, 'Horintana', 'হরিণতানা ', '2016-04-06 07:34:47', '0000-00-00 00:00:00'),
(578, 59, 'Khalishpur', 'খালিশপুর', '2016-04-06 07:35:32', '0000-00-00 00:00:00'),
(579, 59, 'Khanjahan Ali', 'খানজাহান আলী', '2016-04-06 07:36:50', '0000-00-00 00:00:00'),
(580, 59, 'Khulna Sadar', 'খুলনা সদর', '2016-04-06 07:37:34', '0000-00-00 00:00:00'),
(581, 59, 'Labanchora', 'লাবানছোরা', '2016-04-06 07:38:59', '0000-00-00 00:00:00'),
(582, 59, 'Sonadanga', 'সোনাডাঙ্গা', '2016-04-06 07:39:58', '0000-00-00 00:00:00'),
(583, 59, 'Others', 'অন্যান্য', '2016-04-06 07:41:50', '0000-00-00 00:00:00'),
(584, 2, 'Others', 'অন্যান্য', '2016-04-06 07:43:32', '0000-00-00 00:00:00'),
(585, 4, 'Others', 'অন্যান্য', '2016-04-06 07:44:43', '0000-00-00 00:00:00'),
(586, 5, 'Others', 'অন্যান্য', '2016-04-06 07:45:54', '0000-00-00 00:00:00'),
(587, 54, 'Airport', 'বিমানবন্দর', '2016-04-06 07:54:23', '0000-00-00 00:00:00'),
(588, 54, 'Hazrat Shah Paran', 'হযরত শাহ পরাণ', '2016-04-06 07:56:49', '0000-00-00 00:00:00'),
(589, 54, 'Jalalabad', 'জালালাবাদ', '2016-04-06 07:57:51', '0000-00-00 00:00:00'),
(590, 54, 'Kowtali', 'কোতোয়ালী', '2016-04-06 07:59:03', '0000-00-00 00:00:00'),
(591, 54, 'Moglabazar', 'মোগলাবাজার', '2016-04-06 08:00:34', '0000-00-00 00:00:00'),
(592, 54, 'Osmani Nagar', 'ওসমানী নগর', '2016-04-06 08:01:12', '0000-00-00 00:00:00'),
(593, 54, 'South Surma', 'দক্ষিণ সুরমা', '2016-04-06 08:01:52', '0000-00-00 00:00:00'),
(594, 54, 'Others', 'অন্যান্য', '2016-04-06 08:02:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `adminId` int(11) DEFAULT NULL,
  `shopId` int(11) DEFAULT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `adminAccessId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopAccessName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createBy` int(11) DEFAULT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `adminId`, `shopId`, `employeeId`, `adminAccessId`, `shopAccessName`, `password`, `address`, `createBy`, `updateBy`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md.Rubel Khan', '01708797991', 'doofaz@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$OJorD8ruDZusjkPazIMYlOROVI80NlUIzKG.UKkgcSmfKvCMG0t4q', 'Dhaka', NULL, 1, 1, NULL, '2020-03-14 03:58:48', '2020-03-18 09:25:07'),
(2, 'Md.Rana Khan', '0170000000', 'rana@gmail.com', NULL, 1, NULL, NULL, '1', NULL, '$2y$10$gJPe.Y2zxXWnkhS4DCGk2eGQZY8OHPnF8C/hBfWFj6GGnRhlFaWGC', 'Dhaka', 1, NULL, 2, NULL, '2020-03-14 04:00:33', NULL),
(3, 'Md.Shalam Khan', '0170000000', 'rubel@gmail.com', NULL, NULL, 1, NULL, NULL, 'shop', '$2y$10$wuZaZZRddZCVjO/kVrbxV.uXUhyXqckgB5eoWFE2B6X0qTIdyJviO', 'Barisal', 1, NULL, 3, NULL, '2020-03-14 04:01:15', NULL),
(13, 'Shohel Rana', '0170000000', 'shohelrana@gmail.com', NULL, 1, NULL, NULL, '1', NULL, '$2y$10$hmVAqPajZ4xfhGFsb0nUhuvCuLnPlL5qOFAgAoWPzyU4A/CKksYNq', 'Pabna', 1, NULL, 2, NULL, '2020-06-24 07:38:15', NULL),
(14, 'Shohel Rana', '0170000002', 'dealtaj@gmail.com', NULL, NULL, 2, NULL, NULL, 'shoptwo', '$2y$10$OJorD8ruDZusjkPazIMYlOROVI80NlUIzKG.UKkgcSmfKvCMG0t4q', 'Dhaka', 1, 1, 3, NULL, '2020-06-24 07:39:58', '2020-06-24 07:40:40'),
(15, 'Rubel Khan', '1708797991', NULL, NULL, NULL, NULL, 4, NULL, 'malekkhan', '$2y$10$4/M3rUNQvK3.Wdz4xd20..bGC8jmI9uYdO6rra2XOxQ21JHOYdQ12', 'Bangladeshi', 3, NULL, 4, NULL, '2020-06-25 06:28:00', NULL),
(16, 'Rubel Khan ok', '01708797991', NULL, NULL, NULL, NULL, 5, NULL, 'eng.rubelkhan797991@gmail.com', '$2y$10$HzwAuflZeYaxQKQilKrvyOqblf2qVbsq7RhxyYaSEBYM3G8ELaJDe', 'Bangladeshi', 3, NULL, 4, NULL, '2020-06-25 06:31:31', NULL),
(17, 'Rubel Khan 797991', '1708797991', NULL, NULL, NULL, NULL, 6, NULL, 'eng.rubelkhan797991', '$2y$10$62PHEbpG8c9/h11iztKoBOXt26XRLo4c/doLhTFKqeOLIUwAdxU7y', 'Bangladeshi', 3, NULL, 4, NULL, '2020-06-25 06:33:21', '2020-06-26 14:59:34'),
(18, 'Rubel Khan 2', '01708797991', 'rubelkhan2@gmail.com', NULL, NULL, NULL, 7, NULL, 'eng.rubel', '$2y$10$c1MAheJYuds4DaS7sSoXm./N6XVBuplqZGmFK.5JWiTa4msxvdHbK', 'Dhaka', 3, 18, 4, NULL, '2020-06-25 06:35:11', '2020-06-26 14:59:36'),
(19, 'RobertVax', NULL, 'brizhevatov@mail.ru', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$qo37BJADtK.x9ym9/4fubOMKNZ3z0FDvqw1uTlrWVuWXpGQqEMkTa', NULL, NULL, NULL, 1, NULL, '2020-09-20 14:08:06', '2020-09-20 14:08:06'),
(20, 'dealtaj', '01812454358', NULL, NULL, NULL, NULL, 8, NULL, 'dealtaj', '$2y$10$U4I5R21c1UNmbjAwczwM3OEVGoIfNd.uU.6C.4aZbEDTs4yBmcb3u', 'Dhaka', 3, 3, 4, NULL, '2020-10-16 16:56:15', '2020-10-16 16:57:58'),
(21, 'Salvatore Dietrich', NULL, 'Joanie.Lakin24@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Y8FlNyMZVcapVXnvIAgYF.5IEktR4sV76o4yewfhYe3hvQBeeXom6', NULL, NULL, NULL, 1, NULL, '2020-11-20 06:18:05', '2020-11-20 06:18:05'),
(22, 'Alysha Fadel', NULL, 'david@ksdoors.com.au', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$nu51leBIrWYScPIwtzfNZ.LGTgPqSDy6JBkjOl4OgMFMAQAlitYfW', NULL, NULL, NULL, 1, NULL, '2020-11-27 13:03:37', '2020-11-27 13:03:37'),
(23, 'Claude Simonis', NULL, 'rotem@supremedia.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$SGy6UrQRpaasQMcebfhg7.s8Ov./qbh7qQtJlht.DA8ZRIj.ZWcTW', NULL, NULL, NULL, 1, NULL, '2020-11-30 01:02:22', '2020-11-30 01:02:22'),
(24, 'Bernardo Veum', NULL, 'meanirenej@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$E/wkHBuYiMSykxl.euLIv.pqhwH7Q19q4xVJlXws0l2o1Sh9XL4KO', NULL, NULL, NULL, 1, NULL, '2020-12-04 22:50:09', '2020-12-04 22:50:09'),
(25, 'Lincoln Berge', NULL, 'bey7689@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$G0oxzIt/v04R2e.OFSbgku4A1KCg9x5UvfB3K5qewVJ3G0Dx3iWT2', NULL, NULL, NULL, 1, NULL, '2020-12-06 14:17:09', '2020-12-06 14:17:09'),
(26, 'Brandt Collins', NULL, 'kchapin21@outlook.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$/sOUUbm7K.RJsofsLKImIOno37tu3oe5LMnVbvTq/NIpbQrUPERBi', NULL, NULL, NULL, 1, NULL, '2020-12-12 10:54:29', '2020-12-12 10:54:29'),
(27, 'Rubel', NULL, 'rubel1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ZMSm.o6rpbssaW7XNOaGzOToVP58PMRlK2HehbRWXxVafcx9flmS2', NULL, NULL, NULL, 1, NULL, '2021-02-25 04:18:36', '2021-02-25 04:18:36'),
(28, 'Nazmul Huda', NULL, 'infonazmulfci@gmail.com', NULL, NULL, 2, NULL, NULL, NULL, '$2y$10$/uvwPaiq/qDN1GSvcVM7ke5Z8VsTqn/z1P9m8xVvhCqjN1sRWgL/e', NULL, NULL, NULL, 2, NULL, '2021-03-15 18:10:03', '2021-03-15 18:10:03'),
(29, 'arif', '1632077744', NULL, NULL, NULL, NULL, 9, NULL, 'arif', '$2y$10$aZnsVYaBPELzejt.n0MAyODVa.sPKhF6XbcTn/WjRjE4OPeNElRQu', 'Elida Ho', 14, NULL, 4, NULL, '2021-03-15 20:23:59', NULL),
(30, 'arif', '01882061784', 'arif@gmail.com', NULL, 3, NULL, NULL, '3', NULL, '$2y$10$3zfgGnG3tMeyX10Iz3.1N.Dxn/FSYcWQNZ73K7GYxDC4vsf2Dy2Tm', 'sdfdf', 1, NULL, 2, NULL, '2021-03-16 21:11:16', NULL),
(31, 'do', '12', 'do@gmail.com', NULL, 4, NULL, NULL, '4', NULL, '$2y$10$bNQKH.8igJm/xJRnjuGSz.5bwY5QV/1Nv0YenX0WEFcyNWW460.BS', 'df', 1, NULL, 2, NULL, '2021-03-24 08:32:24', NULL),
(32, 'Nazmul', '1632077744', 'nazmul@gmail.com', NULL, 5, NULL, NULL, '5', NULL, '$2y$10$PNFW5Gut7TsV89JfOBswh.s9yVTD3WqP1GUbXqJulyw42Od/VETiq', 'Elida Ho', 1, NULL, 2, NULL, '2021-03-24 09:05:35', NULL),
(33, 'saiful', '01', 'saiful@gmail.com', NULL, 6, NULL, NULL, '6', NULL, '$2y$10$aFozr/7ulQDUrBcqTqRwKept4PBbTHU.KPGF/NePrqNWdTpR5tKd2', 'zddf', 1, NULL, 2, NULL, '2021-03-24 09:06:03', NULL),
(34, 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a', '$2y$10$88ZQig/zjO09QgaBwLIYNeM6wH6GPyqMaoZ5cgTUYOZYlcE7Lx.L2', NULL, NULL, NULL, 4, NULL, '2021-04-04 11:54:02', '2021-04-04 11:54:02'),
(35, 'Acc Saiful', '01812454358', 'acc@gmail.com', NULL, 7, NULL, NULL, '7', NULL, '$2y$10$QEMzx61eAvJtN1nOsk07setHU5628gOwB6L0UeLfgec6bBDeIeJ66', 'Nikunja, khilkhet\nHouse#10,Road#7/D,Dhaka', 1, 35, 2, NULL, '2021-04-11 15:18:58', '2021-04-11 15:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(14, 'Nazmul Huda', 'inform@tion.com', '01812454358', '2021-03-06 13:23:46', '2021-03-06 13:23:46'),
(15, 'Edward D. Veilleux', 'vendorEdit@it.com', '1632077744', '2021-03-06 13:24:14', '2021-03-06 13:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_information`
--

CREATE TABLE `voucher_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopId` int(11) NOT NULL,
  `branchId` int(11) NOT NULL,
  `voucherDate` datetime NOT NULL,
  `voucherType` int(11) NOT NULL,
  `voucherSource` int(11) NOT NULL DEFAULT 0,
  `voucherNo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucherUniqueId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentTo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkPaymentType` int(11) DEFAULT NULL,
  `receiverBankAccountName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chequeNo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chequeDate` datetime DEFAULT NULL,
  `accountCodeDebit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountCodeCredit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debitAmount` double NOT NULL,
  `creditAmount` double NOT NULL,
  `voucherAmount` double NOT NULL,
  `particular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `openingVoucher` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteStatus` tinyint(1) DEFAULT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher_information`
--

INSERT INTO `voucher_information` (`id`, `shopId`, `branchId`, `voucherDate`, `voucherType`, `voucherSource`, `voucherNo`, `voucherUniqueId`, `paymentTo`, `mobileNo`, `checkPaymentType`, `receiverBankAccountName`, `chequeNo`, `chequeDate`, `accountCodeDebit`, `accountCodeCredit`, `debitAmount`, `creditAmount`, `voucherAmount`, `particular`, `day`, `month`, `year`, `openingVoucher`, `status`, `deleteStatus`, `createBy`, `updateBy`, `deleteBy`, `created_at`, `updated_at`, `delete_at`) VALUES
(1, 1, 0, '2021-05-01 00:00:00', 1, 0, 'CP-01-05/21', '1619854130', 'bappy', '01454878796', NULL, NULL, NULL, NULL, '102010101', '202020101', 10000, 10000, 10000, 'test', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 07:28:50', NULL, NULL),
(2, 1, 0, '2021-05-01 00:00:00', 1, 0, 'CP-01-05/21', '1619864534', 'Bappy', '0145789568', NULL, NULL, NULL, NULL, '102010101', '202020101', 5000, 5000, 5000, 'This is for payment.', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:22:14', NULL, NULL),
(3, 1, 0, '2021-05-01 00:00:00', 3, 0, 'BP-01-05/21', '1619864741', 'dsf', 'sdf', 1, NULL, '12', '2021-05-05 00:00:00', '102010201', '202020101', 18000, 18000, 18000, 'This is for payment.', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:25:41', NULL, NULL),
(4, 1, 0, '2021-05-01 00:00:00', 2, 0, 'CR-01-05/21', '1619865620', 'ds', 'ds', NULL, NULL, NULL, NULL, '102010101', '102020101', 6000, 6000, 6000, 'subHead', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:40:20', NULL, NULL),
(5, 1, 0, '2021-05-01 00:00:00', 4, 0, 'BR-01-05/21', '1619865698', 'dsf', 'sdf', 1, NULL, 'sdf', '2021-05-06 00:00:00', '102010201', '102020101', 7000, 7000, 7000, 'dfsfd', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:41:38', NULL, NULL),
(6, 1, 0, '2021-05-01 00:00:00', 1, 0, 'CP-01-05/21', '1619866258', 'fd', 'df', NULL, NULL, NULL, NULL, '102010101', '20202010101', -1000, -1000, -1000, 'dsdds', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:50:58', NULL, NULL),
(7, 1, 0, '2021-05-01 00:00:00', 1, 0, 'CP-01-05/21', '1619866378', 'ds', 'sd', NULL, NULL, NULL, NULL, '102010101', '20202010101', 1, 1, 1, 'sd', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:52:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_information_reports`
--

CREATE TABLE `voucher_information_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopId` int(11) NOT NULL,
  `branchId` int(11) NOT NULL,
  `voucherDate` datetime NOT NULL,
  `voucherType` int(11) NOT NULL,
  `voucherSource` int(11) NOT NULL DEFAULT 0,
  `voucherNo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucherUniqueId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentTo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkPaymentType` int(11) DEFAULT NULL,
  `receiverBankAccountName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chequeNo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chequeDate` datetime DEFAULT NULL,
  `accountsCode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `voucherAmount` double NOT NULL,
  `randId` int(11) NOT NULL,
  `particular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `openingVoucher` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteStatus` tinyint(1) DEFAULT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher_information_reports`
--

INSERT INTO `voucher_information_reports` (`id`, `shopId`, `branchId`, `voucherDate`, `voucherType`, `voucherSource`, `voucherNo`, `voucherUniqueId`, `paymentTo`, `mobileNo`, `checkPaymentType`, `receiverBankAccountName`, `chequeNo`, `chequeDate`, `accountsCode`, `type`, `voucherAmount`, `randId`, `particular`, `day`, `month`, `year`, `openingVoucher`, `status`, `deleteStatus`, `createBy`, `updateBy`, `deleteBy`, `created_at`, `updated_at`, `delete_at`) VALUES
(1, 1, 0, '2021-05-01 00:00:00', 1, 0, 'CP-01-05/21', '1619854130', 'bappy', '01454878796', NULL, NULL, NULL, NULL, '102010101', 1, 10000, 0, 'test', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 07:28:50', NULL, NULL),
(2, 1, 0, '2021-05-01 00:00:00', 1, 0, 'CP-01-05/21', '1619854130', 'bappy', '01454878796', NULL, NULL, NULL, NULL, '202020101', 2, 10000, 0, 'test', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 07:28:50', NULL, NULL),
(3, 1, 0, '2021-05-01 00:00:00', 1, 0, 'CP-01-05/21', '1619864534', 'Bappy', '0145789568', NULL, NULL, NULL, NULL, '102010101', 1, 5000, 0, 'This is for payment.', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:22:14', NULL, NULL),
(4, 1, 0, '2021-05-01 00:00:00', 1, 0, 'CP-01-05/21', '1619864534', 'Bappy', '0145789568', NULL, NULL, NULL, NULL, '202020101', 2, 5000, 0, 'This is for payment.', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:22:14', NULL, NULL),
(5, 1, 0, '2021-05-01 00:00:00', 3, 0, 'BP-01-05/21', '1619864741', 'dsf', 'sdf', 1, NULL, '12', '2021-05-05 00:00:00', '102010201', 1, 18000, 0, 'This is for payment.', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:25:42', NULL, NULL),
(6, 1, 0, '2021-05-01 00:00:00', 3, 0, 'BP-01-05/21', '1619864741', 'dsf', 'sdf', 1, NULL, '12', '2021-05-05 00:00:00', '202020101', 2, 18000, 0, 'This is for payment.', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:25:42', NULL, NULL),
(7, 1, 0, '2021-05-01 00:00:00', 2, 0, 'CR-01-05/21', '1619865620', 'ds', 'ds', NULL, NULL, NULL, NULL, '102010101', 1, 6000, 0, 'subHead', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:40:20', NULL, NULL),
(8, 1, 0, '2021-05-01 00:00:00', 2, 0, 'CR-01-05/21', '1619865620', 'ds', 'ds', NULL, NULL, NULL, NULL, '102020101', 2, 6000, 0, 'subHead', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:40:20', NULL, NULL),
(9, 1, 0, '2021-05-01 00:00:00', 4, 0, 'BR-01-05/21', '1619865698', 'dsf', 'sdf', 1, NULL, 'sdf', '2021-05-06 00:00:00', '102010201', 1, 7000, 0, 'dfsfd', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:41:38', NULL, NULL),
(10, 1, 0, '2021-05-01 00:00:00', 4, 0, 'BR-01-05/21', '1619865698', 'dsf', 'sdf', 1, NULL, 'sdf', '2021-05-06 00:00:00', '102020101', 2, 7000, 0, 'dfsfd', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:41:39', NULL, NULL),
(11, 1, 0, '2021-05-01 00:00:00', 1, 0, 'CP-01-05/21', '1619866258', 'fd', 'df', NULL, NULL, NULL, NULL, '102010101', 1, -1000, 0, 'dsdds', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:50:59', NULL, NULL),
(12, 1, 0, '2021-05-01 00:00:00', 1, 0, 'CP-01-05/21', '1619866258', 'fd', 'df', NULL, NULL, NULL, NULL, '20202010101', 2, -1000, 0, 'dsdds', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:50:59', NULL, NULL),
(13, 1, 0, '2021-05-01 00:00:00', 1, 0, 'CP-01-05/21', '1619866378', 'ds', 'sd', NULL, NULL, NULL, NULL, '102010101', 1, 1, 0, 'sd', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:52:58', NULL, NULL),
(14, 1, 0, '2021-05-01 00:00:00', 1, 0, 'CP-01-05/21', '1619866378', 'ds', 'sd', NULL, NULL, NULL, NULL, '20202010101', 2, 1, 0, 'sd', 1, 5, 2021, 0, 1, NULL, 1, NULL, NULL, '2021-05-01 10:52:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_types`
--

CREATE TABLE `voucher_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `deleteBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher_types`
--

INSERT INTO `voucher_types` (`id`, `name`, `shortName`, `createBy`, `updateBy`, `deleteBy`, `created_at`, `updated_at`, `delete_at`) VALUES
(1, 'Cash Payment Voucher', 'CP', 1, NULL, NULL, '2021-04-29 14:47:48', NULL, NULL),
(2, 'Cash Receipt Voucher', 'CR', 1, NULL, NULL, '2021-04-29 14:49:31', NULL, NULL),
(3, 'Bank Payment Voucher', 'BP', 1, NULL, NULL, '2021-04-29 14:49:31', NULL, NULL),
(4, 'Bank Receipt Voucher', 'BR', 1, NULL, NULL, '2021-04-29 14:49:31', NULL, NULL),
(5, 'Contra Voucher', 'CV', 1, NULL, NULL, '2021-04-29 14:49:31', NULL, NULL),
(6, 'Journal Voucher', 'JV', 1, NULL, NULL, '2021-04-29 14:49:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `union_id` int(11) NOT NULL,
  `ward_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward_bn_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `union_id`, `ward_name`, `ward_bn_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'ward no 1', '', NULL, NULL),
(2, 2, 'ward no 2', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `website_infos`
--

CREATE TABLE `website_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_infos`
--

INSERT INTO `website_infos` (`id`, `name`, `link`, `description`, `created_at`, `updated_at`) VALUES
(1, 'fgbfg', 'vbvcb', 'cvbc', '2021-03-06 04:07:45', '2021-03-06 04:07:45'),
(2, 'sdfsdf', 'sdfsdf', 'sdfsdfd', '2021-03-06 04:08:51', '2021-03-06 04:08:51'),
(3, 'sdfsdf', 'sdfsdf', 'sdfsdfd', '2021-03-06 04:09:14', '2021-03-06 04:09:14'),
(4, 'sdf', 'sdf', 'sdf', '2021-03-06 04:09:59', '2021-03-06 04:09:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_groups`
--
ALTER TABLE `account_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_setups`
--
ALTER TABLE `account_setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_setup_head_lists`
--
ALTER TABLE `account_setup_head_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_setup_placement_lists`
--
ALTER TABLE `account_setup_placement_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_product_supplier_entries`
--
ALTER TABLE `add_product_supplier_entries`
  ADD PRIMARY KEY (`productSupplierId`);

--
-- Indexes for table `adminlicence_types`
--
ALTER TABLE `adminlicence_types`
  ADD PRIMARY KEY (`licenceTypesId`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_bussiness_types`
--
ALTER TABLE `admin_bussiness_types`
  ADD PRIMARY KEY (`bussinessTypeId`);

--
-- Indexes for table `admin_entries`
--
ALTER TABLE `admin_entries`
  ADD PRIMARY KEY (`adminId`),
  ADD UNIQUE KEY `admin_entries_email_unique` (`email`);

--
-- Indexes for table `admin_grades`
--
ALTER TABLE `admin_grades`
  ADD PRIMARY KEY (`gradeId`);

--
-- Indexes for table `admin_holiday_setups`
--
ALTER TABLE `admin_holiday_setups`
  ADD PRIMARY KEY (`holidaySetupId`);

--
-- Indexes for table `admin_holiday_types`
--
ALTER TABLE `admin_holiday_types`
  ADD PRIMARY KEY (`holidayTypeId`);

--
-- Indexes for table `admin_menus`
--
ALTER TABLE `admin_menus`
  ADD PRIMARY KEY (`adminMenuId`);

--
-- Indexes for table `admin_menu_permissions`
--
ALTER TABLE `admin_menu_permissions`
  ADD PRIMARY KEY (`adminMenuPermissionId`);

--
-- Indexes for table `admin_menu_title_name1s`
--
ALTER TABLE `admin_menu_title_name1s`
  ADD PRIMARY KEY (`adminMenuTitleId`);

--
-- Indexes for table `admin_menu_title_names`
--
ALTER TABLE `admin_menu_title_names`
  ADD PRIMARY KEY (`adminMenuTitleId`);

--
-- Indexes for table `admin_meta_key_descriptions`
--
ALTER TABLE `admin_meta_key_descriptions`
  ADD PRIMARY KEY (`metaKeyId`);

--
-- Indexes for table `admin_name_of_degrees`
--
ALTER TABLE `admin_name_of_degrees`
  ADD PRIMARY KEY (`nameOfDegreeId`);

--
-- Indexes for table `admin_name_of_institutes`
--
ALTER TABLE `admin_name_of_institutes`
  ADD PRIMARY KEY (`nameOfInstituteId`);

--
-- Indexes for table `admin_purchase_types`
--
ALTER TABLE `admin_purchase_types`
  ADD PRIMARY KEY (`purchaseTypeId`);

--
-- Indexes for table `admin_setups`
--
ALTER TABLE `admin_setups`
  ADD PRIMARY KEY (`adminSetupId`);

--
-- Indexes for table `admin_skill_grades`
--
ALTER TABLE `admin_skill_grades`
  ADD PRIMARY KEY (`skillGradeId`);

--
-- Indexes for table `admin_sub_menus`
--
ALTER TABLE `admin_sub_menus`
  ADD PRIMARY KEY (`adminSubMenuId`);

--
-- Indexes for table `admin_types`
--
ALTER TABLE `admin_types`
  ADD PRIMARY KEY (`adminTypeId`);

--
-- Indexes for table `asset_brand_entries`
--
ALTER TABLE `asset_brand_entries`
  ADD PRIMARY KEY (`assetBrandEntryId`);

--
-- Indexes for table `asset_code_entries`
--
ALTER TABLE `asset_code_entries`
  ADD PRIMARY KEY (`assetCodeEntryId`);

--
-- Indexes for table `asset_statuses`
--
ALTER TABLE `asset_statuses`
  ADD PRIMARY KEY (`assetStatusId`);

--
-- Indexes for table `bank_entries`
--
ALTER TABLE `bank_entries`
  ADD PRIMARY KEY (`bankEntryId`);

--
-- Indexes for table `bank_type_entries`
--
ALTER TABLE `bank_type_entries`
  ADD PRIMARY KEY (`bankTypeEntryId`);

--
-- Indexes for table `basic_infos`
--
ALTER TABLE `basic_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_information`
--
ALTER TABLE `branch_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_entries`
--
ALTER TABLE `brand_entries`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_of_account_group_types`
--
ALTER TABLE `chart_of_account_group_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission_type_entries`
--
ALTER TABLE `commission_type_entries`
  ADD PRIMARY KEY (`commissionTypeEntryId`);

--
-- Indexes for table `company_information`
--
ALTER TABLE `company_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_logos`
--
ALTER TABLE `company_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`employeeAttendanceId`);

--
-- Indexes for table `employee_banking_entries`
--
ALTER TABLE `employee_banking_entries`
  ADD PRIMARY KEY (`employeeBankingId`);

--
-- Indexes for table `employee_education_entries`
--
ALTER TABLE `employee_education_entries`
  ADD PRIMARY KEY (`employeeEducationId`);

--
-- Indexes for table `employee_leave_entries`
--
ALTER TABLE `employee_leave_entries`
  ADD PRIMARY KEY (`employeeLeaveId`);

--
-- Indexes for table `employee_professional_entries`
--
ALTER TABLE `employee_professional_entries`
  ADD PRIMARY KEY (`employeeProfessionalId`);

--
-- Indexes for table `employee_skill_entries`
--
ALTER TABLE `employee_skill_entries`
  ADD PRIMARY KEY (`employeeSkillId`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_entries`
--
ALTER TABLE `grade_entries`
  ADD PRIMARY KEY (`gradeEntryId`);

--
-- Indexes for table `invoice_for_type_lists`
--
ALTER TABLE `invoice_for_type_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_setups`
--
ALTER TABLE `invoice_setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_setup_details`
--
ALTER TABLE `invoice_setup_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_type_lists`
--
ALTER TABLE `invoice_type_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_department_entries`
--
ALTER TABLE `job_department_entries`
  ADD PRIMARY KEY (`jobDepartmentEntryId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product_brand_entries`
--
ALTER TABLE `product_brand_entries`
  ADD PRIMARY KEY (`productBrandEntryId`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`poductCategoryId`);

--
-- Indexes for table `product_names`
--
ALTER TABLE `product_names`
  ADD PRIMARY KEY (`productNameId`);

--
-- Indexes for table `product_price_setup_details`
--
ALTER TABLE `product_price_setup_details`
  ADD PRIMARY KEY (`productPriceSetupid`);

--
-- Indexes for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  ADD PRIMARY KEY (`purchaseInvoiceId`);

--
-- Indexes for table `purchase_product_details`
--
ALTER TABLE `purchase_product_details`
  ADD PRIMARY KEY (`purchaseProductDetailsId`);

--
-- Indexes for table `purchase_product_entries`
--
ALTER TABLE `purchase_product_entries`
  ADD PRIMARY KEY (`purchaseProductId`);

--
-- Indexes for table `purchase_product_more_fields`
--
ALTER TABLE `purchase_product_more_fields`
  ADD PRIMARY KEY (`purchaseProductMoreFieldId`);

--
-- Indexes for table `purchase_product_total_prices`
--
ALTER TABLE `purchase_product_total_prices`
  ADD PRIMARY KEY (`purchaseProductTotalPriceId`);

--
-- Indexes for table `purchase_product_total_quantities`
--
ALTER TABLE `purchase_product_total_quantities`
  ADD PRIMARY KEY (`productTotalQuantityId`);

--
-- Indexes for table `purchase_types`
--
ALTER TABLE `purchase_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr_code_setups`
--
ALTER TABLE `qr_code_setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religiouses`
--
ALTER TABLE `religiouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_grade_setups`
--
ALTER TABLE `salary_grade_setups`
  ADD PRIMARY KEY (`salaryGradeSetupId`);

--
-- Indexes for table `sales_customer_entries`
--
ALTER TABLE `sales_customer_entries`
  ADD PRIMARY KEY (`salesCustomerEntryId`);

--
-- Indexes for table `sales_invoices`
--
ALTER TABLE `sales_invoices`
  ADD PRIMARY KEY (`salesInvoiceId`);

--
-- Indexes for table `sales_product_discount_price_entries`
--
ALTER TABLE `sales_product_discount_price_entries`
  ADD PRIMARY KEY (`salesProductDiscountPriceId`);

--
-- Indexes for table `sales_product_entries`
--
ALTER TABLE `sales_product_entries`
  ADD PRIMARY KEY (`salesProductEntryId`);

--
-- Indexes for table `sales_product_price_entries`
--
ALTER TABLE `sales_product_price_entries`
  ADD PRIMARY KEY (`salesProductPriceEntryId`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`shopInfoId`);

--
-- Indexes for table `shop_account_intormations`
--
ALTER TABLE `shop_account_intormations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_address_locations`
--
ALTER TABLE `shop_address_locations`
  ADD PRIMARY KEY (`shopALId`);

--
-- Indexes for table `shop_add_asset_supplier_entries`
--
ALTER TABLE `shop_add_asset_supplier_entries`
  ADD PRIMARY KEY (`assetSupplierId`);

--
-- Indexes for table `shop_add_bank_entries`
--
ALTER TABLE `shop_add_bank_entries`
  ADD PRIMARY KEY (`bankId`);

--
-- Indexes for table `shop_add_income_types`
--
ALTER TABLE `shop_add_income_types`
  ADD PRIMARY KEY (`shopIncomeTypeId`);

--
-- Indexes for table `shop_asset_categories`
--
ALTER TABLE `shop_asset_categories`
  ADD PRIMARY KEY (`assetCategoryId`);

--
-- Indexes for table `shop_asset_entries`
--
ALTER TABLE `shop_asset_entries`
  ADD PRIMARY KEY (`shopAssetEntryId`);

--
-- Indexes for table `shop_billing_amounts`
--
ALTER TABLE `shop_billing_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_billing_grace_information`
--
ALTER TABLE `shop_billing_grace_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_contact_person_information`
--
ALTER TABLE `shop_contact_person_information`
  ADD PRIMARY KEY (`shopCPInfoId`);

--
-- Indexes for table `shop_customer_type_entries`
--
ALTER TABLE `shop_customer_type_entries`
  ADD PRIMARY KEY (`shopCustomerTypeEntryId`);

--
-- Indexes for table `shop_employee_entries`
--
ALTER TABLE `shop_employee_entries`
  ADD PRIMARY KEY (`shopEmployeeEntryId`);

--
-- Indexes for table `shop_employee_login_time_entries`
--
ALTER TABLE `shop_employee_login_time_entries`
  ADD PRIMARY KEY (`employeeLoginTimeId`);

--
-- Indexes for table `shop_employee_types`
--
ALTER TABLE `shop_employee_types`
  ADD PRIMARY KEY (`shopEmployeeTypeId`);

--
-- Indexes for table `shop_expence_type_entries`
--
ALTER TABLE `shop_expence_type_entries`
  ADD PRIMARY KEY (`shopExpenceTypeId`);

--
-- Indexes for table `shop_income_type_entries`
--
ALTER TABLE `shop_income_type_entries`
  ADD PRIMARY KEY (`shopIncomeTypeId`);

--
-- Indexes for table `shop_information`
--
ALTER TABLE `shop_information`
  ADD PRIMARY KEY (`shopInfoId`);

--
-- Indexes for table `shop_loan_entries`
--
ALTER TABLE `shop_loan_entries`
  ADD PRIMARY KEY (`loanEntryId`);

--
-- Indexes for table `shop_loan_provider_entries`
--
ALTER TABLE `shop_loan_provider_entries`
  ADD PRIMARY KEY (`loanProviderId`);

--
-- Indexes for table `shop_menu_permissions`
--
ALTER TABLE `shop_menu_permissions`
  ADD PRIMARY KEY (`shopMenuPermissionId`);

--
-- Indexes for table `shop_owner_information`
--
ALTER TABLE `shop_owner_information`
  ADD PRIMARY KEY (`shopOwnerInfoId`);

--
-- Indexes for table `shop_payment_statuses`
--
ALTER TABLE `shop_payment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_representative_information`
--
ALTER TABLE `shop_representative_information`
  ADD PRIMARY KEY (`shopRepInfoId`);

--
-- Indexes for table `shop_statuses`
--
ALTER TABLE `shop_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_type_entries`
--
ALTER TABLE `shop_type_entries`
  ADD PRIMARY KEY (`shopTypeEntryId`);

--
-- Indexes for table `start_salary_setups`
--
ALTER TABLE `start_salary_setups`
  ADD PRIMARY KEY (`salarySetupId`);

--
-- Indexes for table `unions`
--
ALTER TABLE `unions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unite_entries`
--
ALTER TABLE `unite_entries`
  ADD PRIMARY KEY (`uniteEntryId`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_information`
--
ALTER TABLE `voucher_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_information_reports`
--
ALTER TABLE `voucher_information_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_types`
--
ALTER TABLE `voucher_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_infos`
--
ALTER TABLE `website_infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_groups`
--
ALTER TABLE `account_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `account_setups`
--
ALTER TABLE `account_setups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `account_setup_head_lists`
--
ALTER TABLE `account_setup_head_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `account_setup_placement_lists`
--
ALTER TABLE `account_setup_placement_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `add_product_supplier_entries`
--
ALTER TABLE `add_product_supplier_entries`
  MODIFY `productSupplierId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `adminlicence_types`
--
ALTER TABLE `adminlicence_types`
  MODIFY `licenceTypesId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_bussiness_types`
--
ALTER TABLE `admin_bussiness_types`
  MODIFY `bussinessTypeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_entries`
--
ALTER TABLE `admin_entries`
  MODIFY `adminId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_grades`
--
ALTER TABLE `admin_grades`
  MODIFY `gradeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_holiday_setups`
--
ALTER TABLE `admin_holiday_setups`
  MODIFY `holidaySetupId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_holiday_types`
--
ALTER TABLE `admin_holiday_types`
  MODIFY `holidayTypeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_menus`
--
ALTER TABLE `admin_menus`
  MODIFY `adminMenuId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `admin_menu_permissions`
--
ALTER TABLE `admin_menu_permissions`
  MODIFY `adminMenuPermissionId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin_menu_title_name1s`
--
ALTER TABLE `admin_menu_title_name1s`
  MODIFY `adminMenuTitleId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_menu_title_names`
--
ALTER TABLE `admin_menu_title_names`
  MODIFY `adminMenuTitleId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admin_meta_key_descriptions`
--
ALTER TABLE `admin_meta_key_descriptions`
  MODIFY `metaKeyId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_name_of_degrees`
--
ALTER TABLE `admin_name_of_degrees`
  MODIFY `nameOfDegreeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_name_of_institutes`
--
ALTER TABLE `admin_name_of_institutes`
  MODIFY `nameOfInstituteId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_purchase_types`
--
ALTER TABLE `admin_purchase_types`
  MODIFY `purchaseTypeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_setups`
--
ALTER TABLE `admin_setups`
  MODIFY `adminSetupId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_skill_grades`
--
ALTER TABLE `admin_skill_grades`
  MODIFY `skillGradeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_sub_menus`
--
ALTER TABLE `admin_sub_menus`
  MODIFY `adminSubMenuId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `admin_types`
--
ALTER TABLE `admin_types`
  MODIFY `adminTypeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `asset_brand_entries`
--
ALTER TABLE `asset_brand_entries`
  MODIFY `assetBrandEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `asset_code_entries`
--
ALTER TABLE `asset_code_entries`
  MODIFY `assetCodeEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `asset_statuses`
--
ALTER TABLE `asset_statuses`
  MODIFY `assetStatusId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_entries`
--
ALTER TABLE `bank_entries`
  MODIFY `bankEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bank_type_entries`
--
ALTER TABLE `bank_type_entries`
  MODIFY `bankTypeEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `basic_infos`
--
ALTER TABLE `basic_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch_information`
--
ALTER TABLE `branch_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `brand_entries`
--
ALTER TABLE `brand_entries`
  MODIFY `brandId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `chart_of_account_group_types`
--
ALTER TABLE `chart_of_account_group_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commission_type_entries`
--
ALTER TABLE `commission_type_entries`
  MODIFY `commissionTypeEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_information`
--
ALTER TABLE `company_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_logos`
--
ALTER TABLE `company_logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `employeeAttendanceId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_banking_entries`
--
ALTER TABLE `employee_banking_entries`
  MODIFY `employeeBankingId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_education_entries`
--
ALTER TABLE `employee_education_entries`
  MODIFY `employeeEducationId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_leave_entries`
--
ALTER TABLE `employee_leave_entries`
  MODIFY `employeeLeaveId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_professional_entries`
--
ALTER TABLE `employee_professional_entries`
  MODIFY `employeeProfessionalId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_skill_entries`
--
ALTER TABLE `employee_skill_entries`
  MODIFY `employeeSkillId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_entries`
--
ALTER TABLE `grade_entries`
  MODIFY `gradeEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice_for_type_lists`
--
ALTER TABLE `invoice_for_type_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_setups`
--
ALTER TABLE `invoice_setups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_setup_details`
--
ALTER TABLE `invoice_setup_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_type_lists`
--
ALTER TABLE `invoice_type_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_department_entries`
--
ALTER TABLE `job_department_entries`
  MODIFY `jobDepartmentEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `product_brand_entries`
--
ALTER TABLE `product_brand_entries`
  MODIFY `productBrandEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `poductCategoryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_names`
--
ALTER TABLE `product_names`
  MODIFY `productNameId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_price_setup_details`
--
ALTER TABLE `product_price_setup_details`
  MODIFY `productPriceSetupid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  MODIFY `purchaseInvoiceId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_product_details`
--
ALTER TABLE `purchase_product_details`
  MODIFY `purchaseProductDetailsId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_product_entries`
--
ALTER TABLE `purchase_product_entries`
  MODIFY `purchaseProductId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_product_more_fields`
--
ALTER TABLE `purchase_product_more_fields`
  MODIFY `purchaseProductMoreFieldId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_product_total_prices`
--
ALTER TABLE `purchase_product_total_prices`
  MODIFY `purchaseProductTotalPriceId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_product_total_quantities`
--
ALTER TABLE `purchase_product_total_quantities`
  MODIFY `productTotalQuantityId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_types`
--
ALTER TABLE `purchase_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `qr_code_setups`
--
ALTER TABLE `qr_code_setups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `religiouses`
--
ALTER TABLE `religiouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salary_grade_setups`
--
ALTER TABLE `salary_grade_setups`
  MODIFY `salaryGradeSetupId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_customer_entries`
--
ALTER TABLE `sales_customer_entries`
  MODIFY `salesCustomerEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales_invoices`
--
ALTER TABLE `sales_invoices`
  MODIFY `salesInvoiceId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_product_discount_price_entries`
--
ALTER TABLE `sales_product_discount_price_entries`
  MODIFY `salesProductDiscountPriceId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_product_entries`
--
ALTER TABLE `sales_product_entries`
  MODIFY `salesProductEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales_product_price_entries`
--
ALTER TABLE `sales_product_price_entries`
  MODIFY `salesProductPriceEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `shopInfoId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_account_intormations`
--
ALTER TABLE `shop_account_intormations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop_address_locations`
--
ALTER TABLE `shop_address_locations`
  MODIFY `shopALId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop_add_asset_supplier_entries`
--
ALTER TABLE `shop_add_asset_supplier_entries`
  MODIFY `assetSupplierId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop_add_bank_entries`
--
ALTER TABLE `shop_add_bank_entries`
  MODIFY `bankId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop_add_income_types`
--
ALTER TABLE `shop_add_income_types`
  MODIFY `shopIncomeTypeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_asset_categories`
--
ALTER TABLE `shop_asset_categories`
  MODIFY `assetCategoryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shop_asset_entries`
--
ALTER TABLE `shop_asset_entries`
  MODIFY `shopAssetEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_billing_amounts`
--
ALTER TABLE `shop_billing_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop_billing_grace_information`
--
ALTER TABLE `shop_billing_grace_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop_contact_person_information`
--
ALTER TABLE `shop_contact_person_information`
  MODIFY `shopCPInfoId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop_customer_type_entries`
--
ALTER TABLE `shop_customer_type_entries`
  MODIFY `shopCustomerTypeEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_employee_entries`
--
ALTER TABLE `shop_employee_entries`
  MODIFY `shopEmployeeEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shop_employee_login_time_entries`
--
ALTER TABLE `shop_employee_login_time_entries`
  MODIFY `employeeLoginTimeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_employee_types`
--
ALTER TABLE `shop_employee_types`
  MODIFY `shopEmployeeTypeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shop_expence_type_entries`
--
ALTER TABLE `shop_expence_type_entries`
  MODIFY `shopExpenceTypeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shop_income_type_entries`
--
ALTER TABLE `shop_income_type_entries`
  MODIFY `shopIncomeTypeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_information`
--
ALTER TABLE `shop_information`
  MODIFY `shopInfoId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shop_loan_entries`
--
ALTER TABLE `shop_loan_entries`
  MODIFY `loanEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_loan_provider_entries`
--
ALTER TABLE `shop_loan_provider_entries`
  MODIFY `loanProviderId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_menu_permissions`
--
ALTER TABLE `shop_menu_permissions`
  MODIFY `shopMenuPermissionId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shop_owner_information`
--
ALTER TABLE `shop_owner_information`
  MODIFY `shopOwnerInfoId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop_payment_statuses`
--
ALTER TABLE `shop_payment_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_representative_information`
--
ALTER TABLE `shop_representative_information`
  MODIFY `shopRepInfoId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop_statuses`
--
ALTER TABLE `shop_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop_type_entries`
--
ALTER TABLE `shop_type_entries`
  MODIFY `shopTypeEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `start_salary_setups`
--
ALTER TABLE `start_salary_setups`
  MODIFY `salarySetupId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `unions`
--
ALTER TABLE `unions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unite_entries`
--
ALTER TABLE `unite_entries`
  MODIFY `uniteEntryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=595;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `voucher_information`
--
ALTER TABLE `voucher_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `voucher_information_reports`
--
ALTER TABLE `voucher_information_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `voucher_types`
--
ALTER TABLE `voucher_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `website_infos`
--
ALTER TABLE `website_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
