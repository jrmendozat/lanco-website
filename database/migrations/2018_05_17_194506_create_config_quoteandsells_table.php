<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigQuoteandsellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_quoteandsells', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_field_1',20)->nullable();
            $table->boolean('enable_field_1')->default(0);
            $table->string('name_field_2',20)->nullable();
            $table->boolean('enable_field_2')->default(0);
            $table->string('name_field_3',20)->nullable();
            $table->boolean('enable_field_3')->default(0);
            $table->string('name_field_4',20)->nullable();
            $table->boolean('enable_field_4')->default(0);
            $table->string('name_field_5',20)->nullable();
            $table->boolean('enable_field_5')->default(0);
            $table->string('name_category_1',20)->nullable();
            $table->boolean('enable_category_1')->default(0);
            $table->string('name_category_2',20)->nullable();
            $table->boolean('enable_category_2')->default(0);
            $table->string('name_category_3',20)->nullable();
            $table->boolean('enable_category_3')->default(0);
            $table->string('name_category_4',20)->nullable();
            $table->boolean('enable_category_4')->default(0);
            $table->string('name_category_5',20)->nullable();
            $table->boolean('enable_category_5')->default(0);
            $table->string('company_name',250)->nullable();

            $table->string('company_rif',20)->nullable();
            $table->text('company_address')->nullable();
            $table->string('company_contact_email',150)->nullable();
            $table->string('company_notification_email',150)->nullable();
            $table->string('company_contact_phone',100)->nullable();
            $table->string('company_logo',100)->nullable();
            $table->string('company_facebook',30)->nullable();
            $table->string('company_instagram',30)->nullable();
            $table->string('company_twitter',30)->nullable();
            $table->string('company_whatsapp',30)->nullable();
           
            $table->string('company_contact_name_1',50)->nullable();
            $table->string('company_contact_email_1',150)->nullable();
            $table->string('company_contact_movil_1',20)->nullable();
            $table->boolean('company_contact_1_enable')->default(0)->nullable();
            $table->string('company_contact_name_2',50)->nullable();
            $table->string('company_contact_email_2',150)->nullable();
            $table->string('company_contact_movil_2',20)->nullable();
            $table->boolean('company_contact_2_enable')->default(0);
            $table->string('company_contact_name_3',50)->nullable();
            $table->string('company_contact_email_3',150)->nullable();
            $table->string('company_contact_movil_3',20)->nullable();
            $table->boolean('company_contact_3_enable')->default(0);

            $table->string('company_contact_qs_name_1',50)->nullable();
            $table->string('company_contact_qs_email_1',50)->nullable();
            $table->string('company_contact_qs_movil_1',20)->nullable();
            $table->boolean('company_contact_qs_1_enable')->default(0);
            
            $table->string('company_contact_qs_name_2',50)->nullable();
            $table->string('company_contact_qs_email_2',50)->nullable();
            $table->string('company_contact_qs_movil_2',20)->nullable();
            $table->boolean('company_contact_qs_2_enable')->default(0);
            
            $table->string('company_contact_pay_name_1',50)->nullable();
            $table->string('company_contact_pay_email_1',50)->nullable();
            $table->string('company_contact_pay_movil_1',20)->nullable();
            $table->boolean('company_contact_pay_1_enable')->default(0);
            
            $table->string('company_contact_pay_name_2',50)->nullable();
            $table->string('company_contact_pay_email_2',50)->nullable();
            $table->string('company_contact_pay_movil_2',20)->nullable();
            $table->boolean('company_contact_pay_2_enable')->default(0);
            
            $table->string('company_contact_movaut_name_1',50)->nullable();
            $table->string('company_contact_movaut_email_1',50)->nullable();
            $table->string('company_contact_movaut_movil_1',20)->nullable();
            $table->boolean('company_contact_movaut_1_enable')->default(0);
            
            $table->string('company_contact_movaut_name_2',50)->nullable();
            $table->string('company_contact_movaut_email_2',50)->nullable();
            $table->string('company_contact_movaut_movil_2',20)->nullable();
            $table->boolean('company_contact_movaut_2_enable')->default(0);
            
            $table->string('company_contact_movcpt_name_1',50)->nullable();
            $table->string('company_contact_movcpt_email_1',50)->nullable();
            $table->string('company_contact_movcpt_movil_1',20)->nullable();
            $table->boolean('company_contact_movcpt_1_enable')->default(0);
            
            $table->string('company_contact_movcpt_name_2',50)->nullable();
            $table->string('company_contact_movcpt_email_2',50)->nullable();
            $table->string('company_contact_movcpt_movil_2',20)->nullable();
            $table->boolean('company_contact_movcpt_2_enable')->default(0);
            
            $table->string('company_contact_movshp_name_1',50)->nullable();
            $table->string('company_contact_movshp_email_1',50)->nullable();
            $table->string('company_contact_movshp_movil_1',20)->nullable();
            $table->boolean('company_contact_movshp_1_enable')->default(0);
            
            $table->string('company_contact_movshp_name_2',50)->nullable();
            $table->string('company_contact_movshp_email_2',50)->nullable();
            $table->string('company_contact_movshp_movil_2',20)->nullable();
            $table->boolean('company_contact_movshp_2_enable')->default(0);
            
            $table->string('company_namecount_bank_1',150)->nullable(); 
            $table->string('company_namecount_bank_2',150)->nullable(); 
            $table->string('company_namecount_bank_3',150)->nullable(); 
            $table->string('company_namecount_bank_4',150)->nullable(); 
            $table->string('company_namecount_bank_5',150)->nullable(); 
            $table->string('company_namecount_bank_6',150)->nullable(); 
            $table->string('company_namecount_bank_7',150)->nullable(); 
            $table->string('company_namecount_bank_8',150)->nullable(); 
            $table->string('company_namecount_bank_9',150)->nullable(); 
            $table->string('company_namecount_bank_10',150)->nullable(); 
           
            $table->string('Image_slider_1',150)->nullable();
            $table->string('Image_slider_2',150)->nullable();   
            $table->string('Image_slider_3',150)->nullable();           
            $table->string('Image_slider_4',150)->nullable();            
            $table->string('Image_slider_5',150)->nullable(); 
                        
            $table->string('text_1_slide_1',150)->nullable();
            $table->string('text_2_slide_1',150)->nullable();
            $table->string('text_3_slide_1',150)->nullable();
            $table->string('text_1_slide_2',150)->nullable();
            $table->string('text_2_slide_2',150)->nullable();
            $table->string('text_3_slide_2',150)->nullable();
            $table->string('text_1_slide_3',150)->nullable();
            $table->string('text_2_slide_3',150)->nullable();
            $table->string('text_3_slide_3',150)->nullable();
            $table->string('text_1_slide_4',150)->nullable();
            $table->string('text_2_slide_4',150)->nullable();
            $table->string('text_3_slide_4',150)->nullable();
            $table->string('text_1_slide_5',150)->nullable();
            $table->string('text_2_slide_5',150)->nullable();
            $table->string('text_3_slide_5',150)->nullable();

            $table->string('store_box1_title',150)->nullable();
            $table->text('store_box1_Body')->nullable();
            $table->string('store_box1_footer',150)->nullable();
            $table->string('store_box1_image',150)->nullable();
            $table->enum('store_box1_image_Place', ['Top','Bottom','Overlay']);
            $table->boolean('store_box1_active')->default(0)->nullable();  
            
            $table->string('store_box2_title',150)->nullable();
            $table->text('store_box2_Body')->nullable();
            $table->string('store_box2_footer',150)->nullable();
            $table->string('store_box2_image',150)->nullable();
            $table->enum('store_box2_image_Place', ['Top','Bottom','Overlay']);
            $table->boolean('store_box2_active')->default(0)->nullable();     

            $table->string('store_box3_title',150)->nullable();
            $table->text('store_box3_Body')->nullable();
            $table->string('store_box3_footer',150)->nullable();
            $table->string('store_box3_image',150)->nullable();
            $table->enum('store_box3_image_Place', ['Top','Bottom','Overlay']);
            $table->boolean('store_box3_active')->default(0)->nullable();    
            
            $table->string('store_box4_title',150)->nullable();
            $table->text('store_box4_Body')->nullable();
            $table->string('store_box4_footer',150)->nullable();
            $table->string('store_box4_image',150)->nullable();
            $table->enum('store_box4_image_Place', ['Top','Bottom','Overlay']);
            $table->boolean('store_box4_active')->default(0)->nullable();    

            $table->string('store_box5_title',150)->nullable();
            $table->text('store_box5_Body')->nullable();
            $table->string('store_box5_footer',150)->nullable();
            $table->string('store_box5_image',150)->nullable();
            $table->enum('store_box5_image_Place', ['Top','Bottom','Overlay']);
            $table->boolean('store_box5_active')->default(0)->nullable(); 

            $table->boolean('section_sales_active',1)->nullable();
            $table->string('product_catagory_sales',150)->nullable();
            $table->string('Imagen_sales',150)->nullable();
            $table->text('text_sales')->nullable();
            $table->string('flash_message',150)->nullable();
            $table->string('Date_begin_Flash',150)->nullable();
            $table->string('Date_end_Flash',150)->nullable();
            $table->string('flash_banner',150)->nullable();
            $table->string('Date_begin_banner',150)->nullable();
            $table->string('Date_end_banner',150)->nullable();
            $table->text('text_notification_email')->nullable();
            $table->text('text_notification_sms')->nullable();
            $table->enum('view_type_products', ['List', 'Pinterest-sl','Pinterest-sm','Pinterest-ss']);
            $table->enum('view_type_scream', ['Full', 'ByCategory']);
            $table->boolean('Show_price_user_logout')->default(0);
            $table->enum('modeFunction', ['quote','sell','quoteandsell']);
            $table->enum('TypeStore', ['autoparts','fashionshop','foodstore','other']);
            $table->boolean('Confirmate_Sell_First_Pay')->default(0);
            $table->string('api_sms_key',50)->nullable();
            $table->text('Information_footer')->nullable();
            $table->text('Tutorial_site')->nullable();
            $table->string('Icon_typestore',50)->nullable();
            $table->string('Button_modeFunction',50)->nullable();
            $table->string('Label_modeFunction',50)->nullable();
            $table->string('Title_modeFunction',50)->nullable();
            $table->string('product_typestore',50)->nullable();
            $table->boolean('Active_site')->default(1);
            $table->boolean('Active_store')->default(1);
            $table->string('Category_id',150)->nullable();
            $table->boolean('ModoDemo')->default(0);
            $table->boolean('DriveSell')->default(0);
            $table->boolean('DriveDealer')->default(0);
            $table->enum('TypeDemo', ['autoparts','fashionshop','personalcare','foodstore','toystore','tecnologystore','giftsandflowers,','professionalservice','notdemo']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_quoteandsells');
    }
}
