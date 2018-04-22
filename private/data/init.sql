--
-- Creating database
--

CREATE DATABASE vgym;

use vgym;

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE IF NOT EXISTS `exercise` (
  `id` int(11) NOT NULL,
  `exercise_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Data is exported for table `exercise`
--

INSERT INTO `exercise` (`id`, `exercise_name`) VALUES
(1, 'Crunch'),
(2, 'Air squat'),
(3, 'Windmill'),
(4, 'Push-up'),
(5, 'Rowing Machine'),
(6, 'Walking'),
(7, 'Running');

-- --------------------------------------------------------

--
-- Table structure for table `exercise instances`
--

CREATE TABLE IF NOT EXISTS `exercise_instances` (
  `id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL COMMENT 'optional, filled when this is part of a trainingplan (day)',
  `exercise_duration` int(11) NOT NULL DEFAULT '0' COMMENT 'duration in seconds',
  `order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Data is exported for table `exercise_instances`
--

INSERT INTO `exercise_instances` (`id`, `exercise_id`, `day_id`, `exercise_duration`, `order`) VALUES
(1, 5, 1, 300, 1),
(2, 6, 1, 900, 3),
(3, 7, 1, 900, 2),
(4, 1, 2, 150, 1),
(5, 2, 2, 300, 2),
(6, 3, 2, 300, 3),
(7, 4, 2, 500, 4);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(150) NOT NULL COMMENT 'contains plan name',
  `plan_description` text NOT NULL COMMENT 'contains plan description (optional)',
  `plan_difficulty` int(1) NOT NULL DEFAULT '1' COMMENT '1=beginner,2=intermediate,3=expert'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='contains basic plan data';

--
-- Data is exported for table `plan`
--

INSERT INTO `plan` ('plan_name`, `plan_description`, `plan_difficulty`) VALUES
('My first plan', 'Just a dummy :-)', 1),
('Paul\'s Plan', 'Stuff that Paul wants to do', 3),
('Matt\'s Plan', 'Stuff that Matt wants to do', 3);


-- --------------------------------------------------------

--
-- Table structure for table `plan_days`
--

CREATE TABLE IF NOT EXISTS `plan_days` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL COMMENT 'id from plan table',
  `day_name` varchar(100) NOT NULL DEFAULT '' COMMENT 'name for this day, optional',
  `order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Data is exported for table `plan_days`
--

INSERT INTO `plan_days` (`id`, `plan_id`, `day_name`, `order`) VALUES
(1, 1, 'Day 1 - Cardio', 1),
(2, 1, 'Day 2 - Other exercises', 2);

--
-- Indexes for exported tables
--

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise_instances`
--
ALTER TABLE `exercise_instances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_days`
--
ALTER TABLE `plan_days`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for exported tables
--

--
-- AUTO_INCREMENT for a table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for a table `exercise_instances`
--
ALTER TABLE `exercise_instances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for a table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for a table `plan_days`
--
ALTER TABLE `plan_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
