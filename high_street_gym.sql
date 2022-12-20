-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 06:20 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `high_street_gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `blog_post_id` int NOT NULL,
  `blog_title` varchar(150) NOT NULL,
  `blog_content` mediumtext NOT NULL,
  `user_user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`blog_post_id`, `blog_title`, `blog_content`, `user_user_id`) VALUES
(1, 'HOW FAST DO YOU LOSE MUSCLE WHEN YOU STOP WORKING OUT? (& HOW TO AVOID IT)\r\n', 'What happens to your body when you stop lifting weights? This is a common question a lot of folks are asking right now as the global pandemic has most people training in some limited capacity.\n\nI want to start with a real-life example of muscle loss. Matt H is a pro natural bodybuilder and client of world-renowned physique coach, Cliff Wilson. After being hospitalized with Crohn’s flare-up, Matt was forced to take a significant break from training.\n\nHe went from 200 lbs on the left, all the way down to 166 lbs on the right, at about the same body fat. This means he lost just about 35 pounds of pure muscle!\n\nWe’ll come back to Matt later, but at this point I think it’s reasonable to wonder exactly how long it takes to see this kind of muscle loss. Does it happen after a week? A month? A year? And, does it depend on if you did absolutely nothing, or just reduced the training workload? Well, luckily, science can help us answer all of these questions.\n\nBefore we dig into those questions, it’s important to first understand that muscle loss is a complex process – an ongoing tug of war between muscle protein synthesis and muscle protein breakdown, where gradually, the muscle protein breakdown side starts to win.\n\nWe can think of skeletal muscle as a big brick wall: muscle protein synthesis is the process of adding bricks to the wall, while muscle protein breakdown is the process of removing them. These two processes are always occurring, and regularly swap turns taking the lead as we alternate between a fed and a fasted state. When we’re in a fed state, we tend to be adding bricks to the wall (assuming we ate enough protein in that meal) and we tend to be removing bricks from the wall when we’re in a fasted state (~8 hours after the last meal was consumed).\n\nWhat really matters for muscle gain and muscle loss in the long term balance between these two opposing processes. This balance, which we’ll call net protein balance, determines whether we gain, lose, or maintain muscle mass. If muscle protein synthesis is greater than muscle protein breakdown for a sustained period of time, more bricks are added than removed, and the wall gets bigger. We call this, positive net protein balance. On the other hand, if muscle protein synthesis is less than muscle protein breakdown for a sustained period of time, more bricks are removed than added, and consequently, the wall gets smaller. We call this negative net protein balance.\n\nWhile we know that muscle protein breakdown must exceed muscle protein synthesis for us to lose muscle, there are actually several different ways this can occur: 1) muscle protein synthesis can decrease, 2) muscle protein breakdown can increase, or 3) some combination of these two processes can occur simultaneously. Because feeding itself impacts protein metabolism, in order to figure out which of these three scenarios occurs when we stop lifting, we need to consider the impact of detraining on protein metabolism in both the fed state and the fasted state. Let’s start with the fasted state.\n\nGibson et al. (1987) was the first study to examine the effects of muscle disuse on muscle protein balance in the fasted state in humans.2 They had six men place one of their legs in a long-leg plaster cast and after five weeks, measured muscle protein synthesis and breakdown following a 12 hour overnight fast. They found that muscle protein synthesis had decreased by ~26% when compared to the non-immobilized leg, while muscle protein breakdown had remained unchanged.\n\nSince then, these same basic findings have been replicated many times in studies of prolonged muscle disuse (>10 days).3-6 What these studies find is that muscle protein breakdown will sometimes increase in the first two weeks, but then quickly return to baseline (i.e. to pre-disuse levels). Muscle protein synthesis, on the other hand, decreases in the early stages of disuse (somewhere in the first ~10 days) and then remains depressed.3 This implies that when we stop lifting, the majority of muscle loss in the fasted state is coming from “less bricks being added to the wall” rather than “more bricks being removed from the wall.” Of course, detraining could impact the wall differently, once we eat food. So let’s take a quick look at what the science says about muscle disuse in the fed state.\n\nGlover et al. (2008) was the first study to examine the effects of muscle disuse on muscle protein balance in a fed state.6 They had twelve young, healthy participants wear a knee brace for 14 days in order to immobilize one of their legs. After this period of time, they infused amino acids using IV at both high and low doses and measured the muscle protein synthetic response in both the immobilized and non-immobilized leg.\n\nTheir results showed that four hours after amino acid infusion, muscle protein synthesis was, on average, 54% and 68% greater in the non-immobilized leg compared to the immobilized leg after the low and high doses, respectively. Just like in the fasted state, it appears that detraining is decreasing the amount of bricks being added (but not affecting the amount of bricks being removed) in the fed state as well.\n\nThis research collectively demonstrates that muscle disuse leads to what’s known as anabolic resistance, where the muscle protein synthetic response to feeding is less sensitive and at a lower capacity than normal. Not only does muscle protein synthesis decline more than normal in the fasted state, it also doesn’t rise as much in response to feeding.\n\nAs the authors of Glover et al. (2008) note, knowing this allows us to tailor strategies for preventing muscle loss to target the decline in muscle protein synthesis, as opposed to an increase in muscle protein breakdown, which doesn’t seem to occur.6 As we will see later in the article, the best tools we have to accomplish this are though resistance-based exercise and, to a lesser extent, nutrition.\nBefore we discuss these tools, let’s first consider how long it takes to lose muscle and at what rate we tend to lose it.\n\n\n\n\n', 10),
(2, 'Why I Want You To Eat Tastier Food & Stop Being An Average Chicken ‘N BroccoliGym Head...', 'Dear reader, \n\nIf you want to stick to a diet, eat delicious food, and actually get results faster, then chill yourself because you’re in the right place! \n\nWhat you’re going to find in this eBook are five mouth-watering recipes I personally use and share with my coaching clients that taste so good you’ll want them in your diet every week. \n\nAnd I wouldn’ blame you, either—a lot of pros in the industry use them—but I’m tellin’ you about them because I’m a good guy like that!\n\nBut seriously, here’s why I made this little eBook: \n\nLet’s be honest.\n\nWhen you go on YouTube and look at the diets of 95% of the people in the fitness industry, you almost feel sick to your stomach seeing what they eat!\n\nThey inhale the same old boring food the other guy eats. (...and have been eating for years!)\n\nAnd maybe you’re thinking to yourself: Do I really need to see another 8 egg-white cooking video?!?\n\nWill drowning my dry chicken in Cholula hot sauce rescue me from the blandness?!\n\nShould I close my eyes and pretend this salmon is a cheeseburger?!\n\nNews flash—a big fat “NO!” to all these questions. \n\nSo, here are a few delicious solutions you can use to eat food you actually like—with zero guilt!\n\nI truly believe that if you love your diet, then you’re more likely to stick to it. \n\nAnd if you stick to it, then you’ll see results faster.\n\nAt the end of the day, I know that’s what you want AND what I want for you. \n\nSo, I went ahead made this little eBook showcasing some of my favorite recipes so you could make that happen. \n\nI really think you’ll enjoy them!\n\nThey’re the same recipes I’ve used as an IFBB pro and have shared with my 1000+ diet, training, and supplement clients around the world. \n\nBefore you ask....\n\nNO, I’m Not A Dietician!—But I Know WAAAY More Than Them!\n\nBut I AM an...\n\n• IFBB Pro Bodybuilder\n• Guinness World Record-Holding Powerlifter\n• Bachelors and Masters Degrees in Kinesiology\n• YouTuber with more than 850,000 subscribers\n• Coach 1,000s clients around the world\n• Published Author \n\nAnd I’ve used these and other recipes that you can find in The Ultimate Anabolic Cookbook 2.0 to become one of the best at what I do.\n\nAnd I’m tellin’ ya, I’m one of the best!\n\nIf you actually go and cook these up, feel free to show me on social media by tagging me or hashtagging #CHEFGREG and I’ll definitely check it out. \n\nAlso, it’d fantastic if you could click this link to share any stories or “before”/”after photos.\n\nI’m always happy to hear from you and help you out in any way!\n\nAnyway, thank you so much for even THINKING about downloading these recipes and I hope you enjoy them!\n\nGreg Doucette', 11),
(8, 'Benefits of face pulls', 'The rear deltoids are the primary muscles targeted in the face pull exercise. Additionally, the rhomboids, which allow you to pinch the shoulder blades together, and the middle trapezius (upper back) also play a role in executing this move.\n\nTraining these areas is key to reducing shoulder injuries, maintaining good posture, and preventing muscle imbalances that often happen from too much chest work.\n\nPlus, the shoulders and upper back muscles help with several physical activities and daily tasks that require pulling or reaching. Because you perform this move standing, you will also recruit the muscles in your core, which help with stability and balance, according to Harvard Health.', 7);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int NOT NULL,
  `class_name` varchar(45) NOT NULL,
  `class_date` date NOT NULL,
  `class_start_time` time NOT NULL,
  `class_finish_time` time NOT NULL,
  `trainer_trainer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class_date`, `class_start_time`, `class_finish_time`, `trainer_trainer_id`) VALUES
