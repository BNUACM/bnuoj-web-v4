<?php

// database informations
$globalConfig["database"]["driver"]                             =   "mysql";
$globalConfig["database"]["host"]                               =   "127.0.0.1";
$globalConfig["database"]["username"]                           =   "bnuojuser";
$globalConfig["database"]["password"]                           =   "bnuojpassword";
$globalConfig["database"]["table"]                              =   "bnuoj";

/**
 * Following keys can be accessed by Config::get() in Laravel
 * e.g Config::get('bnuoj.limits.status_per_page')
 *
 * Public config can be accessed by variable globalConfig in JS
 * e.g globalConfig.limits.status_per_page
 */

// limitations
$globalConfig["public"]["limits"]["status_per_page"]            =   20;
$globalConfig["public"]["limits"]["problems_per_page"]          =   25;
$globalConfig["public"]["limits"]["mails_per_page"]             =   20;
$globalConfig["public"]["limits"]["users_per_page"]             =   25;
$globalConfig["public"]["limits"]["contests_per_page"]          =   20;
$globalConfig["public"]["limits"]["discuss_per_page"]           =   30;

$globalConfig["public"]["limits"]["news_on_index"]              =   4;

$globalConfig["public"]["limits"]["problems_on_contest_add"]    =   15;
$globalConfig["public"]["limits"]["problems_on_contest_add_cf"] =   6;

$globalConfig["public"]["limits"]["users_on_problem_stat"]      =   25;

$globalConfig["public"]["limits"]["news_on_index_title_len"]    =   30;
$globalConfig["public"]["limits"]["news_on_index_content_len"]  =   200;

$globalConfig["public"]["limits"]["max_runid"]                  =   1000000;
$globalConfig["public"]["limits"]["max_status_username_len"]    =   20;

$globalConfig["public"]["limits"]["max_source_code_len"]        =   256000;
$globalConfig["public"]["limits"]["max_mail_len"]               =   256000;

$globalConfig["public"]["limits"]["max_rank_in_animation"]      =   16;

$globalConfig["public"]["limits"]["max_error_rejudge_times"]    =   3;

// contact strings ( no spaces )
$globalConfig["secret"]["contact"]["submit"]                    =   "yoursubmitstring";
$globalConfig["secret"]["contact"]["rejudge"]                   =   "yourrejudgestring";
$globalConfig["secret"]["contact"]["error_rejudge"]             =   "yourerrorjudgestring";
$globalConfig["secret"]["contact"]["challenge"]                 =   "yourchallengestring";
$globalConfig["secret"]["contact"]["pretest"]                   =   "yourpreteststring";
$globalConfig["secret"]["contact"]["test_all"]                  =   "yourtestallstring";

// contact port
$globalConfig["public"]["contact"]["server"]                    =   "127.0.0.1";
$globalConfig["public"]["contact"]["port"]                      =   5907;

// problems
$globalConfig["public"]["problem"]["category_tab_spaces"]       =   4;

// status
$globalConfig["public"]["status"]["refresh_rate"]               =   5000; //ms
$globalConfig["public"]["status"]["max_refresh_times"]          =   5;

// other
$globalConfig["public"]["misc"]["OJcode"]                       =   "BNU";
$globalConfig["public"]["misc"]["base_url"]                     =   "http://localhost/bnuoj/v3/";
$globalConfig["public"]["misc"]["server_timezone_offset"]       =   date('Z');
$globalConfig["public"]["misc"]["datetime_format"]              =   "YYYY-MM-DD HH:mm:ss";
$globalConfig["public"]["misc"]["cookie_prefix"]                =   "bnuoj_";

$globalConfig["secret"]["misc"]["base_path"]                    =   "/bnuoj/v3";
$globalConfig["secret"]["misc"]["base_local_path"]              =   "/var/www/bnuoj/v3/";
$globalConfig["secret"]["misc"]["salt_problem_in_contest"]      =   "[-,-]";
$globalConfig["secret"]["misc"]["use_latex_render"]             =   false;

// accounts
$globalConfig["secret"]["accounts"]["lightoj"]["username"]      =   "public@51isoft.com";
$globalConfig["secret"]["accounts"]["lightoj"]["password"]      =   "sjkaqwq5";

