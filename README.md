# Web-Masjid
A Mosque Website

Built using :
* PHP 7.4
* CodeIgniter 4.0.4
* Bootstrap v4.6
* Sass
* Datatables
* CKEditor
* CKFinder
* Sweetalert
* MythAuth
* AdminLTE 3


## Installation

You can clone the repository with this command, or download this [zip](https://github.com/rulyadhika/Masjid-Web/archive/main.zip) file.

```bash
> git clone https://github.com/rulyadhika/Masjid-Web.git
```

## Configuration
1. Change terminal directory to Masjid-Web folder
```bash
> cd Masjid-Web
```

2. Run this command
```bash
> composer install
```

3. Move bootstrap_pager.php file at the project root directory to vendor/codeigniter4/framework/system/Pager/Views. Or you can run this command
```bash
> mv bootstrap_pager.php vendor/codeigniter4/framework/system/Pager/Views
```

4. Move and replace myth folder at the project root directory to /vendor. Or you can run this command
```bash
> cp -r myth vendor && rm -rf myth
```

5. Download ckfinder version 3.5.1.1 for PHP, [here](https://ckeditor.com/ckfinder/download/)

6. Then extract ZIP File to /public/asset/plugins/

7. Move and replace ckfinder folder at the project root directory to /public/asset/plugins/. Or you can run this command
```bash
> cp -r ckfinder public/asset/plugins && rm -rf ckfinder
```

8. Duplicate env file and rename it to .env . Or you can run this command
```bash
> cp env .env
```

9. Configure your baseURL and database in .env file

10. Ensure your database is setup correctly, then run this command
```bash
> php spark migrate --all
> php spark migrate
> php spark db:seed AppSeeder
```

11. Run local development server
```bash
> php spark serve
```

## User credential for superadmin
* username : superadmin
* password : 02UQKmdRgv
