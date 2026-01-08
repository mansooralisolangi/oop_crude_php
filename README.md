# PHP OOP Database CRUD Project

This project is a **simple PHP Object-Oriented (OOP) database class** built using **MySQLi**.
The purpose of this repository is **learning & practicing CRUD operations** step by step.

> ⚠️ This project is for **learning purposes**, not production-ready yet.

---

## 📌 Current Features

* Database connection using **OOP MySQLi**
* Automatic connection handling via `__construct()`
* Table existence check before insert
* Insert records dynamically using associative arrays
* Result handling using a reusable result array
* Clean separation of logic using class methods
* Destructor to safely close database connection

---

## 🛠️ Technologies Used

* PHP (OOP)
* MySQL
* MySQLi Extension

---

## 📂 Project Structure

```
project-folder/
│
├── database.php   # Database class (connection + insert logic)
├── index.php      # Testing insert functionality
├── README.md      # Project documentation
```

---

## ⚙️ Database Configuration

Update database credentials inside `Database` class:

```php
private $db_host = "localhost";
private $db_user = "root";
private $db_password = "";
private $db_name = "students_db";
```

---

## 🧩 Example Usage (Insert Data)

```php
include_once("database.php");

$obj = new Database();

$obj->insert("students", [
    'name' => 'Hatesh Lakhani',
    'age'  => 130,
    'city' => 'Mirpur Khas'
]);

print_r($obj->getresult());
```

---

## 🧠 How Insert Works

1. User passes **table name** and **associative array**
2. Table existence is checked using `SHOW TABLES`
3. Array keys become column names
4. Array values become insert values
5. SQL query is dynamically generated
6. Result or error is stored in result array

---

## 🔐 Important Notes

* This version **does NOT use prepared statements** yet
* SQL Injection protection will be added later
* Validation & sanitization are not implemented yet

---

## 🚧 Upcoming Features (Work in Progress)

* ✅ Insert (Completed)
* ⏳ Select
* ⏳ Update
* ⏳ Delete
* ⏳ Prepared Statements
* ⏳ Error Handling Improvements
* ⏳ Full CRUD Example

---

## 📈 Learning Goals

* Understand PHP OOP concepts
* Learn reusable database classes
* Practice CRUD operations
* Improve code structure
* Prepare for Laravel ORM concepts

---

## 🤝 Contribution

This project is currently for **personal learning**, but suggestions are welcome.

---

## 📜 License

This project is open-source and free to use for learning.

---

## ✍️ Author

**Mansoor Ali**
Junior PHP / Laravel Developer

---

> 🚀 This repository will be updated as new CRUD functions are implemented.
