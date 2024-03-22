            ELEMENTS A PARAMETRER
------------------------------------------------
PHP INI
.........
 * extension=gd :Doit etre installer au serveur;
 * upload_max_filesize=1024M Doit etre augmenter;
 * post_max_size=1024M Doit etre augmenter;
 * Parametrage Backup fichier ctr_backup.php;
 * Url de Qrcode dans le fichier ctr_con.php;
MYSQL INI
.........
*max_allowed_packet=100M
------------------------------------------------

RENDRE XAMPP ACCES SUR UN RESEAU

Trouver la ligne ci dessous dans httpd_xampp.conf


Alias /phpmyadmin "/opt/lampp/phpmyadmin/"
<Directory "/opt/lampp/phpmyadmin">
AllowOverride AuthConfig
Require local

Alors replacer 'Require local' with 'Require all granted'.
-------------------------------------------------------------------


PARAMETRE VS CODE
Extension : PHP Intelephense;emmet, Github
Parametre : edite: format on save, auto save, 

COMMENTS GIT 
-GIT INIT
-GIT ADD .
-git init
- git commit -m "le Message"