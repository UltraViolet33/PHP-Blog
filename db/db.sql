-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour blog
CREATE DATABASE IF NOT EXISTS `blog` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `blog`;

-- Listage de la structure de la table blog. category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Listage des données de la table blog.category : ~6 rows (environ)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`) VALUES
	(3, 'Tempora distinctio.'),
	(4, 'Quibusdam.'),
	(5, 'Placeat.'),
	(6, 'Sit.'),
	(7, 'Sunt.'),
	(11, 'erer');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Listage de la structure de la table blog. post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- Listage des données de la table blog.post : ~49 rows (environ)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `name`, `content`, `created_at`) VALUES
	(2, 'Voluptatibus vitae.', 'Ut voluptatum molestias recusandae ducimus consequatur libero voluptatem. Velit dignissimos sunt dolor voluptatem vero sunt.\n\nCorporis culpa quia dignissimos et. Ab pariatur id dolor numquam sunt numquam atque numquam. Assumenda aspernatur aut cupiditate culpa maxime nesciunt sit. Rerum laborum quia sit ea. Et sed voluptatum voluptates et commodi.\n\nAut quas dolorum sapiente. Ut assumenda est ut incidunt illo. Veniam quisquam nam dolor sed numquam necessitatibus repudiandae delectus. Eveniet a et rerum sit impedit voluptas.\n\nProvident at nihil ducimus odio ipsum commodi. Iusto sed eius incidunt consequuntur vel praesentium. Reprehenderit et voluptatum et non qui.', '2009-03-08 11:55:25'),
	(3, 'Dolores est.', 'Molestiae alias quam placeat et. Voluptatum hic qui earum temporibus illo iste incidunt. Tenetur vel quo voluptas sed. Suscipit odio dolorum nisi. Et corporis consectetur perspiciatis animi qui id at praesentium.\n\nReiciendis sint et dolor nesciunt. Saepe dolorem minima et. In reiciendis similique rerum autem possimus sit. Sit odio esse rerum ut vero pariatur.\n\nExercitationem ex sit perferendis eveniet ad ad et voluptatem. Suscipit aut qui asperiores quia. Reiciendis qui hic sint.\n\nVoluptates non architecto exercitationem nihil quisquam ut. Iste itaque eum ducimus. Architecto quia dolore odit magni delectus nam maxime sed.', '1970-08-18 12:47:39'),
	(4, 'Non.', 'Nobis blanditiis nihil facere et asperiores molestiae ullam. Libero sit dolorem odio adipisci. Corporis saepe veniam sit dolor eligendi libero repellat.\n\nDolorum aspernatur est assumenda pariatur quibusdam. Cumque rerum qui doloribus beatae fugit porro alias.\n\nQuo necessitatibus quam possimus. Sint architecto eos unde vitae eum architecto nam.\n\nQuidem a tempora nobis corrupti doloremque corrupti. Quibusdam labore nobis sunt corporis mollitia aperiam. Iure doloremque enim laboriosam optio aut reprehenderit et. Ad est molestiae et eos nostrum aut.', '2017-12-21 17:56:58'),
	(5, 'Fuga totam.', 'Qui ipsa veniam accusamus facilis. Dolore optio temporibus dolorem quis consequatur suscipit aspernatur. Dolorem omnis eligendi eos.\n\nBlanditiis vitae qui et ut. Reprehenderit sit nobis qui quia alias. Numquam ad beatae sed optio eos aut voluptate.\n\nUt est omnis natus debitis ut. Debitis laboriosam sed omnis quis suscipit maxime soluta. Id ut nulla nulla soluta eum sapiente ipsa. Facere voluptate consequatur quisquam quibusdam voluptatem et sed.\n\nImpedit libero quia corrupti laudantium quis corporis dolores. Eum deleniti itaque id quaerat odit sit excepturi. Incidunt aut soluta dolores illo et error suscipit. Voluptatum nobis mollitia error maiores temporibus nam autem.', '1986-12-04 10:16:28'),
	(6, 'Pariatur.', 'Ullam excepturi non hic occaecati ea recusandae. Architecto aperiam dignissimos qui totam aut omnis. Autem in pariatur recusandae quod.\n\nMinima repellat excepturi vero recusandae. Fugit dolores cumque aliquid nihil qui accusantium veniam. Commodi dignissimos quas earum occaecati omnis quia.\n\nEst quibusdam fugit fugit similique alias. Et repellendus esse est provident iusto illo. Sint et quia voluptates ullam. Quis quo dolorem praesentium rerum aut.\n\nNecessitatibus esse nisi ipsa id. Qui at omnis repellat ut. Ut officia reiciendis libero cupiditate mollitia.', '1998-12-10 06:10:02'),
	(7, 'Velit temporibus.', 'Quam tempora eius est est eos aliquam et qui. Magni amet expedita voluptas. Beatae similique qui natus quia quidem ad iusto. Quia dolores eum voluptas recusandae quae.\n\nEt harum molestiae et minima amet. Nam rerum odit culpa impedit doloremque itaque omnis molestias. Magni qui doloremque sit quis ut repudiandae eligendi odio. Vero quis accusamus error aut temporibus. Eligendi alias accusamus veritatis et suscipit sit accusamus non.\n\nRepellendus a neque tempore blanditiis. Enim nihil est sit ipsum. Autem illo expedita nisi cum facere illum. Dolor nemo fuga corrupti ipsam praesentium consequatur. Esse est et rerum deleniti quis aut.\n\nFugiat laborum rerum est in. Exercitationem tempora accusamus quo fuga sed et. Quaerat at voluptas assumenda ratione quibusdam et quia architecto. Repellendus delectus corporis rerum fugiat rerum quos praesentium.', '1996-08-22 10:05:46'),
	(8, 'Commodi.', 'Inventore consequatur sapiente distinctio aliquam quis. Labore voluptates mollitia dignissimos reprehenderit consequatur est laboriosam. Officia consequatur expedita quod deleniti magnam.\n\nVoluptas labore vel autem sequi magni animi. Quasi architecto voluptate est architecto est omnis quam. Consectetur vel quia quia deserunt sint maxime. Hic nostrum voluptas qui veritatis velit in qui.\n\nEt et voluptas facere autem. Sint quia officiis ipsum perferendis magni sunt. Maxime id ab praesentium. Minima quae rerum ut est tempora quibusdam libero similique. Quia ducimus necessitatibus non ab voluptate sunt unde.\n\nSoluta error aspernatur vitae nihil labore amet. Dignissimos sint iste eum praesentium. Unde aliquam optio consectetur est unde.', '1992-05-12 14:56:57'),
	(9, 'Cum unde.', 'Reprehenderit qui cumque voluptatibus. Esse placeat doloremque ut quae dicta blanditiis rerum. Aliquam eaque rerum in laborum dolorem quia. Quas sit et architecto nisi.\n\nNemo mollitia iusto consequatur esse sit. Sint et possimus voluptatibus odit. Qui omnis repellendus omnis at aspernatur tempora.\n\nVoluptatem vel maxime quia aut. Animi alias vel enim soluta exercitationem iure pariatur. Dolorem autem ex deleniti dolor odio rerum voluptatibus.\n\nMaiores aut numquam eum quia quibusdam qui quis totam. Ab culpa quisquam in soluta eius et sint. Error quibusdam et nemo. Doloremque voluptatem eum quasi soluta.', '1991-02-17 01:13:04'),
	(10, 'Quaerat.', 'Soluta facere veniam suscipit adipisci dolore cum et quia. Temporibus ut sit non ad enim magnam officiis. Facere dolorum eos est doloremque accusamus eos eligendi.\n\nEarum est et eum est. Nostrum laborum reprehenderit consequuntur ea qui qui corporis. Sunt officia porro voluptas et enim repellat sint aut. Velit aut earum accusantium rerum.\n\nUt voluptas autem sapiente. Non quia quia placeat tenetur reprehenderit in. Qui voluptates harum fuga dolorem minus qui. Quam consequatur blanditiis eaque sint alias aut et.\n\nEst vero voluptates consequatur a natus qui. Enim incidunt occaecati aut unde debitis vel. Vero rerum dignissimos quas ratione odit consequatur. Non omnis autem et velit tempora quaerat.', '2003-03-12 19:27:19'),
	(11, 'Nemo itaque.', 'Voluptate consectetur est aspernatur velit in aperiam. Qui sint illo perspiciatis voluptates accusamus doloribus porro accusamus.\n\nEst est explicabo voluptatibus voluptates magni molestiae. Aut nesciunt laudantium nihil ducimus officiis sint sed voluptas. Blanditiis nemo beatae error sit. Reiciendis iste occaecati labore voluptates.\n\nOmnis laborum optio consequuntur magni sunt aliquid voluptas dolore. Itaque velit ut non est ullam ut nulla est. Ut placeat autem architecto libero quod quos sed.\n\nRerum sed rem porro sint. Voluptas facere totam ratione temporibus. Minima nihil ipsam sint iusto ut. Nesciunt eos eveniet quos.', '1974-07-27 02:34:32'),
	(12, 'Eos quidem.', 'Architecto in explicabo nihil facere labore velit et. In autem cum praesentium. Quia provident explicabo est perferendis. Recusandae provident fuga recusandae enim iure quod.\n\nMaxime deleniti praesentium et et voluptas et qui. Asperiores voluptas et consequatur fuga quia accusamus. Consequatur quos dolores assumenda id.\n\nQuia porro necessitatibus sed quis error quae. Laudantium totam neque sint omnis. Minus consequatur quasi quibusdam nihil ullam. Necessitatibus et qui minus a voluptas doloribus.\n\nRem atque non nam natus similique. Est velit voluptatum aut quas iste iusto repellendus in. Iste consequatur molestiae a nam. Id mollitia autem quia.', '1974-09-25 03:37:42'),
	(13, 'Ad dolorum.', 'Iusto sed est perferendis maxime veniam nesciunt. Perferendis ut est voluptatem temporibus id nobis est. Quo molestiae sequi incidunt laudantium. Aut doloribus veniam provident aliquam.\n\nVoluptatem cupiditate voluptatibus qui velit maiores aut. Distinctio libero non voluptas quia voluptas. In excepturi ratione sed molestiae expedita harum eveniet.\n\nUllam suscipit velit reprehenderit ducimus debitis ab. Molestias ea est sint. Et quisquam sit et ad ut excepturi consequatur. Nulla aperiam suscipit minima omnis itaque eum vel.\n\nOptio voluptatum at aut corporis sed qui quia. Blanditiis aliquam sed ducimus qui pariatur. Non temporibus vero ut reprehenderit atque quis a. Reprehenderit labore numquam veritatis quisquam voluptatem possimus. Omnis numquam possimus et blanditiis voluptatem in omnis mollitia.', '1980-10-16 11:24:13'),
	(14, 'Cum inventore.', 'Omnis est aut vel corporis exercitationem quia. Molestiae voluptatem sed modi error. Nihil tempora vitae neque velit id et.\n\nNostrum optio commodi nisi itaque. Ex ratione id nihil voluptatem. Ipsam porro quae qui quam harum nihil. Dolor excepturi ipsum odit magni repudiandae voluptatem iure.\n\nCumque aut labore architecto aperiam quo ut et. Quam facere nobis magnam eos. Hic error sunt at inventore qui.\n\nOfficia ut sit esse id atque possimus. Rerum doloribus qui quia voluptas. Et vel quia qui labore quidem eum quidem.', '1995-03-02 02:13:41'),
	(15, 'Unde amet.', 'Sunt tempore est fugiat veniam. Dolorum perspiciatis dicta non cumque dolorum ut. Dignissimos et saepe aliquid consequatur. Reiciendis laudantium aliquid dolorem ut sunt pariatur.\n\nEt explicabo quaerat minima numquam. Ut aliquid et necessitatibus et corporis adipisci. Eligendi perspiciatis repudiandae ab distinctio magni. Cum rem beatae maiores veritatis qui doloribus.\n\nConsectetur natus dolore ea hic laudantium. Voluptas soluta voluptates natus est minus. Veritatis vitae aspernatur molestias cupiditate. Ea rem sit repellendus.\n\nPerferendis repudiandae dolorum aliquam. Magni corrupti quam qui eveniet est. Reiciendis quidem similique similique natus dicta accusamus sit. Est est aut natus sapiente asperiores mollitia ut.', '1979-12-09 06:24:04'),
	(16, 'Optio.', 'Et quia ratione ea tempora. Similique ipsam error architecto autem dolores dolore veniam. Molestiae aliquid quis accusantium.\n\nMaiores placeat quis voluptas beatae repellendus. Inventore culpa totam corrupti et autem vitae. Provident labore dolorum qui in explicabo rem. Eaque sunt vel quos quo facilis quis qui. Rerum error nostrum rerum repellendus sunt architecto voluptatem.\n\nEa quae qui soluta hic aperiam ipsam. Enim quia recusandae minus aliquam esse deleniti necessitatibus sed. Corrupti et eos deserunt dolores. Sit voluptatibus quaerat vel quia est similique est.\n\nEst ducimus eum iure voluptates deserunt sequi. Quia esse voluptas dolorem cupiditate amet autem porro optio. Cupiditate illum vel eaque. Omnis ducimus aut eius nihil eius explicabo odit.', '1973-07-17 10:22:08'),
	(17, 'Animi labore.', 'Rem in et omnis at quae quia. Esse libero aliquid autem deleniti et nesciunt ut.\n\nSequi consequuntur voluptatem eveniet molestiae quis quis. Pariatur perferendis sit voluptatem et eius magnam omnis quae. Natus deserunt asperiores doloremque recusandae.\n\nFacilis sint itaque et ut. Totam aut ea consequatur non. Quam dicta quibusdam consequuntur neque tempora quas eligendi. Veniam sit possimus culpa qui blanditiis.\n\nAliquam qui laboriosam error repellat tenetur. Eos amet omnis aliquam aliquid deleniti. Omnis nisi molestiae ipsam reiciendis qui.', '2015-01-31 15:56:39'),
	(18, 'Sit blanditiis.', 'A quam nihil sit consequatur non perspiciatis ut officia. Temporibus beatae ut non architecto reiciendis rerum. Laboriosam rerum rerum adipisci et cum sunt optio.\n\nOfficiis delectus sunt et quae est et. Adipisci quos exercitationem dolorem quibusdam in. Fuga reprehenderit labore dignissimos nulla et ea.\n\nIpsa voluptas sit tempora aliquam. Eaque vero consequatur qui voluptas sit nisi asperiores qui. Optio praesentium fugiat quia quia ab aliquam. Et velit est ut velit non voluptatem quaerat laudantium.\n\nOccaecati nihil et molestiae rem est. Quod suscipit aut cum autem. Cumque tempore qui iure est vero ipsam quo at. Iste vel ullam quod dicta et ipsum dolor.', '2022-04-05 13:59:58'),
	(19, 'Rerum.', 'Ut voluptates rerum itaque consectetur repudiandae. Nostrum quis et ut sed. Quidem amet animi perspiciatis ab quis rerum aut. Non repellendus nihil autem est autem possimus. Quia repellendus quod quas quo voluptatem.\n\nDolor non delectus vel et perspiciatis sunt. Exercitationem corrupti ut ullam asperiores facilis doloremque. Magnam itaque quibusdam ipsa sunt voluptates doloribus.\n\nVelit vitae inventore odit cum quis nostrum velit. Est vel eos quidem debitis doloremque rerum sapiente. Qui dolores molestiae possimus. Error et aperiam illo et eum.\n\nQuis libero voluptas magnam. Quia vitae minus voluptate asperiores mollitia illum. Illum eveniet rerum enim ut.', '1993-03-31 00:49:20'),
	(20, 'Praesentium.', 'Minus quaerat rerum eos omnis ab eveniet. Velit sunt saepe voluptatum harum et provident. Eos est similique accusamus adipisci. Magni quis necessitatibus at tempore est quia ipsam. Doloremque omnis expedita magni animi commodi.\n\nNihil et et illo eum non voluptas vel. Est error non hic. Iste doloremque vitae rerum dignissimos.\n\nQui doloremque amet et. Quo non ea dolores quae odit ex. Aut tempora quisquam temporibus voluptatem rerum facere laudantium. Quas voluptas voluptatibus consequatur maiores ex deleniti. Aut sit rerum veniam totam itaque porro.\n\nUt repellendus quisquam laboriosam pariatur aut hic et. Dicta nihil in alias unde odit non dolores. Eum autem dolorum sed. Iure repudiandae omnis rerum aut enim eos doloremque.', '1984-12-20 16:11:22'),
	(21, 'Iusto officiis.', 'Similique veniam pariatur autem culpa. Necessitatibus voluptatem odit in qui. Ipsa modi sed dolorum similique. Iure enim aut quo fugit natus harum.\n\nMolestias et sit iusto quam. Est veniam qui aut voluptatem.\n\nCumque aliquam enim in modi excepturi eaque. Consequuntur repellat dolorum dolores sint iusto. Est enim fugiat laboriosam error non consequuntur illum.\n\nUt non porro excepturi occaecati. Non consequatur error totam. Dolor dicta totam vero aut magni voluptas. Cum similique ut rerum numquam doloribus.', '1978-12-13 23:55:56'),
	(22, 'Quae repellat.', 'Eum nostrum deleniti quam rerum repudiandae. Quibusdam aliquid et sapiente culpa voluptatum cupiditate minima. Suscipit facilis non in autem.\n\nEa molestias aut libero placeat quis hic neque. Est delectus iste quasi ut enim. Inventore dicta corporis ut voluptatem. Repellendus enim nam modi est dolore et.\n\nQui voluptates magnam harum porro debitis. Debitis enim sint nesciunt. Rerum aut officia animi odio occaecati facere.\n\nSed est necessitatibus perspiciatis. Nesciunt nesciunt et quos eligendi cupiditate laboriosam. Omnis vel occaecati ab quaerat adipisci qui.', '1973-03-27 14:04:30'),
	(23, 'Aut.', 'Totam repellendus eaque cum pariatur at numquam excepturi. Non maxime tempore incidunt quae.\n\nEst quas molestiae aut soluta eius molestiae. Deleniti laudantium sed ex explicabo quo eos. Laboriosam molestiae magnam error animi error. Nisi tenetur optio iusto totam alias.\n\nDolores modi non possimus. Labore provident qui est nihil omnis. Et facilis aut pariatur qui similique illo vel. Itaque voluptas voluptates voluptatem quia sit.\n\nReiciendis et commodi quidem suscipit ea id. Enim explicabo deserunt ut nemo voluptas et. Aliquam nemo sed non.', '2015-09-28 11:20:40'),
	(24, 'Sapiente aliquam.', 'Sed voluptate sed aut distinctio omnis rerum consequatur. Rerum quasi omnis dolorum eius aliquid. Vero odit quis et maiores autem. Occaecati adipisci qui laudantium numquam.\n\nUt sit qui eligendi rerum vel sint. Facere et aut nam recusandae adipisci. Quis eos voluptates est soluta.\n\nAmet repellendus repellat magnam velit. Assumenda suscipit ab aliquid quos sequi ab. At expedita ut quo enim molestiae. Iusto labore iure debitis fugiat.\n\nDeserunt numquam aspernatur ut ea. Rem odio atque omnis dolores quis quo. Quae ratione quia voluptatem voluptatibus dolore voluptatem. Accusantium et delectus enim nemo.', '2008-05-19 03:40:29'),
	(25, 'Ea.', 'Tempore qui laboriosam hic veniam nisi facilis minus et. Molestiae adipisci rem enim. Iusto quam autem dolor qui nobis ipsum optio consequuntur. Pariatur quod magni id quibusdam unde sunt.\n\nNulla eos commodi velit ex sunt minima. Reiciendis modi aliquam sit omnis cupiditate nihil. Esse quis et recusandae voluptas voluptas sed quis. Aspernatur nostrum adipisci officiis.\n\nIusto omnis quis dolorem commodi sit placeat consequatur quo. Rerum sint perferendis veritatis et ab dicta veniam. Tempore numquam assumenda quibusdam.\n\nVeritatis eveniet vel nihil saepe. Omnis sit iure non hic. Consequatur et porro et dolor culpa fuga. Corrupti aut aut tenetur sequi.', '1977-02-07 09:48:08'),
	(26, 'Et ut.', 'Consequatur rerum laudantium harum tenetur quidem ut. Reiciendis sequi suscipit dignissimos voluptas dolorem animi. Porro magni nisi qui aut illum totam. Quis ad temporibus dolore accusamus soluta aut dolorem qui.\n\nDolorum qui tempora velit in pariatur blanditiis non earum. Facilis reiciendis ut earum quo doloribus et. Enim explicabo officia et voluptatem vel cumque.\n\nDolorum ea rem non itaque. Necessitatibus et non ipsam. Maxime sed libero magnam. Consectetur magnam veniam ut molestiae recusandae officiis excepturi eum. Cumque minima dolor esse autem ea.\n\nEum minus consequatur quidem quia incidunt amet repellat. Quia molestias fugit nesciunt sit. Et deleniti occaecati qui voluptatibus repellendus cupiditate voluptatem. Aut ex sed sunt est itaque.', '2008-02-29 21:31:24'),
	(27, 'A laboriosam.', 'Nemo iusto facere sapiente alias quo non quis. Ducimus nesciunt adipisci illo eum. Rerum explicabo dolor est maiores odit. Culpa nesciunt illum odit rerum.\n\nMaxime tenetur perspiciatis excepturi quia. Quae atque aspernatur et similique alias pariatur. Et nihil saepe modi veniam doloremque fugit. Reprehenderit sed quam quia repudiandae nihil.\n\nAliquid illum et sit placeat eius velit excepturi. Et quia quisquam quia voluptatem sit. Reiciendis eius ea accusantium nobis repellendus repudiandae iste eius. Qui aut dolor facilis vero rerum recusandae quisquam.\n\nAccusantium reiciendis sunt dolor et suscipit minima. Rerum aut autem nihil. Quod atque et ex sed quidem porro.', '1995-08-18 21:30:38'),
	(28, 'Aut quia.', 'Omnis pariatur mollitia temporibus qui consequatur ratione. Rerum quibusdam modi sunt ea aut. Sit dolores deserunt quaerat quia deleniti atque.\n\nIn eos harum nisi voluptates sapiente. Sequi harum sint ex quisquam officiis ut. Ipsum autem quo et aliquid soluta asperiores eius. Quidem amet sit impedit voluptatem earum doloremque.\n\nDucimus incidunt eligendi neque et eaque non similique vero. Veniam sapiente sed quis et ea natus perspiciatis. Facere temporibus non laboriosam ut et.\n\nDolorem vel sit id. Quis placeat veniam qui. Magni eligendi cupiditate sunt dolorum sunt et. Voluptas minus quas eveniet dolores quidem. Non et quos enim ipsa repellendus qui.', '1980-03-16 15:50:46'),
	(29, 'Culpa vero.', 'Dolor animi ut est facilis consectetur. Et nemo amet maxime qui aspernatur consequatur. Eos temporibus in facilis impedit exercitationem tenetur.\n\nEst ex ut nam quasi et quae. Eum non ea non unde atque. Magni nihil adipisci non impedit unde pariatur. Debitis et quae saepe eius optio autem tempore.\n\nAmet et deserunt nulla amet minus. Animi ut ullam maiores hic ipsa minima aut. Qui dignissimos dolor adipisci error.\n\nDolor vel molestiae vero eveniet nostrum neque eos voluptates. Provident blanditiis corporis omnis assumenda voluptas placeat tenetur aut. Non autem vel quia officiis recusandae in quidem. Harum rerum et sunt eligendi pariatur quasi repellat.', '2013-03-11 08:51:59'),
	(30, 'Molestias excepturi.', 'Vel quibusdam accusamus ipsa vitae sunt totam. Perspiciatis et fugit aut nobis commodi. Qui tempore minus ut eos porro culpa nostrum. Rerum quod occaecati odit vel.\n\nVelit architecto iure aut omnis qui. Cumque soluta repudiandae nisi delectus rerum at tempora. Voluptatum quidem ad nam vel reiciendis corporis illum rerum.\n\nDolores neque sunt natus fugiat repudiandae qui. Est reiciendis quibusdam sint officia. Et rerum doloremque voluptate saepe illo laudantium nostrum. Consectetur ut voluptatem aut ipsam et odit omnis.\n\nVelit quia blanditiis voluptas quo omnis. Pariatur quia rerum atque distinctio. Labore provident dolorem molestiae est. Sed veritatis sed quo sed deleniti.', '1991-04-29 06:18:18'),
	(31, 'Perspiciatis non.', 'Omnis tempore esse quisquam rem itaque voluptas ut. Dicta quis harum non occaecati maiores aspernatur. Aut quibusdam aliquid vitae officiis ad alias. Delectus nihil molestiae qui fugiat.\n\nUt aut nostrum dolorem quos non eius. Provident quis dolores vitae praesentium et et. Mollitia soluta molestiae necessitatibus earum.\n\nQuia unde quibusdam ut facilis reiciendis fugiat. Velit pariatur laboriosam ut dolorem est. Sit ut corporis sint asperiores ut quae veniam.\n\nRecusandae quae asperiores et hic culpa. Velit quia doloremque quibusdam ratione. Corporis pariatur fuga voluptate vel. Ea et distinctio tempora consectetur provident tempore.', '1991-07-15 09:51:08'),
	(32, 'Rerum aut.', 'Et at debitis inventore ullam labore. Magni dicta voluptatibus sit optio. Tempore voluptas non enim autem. Maxime minima fugiat dolore fugit.\n\nVoluptates eveniet nisi recusandae magnam. Et illo non qui culpa et quis nihil. Ut necessitatibus non aut consequatur quo sint. Animi consequuntur nam porro at odio et.\n\nEsse sunt quis unde cum dolores ea et. Blanditiis omnis et provident. Laborum saepe consequatur aliquam pariatur laudantium asperiores odio. Sequi perferendis non vel fugiat dolor aut.\n\nEt quisquam laudantium modi recusandae. Atque totam sequi aliquam. Nam eos consectetur ab qui.', '1989-06-17 05:04:04'),
	(33, 'Ea.', 'Id magni non expedita. Tempora laborum rerum aliquam voluptatem qui. In libero consectetur blanditiis laborum omnis eligendi. Cumque atque omnis labore ea dolorem quia.\n\nNon nemo amet veniam. Harum temporibus porro autem sapiente suscipit ratione. Doloribus omnis aliquid consequuntur voluptatibus tenetur. Ipsam sunt nostrum voluptas vitae quia voluptatem. Laudantium sunt ut error voluptas consectetur amet.\n\nSint impedit inventore nam debitis rerum rerum et. Incidunt aut repellat consequatur nam. Eveniet aperiam qui provident sit consequatur distinctio. Ipsam voluptatum ut pariatur provident et est quam.\n\nQuia occaecati quo voluptatem aut ut voluptate neque veniam. Voluptatem hic neque maiores laboriosam sit unde. Dolorem molestiae autem et pariatur minus esse aut.', '1994-08-11 13:54:32'),
	(34, 'Sequi.', 'Impedit error labore aut voluptas dignissimos necessitatibus non. Ut ipsum temporibus ipsum sit illum dolor quia. Voluptatem eum expedita iure similique mollitia ratione cupiditate. Dolor voluptatum labore tempora quibusdam dicta.\n\nPariatur impedit labore facilis dolore ipsa quos in. Unde at sed rerum dolor rerum. Tenetur ipsa est dolore qui est. Natus porro cupiditate aut est asperiores magni esse.\n\nSit molestias laborum nostrum aut voluptas. Quisquam omnis adipisci iure neque eveniet voluptatum. Illum quis sit odit minima totam totam incidunt. Consectetur ratione sint consectetur modi.\n\nQuasi ratione consequatur possimus quasi aliquam iste. Dolorem quod voluptatibus earum est.', '2021-04-05 01:35:59'),
	(35, 'Et quas.', 'Ad eligendi numquam beatae eum aut quia vitae voluptatem. Pariatur ducimus quod est perferendis rem minus nisi. Nisi nihil aut vel deleniti. Asperiores labore nemo consectetur dolore dignissimos.\n\nHic ea atque voluptatibus sint molestias harum. Eos sed doloremque suscipit alias alias. Ut expedita ratione tenetur repellat est repellendus temporibus.\n\nEst voluptates minima pariatur eligendi ex omnis. Debitis voluptatibus rerum maiores provident. Ea molestias explicabo eum totam. Quae veniam dolorem repudiandae et voluptatem iusto.\n\nIpsum quia possimus magni est dolores est nisi. Veritatis cumque distinctio qui nulla repellat voluptatum sunt. Eveniet accusantium architecto autem voluptas.', '2012-10-12 21:00:24'),
	(36, 'Cumque ut.', 'Omnis laudantium numquam cumque alias corrupti repellat. Sit fugiat vero sed quia ullam. Omnis et vitae laborum alias adipisci. Quisquam eligendi consequatur culpa ipsum architecto.\n\nPorro eum ut id veritatis cumque dolore ab. Voluptas ut reprehenderit laudantium. Architecto doloremque eos nihil molestiae quo.\n\nPossimus nobis voluptatem nihil blanditiis. Quod odio necessitatibus ullam officia tempora. Qui exercitationem qui fugiat est velit. Ipsum porro ea aperiam sint adipisci quis.\n\nEaque cum occaecati maiores aut quod excepturi aliquid. Labore tempora officiis nobis ex quas sit. Qui voluptas nostrum optio ex. Velit et perspiciatis est quia est.', '2016-01-29 05:11:04'),
	(37, 'Est mollitia.', 'Qui rerum voluptates nemo autem quia facilis pariatur. Aliquid enim quia corrupti rerum quia voluptates ab. Rerum ad qui tempora fugit laboriosam exercitationem necessitatibus. Incidunt reprehenderit consequatur cupiditate. Non in nisi dolor quam.\n\nSoluta magnam omnis ex vero consequatur consequatur. Pariatur quasi voluptas voluptatem consequuntur recusandae. Tempora ipsum sapiente nesciunt iure. Et a odit et ea a. Error minus labore nulla ut natus voluptatem accusamus.\n\nFuga eligendi nihil molestias voluptatem nam non. Eum repudiandae sequi non vel ipsam qui possimus et. Ipsa est sed sed vero tempore quia.\n\nAmet eius dolorem expedita deleniti dolores porro. Quia vel eum odit ex ut laudantium dolores tempore. Quod quod quibusdam autem tempora corrupti. Ut dolores iste blanditiis pariatur non molestiae.', '1974-08-03 05:41:48'),
	(38, 'A suscipit.', 'Qui cupiditate hic repudiandae et aliquid deleniti. Exercitationem consequuntur dolores voluptas autem esse. Et cum ea qui.\n\nTenetur tempore repellendus consequatur cum odit tempora delectus. Atque et ea non. Magnam ut nemo ut maxime quia ut laboriosam. Ipsam sed aliquid qui eum eos.\n\nVoluptatem optio vel rerum quibusdam est. Quisquam est reiciendis quia sit.\n\nIn a tempora ea perspiciatis eligendi. Ea dolorem saepe vitae consequatur voluptas. Et odio veniam consequatur.', '1983-08-03 22:16:25'),
	(39, 'Nihil.', 'Sunt fugit est quia necessitatibus a molestiae dolor similique. Temporibus ab aut aut cumque. Dolorem sequi mollitia enim. Labore est eveniet voluptas illum.\n\nTempore repellat et voluptate. Voluptatem incidunt quidem officiis. Tenetur ducimus est doloribus minus.\n\nEt totam tempore consequatur. Quis cupiditate in deleniti aut ab. Eaque non accusantium libero ducimus quam id autem. Ut ipsam aut sunt quod hic.\n\nSuscipit sed laboriosam quia ut hic. Illo illo voluptatibus animi officiis. Ad expedita labore deleniti recusandae debitis vel.', '2001-02-27 16:54:37'),
	(40, 'Neque ut.', 'Qui est aliquid quos. Possimus incidunt fugiat eligendi esse consequuntur. Id nihil facilis ut inventore ea facere itaque ut.\n\nEaque voluptate molestias nobis quo et. Ipsam enim esse aut nisi beatae. Sint expedita voluptas accusamus itaque est. Veritatis iste autem quis et aut.\n\nVoluptates officia odio harum et quod ut qui. Sapiente enim provident ea praesentium culpa facere et. Nam ut ab aliquam. Placeat optio impedit quia ullam sint odit sed.\n\nBeatae nesciunt quo quisquam qui. Rerum placeat quod quae perferendis.', '1971-10-27 17:22:39'),
	(41, 'Voluptatum est.', 'Quidem neque vitae voluptatem consectetur voluptas et. Necessitatibus molestiae explicabo fugiat velit iusto magni. Aut suscipit ratione ullam et ea.\n\nDucimus ratione doloremque dolor a voluptates. Ad quos quod eum corporis. Quo adipisci tempora quod itaque modi.\n\nExpedita odio molestiae libero itaque suscipit ipsam fugiat quo. Nemo ad iure officia blanditiis. Debitis aliquid dolor velit reiciendis molestiae expedita. Quis rerum in nobis asperiores omnis. Adipisci alias nobis sit explicabo quam enim eos dolores.\n\nSapiente et officiis quidem in. Inventore molestiae harum quos. Et quis voluptatem possimus consequatur commodi dolores. Et sunt sed labore harum aliquid aut.', '2012-11-16 06:58:37'),
	(42, 'Et quia.', 'Et dignissimos asperiores eveniet animi aut impedit iure. Ipsum placeat ea id impedit. Quis qui voluptatem asperiores voluptas cupiditate quo.\n\nQuidem dolore vitae quia et. Quis id blanditiis maiores doloribus a architecto explicabo.\n\nVoluptates non accusantium quisquam nam tenetur commodi. Alias soluta autem reprehenderit esse alias odit possimus quo. Hic sit deleniti quos ex voluptas.\n\nQuia sed vitae harum dolor. Est consequatur quia vero aliquam ut cum nihil. Aut eaque sunt inventore.', '2002-09-26 18:13:12'),
	(43, 'Non aperiam.', 'Est possimus delectus consequatur voluptas voluptatem unde. Quis omnis et sunt iusto rerum blanditiis. Ut repellendus est ut. Ad est aspernatur et et.\n\nRerum id laudantium commodi accusamus quo. Eveniet porro voluptate provident quia aut itaque voluptatem. Eveniet exercitationem doloremque qui molestiae pariatur illo voluptates voluptas. Eius explicabo in voluptate at sequi quidem.\n\nQuaerat architecto ducimus qui pariatur. Molestiae aspernatur officia laborum non repellendus rem eveniet. Omnis aut quam cumque perspiciatis recusandae. Non deleniti in sit voluptatibus.\n\nPraesentium incidunt inventore illum. Placeat et tempore aut velit nulla. Facilis maxime quo id praesentium rerum reiciendis veniam qui.', '1977-07-01 14:57:23'),
	(44, 'Impedit et.', 'Aut et et ut consequatur. Aspernatur repellat unde explicabo asperiores esse est. Quos similique fugiat doloribus impedit at. Voluptatibus culpa sed ducimus sint quo provident.\n\nCommodi qui necessitatibus rem qui et quos non. Error qui tenetur ut dolores non odit amet.\n\nIste aliquid recusandae vero eligendi delectus aliquam reiciendis saepe. Commodi aspernatur illo dolore dicta deserunt dignissimos voluptatibus. Provident iure minus laudantium numquam. Dolor aut corrupti perspiciatis omnis cupiditate est aut ratione. Velit quos earum id fuga laudantium earum.\n\nNesciunt et reiciendis optio quibusdam perferendis. Quidem facere quam nesciunt consequatur et. Reiciendis voluptas placeat delectus ea. Odit facere aut repellendus eaque ab dolore.', '1996-03-04 02:53:36'),
	(45, 'Accusantium.', 'Aut inventore cumque et maxime. Adipisci occaecati quasi odio quibusdam ad vel animi iure. Quia laboriosam deserunt dignissimos eum.\n\nInventore aliquam at fugiat quam harum modi ipsum. Consequuntur et aliquam accusantium quisquam neque repellat et.\n\nDelectus molestiae assumenda inventore perferendis dolores qui voluptates. Quos quaerat enim perspiciatis ipsa hic quae. Nihil placeat dolor rerum provident. Quidem aut qui magnam et facilis quia sed.\n\nNeque quidem vel error id consequatur dolor eveniet eos. Temporibus eaque est incidunt rerum labore. Dolor cumque consequuntur amet facere neque rerum.', '1972-05-03 14:32:39'),
	(46, 'Dolores.', 'Illo velit molestiae commodi culpa. Corrupti consequatur et sunt sapiente saepe sit. Vel similique et ad dolorem tempore consequatur maiores.\n\nNulla dicta perspiciatis alias incidunt. Officia praesentium reiciendis soluta rerum natus. Odit qui ut deleniti facilis est aut placeat. Est qui omnis consectetur eaque qui voluptatem. Quo est alias enim placeat aut possimus sed.\n\nSint aut sunt enim odit. Facilis quia atque repudiandae perspiciatis. Aut minima dolor ut.\n\nUt et vel nemo et. Molestias ex ducimus qui in esse. Quidem blanditiis sunt ut totam tempora. Quam repellendus officia neque quia tempore iste et.', '2021-07-21 14:06:58'),
	(47, 'Quis praesentium.', 'Optio ducimus exercitationem consequatur quis iste delectus sed. Ut aliquam libero minus eum dolorem eligendi asperiores. Nesciunt excepturi sint eum. Sit nihil illum quam ea quidem necessitatibus.\n\nDeserunt quibusdam voluptatem eveniet est. Veritatis molestiae sit aperiam exercitationem eligendi. Eligendi sit dolorum est cupiditate repellat sit quo ut.\n\nDebitis qui praesentium distinctio assumenda qui delectus. Est voluptatem ex quia aut id. Ut ut sit enim sed aperiam qui laborum corrupti.\n\nUt voluptatem ipsum magni. Voluptas nulla quas quas quasi fugiat dignissimos.', '2001-11-20 18:37:26'),
	(48, 'Delectus totam.', 'Eum neque qui voluptatem tempore ducimus. Aut sed doloribus ad ut quis eaque aspernatur. Quis corrupti nam animi ipsa distinctio voluptas sed odit.\n\nArchitecto aut sint consequatur molestiae. Veritatis voluptas in omnis inventore distinctio inventore quis. Totam occaecati distinctio rerum tenetur.\n\nQuasi omnis itaque libero accusamus nulla. Tempore quos ut ut aut suscipit eum possimus.\n\nIpsum est est deserunt commodi. Sed fugit assumenda soluta aut. Id sed a rerum quia.', '1984-01-05 16:40:08'),
	(49, 'Voluptas accusamus.', 'Quis ut rerum quasi est est. Aut ratione sed voluptatem harum nihil impedit quia. Repellat unde corporis fugit mollitia nihil voluptatum vero. Ea omnis nostrum placeat facilis labore reprehenderit dolore.\n\nMollitia quidem eum dolores voluptatem facilis. Asperiores id deserunt pariatur et. Officia id et et.\n\nExpedita aut impedit sit voluptatem aspernatur et. Illum illo et sit porro reiciendis. Dolor libero soluta et excepturi.\n\nQui et blanditiis vitae voluptas. Harum id molestias pariatur officiis itaque autem veritatis. Nemo facilis consequatur quis omnis molestiae nihil est.', '2012-12-28 15:00:34'),
	(50, 'Sapiente dolores.', 'Veniam eos optio quia suscipit molestiae. Vero non enim sequi doloremque. Nisi et nostrum et at amet enim.\n\nMagni eius ipsum qui suscipit odit aut accusamus. Soluta ut quae ea. Sed ipsa et voluptatum omnis tenetur nisi. Ullam eveniet veritatis harum nihil sed.\n\nFacere laborum numquam blanditiis voluptatem et doloremque. Autem nostrum expedita doloremque velit sunt sequi. Vitae saepe in dolor molestiae voluptates quam laboriosam accusantium. Quibusdam natus inventore dolor.\n\nEst sed et dolorum et quo. Soluta laborum atque laboriosam dolore doloribus delectus reiciendis. Suscipit deleniti est soluta a enim quam consectetur dolores.', '1984-01-23 00:25:48');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Listage de la structure de la table blog. post_category
CREATE TABLE IF NOT EXISTS `post_category` (
  `post_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`post_id`,`category_id`),
  KEY `fk_category` (`category_id`),
  CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table blog.post_category : ~129 rows (environ)
