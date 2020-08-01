<?php
return [


	/**
	 * تعليقات المعلمين اليومية على الطلاب خلال الحصه الدراسية او عند التحظير للطالب
	 */
	'semesters' => [
			'id' ,
			'name' ,
			'school_id' ,
			'created_at' ,
			'updated_at' ,
	],


	/**
	 * تعليقات المعلمين اليومية على الطلاب خلال الحصه الدراسية او عند التحظير للطالب
	 */
	'subjctes'	=>	[
		'id' ,
		'name' ,
		'code' ,
		'description' ,
		'school_id' ,
		'level_id' ,
		'teacher_id' ,
		'created_at' ,
		'updated_at' ,
	],


	/**
	 * تعليقات المعلمين اليومية على الطلاب خلال الحصه الدراسية او عند التحظير للطالب
	 */
	'student_attendances' => [
			'id' ,
			'attendance' ,
			'datetime' ,
			'student_register_id' ,
			'teacher_id' ,
			'student_report_id' ,
			'created_at' ,
			'updated_at',
	],


	/**
	 * تعليقات المعلمين اليومية على الطلاب خلال الحصه الدراسية او عند التحظير للطالب
	 */
	'student_reports' => [
			'id' ,
			'autocomment' ,
			'comment' ,
			'status' ,
			'show_comment_at' ,
			'created_at' ,
	],


	/**
	 * تعليقات المعلمين اليومية على الطلاب خلال الحصه الدراسية او عند التحظير للطالب
	 */
	'student_registers' => [
			'id' ,
			'code' ,
			'no' ,
			'status' ,
			'name' ,
			'img' ,
			'school_year' ,
			'student_id' ,
			'pareent_id' ,
			'school_id' ,
			'level_id' ,
			'classroom_id' ,
			'schooladmin_id' ,
			'created_at' ,
			'updated_at' ,
	],


	/**
	 * تعليقات المعلمين اليومية على الطلاب خلال الحصه الدراسية او عند التحظير للطالب
	 */
	'daily_lessons' => [
			'id' ,
			'title' ,
			'homework' ,
			'lesson_id' ,
			'subjcte_id' ,
			'classroom_id' ,
			'created_at' ,
			'updated_at' ,
	],


	/**
	 * تعليقات المعلمين اليومية على الطلاب خلال الحصه الدراسية او عند التحظير للطالب
	 */
	'teacher_commends' => [
			'id' ,
			'comment' ,
			'tag' ,
			'vote' ,
			'teacher_id' ,
			'created_at' ,
			'updated_at' ,
	],


	/**
	 * تعليقات المعلمين اليومية على الطلاب خلال الحصه الدراسية او عند التحظير للطالب
	 */


];
