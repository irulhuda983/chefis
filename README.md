#### setup

<p>
    PHP >= 8.1.4,
    NODE >= 16.19.1
</p>

#### clone

```bash
git clone https://github.com/irulhuda983/chefis.git <folder_nama_project>
```

#### masuk ke

```bash
cd <folder_nama_project>
```

#### Install composer

```bash
composer install
```

#### Install node module

```bash
npm install
```

#### Buat ENV File

```bash
cp .env.example .env
```

#### Buat Laravel Key

```bash
php artisan key:generate
```

#### Buat passport secret

```bash
php artisan passport:install
```

#### setting env

APP_URL=https://namadomainanda
PASSPORT_CLIENT_ID=https://namadomainanda
PASSPORT_CLIENT_SECRET=https://namadomainanda

#### setting database dalam .env

<p>
DB_HOST=hostname<br>
DB_PORT=port<br>
DB_DATABASE=database<br>
DB_USERNAME=username<br>
DB_PASSWORD=password<br>
</p>

#### Migrate

```bash
php artisan migrate
```

#### Seeding

```bash
php artisan db:seed
```
