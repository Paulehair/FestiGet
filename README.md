# FestiGet

## Database

File `database.sql` contains all data. Use it to create a database in MySQL.

**Delete database.sql from the sources before making the server public!**

### To update your MySQL database with `database.sql`:

```
mysqldump -u username -p database_name < database_path
```

Replace `username` with your MySQL username. Replace `database_name` with the name of your database for the project. If it doesn't exist, create it. Replace `database_path` with the full path of your `database.sql` file.

Example (Windows):

```
mysqldump -u root -p 000_SI_database < "C:\Apache24\htdocs\000_SI\database.sql"
```

### To export your MySQL database:

```
mysqldump -u username -p database_name > destination_path
```

Replace `username` with your MySQL username. Replace `database_name` with the name of your database for the project. If it doesn't exist, create it. Replace `destination_path` with the full destination path of your `database.sql` file.

Example (Windows):

```
mysqldump -u root -p 000_SI_database > "C:\Apache24\htdocs\000_SI\database.sql"
```
