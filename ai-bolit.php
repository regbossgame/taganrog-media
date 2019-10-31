<?php
///////////////////////////////////////////////////////////////////////////
// Created and developed by Greg Zemskov, Revisium Company
// Email: ai@revisium.com, http://revisium.com/ai/, skype: greg_zemskov

// Commercial usage is not allowed without a license purchase or written permission of author
// Source code usage is not allowed without author's permission

// Certificated in Federal Institute of Industrial Property in 2012
// http://revisium.com/ai/i/mini_aibolit.jpg

////////////////////////////////////////////////////////////////////////////
// Запрещено использование скрипта в коммерческих целях без приобретения лицензии.
// Запрещено использование исходного кода скрипта без приобретения лицензии.
//
// По вопросам приобретения лицензии обращайтесь в компанию "Ревизиум": http://www.revisium.com
// ai@revisium.com
// На скрипт получено авторское свидетельство в Роспатенте
// http://revisium.com/ai/i/mini_aibolit.jpg
///////////////////////////////////////////////////////////////////////////

// put 1 for expert mode and 0 for basic check
// установите 1 для режима "Эксперта" и 0 для быстрой проверки 
define('AI_EXPERT', 0); 

//define('LANG', 'EN');
define('LANG', 'RU');

// Put any strong password to open the script from web
// Впишите вместо put_any_strong_password_here сложный пароль	 
define('PASS', 'put_any_strong_password_here'); 

define('REPORT_MASK_PHPSIGN', 1);
define('REPORT_MASK_SPAMLINKS', 2);
define('REPORT_MASK_DOORWAYS', 4);
define('REPORT_MASK_SUSP', 8);
define('REPORT_MASK_CANDI', 16);
define('REPORT_MASK_WRIT', 32);
define('REPORT_MASK_FULL', REPORT_MASK_PHPSIGN | REPORT_MASK_SPAMLINKS | REPORT_MASK_DOORWAYS | REPORT_MASK_SUSP | REPORT_MASK_CANDI | REPORT_MASK_WRIT);

$defaults = array(
	'path' => dirname(__FILE__),
	'scan_all_files' => 0, // full scan (rather than just a .js, .php, .html, .htaccess)
	'scan_delay' => 1, // delay in file scanning to reduce system load
	'max_size_to_scan' => '1M',
	'site_url' => '', // website url
	'no_rw_dir' => 0,
	'report_mask' =>  REPORT_MASK_FULL // full-featured report
);


define('DEBUG_MODE', 0);

define('DIR_SEPARATOR', '/');

define('DOUBLECHECK_FILE', 'AI-BOLIT-DOUBLECHECK.php');

if ((isset($_SERVER['OS']) && stripos('Win', $_SERVER['OS']) !== false)/* && stripos('CygWin', $_SERVER['OS']) === false)*/) {
   define('DIR_SEPARATOR', '\\');
}


if (LANG == 'RU') {
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// RUSSIAN INTERFACE
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
define('AI_STR_001', '<h3>AI-Болит v.%s &mdash; ищет вредоносный код и вирусы в файлах.</h3><h5>Григорий Земсков, компания "<a href="http://www.revisium.com/">Ревизиум</a>", 2012-2014, <a target=_blank href="http://revisium.com/ai/">Страница проекта на Revisium.com.</a> %s</h5>');
define('AI_STR_002', '<div class="update">Проверьте обновление на сайте <a href="http://revisium.com/ai/">http://revisium.com/ai/</a>. Возможно, ваша версия скрипта уже устарела.</div>');
define('AI_STR_003', 'ВНИМАНИЕ! Не оставляйте файл ai-bolit.php или файл отчета на сервере, и не давайте прямых ссылок с других сайтов на файл отчета или скрипта. Отчет содержит важную информацию о вашем сайте или сервере, сохраните его в надежном месте от посторонних глаз!');
define('AI_STR_004', 'Путь');
define('AI_STR_005', 'Дата создания');
define('AI_STR_006', 'Дата модификации');
define('AI_STR_007', 'Размер');
define('AI_STR_008', 'Конфигурация PHP');
define('AI_STR_009', "Вы установили слабый пароль на скрипт AI-BOLIT. Укажите пароль не менее 8 символов, содержащий латинские буквы в верхнем и нижнем регистре, а также цифры. Например, такой <b>%s</b>");
define('AI_STR_010', "Запустите скрипт с паролем, который установлен в переменной PASS (в начале файла). <br/>Например, так http://ваш_сайт_и_путь_до_скрипта/ai-bolit.php?p=<b>%s</b>");
define('AI_STR_011', 'Текущая директория не доступна для чтения скрипту. Пожалуйста, укажите права на доступ <b>rwxr-xr-x</b> или с помощью командной строки <b>chmod +r имя_директории</b>');
define('AI_STR_012', "<div class=\"rep\">Текущая база скрипта содержит %s шелл-сигнатур, а также %s других вредоносных фрагментов. Затрачено времени: <b>%s</b>.<br/>Сканирование начато: %s. Сканирование завершено: %s</div> ");
define('AI_STR_013', '<div class="rep">Всего проверено %s директорий и %s файлов.</div>');
define('AI_STR_014', '<div class="rep" style="color: #0000A0">Внимание, скрипт выполнил быструю проверку сайта. Проверяются только наиболее критические файлы, но часть вредоносных скриптов может быть не обнаружена. Пожалуйста, запустите скрипт из командной строки для выполнения полного тестирования. Подробнее смотрите в <a href="http://revisium.com/ai/faq.php">FAQ вопрос №10</a>.</div>');
define('AI_STR_015', '<div class="sec">Критические замечания</div>');
define('AI_STR_016', 'Найдены сигнатуры шелл-скрипта. Подозрение на вредоносный скрипт:');
define('AI_STR_017', 'Шелл-скрипты не найдены.');
define('AI_STR_018', 'Найдены сигнатуры javascript вирусов:');
define('AI_STR_019', 'Найдены сигнатуры исполняемых файлов unix. Они могут быть вредоносными файлами:');
define('AI_STR_020', 'Двойное расширение, зашифрованный контент или подозрение на вредоносный скрипт. Требуется дополнительный анализ:');
define('AI_STR_021', 'Подозрение на вредоносный скрипт:');
define('AI_STR_022', 'Список файловых ссылок (symlinks):');
define('AI_STR_023', 'Список скрытых файлов:');
define('AI_STR_024', 'Скорее всего этот файл лежит в каталоге с дорвеем:');
define('AI_STR_025', 'Не найдено директорий c дорвеями');
define('AI_STR_026', 'Предупреждения');
define('AI_STR_027', 'Опасный код в .htaccess (редирект на внешний сервер, подмена расширений или автовнедрение кода):');
define('AI_STR_028', 'В не .php файле содержится стартовая сигнатура PHP кода. Возможно, там вредоносный код:');
define('AI_STR_029', 'В этих файлах размещен код по продаже ссылок. Убедитесь, что размещали его вы:');
define('AI_STR_030', 'Непроверенные файлы - ошибка чтения');
define('AI_STR_031', 'В этих файлах размещены невидимые ссылки. Подозрение на ссылочный спам:');
define('AI_STR_032', 'Список невидимых ссылок:');
define('AI_STR_033', 'Отображены только первые ');
define('AI_STR_034', 'Найдены директории, в которых подозрительно много файлов .php или .html. Подозрение на дорвей:');
define('AI_STR_035', 'Скрипт использует код, который часто используются во вредоносных скриптах:');
define('AI_STR_036', 'Директории из файла .adirignore были пропущены при сканировании:');
define('AI_STR_037', 'Версии найденных CMS:');
define('AI_STR_038', 'Большие файлы (больше чем %s! Пропущено:');
define('AI_STR_039', 'Не найдено файлов больше чем %s');
define('AI_STR_040', 'Временные файлы или файлы(каталоги)-кандидаты на удаление по ряду причин:');
define('AI_STR_041', 'Потенциально небезопасно! Директории, доступные скрипту на запись:');
define('AI_STR_042', 'Не найдено директорий, доступных на запись скриптом');
define('AI_STR_043', 'Использовано памяти при сканировании: ');
define('AI_STR_044', '<div id="igid" style="display: none;"><div class="sec">Добавить в список игнорируемых</div><form name="ignore"><textarea name="list" style="width: 600px; height: 400px;"></textarea></form><div class="details">Скопируйте этот список и вставьте его в файл .aignore, чтобы исключить эти файлы из отчета.</div></div>');
define('AI_STR_045', '<div class="notice"><span class="vir">[!]</span> В скрипте отключено полное сканирование файлов, проверяются только .php, .html, .htaccess. Чтобы выполнить более тщательное сканирование, <br/>поменяйте значение настройки на <b>\'scan_all_files\' => 1</b> в самом верху скрипта. Скрипт в этом случае может работать очень долго. Рекомендуется отключить на хостинге лимит по времени выполнения, либо запускать скрипт из командной строки.</div>');
define('AI_STR_046', '[x] закрыть сообщение');
define('AI_STR_047', '<div class="offer" id="ofr"><span style="font-size: 15px;"><a href="http://www.revisium.com/ru/order/" target="_blank"><b>Оперативное лечение сайта от вирусов. Защита от взлома. Гарантия на работы. </b></a></span><br/><p style="color: #D0FFD0; font-size: 13px;">Быстро и качественно вылечим Ваш сайт от вирусов, удалим вредоносный код с сайта, поставим уникальную защиту от взлома. <a href="http://www.revisium.com/ru/order/" target=_blank>Отправьте нам запрос</a> на сайте www.revisium.com &rarr;</p><hr color=#E0E0E0 size=1><p style="color: #E0E0E0">Также приглашаем в группу ВКонтакте<br/> <a href="http://vk.com/siteprotect" target="_blank">"Безопасность Веб-сайтов"</a>. А еще у нас есть твиттер <a href="http://twitter.com/revisium" target=_blank>@revisium</a> и страница <a href="http://www.facebook.com/Revisium" target=_blank>facebook.com/revisium</a>. Присоединяйтесь!</p><hr color=#E0E0E0 size=1><p style="color: #E0E0E0"><b style="color: yellow">[$$$]</b> Если Вы хостер, веб-студия, seo-специалист или вебмастер&nbsp;&mdash; напишите нам на ai@revisium.com, для Вас есть партнерская программа.</p>');
define('AI_STR_048', '<p>Если у вас есть эккаунт ВКонтакте, приглашаем в <a href="http://vk.com/siteprotect" target=_blank>группу "Безопасность Веб-сайтов"</a>: там я делюсь опытом защиты веб-сайтов и поиска вредоносных скриптов.</p>');
define('AI_STR_049', 'Отказ от гарантий: даже если скрипт не нашел вредоносных скриптов на сайте, автор не гарантирует их полное отсутствие, а также не несет ответственности за возможные последствия работы скрипта ai-bolit.php или неоправданные ожидания пользователей относительно функциональности и возможностей.');
define('AI_STR_050', 'Замечания и предложения по работе скрипта и пропущенные вредоносные скрипты присылайте на <a href="mailto:ai@revisium.com">ai@revisium.com</a>.<p>Также будем чрезвычайно благодарны за любые упоминания скрипта AI-Bolit на вашем сайте, в блоге, среди друзей, знакомых и клиентов. Ссылочку можно поставить на <a href="http://revisium.com/ai/">http://revisium.com/ai/</a>. <p>Если будут вопросы - пишите <a href="mailto:ai@revisium.com">ai@revisium.com</a>. ');
define('AI_STR_051', 'Отчет по ');
define('AI_STR_052', 'Эвристический анализ обнаружил подозрительные файлы. Проверьте их на наличие вредоносного кода.');
define('AI_STR_053', 'Много косвенных вызовов функции');
define('AI_STR_054', 'Подозрение на обфусцированные переменные');
define('AI_STR_055', 'Подозрительное использование массива глобальных переменных');
define('AI_STR_056', 'Дробление строки на символы');
define('AI_STR_057', 'Сканирование выполнено в обычном режиме. Некоторые вредоносные скрипты могут быть не обнаружены.<br> Желательно проверить сайт в режиме "Эксперт". Подробно описано в <a href="http://www.revisium.com/ai/faq.php">FAQ</a> и инструкции к скрипту.');
} else {
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ENGLISH INTERFACE
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
define('AI_STR_001', '<h3>AI-BOLIT v.%s &mdash; Enhanced Server-Side Detector of Viruses, Malicious and Hacker\'s Scripts.</h3><h5>Greg Zemskov, 2012-2014, <a target=_blank href="http://revisium.com/aibo/">AI-BOLIT web site.</a>. Non-commercial use only.</h5>');
define('AI_STR_002', '<div class="update">Check for updates on <a href="http://revisium.com/ai/">http://revisium.com/ai/</a>. Probably your version is out-of-date.</div>');
define('AI_STR_003', 'Caution! Do not leave either ai-bolit.php or report file on server and do not provide direct links to the report file. Report file contains sensitive information about your website which could be used by hackers. So keep it in safe place and don\'t leave on website!');
define('AI_STR_004', 'Path');
define('AI_STR_005', 'Created');
define('AI_STR_006', 'Modified');
define('AI_STR_007', 'Size');
define('AI_STR_008', 'PHP Info');
define('AI_STR_009', "Your password for AI-BOLIT is weak. Password must be more than 8 character length, contain both latin letters in upper and lower case, and digits. E.g. <b>%s</b>");
define('AI_STR_010', "Open AI-BOLIT with password specified in the beggining of file in PASS variable. <br/>E.g. http://you_website.com/ai-bolit.php?p=<b>%s</b>");
define('AI_STR_011', 'Current folder is not readable. Please change permission for <b>rwxr-xr-x</b> or using command line <b>chmod +r folder_name</b>');
define('AI_STR_012', "<div class=\"rep\">%s malicious signatures known, %s virus signatures and other malicious code. Elapsed: <b>%s</b
>.<br/>Started: %s. Stopped: %s</div> ");
define('AI_STR_013', '<div class="rep">Scanned %s folders and %s files.</div>');
define('AI_STR_014', '<div class="rep" style="color: #0000A0">Attention! Script has performed quick scan. It scans only .html/.js/.php files  in quick scan mode so some of malicious scripts might not be detected. <br>Please launch script from a command line thru SSH to perform full scan.');
define('AI_STR_015', '<div class="sec">Critical</div>');
define('AI_STR_016', 'Shell script signatures detected. Might be a malicious or hacker\'s script:');
define('AI_STR_017', 'Shell scripts signatures not detected.');
define('AI_STR_018', 'Javascript virus signatures detected:');
define('AI_STR_019', 'Unix executables signatures detected. They might be a malicious binaries or rootkits:');
define('AI_STR_020', 'Suspicious encoded strings, extra .php extention or external includes detected in PHP files. Might be a malicious or hacker\'s script:');
define('AI_STR_021', 'Might be a malicious or hacker\'s script:');
define('AI_STR_022', 'Symlinks:');
define('AI_STR_023', 'Hidden files:');
define('AI_STR_024', 'Files might be a part of doorway:');
define('AI_STR_025', 'Doorway folders not detected');
define('AI_STR_026', 'Warnings');
define('AI_STR_027', 'Malicious code in .htaccess (redirect to external server, extention handler replacement or malicious code auto-append):');
define('AI_STR_028', 'Non-PHP file has PHP signature. Check for malicious code:');
define('AI_STR_029', 'This script has black-SEO links or linkfarm. Check if it was installed by your:');
define('AI_STR_030', 'Reading error. Skipped.');
define('AI_STR_031', 'These files have invisible links, might be black-seo stuff:');
define('AI_STR_032', 'List of invisible links:');
define('AI_STR_033', 'Displayed first ');
define('AI_STR_034', 'Folders contained too many .php or .html files. Might be a doorway:');
define('AI_STR_035', 'Suspicious code detected. It\'s usually used in malicious scrips:');
define('AI_STR_036', 'The following list of files specified in .adirignore has been skipped:');
define('AI_STR_037', 'CMS found:');
define('AI_STR_038', 'Large files (greater than %s! Skipped:');
define('AI_STR_039', 'Files greater than %s not found');
define('AI_STR_040', 'Files recommended to be remove due to security reason:');
define('AI_STR_041', 'Potentially unsafe! Folders which are writable for scripts:');
define('AI_STR_042', 'Writable folders not found');
define('AI_STR_043', 'Memory used: ');
define('AI_STR_044', '<div id="igid" style="display: none;"><div class="sec">Add to ignore list</div><form name="ignore"><textarea name="list" style="width: 600px; height: 400px;"></textarea></form><div class="details">Copy and paste the following list into .aignore to eliminate these files from AI-BOLIT report.</div></div>');
define('AI_STR_045', '<div class="notice"><span class="vir">[!]</span> Ai-BOLIT is working in quick scan mode, only .php, .html, .htaccess files will be checked. Change the following setting \'scan_all_files\' => 1 to perform full scanning.</b>. </div>');
define('AI_STR_046', '[x] close window');
define('AI_STR_047', '<div class="offer" id="ofr"><span style="font-size: 15px;"><a href="http://www.revisium.com/ru/order/" target="_blank">
We will protect your website against hackers and viruses with guarantee!</a></span><br/>
<p>We completely remove malicious software and scripts from your website, protect website against hackers, check servers for rootkits and suid-files, teach you how to keep your website secured. <a href="http://www.revisium.com/en/order/">Contact Us</a>');
define('AI_STR_048', '');
define('AI_STR_049', "Disclaimer: I'm not liable to you for any damages, including general, special, incidental or consequential damages arising out of the use or inability to use the script (including but not limited to loss of data or report being rendered inaccurate or failure of the script). There's no warranty for the program. Use at your own risk. ");
define('AI_STR_050', "I'm sincerely appreciate reports for any bugs you may found in the script. Please email me: <a href=\"mailto:audit@revisium.com\">audit@revisium.com</a>.<p> Also I appriciate any reference to the script in your blog or forum posts. Thank you for the link to download page: <a href=\"http://revisium.com/aibo/\">http://revisium.com/aibo/</a>");
define('AI_STR_051', 'Report for ');
define('AI_STR_052', 'Heuristic Analyzer has detected suspicious files. Check if they are malware.');
define('AI_STR_053', 'Function called by reference');
define('AI_STR_054', 'Suspected for obfuscated variables');
define('AI_STR_055', 'Suspected for $GLOBAL array usage');
define('AI_STR_056', 'Abnormal split of string');
define('AI_STR_057', 'Scanning has been done in simple mode. It is strongly recommended to perform scanning in "Expert" mode. See readme.txt for details.');
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// This is signatures wrapped into base64. 
$g_DBShe = unserialize(base64_decode("YTozNjc6e2k6MDtzOjg6IlpPQlVHVEVMIjtpOjE7czoxMzoiTWFnZWxhbmdDeWJlciI7aToyO3M6MTM6InByb2ZleG9yLmhlbGwiO2k6MztzOjIwOiI8IS0tQ09PS0lFIFVQREFURS0tPiI7aTo0O3M6OToiLy9yYXN0YS8vIjtpOjU7czo1NDoiJHBhcmFtMm1hc2suIilcPVtcPHE+XCJdKC4qPykoPz1bXDxxPlwiXSApW1w8cT5cIl0vc2llIjtpOjY7czoxOToiKTsgJGkrKykkcmV0Lj1jaHIoJCI7aTo3O3M6Mjc6ImVyZWdfcmVwbGFjZSg8cT4mZW1haWwmPHE+LCI7aTo4O3M6MTM6Il1dKSk7fX1ldmFsKCQiO2k6OTtzOjMwOiJmd3JpdGUoZm9wZW4oZGlybmFtZShfX0ZJTEVfXykiO2k6MTA7czoxMToiQmFieV9EcmFrb24iO2k6MTE7czoyNDoiJGlzZXZhbGZ1bmN0aW9uYXZhaWxhYmxlIjtpOjEyO3M6MTU6Ik5ldEBkZHJlc3MgTWFpbCI7aToxMztzOjM0OiJQYXNzd29yZDo8cz4iLiRfUE9TVFs8cT5wYXNzd2Q8cT5dIjtpOjE0O3M6MTU6IkNyZWF0ZWQgQnkgRU1NQSI7aToxNTtzOjEyOiJHSUY4OUE7PD9waHAiO2k6MTY7czoyODoib1RhdDhEM0RzRTgnJn5oVTA2Q0NINTskZ1lTcSI7aToxNztzOjIwOiIkbWQ1PW1kNSgiJHJhbmRvbSIpOyI7aToxODtzOjY6IjN4cDFyMyI7aToxOTtzOjMyOiIkaW09c3Vic3RyKCR0eCwkcCsyLCRwMi0oJHArMikpOyI7aToyMDtzOjE1OiJOaW5qYVZpcnVzIEhlcmUiO2k6MjE7czoyMToiN1AxdGQrTldsaWFJL2hXa1o0Vlg5IjtpOjIyO3M6NDoiQW0hciI7aToyMztzOjEwOiI8ZG90PklySXNUIjtpOjI0O3M6MTA6Im5kcm9pfGh0Y18iO2k6MjU7czoxMDoiYW5kZXh8b29nbCI7aToyNjtzOjE3OiJIYWNrZWQgQnkgRW5ETGVTcyI7aToyNztzOjE3OiIoJF9QT1NUWyJkaXIiXSkpOyI7aToyODtzOjU1OiIoJGluZGF0YSwkYjY0PTEpe2lmKCRiNjQ9PTEpeyRjZD1iYXNlNjRfZGVjb2RlKCRpbmRhdGEpIjtpOjI5O3M6NzU6IiRpbT1zdWJzdHIoJGltLDAsJGkpLnN1YnN0cigkaW0sJGkyKzEsJGk0LSgkaTIrMSkpLnN1YnN0cigkaW0sJGk0KzEyLHN0cmxlbiI7aTozMDtzOjE4OiI8P3BocCBlY2hvICIjISEjIjsiO2k6MzE7czoxMDoiUHVua2VyMkJvdCI7aTozMjtzOjExOiIkc2gzbGxDb2xvciI7aTozMztzOjQ3OiJAY2hyKCgkaFskZVskb11dPDw0KSsoJGhbJGVbKyskb11dKSk7fX1ldmFsKCRkKSI7aTozNDtzOjM2OiJwcGN8bWlkcHx3aW5kb3dzIGNlfG10a3xqMm1lfHN5bWJpYW4iO2k6MzU7czo0MDoiYWJhY2hvfGFiaXpkaXJlY3Rvcnl8YWJvdXR8YWNvb258YWxleGFuYSI7aTozNjtzOjU6IlplZDB4IjtpOjM3O3M6ODoiW2NvZGVyel0iO2k6Mzg7czo4OiJkYXJrbWlueiI7aTozOTtzOjEzOiJSZWFMX1B1TmlTaEVyIjtpOjQwO3M6MTE6IlsgUGhwcm94eSBdIjtpOjQxO3M6NzoiT29OX0JveSI7aTo0MjtzOjIwOiJfX1ZJRVdTVEFURUVOQ1JZUFRFRCI7aTo0MztzOjY6Ik00bGwzciI7aTo0NDtzOjI1OiJjcmVhdGVGaWxlc0ZvcklucHV0T3V0cHV0IjtpOjQ1O3M6ODoiUGFzaGtlbGEiO2k6NDY7czoyMjoiXmNeYV5sXnBeZV5yXl9eZ15lXnJecCI7aTo0NztzOjE0OiI9PSAiYmluZHNoZWxsIiI7aTo0ODtzOjE1OiJXZWJjb21tYW5kZXIgYXQiO2k6NDk7czoyNToiaXNzZXQoJF9QT1NUWydleGVjZ2F0ZSddKSI7aTo1MDtzOjM3OiJmd3JpdGUoJGZwc2V0diwgZ2V0ZW52KCJIVFRQX0NPT0tJRSIpIjtpOjUxO3M6MjA6Ii1JL3Vzci9sb2NhbC9iYW5kbWluIjtpOjUyO3M6MjE6IiRPT08wMDAwMDA9dXJsZGVjb2RlKCI7aTo1MztzOjg6IllFTknHRVJJIjtpOjU0O3M6MTU6ImxldGFrc2VrYXJhbmcoKSI7aTo1NTtzOjY6ImQzbGV0ZSI7aTo1NjtzOjIwOiJlY2hvICI8c2NyaXB0PmFsZXJ0KCI7aTo1NztzOjQzOiJmdW5jdGlvbiB1cmxHZXRDb250ZW50cygkdXJsLCAkdGltZW91dCA9IDUpIjtpOjU4O3M6NDY6Im92ZXJmbG93LXk6c2Nyb2xsO1wiPiIuJGxpbmtzLiRodG1sX21mWydib2R5J10iO2k6NTk7czo2OiIkZXZhMXQiO2k6NjA7czoxNjoiTWFkZSBieSBEZWxvcmVhbiI7aTo2MTtzOjc1OiJpZihlbXB0eSgkX0dFVFsnemlwJ10pIGFuZCBlbXB0eSgkX0dFVFsnZG93bmxvYWQnXSkgJiBlbXB0eSgkX0dFVFsnaW1nJ10pKXsiO2k6NjI7czo2NToic3RyX3JvdDEzKCRiYXNlYVsoJGRpbWVuc2lvbiokZGltZW5zaW9uLTEpIC0gKCRpKiRkaW1lbnNpb24rJGopXSkiO2k6NjM7czo2MDoiUjBsR09EbGhFd0FRQUxNQUFBQUFBUC8vLzV5Y0FNN09ZLy8vblAvL3p2L09uUGYzOS8vLy93QUFBQUFBIjtpOjY0O3M6NDU6InByZWdfbWF0Y2goJyFNSURQfFdBUHxXaW5kb3dzLkNFfFBQQ3xTZXJpZXM2MCI7aTo2NTtzOjQ3OiJwcmVnX21hdGNoKCcvKD88PVJld3JpdGVSdWxlKS4qKD89XFtMXCxSXD0zMDJcXSI7aTo2NjtzOjM3OiIkdXJsID0gJHVybHNbcmFuZCgwLCBjb3VudCgkdXJscyktMSldIjtpOjY3O3M6ODA6IndwX3Bvc3RzIFdIRVJFIHBvc3RfdHlwZSA9ICdwb3N0JyBBTkQgcG9zdF9zdGF0dXMgPSAncHVibGlzaCcgT1JERVIgQlkgYElEYCBERVNDIjtpOjY4O3M6NjU6Imh0dHA6Ly8nLiRfU0VSVkVSWydIVFRQX0hPU1QnXS51cmxkZWNvZGUoJF9TRVJWRVJbJ1JFUVVFU1RfVVJJJ10pIjtpOjY5O3M6MzY6ImZ3cml0ZSgkZixnZXRfZG93bmxvYWQoJF9HRVRbJ3VybCddKSI7aTo3MDtzOjI1OiJpbmlfc2V0KCJtYWdpY19xdW90ZXNfZ3BjIjtpOjcxO3M6MjU6ImluaV9zZXQoJ21hZ2ljX3F1b3Rlc19ncGMiO2k6NzI7czo3NDoiJHBhcmFtIHggJG4uc3Vic3RyICgkcGFyYW0sIGxlbmd0aCgkcGFyYW0pIC0gbGVuZ3RoKCRjb2RlKSVsZW5ndGgoJHBhcmFtKSkiO2k6NzM7czo0NzoiJHRpbWVfc3RhcnRlZC4kc2VjdXJlX3Nlc3Npb25fdXNlci5zZXNzaW9uX2lkKCkiO2k6NzQ7czo0ODoiJHRoaXMtPkYtPkdldENvbnRyb2xsZXIoJF9TRVJWRVJbJ1JFUVVFU1RfVVJJJ10pIjtpOjc1O3M6MjE6Imx1Y2lmZmVyQGx1Y2lmZmVyLm9yZyI7aTo3NjtzOjI3OiJiYXNlNjRfZGVjb2RlKCRjb2RlX3NjcmlwdCkiO2k6Nzc7czoyMToidW5saW5rKCR3cml0YWJsZV9kaXJzIjtpOjc4O3M6NDE6ImZpbGVfZ2V0X2NvbnRlbnRzKHRyaW0oJGZbJF9HRVRbJ2lkJ11dKSk7IjtpOjc5O3M6MTA6IkN5YmVzdGVyOTAiO2k6ODA7czo1NToiaXNfY2FsbGFibGUoJ2V4ZWMnKSBhbmQgIWluX2FycmF5KCdleGVjJywgJGRpc2FibGVmdW5jcyI7aTo4MTtzOjE0OiIkR0xPQkFMU1snX19fXyI7aTo4MjtzOjE4OiJ0aW1lKCkgLSAxMDUyMDAyMDAiO2k6ODM7czoyNzoiL2hvbWUvbXlkaXIvZWdnZHJvcC9maWxlc3lzIjtpOjg0O3M6Mjk6Ii0tRENDRElSIFtsaW5kZXggJFVzZXIoJGkpIDJdIjtpOjg1O3M6MTI6InVuYmluZCBSQVcgLSI7aTo4NjtzOjExOiJwdXRib3QgJGJvdCI7aTo4NztzOjEzOiJwcml2bXNnICRuaWNrIjtpOjg4O3M6MjY6InByb2MgaHR0cDo6Q29ubmVjdCB7dG9rZW59IjtpOjg5O3M6NDM6InNldCBnb29nbGUoZGF0YSkgW2h0dHA6OmRhdGEgJGdvb2dsZShwYWdlKV0iO2k6OTA7czoyMjoiYmluZCBqb2luIC0gKiBnb3Bfam9pbiI7aTo5MTtzOjEzOiJwcml2bXNnICRjaGFuIjtpOjkyO3M6MjQ6InI0YVRjLmRQbnRFL2Z6dFNGMWJIM1JIMCI7aTo5MztzOjEwOiJiaW5kIGRjYyAtIjtpOjk0O3M6MzU6ImtpbGwgLUNITEQgXCRib3RwaWQgPi9kZXYvbnVsbCAyPiYxIjtpOjk1O3M6NTA6InJlZ3N1YiAtYWxsIC0tICwgW3N0cmluZyB0b2xvd2VyICRvd25lcl0gIiIgb3duZXJzIjtpOjk2O3M6MzA6ImJpbmQgZmlsdCAtICJcMDAxQUNUSU9OICpcMDAxIiI7aTo5NztzOjI3OiJheXUgcHIxIHByMiBwcjMgcHI0IHByNSBwcjYiO2k6OTg7czoyMDoic2V0IHByb3RlY3QtdGVsbmV0IDAiO2k6OTk7czozMzoiL3Vzci9sb2NhbC9hcGFjaGUvYmluL2h0dHBkIC1EU1NMIjtpOjEwMDtzOjc2OiIkdHN1MltyYW5kKDAsY291bnQoJHRzdTIpIC0gMSldLiR0c3UxW3JhbmQoMCxjb3VudCgkdHN1MSkgLSAxKV0uJHRzdTJbcmFuZCgwIjtpOjEwMTtzOjY6InVkcDovLyI7aToxMDI7czoxOToiZm9wZW4oJy9ldGMvcGFzc3dkJyI7aToxMDM7czoxMToiZjBWTVJnRUJBUUEiO2k6MTA0O3M6MjM6ImlzX3dyaXRhYmxlKCIvdmFyL3RtcCIpIjtpOjEwNTtzOjM1OiIwZDBhMGQwYTY3NmM2ZjYyNjE2YzIwMjQ2ZDc5NWY3MzZkNyI7aToxMDY7czo5OiJldGFsZm5pemciO2k6MTA3O3M6Mzc6IkpIWnBjMmwwWTI5MWJuUWdQU0FrU0ZSVVVGOURUMDlMU1VWZlYiO2k6MTA4O3M6MTM6ImVkb2NlZF80NmVzYWIiO2k6MTA5O3M6NToiZS8qLi8iO2k6MTEwO3M6Mjg6IkBzZXRjb29raWUoImhpdCIsIDEsIHRpbWUoKSsiO2k6MTExO3M6MjM6ImV2YWwoZmlsZV9nZXRfY29udGVudHMoIjtpOjExMjtzOjQ2OiJmaW5kX2RpcnMoJGdyYW5kcGFyZW50X2RpciwgJGxldmVsLCAxLCAkZGlycyk7IjtpOjExMztzOjY5OiJAY29weSgkX0ZJTEVTW2ZpbGVNYXNzXVt0bXBfbmFtZV0sJF9QT1NUW3BhdGhdLiRfRklMRVNbZmlsZU1hc3NdW25hbWUiO2k6MTE0O3M6NzY6ImludDMyKCgoJHogPj4gNSAmIDB4MDdmZmZmZmYpIF4gJHkgPDwgMikgKyAoKCR5ID4+IDMgJiAweDFmZmZmZmZmKSBeICR6IDw8IDQiO2k6MTE1O3M6MTE6IlZPQlJBIEdBTkdPIjtpOjExNjtzOjU5OiJlY2hvIHkgOyBzbGVlcCAxIDsgfSB8IHsgd2hpbGUgcmVhZCA7IGRvIGVjaG8geiRSRVBMWTsgZG9uZSI7aToxMTc7czo5OiI8c3RkbGliLmgiO2k6MTE4O3M6NDU6ImFkZF9maWx0ZXIoJ3RoZV9jb250ZW50JywgJ19ibG9naW5mbycsIDEwMDAxKSI7aToxMTk7czoxNzoiaXRzb2tub3Byb2JsZW1icm8iO2k6MTIwO3M6Mjg6ImlmIHNlbGYuaGFzaF90eXBlID09ICdwd2R1bXAiO2k6MTIxO3M6NTk6IiRmcmFtZXdvcmsucGx1Z2lucy5sb2FkKCIje3JwY3R5cGUuZG93bmNhc2V9cnBjIiwgb3B0cykucnVuIjtpOjEyMjtzOjU3OiJzdWJwcm9jZXNzLlBvcGVuKCclc2dkYiAtcCAlZCAtYmF0Y2ggJXMnICUgKGdkYl9wcmVmaXgsIHAiO2k6MTIzO3M6NTc6ImFyZ3BhcnNlLkFyZ3VtZW50UGFyc2VyKGRlc2NyaXB0aW9uPWhlbHAsIHByb2c9InNjdHVubmVsIiI7aToxMjQ7czozMjoicnVsZV9yZXEgPSByYXdfaW5wdXQoIlNvdXJjZUZpcmUiO2k6MTI1O3M6NTA6Im9zLnN5c3RlbSgnZWNobyBhbGlhcyBscz0iLmxzLmJhc2giID4+IH4vLmJhc2hyYycpIjtpOjEyNjtzOjQyOiJjb25uZWN0aW9uLnNlbmQoInNoZWxsICIrc3RyKG9zLmdldGN3ZCgpKSsiO2k6MTI3O3M6Njc6InByaW50KCJbIV0gSG9zdDogIiArIGhvc3RuYW1lICsgIiBtaWdodCBiZSBkb3duIVxuWyFdIFJlc3BvbnNlIENvZGUiO2k6MTI4O3M6Njk6ImRlZiBkYWVtb24oc3RkaW49Jy9kZXYvbnVsbCcsIHN0ZG91dD0nL2Rldi9udWxsJywgc3RkZXJyPScvZGV2L251bGwnKSI7aToxMjk7czo4Mzoic3VicHJvY2Vzcy5Qb3BlbihjbWQsIHNoZWxsID0gVHJ1ZSwgc3Rkb3V0PXN1YnByb2Nlc3MuUElQRSwgc3RkZXJyPXN1YnByb2Nlc3MuU1RET1UiO2k6MTMwO3M6NDc6ImlmKGlzc2V0KCRfR0VUWydob3N0J10pJiZpc3NldCgkX0dFVFsndGltZSddKSl7IjtpOjEzMTtzOjE1OiJOSUdHRVJTLk5JR0dFUlMiO2k6MTMyO3M6MjU6IkhUVFAgZmxvb2QgY29tcGxldGUgYWZ0ZXIiO2k6MTMzO3M6MjE6IjgwIC1iICQxIC1pIGV0aDAgLXMgOCI7aToxMzQ7czoxMzoiZXhwbG9pdGNvb2tpZSI7aToxMzU7czoyNjoic3lzdGVtKCJwaHAgLWYgeHBsICRob3N0IikiO2k6MTM2O3M6MTE6InNoIGdvICQxLiR4IjtpOjEzNztzOjEyOiJhejg4cGl4MDBxOTgiO2k6MTM4O3M6MzA6InVubGVzcyhvcGVuKFBGRCwkZ191cGxvYWRfZGIpKSI7aToxMzk7czoxMToid3d3LnQwcy5vcmciO2k6MTQwO3M6Mzk6IiR2YWx1ZSA9fiBzLyUoLi4pL3BhY2soJ2MnLGhleCgkMSkpL2VnOyI7aToxNDE7czoxNDoiVGhlIERhcmsgUmF2ZXIiO2k6MTQyO3M6NjE6IlEzSmxaR2wwSURvZ1ZXNWtaWEpuY205MWJtUWdSR1YyYVd3Z0ptNWljM0E3SUNCOERRbzhZU0JvY21WbVAiO2k6MTQzO3M6Mjk6In1lbHNlaWYoJF9HRVRbJ3BhZ2UnXT09J2Rkb3MnIjtpOjE0NDtzOjE2OiJ7JF9QT1NUWydyb290J119IjtpOjE0NTtzOjM5OiJJL2djWi92WDBBMTBERFJEZzdFemsvZCszKzhxdnFxUzFLMCtBWFkiO2k6MTQ2O3M6NDk6IidodHRwZC5jb25mJywndmhvc3RzLmNvbmYnLCdjZmcucGhwJywnY29uZmlnLnBocCciO2k6MTQ3O3M6NjQ6IkZKM0ZrdVBLRmtVLzUzV0VCbUlhaXBrdG5Md1FXOHo0OWRjMXJiYkxxc3c4ZTY5bDZ2Sk0rMy8xMjR4Vm4rN2wiO2k6MTQ4O3M6MTAyOiJcdTAwM2NcdTAwNjlcdTAwNmRcdTAwNjdcdTAwMjBcdTAwNzNcdTAwNzJcdTAwNjNcdTAwM2RcdTAwMjJcdTAwNjhcdTAwNzRcdTAwNzRcdTAwNzBcdTAwM2FcdTAwMmZcdTAwMmYiO2k6MTQ5O3M6NTU6IjQ2MzgzOTYxMGMwMDBiMDA4MDAxMDBmZmZmZmZmZmZmZmYyMWY5MDQwMTAwMDAwMTAwMmMwMDAiO2k6MTUwO3M6Mzc6IlhWRk5hd0l4RUwwTC9vZGhoWkpvY0YydjJvS0lCU210b250cloiO2k6MTUxO3M6MzY6IjdWaDNXRlBadGo4cGtFQVNFaVFJU0Rzb0NpZ2RSa0NESkFJQyI7aToxNTI7czozNjoiOTdRRVhSQXM5OWM5OEhkam9oOXpaaVRSMTJHYXpvSlVJaUxVIjtpOjE1MztzOjMwOiJmcmVhZCgkZnAsIGZpbGVzaXplKCRmaWNoZXJvKSkiO2k6MTU0O3M6MjQ6IiRiYXNsaWs9JF9QT1NUWydiYXNsaWsnXSI7aToxNTU7czoxODoicHJvY19vcGVuKCdJSFN0ZWFtIjtpOjE1NjtzOjU2OiJceDMxXHhkYlx4ZjdceGUzXHg1M1x4NDNceDUzXHg2YVx4MDJceDg5XHhlMVx4YjBceDY2XHhjZCI7aToxNTc7czo1ODoiQUFBQUFBQUFNQUF3QUJBQUFBZUFVQUFEUUFBQURzQ1FBQUFBQUFBRFFBSUFBREFDZ0FGd0FVQUFFQSI7aToxNTg7czozMToiJGluaVsndXNlcnMnXSA9IGFycmF5KCdyb290JyA9PiI7aToxNTk7czo1ODoiSEozSGp1dGNrb1JmcFhmOUExelFPMkF3RFJyUmV5OXVHdlRlZXo3OXFBYW8xYTByZ3Vka1prUjhSYSI7aToxNjA7czo1MDoiY3VybF9zZXRvcHQoJGNoLCBDVVJMT1BUX1VSTCwgImh0dHA6Ly8kaG9zdDoyMDgyIikiO2k6MTYxO3M6MTY6InN5c3RlbSgid2hvYW1pIikiO2k6MTYyO3M6Mzk6InRhb09JOHV5TGJ6SVNMSU45RnNYZEs3aCsvZGQyWW5JUlVvdEJsTiI7aToxNjM7czo3MjoiYk1GaXViUndJenFpSGhrUGtJYXBUUjNkVkQ1QW9rcThtUkZkTW1rUFVYaldSU2NKL1dmUmZMcFBQYkd5OGd0aVVwbHVvZzBkIjtpOjE2NDtzOjcxOiI1b0huUm42aWRvek54a1U2aGhkYXVMeWJ5NkxJcXhXVlJRZEpuVzFxSEhlTVJsNTlNMlNxdzNEa0JVelY4S0ttMXByWTlXWCI7aToxNjU7czo1ODoiM0hqcXhjbGtaZnBXYjFTd3p3VG1wMUtZREFldytURnQ0SDNqNTlrelc2ZWRNUm5MUDMvdFlTQlBtZiI7aToxNjY7czo2NDoiPCU9ICJcIiAmIG9TY3JpcHROZXQuQ29tcHV0ZXJOYW1lICYgIlwiICYgb1NjcmlwdE5ldC5Vc2VyTmFtZSAlPiI7aToxNjc7czoxMDQ6InNxbENvbW1hbmQuUGFyYW1ldGVycy5BZGQoKChUYWJsZUNlbGwpZGF0YUdyaWRJdGVtLkNvbnRyb2xzWzBdKS5UZXh0LCBTcWxEYlR5cGUuRGVjaW1hbCkuVmFsdWUgPSBkZWNpbWFsIjtpOjE2ODtzOjkwOiJSZXNwb25zZS5Xcml0ZSgiPGJyPiggKSA8YSBocmVmPT90eXBlPTEmZmlsZT0iICYgc2VydmVyLlVSTGVuY29kZShpdGVtLnBhdGgpICYgIlw+IiAmIGl0ZW0iO2k6MTY5O3M6MTExOiJuZXcgRmlsZVN0cmVhbShQYXRoLkNvbWJpbmUoZmlsZUluZm8uRGlyZWN0b3J5TmFtZSwgUGF0aC5HZXRGaWxlTmFtZShodHRwUG9zdGVkRmlsZS5GaWxlTmFtZSkpLCBGaWxlTW9kZS5DcmVhdGUiO2k6MTcwO3M6NzE6IlJlc3BvbnNlLldyaXRlKFNlcnZlci5IdG1sRW5jb2RlKHRoaXMuRXhlY3V0ZUNvbW1hbmQodHh0Q29tbWFuZC5UZXh0KSkpIjtpOjE3MTtzOjgzOiI8JT1SZXF1ZXN0LlNlcnZlcnZhcmlhYmxlcygiU0NSSVBUX05BTUUiKSU+P3R4dHBhdGg9PCU9UmVxdWVzdC5RdWVyeVN0cmluZygidHh0cGF0aCI7aToxNzI7czo2MDoib3V0c3RyICs9IHN0cmluZy5Gb3JtYXQoIjxhIGhyZWY9Jz9mZGlyPXswfSc+ezF9LzwvYT4mbmJzcDsiIjtpOjE3MztzOjM2OiJpbmNsdWRlKCRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXSkiO2k6MTc0O3M6NjE6IlFPaUtXQWdWNjEzTHZzdEtZK1VCOThKWlRSR0loWUJkSHVKQ0F3bStYdGgxNkF3UThYNHRQTWNNVlpRdGUiO2k6MTc1O3M6MzM6InJlLmZpbmRhbGwoZGlydCsnKC4qKScscHJvZ25tKVswXSI7aToxNzY7czo0MDoiZmluZCAvIC1uYW1lIC5zc2ggPiAkZGlyL3NzaGtleXMvc3Noa2V5cyI7aToxNzc7czo2MDoiRlNfY2hrX2Z1bmNfbGliYz0oICQocmVhZGVsZiAtcyAkRlNfbGliYyB8IGdyZXAgX2Noa0BAIHwgYXdrIjtpOjE3ODtzOjQ5OiJMeTgzTVRnM09XUXlNVEprWXpoalltWTBaRFJtWkRBME5HRXpaREUzWmprM1ptSTJOIjtpOjE3OTtzOjk1OiIkZmlsZSA9ICRfRklMRVNbImZpbGVuYW1lIl1bIm5hbWUiXTsgZWNobyAiPGEgaHJlZj1cIiRmaWxlXCI+JGZpbGU8L2E+Ijt9IGVsc2Uge2VjaG8oImVtcHR5Iik7fSI7aToxODA7czo0ODoiREo3VklVN1JJQ1hyNnNFRVYyY0J0SERTT2U5blZkcEVHaEVtdlJWUk5VUmZ3MXdRIjtpOjE4MTtzOjUxOiJMejhfTHk4dkR4OGVfdjctN3U3dTNzN3V6czdPenE2dW5xN2VycTZ1dnE1LWpvNnVqbjUiO2k6MTgyO3M6ODM6ImlWQk9SdzBLR2dvQUFBQU5TVWhFVWdBQUFBb0FBQUFJQ0FZQUFBREEtbTYyQUFBQUFYTlNSMElBcnM0YzZRQUFBQVJuUVUxQkFBQ3hqd3Y4WVFVIjtpOjE4MztzOjcxOiJQMmxDUDFvdVdnMVdjMEVvSkY5RFMxUnFKM05JUVU4blpENVRVejRuYzFsNEp5aytYUTFXTGsxbE9VMTZLQ0l2VDBnOVRVZyI7aToxODQ7czo2OToiRDEwKyszcUJuSGZ5aDFpSTV0WnY2dldpTzFoVlF2RFo1Y3JLVjBMdHV5bzNxdzNjQWdNdXpCNkxYQVJCUzdJZTlCVHhtIjtpOjE4NTtzOjc0OiJlNVdyUFlOTTV1RFVDMndyc1pIeVJMU0RnMXlXU21NelBjeldtRkZBRnFHUjBFVGNyZmE1TVNRZUNjSEJFYzVja3BaUjZDcld2MSI7aToxODY7czo1MToic2VydmVyLjwvcD5cclxuPC9ib2R5PjwvaHRtbD4iO2V4aXQ7fWlmKHByZWdfbWF0Y2goIjtpOjE4NztzOjQzOiJPREUxTkRWalpHUXlaR0V4TkdZNVpqUTRPV0ZsTldFd01qRmtPV0V6TmpFIjtpOjE4ODtzOjc3OiIkRmNobW9kLCRGZGF0YSwkT3B0aW9ucywkQWN0aW9uLCRoZGRhbGwsJGhkZGZyZWUsJGhkZHByb2MsJHVuYW1lLCRpZGQpOnNoYXJlZCI7aToxODk7czoxNToicGhwICIuJHdzb19wYXRoIjtpOjE5MDtzOjYxOiIkcHJvZD0ic3kiLiJzIi4idGVtIjskaWQ9JHByb2QoJF9SRVFVRVNUWydwcm9kdWN0J10pOyR7J2lkJ307IjtpOjE5MTtzOjMwOiJAYXNzZXJ0KCRfUkVRVUVTVFsnUEhQU0VTU0lEJ10iO2k6MTkyO3M6Njg6IlBPU1QgeyRwYXRofXskY29ubmVjdG9yfT9Db21tYW5kPUZpbGVVcGxvYWQmVHlwZT1GaWxlJkN1cnJlbnRGb2xkZXI9IjtpOjE5MztzOjMwOiJmaW5kIC8gLXR5cGUgZiAtbmFtZSAuaHRwYXNzd2QiO2k6MTk0O3M6MzE6ImZpbmQgLyAtdHlwZSBmIC1wZXJtIC0wMjAwMCAtbHMiO2k6MTk1O3M6MzE6ImZpbmQgLyAtdHlwZSBmIC1wZXJtIC0wNDAwMCAtbHMiO2k6MTk2O3M6ODc6IiJhZG1pbjEucGhwIiwgImFkbWluMS5odG1sIiwgImFkbWluMi5waHAiLCAiYWRtaW4yLmh0bWwiLCAieW9uZXRpbS5waHAiLCAieW9uZXRpbS5odG1sIiI7aToxOTc7czo5NzoiQHBhdGgxPSgnYWRtaW4vJywnYWRtaW5pc3RyYXRvci8nLCdtb2RlcmF0b3IvJywnd2ViYWRtaW4vJywnYWRtaW5hcmVhLycsJ2JiLWFkbWluLycsJ2FkbWluTG9naW4vJyI7aToxOTg7czozNjoiY2F0ICR7YmxrbG9nWzJdfSB8IGdyZXAgInJvb3Q6eDowOjAiIjtpOjE5OTtzOjQ2OiI/dXJsPScuJF9TRVJWRVJbJ0hUVFBfSE9TVCddKS51bmxpbmsoUk9PVF9ESVIuIjtpOjIwMDtzOjQ2OiJsb25nIGludDp0KDAsMyk9cigwLDMpOy0yMTQ3NDgzNjQ4OzIxNDc0ODM2NDc7IjtpOjIwMTtzOjc1OiJjcmVhdGVfZnVuY3Rpb24oIiYkIi4iZnVuY3Rpb24iLCIkIi4iZnVuY3Rpb24gPSBjaHIob3JkKCQiLiJmdW5jdGlvbiktMyk7IikiO2k6MjAyO3M6MTY6ImV2YTFmWWxiYWtCY1ZTaXIiO2k6MjAzO3M6ODY6ImZ1bmN0aW9uIGdvb2dsZV9ib3QoKSB7JHNVc2VyQWdlbnQgPSBzdHJ0b2xvd2VyKCRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXSk7aWYoIShzdHJwIjtpOjIwNDtzOjExMzoiWm5WdVkzUnBiMjRnZUdOaktDUndMQ1I0UFRNeE5UTTJNREF3S1hzZ0pHWWdQU0JBWm1sc1pXMTBhVzFsS0NSd0tUc2dKR055YjI0Z1BTQjBhVzFsS0NrZ0xTQWtaanNnSkdRZ1BTQkFabWxzWlY5bloiO2k6MjA1O3M6NzQ6ImNvcHkoJF9GSUxFU1sndXBrayddWyd0bXBfbmFtZSddLCJray8iLmJhc2VuYW1lKCRfRklMRVNbJ3Vwa2snXVsnbmFtZSddKSk7IjtpOjIwNjtzOjY3OiJmb3IgKCR2YWx1ZSkgeyBzLyYvJmFtcDsvZzsgcy88LyZsdDsvZzsgcy8+LyZndDsvZzsgcy8iLyZxdW90Oy9nOyB9IjtpOjIwNztzOjM0OiJpZiAoKCRwZXJtcyAmIDB4QzAwMCkgPT0gMHhDMDAwKSB7IjtpOjIwODtzOjU5OiJpZiAoaXNfY2FsbGFibGUoImV4ZWMiKSBhbmQgIWluX2FycmF5KCJleGVjIiwkZGlzYWJsZWZ1bmMpKSI7aToyMDk7czo0MjoiJGRiX2QgPSBAbXlzcWxfc2VsZWN0X2RiKCRkYXRhYmFzZSwkY29uMSk7IjtpOjIxMDtzOjUxOiJTZW5kIHRoaXMgZmlsZTogPElOUFVUIE5BTUU9InVzZXJmaWxlIiBUWVBFPSJmaWxlIj4iO2k6MjExO3M6MjI6ImZ3cml0ZSAoJGZwLCAiJHlhemkiKTsiO2k6MjEyO3M6NTI6Im1hcCB7IHJlYWRfc2hlbGwoJF8pIH0gKCRzZWxfc2hlbGwtPmNhbl9yZWFkKDAuMDEpKTsiO2k6MjEzO3M6Mjc6IjI+JjEgMT4mMiIgOiAiIDE+JjEgMj4mMSIpOyI7aToyMTQ7czo1OToiZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJG9sZF9uYW1lLCAkbmFtZSwiO2k6MjE1O3M6Njk6Il9fYWxsX18gPSBbIlNNVFBTZXJ2ZXIiLCJEZWJ1Z2dpbmdTZXJ2ZXIiLCJQdXJlUHJveHkiLCJNYWlsbWFuUHJveHkiXSI7aToyMTY7czoyOToiaWYgKGlzX2ZpbGUoIi90bXAvJGVraW5jaSIpKXsiO2k6MjE3O3M6Mzg6ImlmKCRjbWQgIT0gIiIpIHByaW50IFNoZWxsX0V4ZWMoJGNtZCk7IjtpOjIxODtzOjI2OiIkY21kID0gKCRfUkVRVUVTVFsnY21kJ10pOyI7aToyMTk7czo1NToiJHVwbG9hZGZpbGUgPSAkcnBhdGguIi8iIC4gJF9GSUxFU1sndXNlcmZpbGUnXVsnbmFtZSddOyI7aToyMjA7czozMzoiaWYgKCRmdW5jYXJnID1+IC9ecG9ydHNjYW4gKC4qKS8pIjtpOjIyMTtzOjQ2OiI8JSBGb3IgRWFjaCBWYXJzIEluIFJlcXVlc3QuU2VydmVyVmFyaWFibGVzICU+IjtpOjIyMjtzOjQ4OiJpZignJz09KCRkZj1AaW5pX2dldCgnZGlzYWJsZV9mdW5jdGlvbnMnKSkpe2VjaG8iO2k6MjIzO3M6Mzg6IiRmaWxlbmFtZSA9ICRiYWNrdXBzdHJpbmcuIiRmaWxlbmFtZSI7IjtpOjIyNDtzOjU5OiI8JSNAfl5Id0FBQUE9PUAjQCZEbmt3S3gvf1J/VU5AI0Ambng5UGQ7KEAjQCZ1Z2NBQUE9PV4jfkAlPiI7aToyMjU7czoyNDoiJGZ1bmN0aW9uKCRfUE9TVFsnY21kJ10pIjtpOjIyNjtzOjI5OiJlY2hvICJGSUxFIFVQTE9BREVEIFRPICRkZXoiOyI7aToyMjc7czo2ODoiaWYgKCFAaXNfbGluaygkZmlsZSkgJiYgKCRyID0gcmVhbHBhdGgoJGZpbGUpKSAhPSBGQUxTRSkgJGZpbGUgPSAkcjsiO2k6MjI4O3M6ODc6IlVOSU9OIFNFTEVDVCAnMCcgLCAnPD8gc3lzdGVtKFwkX0dFVFtjcGNdKTtleGl0OyA/PicgLDAgLDAgLDAgLDAgSU5UTyBPVVRGSUxFICckb3V0ZmlsZSI7aToyMjk7czo4OToiaWYobW92ZV91cGxvYWRlZF9maWxlKCRfRklMRVNbImZpYyJdWyJ0bXBfbmFtZSJdLGdvb2RfbGluaygiLi8iLiRfRklMRVNbImZpYyJdWyJuYW1lIl0pKSkiO2k6MjMwO3M6NzI6ImNvbm5lY3QoU09DS0VULCBzb2NrYWRkcl9pbigkQVJHVlsxXSwgaW5ldF9hdG9uKCRBUkdWWzBdKSkpIG9yIGRpZSBwcmludCI7aToyMzE7czo1MjoiZWxzZWlmKEBpc193cml0YWJsZSgkRk4pICYmIEBpc19maWxlKCRGTikpICR0bXBPdXRNRiI7aToyMzI7czo2ODoid2hpbGUgKCRyb3cgPSBteXNxbF9mZXRjaF9hcnJheSgkcmVzdWx0LE1ZU1FMX0FTU09DKSkgcHJpbnRfcigkcm93KTsiO2k6MjMzO3M6MTg6IiRmZSgiJGNtZCAgMj4mMSIpOyI7aToyMzQ7czo2OToic2VuZChTT0NLNSwgJG1zZywgMCwgc29ja2FkZHJfaW4oJHBvcnRhLCAkaWFkZHIpKSBhbmQgJHBhY290ZXN7b30rKzs7IjtpOjIzNTtzOjY5OiJ9IGVsc2lmICgkc2VydmFyZyA9fiAvXlw6KC4rPylcISguKz8pXEAoLis/KSBQUklWTVNHICguKz8pIFw6KC4rKS8pIHsiO2k6MjM2O3M6Mzc6ImVsc2VpZihmdW5jdGlvbl9leGlzdHMoInNoZWxsX2V4ZWMiKSkiO2k6MjM3O3M6NzE6InN5c3RlbSgiJGNtZCAxPiAvdG1wL2NtZHRlbXAgMj4mMTsgY2F0IC90bXAvY21kdGVtcDsgcm0gL3RtcC9jbWR0ZW1wIik7IjtpOjIzODtzOjUyOiIkX0ZJTEVTWydwcm9iZSddWydzaXplJ10sICRfRklMRVNbJ3Byb2JlJ11bJ3R5cGUnXSk7IjtpOjIzOTtzOjg3OiIkcmE0NCAgPSByYW5kKDEsOTk5OTkpOyRzajk4ID0gInNoLSRyYTQ0IjskbWwgPSAiJHNkOTgiOyRhNSA9ICRfU0VSVkVSWydIVFRQX1JFRkVSRVInXTsiO2k6MjQwO3M6NDA6InNldGNvb2tpZSggIm15c3FsX3dlYl9hZG1pbl91c2VybmFtZSIgKTsiO2k6MjQxO3M6NjY6Im15c3FsX3F1ZXJ5KCJDUkVBVEUgVEFCTEUgYHhwbG9pdGAgKGB4cGxvaXRgIExPTkdCTE9CIE5PVCBOVUxMKSIpOyI7aToyNDI7czo2NjoicGFzc3RocnUoICRiaW5kaXIuIm15c3FsZHVtcCAtLXVzZXI9JFVTRVJOQU1FIC0tcGFzc3dvcmQ9JFBBU1NXT1JEIjtpOjI0MztzOjg0OiI8YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPXZpZXdTY2hlbWEmZGJuYW1lPSRkYm5hbWUmdGFibGVuYW1lPSR0YWJsZW5hbWUnPlNjaGVtYTwvYT4iO2k6MjQ0O3M6NjA6ImlmKGdldF9tYWdpY19xdW90ZXNfZ3BjKCkpJHNoZWxsT3V0PXN0cmlwc2xhc2hlcygkc2hlbGxPdXQpOyI7aToyNDU7czo1MToiJG1lc3NhZ2UgPSBlcmVnX3JlcGxhY2UoIiU1QyUyMiIsICIlMjIiLCAkbWVzc2FnZSk7IjtpOjI0NjtzOjQ3OiJpZiAoIWRlZmluZWQkcGFyYW17Y21kfSl7JHBhcmFte2NtZH09ImxzIC1sYSJ9OyI7aToyNDc7czoyMzoic2hlbGxfZXhlYygndW5hbWUgLWEnKTsiO2k6MjQ4O3M6OTE6ImlmIChtb3ZlX3VwbG9hZGVkX2ZpbGUoJF9GSUxFU1snZmlsYSddWyd0bXBfbmFtZSddLCAkY3VyZGlyLiIvIi4kX0ZJTEVTWydmaWxhJ11bJ25hbWUnXSkpIHsiO2k6MjQ5O3M6ODM6ImlmIChlbXB0eSgkX1BPU1RbJ3dzZXInXSkpIHskd3NlciA9ICJ3aG9pcy5yaXBlLm5ldCI7fSBlbHNlICR3c2VyID0gJF9QT1NUWyd3c2VyJ107IjtpOjI1MDtzOjM2OiI8JT1lbnYucXVlcnlIYXNodGFibGUoInVzZXIubmFtZSIpJT4iO2k6MjUxO3M6NjE6IlB5U3lzdGVtU3RhdGUuaW5pdGlhbGl6ZShTeXN0ZW0uZ2V0UHJvcGVydGllcygpLCBudWxsLCBhcmd2KTsiO2k6MjUyO3M6MzU6ImlmKCEkd2hvYW1pKSR3aG9hbWk9ZXhlYygid2hvYW1pIik7IjtpOjI1MztzOjM2OiJzaGVsbF9leGVjKCRfUE9TVFsnY21kJ10gLiAiIDI+JjEiKTsiO2k6MjU0O3M6NTM6IlBuVmxrV002MyFAI0AmZEt4fm5NRFdNfkR/L0Vzbn54fzZEQCNAJlB+fiw/blksV1B7UG9qIjtpOjI1NTtzOjI1OiIhJF9SRVFVRVNUWyJjOTlzaF9zdXJsIl0pIjtpOjI1NjtzOjYwOiIoZXJlZygnXltbOmJsYW5rOl1dKmNkW1s6Ymxhbms6XV0qJCcsICRfUkVRVUVTVFsnY29tbWFuZCddKSkiO2k6MjU3O3M6MjM6IiRsb2dpbj1AcG9zaXhfZ2V0dWlkKCk7IjtpOjI1ODtzOjE4OiJOZSB1ZGFsb3MgemFncnV6aXQiO2k6MjU5O3M6Mzg6InN5c3RlbSgidW5zZXQgSElTVEZJTEU7IHVuc2V0IFNBVkVISVNUIjtpOjI2MDtzOjMxOiI8SFRNTD48SEVBRD48VElUTEU+Y2dpLXNoZWxsLnB5IjtpOjI2MTtzOjM2OiJleGVjbCgiL2Jpbi9zaCIsInNoIiwiLWkiLChjaGFyKikwKTsiO2k6MjYyO3M6MTQ6ImV4ZWMoInJtIC1yIC1mIjtpOjI2MztzOjI2OiJuY2Z0cHB1dCAtdSAkZnRwX3VzZXJfbmFtZSI7aToyNjQ7czoyOToiJGFbaGl0c10nKTsgXHJcbiNlbmRxdWVyeVxyXG4iO2k6MjY1O3M6MjM6Inske3Bhc3N0aHJ1KCRjbWQpfX08YnI+IjtpOjI2NjtzOjQyOiIkYmFja2Rvb3ItPmNjb3B5KCRjZmljaGllciwkY2Rlc3RpbmF0aW9uKTsiO2k6MjY3O3M6NTk6IiRpemlubGVyMj1zdWJzdHIoYmFzZV9jb252ZXJ0KEBmaWxlcGVybXMoJGZuYW1lKSwxMCw4KSwtNCk7IjtpOjI2ODtzOjUwOiJmb3IoOyRwYWRkcj1hY2NlcHQoQ0xJRU5ULCBTRVJWRVIpO2Nsb3NlIENMSUVOVCkgeyI7aToyNjk7czo4OiJBc21vZGV1cyI7aToyNzA7czozNzoicGFzc3RocnUoZ2V0ZW52KCJIVFRQX0FDQ0VQVF9MQU5HVUFHRSI7aToyNzE7czozOToiJF9fX189QGd6aW5mbGF0ZSgkX19fXykpe2lmKGlzc2V0KCRfUE9TIjtpOjI3MjtzOjg1OiIkc3Viaj11cmxkZWNvZGUoJF9HRVRbJ3N1J10pOyRib2R5PXVybGRlY29kZSgkX0dFVFsnYm8nXSk7JHNkcz11cmxkZWNvZGUoJF9HRVRbJ3NkJ10pIjtpOjI3MztzOjMyOiIka2E9Jzw/Ly9CUkUnOyRrYWthPSRrYS4nQUNLLy8/PiI7aToyNzQ7czo0MzoibXVpV3I0VG1MYVB3UW9KRVNnTG9BblFTdjkzYXhxaGpSbU9BRE1vRjNaTCI7aToyNzU7czozMToiQ2F1dGFtIGZpc2llcmVsZSBkZSBjb25maWd1cmFyZSI7aToyNzY7czoxMjoiQlJVVEVGT1JDSU5HIjtpOjI3NztzOjE4OiJwd2QgPiBHZW5lcmFzaS5kaXIiO2k6Mjc4O3M6NTY6InhoIC1zICIvdXNyL2xvY2FsL2FwYWNoZS9zYmluL2h0dHBkIC1EU1NMIiAuL2h0dHBkIC1tICQxIjtpOjI3OTtzOjQ4OiIkYT0oc3Vic3RyKHVybGVuY29kZShwcmludF9yKGFycmF5KCksMSkpLDUsMSkuYykiO2k6MjgwO3M6Nzk6IjRZVFppTnpNeU0yVXdNakExWkdReE5UYzBaR0ZrTVdaaVpUMGlYSGcyWmlJN0pHMDVOemswWVRZME9XRXpZV1F6WkRnNU9UQmxPV0ppWWoiO2k6MjgxO3M6MjE6IiFAJF9DT09LSUVbJHNlc3NkdF9rXSI7aToyODI7czo1ODoiU0VMRUNUIDEgRlJPTSBteXNxbC51c2VyIFdIRVJFIGNvbmNhdChgdXNlcmAsICdAJywgYGhvc3RgKSI7aToyODM7czo5MzoiSWlrN0RRcGpiMjV1WldOMEtGTlBRMHRGVkN3Z0pIQmhaR1J5S1NCOGZDQmthV1VvSWtWeWNtOXlPaUFrSVZ4dUlpazdEUXB2Y0dWdUtGTlVSRWxPTENBaVBpWlRUIjtpOjI4NDtzOjQ0OiJjb3B5KCRfRklMRVNbeF1bdG1wX25hbWVdLCRfRklMRVNbeF1bbmFtZV0pKSI7aToyODU7czo0OToialZOdFQ5dEFEUDQrYWY4aFF4TnRCVzBoZ1FRRWJLdEtZUHN5b1E3MnBZbXFhMkthbyI7aToyODY7czo4NjoiMGlaR2x6Y0d4aGVUcHViMjVsSWo0OFlTQm9jbVZtUFNKb2RIUndPaTh2ZDNkM0xtcHZiMjFzWVhoMFl5NWpiMjBpUGtwdmIyMXNZVmhVUXlCT1pYZHoiO2k6Mjg3O3M6NTQ6IiRNZXNzYWdlU3ViamVjdCA9IGJhc2U2NF9kZWNvZGUoJF9QT1NUWyJtc2dzdWJqZWN0Il0pOyI7aToyODg7czoxNzoicmVuYW1lKCJ3c28ucGhwIiwiO2k6Mjg5O3M6MTAzOiJkSFV1MGRKV1ZzZ0RlMnJmZTRnV0J0aUxWYzVqa3BvMUxUOExxbWVYZVd6U1hWOUY0SUJVOGkzQmNvZUFyUG9QbW5nUi9DWWI3NTJmY1M5cEdBampGRkgwamRJS3ZqNGhNWk5ueVZVIjtpOjI5MDtzOjg4OiJJV2x1SGpLcHg3L1hHcUtjSDFHSEUyMDlMeHlpTkt6NVRLQ296SlhpcXVOdE9BeDNEeDRHS3pOVm5mVVNSL3NIOENUQWw1cTd3b2Rhb2pPM3YrdkNEZUdFIjtpOjI5MTtzOjEzNToiNDBVZUNLZEI4RU9xbVhDS2VHM3FVMFlpQmpzR1dyVUhtd0xHUWdyTm91eVhFSjlONHRqVnZyU1FBRkRxRG5WSEc5dkRaeUJGdnc0Y1RHSm9xL1BGQ1VzeklTdENUWXoyWmJMa1RLd3ZlTVZzTk9BZktMSTJuQW9rems5STNaamw3cEFlQmpuIjtpOjI5MjtzOjg4OiIkcmVkaXJlY3RVUkw9J2h0dHA6Ly8nLiRyU2l0ZS4kX1NFUlZFUlsnUkVRVUVTVF9VUkknXTtpZihpc3NldCgkX1NFUlZFUlsnSFRUUF9SRUZFUkVSJ10pIjtpOjI5MztzOjQwOiIkZmlsZXBhdGg9QHJlYWxwYXRoKCRfUE9TVFsnZmlsZXBhdGgnXSk7IjtpOjI5NDtzOjQyOiJXb3JrZXJfR2V0UmVwbHlDb2RlKCRvcERhdGFbJ3JlY3ZCdWZmZXInXSkiO2k6Mjk1O3M6Mjc6ImRlZmF1bHRfYWN0aW9uID0gJ0ZpbGVzTWFuJyI7aToyOTY7czoyMToiRmFUYUxpc1RpQ3pfRnggRngyOVNoIjtpOjI5NztzOjEzOiJ3NGNrMW5nIHNoZWxsIjtpOjI5ODtzOjIyOiJwcml2YXRlIFNoZWxsIGJ5IG00cmNvIjtpOjI5OTtzOjIwOiJTaGVsbCBieSBNYXdhcl9IaXRhbSI7aTozMDA7czoxNjoiV2ViIFNoZWxsIGJ5IG9SYiI7aTozMDE7czoxNzoiV2ViIFNoZWxsIGJ5IGJvZmYiO2k6MzAyO3M6NzE6IkhCeWIzUnZLU0I4ZkNCa2FXVW9Ja1Z5Y205eU9pQWtJVnh1SWlrN0RRcGpiMjV1WldOMEtGTlBRMHRGVkN3Z0pIQmhaR1J5IjtpOjMwMztzOjg3OiJXVEpUa0NvbDBYNEF1d0pTZkZodGZQNWRPZ241NjFpbCt3a3prcUNHOWRmVDl6cWMyNzR2ZUllU2Q0MUN4VUl2SEZuK3RXNzdvRTNvaHFTdjAxQlh6VDAiO2k6MzA0O3M6NTI6ImFIUjBjRG92TDJvdFpHVjJMbkoxTDJsdVpHVjRMbkJvY0Q5amNHNDlabkpoYldWelpXeHMiO2k6MzA1O3M6MTIwOiJUc05DaUFnSUNCemFXNHVjMmx1WDJaaGJXbHNlU0E5SUVGR1gwbE9SVlE3RFFvZ0lDQWdjMmx1TG5OcGJsOXdiM0owSUQwZ2FIUnZibk1vWVhSdmFTaGhjbWQyV3pKZEtTazdEUW9nSUNBZ2MybHVMbk5wYmw5aFoiO2k6MzA2O3M6MTI3OiJxaERUWklwTWNCMXhCb2szMzJCamNjZlBYcTBRc1pVL2c0ZWFwQnhUNWdpdDFyR2RLdHdmMXJ0OU9PaWNjL2hUbHBlRm1FalJSa1dHV1RKVGtDb2wwWDRBdXdKU2ZGaHRmUDVkT2duNTYxaWwrd2t6a3FDRzlkZlQ5enFjMjc0IjtpOjMwNztzOjEyOiJQSFBTSEVMTC5QSFAiO2k6MzA4O3M6NDY6InJvdW5kKDArOTgzMC40Kzk4MzAuNCs5ODMwLjQrOTgzMC40Kzk4MzAuNCkpPT0iO2k6MzA5O3M6MTEwOiJ2enY2ZCtpT3Z0a2QzOFRsSHU4bVFhdlhkbkpDYnBRY3BYaE5iYkxtWk9xTW9wRFplTmFsYitWS2xlZGhDanBWQU1RU1FueFZJRUNRQWZMdTVLZ0xtd0I2ZWhRUUdOU0JZanBnOWc1R2RCaWhYbyI7aTozMTA7czo2NToiaWYgKGVyZWcoJ15bWzpibGFuazpdXSpjZFtbOmJsYW5rOl1dKyhbXjtdKykkJywgJGNvbW1hbmQsICRyZWdzKSkiO2k6MzExO3M6NzY6IkxTMGdSSFZ0Y0ROa0lHSjVJRkJwY25Wc2FXNHVVRWhRSUZkbFluTm9NMnhzSUhZeExqQWdZekJrWldRZ1lua2djakJrY2pFZ09rdz0iO2k6MzEyO3M6MTQyOiI1amIyMGlLVzl5SUhOMGNtbHpkSElvSkhKbFptVnlaWElzSW1Gd2IzSjBJaWtnYjNJZ2MzUnlhWE4wY2lna2NtVm1aWEpsY2l3aWJtbG5iV0VpS1NCdmNpQnpkSEpwYzNSeUtDUnlaV1psY21WeUxDSjNaV0poYkhSaElpa2diM0lnYzNSeWFYTjBjaWdrIjtpOjMxMztzOjIxOiJldmFsKGJhc2U2NF9kZWNvZGUoJF8iO2k6MzE0O3M6NDg6Indzb0V4KCd0YXIgY2Z6diAnIC4gZXNjYXBlc2hlbGxhcmcoJF9QT1NUWydwMiddKSI7aTozMTU7czo4NjoiPG5vYnI+PGI+JGNkaXIkY2ZpbGU8L2I+ICgiLiRmaWxlWyJzaXplX3N0ciJdLiIpPC9ub2JyPjwvdGQ+PC90cj48Zm9ybSBuYW1lPWN1cnJfZmlsZT4iO2k6MzE2O3M6MTY6IkNvbnRlbnQtVHlwZTogJF8iO2k6MzE3O3M6MTQxOiI8L3RkPjx0ZCBpZD1mYT5bIDxhIHRpdGxlPVwiSG9tZTogJyIuaHRtbHNwZWNpYWxjaGFycyhzdHJfcmVwbGFjZSgiXCIsICRzZXAsIGdldGN3ZCgpKSkuIicuXCIgaWQ9ZmEgaHJlZj1cImphdmFzY3JpcHQ6Vmlld0RpcignIi5yYXd1cmxlbmNvZGUiO2k6MzE4O3M6MTA3OiJDUWJvR2w3Zit4Y0F5VXlzeGI1bUtTNmtBV3NuUkxkUytzS2dHb1pXZHN3TEZKWlY4dFZ6WHNxK21lU1BITXhUSTNuU1VCNGZKMnZSM3IzT252WHROQXFONnduL0R0VFRpK0N1MVVPSndOTCI7aTozMTk7czozOToiV1NPc2V0Y29va2llKG1kNSgkX1NFUlZFUlsnSFRUUF9IT1NUJ10pIjtpOjMyMDtzOjYxOiJKSFpwYzJsMFkyOTFiblFnUFNBa1NGUlVVRjlEVDA5TFNVVmZWa0ZTVTFzaWRtbHphWFJ6SWwwN0lHbG1LIjtpOjMyMTtzOjEyNjoiWDFORlUxTkpUMDViSjNSNGRHRjFkR2hwYmlkZElEMGdkSEoxWlRzTkNpQWdJQ0JwWmlBb0pGOVFUMU5VV3lkeWJTZGRLU0I3RFFvZ0lDQWdJQ0J6WlhSamIyOXJhV1VvSjNSNGRHRjFkR2hmSnk0a2NtMW5jbTkxY0N3Z2JXIjtpOjMyMjtzOjM5OiJKQCFWckAqJlJIUnd+Skx3Lkd8eGxobkxKfj8xLmJ3T2J4YlB8IVYiO2k6MzIzO3M6MTE6InplaGlyaGFja2VyIjtpOjMyNDtzOjE2MToiKCciJywnJnF1b3Q7JywkZm4pKS4nIjtkb2N1bWVudC5saXN0LnN1Ym1pdCgpO1wnPicuaHRtbHNwZWNpYWxjaGFycyhzdHJsZW4oJGZuKT5mb3JtYXQ/c3Vic3RyKCRmbiwwLGZvcm1hdC0zKS4nLi4uJzokZm4pLic8L2E+Jy5zdHJfcmVwZWF0KCcgJyxmb3JtYXQtc3RybGVuKCRmbikiO2k6MzI1O3M6MTYwOiJwcmludCgoaXNfcmVhZGFibGUoJGYpICYmIGlzX3dyaXRlYWJsZSgkZikpPyI8dHI+PHRkPiIudygxKS5iKCJSIi53KDEpLmZvbnQoJ3JlZCcsJ1JXJywzKSkudygxKTooKChpc19yZWFkYWJsZSgkZikpPyI8dHI+PHRkPiIudygxKS5iKCJSIikudyg0KToiIikuKChpc193cml0YWJsIjtpOjMyNjtzOjczOiJSMGxHT0RsaEZBQVVBS0lBQUFBQUFQLy8vOTNkM2NEQXdJYUdoZ1FFQlAvLy93QUFBQ0g1QkFFQUFBWUFMQUFBQUFBVUFCUUFBIjtpOjMyNztzOjkwOiI8JT1SZXF1ZXN0LlNlcnZlclZhcmlhYmxlcygic2NyaXB0X25hbWUiKSU+P0ZvbGRlclBhdGg9PCU9U2VydmVyLlVSTFBhdGhFbmNvZGUoRm9sZGVyLkRyaXYiO2k6MzI4O3M6MTEzOiJtOTFkQ3dnSkdWdmRYUXBPdzBLYzJWc1pXTjBLQ1J5YjNWMElEMGdKSEpwYml3Z2RXNWtaV1lzSUNSbGIzVjBJRDBnSkhKcGJpd2dNVEl3S1RzTkNtbG1JQ2doSkhKdmRYUWdJQ1ltSUNBaEpHVnZkWCI7aTozMjk7czozODoiUm9vdFNoZWxsIScpO3NlbGYubG9jYXRpb24uaHJlZj0naHR0cDoiO2k6MzMwO3M6MTE1OiJUUlVGRVJGSXNNU2s3RFFwaWFXNWtLRk1zYzI5amEyRmtaSEpmYVc0b0pFeEpVMVJGVGw5UVQxSlVMRWxPUVVSRVVsOUJUbGtwS1NCOGZDQmthV1VnSWtOaGJuUWdiM0JsYmlCd2IzSjBYRzRpT3cwS2JHIjtpOjMzMTtzOjc2OiJhIGhyZWY9Ijw/ZWNobyAiJGZpc3Rpay5waHA/ZGl6aW49JGRpemluLy4uLyI/PiIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uIjtpOjMzMjtzOjEyNzoiQ0IyYVRacElERXdNalF0RFFvakxTMHRMUzB0TFMwdExTMHRMUzB0TFMwdExTMHRMUzB0TFMwdExTMHRMUzB0TFMwdExTMHRMUzB0TFMwdExTMHRMUzB0TFMwdExTMHRMUzB0TFMwdExTMHRMUzB0TFMwdExRMEtJM0psY1hWcCI7aTozMzM7czo1NToiSXlFdmRYTnlMMkpwYmk5d1pYSnNEUW9rVTBoRlRFdzlJaTlpYVc0dlltRnphQ0F0YVNJN0RRcCI7aTozMzQ7czo4ODoiQ1Jic2tFSVMreWJLQXdjNi9PQjFqVThZMFlJTVZVaHhoYU9Jc0hBQ0J5RDB3TUFOT0hxWTVZNDhndWlCbkNoa3dQWU5Ua3hkQlJWUlpMSEZrb2pZOTZJSSI7aTozMzU7czozMToicygpLmcoKS5zKCkucygpLmcoKS5zKCkucygpLmcoKSI7aTozMzY7czoxMjI6Im50KShkaXNrX3RvdGFsX3NwYWNlKGdldGN3ZCgpKS8oMTAyNCoxMDI0KSkgLiAiTWIgIiAuICJGcmVlIHNwYWNlICIgLiAoaW50KShkaXNrX2ZyZWVfc3BhY2UoZ2V0Y3dkKCkpLygxMDI0KjEwMjQpKSAuICJNYiA8IjtpOjMzNztzOjM3OiJrbGFzdmF5di5hc3A/eWVuaWRvc3lhPTwlPWFrdGlma2xhcyU+IjtpOjMzODtzOjQ0OiJXVCtQe35FVzBFclBPdG5VQCNAJl5sXnNQMWxkbnlAI0AmbnNrK3IwLEdUKyI7aTozMzk7czoxMTU6Im1wdHkoJF9QT1NUWyd1ciddKSkgJG1vZGUgfD0gMDQwMDsgaWYgKCFlbXB0eSgkX1BPU1RbJ3V3J10pKSAkbW9kZSB8PSAwMjAwOyBpZiAoIWVtcHR5KCRfUE9TVFsndXgnXSkpICRtb2RlIHw9IDAxMDAiO2k6MzQwO3M6MTA1OiIvMHRWU0cvU3V2MFVyL2hhVVlBZG4zak1Rd2Jib2NHZmZBZUMyOUJOOXRtQmlKZFYxbGsrallEVTkyQzk0amR0RGlmK3hPWWpHNkNMaHgzMVVvOXg5L2VBV2dzQks2MGtLMm1Md3F6cWQiO2k6MzQxO3M6ODY6ImNybGYuJ3VubGluaygkbmFtZSk7Jy4kY3JsZi4ncmVuYW1lKCJ+Ii4kbmFtZSwgJG5hbWUpOycuJGNybGYuJ3VubGluaygiZ3JwX3JlcGFpci5waHAiIjtpOjM0MjtzOjEwNjoiOXRaU0IwYnlCeU5UY2djMmhsYkd3Z0ppWWdMMkpwYmk5aVlYTm9JQzFwSWlrN0RRb2dJQ0JsYkhObERRb2dJQ0JtY0hKcGJuUm1LSE4wWkdWeWNpd2lVMjl5Y25raUtUc05DaUFnSUdOcyI7aTozNDM7czoxNToiRFhfSGVhZGVyX2RyYXduIjtpOjM0NDtzOjMwOiJbQXY0YmZDWUNTLHhLV2skK1RrVVMseG5HZEF4W08iO2k6MzQ1O3M6MTExOiJCREFRa0pDUXdMREJnTkRSZ3lJUndoTWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qTC93QUFSQ0FBUUFCQURBU0lBQWhFQkEiO2k6MzQ2O3M6MTE6ImN0c2hlbGwucGhwIjtpOjM0NztzOjQ3OiJFeGVjdXRlZCBjb21tYW5kOiA8Yj48Zm9udCBjb2xvcj0jZGNkY2RjPlskY21kXSI7aTozNDg7czoxMzoiV1NDUklQVC5TSEVMTCI7aTozNDk7czo3OiJjYXN1czE1IjtpOjM1MDtzOjc2OiJSMGxHT0RsaEpnQVdBSUFBQUFBQUFQLy8veUg1QkFVVUFBRUFMQUFBQUFBbUFCWUFBQUl2akkrcHkrMFBGNGkwZ1Z2enVWeFhEbm9RIjtpOjM1MTtzOjE3OiJhZG1pbkBzcHlncnVwLm9yZyI7aTozNTI7czoxNDoidGVtcF9yNTdfdGFibGUiO2k6MzUzO3M6MTc6IiRjOTlzaF91cGRhdGVmdXJsIjtpOjM1NDtzOjk6IkJ5IFBzeWNoMCI7aTozNTU7czoxNjoiYzk5ZnRwYnJ1dGVjaGVjayI7aTozNTY7czoxMDE6IjdUTUdBSFk1S2FNOW8zN1cvR1EvZnJGSmV0ZnFsUkdPNkZTUlRNbTdJTFNtMzVvNXo0K3YwbWNmNEthSGdLUzVZMTdlcXF2RDJtbU44Tnp0ZXlwbE5kNldPd3JRVks0NDVKL3kwIjtpOjM1NztzOjg0OiI8dGV4dGFyZWEgbmFtZT1cInBocGV2XCIgcm93cz1cIjVcIiBjb2xzPVwiMTUwXCI+Ii5AJF9QT1NUWydwaHBldiddLiI8L3RleHRhcmVhPjxicj4iO2k6MzU4O3M6OTQ6IiRpbmZvIC49ICgoJHBlcm1zICYgMHgwMDQwKSA/KCgkcGVybXMgJiAweDA4MDApID8gJ3MnIDogJ3gnICkgOigoJHBlcm1zICYgMHgwODAwKSA/ICdTJyA6ICctJykiO2k6MzU5O3M6MzA6IiRyYW5kX3dyaXRhYmxlX2ZvbGRlcl9mdWxscGF0aCI7aTozNjA7czoxNzoicFZ4YmorTFl0ZjRyUVQvTVIiO2k6MzYxO3M6MTA6IkRyLmFib2xhbGgiO2k6MzYyO3M6NjoiSyFMTDNyIjtpOjM2MztzOjc6Ik1ySGF6ZW0iO2k6MzY0O3M6MjY6Ik9MQjpQUk9EVUNUOk9OTElORV9CQU5LSU5HIjtpOjM2NTtzOjEwOiJCWSBNTU5CT0JaIjtpOjM2NjtzOjE2OiJDb25uZWN0QmFja1NoZWxsIjt9"));
$gX_DBShe = unserialize(base64_decode("YTozMjp7aTowO3M6MTI6Il1bcm91bmQoMCldKCI7aToxO3M6MjY6ImFuZHJvaWR8YXZhbnRnb3xibGFja2JlcnJ5IjtpOjI7czo4OiIvL05PbmFNRSI7aTozO3M6MzI6IjwhLS0jZXhlYyBjbWQ9IiRIVFRQX0FDQ0VQVCIgLS0+IjtpOjQ7czo1OiI2ZXNhYiI7aTo1O3M6NjoiU3BhbWVyIjtpOjY7czo3OiJEZWZhY2VyIjtpOjc7czo3OiJ3ZWJyMDB0IjtpOjg7czo2OiJrMGQuY2MiO2k6OTtzOjM0OiIvcHJvYy9zeXMva2VybmVsL3lhbWEvcHRyYWNlX3Njb3BlIjtpOjEwO3M6NzoibWlsdzBybSI7aToxMTtzOjY6ImxzIC1sYSI7aToxMjtzOjEwOiJkaXIgL09HIC9YIjtpOjEzO3M6MTk6InByaW50ICJTcGFtZWQnPjxicj4iO2k6MTQ7czoxNToiL2V0Yy9uYW1lZC5jb25mIjtpOjE1O3M6MTA6Ii9ldGMvaHR0cGQiO2k6MTY7czoxMToiL3Zhci9jcGFuZWwiO2k6MTc7czoxMToiL2V0Yy9wYXNzd2QiO2k6MTg7czo4OiJTaGVsbCBPayI7aToxOTtzOjExOiJteXNoZWxsZXhlYyI7aToyMDtzOjk6InJvb3RzaGVsbCI7aToyMTtzOjk6ImFudGlzaGVsbCI7aToyMjtzOjEyOiJyNTdzaGVsbC5waHAiO2k6MjM7czoxMToiTG9jdXM3U2hlbGwiO2k6MjQ7czoxMToiU3Rvcm03U2hlbGwiO2k6MjU7czo4OiJOM3RzaGVsbCI7aToyNjtzOjExOiJkZXZpbHpTaGVsbCI7aToyNztzOjc6IkZ4Yzk5c2giO2k6Mjg7czo4OiJjaWhzaGVsbCI7aToyOTtzOjc6Ik5URGFkZHkiO2k6MzA7czo4OiJyNTdzaGVsbCI7aTozMTtzOjg6ImM5OXNoZWxsIjt9"));
$g_FlexDBShe = unserialize(base64_decode("YTozMjc6e2k6MDtzOjM2OiJcJGRhdGFtYXNpaT1kYXRlXCgiRCBNIGQsIFkgZzppIGEiXCkiO2k6MTtzOjM0OiJcJGFkZGRhdGU9ZGF0ZVwoIkQgTSBkLCBZIGc6aSBhIlwpIjtpOjI7czoxNDoiZnVjayB5b3VyIG1hbWEiO2k6MztzOjUzOiJmb3BlblwoWyciXXswLDF9XC5cLi9cLlwuL1wuXC4vWyciXXswLDF9XC5cJGZpbGVwYXRocyI7aTo0O3M6NTA6Ikdvb2dsZWJvdFsnIl17MCwxfVxzKlwpXCl7ZWNob1xzK2ZpbGVfZ2V0X2NvbnRlbnRzIjtpOjU7czozNzoiWyciXXswLDF9LmMuWyciXXswLDF9XC5zdWJzdHJcKFwkdmJnLCI7aTo2O3M6Mjg6ImFycmF5XChcJGVuLFwkZXMsXCRlZixcJGVsXCkiO2k6NztzOjQ2OiJsb2Nccyo9XHMqWyciXXswLDF9PFw/ZWNob1xzK1wkcmVkaXJlY3Q7XHMqXD8+IjtpOjg7czoxNzoiS2F6YW4vaW5kZXhcLmh0bWwiO2k6OTtzOjE4OiI9PTBcKXtqc29uUXVpdFwoXCQiO2k6MTA7czo0MDoiQHN0cmVhbV9zb2NrZXRfY2xpZW50XChbJyJdezAsMX10Y3A6Ly9cJCI7aToxMTtzOjQwOiI6OlsnIl17MCwxfVwucGhwdmVyc2lvblwoXClcLlsnIl17MCwxfTo6IjtpOjEyO3M6MTc6Im14MlwuaG90bWFpbFwuY29tIjtpOjEzO3M6NDM6InByZWdfcmVwbGFjZVwoWyciXXswLDF9LlVURlxcLTg6XCguXCpcKS5Vc2UiO2k6MTQ7czoxMzoiIj0+XCR7XCR7IlxceCI7aToxNTtzOjQyOiJmc29ja29wZW5cKFwkbVxbMFxdLFwkbVxbMTBcXSxcJF8sXCRfXyxcJG0iO2k6MTY7czozMjoiPGgxPjQwMyBGb3JiaWRkZW48L2gxPjwhLS0gdG9rZW4iO2k6MTc7czoyNzoiZVZhTFwodHJpbVwoYmFTZTY0X2RlQ29EZVwoIjtpOjE4O3M6NDY6ImVjaG9ccyptZDVcKFwkX1BPU1RcW1snIl17MCwxfWNoZWNrWyciXXswLDF9XF0iO2k6MTk7czoyMzoiL3Zhci9xbWFpbC9iaW4vc2VuZG1haWwiO2k6MjA7czoyMjoiaW1nIHNyYz0ib3BlcmEwMDBcLnBuZyI7aToyMTtzOjM3OiJmdW5jdGlvbiByZWxvYWRcKFwpe2hlYWRlclwoIkxvY2F0aW9uIjtpOjIyO3M6MzU6InN1YnN0cl9jb3VudFwoZ2V0ZW52XCgnSFRUUF9SRUZFUkVSIjtpOjIzO3M6MzI6ImFycmF5XChccyoiR29vZ2xlIlxzKixccyoiU2x1cnAiIjtpOjI0O3M6MzE6IndlYmlcLnJ1L3dlYmlfZmlsZXMvcGhwX2xpYm1haWwiO2k6MjU7czo2NToiY2hyMj1cKFwoZW5jMiYxNVwpPDw0XClcfFwoZW5jMz4+MlwpO2NocjM9XChcKGVuYzMmM1wpPDw2XClcfGVuYzQiO2k6MjY7czoxMjoiUkVSRUZFUl9QVFRIIjtpOjI3O3M6MTI6ImFuZGV4XHxvb2dsZSI7aToyODtzOjk6InRzb2hfcHR0aCI7aToyOTtzOjE1OiJ0bmVnYV9yZXN1X3B0dGgiO2k6MzA7czo0NzoibW1jcnlwdFwoXCRkYXRhLCBcJGtleSwgXCRpdiwgXCRkZWNyeXB0ID0gRkFMU0UiO2k6MzE7czoxMzoiZm9wb1wuY29tXC5hciI7aTozMjtzOjIwOiJzcHJhdm9jaG5pay1ub21lcm92LSI7aTozMztzOjE4OiJpY3EtZGx5YS10ZWxlZm9uYS0iO2k6MzQ7czoxNzoidGVsZWZvbm5heWEtYmF6YS0iO2k6MzU7czoyNjoic2xlc2hcK3NsZXNoXCtkb21lblwrcG9pbnQiO2k6MzY7czoyMjoic3JjPSJmaWxlc19zaXRlL2pzXC5qcyI7aTozNztzOjEwNToiXCR0PVwkcztccypcJG9ccyo9XHMqWyciXXswLDF9WyciXXswLDF9O1xzKmZvclwoXCRpPTA7XCRpPHN0cmxlblwoXCR0XCk7XCRpXCtcK1wpe1xzKlwkb1xzKlwuPVxzKlwkdHtcJGl9IjtpOjM4O3M6ODA6IldCU19ESVJccypcLlxzKlsnIl17MCwxfXRlbXAvWyciXXswLDF9XHMqXC5ccypcJGFjdGl2ZUZpbGVccypcLlxzKlsnIl17MCwxfVwudG1wIjtpOjM5O3M6NTA6IkBtYWlsXChcJG1vc0NvbmZpZ19tYWlsZnJvbSwgXCRtb3NDb25maWdfbGl2ZV9zaXRlIjtpOjQwO3M6NjY6IlwkW2EtekEtWjAtOV9dKz8vXCouezEsMTB9XCovXHMqXC5ccypcJFthLXpBLVowLTlfXSs/L1wqLnsxLDEwfVwqLyI7aTo0MTtzOjE3OiJAXCRfUE9TVFxbXChjaHJcKCI7aTo0MjtzOjQzOiI8XD9waHBccytyZW5hbWVcKFsnIl17MCwxfXdzb1wucGhwWyciXXswLDF9IjtpOjQzO3M6NTI6Ilwkc3RyPVsnIl17MCwxfTxoMT40MDNccytGb3JiaWRkZW48L2gxPjwhLS1ccyp0b2tlbjoiO2k6NDQ7czo1MDoiY2h1bmtfc3BsaXRcKGJhc2U2NF9lbmNvZGVcKGZyZWFkXChcJHtcJHtbJyJdezAsMX0iO2k6NDU7czo2MDoiaW5pX2dldFwoWyciXXswLDF9ZmlsdGVyXC5kZWZhdWx0X2ZsYWdzWyciXXswLDF9XClcKXtmb3JlYWNoIjtpOjQ2O3M6Mzg6ImZpbGVfZ2V0X2NvbnRlbnRzXCh0cmltXChcJGZcW1wkX0dFVFxbIjtpOjQ3O3M6MjY6Ij09WyciXXswLDF9XClcKTtyZXR1cm47XD8+IjtpOjQ4O3M6MTMzOiJtYWlsXChcJGFyclxbWyciXXswLDF9dG9bJyJdezAsMX1cXSxcJGFyclxbWyciXXswLDF9c3VialsnIl17MCwxfVxdLFwkYXJyXFtbJyJdezAsMX1tc2dbJyJdezAsMX1cXSxcJGFyclxbWyciXXswLDF9aGVhZFsnIl17MCwxfVxdXCk7IjtpOjQ5O3M6NTQ6ImlmXChpc3NldFwoXCRfUE9TVFxbWyciXXswLDF9bXNnc3ViamVjdFsnIl17MCwxfVxdXClcKSI7aTo1MDtzOjM1OiJiYXNlNjRfZGVjb2RlXChcJF9QT1NUXFtbJyJdezAsMX1fLSI7aTo1MTtzOjQzOiJcJFthLXpBLVowLTlfXSs/XHMqPVxzKlsnIl1wcmVnX3JlcGxhY2VbJyJdIjtpOjUyO3M6Mzc6IlwkW2EtekEtWjAtOV9dKz9ccyo9XHMqWyciXWFzc2VydFsnIl0iO2k6NTM7czo0NjoiXCRbYS16QS1aMC05X10rP1xzKj1ccypbJyJdY3JlYXRlX2Z1bmN0aW9uWyciXSI7aTo1NDtzOjQ0OiJcJFthLXpBLVowLTlfXSs/XHMqPVxzKlsnIl1iYXNlNjRfZGVjb2RlWyciXSI7aTo1NTtzOjM1OiJcJFthLXpBLVowLTlfXSs/XHMqPVxzKlsnIl1ldmFsWyciXSI7aTo1NjtzOjUwOiJyZWdpc3Rlcl9zaHV0ZG93bl9mdW5jdGlvblwoWyciXXswLDF9cmVhZF9hbnNfY29kZSI7aTo1NztzOjc1OiJcJHBhcmFtXHMqPVxzKlwkcGFyYW1ccyp4XHMqXCRuXC5zdWJzdHJccypcKFwkcGFyYW1ccyosXHMqbGVuZ3RoXChcJHBhcmFtXCkiO2k6NTg7czoyNDoiYmFzZVsnIl17MCwxfVwuXCgzMlwqMlwpIjtpOjU5O3M6NjY6ImlmXChAXCR2YXJzXChnZXRfbWFnaWNfcXVvdGVzX2dwY1woXClccypcP1xzKnN0cmlwc2xhc2hlc1woXCR1cmlcKSI7aTo2MDtzOjI5OiJcKVxdO31pZlwoaXNzZXRcKFwkX1NFUlZFUlxbXyI7aTo2MTtzOjUyOiJpZlwoZW1wdHlcKFwkX0NPT0tJRVxbWyciXXswLDF9eFsnIl17MCwxfVxdXClcKXtlY2hvIjtpOjYyO3M6NjI6ImlzX3dyaXRhYmxlXChcJGRpclwuWyciXXswLDF9d3AtaW5jbHVkZXMvdmVyc2lvblwucGhwWyciXXswLDF9IjtpOjYzO3M6MzI6IlwkX1BPU1RcW1snIl17MCwxfUNDVlsnIl17MCwxfVxdIjtpOjY0O3M6MjE6IkFwcGxlXHMrU3BBbVxzK1JlWnVsVCI7aTo2NTtzOjE3OiIjXHMqc3RlYWx0aFxzKmJvdCI7aTo2NjtzOjIyOiIjXHMqc2VjdXJpdHlzcGFjZVwuY29tIjtpOjY3O3M6Mjg6IlVSTD08XD9lY2hvXHMrXCRpbmRleDtccytcPz4iO2k6Njg7czoyODoiQ3JlZGl0XHMqQ2FyZFxzKlZlcmlmaWNhdGlvbiI7aTo2OTtzOjk1OiI8c2NyaXB0XHMrdHlwZT1bJyJdezAsMX10ZXh0L2phdmFzY3JpcHRbJyJdezAsMX1ccytzcmM9WyciXXswLDF9anF1ZXJ5LXVcLmpzWyciXXswLDF9Pjwvc2NyaXB0PiI7aTo3MDtzOjY3OiJjcmVhdGVfZnVuY3Rpb25cKFsnIl17MCwxfVsnIl17MCwxfSxccypcJG9wdFxbMVxdXHMqXC5ccypcJG9wdFxbNFxdIjtpOjcxO3M6NDk6ImZpbGVfcHV0X2NvbnRlbnRzXChTVkNfU0VMRlwuWyciXXswLDF9L1wuaHRhY2Nlc3MiO2k6NzI7czo1MToiXCRhbGxlbWFpbHNccyo9XHMqQHNwbGl0XCgiXFxuIlxzKixccypcJGVtYWlsbGlzdFwpIjtpOjczO3M6MTg6Ikpvb21sYV9icnV0ZV9Gb3JjZSI7aTo3NDtzOjM4OiJcJHN5c19wYXJhbXNccyo9XHMqQCpmaWxlX2dldF9jb250ZW50cyI7aTo3NTtzOjM1OiJmd3JpdGVccypcKFxzKlwkZmx3XHMqLFxzKlwkZmxccypcKSI7aTo3NjtzOjg2OiJmaWxlX3B1dF9jb250ZW50c1xzKlwoWyciXXswLDF9MVwudHh0WyciXXswLDF9XHMqLFxzKnByaW50X3JccypcKFxzKlwkX1BPU1RccyosXHMqdHJ1ZSI7aTo3NztzOjgwOiJcJGhlYWRlcnNccyo9XHMqXCRfKEdFVHxQT1NUfFNFUlZFUnxDT09LSUV8UkVRVUVTVClcW1snIl17MCwxfWhlYWRlcnNbJyJdezAsMX1cXSI7aTo3ODtzOjU0OiJjcmVhdGVfZnVuY3Rpb25ccypcKFsnIl17MCwxfVsnIl17MCwxfVxzKixccypzdHJfcm90MTMiO2k6Nzk7czozNToiZWNob1xzK1snIl17MCwxfWluc3RhbGxfb2tbJyJdezAsMX0iO2k6ODA7czo1MToiQ1VSTE9QVF9SRUZFUkVSLFxzKlsnIl17MCwxfWh0dHBzOi8vd3d3XC5nb29nbGVcLmNvIjtpOjgxO3M6MzM6ImRpZVxzKlwoXHMqUEhQX09TXHMqXC5ccypjaHJccypcKCI7aTo4MjtzOjU1OiJpZlxzKlwobWQ1XCh0cmltXChcJF8oR0VUfFBPU1R8U0VSVkVSfENPT0tJRXxSRVFVRVNUKVxbIjtpOjgzO3M6NDQ6ImZccyo9XHMqXCRxXHMqXC5ccypcJGFccypcLlxzKlwkYlxzKlwuXHMqXCR4IjtpOjg0O3M6NDE6ImNvbnRlbnQ9WyciXXswLDF9MTtVUkw9Y2dpLWJpblwuaHRtbFw/Y21kIjtpOjg1O3M6NjM6IlwkdXJsWyciXXswLDF9XHMqXC5ccypcJHNlc3Npb25faWRccypcLlxzKlsnIl17MCwxfS9sb2dpblwuaHRtbCI7aTo4NjtzOjY0OiJcJF9TRVNTSU9OXFtbJyJdezAsMX1zZXNzaW9uX3BpblsnIl17MCwxfVxdXHMqPVxzKlsnIl17MCwxfVwkUElOIjtpOjg3O3M6NDI6ImZzb2Nrb3BlblxzKlwoXHMqXCRDb25uZWN0QWRkcmVzc1xzKixccyoyNSI7aTo4ODtzOjQ3OiJlY2hvXHMrXCRpZnVwbG9hZD1bJyJdezAsMX1ccypJdHNPa1xzKlsnIl17MCwxfSI7aTo4OTtzOjEwNzoicHJlZ19tYXRjaFwoWyciXXswLDF9L1woeWFuZGV4XHxnb29nbGVcfGJvdFwpL2lbJyJdezAsMX0sXHMqZ2V0ZW52XChbJyJdezAsMX1IVFRQX1VTRVJfQUdFTlRbJyJdezAsMX1cKVwpXCkiO2k6OTA7czo1MjoiXCRtYWlsZXJccyo9XHMqXCRfUE9TVFxbWyciXXswLDF9eF9tYWlsZXJbJyJdezAsMX1cXSI7aTo5MTtzOjU3OiJcJE9PTzBPME8wMD1fX0ZJTEVfXztccypcJE9PMDBPMDAwMFxzKj1ccyoweDFiNTQwO1xzKmV2YWwiO2k6OTI7czoxMjoiQnlccytXZWJSb29UIjtpOjkzO3M6ODA6ImhlYWRlclwoWyciXXswLDF9czpccypbJyJdezAsMX1ccypcLlxzKnBocF91bmFtZVxzKlwoXHMqWyciXXswLDF9blsnIl17MCwxfVxzKlwpIjtpOjk0O3M6MzA6ImN1cmxcLmhheHhcLnNlL3JmYy9jb29raWVfc3BlYyI7aTo5NTtzOjEyOiJraWxsYWxsXHMrLTkiO2k6OTY7czo3MzoibW92ZV91cGxvYWRlZF9maWxlXChcJF9GSUxFU1xbWyciXXswLDF9ZWxpZlsnIl17MCwxfVxdXFtbJyJdezAsMX10bXBfbmFtZSI7aTo5NztzOjYyOiJcJGd6aXBccyo9XHMqQCpnemluZmxhdGVccypcKFxzKkAqc3Vic3RyXHMqXChccypcJGd6ZW5jb2RlX2FyZyI7aTo5ODtzOjgzOiJpZlxzKlwoXHMqbWFpbFxzKlwoXHMqXCRtYWlsc1xbXCRpXF1ccyosXHMqXCR0ZW1hXHMqLFxzKmJhc2U2NF9lbmNvZGVccypcKFxzKlwkdGV4dCI7aTo5OTtzOjg0OiJmd3JpdGVccypcKFxzKlwkZmhccyosXHMqc3RyaXBzbGFzaGVzXHMqXChccypAKlwkXyhHRVR8UE9TVHxTRVJWRVJ8Q09PS0lFfFJFUVVFU1QpXFsiO2k6MTAwO3M6NTc6InByZWdfcmVwbGFjZVxzKlwoXHMqQCpcJF8oR0VUfFBPU1R8U0VSVkVSfENPT0tJRXxSRVFVRVNUKSI7aToxMDE7czo5NDoiZWNob1xzK2ZpbGVfZ2V0X2NvbnRlbnRzXHMqXChccypiYXNlNjRfdXJsX2RlY29kZVxzKlwoXHMqQCpcJF8oR0VUfFBPU1R8U0VSVkVSfENPT0tJRXxSRVFVRVNUKSI7aToxMDI7czo1ODoiXCRtYWlsZXJccyo9XHMqXCRfUE9TVFxbXHMqWyciXXswLDF9eF9tYWlsZXJbJyJdezAsMX1ccypcXSI7aToxMDM7czo2MDoiaWZccypcKFxzKkAqbWQ1XHMqXChccypcJF8oR0VUfFBPU1R8U0VSVkVSfENPT0tJRXxSRVFVRVNUKVxbIjtpOjEwNDtzOjk5OiJjaHJccypcKFxzKjEwMVxzKlwpXHMqXC5ccypjaHJccypcKFxzKjExOFxzKlwpXHMqXC5ccypjaHJccypcKFxzKjk3XHMqXClccypcLlxzKmNoclxzKlwoXHMqMTA4XHMqXCkiO2k6MTA1O3M6MzU6InByZWdfcmVwbGFjZVxzKlwoXHMqWyciXXswLDF9L1wuXCovIjtpOjEwNjtzOjE1MjoiXCRfKEdFVHxQT1NUfFNFUlZFUnxDT09LSUV8UkVRVUVTVClcW1snIl17MCwxfVthLXpBLVowLTlfXSs/WyciXXswLDF9XF1cKFxzKlwkXyhHRVR8UE9TVHxTRVJWRVJ8Q09PS0lFfFJFUVVFU1QpXFtbJyJdezAsMX1bYS16QS1aMC05X10rP1snIl17MCwxfVxdXHMqXCkiO2k6MTA3O3M6NzQ6Ij1ccypcJEdMT0JBTFNcW1xzKlsnIl17MCwxfV8oR0VUfFBPU1R8U0VSVkVSfENPT0tJRXxSRVFVRVNUKVsnIl17MCwxfVxzKlxdIjtpOjEwODtzOjc1OiJcJHJlc3VsdEZVTFxzKj1ccypzdHJpcGNzbGFzaGVzXHMqXChccypcJF9QT1NUXFtbJyJdezAsMX1yZXN1bHRGVUxbJyJdezAsMX0iO2k6MTA5O3M6MTU6Ii91c3Ivc2Jpbi9odHRwZCI7aToxMTA7czo2NDoiZWNob1xzK3N0cmlwc2xhc2hlc1xzKlwoXHMqXCRfKEdFVHxQT1NUfFNFUlZFUnxDT09LSUV8UkVRVUVTVClcWyI7aToxMTE7czozMjoiUFJJVk1TR1wuXCo6XC5vd25lclxcc1wrXChcLlwqXCkiO2k6MTEyO3M6ODM6InByaW50XHMrXCRzb2NrXHMrWyciXXswLDF9TklDSyBbJyJdezAsMX1ccytcLlxzK1wkbmlja1xzK1wuXHMrWyciXXswLDF9XFxuWyciXXswLDF9IjtpOjExMztzOjgwOiJcJHVybFxzKj1ccypcJHVybFxzKlwuXHMqWyciXXswLDF9XD9bJyJdezAsMX1ccypcLlxzKmh0dHBfYnVpbGRfcXVlcnlcKFwkcXVlcnlcKSI7aToxMTQ7czoxMjM6InByZWdfbWF0Y2hfYWxsXChbJyJdezAsMX0vPGEgaHJlZj0iXFwvdXJsXFxcP3E9XChcLlwrXD9cKVxbJlx8IlxdXCsvaXNbJyJdezAsMX0sIFwkcGFnZVxbWyciXXswLDF9ZXhlWyciXXswLDF9XF0sIFwkbGlua3NcKSI7aToxMTU7czoxMDY6IjxzY3JpcHRccytsYW5ndWFnZT1bJyJdezAsMX1KYXZhU2NyaXB0WyciXXswLDF9PlxzKnBhcmVudFwud2luZG93XC5vcGVuZXJcLmxvY2F0aW9uXHMqPVxzKlsnIl17MCwxfWh0dHA6Ly8iO2k6MTE2O3M6Nzc6IlwkcFxzKj1ccypzdHJwb3NccypcKFxzKlwkdHhccyosXHMqWyciXXswLDF9eyNbJyJdezAsMX1ccyosXHMqXCRwMlxzKlwrXHMqMlwpIjtpOjExNztzOjI5OiJFcnJvckRvY3VtZW50XHMrNDAwXHMraHR0cDovLyI7aToxMTg7czoyOToiRXJyb3JEb2N1bWVudFxzKzUwMFxzK2h0dHA6Ly8iO2k6MTE5O3M6MTU6IlwobXNpZVx8b3BlcmFcKSI7aToxMjA7czo0OToiUmV3cml0ZUNvbmRccyole0hUVFBfVVNFUl9BR0VOVH1ccypcLlwqbmRyb2lkXC5cKiI7aToxMjE7czoyODoiZ29vZ2xlXHx5YW5kZXhcfGJvdFx8cmFtYmxlciI7aToxMjI7czo5OToiaWZccypcKFxzKmlzX2RpclxzKlwoXHMqXCRGdWxsUGF0aFxzKlwpXHMqXClccypBbGxEaXJccypcKFxzKlwkRnVsbFBhdGhccyosXHMqXCRGaWxlc1xzKlwpO1xzKn1ccyp9IjtpOjEyMztzOjE2NzoiWyciXXswLDF9RnJvbTpccypbJyJdezAsMX1cLlwkX1BPU1RcW1snIl17MCwxfXJlYWxuYW1lWyciXXswLDF9XF1cLlsnIl17MCwxfSBbJyJdezAsMX1cLlsnIl17MCwxfSA8WyciXXswLDF9XC5cJF9QT1NUXFtbJyJdezAsMX1mcm9tWyciXXswLDF9XF1cLlsnIl17MCwxfT5cXG5bJyJdezAsMX0iO2k6MTI0O3M6NTM6IjwhLS0jZXhlY1xzK2NtZD1bJyJdezAsMX1cJEhUVFBfQUNDRVBUWyciXXswLDF9XHMqLS0+IjtpOjEyNTtzOjI2OiJcWy1cXVxzK0Nvbm5lY3Rpb25ccytmYWlsZCI7aToxMjY7czo2MzoiaWZcKC9cXlxcOlwkb3duZXIhXC5cKlxcQFwuXCpQUklWTVNHXC5cKjpcLm1zZ2Zsb29kXChcLlwqXCkvXCl7IjtpOjEyNztzOjM0OiJwcmludFxzKlwkc29jayAiUFJJVk1TRyAiXC5cJG93bmVyIjtpOjEyODtzOjY0OiJcXT1bJyJdezAsMX1pcFsnIl17MCwxfVxzKjtccyppZlxzKlwoXHMqaXNzZXRccypcKFxzKlwkX1NFUlZFUlxbIjtpOjEyOTtzOjUxOiJcXVxzKn1ccyo9XHMqdHJpbVxzKlwoXHMqYXJyYXlfcG9wXHMqXChccypcJHtccypcJHsiO2k6MTMwO3M6MzA6InByaW50XCgiI1xzK2luZm9ccytPS1xcblxcbiJcKSI7aToxMzE7czoxMzI6IlwkdXNlcl9hZ2VudFxzKj1ccypwcmVnX3JlcGxhY2VccypcKFxzKlsnIl17MCwxfVx8VXNlclxcXC5BZ2VudFxcOlxbXFxzIFxdXD9cfGlbJyJdezAsMX1ccyosXHMqWyciXXswLDF9WyciXXswLDF9XHMqLFxzKlwkdXNlcl9hZ2VudCI7aToxMzI7czo3MToiXCRwXHMqPVxzKnN0cnBvc1woXCR0eFxzKixccypbJyJdezAsMX17I1snIl17MCwxfVxzKixccypcJHAyXHMqXCtccyoyXCkiO2k6MTMzO3M6MTAxOiJjcmVhdGVfZnVuY3Rpb25ccypcKFxzKlsnIl17MCwxfVwkbVsnIl17MCwxfVxzKixccypbJyJdezAsMX1pZlxzKlwoXHMqXCRtXHMqXFtccyoweDAxXHMqXF1ccyo9PVxzKiJMIiI7aToxMzQ7czo4OToiXCRsZXR0ZXJccyo9XHMqc3RyX3JlcGxhY2VccypcKFxzKlwkQVJSQVlcWzBcXVxbXCRqXF1ccyosXHMqXCRhcnJcW1wkaW5kXF1ccyosXHMqXCRsZXR0ZXIiO2k6MTM1O3M6MjE6ImV2YWxccypcKFxzKnN0cl9yb3QxMyI7aToxMzY7czozODoiZXZhbFxzKlwoXHMqZ3ppbmZsYXRlXHMqXChccypzdHJfcm90MTMiO2k6MTM3O3M6NDg6ImZ1bmN0aW9uXHMqY2htb2RfUlxzKlwoXHMqXCRwYXRoXHMqLFxzKlwkcGVybVxzKiI7aToxMzg7czo5OiJJcklzVFwuSXIiO2k6MTM5O3M6MTE6IkhhY2tlZFxzK0J5IjtpOjE0MDtzOjMzOiJzeW1iaWFuXHxtaWRwXHx3YXBcfHBob25lXHxwb2NrZXQiO2k6MTQxO3M6NDY6ImlmXHMqXChkZXRlY3RfbW9iaWxlX2RldmljZVwoXClcKVxzKntccypoZWFkZXIiO2k6MTQyO3M6Mzc6IlwkcG9zdFxzKj1ccypbJyJdezAsMX1cXHg3N1xceDY3XFx4NjUiO2k6MTQzO3M6Mzc6ImVjaG9ccypbJyJdezAsMX1hbnN3ZXI9ZXJyb3JbJyJdezAsMX0iO2k6MTQ0O3M6MzQ6InVybD08XD9waHBccyplY2hvXHMqXCRyYW5kX3VybDtcPz4iO2k6MTQ1O3M6NDU6ImlmXChDaGVja0lQT3BlcmF0b3JcKFwpXHMqJiZccyohaXNNb2RlbVwoXClcKSI7aToxNDY7czo1OToic3RycG9zXChcJHVhLFxzKlsnIl17MCwxfXlhbmRleGJvdFsnIl17MCwxfVwpXHMqIT09XHMqZmFsc2UiO2k6MTQ3O3M6MTM0OiJpZlxzKlwoXCRrZXlccyohPVxzKlsnIl17MCwxfW1haWxfdG9bJyJdezAsMX1ccyomJlxzKlwka2V5XHMqIT1ccypbJyJdezAsMX1zbXRwX3NlcnZlclsnIl17MCwxfVxzKiYmXHMqXCRrZXlccyohPVxzKlsnIl17MCwxfXNtdHBfcG9ydCI7aToxNDg7czo1MjoiZWNob1snIl17MCwxfTxjZW50ZXI+PGI+RG9uZVxzKj09PlxzKlwkdXNlcmZpbGVfbmFtZSI7aToxNDk7czoyNToiWyciXXswLDF9ZS9cKlwuL1snIl17MCwxfSI7aToxNTA7czoyNjoiYXNzZXJ0XHMqXChccypzdHJpcHNsYXNoZXMiO2k6MTUxO3M6NTE6IlwpXHMqXC5ccypzdWJzdHJccypcKFxzKm1kNVxzKlwoXHMqc3RycmV2XHMqXChccypcJCI7aToxNTI7czo2NToiXCRmbFxzKj1ccyoiPG1ldGEgaHR0cC1lcXVpdj1cXCJSZWZyZXNoXFwiXHMrY29udGVudD1cXCIwO1xzKlVSTD0iO2k6MTUzO3M6OTA6IixccyphcnJheVxzKlwoJ1wuJywnXC5cLicsJ1RodW1ic1wuZGInXClccypcKVxzKlwpXHMqe1xzKmNvbnRpbnVlO1xzKn1ccyppZlxzKlwoXHMqaXNfZmlsZSI7aToxNTQ7czo4MzoiaWZccypcKFxzKlwkZGF0YVNpemVccyo8XHMqQk9UQ1JZUFRfTUFYX1NJWkVccypcKVxzKnJjNFxzKlwoXHMqXCRkYXRhLFxzKlwkY3J5cHRrZXkiO2k6MTU1O3M6NDM6InN0cl9yb3QxM1xzKlwoXHMqWyciXXswLDF9dG12YXN5bmdbJyJdezAsMX0iO2k6MTU2O3M6NDg6InN0cl9yb3QxM1xzKlwoXHMqWyciXXswLDF9b25mcjY0X3FycGJxclsnIl17MCwxfSI7aToxNTc7czoxNzg6ImlmXHMqXChccypcJF9QT1NUXFtccypbJyJdezAsMX1wYXRoWyciXXswLDF9XHMqXF1ccyo9PVxzKlsnIl17MCwxfVsnIl17MCwxfVxzKlwpXHMqe1xzKlwkdXBsb2FkZmlsZVxzKj1ccypcJF9GSUxFU1xbXHMqWyciXXswLDF9ZmlsZVsnIl17MCwxfVxzKlxdXFtccypbJyJdezAsMX1uYW1lWyciXXswLDF9XHMqXF0iO2k6MTU4O3M6OTk6ImlmXHMqXChccypmd3JpdGVccypcKFxzKlwkaGFuZGxlXHMqLFxzKmZpbGVfZ2V0X2NvbnRlbnRzXHMqXChccypcJF8oR0VUfFBPU1R8U0VSVkVSfENPT0tJRXxSRVFVRVNUKSI7aToxNTk7czo4OToiYXJyYXlfa2V5X2V4aXN0c1xzKlwoXHMqXCRmaWxlUmFzXHMqLFxzKlwkZmlsZVR5cGVcKVxzKlw/XHMqXCRmaWxlVHlwZVxbXHMqXCRmaWxlUmFzXHMqXF0iO2k6MTYwO3M6NjU6InVybGVuY29kZVwocHJpbnRfclwoYXJyYXlcKFwpLDFcKVwpLDUsMVwpXC5jXCksXCRjXCk7fWV2YWxcKFwkZFwpIjtpOjE2MTtzOjQ0OiJpZlxzKlwoXHMqZnVuY3Rpb25fZXhpc3RzXHMqXChccyoncGNudGxfZm9yayI7aToxNjI7czo0MzoiZmluZFxzKy9ccystdHlwZVxzK2ZccystcGVybVxzKy0wNDAwMFxzKy1scyI7aToxNjM7czozODoiZXhlY2xcKCIvYmluL3NoIiwgIi9iaW4vc2giLCAiLWkiLCAwXCkiO2k6MTY0O3M6NDE6ImZ1bmN0aW9uXHMraW5qZWN0XChcJGZpbGUsXHMqXCRpbmplY3Rpb249IjtpOjE2NTtzOjMyOiJmY2xvc2VcKFwkZlwpO1xzKmVjaG9ccyoib1wua1wuIiI7aToxNjY7czo3MjoicHJlZ19yZXBsYWNlXHMqXChccypcJGV4aWZcW1xzKidNYWtlJ1xzKlxdXHMqLFxzKlwkZXhpZlxbXHMqJ01vZGVsJ1xzKlxdIjtpOjE2NztzOjcyOiJcXmRvd25sb2Fkcy9cKFxbMC05XF1cKlwpL1woXFswLTlcXVwqXCkvXCRccytkb3dubG9hZHNcLnBocFw/Yz1cJDEmcD1cJDIiO2k6MTY4O3M6ODE6IlwkcmVzPW15c3FsX3F1ZXJ5XChbJyJdezAsMX1TRUxFQ1RccytcKlxzK0ZST01ccytgd2F0Y2hkb2dfb2xkXzA1YFxzK1dIRVJFXHMrcGFnZSI7aToxNjk7czo1MjoiUmV3cml0ZVJ1bGVccytcLlwqXHMraW5kZXhcLnBocFw/dXJsPVwkMFxzK1xbTCxRU0FcXSI7aToxNzA7czoxMDA6IklPOjpTb2NrZXQ6OklORVQtPm5ld1woUHJvdG9ccyo9PlxzKiJ0Y3AiXHMqLFxzKkxvY2FsUG9ydFxzKj0+XHMqMzYwMDBccyosXHMqTGlzdGVuXHMqPT5ccypTT01BWENPTk4iO2k6MTcxO3M6Mzk6ImV2YWxccypcKCpccypzdHJyZXZccypcKCpccypzdHJfcmVwbGFjZSI7aToxNzI7czoyMTI6IkBtb3ZlX3VwbG9hZGVkX2ZpbGVccypcKFxzKlwkX0ZJTEVTXFtccypbJyJdezAsMX1tZXNzYWdlWyciXXswLDF9XHMqXF1cW1xzKlsnIl17MCwxfXRtcF9uYW1lWyciXXswLDF9XHMqXF1ccyosXHMqXCRzZWN1cml0eV9jb2RlXHMqXC5ccyoiLyJccypcLlxzKlwkX0ZJTEVTXFtbJyJdezAsMX1tZXNzYWdlWyciXXswLDF9XF1cW1snIl17MCwxfW5hbWVbJyJdezAsMX1cXVwpIjtpOjE3MztzOjgyOiJcJFVSTFxzKj1ccypcJHVybHNcW1xzKnJhbmRcKFxzKjBccyosXHMqY291bnRccypcKFxzKlwkdXJsc1xzKlwpXHMqLVxzKjFccypcKVxzKlxdIjtpOjE3NDtzOjIzMjoiaXNzZXRccypcKFxzKlwkX0ZJTEVTXFtccypbJyJdezAsMX14WyciXXswLDF9XHMqXF1ccypcKVxzKlw/XHMqXChccyppc191cGxvYWRlZF9maWxlXHMqXChccypcJF9GSUxFU1xbXHMqWyciXXswLDF9eFsnIl17MCwxfVxzKlxdXFtccypbJyJdezAsMX10bXBfbmFtZVsnIl17MCwxfVxzKlxdXHMqXClccypcP1xzKlwoXHMqY29weVxzKlwoXHMqXCRfRklMRVNcW1xzKlsnIl17MCwxfXhbJyJdezAsMX1ccypcXSI7aToxNzU7czo4NzoiaWZccypcKFxzKlwkaVxzKjxccypcKFxzKmNvdW50XHMqXChccypcJF9QT1NUXFtccypbJyJdezAsMX1xWyciXXswLDF9XHMqXF1ccypcKVxzKi1ccyoxIjtpOjE3NjtzOjM4OiJlY2hvXHMqXCgqXHMqWyciXXswLDF9Tk8gRklMRVsnIl17MCwxfSI7aToxNzc7czoxOTA6Im1vdmVfdXBsb2FkZWRfZmlsZVxzKlwoKlxzKlwkX0ZJTEVTXFtccypbJyJdezAsMX1maWxlbmFtZVsnIl17MCwxfVxzKlxdXFtccypbJyJdezAsMX10bXBfbmFtZVsnIl17MCwxfVxzKlxdXHMqLFxzKlwkX0ZJTEVTXFtccypbJyJdezAsMX1maWxlbmFtZVsnIl17MCwxfVxzKlxdXFtccypbJyJdezAsMX1uYW1lWyciXXswLDF9XHMqXF0iO2k6MTc4O3M6NzA6ImZpbGVfZ2V0X2NvbnRlbnRzXHMqXCgqXHMqQURNSU5fUkVESVJfVVJMXHMqLFxzKmZhbHNlXHMqLFxzKlwkY3R4XHMqXCkiO2k6MTc5O3M6Mjg6ImNvcHlccypcKFxzKlsnIl17MCwxfWh0dHA6Ly8iO2k6MTgwO3M6MTI6InRtaGFwYnpjZXJmZiI7aToxODE7czo5NzoiY29udGVudD1bJyJdezAsMX1uby1jYWNoZVsnIl17MCwxfTtccypcJGNvbmZpZ1xbWyciXXswLDF9ZGVzY3JpcHRpb25bJyJdezAsMX1cXVxzKlwuPVxzKlsnIl17MCwxfSI7aToxODI7czo3NDoiY2xlYXJzdGF0Y2FjaGVcKFxzKlwpO1xzKmlmXHMqXChccyohaXNfZGlyXHMqXChccypcJGZsZFxzKlwpXHMqXClccypyZXR1cm4iO2k6MTgzO3M6OTc6IlwkckJ1ZmZMZW5ccyo9XHMqb3JkXHMqXChccypWQ19EZWNyeXB0XHMqXChccypmcmVhZFxzKlwoXHMqXCRpbnB1dCxccyoxXHMqXClccypcKVxzKlwpXHMqXCpccyoyNTYiO2k6MTg0O3M6OToiSXJTZWNUZWFtIjtpOjE4NTtzOjkyOiJAc2V0Y29va2llXChbJyJdezAsMX1tWyciXXswLDF9LFxzKlsnIl17MCwxfVthLXpBLVowLTlfXSs/WyciXXswLDF9LFxzKnRpbWVcKFwpXHMqXCtccyo4NjQwMCI7aToxODY7czoxMjM6IkBoZWFkZXJcKFsnIl17MCwxfUxvY2F0aW9uOlxzKlsnIl17MCwxfVwuWyciXXswLDF9aFsnIl17MCwxfVwuWyciXXswLDF9dFsnIl17MCwxfVwuWyciXXswLDF9dFsnIl17MCwxfVwuWyciXXswLDF9cFsnIl17MCwxfSI7aToxODc7czo2Nzoic2V0X3RpbWVfbGltaXRccypcKFxzKjBccypcKTtccyppZlxzKlwoIVNlY3JldFBhZ2VIYW5kbGVyOjpjaGVja0tleSI7aToxODg7czoxMDY6InJldHVyblxzKlwoXHMqc3Ryc3RyXHMqXChccypcJHNccyosXHMqJ2VjaG8nXHMqXClccyo9PVxzKmZhbHNlXHMqXD9ccypcKFxzKnN0cnN0clxzKlwoXHMqXCRzXHMqLFxzKidwcmludCciO2k6MTg5O3M6ODU6InRpbWVcKFwpXHMqXCtccyoxMDAwMFxzKixccypbJyJdezAsMX0vWyciXXswLDF9XCk7XHMqZWNob1xzK1wkbV96ejtccypldmFsXHMqXChcJG1fenoiO2k6MTkwO3M6MTQ1OiJpZlwoIWVtcHR5XChcJF9GSUxFU1xbWyciXXswLDF9bWVzc2FnZVsnIl17MCwxfVxdXFtbJyJdezAsMX1uYW1lWyciXXswLDF9XF1cKVxzK0FORFxzK1wobWQ1XChcJF9QT1NUXFtbJyJdezAsMX1uaWNrWyciXXswLDF9XF1cKVxzKj09XHMqWyciXXswLDF9IjtpOjE5MTtzOjQ3OiJzdHJfcm90MTNccypcKFxzKmd6aW5mbGF0ZVxzKlwoXHMqYmFzZTY0X2RlY29kZSI7aToxOTI7czo1MDoiZ3p1bmNvbXByZXNzXHMqXChccypzdHJfcm90MTNccypcKFxzKmJhc2U2NF9kZWNvZGUiO2k6MTkzO3M6NTA6Imd6dW5jb21wcmVzc1xzKlwoXHMqYmFzZTY0X2RlY29kZVxzKlwoXHMqc3RyX3JvdDEzIjtpOjE5NDtzOjYxOiJnemluZmxhdGVccypcKFxzKmJhc2U2NF9kZWNvZGVccypcKFxzKnN0cl9yb3QxM1xzKlwoXHMqc3RycmV2IjtpOjE5NTtzOjYxOiJnemluZmxhdGVccypcKFxzKmJhc2U2NF9kZWNvZGVccypcKFxzKnN0cnJldlxzKlwoXHMqc3RyX3JvdDEzIjtpOjE5NjtzOjQ0OiJnemluZmxhdGVccypcKFxzKmJhc2U2NF9kZWNvZGVccypcKFxzKnN0cnJldiI7aToxOTc7czo2ODoiZ3ppbmZsYXRlXHMqXChccypiYXNlNjRfZGVjb2RlXHMqXChccypiYXNlNjRfZGVjb2RlXHMqXChccypzdHJfcm90MTMiO2k6MTk4O3M6NTQ6ImJhc2U2NF9kZWNvZGVccypcKFxzKmd6dW5jb21wcmVzc1xzKlwoXHMqYmFzZTY0X2RlY29kZSI7aToxOTk7czo0NzoiZ3ppbmZsYXRlXHMqXChccypiYXNlNjRfZGVjb2RlXHMqXChccypzdHJfcm90MTMiO2k6MjAwO3M6NDc6Imd6aW5mbGF0ZVxzKlwoXHMqc3RyX3JvdDEzXHMqXChccypiYXNlNjRfZGVjb2RlIjtpOjIwMTtzOjMzOiJnenVuY29tcHJlc3NccypcKFxzKmJhc2U2NF9kZWNvZGUiO2k6MjAyO3M6MzA6Imd6aW5mbGF0ZVxzKlwoXHMqYmFzZTY0X2RlY29kZSI7aToyMDM7czoyNToiZXZhbFxzKlwoXHMqYmFzZTY0X2RlY29kZSI7aToyMDQ7czoxNzoiQnJhemlsXHMrSGFja1RlYW0iO2k6MjA1O3M6OTA6IlwkdGxkXHMqPVxzKmFycmF5XHMqXChccypbJyJdezAsMX1jb21bJyJdezAsMX0sWyciXXswLDF9b3JnWyciXXswLDF9LFsnIl17MCwxfW5ldFsnIl17MCwxfSI7aToyMDY7czozNzoic3RyX2lyZXBsYWNlXHMqXCgqXHMqWyciXXswLDF9PC9oZWFkPiI7aToyMDc7czo1NToiZGVmaW5lXHMqXCgqXHMqWyciXXswLDF9U0JDSURfUkVRVUVTVF9GSUxFWyciXXswLDF9XHMqLCI7aToyMDg7czozOToicHJlZ19yZXBsYWNlXHMqXCgqXHMqWyciXXswLDF9L1wuXCsvZXNpIjtpOjIwOTtzOjE3OiJNeXN0ZXJpb3VzXHMrV2lyZSI7aToyMTA7czo1NToiXCRoZWFkZXJzXHMqXC49XHMqXCRfUE9TVFxbWyciXXswLDF9ZU1haWxBZGRbJyJdezAsMX1cXSI7aToyMTE7czozODoiZGVmaW5lXHMqXChccypbJyJdezAsMX1ERUZDQUxMQkFDS01BSUwiO2k6MjEyO3M6NDc6ImRlZmF1bHRfYWN0aW9uXHMqPVxzKlsnIl17MCwxfUZpbGVzTWFuWyciXXswLDF9IjtpOjIxMztzOjM4OiJlY2hvXHMrQGZpbGVfZ2V0X2NvbnRlbnRzXHMqXChccypcJGdldCI7aToyMTQ7czoxNTY6ImlmXHMqXChccypzdHJpcG9zXHMqXChccypcJF9TRVJWRVJcW1snIl17MCwxfUhUVFBfVVNFUl9BR0VOVFsnIl17MCwxfVxdXHMqLFxzKlsnIl17MCwxfUFuZHJvaWRbJyJdezAsMX1cKVxzKiE9PWZhbHNlXHMqJiZccyohXCRfQ09PS0lFXFtbJyJdezAsMX1kbGVfdXNlcl9pZCI7aToyMTU7czo0NDoiaWZccypcKFxzKnByZWdfbWF0Y2hccypcKFxzKlsnIl17MCwxfSN5YW5kZXgiO2k6MjE2O3M6NzA6ImhlYWRlclxzKlwoWyciXXswLDF9TG9jYXRpb246XHMqWyciXXswLDF9XHMqXC5ccypcJHRvXHMqXC5ccyp1cmxkZWNvZGUiO2k6MjE3O3M6MTU6IkRjMFJIYVsnIl17MCwxfSI7aToyMTg7czoxNToiWyciXXswLDF9YUhSMGNEIjtpOjIxOTtzOjM2OiIhdG91Y2hcKFsnIl17MCwxfVwuXC4vXC5cLi9sYW5ndWFnZS8iO2k6MjIwO3M6MzI6ImV2YWxcKHN0cmlwc2xhc2hlc1woXFxcJF9SRVFVRVNUIjtpOjIyMTtzOjc4OiJkb2N1bWVudFwud3JpdGVccypcKFxzKlsnIl17MCwxfTxzY3JpcHRccytzcmM9WyciXXswLDF9aHR0cDovLzxcPz1cJGRvbWFpblw/Pi8iO2k6MjIyO3M6ODU6ImV4aXRccypcKFxzKlsnIl17MCwxfTxzY3JpcHQ+XHMqc2V0VGltZW91dFxzKlwoXHMqXFxbJyJdezAsMX1kb2N1bWVudFwubG9jYXRpb25cLmhyZWYiO2k6MjIzO3M6Mjg6ImZ1bmN0aW9uXHMrc3FsMl9zYWZlXHMqXChccyoiO2k6MjI0O3M6NDE6IlwkcG9zdFJlc3VsdFxzKj1ccypjdXJsX2V4ZWNccypcKCpccypcJGNoIjtpOjIyNTtzOjg3OiImJlxzKmZ1bmN0aW9uX2V4aXN0c1xzKlwoKlxzKlsnIl17MCwxfWdldG14cnJbJyJdezAsMX1cKVxzKlwpXHMqe1xzKkBnZXRteHJyXHMqXCgqXHMqXCQiO2k6MjI2O3M6NTc6ImlzX193cml0YWJsZVxzKlwoKlxzKlwkcGF0aFxzKlwuXHMqdW5pcWlkXHMqXCgqXHMqbXRfcmFuZCI7aToyMjc7czoyODoiZmlsZV9wdXRfY29udGVudHpccypcKCpccypcJCI7aToyMjg7czozMToiPVxzKmFycmF5X21hcFxzKlwoKlxzKnN0cnJldlxzKiI7aToyMjk7czo5OiJcJF9fX1xzKj0iO2k6MjMwO3M6NTU6IkAqZ3ppbmZsYXRlXHMqXChccypAKmJhc2U2NF9kZWNvZGVccypcKFxzKkAqc3RyX3JlcGxhY2UiO2k6MjMxO3M6ODc6ImZvcGVuXHMqXCgqXHMqImh0dHA6Ly8iXHMqXC5ccypcJGNoZWNrX2RvbWFpblxzKlwuXHMqIjo4MCJccypcLlxzKlwkY2hlY2tfZG9jXHMqLFxzKiJyIiI7aToyMzI7czo0MzoiQFwkX0NPT0tJRVxbWyciXXswLDF9c3RhdENvdW50ZXJbJyJdezAsMX1cXSI7aToyMzM7czozNToiaWZccypcKCpccypAKnByZWdfbWF0Y2hccypcKCpccypzdHIiO2k6MjM0O3M6OTQ6ImFycmF5X3BvcFxzKlwoKlxzKlwkd29ya1JlcGxhY2VccyosXHMqXCRfKEdFVHxQT1NUfFNFUlZFUnxDT09LSUV8UkVRVUVTVClccyosXHMqXCRjb3VudEtleXNOZXciO2k6MjM1O3M6NjQ6IihHRVR8UE9TVHxTRVJWRVJ8Q09PS0lFfFJFUVVFU1QpXHMqXFtccypbJyJdezAsMX1fX19bJyJdezAsMX1ccyoiO2k6MjM2O3M6MzM6IlwoXHMqWyciXXswLDF9SU5TSEVMTFsnIl17MCwxfVxzKiI7aToyMzc7czo0NzoiXCRiXHMqXC5ccypcJHBccypcLlxzKlwkaFxzKlwuXHMqXCRrXHMqXC5ccypcJHYiO2k6MjM4O3M6MTQ1OiJcJFthLXpBLVowLTlfXSs/XHMqXChccypcZCtccypcXlxzKlxkK1xzKlwpXHMqXC5ccypcJFthLXpBLVowLTlfXSs/XHMqXChccypcZCtccypcXlxzKlxkK1xzKlwpXHMqXC5ccypcJFthLXpBLVowLTlfXSs/XHMqXChccypcZCtccypcXlxzKlxkK1xzKlwpIjtpOjIzOTtzOjExNDoiPVxzKnByZWdfc3BsaXRccypcKFxzKlsnIl17MCwxfS9cXCxcKFxcIFwrXClcPy9bJyJdezAsMX0sXHMqQCppbmlfZ2V0XHMqXChccypbJyJdezAsMX1kaXNhYmxlX2Z1bmN0aW9uc1snIl17MCwxfVwpIjtpOjI0MDtzOjEyNToiaWZccypcKCFmdW5jdGlvbl9leGlzdHNccypcKFxzKlsnIl17MCwxfXBvc2l4X2dldHB3dWlkWyciXXswLDF9XHMqXClccyomJlxzKiFpbl9hcnJheVxzKlwoXHMqWyciXXswLDF9cG9zaXhfZ2V0cHd1aWRbJyJdezAsMX0iO2k6MjQxO3M6NDM6InN0cmVhbV9zb2NrZXRfY2xpZW50XHMqXChccypbJyJdezAsMX10Y3A6Ly8iO2k6MjQyO3M6MTQzOiJwcmVnX3JlcGxhY2VccypcKFxzKlsnIl17MCwxfS9cXlwod3d3XHxmdHBcKVxcXC4vaVsnIl17MCwxfVxzKixccypbJyJdezAsMX1bJyJdezAsMX0sXHMqQFwkX1NFUlZFUlxzKlxbXHMqWyciXXswLDF9SFRUUF9IT1NUWyciXXswLDF9XHMqXF1ccypcKSI7aToyNDM7czoyNjE6ImlmXHMqXCgqXHMqaXNzZXRccypcKCpccypcJF8oR0VUfFBPU1R8U0VSVkVSfENPT0tJRXxSRVFVRVNUKVxzKlxbXHMqWyciXXswLDF9W2EtekEtWl8wLTldK1snIl17MCwxfVxzKlxdXHMqXCkqXHMqXClccyp7XHMqXCRbYS16QS1aXzAtOV0rXHMqPVxzKlwkXyhHRVR8UE9TVHxTRVJWRVJ8Q09PS0lFfFJFUVVFU1QpXHMqXFtccypbJyJdezAsMX1bYS16QS1aXzAtOV0rWyciXXswLDF9XHMqXF07XHMqZXZhbFxzKlwoKlxzKlwkW2EtekEtWl8wLTldK1xzKlwpKiI7aToyNDQ7czo4MToiZXZhbFxzKlwoKlxzKnN0cmlwc2xhc2hlc1xzKlwoKlxzKmFycmF5X3BvcFwoKlwkXyhHRVR8UE9TVHxTRVJWRVJ8Q09PS0lFfFJFUVVFU1QpIjtpOjI0NTtzOjE1NDoiaWZccytcKFxzKnN0cnBvc1xzKlwoXHMqXCR1cmxccyosXHMqWyciXXswLDF9anMvbW9vdG9vbHNcLmpzWyciXXswLDF9XHMqXClccyo9PT1ccypmYWxzZVxzKyYmXHMrc3RycG9zXHMqXChccypcJHVybFxzKixccypbJyJdezAsMX1qcy9jYXB0aW9uXC5qc1snIl17MCwxfSI7aToyNDY7czo2ODoiaWZccytcKCpccyptYWlsXHMqXChccypcJHJlY3BccyosXHMqXCRzdWJqXHMqLFxzKlwkc3R1bnRccyosXHMqXCRmcm0iO2k6MjQ3O3M6NDM6IjxcP3BocFxzK1wkX0Zccyo9XHMqX19GSUxFX19ccyo7XHMqXCRfWFxzKj0iO2k6MjQ4O3M6MTA0OiJcJHhcZCtccyo9XHMqWyciXXswLDF9Lis/WyciXXswLDF9XHMqO1xzKlwkeFxkK1xzKj1ccypbJyJdezAsMX0uKz9bJyJdezAsMX1ccyo7XHMqXCR4XGQrXHMqPVxzKlsnIl17MCwxfSI7aToyNDk7czoxMTU6IlwkYmVlY29kZVxzKj1AKmZpbGVfZ2V0X2NvbnRlbnRzXHMqWyciXXswLDF9XCgqXHMqXCR1cmxwdXJzXHMqWyciXXswLDF9XCkqXHMqO1xzKmVjaG9ccytbJyJdezAsMX1cJGJlZWNvZGVbJyJdezAsMX0iO2k6MjUwO3M6MTAxOiJcJEdMT0JBTFNcW1xzKlsnIl17MCwxfS4rP1snIl17MCwxfVxzKlxdXFtccypcZCtccypcXVwoXHMqXCRfXGQrXHMqLFxzKl9cZCtccypcKFxzKlxkK1xzKlwpXHMqXClccypcKSI7aToyNTE7czo3MzoicHJlZ19yZXBsYWNlXHMqXCgqXHMqWyciXXswLDF9L1wuXCpcWy4rP1xdXD8vZVsnIl17MCwxfVxzKixccypzdHJfcmVwbGFjZSI7aToyNTI7czoxNDk6IlwkR0xPQkFMU1xbWyciXXswLDF9Lis/WyciXXswLDF9XF09QXJyYXlccypcKFxzKmJhc2U2NF9kZWNvZGVccypcKFxzKlsnIl17MCwxfS4rP1snIl17MCwxfVxzKlwpXHMqLFxzKmJhc2U2NF9kZWNvZGVccypcKFxzKlsnIl17MCwxfS4rP1snIl17MCwxfVxzKlwpIjtpOjI1MztzOjIwMDoiVU5JT05ccytTRUxFQ1RccytbJyJdezAsMX0wWyciXXswLDF9XHMqLFxzKlsnIl17MCwxfTxcPyBzeXN0ZW1cKFxcXCRfKEdFVHxQT1NUfFNFUlZFUnxDT09LSUV8UkVRVUVTVClcW2NwY1xdXCk7ZXhpdDtccypcPz5bJyJdezAsMX1ccyosXHMqMFxzKiwwXHMqLFxzKjBccyosXHMqMFxzK0lOVE9ccytPVVRGSUxFXHMrWyciXXswLDF9XCRbJyJdezAsMX0iO2k6MjU0O3M6OTM6Imlzc2V0XCgqXCRfQCooR0VUfFBPU1R8U0VSVkVSfENPT0tJRXxSRVFVRVNUKVxbWyciXXswLDF9Lis/WyciXXswLDF9XF1cKSpccypvclxzKmRpZVwoKi4qP1wpKiI7aToyNTU7czo2NjoiaXNzZXRccypcKCpccypcJF9QT1NUXHMqXFtccypbJyJdezAsMX1leGVjZ2F0ZVsnIl17MCwxfVxzKlxdXHMqXCkqIjtpOjI1NjtzOjgxOiJmd3JpdGVccypcKCpccypcJGZwc2V0dlxzKixccypnZXRlbnZccypcKFxzKlsnIl17MCwxfUhUVFBfQ09PS0lFWyciXXswLDF9XHMqXClccyoiO2k6MjU3O3M6NTc6Ik9wdGlvbnNccytGb2xsb3dTeW1MaW5rc1xzK011bHRpVmlld3NccytJbmRleGVzXHMrRXhlY0NHSSI7aToyNTg7czozMToic3ltbGlua1xzKlwoKlxzKlsnIl17MCwxfS9ob21lLyI7aToyNTk7czo3MDoiZnVuY3Rpb25ccyt1cmxHZXRDb250ZW50c1xzKlwoKlxzKlwkdXJsXHMqLFxzKlwkdGltZW91dFxzKj1ccypcZCtccypcKSI7aToyNjA7czo0OToic3RycmV2XCgqXHMqWyciXXswLDF9ZWRvY2VkXzQ2ZXNhYlsnIl17MCwxfVxzKlwpKiI7aToyNjE7czo0Mjoic3RycmV2XCgqXHMqWyciXXswLDF9dHJlc3NhWyciXXswLDF9XHMqXCkqIjtpOjI2MjtzOjI1OiJleGVjXHMqXChccypbJyJdezAsMX1pcGZ3IjtpOjI2MztzOjEzNjoid3BfcG9zdHNccytXSEVSRVxzK3Bvc3RfdHlwZVxzKj1ccypbJyJdezAsMX1wb3N0WyciXXswLDF9XHMrQU5EXHMrcG9zdF9zdGF0dXNccyo9XHMqWyciXXswLDF9cHVibGlzaFsnIl17MCwxfVxzK09SREVSXHMrQllccytgSURgXHMrREVTQyI7aToyNjQ7czoxMTI6ImZpbGVfZ2V0X2NvbnRlbnRzXHMqXCgqXHMqdHJpbVxzKlwoXHMqXCQuKz9cW1wkXyhHRVR8UE9TVHxTRVJWRVJ8Q09PS0lFfFJFUVVFU1QpXFtbJyJdezAsMX0uKz9bJyJdezAsMX1cXVxdXClcKTsiO2k6MjY1O3M6MTk1OiJpc19jYWxsYWJsZVxzKlwoKlxzKlsnIl17MCwxfShzeXN0ZW18c2hlbGxfZXhlY3xwYXNzdGhydXxwb3Blbnxwcm9jX29wZW4pWyciXXswLDF9XCkqXHMrYW5kXHMrIWluX2FycmF5XHMqXCgqXHMqWyciXXswLDF9KHN5c3RlbXxzaGVsbF9leGVjfHBhc3N0aHJ1fHBvcGVufHByb2Nfb3BlbilbJyJdezAsMX1ccyosXHMqXCRkaXNhYmxlZnVuY3MiO2k6MjY2O3M6MjQ6IlwkR0xPQkFMU1xbWyciXXswLDF9X19fXyI7aToyNjc7czo0MzoiZm9wZW5ccypcKCpccypbJyJdezAsMX0vZXRjL3Bhc3N3ZFsnIl17MCwxfSI7aToyNjg7czo1OToiZXZhbFxzKlwoKkAqXHMqc3RyaXBzbGFzaGVzXHMqXCgqXHMqYXJyYXlfcG9wXHMqXCgqXHMqQCpcJF8iO2k6MjY5O3M6NDE6ImV2YWxccypcKCpAKlxzKnN0cmlwc2xhc2hlc1xzKlwoKlxzKkAqXCRfIjtpOjI3MDtzOjUyOiJpc193cml0YWJsZVxzKlwoKlxzKlsnIl17MCwxfS92YXIvdG1wWyciXXswLDF9XHMqXCkqIjtpOjI3MTtzOjc0OiJAKnNldGNvb2tpZVxzKlwoKlxzKlsnIl17MCwxfWhpdFsnIl17MCwxfSxccyoxXHMqLFxzKnRpbWVccypcKCpccypcKSpccypcKyI7aToyNzI7czozNjoiZXZhbFxzKlwoKlxzKmZpbGVfZ2V0X2NvbnRlbnRzXHMqXCgqIjtpOjI3MztzOjQ2OiJwcmVnX3JlcGxhY2VccypcKCpccypbJyJdezAsMX0vXC5cKi9lWyciXXswLDF9IjtpOjI3NDtzOjgxOiJccyp7XHMqXCRfKEdFVHxQT1NUfFNFUlZFUnxDT09LSUV8UkVRVUVTVClccypcW1xzKlsnIl17MCwxfXJvb3RbJyJdezAsMX1ccypcXVxzKn0iO2k6Mjc1O3M6MTM1OiJbJyJdezAsMX1odHRwZFwuY29uZlsnIl17MCwxfVxzKixccypbJyJdezAsMX12aG9zdHNcLmNvbmZbJyJdezAsMX1ccyosXHMqWyciXXswLDF9Y2ZnXC5waHBbJyJdezAsMX1ccyosXHMqWyciXXswLDF9Y29uZmlnXC5waHBbJyJdezAsMX0iO2k6Mjc2O3M6MzM6InByb2Nfb3BlblxzKlwoXHMqWyciXXswLDF9SUhTdGVhbSI7aToyNzc7czo4ODoiXCRpbmlccypcW1xzKlsnIl17MCwxfXVzZXJzWyciXXswLDF9XHMqXF1ccyo9XHMqYXJyYXlccypcKFxzKlsnIl17MCwxfXJvb3RbJyJdezAsMX1ccyo9PiI7aToyNzg7czo4ODoiY3VybF9zZXRvcHRccypcKFxzKlwkY2hccyosXHMqQ1VSTE9QVF9VUkxccyosXHMqWyciXXswLDF9aHR0cDovL1wkaG9zdDpcZCtbJyJdezAsMX1ccypcKSI7aToyNzk7czo0NToic3lzdGVtXHMqXCgqXHMqWyciXXswLDF9d2hvYW1pWyciXXswLDF9XHMqXCkqIjtpOjI4MDtzOjUyOiJmaW5kXHMrL1xzKy1uYW1lXHMrXC5zc2hccys+XHMrXCRkaXIvc3Noa2V5cy9zc2hrZXlzIjtpOjI4MTtzOjM3OiJyZXF1aXJlX29uY2VccypcKCpccypbJyJdezAsMX1pbWFnZXMvIjtpOjI4MjtzOjM3OiJpbmNsdWRlX29uY2VccypcKCpccypbJyJdezAsMX1pbWFnZXMvIjtpOjI4MztzOjU4OiJyZXF1aXJlX29uY2VccypcKCpccypAKlwkXyhHRVR8UE9TVHxTRVJWRVJ8Q09PS0lFfFJFUVVFU1QpIjtpOjI4NDtzOjU4OiJpbmNsdWRlX29uY2VccypcKCpccypAKlwkXyhHRVR8UE9TVHxTRVJWRVJ8Q09PS0lFfFJFUVVFU1QpIjtpOjI4NTtzOjMyOiJyZXF1aXJlXHMqXCgqXHMqWyciXXswLDF9aW1hZ2VzLyI7aToyODY7czozMjoiaW5jbHVkZVxzKlwoKlxzKlsnIl17MCwxfWltYWdlcy8iO2k6Mjg3O3M6NTM6InJlcXVpcmVccypcKCpccypAKlwkXyhHRVR8UE9TVHxTRVJWRVJ8Q09PS0lFfFJFUVVFU1QpIjtpOjI4ODtzOjUzOiJpbmNsdWRlXHMqXCgqXHMqQCpcJF8oR0VUfFBPU1R8U0VSVkVSfENPT0tJRXxSRVFVRVNUKSI7aToyODk7czo1MjoiYXNzZXJ0XHMqXCgqXHMqQCpcJF8oR0VUfFBPU1R8U0VSVkVSfENPT0tJRXxSRVFVRVNUKSI7aToyOTA7czo1MDoiZXZhbFxzKlwoKlxzKkAqXCRfKEdFVHxQT1NUfFNFUlZFUnxDT09LSUV8UkVRVUVTVCkiO2k6MjkxO3M6MjU6InBocFxzKyJccypcLlxzKlwkd3NvX3BhdGgiO2k6MjkyO3M6ODk6IkAqYXNzZXJ0XHMqXCgqXHMqXCRfKEdFVHxQT1NUfFNFUlZFUnxDT09LSUV8UkVRVUVTVClccypcW1xzKlsnIl17MCwxfS4rP1snIl17MCwxfVxzKlxdXHMqIjtpOjI5MztzOjEwOiJldmExLis/U2lyIjtpOjI5NDtzOjkzOiJcJGNtZFxzKj1ccypcKFxzKkAqXCRfKEdFVHxQT1NUfFNFUlZFUnxDT09LSUV8UkVRVUVTVClccypcW1xzKlsnIl17MCwxfS4rP1snIl17MCwxfVxzKlxdXHMqXCkiO2k6Mjk1O3M6OTY6IlwkZnVuY3Rpb25ccypcKCpccypAKlwkXyhHRVR8UE9TVHxTRVJWRVJ8Q09PS0lFfFJFUVVFU1QpXHMqXFtccypbJyJdezAsMX1jbWRbJyJdezAsMX1ccypcXVxzKlwpKiI7aToyOTY7czoyMzoiXCRmZVwoIlwkY21kXHMrMj4mMSJcKTsiO2k6Mjk3O3M6ODg6InN5c3RlbVwoIlwkY21kXHMrMT5ccyovdG1wL2NtZHRlbXBccysyPiYxO1xzKmNhdFxzKy90bXAvY21kdGVtcDtccypybVxzKy90bXAvY21kdGVtcCJcKTsiO2k6Mjk4O3M6NjM6InNldGNvb2tpZVwoKlxzKlsnIl17MCwxfW15c3FsX3dlYl9hZG1pbl91c2VybmFtZVsnIl17MCwxfVxzKlwpKiI7aToyOTk7czo1Mzoic2hlbGxfZXhlY1xzKlwoKlxzKlsnIl17MCwxfXVuYW1lXHMrLWFbJyJdezAsMX1ccypcKSoiO2k6MzAwO3M6OTQ6InNoZWxsX2V4ZWNccypcKCpccypAKlwkX1BPU1RccypcW1xzKlsnIl17MCwxfS4rP1snIl17MCwxfVxzKlxdXHMqXC5ccyoiXHMqMlxzKj5ccyomMVxzKiJccypcKSoiO2k6MzAxO3M6NDM6IiFAKlwkX1JFUVVFU1RccypcW1xzKiJjOTlzaF9zdXJsIlxzKlxdXHMqXCkiO2k6MzAyO3M6Mzc6IlwkbG9naW5ccyo9XHMqQCpwb3NpeF9nZXR1aWRcKCpccypcKSoiO2k6MzAzO3M6MzA6ImV4ZWNccypcKCpccypbJyJdezAsMX1ybVxzKi1mciI7aTozMDQ7czozMDoiZXhlY1xzKlwoKlxzKlsnIl17MCwxfXJtXHMqLXJmIjtpOjMwNTtzOjM0OiJleGVjXHMqXCgqXHMqWyciXXswLDF9cm1ccyotclxzKi1mIjtpOjMwNjtzOjMxOiJuY2Z0cHB1dFxzKi11XHMqXCRmdHBfdXNlcl9uYW1lIjtpOjMwNztzOjEwMjoicnVuY29tbWFuZFxzKlwoXHMqWyciXXswLDF9c2hlbGxoZWxwWyciXXswLDF9XHMqLFxzKlsnIl17MCwxfShHRVR8UE9TVHxTRVJWRVJ8Q09PS0lFfFJFUVVFU1QpWyciXXswLDF9IjtpOjMwODtzOjU1OiJ7XHMqXCRccyp7XHMqcGFzc3RocnVccypcKCpccypcJGNtZFxzKlwpXHMqfVxzKn1ccyo8YnI+IjtpOjMwOTtzOjUzOiJwYXNzdGhydVxzKlwoKlxzKmdldGVudlxzKlwoKlxzKidIVFRQX0FDQ0VQVF9MQU5HVUFHRSI7aTozMTA7czo1MzoicGFzc3RocnVccypcKCpccypnZXRlbnZccypcKCpccyoiSFRUUF9BQ0NFUFRfTEFOR1VBR0UiO2k6MzExO3M6ODc6IlNFTEVDVFxzKzFccytGUk9NXHMrbXlzcWxcLnVzZXJccytXSEVSRVxzK2NvbmNhdFwoXHMqYHVzZXJgXHMqLFxzKidAJ1xzKixccypgaG9zdGBccypcKSI7aTozMTI7czo5NzoiXCRNZXNzYWdlU3ViamVjdFxzKj1ccypiYXNlNjRfZGVjb2RlXHMqXChccypcJF9QT1NUXHMqXFtccypbJyJdezAsMX1tc2dzdWJqZWN0WyciXXswLDF9XHMqXF1ccypcKSI7aTozMTM7czo0NDoicmVuYW1lXHMqXChccypbJyJdezAsMX13c29cLnBocFsnIl17MCwxfVxzKiwiO2k6MzE0O3M6Njg6ImZpbGVwYXRoXHMqPVxzKkAqcmVhbHBhdGhccypcKFxzKlwkX1BPU1RccypcW1xzKiJmaWxlcGF0aCJccypcXVxzKlwpIjtpOjMxNTtzOjY4OiJmaWxlcGF0aFxzKj1ccypAKnJlYWxwYXRoXHMqXChccypcJF9QT1NUXHMqXFtccyonZmlsZXBhdGgnXHMqXF1ccypcKSI7aTozMTY7czo0MDoiZXZhbFxzKlwoKlxzKmJhc2U2NF9kZWNvZGVccypcKCpccypAKlwkXyI7aTozMTc7czo4Nzoid3NvRXhccypcKFxzKidccyp0YXJccypjZnp2XHMqJ1xzKlwuXHMqZXNjYXBlc2hlbGxhcmdccypcKFxzKlwkX1BPU1RcW1xzKidwMidccypcXVxzKlwpIjtpOjMxODtzOjY4OiJXU09zZXRjb29raWVccypcKFxzKm1kNVxzKlwoXHMqQCpcJF9TRVJWRVJcW1xzKiJIVFRQX0hPU1QiXHMqXF1ccypcKSI7aTozMTk7czo2ODoiV1NPc2V0Y29va2llXHMqXChccyptZDVccypcKFxzKkAqXCRfU0VSVkVSXFtccyonSFRUUF9IT1NUJ1xzKlxdXHMqXCkiO2k6MzIwO3M6MTUwOiJcJGluZm8gXC49IFwoXChcJHBlcm1zXHMqJlxzKjB4MDA0MFwpXHMqXD9cKFwoXCRwZXJtc1xzKiZccyoweDA4MDBcKVxzKlw/XHMqJ3MnXHMqOlxzKid4J1xzKlwpXHMqOlwoXChcJHBlcm1zXHMqJlxzKjB4MDgwMFwpXHMqXD9ccyonUydccyo6XHMqJy0nXHMqXCkiO2k6MzIxO3M6MzA6ImRlZmF1bHRfYWN0aW9uXHMqPVxzKidGaWxlc01hbiI7aTozMjI7czozMzoic3lzdGVtXHMrZmlsZVxzK2RvXHMrbm90XHMrZGVsZXRlIjtpOjMyMztzOjE5OiJoYWNrZWRccytieVxzK0htZWk3IjtpOjMyNDtzOjExOiJieVxzK0dyaW5heSI7aTozMjU7czoyMzoiQ2FwdGFpblxzK0NydW5jaFxzK1RlYW0iO2k6MzI2O3M6OTY6IlwkXyhHRVR8UE9TVHxTRVJWRVJ8Q09PS0lFfFJFUVVFU1QpXFtccypbJyJdezAsMX1wMlsnIl17MCwxfVxzKlxdXHMqPT1ccypbJyJdezAsMX1jaG1vZFsnIl17MCwxfSI7fQ=="));
$gX_FlexDBShe = unserialize(base64_decode("YToxMTU6e2k6MDtzOjYxOiIvcGx1Z2lucy9zZWFyY2gvcXVlcnlcLnBocFw/X19fX3BnZmE9aHR0cCUzQSUyRiUyRnd3d1wuZ29vZ2xlIjtpOjE7czozNjoiY3JlYXRlX2Z1bmN0aW9uXChzdWJzdHJcKDIsMVwpLFwkc1wpIjtpOjI7czo4MToidHlwZW9mXHMqXChkbGVfYWRtaW5cKVxzKj09XHMqWyciXXswLDF9dW5kZWZpbmVkWyciXXswLDF9XHMqXHxcfFxzKmRsZV9hZG1pblxzKj09IjtpOjM7czozMjoiXFtcJG9cXVwpO1wkb1wrXCtcKXtpZlwoXCRvPDE2XCkiO2k6NDtzOjMyOiJcJFNcW1wkaVwrXCtcXVwoXCRTXFtcJGlcK1wrXF1cKCI7aTo1O3M6Mzc6InNldGNvb2tpZVwoXHMqXCR6XFswXF1ccyosXHMqXCR6XFsxXF0iO2k6NjtzOjg2OiIvaW5kZXhcLnBocFw/b3B0aW9uPWNvbV9qY2UmdGFzaz1wbHVnaW4mcGx1Z2luPWltZ21hbmFnZXImZmlsZT1pbWdtYW5hZ2VyJnZlcnNpb249MTU3NiI7aTo3O3M6MTU6ImNhdGF0YW5ccytzaXR1cyI7aTo4O3M6NDE6ImlmXChccyppc3NldFwoXHMqXCRfUkVRVUVTVFxbWyciXXswLDF9Y2lkIjtpOjk7czo0MDoic3RyX3JlcGxhY2VccypcKFxzKlsnIl17MCwxfS9wdWJsaWNfaHRtbCI7aToxMDtzOjUxOiJAYXJyYXlcKFxzKlwoc3RyaW5nXClccypzdHJpcHNsYXNoZXNcKFxzKlwkX1JFUVVFU1QiO2k6MTE7czo2MDoiaWZccypcKFxzKmZpbGVfcHV0X2NvbnRlbnRzXHMqXChccypcJGluZGV4X3BhdGhccyosXHMqXCRjb2RlIjtpOjEyO3M6OTQ6ImlmXChpc19kaXJcKFwkcGF0aFwuWyciXXswLDF9L3dwLWNvbnRlbnRbJyJdezAsMX1cKVxzK0FORFxzK2lzX2RpclwoXCRwYXRoXC5bJyJdezAsMX0vd3AtYWRtaW4iO2k6MTM7czoyODoiaWZcKFwkbzwxNlwpe1wkaFxbXCRlXFtcJG9cXSI7aToxNDtzOjk6ImJ5XHMrZzAwbiI7aToxNTtzOjE1OiJBdXRvXHMqWHBsb2l0ZXIiO2k6MTY7czo5MzoiKHN5c3RlbXxzaGVsbF9leGVjfHBhc3N0aHJ1fHBvcGVufHByb2Nfb3BlbilcKFsnIl17MCwxfVwkXyhHRVR8UE9TVHxTRVJWRVJ8Q09PS0lFfFJFUVVFU1QpXFsiIjtpOjE3O3M6NjM6IihzeXN0ZW18c2hlbGxfZXhlY3xwYXNzdGhydXxwb3Blbnxwcm9jX29wZW4pXChbJyJdezAsMX1jbWRcLmV4ZSI7aToxODtzOjk6IkJ5XHMrRFoyNyI7aToxOTtzOjI3OiJFdGhuaWNccytBbGJhbmlhblxzK0hhY2tlcnMiO2k6MjA7czoyMDoiVm9sZ29ncmFkaW5kZXhcLmh0bWwiO2k6MjE7czozMjoiXCRfUG9zdFxbWyciXXswLDF9U1NOWyciXXswLDF9XF0iO2k6MjI7czoxNToicGFja1xzKyJTbkE0eDgiIjtpOjIzO3M6MTQ6IlsnIl17MCwxfURaZTFyIjtpOjI0O3M6MTI6IlRlYU1ccytNb3NUYSI7aToyNTtzOjUzOiJcJF8oR0VUfFBPU1R8U0VSVkVSfENPT0tJRXxSRVFVRVNUKVxzKlxbXHMqLio/XHMqXF1cKCI7aToyNjtzOjEzOiJAZXh0cmFjdFxzKlwkIjtpOjI3O3M6MTM6IkBleHRyYWN0XHMqXCgiO2k6Mjg7czo3NzoibWFpbFxzKlwoXCRlbWFpbFxzKixccypbJyJdezAsMX09XD9VVEYtOFw/Qlw/WyciXXswLDF9XC5iYXNlNjRfZW5jb2RlXChcJGZyb20iO2k6Mjk7czo2MzoiaWZcKG1haWxcKFwkZW1haWxcW1wkaVxdLFxzKlwkc3ViamVjdCxccypcJG1lc3NhZ2UsXHMqXCRoZWFkZXJzIjtpOjMwO3M6ODE6Im1haWxcKFwkX1BPU1RcW1snIl17MCwxfWVtYWlsWyciXXswLDF9XF0sXHMqXCRfUE9TVFxbWyciXXswLDF9c3ViamVjdFsnIl17MCwxfVxdLCI7aTozMTtzOjM2OiJwcmludFxzK1snIl17MCwxfWRsZV9udWxsZWRbJyJdezAsMX0iO2k6MzI7czozOToiaWZccypcKGNoZWNrX2FjY1woXCRsb2dpbixcJHBhc3MsXCRzZXJ2IjtpOjMzO3M6Mzg6InByZWdfcmVwbGFjZVwoXCl7cmV0dXJuXHMrX19GVU5DVElPTl9fIjtpOjM0O3M6MzM6Ilwkb3B0XHMqPVxzKlwkZmlsZVwoQCpcJF9DT09LSUVcWyI7aTozNTtzOjEwNDoibW92ZV91cGxvYWRlZF9maWxlXHMqXChccypcJF9GSUxFU1xbWyciXXswLDF9W2EtekEtWjAtOV9dKz9bJyJdezAsMX1cXVxbWyciXXswLDF9dG1wX25hbWVbJyJdezAsMX1cXVxzKiwiO2k6MzY7czozNjoiaWZcKEBmdW5jdGlvbl9leGlzdHNcKFsnIl17MCwxfWZyZWFkIjtpOjM3O3M6MTA4OiJmb3JcKFwkW2EtekEtWjAtOV9dKz89XGQrO1wkW2EtekEtWjAtOV9dKz88XGQrO1wkW2EtekEtWjAtOV9dKz8tPVxkK1wpe2lmXChcJFthLXpBLVowLTlfXSs/IT1cZCtcKVxzKmJyZWFrO30iO2k6Mzg7czozNToiXCRjb3VudGVyVXJsXHMqPVxzKlsnIl17MCwxfWh0dHA6Ly8iO2k6Mzk7czoxMDc6ImFycmF5XChccypbJyJdezAsMX1oWyciXXswLDF9XHMqLFxzKlsnIl17MCwxfXRbJyJdezAsMX1ccyosXHMqWyciXXswLDF9dFsnIl17MCwxfVxzKixccypbJyJdezAsMX1wWyciXXswLDF9IjtpOjQwO3M6NjA6ImlmXHMqXChmdW5jdGlvbl9leGlzdHNcKFsnIl17MCwxfXNjYW5fZGlyZWN0b3J5WyciXXswLDF9XClcKSI7aTo0MTtzOjYyOiJcJF9TRVNTSU9OXFtbJyJdezAsMX1kYXRhX2FbJyJdezAsMX1cXVxbXCRuYW1lXF1ccyo9XHMqXCR2YWx1ZSI7aTo0MjtzOjUzOiJmb3JlYWNoXChJUEJfRmlyZXdhbGw6OlwkX2Nvb2tpZV9tYWxpY2lvdXNfc2lnbmF0dXJlcyI7aTo0MztzOjM4OiJaZW5kXHMrT3B0aW1pemF0aW9uXHMrdmVyXHMrMVwuMFwuMFwuMSI7aTo0NDtzOjI2OiJpbmRleFwucGhwXD9pZD1cJDEmJXtRVUVSWSI7aTo0NTtzOjg2OiJAaW5pX3NldFxzKlwoWyciXXswLDF9aW5jbHVkZV9wYXRoWyciXXswLDF9LFsnIl17MCwxfWluaV9nZXRccypcKFsnIl17MCwxfWluY2x1ZGVfcGF0aCI7aTo0NjtzOjI4OiJpZlxzKlwoQGlzX3dyaXRhYmxlXChcJGluZGV4IjtpOjQ3O3M6Mjg6IlwkX1BPU1RcW1snIl17MCwxfXNtdHBfbG9naW4iO2k6NDg7czozNzoiX1snIl17MCwxfVxdXFsyXF1cKFsnIl17MCwxfUxvY2F0aW9uOiI7aTo0OTtzOjM0OiJpZlwoQHByZWdfbWF0Y2hcKHN0cnRyXChbJyJdezAsMX0vIjtpOjUwO3M6MTU6IjwhLS1ccytqcy10b29scyI7aTo1MTtzOjc6InVnZ2M6Ly8iO2k6NTI7czo0NzoiaWYgXChkYXRlXChbJyJdezAsMX1qWyciXXswLDF9XClccyotXHMqXCRuZXdzaWQiO2k6NTM7czoxNjoiPERhdmlkXHMrQmxhaW5lPiI7aTo1NDtzOjI1OiJcJGlzZXZhbGZ1bmN0aW9uYXZhaWxhYmxlIjtpOjU1O3M6NDE6ImlmIFwoIXN0cnBvc1woXCRzdHJzXFswXF0sWyciXXswLDF9PFw/cGhwIjtpOjU2O3M6ODU6Ilwkc3RyaW5nXHMqPVxzKlwkX1NFU1NJT05cW1snIl17MCwxfWRhdGFfYVsnIl17MCwxfVxdXFtbJyJdezAsMX1udXR6ZXJuYW1lWyciXXswLDF9XF0iO2k6NTc7czo1Njoid2hpbGVcKGNvdW50XChcJGxpbmVzXCk+XCRjb2xfemFwXCkgYXJyYXlfcG9wXChcJGxpbmVzXCkiO2k6NTg7czoxMDQ6InNpdGVfZnJvbT1bJyJdezAsMX1cLlwkX1NFUlZFUlxbWyciXXswLDF9SFRUUF9IT1NUWyciXXswLDF9XF1cLlsnIl17MCwxfSZzaXRlX2ZvbGRlcj1bJyJdezAsMX1cLlwkZlxbMVxdIjtpOjU5O3M6MzE6IlwkZmlsZWJccyo9XHMqZmlsZV9nZXRfY29udGVudHMiO2k6NjA7czozMzoicG9ydGxldHMvZnJhbWV3b3JrL3NlY3VyaXR5L2xvZ2luIjtpOjYxO3M6Mjk6IlwkYlxzKj1ccyptZDVfZmlsZVwoXCRmaWxlYlwpIjtpOjYyO3M6NDU6Ik1vemlsbGEvNVwuMFxzKlwoY29tcGF0aWJsZTtccypHb29nbGVib3QvMlwuMSI7aTo2MztzOjUxOiJcJGRhdGFccyo9XHMqYXJyYXlcKFsnIl17MCwxfXRlcm1pbmFsWyciXXswLDF9XHMqPT4iO2k6NjQ7czo3MDoic3RycG9zXChcJF9TRVJWRVJcW1snIl17MCwxfUhUVFBfUkVGRVJFUlsnIl17MCwxfVxdLFxzKlsnIl17MCwxfWdvb2dsZSI7aTo2NTtzOjcwOiJzdHJwb3NcKFwkX1NFUlZFUlxbWyciXXswLDF9SFRUUF9SRUZFUkVSWyciXXswLDF9XF0sXHMqWyciXXswLDF9eWFuZGV4IjtpOjY2O3M6Nzc6InN0cmlzdHJcKFwkX1NFUlZFUlxbWyciXXswLDF9SFRUUF9VU0VSX0FHRU5UWyciXXswLDF9XF0sXHMqWyciXXswLDF9WWFuZGV4Qm90IjtpOjY3O3M6NDY6InByZWdfcmVwbGFjZVwoXHMqWyciXXswLDF9ZVsnIl17MCwxfSxbJyJdezAsMX0iO2k6Njg7czoyMDoiKFteXD9dKVwuXCpcMlthLXpdKmUiO2k6Njk7czoxNDoicm9vdEBsb2NhbGhvc3QiO2k6NzA7czo0NToicGhwX1snIl17MCwxfVwuXCRleHRcLlsnIl17MCwxfVwuZGxsWyciXXswLDF9IjtpOjcxO3M6NDc6IihcXFxcWzAtOV1bMC05XVswLTldfFxcXFx4WzAtOWEtZl1bMC05YS1mXSl7Nyx9IjtpOjcyO3M6MzA6Ii9lWyciXXswLDF9XHMqLFxzKlsnIl17MCwxfVxceCI7aTo3MztzOjI0OiJwYWdlX2ZpbGVzL3N0eWxlMDAwXC5jc3MiO2k6NzQ7czoxNzoiPC9ib2R5PlxzKjxzY3JpcHQiO2k6NzU7czo2NjoiUmV3cml0ZUNvbmRccyole0hUVFA6QWNjZXB0LUxhbmd1YWdlfVxzKlwocnVcfHJ1LXJ1XHx1a1wpXHMqXFtOQ1xdIjtpOjc2O3M6NDI6IlJld3JpdGVDb25kXHMqJXtIVFRQOngtb3BlcmFtaW5pLXBob25lLXVhfSI7aTo3NztzOjM0OiJSZXdyaXRlQ29uZFxzKiV7SFRUUDp4LXdhcC1wcm9maWxlIjtpOjc4O3M6MjI6ImV2YWxccypcKFxzKmdldF9vcHRpb24iO2k6Nzk7czoxNjoiU3BhbVxzK2NvbXBsZXRlZCI7aTo4MDtzOjI5OiJlY2hvXHMrWyciXXswLDF9Z29vZFsnIl17MCwxfSI7aTo4MTtzOjYwOiJcJF8oR0VUfFBPU1R8U0VSVkVSfENPT0tJRXxSRVFVRVNUKVxbWyciXXswLDF9Y3Z2WyciXXswLDF9XF0iO2k6ODI7czoxMToiQ1ZWOlxzKlwkY3YiO2k6ODM7czoxNToiXCRhdXRoX3Bhc3Nccyo9IjtpOjg0O3M6MjI6IjxoMT5Mb2FkaW5nXC5cLlwuPC9oMT4iO2k6ODU7czoxMjoicGhwaW5mb1woXCk7IjtpOjg2O3M6MjU6IlsnIl17MCwxfS9cLlwqL2VbJyJdezAsMX0iO2k6ODc7czozODoiZWNob1xzK1snIl17MCwxfW9cLmtcLlsnIl17MCwxfTtccypcPz4iO2k6ODg7czo1ODoiPG1ldGFccytodHRwLWVxdWl2PSJSZWZyZXNoIlxzK2NvbnRlbnQ9IlxkKztccypVUkw9aHR0cDovLyI7aTo4OTtzOjU3OiI8bWV0YVxzK2h0dHAtZXF1aXY9InJlZnJlc2giXHMrY29udGVudD0iXGQrO1xzKnVybD08XD9waHAiO2k6OTA7czo2NjoiKHN5c3RlbXxzaGVsbF9leGVjfHBhc3N0aHJ1fHBvcGVufHByb2Nfb3BlbilccypcKCpccypbJyJdezAsMX13Z2V0IjtpOjkxO3M6Njc6InN0cmNoclxzKlwoKlxzKlwkX1NFUlZFUlxbXHMqWyciXXswLDF9SFRUUF9VU0VSX0FHRU5UWyciXXswLDF9XHMqXF0iO2k6OTI7czo2Nzoic3Ryc3RyXHMqXCgqXHMqXCRfU0VSVkVSXFtccypbJyJdezAsMX1IVFRQX1VTRVJfQUdFTlRbJyJdezAsMX1ccypcXSI7aTo5MztzOjY3OiJzdHJwb3NccypcKCpccypcJF9TRVJWRVJcW1xzKlsnIl17MCwxfUhUVFBfVVNFUl9BR0VOVFsnIl17MCwxfVxzKlxdIjtpOjk0O3M6NDk6Imd6dW5jb21wcmVzc1xzKlwoKlxzKnN1YnN0clxzKlwoKlxzKmJhc2U2NF9kZWNvZGUiO2k6OTU7czoyMzoiQWRkSGFuZGxlclxzK3BocC1zY3JpcHQiO2k6OTY7czozMzoiQWRkVHlwZVxzK2FwcGxpY2F0aW9uL3gtaHR0cGQtcGhwIjtpOjk3O3M6MTA6InBjbnRsX2V4ZWMiO2k6OTg7czo2NToiKHN5c3RlbXxzaGVsbF9leGVjfHBhc3N0aHJ1fHBvcGVufHByb2Nfb3BlbilcKCpbJyJdezAsMX1jZFxzKy90bXAiO2k6OTk7czoyNzoiXCRPT08uKz89XHMqdXJsZGVjb2RlXHMqXCgqIjtpOjEwMDtzOjEyOiJybVxzKy1mXHMrLXIiO2k6MTAxO3M6MTI6InJtXHMrLXJccystZiI7aToxMDI7czo4OiJybVxzKy1mciI7aToxMDM7czo4OiJybVxzKy1yZiI7aToxMDQ7czo5NToiYWRkX2ZpbHRlclxzKlwoKlxzKlsnIl17MCwxfXRoZV9jb250ZW50WyciXXswLDF9XHMqLFxzKlsnIl17MCwxfV9ibG9naW5mb1snIl17MCwxfVxzKixccyouKz9cKSoiO2k6MTA1O3M6Mjk6ImV2YWxccypcKCpccypnZXRfb3B0aW9uXHMqXCgqIjtpOjEwNjtzOjk1OiIoc3lzdGVtfHNoZWxsX2V4ZWN8cGFzc3RocnV8cG9wZW58cHJvY19vcGVuKVxzKlwoKlxzKkAqXCRfKEdFVHxQT1NUfFNFUlZFUnxDT09LSUV8UkVRVUVTVClccypcWyI7aToxMDc7czo1OToiYmFzZTY0X2RlY29kZVxzKlwoKlxzKkAqXCRfKEdFVHxQT1NUfFNFUlZFUnxDT09LSUV8UkVRVUVTVCkiO2k6MTA4O3M6ODoibHNccystbGEiO2k6MTA5O3M6OTg6ImlmXHMqXChccyppc19jYWxsYWJsZVxzKlwoKlxzKlsnIl17MCwxfShzeXN0ZW18c2hlbGxfZXhlY3xwYXNzdGhydXxwb3Blbnxwcm9jX29wZW4pWyciXXswLDF9XHMqXCkqIjtpOjExMDtzOjUxOiJkb2N1bWVudFwud3JpdGVccypcKFxzKnVuZXNjYXBlXHMqXChccypbJyJdezAsMX0lM0MiO2k6MTExO3M6MTA1OiJpZlxzKlwoXHMqZnVuY3Rpb25fZXhpc3RzXHMqXChccypbJyJdezAsMX0oc3lzdGVtfHNoZWxsX2V4ZWN8cGFzc3RocnV8cG9wZW58cHJvY19vcGVuKVsnIl17MCwxfVxzKlwpXHMqXCkiO2k6MTEyO3M6NDA6ImV2YWxccypcKCpccypnemluZmxhdGVccypcKCpccypzdHJfcm90MTMiO2k6MTEzO3M6MTk6InJvdW5kXHMqXChccyowXHMqXCsiO2k6MTE0O3M6MTk6IkNvbnRlbnQtVHlwZTpccypcJF8iO30="));
$g_ExceptFlex = unserialize(base64_decode("YTo4OTp7aTowO3M6ODoic29ydFwoXCkiO2k6MTtzOjEwOiJtdXN0LXJldmFsIjtpOjI7czo5OiJyZXRyaWV2YWwiO2k6MztzOjk6ImRvdWJsZXZhbCI7aTo0O3M6NjY6InJlcXVpcmVccypcKCpccypcJF9TRVJWRVJcW1xzKlsnIl17MCwxfURPQ1VNRU5UX1JPT1RbJyJdezAsMX1ccypcXSI7aTo1O3M6NzE6InJlcXVpcmVfb25jZVxzKlwoKlxzKlwkX1NFUlZFUlxbXHMqWyciXXswLDF9RE9DVU1FTlRfUk9PVFsnIl17MCwxfVxzKlxdIjtpOjY7czo2NjoiaW5jbHVkZVxzKlwoKlxzKlwkX1NFUlZFUlxbXHMqWyciXXswLDF9RE9DVU1FTlRfUk9PVFsnIl17MCwxfVxzKlxdIjtpOjc7czo3MToiaW5jbHVkZV9vbmNlXHMqXCgqXHMqXCRfU0VSVkVSXFtccypbJyJdezAsMX1ET0NVTUVOVF9ST09UWyciXXswLDF9XHMqXF0iO2k6ODtzOjE3OiJcJHNtYXJ0eS0+X2V2YWxcKCI7aTo5O3M6MzA6InByZXBccytybVxzKy1yZlxzKyV7YnVpbGRyb290fSI7aToxMDtzOjIyOiJUT0RPOlxzK3JtXHMrLXJmXHMrdGhlIjtpOjExO3M6Mjc6Imtyc29ydFwoXCR3cHNtaWxpZXN0cmFuc1wpOyI7aToxMjtzOjYzOiJkb2N1bWVudFwud3JpdGVcKHVuZXNjYXBlXCgiJTNDc2NyaXB0IHNyYz0nIiBcKyBnYUpzSG9zdCBcKyAiZ28iO2k6MTM7czo2OiJcLmV4ZWMiO2k6MTQ7czo4OiJleGVjXChcKSI7aToxNTtzOjI0OiJcJHgxID0gXCR0aGlzLT53IC0gXCR4MTsiO2k6MTY7czozMToiYXNvcnRcKFwkQ2FjaGVEaXJPbGRGaWxlc0FnZVwpOyI7aToxNztzOjEzOiJcKCdyNTdzaGVsbCcsIjtpOjE4O3M6MjU6ImV2YWxcKCJsaXN0ZW5lciA9ICJcK2xpc3QiO2k6MTk7czo4OiJldmFsXChcKSI7aToyMDtzOjMzOiJwcmVnX3JlcGxhY2VfY2FsbGJhY2tcKCcvXFx7XChpbWEiO2k6MjE7czoyMToiZXZhbCBcKF9jdE1lbnVJbml0U3RyIjtpOjIyO3M6Mjk6ImJhc2U2NF9kZWNvZGVcKFwkYWNjb3VudEtleVwpIjtpOjIzO3M6Mzk6ImJhc2U2NF9kZWNvZGVcKFwkZGF0YVwpXCk7IFwkYXBpLT5zZXRSZSI7aToyNDtzOjQ4OiJyZXF1aXJlXChcJF9TRVJWRVJcW1xcIkRPQ1VNRU5UX1JPT1RcXCJcXVwuXFwiL2IiO2k6MjU7czo2NToiYmFzZTY0X2RlY29kZVwoXCRfUkVRVUVTVFxbJ3BhcmFtZXRlcnMnXF1cKTsgaWZcKENoZWNrU2VyaWFsaXplZEQiO2k6MjY7czo2MzoicGNudGxfZXhlYycgPT4gQXJyYXlcKEFycmF5XCgxXCksIFwkYXJSZXN1bHRcWydTRUNVUklOR19GVU5DVElPIjtpOjI3O3M6Mzk6ImVjaG8gIjxzY3JpcHQ+YWxlcnRcKCciXC5DVXRpbDo6SlNFc2NhcCI7aToyODtzOjY4OiJiYXNlNjRfZGVjb2RlXChcJF9SRVFVRVNUXFsndGl0bGVfY2hhbmdlcl9saW5rJ1xdXCk7IGlmIFwoc3RybGVuXChcJCI7aToyOTtzOjUxOiJldmFsXCgnXCRoZXhkdGltZSA9ICInIFwuIFwkaGV4ZHRpbWUgXC4gJyI7J1wpOyBcJGYiO2k6MzA7czo1MjoiZWNobyAiPHNjcmlwdD5hbGVydFwoJ1wkcm93LT50aXRsZSAtICJcLl9NT0RVTEVfSVNfRSI7aTozMTtzOjM3OiJlY2hvICI8c2NyaXB0PmFsZXJ0XCgnXCRjaWRzICJcLl9DQU5OIjtpOjMyO3M6NDE6ImlmXCgxXCkgeyBcJHZfaG91ciA9IFwoXCRwX2hlYWRlclxbJ210aW1lIjtpOjMzO3M6NzA6ImRvY3VtZW50XC53cml0ZVwodW5lc2NhcGVcKCIlM0NzY3JpcHQlMjBzcmM9JTIyaHR0cCIgXCsgXChcKCJodHRwczoiID0iO2k6MzQ7czo1NzoiZG9jdW1lbnRcLndyaXRlXCh1bmVzY2FwZVwoIiUzQ3NjcmlwdCBzcmM9JyIgXCsgcGtCYXNlVVJMIjtpOjM1O3M6MzI6ImVjaG8gIjxzY3JpcHQ+YWxlcnRcKCciXC5KVGV4dDo6IjtpOjM2O3M6MjU6IidmaWxlbmFtZSdcKSwgXCgncjU3c2hlbGwiO2k6Mzc7czo0MzoiZWNobyAiPHNjcmlwdD5hbGVydFwoJyIgXC4gXCRlcnJNc2cgXC4gIidcKSI7aTozODtzOjQyOiJlY2hvICI8c2NyaXB0PmFsZXJ0XChcXCJFcnJvciB3aGVuIGxvYWRpbmciO2k6Mzk7czo0MzoiZWNobyAiPHNjcmlwdD5hbGVydFwoJyJcLkpUZXh0OjpfXCgnVkFMSURfRSI7aTo0MDtzOjg6ImV2YWxcKFwpIjtpOjQxO3M6ODoiJ3N5c3RlbSciO2k6NDI7czo2OiInZXZhbCciO2k6NDM7czo2OiIiZXZhbCIiO2k6NDQ7czo2OiJjb3B5XCgiO2k6NDU7czo3OiJfc3lzdGVtIjtpOjQ2O3M6OToic2F2ZTJjb3B5IjtpOjQ3O3M6MTA6ImZpbGVzeXN0ZW0iO2k6NDg7czo4OiJzZW5kbWFpbCI7aTo0OTtzOjg6ImNhbkNobW9kIjtpOjUwO3M6OToiZG91YmxldmFsIjtpOjUxO3M6MTY6Im9wZXJhdGluZyBzeXN0ZW0iO2k6NTI7czoxMDoiZ2xvYmFsZXZhbCI7aTo1MztzOjIxOiJ3aXRoIDAvMC8wIGlmIFwoMVwpIHsiO2k6NTQ7czo0ODoiXCR4MiA9IFwkcGFyYW1cW1snIl17MCwxfXhbJyJdezAsMX1cXSBcKyBcJHdpZHRoIjtpOjU1O3M6MTE6InNwZWNpYWxpc2VkIjtpOjU2O3M6MTk6IndwX2dldF9jdXJyZW50X3VzZXIiO2k6NTc7czo3OiItPmNobW9kIjtpOjU4O3M6NzoiX21haWxcKCI7aTo1OTtzOjc6Il9jb3B5XCgiO2k6NjA7czo0Njoic3RycG9zXChcJF9TRVJWRVJcWydIVFRQX1VTRVJfQUdFTlQnXF0sICdEcnVwYSI7aTo2MTtzOjQ1OiJzdHJwb3NcKFwkX1NFUlZFUlxbJ0hUVFBfVVNFUl9BR0VOVCdcXSwgJ01TSUUiO2k6NjI7czo0NToic3RycG9zXChcJF9TRVJWRVJcWyJIVFRQX1VTRVJfQUdFTlQiXF0sICdNU0lFIjtpOjYzO3M6MTc6ImV2YWwgXChjbGFzc1N0clwpIjtpOjY0O3M6MzE6ImZ1bmN0aW9uX2V4aXN0c1woJ2Jhc2U2NF9kZWNvZGUiO2k6NjU7czo0NDoiZWNobyAiPHNjcmlwdD5hbGVydFwoJyJcLkpUZXh0OjpfXCgnVkFMSURfRU0iO2k6NjY7czo1MjoiXCR4MSA9IFwkbWluX3g7IFwkeDIgPSBcJG1heF94OyBcJHkxID0gXCRtaW5feTsgXCR5MiI7aTo2NztzOjU1OiJcJGN0bVxbJ2EnXF1cKVwpIHsgXCR4ID0gXCR4IFwqIFwkdGhpcy0+azsgXCR5ID0gXChcJHRoIjtpOjY4O3M6NjA6IlsnIl17MCwxfWNyZWF0ZV9mdW5jdGlvblsnIl17MCwxfSwgWyciXXswLDF9Z2V0X3Jlc291cmNlX3R5cCI7aTo2OTtzOjQ5OiJbJyJdezAsMX1jcmVhdGVfZnVuY3Rpb25bJyJdezAsMX0sIFsnIl17MCwxfWNyeXB0IjtpOjcwO3M6Njk6InN0cnBvc1woXCRfU0VSVkVSXFtbJyJdezAsMX1IVFRQX1VTRVJfQUdFTlRbJyJdezAsMX1cXSwgWyciXXswLDF9THlueCI7aTo3MTtzOjY4OiJzdHJzdHJcKFwkX1NFUlZFUlxbWyciXXswLDF9SFRUUF9VU0VSX0FHRU5UWyciXXswLDF9XF0sIFsnIl17MCwxfU1TSSI7aTo3MjtzOjI1OiJzb3J0XChcJERpc3RyaWJ1dGlvblxbXCRrIjtpOjczO3M6MjU6InNvcnRcKGZ1bmN0aW9uXChhLGJcKXtyZXQiO2k6NzQ7czoyNToiaHR0cDovL3d3d1wuZmFjZWJvb2tcLmNvbSI7aTo3NTtzOjI1OiJodHRwOi8vbWFwc1wuZ29vZ2xlXC5jb20vIjtpOjc2O3M6NTI6InVkcDovLydcLnNlbGY6OlwkY19hZGRyLCA4MCwgXCRlcnJubywgXCRlcnJzdHIsIDE1MDAiO2k6Nzc7czoyMDoiXChcLlwqXCh2aWV3XClcP1wuXCoiO2k6Nzg7czo0NDoiZWNobyBbJyJdezAsMX08c2NyaXB0PmFsZXJ0XChbJyJdezAsMX1cJHRleHQiO2k6Nzk7czoxNzoic29ydFwoXCR2X2xpc3RcKTsiO2k6ODA7czo3NzoibW92ZV91cGxvYWRlZF9maWxlXCggXCRfRklMRVNcWyd1cGxvYWRlZF9wYWNrYWdlJ1xdXFsndG1wX25hbWUnXF0sIFwkbW9zQ29uZmkiO2k6ODE7czozMToiQ3JlZGl0IENhcmQgVmVyaWZpY2F0aW9uIENvZGUnOyI7aTo4MjtzOjEyOiJmYWxzZVwpIFwpOyMiO2k6ODM7czoxNToibmN5X25hbWVgJyBcKTsjIjtpOjg0O3M6NDc6InN0cnBvc1woXCRfU0VSVkVSXFsnSFRUUF9VU0VSX0FHRU5UJ1xdLCAnTWFjIE9TIjtpOjg1O3M6MjA6Ii8vbm9uYW1lOiAnPFw/PUNVdGlsIjtpOjg2O3M6NTA6ImRvY3VtZW50XC53cml0ZVwodW5lc2NhcGVcKCIlM0NzY3JpcHQgc3JjPScvYml0cml4IjtpOjg3O3M6MjU6IlwkX1NFUlZFUiBcWyJSRU1PVEVfQUREUiIiO2k6ODg7czoxNzoiYUhSMGNEb3ZMMk55YkRNdVoiO30="));
$g_SusDB = unserialize(base64_decode("YToxMzA6e2k6MDtzOjE0OiJAKmV4dHJhY3RccypcKCI7aToxO3M6MTQ6IkAqZXh0cmFjdFxzKlwkIjtpOjI7czoxMjoiWyciXWV2YWxbJyJdIjtpOjM7czoyMToiWyciXWJhc2U2NF9kZWNvZGVbJyJdIjtpOjQ7czoyMzoiWyciXWNyZWF0ZV9mdW5jdGlvblsnIl0iO2k6NTtzOjE0OiJbJyJdYXNzZXJ0WyciXSI7aTo2O3M6NzoiU3BhbW1lciI7aTo3O3M6NDA6ImluaV9nZXRccypcKCpbJyJdezAsMX1zYWZlX21vZGVbJyJdezAsMX0iO2k6ODtzOjE1OiJldmFsXHMqWyciXChcJF0iO2k6OTtzOjE3OiJhc3NlcnRccypbJyJcKFwkXSI7aToxMDtzOjI4OiJzcnBhdGg6Ly9cLlwuL1wuXC4vXC5cLi9cLlwuIjtpOjExO3M6MTI6InBocGluZm9ccypcKCI7aToxMjtzOjE2OiJTSE9XXHMrREFUQUJBU0VTIjtpOjEzO3M6MTI6IlxicG9wZW5ccypcKCI7aToxNDtzOjk6ImV4ZWNccypcKCI7aToxNTtzOjEzOiJcYnN5c3RlbVxzKlwoIjtpOjE2O3M6MTU6IlxicGFzc3RocnVccypcKCI7aToxNztzOjE2OiJcYnByb2Nfb3BlblxzKlwoIjtpOjE4O3M6MTU6InNoZWxsX2V4ZWNccypcKCI7aToxOTtzOjE2OiJpbmlfcmVzdG9yZVxzKlwoIjtpOjIwO3M6OToiXGJkbFxzKlwoIjtpOjIxO3M6MTQ6Ilxic3ltbGlua1xzKlwoIjtpOjIyO3M6MTI6IlxiY2hncnBccypcKCI7aToyMztzOjE0OiJcYmluaV9zZXRccypcKCI7aToyNDtzOjEzOiJcYnB1dGVudlxzKlwoIjtpOjI1O3M6MTM6ImdldG15dWlkXHMqXCgiO2k6MjY7czoxNDoiZnNvY2tvcGVuXHMqXCgiO2k6Mjc7czoxNzoicG9zaXhfc2V0dWlkXHMqXCgiO2k6Mjg7czoxNzoicG9zaXhfc2V0c2lkXHMqXCgiO2k6Mjk7czoxODoicG9zaXhfc2V0cGdpZFxzKlwoIjtpOjMwO3M6MTU6InBvc2l4X2tpbGxccypcKCI7aTozMTtzOjI3OiJhcGFjaGVfY2hpbGRfdGVybWluYXRlXHMqXCgiO2k6MzI7czoxMjoiXGJjaG1vZFxzKlwoIjtpOjMzO3M6MTI6IlxiY2hkaXJccypcKCI7aTozNDtzOjE1OiJwY250bF9leGVjXHMqXCgiO2k6MzU7czoxNDoiXGJ2aXJ0dWFsXHMqXCgiO2k6MzY7czoxNToicHJvY19jbG9zZVxzKlwoIjtpOjM3O3M6MjA6InByb2NfZ2V0X3N0YXR1c1xzKlwoIjtpOjM4O3M6MTk6InByb2NfdGVybWluYXRlXHMqXCgiO2k6Mzk7czoxNDoicHJvY19uaWNlXHMqXCgiO2k6NDA7czoxMzoiZ2V0bXlnaWRccypcKCI7aTo0MTtzOjE5OiJwcm9jX2dldHN0YXR1c1xzKlwoIjtpOjQyO3M6MTU6InByb2NfY2xvc2VccypcKCI7aTo0MztzOjE5OiJlc2NhcGVzaGVsbGNtZFxzKlwoIjtpOjQ0O3M6MTk6ImVzY2FwZXNoZWxsYXJnXHMqXCgiO2k6NDU7czoxNjoic2hvd19zb3VyY2VccypcKCI7aTo0NjtzOjEzOiJcYnBjbG9zZVxzKlwoIjtpOjQ3O3M6MTM6InNhZmVfZGlyXHMqXCgiO2k6NDg7czoxNjoiaW5pX3Jlc3RvcmVccypcKCI7aTo0OTtzOjEwOiJjaG93blxzKlwoIjtpOjUwO3M6MTA6ImNoZ3JwXHMqXCgiO2k6NTE7czoxNzoic2hvd25fc291cmNlXHMqXCgiO2k6NTI7czoxOToibXlzcWxfbGlzdF9kYnNccypcKCI7aTo1MztzOjIxOiJnZXRfY3VycmVudF91c2VyXHMqXCgiO2k6NTQ7czoxMjoiZ2V0bXlpZFxzKlwoIjtpOjU1O3M6MTE6IlxibGVha1xzKlwoIjtpOjU2O3M6MTU6InBmc29ja29wZW5ccypcKCI7aTo1NztzOjIxOiJnZXRfY3VycmVudF91c2VyXHMqXCgiO2k6NTg7czoxMToic3lzbG9nXHMqXCgiO2k6NTk7czoxODoiXCRkZWZhdWx0X3VzZV9hamF4IjtpOjYwO3M6MjE6ImV2YWxccypcKCpccyp1bmVzY2FwZSI7aTo2MTtzOjc6IkZMb29kZVIiO2k6NjI7czozMToiZG9jdW1lbnRcLndyaXRlXHMqXChccyp1bmVzY2FwZSI7aTo2MztzOjExOiJcYmNvcHlccypcKCI7aTo2NDtzOjIzOiJtb3ZlX3VwbG9hZGVkX2ZpbGVccypcKCI7aTo2NTtzOjg6IlwuMzMzMzMzIjtpOjY2O3M6ODoiXC42NjY2NjYiO2k6Njc7czoyMToicm91bmRccypcKCpccyowXHMqXCkqIjtpOjY4O3M6MTExOiJjb3B5XHMqXCgqXHMqXCRfRklMRVNccypcW1xzKlsnIl17MCwxfWZpbGVbJyJdezAsMX1ccypcXVxbXHMqWyciXXswLDF9dG1wX25hbWVbJyJdezAsMX1ccypcXVxzKixccypcJHVwbG9hZGZpbGUiO2k6Njk7czoxMjY6Im1vdmVfdXBsb2FkZWRfZmlsZXNccypcKCpccypcJF9GSUxFU1xzKlxbXHMqWyciXXswLDF9ZmlsZVsnIl17MCwxfVxzKlxdXFtccypbJyJdezAsMX10bXBfbmFtZVsnIl17MCwxfVxzKlxdXHMqLFxzKlwkdXBsb2FkZmlsZSI7aTo3MDtzOjUwOiJpbmlfZ2V0XHMqXChccypbJyJdezAsMX1kaXNhYmxlX2Z1bmN0aW9uc1snIl17MCwxfSI7aTo3MTtzOjM2OiJVTklPTlxzK1NFTEVDVFxzK1snIl17MCwxfTBbJyJdezAsMX0iO2k6NzI7czoxMDoiMlxzKj5ccyomMSI7aTo3MztzOjU3OiJlY2hvXHMqXCgqXHMqXCRfU0VSVkVSXFtbJyJdezAsMX1ET0NVTUVOVF9ST09UWyciXXswLDF9XF0iO2k6NzQ7czozNzoiPVxzKkFycmF5XHMqXCgqXHMqYmFzZTY0X2RlY29kZVxzKlwoKiI7aTo3NTtzOjE0OiJraWxsYWxsXHMrLVxkKyI7aTo3NjtzOjc6ImVyaXVxZXIiO2k6Nzc7czoxMDoidG91Y2hccypcKCI7aTo3ODtzOjc6InNzaGtleXMiO2k6Nzk7czo4OiJAaW5jbHVkZSI7aTo4MDtzOjg6IkByZXF1aXJlIjtpOjgxO3M6NjI6ImlmXHMqXChtYWlsXHMqXChccypcJHRvLFxzKlwkc3ViamVjdCxccypcJG1lc3NhZ2UsXHMqXCRoZWFkZXJzIjtpOjgyO3M6Mzg6IkBpbmlfc2V0XHMqXCgqWyciXXswLDF9YWxsb3dfdXJsX2ZvcGVuIjtpOjgzO3M6MTg6IkBmaWxlX2dldF9jb250ZW50cyI7aTo4NDtzOjE3OiJmaWxlX3B1dF9jb250ZW50cyI7aTo4NTtzOjQ2OiJhbmRyb2lkXHMqXHxccyptaWRwXHMqXHxccypqMm1lXHMqXHxccypzeW1iaWFuIjtpOjg2O3M6Mjg6IkBzZXRjb29raWVccypcKCpbJyJdezAsMX1oaXQiO2k6ODc7czoxMDoiQGZpbGVvd25lciI7aTo4ODtzOjY6IjxrdWt1PiI7aTo4OTtzOjU6InN5cGV4IjtpOjkwO3M6OToiXCRiZWVjb2RlIjtpOjkxO3M6ODoiQmFja2Rvb3IiO2k6OTI7czoxNDoicGhwX3VuYW1lXHMqXCgiO2k6OTM7czo1NToibWFpbFxzKlwoKlxzKlwkdG9ccyosXHMqXCRzdWJqXHMqLFxzKlwkbXNnXHMqLFxzKlwkZnJvbSI7aTo5NDtzOjY3OiJtYWlsXHMqXCgqXHMqXCRzZW5kXHMqLFxzKlwkc3ViamVjdFxzKixccypcJGhlYWRlcnNccyosXHMqXCRtZXNzYWdlIjtpOjk1O3M6NjU6Im1haWxccypcKCpccypcJHRvXHMqLFxzKlwkc3ViamVjdFxzKixccypcJG1lc3NhZ2VccyosXHMqXCRoZWFkZXJzIjtpOjk2O3M6MTIwOiJzdHJwb3NccypcKCpccypcJG5hbWVccyosXHMqWyciXXswLDF9SFRUUF9bJyJdezAsMX1ccypcKSpccyohPT1ccyowXHMqJiZccypzdHJwb3NccypcKCpccypcJG5hbWVccyosXHMqWyciXXswLDF9UkVRVUVTVF8iO2k6OTc7czo1MzoiaXNfZnVuY3Rpb25fZW5hYmxlZFxzKlwoXHMqWyciXXswLDF9aWdub3JlX3VzZXJfYWJvcnQiO2k6OTg7czozMDoiZWNob1xzKlwoKlxzKmZpbGVfZ2V0X2NvbnRlbnRzIjtpOjk5O3M6MjY6ImVjaG9ccypcKCpbJyJdezAsMX08c2NyaXB0IjtpOjEwMDtzOjMxOiJwcmludFxzKlwoKlxzKmZpbGVfZ2V0X2NvbnRlbnRzIjtpOjEwMTtzOjI3OiJwcmludFxzKlwoKlsnIl17MCwxfTxzY3JpcHQiO2k6MTAyO3M6ODU6IjxtYXJxdWVlXHMrc3R5bGVccyo9XHMqWyciXXswLDF9cG9zaXRpb25ccyo6XHMqYWJzb2x1dGVccyo7XHMqd2lkdGhccyo6XHMqXGQrXHMqcHhccyoiO2k6MTAzO3M6NDI6Ij1ccypbJyJdezAsMX1cLlwuL1wuXC4vXC5cLi93cC1jb25maWdcLnBocCI7aToxMDQ7czo3OiJlZ2dkcm9wIjtpOjEwNTtzOjk6InJ3eHJ3eHJ3eCI7aToxMDY7czoxNToiZXJyb3JfcmVwb3J0aW5nIjtpOjEwNztzOjE3OiJcYmNyZWF0ZV9mdW5jdGlvbiI7aToxMDg7czo0Mzoie1xzKnBvc2l0aW9uXHMqOlxzKmFic29sdXRlO1xzKmxlZnRccyo6XHMqLSI7aToxMDk7czoxNToiPHNjcmlwdFxzK2FzeW5jIjtpOjExMDtzOjY2OiJfWyciXXswLDF9XHMqXF1ccyo9XHMqQXJyYXlccypcKFxzKmJhc2U2NF9kZWNvZGVccypcKCpccypbJyJdezAsMX0iO2k6MTExO3M6MzM6IkFkZFR5cGVccythcHBsaWNhdGlvbi94LWh0dHBkLWNnaSI7aToxMTI7czo0NDoiZ2V0ZW52XHMqXCgqXHMqWyciXXswLDF9SFRUUF9DT09LSUVbJyJdezAsMX0iO2k6MTEzO3M6NDU6Imlnbm9yZV91c2VyX2Fib3J0XHMqXCgqXHMqWyciXXswLDF9MVsnIl17MCwxfSI7aToxMTQ7czoyMToiXCRfUkVRVUVTVFxzKlxbXHMqJTIyIjtpOjExNTtzOjUxOiJ1cmxccypcKFsnIl17MCwxfWRhdGFccyo6XHMqaW1hZ2UvcG5nO1xzKmJhc2U2NFxzKiwiO2k6MTE2O3M6NTE6InVybFxzKlwoWyciXXswLDF9ZGF0YVxzKjpccyppbWFnZS9naWY7XHMqYmFzZTY0XHMqLCI7aToxMTc7czozMDoiOlxzKnVybFxzKlwoXHMqWyciXXswLDF9PFw/cGhwIjtpOjExODtzOjE3OiI8L2h0bWw+Lis/PHNjcmlwdCI7aToxMTk7czoxNzoiPC9odG1sPi4rPzxpZnJhbWUiO2k6MTIwO3M6NTU6IihzeXN0ZW18c2hlbGxfZXhlY3xwYXNzdGhydXxwb3Blbnxwcm9jX29wZW4pXHMqWyciXChcJF0iO2k6MTIxO3M6MTE6IlxibWFpbFxzKlwoIjtpOjEyMjtzOjQ2OiJmaWxlX2dldF9jb250ZW50c1xzKlwoKlxzKlsnIl17MCwxfXBocDovL2lucHV0IjtpOjEyMztzOjExODoiPG1ldGFccytodHRwLWVxdWl2PVsnIl17MCwxfUNvbnRlbnQtdHlwZVsnIl17MCwxfVxzK2NvbnRlbnQ9WyciXXswLDF9dGV4dC9odG1sO1xzKmNoYXJzZXQ9d2luZG93cy0xMjUxWyciXXswLDF9Pjxib2R5PiI7aToxMjQ7czo2MjoiPVxzKmRvY3VtZW50XC5jcmVhdGVFbGVtZW50XChccypbJyJdezAsMX1zY3JpcHRbJyJdezAsMX1ccypcKTsiO2k6MTI1O3M6Njk6ImRvY3VtZW50XC5ib2R5XC5pbnNlcnRCZWZvcmVcKGRpdixccypkb2N1bWVudFwuYm9keVwuY2hpbGRyZW5cWzBcXVwpOyI7aToxMjY7czo3NzoiPHNjcmlwdFxzK3R5cGU9InRleHQvamF2YXNjcmlwdCJccytzcmM9Imh0dHA6Ly9bYS16QS1aMC05X10rP1wucGhwIj48L3NjcmlwdD4iO2k6MTI3O3M6Mjc6ImVjaG9ccytbJyJdezAsMX1va1snIl17MCwxfSI7aToxMjg7czoxODoiL3Vzci9zYmluL3NlbmRtYWlsIjtpOjEyOTtzOjIzOiIvdmFyL3FtYWlsL2Jpbi9zZW5kbWFpbCI7fQ=="));
$g_SusDBPrio = unserialize(base64_decode("YToxMjI6e2k6MDtpOjA7aToxO2k6MDtpOjI7aTowO2k6MztpOjA7aTo0O2k6MDtpOjU7aTowO2k6NjtpOjA7aTo3O2k6MDtpOjg7aTowO2k6OTtpOjE7aToxMDtpOjE7aToxMTtpOjA7aToxMjtpOjA7aToxMztpOjA7aToxNDtpOjA7aToxNTtpOjA7aToxNjtpOjA7aToxNztpOjA7aToxODtpOjA7aToxOTtpOjA7aToyMDtpOjA7aToyMTtpOjA7aToyMjtpOjA7aToyMztpOjA7aToyNDtpOjA7aToyNTtpOjA7aToyNjtpOjA7aToyNztpOjA7aToyODtpOjA7aToyOTtpOjA7aTozMDtpOjE7aTozMTtpOjE7aTozMjtpOjA7aTozMztpOjA7aTozNDtpOjA7aTozNTtpOjA7aTozNjtpOjA7aTozNztpOjA7aTozODtpOjA7aTozOTtpOjA7aTo0MDtpOjA7aTo0MTtpOjA7aTo0MjtpOjA7aTo0MztpOjA7aTo0NDtpOjA7aTo0NTtpOjA7aTo0NjtpOjA7aTo0NztpOjA7aTo0ODtpOjA7aTo0OTtpOjA7aTo1MDtpOjA7aTo1MTtpOjA7aTo1MjtpOjA7aTo1MztpOjA7aTo1NDtpOjA7aTo1NTtpOjA7aTo1NjtpOjA7aTo1NztpOjE7aTo1ODtpOjA7aTo1OTtpOjA7aTo2MDtpOjI7aTo2MTtpOjE7aTo2MjtpOjA7aTo2MztpOjA7aTo2NDtpOjA7aTo2NTtpOjI7aTo2NjtpOjI7aTo2NztpOjA7aTo2ODtpOjA7aTo2OTtpOjA7aTo3MDtpOjI7aTo3MTtpOjE7aTo3MjtpOjA7aTo3MztpOjA7aTo3NDtpOjE7aTo3NTtpOjA7aTo3NjtpOjE7aTo3NztpOjE7aTo3ODtpOjI7aTo3OTtpOjE7aTo4MDtpOjM7aTo4MTtpOjI7aTo4MjtpOjA7aTo4MztpOjI7aTo4NDtpOjA7aTo4NTtpOjA7aTo4NjtpOjI7aTo4NztpOjA7aTo4ODtpOjA7aTo4OTtpOjA7aTo5MDtpOjE7aTo5MTtpOjE7aTo5MjtpOjE7aTo5MztpOjE7aTo5NDtpOjA7aTo5NTtpOjI7aTo5NjtpOjI7aTo5NztpOjI7aTo5ODtpOjI7aTo5OTtpOjI7aToxMDA7aToxO2k6MTAxO2k6MTtpOjEwMjtpOjM7aToxMDM7aTozO2k6MTA0O2k6MTtpOjEwNTtpOjM7aToxMDY7aTozO2k6MTA3O2k6MjtpOjEwODtpOjA7aToxMDk7aTozO2k6MTEwO2k6MTtpOjExMTtpOjE7aToxMTI7aTozO2k6MTEzO2k6MztpOjExNDtpOjM7aToxMTU7aToxO2k6MTE2O2k6MTtpOjExNztpOjE7aToxMTg7aTo0O2k6MTE5O2k6MTtpOjEyMDtpOjM7aToxMjE7aTowO30="));
$g_AdwareSig = unserialize(base64_decode("YToyOTp7aTowO3M6MTk6Il9fbGlua2ZlZWRfcm9ib3RzX18iO2k6MTtzOjEzOiJMSU5LRkVFRF9VU0VSIjtpOjI7czoxNDoiTGlua2ZlZWRDbGllbnQiO2k6MztzOjE4OiJfX3NhcGVfZGVsaW1pdGVyX18iO2k6NDtzOjI5OiJkaXNwZW5zZXJcLmFydGljbGVzXC5zYXBlXC5ydSI7aTo1O3M6MTE6IkxFTktfY2xpZW50IjtpOjY7czoxMToiU0FQRV9jbGllbnQiO2k6NztzOjE2OiJfX2xpbmtmZWVkX2VuZF9fIjtpOjg7czoxNjoiU0xBcnRpY2xlc0NsaWVudCI7aTo5O3M6MTc6Ii0+R2V0TGlua3NccypcKFwpIjtpOjEwO3M6MTc6ImRiXC50cnVzdGxpbmtcLnJ1IjtpOjExO3M6Mzc6ImNsYXNzXHMrQ01fY2xpZW50XHMrZXh0ZW5kc1xzKkNNX2Jhc2UiO2k6MTI7czoxOToibmV3XHMrQ01fY2xpZW50XChcKSI7aToxMztzOjE2OiJ0bF9saW5rc19kYl9maWxlIjtpOjE0O3M6MTU6IlRydXN0bGlua0NsaWVudCI7aToxNTtzOjEzOiItPlxzKlNMQ2xpZW50IjtpOjE2O3M6MTY2OiJpc3NldFxzKlwoKlxzKlwkX1NFUlZFUlxzKlxbXHMqWyciXXswLDF9SFRUUF9VU0VSX0FHRU5UWyciXXswLDF9XHMqXF1ccypcKVxzKiYmXHMqXCgqXHMqXCRfU0VSVkVSXHMqXFtccypbJyJdezAsMX1IVFRQX1VTRVJfQUdFTlRbJyJdezAsMX1cXVxzKj09XHMqWyciXXswLDF9TE1QX1JvYm90IjtpOjE3O3M6NDM6IlwkbGlua3MtPlxzKnJldHVybl9saW5rc1xzKlwoKlxzKlwkbGliX3BhdGgiO2k6MTg7czo0NDoiXCRsaW5rc19jbGFzc1xzKj1ccypuZXdccytHZXRfbGlua3NccypcKCpccyoiO2k6MTk7czo1MjoiWyciXXswLDF9XHMqLFxzKlsnIl17MCwxfVwuWyciXXswLDF9XHMqXCkqXHMqO1xzKlw/PiI7aToyMDtzOjc6Imxldml0cmEiO2k6MjE7czoxMDoiZGFwb3hldGluZSI7aToyMjtzOjY6InZpYWdyYSI7aToyMztzOjY6ImNpYWxpcyI7aToyNDtzOjg6InByb3ZpZ2lsIjtpOjI1O3M6MTk6ImNsYXNzXHMrVFdlZmZDbGllbnQiO2k6MjY7czoxODoibmV3XHMrU0xDbGllbnRcKFwpIjtpOjI3O3M6MjQ6Il9fbGlua2ZlZWRfYmVmb3JlX3RleHRfXyI7aToyODtzOjE2OiJfX3Rlc3RfdGxfbGlua19fIjt9"));
$g_JSVirSig = unserialize(base64_decode("YToxMjQ6e2k6MDtzOjcwOiJ1c2VyQWdlbnRcfHBwXHxodHRwXHxkYXphbHl6WyciXXswLDF9XC5zcGxpdFwoWyciXXswLDF9XHxbJyJdezAsMX1cKSwwIjtpOjE7czo0MToiZj0nZidcKydyJ1wrJ28nXCsnbSdcKydDaCdcKydhckMnXCsnb2RlJzsiO2k6MjtzOjIyOiJcLnByb3RvdHlwZVwuYX1jYXRjaFwoIjtpOjM7czozNzoidHJ5e0Jvb2xlYW5cKFwpXC5wcm90b3R5cGVcLnF9Y2F0Y2hcKCI7aTo0O3M6MzQ6ImlmXChSZWZcLmluZGV4T2ZcKCdcLmdvb2dsZVwuJ1wpIT0iO2k6NTtzOjg2OiJpbmRleE9mXHxpZlx8cmNcfGxlbmd0aFx8bXNuXHx5YWhvb1x8cmVmZXJyZXJcfGFsdGF2aXN0YVx8b2dvXHxiaVx8aHBcfHZhclx8YW9sXHxxdWVyeSI7aTo2O3M6NTQ6IkFycmF5XC5wcm90b3R5cGVcLnNsaWNlXC5jYWxsXChhcmd1bWVudHNcKVwuam9pblwoIiJcKSI7aTo3O3M6ODI6InE9ZG9jdW1lbnRcLmNyZWF0ZUVsZW1lbnRcKCJkIlwrImkiXCsidiJcKTtxXC5hcHBlbmRDaGlsZFwocVwrIiJcKTt9Y2F0Y2hcKHF3XCl7aD0iO2k6ODtzOjc5OiJcK3p6O3NzPVxbXF07Zj0nZnInXCsnb20nXCsnQ2gnO2ZcKz0nYXJDJztmXCs9J29kZSc7dz10aGlzO2U9d1xbZlxbInN1YnN0ciJcXVwoIjtpOjk7czoxMTU6InM1XChxNVwpe3JldHVybiBcK1wrcTU7fWZ1bmN0aW9uIHlmXChzZix3ZVwpe3JldHVybiBzZlwuc3Vic3RyXCh3ZSwxXCk7fWZ1bmN0aW9uIHkxXCh3Ylwpe2lmXCh3Yj09MTY4XCl3Yj0xMDI1O2Vsc2UiO2k6MTA7czo2NDoiaWZcKG5hdmlnYXRvclwudXNlckFnZW50XC5tYXRjaFwoL1woYW5kcm9pZFx8bWlkcFx8ajJtZVx8c3ltYmlhbiI7aToxMTtzOjEwNjoiZG9jdW1lbnRcLndyaXRlXCgnPHNjcmlwdCBsYW5ndWFnZT0iSmF2YVNjcmlwdCIgdHlwZT0idGV4dC9qYXZhc2NyaXB0IiBzcmM9IidcK2RvbWFpblwrJyI+PC9zY3InXCsnaXB0PidcKSI7aToxMjtzOjMxOiJodHRwOi8vcGhzcFwucnUvXy9nb1wucGhwXD9zaWQ9IjtpOjEzO3M6MTc6IjwvaHRtbD5ccyo8c2NyaXB0IjtpOjE0O3M6MTc6IjwvaHRtbD5ccyo8aWZyYW1lIjtpOjE1O3M6NjY6Ij1uYXZpZ2F0b3JcW2FwcFZlcnNpb25fdmFyXF1cLmluZGV4T2ZcKCJNU0lFIlwpIT0tMVw/JzxpZnJhbWUgbmFtZSI7aToxNjtzOjc6IlxceDY1QXQiO2k6MTc7czo5OiJcXHg2MXJDb2QiO2k6MTg7czoyMjoiImZyIlwrIm9tQyJcKyJoYXJDb2RlIiI7aToxOTtzOjExOiI9ImV2IlwrImFsIiI7aToyMDtzOjc4OiJcW1woXChlXClcPyJzIjoiIlwpXCsicCJcKyJsaXQiXF1cKCJhXCQiXFtcKFwoZVwpXD8ic3UiOiIiXClcKyJic3RyIlxdXCgxXClcKTsiO2k6MjE7czozOToiZj0nZnInXCsnb20nXCsnQ2gnO2ZcKz0nYXJDJztmXCs9J29kZSc7IjtpOjIyO3M6MjA6ImZcKz1cKGhcKVw/J29kZSc6IiI7IjtpOjIzO3M6NDE6ImY9J2YnXCsncidcKydvJ1wrJ20nXCsnQ2gnXCsnYXJDJ1wrJ29kZSc7IjtpOjI0O3M6NTA6ImY9J2Zyb21DaCc7ZlwrPSdhckMnO2ZcKz0ncWdvZGUnXFsic3Vic3RyIlxdXCgyXCk7IjtpOjI1O3M6MTY6InZhclxzK2Rpdl9jb2xvcnMiO2k6MjY7czo5OiJ2YXJccytfMHgiO2k6Mjc7czoyMDoiQ29yZUxpYnJhcmllc0hhbmRsZXIiO2k6Mjg7czo3OiJwaW5nbm93IjtpOjI5O3M6ODoic2VyY2hib3QiO2k6MzA7czoxMDoia20wYWU5Z3I2bSI7aTozMTtzOjY6ImMzMjg0ZCI7aTozMjtzOjg6IlxceDY4YXJDIjtpOjMzO3M6ODoiXFx4NmRDaGEiO2k6MzQ7czo3OiJcXHg2ZmRlIjtpOjM1O3M6NzoiXFx4NmZkZSI7aTozNjtzOjg6IlxceDQzb2RlIjtpOjM3O3M6NzoiXFx4NzJvbSI7aTozODtzOjc6IlxceDQzaGEiO2k6Mzk7czo3OiJcXHg3MkNvIjtpOjQwO3M6ODoiXFx4NDNvZGUiO2k6NDE7czoxMDoiXC5keW5kbnNcLiI7aTo0MjtzOjk6IlwuZHluZG5zLSI7aTo0MztzOjc5OiJ9XHMqZWxzZVxzKntccypkb2N1bWVudFwud3JpdGVccypcKFxzKlsnIl17MCwxfVwuWyciXXswLDF9XClccyp9XHMqfVxzKlJcKFxzKlwpIjtpOjQ0O3M6NDU6ImRvY3VtZW50XC53cml0ZVwodW5lc2NhcGVcKCclM0NkaXYlMjBpZCUzRCUyMiI7aTo0NTtzOjE4OiJcLmJpdGNvaW5wbHVzXC5jb20iO2k6NDY7czo0MToiXC5zcGxpdFwoIiYmIlwpO2g9MjtzPSIiO2lmXChtXClmb3JcKGk9MDsiO2k6NDc7czo0ODoiZG9jdW1lbnRcLndyaXRlXHMqXChccyp1bmVzY2FwZVxzKlwoWyciXXswLDF9JTNjIjtpOjQ4O3M6NDE6IjxpZnJhbWVccytzcmM9Imh0dHA6Ly9kZWx1eGVzY2xpY2tzXC5wcm8vIjtpOjQ5O3M6NDU6IjNCZm9yXHxmcm9tQ2hhckNvZGVcfDJDMjdcfDNEXHwyQzg4XHx1bmVzY2FwZSI7aTo1MDtzOjU4OiI7XHMqZG9jdW1lbnRcLndyaXRlXChbJyJdezAsMX08aWZyYW1lXHMqc3JjPSJodHRwOi8veWFcLnJ1IjtpOjUxO3M6MTEwOiJ3XC5kb2N1bWVudFwuYm9keVwuYXBwZW5kQ2hpbGRcKHNjcmlwdFwpO1xzKmNsZWFySW50ZXJ2YWxcKGlcKTtccyp9XHMqfVxzKixccypcZCtccypcKVxzKjtccyp9XHMqXClcKFxzKndpbmRvdyI7aTo1MjtzOjExMDoiaWZcKCFnXChcKSYmd2luZG93XC5uYXZpZ2F0b3JcLmNvb2tpZUVuYWJsZWRcKXtkb2N1bWVudFwuY29va2llPSIxPTE7ZXhwaXJlcz0iXCtlXC50b0dNVFN0cmluZ1woXClcKyI7cGF0aD0vIjsiO2k6NTM7czo3MDoibm5fcGFyYW1fcHJlbG9hZGVyX2NvbnRhaW5lclx8NTAwMVx8aGlkZGVuXHxpbm5lckhUTUxcfGluamVjdFx8dmlzaWJsZSI7aTo1NDtzOjMxOiI8IS0tIFthLXpBLVowLTlfXSs/XHxcfHN0YXQgLS0+IjtpOjU1O3M6ODU6IiZwYXJhbWV0ZXI9XCRrZXl3b3JkJnNlPVwkc2UmdXI9MSZIVFRQX1JFRkVSRVI9J1wrZW5jb2RlVVJJQ29tcG9uZW50XChkb2N1bWVudFwuVVJMXCkiO2k6NTY7czo0ODoid2luZG93c1x8c2VyaWVzXHw2MFx8c3ltYm9zXHxjZVx8bW9iaWxlXHxzeW1iaWFuIjtpOjU3O3M6Mjk6IlxbImV2YWwiXF1cKHNcKTt9fX19PC9zY3JpcHQ+IjtpOjU4O3M6NTk6ImtDNzBGTWJseUprRldab2RDS2wxV1lPZFdZVWxuUXpSbmJsMVdac1ZFZGxkbUwwNVdadFYzWXZSR0k5IjtpOjU5O3M6NTU6IntrPWk7cz1zXC5jb25jYXRcKHNzXChldmFsXChhc3FcKFwpXCktMVwpXCk7fXo9cztldmFsXCgiO2k6NjA7czoxMzA6ImRvY3VtZW50XC5jb29raWVcLm1hdGNoXChuZXdccytSZWdFeHBcKFxzKiJcKFw/OlxeXHw7IFwpIlxzKlwrXHMqbmFtZVwucmVwbGFjZVwoL1woXFtcXFwuXCRcP1wqXHx7fVxcXChcXFwpXFxcW1xcXF1cXC9cXFwrXF5cXVwpL2ciO2k6NjE7czo4Njoic2V0Q29va2llXHMqXCgqXHMqImFyeF90dCJccyosXHMqMVxzKixccypkdFwudG9HTVRTdHJpbmdcKFwpXHMqLFxzKlsnIl17MCwxfS9bJyJdezAsMX0iO2k6NjI7czoxNDoiL1wqMjE0YWZhYWVcKi8iO2k6NjM7czoxNDQ6ImRvY3VtZW50XC5jb29raWVcLm1hdGNoXHMqXChccypuZXdccytSZWdFeHBccypcKFxzKiJcKFw/OlxeXHw7XHMqXCkiXHMqXCtccypuYW1lXC5yZXBsYWNlXHMqXCgvXChcW1xcXC5cJFw/XCpcfHt9XFxcKFxcXClcXFxbXFxcXVxcL1xcXCtcXlxdXCkvZyI7aTo2NDtzOjk4OiJ2YXJccytkdFxzKz1ccytuZXdccytEYXRlXChcKSxccytleHBpcnlUaW1lXHMrPVxzK2R0XC5zZXRUaW1lXChccytkdFwuZ2V0VGltZVwoXClccytcK1xzKzkwMDAwMDAwMCI7aTo2NTtzOjEwNToiaWZccypcKFxzKm51bVxzKj09PVxzKjBccypcKVxzKntccypyZXR1cm5ccyoxO1xzKn1ccyplbHNlXHMqe1xzKnJldHVyblxzK251bVxzKlwqXHMqckZhY3RcKFxzKm51bVxzKi1ccyoxIjtpOjY2O3M6NDE6IlwrPVN0cmluZ1wuZnJvbUNoYXJDb2RlXChwYXJzZUludFwoMFwrJ3gnIjtpOjY3O3M6ODM6IjxzY3JpcHRccytsYW5ndWFnZT0iSmF2YVNjcmlwdCI+XHMqcGFyZW50XC53aW5kb3dcLm9wZW5lclwubG9jYXRpb249Imh0dHA6Ly92a1wuY29tIjtpOjY4O3M6NDQ6ImxvY2F0aW9uXC5yZXBsYWNlXChbJyJdezAsMX1odHRwOi8vdjVrNDVcLnJ1IjtpOjY5O3M6MTI5OiI7dHJ5e1wrXCtkb2N1bWVudFwuYm9keX1jYXRjaFwocVwpe2FhPWZ1bmN0aW9uXChmZlwpe2ZvclwoaT0wO2k8elwubGVuZ3RoO2lcK1wrXCl7emFcKz1TdHJpbmdcW2ZmXF1cKGVcKHZcK1woelxbaVxdXClcKS0xMlwpO319O30iO2k6NzA7czoxNDI6ImRvY3VtZW50XC53cml0ZVxzKlwoWyciXXswLDF9PFsnIl17MCwxfVxzKlwrXHMqeFxbMFxdXHMqXCtccypbJyJdezAsMX0gWyciXXswLDF9XHMqXCtccyp4XFs0XF1ccypcK1xzKlsnIl17MCwxfT5cLlsnIl17MCwxfVxzKlwreFxzKlxbMlxdXHMqXCsiO2k6NzE7czo2MDoiaWZcKHRcLmxlbmd0aD09Mlwpe3pcKz1TdHJpbmdcLmZyb21DaGFyQ29kZVwocGFyc2VJbnRcKHRcKVwrIjtpOjcyO3M6NzQ6IndpbmRvd1wub25sb2FkXHMqPVxzKmZ1bmN0aW9uXChcKVxzKntccyppZlxzKlwoZG9jdW1lbnRcLmNvb2tpZVwuaW5kZXhPZlwoIjtpOjczO3M6Nzk6ImRvY3VtZW50XC5nZXRFbGVtZW50c0J5VGFnTmFtZVwoWyciXXswLDF9aGVhZFsnIl17MCwxfVwpXFswXF1cLmFwcGVuZENoaWxkXChhXCkiO2k6NzQ7czo5NzoiXC5zdHlsZVwuaGVpZ2h0XHMqPVxzKlsnIl17MCwxfTBweFsnIl17MCwxfTt3aW5kb3dcLm9ubG9hZFxzKj1ccypmdW5jdGlvblwoXClccyp7ZG9jdW1lbnRcLmNvb2tpZSI7aTo3NTtzOjEyMjoiXC5zcmM9XChbJyJdezAsMX1odHBzOlsnIl17MCwxfT09ZG9jdW1lbnRcLmxvY2F0aW9uXC5wcm90b2NvbFw/WyciXXswLDF9aHR0cHM6Ly9zc2xbJyJdezAsMX06WyciXXswLDF9aHR0cDovL1snIl17MCwxfVwpXCsiO2k6NzY7czozMDoiNDA0XC5waHBbJyJdezAsMX0+XHMqPC9zY3JpcHQ+IjtpOjc3O3M6NzY6InByZWdfbWF0Y2hcKFsnIl17MCwxfS9zYXBlL2lbJyJdezAsMX1ccyosXHMqXCRfU0VSVkVSXFtbJyJdezAsMX1IVFRQX1JFRkVSRVIiO2k6Nzg7czoyODoiaXBcKGhvbmVcfG9kXClcfGlyaXNcfGtpbmRsZSI7aTo3OTtzOjQ4OiJzbWFydHBob25lXHxibGFja2JlcnJ5XHxtdGtcfGJhZGFcfHdpbmRvd3MgcGhvbmUiO2k6ODA7czo3NDoiZGl2XC5pbm5lckhUTUxccypcKz1ccypbJyJdezAsMX08ZW1iZWRccytpZD0iZHVtbXkyIlxzK25hbWU9ImR1bW15MiJccytzcmMiO2k6ODE7czo3Mzoic2V0VGltZW91dFwoWyciXXswLDF9YWRkTmV3T2JqZWN0XChcKVsnIl17MCwxfSxcZCtcKTt9fX07YWRkTmV3T2JqZWN0XChcKSI7aTo4MjtzOjUxOiJcKGI9ZG9jdW1lbnRcKVwuaGVhZFwuYXBwZW5kQ2hpbGRcKGJcLmNyZWF0ZUVsZW1lbnQiO2k6ODM7czo0MDoicG9zaXRpb246YWJzb2x1dGU7bGVmdDotXGQrcHg7dG9wOi1cZCtweCI7aTo4NDtzOjMwOiJDaHJvbWVcfGlQYWRcfGlQaG9uZVx8SUVNb2JpbGUiO2k6ODU7czozMDoiY29tcGFsXHxlbGFpbmVcfGZlbm5lY1x8aGlwdG9wIjtpOjg2O3M6MTk6IlwkOlwoe31cKyIiXClcW1wkXF0iO2k6ODc7czoyMToiLVxzKlBheVBhbFxzKjwvdGl0bGU+IjtpOjg4O3M6MjI6Ii1ccypQcml2YXRpXHMqPC90aXRsZT4iO2k6ODk7czoxOToiPHRpdGxlPlxzKlVuaUNyZWRpdCI7aTo5MDtzOjE5OiJCYW5rXHMrb2ZccytBbWVyaWNhIjtpOjkxO3M6MjU6IkFsaWJhYmEmbmJzcDtNYW51ZmFjdHVyZXIiO2k6OTI7czoyMDoiVmVyaWZpZWRccytieVxzK1Zpc2EiO2k6OTM7czoyMToiSG9uZ1xzK0xlb25nXHMrT25saW5lIjtpOjk0O3M6MzA6IllvdXJccythY2NvdW50XHMrXHxccytMb2dccytpbiI7aTo5NTtzOjE2OiJPbmxpbmVccytCYW5raW5nIjtpOjk2O3M6MTQ6Ik9ubGluZS1CYW5raW5nIjtpOjk3O3M6MjI6IlNpZ25ccytpblxzK3RvXHMrWWFob28iO2k6OTg7czo1Mzoie3Bvc2l0aW9uOmFic29sdXRlO3RvcDotOTk5OXB4O308L3N0eWxlPjxkaXZccytjbGFzcz0iO2k6OTk7czoxMjg6ImlmXHMqXChcKHVhXC5pbmRleE9mXChbJyJdezAsMX1jaHJvbWVbJyJdezAsMX1cKVxzKj09XHMqLTFccyomJlxzKnVhXC5pbmRleE9mXCgid2luIlwpXHMqIT1ccyotMVwpXHMqJiZccypuYXZpZ2F0b3JcLmphdmFFbmFibGVkIjtpOjEwMDtzOjU4OiJwYXJlbnRcLndpbmRvd1wub3BlbmVyXC5sb2NhdGlvbj1bJyJdezAsMX1odHRwOi8vdmtcLmNvbVwuIjtpOjEwMTtzOjQxOiJcXVwuc3Vic3RyXCgwLDFcKVwpO319cmV0dXJuIHRoaXM7fSxcXHUwMCI7aToxMDI7czo2ODoiamF2YXNjcmlwdFx8aGVhZFx8dG9Mb3dlckNhc2VcfGNocm9tZVx8d2luXHxqYXZhRW5hYmxlZFx8YXBwZW5kQ2hpbGQiO2k6MTAzO3M6NTY6IjtjPTF9O3doaWxlXChjLS1cKXtpZlwoa1xbY1xdXCl7cD1wXC5yZXBsYWNlXChuZXcgUmVnRXhwIjtpOjEwNDtzOjUzOiJkb2N1bWVudFwud3JpdGVcKFsnIl17MCwxfTxzY3JbJyJdezAsMX1cK1snIl17MCwxfWlwdCI7aToxMDU7czo0OToiaWZyYW1lXC5zdHlsZVwud2lkdGhccyo9XHMqWyciXXswLDF9MHB4WyciXXswLDF9OyI7aToxMDY7czoyMToibG9hZFBOR0RhdGFcKHN0ckZpbGUsIjtpOjEwNztzOjIwOiJcKTtpZlwoIX5cKFsnIl17MCwxfSI7aToxMDg7czoxNzoic2V4ZnJvbWluZGlhXC5jb20iO2k6MTA5O3M6MTE6ImZpbGVreFwuY29tIjtpOjExMDtzOjEzOiJzdHVtbWFublwubmV0IjtpOjExMTtzOjE0OiJodHRwOi8veHp4XC5wbSI7aToxMTI7czoxODoiXC5ob3B0b1wubWUvanF1ZXJ5IjtpOjExMztzOjExOiJtb2JpLWdvXC5pbiI7aToxMTQ7czoxODoiYmFua29mYW1lcmljYVwuY29tIjtpOjExNTtzOjE2OiJteWZpbGVzdG9yZVwuY29tIjtpOjExNjtzOjE3OiJmaWxlc3RvcmU3MlwuaW5mbyI7aToxMTc7czoxNjoiZmlsZTJzdG9yZVwuaW5mbyI7aToxMTg7czoxNToidXJsMnNob3J0XC5pbmZvIjtpOjExOTtzOjE4OiJmaWxlc3RvcmUxMjNcLmluZm8iO2k6MTIwO3M6MTI6InVybDEyM1wuaW5mbyI7aToxMjE7czoxNDoiZG9sbGFyYWRlXC5jb20iO2k6MTIyO3M6MTE6InNlY2NsaWtcLnJ1IjtpOjEyMztzOjY3OiIiXHMqXCtccypuZXcgRGF0ZVwoXClcLmdldFRpbWVcKFwpO1xzKmRvY3VtZW50XC5ib2R5XC5hcHBlbmRDaGlsZFwoIjt9"));

//var_dump($g_FlexDBShe);
//exit;


$g_UnsafeFilesArray = array('t\d*\.php', 'a{1,}\.php', 'z\d*\.php', '123\.php', 'test\d*.php', 'asd\.php', 'info\.php', 'CHANGELOG\.php', 
                           'COPYRIGHT\.php', 'CREDITS\.php', 'INSTALL\.php', 'LICENSE\.php', 'LICENSES\.php', 'backup.+?\.zip', 
                           'backup.+?\.tar\.gz', 'backup.+?\.tgz', 
                           'phpinfo\.php', 'changelog\.txt', 'readme\.txt', 'INSTALLATION\.php', 'dump\.php', 'changelog\.log');

$g_UnsafeDirArray = array('install', 'backup', 'webalizer', 'awstats');

////////////////////////////////////////////////////////////////////////////
if (!isCli() && !isset($_SERVER['HTTP_USER_AGENT'])) {
  echo "#####################################################\n";
  echo "# Error: cannot run on php-cgi. Requires php as cli #\n";
  echo "#                                                   #\n";
  echo "# See FAQ: http://revisium.com/ai/faq.php           #\n";
  echo "#####################################################\n";
  exit;
}

define('AI_VERSION', '20140417');

define('INFO_M', base64_decode('PGZvbnQgY29sb3I9I0UwNjA2MD7QotC+0LvRjNC60L4g0LTQu9GPINC90LXQutC+0LzQvNC10YDRh9C10YHQutC+0LPQviDQuNGB0L/QvtC70YzQt9C+0LLQsNC90LjRjyE8L2ZvbnQ+PC9oNT4='));


////////////////////////////////////////////////////////////////////////////

$l_Res = '';

$g_Structure = array();
$g_Counter = 0;

$g_NotRead = array();
$g_FileInfo = array();
$g_Iframer = array();
$g_PHPCodeInside = array();
$g_CriticalJS = array();
$g_HeuristicDetected = array();
$g_HeuristicType = array();
$g_UnixExec = array();
$g_SkippedFolders = array();
$g_UnsafeFilesFound = array();
$g_CMS = array();
$g_SymLinks = array();
$g_HiddenFiles = array();

$g_TotalFolder = 0;
$g_TotalFiles = 0;

$g_FoundTotalDirs = 0;
$g_FoundTotalFiles = 0;

if (!isCli()) {
   $defaults['site_url'] = 'http://' . $_SERVER['HTTP_HOST'] . '/'; 
}

define('CRC32_LIMIT', pow(2, 31) - 1);
define('CRC32_DIFF', CRC32_LIMIT * 2 -2);

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
srand(time());

set_time_limit(0);
ini_set('max_execution_time', '90000');
ini_set('memory_limit','256M');

if (!function_exists('stripos')) {
	function stripos($par_Str, $par_Entry, $Offset = 0) {
		return strpos(strtolower($par_Str), strtolower($par_Entry), $Offset);
	}
}

define('CMS_BITRIX', 'Bitrix');
define('CMS_WORDPRESS', 'Wordpress');
define('CMS_JOOMLA', 'Joomla');
define('CMS_DLE', 'Data Life Engine');
define('CMS_IPB', 'Invision Power Board');
define('CMS_WEBASYST', 'WebAsyst');
define('CMS_OSCOMMERCE', 'OsCommerce');
define('CMS_DRUPAL', 'Drupal');
define('CMS_MODX', 'MODX');
define('CMS_INSTANTCMS', 'Instant CMS');
define('CMS_PHPBB', 'PhpBB');
define('CMS_VBULLETIN', 'vBulletin');
define('CMS_SHOPSCRIPT', 'PHP ShopScript Premium');

define('CMS_VERSION_UNDEFINED', '0.0');

class CmsVersionDetector {
    private $root_path;
    private $versions;
    private $types;

    public function __construct($root_path = '.') {

        $this->root_path = $root_path;
        $this->versions = array();
        $this->types = array();

        $version = '';

        if ($this->checkBitrix($version)) {
           $this->addCms(CMS_BITRIX, $version);
        }

        if ($this->checkWordpress($version)) {
           $this->addCms(CMS_WORDPRESS, $version);
        }

        if ($this->checkJoomla($version)) {
           $this->addCms(CMS_JOOMLA, $version);
        }

        if ($this->checkDle($version)) {
           $this->addCms(CMS_DLE, $version);
        }

        if ($this->checkIpb($version)) {
           $this->addCms(CMS_IPB, $version);
        }

        if ($this->checkWebAsyst($version)) {
           $this->addCms(CMS_WEBASYST, $version);
        }

        if ($this->checkOsCommerce($version)) {
           $this->addCms(CMS_OSCOMMERCE, $version);
        }

        if ($this->checkDrupal($version)) {
           $this->addCms(CMS_DRUPAL, $version);
        }

        if ($this->checkMODX($version)) {
           $this->addCms(CMS_MODX, $version);
        }

        if ($this->checkInstantCms($version)) {
           $this->addCms(CMS_INSTANTCMS, $version);
        }

        if ($this->checkPhpBb($version)) {
           $this->addCms(CMS_PHPBB, $version);
        }

        if ($this->checkVBulletin($version)) {
           $this->addCms(CMS_VBULLETIN, $version);
        }

        if ($this->checkPhpShopScript($version)) {
           $this->addCms(CMS_SHOPSCRIPT, $version);
        }

    }

    function getCmsList() {
      return $this->types;
    }

    function getCmsVersions() {
      return $this->versions;
    }

    function getCmsNumber() {
      return count($this->types);
    }

    function getCmsName($index = 0) {
      return $this->types[$index];
    }

    function getCmsVersion($index = 0) {
      return $this->versions[$index];
    }

    private function addCms($type, $version) {
       $this->types[] = $type;
       $this->versions[] = $version;
    }

    private function checkBitrix(&$version) {
       $version = CMS_VERSION_UNDEFINED;
       $res = false;

       if (file_exists($this->root_path .'/bitrix')) {
          $res = true;

          $tmp_content = @implode('', @file($this->root_path .'/bitrix/modules/main/classes/general/version.php'));
          if (preg_match('|define\("SM_VERSION","(.+?)"\)|smi', $tmp_content, $tmp_ver)) {
             $version = $tmp_ver[1];
          }

       }

       return $res;
    }

    private function checkWordpress(&$version) {
       $version = CMS_VERSION_UNDEFINED;
       $res = false;

       if (file_exists($this->root_path .'/wp-admin')) {
          $res = true;

          $tmp_content = @implode('', @file($this->root_path .'/wp-includes/version.php'));
          if (preg_match('|\$wp_version\s*=\s*\'(.+?)\'|smi', $tmp_content, $tmp_ver)) {
             $version = $tmp_ver[1];
          }
       }

       return $res;
    }

    private function checkJoomla(&$version) {
       $version = CMS_VERSION_UNDEFINED;
       $res = false;

       if (file_exists($this->root_path .'/libraries/joomla')) {
          $res = true;

          // for 1.5.x
          $tmp_content = @implode('', @file($this->root_path .'/libraries/joomla/version.php'));
          if (preg_match('|var\s+\$RELEASE\s*=\s*\'(.+?)\'|smi', $tmp_content, $tmp_ver)) {
             $version = $tmp_ver[1];

             if (preg_match('|var\s+\$DEV_LEVEL\s*=\s*\'(.+?)\'|smi', $tmp_content, $tmp_ver)) {
                $version .= '.' . $tmp_ver[1];
             }
          }

          // for 1.7.x
          $tmp_content = @implode('', @file($this->root_path .'/includes/version.php'));
          if (preg_match('|public\s+\$RELEASE\s*=\s*\'(.+?)\'|smi', $tmp_content, $tmp_ver)) {
             $version = $tmp_ver[1];

             if (preg_match('|public\s+\$DEV_LEVEL\s*=\s*\'(.+?)\'|smi', $tmp_content, $tmp_ver)) {
                $version .= '.' . $tmp_ver[1];
             }
          }

          // for 2.5.x and 3.x
          $tmp_content = @implode('', @file($this->root_path .'/libraries/cms/version/version.php'));
          if (preg_match('|public\s+\$RELEASE\s*=\s*\'(.+?)\'|smi', $tmp_content, $tmp_ver)) {
             $version = $tmp_ver[1];

             if (preg_match('|public\s+\$DEV_LEVEL\s*=\s*\'(.+?)\'|smi', $tmp_content, $tmp_ver)) {
                $version .= '.' . $tmp_ver[1];
             }
          }

       }

       return $res;
    }

    private function checkDle(&$version) {
       $version = CMS_VERSION_UNDEFINED;
       $res = false;

       if (file_exists($this->root_path .'/engine/engine.php')) {
          $res = true;

          $tmp_content = @implode('', @file($this->root_path .'/engine/data/config.php'));
          if (preg_match('|\'version_id\'\s*=>\s*"(.+?)"|smi', $tmp_content, $tmp_ver)) {
             $version = $tmp_ver[1];
          }

          $tmp_content = @implode('', @file($this->root_path .'/install.php'));
          if (preg_match('|\'version_id\'\s*=>\s*"(.+?)"|smi', $tmp_content, $tmp_ver)) {
             $version = $tmp_ver[1];
          }

       }

       return $res;
    }

    private function checkIpb(&$version) {
       $version = CMS_VERSION_UNDEFINED;
       $res = false;

       if (file_exists($this->root_path .'/ips_kernel')) {
          $res = true;

          $tmp_content = @implode('', @file($this->root_path .'/ips_kernel/class_xml.php'));
          if (preg_match('|IP.Board\s+v([0-9\.]+)|si', $tmp_content, $tmp_ver)) {
             $version = $tmp_ver[1];
          }

       }

       return $res;
    }

    private function checkWebAsyst(&$version) {
       $version = CMS_VERSION_UNDEFINED;
       $res = false;

       if (file_exists($this->root_path .'/wbs/installer')) {
          $res = true;

          $tmp_content = @implode('', @file($this->root_path .'/license.txt'));
          if (preg_match('|v([0-9\.]+)|si', $tmp_content, $tmp_ver)) {
             $version = $tmp_ver[1];
          }

       }

       return $res;
    }

    private function checkOsCommerce(&$version) {
       $version = CMS_VERSION_UNDEFINED;
       $res = false;

       if (file_exists($this->root_path .'/includes/version.php')) {
          $res = true;

          $tmp_content = @implode('', @file($this->root_path .'/includes/version.php'));
          if (preg_match('|([0-9\.]+)|smi', $tmp_content, $tmp_ver)) {
             $version = $tmp_ver[1];
          }

       }

       return $res;
    }

    private function checkDrupal(&$version) {
       $version = CMS_VERSION_UNDEFINED;
       $res = false;

       if (file_exists($this->root_path .'/sites/all')) {
          $res = true;

          $tmp_content = @implode('', @file($this->root_path .'/CHANGELOG.txt'));
          if (preg_match('|Drupal\s+([0-9\.]+)|smi', $tmp_content, $tmp_ver)) {
             $version = $tmp_ver[1];
          }

       }

       return $res;
    }

    private function checkMODX(&$version) {
       $version = CMS_VERSION_UNDEFINED;
       $res = false;

       if (file_exists($this->root_path .'/manager/assets')) {
          $res = true;

          // no way to pick up version
       }

       return $res;
    }

    private function checkInstantCms(&$version) {
       $version = CMS_VERSION_UNDEFINED;
       $res = false;

       if (file_exists($this->root_path .'/plugins/p_usertab')) {
          $res = true;

          $tmp_content = @implode('', @file($this->root_path .'/index.php'));
          if (preg_match('|InstantCMS\s+v([0-9\.]+)|smi', $tmp_content, $tmp_ver)) {
             $version = $tmp_ver[1];
          }

       }

       return $res;
    }

    private function checkPhpBb(&$version) {
       $version = CMS_VERSION_UNDEFINED;
       $res = false;

       if (file_exists($this->root_path .'/includes/acp')) {
          $res = true;

          $tmp_content = @implode('', @file($this->root_path .'/config.php'));
          if (preg_match('|phpBB\s+([0-9\.x]+)|smi', $tmp_content, $tmp_ver)) {
             $version = $tmp_ver[1];
          }

       }

       return $res;
    }

    private function checkVBulletin(&$version) {
       $version = CMS_VERSION_UNDEFINED;
       $res = false;

       if (file_exists($this->root_path .'/core/admincp')) {
          $res = true;

          $tmp_content = @implode('', @file($this->root_path .'/core/api.php'));
          if (preg_match('|vBulletin\s+([0-9\.x]+)|smi', $tmp_content, $tmp_ver)) {
             $version = $tmp_ver[1];
          }

       }

       return $res;
    }

    private function checkPhpShopScript(&$version) {
       $version = CMS_VERSION_UNDEFINED;
       $res = false;

       if (file_exists($this->root_path .'/install/consts.php')) {
          $res = true;

          $tmp_content = @implode('', @file($this->root_path .'/install/consts.php'));
          if (preg_match('|STRING_VERSION\',\s*\'(.+?)\'|smi', $tmp_content, $tmp_ver)) {
             $version = $tmp_ver[1];
          }

       }

       return $res;
    }
}

/**
 * Print file
*/
function printFile() {
	$l_FileName = $_GET['fn'];
	$l_CRC = isset($_GET['c']) ? (int)$_GET['c'] : 0;
	$l_Content = implode('', file($l_FileName));
	$l_FileCRC = realCRC($l_Content);
	if ($l_FileCRC != $l_CRC) {
		echo 'Доступ запрещен.';
		exit;
	}
	
	echo '<pre>' . htmlspecialchars($l_Content) . '</pre>';
}

/**
 *
 */
function realCRC($str_in, $full = false)
{
        $in = crc32( $full ? normal($str_in) : $str_in );
        return ($in > CRC32_LIMIT) ? ($in - CRC32_DIFF) : $in;
}


/**
 * Determine php script is called from the command line interface
 * @return bool
 */
function isCli()
{
	return php_sapi_name() == 'cli';
}

function myCheckSum($str) {
  return str_replace('-', 'x', crc32($str));
}

/*
 *
 */
function shanonEntropy($par_Str)
{
    $dic = array();

    $len = strlen($par_Str);
    for ($i = 0; $i < $len; $i++) {
        $dic[$par_Str[$i]]++;
    } 

    $result = 0.0;
    $frequency = 0.0;
    foreach ($dic as $item)
    {
        $frequency = (float)$item / (float)$len;
        $result -= $frequency * (log($frequency) / log(2));
    }

    return $result;
}

 function generatePassword ($length = 9)
  {

    // start with a blank password
    $password = "";

    // define possible characters - any character in this string can be
    // picked for use in the password, so if you want to put vowels back in
    // or add special characters such as exclamation marks, this is where
    // you should do it
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";

    // we refer to the length of $possible a few times, so let's grab it now
    $maxlength = strlen($possible);
  
    // check for length overflow and truncate if necessary
    if ($length > $maxlength) {
      $length = $maxlength;
    }
	
    // set up a counter for how many characters are in the password so far
    $i = 0; 
    
    // add random characters to $password until $length is reached
    while ($i < $length) { 

      // pick a random character from the possible ones
      $char = substr($possible, mt_rand(0, $maxlength-1), 1);
        
      // have we already used this character in $password?
      if (!strstr($password, $char)) { 
        // no, so it's OK to add it onto the end of whatever we've already got...
        $password .= $char;
        // ... and increase the counter by one
        $i++;
      }

    }

    // done!
    return $password;

  }

/**
 * Print to console
 * @param mixed $text
 * @param bool $add_lb Add line break
 * @return void
 */
function stdOut($text, $add_lb = true)
{
	global $BOOL_RESULT;

	if (!isCli())
		return;
		
	if (is_bool($text))
	{
		$text = $text ? 'true' : 'false';
	}
	else if (is_null($text))
	{
		$text = 'null';
	}
	if (!is_scalar($text))
	{
		$text = print_r($text, true);
	}

 	if (!$BOOL_RESULT)
 	{
 		@fwrite(STDOUT, $text . ($add_lb ? "\n" : ''));
 	}
}

/**
 * Print progress
 * @param int $num Current file
 */
function printProgress($num, &$par_File)
{

	$total_files = $GLOBALS['g_FoundTotalFiles'];
	$elapsed_time = microtime(true) - START_TIME;
	$stat = '';
	if ($elapsed_time >= 1)
	{
		$elapsed_seconds = round($elapsed_time, 0);
		$fs = floor($num / $elapsed_seconds);
		$left_files = $total_files - $num;
		if ($fs > 0) 
		{
		   $left_time = ($left_files / $fs); //ceil($left_files / $fs);
		   $stat = '. [Avg: ' . round($fs,2) . ' files/s' . ($left_time > 0  ? ' Left: ' . seconds2Human($left_time) : '') . ']';
        }
	}

	$l_FN = substr($par_File, -60);

	$text = "Scanning file [$l_FN] $num of {$total_files}" . $stat;
	$text = str_pad($text, 160, ' ', STR_PAD_RIGHT);
	stdOut(str_repeat(chr(8), 160) . $text, false);
}

/**
 * Seconds to human readable
 * @param int $seconds
 * @return string
 */
function seconds2Human($seconds)
{
	$r = '';
	$_seconds = floor($seconds);
	$ms = $seconds - $_seconds;
	$seconds = $_seconds;
	if ($hours = floor($seconds / 3600))
	{
		$r .= $hours . (isCli() ? ' h ' : ' час ');
		$seconds = $seconds % 3600;
	}

	if ($minutes = floor($seconds / 60))
	{
		$r .= $minutes . (isCli() ? ' m ' : ' мин ');
		$seconds = $seconds % 60;
	}

	if ($minutes<3) $r .= ' ' . $seconds + ($ms > 0 ? round($ms, 5) : 0) . (isCli() ? ' s' : ' сек'); //' сек' - not good for shell

	return $r;
}

if (isCli())
{

	$cli_options = array(
		'm:' => 'memory:',
		's:' => 'size:',
		'a' => 'all',
		'd:' => 'delay:',
		'r:' => 'report:',
		'f' => 'fast',
		'j:' => 'file',
		'p:' => 'path:',
		'q' => 'quite',
		'h' => 'help'
	);

	$options = getopt(implode('', array_keys($cli_options)), array_values($cli_options));

	if (isset($options['h']) OR isset($options['help']))
	{
		$memory_limit = ini_get('memory_limit');
		echo <<<HELP
AI-Bolit - Script to search for shells and other malicious software.

Usage: php {$_SERVER['PHP_SELF']} [OPTIONS] [PATH]
Current default path is: {$defaults['path']}

Mandatory arguments to long options are mandatory for short options too.
  -j, --file=FILE      Specified path and filename to scan the only file
  -p, --path=PATH      Directory path to scan, by default the file directory is used
                       Current path: {$defaults['path']}
  -m, --memory=SIZE    Maximum amount of memory a script may consume. Current value: $memory_limit
                       Can take shorthand byte values (1M, 1G...)
  -s, --size=SIZE      Scan files are smaller than SIZE. 0 - All files. Current value: {$defaults['max_size_to_scan']}
  -a, --all            Scan all files (by default scan. js,. php,. html,. htaccess)
  -d, --delay=INT      delay in milliseconds when scanning files to reduce load on the file system (Default: 1)
  -r, --report=PATH    Filename of report html, by default 'AI-BOLIT-REPORT-dd-mm-YYYY_hh-mm.html'  is used, relative to scan path
                       Enter your email address if you wish to report has been sent to the email.
                       You can also specify multiple email separated by commas.
  -q, 		       Use only with -j. Quiet result check of file, 1=Infected 
      --help           display this help and exit

HELP;
		exit;
	}

	$l_FastCli = false;
	
	if (
		(isset($options['memory']) AND !empty($options['memory']) AND ($memory = $options['memory']))
		OR (isset($options['m']) AND !empty($options['m']) AND ($memory = $options['m']))
	)
	{
		$memory = getBytes($memory);
		if ($memory > 0)
		{
			$defaults['memory_limit'] = $memory;
		}
	}

	if (
		(isset($options['file']) AND !empty($options['file']) AND ($file = $options['file']) !== false)
		OR (isset($options['j']) AND !empty($options['j']) AND ($file = $options['j']) !== false)
	)
	{
		define('SCAN_FILE', $file);
	}

	if (
		(isset($options['size']) AND !empty($options['size']) AND ($size = $options['size']) !== false)
		OR (isset($options['s']) AND !empty($options['s']) AND ($size = $options['s']) !== false)
	)
	{
		$size = getBytes($size);
		$defaults['max_size_to_scan'] = $size > 0 ? $size : 0;
	}

 	if (
 		(isset($options['file']) AND !empty($options['file']) AND ($file = $options['file']) !== false)
 		OR (isset($options['j']) AND !empty($options['j']) AND ($file = $options['j']) !== false)
 		AND (isset($options['q'])) 
 	
 	)
 	{
 		$BOOL_RESULT = true;
 	}
 
	if (isset($options['f'])) 
	 {
	   $l_FastCli = true;
	 }
		
	if (
		(isset($options['delay']) AND !empty($options['delay']) AND ($delay = $options['delay']) !== false)
		OR (isset($options['d']) AND !empty($options['d']) AND ($delay = $options['d']) !== false)
	)
	{
		$delay = (int) $delay;
		if (!($delay < 0))
		{
			$defaults['scan_delay'] = $delay;
		}
	}

	if (isset($options['all']) OR isset($options['a']))
	{
		$defaults['scan_all_files'] = 1;
	}



	if (
		(isset($options['report']) AND ($report = $options['report']) !== false)
		OR (isset($options['r']) AND ($report = $options['r']) !== false)
	)
	{
		define('REPORT', $report);
	}

	defined('REPORT') OR define('REPORT', 'AI-BOLIT-REPORT-' . date('d-m-Y_H-i') . '-' . rand(1, 999999) . '.html');

	$last_arg = max(1, sizeof($_SERVER['argv']) - 1);
	if (isset($_SERVER['argv'][$last_arg]))
	{
		$path = $_SERVER['argv'][$last_arg];
		if (
			substr($path, 0, 1) != '-'
			AND (substr($_SERVER['argv'][$last_arg - 1], 0, 1) != '-' OR array_key_exists(substr($_SERVER['argv'][$last_arg - 1], -1), $cli_options)))
		{
			$defaults['path'] = $path;
		}
	}	
	
	if (
		(isset($options['path']) AND !empty($options['path']) AND ($path = $options['path']) !== false)
		OR (isset($options['p']) AND !empty($options['p']) AND ($path = $options['p']) !== false)
	)
	{
		$defaults['path'] = $path;
	}
}

// Init
define('MAX_ALLOWED_PHP_HTML_IN_DIR', 100);
define('BASE64_LENGTH', 69);
define('MAX_PREVIEW_LEN', 80);
define('MAX_EXT_LINKS', 1001);

// Perform full scan when running from command line
if (isCli() || isset($_GET['full'])) {
  $defaults['scan_all_files'] = 1;
}

if ($l_FastCli) {
  $defaults['scan_all_files'] = 0; 
}

define('SCAN_ALL_FILES', (bool) $defaults['scan_all_files']);
define('SCAN_DELAY', (int) $defaults['scan_delay']);
define('MAX_SIZE_TO_SCAN', getBytes($defaults['max_size_to_scan']));

if ($defaults['memory_limit'] AND ($defaults['memory_limit'] = getBytes($defaults['memory_limit'])) > 0)
	ini_set('memory_limit', $defaults['memory_limit']);

define('START_TIME', microtime(true));

define('ROOT_PATH', realpath($defaults['path']));

if (!ROOT_PATH)
{
        if (isCli())  {
		die(stdOut("Directory '{$defaults['path']}' not found!"));
	}
}
elseif(!is_readable(ROOT_PATH))
{
        if (isCli())  {
		die(stdOut("Cannot read directory '" . ROOT_PATH . "'!"));
	}
}

define('CURRENT_DIR', getcwd());
chdir(ROOT_PATH);

// Проверяем отчет
if (isCli() AND REPORT !== '' AND !getEmails(REPORT))
{
	$report = str_replace('\\', '/', REPORT);
	$abs = strpos($report, '/') === 0 ? DIR_SEPARATOR : '';
	$report = array_values(array_filter(explode('/', $report)));
	$report_file = array_pop($report);
	$report_path = realpath($abs . implode(DIR_SEPARATOR, $report));

	define('REPORT_FILE', $report_file);
	define('REPORT_PATH', $report_path);

	if (REPORT_FILE AND REPORT_PATH AND is_file(REPORT_PATH . DIR_SEPARATOR . REPORT_FILE))
	{
		@unlink(REPORT_PATH . DIR_SEPARATOR . REPORT_FILE);
	}
}


if (function_exists('phpinfo')) {
   ob_start();
   phpinfo();
   $l_PhpInfo = ob_get_contents();
   ob_end_clean();

   $l_PhpInfo = str_replace('border: 1px', '', $l_PhpInfo);
   preg_match('|<body>(.*)</body>|smi', $l_PhpInfo, $l_PhpInfoBody);
}

$l_Result =<<<MAIN_PAGE

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<META NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW">
<style type="text/css" title="currentStyle">
	@import "http://www.revisium.com/extra/media/css/demo_page.css";
	@import "http://www.revisium.com/extra/media/css/jquery.dataTables.css";
</style>


<script type="text/javascript" language="javascript" src="http://yandex.st/jquery/2.1.0/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="https://datatables.net/download/build/jquery.dataTables.js"></script>

<style type="text/css">
 body {
   font-family: Georgia;
   color: #303030;
   background: #FFFFF0;
   font-size: 12px;
   margin: 20px;
   padding: 0;
 }

.hidd {
display: none;
}

 h3 {
   font-size: 27px;
   margin: 0 0;
 }

 .sec {
  font-size: 25px;
  margin-bottom: 10px;
 }


 .warn {
   color: #FF4C00;
   margin: 0 0 20px 0;
 }

 .warn .it {
   color: #FF4C00;
 }

 .warn2 {
   color: #42ADFF;
   margin: 0 0 20px 0;
 }

 .warn2 .it {
   color: #42ADFF;
 }

 .ok {
   color: #007F0E;
   margin: 0 0 20px 0;
 }

 .vir {
    color: #A00000;
    margin: 0 0 20px 0;
  }

 .vir .it {
    color: #A00000;
 }

 .disclaimer {
   font-size: 11px;
   font-family: Arial;
   color: #505050;
   margin: 10px 0 10px 0;
 }

 .thanx {
  border: 1px solid #F0F0F0;
   padding: 20px 20px 10px 20px;
  font-size: 12px;
  font-family: Arial;
  background: #FBFFBA;
 }

 .footer {
  margin: 40px 0 0 0;
 }

 .rep {
   margin: 10px 0 20px 0;
   font-size: 11px;
   font-family: Arial;
 }

 .php_ok
 {
  color: #007F0E; 
 }

 .php_bad
 {
  color: #A00000; 
 }

 .notice
 {
  border: 1px solid cornflowerblue;
  padding: 10px;
  font-size: 12px;
  font-family: Arial;
  background: #E8F8F8;
 }

 .offer {
  -webkit-border-radius: 6px;
   -moz-border-radius: 6px;
   border-radius: 6px;

   position: absolute;
   width: 350px;
   right: 20px;
   top: 54px;
   background: #E06060;
   color: white;
   font-size: 11px;
   font-family: Arial;
   padding: 15px 20px 10px 20px;

 }

  .offer2 {
  -webkit-border-radius: 6px;
   -moz-border-radius: 6px;
   border-radius: 6px;

   position: absolute;
   width: 350px;
   right: 100px;
   top: 100px;
   background: #30A030;
   color: white;
   font-size: 11px;
   font-family: Arial;
   padding: 20px 20px 10px 20px;

 }

 
 .offer A, .offer2 A {
   color: yellow;
 }

 .update {
   color: red;
   font-size: 12px;
   font-family: Arial;
   margin: 0 0 20px 0;
 }

.updateinfo {
   color: blue;
   font-size: 12px;
   font-family: Arial;
   margin: 0 0 20px 0;
 }


 .tbg0 {
 }

 .tbg1 {
   background: #F0F0F0;
 }

 .it {
    font-size: 12px;
    font-family: Arial;
 }

 .ctd {
    font-size: 12px;
    font-family: Arial;
    color: #909090;
 }

 .flist {
   margin: 10px 0 30px 0;
 }

 .tbgh {
   background: #E0E0E0;
 }

 TH {
   text-align: left;
   font-size: 12px;
   font-family: Arial;
   color: #909090;
 }

 .details {
  font-size: 9px;
  font-family: Arial;
  color: #303030;
 }

 .marker
 {
    color: #FF0000;
    font-size: 16px;
    font-weight: 700;
 }

</style>

<script language="javascript">
  function addToIgnore(par_Lnk, par_FN, par_CRC) {
	var o = document.getElementById('igid');
	var ta = document.forms.ignore.list;
	
	ta.value = ta.value + par_FN + String.fromCharCode(09) + par_CRC + String.fromCharCode(10);
	
	par_Lnk.innerHTML = 'Добавлено'; 
	o.style.display = 'block';
  }

function hsig(id) {
  var divs = document.getElementsByTagName("tr");
  for(var i = 0; i < divs.length; i++){
     
     if (divs[i].getAttribute('o') == id) {
        divs[i].innerHTML = '';
     }
  }

  return false;
}

</script>

</head>
<body>
<noindex>
MAIN_PAGE;

////////////////////////////////////////////////////////////////////////////

$l_Result .= sprintf(AI_STR_001, AI_VERSION, INFO_M); 

$l_CreationTime = filemtime(__FILE__);
if (time() - $l_CreationTime > 86400 * 7) {
  $l_Result .= AI_STR_002;
}

$l_Result .= '<div class="update" style="margin: 20px 0 20px 0; padding: 20px; width: 500px; border: 1px solid #400000"><b>' . AI_STR_003 . '</b></div>';

if (!AI_EXPERT) {
   $l_Result .= '<div class="updateinfo">' . AI_STR_057 . '</div>'; 
}

define('QCR_INDEX_FILENAME', 'fn');
define('QCR_INDEX_TYPE', 'type');
define('QCR_INDEX_WRITABLE', 'wr');
define('QCR_SVALUE_FILE', '1');
define('QCR_SVALUE_FOLDER', '0');

/**
 * Extract emails from the string
 * @param string $email
 * @return array of strings with emails or false on error
 */
function getEmails($email)
{
	$email = preg_split('#[,\s;]#', $email, -1, PREG_SPLIT_NO_EMPTY);
	$r = array();
	for ($i = 0, $size = sizeof($email); $i < $size; $i++)
	{
	        if (function_exists('filter_var')) {
   		   if (filter_var($email[$i], FILTER_VALIDATE_EMAIL))
   		   {
   		   	$r[] = $email[$i];
    		   }
                } else {
                   // for PHP4
                   if (strpos($email[$i], '@') !== false) {
   		   	$r[] = $email[$i];
                   }
                }
	}
	return empty($r) ? false : $r;
}

/**
 * Get bytes from shorthand byte values (1M, 1G...)
 * @param int|string $val
 * @return int
 */
function getBytes($val)
{
	$val = trim($val);
	$last = strtolower($val{strlen($val) - 1});
	switch($last) {
		case 't':
			$val *= 1024;
		case 'g':
			$val *= 1024;
		case 'm':
			$val *= 1024;
		case 'k':
			$val *= 1024;
	}
	return intval($val);
}

/**
 * Format bytes to human readable
 * @param int $bites
 * @return string
 */
function bytes2Human($bites)
{
	if ($bites < 1024)
	{
		return $bites . ' b';
	}
	elseif (($kb = $bites / 1024) < 1024)
	{
		return number_format($kb, 2) . ' Kb';
	}
	elseif (($mb = $kb / 1024) < 1024)
	{
		return number_format($mb, 2) . ' Mb';
	}
	elseif (($gb = $mb / 1024) < 1024)
	{
		return number_format($gb, 2) . ' Gb';
	}
	else
	{
		return number_format($gb / 1024, 2) . 'Tb';
	}
}

///////////////////////////////////////////////////////////////////////////
function needIgnore($par_FN, $par_CRC) {
  global $g_IgnoreList;
  
  for ($i = 0; $i < count($g_IgnoreList); $i++) {
     if (strpos($par_FN, $g_IgnoreList[$i][0]) !== false) {
		if ($par_CRC == $g_IgnoreList[$i][1]) {
			return true;
		}
	 }
  }
  
  return false;
}

///////////////////////////////////////////////////////////////////////////
function printList($par_List, $par_Details = null, $par_NeedIgnore = false, $par_SigId = null, $par_TableName = null) {
  global $g_Structure;
  
  if ($par_TableName == null) {
     $par_TableName = 'table_' . rand(1000000,9000000);
  }

  $l_Result = '';
  $l_Result .= "<div class=\"flist\"><table cellspacing=1 cellpadding=4 border=0 id=\"" . $par_TableName . "\">";

  $l_Result .= "<thead><tr class=\"tbgh" . ( $i % 2 ). "\">";
  $l_Result .= "<th>" . AI_STR_004 . "</th>";
  $l_Result .= "<th>" . AI_STR_005 . "</th>";
  $l_Result .= "<th>" . AI_STR_006 . "</th>";
  $l_Result .= "<th width=90>" . AI_STR_007 . "</th>";
  $l_Result .= "<th width=90>CRC32</th>";
  $l_Result .= "<th width=0></th>";
  $l_Result .= "<th width=0></th>";
  $l_Result .= "<th width=0></th>";
  
  $l_Result .= "</tr></thead><tbody>";

  for ($i = 0; $i < count($par_List); $i++) {
    if ($par_SigId != null) {
       $l_SigId = 'id_' . $par_SigId[$i];
    } else {
       $l_SigId = 'id_z' . rand(1000000,9000000);
    }
    
    $l_Pos = $par_List[$i];
        if ($par_NeedIgnore) {
         	if (needIgnore($g_Structure['n'][$par_List[$i]], $g_Structure['crc'][$l_Pos])) {
         		continue;
         	}
        }
  
     $l_Creat = $g_Structure['c'][$l_Pos] > 0 ? date("d/m/Y H:i:s", $g_Structure['c'][$l_Pos]) : '-';
     $l_Modif = $g_Structure['m'][$l_Pos] > 0 ? date("d/m/Y H:i:s", $g_Structure['m'][$l_Pos]) : '-';
     $l_Size = $g_Structure['s'][$l_Pos] > 0 ? bytes2Human($g_Structure['s'][$l_Pos]) : '-';

     if ($par_Details != null) {
        $l_WithMarket = preg_replace('|@AI_MARKER@|smi', '<span class="marker">|</span>', $par_Details[$i]);
        $l_Body = '<div class="details">';

        if ($par_SigId != null) {
           $l_Body .= '<a href="#" onclick="return hsig(\'' . $l_SigId . '\')">[x]</a> ';
        }

        $l_Body .= $l_WithMarket . '</div>';
     } else {
        $l_Body = '';
     }

     $l_Result .= '<tr class="tbg' . ( $i % 2 ). '" o="' . $l_SigId .'">';
	 
	 if (is_file($g_Structure['n'][$l_Pos])) {
		$l_Result .= '<td><div class="it"><a  class="it" target="_blank" href="'. $defaults['site_url'] . 'ai-bolit.php?fn=' .
	              $g_Structure['n'][$l_Pos] . '&ph=' . realCRC(PASS) . '&c=' . $g_Structure['crc'][$l_Pos] . '">' . $g_Structure['n'][$l_Pos] . '</a></div>' . $l_Body . '</td>';
	 } else {
		$l_Result .= '<td><div class="it">' . $g_Structure['n'][$par_List[$i]] . '</div></td>';
	 }
	 
     $l_Result .= '<td><div class="ctd">' . $l_Creat . '</div></td>';
     $l_Result .= '<td><div class="ctd">' . $l_Modif . '</div></td>';
     $l_Result .= '<td><div class="ctd">' . $l_Size . '</div></td>';
     $l_Result .= '<td><div class="ctd"><a href="#" onclick="addToIgnore(this, \'' . $g_Structure['n'][$l_Pos] . '\',\'' . $g_Structure['crc'][$l_Pos] . '\');return false;">' . $g_Structure['crc'][$l_Pos] . '</a></div></td>';
     $l_Result .= '<td class="hidd"><div class="hidd">' . $g_Structure['c'][$l_Pos] . '</div></td>';
     $l_Result .= '<td class="hidd"><div class="hidd">' . $g_Structure['m'][$l_Pos] . '</div></td>';
     $l_Result .= '<td class="hidd"><div class="hidd">' . $l_SigId . '</div></td>';
     $l_Result .= '</tr>';

  }

  $l_Result .= "</tbody></table></div>";

  return $l_Result;
}

///////////////////////////////////////////////////////////////////////////
function extractValue(&$par_Str, $par_Name) {
  if (preg_match('|<tr><td class="e">\s*'.$par_Name.'\s*</td><td class="v">(.+?)</td>|sm', $par_Str, $l_Result)) {
     return str_replace('no value', '', strip_tags($l_Result[1]));
  }
}

///////////////////////////////////////////////////////////////////////////
function QCR_ExtractInfo($par_Str) {
   $l_PhpInfoSystem = extractValue($par_Str, 'System');
   $l_PhpPHPAPI = extractValue($par_Str, 'Server API');
   $l_AllowUrlFOpen = extractValue($par_Str, 'allow_url_fopen');
   $l_AllowUrlInclude = extractValue($par_Str, 'allow_url_include');
   $l_DisabledFunction = extractValue($par_Str, 'disable_functions');
   $l_DisplayErrors = extractValue($par_Str, 'display_errors');
   $l_ErrorReporting = extractValue($par_Str, 'error_reporting');
   $l_ExposePHP = extractValue($par_Str, 'expose_php');
   $l_LogErrors = extractValue($par_Str, 'log_errors');
   $l_MQGPC = extractValue($par_Str, 'magic_quotes_gpc');
   $l_MQRT = extractValue($par_Str, 'magic_quotes_runtime');
   $l_OpenBaseDir = extractValue($par_Str, 'open_basedir');
   $l_RegisterGlobals = extractValue($par_Str, 'register_globals');
   $l_SafeMode = extractValue($par_Str, 'safe_mode');


   $l_DisabledFunction = ($l_DisabledFunction == '' ? '-?-' : $l_DisabledFunction);
   $l_OpenBaseDir = ($l_OpenBaseDir == '' ? '-?-' : $l_OpenBaseDir);

   $l_Result = '<div class="sec">' . AI_STR_008 . ': ' . phpversion() . '</div>';
   $l_Result .= 'System Version: <span class="php_ok">' . $l_PhpInfoSystem . '</span><br/>';
   $l_Result .= 'PHP API: <span class="php_ok">' . $l_PhpPHPAPI. '</span><br/>';
   $l_Result .= 'allow_url_fopen: <span class="php_' . ($l_AllowUrlFOpen == 'On' ? 'bad' : 'ok') . '">' . $l_AllowUrlFOpen. '</span><br/>';
   $l_Result .= 'allow_url_include: <span class="php_' . ($l_AllowUrlInclude == 'On' ? 'bad' : 'ok') . '">' . $l_AllowUrlInclude. '</span><br/>';
   $l_Result .= 'disable_functions: <span class="php_' . ($l_DisabledFunction == '-?-' ? 'bad' : 'ok') . '">' . $l_DisabledFunction. '</span><br/>';
   $l_Result .= 'display_errors: <span class="php_' . ($l_DisplayErrors == 'On' ? 'ok' : 'bad') . '">' . $l_DisplayErrors. '</span><br/>';
   $l_Result .= 'error_reporting: <span class="php_ok">' . $l_ErrorReporting. '</span><br/>';
   $l_Result .= 'expose_php: <span class="php_' . ($l_ExposePHP == 'On' ? 'bad' : 'ok') . '">' . $l_ExposePHP. '</span><br/>';
   $l_Result .= 'log_errors: <span class="php_' . ($l_LogErrors == 'On' ? 'ok' : 'bad') . '">' . $l_LogErrors . '</span><br/>';
   $l_Result .= 'magic_quotes_gpc: <span class="php_' . ($l_MQGPC == 'On' ? 'ok' : 'bad') . '">' . $l_MQGPC. '</span><br/>';
   $l_Result .= 'magic_quotes_runtime: <span class="php_' . ($l_MQRT == 'On' ? 'bad' : 'ok') . '">' . $l_MQRT. '</span><br/>';
   $l_Result .= 'register_globals: <span class="php_' . ($l_RegisterGlobals == 'On' ? 'bad' : 'ok') . '">' . $l_RegisterGlobals . '</span><br/>';
   $l_Result .= 'open_basedir: <span class="php_' . ($l_OpenBaseDir == '-?-' ? 'bad' : 'ok') . '">' . $l_OpenBaseDir . '</span><br/>';
   
   if (phpversion() < '5.3.0') {
      $l_Result .= 'safe_mode (PHP < 5.3.0): <span class="php_' . ($l_SafeMode == 'On' ? 'ok' : 'bad') . '">' . $l_SafeMode. '</span><br/>';
   }

   return $l_Result . '<p>';
}

///////////////////////////////////////////////////////////////////////////
function QCR_Debug($par_Str) {
  if (!DEBUG_MODE) {
     return;
  }

  $l_MemInfo = ' ';  
  if (function_exists('memory_get_usage')) {
     $l_MemInfo .= ' curmem=' .  bytes2Human(memory_get_usage());
  }

  if (function_exists('memory_get_peak_usage')) {
     $l_MemInfo .= ' maxmem=' .  bytes2Human(memory_get_peak_usage());
  }

  stdOut(date('H:i:s') . ': ' . $par_Str . $l_MemInfo);
}


///////////////////////////////////////////////////////////////////////////
function QCR_ScanDirectories($l_RootDir)
{
	global $g_Structure, $g_Counter, $g_Doorway, $g_FoundTotalFiles, $g_FoundTotalDirs, 
			$defaults, $g_SkippedFolders, $g_UrlIgnoreList, $g_DirIgnoreList, $g_UnsafeFilesArray, $g_UnsafeDirArray, 
                        $g_UnsafeFilesFound, $g_SymLinks, $g_HiddenFiles;

	$l_DirCounter = 0;
	$l_DoorwayFilesCounter = 0;
	$l_SourceDirIndex = $g_Counter - 1;

	QCR_Debug('Scan ' . $l_RootDir);

        $l_QuotedSeparator = quotemeta(DIR_SEPARATOR); 
        $l_NeedCheckCandi = ($defaults['report_mask'] & REPORT_MASK_CANDI) == REPORT_MASK_CANDI;

	if ($l_DIRH = @opendir($l_RootDir))
	{
		while (($l_FileName = readdir($l_DIRH)) !== false)
		{
			if ($l_FileName == '.' || $l_FileName == '..') continue;

                        if (is_link($l_FileName)) 
                        {
                            $g_SymLinks[] = $l_FileName;
                            continue;
                        }

			$l_FileName = $l_RootDir . DIR_SEPARATOR . $l_FileName;

			$l_Ext = substr($l_FileName, strrpos($l_FileName, '.') + 1);

			$l_IsDir = is_dir($l_FileName);

			// which files should be scanned
			$l_NeedToScan = SCAN_ALL_FILES || (in_array($l_Ext, array(
				'js', 'php', 'php3', 'phtml', 'shtml', 'khtml',
				'php4', 'php5', 'tpl', 'inc', 'htaccess', 'html', 'htm'
			)));

			if (strpos(basename($l_FileName), '.') === 0) {
                            $g_HiddenFiles[] = $l_FileName;
                        }

			if ($l_IsDir)
			{
				// if folder in ignore list
				$l_Skip = false;
				for ($dr = 0; $dr < count($g_DirIgnoreList); $dr++) {
					if (($g_DirIgnoreList[$dr] != '') &&
						preg_match('#' . $g_DirIgnoreList[$dr] . '#', $l_FileName, $l_Found)) {
						$l_Skip = true;
					}
				}
			
				// skip on ignore
				if ($l_Skip) {
					$g_SkippedFolders[] = $l_FileName;
					continue;
				}
				
				$g_Structure['d'][$g_Counter] = $l_IsDir;
				$g_Structure['n'][$g_Counter] = $l_FileName;

				$l_DirCounter++;


                                if ($l_NeedCheckCandi) {
         				for ($j = 0; $j < count($g_UnsafeDirArray); $j++) {
         				    if (preg_match('|' . $l_QuotedSeparator . $g_UnsafeDirArray[$j] . '$|i', $l_FileName, $l_Found)) {
                                                $g_UnsafeFilesFound[] = $g_Counter;
                                                break;
                                             }
         				}
     				}

				if ($l_DirCounter > MAX_ALLOWED_PHP_HTML_IN_DIR)
				{
					$g_Doorway[] = $l_SourceDirIndex;
					$l_DirCounter = -655360;
				}

				$g_Counter++;
				$g_FoundTotalDirs++;

				QCR_ScanDirectories($l_FileName);

			} else
			{
				if ($l_NeedToScan)
				{
					$g_FoundTotalFiles++;
					if (in_array($l_Ext, array(
						'php', 'php3',
						'php4', 'php5', 'html', 'htm', 'phtml', 'shtml', 'khtml'
					))
					)
					{
						$l_DoorwayFilesCounter++;
						
						if ($l_DoorwayFilesCounter > MAX_ALLOWED_PHP_HTML_IN_DIR)
						{
							$g_Doorway[] = $l_SourceDirIndex;
							$l_DoorwayFilesCounter = -655360;
						}
					}


					$l_Stat = stat($l_FileName);

					$g_Structure['d'][$g_Counter] = $l_IsDir;
					$g_Structure['n'][$g_Counter] = $l_FileName;
					$g_Structure['s'][$g_Counter] = $l_Stat['size'];
					$g_Structure['c'][$g_Counter] = $l_Stat['ctime'];
					$g_Structure['m'][$g_Counter] = $l_Stat['mtime'];

                                        if ($l_NeedCheckCandi) {
          					for ($j = 0; $j < count($g_UnsafeFilesArray); $j++) {
         					    if (preg_match('|' . $l_QuotedSeparator . $g_UnsafeFilesArray[$j] . '|i', $l_FileName, $l_Found)) {
                                                        $g_UnsafeFilesFound[] = $g_Counter;
                                                        break;
                                                     }
         					}
         				}

					$g_Counter++;
				}
			}
		}

		closedir($l_DIRH);
	}

	return $g_Structure;
}


///////////////////////////////////////////////////////////////////////////
function QCR_ScanFile($l_TheFile)
{
	global $g_Structure, $g_Counter, $g_Doorway, $g_FoundTotalFiles, $g_FoundTotalDirs, 
			$defaults, $g_SkippedFolders, $g_UrlIgnoreList, $g_DirIgnoreList, $g_UnsafeFilesArray, $g_UnsafeDirArray, 
                        $g_UnsafeFilesFound, $g_SymLinks, $g_HiddenFiles;

	QCR_Debug('Scan file ' . $l_TheFile);

      	$l_Stat = stat($l_TheFile);

      	$g_Structure['d'][$g_Counter] = false;
      	$g_Structure['n'][$g_Counter] = $l_TheFile;
      	$g_Structure['s'][$g_Counter] = $l_Stat['size'];
      	$g_Structure['c'][$g_Counter] = $l_Stat['ctime'];
      	$g_Structure['m'][$g_Counter] = $l_Stat['mtime'];

      	$g_Counter++;

	return $g_Structure;
}



///////////////////////////////////////////////////////////////////////////
function getFragment($par_Content, $par_Pos) {
  $l_MaxChars = MAX_PREVIEW_LEN;
  $l_MaxLen = strlen($par_Content);
  $l_RightPos = min($par_Pos + $l_MaxChars, $l_MaxLen); 
  $l_MinPos = max(0, $par_Pos - $l_MaxChars);

  $l_Res = substr($par_Content, $l_MinPos, $par_Pos - $l_MinPos) . 
           '@AI_MARKER@' . 
           substr($par_Content, $par_Pos, $l_RightPos - $par_Pos - 1);

  return htmlspecialchars($l_Res);
}

///////////////////////////////////////////////////////////////////////////
function escapedHexToHex($escaped)
{ $GLOBALS['g_EncObfu']++; return chr(hexdec($escaped[1])); }
function escapedOctDec($escaped)
{ $GLOBALS['g_EncObfu']++; return chr(octdec($escaped[1])); }
function escapedDec($escaped)
{ $GLOBALS['g_EncObfu']++; return chr($escaped[1]); }

///////////////////////////////////////////////////////////////////////////
if (!defined('T_ML_COMMENT')) {
   define('T_ML_COMMENT', T_COMMENT);
} else {
   define('T_DOC_COMMENT', T_ML_COMMENT);
}

function UnwrapObfu($par_Content) {
  $GLOBALS['g_EncObfu'] = 0;

  $par_Content = preg_replace_callback('/\\\\x([a-fA-F0-9]{1,2})/i','escapedHexToHex', $par_Content);
  $par_Content = preg_replace_callback('/\\\\([0-9]{1,3})/i','escapedOctDec', $par_Content);
//  $par_Content = preg_replace_callback('/\\\\([0-9]{2})/i','escapedDec', $par_Content);

  $par_Content = preg_replace('/[\'"]\s*?\.\s*?[\'"]/smi', '', $par_Content);

  return $par_Content;
}

///////////////////////////////////////////////////////////////////////////
function QCR_SearchPHP($src)
{
  if (preg_match("/(<\?php[\w\s]{5,})/smi", $src, $l_Found, PREG_OFFSET_CAPTURE)) {
	  return $l_Found[0][1];
  }

//  if (preg_match("/(<%[\w\s]{10,})/smi", $src, $l_Found, PREG_OFFSET_CAPTURE)) {
//	  return $l_Found[0][1];
//  }
  if (preg_match("/(<script[^>]*language\s*=\s*)('|\"|)php('|\"|)([^>]*>)/i", $src, $l_Found, PREG_OFFSET_CAPTURE)) {
    return $l_Found[0][1];
  }

  return false;
}


///////////////////////////////////////////////////////////////////////////
function knowUrl($par_URL) {
  global $g_UrlIgnoreList;

  for ($jk = 0; $jk < count($g_UrlIgnoreList); $jk++) {
     if  ((stripos($par_URL, $g_UrlIgnoreList[$jk]) !== false)) {
     	return true;
     }
  }

  return false;
}


///////////////////////////////////////////////////////////////////////////
function QCR_GoScan($par_Offset)
{
	global $g_IframerFragment, $g_Iframer, $g_SuspDir, $g_Redirect, $g_Doorway, $g_EmptyLink, $g_Structure, $g_Counter, 
		   $g_WritableDirectories, $g_HeuristicType, $g_HeuristicDetected, $g_TotalFolder, $g_TotalFiles, $g_WarningPHP, $g_AdwareList,
		   $g_CriticalPHP, $g_CriticalJS, $g_UrlIgnoreList, $g_CriticalJSFragment, $g_PHPCodeInside, $g_PHPCodeInsideFragment, 
		   $g_NotRead, $g_WarningPHPFragment, $g_WarningPHPSig, $g_BigFiles, $g_RedirectPHPFragment, $g_EmptyLinkSrc, $g_CriticalPHPSig, $g_CriticalPHPFragment, 
           $g_Base64Fragment, $g_UnixExec, $g_CriticalJSSig, $g_IframerFragment, $g_CMS, $defaults, $g_AdwareListFragment, $g_KnownList;

	static $_files_and_ignored = 0;

        QCR_Debug('QCR_GoScan ' . $par_Offset);


	for ($i = $par_Offset; $i < $g_Counter; $i++)
	{
		$l_Filename = $g_Structure['n'][$i];

 	        QCR_Debug('Check ' . $l_Filename);

		if ($g_Structure['d'][$i])
		{
			// FOLDER
			$g_TotalFolder++;

			if (is_writable($l_Filename))
			{
				$g_WritableDirectories[] = $i;
			}
		}
		else
		{

			// FILE
			if ((MAX_SIZE_TO_SCAN > 0 AND $g_Structure['s'][$i] > MAX_SIZE_TO_SCAN) || ($g_Structure['s'][$i] < 0))
			{
				$g_BigFiles[] = $i;
			}
			else
			{
				$g_TotalFiles++;

                $l_Content = @implode('', file($l_Filename));
                if (($l_Content == '') && ($g_Structure['s'][$i] > 0)) {
                   $g_NotRead[] = $i;
                }

				$g_Structure['crc'][$i] = realCRC($l_Content);

                                $l_KnownCRC = $g_Structure['crc'][$i] + realCRC(basename($l_Filename));
                                if (in_array($l_KnownCRC, $g_KnownList)) {
	        		   printProgress(++$_files_and_ignored, $l_Filename);
                                   continue;
                                }

				$l_Unwrapped = UnwrapObfu($l_Content);

				if (function_exists('utf8_decode')) {
				   $l_Unwrapped = utf8_decode($l_Unwrapped);
                                }

				// ignore itself
				if (strpos($l_Content, 'HHH776HHHH05DFGHGJHGYYYFD') !== false) {
					continue;
				}

				// warnings
				$l_Pos = '';
				if (WarningPHP($l_Filename, $l_Unwrapped, $l_Pos, $l_SigId))
				{       $l_Prio = 1;
				        if (strpos($l_Filename, '.php') !== false) {
				       	   $l_Prio = 0;
					}

					$g_WarningPHP[$l_Prio][] = $i;
					$g_WarningPHPFragment[$l_Prio][] = getFragment($l_Content, $l_Pos);
					$g_WarningPHPSig[] = $l_SigId;
				}

				// adware
				if (Adware($l_Filename, $l_Unwrapped, $l_Pos))
				{
					$g_AdwareList[] = $i;
					$g_AdwareListFragment[] = getFragment($l_Unwrapped, $l_Pos);
				}

				// critical
				$g_SkipNextCheck = false;
				if (CriticalPHP($l_Filename, $i, $l_Unwrapped, $l_Pos, $l_SigId))
				{
					$g_CriticalPHP[] = $i;
					$g_CriticalPHPFragment[] = getFragment($l_Unwrapped, $l_Pos);
					$g_CriticalPHPSig[] = $l_SigId;
					$g_SkipNextCheck = true;
				} else {
         				if (CriticalPHP($l_Filename, $i, $l_Content, $l_Pos, $l_SigId))
         				{
         					$g_CriticalPHP[] = $i;
         					$g_CriticalPHPFragment[] = getFragment($l_Content, $l_Pos);
						$g_CriticalPHPSig[] = $l_SigId;
         					$g_SkipNextCheck = true;
         				}
				}

				
				// critical without comments
				$a = preg_replace('|/\*.*?\*/|smiu', '', $l_Unwrapped);
				
				if ((!$g_SkipNextCheck) && CriticalPHP($l_Filename, $i, $a, $l_Pos, $l_SigId))
				{
					$g_CriticalPHP[] = $i;
					$g_CriticalPHPFragment[] = getFragment($l_Unwrapped, $l_Pos);
					$g_CriticalPHPSig[] = $l_SigId;
				}			

				$l_TypeDe = 0;
			    if (ai_check_extra_obfus($l_Content, $l_TypeDe)) {
					$g_HeuristicDetected[] = $i;
					$g_HeuristicType[] = $l_TypeDe;
				}

				// critical JS
				$l_Pos = CriticalJS($l_Filename, $i, $l_Unwrapped, $l_SigId);
				if ($l_Pos !== false)
				{
					$g_CriticalJS[] = $i;
					$g_CriticalJSFragment[] = getFragment($l_Unwrapped, $l_Pos);
					$g_CriticalJSSig[] = $l_SigId;
				}

				if
				(stripos($l_Filename, 'index.php') ||
					stripos($l_Filename, 'index.htm') ||
					SCAN_ALL_FILES
				)
				{
					// check iframes
					if (preg_match_all('|<iframe.+?src.+?>|smi', $l_Unwrapped, $l_Found, PREG_SET_ORDER)) 
					{
						for ($kk = 0; $kk < count($l_Found); $kk++) {
						        $l_Pos = stripos($l_Found[$kk][0], 'http://');
							if  (($l_Pos !== false) && (!knowUrl($l_Found[$kk][0]))) {
         							$g_Iframer[] = $i;
         							$g_IframerFragment[] = getFragment($l_Found[$kk][0], $l_Pos);
							}
						}
					}

					// check empty links
					if (preg_match_all('|<a[^>]+href([^>]+?)>(.*?)</a>|smi', $l_Unwrapped, $l_Found, PREG_SET_ORDER))
					{
						for ($kk = 0; $kk < count($l_Found); $kk++) {
							if  ((stripos($l_Found[$kk][1], 'http://') !== false) &&
                                                            (trim(strip_tags($l_Found[$kk][2])) == '')) {

								$l_NeedToAdd = true;

							    if  ((stripos($l_Found[$kk][1], $default['site_url']) !== false)
                                                                 || knowUrl($l_Found[$kk][1])) {
										$l_NeedToAdd = false;
								}
								
								if ($l_NeedToAdd && (count($g_EmptyLink) < MAX_EXT_LINKS)) {
									$g_EmptyLink[] = $i;
									$g_EmptyLinkSrc[$i][] = substr($l_Found[$kk][0], 0, MAX_PREVIEW_LEN);
								}
							}
						}
					}
				}

				// check for PHP code inside any type of file
				if ((stripos($l_Filename, '.php') === false) && 
				    (stripos($l_Filename, '.phtml') === false))
				{
					$l_Pos = QCR_SearchPHP($l_Content);
					if ($l_Pos !== false)
					{
						$g_PHPCodeInside[] = $i;
						$g_PHPCodeInsideFragment[] = getFragment($l_Unwrapped, $l_Pos);
					}
				}

				// articles
				if (stripos($l_Filename, 'article_index'))
				{
					$g_AdwareSig[] = $i;
				}

				// unix executables
				if (strpos($l_Content, chr(127) . 'ELF') !== false) 
				{
                    $g_UnixExec[] = $i;
                }
				
				// htaccess
				if (stripos($l_Filename, '.htaccess'))
				{
				
				if (stripos($l_Content, 'index.php?name=$1') !== false ||
						stripos($l_Content, 'index.php?m=1') !== false
					)
					{
						$g_SuspDir[] = $i;
					}

					$l_Pos = stripos($l_Content, '^(%2d|-)[^=]+$');
					if ($l_Pos !== false)
					{
						$g_Redirect[] = $i;
                        $g_RedirectPHPFragment[] = getFragment($l_Content, $l_Pos);
					}

					$l_Pos = stripos($l_Content, '%{HTTP_USER_AGENT}');
					if ($l_Pos !== false)
					{
						$g_Redirect[] = $i;
                        $g_RedirectPHPFragment[] = getFragment($l_Content, $l_Pos);
					}


					if (
						preg_match_all('|(RewriteCond\s+%\{HTTP_HOST\}/%1 \!\^\[w\.\]\*\(\[\^/\]\+\)/\\\1\$\s+\[NC\])|smi', $l_Content, $l_Found, PREG_OFFSET_CAPTURE)
					   )
					{
						$g_Redirect[] = $i;
                        			$g_RedirectPHPFragment[] = getFragment($l_Content, $l_Found[0][1]);
					}
//

					$l_HTAContent = preg_replace('|^\s*#.+$|m', '', $l_Content);

					if (
						preg_match_all("|RewriteRule\s+.+?\s+http://(.+?)/.+\s+\[.*R=\d+.*\]|smi", $l_HTAContent, $l_Found, PREG_SET_ORDER)
					)
					{
						$l_Host = str_replace('www.', '', $_SERVER['HTTP_HOST']);
						for ($j = 0; $j < sizeof($l_Found); $j++)
						{
							$l_Found[$j][1] = str_replace('www.', '', $l_Found[$j][1]);
							if ($l_Found[$j][1] != $l_Host)
							{
								$g_Redirect[] = $i;
								break;
							}
						}
					}

					unset($l_HTAContent);
					
					$l_Pos = stripos($l_Content, 'auto_prepend_file');
					if ($l_Pos !== false) {
						$g_Redirect[] = $i;
						$g_RedirectPHPFragment[] = getFragment($l_Content, $l_Pos);
					}
					$l_Pos = stripos($l_Content, 'auto_append_file');
					if ($l_Pos !== false) {
						$g_Redirect[] = $i;
						$g_RedirectPHPFragment[] = getFragment($l_Content, $l_Pos);
					}

					if (preg_match("|RewriteRule\s+\^\(\.\*\)\$\s+-\s+\[\s*F\s*,\s*L\s*\]|smi", $l_Content, $l_Found)) {
						$g_Redirect[] = $i;
					}
				}
			}
			
			unset($l_Unwrapped);
			unset($l_Content);
			
			printProgress(++$_files_and_ignored, $l_Filename);
		} // end of if (file)

		usleep(SCAN_DELAY * 1000);

	} // end of for

}

///////////////////////////////////////////////////////////////////////////
function WarningPHP($l_FN, $l_Content, &$l_Pos, &$l_SigId)
{
  global $g_SusDB;

  $l_Res = false;

//print "WarningPHP Start:\n";
//print "###########################################################################\n";

  foreach ($g_SusDB as $l_Item) {
    if (preg_match('#(' . $l_Item . ')#smi', $l_Content, $l_Found, PREG_OFFSET_CAPTURE)) {
       if (!CheckException($l_Content, $l_Found)) {
           $l_Pos = $l_Found[0][1];
           $l_SigId = myCheckSum($l_Item);
//print  "\nSusDB $l_FN =" . $l_Item." l_Pos=" . $l_Pos . "\n";
           return true;
       }
    }
  }

//print "###########################################################################\n";
//print "WarningPHP End:\n";

  return $l_Res;
}

///////////////////////////////////////////////////////////////////////////
function Adware($l_FN, $l_Content, &$l_Pos)
{
  global $g_AdwareSig;

  $l_Res = false;

//print "Adware Start:\n";
//print "###########################################################################\n";

  foreach ($g_AdwareSig as $l_Item) {
    if (preg_match('#(' . $l_Item . ')#smi', $l_Content, $l_Found, PREG_OFFSET_CAPTURE)) {
       if (!CheckException($l_Content, $l_Found)) {
           $l_Pos = $l_Found[0][1];
//print  "\ng_AdwareSig $l_FN =" . $l_Item." l_Pos=" . $l_Pos . "\n";
           return true;
       }
    }
  }


//print "Adware End:\n";
//print "###########################################################################\n";

  return $l_Res;
}

///////////////////////////////////////////////////////////////////////////
function CheckException(&$l_Content, &$l_Found) {
  global $g_ExceptFlex, $gX_FlexDBShe, $g_FlexDBShe, $gX_DBShe, $g_DBShe, $g_Base64, $g_Base64Fragment;

//print "\nCheckException Start -----------------------------:\n";

   $l_FoundStrPlus = substr($l_Content, max($l_Found[0][1] - 10, 0), 70);

   foreach ($g_ExceptFlex as $l_ExceptItem) {

//print "\n{{{" . $l_FoundStrPlus . "}}} vs {{{" . $l_ExceptItem . "}}}\n";
//print "--------------------------------------------\n";

      if (preg_match('#(' . $l_ExceptItem . ')#smi', $l_FoundStrPlus, $l_Detected)) {


//		print "Matched {{{" . $l_ExceptItem . "}}} in {{{" . $l_FN. "}}}\n\n";
//		print "==========> {{{" . $l_Found[0][0]. "}}}\r\n";
//		print "\n" . "CheckException: ****** EXCEPTION *************" . "\n";

         $l_Exception = true;
         return true;
      }
   }

//print "\nCheckException End -----------------------------:\n";
   return false;
}

///////////////////////////////////////////////////////////////////////////
function CriticalJS($l_FN, $l_Index, $l_Content, &$l_SigId)
{
  global $g_JSVirSig;

  $l_Res = false;

//print "###########################################################################\n";
//print "CriticalJS Start:" . $l_FN . " index: " . $l_Index . "\n";
//print "###########################################################################\n";

//echo 'CONTENT:[';
//echo $l_Content."]\n\n";

  foreach ($g_JSVirSig as $l_Item) {
    if (preg_match('#(' . $l_Item . ')#smi', $l_Content, $l_Found, PREG_OFFSET_CAPTURE)) {
       if (!CheckException($l_Content, $l_Found)) {
           $l_Pos = $l_Found[0][1];
           $l_SigId = myCheckSum($l_Item);
//print "CriticalJS " . $l_FN . ' ' . $l_Item . ' l_Pos=' . $l_Pos . "\n";
           return $l_Pos;
       }
    }
  }

//print "###########################################################################\n";
//print "CriticalJS End:\n";

  return $l_Res;
}


///////////////////////////////////////////////////////////////////////////
  function get_descr_heur($type) {
     $msg = '';
     switch ($type) {
	    case 1: $msg = AI_STR_053;
		        break;
	    case 2: $msg = AI_STR_054;
		        break;
	    case 3: $msg = AI_STR_055;
		        break;
	    case 4: $msg = AI_STR_056;
		        break;
	 }
	 
	 return $msg;
  }

  function ai_check_extra_obfus($content, &$type) {
     $res = false;

     // 1
     if (preg_match_all('|(\$[a-zA-Z0-9_]{3,}\[[\d+]\]\s*\(\s*\$)|smiu', $content, $found, PREG_SET_ORDER)) {
        $ref_calls = count($found);
     }

     // 2
     if (preg_match_all('|\$([a-zA-Z0-9_]{3,}?)\s*[;\=\(]|smi', $content, $found, PREG_SET_ORDER)) {
       $obf_var1 = 0;
       $obf_var2 = 0;

       $arr = array();
       foreach ($found as $item) {
         $arr[$item[1]] = 1;
       }                          


       $found = array_keys($arr);

       foreach ($found as $item) {
          if (preg_match('|([a-zA-Z]{2,}[0-9]+[a-zA-Z]+){1,}|', $item, $found_ob)) {
             $obf_var1++;
          }

          if (!preg_match('|([aeiouy_])|i', $item, $found_ob) && (strlen($item) > 4)) {
             $obf_var2++;
          }

          if (preg_match('|([0-9bcdfghjklmnpqrstvwxz]{6,})|i', $item, $found_ob) && (strlen($item) > 3)) {
             $obf_var3++;
          }
       }
     }

     // 3
     if (preg_match_all('|(\$GLOBALS\[\'[a-z_0-9]+\'\]\[\d+\]\()|smiu', $content, $found, PREG_SET_ORDER)) {
        $ref_glob = count($found);
     }

     // 4
//     if (preg_match_all('|(["\'].+?["\']\s*\.\s*){10,}|smiu', $content, $found, PREG_SET_ORDER)) {
//	    $type = 4;
//		return true;
//     }
	 
	 /////////////////////////////////////
	 if ($ref_calls > 10) {
	    $type = 1;
		return true;
	 }

	 if ($ref_glob > 10) {
	    $type = 2;
		return true;
	 }
	 
	 if ($obf_var1 + $obf_var2 + $obf_var3 >= 3) {
	    $type = 3;
		return true;
	 }

 
	 return false;
  }

///////////////////////////////////////////////////////////////////////////
function CriticalPHP($l_FN, $l_Index, $l_Content, &$l_Pos, &$l_SigId)
{
  global $g_ExceptFlex, $gX_FlexDBShe, $g_FlexDBShe, $gX_DBShe, $g_DBShe, $g_Base64, $g_Base64Fragment;

//print "###########################################################################\n";
//print "CriticalPHP Start:" . $l_FN . " index: " . $l_Index . "\n";
//print "###########################################################################\n";

//echo 'CONTENT:[';
//echo $l_Content."]\n\n";


  // HHH776HHHH05DFGHGJHGYYYFD

#var_dump($g_ExceptFlex);


  foreach ($g_FlexDBShe as $l_Item) {
//print "\nSIGNATURE: " . $l_Item . ''."\n";
    if (preg_match('#(' . $l_Item . ')#smi', $l_Content, $l_Found, PREG_OFFSET_CAPTURE)) {
//print "\nIN: {{{" . $l_Found[0][0]. "}}}\n";
       if (!CheckException($l_Content, $l_Found)) {
//print "\n****** VIR *************\n";
           $l_Pos = $l_Found[0][1];
           $l_SigId = myCheckSum($l_Item);
           return true;
       }
    }
  }

if (AI_EXPERT) {
  foreach ($gX_FlexDBShe as $l_Item) {
//print "\nSIGNATURE: " . $l_Item . ''."\n";
    if (preg_match('#(' . $l_Item . ')#smi', $l_Content, $l_Found, PREG_OFFSET_CAPTURE)) {
//print "\nIN: {{{" . $l_Found[0][0]. "}}}\n";
       if (!CheckException($l_Content, $l_Found)) {
//print "\n****** VIR *************\n";
           $l_Pos = $l_Found[0][1];
           $l_SigId = myCheckSum($l_Item);
           return true;
       }
    }
  }
}

  foreach ($g_DBShe as $l_Item) {
    $l_Pos = stripos($l_Content, $l_Item);
    if ($l_Pos !== false) {
       $l_SigId = myCheckSum($l_Item);
       return true;
    }
  }

if (AI_EXPERT) {
  foreach ($gX_DBShe as $l_Item) {
    $l_Pos = stripos($l_Content, $l_Item);
    if ($l_Pos !== false) {
       $l_SigId = myCheckSum($l_Item);
       return true;
    }
  }

  if (strpos($l_FN, '.php') !== false) {
     // for php only
     $g_Specials = array(');#');

     foreach ($g_Specials as $l_Item) {
       $l_Pos = stripos($l_Content, $l_Item);
       if ($l_Pos !== false) {
          $l_SigId = myCheckSum($l_Item);
          return true;
       }
     }
  }



}


//print "###########################################################################\n";
//print "CriticalPHP End:" . $l_FN . " index: " . $l_Index . "\n";
//print "###########################################################################\n";

  if ((strpos($l_Content, 'GIF89') === 0) && (strpos($l_FN, '.php') !== false )) {
     $l_Pos = 0;
	 return true;
  }

  if (strpos($l_FN, '.php.') !== false ) {
     $g_Base64[] = $l_Index;
     $g_Base64Fragment[] = '".php."';
     $l_Pos = 0;
     return false;
  }

  if (preg_match('#((include|require|require_once|include_once)\s*\(*\s*[\"\']http://.+?[\"\'])#smi', $l_Content, $l_Found)) {
     $g_Base64[] = $l_Index;
     $g_Base64Fragment[] = substr($l_Found[1], 0, MAX_PREVIEW_LEN);
  }

  // detect base64 suspicious
  if (preg_match('|([A-Za-z0-9+/]{' . BASE64_LENGTH . ',})|smi', $l_Content, $l_Found, PREG_OFFSET_CAPTURE)) {
     if (preg_match('#(assert|eval|sort|array_map|create_function|base64_decode|gzip_decode|gzip_inflate|preg_replace_callback)\s*\(#smi', 
                 $l_Content, $l_Found, PREG_OFFSET_CAPTURE)) {
        if ((!CheckException($l_Content, $l_Found)) && (!in_array($l_Index, $g_Base64))) {
 	  $g_Base64[] = $l_Index;
 	   $g_Base64Fragment[] = getFragment($l_Content, $l_Found[1][1]);
        }
     }
  }

  if (preg_match('|eval\s*\(.+?\(.+?\(\s*implode|smi', $l_Content, $l_Found)) {
     $g_Base64[] = $l_Index;
     $g_Base64Fragment[] = getFragment($l_Content, $l_Pos);
  }

  // count number of base64_decode entries
  $l_Count = substr_count($l_Content, 'base64_decode');
  if ($l_Count > 10) {
     $g_Base64[] = $l_Index;
     $g_Base64Fragment[] = getFragment($l_Content, stripos($l_Content, 'base64_decode'));
  }

  return false;
}

///////////////////////////////////////////////////////////////////////////
if (!isCli()) {
   header('Content-type: text/html; charset=utf-8');
}

if (!isCli()) {

  $l_PassOK = false;
  if (strlen(PASS) > 8) {
     $l_PassOK = true;   
  } 

  if ($l_PassOK && preg_match('|[0-9]|', PASS, $l_Found) && preg_match('|[A-Z]|', PASS, $l_Found) && preg_match('|[a-z]|', PASS, $l_Found) ) {
     $l_PassOK = true;   
  }
  
  if (!$l_PassOK) {  
    echo sprintf(AI_STR_009, generatePassword());
    exit;
  }

  if (isset($_GET['fn']) && ($_GET['ph'] == crc32(PASS))) {
     printFile();
     exit;
  }

  if ($_GET['p'] != PASS) {
    echo sprintf(AI_STR_010, generatePassword());
    exit;
  }
}

if (!is_readable(ROOT_PATH)) {
  echo AI_STR_011;
  exit;
}

if (isCli()) {
	if (defined('REPORT_PATH') AND REPORT_PATH)
	{
		if (!is_writable(REPORT_PATH))
		{
			die("\nCannot write report. Report dir " . REPORT_PATH . " is not writable.");
		}

		else if (!REPORT_FILE)
		{
			die("\nCannot write report. Report filename is empty.");
		}

		else if (($file = REPORT_PATH . DIR_SEPARATOR . REPORT_FILE) AND is_file($file) AND !is_writable($file))
		{
			die("\nCannot write report. Report file '$file' exists but is not writable.");
		}
	}
}


$g_IgnoreList = array();
$g_DirIgnoreList = array();
$g_UrlIgnoreList = array();
$g_KnownList = array();

$g_AiBolitAbsolutePath = dirname(__FILE__);

$l_IgnoreFilename = $g_AiBolitAbsolutePath . '/.aignore';
$l_DirIgnoreFilename = $g_AiBolitAbsolutePath . '/.adirignore';
$l_UrlIgnoreFilename = $g_AiBolitAbsolutePath . '/.aurlignore';
$l_KnownFilename = '.aknown';

if (file_exists($l_IgnoreFilename)) {
    $l_IgnoreListRaw = file($l_IgnoreFilename);
    for ($i = 0; $i < count($l_IgnoreListRaw); $i++) 
    {
    	$g_IgnoreList[] = explode("\t", trim($l_IgnoreListRaw[$i]));
    }
    unset($l_IgnoreListRaw);
}

if (file_exists($l_DirIgnoreFilename)) {
    $g_DirIgnoreList = file($l_DirIgnoreFilename);
	
	for ($i = 0; $i < count($g_DirIgnoreList); $i++) {
		$g_DirIgnoreList[$i] = trim($g_DirIgnoreList[$i]);
	}
}

if (file_exists($l_UrlIgnoreFilename)) {
    $g_UrlIgnoreList = file($l_UrlIgnoreFilename);
	
	for ($i = 0; $i < count($g_UrlIgnoreList); $i++) {
		$g_UrlIgnoreList[$i] = trim($g_UrlIgnoreList[$i]);
	}
}


$g_AiBolitAbsolutePathKnownFiles = dirname($g_AiBolitAbsolutePath) . '/known_files';
$g_AiBolitKnownFilesDirs = array('.');

if ($l_DIRH = opendir($g_AiBolitAbsolutePathKnownFiles))
{
    while (($l_FileName = readdir($l_DIRH)) !== false)
    {
	if ($l_FileName == '.' || $l_FileName == '..') continue;
        array_push($g_AiBolitKnownFilesDirs, $l_FileName);
    }

    closedir($l_DIRH);
}


foreach ($g_AiBolitKnownFilesDirs as $l_PathKnownFiles)
{
    if ($l_PathKnownFiles != '.') {
       $l_AbsolutePathKnownFiles = $g_AiBolitAbsolutePathKnownFiles . '/' . $l_PathKnownFiles;
    } else {
      $l_AbsolutePathKnownFiles = $l_PathKnownFiles;
    }

    if ($l_DIRH = opendir($l_AbsolutePathKnownFiles))
    {
        while (($l_FileName = readdir($l_DIRH)) !== false)
        {
            if ($l_FileName == '.' || $l_FileName == '..') continue;
               if (strpos($l_FileName, $l_KnownFilename) !== false) {
                           $g_KnownListTmp = file($l_AbsolutePathKnownFiles . '/' . $l_FileName);
                            for ($i = 0; $i < count($g_KnownListTmp); $i++) {
                                $g_KnownListTmp[$i] = trim($g_KnownListTmp[$i]);
                            }

                            $g_KnownList = array_merge($g_KnownListTmp, $g_KnownList);
                       }
        }
        closedir($l_DIRH);
    }
}

stdOut("Loaded " . count($g_KnownList) . ' known files');

QCR_Debug();

// scan single file
if (defined('SCAN_FILE')) {
   if (file_exists(SCAN_FILE) && is_file(SCAN_FILE) && is_readable(SCAN_FILE)) {
       stdOut("Start scanning file '" . SCAN_FILE . "'.");
       QCR_ScanFile(SCAN_FILE); 
   } else { 
       stdOut("Error:" . SCAN_FILE . " either is not a file or readable");
   }
} else {
   // scan list of files from file
   if (file_exists(DOUBLECHECK_FILE)) {
      stdOut("Start scanning the list from '" . DOUBLECHECK_FILE . "'.");
      $l_List = file(DOUBLECHECK_FILE);
      for ($i = 1; $i < count($l_List); $i++) {
          QCR_ScanFile(trim($l_List[$i])); 
      }
   } else {
      // scan whole file system
      stdOut("Start scanning '" . ROOT_PATH . "'.");
      QCR_ScanDirectories(ROOT_PATH);
   }
}

$g_FoundTotalFiles = count($g_Structure['n']);

QCR_Debug();

stdOut("Founded $g_FoundTotalFiles files in $g_FoundTotalDirs directories.");
stdOut(str_repeat(' ', 160),false);

$g_FoundTotalFiles = count($g_Structure['n']);

// detect version CMS
$l_CmsListDetector = new CmsVersionDetector('.');
$l_CmsDetectedNum = $l_CmsListDetector->getCmsNumber();
for ($tt = 0; $tt < $l_CmsDetectedNum; $tt++) {
    $g_CMS[] = $l_CmsListDetector->getCmsName($tt) . ' v' . $l_CmsListDetector->getCmsVersion($tt);
}

QCR_GoScan(0);

QCR_Debug();


////////////////////////////////////////////////////////////////////////////
 if ($BOOL_RESULT) {
  if ((count($g_CriticalPHP) > 0) OR (count($g_CriticalJS) > 0) OR (count($g_Base64) > 0) OR (count($g_SuspDir) > 0) OR  (count($g_Iframer) > 0) OR  (count($g_UnixExec) > 0))
  {
  echo "1\n";
  exit(0);
  }
 }
////////////////////////////////////////////////////////////////////////////

$l_Result .= "<div class=\"sec\"><b>" . AI_STR_051 . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : realpath('.')) . "</b></div>";

$time_tacked = seconds2Human(microtime(true) - START_TIME);

$l_Result .= sprintf(AI_STR_013, $g_TotalFolder, $g_TotalFiles);

if (!$defaults['scan_all_files']) {
	$l_Result .= AI_STR_014;
}

$l_Result .= AI_STR_015;

$l_ShowOffer = false;

stdOut("\nBuilding report\n");


////////////////////////////////////////////////////////////////////////////
// save 
if ((count($g_CriticalPHP) > 0) OR (count($g_CriticalJS) > 0) OR (count($g_Base64) > 0) OR (count($g_SuspDir) > 0) OR 
   (count($g_Iframer) > 0) OR  (count($g_UnixExec))) 
{

  if (!file_exists(DOUBLECHECK_FILE)) {
      if ($l_FH = fopen(DOUBLECHECK_FILE, 'w')) {
         fputs($l_FH, '<?php die("Forbidden"); ?>' . "\n");

         $l_CurrPath = dirname(__FILE__);

         for ($i = 0; $i < count($g_CriticalPHP); $i++) {
             fputs($l_FH, str_replace($l_CurrPath, '.', $g_Structure['n'][$g_CriticalPHP[$i]]) . "\n");
             //unlink(str_replace($l_CurrPath, '.', $g_Structure['n'][$g_CriticalPHP[$i]]));  
         }

         for ($i = 0; $i < count($g_Base64); $i++) {
             fputs($l_FH, str_replace($l_CurrPath, '.', $g_Structure['n'][$g_Base64[$i]]) . "\n");
             //unlink(str_replace($l_CurrPath, '.', $g_Structure['n'][$g_Base64[$i]]));
         }

         for ($i = 0; $i < count($g_CriticalJS); $i++) {
             fputs($l_FH, str_replace($l_CurrPath, '.', $g_Structure['n'][$g_CriticalJS[$i]]) . "\n");
             //unlink(str_replace($l_CurrPath, '.', $g_Structure['n'][$g_CriticalJS[$i]]));
         }

         for ($i = 0; $i < count($g_SuspDir); $i++) {
             fputs($l_FH, str_replace($l_CurrPath, '.', $g_Structure['n'][$g_SuspDir[$i]]) . "\n");
             //unlink(str_replace($l_CurrPath, '.', $g_Structure['n'][$g_SuspDir[$i]]));
         }

         for ($i = 0; $i < count($g_Iframer); $i++) {
             fputs($l_FH, str_replace($l_CurrPath, '.', $g_Structure['n'][$g_Iframer[$i]]) . "\n");
             //unlink(str_replace($l_CurrPath, '.', $g_Structure['n'][$g_Iframer[$i]]));
         }

         for ($i = 0; $i < count($g_UnixExec); $i++) {
             fputs($l_FH, str_replace($l_CurrPath, '.', $g_Structure['n'][$g_UnixExec[$i]]) . "\n");
             //unlink(str_replace($l_CurrPath, '.', $g_Structure['n'][$g_UnixExec[$i]]));
         }

         fclose($l_FH);
      } else {
         stdOut("Error! Cannot create " . DOUBLECHECK_FILE);
      }      
  } else {
      stdOut(DOUBLECHECK_FILE . ' already exists.');
      $l_Result .= '<div class="err">' . DOUBLECHECK_FILE . ' already exists.</div>';
  }
 
}

////////////////////////////////////////////////////////////////////////////

stdOut("Building list of shells " . count($g_CriticalPHP));

if (count($g_CriticalPHP) > 0) {
  $l_Result .= '<div class="vir"><b>' . AI_STR_016 . '</b> (' . count($g_CriticalPHP) . ')';
  $l_Result .= printList($g_CriticalPHP, $g_CriticalPHPFragment, true, $g_CriticalPHPSig, 'table_crit');
  $l_Result .= '</div>';

  $l_ShowOffer = true;
} else {
  $l_Result .= '<div class="ok"><b>' . AI_STR_017. '</b></div>';
}

stdOut("Building list of js " . count($g_CriticalJS));

if (count($g_CriticalJS) > 0) {
  $l_Result .= '<div class="vir"><b>' . AI_STR_018 . '</b> (' . count($g_CriticalJS) . ')';
  $l_Result .= printList($g_CriticalJS, $g_CriticalJSFragment, true, $g_CriticalJSSig, 'table_vir');
  $l_Result .= "</div>";

  $l_ShowOffer = true;
}

stdOut("Building list of unix executables " . count($g_UnixExec));

if (count($g_UnixExec) > 0) {
  $l_Result .= "<div class=\"vir\"><b>". AI_STR_019 ."</b> (" . count($g_UnixExec) . ')';
  $l_Result .= printList($g_UnixExec, '', true);
  $l_Result .= "</div>";

  $l_ShowOffer = true;
}

stdOut("Building list of base64s " . count($g_Base64));

if (count($g_Base64) > 0) {
  $l_ShowOffer = true;

  $l_Result .= "<div class=\"vir\"><b>" . AI_STR_020 ."</b> (" . count($g_Base64) . ')';
  $l_Result .= printList($g_Base64, $g_Base64Fragment, true);
  $l_Result .= "</div>";

}

stdOut("Building list of iframes " . count($g_Iframer));

if (count($g_Iframer) > 0) {
  $l_ShowOffer = true;

  $l_Result .= "<div class=\"vir\"><b>" . AI_STR_021 . "</b> (" . count($g_Iframer) . ')';
  $l_Result .= printList($g_Iframer, $g_IframerFragment, true);
  $l_Result .= "</div>";

}

stdOut("Building list of heuristics " . count($g_HeuristicDetected));

if (count($g_HeuristicDetected) > 0) {
  $l_Result .= '<div class="warn"><b>' . AI_STR_052 . '</b><ul>';
  for ($i = 0; $i < count($g_HeuristicDetected); $i++) {
	   $l_Result .= '<li>' . $g_Structure['n'][$g_HeuristicDetected[$i]] . ' (' . get_descr_heur($g_HeuristicType[$i]) . ')</li>';
  }
  
  $l_Result .= '</ul></div>';

  $l_ShowOffer = true;
}

stdOut("Building list of symlinks " . count($g_SymLinks));

if (count($g_SymLinks) > 0) {

  $l_Result .= "<div class=\"warn\"><b>" . AI_STR_022 . "</b> (" . count($g_SymLinks) .")<br>";
  $l_Result .= implode("<br>", $g_SymLinks);
  $l_Result .= "</div>";

}

stdOut("Building list of hidden files " . count($g_HiddenFiles));

if (count($g_HiddenFiles) > 0) {

  $l_Result .= "<div class=\"warn\"><b>" . AI_STR_023 . "</b> (" . count($g_HiddenFiles) . ")<br>";
  $l_Result .= implode("<br>", $g_HiddenFiles);
  $l_Result .= "</div>";

}


stdOut("Building list of susp dirs " . count($g_SuspDir));

if (count($g_SuspDir) > 0) {

  $l_Result .= "<div class=\"vir\"><b>" . AI_STR_024 . "</b><br>";
  $l_Result .= printList($g_SuspDir);
  $l_Result .= "</div>";

} else {

  $l_Result .= '<div class="ok"><b>' . AI_STR_025 . '</b></div>';

}
 

stdOut("Building list of redirects " . count($g_Redirect));

$l_Result .= "<div class=\"sec\">" . AI_STR_026 . "</div>";

if (count($g_Redirect) > 0) {

  $l_ShowOffer = true;
  $l_Result .= "<div class=\"warn\"><b>" . AI_STR_027 . "</b>";
  $l_Result .= printList($g_Redirect, $g_RedirectPHPFragment, true);
  $l_Result .= "</div>";

}

stdOut("Building list of php inj " . count($g_PHPCodeInside));

if ((count($g_PHPCodeInside) > 0) && (($defaults['report_mask'] & REPORT_MASK_PHPSIGN) == REPORT_MASK_PHPSIGN)) {

  $l_ShowOffer = true;
  $l_Result .= "<div class=\"warn\"><b>" . AI_STR_028 . "</b>";
  $l_Result .= printList($g_PHPCodeInside, $g_PHPCodeInsideFragment, true);
  $l_Result .= "</div>";

}

stdOut("Building list of adware " . count($g_AdwareList));

if (count($g_AdwareList) > 0) {
  $l_ShowOffer = true;

  $l_Result .= "<div class=\"warn\"><b>" . AI_STR_029 . "</b>";
  $l_Result .= printList($g_AdwareList, $g_AdwareListFragment, true);
  $l_Result .= "</div>";

}

stdOut("Building list of unread files " . count($g_NotRead));

if (count($g_NotRead) > 0) {

  $l_ShowOffer = true;
  $l_Result .= "<div class=\"warn\"><b>" . AI_STR_030 . ":</b>";
  $l_Result .= printList($g_NotRead);
  $l_Result .= "</div>";

}
stdOut("Building list of empty links " . count($g_EmptyLink));
if ((count($g_EmptyLink) > 0) && (($defaults['report_mask'] & REPORT_MASK_SPAMLINKS) == REPORT_MASK_SPAMLINKS)) {
  $l_ShowOffer = true;
  $l_Result .= "<div class=\"warn\"><b>" . AI_STR_031 . "</b>";
  $l_Result .= printList($g_EmptyLink, '', true);

  $l_Result .= AI_STR_032 . '<br/>';
  
  if (count($g_EmptyLink) == MAX_EXT_LINKS) {
      $l_Result .= '(' . AI_STR_033 . MAX_EXT_LINKS . ')<br/>';
    }
   
  for ($i = 0; $i < count($g_EmptyLink); $i++) {
	$l_Idx = $g_EmptyLink[$i];
    for ($j = 0; $j < count($g_EmptyLinkSrc[$l_Idx]); $j++) {
      $l_Result .= '<span class="details">' . $g_Structure['n'][$g_EmptyLink[$i]] . ' &rarr; ' . htmlspecialchars($g_EmptyLinkSrc[$l_Idx][$j]) . '</span><br/>';
	}
  }

  $l_Result .= "</div>";

}

stdOut("Building list of doorways " . count($g_Doorway));

if ((count($g_Doorway) > 0) && (($defaults['report_mask'] & REPORT_MASK_DOORWAYS) == REPORT_MASK_DOORWAYS)) {
  $l_ShowOffer = true;

  $l_Result .= "<div class=\"warn\"><b>" . AI_STR_034 . "</b>";
  $l_Result .= printList($g_Doorway);
  $l_Result .= "</div>";

}

stdOut("Building list of php warnings " . (count($g_WarningPHP[0]) + count($g_WarningPHP[1])));

if (($defaults['report_mask'] & REPORT_MASK_SUSP) == REPORT_MASK_SUSP) {
   if ((count($g_WarningPHP[0]) + count($g_WarningPHP[1])) > 0) {
     $l_ShowOffer = true;

     $l_Result .= "<div class=\"warn\"><b>" . AI_STR_035 . "</b>";

     for ($i = 0; $i < count($g_WarningPHP); $i++) {
         if (count($g_WarningPHP[$i]) > 0) 
            $l_Result .= printList($g_WarningPHP[$i], $g_WarningPHPFragment[$i], true, $g_WarningPHPSig, 'table_warn');
     }                                                                                                                    
     $l_Result .= "</div>";

   } 
}

stdOut("Building list of skipped dirs " . count($g_SkippedFolders));
if (count($g_SkippedFolders) > 0) {
     $l_Result .= "<div class=\"warn2\"><b>" . AI_STR_036 . "</b><br/>";
     $l_Result .= implode("<br>", $g_SkippedFolders);
     $l_Result .= "</div>";
 }

 stdOut("Building list of writeable dirs " . count($g_WritableDirectories));

if (count($g_CMS) > 0) {
     $l_Result .= "<div class=\"warn2\"><b>" . AI_STR_037 . "</b><br/>";
     $l_Result .= implode("<br>", $g_CMS);
     $l_Result .= "</div>";
}

if (!isCli()) {
   $l_Result .= QCR_ExtractInfo($l_PhpInfoBody[1]);
}

$max_size_to_scan = getBytes(MAX_SIZE_TO_SCAN);
$max_size_to_scan = $max_size_to_scan > 0 ? $max_size_to_scan : getBytes('1m');

stdOut("Building list of bigfiles " . count($g_BigFiles));

if (count($g_BigFiles) > 0) {

  $l_Result .= "<div class=\"warn2\"><b>" . sprintf(AI_STR_038, bytes2Human($max_size_to_scan)) . "</b>";
  $l_Result .= printList($g_BigFiles);
  $l_Result .= "</div>";

} else {
  if (SCAN_ALL_FILES) {
	$l_Result .= '<div class="ok"><b>' . sprintf(AI_STR_039, bytes2Human($max_size_to_scan)) . '</b></div>';
  }
}

stdOut("Building list of sensitive files " . count($g_UnsafeFilesFound) . "\n");

if ((count($g_UnsafeFilesFound) > 0) && (($defaults['report_mask'] & REPORT_MASK_CANDI) == REPORT_MASK_CANDI)) {
  $l_Result .= "<div class=\"warn2\"><b>" . AI_STR_040 . "</b>";
  $l_Result .= printList($g_UnsafeFilesFound);
  $l_Result .= "</div>";
}

if (!$defaults['no_rw_dir']) {
   if ((($defaults['report_mask'] & REPORT_MASK_WRIT) == REPORT_MASK_WRIT)) {
      if ((count($g_WritableDirectories) > 0)) {

        $l_Result .= "<div class=\"warn2\"><b>" . AI_STR_041 . "</b>";
        $l_Result .= printList($g_WritableDirectories);
        $l_Result .= "</div>";

      } else {

        $l_Result .= '<div class="ok"><b>' . AI_STR_042 . '</b></div>';

      }
   }
}

if (function_exists('memory_get_peak_usage')) {
  $l_Result .= AI_STR_043 . bytes2Human(memory_get_peak_usage()) . '<p>';
}

$l_Result .= AI_STR_044;

if (!SCAN_ALL_FILES) {
  $l_Result .= AI_STR_045;
}

$l_Result .= sprintf(AI_STR_012, count($g_DBShe) + count($gX_DBShe) + count($g_FlexDBShe), (count($g_SusDB) + count($g_AdwareSig ) + count($g_JSVirSig)), $time_tacked, date('d-m-Y в H:i:s', floor(START_TIME)) , date('d-m-Y в H:i:s'));

$l_Result .= '<div class="footer"><div class="disclaimer"><span class="vir">[!]</span> ' . AI_STR_049 . '</div>';
$l_Result .= '<div class="thanx">' . AI_STR_050 . '</div>';
$l_Result .= '</div>';

$l_OfferVK = AI_STR_048;
              
if ($l_ShowOffer) {
  $l_Result .= AI_STR_047 .
        '<p><a href="#" onclick="document.getElementById(\'ofr\').style.display=\'none\'" style="color: #303030">' . AI_STR_046 . '</a></p>' .
        '</div>';
} else {
  $l_Result .= '<div class="offer2" id="ofr2">' . $l_OfferVK .
        '<p><a href="#" onclick="document.getElementById(\'ofr2\').style.display=\'none\'" style="color: #303030">' . AI_STR_046 .'</a></p>' .
        '</div>';
}

$l_Result .=<<<ENDING
</body> 
<script language="javascript">

$(document).ready(function(){
    $('#table_crit').dataTable({
       "aLengthMenu": [[100 , 500, -1], [100, 500, "All"]],
       "aoColumns": [
                                     {"iDataSort": 7},
                                     {"iDataSort": 5},
                                     {"iDataSort": 6},
                                     {"bSortable": true},
                                     {"bSortable": true},
                                     {"bVisible": false},
                                     {"bVisible": false},
                                     {"bVisible": false}
                     ],
       "iDisplayLength": 500,
		"oLanguage": {
			"sLengthMenu": "Отображать по _MENU_ записей",
			"sZeroRecords": "Ничего не найдено",
			"sInfo": "Отображается c _START_ по _END_ из _TOTAL_ файлов",
			"sInfoEmpty": "Нет файлов",
			"sInfoFiltered": "(всего записей _MAX_)",
			"sSearch":       "Поиск:",
			"sUrl":          "",
			"oPaginate": {
				"sFirst": "Первая",
				"sPrevious": "Предыдущая",
				"sNext": "Следующая",
				"sLast": "Последняя"
			},
			"oAria": {
				"sSortAscending":  ": активировать для сортировки столбца по возрастанию",
				"sSortDescending": ": активировать для сортировки столбцов по убыванию"			
			}
		}

     } );

});

$(document).ready(function(){
    $('#table_vir').dataTable({
       "aLengthMenu": [[100 , 500, -1], [100, 500, "All"]],
       "aoColumns": [
                                     {"iDataSort": 7},
                                     {"iDataSort": 5},
                                     {"iDataSort": 6},
                                     {"bSortable": true},
                                     {"bSortable": true},
                                     {"bVisible": false},
                                     {"bVisible": false},
                                     {"bVisible": false}
                     ],
       "iDisplayLength": 500,
		"oLanguage": {
			"sLengthMenu": "Отображать по _MENU_ записей",
			"sZeroRecords": "Ничего не найдено",
			"sInfo": "Отображается c _START_ по _END_ из _TOTAL_ файлов",
			"sInfoEmpty": "Нет файлов",
			"sInfoFiltered": "(всего записей _MAX_)",
			"sSearch":       "Поиск:",
			"sUrl":          "",
			"oPaginate": {
				"sFirst": "Первая",
				"sPrevious": "Предыдущая",
				"sNext": "Следующая",
				"sLast": "Последняя"
			},
			"oAria": {
				"sSortAscending":  ": активировать для сортировки столбца по возрастанию",
				"sSortDescending": ": активировать для сортировки столбцов по убыванию"			
			}
		},

     } );

});


    $('#table_warn').dataTable({
       "aLengthMenu": [[100 , 500, -1], [100, 500, "All"]],
       "aoColumns": [
                                     {"iDataSort": 7},
                                     {"iDataSort": 5},
                                     {"iDataSort": 6},
                                     {"bSortable": true},
                                     {"bSortable": true},
                                     {"bVisible": false},
                                     {"bVisible": false},
                                     {"bVisible": false}
                     ],
       "iDisplayLength": 500,
		"oLanguage": {
			"sLengthMenu": "Отображать по _MENU_ записей",
			"sZeroRecords": "Ничего не найдено",
			"sInfo": "Отображается c _START_ по _END_ из _TOTAL_ файлов",
			"sInfoEmpty": "Нет файлов",
			"sInfoFiltered": "(всего записей _MAX_)",
			"sSearch":       "Поиск:",
			"sUrl":          "",
			"oPaginate": {
				"sFirst": "Первая",
				"sPrevious": "Предыдущая",
				"sNext": "Следующая",
				"sLast": "Последняя"
			},
			"oAria": {
				"sSortAscending":  ": активировать для сортировки столбца по возрастанию",
				"sSortDescending": ": активировать для сортировки столбцов по убыванию"			
			}
		}

     } );

</script>

</html>
ENDING;

////////////////////////////////////////////////////////////////////////////
if (!isCli())
{
	echo $l_Result;
	exit;
}

if (!defined('REPORT') OR REPORT === '')
{
	die('Report not written.');
}
 
$emails = getEmails(REPORT);

if (!$emails) {
	if ($l_FH = fopen($file, "w")) {
	   fputs($l_FH, $l_Result);
	   fclose($l_FH);
	   stdOut("\nReport written to '$file'.");
	} else {
		stdOut("\nCannot create '$file'.");
	}
}	else	{
		$headers = array(
			'MIME-Version: 1.0',
			'Content-type: text/html; charset=UTF-8',
			'From: ' . ($defaults['email_from'] ? $defaults['email_from'] : 'AI-Bolit@myhost')
		);

		for ($i = 0, $size = sizeof($emails); $i < $size; $i++)
		{
			mail($emails[$i], 'AI-Bolit Report ' . date("d/m/Y H:i", time()), $l_Result, implode("\r\n", $headers));
		}

		stdOut("\nReport sended to " . implode(', ', $emails));
}


$time_taken = microtime(true) - START_TIME;
$time_taken = number_format($time_taken, 5);

stdOut("Scanning complete! Time taken: " . seconds2Human($time_taken));

stdOut("\n\n!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
stdOut("Attention! DO NOT LEAVE either ai-bolit.php or AI-BOLIT-REPORT-<xxxx>-<yy>.html \nfile on server. COPY it locally then REMOVE from server. ");
stdOut("!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");

QCR_Debug();

?>
