
CREATE TABLE `accounts` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(255) UNIQUE,
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
('Giuko', 'pass123$A', 'Account2', 'Account2', '$2y$10$isWLW9cVoXvo/YZ6iulnMukJ6P.b.nIYdarufr9x63EPNvR8t/ZE2'),
('SalvoMus', 'salvoMus@musumuci.unict.it', 'Lambert12$', 'Roberto', '$2y$10$cpfHx1G0.UkHrrN5z4PnfOiZZtg1J69oHG8aS8NLD1G7lyyTYJcYe');

-- --------------------------------------------------------

--
-- Struttura della tabella `posts`
--

CREATE TABLE `posts` (
  `numeric_id` int AUTO_INCREMENT PRIMARY KEY,
  `id` varchar(255) NOT NULL,
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

-- --------------------------------------------------------

--
-- Struttura della tabella `comments`
--

CREATE TABLE `comments` (
  `id` int AUTO_INCREMENT PRIMARY KEY,
  `content` text,
  `post_date` timestamp DEFAULT current_timestamp(),
  `post_id` int NOT NULL,
  `account_id` int NOT NULL,

  FOREIGN KEY (`post_id`) REFERENCES `posts`(`numeric_id`),
  FOREIGN KEY (`account_id`) REFERENCES `accounts`(`id`),

  KEY `key_post_id` (`post_id`),
  KEY `key_account_id` (`account_id`)
);

--
-- Dump dei dati per la tabella `comments`
--

INSERT INTO `comments` (`content`, `post_date`, `post_id`, `account_id`) VALUES

-- --------------------------------------------------------

--
-- Struttura della tabella `saved`
--

CREATE TABLE `saved` (
  `post_id` int NOT NULL,
  `account_id` int NOT NULL,

  FOREIGN KEY (`post_id`) REFERENCES `posts`(`numeric_id`),
  FOREIGN KEY (`account_id`) REFERENCES `accounts`(`id`),

  KEY `key_post_id` (`post_id`),
  KEY `key_account_id` (`account_id`)

) ;

--
-- Dump dei dati per la tabella `saved`
--

INSERT INTO `saved` (`post_id`, `account_id`) VALUES