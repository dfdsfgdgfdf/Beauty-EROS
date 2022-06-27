<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\User;
use App\Models\UserAddress;
use Carbon\Carbon;
use Faker\Factory;

class EntrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();


        $superAdminRole     = Role::create(['name' => 'superAdmin',  'display_name' => 'Administrator',  'description' => 'System Administrator', 'allowed_route' => 'admin']);
        $adminRole          = Role::create(['name' => 'admin',       'display_name' => 'admin',          'description' => 'System Admin',         'allowed_route' => 'admin']);
        $userRole           = Role::create(['name' => 'user',        'display_name' => 'User',           'description' => 'System User',          'allowed_route' => 'admin']);
        $customerRole       = Role::create(['name' => 'customer',    'display_name' => 'Customer',       'description' => 'Website Customer',     'allowed_route' => null   ]);

        $superAdmin = User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'username' => 'System Administrator',
            'email' => 'superAdmin@superAdmin.com',
            'mobile' => '01234567890',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password'),
            'user_image'=>'images/user/avatar.png',
            'remember_token' => Str::random(10),
        ]);
        UserAddress::create([
            'user_id' => $superAdmin->id,
        ]);
        $superAdmin->attachRole($superAdminRole);


        $superAdmin2 = User::create([
            'first_name' => 'EROS',
            'last_name' => 'superAdmin',
            'username' => 'EROS System Administrator',
            'email' => 'erosSuperAdmin@erosSuperAdmin.com',
            'mobile' => '11234567890',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password'),
            'user_image'=>'images/user/avatar.png',
            'remember_token' => Str::random(10),
        ]);
        UserAddress::create([
            'user_id' => $superAdmin2->id,
        ]);
        $superAdmin2->attachRole($superAdminRole);


        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'System',
            'username' => 'System Admin',
            'email' => 'admin@admin.com',
            'mobile' => '01234567880',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password'),
            'user_image'=>'images/user/avatar.png',
            'remember_token' => Str::random(10),
        ]);
        UserAddress::create([
            'user_id' => $admin->id,
        ]);
        $admin->attachRole($adminRole);


        $user = User::create([
            'first_name' => 'User',
            'last_name' => 'System',
            'username' => 'System User',
            'email' => 'user@user.com',
            'mobile' => '01234567800',
            'password' => bcrypt('password'),
            'email_verified_at' => Carbon::now(),
            'user_image'=>'images/user/avatar.png',
            'remember_token' => Str::random(10),
        ]);
        UserAddress::create([
            'user_id' => $user->id,
        ]);
        $user->attachRole($userRole);


        $user1 = User::create([ 'first_name' => 'Customer', 'last_name' => 'Customer', 'username' => 'Customer Customer', 'email' => 'customer@customer.com',  'mobile' => '01234567999','status'=> 1, 'password' => bcrypt('password'),'email_verified_at' => Carbon::now(), 'user_image'=>'images/customer/avatar.png', 'remember_token' => Str::random(10), ]);
        UserAddress::create(['user_id' => $user1->id]);
        $user1->attachRole($customerRole);

        $user2 = User::create(['first_name' => 'Mohamed',   'last_name' => 'Farh',     'username' => 'Mohamed Farh',     'email' => 'mohamed@yahoo.com', 'mobile' => '01234567799','status'=> 1, 'password' => bcrypt('password'),'email_verified_at' => Carbon::now(), 'user_image'=>'images/customer/avatar.png', 'remember_token' => Str::random(10), ]);
        UserAddress::create(['user_id' => $user2->id]);
        $user2->attachRole($customerRole);

        $user3 = User::create(['first_name' => 'Ahmed',     'last_name' => 'Farh',     'username' => 'Ahmed Farh',       'email' => 'ahmed@yahoo.com',       'mobile' => '01234567699','status'=> 1, 'password' => bcrypt('password'),'email_verified_at' => Carbon::now(), 'user_image'=>'images/customer/avatar.png', 'remember_token' => Str::random(10), ]);
        UserAddress::create(['user_id' => $user3->id]);
        $user3->attachRole($customerRole);

        for ($i = 0; $i <10; $i++) {
            $user_i = User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'username' => $faker->userName,
                'email' => $faker->email,
                'mobile' => '9665' . random_int(10000000, 99999999),
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('password'),
                'user_image'=>'images/customer/avatar.png',
                'status'=> 1,
                'remember_token' => Str::random(10),
            ]);
            UserAddress::create(['user_id' => $user_i->id]);
            $user_i->attachRole($customerRole);
        }





        // MAIN
        $manageMain = Permission::create([
            'name' => 'main',
            'display_name' => 'الرئيسية',
            'description' => 'Administrator Dashboard',
            'route' => 'index',
            'module' => 'index',
            'as' => 'index',
            'icon' => 'fa fa-home',
            'parent' => '0',
            'parent_original' => '0',
            'sidebar_link' => '1',
            'appear' => '1',
            'ordering' => '1',
        ]);
        $manageMain->parent_show = $manageMain->id;
        $manageMain->save();



        // Admins
        $manageAdmins = Permission::create([ 'name' => 'manage_admins', 'display_name' => 'الأدمن', 'route' => 'admins.index', 'module' => 'admins', 'as' => 'admins.index', 'icon' => 'fas fa-user-shield', 'parent' => '0', 'parent_original' => '0','sidebar_link' => '0', 'appear' => '1', 'ordering' => '200', ]);
        $manageAdmins->parent_show = $manageAdmins->id;
        $manageAdmins->save();
        $showAdmins    = Permission::create([ 'name' => 'show_admins',          'display_name' => 'الأدمن',              'route' => 'admins.index',          'module' => 'admins', 'as' => 'admins.index',       'icon' => 'fas fa-user-shield',  'parent' => $manageAdmins->id, 'parent_show' => $manageAdmins->id, 'parent_original' => $manageAdmins->id,'sidebar_link' => '0', 'appear' => '1', ]);
        $createAdmins  = Permission::create([ 'name' => 'create_admins',        'display_name' => 'انشاء ادمن',       'route' => 'admins.create',         'module' => 'admins', 'as' => 'admins.create',      'icon' => null,                  'parent' => $manageAdmins->id, 'parent_show' => $manageAdmins->id, 'parent_original' => $manageAdmins->id,'sidebar_link' => '0', 'appear' => '0', ]);
        $updateAdmins  = Permission::create([ 'name' => 'update_admins',        'display_name' => 'تعديل ادمن',       'route' => 'admins.edit',           'module' => 'admins', 'as' => 'admins.edit',        'icon' => null,                  'parent' => $manageAdmins->id, 'parent_show' => $manageAdmins->id, 'parent_original' => $manageAdmins->id,'sidebar_link' => '0', 'appear' => '0', ]);
        $destroyAdmins = Permission::create([ 'name' => 'delete_admins',        'display_name' => 'حذف ادمن',       'route' => 'admins.destroy',        'module' => 'admins', 'as' => 'admins.destroy',     'icon' => null,                  'parent' => $manageAdmins->id, 'parent_show' => $manageAdmins->id, 'parent_original' => $manageAdmins->id,'sidebar_link' => '0', 'appear' => '0', ]);

        // Users
        $manageUsers = Permission::create([ 'name' => 'manage_users', 'display_name' => 'المستخدمين', 'route' => 'users.index', 'module' => 'users', 'as' => 'users.index', 'icon' => 'fas fa-users', 'parent' => '0', 'parent_original' => '0','sidebar_link' => '0', 'appear' => '1', 'ordering' => '210', ]);
        $manageUsers->parent_show = $manageUsers->id;
        $manageUsers->save();
        $showUsers    = Permission::create([ 'name' => 'show_users',          'display_name' => 'المستخدمين',              'route' => 'users.index',          'module' => 'users', 'as' => 'users.index',       'icon' => 'fas fa-users',        'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id,'sidebar_link' => '0', 'appear' => '1', ]);
        $createUsers  = Permission::create([ 'name' => 'create_users',        'display_name' => 'انشاء مستخدم',       'route' => 'users.create',         'module' => 'users', 'as' => 'users.create',      'icon' => null,                  'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id,'sidebar_link' => '0', 'appear' => '0', ]);
        $updateUsers  = Permission::create([ 'name' => 'update_users',        'display_name' => 'تعديل مستخدم',       'route' => 'users.edit',           'module' => 'users', 'as' => 'users.edit',        'icon' => null,                  'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id,'sidebar_link' => '0', 'appear' => '0', ]);
        $destroyUsers = Permission::create([ 'name' => 'delete_users',        'display_name' => 'حذف مستخدم',       'route' => 'users.destroy',        'module' => 'users', 'as' => 'users.destroy',     'icon' => null,                  'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id,'sidebar_link' => '0', 'appear' => '0', ]);

        //Categories
        $manageCategories = Permission::create([ 'name' => 'manage_categories', 'display_name' => 'أنواع الخدمات (الأقسام)', 'route' => 'categories.index', 'module' => 'categories', 'as' => 'categories.index', 'icon' => 'fas fa-th-large', 'parent' => '0', 'parent_original' => '0','sidebar_link' => '1', 'appear' => '1', 'ordering' => '5', ]);
        $manageCategories->parent_show = $manageCategories->id;
        $manageCategories->save();
        $showCategories    = Permission::create([ 'name' => 'show_categories',          'display_name' => 'الأقسام',       'route' => 'categories.index',          'module' => 'categories', 'as' => 'categories.index',       'icon' => 'fas fa-th',          'parent' => $manageCategories->id, 'parent_show' => $manageCategories->id, 'parent_original' => $manageCategories->id,'sidebar_link' => '1', 'appear' => '1', ]);

        //Products
        $manageProducts = Permission::create([ 'name' => 'manage_products', 'display_name' => 'الخدمات', 'route' => 'products.index', 'module' => 'products', 'as' => 'products.index', 'icon' => 'fab fa-phoenix-framework', 'parent' => '0', 'parent_original' => '0','sidebar_link' => '1', 'appear' => '1', 'ordering' => '10', ]);
        $manageProducts->parent_show = $manageProducts->id;
        $manageProducts->save();
        $showProducts    = Permission::create([ 'name' => 'show_products',          'display_name' => 'الخدمات',       'route' => 'products.index',          'module' => 'products', 'as' => 'products.index',       'icon' => 'fab fa-phoenix-framework',          'parent' => $manageProducts->id, 'parent_show' => $manageProducts->id, 'parent_original' => $manageProducts->id,'sidebar_link' => '1', 'appear' => '1', ]);
        $createProducts  = Permission::create([ 'name' => 'create_products',        'display_name' => 'انشاء خدمة',   'route' => 'products.create',         'module' => 'products', 'as' => 'products.create',      'icon' => null,                  'parent' => $manageProducts->id, 'parent_show' => $manageProducts->id, 'parent_original' => $manageProducts->id,'sidebar_link' => '1', 'appear' => '0', ]);
        $updateProducts  = Permission::create([ 'name' => 'update_products',        'display_name' => 'تعديل خدمة',   'route' => 'products.edit',           'module' => 'products', 'as' => 'products.edit',        'icon' => null,                  'parent' => $manageProducts->id, 'parent_show' => $manageProducts->id, 'parent_original' => $manageProducts->id,'sidebar_link' => '1', 'appear' => '0', ]);
        $destroyProducts = Permission::create([ 'name' => 'delete_products',        'display_name' => 'حذف خدمة',     'route' => 'products.destroy',        'module' => 'products', 'as' => 'products.destroy',     'icon' => null,                  'parent' => $manageProducts->id, 'parent_show' => $manageProducts->id, 'parent_original' => $manageProducts->id,'sidebar_link' => '1', 'appear' => '0', ]);

        //Bookings
        $manageBookings = Permission::create([ 'name' => 'manage_bookings', 'display_name' => 'الحجوزات', 'route' => 'bookings.index', 'module' => 'bookings', 'as' => 'bookings.index', 'icon' => 'fas fa-shopping-bag', 'parent' => '0', 'parent_original' => '0','sidebar_link' => '1', 'appear' => '1', 'ordering' => '15', ]);
        $manageBookings->parent_show = $manageBookings->id;
        $manageBookings->save();
            //Pending
            $showPendingBookings    = Permission::create([ 'name' => 'show_pending_bookings',          'display_name' => 'قائمة الانتظار',       'route' => 'bookings.pending',          'module' => 'bookings', 'as' => 'bookings.pending',       'icon' => 'fas fa-calendar-plus',          'parent' => $manageBookings->id, 'parent_show' => $manageBookings->id, 'parent_original' => $manageBookings->id,'sidebar_link' => '1', 'appear' => '1', ]);
            //Comming
            $showCommingBookings    = Permission::create([ 'name' => 'show_comming_bookings',          'display_name' => 'الحجوزات المستقبلية',       'route' => 'bookings.comming',          'module' => 'bookings', 'as' => 'bookings.comming',       'icon' => 'fas fa-calendar-alt',          'parent' => $manageBookings->id, 'parent_show' => $manageBookings->id, 'parent_original' => $manageBookings->id,'sidebar_link' => '1', 'appear' => '1', ]);
            //Finished
            $showFinishedBookings    = Permission::create([ 'name' => 'show_finished_bookings',          'display_name' => 'الحجوزات المنتهية',       'route' => 'bookings.finished',          'module' => 'bookings', 'as' => 'bookings.finished',       'icon' => 'far fa-calendar-check',          'parent' => $manageBookings->id, 'parent_show' => $manageBookings->id, 'parent_original' => $manageBookings->id,'sidebar_link' => '1', 'appear' => '1', ]);
            //All Bookings
            $showBookings    = Permission::create([ 'name' => 'show_bookings',          'display_name' => 'الحجوزات',       'route' => 'bookings.index',          'module' => 'bookings', 'as' => 'bookings.index',       'icon' => 'fas fa-shopping-bag',          'parent' => $manageBookings->id, 'parent_show' => $manageBookings->id, 'parent_original' => $manageBookings->id,'sidebar_link' => '1', 'appear' => '1', ]);
            $createPBookings  = Permission::create([ 'name' => 'create_bookings',        'display_name' => 'انشاء حجز',   'route' => 'bookings.create',         'module' => 'bookings', 'as' => 'bookings.create',      'icon' => null,                  'parent' => $manageBookings->id, 'parent_show' => $manageBookings->id, 'parent_original' => $manageBookings->id,'sidebar_link' => '1', 'appear' => '0', ]);
            $updatePBookings  = Permission::create([ 'name' => 'update_bookings',        'display_name' => 'تعديل حجز',   'route' => 'bookings.edit',           'module' => 'bookings', 'as' => 'bookings.edit',        'icon' => null,                  'parent' => $manageBookings->id, 'parent_show' => $manageBookings->id, 'parent_original' => $manageBookings->id,'sidebar_link' => '1', 'appear' => '0', ]);
            $destroyBookings = Permission::create([ 'name' => 'delete_bookings',        'display_name' => 'حذف حجز',     'route' => 'bookings.destroy',        'module' => 'bookings', 'as' => 'bookings.destroy',     'icon' => null,                  'parent' => $manageBookings->id, 'parent_show' => $manageBookings->id, 'parent_original' => $manageBookings->id,'sidebar_link' => '1', 'appear' => '0', ]);

        //Customers
        $manageCustomers = Permission::create([ 'name' => 'manage_customers', 'display_name' => 'العملاء', 'route' => 'customers.index', 'module' => 'customers', 'as' => 'customers.index', 'icon' => 'fas fa-user', 'parent' => '0', 'parent_original' => '0','sidebar_link' => '1', 'appear' => '1', 'ordering' => '25', ]);
        $manageCustomers->parent_show = $manageCustomers->id;
        $manageCustomers->save();
        $showCustomers    = Permission::create([ 'name' => 'show_customers',          'display_name' => 'العملاء',       'route' => 'customers.index',          'module' => 'customers', 'as' => 'customers.index',       'icon' => 'fas fa-user',         'parent' => $manageCustomers->id, 'parent_show' => $manageCustomers->id, 'parent_original' => $manageCustomers->id,'sidebar_link' => '1', 'appear' => '1', ]);
        $createCustomers  = Permission::create([ 'name' => 'create_customers',        'display_name' => 'انشاء عميل',   'route' => 'customers.create',         'module' => 'customers', 'as' => 'customers.create',      'icon' => null,                  'parent' => $manageCustomers->id, 'parent_show' => $manageCustomers->id, 'parent_original' => $manageCustomers->id,'sidebar_link' => '1', 'appear' => '0', ]);
        $updateCustomers  = Permission::create([ 'name' => 'update_customers',        'display_name' => 'تعديل عميل',   'route' => 'customers.edit',           'module' => 'customers', 'as' => 'customers.edit',        'icon' => null,                  'parent' => $manageCustomers->id, 'parent_show' => $manageCustomers->id, 'parent_original' => $manageCustomers->id,'sidebar_link' => '1', 'appear' => '0', ]);
        $destroyCustomers = Permission::create([ 'name' => 'delete_customers',        'display_name' => 'حذف عميل',     'route' => 'customers.destroy',        'module' => 'customers', 'as' => 'customers.destroy',     'icon' => null,                  'parent' => $manageCustomers->id, 'parent_show' => $manageCustomers->id, 'parent_original' => $manageCustomers->id,'sidebar_link' => '1', 'appear' => '0', ]);


        //HomePage
        $manageHome = Permission::create([ 'name' => 'manage_home', 'display_name' => 'صفحة (Homepage)', 'route' => 'sliders.index', 'module' => 'home', 'as' => 'sliders.index', 'icon' => 'fas fa-house-user', 'parent' => '0', 'parent_original' => '0','sidebar_link' => '1', 'appear' => '1', 'ordering' => '25', ]);
        $manageHome->parent_show = $manageHome->id;
        $manageHome->save();
        $showSliders    = Permission::create([ 'name' => 'show_sliders',          'display_name' => 'الصور المنزلقة',       'route' => 'sliders.index',          'module' => 'home', 'as' => 'sliders.index',       'icon' => 'fas fa-retweet',         'parent' => $manageHome->id, 'parent_show' => $manageHome->id, 'parent_original' => $manageHome->id,'sidebar_link' => '1', 'appear' => '1', ]);

        $showHomeAbout  = Permission::create([ 'name' => 'show_home_abouts',          'display_name' => 'عن المركز',       'route' => 'home_abouts.index',          'module' => 'home', 'as' => 'home_abouts.index',       'icon' => 'fas fa-address-card',         'parent' => $manageHome->id, 'parent_show' => $manageHome->id, 'parent_original' => $manageHome->id,'sidebar_link' => '1', 'appear' => '1', ]);


        //Advs
        // $manageAdvs = Permission::create([ 'name' => 'manage_advs', 'display_name' => 'الاعلانات', 'route' => 'advs.index', 'module' => 'advs', 'as' => 'advs.index', 'icon' => 'fas fa-ad', 'parent' => '0', 'parent_original' => '0','sidebar_link' => '1', 'appear' => '1', 'ordering' => '25', ]);
        // $manageAdvs->parent_show = $manageAdvs->id;
        // $manageAdvs->save();
        // $showAdvs    = Permission::create([ 'name' => 'show_advs',          'display_name' => 'الاعلانات',       'route' => 'advs.index',          'module' => 'advs', 'as' => 'advs.index',       'icon' => 'fas fa-ad',         'parent' => $manageAdvs->id, 'parent_show' => $manageAdvs->id, 'parent_original' => $manageAdvs->id,'sidebar_link' => '1', 'appear' => '1', ]);


        //Countries
        $manageCountries = Permission::create([ 'name' => 'manage_countries', 'display_name' => 'الدول', 'route' => 'countries.index', 'module' => 'countries', 'as' => 'countries.index', 'icon' => 'fas fa-globe', 'parent' => '0', 'parent_original' => '0','sidebar_link' => '1', 'appear' => '1', 'ordering' => '100', ]);
        $manageCountries->parent_show = $manageCountries->id;
        $manageCountries->save();
        $showCountries    = Permission::create([ 'name' => 'show_countries',          'display_name' => 'الدول',              'route' => 'countries.index',          'module' => 'countries', 'as' => 'countries.index',       'icon' => 'fas fa-globe',        'parent' => $manageCountries->id, 'parent_show' => $manageCountries->id, 'parent_original' => $manageCountries->id,'sidebar_link' => '1', 'appear' => '1', ]);
        //States
        $showStates    = Permission::create([ 'name' => 'show_states',          'display_name' => 'المحافظات',              'route' => 'states.index',          'module' => 'countries', 'as' => 'states.index',       'icon' => 'fas fa-map-marker-alt', 'parent' => $manageCountries->id, 'parent_show' => $manageCountries->id, 'parent_original' => $manageCountries->id,'sidebar_link' => '1', 'appear' => '1', ]);
        //Cities
        $showCities    = Permission::create([ 'name' => 'show_cities',          'display_name' => 'المدن',              'route' => 'cities.index',          'module' => 'countries', 'as' => 'cities.index',       'icon' => 'fas fa-university',   'parent' => $manageCountries->id, 'parent_show' => $manageCountries->id, 'parent_original' => $manageCountries->id,'sidebar_link' => '1', 'appear' => '1', ]);

        //Contact
        $manageContacts = Permission::create([ 'name' => 'manage_contacts', 'display_name' => 'الاتصال', 'route' => 'socials.index', 'module' => 'Contacts', 'as' => 'socials.index', 'icon' => 'fas fa-mobile-alt', 'parent' => '0', 'parent_original' => '0','sidebar_link' => '1', 'appear' => '1', 'ordering' => '115', ]);
        $manageContacts->parent_show = $manageContacts->id;
        $manageContacts->save();
            ##Social Media
            $showSocials    = Permission::create([ 'name' => 'show_social', 'display_name' => 'وسائل التواصل الاجتماعي',   'route' => 'socials.index',     'module' => 'Contacts',     'as' => 'socials.index',    'icon' => 'fas fa-thumbs-up',           'parent' => $manageContacts->id, 'parent_show' => $manageContacts->id, 'parent_original' => $manageContacts->id,'sidebar_link' => '1', 'appear' => '1', ]);
            ##Phone Number
            $showPhones     = Permission::create([ 'name' => 'show_phone',  'display_name' => 'الموبيل',         'route' => 'phones.index',      'module' => 'Contacts',     'as' => 'phones.index',     'icon' => 'fas fa-phone-square-alt',    'parent' => $manageContacts->id, 'parent_show' => $manageContacts->id, 'parent_original' => $manageContacts->id,'sidebar_link' => '1', 'appear' => '1', ]);
            ##E_Mail
            $showEmails     = Permission::create([ 'name' => 'show_email',  'display_name' => 'البريد الالكتروني',        'route' => 'emails.index',      'module' => 'Contacts',     'as' => 'emails.index',     'icon' => 'fas fa-envelope-open-text',  'parent' => $manageContacts->id, 'parent_show' => $manageContacts->id, 'parent_original' => $manageContacts->id,'sidebar_link' => '1', 'appear' => '1', ]);

        //
        $manageContactUs = Permission::create([ 'name' => 'manage_contactUs_messages', 'display_name' => 'رسائل (تواصل معنا)', 'route' => 'contact-messages.index', 'module' => 'contactUs', 'as' => 'contactUs', 'icon' => 'fas fa-sms', 'parent' => '0', 'parent_original' => '0','sidebar_link' => '1', 'appear' => '1', 'ordering' => '120', ]);
        $manageContactUs->parent_show = $manageContactUs->id;
        $manageContactUs->save();
            $showMessages    = Permission::create([ 'name' => 'show__contactUs_messages', 'display_name' => 'الرسائل',   'route' => 'contact-messages.index',     'module' => 'contactUs',     'as' => 'contact-messages.index',    'icon' => 'fas fa-sms',           'parent' => $manageContactUs->id, 'parent_show' => $manageContactUs->id, 'parent_original' => $manageContactUs->id,'sidebar_link' => '1', 'appear' => '1', ]);

        //About App
        $manageAbout = Permission::create([ 'name' => 'manage_abouts', 'display_name' => 'من نحن', 'route' => 'abouts.index', 'module' => 'Abouts', 'as' => 'Abouts', 'icon' => 'fas fa-id-card-alt', 'parent' => '0', 'parent_original' => '0','sidebar_link' => '1', 'appear' => '1', 'ordering' => '123', ]);
        $manageAbout->parent_show = $manageAbout->id;
        $manageAbout->save();
            $showAbout    = Permission::create([ 'name' => 'show_abouts', 'display_name' => 'من نحن',   'route' => 'abouts.index',     'module' => 'Abouts',     'as' => 'abouts.index',    'icon' => 'fas fa-address-card',           'parent' => $manageAbout->id, 'parent_show' => $manageAbout->id, 'parent_original' => $manageAbout->id,'sidebar_link' => '1', 'appear' => '1', ]);


        //Settings
        $manageSettings = Permission::create([ 'name' => 'manage_settings', 'display_name' => 'الإعدادات', 'route' => 'logos.index', 'module' => 'settings', 'as' => 'logos.index', 'icon' => 'fas fa-cogs', 'parent' => '0', 'parent_original' => '0','sidebar_link' => '1', 'appear' => '1', 'ordering' => '125', ]);
        $manageSettings->parent_show = $manageSettings->id;
        $manageSettings->save();
            ##Logo
            $showLogo    = Permission::create([ 'name' => 'show_logo',          'display_name' => 'لوجو الموقع',    'route' => 'logos.index',        'module' => 'settings',     'as' => 'logos.index',       'icon' => 'fas fa-paint-brush',     'parent' => $manageSettings->id, 'parent_show' => $manageSettings->id, 'parent_original' => $manageSettings->id,'sidebar_link' => '1', 'appear' => '1', ]);

            ##Pages Titles
            $showPages    = Permission::create([ 'name' => 'show_page_title',   'display_name' => 'نصوص العناوين',  'route' => 'page-titles.index',     'module' => 'settings',     'as' => 'page-titles.index',    'icon' => 'fas fa-heading',         'parent' => $manageSettings->id, 'parent_show' => $manageSettings->id, 'parent_original' => $manageSettings->id,'sidebar_link' => '1', 'appear' => '1', ]);

            ##WorkingTimes
            $showWorkingTimes = Permission::create([ 'name' => 'show_working_times',    'display_name' => 'ساعات العمل',    'route' => 'working_times.index',       'module' => 'settings',     'as' => 'working_times.index',      'icon' => 'fas fa-clock',  'parent' => $manageSettings->id, 'parent_show' => $manageSettings->id, 'parent_original' => $manageSettings->id,'sidebar_link' => '1', 'appear' => '1', ]);

            ##Locations
            $showLocations= Permission::create([ 'name' => 'show_locations',    'display_name' => 'موقع الشركة',    'route' => 'locations.index',       'module' => 'settings',     'as' => 'locations.index',      'icon' => 'fas fa-map-marker-alt',  'parent' => $manageSettings->id, 'parent_show' => $manageSettings->id, 'parent_original' => $manageSettings->id,'sidebar_link' => '1', 'appear' => '1', ]);












    }
}
