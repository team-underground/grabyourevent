# Grab Your Event

Online Concert Ticket Selling application

## Installation

```
git clone git@github.com:abhisheksarmah/eventeefy
cd eventeefy
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
```

## RoadMap

-   [ ] unit test
-   [ ] make event list order by event published date
-   [ ] make socials (take from Saha Facebook) , Instagram (from …) , twitter from Abhishek
-   [x] publish to production ready
-   [x] provide view all link in home page
-   [ ] share event button to be fixed (Mithicher)
-   [ ] newsletter
-   [x] make business emails
-   [x] database seeding
-   [x] event edit page
-   [x] dashboard
-   [ ] all events page with filtering
-   [x] event publishing from admin
-   [ ] ticket sell
-   [ ] integrate razor pay
-   [ ] ci/cd (ongoing)