/*!40000 ALTER TABLE `post_category` DISABLE KEYS */;
INSERT INTO `post_category` (`post_id`, `category_id`) VALUES
	(2, 3),
	(3, 3),
	(4, 3),
	(6, 3),
	(8, 3),
	(9, 3),
	(10, 3),
	(16, 3),
	(18, 3),
	(21, 3),
	(22, 3),
	(25, 3),
	(28, 3),
	(29, 3),
	(30, 3),
	(31, 3),
	(33, 3),
	(34, 3),
	(35, 3),
	(36, 3),
	(38, 3),
	(40, 3),
	(41, 3),
	(43, 3),
	(45, 3),
	(46, 3),
	(49, 3),
	(2, 4),
	(4, 4),
	(6, 4),
	(8, 4),
	(9, 4),
	(11, 4),
	(12, 4),
	(16, 4),
	(18, 4),
	(19, 4),
	(23, 4),
	(24, 4),
	(28, 4),
	(29, 4),
	(31, 4),
	(33, 4),
	(35, 4),
	(36, 4),
	(37, 4),
	(38, 4),
	(41, 4),
	(43, 4),
	(46, 4),
	(48, 4),
	(49, 4),
	(50, 4),
	(3, 5),
	(8, 5),
	(12, 5),
	(16, 5),
	(17, 5),
	(18, 5),
	(19, 5),
	(21, 5),
	(23, 5),
	(24, 5),
	(25, 5),
	(26, 5),
	(27, 5),
	(28, 5),
	(29, 5),
	(31, 5),
	(33, 5),
	(34, 5),
	(36, 5),
	(40, 5),
	(43, 5),
	(50, 5),
	(2, 6),
	(3, 6),
	(4, 6),
	(6, 6),
	(8, 6),
	(11, 6),
	(12, 6),
	(15, 6),
	(16, 6),
	(18, 6),
	(20, 6),
	(22, 6),
	(23, 6),
	(25, 6),
	(26, 6),
	(27, 6),
	(28, 6),
	(29, 6),
	(30, 6),
	(31, 6),
	(33, 6),
	(34, 6),
	(35, 6),
	(37, 6),
	(38, 6),
	(40, 6),
	(43, 6),
	(46, 6),
	(50, 6),
	(2, 7),
	(6, 7),
	(8, 7),
	(9, 7),
	(12, 7),
	(14, 7),
	(16, 7),
	(18, 7),
	(23, 7),
	(25, 7),
	(26, 7),
	(27, 7),
	(28, 7),
	(29, 7),
	(30, 7),
	(31, 7),
	(36, 7),
	(38, 7),
	(40, 7),
	(41, 7),
	(43, 7),
	(45, 7),
	(47, 7),
	(48, 7),
	(50, 7);
/*!40000 ALTER TABLE `post_category` ENABLE KEYS */;

-- Listage de la structure de la table blog. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `password_reset_date` datetime DEFAULT NULL,
  `password_reset_token` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table blog.user : ~0 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `email`, `password`, `isAdmin`, `password_reset_date`, `password_reset_token`) VALUES
	(1, 'admin', 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, '2023-02-10 10:58:49', '');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
