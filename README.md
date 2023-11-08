# habaanhainong-final-project
ใน github repo จะประกอบไปด้วย directory `front-end` (spring boot) และ `back-end` (laravel) โดยมีวิธีการติดตั้งดังนี้

- front-end (spring boot)

เข้าไปที่ directory

```jsx
cd habaanhainong-final-project/frontend/habaanhainong
```

```jsx
npm install -D tailwindcss
npm run build
```

- back-end (laravel)

เปลี่ยน directory

```jsx
cd habaanhainong-final-project/backend/habaanhainong-api
```

run docker

```jsx
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

สร้าง .env file

```jsx
cp .env.example .env
```

แก้ไข .env

1. `DB_HOST=mysql` (บรรทัด 12) 
2. `DB_USERNAME=sail` (บรรทัด 15) 
3. `DB_PASSWORD=password` (บรรทัด 16) 

รันโดยใช้ 

```jsx
sail up -d
```

generate key

```jsx
sail artisan key:generate
```
