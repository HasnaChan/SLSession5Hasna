<p align="center"><a href="https://github.com/HasnaChan/SLMeet3WebProgHasna" target="_blank">Hi, I am Hasna.</a></p>

## About this Project
My name is Hasna Salsabilla Abdullah from PPTI 12 (NIM: 2502041211). I made this website to accomplished the task that my lecturer (Mr. Anderies) delivered to us as Self Learning  Session 5. This website made with PHP Framework Laravel. The design inspired by Bootstrap and AOS. I also made some transition effect in this website so the readers won't get bored. Here is the interface of this website:


## Documentation of the website:


You can watch the GIF Demo here : 




https://user-images.githubusercontent.com/103588041/235684318-e3dad455-e81d-4750-b2e0-deb9672396a4.mp4




**1. Home Page:**
This is a welcoming page of all readers who visit this website.
![1. Home Page](https://github.com/HasnaChan/SLSession5Hasna/blob/master/dokumentasi/home.jpg)


**2. About Me Page:**
This pages contains some informations about me strating from my name, my hobbies, my achievements, and my skills.
![2. About Me Page](https://github.com/HasnaChan/SLSession5Hasna/blob/master/dokumentasi/about1.jpg)
![3. About Me 2](https://github.com/HasnaChan/SLSession5Hasna/blob/master/dokumentasi/about2.jpg)
![4. About Me 3](https://github.com/HasnaChan/SLSession5Hasna/blob/master/dokumentasi/about3.jpg)


**3. Resume Page:**
In this page you can see my educational background and my Profesional Experiences.
![5. Resume Page](https://github.com/HasnaChan/SLSession5Hasna/blob/master/dokumentasi/resume1.jpg)
![6. Resume Page 2](https://github.com/HasnaChan/SLSession5Hasna/blob/master/dokumentasi/resume2.jpg)


**4. Project Page:**
This page shows you some project created by me and my team mates and also some of articles I made.
![7. Project Page](https://github.com/HasnaChan/SLSession5Hasna/blob/master/dokumentasi/project1.jpg)
![8. Project Page 2](https://github.com/HasnaChan/SLSession5Hasna/blob/master/dokumentasi/project2.jpg)
![9. Project Page 3](https://github.com/HasnaChan/SLSession5Hasna/blob/master/dokumentasi/project3.jpg)

**5. Achievement Page:**
This is my achievements page. I made this page into 3 category color. Gold: winning status champion. Silver: winning status runner up. Bronze: winning status second runner up.
![10. Achievement Page](https://github.com/HasnaChan/SLSession5Hasna/blob/master/dokumentasi/achievement1.jpg)
![11. Achievement Page 2](https://github.com/HasnaChan/SLSession5Hasna/blob/master/dokumentasi/achievement2.jpg)

**6. Achievement Detail Page:**
This is the detail page of each achiement
![12. Achievement Detail Page](https://github.com/HasnaChan/SLSession5Hasna/blob/master/dokumentasi/detail.jpg)

**7. Footer:**
You can contact me via Instagram, WhatsApp, or LinkedIn
![13. Footer](https://github.com/HasnaChan/SLSession5Hasna/blob/master/dokumentasi/footer.jpg)

## If you want to run the website, do this step in cli:

```
cp .env.example .env
composer install
php artisan key:generate
npm install
npm run build
php artisan serve
```

## Steps I did to install NPM Bootstrap:

**Step 1:** Download and install Node.js 

**Step 2:** Install Laravel Project
   ```
   composer global require laravel/installer
   ```
   
**Step 3:** Make new project
   ```
   laravel new SLMeet3Hasna
   ```
   
**Step 4:** Install Laravel UI For Bootstrap 5
   ```
   composer require laravel/ui
   ```
   
**Step 5:** Setup Auth Scaffolding with Bootstrap 5
   ```
   php artisan ui bootstrap --auth
   ```
   
**Step 6:** Setup Auth Scaffolding with Bootstrap 5
   ```
   php artisan ui bootstrap --auth
   ```
   
**Step7:** Install NPM Dependencies
   ```
   npm install
   ```
**Step 8:** Import vite.config.js Bootstrap 5 Path
   ```
    import { defineConfig } from 'vite';
    import laravel from 'laravel-vite-plugin';
    import path from 'path'

    export default defineConfig({
        plugins: [
            laravel([
                'resources/js/app.js',
            ]),
        ],
        resolve: {
            alias: {
                '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            }
        },
    });

   ```

**Step 9:** Update bootstrap.js
   ```
    import loadash from 'lodash'
    window._ = loadash


    import * as Popper from '@popperjs/core'
    window.Popper = Popper

    import 'bootstrap'

    import axios from 'axios'
    window.axios = axios

    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
   ```

**Step 10:** Import Bootstrap 5 SCSS in JS Folder
   ```
   import './bootstrap';

   import '../sass/app.scss'
   ```
**Step 11:** Replace mix() with @vite Blade directive
   ```
   @vite(['resources/js/app.js'])
   ```

**Step 12:** Running Vite Command to build Asset File
   ```
   npm run build
   ```

**Step 12:** Start the Local server
   ```
   php artisan serve
   ```
   
   
## License
https://getbootstrap.com/docs/5.0/getting-started/introduction/
