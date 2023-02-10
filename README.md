<br/>

## Table Of Contents

- [About The Project](#about-the-project)
- [Demo Video](#demo_video)
- [Built With](#built-with)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Contributing](#contributing)
  - [Creating A Pull Request](#creating-a-pull-request)
- [License](#license)

## About The Project

It is a backend admin panel for a portfolio website. <br />
<a href="https://themeforest.net/item/rasalina-personal-portfolio-wordpress-theme/36163407?gclid=CjwKCAiA85efBhBbEiwAD7oLQD3aLNtBJvvAL7EvQ80Y8XhR-fZeib3wXbgXFeXEx25avNDP0zRQ8RoCF7gQAvD_BwE"> Front-end theme link </a>

### Screenshot
![screen_1](https://user-images.githubusercontent.com/72188665/218086747-1f3fc46b-9ef4-4547-9967-51d088e57601.png)

### Database Diagram
![db_diagram](https://user-images.githubusercontent.com/72188665/218088416-68e63d15-576d-4309-91c7-2df918ad4daa.png)

## Demo Video
Portfolio Website Demo [ Back-end ] : <a href="https://www.youtube.com/watch?v=PrPQpkoDqtI" id="demo_video"> Youtube Link </a>

## Built With

* PHP ( language )
* Laravel ( framework)
* MySql
* Ajax
* Composer

## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

* install php 8 or above
* install apache2 ( or any local serve )
* install mysql
* install composer

### Installation

1. Clone the repo

```sh
    git clone https://github.com/MUSTAFA-Hamzawy/Portfolio-Website.git
```

2. Install dependecies

```sh
    composer install
```
```sh
    npm install
```

3. Import the database file from the folder SQL_File
4. Make your own copy of the .env file
```sh
    cp .env.example .env
 
    DB_DATABASE= your db name here
    DB_USERNAME= your db username
    DB_PASSWORD= your password 
```

5. Start Running
```sh
    npm run dev
    php artisan migrate ( another terminal)
```

## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.
- If you have suggestions for adding or removing projects, feel free to [open an issue](https://github.com/MUSTAFA-Hamzawy/Portfolio-Website/issues/new) to discuss it, or
-  Directly create a pull request after you edit the files with necessary changes.

### Creating A Pull Request

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License
See [LICENSE](https://github.com/MUSTAFA-Hamzawy/Portfolio-Website/blob/main/LICENSE.md) for more information.
