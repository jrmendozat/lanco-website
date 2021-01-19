<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class config_quoteandsell extends Model
{
    //
    protected $table = 'config_quoteandsells';

    protected $fillable = ['name_field_1','enable_field_1','name_field_2','enable_field_2','name_field_3',
                        'enable_field_3','name_field_4','enable_field_4','name_field_5','enable_field_5',
                        'name_category_1','enable_category_1','name_category_2','enable_category_2',
                        'name_category_3','enable_category_3','name_category_4','enable_category_4',
                        'name_category_5','enable_category_5',
                        'company_name','company_rif','company_address','company_contact_email','company_notification_email',
                        'company_contact_phone','company_logo','company_facebook','company_instagram','company_twitter','company_whatsapp',
                        
                        'company_contact_name_1','company_contact_email_1','company_contact_movil_1','company_contact_1_enable',
                        'company_contact_name_2','company_contact_email_2','company_contact_movil_2','company_contact_2_enable',
                        'company_contact_name_3','company_contact_email_3','company_contact_movil_3','company_contact_3_enable',
                        
                        'company_contact_qs_name_1','company_contact_qs_email_1','company_contact_qs_movil_1','company_contact_qs_1_enable',
                        'company_contact_qs_name_2','company_contact_qs_email_2','company_contact_qs_movil_2','company_contact_qs_2_enable',
                        
                        'company_contact_pay_name_1','company_contact_pay_email_1','company_contact_pay_movil_1','company_contact_pay_1_enable',
                        'company_contact_pay_name_2','company_contact_pay_email_2','company_contact_pay_movil_2','company_contact_pay_2_enable',
                        
                        'company_contact_movaut_name_1','company_contact_movaut_email_1','company_contact_movaut_movil_1','company_contact_movaut_1_enable',
                        'company_contact_movaut_name_2','company_contact_movaut_email_2','company_contact_movaut_movil_2','company_contact_movaut_2_enable',
                        
                        'company_contact_movcpt_name_1','company_contact_movcpt_email_1','company_contact_movcpt_movil_1','company_contact_movcpt_1_enable',
                        'company_contact_movcpt_name_2','company_contact_movcpt_email_2','company_contact_movcpt_movil_2','company_contact_movcpt_2_enable',
                        
                        'company_contact_movshp_name_1','company_contact_movshp_email_1','company_contact_movshp_movil_1','company_contact_movshp_1_enable',
                        'company_contact_movshp_name_2','company_contact_movshp_email_2','company_contact_movshp_movil_2','company_contact_movshp_2_enable',
                        
                        'company_namecount_bank_1','company_namecount_bank_2','company_namecount_bank_3','company_namecount_bank_4',
                        'company_namecount_bank_5','company_namecount_bank_6','company_namecount_bank_7','company_namecount_bank_8',
                        'company_namecount_bank_9', 'company_namecount_bank_10',
                        'Image_slider_1','Image_slider_2','Image_slider_3','Image_slider_4','Image_slider_5',
                        'text_1_slide_1','text_2_slide_1','text_3_slide_1',
                        'text_1_slide_2','text_2_slide_2','text_3_slide_2',
                        'text_1_slide_3','text_2_slide_3','text_3_slide_3',
                        'text_1_slide_4','text_2_slide_4','text_3_slide_4',
                        'text_1_slide_5','text_2_slide_5','text_3_slide_5',
                        'section_sales_active','product_catagory_sales','Imagen_sales','text_sales',
                        'flash_message','Date_begin_Flash','Date_end_Flash',
                        'flash_banner','Date_begin_banner','Date_end_banner',
                        'store_box1_title','store_box1_Body','store_box1_footer','store_box1_image','store_box1_image_Place','store_box1_active',
                        'store_box2_title','store_box2_Body','store_box2_footer','store_box2_image','store_box2_image_Place','store_box2_active',
                        'store_box3_title','store_box3_Body','store_box3_footer','store_box3_image','store_box3_image_Place','store_box3_active',
                        'store_box4_title','store_box4_Body','store_box5_footer','store_box4_image','store_box4_image_Place','store_box4_active',
                        'store_box5_title','store_box5_Body','store_box5_footer','store_box5_image','store_box5_image_Place','store_box5_active',
                        'text_notification_email','text_notification_sms',
                        'view_type_products','view_type_scream','Show_price_user_logout','modeFunction','TypeStore','Confirmate_Sell_First_Pay','api_sms_key',
                        'Information_footer','Tutorial_site','Icon_typestore','Button_modeFunction','Label_modeFunction','Title_modeFunction',
                        'product_typestore','Active_site','Active_store','Category_id','ModoDemo','TypeDemo',
                        'DriveSell','DriveDealer'];
}
