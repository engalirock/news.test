-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2024 at 08:32 PM
-- Server version: 5.7.40-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `user_id`, `category_id`, `title`, `image`, `description`, `content`, `datetime`) VALUES
(1, 1, 1, ' وزير الصناعة يعقد جلسة مباحثات مع نظيره البحرينى لبحث سبل تنمية التعاون ', '20240110014108418.jpg', 'عقد المهندس أحمد سمير وزير التجارة والصناعة جلسة مباحثات موسعة مع عبد الله بن عادل فخرو وزير الصناعة والتجارة بمملكة البحرين وذلك على هامش مشاركته بفعاليات الاجتماع الرابع للجنة العليا', ' عقد المهندس أحمد سمير وزير التجارة والصناعة جلسة مباحثات موسعة مع عبد الله بن عادل فخرو وزير الصناعة والتجارة بمملكة البحرين وذلك على هامش مشاركته بفعاليات الاجتماع الرابع للجنة العليا للشراكة الصناعية التكاملية بين مصر والإمارات والأردن والبحرين والتي تعقد بالعاصمة البحرينية المنامة خلال الفترة من 11 -12 يناير ‏الجاري.\r\n \r\nوقال الوزير أن اللقاء استعرض سبل تعزيز علاقات التعاون الاقتصادي المشترك بين البلدين وزيادة فرص التبادل التجاري والتكامل الصناعي  بين الجانبين من خلال تذليل كافة المعوقات التي تحول دون النفاذ لأسواق كلا البلدين والاستفادة من الميزة النسبية الموجودة لكل دولة بما يسمح بالنفاذ إلي السوق الإفريقي والسوق الخليجي.\r\n \r\nولفت سمير الى توافق الرؤى بين الحكومتين المصرية والبحرينية وممثلي دوائر الأعمال بالبلدين على أهمية تشجيع علاقات التعاون المشترك بين مجتمعات الأعمال من كلا البلدين بهدف تيسير حركة الاستثمار والتجارة البينية من خلال تشجيع تبادل زيارات الوفود التجارية والمشاركة في المعارض التجارية ومنتديات الاعمال التي تقام بالبلدين.\r\n \r\nونوه الوزير إلى ان الوزارة أعدت قائمة تتضمن 152 فرصه استثمارية في القطاع الصناعي تستهدف تعميقها لتلبية احتياجات الصناعة الوطنية السوق المحلي والتصدير للأسواق الخارجية، لافتا الى انه سيتم موافاة الجانب البحريني بملف يشمل حوافز الاستثمار التي تم منحها مؤخرا للقطاع الصناعي وكذا قائمة بالفرص الاستثمارية التي حددتها الوزارة.\r\n \r\nوأوضح سمير ان اللقاء ناقش امكانيه تنظيم زيارات ميدانية للكوادر الصناعية البحرينية للمناطق والمجمعات الصناعية في مصر للاطلاع على التجربة المصرية الخاصة بإنشاء وإدارة هذه المناطق والمجمعات، مشيرا إلى أن اللقاء ناقش إمكانية فتح فروع للبنوك المصرية في البحرين بما يساهم في تعزيز التبادل التجاري بين الشركات المصرية والبحرينية.\r\n \r\nولفت الوزير ان حجم التبادل التجاري بين مصر والبحرين بلغ خلال الفترة من يناير -سبتمبر من العام الماضي نحو 379 مليون دولار، مشيراً الى ان أهم بنود التبادل التجاري بين البلدين تشمل الخضروات والفاكهة والأثاث والمواد والمحضرات الغذائية والمواد العطرية والحديد والألومنيوم ومصنوعاته.\r\n \r\nومن جانبه أكد عبد الله بن عادل فخرو وزير الصناعة والتجارة بمملكة البحرين حرص بلاده على تعزيز أطر التعاون الاقتصادي المشترك مع دولة مصر الشقيقة في مختلف المجالات التجارية والصناعية والاستثمارية، مشيراً الى أهمية تفعيل الجهود المشتركة بين الدول الأعضاء بالشراكة الصناعية التكاملية للترويج للمشروعات الصناعية المقترحة في إطار الشراكة بين دوائر الاعمال بهذه الدول.\r\n \r\nوأشار فخرو إلى إمكانية الاستفادة من المشروعات المطروحة في إطار الشراكة الصناعية التكاملية للوفاء باحتياجات الدول الأربع الأعضاء والتصدير للأسواق الإقليمية والعالمية، لاسيما أسواق دول القارة الافريقية.\r\n \r\nوجديرً بالذكر أن الشراكة الصناعية التكاملية تستهدف في المقام الأول تعزيز التعاون والشراكة بين القطاع الخاص بالدول الأعضاء وترجمته لمشروعات استثمارية ملموسة تفي باحتياجات أسواق الدول الأعضاء والتصدير للأسواق الخارجية.', '2024-01-10 14:06:09'),
(2, 1, 1, ' الرقابة المالية تطور ضوابط منح تراخيص للشركات العاملة فى الأنشطة غير المصرفية ', '202208070130113011.jpg', 'أصدر مجلس إدارة الهيئة العامة للرقابة المالية برئاسة الدكتور محمد فريد، قرارًا رقم 249 لسنة 2023 بتعديل قرار مجلس إدارة الهيئة رقم 53 لسنة 2018 بشأن ضوابط منح الترخيص واستمراره وقواعد تملك أسهم الشركات العاملة في الأنشطة المالية غير المصرفية،', ' أصدر مجلس إدارة الهيئة العامة للرقابة المالية برئاسة الدكتور محمد فريد، قرارًا رقم 249 لسنة 2023 بتعديل قرار مجلس إدارة الهيئة رقم 53 لسنة 2018 بشأن ضوابط منح الترخيص واستمراره وقواعد تملك أسهم الشركات العاملة في الأنشطة المالية غير المصرفية، والذي يقضي بتنظيم نسب المساهمة والملكية في الشركات العاملة في الأنشطة المالية غير المصرفية الخاضعة لإشراف ورقابة الهيئة، بما يسهم في تحقيق الاستقرار المالي للمؤسسات المالية غير المصرفية ويمكنها من الاستمرار في تقديم خدماتها للمتعاملين بكفاءة وفاعلية.\r\n \r\nونص القرار على ألا تقل نسبة مساهمة المؤسسة المالية في رأس مال الشركات العاملة في الأنشطة المالية غير المصرفية عن 25% من رأسمال الشركة، أو ألا تقل نسبة مساهمة المستثمر المؤهل عن ثلثي رأسمال الشركة، كما نص القرار على ألا يقل نسبة تمثيل المرأة في مجلس الإدارة عن 25%. \r\n \r\nكما حدد القرار عدد من الاشتراطات الخاصة بالشركات العاملة في بعض الأنشطة المالية غير المصرفية مثل شركات التأمين، منها أن تكون نسبة مساهمة شركات التأمين وإعادة التأمين في رأس مال أي شركة راغبة في مزاولة نشاط التأمين لا يقل عن 25% من رأس المال على أن تكون حاصلة على تصنيف ائتماني من إحدى جهات التصنيف الدولية.\r\n \r\nكما حدد القرار تعريف المستثمر المؤهل وهو الأشخاص الطبيعيون من ذوي الخبرة التي لا تقل عن عشر سنوات في مجال إدارة الأموال واستثمارها أو الاستثمار المباشر أو المجالات المرتبطة بالأنشطة المالية غير المصرفية، على ألا تقل قيمة الأصول السائلة أو الأوراق أو الأدوات المالية المملوكة له عن عشرة ملايين جنيه، وكذلك الجهات الحكومية والأشخاص الاعتبارية العامة وأجهزة الدولة التي تسمح القوانين والقرارات المنظمة لها بمزاولة أنشطة مالية واستثمارية، بما فيها تأسيس الشركات والمساهمة فيها، وشركات الأموال التي لا يقل حقوق ملكيتها عن 10 ملايين جنيه مصري.\r\n \r\nوألزم القرار الشركات بالانتهاء من إجراءات التأسيس خلال فترة لا تزيد عن ستة أشهر من تاريخ موافقة الهيئة المبدئية ويجوز للهيئة مدها لمدد أخرى بناء على مبررات تقبلها الهيئة، وكذلك بدء العمل في النشاط خلال ستة أشهر على الأكثر من تاريخ الحصول على الترخيص ويجوز مدها بعد موافقة الهيئة في ضوء المبررات التي تقدمها الشركة وإلا اعتبر الترخيص لاغيًا.\r\n \r\nكما نص القرار على أن تقوم الشركات المرخص لها بمزاولة أحد الأنشطة المالية غير المصرفية ولم تزاول النشاط فعلياً بتوفيق أوضاعها باستيفاء المتطلبات اللازمة لمزاولة النشاط طبقاً لأحكام قرار مجلس إدارة الهيئة رقم 53 لسنة 2018 المشار إليه خلال ستة أشهر من تاريخ العمل بالقرار وفي حال عدم التزام الشركة بتوفيق أوضاعها أو تقديم مبررات تقبلها الهيئة لمد مهلة مزاولة النشاط يعرض الأمر على مجلس إدارة الهيئة للنظر في إلغاء الترخيص الممنوح لها.\r\n \r\nوفي ذات السياق أصدر مجلس إدارة الهيئة قرار رقم 250 لسنة 2023 بتعديل قرار مجلس إدارة الهيئة رقم 166 لسنة 2020 بشأن تحديد المقصود بمصطلح المؤسسات المالية الواردة بقرارات مجلس إدارة الهيئة، ونص على أن يتضمن مصطلح المؤسسات المالية، الأشخاص الاعتبارية الأجنبية التي تمارس إحدى الأنشطة المالية المصرفية أو غير المصرفية الخاضعة لإشراف ورقابة جهة تمارس اختصاصات مثيلة للبنك المركزي المصري أو الهيئة بحسب الأحوال، والمؤسسات المالية العربية والإقليمية والدولية التي توافق عليها الهيئة.\r\n \r\nيأتي ذلك استكمالاً لجهود الهيئة في تطوير البيئة التشريعية والتنظيمية وذلك عقب إصدارها لحزمة القرارات التي تستهدف تطوير آليات التداول في سوق الأوراق المالية لتعزيز مستويات الاستقرار المالي وحماية حقوق المتعاملين إذ أصدرت منذ أيام بإصدار عدد من القرارات تستهدف تطوير قواعد الملاءة المالية للشركات العاملة في مجال الأوراق المالية، وتطوير تطوير قواعد مزاولة الهامش لشركات السمسرة في الأوراق المالية.', '2024-01-10 14:06:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;