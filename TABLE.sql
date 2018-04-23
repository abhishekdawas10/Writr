CREATE TABLE IF NOT EXISTS `follow_and_unfollow_users_table` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;





CREATE TABLE IF NOT EXISTS `follow_and_unfollow_activity` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `page_owners_emails` varchar(200) NOT NULL,
  `followers_emails` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;




INSERT INTO `follow_and_unfollow_users_table` (`id`, `firstname`, `lastname`, `email`, `password`, `date`) VALUES
(1, 'Abhishek', 'Singh', 'abhisheksingh@gmail.com', '', '15-10-2018'),
(2, 'Abhishek', 'Goyal', 'abhishekgoyal@gmail.com', '3951eee3cdf8a30a022a049746b00343', '18-11-2012'),
(3, 'Sahil', 'Gupta', 'sahil@gmail.com', '0e1bb212e6a6a413f7f10cb5b809c9f6', '03-12-2012'),
(4, 'chomu', 'singh', 'chomu@yahoo.com', '0eaf41748ddd5da8d872e2b63b660ed6', '27-12-2012'),
(5, 'Ghanu', 'Moorthy', 'ghanu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '11-01-2013');
