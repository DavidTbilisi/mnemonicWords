<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'ამ პოსტმა ვერ გაიარა ჩვენი დაცვა.';

// Login
$lang['login_heading']         = 'შესვლა';
$lang['login_subheading']      = 'გთხოვთ შეიყვანოთ მომხმარების სახელი/ელ.ფოსტა და პაროლი.';
$lang['login_identity_label']  = 'მომხმარებლის სახელი/ელ.ფოსტა:';
$lang['login_password_label']  = 'პაროლი:';
$lang['login_remember_label']  = 'დამახსოვრება:';
$lang['login_submit_btn']      = 'შესვლა';
$lang['login_forgot_password'] = 'დამავიწყდა პაროლი?';

// Index
$lang['index_heading']           = 'მომხმარებელი';
$lang['index_subheading']        = 'ქვემოთ მოყვანილია მომხმარებელთა სია';
$lang['index_fname_th']          = 'სახელი';
$lang['index_lname_th']          = 'გვარი';
$lang['index_email_th']          = 'ელ.ფოსტა';
$lang['index_groups_th']         = 'ჯგუფები';
$lang['index_status_th']         = 'სტატუსი';
$lang['index_action_th']         = 'გააქტიურება';
$lang['index_active_link']       = 'აქტიური';
$lang['index_inactive_link']     = 'Inactive';
$lang['index_create_user_link']  = 'შექმენით ახალი მომხმარებელი';
$lang['index_create_group_link'] = 'შექმენით ახალი ჯგუფი';

// Deactivate User
$lang['deactivate_heading']                  = 'Deactivate User';
$lang['deactivate_subheading']               = 'Are you sure you want to deactivate the user \'%s\'';
$lang['deactivate_confirm_y_label']          = 'კი:';
$lang['deactivate_confirm_n_label']          = 'არა:';
$lang['deactivate_submit_btn']               = 'გაგზავნა';
$lang['deactivate_validation_confirm_label'] = 'დადასტურება';
$lang['deactivate_validation_user_id_label'] = 'მომხარებლის ID';

// Create User
$lang['create_user_heading']                           = 'შექმენით მომხმარებელი';
$lang['create_user_subheading']                        = 'Please enter the user\'s information below.';
$lang['create_user_fname_label']                       = 'სახელი:';
$lang['create_user_lname_label']                       = 'გვარი:';
$lang['create_user_company_label']                     = 'კომპანიის სახელი:';
$lang['create_user_identity_label']                    = 'Identity:';
$lang['create_user_email_label']                       = 'ელ.ფოსტა:';
$lang['create_user_phone_label']                       = 'ტელეფონი:';
$lang['create_user_password_label']                    = 'პაროლი:';
$lang['create_user_password_confirm_label']            = 'დაადასტურეთ პაროლი:';
$lang['create_user_submit_btn']                        = 'მომხმარებლის შექმნა';
$lang['create_user_validation_fname_label']            = 'სახელი';
$lang['create_user_validation_lname_label']            = 'გვარი';
$lang['create_user_validation_identity_label']         = 'Identity';
$lang['create_user_validation_email_label']            = 'ელ.ფოსტა';
$lang['create_user_validation_phone_label']            = 'ტელეფონი';
$lang['create_user_validation_company_label']          = 'კომპანიის სახელი';
$lang['create_user_validation_password_label']         = 'პაროლი';
$lang['create_user_validation_password_confirm_label'] = 'დაადასტურეთ პაროლი';

// Edit User
$lang['edit_user_heading']                           = 'Edit User';
$lang['edit_user_subheading']                        = 'Please enter the user\'s information below.';
$lang['edit_user_fname_label']                       = 'First Name:';
$lang['edit_user_lname_label']                       = 'Last Name:';
$lang['edit_user_company_label']                     = 'Company Name:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Phone:';
$lang['edit_user_password_label']                    = 'Password: (if changing password)';
$lang['edit_user_password_confirm_label']            = 'Confirm Password: (if changing password)';
$lang['edit_user_groups_heading']                    = 'Member of groups';
$lang['edit_user_submit_btn']                        = 'Save User';
$lang['edit_user_validation_fname_label']            = 'First Name';
$lang['edit_user_validation_lname_label']            = 'Last Name';
$lang['edit_user_validation_email_label']            = 'Email Address';
$lang['edit_user_validation_phone_label']            = 'Phone';
$lang['edit_user_validation_company_label']          = 'Company Name';
$lang['edit_user_validation_groups_label']           = 'Groups';
$lang['edit_user_validation_password_label']         = 'Password';
$lang['edit_user_validation_password_confirm_label'] = 'Password Confirmation';

// Create Group
$lang['create_group_title']                  = 'Create Group';
$lang['create_group_heading']                = 'Create Group';
$lang['create_group_subheading']             = 'Please enter the group information below.';
$lang['create_group_name_label']             = 'Group Name:';
$lang['create_group_desc_label']             = 'Description:';
$lang['create_group_submit_btn']             = 'Create Group';
$lang['create_group_validation_name_label']  = 'Group Name';
$lang['create_group_validation_desc_label']  = 'Description';

// Edit Group
$lang['edit_group_title']                  = 'Edit Group';
$lang['edit_group_saved']                  = 'Group Saved';
$lang['edit_group_heading']                = 'Edit Group';
$lang['edit_group_subheading']             = 'Please enter the group information below.';
$lang['edit_group_name_label']             = 'Group Name:';
$lang['edit_group_desc_label']             = 'Description:';
$lang['edit_group_submit_btn']             = 'Save Group';
$lang['edit_group_validation_name_label']  = 'Group Name';
$lang['edit_group_validation_desc_label']  = 'Description';

// Change Password
$lang['change_password_heading']                               = 'Change Password';
$lang['change_password_old_password_label']                    = 'Old Password:';
$lang['change_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['change_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['change_password_submit_btn']                            = 'Change';
$lang['change_password_validation_old_password_label']         = 'Old Password';
$lang['change_password_validation_new_password_label']         = 'New Password';
$lang['change_password_validation_new_password_confirm_label'] = 'Confirm New Password';

// Forgot Password
$lang['forgot_password_heading']                 = 'Forgot Password';
$lang['forgot_password_subheading']              = 'Please enter your %s so we can send you an email to reset your password.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Submit';
$lang['forgot_password_validation_email_label']  = 'Email Address';
$lang['forgot_password_identity_label'] = 'Identity';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'No record of that email address.';
$lang['forgot_password_identity_not_found']         = 'No record of that username.';

// Reset Password
$lang['reset_password_heading']                               = 'Change Password';
$lang['reset_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['reset_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['reset_password_submit_btn']                            = 'Change';
$lang['reset_password_validation_new_password_label']         = 'New Password';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirm New Password';
