-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Már 13. 15:35
-- Kiszolgáló verziója: 10.4.25-MariaDB
-- PHP verzió: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `war_halla_webshop`
--
CREATE DATABASE IF NOT EXISTS `war_halla_webshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `war_halla_webshop`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--
CREATE TABLE `admin_fiokok`(
  `id` int(11) NOT NULL,
  `felhasznalonev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
  
  INSERT INTO `admin_fiokok` (`id`, `felhasznalonev`, `jelszo`,`email`) VALUES
(1, 'Hovanecz Mate','Mate001','hovaneczm@gmail.com'),
(2, 'Koczka Szabolcs','Szabolcs001','szabolcskocza4@gmail.com'),
(3, 'admin','admin003','warhallawebshop@gmail.com');

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `nev`, `email`, `jelszo`) VALUES
(1, 'Hovanecz Máté', 'hovaneczm@gmail.com', 'HovaMate2002'),
(2, 'Koczka Szabolcs', 'szabolcskoczka4@gmail.com', 'Szabolcs001'),
(3, 'porba', 'porba@gmail.com', 'porba');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `festekek`
--

CREATE TABLE `festekek` (
  `id` int(11) NOT NULL,
  `neve` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `fajtaja` int(11) NOT NULL,
  `felulete` int(11) NOT NULL,
  `merete` int(11) NOT NULL,
  `kep` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `vizre_oldodik` tinyint(1) NOT NULL,
  `higitora_oldodik` tinyint(1) NOT NULL,
  `elerheto` tinyint(1) NOT NULL,
  `ar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `festekek`
--

INSERT INTO `festekek` (`id`, `neve`, `fajtaja`, `felulete`, `merete`, `kep`, `vizre_oldodik`, `higitora_oldodik`, `elerheto`, `ar`) VALUES
(1, 'Abaddon Black', 1, 5, 2, 'FS01', 0, 1, 1, 2000),
(2, 'Chaos Black', 6, 3, 3, 'FS02', 0, 0, 0, 7520),
(3, 'Mephisto Red', 1, 3, 1, 'FS03', 1, 1, 1, 6000),
(4, 'Corax White', 1, 2, 2, 'FS04', 1, 1, 1, 2000),
(5, 'Stormhost Silver', 2, 3, 1, 'FS05', 1, 1, 0, 2000),
(6, 'Univerzelás alapozó', 6, 6, 3, 'FS06', 0, 0, 1, 5000),
(7, 'Agrax Earthshade', 5, 1, 2, 'FS07', 1, 1, 0, 2000),
(8, 'Ultramarine Blue', 3, 5, 1, 'FS08', 0, 1, 1, 2500),
(9, 'Waystone Green', 4, 3, 1, 'FS09', 1, 1, 1, 2000),
(10, 'Tesseract Glow', 4, 4, 2, 'FS10', 0, 0, 0, 2000),
(11, 'Phalanx Yellow', 2, 5, 1, 'FS11', 1, 1, 1, 3000);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `festekek_fajtaja`
--

CREATE TABLE `festekek_fajtaja` (
  `fajta_id` int(11) NOT NULL,
  `megnevezes` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `festekek_fajtaja`
--

INSERT INTO `festekek_fajtaja` (`fajta_id`, `megnevezes`) VALUES
(1, 'Base'),
(2, 'Layer'),
(3, 'Combo'),
(4, 'Technical'),
(5, 'Shade'),
(6, 'Alapozó');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `festekek_felulete`
--

CREATE TABLE `festekek_felulete` (
  `felulet_id` int(11) NOT NULL,
  `megnevezes` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `festekek_felulete`
--

INSERT INTO `festekek_felulete` (`felulet_id`, `megnevezes`) VALUES
(1, 'Fa'),
(2, 'Fém'),
(3, 'Műanyag'),
(4, 'Alapozó'),
(5, 'Műanyag és Alapozó'),
(6, 'Bármi');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `festekek_merete`
--

CREATE TABLE `festekek_merete` (
  `meret_id` int(11) NOT NULL,
  `megnevezes` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `festekek_merete`
--

INSERT INTO `festekek_merete` (`meret_id`, `megnevezes`) VALUES
(1, 'Tégely'),
(2, 'Nagy tégely'),
(3, 'Spré');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `frakcio`
--

CREATE TABLE `frakcio` (
  `frakcio_id` int(11) NOT NULL,
  `megnevezes` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `frakcio`
--

INSERT INTO `frakcio` (`frakcio_id`, `megnevezes`) VALUES
(1, 'Ember'),
(2, 'Eldar'),
(3, 'Ork'),
(4, 'Tyranida'),
(5, 'Tau'),
(6, 'Stormcast'),
(7, 'Szellem'),
(8, 'Vámpír'),
(9, 'Tünde'),
(10, 'Mordor');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jatek_tipusa`
--

CREATE TABLE `jatek_tipusa` (
  `tipus_id` int(11) NOT NULL,
  `megnevezes` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `jatek_tipusa`
--

INSERT INTO `jatek_tipusa` (`tipus_id`, `megnevezes`) VALUES
(1, 'Warhammer 40K'),
(2, 'Warhammer 30K'),
(3, 'Warhammer Age of Sigmar'),
(4, 'Blood Bowl'),
(5, 'Necromunda'),
(6, 'Middle-Earth');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kosar`
--

CREATE TABLE `kosar` (
  `id` int(11) NOT NULL,
  `felhasznalo_id` int(11) NOT NULL,
  `tipus` char(1) COLLATE utf8_hungarian_ci NOT NULL,
  `termek_id` int(11) NOT NULL,
  `mennyiseg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `modellek`
--

CREATE TABLE `modellek` (
  `id` int(11) NOT NULL,
  `neve` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `jatektipusa` int(11) NOT NULL,
  `kategoriaja` int(11) NOT NULL,
  `frakcioja` int(11) NOT NULL,
  `kep` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `anyaga` int(11) NOT NULL,
  `figura_szama` int(11) NOT NULL,
  `elerheto` tinyint(1) NOT NULL,
  `ar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `modellek`
--

INSERT INTO `modellek` (`id`, `neve`, `jatektipusa`, `kategoriaja`, `frakcioja`, `kep`, `anyaga`, `figura_szama`, `elerheto`, `ar`) VALUES
(1, 'Imperial Knights', 1, 1, 1, 'MD01', 4, 1, 1, 62000),
(2, 'Space Marines', 1, 4, 1, 'MD02', 4, 10, 1, 12000),
(3, 'Stormcast Warrior', 3, 4, 1, 'MD03', 4, 8, 1, 15500),
(4, 'Reikland Reavens', 4, 4, 1, 'MD04', 3, 12, 0, 28600),
(5, 'Primaris Eliminators', 1, 2, 1, 'MD05', 4, 3, 1, 25400),
(6, 'Space Wolves Combat Patrol', 1, 3, 1, 'MD06', 4, 17, 1, 42000),
(7, 'Tau Gunship', 1, 2, 5, 'MD07', 4, 1, 1, 31000),
(8, 'Tyranid Hive Tyrant', 1, 5, 4, 'MD08', 4, 1, 1, 15000),
(9, 'Maiden & Wyld Runners', 5, 4, 1, 'MD09', 3, 10, 0, 9900),
(10, 'Morannon Orks', 6, 4, 3, 'MD10', 4, 24, 1, 13000),
(11, 'Witch King on Fell Beast', 6, 6, 10, 'MD11', 4, 1, 1, 8000),
(12, 'Nighthaunt Army', 3, 3, 7, 'MD12', 2, 34, 0, 22000),
(13, 'Soulblight Gravelords', 3, 4, 8, 'MD13', 2, 20, 1, 17000),
(14, 'Terminator Armors', 2, 4, 1, 'MD14', 4, 5, 0, 9000),
(15, 'Skulls', 1, 6, 8, 'MD15', 3, 65, 1, 8200);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `modell_anyaga`
--

CREATE TABLE `modell_anyaga` (
  `anyag_id` int(11) NOT NULL,
  `megnevezes` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `modell_anyaga`
--

INSERT INTO `modell_anyaga` (`anyag_id`, `megnevezes`) VALUES
(1, 'Fa'),
(2, 'Vas'),
(3, 'Ólom'),
(4, 'Műanyag');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `modell_kategoriaja`
--

CREATE TABLE `modell_kategoriaja` (
  `kategoria_id` int(11) NOT NULL,
  `megnevezes` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `modell_kategoriaja`
--

INSERT INTO `modell_kategoriaja` (`kategoria_id`, `megnevezes`) VALUES
(1, 'Titán'),
(2, 'Jármű'),
(3, 'Combat Patrol'),
(4, 'Csapat'),
(5, 'Karakter'),
(6, 'Kiegészítő');

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `osszes_termek`
-- (Lásd alább az aktuális nézetet)
--
CREATE TABLE `osszes_termek` (
`id` int(11)
,`neve` varchar(30)
,`kep` varchar(11)
,`ar` int(11)
,`tipus` varchar(1)
);

-- --------------------------------------------------------

--
-- Nézet szerkezete `osszes_termek`
--
DROP TABLE IF EXISTS `osszes_termek`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `osszes_termek`  AS SELECT `f`.`id` AS `id`, `f`.`neve` AS `neve`, `f`.`kep` AS `kep`, `f`.`ar` AS `ar`, 'f' AS `tipus` FROM `festekek` AS `f` union select `m`.`id` AS `id`,`m`.`neve` AS `neve`,`m`.`kep` AS `kep`,`m`.`ar` AS `ar`,'m' AS `tipus` from `modellek` `m`  ;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexie admin_fiokok
--
ALTER TABLE `admin_fiokok`
  ADD PRIMARY KEY (`id`);
--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `festekek`
--
ALTER TABLE `festekek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fajtaja` (`fajtaja`),
  ADD KEY `felulete` (`felulete`),
  ADD KEY `merete` (`merete`);

--
-- A tábla indexei `festekek_fajtaja`
--
ALTER TABLE `festekek_fajtaja`
  ADD PRIMARY KEY (`fajta_id`);

--
-- A tábla indexei `festekek_felulete`
--
ALTER TABLE `festekek_felulete`
  ADD PRIMARY KEY (`felulet_id`);

--
-- A tábla indexei `festekek_merete`
--
ALTER TABLE `festekek_merete`
  ADD PRIMARY KEY (`meret_id`);

--
-- A tábla indexei `frakcio`
--
ALTER TABLE `frakcio`
  ADD PRIMARY KEY (`frakcio_id`);

--
-- A tábla indexei `jatek_tipusa`
--
ALTER TABLE `jatek_tipusa`
  ADD PRIMARY KEY (`tipus_id`);

--
-- A tábla indexei `kosar`
--
ALTER TABLE `kosar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznalo_id` (`felhasznalo_id`),
  ADD KEY `tipus` (`tipus`,`termek_id`);

--
-- A tábla indexei `modellek`
--
ALTER TABLE `modellek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jatektipusa` (`jatektipusa`),
  ADD KEY `kategoriaja` (`kategoriaja`),
  ADD KEY `frakcioja` (`frakcioja`),
  ADD KEY `anyaga` (`anyaga`);

--
-- A tábla indexei `modell_anyaga`
--
ALTER TABLE `modell_anyaga`
  ADD PRIMARY KEY (`anyag_id`);

--
-- A tábla indexei `modell_kategoriaja`
--
ALTER TABLE `modell_kategoriaja`
  ADD PRIMARY KEY (`kategoria_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `admin_fiokok`
--
ALTER TABLE `admin_fiokok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `festekek`
--
ALTER TABLE `festekek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `festekek_fajtaja`
--
ALTER TABLE `festekek_fajtaja`
  MODIFY `fajta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `festekek_felulete`
--
ALTER TABLE `festekek_felulete`
  MODIFY `felulet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `festekek_merete`
--
ALTER TABLE `festekek_merete`
  MODIFY `meret_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `frakcio`
--
ALTER TABLE `frakcio`
  MODIFY `frakcio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `jatek_tipusa`
--
ALTER TABLE `jatek_tipusa`
  MODIFY `tipus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `kosar`
--
ALTER TABLE `kosar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `modellek`
--
ALTER TABLE `modellek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT a táblához `modell_anyaga`
--
ALTER TABLE `modell_anyaga`
  MODIFY `anyag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `modell_kategoriaja`
--
ALTER TABLE `modell_kategoriaja`
  MODIFY `kategoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `festekek`
--
ALTER TABLE `festekek`
  ADD CONSTRAINT `festekek_ibfk_1` FOREIGN KEY (`fajtaja`) REFERENCES `festekek_fajtaja` (`fajta_id`),
  ADD CONSTRAINT `festekek_ibfk_2` FOREIGN KEY (`felulete`) REFERENCES `festekek_felulete` (`felulet_id`),
  ADD CONSTRAINT `festekek_ibfk_3` FOREIGN KEY (`merete`) REFERENCES `festekek_merete` (`meret_id`);

--
-- Megkötések a táblához `kosar`
--
ALTER TABLE `kosar`
  ADD CONSTRAINT `kosar_ibfk_1` FOREIGN KEY (`felhasznalo_id`) REFERENCES `felhasznalok` (`id`);

--
-- Megkötések a táblához `modellek`
--
ALTER TABLE `modellek`
  ADD CONSTRAINT `modellek_ibfk_1` FOREIGN KEY (`jatektipusa`) REFERENCES `jatek_tipusa` (`tipus_id`),
  ADD CONSTRAINT `modellek_ibfk_2` FOREIGN KEY (`kategoriaja`) REFERENCES `modell_kategoriaja` (`kategoria_id`),
  ADD CONSTRAINT `modellek_ibfk_3` FOREIGN KEY (`frakcioja`) REFERENCES `frakcio` (`frakcio_id`),
  ADD CONSTRAINT `modellek_ibfk_4` FOREIGN KEY (`anyaga`) REFERENCES `modell_anyaga` (`anyag_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
