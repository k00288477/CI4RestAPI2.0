# CI4-EcoTrack

**CI4-EcoTrack** is a backend service designed to support the EcoTrack application, which educates users on proper waste disposal, encourages recycling, and incentivizes eco-friendly behavior through rewards and gamification. Built with CodeIgniter 4 (CI4), the system provides a scalable, API-driven infrastructure for managing user engagement, tracking environmental actions, and fostering sustainability practices

- RESTful API built with CodeIgniter 4
- User tracking for waste disposal and recycling activities
- Educational content on correct waste disposal methods
- Gamification system with badges, leaderboards, and challenges
- Points and rewards system to incentivize sustainable behavior
- OAuth2.0 authentication and authorization
- Flexible configuration for different environments (development, production)


## Installation
## XAMPP Configuration

Follow these steps to configure XAMPP for CI4-EcoTrack:

1. In the XAMPP Control Panel, open the `Config` menu and select `httpd.conf`.
2. Search for `AllowOverride` (press `CTRL + F`) and change the default setting from `None` to `All`.
3. Search for `mod_rewrite.so` to locate the line `LoadModule rewrite_module modules/mod_rewrite.so`.
4. Uncomment this line by removing the `#` at the beginning.
5. Save the file and restart Apache.

## Testing Your Endpoints

- Base URL: `http://localhost/CI4-EcoTrack/public/`
- Example endpoint: `http://localhost/CI4-EcoTrack/public/users`

## Composer Setup

Follow these steps to ensure Composer is installed and to set up the project:

1. Check if Composer is installed by running:
composer -v
2. Navigate to the project directory:
cd C:\xampp\htdocs\CI4-EcoTrack
3. Install the project dependencies:
composer install


## SOPHIE

Files to look at 
- Routes.php
- Filters\CorsFilter
- Config\Filters.php
