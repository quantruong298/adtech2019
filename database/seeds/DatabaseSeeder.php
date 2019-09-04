<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AuthRolesTableSeeder::class,
            AuthStatusesTableSeeder::class,
            UsersTableSeeder::class,
            SocialAccountsTableSeeder::class,
            DeliveryStatusesTableSeeder::class,
            CampaignBudgetTypesTableSeeder::class,
            ObjectivesTableSeeder::class,
            CreativeTypesTableSeeder::class,
            FlagsTableSeeder::class,
            MediaTableSeeder::class,
            StdBiddingMethodsTableSeeder::class,
            AdvertiserAccountsTableSeeder::class,
            PublisherAccountsTable::class,
            PublisherDomainsTable::class,
            CampaignsTableSeeder::class,
            CampaignsDetailTableSeeder::class,
            CampaignStatusesTableSeeder::class,
            AdGroupsTableSeeder::class,
            AdsTableSeeder::class,
            PlanTableSeeder::class,
            AdsPerformancesTableSeeder::class,
            AdGroupPerformancesTableSeeder::class,
            CampaignPerformancesTableSeeder::class,
        ]);
    }
}
