# Fashion World - Premium E-Commerce Platform

Welcome to **Fashion World**, a modern, fully functional, responsive e-commerce web application. Built with a luxurious warm brown fashion aesthetic, the platform integrates a PHP/MySQL backend with an interactive client-side shopping cart and wishlist system.

---

## 🎨 Design Theme & Aesthetics

The application features a premium, state-of-the-art visual style tailored around fashion and clothing retail:
*   **Primary Brand Color**: `#8b5e3c` (Warm Luxury Brown)
*   **Secondary Accent**: `#6d4c35` (Deep Coffee Brown)
*   **Highlight Accent**: `#a07856` (Soft Caramel Brown)
*   **Background / Light**: `#f8f5f2` (Elegant Cream)
*   **Typography**: Poppins (Clean, modern geometric sans-serif loaded globally)
*   **Micro-Animations**: Smooth hover transitions, scaling product cards, active dots slider indicators, and dynamic notification toasts.

---

## 🚀 Key Features

### 👤 Account & Session Management
*   **User Authentication**: Register and login portals styled with custom warm brown card shadows and input states.
*   **Secure Storage**: Passwords are encrypted in the database using `BCRYPT` hashing.
*   **Session Management**: Pre-populates user credentials during checkout and handles navigation drop-downs based on active session states.
*   **Profile Settings**: Logged-in customers can modify their personal details (Name, Email) and reset passwords securely.

### 🛒 Client-Side Shopping Cart & Wishlist
*   **Add to Cart**: Add items directly from catalog lists or details pages with real-time green toast confirmations.
*   **Quantity Controls**: Edit quantities or delete items on the Cart page with instant subtotal and tax computations.
*   **Wishlist Portal**: Bookmarks products across catalog lists or detail pages. Wishlist buttons dynamically highlight as solid red hearts (`fas fa-heart text-red-500`) when already saved, and wishlist items can be transferred directly to the shopping cart.
*   **State Persistence**: Both cart and wishlist items persist across page refreshes using `localStorage`.

### 💳 Interactive Checkout & Order Placement
*   **Dynamic Checkout Form**: Collects shipping addresses, city details, PIN codes, phone contacts, and mock payment preferences. Pre-populates Name and Email for logged-in accounts.
*   **Cart Serialization**: Bridges frontend cart items to the PHP/MySQL backend on form submission.
*   **Order Confirmation**: Auto-creates unique order IDs (`FW-xxxxxxx`), inserts order billing logs and item specifications into the database, clears the cart, and redirects to a confirmation panel.

### 📦 Database Order History & Timeline Tracking
*   **Purchase Registry**: Retrieves user orders and item lists from the database to present order summaries.
*   **Timeline Stepper Tracker**: Input any order ID (e.g. `FW-8219382`) to fetch status details via AJAX. Renders shipping progress on an active timeline stepper (*Processing* $\rightarrow$ *Shipped* $\rightarrow$ *Out for Delivery* $\rightarrow$ *Delivered*).

---

## 🛠️ Technology Stack

*   **Frontend**: HTML5, Vanilla JavaScript, CSS3
*   **Utility & Styling Frameworks**:
    *   [Tailwind CSS](https://tailwindcss.com/) (loaded via CDN, custom brand theme config extended dynamically)
    *   [Font Awesome 6](https://fontawesome.com/) (premium vector icons)
    *   [Animate.css](https://animate.style/) (smooth visual transitions)
*   **Backend**: PHP (Session handling, Prepared Statement sanitization)
*   **Database**: MySQL (relational structure with database and table creation triggers)

---

## 🗄️ Database Architecture

The database config [database.php](file:///e:/Cloth%20Management%20System/config/database.php) automatically initializes a MySQL database named `login_register` and builds the following relational schemas:

1.  **`users`**: Customer credentials and credentials tracking.
2.  **`feedback`**: Reviews, ratings, and customer suggestions.
3.  **`orders`**: Shipping contacts, order totals, and logistics status tracking.
4.  **`order_items`**: Individual items associated with order numbers.

---

## 🔧 Installation & Deployment

### Prerequisites
*   Local server environment (e.g. **XAMPP**, **WAMP**, or native **PHP** and **MySQL**).

### Deployment Steps
1.  Clone this repository to your local web root directory (e.g. `htdocs` or `www` folder).
2.  Ensure your MySQL server is running.
3.  Open `config/database.php` and update the connection parameters if you have custom database credentials:
    ```php
    $servername = "localhost";
    $username = "root"; // your database username
    $password = "";     // your database password
    ```
4.  Start your local PHP server or visit the folder link via browser:
    ```bash
    php -S localhost:8000
    ```
5.  Access the homepage at `http://localhost:8000/index.php`. The database and required tables will automatically self-initialize on your first page load.
