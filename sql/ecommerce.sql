CREATE TABLE `category` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) DEFAULT NULL,
  `Number` varchar(250) DEFAULT NULL,
  `SystemKey` varchar(250) NOT NULL,
  `Note` varchar(250) DEFAULT NULL,
  `Priority` double NOT NULL,
  `Disabled` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

CREATE TABLE `catetory_relations` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UUID` varchar(40) DEFAULT NULL,
  `categoryId` int(11) NOT NULL,
  `ParentcategoryId` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;


CREATE TABLE `Item` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CustomData` varchar(250) DEFAULT NULL,
  `Number` varchar(250) DEFAULT NULL,
  `Barcode` varchar(250) DEFAULT NULL,
  `Name1` varchar(250) DEFAULT NULL,
  `Name2` varchar(250) DEFAULT NULL,
  `Name3` varchar(250) DEFAULT NULL,
  `Note` longtext DEFAULT NULL,
  `Discountgroup` varchar(250) DEFAULT NULL,
  `Pricegroup` varchar(250) DEFAULT NULL,
  `Statisticsgroup` varchar(250) DEFAULT NULL,
  `Price` double DEFAULT 0,
  `PriceCost` double DEFAULT 0,
  `PriceRecRetail` double DEFAULT 0,
  `Currency` varchar(3) DEFAULT 'DKK',
  `VatRate` double DEFAULT 0,
  `Group` varchar(250) DEFAULT NULL,
  `Colli` varchar(250) DEFAULT NULL,
  `AllowOrderDiscount` tinyint(1) DEFAULT 0,
  `Stock` double DEFAULT 0,
  `StockReserved` double DEFAULT 0,
  `StockAvailable` double DEFAULT 0,
  `StockOrdered` double DEFAULT 0,
  `SupplierName` varchar(250) DEFAULT NULL,
  `SupplierNumber` varchar(250) DEFAULT NULL,
  `Weight` double DEFAULT 0,
  `Volume` double DEFAULT 0,
  `Dimensions` varchar(250) DEFAULT NULL,
  `Unit` varchar(250) DEFAULT NULL,
  `AltItemNumber` varchar(250) DEFAULT NULL,
  `Image` blob DEFAULT NULL,
  `SortPriority` double DEFAULT NULL,
  `StockStatus` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=748 DEFAULT CHARSET=latin1;

CREATE TABLE `Item_category_relations` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UUID` varchar(40) DEFAULT NULL,
  `categoryId` int(11) NOT NULL,
  `ItemNumber` varchar(250) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=961 DEFAULT CHARSET=latin1;

-- 2020-05-05 06:48:08
