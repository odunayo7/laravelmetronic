<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 34,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 35,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 36,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 37,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 38,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 39,
                'title' => 'asset_management_access',
            ],
            [
                'id'    => 40,
                'title' => 'asset_category_create',
            ],
            [
                'id'    => 41,
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => 42,
                'title' => 'asset_category_show',
            ],
            [
                'id'    => 43,
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => 44,
                'title' => 'asset_category_access',
            ],
            [
                'id'    => 45,
                'title' => 'asset_location_create',
            ],
            [
                'id'    => 46,
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => 47,
                'title' => 'asset_location_show',
            ],
            [
                'id'    => 48,
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => 49,
                'title' => 'asset_location_access',
            ],
            [
                'id'    => 50,
                'title' => 'asset_status_create',
            ],
            [
                'id'    => 51,
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => 52,
                'title' => 'asset_status_show',
            ],
            [
                'id'    => 53,
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => 54,
                'title' => 'asset_status_access',
            ],
            [
                'id'    => 55,
                'title' => 'asset_create',
            ],
            [
                'id'    => 56,
                'title' => 'asset_edit',
            ],
            [
                'id'    => 57,
                'title' => 'asset_show',
            ],
            [
                'id'    => 58,
                'title' => 'asset_delete',
            ],
            [
                'id'    => 59,
                'title' => 'asset_access',
            ],
            [
                'id'    => 60,
                'title' => 'assets_history_access',
            ],
            [
                'id'    => 61,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 62,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 63,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 64,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 65,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 66,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 67,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 68,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 69,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 70,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 71,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 72,
                'title' => 'task_create',
            ],
            [
                'id'    => 73,
                'title' => 'task_edit',
            ],
            [
                'id'    => 74,
                'title' => 'task_show',
            ],
            [
                'id'    => 75,
                'title' => 'task_delete',
            ],
            [
                'id'    => 76,
                'title' => 'task_access',
            ],
            [
                'id'    => 77,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 78,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 79,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 80,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 81,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 82,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 83,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 84,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 85,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 86,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 87,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 88,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 89,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 90,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 91,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 92,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 93,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 94,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 95,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 96,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 97,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 98,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 99,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 100,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 101,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 102,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 103,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 104,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 105,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 106,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 107,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 108,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 109,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 110,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 111,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 112,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 113,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 114,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 115,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 116,
                'title' => 'expense_create',
            ],
            [
                'id'    => 117,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 118,
                'title' => 'expense_show',
            ],
            [
                'id'    => 119,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 120,
                'title' => 'expense_access',
            ],
            [
                'id'    => 121,
                'title' => 'income_create',
            ],
            [
                'id'    => 122,
                'title' => 'income_edit',
            ],
            [
                'id'    => 123,
                'title' => 'income_show',
            ],
            [
                'id'    => 124,
                'title' => 'income_delete',
            ],
            [
                'id'    => 125,
                'title' => 'income_access',
            ],
            [
                'id'    => 126,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 127,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 128,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 129,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 130,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 131,
                'title' => 'client_management_setting_access',
            ],
            [
                'id'    => 132,
                'title' => 'currency_create',
            ],
            [
                'id'    => 133,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 134,
                'title' => 'currency_show',
            ],
            [
                'id'    => 135,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 136,
                'title' => 'currency_access',
            ],
            [
                'id'    => 137,
                'title' => 'transaction_type_create',
            ],
            [
                'id'    => 138,
                'title' => 'transaction_type_edit',
            ],
            [
                'id'    => 139,
                'title' => 'transaction_type_show',
            ],
            [
                'id'    => 140,
                'title' => 'transaction_type_delete',
            ],
            [
                'id'    => 141,
                'title' => 'transaction_type_access',
            ],
            [
                'id'    => 142,
                'title' => 'income_source_create',
            ],
            [
                'id'    => 143,
                'title' => 'income_source_edit',
            ],
            [
                'id'    => 144,
                'title' => 'income_source_show',
            ],
            [
                'id'    => 145,
                'title' => 'income_source_delete',
            ],
            [
                'id'    => 146,
                'title' => 'income_source_access',
            ],
            [
                'id'    => 147,
                'title' => 'client_status_create',
            ],
            [
                'id'    => 148,
                'title' => 'client_status_edit',
            ],
            [
                'id'    => 149,
                'title' => 'client_status_show',
            ],
            [
                'id'    => 150,
                'title' => 'client_status_delete',
            ],
            [
                'id'    => 151,
                'title' => 'client_status_access',
            ],
            [
                'id'    => 152,
                'title' => 'project_status_create',
            ],
            [
                'id'    => 153,
                'title' => 'project_status_edit',
            ],
            [
                'id'    => 154,
                'title' => 'project_status_show',
            ],
            [
                'id'    => 155,
                'title' => 'project_status_delete',
            ],
            [
                'id'    => 156,
                'title' => 'project_status_access',
            ],
            [
                'id'    => 157,
                'title' => 'client_management_access',
            ],
            [
                'id'    => 158,
                'title' => 'client_create',
            ],
            [
                'id'    => 159,
                'title' => 'client_edit',
            ],
            [
                'id'    => 160,
                'title' => 'client_show',
            ],
            [
                'id'    => 161,
                'title' => 'client_delete',
            ],
            [
                'id'    => 162,
                'title' => 'client_access',
            ],
            [
                'id'    => 163,
                'title' => 'project_create',
            ],
            [
                'id'    => 164,
                'title' => 'project_edit',
            ],
            [
                'id'    => 165,
                'title' => 'project_show',
            ],
            [
                'id'    => 166,
                'title' => 'project_delete',
            ],
            [
                'id'    => 167,
                'title' => 'project_access',
            ],
            [
                'id'    => 168,
                'title' => 'note_create',
            ],
            [
                'id'    => 169,
                'title' => 'note_edit',
            ],
            [
                'id'    => 170,
                'title' => 'note_show',
            ],
            [
                'id'    => 171,
                'title' => 'note_delete',
            ],
            [
                'id'    => 172,
                'title' => 'note_access',
            ],
            [
                'id'    => 173,
                'title' => 'document_create',
            ],
            [
                'id'    => 174,
                'title' => 'document_edit',
            ],
            [
                'id'    => 175,
                'title' => 'document_show',
            ],
            [
                'id'    => 176,
                'title' => 'document_delete',
            ],
            [
                'id'    => 177,
                'title' => 'document_access',
            ],
            [
                'id'    => 178,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 179,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 180,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 181,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 182,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 183,
                'title' => 'client_report_create',
            ],
            [
                'id'    => 184,
                'title' => 'client_report_edit',
            ],
            [
                'id'    => 185,
                'title' => 'client_report_show',
            ],
            [
                'id'    => 186,
                'title' => 'client_report_delete',
            ],
            [
                'id'    => 187,
                'title' => 'client_report_access',
            ],
            [
                'id'    => 188,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 189,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 190,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 191,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 192,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 193,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 194,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 195,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 196,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 197,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 198,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 199,
                'title' => 'time_management_access',
            ],
            [
                'id'    => 200,
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => 201,
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => 202,
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => 203,
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => 204,
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => 205,
                'title' => 'time_project_create',
            ],
            [
                'id'    => 206,
                'title' => 'time_project_edit',
            ],
            [
                'id'    => 207,
                'title' => 'time_project_show',
            ],
            [
                'id'    => 208,
                'title' => 'time_project_delete',
            ],
            [
                'id'    => 209,
                'title' => 'time_project_access',
            ],
            [
                'id'    => 210,
                'title' => 'time_entry_create',
            ],
            [
                'id'    => 211,
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => 212,
                'title' => 'time_entry_show',
            ],
            [
                'id'    => 213,
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => 214,
                'title' => 'time_entry_access',
            ],
            [
                'id'    => 215,
                'title' => 'time_report_create',
            ],
            [
                'id'    => 216,
                'title' => 'time_report_edit',
            ],
            [
                'id'    => 217,
                'title' => 'time_report_show',
            ],
            [
                'id'    => 218,
                'title' => 'time_report_delete',
            ],
            [
                'id'    => 219,
                'title' => 'time_report_access',
            ],
            [
                'id'    => 220,
                'title' => 'course_create',
            ],
            [
                'id'    => 221,
                'title' => 'course_edit',
            ],
            [
                'id'    => 222,
                'title' => 'course_show',
            ],
            [
                'id'    => 223,
                'title' => 'course_delete',
            ],
            [
                'id'    => 224,
                'title' => 'course_access',
            ],
            [
                'id'    => 225,
                'title' => 'lesson_create',
            ],
            [
                'id'    => 226,
                'title' => 'lesson_edit',
            ],
            [
                'id'    => 227,
                'title' => 'lesson_show',
            ],
            [
                'id'    => 228,
                'title' => 'lesson_delete',
            ],
            [
                'id'    => 229,
                'title' => 'lesson_access',
            ],
            [
                'id'    => 230,
                'title' => 'test_create',
            ],
            [
                'id'    => 231,
                'title' => 'test_edit',
            ],
            [
                'id'    => 232,
                'title' => 'test_show',
            ],
            [
                'id'    => 233,
                'title' => 'test_delete',
            ],
            [
                'id'    => 234,
                'title' => 'test_access',
            ],
            [
                'id'    => 235,
                'title' => 'question_create',
            ],
            [
                'id'    => 236,
                'title' => 'question_edit',
            ],
            [
                'id'    => 237,
                'title' => 'question_show',
            ],
            [
                'id'    => 238,
                'title' => 'question_delete',
            ],
            [
                'id'    => 239,
                'title' => 'question_access',
            ],
            [
                'id'    => 240,
                'title' => 'question_option_create',
            ],
            [
                'id'    => 241,
                'title' => 'question_option_edit',
            ],
            [
                'id'    => 242,
                'title' => 'question_option_show',
            ],
            [
                'id'    => 243,
                'title' => 'question_option_delete',
            ],
            [
                'id'    => 244,
                'title' => 'question_option_access',
            ],
            [
                'id'    => 245,
                'title' => 'test_result_create',
            ],
            [
                'id'    => 246,
                'title' => 'test_result_edit',
            ],
            [
                'id'    => 247,
                'title' => 'test_result_show',
            ],
            [
                'id'    => 248,
                'title' => 'test_result_delete',
            ],
            [
                'id'    => 249,
                'title' => 'test_result_access',
            ],
            [
                'id'    => 250,
                'title' => 'test_answer_create',
            ],
            [
                'id'    => 251,
                'title' => 'test_answer_edit',
            ],
            [
                'id'    => 252,
                'title' => 'test_answer_show',
            ],
            [
                'id'    => 253,
                'title' => 'test_answer_delete',
            ],
            [
                'id'    => 254,
                'title' => 'test_answer_access',
            ],
            [
                'id'    => 255,
                'title' => 'team_create',
            ],
            [
                'id'    => 256,
                'title' => 'team_edit',
            ],
            [
                'id'    => 257,
                'title' => 'team_show',
            ],
            [
                'id'    => 258,
                'title' => 'team_delete',
            ],
            [
                'id'    => 259,
                'title' => 'team_access',
            ],
            [
                'id'    => 260,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 261,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 262,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 263,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 264,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 265,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 266,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 267,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 268,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 269,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 270,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 271,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 272,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 273,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 274,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 275,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 276,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 277,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 278,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 279,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 280,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 281,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
