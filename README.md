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

1. `DB_HOST=mysql`
2. `DB_DATABASE=test` 
3. `DB_USERNAME=sail` 
4. `DB_PASSWORD=password` 

รันโดยใช้ 

```jsx
echo "alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'" >> ~/.bashrc
sail up -d
```

generate key

```jsx
sail artisan key:generate
```

### Jira

https://besxzer.atlassian.net/jira/software/projects/HBHN/boards/1

### Figma

https://www.figma.com/file/xqgibUDt6mcFb4VgzVUKuc/HaBaanHaiNong?type=design&node-id=0%3A1&mode=design&t=d82yAALvrAq71k5Z-1

### About Project

https://www.canva.com/design/DAFzO330NB8/HyM_k2W5eSa7sp2lOyD5ZQ/view?utm_content=DAFzO330NB8&utm_campaign=designshare&utm_medium=link&utm_source=editor#2
