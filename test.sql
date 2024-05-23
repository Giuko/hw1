-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 23, 2024 alle 17:11
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(255) PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ;

--
-- Dump dei dati per la tabella `accounts`
--

INSERT INTO `accounts` (`username`, `name`, `surname`, `email`, `password`) VALUES
('Erendry', 'andrea@apple.it', 'Andrea', 'Andrea&Dr4gon', '$2y$10$eiHgxpK8LLmMzR7fraBQG.Cyj..ziijF/QFIBw/2fEDG2JfrekJ/y'),
('Giuko', 'peppecicciomaganuco13@gmail.com', 'Giuseppe', 'Maganuco', '$2y$10$kJK5L1Ic.bZ8g07yOYUmluT6ahHcHhY3HaBKEphGah6uGYSe9dPl.'),
('Giuko2', 'pass123$A', 'Account2', 'Account2', '$2y$10$isWLW9cVoXvo/YZ6iulnMukJ6P.b.nIYdarufr9x63EPNvR8t/ZE2'),
('SalvoMus', 'salvoMus@musumuci.unict.it', 'Lambert12$', 'Roberto', '$2y$10$cpfHx1G0.UkHrrN5z4PnfOiZZtg1J69oHG8aS8NLD1G7lyyTYJcYe');

-- --------------------------------------------------------

--
-- Struttura della tabella `comments`
--

