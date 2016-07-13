<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voids
     */
    public function run()
    {
        $created_at = \Carbon\Carbon::now()->toDateTimeString();
        
        DB::table('categories')->insert(array(
            
                  array('title' =>'Automobiles', 'alias' =>'automobiles', 'parent_id' =>0, 'published' => 1,'created_at' => $created_at , 'logo' => 'automobiles.png'),
                  array('title' =>'Car', 'alias' =>'car', 'parent_id' =>1, 'published' => 1 ,'created_at' => $created_at, 'logo' => ''),
                  array('title' =>'Bike', 'alias' =>'bike', 'parent_id' =>1, 'published' => 1 ,'created_at' => $created_at, 'logo' => ''),
                  array('title' =>'Bota', 'alias' =>'boat', 'parent_id' =>1, 'published' => 1 ,'created_at' => $created_at, 'logo' => ''),
                  array('title' =>'Parts & Accessories', 'alias' =>'parts-accessories', 'parent_id' =>1, 'published' => 1 ,'created_at' => $created_at, 'logo' => ''),
                  array('title' =>'All Others', 'alias' =>'all-others', 'parent_id' =>1, 'published' => 1 ,'created_at' => $created_at, 'logo' => ''),
                  
                  array('title' =>'Electronics', 'alias' =>'electronics', 'parent_id' =>0  , 'published' => 1 ,'created_at' => $created_at, 'logo' => 'electronics.png'),
                  array('title' =>'Cell Phones', 'alias' =>'cell-phones', 'parent_id' =>7, 'published' => 1 ,'created_at' => $created_at, 'logo' => ''),
                  array('title' =>'Computer & Tech', 'alias' =>'computer-teh', 'parent_id' =>7, 'published' => 1 ,'created_at' => $created_at, 'logo' => ''),
                  array('title' =>'Photo & Video', 'alias' =>'photo-video', 'parent_id' =>7, 'published' => 1 ,'created_at' => $created_at, 'logo' => ''),
                  array('title' =>'Household Appliances', 'alias' =>'household-appliances', 'parent_id' =>7, 'published' => 1 ,'created_at' => $created_at, 'logo' => ''),
                  array('title' =>'All Others', 'alias' =>'all-others', 'parent_id' =>7, 'published' => 1 ,'created_at' => $created_at, 'logo' => ''),
                  
                  array('title' =>'For Sale', 'alias' =>'for-sale', 'parent_id' =>0, 'published' => 1 ,'created_at' => $created_at, 'logo' => 'sale.png'),
                  array('title' =>'Baby & Kids Stuff', 'alias' =>'baby-kids-stuff', 'parent_id' =>13, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Bycycles', 'alias' =>'bycylies', 'parent_id' =>13, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Books & Magazines', 'alias' =>'books-magazines', 'parent_id' =>13, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Clothes & Accessories', 'alias' =>'clothes-accessories', 'parent_id' =>13, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Health & Beauty', 'alias' =>'health-beaury', 'parent_id' =>13, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Jewelry & Watches', 'alias' =>'jewwelry-watches', 'parent_id' =>13, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Movie & Music', 'alias' =>'movie-music', 'parent_id' =>13, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Sports', 'alias' =>'sports', 'parent_id' =>13, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Everything Else', 'alias' =>'everything-else', 'parent_id' =>13, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  
                  array('title' =>'Housing', 'alias' =>'housing', 'parent_id' =>0, 'published' => 1 ,'created_at' =>$created_at, 'logo' => 'housing.png'),
                  array('title' =>'Appartmenst for rent', 'alias' =>'aappartment-for-rent', 'parent_id' =>23, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Commerial', 'alias' =>'commercial', 'parent_id' =>23, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Homes for rent', 'alias' =>'homes-for-rent', 'parent_id' =>23, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Homes for sale', 'alias' =>'homes-for-sale', 'parent_id' =>23, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Lands', 'alias' =>'lands', 'parent_id' =>23, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  
                  array('title' =>'Jobs', 'alias' =>'jobs', 'parent_id' =>0, 'published' => 1 ,'created_at' =>$created_at, 'logo' => 'jobs.png'),
                  array('title' =>'Account & Finance', 'alias' =>'account-finance', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Administrative & Office', 'alias' =>'administrative-office', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Biotech & Science', 'alias' =>'biotech-science', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Business', 'alias' =>'business', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Construction', 'alias' =>'construction', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Enginerring', 'alias' =>'enginerring', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Education', 'alias' =>'education', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Hospitaity', 'alias' =>'hospitaity', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Graphics & Web design', 'alias' =>'graphics-web-design', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Information Techhnology', 'alias' =>'information-techhnology', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Leagal', 'alias' =>'leagal', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Marketing', 'alias' =>'marketing', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Medicine', 'alias' =>'medicine', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Sales', 'alias' =>'sales', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Writing', 'alias' =>'writing', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Everything Else', 'alias' =>'everything-else', 'parent_id' =>29, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  
                  array('title' =>'Pets', 'alias' =>'automobiles', 'parent_id' =>0, 'published' => 1 ,'created_at' =>$created_at, 'logo' => 'pets.png'),
                  array('title' =>'Animal Service', 'alias' =>'animal-service', 'parent_id' =>46, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Bids', 'alias' =>'birds', 'parent_id' =>46, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Cats & Kitten', 'alias' =>'cats-kittne', 'parent_id' =>46, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Dogs & Puppies', 'alias' =>'dog-puppies', 'parent_id' =>46, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Lost & Found', 'alias' =>'lost-found', 'parent_id' =>46, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Other Pets', 'alias' =>'other-pets', 'parent_id' =>46, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  
                  array('title' =>'Services', 'alias' =>'automobiles', 'parent_id' =>0, 'published' => 1 ,'created_at' =>$created_at, 'logo' => 'service.png'),
                  array('title' =>'Art & Decore', 'alias' =>'art-decore', 'parent_id' =>53, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Beauty & Health', 'alias' =>'beauty-health', 'parent_id' =>53, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Cleaning & Maintenane', 'alias' =>'cleaning-maintenane', 'parent_id' =>53, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Computer', 'alias' =>'computer', 'parent_id' =>53, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Events & Occasions', 'alias' =>'events-occasions', 'parent_id' =>53, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Financial & Mortgages', 'alias' =>'financial-mortgages', 'parent_id' =>53, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Hotel & Airlines', 'alias' =>'hotel-airlines', 'parent_id' =>53, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Legal & Lawyer', 'alias' =>'legal-lawyer', 'parent_id' =>53, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Repari', 'alias' =>'repari', 'parent_id' =>53, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  array('title' =>'Others', 'alias' =>'others', 'parent_id' =>53, 'published' => 1 ,'created_at' =>$created_at, 'logo' => ''),
                  

            ));

    }
}
