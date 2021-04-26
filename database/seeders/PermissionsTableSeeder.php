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
                'title' => 'asset_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'asset_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'asset_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'asset_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'asset_location_create',
            ],
            [
                'id'    => 24,
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => 25,
                'title' => 'asset_location_show',
            ],
            [
                'id'    => 26,
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => 27,
                'title' => 'asset_location_access',
            ],
            [
                'id'    => 28,
                'title' => 'asset_status_create',
            ],
            [
                'id'    => 29,
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => 30,
                'title' => 'asset_status_show',
            ],
            [
                'id'    => 31,
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => 32,
                'title' => 'asset_status_access',
            ],
            [
                'id'    => 33,
                'title' => 'asset_create',
            ],
            [
                'id'    => 34,
                'title' => 'asset_edit',
            ],
            [
                'id'    => 35,
                'title' => 'asset_show',
            ],
            [
                'id'    => 36,
                'title' => 'asset_delete',
            ],
            [
                'id'    => 37,
                'title' => 'asset_access',
            ],
            [
                'id'    => 38,
                'title' => 'assets_history_access',
            ],
            [
                'id'    => 39,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 40,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 41,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 42,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 43,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 44,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 45,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 46,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 47,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 48,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 49,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 50,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 51,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 52,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 53,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 54,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 55,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 56,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 57,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 58,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 59,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 60,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 61,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 62,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 63,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 64,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 65,
                'title' => 'expense_create',
            ],
            [
                'id'    => 66,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 67,
                'title' => 'expense_show',
            ],
            [
                'id'    => 68,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 69,
                'title' => 'expense_access',
            ],
            [
                'id'    => 70,
                'title' => 'income_create',
            ],
            [
                'id'    => 71,
                'title' => 'income_edit',
            ],
            [
                'id'    => 72,
                'title' => 'income_show',
            ],
            [
                'id'    => 73,
                'title' => 'income_delete',
            ],
            [
                'id'    => 74,
                'title' => 'income_access',
            ],
            [
                'id'    => 75,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 76,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 77,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 78,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 79,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 80,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 81,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 82,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 83,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 84,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 85,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 86,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 87,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 88,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 89,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 90,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 91,
                'title' => 'task_create',
            ],
            [
                'id'    => 92,
                'title' => 'task_edit',
            ],
            [
                'id'    => 93,
                'title' => 'task_show',
            ],
            [
                'id'    => 94,
                'title' => 'task_delete',
            ],
            [
                'id'    => 95,
                'title' => 'task_access',
            ],
            [
                'id'    => 96,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 97,
                'title' => 'community_information_create',
            ],
            [
                'id'    => 98,
                'title' => 'community_information_edit',
            ],
            [
                'id'    => 99,
                'title' => 'community_information_show',
            ],
            [
                'id'    => 100,
                'title' => 'community_information_delete',
            ],
            [
                'id'    => 101,
                'title' => 'community_information_access',
            ],
            [
                'id'    => 102,
                'title' => 'team_create',
            ],
            [
                'id'    => 103,
                'title' => 'team_edit',
            ],
            [
                'id'    => 104,
                'title' => 'team_show',
            ],
            [
                'id'    => 105,
                'title' => 'team_delete',
            ],
            [
                'id'    => 106,
                'title' => 'team_access',
            ],
            [
                'id'    => 107,
                'title' => 'builder_information_create',
            ],
            [
                'id'    => 108,
                'title' => 'builder_information_edit',
            ],
            [
                'id'    => 109,
                'title' => 'builder_information_show',
            ],
            [
                'id'    => 110,
                'title' => 'builder_information_delete',
            ],
            [
                'id'    => 111,
                'title' => 'builder_information_access',
            ],
            [
                'id'    => 112,
                'title' => 'community_mangement_access',
            ],
            [
                'id'    => 113,
                'title' => 'community_rule_create',
            ],
            [
                'id'    => 114,
                'title' => 'community_rule_edit',
            ],
            [
                'id'    => 115,
                'title' => 'community_rule_show',
            ],
            [
                'id'    => 116,
                'title' => 'community_rule_delete',
            ],
            [
                'id'    => 117,
                'title' => 'community_rule_access',
            ],
            [
                'id'    => 118,
                'title' => 'community_admin_create',
            ],
            [
                'id'    => 119,
                'title' => 'community_admin_edit',
            ],
            [
                'id'    => 120,
                'title' => 'community_admin_show',
            ],
            [
                'id'    => 121,
                'title' => 'community_admin_delete',
            ],
            [
                'id'    => 122,
                'title' => 'community_admin_access',
            ],
            [
                'id'    => 123,
                'title' => 'floor_information_access',
            ],
            [
                'id'    => 124,
                'title' => 'block_create',
            ],
            [
                'id'    => 125,
                'title' => 'block_edit',
            ],
            [
                'id'    => 126,
                'title' => 'block_show',
            ],
            [
                'id'    => 127,
                'title' => 'block_delete',
            ],
            [
                'id'    => 128,
                'title' => 'block_access',
            ],
            [
                'id'    => 129,
                'title' => 'floor_create',
            ],
            [
                'id'    => 130,
                'title' => 'floor_edit',
            ],
            [
                'id'    => 131,
                'title' => 'floor_show',
            ],
            [
                'id'    => 132,
                'title' => 'floor_delete',
            ],
            [
                'id'    => 133,
                'title' => 'floor_access',
            ],
            [
                'id'    => 134,
                'title' => 'unit_create',
            ],
            [
                'id'    => 135,
                'title' => 'unit_edit',
            ],
            [
                'id'    => 136,
                'title' => 'unit_show',
            ],
            [
                'id'    => 137,
                'title' => 'unit_delete',
            ],
            [
                'id'    => 138,
                'title' => 'unit_access',
            ],
            [
                'id'    => 139,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 140,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 141,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 142,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 143,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 144,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 145,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 146,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 147,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 148,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 149,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 150,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 151,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 152,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 153,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 154,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 155,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 156,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 157,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 158,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 159,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 160,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 161,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 162,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 163,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 164,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 165,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 166,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 167,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 168,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 169,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 170,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 171,
                'title' => 'product_create',
            ],
            [
                'id'    => 172,
                'title' => 'product_edit',
            ],
            [
                'id'    => 173,
                'title' => 'product_show',
            ],
            [
                'id'    => 174,
                'title' => 'product_delete',
            ],
            [
                'id'    => 175,
                'title' => 'product_access',
            ],
            [
                'id'    => 176,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 177,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 178,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 179,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 180,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 181,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 182,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 183,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 184,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 185,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 186,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 187,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 188,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 189,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 190,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 191,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 192,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 193,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 194,
                'title' => 'client_management_setting_access',
            ],
            [
                'id'    => 195,
                'title' => 'currency_create',
            ],
            [
                'id'    => 196,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 197,
                'title' => 'currency_show',
            ],
            [
                'id'    => 198,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 199,
                'title' => 'currency_access',
            ],
            [
                'id'    => 200,
                'title' => 'transaction_type_create',
            ],
            [
                'id'    => 201,
                'title' => 'transaction_type_edit',
            ],
            [
                'id'    => 202,
                'title' => 'transaction_type_show',
            ],
            [
                'id'    => 203,
                'title' => 'transaction_type_delete',
            ],
            [
                'id'    => 204,
                'title' => 'transaction_type_access',
            ],
            [
                'id'    => 205,
                'title' => 'income_source_create',
            ],
            [
                'id'    => 206,
                'title' => 'income_source_edit',
            ],
            [
                'id'    => 207,
                'title' => 'income_source_show',
            ],
            [
                'id'    => 208,
                'title' => 'income_source_delete',
            ],
            [
                'id'    => 209,
                'title' => 'income_source_access',
            ],
            [
                'id'    => 210,
                'title' => 'client_status_create',
            ],
            [
                'id'    => 211,
                'title' => 'client_status_edit',
            ],
            [
                'id'    => 212,
                'title' => 'client_status_show',
            ],
            [
                'id'    => 213,
                'title' => 'client_status_delete',
            ],
            [
                'id'    => 214,
                'title' => 'client_status_access',
            ],
            [
                'id'    => 215,
                'title' => 'project_status_create',
            ],
            [
                'id'    => 216,
                'title' => 'project_status_edit',
            ],
            [
                'id'    => 217,
                'title' => 'project_status_show',
            ],
            [
                'id'    => 218,
                'title' => 'project_status_delete',
            ],
            [
                'id'    => 219,
                'title' => 'project_status_access',
            ],
            [
                'id'    => 220,
                'title' => 'client_management_access',
            ],
            [
                'id'    => 221,
                'title' => 'client_create',
            ],
            [
                'id'    => 222,
                'title' => 'client_edit',
            ],
            [
                'id'    => 223,
                'title' => 'client_show',
            ],
            [
                'id'    => 224,
                'title' => 'client_delete',
            ],
            [
                'id'    => 225,
                'title' => 'client_access',
            ],
            [
                'id'    => 226,
                'title' => 'project_create',
            ],
            [
                'id'    => 227,
                'title' => 'project_edit',
            ],
            [
                'id'    => 228,
                'title' => 'project_show',
            ],
            [
                'id'    => 229,
                'title' => 'project_delete',
            ],
            [
                'id'    => 230,
                'title' => 'project_access',
            ],
            [
                'id'    => 231,
                'title' => 'note_create',
            ],
            [
                'id'    => 232,
                'title' => 'note_edit',
            ],
            [
                'id'    => 233,
                'title' => 'note_show',
            ],
            [
                'id'    => 234,
                'title' => 'note_delete',
            ],
            [
                'id'    => 235,
                'title' => 'note_access',
            ],
            [
                'id'    => 236,
                'title' => 'document_create',
            ],
            [
                'id'    => 237,
                'title' => 'document_edit',
            ],
            [
                'id'    => 238,
                'title' => 'document_show',
            ],
            [
                'id'    => 239,
                'title' => 'document_delete',
            ],
            [
                'id'    => 240,
                'title' => 'document_access',
            ],
            [
                'id'    => 241,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 242,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 243,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 244,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 245,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 246,
                'title' => 'client_report_create',
            ],
            [
                'id'    => 247,
                'title' => 'client_report_edit',
            ],
            [
                'id'    => 248,
                'title' => 'client_report_show',
            ],
            [
                'id'    => 249,
                'title' => 'client_report_delete',
            ],
            [
                'id'    => 250,
                'title' => 'client_report_access',
            ],
            [
                'id'    => 251,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 252,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 253,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 254,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 255,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 256,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 257,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 258,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 259,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 260,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 261,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 262,
                'title' => 'time_management_access',
            ],
            [
                'id'    => 263,
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => 264,
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => 265,
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => 266,
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => 267,
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => 268,
                'title' => 'time_project_create',
            ],
            [
                'id'    => 269,
                'title' => 'time_project_edit',
            ],
            [
                'id'    => 270,
                'title' => 'time_project_show',
            ],
            [
                'id'    => 271,
                'title' => 'time_project_delete',
            ],
            [
                'id'    => 272,
                'title' => 'time_project_access',
            ],
            [
                'id'    => 273,
                'title' => 'time_entry_create',
            ],
            [
                'id'    => 274,
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => 275,
                'title' => 'time_entry_show',
            ],
            [
                'id'    => 276,
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => 277,
                'title' => 'time_entry_access',
            ],
            [
                'id'    => 278,
                'title' => 'time_report_create',
            ],
            [
                'id'    => 279,
                'title' => 'time_report_edit',
            ],
            [
                'id'    => 280,
                'title' => 'time_report_show',
            ],
            [
                'id'    => 281,
                'title' => 'time_report_delete',
            ],
            [
                'id'    => 282,
                'title' => 'time_report_access',
            ],
            [
                'id'    => 283,
                'title' => 'course_create',
            ],
            [
                'id'    => 284,
                'title' => 'course_edit',
            ],
            [
                'id'    => 285,
                'title' => 'course_show',
            ],
            [
                'id'    => 286,
                'title' => 'course_delete',
            ],
            [
                'id'    => 287,
                'title' => 'course_access',
            ],
            [
                'id'    => 288,
                'title' => 'lesson_create',
            ],
            [
                'id'    => 289,
                'title' => 'lesson_edit',
            ],
            [
                'id'    => 290,
                'title' => 'lesson_show',
            ],
            [
                'id'    => 291,
                'title' => 'lesson_delete',
            ],
            [
                'id'    => 292,
                'title' => 'lesson_access',
            ],
            [
                'id'    => 293,
                'title' => 'test_create',
            ],
            [
                'id'    => 294,
                'title' => 'test_edit',
            ],
            [
                'id'    => 295,
                'title' => 'test_show',
            ],
            [
                'id'    => 296,
                'title' => 'test_delete',
            ],
            [
                'id'    => 297,
                'title' => 'test_access',
            ],
            [
                'id'    => 298,
                'title' => 'question_create',
            ],
            [
                'id'    => 299,
                'title' => 'question_edit',
            ],
            [
                'id'    => 300,
                'title' => 'question_show',
            ],
            [
                'id'    => 301,
                'title' => 'question_delete',
            ],
            [
                'id'    => 302,
                'title' => 'question_access',
            ],
            [
                'id'    => 303,
                'title' => 'question_option_create',
            ],
            [
                'id'    => 304,
                'title' => 'question_option_edit',
            ],
            [
                'id'    => 305,
                'title' => 'question_option_show',
            ],
            [
                'id'    => 306,
                'title' => 'question_option_delete',
            ],
            [
                'id'    => 307,
                'title' => 'question_option_access',
            ],
            [
                'id'    => 308,
                'title' => 'test_result_create',
            ],
            [
                'id'    => 309,
                'title' => 'test_result_edit',
            ],
            [
                'id'    => 310,
                'title' => 'test_result_show',
            ],
            [
                'id'    => 311,
                'title' => 'test_result_delete',
            ],
            [
                'id'    => 312,
                'title' => 'test_result_access',
            ],
            [
                'id'    => 313,
                'title' => 'test_answer_create',
            ],
            [
                'id'    => 314,
                'title' => 'test_answer_edit',
            ],
            [
                'id'    => 315,
                'title' => 'test_answer_show',
            ],
            [
                'id'    => 316,
                'title' => 'test_answer_delete',
            ],
            [
                'id'    => 317,
                'title' => 'test_answer_access',
            ],
            [
                'id'    => 318,
                'title' => 'management_committee_create',
            ],
            [
                'id'    => 319,
                'title' => 'management_committee_edit',
            ],
            [
                'id'    => 320,
                'title' => 'management_committee_show',
            ],
            [
                'id'    => 321,
                'title' => 'management_committee_delete',
            ],
            [
                'id'    => 322,
                'title' => 'management_committee_access',
            ],
            [
                'id'    => 323,
                'title' => 'help_desk_create',
            ],
            [
                'id'    => 324,
                'title' => 'help_desk_edit',
            ],
            [
                'id'    => 325,
                'title' => 'help_desk_show',
            ],
            [
                'id'    => 326,
                'title' => 'help_desk_delete',
            ],
            [
                'id'    => 327,
                'title' => 'help_desk_access',
            ],
            [
                'id'    => 328,
                'title' => 'meeting_create',
            ],
            [
                'id'    => 329,
                'title' => 'meeting_edit',
            ],
            [
                'id'    => 330,
                'title' => 'meeting_show',
            ],
            [
                'id'    => 331,
                'title' => 'meeting_delete',
            ],
            [
                'id'    => 332,
                'title' => 'meeting_access',
            ],
            [
                'id'    => 333,
                'title' => 'notice_board_create',
            ],
            [
                'id'    => 334,
                'title' => 'notice_board_edit',
            ],
            [
                'id'    => 335,
                'title' => 'notice_board_show',
            ],
            [
                'id'    => 336,
                'title' => 'notice_board_delete',
            ],
            [
                'id'    => 337,
                'title' => 'notice_board_access',
            ],
            [
                'id'    => 338,
                'title' => 'visitor_mangement_access',
            ],
            [
                'id'    => 339,
                'title' => 'help_desk_management_access',
            ],
            [
                'id'    => 340,
                'title' => 'setting_access',
            ],
            [
                'id'    => 341,
                'title' => 'designation_create',
            ],
            [
                'id'    => 342,
                'title' => 'designation_edit',
            ],
            [
                'id'    => 343,
                'title' => 'designation_show',
            ],
            [
                'id'    => 344,
                'title' => 'designation_delete',
            ],
            [
                'id'    => 345,
                'title' => 'designation_access',
            ],
            [
                'id'    => 346,
                'title' => 'enquiry_category_create',
            ],
            [
                'id'    => 347,
                'title' => 'enquiry_category_edit',
            ],
            [
                'id'    => 348,
                'title' => 'enquiry_category_show',
            ],
            [
                'id'    => 349,
                'title' => 'enquiry_category_delete',
            ],
            [
                'id'    => 350,
                'title' => 'enquiry_category_access',
            ],
            [
                'id'    => 351,
                'title' => 'defect_category_create',
            ],
            [
                'id'    => 352,
                'title' => 'defect_category_edit',
            ],
            [
                'id'    => 353,
                'title' => 'defect_category_show',
            ],
            [
                'id'    => 354,
                'title' => 'defect_category_delete',
            ],
            [
                'id'    => 355,
                'title' => 'defect_category_access',
            ],
            [
                'id'    => 356,
                'title' => 'defect_sub_category_create',
            ],
            [
                'id'    => 357,
                'title' => 'defect_sub_category_edit',
            ],
            [
                'id'    => 358,
                'title' => 'defect_sub_category_show',
            ],
            [
                'id'    => 359,
                'title' => 'defect_sub_category_delete',
            ],
            [
                'id'    => 360,
                'title' => 'defect_sub_category_access',
            ],
            [
                'id'    => 361,
                'title' => 'defect_create',
            ],
            [
                'id'    => 362,
                'title' => 'defect_edit',
            ],
            [
                'id'    => 363,
                'title' => 'defect_show',
            ],
            [
                'id'    => 364,
                'title' => 'defect_delete',
            ],
            [
                'id'    => 365,
                'title' => 'defect_access',
            ],
            [
                'id'    => 366,
                'title' => 'allot_unit_create',
            ],
            [
                'id'    => 367,
                'title' => 'allot_unit_edit',
            ],
            [
                'id'    => 368,
                'title' => 'allot_unit_show',
            ],
            [
                'id'    => 369,
                'title' => 'allot_unit_delete',
            ],
            [
                'id'    => 370,
                'title' => 'allot_unit_access',
            ],
            [
                'id'    => 371,
                'title' => 'renew_tenancy_create',
            ],
            [
                'id'    => 372,
                'title' => 'renew_tenancy_edit',
            ],
            [
                'id'    => 373,
                'title' => 'renew_tenancy_show',
            ],
            [
                'id'    => 374,
                'title' => 'renew_tenancy_delete',
            ],
            [
                'id'    => 375,
                'title' => 'renew_tenancy_access',
            ],
            [
                'id'    => 376,
                'title' => 'purpose_of_visit_create',
            ],
            [
                'id'    => 377,
                'title' => 'purpose_of_visit_edit',
            ],
            [
                'id'    => 378,
                'title' => 'purpose_of_visit_show',
            ],
            [
                'id'    => 379,
                'title' => 'purpose_of_visit_delete',
            ],
            [
                'id'    => 380,
                'title' => 'purpose_of_visit_access',
            ],
            [
                'id'    => 381,
                'title' => 'visitor_create',
            ],
            [
                'id'    => 382,
                'title' => 'visitor_edit',
            ],
            [
                'id'    => 383,
                'title' => 'visitor_show',
            ],
            [
                'id'    => 384,
                'title' => 'visitor_delete',
            ],
            [
                'id'    => 385,
                'title' => 'visitor_access',
            ],
            [
                'id'    => 386,
                'title' => 'groupvisitor_create',
            ],
            [
                'id'    => 387,
                'title' => 'groupvisitor_edit',
            ],
            [
                'id'    => 388,
                'title' => 'groupvisitor_show',
            ],
            [
                'id'    => 389,
                'title' => 'groupvisitor_delete',
            ],
            [
                'id'    => 390,
                'title' => 'groupvisitor_access',
            ],
            [
                'id'    => 391,
                'title' => 'expected_visit_create',
            ],
            [
                'id'    => 392,
                'title' => 'expected_visit_edit',
            ],
            [
                'id'    => 393,
                'title' => 'expected_visit_show',
            ],
            [
                'id'    => 394,
                'title' => 'expected_visit_delete',
            ],
            [
                'id'    => 395,
                'title' => 'expected_visit_access',
            ],
            [
                'id'    => 396,
                'title' => 'workman_management_access',
            ],
            [
                'id'    => 397,
                'title' => 'skilled_worker_create',
            ],
            [
                'id'    => 398,
                'title' => 'skilled_worker_edit',
            ],
            [
                'id'    => 399,
                'title' => 'skilled_worker_show',
            ],
            [
                'id'    => 400,
                'title' => 'skilled_worker_delete',
            ],
            [
                'id'    => 401,
                'title' => 'skilled_worker_access',
            ],
            [
                'id'    => 402,
                'title' => 'add_workman_create',
            ],
            [
                'id'    => 403,
                'title' => 'add_workman_edit',
            ],
            [
                'id'    => 404,
                'title' => 'add_workman_show',
            ],
            [
                'id'    => 405,
                'title' => 'add_workman_delete',
            ],
            [
                'id'    => 406,
                'title' => 'add_workman_access',
            ],
            [
                'id'    => 407,
                'title' => 'assign_workman_create',
            ],
            [
                'id'    => 408,
                'title' => 'assign_workman_edit',
            ],
            [
                'id'    => 409,
                'title' => 'assign_workman_show',
            ],
            [
                'id'    => 410,
                'title' => 'assign_workman_delete',
            ],
            [
                'id'    => 411,
                'title' => 'assign_workman_access',
            ],
            [
                'id'    => 412,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
