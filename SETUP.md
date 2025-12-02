# Tretproekt12 - Influentia Laravel Setup Guide

## Problem: Git Repository Not Initialized

Your local folder at `C:\xampp\htdocs\Tretproekt\Tretproekt12` is not yet a git repository.

## Solution: Clone the Repo Fresh

Run these commands in your terminal (Git Bash or CMD):

```bash
# 1. Navigate to your htdocs folder
cd C:\xampp\htdocs\Tretproekt

# 2. Remove the old folder (backup first if needed)
rmdir /s Tretproekt12

# 3. Clone the repo fresh from GitHub
git clone https://github.com/emrah2005/Tretproekt12.git

# 4. Navigate into the project
cd Tretproekt12

# 5. Verify git is initialized
git status

# 6. Install Laravel dependencies
composer install

# 7. Copy environment file
cp .env.example .env

# 8. Generate app key
php artisan key:generate

# 9. Run migrations
php artisan migrate

# 10. Start the server
php artisan serve
```

## What's Being Built

The Influentia platform includes:

### Models (Completed)
- ✅ User.php - Authentication with roles (admin, brand, influencer)
- ✅ Profile.php - User profiles with DNA traits

### Models (Coming Soon)
- Campaign.php - Brand campaigns
- Offer.php - Influencer offers and negotiations
- Thread.php - Messaging threads
- Message.php - Messages between users
- Deliverable.php - Campaign deliverables
- Rating.php - User ratings and reviews
- Payment.php - Payment tracking and escrow

### Controllers (Coming Soon)
- AuthController - Registration, Login, Logout
- ProfileController - Profile management
- CampaignController - Campaign CRUD
- OfferController - Matching and offers
- ThreadController & MessageController - Messaging
- DeliverableController - Submissions and approvals
- RatingController - Ratings and leaderboard
- PaymentController - Payment tracking

### Routes
All API routes will be in `routes/api.php`

## Local Development

After setup, access the app at: `http://localhost:8000`

## Git Commands for Future Updates

```bash
# Pull latest changes
git pull

# Check status
git status

# View recent commits
git log --oneline
```

## Database Setup

Make sure your `.env` file has correct MySQL credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tretproekt12
DB_USERNAME=root
DB_PASSWORD=
```

Then run: `php artisan migrate`

## Troubleshooting

**Error: "Could not find driver"**
- Ensure PHP's PDO MySQL extension is enabled in `php.ini`
- Check XAMPP PHP extensions

**Error: "SQLSTATE[HY000] [2002]"**
- Ensure MySQL server is running in XAMPP
- Check your `.env` DB credentials

**Composer issues**
- Run: `composer update` or `composer install` again

---

Once cloned, you'll be able to `git pull` to get all new files as they're added to the repo!
