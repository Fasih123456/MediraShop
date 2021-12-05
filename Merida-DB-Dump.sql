-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2021 at 2:00pm
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `merida`
--
CREATE DATABASE IF NOT EXISTS `merida` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `merida`;

-- --------------------------------------------------------

--
-- Table structure for table `m_login`
--

DROP TABLE IF EXISTS `m_login`;
CREATE TABLE `m_login` (
  `m_id` int(11) NOT NULL  AUTO_INCREMENT,
  `m_email` varchar(256) NOT NULL,
  `m_password` varchar(256) NOT NULL,
  PRIMARY KEY (m_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_login`
--

INSERT INTO `m_login` (`m_id`, `m_email`, `m_password`) VALUES
(1, 'user@mail.com', 'password'),
(2, 'user2@mail.com', 'password'),
(3, 'user3@mail.com', 'password'),
(4, 'user4@mail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `m_account`
--

DROP TABLE IF EXISTS `m_account`;
CREATE TABLE `m_account` (
  `m_account_id` int(11) NOT NULL  AUTO_INCREMENT,
  `m_account_fname` varchar(128) NOT NULL,
  `m_account_lname` varchar(128) NOT NULL,
  `m_login_id` int(11) NOT NULL,
  `m_account_location` varchar(32) NOT NULL,
  `m_seller` BOOLEAN NOT NULL,
  PRIMARY KEY (m_account_id),
  FOREIGN KEY (m_login_id) REFERENCES m_login(m_id) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_account`
--
INSERT INTO `m_account` (`m_account_id`, `m_account_fname`, `m_account_lname`, `m_login_id`, `m_account_location`, `m_seller`) VALUES
(1, 'first', 'user', '1', 'Halifax', 'TRUE'),
(2, 'second', 'user', '2', 'Halifax', 'FALSE'),
(3, 'third', 'user', '3', 'Halifax', 'FALSE'),
(4, 'fourth', 'user', '4', 'Dartmouth', 'TRUE');

-- --------------------------------------------------------
--
-- Table structure for table `m_goods`
--

DROP TABLE IF EXISTS `m_goods`;
CREATE TABLE `m_goods` (
  `m_goods_id` int(11) NOT NULL  AUTO_INCREMENT,
  `m_account_id` int(11) NOT NULL,
  `m_goods_type` varchar(256) NOT NULL,
  `m_goods_name` varchar(256) NOT NULL,
  `m_goods_description` varchar(512) NOT NULL,
  `m_goods_price` double(40,2) NOT NULL,
  `m_goods_imagePath` varchar(512) NOT NULL,
  PRIMARY KEY (m_goods_id),
  FOREIGN KEY (m_account_id) REFERENCES m_account(m_account_id) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_goods`
--
INSERT INTO `m_goods` (`m_goods_id`, `m_account_id`, `m_goods_type`, `m_goods_name`, `m_goods_description`, `m_goods_price`, `m_goods_imagePath`) VALUES
(1, '1', 'Furniture', 'Chair', 'Oak wood chair with cushion', '99.99', 'images/testChair.jpg' ),
(2, '1', 'Furniture', 'Desk', 'Black, plastic dressor, 4 draws, brand new', '150.00', 'images/testDesk.jpg'),
(3, '2', 'Grocery', 'Orange', 'Florida navel oranges 3lb', '5.99', 'imgages/testOrange.jpg'),
(4, '2', 'Electronics', 'Phone', 'Brand new smartphone, warranty up to 3 years', '500.00', 'images/testPhone.jpg'),
(5, '2', 'clothing', 'scarf', 'Red, wool, men and women', '19.99', 'images/testScarf.jpg'),
(6, '2', 'clothing', 'T-shirt', 'Blue cotton shirt from nameBrand company', '39.99', 'images/testT-Shirt.jpg'),
(7, '2', 'Gifts', 'Starbucks Gift Card', 'E-gift card, $25.00', '25.00', 'images/test-GiftCard.jpg');

-- --------------------------------------------------------
--
-- Table structure for table `m_account`
--

DROP TABLE IF EXISTS `m_card`;
CREATE TABLE `m_card` (
  `m_card_id` int(11) NOT NULL  AUTO_INCREMENT,
  `m_account_id` int(11) NOT NULL,
  `m_card_fname` varchar(128) NOT NULL,
  `m_card_lname` varchar(128) NOT NULL,
  `m_card_country` varchar(128) NOT NULL,
   `m_card_city` varchar(128) NOT NULL,
  `m_card_province` varchar(128) NOT NULL,
  `m_card_postal` varchar(128) NOT NULL,
  `m_card_number` varchar(128) NOT NULL,
  `m_card_expire` DATE NOT NULL,
  `m_card_cvv` int(11) NOT NULL,
   PRIMARY KEY (m_card_id),
  FOREIGN KEY (m_account_id) REFERENCES m_account(m_account_id)  ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_account`
--
INSERT INTO `m_card` (`m_card_id`, `m_account_id`, `m_card_fname`,`m_card_lname`, `m_card_country`, `m_card_city`, `m_card_province`, `m_card_postal`, `m_card_number`,`m_card_expire`, `m_card_cvv`) VALUES
(1, 1, 'first', 'user', 'Canada','Halifax','Nova Scotia', 'A0A-0A0','0000-1111-2222-3333', '2024-01-01', '111'),
(2, 2, 'second', 'user', 'Canada','Halifax','Nova Scotia', 'A0A-0A0','0000-1111-2222-3333', '2024-01-01', '111'),
(3, 3, 'third', 'user', 'Canada','Halifax','Nova Scotia', 'A0A-0A0', '0000-1111-2222-3333', '2024-01-01', '111'),
(4, 4, 'fourth', 'user', 'Canada','Dartmouth','Nova Scotia', 'A0A-0A0','0000-1111-2222-3333', '2024-01-01', '111');


