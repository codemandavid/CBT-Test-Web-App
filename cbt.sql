-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2014 at 05:00 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quest_no` int(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `option_e` text NOT NULL,
  `answer` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=216 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quest_no`, `subject`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `answer`) VALUES
(1, 1, 'General Science', 'The smallest unit of life is ___________. \r', 'heart', 'bone', 'cell', 'skin\r', '', ''),
(2, 2, 'General Science', 'All these are the ways of contacting HIV / AIDS EXCEPT. \r', 'through sharing of blades', 'through hugging', 'through blood transfusion', 'through mixing of bloo', '', ''),
(3, 3, 'General Science', 'The liquid flowing in the body for the survival of human being is called ______________\r', 'cell', 'blood', 'heart', 'platelets.\r', '', ''),
(4, 4, 'General Science', 'A period which one spends relaxing and not engage in any activity or work is called ___________. \r', 'exercise', 'sleep', 'rest', 'strain.\r', '', ''),
(5, 5, 'General Science', 'A physical exercise which one does in order to stay healthy is  \r', 'rest', 'exercise', 'sleep', 'Locomotive.\r', '', ''),
(6, 6, 'General Science', 'Which of the following is not true about AIDS. \r', 'it spread through blood contact', 'it is deadly disease', 'it destroy body immune system', 'it makes one fatter.\r', '', ''),
(7, 7, 'General Science', 'What is the full meaning of HIV? \r', 'Higher immune deficiency virus', 'Highlights imagine deficiency  virus', 'Human Immune deficiency virus', 'Human Imogene deficiency virus.\r', '', ''),
(8, 8, 'General Science', 'All these are examples of physical exercise except . \r', 'cycling', 'swimming', 'wrestling', 'fighting.\r', '', ''),
(9, 9, 'General Science', 'The fluid water found in a blood is called _____. \r', 'particles', 'red blood cell', 'plasma', 'placenta.\r', '', ''),
(10, 10, 'General Science', 'Too much of white blood cell can cause disease called ____________. \r', 'Malaria', 'Diabetes', 'Leprosy', 'Leukaemia.\r', '', ''),
(11, 11, 'General Science', 'In order to prevent accident on the road, which side should a pedestrian take. \r', 'middle', 'left hand side', 'right hand side', 'under the bridge.\r', '', ''),
(12, 12, 'General Science', 'In traffic light signals, when the red and amber lights appear together, it means \r', 'you must sleep', 'slow down', 'danger', 'you must get ready to go.\r', '', ''),
(13, 13, 'General Science', 'The diseases which can be transferred from one person to another is ___. \r', 'communicable diseases', 'hereditary', 'non – communicable diseases', 'transferable diseases.\r', '', ''),
(14, 14, 'General Science', 'A sudden event or happening, which occur when one does not expect, is called ___________.\r', 'Injury', 'Accident', 'Problem', 'War.\r', '', ''),
(15, 15, 'General Science', 'The movement of blood round all our parts of the body is called _________________. \r', 'Blood transfusion', 'Blood circulation', 'Blood wastage', 'Blood banks.\r', '', ''),
(16, 16, 'General Science', 'Which of the following is enclosed in cell membrane. \r', 'cell wall', 'Nucleus', 'Cytoplasm', 'Vacuole.\r', '', ''),
(17, 17, 'General Science', 'All these are water borne diseases except _____. \r', 'Kwashiorkor', 'Cholera', 'Dysentery', 'Typhoi', '', ''),
(18, 18, 'General Science', 'Which of the following can affect one’s cell. \r', 'portentous food', 'clean water', 'regular exercise', 'hard drugs.\r', '', ''),
(19, 19, 'General Science', 'Which of the following can cause malaria. \r', 'Too much of breeze', 'Too much of vitamins', 'dog’s bite', 'anopheles mosquito.\r', '', ''),
(20, 20, 'General Science', 'Which of the following parts of body helps in circulating blood round the body.\r', 'veins', 'arteries', 'heart', 'lungs.\r', '', ''),
(21, 21, 'General Science', '__________ and _________ are the two types of soap. \r', 'soft and long', 'hard and soft', 'local  and modern', 'marble and soft.\r', '', ''),
(22, 22, 'General Science', '_____________ are hard material forming part of the earth’s crust. \r', 'stone', 'sand', 'grass', 'rock.\r', '', ''),
(23, 23, 'General Science', 'One of the following is a good conductor of electricity.\r', 'aluminum', 'plastic', 'wood', 'water.\r', '', ''),
(24, 24, 'General Science', 'A device that hold a bulb is called ____________. \r', 'battery', 'fuse', 'bulb holder', 'bulb case.\r', '', ''),
(25, 25, 'General Science', 'Which of the following air do we breath in. \r', 'Butane', 'Carbon dioxide', 'Oxygen', 'Oxidizes.\r', '', ''),
(26, 26, 'General Science', 'All are types of teeth except. \r', 'incisors', 'canines', 'molars', 'mongers.\r', '', ''),
(27, 27, 'General Science', 'The group of organs which helps to break food we eat into small pieces is ______________. \r', 'organ system', 'digestive system', 'respiratory system', 'oxylatory system.\r', '', ''),
(28, 28, 'General Science', 'All are wastes in the body except\r', 'oxygen', 'sweet', 'urine', 'bile pigment.\r', '', ''),
(29, 29, 'General Science', 'All are materials needed in making soap except __________. \r', 'palm oil', 'caustic soda', 'kerosene', 'common salt\r', '', ''),
(30, 30, 'General Science', 'How many types of rock do we have. \r', 'ten', 'nine', 'three', 'four\r', '', ''),
(31, 31, 'General Science', 'Which of the following is popularly found in sugar. \r', 'granite', 'marble', 'nickel', 'coal\r', '', ''),
(32, 32, 'General Science', 'All are uses of rocks except. \r', 'to build a house', 'to construct bridges', 'to make cement', 'for furniture work\r', '', ''),
(33, 33, 'General Science', 'Which of the following removes urine from the body. \r', 'intestine', 'lungs', 'mouth', 'gullet\r', '', ''),
(34, 34, 'General Science', 'The reaction between caustic soda or potash and oil resulting in formation of soap is called _____________. \r', 'Carbon dioxide', 'Saponification', 'Respiration', 'Oxidation\r', '', ''),
(35, 35, 'General Science', 'Which of the following is not a good conductor of electricity. \r', 'iron', 'copper', 'nichrome', 'cotton\r', '', ''),
(36, 36, 'General Science', 'A _________ is a substance formed  by the union of two or more elements by a chemical process. \r', 'molecule', 'atoms', 'Compound', 'mixtures\r', '', ''),
(37, 37, 'General Science', 'The distance between the earth and the sun is ______km. \r', '150', '160', '170', '180\r', '', ''),
(38, 38, 'General Science', 'The type of lever that has its fulcrum between the effort and load is_____lever. \r', 'first', 'second', 'third', 'none\r', '', ''),
(39, 39, 'General Science', '_________ is the repetition of sound caused by the reflection of sound waves. \r', 'Ray of light', 'vibration', 'echo', 'light bulb\r', '', ''),
(40, 40, 'General Science', 'The gas used for cooking is called? \r', 'butane', 'carbon dioxide', 'oxygent', 'Nitrogen\r', '', ''),
(41, 41, 'General Science', 'All these are part of digestive system except .\r', 'throat', 'gullet', 'anus', 'shoulder\r', '', ''),
(42, 42, 'General Science', 'Which of the following can be located in our mouth. \r', 'mucus', 'Salivary glands', 'intestine', 'kidney\r', '', ''),
(43, 43, 'General Science', 'Which of the following removes water vapor and carbon dioxide. \r', 'skin', 'liver', 'kidney', 'lungs\r', '', ''),
(44, 44, 'General Science', 'A short tube by which urine leaves human body is called ___________. \r', 'sweat glands', 'sweat pores', 'urethra', 'kidneys\r', '', ''),
(45, 45, 'General Science', 'Another name for digestive system is ________________. \r', 'urethra', 'urethra', 'Alimentary canal', 'gullet\r', '', ''),
(46, 46, 'General Science', 'Iron plus tin will produce__________ \r', 'bronze', 'brass', 'metal', 'lead\r', '', ''),
(47, 47, 'General Science', '____ are general are the machines used in lifting heavy load. \r', 'Pulleys', 'lever', 'forcepts', 'tong\r', '', ''),
(48, 48, 'General Science', '___________ is the ability to do work\r', 'strength', 'energy', 'power', 'current\r', '', ''),
(49, 49, 'General Science', '____________ and __________ are two types of stitches. \r', 'old & new', 'hard & soft', 'temporary & permanent', 'fine & ugly stitches\r', '', ''),
(50, 50, 'General Science', 'The smallest unit of live is the _________ \r', 'cell', 'vacuole', 'cytoplasm', 'cell membrane\r', '', ''),
(51, 1, 'Social Studies', 'How many Geo – political zone do we have in Nigeria? \r', 'six', 'ten', 'four', 'nine\r', '', 'a'),
(52, 2, 'Social Studies', 'In which of the following states can we locate Ebira people? \r', 'Osun', 'Ogun', 'Oyo', 'Kogi.\r', '', 'a'),
(53, 3, 'Social Studies', 'Which Geo – political zone does Oyo State belong?\r', 'North west', 'South west', 'North central', 'South east\r', '', 'a'),
(54, 4, 'Social Studies', 'Where was the first capital of Nigeria. \r', 'Osun', 'Ogun', 'Oyo', 'Calabar.\r', '', 'a'),
(55, 5, 'Social Studies', 'Who among the following is the Governor of Edo – State.\r', 'Engineer Segun Oni', 'Dr. Bukola Saraki', 'Comrade Adams Oshiomole', 'Alhaji Namadi Sambo.\r', '', 'a'),
(56, 6, 'Social Studies', 'The first General strike took place in Nigeria in ________.\r', '1863', '1925', '1945', '1922.\r', '', 'a'),
(57, 7, 'Social Studies', 'Who was the first female judge in Nigeria.\r', 'Funmilayo Kuti', 'Kenya Ukejo', 'Stella Obasanjo', 'Patricia Eltoh.\r', '', 'a'),
(58, 8, 'Social Studies', 'Who established the National Youth Service Corps. \r', 'General  Murtala Mohammed', 'General Ibrahim Babangida', 'General Yakubu Gowon', 'General Abdulsalam Abubakar.\r', '', 'a'),
(59, 9, 'Social Studies', 'Who was the first Governor of Central bank of Nigeria, {C.B.N}.\r', 'Dr. Clement Isong', 'Professor Charles Soludo', 'Dr. Sanusi Mohammed', 'Alhaji Sanusi Lamido.\r', '', 'a'),
(64, 10, 'Social Studies', '____________ are the properties a wife sends to her husband house on the marriage day. \r', 'Dowry', 'Bride price', 'Engagement', 'Polyandry\r', '', 'a'),
(65, 11, 'Social Studies', 'The largest city in the world is _____________. \r', 'America', 'Mexico', 'Canada', 'China.\r', '', 'a'),
(68, 12, 'Social Studies', 'Which of the following is a state in America. \r', 'Accra', 'Lesotho', 'Cape town', 'Washington D C', '', 'a'),
(69, 13, 'Social Studies', 'The presidential villa in United State of America is also referred to as _____________.\r', 'Aso rock', 'Glass house', 'White house', 'parliament chamber.\r', '', 'a'),
(70, 14, 'Social Studies', 'A young Nigeria who made an attempt to bomb a plane in USA recently is _______________. \r', 'Gani Adams', 'Stella Damascus', 'Abdul – Mutalla', 'Abdulsalam Abubakar.   \r', '', 'a'),
(71, 15, 'Social Studies', 'Who was the first inspector General of police in Nigeria. \r', 'Dr. Clement Isong', 'Dr. Teslim Eliar', 'Mr. Louis Edet', 'Dr. Olusegun Agagu.\r', '', 'a'),
(72, 16, 'Social Studies', 'When was the Nigeria police force established? \r', '1986', '1930', '1945', '1923.\r', '', 'a'),
(73, 17, 'Social Studies', 'When was Nigeria capital moved from Calabar to Lagos? \r', '1905', '1946', '1906', '1908.\r', '', 'a'),
(74, 18, 'Social Studies', 'How many republics have so far been operated by Nigeria.\r', 'six', 'four', 'nine', 'ten.\r', '', 'a'),
(75, 19, 'Social Studies', 'All are the state in South West Geo – political zone of Nigeria except ____________. \r', 'Ogun', 'Osun', 'Ondo', 'Edo.\r', '', 'a'),
(76, 20, 'Social Studies', 'Which of the following is a Nigeria T.V. popular show? \r', 'Family tides', 'Big brother Africa', 'Who wants to be a millionaire', 'Papa Ajasco.\r', '', 'a'),
(77, 21, 'Social Studies', 'Which country won the just concluded Africa cup of nation?\r', 'South Africa', 'Togo', 'Algeria', 'Nigeria.\r', '', 'a'),
(78, 22, 'Social Studies', 'Which of the following country will host 2010 world cup.\r', 'Mexico', 'Brazil', 'South Africa', 'Tunisia.\r', '', 'a'),
(79, 23, 'Social Studies', 'Who among the following Nigerian’s hero has his portrait of Five hundred Naira note.\r', 'Sir Ahmadu  Bello', 'General  Muritala Mohammed', 'Dr. Nnamdi Azikwe', 'Alhaji Tafawa Balewa.\r', '', 'a'),
(80, 24, 'Social Studies', 'One of the following city is not in Oyo State. \r', 'Ogbomoso', 'Ibadan', 'Fiditi', 'Ilorin.\r', '', 'a'),
(81, 25, 'Social Studies', 'The first secondary school in Nigeria is ________\r', 'Molete Grammar School', 'Islamic High School', 'CMS  Grammar School', 'Olubadan High School.\r', '', 'a'),
(82, 26, 'Social Studies', 'How old was General Yajubu Gown when he became president of Nigeria. \r', 'Ninety two', 'Seventy four', 'twenty eight', 'sixty six.\r', '', 'a'),
(83, 27, 'Social Studies', 'All are Nigerian’s past leaders killed during the Jan. 15, 1966 coup except ___________\r', 'Sir Ahmadu Bello', 'Chief Ladoke Akintola', 'General Ibrahim Babangida', 'Alhaji Tafwa Balewa.\r', '', 'a'),
(84, 28, 'Social Studies', 'The Nigeria second republic was between ______ and _____. \r', '1963 – 1966', '1979 – 1983', '1993 – 1999', '1999 to date.\r', '', 'a'),
(85, 29, 'Social Studies', 'Which of the following country share the same boundary with Nigeria in South. \r', 'Niger Republic', 'Gilf of Guinea', 'Benin Republic', 'Niger Republic.\r', '', 'a'),
(86, 30, 'Social Studies', 'The first woman to own a car in Nigeria was _________________. \r', 'Turai Yar’adua', 'Oluremi Tinubu', 'Mrs. Kofoworola Ransome  Kuti', 'Mrs. Patricia Ettoh.\r', '', 'a'),
(87, 31, 'Social Studies', 'All are types of leader except ___________________.\r', 'magician leader', 'political leader', 'traditional leader', 'religious leader.\r', '', 'a'),
(88, 32, 'Social Studies', 'The set of people who govern the affairs of a country is known as __________________. \r', 'Presidency', 'Executive council', 'Government', 'Legislature.\r', '', 'a'),
(89, 33, 'Social Studies', 'A group of people who come together to achieve a particular objectives or aims is called __\r', 'Society', 'Organization', 'Multitude', 'Crow', '', 'a'),
(90, 34, 'Social Studies', 'Who among the following is the leader of local government? \r', 'Councilor', 'President', 'Minister', 'Chairman.\r', '', 'a'),
(91, 35, 'Social Studies', 'One of the following is known as government as the grass root. _______________. \r', 'State Government', 'Federal Government', 'Local Government', 'Unity Government.\r', '', 'a'),
(92, 36, 'Social Studies', 'The first political party to be formed in Nigeria was _________. \r', 'People Democratic Party [PDP]', 'Action Congress of Nigeria [ACN]', 'Social Democratic Party [SDP]', 'Nigeria National Democratic Party   [NNDP].\r', '', 'a'),
(93, 37, 'Social Studies', 'The aim of a political party written in a book form is called ________________. \r', 'constitution', 'Reformation', 'ambition', 'manifesto.\r', '', 'a'),
(94, 38, 'Social Studies', 'Which of the following is the capital of Cameroon. \r', 'Luanda', 'Yaounde', 'Cotonou', 'Abidjan.\r', '', 'a'),
(95, 39, 'Social Studies', 'A group of people with common interest and objectives and ready to promote their interest is \r', 'Organisation', 'Pressure group', 'Political associates', 'Business partakers.\r', '', 'a'),
(96, 40, 'Social Studies', 'One of the following leaders is appointed through election. \r', 'Religious leaders', 'Traditional  leaders', 'Political leader', 'Military leader.\r', '', 'a'),
(97, 41, 'Social Studies', 'Which of the following is the Angola currency. \r', 'Dollar', 'Naira', 'Cedis', 'Kwanza.\r', '', 'a'),
(98, 42, 'Social Studies', 'Accra is the capital of __________. \r', 'Ghana', 'Togo', 'Nigeria', 'Gabon.\r', '', 'a'),
(99, 43, 'Social Studies', 'Breaking down of job into smaller unit for many people to do is called __________________.\r', 'Labour exploitation', 'Labour participation', 'Compilation of labour', 'Division of labour.\r', '', 'a'),
(100, 44, 'Social Studies', 'Who among the following is the head of Federal Government? \r', 'Governor', 'Minister', 'President', 'Commissioner.\r', '', 'a'),
(101, 45, 'Social Studies', 'One of the following is not a member of state executive council.\r', 'Minister', 'Governor', 'Commissioners', 'Deputy Governor.\r', '', 'a'),
(102, 46, 'Social Studies', 'Which political party produced the winner of 1993 presidential election? \r', 'Action Congress', 'National Republican Party', 'People Democratic Party', 'Social Democratic party.\r', '', 'a'),
(103, 47, 'Social Studies', 'In the absence of a president of a particular country, who controls the affairs of the government?\r', 'Senate president', 'Ministers’', 'Vice president', 'Secretary to the Government.\r', '', 'a'),
(104, 48, 'Social Studies', 'The type of government practice in Nigeria now is known as __________________.\r', 'Autocracy', 'Democracy', 'Anarchy', 'Parliamentary.\r', '', 'a'),
(105, 49, 'Social Studies', 'All are ad vantages of pressure group EXCEPT.\r', 'They increase development', 'They protect interest of the member', 'They destabilize government', 'They help to achieve justice.\r', '', 'a'),
(106, 50, 'Social Studies', 'When did Ghana get his independence. \r', 'April 1st 2009', '1st March 1957', '1st October 1960', '1st December 1999.\r', '', 'a'),
(107, 1, 'Verbal Reasoning', '<b>Example: (best, beast),(set, seat)(bed,________)<br/>\r\na.Beans    b. bead     c. beat    d.Belt  e.Bear</b><br/><br/>\r\n\r\n(peace, pace) (seat, set) (head _______)\r\n', 'lead', 'had', 'hard', 'hare', 'hear\r', ''),
(108, 2, 'Verbal Reasoning', '(love, move)  (lark, mark)  (lead ¬¬¬¬¬¬¬¬¬¬¬¬______) \r', 'mead', 'Dale', 'Made', 'wade', 'deal\r', ''),
(110, 3, 'Verbal Reasoning', '(moot, mate) (foot, fate)  (cook _______)\r', 'Cast', 'caste', 'Craek', 'Crime', 'cake', ''),
(111, 4, 'Verbal Reasoning', '(birth, mirth) (crime, prime) (cloth ______)\r', 'Thrite', 'Mite', 'Sloth', 'Site', 'rite', ''),
(112, 5, 'Verbal Reasoning', '(rip, trip) (rain, train) (rap, _________)\r', 'Part', 'Trap', 'Trip', 'Tape', 'peat', ''),
(113, 6, 'Verbal Reasoning', '<b>Instructions: <br/>\r\nin each of the following questions are three sentences, read them carefully and decide which one should come first, second and which third.<br/>\r\nEXAMPLE:<br/>\r\n                   1.    I bought a book<br/>\r\n                   2.    I went to the school<br/>\r\n                    3.   My father gave me some money at home<br/>\r\n                a.1,2,3   b.3,2,1   c.3,1,2  d.2,1,3  e.3,2,1<br/>\r\n           The correct answer is E that is  <br/>\r\n1.	My father gave me some money at home<br/>\r\n2.	I went to the school<br/>\r\n3.	I bought a book<br/>\r\nNow answer question 6 to 10</b><br/><br/>\r\n\r\n1.    He was angry with the dog 2.    The dog bit his sister	3.   He beat the dog with a stick', '1,2,3', '3,2,1', '3,1,2', '2,1,3', '2,3,1', ''),
(115, 7, 'Verbal Reasoning', '1. Our canoe hit the rock 	2.   We were rescued by a fisherman 	3.    The current was very swift', '2,1,3', '3,1,2', '3,2,1', '1,3,2', '2,3,1', ''),
(116, 8, 'Verbal Reasoning', '1.  Thieves went to his house 	2. There was a rich man 	3.  They were wounded by his dogs', '1,2,3', '2,3,1', '3,1,2', '3,2,1', '2,1,3', ''),
(117, 9, 'Verbal Reasoning', '1. Uwadi lent Ada five naira	2.  Ada wanted to go home but she had no money 	3.  Ada was sent out of school for her school uniform.', '3,2,1', '1,2,3', '3,1,2', '2,1,3', '2,3,1', ''),
(118, 10, 'Verbal Reasoning', '1.   Didn’t you see how he abandoned his children?	2.   Is that what you think of him? 	3.   Their father was very wicked.', '1,3,2', '2,1,3', '3,2,1', '3,1,2', '1,2,3', ''),
(119, 11, 'Verbal Reasoning', '\r\n\r\n<b>INSTRUCTIONS: <br/>\r\nIn each of the following questions one or more words are missing. Choose from the words or groups of words lettered A to E the one that most suitably fills the space. An example is given below:<br/>\r\n\r\nEXAMPLE:  Ship and harbour,  train and __________.<br/>\r\na.Rain  b.   Passengers  c.  Goods  d.  Coaches  e.   station<br/>\r\n\r\nThe missing word is ‘station’ which is lettered E. We would therefore shade space ‘E’.<br/>\r\nNow answer questions 11 to 15\r\n</b><br/><br/>\r\nTongue and taste, Ear and __________.     \r\n', 'Hear', 'Eat', 'Smell', 'Talk', 'feel', ''),
(120, 12, 'Verbal Reasoning', 'Narrow and wide, smooth and _______.  \r', 'Straight', 'Rough', 'Sharp', 'Long', 'round\r', ''),
(121, 13, 'Verbal Reasoning', 'Rice and grain, coffee and _________\r', 'Sugar', 'Milk', 'Pot', 'Tea', 'beverage\r', ''),
(122, 14, 'Verbal Reasoning', 'Tapper and wine, fisherman and _______  \r', 'Net', 'Paddle', 'Fish', 'Canoe', 'sea\r', ''),
(123, 15, 'Verbal Reasoning', 'Sea and blue, grass and _______  \r', 'Garden', 'Snake', 'Burn', 'Hay', 'green', ''),
(124, 16, 'Verbal Reasoning', '<b>INSTRUCTIONS:  <br/>\r\nIn each of the following questions pick out the word that does not belong to the group.<br/>\r\nEXAMPLE:   a.  Orange   b.  Mango   c.   Apple   d.  Cassava   e.   pawpaw<br/>\r\nThe word ‘cassava’ does not belong to the group. We therefore shade answer D<br/>\r\nNow answer questions 16 to 20</b><br/><br/>', 'Run', 'Skip', 'Shout', 'Walk', 'jump\r', ''),
(125, 17, 'Verbal Reasoning', '    \r', 'Den', 'House', 'Hut', 'Hole', 'path\r', ''),
(126, 18, 'Verbal Reasoning', ' ', 'Car', 'Boat', 'Ship', 'Raft', 'canoe\r', ''),
(127, 19, 'Verbal Reasoning', '        ', 'Lake', 'Ocean', 'Forest', 'River', 'stream\r', ''),
(128, 20, 'Verbal Reasoning', '            ', 'Small', 'Big', 'Huge', 'Tiny', 'fast', ''),
(130, 21, 'Verbal Reasoning', '<b>INSTRUCTIONS:  In each of the following questions, choose the one word that cannot be formed by an arrangement of some or all of the letters printed in capital letter more often than, it appears in  the word printed in capital letters.<br/>\r\n\r\nEXAMPLE: WEAR   a.  Were   b.   Are   c.   Raw   d.   War    e.   ware<br/>\r\nThe word that cannot be formed by an arrangement of some or all of the letters of the word WEAR is “were”. We would therefore shade answer space A. Note that B, C, D nad E are not correct because they can be formed by the letters in the word WEAR<br/>\r\nNow answer questions 21 – 25</b><br/><br/>\r\nTERMINATE   \r\n', 'Termite', 'Term', 'Tenth', 'Ate', 'remit\r', ''),
(131, 22, 'Verbal Reasoning', 'ENDANGER  \r', 'Anger', 'Derange', 'Dagger', 'Danger', 'garden\r', ''),
(132, 23, 'Verbal Reasoning', 'GENERATION  \r', 'Enter', 'Nation', 'Region', 'Enrage', 'ranger\r', ''),
(133, 24, 'Verbal Reasoning', 'MINISTER   \r', 'Star', 'Mine', 'Mist', 'Set', 'met\r', ''),
(134, 25, 'Verbal Reasoning', 'REGULATE    \r', 'Late', 'Eat', 'Regular', 'Reel', 'later', ''),
(136, 26, 'Verbal Reasoning', '\r\n<b>INSTRUCTIONS:  In each of the following questions there two incomplete words. Choose the letter from those labelled A to E that can complete the first word and begin the second<br/>\r\nAn example is given below:<br/>\r\nKn(    ) ck<br/>\r\n      l\r\n     d    (a.)  U  b.  i   c.  a  d.  e  e.   o<br/>\r\nThe correct letter is ‘o’   because ‘o’ completes the first word, ‘knock’ nad begins the second ‘old’. We would therefore shade answer space E\r\nNow answer questions 26 to 30</b><br/><br/>\r\nthir(   )oor   \r\n', 'f', 'm', 'k', 't', 'd\r', ''),
(137, 27, 'Verbal Reasoning', 'pin (    )ite\r', 'e', 'j', 'k', 'h', 'm\r', ''),
(139, 28, 'Verbal Reasoning', 'mea (   )aet \r', 'n', 'i', 'm', 'd', 's\r', ''),
(140, 29, 'Verbal Reasoning', 'was (   )int  \r', 't', 'p', 'k', 'l', 'b\r', ''),
(141, 30, 'Verbal Reasoning', 'goa(   )oad  \r', 'd', 'b', 't', 'f', '\r', ''),
(142, 31, 'Verbal Reasoning', '<b>INSTRUCTIONS<br/>\r\nThe words below are written in code. Study each word and its code carefully and work out how the code is written.<br/>\r\nAn example is given below.<br/>\r\nCOME is written as OCEM<br/>\r\nWATER is written as AWETR<br/>\r\nKETTLE is written as EKTTTEL<br/>\r\nMET is written as EMT<br/>\r\nUse the code to answer questions 31 to 35.</b><br/><br/>\r\n\r\nHow would the word KICKED be written in the code?\r\n', 'CKIDEK', 'IKKCDE', 'DEKCIK', 'IKCKED', 'EDKCKI\r', ''),
(143, 32, 'Verbal Reasoning', 'What does the code word ECLI represent?\r', 'LICE', 'CEIL', 'LESS', 'CELL', 'LIES\r', ''),
(144, 33, 'Verbal Reasoning', 'How would the word FENCE be written in code?\r', 'ENFCE', 'FNECE', 'ECFNE', 'EFCNE', 'NEFCE\r', ''),
(145, 34, 'Verbal Reasoning', 'What word does the code IFRBE represents?\r', 'FIRES', 'BIER', 'BRIEF', 'RIFLE', 'FIBRE\r', ''),
(147, 35, 'Verbal Reasoning', 'How would the word STUFF be written in the code?\r', 'UFSTF', 'TSUFF', 'SUTFF', 'TSFUF', 'FUFST', ''),
(148, 36, 'Verbal Reasoning', '<b>INSTRUCTIONS:  In each of the following questions, you are given a sentence. Read the sentence carefully and decide how true it is.<br/>\r\nSHADE A if it is ALWAYS true<br/>\r\nSHADE B if it is OFTEN true<br/>\r\nSHADE C if it is NEVER true<br/>\r\nSHADE D if it is IMPOSSIBLE to say how true it is.<br/>\r\nExample:<br/>\r\nI  Fire is hot<br/>\r\nThe answer is A because it is always true.<br/>\r\n<br/>\r\nNow answer question 36-49\r\n</b><br/><br/>\r\n\r\nThe mood shines only in the villages \r\n', 'ALWAYS true', 'OFTEn true', 'NEVER true', 'IMPOSSIBLE to say how true it is\r', '', ''),
(149, 37, 'Verbal Reasoning', 'Twins look alike.\r', 'ALWAYS true', 'OFTEn true', 'NEVER true', 'IMPOSSIBLE to say how true it is\r', '', ''),
(150, 38, 'Verbal Reasoning', 'An aeroplane travels faster than a ship.\r', 'ALWAYS true', 'OFTEn true', 'NEVER true', 'IMPOSSIBLE to say how true it is\r', '', ''),
(151, 39, 'Verbal Reasoning', 'February is the longest month in the year.\r', 'ALWAYS true', 'OFTEn true', 'NEVER true', 'IMPOSSIBLE to say how true it is\r', '', ''),
(152, 40, 'Verbal Reasoning', 'Children who are afraid of drugs always take ill.\r', 'ALWAYS true', 'OFTEn true', 'NEVER true', 'IMPOSSIBLE to say how true it is', '', ''),
(153, 41, 'Verbal Reasoning', '<b>Instructions:<br/>\r\nEach of thee following questions consist of five words lettered A to E. One of the words is a general term which describes what the other four words are. Shade the answer space with the same letter as the general term. An example is given below.<br/>\r\nCrocodile   b. lizard c. snake d. alligator e. reptile<br/>\r\nThe general term is reptile, lettered E, which describes what the others are. We would therefore shade answer answer space E.<br/>\r\n<br/>\r\nNow answer the questions 41-45.</b><br/><br/>', 'screwdriver', 'plier', 'tool', 'spanner', 'hammer.\r', ''),
(154, 42, 'Verbal Reasoning', '', 'Cricket', 'football', 'chess', 'table tennis', 'game\r', ''),
(155, 43, 'Verbal Reasoning', '', 'rice', 'maize', 'wheat', 'beans', 'cereals\r', ''),
(157, 44, 'Verbal Reasoning', '', 'clothe', 'shirts', 'clothes singlets', 'trousers', 'coats\r', ''),
(158, 45, 'Verbal Reasoning', '  ', 'lorry', 'car', 'truck', 'vehicle', 'bus.', ''),
(159, 46, 'Verbal Reasoning', '\r\n<b>Instructions: <br/>\r\nIn each of the question 46 -50 you are given a word. Below the question is a list of four words lettered A to D. <br/>\r\nDecide which of these words lettered A to D can be paired with the word in each question. <br/>\r\nIf the word in each question cannot be paired wit any of the words letter A to D, shade answer space E on your answer sheet.</b><br/><br/>\r\nfish\r\n', 'nest', 'disease', 'pond', 'entertainment', 'students\r', ''),
(160, 47, 'Verbal Reasoning', 'Theatre\r', 'nest', 'disease', 'pond', 'entertainment', 'students\r', ''),
(161, 48, 'Verbal Reasoning', 'Epidemics\r', 'nest', 'disease', 'pond', 'entertainment', 'students\r', ''),
(162, 49, 'Verbal Reasoning', 'Bird\r', 'nest', 'disease', 'pond', 'entertainment', 'students\r', ''),
(163, 50, 'Verbal Reasoning', 'Teachers\r', 'nest', 'disease', 'pond', 'entertainment', 'students', ''),
(164, 1, 'English', '<b>Read the following passage carefully and answer the questions that follow</b><br/><br/>\r\n\r\nOnce upon a time a man called contentment lived in a town. He was brought up by his parents under very strict discipline. He was taught to be honest in all his ways and at all times. His upbringing had a great influence on his life. When he was in school he was always different from others. He was especially noted for telling the truth.<br/>\r\nOne day, one of his friends Ailegbe stole a book in the class and he told contentment not to tell anyone that he was the thief when the teacher asked who the thief was, to the surprise of Ailegbe, contentment told him that it was Ailegbe. And so Ailegbe got the beating of his life. From that day on, Ailegbe developed hatred for contentment. However, contentment would not be bothered. He continued living on honest life.<br/>\r\nOne day he found a handsome sum of money in a very big bag under a overhead bridge. One of his friends who were accompanying him jumped for joy, for he thought the money was more than sufficient to terminate poverty out of their lives. Contrary to his expectation, contentment decided to take the bag of money to the police station so that the owner could be located and given back his money. This action drew the anger of his friend who regarded him as a foolish, stupid that would remain in poverty for life.<br/>\r\nThe police officer he met at the station commended contentment and took down his particulars. An announcement was made and the owner of the money who was a big industrialist showed contentment be brought to him. The industrialist then decided to employ contentment who was by then looking for a job. The industrialist also gave him a new car and a beautiful house to live.<br/><br/>\r\n\r\n\r\nHow did contentment learn to be honest? \r\n', 'from his friends', 'from his school mates', 'through his parents upbringing', 'he was taught in the school\r', '', ''),
(165, 2, 'English', 'What was contentment known for in his school. \r', 'telling the truth', 'hard work', 'being studious', '  being humble\r', '', ''),
(166, 3, 'English', 'Ailegbe got the beating of his llife. This means Ailegbe ______________________. \r', 'was beaten mercilessly', 'was beaten for life', 'receive a few stroker of the cane', 'exchange beating for his life\r', '', ''),
(167, 4, 'English', 'Contentment found a handsome. Some money means _____________.\r', 'the money he found looked handsome', 'He found a very huge sum of money', 'He was handsome when he found the money', 'The bag containing the money was quite handsome\r', '', ''),
(168, 5, 'English', 'A suitable title for the passage is ____________________.\r', 'It pays to be honest', 'Contentment’s friends', 'A handsome sum of money', 'Contentment as a school boy\r', '', ''),
(169, 6, 'English', '<b><u>SECTION  II</u></b><br/>\r\nFrom the list of words given below each sentence, Choose the one that is most nearly opposite in meaning to the underlined word or expression in each sentence.</b><br/><br/>\r\n\r\n\r\nHe saw some <u>ancient</u> carvings at the museum in Lagos.  \r\n', 'recent', 'old', 'modern', 'past', 'frequent \r', ''),
(170, 7, 'English', 'The doctor is very <u>generous</u> but his wife is extermely. \r\n', 'talented', 'courteous', 'mean', 'surly', 'mioderate\r', ''),
(172, 8, 'English', 'The party leader is considered by many to be a <u>patriot</u>.  \r', 'nationalist', 'stooge', 'patron', 'rebel', 'rascal ', ''),
(173, 9, 'English', 'There was <u>scarcity</u> of mangoes in the market yesterday. \r', 'accumulation', 'effusion', 'affluence', 'increase', 'abundance\r', ''),
(174, 10, 'English', 'The job was given to an <u>interior</u> decorator.  \r', 'external', 'exterior', 'known', 'expensive', 'experienced\r', ''),
(175, 11, 'English', '<b>Choose correct option that most correctly explains the meaning of the underlined idiom in each sentence.</b><br/><br/>\r\n\r\nBrother Tunde led sister Lola to the altar last September. This means ______________. \r\n', 'Brother Tunde & sister Lola  preached on the altar', 'Sister Lola was interpreting for brother Tunde on the altar', 'Brother Tunde married sister Lola', 'Brother Tunde fought sister Lola on the altar.\r', '', ''),
(176, 12, 'English', 'Our great grandfather gave up the ghost last year. This means our great grandfather ______________________. \r', 'fought with ghost', 'was a ghost before he died', 'chassed out a ghost from our house', 'died\r', '', ''),
(177, 13, 'English', 'Ajoke was always puts the cart before the horse. This means Ajoke _____________________.\r', 'is disorderly', 'carries the cart before the horse', 'puts carts on the horse', 'can run very fast like a horse\r', '', ''),
(178, 14, 'English', 'When the man was asked to state his case, he started to beat about the bush.\r', 'started clearing the bush', 'told a story about the bush', 'failed to go straight to the point', 'went about the bush\r', '', ''),
(179, 15, 'English', 'Sometimes, people with very important jobs have to work round the clock. \r', 'they work very smartly and quickly just like a clock', 'they work all day and night without stopping or resting', 'they work perfectly as soon as they are faced with a job', 'they do not get tired no matter how much work they do\r', '', ''),
(180, 16, 'English', '<b>Choose the correct reported speech of the following.</b><br/><br/>\r\n\r\nJohn said to Mary “I can write very well”. \r\n', 'John told Mary he could write very well', 'John told Mary she could write very well', 'John asked if she could read very well', 'John told that she could not write well.\r', '', ''),
(181, 17, 'English', '“Is the teacher coming?” asked Phillip.\r', 'Phillip asked if the teacher will come', 'Phillip asked if the teacher has come', 'Phillip wanted to know if the teacher was coming', 'Phillip asked if the teacher will not come\r', '', ''),
(182, 18, 'English', 'Mariam said to John, “Don’t copy my work”. \r', 'Mariam told John not to copy his work', 'Mariam told John not to copy her work', 'Mariam told John don’t copy my work', 'Mariam told John don’t copy her work\r', '', ''),
(183, 19, 'English', 'The old man asked Kate, “ Has my wife been here?”.\r', 'The old man asked Kate if his wife had been here', 'The old man asked Kate if his wife has been here', 'The old man asked Kate has my wife been here', 'The old man wanted to know where his wife is.\r', '', ''),
(184, 20, 'English', 'Yesterday, my friend asked me, “ Are you hungry?”.\r', 'Yesterday my friend asked me that am I hungry', 'Yesterday my friend asked me if I am hungry', 'Yesterday my friend asked me “ if I was hungry”', 'Yesterday my friend asked if I was hungry.\r', '', ''),
(185, 21, 'English', '<b>Fill the following with correct similes.</b><br/><br/>\r\n\r\nWhen James left the hospital, he was as thin as __________. \r\n', 'rake', 'monkey', 'door post', 'cock.\r', '', ''),
(186, 22, 'English', 'Her gown is as green as ___________\r', 'grass', 'indigo', 'coal', 'rose\r', '', ''),
(187, 23, 'English', 'The xmas cake are as hard as ____________.\r', 'bread', 'iron', 'water', 'monkey.\r', '', ''),
(188, 24, 'English', 'Her face is as white as _____________. \r', 'peacock', 'wool', 'snow', 'glass\r', '', ''),
(189, 25, 'English', 'The river is as clear as ____________. \r', 'cucumber', 'fox', 'dirt', 'crystal.\r', '', ''),
(190, 26, 'English', '<b>Choose the synonyms of no 26 – 28 and antonyms of no 29 – 30.</b><br/><br/>\r\n\r\nThe boy <u>escaped</u> punishment by pretending to be sick.\r\n', 'got', 'accepted', 'avoided', 'refuse', '', ''),
(192, 27, 'English', 'The instruction were read <u>over and over again</u>.\r', 'repeatedly', 'loudly', 'anxiously', 'continuously.', '', ''),
(193, 28, 'English', 'Sola, please<u>look after</u> your bother while am away. \r', 'understand', 'eat with', 'punish', 'take care of', '', ''),
(194, 29, 'English', 'Her friend is the<u>prettiest</u> of the three. \r', 'fattest', 'loveliest', 'quickest', 'ugliest.', '', ''),
(195, 30, 'English', 'The boy <u>quietly</u> entered the classroom.\r', 'smartly', 'noisily', 'collectively', 'jointly.', '', ''),
(196, 31, 'English', '<b>From the list of words given below each sentence, Choose the one that is most nearly opposite in meaning to the underlined word or expression in each sentence.</b><br/><br/>\r\n\r\nHe saw some <u>ancient</u> carvings at the museum in Lagos. \r\n', 'recent', 'old', 'modern', 'past', 'frequent ', ''),
(197, 32, 'English', 'The doctor is very <u>generous</u>  but his wife is extermely.\r', 'talented', 'courteous', 'mean', 'surly', 'mioderate \r', ''),
(198, 33, 'English', 'The party leader is considered by many to be a <u>patriot</u>.\r', 'nationalist', 'stooge', 'patron', 'rebel', 'rascal \r', ''),
(199, 34, 'English', 'There was <u>scarcity</u> of mangoes in the market yesterday.\r', 'accumulation', 'effusion', 'affluence', 'increase', 'abundance \r', ''),
(200, 35, 'English', 'The job was given to an<u> interior</u> decorator.\r', 'external', 'exterior', 'known', 'expensive', 'experienced  .\r', ''),
(201, 36, 'English', 'The whole room looks <u>filthy</u> and stuffy.\r', 'attractive', 'clear', 'clean', 'dirty', 'fairly good \r', ''),
(203, 37, 'English', 'Hawking along our roads these days is<u> prohibited.</u>\r', 'forbidden', 'unfair', 'alllowed', 'free', 'bad .\r', ''),
(204, 38, 'English', 'They have always had<u> enough</u> food to eat.\r', 'adequate', 'plenty', 'plentiful', 'a lot of', 'insufficient \r', ''),
(205, 39, 'English', 'The newly appointed Class Captain has <u>rejected</u> the post.\r', 'dismissed', 'denied', 'abandoned', 'accepted', 'released .\r', ''),
(206, 40, 'English', 'My <u>predecessor</u> did good a job here.\r', 'competitor', 'rival', 'successor', 'opponent', 'friend .', ''),
(208, 41, 'English', '<b>Choose from A --  E  the word that is nearest in meaning to the underlined word or expression in each sentence</b><br/><br/>\r\n\r\nDrug taking should be <u>banned</u> in Nigeria.\r\n', 'punished', 'allowed', 'encouraged', 'prohibited', 'controlled .\r', ''),
(209, 42, 'English', 'We have to weigh the <u>options</u> that are made available to us.   \r\n', 'baskets', 'choices', 'rewards', 'burdens', 'policies  \r', ''),
(210, 51, 'English', 'Which of the following is a noun?\r', 'name', 'Sola', 'thing', 'animal', 'place', ''),
(213, 0, 'Social Studies', 'Jesus is Lord Over my________________', 'life', 'office', 'shop', 'Job', 'home', 'a'),
(214, 0, 'Social Studies', 'I am a Living ___________________', 'mind', 'body', 'image', 'soul', 'spirit', 'd'),
(215, 0, 'Social Studies', 'Oluwadamilare is a ________________', 'name', 'boy', 'girl', 'both', 'none', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `sms_tracker`
--

CREATE TABLE IF NOT EXISTS `sms_tracker` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sms_tracker`
--

INSERT INTO `sms_tracker` (`id`, `phone_number`, `message`, `status`, `date`, `timestamp`) VALUES
(1, '2348169013692', 'Your child Damisa Gurus has been successfully registered for a CBT exam. Username is==>damisa Exam code is ==>63314', 'Message Sent', 'April,2,2014, 9:37am', 1396427871),
(2, '2348169013692', 'Your child <strong>Damisa</strong> <strong>Gurus</strong> has been successfully registered for a CBT exam. Username is==><strong>damisa</strong> Exam code is ==><strong>9301</strong>', 'Message Sent', 'April,2,2014, 9:39am', 1396427999);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `exam_code` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `othername` varchar(100) NOT NULL,
  `parent` varchar(100) NOT NULL,
  `English` varchar(100) NOT NULL,
  `Mathematics` varchar(100) NOT NULL,
  `Physics` varchar(100) NOT NULL,
  `Social Studies` varchar(100) NOT NULL,
  `Financial Accounting` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `exam_code`, `surname`, `firstname`, `othername`, `parent`, `English`, `Mathematics`, `Physics`, `Social Studies`, `Financial Accounting`) VALUES
(1, 'ojetunde', '82182', 'Ojetunde', 'John', 'Oluwadamilare', '08169013692', '', '10', '10', '', ''),
(2, 'wale', '47637', 'Wale', 'Ojekunl', 'Adelolu', '08027338405', '', '', '', '', ''),
(3, 'ojelade', '57496', 'Ojelade', 'Victor', 'Olusoji', '08027338405', '', '', '', '', ''),
(4, 'ojetunde', '38809', 'Ojetunde', 'Silas', 'Oluwafemi', '08033595176', '10', '20', '30', '25', ''),
(5, 'olaito', '27405', 'Olaito', 'Joshua', 'Olasupo', 'the lord is good', '', '', '', '', ''),
(11, 'akinsola ', '10784', 'Akinsola ', 'Saheed', 'T', '2.34817E+12', '', '', '', '', ''),
(12, 'ajilete fm', '66354', 'Ajilete fm', 'Jaison', 'O', '2.34817E+12', '', '', '', '', ''),
(13, 'siyanbola hammed', '34362', 'Siyanbola hammed', 'Brudal', 'L', '2.34817E+12', '', '', '', '', ''),
(14, 'bolatito', '39468', 'Bolatito', 'Sodiq', 'U', '2.34817E+12', '', '', '', '', ''),
(15, 'rodrack ', '44415', 'Rodrack ', 'Ibraheem', 'V', '2.34817E+12', '', '', '', '', ''),
(17, 'damisa', '9301', 'Damisa', 'Gurus', 'Ltd', '08169013692', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(255) NOT NULL,
  `hr` int(10) NOT NULL,
  `min` int(10) NOT NULL,
  `sec` int(10) NOT NULL,
  `quest_num` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_name`, `hr`, `min`, `sec`, `quest_num`) VALUES
(5, 'English', 1, 1, 2, 0),
(7, 'Mathematics', 2, 30, 0, 30),
(8, 'Physics', 1, 0, 0, 0),
(9, 'Social Studies', 1, 0, 0, 30),
(10, 'Financial Accounting', 1, 0, 0, 50);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
