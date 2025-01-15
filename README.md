# Sportclub - Laravel Project - Backend Web
 
## Beschrijving
Dit project is een Laravel-gebaseerde webapplicatie voor een sportclub. Het biedt functionaliteiten voor ledenbeheer, nieuws, FAQ's en communicatie tussen leden.

## Setup Instructies
1. **voorwaarden**
- WSL met Ubuntu geïnstalleerd  (apache2 en mysql service moeten runnen)
- composer geïnstalleerd via WSL
- Node.js en npm geïnstalleerd
- PHP 8.2 of hoger geïnstalleerd

2. **Clone het project in WSL**
```bash
git clone https://github.com/jente01t/sportclub
cd sportclub
```

3. **Installeer dependencies**
```bash
composer install
npm install
```

4. **Configureer omgeving**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Storage setup**
```bash
php artisan storage:link
```

6. **Database setup**
- Maak een nieuwe database aan
- Update .env met je database gegevens, verander ```{YOUR_WSL_PATH}``` met het absolute pad naar de file BVB: ```/var/www/html/sportclub/database/database.sqlite```:
```env
DB_CONNECTION=sqlite
DB_DATABASE={YOUR_WSL_PATH}/database/database.sqlite 
DB_FOREIGN_KEYS=true
DB_HOST=127.0.0.1
DB_PORT=3306
```

7. **Mail configuratie**
- Update .env met de mail instellingen:
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

8. **Maak de database file**
```bash
php artisan migrate
```
Would you like to create it? <br>
- YES

9. **Migreer en seed de database**
```bash
php artisan migrate:fresh --seed
```

10. **Start de applicatie**
```bash
npm run build
php artisan serve
```
11. **Open browser** <br>
Open de browser en surf naar ```http://127.0.0.1:8000/``` of ```http://localhost:8000/ ```


11. **Admin toegang**
- Email: admin@ehb.be
- Wachtwoord: Password!321

12. **User toegang**
- Email: user@ehb.be
- Wachtwoord: 123

## Features

### Basis Functionaliteiten
- **Login Systeem**
  - Inloggen/registreren voor bezoekers
  - Admin/gebruiker rollen
  - Remember me
  - Gebruikersbeheer door admins
  - Admin kan nieuwe gebruikers aanmaken en admin rechten toekennen/afnemen

- **Profielpagina**
  - Publieke profielen (toegankelijk voor alle bezoekers)
  - Zoeken op naam
  - Profielfoto upload en opslag op server
  - Persoonlijke informatie beheer waaronder:
    - Username
    - Verjaardag
    - Profielfoto
    - Bio ("over mij" tekst)
  - Gebruikers kunnen eigen profiel bewerken

- **Nieuws Systeem**
  - CRUD voor nieuwsberichten (admin)
  - Publiek zichtbaar voor alle bezoekers
  - Nieuwsitems bevatten:
    - Titel
    - Afbeelding (opgeslagen op server)
    - Content
    - Publicatiedatum
  - Commentaar systeem voor ingelogde gebruikers

- **FAQ Systeem**
  - Gecategoriseerde FAQ's
  - Beheer door admins (CRUD voor categorieën en Q&As)
  - Publiek zichtbaar voor alle bezoekers

- **Contact Systeem**
  - Contactformulier voor alle bezoekers
  - Email notificaties naar admin
  - Admin dashboard voor berichten beheer en respons

### Extra Features Geïmplementeerd
- Chat systeem tussen gebruikers (privéberichten)
- Commentaar systeem op nieuws
- Email notificaties
- Admin dashboard voor contactformulier management

## References
- Github Copilot Completions in Visual Studio Code
- https://canvas.ehb.be/courses/40595
- https://laravel.com/docs/11.x
- https://primeoutsourcing.com/tutorials/content/creating-model-view-and-controller-on-your-laravel-project 
- https://www.laravelpackage.com/09-routing/ 
- https://laravel.com/docs/11.x/validation#form-request-validation
- https://stackoverflow.com/questions/26143315/laravel-5-artisan-seed-reflectionexception-class-songstableseeder-does-not-e
- https://stackoverflow.com/questions/59609308/updating-date-but-i-got-error-message-trying-to-get-property-id-of-non-obj
- https://stackoverflow.com/questions/40829086/defining-laravel-foreign-keys-with-model-factories-one-to-one-one-to-many-rel
- https://www.quora.com/How-do-you-change-the-page-title-in-the-Laravel-web-application-framework
- https://laracasts.com/discuss/channels/laravel/database-file-at-path-does-not-exist
- https://stackoverflow.com/questions/20723803/pdoexception-sqlstatehy000-2002-no-such-file-or-directory
- https://stackoverflow.com/questions/22615926/migration-cannot-add-foreign-key-constraint
- https://chatgpt.com/share/67855bb6-caac-800b-9224-fd1d91c0a8c2 

logo:
- https://www.svgrepo.com/svg/105493/fitness-facilities

profile Pictures:
- https://www.freepik.com/premium-ai-image/stylish-man-flat-vector-profile-picture-ai-generated_82675188.htm
- https://pbs.twimg.com/media/FjU2lkcWYAgNG6d.jpg

News Pictures:
- https://www.fotobehang.be/dumbells-en-gewichten.html
- https://www.rmi.is/en/marathon
