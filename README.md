# 📘 Finnish Vocabulary Flashcard App

This web application was developed as part of an academic program under the supervision of **Santus**. It serves as a vocabulary learning tool for Finnish language learners, integrating interactive flashcards, external API integration, and persistent user data handling.

---

## 🎯 Features

- 🔄 Fetches Finnish-English vocabulary from [finnfast.fi](https://finnfast.fi)
- 🧠 Flashcards UI built in **React** with flip/reveal interaction
- ✅ Save favorite words (stored in a Laravel-backed database)
- 🗂 View and manage saved favorites
- 🎨 Additional Blade-based view for managing name-color entries
- 🔁 Toggle between flashcards and name management via navigation

---

## 🛠 Technologies Used

- **Laravel 12** (PHP 8+)
- **React 18**
- **Blade Templates** + React-based UI
- **Vite** for frontend asset bundling
- **Finnfast API** for live vocabulary

---

## 🚀 Setup Instructions

1. **Clone the Repository**

   ```bash
   git clone https://github.com/your-username/flashcard-app.git
   cd flashcard-app
   ```

2. **Install Backend Dependencies**

   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   ```

3. **Install Frontend Dependencies**

   ```bash
   npm install
   npm run dev
   ```

4. **Run Migrations**

   ```bash
   php artisan migrate
   ```

5. **Start the Laravel Server**

   ```bash
   php artisan serve
   ```

---

## 🌐 Routes Overview

- `/` → Flashcard App (React)
- `/name` → Name-Color Manager (Blade)
- `/favorites-view` → View saved favorite words
- `/proxy/words` → API proxy to fetch vocab with your API key
- `/favorites` → Save/delete favorite words via Laravel

---

## 🙏 Acknowledgements

This application was developed as an **academic assignment** under the guidance of Kalwar Santosh  
Special thanks to [finnfast.fi](https://finnfast.fi) for providing the vocabulary API.
