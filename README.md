How To Create A Simple REST API in PHP? Step By Step Guide!
===

we will learn how to create a simple REST API in PHP. Enjoy our step-by-step tutorial below!

PROJECT OVERVIEW
---
What is REST API?
To define "REST API", we have to know what is "REST" and what is "API" first. I'll do my best to explain it in simple terms because REST has a lot of concepts inside of it that could mean a lot of things.

REST stands for "REpresentational State Transfer". It is a concept or architecture for managing information over the internet. REST concepts are referred to as resources. A representation of a resource must be stateless. It is usually represented by JSON. 

API stands for "Application Programming Interface". It is a set of rules that allows one piece of software application to talk to another. Those "rules" can include create, read, update and delete operations. 



FILE STRUCTURE
---

At the end of this tutorial, we will have the following folders and files.

```html

├─ api/
├─── config/
├────── core.php - file used for core configuration
├────── database.php - file used for connecting to the database.
├─── objects/
├────── product.php - contains properties and methods for "product" database queries.
├────── category.php - contains properties and methods for "category" database queries.
├─── product/
├────── create.php - file that will accept posted product data to be saved to database.
├────── delete.php - file that will accept a product ID to delete a database record.
├────── read.php - file that will output JSON data based from "products" database records.
├────── read_paging.php - file that will output "products" JSON data with pagination.
├────── read_one.php - file that will accept product ID to read a record from the database.
├────── update.php - file that will accept a product ID to update a database record.
├────── search.php - file that will accept keywords parameter to search "products" database.
├─── category/
├────── read.php - file that will output JSON data based from "categories" database records.
├─── shared/
├────── utilities.php - file that will return pagination array.
```








