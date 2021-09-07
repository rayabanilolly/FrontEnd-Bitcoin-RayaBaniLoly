## Tentang

Website ini merupakan tes teknik untuk melamar menjadi frontend developer di PT. Bumi Tekno Indonesia.

## Persiapan

1. clone repo ini dengan `git clone https://github.com/rayabanilolly/bitcoin-bumitekno.git`
2. pergi ke direktori dengan perintah `cd bitcoin-bumitekno`
3. install depedensi yang diperlukan `composer install`
4. duplikasi file .env `cp .env_example .env`
5. jalankan perintah untuk membuat app key `php artisan key:generate`
6. install npm package dan build aplikasi `npm install && npm run dev`
7. jalankan aplikasi dengan peritan `php artisan serve`
8. buka **http://localhost:8000** pada browser kesukaan kamu.

## Lainnya

Pengaturan ENV Variables

1. `RUPIAH_RATE` - merubah kurs rupiah terhadap dolar.
2. `API_TIMEOUT` - menyetel timeout guzzle (dalah detik)
3. `API_URI` - menyetel base API URL