CREATE TABLE `comments` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `content` text,
  `post_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),

  FOREIGN KEY (`post_id`) REFERENCES `posts`(`id`),
  FOREIGN KEY (`username`) REFERENCES `accounts`(`id`)
);

--
-- Dump dei dati per la tabella `comments`
--

INSERT INTO `comments` (`id`, `content`, `post_id`, `username`, `post_date`) VALUES
(2, 'Questo è un commento di esempio.', '169w9ut', 'Giuko', '2024-05-22 14:15:22'),
(3, 'Questo articolo è molto interessante.', '169w9ut', 'Giuko', '2024-05-22 14:16:28'),
(4, 'Non sono d\'accordo con quanto scritto.', '169w9ut', 'Giuko', '2024-05-22 14:16:28'),
(5, 'Grazie per aver condiviso queste informazioni.', '169w9ut', 'Giuko', '2024-05-22 14:16:28'),
(6, 'Ho trovato utile questa lettura.', '169w9ut', 'Giuko', '2024-05-22 14:16:28'),
(7, 'Qualcuno ha maggiori dettagli su questo argomento?', '169w9ut', 'Giuko', '2024-05-22 14:16:28'),
(8, 'Bel post! Continua così!', '169w9ut', 'Giuko', '2024-05-22 14:16:28'),
(9, 'Ci sono alcune imprecisioni nel testo.', '169w9ut', 'Giuko', '2024-05-22 14:16:28'),
(10, 'Mi piace molto come hai spiegato questo concetto.', '169w9ut', 'Giuko', '2024-05-22 14:16:28'),
(11, 'Interessante punto di vista, grazie per averlo condiviso.', '169w9ut', 'Giuko', '2024-05-22 14:16:28'),
(12, 'Aspetto con ansia il prossimo articolo!', '169w9ut', 'Giuko', '2024-05-22 14:16:28'),
(13, 'ddg', '1b04u46', 'Giuko2', '2024-05-22 15:24:07'),
(14, 'Ciao', '169w9ut', 'Giuko2', '2024-05-22 15:31:21'),
(15, 'Bel post ma non voglio dire altro', 'qt0hvd', 'Giuko2', '2024-05-23 10:24:19'),
(16, 'Ciao come stai?\r\n\r\nIo sto bene\r\nciao', 'qt0hvd', 'Giuko2', '2024-05-23 10:24:48'),
(17, 'Ciao sono salvo', 'qt0hvd', 'SalvoMus', '2024-05-23 10:25:44'),
(18, 'Non vedo l\'immagine', '1beimze', 'SalvoMus', '2024-05-23 10:43:20'),
(19, 'Dai raga finitela', '1beimze', 'SalvoMus', '2024-05-23 10:43:28'),
(20, 'Vediamo adesso', '1beimze', 'SalvoMus', '2024-05-23 10:44:17'),
(21, 'Test commento', '1beimze', 'SalvoMus', '2024-05-23 10:44:30'),
(22, 'Ahahah, best game ever', '18wfn7k', 'Erendry', '2024-05-23 13:36:27'),
(23, 'Ma cosa dici', '18wfn7k', 'Erendry', '2024-05-23 13:36:47'),
(24, 'Io sono salvoMus e giocherà a blandur gate', '18wfn7k', 'SalvoMus', '2024-05-23 13:41:05'),
(25, 'Finalmente, la mia fabbrica segreta inizierà', '1079mtw', 'SalvoMus', '2024-05-23 13:46:39'),
(26, 'Non ditelo a nessuno', '1079mtw', 'SalvoMus', '2024-05-23 13:46:51'),
(27, 'Sei un grande Machherone', '15afd5a', 'SalvoMus', '2024-05-23 13:48:34'),
(28, 'Ti stimo', '15afd5a', 'SalvoMus', '2024-05-23 13:48:38'),
(29, 'Non è vero buahahha', '15afd5a', 'SalvoMus', '2024-05-23 13:48:43');

-- --------------------------------------------------------

--
-- Struttura della tabella `posts`
--

CREATE TABLE `posts` (
  `id` varchar(255) PRIMARY KEY,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `descr` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
);

--
-- Dump dei dati per la tabella `posts`
--

INSERT INTO `posts` (`id`, `title`, `icon`, `name`, `descr`, `img`) VALUES
('1079mtw', 'Coca-cola recipe 🥤', 'https://styles.redditmedia.com/t5_7hqomg/styles/communityIcon_bzj6d1z1oizc1.png', 'r/ChatGPT', '', 'https://b.thumbs.redditmedia.com/Q-j2NA0fZ2uW4hnY_DDnesUPtZmRV9IdA35x7oes-ew.jpg'),
('10cg6hk', 'blursed_cocacola', 'https://b.thumbs.redditmedia.com/vTuL-ofGm9un2xiwVGiTK_CG2rg9vFwVtJtx9py9bqQ.png', 'r/blursedimages', '', 'https://b.thumbs.redditmedia.com/AVqSjLdTPTxMlGg-mHzJxTSCAAUqoeF-B6BYV5zxVxY.jpg'),
('129wq0m', 'Cocacola sin sabor a cocacola', 'https://b.thumbs.redditmedia.com/kQAM4mKIQd47hUovJgR34DZA9yQ839mnvRfHwckUO3A.png', 'r/uruguay', 'Es la segunda coca de litro que tomo, y no tiene sabor a cocacola, tiene un sabor mucho más desabrido. Y eso que compro de vidrio porque saben mejor\r\n\r\nAlguien ha notado la diferencia? Me siento estafado, hay que prender todo fuego, recuperar la parte de Rivera que se nos llevó Brasil', ''),
('12q14of', 'My NukaCola Camp !', 'https://a.thumbs.redditmedia.com/iMprVXALL6ZVpoEgR2jbkcwI0tAn-hbJJ8Vg77dWKa0.png', 'r/fallout76settlements', 'My new and extra colorful camp is just about to be finished (90%done) ! I wanted it to look as colorful as it can be. Its hard to get good camp items as I\'m not super high lvl and player vendors tend to be way too overpriced, but I used everything I got to the max !', 'https://b.thumbs.redditmedia.com/5E-JWGXvQRwrwTDgPITUHhUumfZHlNSGyZgO16nppAk.jpg'),
('13ekhbd', 'Pepe Coin Insane forecast', 'https://b.thumbs.redditmedia.com/Kl3TBjINRBLd9sukJaSPts_0geISdO-jtVniyfCw1GA.png', 'r/CryptoCurrency', 'I was checking out CMC today and found this price prediction for Pepe Coin.\n\n&amp;#x200B;\n\n[https://telegaon.com/pepe-coin-price-prediction/](https://telegaon.com/pepe-coin-price-prediction/)\n\n&amp;#x200B;\n\n&amp;#x200B;\n\n|Year|Maximum Price|\n|:-|:-|\n|2023| $0.00000523 |\n|2030 | $0.0000809 |\n|2050| $0.0051 |\n\n&amp;#x200B;\n\nSo this prediction is basically saying that pepe will 1000x in 27 years. It\'s this kind of delusional predictions that keep people deeply invested in shit coins in my opinion. My own prediction for Pepe 2050 is that it\'ll be almost exactly 0$. The forecast doesn\'t take into account that most meme coins die out and become valueless in the matter of years (or sometimes days). This forecast is just assuming that it\'ll keep following the trends it has followed in it\'s short existence. \n\n&amp;#x200B;\n\nI think that this is outrageous and harmful at best. Anyway, that was my daily rant about meme coins.', 'undefined'),
('13saa8g', 'Hur många kommer ihåg när Mcdonalds hade denna CocaCola glas kampanjen?', 'https://a.thumbs.redditmedia.com/uy4xiE9pow8ttc3CQsKk9ruPXthWzk6IdStnmpEFNN4.png', 'r/sweden', '', 'https://b.thumbs.redditmedia.com/H0O7o5_iSoFq37BcO0-nlkK7wvQvX8UhWRmLIxW33LY.jpg'),
('14z5s8y', 'A CocaCola costed a nickel back then', 'https://b.thumbs.redditmedia.com/1e75He95iSRn4t2r2roITNsJIJFwcqP9msQ6LGY8Mpo.png', 'r/DonutMedia', '', 'https://b.thumbs.redditmedia.com/Cm9OPIkqfPcXJly1N0Q0YKZ8pCuVYTjwnQhsV89JvVY.jpg'),
('157ydsn', 'New HoloEN trailer featuring new members?', 'https://styles.redditmedia.com/t5_29numb/styles/communityIcon_tuat5m898ry91.png', 'r/Hololive', '', 'https://b.thumbs.redditmedia.com/bGVc7jxUPgE2HXaze-BK5Ft755NAse_UzFhpXWsDens.jpg'),
('15afd5a', 'Emmanuel Macron insists New Caledonia belongs to France out of choice.', 'https://b.thumbs.redditmedia.com/mb-B2xUYzmjd6T5IRtRJdB8sX1zdAYHBDa7ltX-AaMA.png', 'r/europe', '', 'https://a.thumbs.redditmedia.com/VDKDRsJNc_40wiQeotB2vLm6FGhwJOAsi5pdg2OQP84.jpg'),
('164hgnx', 'Zero sympathy for PEPE holders', 'https://b.thumbs.redditmedia.com/Kl3TBjINRBLd9sukJaSPts_0geISdO-jtVniyfCw1GA.png', 'r/CryptoCurrency', 'PEPE is finally pulling the rug, and anyone who lost money because they expected gains from \"investing\" in a token with absolutely no future deserves zero sympathy.   You got exactly what you paid for, a hard life lesson.\n\nI\'ll at least feel bad for you if you believed in a project that actually tried to solve something, even if the project was run into the ground by the CEO (Terra, FTX, etc ...). I feel bad for those people because they were actually deceived into buying a product that wasn\'t real, or a product that was severely flawed.\n\nPeople who bought PEPE?  Hell, even SHIB holders?  They decided to fill the bags of some random guy on the Internet in the hopes of getting out of the scammers scheme with some money.  Absolutely pathetic and you should be ashamed.  This is not what the future of finance looks like and we need to publicly call out this behavior before it gets worse and billions more dollars evaporate to useless tokens designed to pilfer every penny from degenerates\n\nEdit: To add, this is a screenshot directly from PEPE\'s official website.  \n\n\nhttps://preview.redd.it/hpl3bctbb5lb1.png?width=850&amp;format=png&amp;auto=webp&amp;s=2c5dae02ee1f23e30fc7dbcd3b6e69e5740a1419', 'https://b.thumbs.redditmedia.com/id9xKkuQ43eV4fMZfvBmtUtBZaQu-xktm9L57l_q5Rg.jpg'),
('166bf33', 'Found in the attic of my new house, should we find a new house?', 'https://b.thumbs.redditmedia.com/y0FEEr4SU2yB-g8D0qh1Clu-AwPmCaX9PAgOWuO6vIs.png', 'r/Weird', '', 'https://a.thumbs.redditmedia.com/GvHjWCWtt-EzPbAq5X8GK5132eMQf3RUHXt5SgG98d0.jpg'),
('169w9ut', 'Guy shows off his new $5,000 TV to friends at a Y2K New Year\'s Eve Party', 'https://b.thumbs.redditmedia.com/_LjV26levDKqJsKKZUPIr2lmD2QY-CWYKsXse5J9fnw.png', 'r/ThatsInsane', '', 'https://b.thumbs.redditmedia.com/O5fAyY9wtfimO2T44AoFkgplzAJCBUriv52jbefpHvE.jpg'),
('16a2gf0', 'New iPhone, new charger: Apple bends to EU rules', 'https://b.thumbs.redditmedia.com/E6-lBIXAELKdtcb4HaXUEuSSIKrsF9tOUgjnb5UYFrU.png', 'r/gadgets', '', 'https://b.thumbs.redditmedia.com/m5cYcn9TVagbvikf75aqPgFS7gZG91QvWlgWjNeN-zU.jpg'),
('176ngh2', 'New pup, need a new name!', 'https://styles.redditmedia.com/t5_2qrmj/styles/communityIcon_ixdx1vlkekia1.png', 'r/Rottweiler', 'I met my future son today! He will be ready for pickup from breeder in 4 more weeks. Any suggestions on strong names, preferably 2 syllables. Something similar to the catch of “Danté” which was my last dog.', 'https://a.thumbs.redditmedia.com/cSIK2PMIVmR4ooTP-IOaeMy0F3K9WJNz_rx2bMyEbD8.jpg'),
('17gs3rn', 'Putin\'s new table', 'https://b.thumbs.redditmedia.com/VZX_KQLnI1DPhlEZ07bIcLzwR1Win808RIt7zm49VIQ.png', 'r/pics', '', 'https://a.thumbs.redditmedia.com/bHLy0JhRyZ7VEq4TUHWu9CaFzVrkyDFR5guNB2fyPO8.jpg'),
('18edm1y', 'Why does my dvd say ”The New Hope” and not ”A New Hope”?', 'https://b.thumbs.redditmedia.com/BcDo9mnF7-tb3VTFXcCHjtlTF3dljlBb3DHRa54kC_w.png', 'r/StarWars', '', 'https://b.thumbs.redditmedia.com/Zl1-t3Amhk71E9_ptDXHn8qm1_1p-LZtWzQySXPiA-M.jpg'),
('18wfn7k', '“New year, new me.”', 'https://styles.redditmedia.com/t5_35s7n/styles/communityIcon_3qdmagca3fcb1.jpg', 'r/BG3', 'Someone take Faceapp away from me!', 'https://b.thumbs.redditmedia.com/m3sf2AN-h5JAM6gpKJqOZ8XmNnZCkT88WhUypjAu_lY.jpg'),
('191zh3y', 'Colours for Appalachia ! My new NukaCola Camp no.2 :]', 'https://a.thumbs.redditmedia.com/iMprVXALL6ZVpoEgR2jbkcwI0tAn-hbJJ8Vg77dWKa0.png', 'r/fallout76settlements', 'Adding some colours to Appalachia :]', 'https://b.thumbs.redditmedia.com/7XZcDSw_jKnp8yIzsOHr_lpDedOr3uhG6dBeyt043Yo.jpg'),
('1b04u46', 'H: Caps W: Nukacola', 'https://a.thumbs.redditmedia.com/f9TrnxJfv4wxM_EibOWK0WfFMVXbceQTY3VgCrXvS-4.png', 'r/Market76', '', ''),
('1b9m7s1', 'Friday Facts #401 - New terrain, new planet', 'https://b.thumbs.redditmedia.com/RN8icTjtZ9Lwl3qBkHusOTydILDRCXpyqp0H_hNqNUY.png', 'r/factorio', '', 'https://a.thumbs.redditmedia.com/PuZBsHG58g-7zS2FqttU4cJTVLF8Usk6qzGMB2Jp_T4.jpg'),
('1beimze', 'PSA on new Warbond armor / new knucklehead tactic.', 'https://styles.redditmedia.com/t5_2ya0t/styles/communityIcon_ql5iyxjfuvic1.jpg', 'r/Helldivers', 'So, just figured I\'d let you all know that the electric resist armor does in fact work. You can walk past Tesla turrets without getting blown out of your boots, and your Arc gunner isn\'t going to accidentally melt you on the tail end of a 3 kill chain combo.\r\n\r\n\r\nBut I took it a step further tonight &amp; figured out that if you\'re wearing it, you can effectively double your arc gunners range, and le...', 'undefined'),
('1bkwitw', 'New “frontline” mode?', 'https://styles.redditmedia.com/t5_2ya0t/styles/communityIcon_ql5iyxjfuvic1.jpg', 'r/Helldivers', 'Wish they added a new mode or special events, like \"frontline\" fights, where more than one squad could join and fight together.\r\n\r\nImagine special weekend events or planets where 5 squads (20 players or so) could join together and fight a swarm of bugs or bots for special rewards.\r\nCould be entirely different missions than what’s already available, clear a frontline back to a certain point, reach a base/nest and acquire data and make it back to shuttle, place the flag, or just defend a certain point/base from heavy attacks. Could yield serums, special armours and weapons, adding leaderboards, etc…\r\nWhat are your thoughts guys?\r\n\r\n\r\n*images are Ai generated, taken from facebook, made by Astral Infernum Production*', 'https://b.thumbs.redditmedia.com/99-0L_-efkn99YuCanKh9q1egH0J1Fo7WTp48z_PeTE.jpg'),
('1bpuvg0', 'New Strategems added', 'https://styles.redditmedia.com/t5_2ya0t/styles/communityIcon_ql5iyxjfuvic1.jpg', 'r/Helldivers', 'Available for immediate delivery', 'https://b.thumbs.redditmedia.com/m_ADB4XjfVglY1Fz881ZnySwdP9AfZgR09UDJTCQ43Y.jpg'),
('1bq0qmz', 'H: Caps W: regular NukaCola', 'https://a.thumbs.redditmedia.com/f9TrnxJfv4wxM_EibOWK0WfFMVXbceQTY3VgCrXvS-4.png', 'r/Market76', '', ''),
('1bzxd2w', 'NukaCola Addict Pfp', 'https://b.thumbs.redditmedia.com/qc1_fvT_58H_OdbLt6WWShficTR84qwx-bKTAugkpBE.png', 'r/Fallout', 'Would anyone like to make me a PFP for my yt? It sounds childish but I am 20 and can\'t draw for shit 😂\r\nI\'ll explain more in a DMs or comments but basically I want something like this. NukaCola Cap or sticker with \"Addict\" at the bottom :D \r\n\r\n$15 is my max cause I broke af', 'https://b.thumbs.redditmedia.com/-wlMPcRQIfjlV2UmHX1tuynq7biz1NZwg2Zo8jbk1nY.jpg'),
('1c4cjyv', 'NukaCola &gt; Coca-Cola', 'https://b.thumbs.redditmedia.com/R7vx6mpqeuFfm6KOjxQSg6IhaqhYMEXMvjuP9jWOF3I.png', 'r/ArgentinaBenderStyle', '', 'https://b.thumbs.redditmedia.com/g9C4tWkWByq73mRRjUk3ax3F-JNf0zErGc5FiHPC6PE.jpg'),
('1c8ucfq', 'H: LL3 W: Nukacola quantum', 'https://a.thumbs.redditmedia.com/f9TrnxJfv4wxM_EibOWK0WfFMVXbceQTY3VgCrXvS-4.png', 'r/Market76', '', ''),
('1cdjv6s', 'New MO, liberate Choohe and Penta for new Stratagems | 4/26/2024', 'https://styles.redditmedia.com/t5_2ya0t/styles/communityIcon_ql5iyxjfuvic1.jpg', 'r/Helldivers', '', 'https://a.thumbs.redditmedia.com/TADuAjxvtgsmJvjKx5Rys7GebcZ0ms7pfFhgGNyz724.jpg'),
('1cituvd', 'CocaCola', '', 'r/KidsAreFuckingStupid', '', 'https://external-preview.redd.it/d2hxNmhsaTNqM3ljMferYu48cd2P1YwbnJbZqrdf4-oijsvUEMsXkuOKHqzQ.png'),
('1cqh1bl', 'Does the nukacola quantum taste good?', 'https://b.thumbs.redditmedia.com/qc1_fvT_58H_OdbLt6WWShficTR84qwx-bKTAugkpBE.png', 'r/Fallout', 'Specifically the gfuel? It looks like it\'s protein powder so idk. But I\'d definitely try it a few recommendations lol', ''),
('1crncd7', 'Pepe Coin (PEPE) Reaches New All-Time High Amid Meme Coin Surge', 'https://b.thumbs.redditmedia.com/ZMRSJ8S0YOKVgKDpolXd-OBp4qkWLb7_zQCYfoq0pkw.png', 'r/ethtrader', '&gt; Pepe coin (PEPE) has hit a new all-time high (ATH) amid a recent surge in the crypto market.\r\n\r\n&gt; Smart money addresses have been actively trading PEPE, with 250.5 billion PEPE moved in the past 24 hours.\r\n\r\n&gt; Technical indicators suggest a potential continuation of PEPE’s upward trend, although a correction may be possible due to overbought conditions.\r\n\r\n&gt; Meme coins such as PEPE, Shiba Inu (SHIB), Floki (FLOKI), and Bonk (BONK) are among the best performers in the top 100 cryptocurrencies by market capitalization.', 'https://b.thumbs.redditmedia.com/QXHL8CfCMXE1BLoY8tm5Tgz7OSDIylcBAihujgkllQI.jpg'),
('5bh9vu', 'Made a NukaCola girl cosplay!', 'https://styles.redditmedia.com/t5_2tzv4/styles/communityIcon_tw45udd854341.png', 'r/fo4', '', 'https://a.thumbs.redditmedia.com/RYEupuD1-evAZie2y-uW9N3nFh0Ng3oBIY4FZ6WX630.jpg'),
('5f04xw', 'PsBattle: CocaCola\'s new flavour', 'https://a.thumbs.redditmedia.com/sIpOlDCXkYDxKKt4Qk-M-_FiZcsw96ElLKhMXH3SJj0.png', 'r/photoshopbattles', '', 'https://b.thumbs.redditmedia.com/IeB-GDWu-Yjbr3BgJRRV0XGvUsbcK18NeygsbTTL1kk.jpg'),
('9p9jqu', 'Mclaren announces partnership with CocaCola', 'https://b.thumbs.redditmedia.com/uUkSuTDpTWhU4mW5-OXzca_pVR0RQKHkEq-x_eCQC9I.png', 'r/formula1', '', 'https://b.thumbs.redditmedia.com/wvs8GBeEl_wd_lsUKbhsjz4fyMDi8kLUCCcxT_rCYgw.jpg'),
('edaky1', 'Blessed_cocacola', 'https://styles.redditmedia.com/t5_3j7rv/styles/communityIcon_emaeqo0baro31.jpg', 'r/blessedimages', '', 'https://b.thumbs.redditmedia.com/ZGnA1mso64Qj8XkyiCoVVk4A017LMpsvotEw4GBlKmE.jpg'),
('gw4dlu', 'New Orleans new motto...', 'https://b.thumbs.redditmedia.com/VZX_KQLnI1DPhlEZ07bIcLzwR1Win808RIt7zm49VIQ.png', 'r/pics', '', 'https://b.thumbs.redditmedia.com/WHcuw161NQ0H-b3xpt9_iKc1Lhh6bZh0P5aHlUL-v6c.jpg'),
('kp676l', 'New Year, New Heroes', 'https://b.thumbs.redditmedia.com/0PgZl68jAxA6T1BH6uvUQ5Bz1F1GrrJLCL8oi2Gz0Ak.png', 'r/gaming', '', 'https://b.thumbs.redditmedia.com/DApJTt9xutLmPTGZ6miXJ7PgW2h2Y2s-a2tzX7rCbuo.jpg'),
('qt0hvd', 'New Caledonia Referendum', 'https://b.thumbs.redditmedia.com/T0QMzISutkIZ9Jk7PcMyl53cnR025V0Fo3NxImRLSxA.png', 'r/polandball', '', 'https://b.thumbs.redditmedia.com/TEFVWibzQ-BFuRGbA8JJC-GdQacAYAl_K4MJg3kQN3k.jpg'),
('rvrj42', 'New year, new replicas, new lights……..', 'https://b.thumbs.redditmedia.com/DFklxJb_Z-tgCSfoqhJfRkCUMiqSneJzL5gTGj0PnkI.png', 'r/destiny2', '', 'https://a.thumbs.redditmedia.com/zkTT5h1VXJ3w5Qaw0xTDHYO2dvLVN_9YOUsisSaVTO4.jpg'),
('t2rt6s', 'NukaCola', 'https://styles.redditmedia.com/t5_2wa6j/styles/communityIcon_g0xj04p4jmzc1.jpg', 'r/MobileWallpaper', '', 'https://a.thumbs.redditmedia.com/nXcpQrD8sHYG2mOprXJMgI7sbv0TRBYgK97LUEVIyj0.jpg'),
('wnn8t5', 'New York moment', 'https://b.thumbs.redditmedia.com/_9KDi0voxvdEZEkceCGCzyjtXR7cFQFRpLFGMCBF2MM.png', 'r/Unexpected', '', 'undefined'),
('xj9pla', 'New home, new WFH. Phuket.', 'https://styles.redditmedia.com/t5_34ixl/styles/communityIcon_sgw38hk04ht51.png', 'r/CozyPlaces', '', 'https://b.thumbs.redditmedia.com/pViRgjWMR5WHUX-_PdNpdugUu80oomqYTvNcEbf-8aM.jpg'),
('xmxszy', 'Cocacola normal', 'https://styles.redditmedia.com/t5_46tcaa/styles/communityIcon_m5elwmvpmqma1.jpeg', 'r/fixedbytheduet', '', 'https://b.thumbs.redditmedia.com/iigJIxKBHKgll7v1H6TlugTMMWS27WZCQdc5B5O6eRA.jpg'),
('zewxo5', 'New Hairstyles with the new patch', 'https://b.thumbs.redditmedia.com/fruteeLd_9QxmXc7JN3sMXyG12sq9JeJb-yzYSZ-n3c.png', 'r/Eldenring', '', 'https://b.thumbs.redditmedia.com/ao_CCXH8Ok32UWeruw8VQ3IbWEaRxtKeFrCD9ew5zxk.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `Saved`
--

CREATE TABLE `Saved` (
  `id` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,

  FOREIGN KEY (`id`) REFERENCES `posts`(`id`),
  FOREIGN KEY (`Username`) REFERENCES `accounts`(`id`),

  KEY `key_id` (`id`),
  KEY `key_username` (`username`)

) ;

--
-- Dump dei dati per la tabella `Saved`
--

INSERT INTO `Saved` (`id`, `Username`) VALUES
('13ekhbd', 'Giuko2'),
('15afd5a', 'Giuko2'),
('15afd5a', 'SalvoMus'),
('164hgnx', 'Giuko2'),
('169w9ut', 'Giuko2'),
('16a2gf0', 'Giuko2'),
('16a2gf0', 'SalvoMus'),
('1beimze', 'Giuko2'),
('1beimze', 'SalvoMus'),
('1bpuvg0', 'Giuko2'),
('1crncd7', 'Giuko2'),
('5bh9vu', 'Giuko2'),
('qt0hvd', 'SalvoMus'),
('t2rt6s', 'Giuko2'),
('wnn8t5', 'Giuko2'),
('xj9pla', 'Giuko2');