(35, 'Yoga', '2022-12-31', '07:00:00', '08:00:00', 124),
(36, 'Pilates', '2022-12-31', '09:00:00', '10:00:00', 124),
(37, 'Abs', '2022-12-31', '11:00:00', '12:00:00', 125),
(38, 'HIIT', '2022-12-31', '15:00:00', '16:30:00', 126),
(39, 'Boxing', '2022-12-31', '09:00:00', '10:00:00', 124),
(40, 'Indoor Cycling', '2022-01-01', '10:00:00', '11:30:00', 125),
(41, 'Face Pulls', '2023-01-01', '11:00:00', '12:00:00', 126),
(42, 'Zumba', '2022-01-01', '13:00:00', '15:00:00', 126);

-- --------------------------------------------------------

--
-- Table structure for table `class_booking`
--

CREATE TABLE `class_booking` (
  `class_booking_id` int NOT NULL,
  `class_class_id` int NOT NULL,
  `user_user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `trainer_id` int NOT NULL,
  `trainer_first_name` varchar(50) NOT NULL,
  `trainer_last_name` varchar(50) NOT NULL,
  `trainer_email_address` varchar(255) NOT NULL,
  `trainer_phone_number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `trainer_first_name`, `trainer_last_name`, `trainer_email_address`, `trainer_phone_number`) VALUES
