

CREATE TABLE `exams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_qs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'closed',
  `del` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `exam_subs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `exam_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `que_seq` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ans_seq` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stop_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cur_que` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `que_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `del` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO exams (`id`, `user_id`, `staff_id`, `course_id`, `department_id`, `exam_title`, `exam_type`, `no_of_qs`, `duration`, `status`, `del`, `created_at`, `updated_at`) VALUES 
('1','24','4','5','5','Python Coding','Class Test','3','30','open','no','2021-12-20 17:34:37','2022-01-05 00:27:01');

INSERT INTO exams (`id`, `user_id`, `staff_id`, `course_id`, `department_id`, `exam_title`, `exam_type`, `no_of_qs`, `duration`, `status`, `del`, `created_at`, `updated_at`) VALUES 
('2','24','4','8','5','Cyber Law Test 1','Assignment','40','30','closed','no','2021-12-20 18:06:31','2022-01-05 00:34:27');

INSERT INTO exams (`id`, `user_id`, `staff_id`, `course_id`, `department_id`, `exam_title`, `exam_type`, `no_of_qs`, `duration`, `status`, `del`, `created_at`, `updated_at`) VALUES 
('3','24','4','3','5','Prog. Assignment 1','Assignment','5','120','closed','no','2022-01-04 01:31:03','2022-01-05 00:34:24');

INSERT INTO exams (`id`, `user_id`, `staff_id`, `course_id`, `department_id`, `exam_title`, `exam_type`, `no_of_qs`, `duration`, `status`, `del`, `created_at`, `updated_at`) VALUES 
('4','24','4','3','5','Prog. Assignment 2','Assignment','7','90','closed','no','2022-01-04 01:43:31','2022-01-05 00:34:22');

INSERT INTO exams (`id`, `user_id`, `staff_id`, `course_id`, `department_id`, `exam_title`, `exam_type`, `no_of_qs`, `duration`, `status`, `del`, `created_at`, `updated_at`) VALUES 
('6','24','4','8','5','Cyber Law Mid - Sem. Exam','Mid - Semester Examination','57','120','closed','no','2022-01-05 01:00:28','2022-01-08 22:23:43');

INSERT INTO exam_subs (`id`, `exam_id`, `student_id`, `que_seq`, `ans_seq`, `start_time`, `stop_time`, `cur_que`, `que_count`, `score`, `status`, `other`, `del`, `created_at`, `updated_at`) VALUES 
('1','1','1','3,1,2,','A,B,True,','11:49','','2','3','3','closed','','no','2022-01-04 11:49:23','2022-01-08 22:42:33');

INSERT INTO exam_subs (`id`, `exam_id`, `student_id`, `que_seq`, `ans_seq`, `start_time`, `stop_time`, `cur_que`, `que_count`, `score`, `status`, `other`, `del`, `created_at`, `updated_at`) VALUES 
('2','2','1','20,16,7,30,23,27,4,25,8,3,32,24,2,13,35,18,6,14,12,37,31,9,17,28,38,1,22,5,11,33,26,21,15,39,40,34,10,29,19,36,','','11:54','','20','0','','open','','no','2022-01-04 11:54:56','2022-01-04 11:54:56');

INSERT INTO exam_subs (`id`, `exam_id`, `student_id`, `que_seq`, `ans_seq`, `start_time`, `stop_time`, `cur_que`, `que_count`, `score`, `status`, `other`, `del`, `created_at`, `updated_at`) VALUES 
('3','3','1','10,4,7,2,1,8,6,9,3,5,','','11:55','','10','0','','open','','no','2022-01-04 11:55:00','2022-01-04 11:55:00');

INSERT INTO exam_subs (`id`, `exam_id`, `student_id`, `que_seq`, `ans_seq`, `start_time`, `stop_time`, `cur_que`, `que_count`, `score`, `status`, `other`, `del`, `created_at`, `updated_at`) VALUES 
('4','1','1','2,1,3,','','','','','','','open','','no','2022-01-05 12:11:58','2022-01-05 12:11:58');
