# Shop

[![forthebadge](http://forthebadge.com/images/badges/built-with-love.svg)](http://forthebadge.com)

Projet personnel consistant à créer une boutique de vêtements en ligne. Le site est uniquement statique pour le moment mais qui deviendra un CRUD dans le futur avec des interactions avec une base de données mais également un système d'authentification a réaliser en PHP.

## Fabriqué avec

Programmes/logiciels/ressources utilisés pour développer le projet

* [Visual Studio Code](https://code.visualstudio.com/) - Editeur de code

## Auteurs

Auteur du projet :

* **Cyril Manil** _alias_ [@cyrilmnl](https://github.com/cyrilmnl)

## Installation / Configuration

### Installation par `Composer`

Lancer `composer install` pour installer [PHP Coding Standards Fixer](https://cs.symfony.com/) et le configurer dans PhpStorm (le fichier `.php-cs-fixer.php` contient les règles personnalisées basées sur la recommandation [PSR-12](https://www.php-fig.org/psr/psr-12/))

### Configurer PhpStorm

Configurer l'intégration de PHP Coding Standards Fixer dans PhpStorm en fixant le jeu de règles sur `Custom` et en désignant `.php-cs-fixer.php` comme fichier de configuration de règles de codage. 

### Base de données

Copier le fichier `.mypdo.ini.dist` en `.mypdo.ini` et modifier `.mypdo.ini` pour ajuster la configuration du serveur de base de données.

## Serveur Web local

### Sur Linux

Lancez le serveur Web local avec cette commande :
```bash
composer start
```

### Sur Windows

Lancez le serveur Web local avec cette commande :
```bash
composer start:w
```

### Accès au serveur Web
Naviguez alors à partir de cette adresse : <http://localhost:8000/>

## Style de codage

Le code suit la recommandation [PSR-12](https://www.php-fig.org/psr/psr-12/) :
- il peut être contrôlé avec `composer test:cs`
- il peut être reformaté automatiquement avec `composer fix:cs`

## License

Ce projet est sous licence ``Creative Commons Zero v1.0 Universal`` - voir le fichier [LICENSE.md](LICENSE.md) pour plus d'informations