(124, 'John', 'Smith', 'johnsmith@gmail.com', '0412345678'),
(125, 'Greg', 'Doucette', 'support@gregdoucette.com', '0714881488'),
(126, 'Jeff', 'Cavaliere', 'info@athleanx.com', '07482637452');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_first_name` varchar(50) NOT NULL,
  `user_last_name` varchar(50) NOT NULL,
  `user_email_address` varchar(255) NOT NULL,
  `user_phone_number` varchar(30) DEFAULT NULL,
  `user_bio` varchar(150) DEFAULT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_first_name`, `user_last_name`, `user_email_address`, `user_phone_number`, `user_bio`, `user_password`, `user_image`) VALUES
(5, 'Ryan', 'Jackson', 'ryanantjackson@gmail.com', '0422057040', 'Hi, my name is Ryan!', '$2y$10$ZFL/cMuHK/VuA.IkTfBvVuuhfIMV6Gmp3eNck19Aa5eGk.t9FxT8.', NULL),
(6, 'Cameron', 'Hughes', 'Cameron.HUGHES@tafeqld.edu.au', '0754803642', 'Cameron Hughes\r\nEducator, ICT\r\nTAFE QUEENSLAND ONLINE', '$2y$10$TlWraO7vJ3Tze4B7JyFmEefUpCCWpHg9ARAYtWR/0MBMhrlcox.aC', NULL),
(7, 'Digby', 'Thomas', 'nextdigby@gmail.com', '0412285866', NULL, '$2y$10$0d5jgOyMj5Mq5mLrBnG3Pe.965mIi0DoW6iC88wP0CVxIXMae1b7C', NULL),
(8, 'Graham', 'Thomas', 'grahamthomas@gmail.com', '', NULL, '$2y$10$Si4hDUcoEkla1ZgpGZUcOu4ppsE5kwW8FxqKfLqMehEdXKzE8bGtq', NULL),
(10, 'Jeff', 'Nippard', 'info@jeffnippard.com', '', NULL, '$2y$10$zj67jKkxBCPL9Su2cJjm9ea9GGhDuzDdJYjsBPD/XnptRu6wQMG4.', NULL),
(11, 'Greg', 'Doucette', 'info@gregdoucette.com', '', NULL, '$2y$10$lBAfIWWYQINQYkxeqsHx8OR098kcIqCrbC4rT3GMBbveIVRoJ5ntq', NULL),
(12, 'Cole', 'Jackson-Thomas', 'colejackson@bumkin.com', '', NULL, '$2y$10$0VnJ3lgSk1iW5VsFL9amCegG5Rk3qdbpmO7dpaRWS60eYnXNGKH5e', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`blog_post_id`),
  ADD UNIQUE KEY `blog_post_id_UNIQUE` (`blog_post_id`),
  ADD KEY `fk_blog_post_user1_idx` (`user_user_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_id_UNIQUE` (`class_id`),
  ADD KEY `fk_class_trainer1_idx` (`trainer_trainer_id`);

--
-- Indexes for table `class_booking`
--
ALTER TABLE `class_booking`
  ADD PRIMARY KEY (`class_booking_id`),
  ADD UNIQUE KEY `class_booking_id_UNIQUE` (`class_booking_id`),
  ADD KEY `fk_class_booking_class1_idx` (`class_class_id`),
  ADD KEY `fk_class_booking_user1_idx` (`user_user_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainer_id`),
  ADD UNIQUE KEY `trainer_email_address_UNIQUE` (`trainer_email_address`),
  ADD UNIQUE KEY `trainer_phone_number_UNIQUE` (`trainer_phone_number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  ADD UNIQUE KEY `email_address_UNIQUE` (`user_email_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `blog_post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `class_booking`
--
ALTER TABLE `class_booking`
  MODIFY `class_booking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `trainer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD CONSTRAINT `fk_blog_post_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `fk_trainer_trainer_id` FOREIGN KEY (`trainer_trainer_id`) REFERENCES `trainer` (`trainer_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `class_booking`
--
ALTER TABLE `class_booking`
  ADD CONSTRAINT `fk_class_booking_class1` FOREIGN KEY (`class_class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `fk_class_booking_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
